<?php get_header(); ?>

<main class="page-main">
    <div class="container" data-component="inview">
        <?php while( have_posts() ): the_post(); ?>

            <?php include(locate_template('components/blog-post-preview.php')); ?>

        <?php endwhile; ?>
    </div>
</main>

<?php get_footer(); ?>