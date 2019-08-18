<?php get_header(); ?>

<div class="container">
    <?php while( have_posts() ): the_post(); ?>
        <article class="blog-post-preview" itemscope itemtype="http://schema.org/BlogPosting" itemprop="blogPost">
            <?php
                $thumb_image = '';
                if( get_the_post_thumbnail_url() ) :
                    $thumb_image = get_the_post_thumbnail_url( get_the_ID() );
            ?>
                <figure class="blog-post-preview__image">
                    <a itemprop="url" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><img src="<?= $thumb_image ?>"></a>
                </figure>
            <?php endif; ?>
            <div class="blog-post-preview__content">
                <span class="blog-post-preview__meta"><time datetime="<?php the_time( 'F j, Y' ); ?>" itemprop="datePublished"><?php the_time( 'F j, Y' ); ?></time></span>
                <h1 itemprop="name" class="h1 blog-post-preview__title"><a itemprop="url" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>
                <div class="blog-post-preview__excerpt general-content" itemprop="description">
                    <?php the_excerpt(); ?>
                </div>
                <a class="blog-post-preview__link" href="<?php the_permalink(); ?>" itemprop="url">Read More <span aria-hidden="true"><?php include(locate_template('icons/chevron-right.php')); ?></span></a>
            </div>
        </article>
    <?php endwhile; ?>
</div>

<?php get_footer(); ?>