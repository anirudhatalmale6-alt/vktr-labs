<?php
/* Template Name: FAQ Page */
get_header();
?>

<div class="page-header">
    <div class="container">
        <p class="section-subtitle" style="color:var(--sand);margin-bottom:8px;">Support</p>
        <h1>Frequently Asked Questions</h1>
        <p style="color:var(--sand-light);opacity:0.7;margin-top:12px;">Everything you need to know about VKTR Labs</p>
    </div>
</div>

<div class="container page-content">
    <div class="faq-list">

        <div class="faq-item">
            <button class="faq-question">
                What are your products used for?
                <span class="icon">+</span>
            </button>
            <div class="faq-answer">
                <p>All VKTR Labs products are sold strictly for research purposes only and are not intended for human consumption. By purchasing our products, you acknowledge that you use them at your own risk.</p>
            </div>
        </div>

        <div class="faq-item">
            <button class="faq-question">
                What shipping options are available?
                <span class="icon">+</span>
            </button>
            <div class="faq-answer">
                <p>We offer free express shipping Australia-wide on orders over $100. For orders under $100, express shipping is $13 AUD. For New Zealand orders, we offer a flat-rate shipping fee of $16.95 AUD.</p>
            </div>
        </div>

        <div class="faq-item">
            <button class="faq-question">
                What payment methods do you accept?
                <span class="icon">+</span>
            </button>
            <div class="faq-answer">
                <p>We currently accept bank transfer (direct deposit) as our payment method. Full banking details will be provided at checkout and in your order confirmation email.</p>
            </div>
        </div>

        <div class="faq-item">
            <button class="faq-question">
                What is your customs policy for international orders?
                <span class="icon">+</span>
            </button>
            <div class="faq-answer">
                <p>If an order is seized, delayed, confiscated, or rejected by customs, it will not be refunded or resent and remains the buyer's responsibility. All customers must acknowledge this at checkout before placing their order.</p>
            </div>
        </div>

        <div class="faq-item">
            <button class="faq-question">
                Do you offer refunds?
                <span class="icon">+</span>
            </button>
            <div class="faq-answer">
                <p>Due to the nature of our products, refunds are assessed on a case-by-case basis. If you receive a damaged or incorrect product, please contact us within 48 hours of receiving your order. Orders seized, delayed, or confiscated by customs are not eligible for refunds.</p>
            </div>
        </div>

        <div class="faq-item">
            <button class="faq-question">
                How long does shipping take?
                <span class="icon">+</span>
            </button>
            <div class="faq-answer">
                <p>Australian orders are shipped via express post and typically arrive within 1-3 business days. New Zealand orders generally take 5-10 business days depending on customs processing times.</p>
            </div>
        </div>

        <div class="faq-item">
            <button class="faq-question">
                How do I track my order?
                <span class="icon">+</span>
            </button>
            <div class="faq-answer">
                <p>Once your order has been dispatched, you will receive a tracking number via email. You can use this to track your delivery through the relevant postal service.</p>
            </div>
        </div>

        <div class="faq-item">
            <button class="faq-question">
                How do I contact VKTR Labs?
                <span class="icon">+</span>
            </button>
            <div class="faq-answer">
                <p>You can reach us through our <a href="<?php echo home_url('/contact/'); ?>" style="color:var(--sand-dark);text-decoration:underline;">Contact page</a>. We aim to respond to all enquiries within 24 hours.</p>
            </div>
        </div>

    </div>
</div>

<?php get_footer(); ?>
