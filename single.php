<?php get_header(); ?>

<div class="container">
    <h1 class="h1"><?php the_title(); ?></h1>

    <?php while( have_posts() ): the_post(); ?>
        <?php the_content(); ?>
    <?php endwhile; ?>
</div>

<?php get_footer(); ?>