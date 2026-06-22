<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header" id="site-header">
    <div class="header-inner">
        <a href="<?php echo esc_url(home_url('/')); ?>" class="site-logo">
            <?php if (has_custom_logo()): ?>
                <?php the_custom_logo(); ?>
            <?php else: ?>
                <div class="site-logo-text">VKTR<span>LABS</span></div>
            <?php endif; ?>
        </a>

        <nav class="main-nav" id="main-nav">
            <a href="<?php echo esc_url(home_url('/')); ?>" <?php if (is_front_page()) echo 'class="active"'; ?>>Home</a>
            <a href="<?php echo esc_url(get_permalink(wc_get_page_id('shop'))); ?>" <?php if (is_shop() || is_product()) echo 'class="active"'; ?>>Shop</a>
            <a href="<?php echo esc_url(home_url('/about/')); ?>" <?php if (is_page('about')) echo 'class="active"'; ?>>About</a>
            <a href="<?php echo esc_url(home_url('/faq/')); ?>" <?php if (is_page('faq')) echo 'class="active"'; ?>>FAQ</a>
            <a href="<?php echo esc_url(home_url('/contact/')); ?>" <?php if (is_page('contact')) echo 'class="active"'; ?>>Contact</a>
        </nav>

        <div class="header-actions">
            <a href="<?php echo esc_url(wc_get_cart_url()); ?>" class="cart-link" title="Cart">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M6 2L3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4z"/>
                    <line x1="3" y1="6" x2="21" y2="6"/>
                    <path d="M16 10a4 4 0 01-8 0"/>
                </svg>
                <?php if (WC()->cart && WC()->cart->get_cart_contents_count() > 0): ?>
                    <span class="cart-count"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
                <?php endif; ?>
            </a>
            <button class="menu-toggle" id="menu-toggle" aria-label="Toggle menu">
                <span></span><span></span><span></span>
            </button>
        </div>
    </div>
</header>

<div class="disclaimer-banner">
    All Products Are Sold Strictly for Research Purposes Only
</div>
