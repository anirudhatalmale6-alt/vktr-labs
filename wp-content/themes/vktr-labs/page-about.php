<?php
/* Template Name: About Page */
get_header();
?>

<div class="page-header">
    <div class="container">
        <p class="section-subtitle" style="color:var(--sand);margin-bottom:8px;">Our Story</p>
        <h1>About VKTR Labs</h1>
        <p style="color:var(--sand-light);opacity:0.7;margin-top:12px;">Elevate Through Evidence</p>
    </div>
</div>

<section class="section">
    <div class="container">
        <div style="max-width:780px;margin:0 auto;">
            <h2 style="margin-bottom:20px;">Why VKTR Labs Exists</h2>
            <p style="color:var(--text-medium);line-height:1.9;margin-bottom:24px;">
                VKTR Labs was founded on a simple belief: the research community deserves access to premium-quality compounds backed by transparency, not marketing hype. In an industry where consistency and purity are paramount, we set out to create a standard that researchers can trust.
            </p>
            <p style="color:var(--text-medium);line-height:1.9;margin-bottom:24px;">
                Our name reflects our mission. Every product we offer is selected, tested, and delivered with one goal in mind &mdash; to support evidence-based research with compounds that meet the highest quality standards.
            </p>

            <div class="section-divider" style="margin:48px auto;"></div>

            <h2 style="margin-bottom:20px;">Elevate Through Evidence</h2>
            <p style="color:var(--text-medium);line-height:1.9;margin-bottom:24px;">
                &ldquo;Elevate Through Evidence&rdquo; is more than a tagline &mdash; it is the principle behind every decision we make. We believe that quality should be proven, not promised. That is why every product we supply is backed by verifiable data, third-party testing, and a commitment to consistency that goes beyond industry norms.
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
                <p>We source only the highest quality research compounds, carefully selected for purity, potency, and consistency across every batch.</p>
            </div>
            <div class="ethos-item fade-in">
                <h4>Third-Party Tested</h4>
                <p>Every product undergoes independent third-party testing. Certificates of Analysis (COAs) are available to verify the quality and composition of our products.</p>
            </div>
            <div class="ethos-item fade-in">
                <h4>99%+ Purity</h4>
                <p>Where applicable, our compounds are verified at 99% purity or higher. We do not compromise on quality, and we stand behind every product we offer.</p>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div style="max-width:780px;margin:0 auto;">
            <div class="ethos-grid" style="grid-template-columns:1fr 1fr;gap:40px;margin-bottom:48px;">
                <div class="fade-in">
                    <h3 style="margin-bottom:12px;font-size:1.4rem;">Quality &amp; Consistency</h3>
                    <p style="color:var(--text-medium);line-height:1.8;font-size:0.95rem;">
                        We maintain strict quality control processes to ensure that every product is consistent from batch to batch. When you order from VKTR Labs, you know exactly what you are getting &mdash; every time.
                    </p>
                </div>
                <div class="fade-in">
                    <h3 style="margin-bottom:12px;font-size:1.4rem;">Transparency</h3>
                    <p style="color:var(--text-medium);line-height:1.8;font-size:0.95rem;">
                        We believe in full transparency with our customers. From detailed product descriptions to accessible Certificates of Analysis, we provide the information you need to make confident purchasing decisions.
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
