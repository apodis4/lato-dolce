<?php get_header(); ?>

<div class="content">

    <?php if ( have_posts() ) : ?>

        <?php while ( have_posts() ) : the_post(); ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                
                <h1 class="content__title"><?php the_title(); ?></h1>

                <p>
                    <i class="fa fa-clock-o"></i> <?php the_time( 'j M , Y' ); ?> 
                    <i class="fa fa-humb-tack"></i><?php the_category( ',' ); ?>
                </p>
                
                <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail( 'latodolce-single', array('class' => 'img-res', 'alt' => get_the_title())); ?>
                </a>
                
                <?php the_content(); ?>

                <?php $post_tags = wp_get_post_tags( $post -> ID );
                    if(!empty($post_tags)) {?>
                        <p class="tag"><small><strong><?php esc_html_e( 'Tags: ', 'latodolce' ); ?></strong></small><br><?php the_tags( '', ' ', '' ) ?></p>
                <?php } ?>        
                
                <div class="comments">
                    <?php comments_template(); ?>
                </div>

            </article>

        <?php endwhile; ?>

        <?php // Pagination
            global $wp_query;
            $big = 999999999;
            echo paginate_links( array(
                'base' => str_replace( $big, '%#%', esc_url( get_page_link( $big ))),
                'format' => '?paged=%#%',
                'current' => max(1, get_query_var( 'paged' )),
                'total' => $wp_query->max_num_pages
            ));
        ?>
        
    <?php else: ?>

        <h3><?php esc_html_e( 'No posts match the searched criteri....', 'latodolce' ); ?></h3>

    <?php endif; ?>

</div>

<aside class="sidebar">

    <?php get_sidebar(); ?>
    
</aside>

<?php get_footer(); ?>