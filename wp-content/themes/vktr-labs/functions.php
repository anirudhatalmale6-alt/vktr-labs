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
    echo 'This product is sold for research purposes only and is not intended for human consumption. ';
    echo 'By purchasing this product, you acknowledge that you do so at your own risk.';
    echo '</div>';
}
add_action('woocommerce_single_product_summary', 'vktr_add_research_disclaimer_to_product', 25);

function vktr_checkout_disclaimer_fields($checkout) {
    echo '<div class="checkout-disclaimer" id="vktr-research-disclaimer">';
    echo '<h3 style="font-size:1rem;margin-bottom:16px;font-family:var(--font-heading);">Required Acknowledgements</h3>';

    woocommerce_form_field('research_acknowledgement', [
        'type'     => 'checkbox',
        'class'    => ['form-row-wide'],
        'label'    => 'I acknowledge that all products sold by VKTR Labs are for research purposes only, are not for human consumption, and that I purchase and use these products at my own risk.',
        'required' => true,
    ], $checkout->get_value('research_acknowledgement'));

    woocommerce_form_field('customs_acknowledgement', [
        'type'     => 'checkbox',
        'class'    => ['form-row-wide'],
        'label'    => 'I acknowledge that if my order is seized, delayed, confiscated, or rejected by customs, it will not be refunded or resent and remains my responsibility as the buyer.',
        'required' => true,
    ], $checkout->get_value('customs_acknowledgement'));

    echo '</div>';
}
add_action('woocommerce_review_order_before_payment', 'vktr_checkout_disclaimer_fields');

function vktr_validate_disclaimer_fields() {
    if (empty($_POST['research_acknowledgement'])) {
        wc_add_notice('You must acknowledge that products are for research purposes only before placing your order.', 'error');
    }
    if (empty($_POST['customs_acknowledgement'])) {
        wc_add_notice('You must acknowledge the customs responsibility disclaimer before placing your order.', 'error');
    }
}
add_action('woocommerce_checkout_process', 'vktr_validate_disclaimer_fields');

function vktr_save_disclaimer_fields($order_id) {
    if (!empty($_POST['research_acknowledgement'])) {
        update_post_meta($order_id, '_research_acknowledgement', 'yes');
    }
    if (!empty($_POST['customs_acknowledgement'])) {
        update_post_meta($order_id, '_customs_acknowledgement', 'yes');
    }
}
add_action('woocommerce_checkout_update_order_meta', 'vktr_save_disclaimer_fields');

function vktr_display_disclaimer_on_order($order) {
    $research = get_post_meta($order->get_id(), '_research_acknowledgement', true);
    $customs = get_post_meta($order->get_id(), '_customs_acknowledgement', true);

    if ($research === 'yes') {
        echo '<p><strong>Research Disclaimer:</strong> Acknowledged</p>';
    }
    if ($customs === 'yes') {
        echo '<p><strong>Customs Disclaimer:</strong> Acknowledged</p>';
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
