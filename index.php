<?php get_header(); ?>

<?php while( have_posts() ): the_post(); ?>
    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
    <?php the_time( 'F j, Y' ); ?>
    <a class="button" href="<?php the_permalink(); ?>">Read This</a>
<?php endwhile; ?>

<?php get_footer(); ?>