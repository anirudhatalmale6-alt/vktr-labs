<?php
/* Template Name: Contact Page */
get_header();
?>

<div class="page-header">
    <div class="container">
        <p class="section-subtitle" style="color:var(--sand);margin-bottom:8px;">Get in Touch</p>
        <h1>Contact Us</h1>
        <p style="color:var(--sand-light);opacity:0.7;margin-top:12px;">We'd love to hear from you</p>
    </div>
</div>

<div class="container page-content">
    <div class="contact-grid">
        <div class="contact-info">
            <h3>VKTR Labs</h3>
            <p>Have a question about our products or your order? Send us a message and we'll get back to you as soon as possible.</p>

            <div style="margin-top:32px;">
                <div class="contact-detail">
                    <span class="label">Response</span>
                    <span>Within 24 hours</span>
                </div>
                <div class="contact-detail">
                    <span class="label">Shipping</span>
                    <span>Free Express Australia-wide</span>
                </div>
                <div class="contact-detail">
                    <span class="label">NZ Shipping</span>
                    <span>$16.95 flat rate</span>
                </div>
            </div>

            <div class="research-disclaimer-box" style="margin-top:32px;">
                <strong>Disclaimer</strong>
                All products sold by VKTR Labs are for research purposes only and are not intended for human consumption.
            </div>
        </div>

        <div class="contact-form">
            <form id="vktr-contact-form">
                <label for="contact-name">Full Name</label>
                <input type="text" id="contact-name" name="name" required placeholder="Your name">

                <label for="contact-email">Email Address</label>
                <input type="email" id="contact-email" name="email" required placeholder="your@email.com">

                <label for="contact-subject">Subject</label>
                <select id="contact-subject" name="subject">
                    <option value="general">General Enquiry</option>
                    <option value="order">Order Question</option>
                    <option value="product">Product Information</option>
                    <option value="shipping">Shipping Enquiry</option>
                    <option value="other">Other</option>
                </select>

                <label for="contact-message">Message</label>
                <textarea id="contact-message" name="message" required placeholder="How can we help?"></textarea>

                <button type="submit" class="btn btn-primary" style="width:100%;">Send Message</button>
            </form>
            <div id="contact-success" style="display:none;background:var(--ivory-dark);border-left:3px solid var(--success);padding:20px;margin-top:16px;">
                <p style="color:var(--success);font-weight:500;">Thank you for your message!</p>
                <p style="color:var(--text-medium);font-size:0.9rem;">We'll get back to you within 24 hours.</p>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
