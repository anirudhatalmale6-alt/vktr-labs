<?php get_header(); ?>

<?php if (!is_product()): ?>
<div class="page-header">
    <div class="container">
        <p class="section-subtitle" style="color:var(--sand);margin-bottom:8px;">
            <?php if (is_shop()) echo 'Our Collection'; elseif (is_cart()) echo 'Your Selection'; elseif (is_checkout()) echo 'Complete Your Order'; ?>
        </p>
        <h1><?php woocommerce_page_title(); ?></h1>
    </div>
</div>
<?php endif; ?>

<div class="container page-content" style="<?php if (is_product()) echo 'padding-top:' . (80 + 40) . 'px;'; ?>">
    <?php woocommerce_content(); ?>
</div>

<?php get_footer(); ?>
