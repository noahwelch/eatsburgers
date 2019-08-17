<?php get_header(); ?>

<div class="container">
    <?php while( have_posts() ): the_post(); ?>
        <h1><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>
        <?php the_time( 'F j, Y' ); ?>
        <a class="button" href="<?php the_permalink(); ?>">Read This</a>
    <?php endwhile; ?>
</div>

<?php get_footer(); ?>