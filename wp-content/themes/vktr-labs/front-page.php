<?php get_header(); ?>

<div class="promo-banner">
    <p><strong>Buy 3, Get 1 Free</strong> &mdash; Applied automatically at checkout</p>
</div>

<section class="hero">
    <div class="hero-content">
        <div class="hero-logo">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-full-light.svg" alt="VKTR Labs" style="width:100%;">
        </div>

        <p class="hero-tagline">Elevate Through Evidence</p>

        <p class="hero-description">
            Premium research compounds presented with transparency, consistency and professionalism.
            Quality backed by evidence, not hype.
        </p>

        <a href="<?php echo esc_url(get_permalink(wc_get_page_id('shop'))); ?>" class="btn btn-primary">Explore Products</a>
    </div>
</section>

<section class="features-strip">
    <div class="container">
        <div class="features-grid">
            <div class="feature-item">
                <svg class="feature-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="1" y="3" width="15" height="13"/><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"/><circle cx="5.5" cy="18.5" r="2.5"/><circle cx="18.5" cy="18.5" r="2.5"/>
                </svg>
                <h4>Free Express Shipping</h4>
                <p>Free express delivery Australia-wide on orders over $100</p>
            </div>
            <div class="feature-item">
                <svg class="feature-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                </svg>
                <h4>Quality Assured</h4>
                <p>Third-party tested with documentation available</p>
            </div>
            <div class="feature-item">
                <svg class="feature-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/><circle cx="12" cy="7" r="4"/>
                </svg>
                <h4>Buy 3, Get 1 Free</h4>
                <p>Order 3 or more and save automatically</p>
            </div>
        </div>
    </div>
</section>

<?php
$featured_products = wc_get_products([
    'status'   => 'publish',
    'limit'    => 6,
    'orderby'  => 'date',
    'order'    => 'DESC',
]);

if (!empty($featured_products)):
?>
<section class="section">
    <div class="container">
        <div class="section-header fade-in">
            <p class="section-subtitle">Our Collection</p>
            <h2>Featured Products</h2>
            <div class="section-divider"></div>
            <p>Explore our range of premium research compounds</p>
        </div>

        <div class="products-grid">
            <?php foreach ($featured_products as $product): ?>
                <a href="<?php echo esc_url($product->get_permalink()); ?>" class="product-card fade-in">
                    <div class="product-card-image">
                        <?php
                        $image_id = $product->get_image_id();
                        if ($image_id) {
                            echo wp_get_attachment_image($image_id, 'woocommerce_thumbnail');
                        } else {
                            echo '<div class="product-placeholder">VKTR Labs</div>';
                        }
                        $price = (float) $product->get_price();
                        if ($price === 0.0) {
                            echo '<span class="product-card-badge coming-soon-badge">Coming Soon</span>';
                        }
                        ?>
                    </div>
                    <div class="product-card-info">
                        <h3><?php echo esc_html($product->get_name()); ?></h3>
                        <p class="product-subtitle"><?php echo wp_trim_words($product->get_short_description(), 10); ?></p>
                        <?php if ($price > 0): ?>
                            <div class="product-card-price">
                                <span class="currency">$</span><?php echo esc_html($product->get_price()); ?>
                            </div>
                            <span class="btn btn-dark">View Product</span>
                        <?php else: ?>
                            <div class="product-card-price coming-soon-text">Coming Soon</div>
                            <span class="btn btn-dark">View Details</span>
                        <?php endif; ?>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>

        <div style="text-align:center;margin-top:48px;">
            <a href="<?php echo esc_url(get_permalink(wc_get_page_id('shop'))); ?>" class="btn btn-outline" style="border-color:var(--charcoal);color:var(--charcoal);">View All Products</a>
        </div>
    </div>
</section>
<?php endif; ?>

<section class="section" style="background:var(--ivory-dark);border-top:1px solid var(--border);border-bottom:1px solid var(--border);">
    <div class="container">
        <div class="section-header" style="margin-bottom:48px;">
            <p class="section-subtitle">The VKTR Difference</p>
            <h2>Why Choose VKTR Labs</h2>
            <div class="section-divider"></div>
        </div>
        <div class="why-choose-grid">
            <div class="why-choose-item fade-in">
                <svg class="wci-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M12 2L2 7l10 5 10-5-10-5z"/><path d="M2 17l10 5 10-5"/><path d="M2 12l10 5 10-5"/></svg>
                <h4>Premium Research Compounds</h4>
                <p>Carefully selected for purity, potency and consistency, presented to the highest standard.</p>
            </div>
            <div class="why-choose-item fade-in">
                <svg class="wci-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M22 11.08V12a10 10 0 11-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                <h4>High Purity Standards</h4>
                <p>99%+ purity where applicable, verified through independent testing processes.</p>
            </div>
            <div class="why-choose-item fade-in">
                <svg class="wci-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                <h4>Quality Focused</h4>
                <p>Every product meets rigorous quality standards with consistency across every batch.</p>
            </div>
            <div class="why-choose-item fade-in">
                <svg class="wci-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                <h4>Transparent Approach</h4>
                <p>Clear product information and honest documentation. What you see is what you get.</p>
            </div>
            <div class="why-choose-item fade-in">
                <svg class="wci-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="1" y="3" width="15" height="13"/><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"/><circle cx="5.5" cy="18.5" r="2.5"/><circle cx="18.5" cy="18.5" r="2.5"/></svg>
                <h4>Australia-Wide Express</h4>
                <p>Free express shipping on orders over $100 across Australia.</p>
            </div>
            <div class="why-choose-item fade-in">
                <svg class="wci-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z"/></svg>
                <h4>Reliable Customer Support</h4>
                <p>Responsive, professional service focused on building long-term trust.</p>
            </div>
        </div>
    </div>
</section>

<section class="ethos-section">
    <div class="container">
        <div class="section-header" style="margin-bottom:56px;">
            <p class="section-subtitle" style="color:var(--sand);">Our Philosophy</p>
            <h2 style="color:var(--ivory);">Elevate Through Evidence</h2>
            <div class="section-divider"></div>
            <p style="color:var(--sand-light);opacity:0.7;max-width:600px;margin:16px auto 0;">Quality should be supported by standards, consistency and evidence &mdash; not hype or marketing claims.</p>
        </div>
        <div class="ethos-grid">
            <div class="ethos-item fade-in">
                <h4>Quality</h4>
                <p>Every product is held to the highest standard. We partner with trusted manufacturers to deliver consistent, premium-grade compounds.</p>
            </div>
            <div class="ethos-item fade-in">
                <h4>Transparency</h4>
                <p>Clear information, honest documentation, and no exaggerated claims. What you see is what you get.</p>
            </div>
            <div class="ethos-item fade-in">
                <h4>Trust</h4>
                <p>Built on reliability and long-term relationships. We earn trust through consistent quality and professional service.</p>
            </div>
        </div>
    </div>
</section>

<section class="section" style="text-align:center;">
    <div class="container">
        <div class="section-header fade-in">
            <p class="section-subtitle">Get Started</p>
            <h2>Ready to Elevate Your Research?</h2>
            <div class="section-divider"></div>
            <p style="margin-bottom:32px;">Browse our collection of premium research compounds</p>
            <a href="<?php echo esc_url(get_permalink(wc_get_page_id('shop'))); ?>" class="btn btn-primary">Shop Now</a>
        </div>
    </div>
</section>

<?php get_footer(); ?>
