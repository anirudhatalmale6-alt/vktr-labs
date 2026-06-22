<footer class="site-footer">
    <div class="container">
        <div class="footer-grid">
            <div class="footer-brand">
                <h3>VKTR Labs</h3>
                <p>Elevate Through Evidence. Premium research compounds backed by rigorous quality standards.</p>
            </div>
            <div class="footer-col">
                <h4>Shop</h4>
                <ul>
                    <li><a href="<?php echo esc_url(get_permalink(wc_get_page_id('shop'))); ?>">All Products</a></li>
                    <li><a href="<?php echo esc_url(wc_get_cart_url()); ?>">Cart</a></li>
                    <li><a href="<?php echo esc_url(wc_get_checkout_url()); ?>">Checkout</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>Information</h4>
                <ul>
                    <li><a href="<?php echo esc_url(home_url('/faq/')); ?>">FAQ</a></li>
                    <li><a href="<?php echo esc_url(home_url('/contact/')); ?>">Contact</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>Shipping</h4>
                <ul>
                    <li><a href="#">Free Express — Australia</a></li>
                    <li><a href="#">$16.95 Flat Rate — NZ</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <span>&copy; <?php echo date('Y'); ?> VKTR Labs. All rights reserved.</span>
            <span>All products are sold for research purposes only and are not for human consumption.</span>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
