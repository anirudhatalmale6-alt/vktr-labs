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
                VKTR Labs was created with a simple belief: researchers should have access to premium-quality compounds presented with transparency, consistency and professionalism.
            </p>
            <p style="color:var(--text-medium);line-height:1.9;margin-bottom:24px;">
                In an industry where information can be unclear and standards can vary significantly, we wanted to build a brand that focuses on what matters most &mdash; quality, reliability and trust.
            </p>

            <div class="section-divider" style="margin:48px auto;"></div>

            <h2 style="margin-bottom:20px;">Elevate Through Evidence</h2>
            <p style="color:var(--text-medium);line-height:1.9;margin-bottom:24px;">
                &ldquo;Elevate Through Evidence&rdquo; is more than a tagline. It reflects our belief that confidence should come from facts, consistency and proven standards rather than marketing hype. Every decision we make is guided by the principle that quality should be demonstrated, not simply claimed.
            </p>
            <p style="color:var(--text-medium);line-height:1.9;margin-bottom:24px;">
                Our goal is to provide a straightforward, professional experience backed by exceptional service, clear communication and an unwavering commitment to quality.
            </p>
            <p style="color:var(--text-medium);line-height:1.9;margin-bottom:24px;">
                VKTR Labs exists to raise the standard and provide a trusted destination for those who value quality, consistency and evidence above all else.
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
                <p>We offer only the highest quality research compounds, carefully selected for purity, potency and consistency across every batch.</p>
            </div>
            <div class="ethos-item fade-in">
                <h4>Third-Party Tested</h4>
                <p>Products are third-party tested where applicable, with Certificates of Analysis (COAs) available to verify quality and composition.</p>
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
                        We believe in full transparency. From clear product descriptions to accessible documentation, we provide the information you need to make confident purchasing decisions.
                    </p>
                </div>
            </div>

            <div style="display:grid;grid-template-columns:1fr 1fr;gap:40px;margin-bottom:48px;">
                <div class="fade-in">
                    <h3 style="margin-bottom:12px;font-size:1.4rem;">Reliable Service</h3>
                    <p style="color:var(--text-medium);line-height:1.8;font-size:0.95rem;">
                        We are focused on building long-term trust through professional, responsive service. Free express shipping on orders over $100 Australia-wide and clear communication at every step.
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
