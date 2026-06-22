<?php get_header(); ?>

<section class="hero">
    <div class="hero-content">
        <div class="hero-logo">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-full-light.svg" alt="VKTR Labs" style="width:100%;">
        </div>

        <p class="hero-tagline">Elevate Through Evidence</p>

        <p class="hero-description">
            Premium research compounds crafted to the highest standards.
            Every product is rigorously tested and quality assured for your research needs.
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
                <p>Complimentary express delivery Australia-wide</p>
            </div>
            <div class="feature-item">
                <svg class="feature-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                </svg>
                <h4>Quality Assured</h4>
                <p>Rigorous testing on every product</p>
            </div>
            <div class="feature-item">
                <svg class="feature-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M14.7 6.3a1 1 0 000 1.4l1.6 1.6a1 1 0 001.4 0l3.77-3.77a6 6 0 01-7.94 7.94l-6.91 6.91a2.12 2.12 0 01-3-3l6.91-6.91a6 6 0 017.94-7.94l-3.76 3.76z"/>
                </svg>
                <h4>Research Grade</h4>
                <p>Premium compounds for research purposes</p>
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
                        ?>
                    </div>
                    <div class="product-card-info">
                        <h3><?php echo esc_html($product->get_name()); ?></h3>
                        <p class="product-subtitle"><?php echo wp_trim_words($product->get_short_description(), 10); ?></p>
                        <div class="product-card-price">
                            <span class="currency">$</span><?php echo esc_html($product->get_price()); ?>
                        </div>
                        <span class="btn btn-dark">View Product</span>
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

<section class="ethos-section">
    <div class="container">
        <div class="section-header" style="margin-bottom:56px;">
            <p class="section-subtitle" style="color:var(--sand);">Why VKTR Labs</p>
            <h2 style="color:var(--ivory);">The Standard of Excellence</h2>
            <div class="section-divider"></div>
        </div>
        <div class="ethos-grid">
            <div class="ethos-item fade-in">
                <h4>Purity</h4>
                <p>Every batch is tested to ensure the highest purity standards, giving you confidence in your research outcomes.</p>
            </div>
            <div class="ethos-item fade-in">
                <h4>Precision</h4>
                <p>Exact formulations, accurate dosing, and consistent quality across our entire product range.</p>
            </div>
            <div class="ethos-item fade-in">
                <h4>Trust</h4>
                <p>Built on transparency and backed by evidence. We stand behind the quality of every product we offer.</p>
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
