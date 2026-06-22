<?php

function vktr_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo', ['height' => 100, 'width' => 400, 'flex-height' => true, 'flex-width' => true]);
    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');

    register_nav_menus([
        'primary' => 'Primary Navigation',
        'footer'  => 'Footer Navigation',
    ]);
}
add_action('after_setup_theme', 'vktr_setup');

function vktr_enqueue_assets() {
    wp_enqueue_style('vktr-fonts', 'https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;1,400&family=Inter:wght@300;400;500;600&display=swap', [], null);
    wp_enqueue_style('vktr-style', get_stylesheet_uri(), [], '1.0.0');
    wp_enqueue_script('vktr-main', get_template_directory_uri() . '/assets/js/main.js', [], '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'vktr_enqueue_assets');

function vktr_woocommerce_setup() {
    remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
    remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
    remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
}
add_action('init', 'vktr_woocommerce_setup');

function vktr_wc_wrapper_start() {
    echo '<div class="container page-content">';
}
add_action('woocommerce_before_main_content', 'vktr_wc_wrapper_start', 10);

function vktr_wc_wrapper_end() {
    echo '</div>';
}
add_action('woocommerce_after_main_content', 'vktr_wc_wrapper_end', 10);

function vktr_add_research_disclaimer_to_product() {
    echo '<div class="research-disclaimer-box">';
    echo '<strong>Research Use Only</strong>';
    echo 'This product is sold strictly for research purposes only. ';
    echo 'By purchasing, you accept full responsibility for the use of this product and confirm that you understand all applicable local laws and regulations.';
    echo '</div>';
}
add_action('woocommerce_single_product_summary', 'vktr_add_research_disclaimer_to_product', 25);

function vktr_checkout_disclaimer_fields() {
    echo '<div class="checkout-disclaimer" id="vktr-research-disclaimer">';
    echo '<h3 style="font-size:1rem;margin-bottom:16px;font-family:var(--font-heading);">Required Acknowledgements</h3>';

    woocommerce_form_field('research_acknowledgement', [
        'type'     => 'checkbox',
        'class'    => ['form-row-wide'],
        'label'    => 'I acknowledge that all products sold by VKTR Labs are for research purposes only.',
        'required' => true,
    ]);

    woocommerce_form_field('responsibility_acknowledgement', [
        'type'     => 'checkbox',
        'class'    => ['form-row-wide'],
        'label'    => 'I accept full responsibility for the use of all products after purchase.',
        'required' => true,
    ]);

    woocommerce_form_field('laws_acknowledgement', [
        'type'     => 'checkbox',
        'class'    => ['form-row-wide'],
        'label'    => 'I am responsible for understanding and complying with all local laws and regulations regarding the products I am purchasing.',
        'required' => true,
    ]);

    woocommerce_form_field('shipping_acknowledgement', [
        'type'     => 'checkbox',
        'class'    => ['form-row-wide'],
        'label'    => 'I understand that all orders are shipped at the buyer\'s risk. If a package is delayed, held, or seized by customs, it will not be resent or refunded.',
        'required' => true,
    ]);

    echo '</div>';
}
add_action('woocommerce_review_order_before_payment', 'vktr_checkout_disclaimer_fields');

function vktr_validate_disclaimer_fields() {
    if (empty($_POST['research_acknowledgement'])) {
        wc_add_notice('You must acknowledge that products are for research purposes only.', 'error');
    }
    if (empty($_POST['responsibility_acknowledgement'])) {
        wc_add_notice('You must accept responsibility for product use after purchase.', 'error');
    }
    if (empty($_POST['laws_acknowledgement'])) {
        wc_add_notice('You must acknowledge your responsibility regarding local laws and regulations.', 'error');
    }
    if (empty($_POST['shipping_acknowledgement'])) {
        wc_add_notice('You must acknowledge the shipping and customs risk disclaimer.', 'error');
    }
}
add_action('woocommerce_checkout_process', 'vktr_validate_disclaimer_fields');

function vktr_save_disclaimer_fields($order_id) {
    $fields = ['research_acknowledgement', 'responsibility_acknowledgement', 'laws_acknowledgement', 'shipping_acknowledgement'];
    foreach ($fields as $field) {
        if (!empty($_POST[$field])) {
            update_post_meta($order_id, '_' . $field, 'yes');
        }
    }
}
add_action('woocommerce_checkout_update_order_meta', 'vktr_save_disclaimer_fields');

function vktr_display_disclaimer_on_order($order) {
    $labels = [
        '_research_acknowledgement'      => 'Research Use Only',
        '_responsibility_acknowledgement' => 'Buyer Responsibility',
        '_laws_acknowledgement'           => 'Local Laws',
        '_shipping_acknowledgement'       => 'Shipping & Customs Risk',
    ];
    foreach ($labels as $key => $label) {
        if (get_post_meta($order->get_id(), $key, true) === 'yes') {
            echo '<p><strong>' . esc_html($label) . ':</strong> Acknowledged</p>';
        }
    }
}
add_action('woocommerce_admin_order_data_after_billing_address', 'vktr_display_disclaimer_on_order');

function vktr_custom_cart_count_fragment($fragments) {
    ob_start();
    echo '<span class="cart-count">' . WC()->cart->get_cart_contents_count() . '</span>';
    $fragments['.cart-count'] = ob_get_clean();
    return $fragments;
}
add_filter('woocommerce_add_to_cart_fragments', 'vktr_custom_cart_count_fragment');

function vktr_body_classes($classes) {
    if (is_front_page()) {
        $classes[] = 'front-page';
    }
    return $classes;
}
add_filter('body_class', 'vktr_body_classes');

function vktr_wc_products_per_page() {
    return 12;
}
add_filter('loop_shop_per_page', 'vktr_wc_products_per_page');

remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);

add_filter('woocommerce_show_page_title', '__return_false');

add_filter('loop_shop_columns', function() { return 3; });

function vktr_excerpt_length($length) {
    return 20;
}
add_filter('excerpt_length', 'vktr_excerpt_length');
