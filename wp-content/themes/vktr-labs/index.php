<?php get_header(); ?>

<div class="page-header">
    <div class="container">
        <h1><?php
            if (is_home()) {
                echo 'News';
            } elseif (is_archive()) {
                the_archive_title();
            } elseif (is_search()) {
                echo 'Search Results';
            } else {
                the_title();
            }
        ?></h1>
    </div>
</div>

<div class="container page-content">
    <?php if (have_posts()): ?>
        <?php while (have_posts()): the_post(); ?>
            <article style="margin-bottom:40px;padding-bottom:40px;border-bottom:1px solid var(--border);">
                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <div style="color:var(--text-medium);margin:8px 0 16px;font-size:0.85rem;"><?php echo get_the_date(); ?></div>
                <?php the_excerpt(); ?>
                <a href="<?php the_permalink(); ?>" class="btn btn-dark" style="margin-top:12px;">Read More</a>
            </article>
        <?php endwhile; ?>

        <?php the_posts_pagination(['prev_text' => '&larr;', 'next_text' => '&rarr;']); ?>
    <?php else: ?>
        <p>No posts found.</p>
    <?php endif; ?>
</div>

<?php get_footer(); ?>
