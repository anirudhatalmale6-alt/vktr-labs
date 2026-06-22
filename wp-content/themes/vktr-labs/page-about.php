<?php
/* Template Name: About Page */
get_header();
?>

<div class="page-header">
    <div class="container">
        <p class="section-subtitle" style="color:var(--sand);margin-bottom:8px;">Our Story</p>
        <h1>About VKTR Labs</h1>
        <p style="color:var(--sand-light);opacity:0.7;margin-top:12px;">Premium research compounds backed by evidence, not hype</p>
    </div>
</div>

<section class="section">
    <div class="container">
        <div style="max-width:780px;margin:0 auto;">
            <h2 style="margin-bottom:20px;">Why VKTR Labs Exists</h2>
            <p style="color:var(--text-medium);line-height:1.9;margin-bottom:24px;">
                VKTR Labs exists to provide researchers with access to premium research compounds sourced from trusted manufacturing partners, presented in a professional way with clear information, reliable service and high standards.
            </p>
            <p style="color:var(--text-medium);line-height:1.9;margin-bottom:24px;">
                VKTR Labs is not trying to be the biggest or loudest brand in the industry. The goal is to create a premium, professional research brand built around quality, consistency, transparency and trust. We believe that researchers deserve better than marketing hype &mdash; they deserve products that are backed by standards, documentation and evidence.
            </p>

            <div class="section-divider" style="margin:48px auto;"></div>

            <h2 style="margin-bottom:20px;">Elevate Through Evidence</h2>
            <p style="color:var(--text-medium);line-height:1.9;margin-bottom:24px;">
                &ldquo;Elevate Through Evidence&rdquo; is the principle behind everything we do. It means that quality should be supported by standards, consistency and evidence rather than hype or marketing claims.
            </p>
            <p style="color:var(--text-medium);line-height:1.9;margin-bottom:24px;">
                Every product we offer is selected with care, sourced from trusted manufacturing partners, and presented with clear, honest information. We do not make exaggerated claims or rely on marketing to sell our products. Instead, we let quality, documentation and consistency speak for themselves.
            </p>
        </div>
    </div>
</section>

<section class="ethos-section">
    <div class="container">
        <div class="section-header" style="margin-bottom:56px;">
            <p class="section-subtitle" style="color:var(--sand);">Our Standards</p>
            <h2 style="color:var(--ivory);">What Sets Us Apart</h2>
            <div class="section-divider"></div>
        </div>
        <div class="ethos-grid">
            <div class="ethos-item fade-in">
                <h4>Premium Research Compounds</h4>
                <p>We source only the highest quality research compounds from trusted manufacturing partners, carefully selected for purity, potency and consistency.</p>
            </div>
            <div class="ethos-item fade-in">
                <h4>Third-Party Tested</h4>
                <p>Products are third-party tested where applicable, with Certificates of Analysis (COAs) available from manufacturing partners to verify quality and composition.</p>
            </div>
            <div class="ethos-item fade-in">
                <h4>High Purity Standards</h4>
                <p>We focus on 99%+ purity standards where applicable. We do not compromise on quality, and we stand behind every product we offer.</p>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div style="max-width:780px;margin:0 auto;">
            <div style="display:grid;grid-template-columns:1fr 1fr;gap:40px;margin-bottom:48px;">
                <div class="fade-in">
                    <h3 style="margin-bottom:12px;font-size:1.4rem;">Quality &amp; Consistency</h3>
                    <p style="color:var(--text-medium);line-height:1.8;font-size:0.95rem;">
                        We maintain strict quality standards to ensure that every product is consistent across every batch. When you order from VKTR Labs, you know exactly what you are getting &mdash; every time.
                    </p>
                </div>
                <div class="fade-in">
                    <h3 style="margin-bottom:12px;font-size:1.4rem;">Transparency</h3>
                    <p style="color:var(--text-medium);line-height:1.8;font-size:0.95rem;">
                        We believe in full transparency. From clear product descriptions to documentation available from our manufacturing partners, we provide the information you need to make confident purchasing decisions.
                    </p>
                </div>
            </div>

            <div style="display:grid;grid-template-columns:1fr 1fr;gap:40px;margin-bottom:48px;">
                <div class="fade-in">
                    <h3 style="margin-bottom:12px;font-size:1.4rem;">Reliable Service</h3>
                    <p style="color:var(--text-medium);line-height:1.8;font-size:0.95rem;">
                        We are focused on building long-term trust through professional, responsive service. Free express shipping Australia-wide and clear communication at every step.
                    </p>
                </div>
                <div class="fade-in">
                    <h3 style="margin-bottom:12px;font-size:1.4rem;">Professional Presentation</h3>
                    <p style="color:var(--text-medium);line-height:1.8;font-size:0.95rem;">
                        Every aspect of VKTR Labs &mdash; from our products to our packaging to our website &mdash; is designed to reflect the premium, science-focused brand we are building.
                    </p>
                </div>
            </div>

            <div class="research-disclaimer-box" style="margin-top:40px;">
                <strong>Research Use Only</strong>
                All products sold by VKTR Labs are intended strictly for research purposes only. By purchasing from VKTR Labs, customers acknowledge and accept full responsibility for the use of all products.
            </div>
        </div>
    </div>
</section>

<section class="section" style="text-align:center;background:var(--ivory-dark);border-top:1px solid var(--border);border-bottom:1px solid var(--border);">
    <div class="container">
        <div class="section-header fade-in">
            <p class="section-subtitle">Explore Our Range</p>
            <h2>Ready to Get Started?</h2>
            <div class="section-divider"></div>
            <p style="margin-bottom:32px;">Browse our collection of premium research compounds</p>
            <a href="<?php echo esc_url(get_permalink(wc_get_page_id('shop'))); ?>" class="btn btn-primary">Shop Now</a>
        </div>
    </div>
</section>

<?php get_footer(); ?>
