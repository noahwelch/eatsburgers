<div class="container" data-component="inview">
    <div class="general-content general-content--full-page" data-element="inview-item">
        <?php while( have_posts() ): the_post(); ?>
            <h1 class="h1"><?php the_title(); ?></h1>
            <?php the_content(); ?>
        <?php endwhile; ?>
    </div>
</div>