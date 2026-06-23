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
    return 20;
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

// Buy 3 Get 1 Free - automatically discount cheapest item when 4+ in cart
function vktr_buy3_get1_free($cart) {
    if (is_admin() && !defined('DOING_AJAX')) return;
    if (did_action('woocommerce_before_calculate_totals') >= 2) return;

    $items = $cart->get_cart();
    $count = count($items);

    // Reset any previous discount
    foreach ($items as $key => $item) {
        if (isset($item['vktr_b3g1_discount'])) {
            unset($cart->cart_contents[$key]['vktr_b3g1_discount']);
        }
    }

    if ($count < 3) return;

    // Find how many free items (1 free per 3 items)
    $free_count = floor($count / 3);

    // Collect all prices and sort ascending
    $price_map = [];
    foreach ($items as $key => $item) {
        $price_map[$key] = (float) $item['data']->get_price();
    }
    asort($price_map);

    // Discount the cheapest N items
    $discounted = 0;
    foreach ($price_map as $key => $price) {
        if ($discounted >= $free_count) break;
        if ($price > 0) {
            $cart->cart_contents[$key]['vktr_b3g1_discount'] = true;
            $cart->cart_contents[$key]['data']->set_price(0);
            $discounted++;
        }
    }
}
add_action('woocommerce_before_calculate_totals', 'vktr_buy3_get1_free', 20);

function vktr_b3g1_cart_item_name($name, $cart_item, $cart_item_key) {
    if (!empty($cart_item['vktr_b3g1_discount'])) {
        $name .= ' <span style="color:var(--success,#27ae60);font-size:0.8em;font-weight:600;"> &mdash; FREE (Buy 3 Get 1 Free)</span>';
    }
    return $name;
}
add_filter('woocommerce_cart_item_name', 'vktr_b3g1_cart_item_name', 10, 3);

// Coming Soon badge for products with $0 price
function vktr_coming_soon_badge() {
    global $product;
    if ($product && (float) $product->get_price() === 0.0) {
        echo '<span class="product-card-badge coming-soon-badge">Coming Soon</span>';
    }
}
add_action('woocommerce_before_shop_loop_item_title', 'vktr_coming_soon_badge', 15);

// Hide Add to Cart for Coming Soon ($0) products
function vktr_hide_add_to_cart_for_coming_soon($purchasable, $product) {
    if ((float) $product->get_price() === 0.0) {
        return false;
    }
    return $purchasable;
}
add_filter('woocommerce_is_purchasable', 'vktr_hide_add_to_cart_for_coming_soon', 10, 2);

// Show "Coming Soon" instead of price for $0 products
function vktr_coming_soon_price_html($price, $product) {
    if ((float) $product->get_price() === 0.0) {
        return '<span class="coming-soon-text">Coming Soon</span>';
    }
    return $price;
}
add_filter('woocommerce_get_price_html', 'vktr_coming_soon_price_html', 10, 2);

function vktr_product_specs() {
    $specs = [
        'retatrutide-20mg' => [
            'name' => 'Retatrutide',
            'cas' => '2381089-83-2',
            'molecular_formula' => 'C₂₂₅H₃₄₈N₄₈O₆₈',
            'molecular_weight' => '4813.45 g/mol',
            'purity' => '>99%',
            'form' => 'Lyophilised Powder',
            'appearance' => 'White to off-white powder',
            'dosage' => '20mg per vial',
            'storage' => 'Store at -20°C. After reconstitution, store at 2-8°C and use within 30 days.',
            'description' => 'Retatrutide (LY-3437943) is a novel triple agonist peptide targeting GLP-1, GIP, and glucagon receptors. It is one of the most studied research compounds in the field of metabolic regulation.',
        ],
        'mt1-10mg' => [
            'name' => 'Melanotan I (MT1)',
            'cas' => '75921-69-6',
            'molecular_formula' => 'C₇₈H₁₁₁N₂₁O₁₉',
            'molecular_weight' => '1646.85 g/mol',
            'purity' => '>99%',
            'form' => 'Lyophilised Powder',
            'appearance' => 'White to off-white powder',
            'dosage' => '10mg per vial',
            'storage' => 'Store at -20°C. After reconstitution, store at 2-8°C and use within 30 days.',
            'description' => 'Melanotan I (Afamelanotide) is a synthetic analogue of alpha-melanocyte stimulating hormone (α-MSH). It is widely studied for its role in melanogenesis and photoprotection research.',
        ],
        'ghk-cu-100mg' => [
            'name' => 'GHK-Cu (Copper Peptide)',
            'cas' => '49557-75-7',
            'molecular_formula' => 'C₁₄H₂₃CuN₆O₄',
            'molecular_weight' => '403.92 g/mol',
            'purity' => '>99%',
            'form' => 'Lyophilised Powder',
            'appearance' => 'Blue/purple powder',
            'dosage' => '100mg per vial',
            'storage' => 'Store at -20°C. After reconstitution, store at 2-8°C and use within 30 days.',
            'description' => 'GHK-Cu is a naturally occurring copper complex of the tripeptide glycyl-L-histidyl-L-lysine. It is extensively researched for its potential roles in tissue remodelling, wound healing, and cellular signalling.',
        ],
        'selank-10mg' => [
            'name' => 'Selank',
            'cas' => '129954-34-3',
            'molecular_formula' => 'C₃₃H₅₇N₁₁O₉',
            'molecular_weight' => '751.87 g/mol',
            'purity' => '>99%',
            'form' => 'Lyophilised Powder',
            'appearance' => 'White to off-white powder',
            'dosage' => '10mg per vial',
            'storage' => 'Store at -20°C. After reconstitution, store at 2-8°C and use within 30 days.',
            'description' => 'Selank is a synthetic analogue of the immunomodulatory peptide tuftsin. It is studied for its potential anxiolytic and nootropic properties in research settings.',
        ],
        'semax-10mg' => [
            'name' => 'Semax',
            'cas' => '80714-61-0',
            'molecular_formula' => 'C₃₇H₅₁N₉O₁₀',
            'molecular_weight' => '813.86 g/mol',
            'purity' => '>99%',
            'form' => 'Lyophilised Powder',
            'appearance' => 'White to off-white powder',
            'dosage' => '10mg per vial',
            'storage' => 'Store at -20°C. After reconstitution, store at 2-8°C and use within 30 days.',
            'description' => 'Semax is a synthetic peptide derived from adrenocorticotropic hormone (ACTH). It is researched for its neuroprotective and cognitive-enhancing properties.',
        ],
        'bac-water-10ml' => [
            'name' => 'Bacteriostatic Water',
            'molecular_formula' => 'H₂O + 0.9% Benzyl Alcohol',
            'molecular_weight' => 'N/A',
            'purity' => 'USP Grade',
            'form' => 'Sterile Liquid',
            'appearance' => 'Clear, colourless liquid',
            'dosage' => '10ml per vial',
            'storage' => 'Store at room temperature (15-25°C). Once opened, use within 28 days.',
            'description' => 'Bacteriostatic Water (BAC Water) is sterile water containing 0.9% benzyl alcohol as a bacteriostatic preservative. It is used as a diluent for reconstituting lyophilised research compounds.',
        ],
    ];
    return $specs;
}

function vktr_custom_product_tabs($tabs) {
    global $product;
    if (!$product) return $tabs;

    $slug = $product->get_slug();
    $specs = vktr_product_specs();

    if (isset($tabs['description'])) {
        $tabs['description']['priority'] = 10;
    }

    $matched_slug = null;
    foreach ($specs as $key => $data) {
        if (strpos($slug, $key) !== false || $slug === $key) {
            $matched_slug = $key;
            break;
        }
    }

    if ($matched_slug) {
        $tabs['specifications'] = [
            'title'    => 'Product Specifications',
            'priority' => 20,
            'callback' => 'vktr_specifications_tab_content',
        ];
    }

    $tabs['coa'] = [
        'title'    => 'Certificate of Analysis',
        'priority' => 30,
        'callback' => 'vktr_coa_tab_content',
    ];

    $tabs['storage'] = [
        'title'    => 'Storage &amp; Handling',
        'priority' => 40,
        'callback' => 'vktr_storage_tab_content',
    ];

    if (isset($tabs['reviews'])) {
        $tabs['reviews']['priority'] = 50;
    }

    if (isset($tabs['additional_information'])) {
        unset($tabs['additional_information']);
    }

    return $tabs;
}
add_filter('woocommerce_product_tabs', 'vktr_custom_product_tabs');

function vktr_get_product_spec_data() {
    global $product;
    $slug = $product->get_slug();
    $specs = vktr_product_specs();
    foreach ($specs as $key => $data) {
        if (strpos($slug, $key) !== false || $slug === $key) {
            return $data;
        }
    }
    return null;
}

function vktr_specifications_tab_content() {
    $data = vktr_get_product_spec_data();
    if (!$data) return;

    echo '<div class="vktr-specs-table">';
    echo '<h2>Product Specifications</h2>';
    echo '<table>';
    if (!empty($data['name'])) echo '<tr><th>Compound</th><td>' . esc_html($data['name']) . '</td></tr>';
    if (!empty($data['cas'])) echo '<tr><th>CAS Number</th><td>' . esc_html($data['cas']) . '</td></tr>';
    if (!empty($data['molecular_formula'])) echo '<tr><th>Molecular Formula</th><td>' . $data['molecular_formula'] . '</td></tr>';
    if (!empty($data['molecular_weight'])) echo '<tr><th>Molecular Weight</th><td>' . esc_html($data['molecular_weight']) . '</td></tr>';
    if (!empty($data['purity'])) echo '<tr><th>Purity</th><td>' . esc_html($data['purity']) . '</td></tr>';
    if (!empty($data['form'])) echo '<tr><th>Physical Form</th><td>' . esc_html($data['form']) . '</td></tr>';
    if (!empty($data['appearance'])) echo '<tr><th>Appearance</th><td>' . esc_html($data['appearance']) . '</td></tr>';
    if (!empty($data['dosage'])) echo '<tr><th>Quantity</th><td>' . esc_html($data['dosage']) . '</td></tr>';
    echo '</table>';
    echo '</div>';
}

function vktr_coa_tab_content() {
    echo '<div class="vktr-coa-section">';
    echo '<h2>Certificate of Analysis</h2>';
    echo '<div class="vktr-coa-info">';
    echo '<div class="vktr-coa-icon"><svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg></div>';
    echo '<p>All VKTR Labs products are third-party tested for purity, identity, and quality. Certificates of Analysis (COAs) are available upon request.</p>';
    echo '<p style="margin-top:12px;color:var(--text-light);font-size:0.9rem;">If you would like to view the COA for this product, please get in touch via WhatsApp or email and we will be happy to provide it.</p>';
    echo '</div>';
    echo '</div>';
}

function vktr_storage_tab_content() {
    $data = vktr_get_product_spec_data();

    echo '<div class="vktr-storage-section">';
    echo '<h2>Storage &amp; Handling</h2>';

    if ($data && !empty($data['storage'])) {
        echo '<p>' . esc_html($data['storage']) . '</p>';
    } else {
        echo '<p>Store in a cool, dry place away from direct sunlight. Refer to product label for specific storage requirements.</p>';
    }

    echo '<div class="vktr-storage-grid">';
    echo '<div class="vktr-storage-item">';
    echo '<strong>Before Reconstitution</strong>';
    echo '<p>Store lyophilised powder at -20&deg;C for long-term storage, or 2-8&deg;C for short-term storage (up to 90 days).</p>';
    echo '</div>';
    echo '<div class="vktr-storage-item">';
    echo '<strong>After Reconstitution</strong>';
    echo '<p>Store reconstituted solution at 2-8&deg;C (refrigerated). Use within 30 days of reconstitution.</p>';
    echo '</div>';
    echo '<div class="vktr-storage-item">';
    echo '<strong>Handling</strong>';
    echo '<p>Handle with appropriate laboratory safety equipment. Avoid repeated freeze-thaw cycles. Keep vial sealed until ready for use.</p>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
}

function vktr_enhanced_product_description() {
    global $product;
    $data = vktr_get_product_spec_data();

    if ($data && !empty($data['description'])) {
        echo '<div class="vktr-product-description">';
        echo '<h2>Description</h2>';
        echo '<p>' . esc_html($data['description']) . '</p>';
        echo '</div>';
    } else {
        the_content();
    }
}

function vktr_override_description_tab($tabs) {
    if (isset($tabs['description'])) {
        $tabs['description']['callback'] = 'vktr_enhanced_product_description';
    }
    return $tabs;
}
add_filter('woocommerce_product_tabs', 'vktr_override_description_tab', 20);
