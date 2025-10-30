<?php
/**
 * Search results template.
 *
 * @package Postali Parent
 * @author Postali LLC
 */

 $phone = get_field('global_phone_number','options');

 get_header(); ?>
 
 <div class="body-container">

    <section>
        <div class="container">
            <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?> 
            <h1 class="post-title"><?php printf( esc_html__( 'Search results for "%s"', 'postali' ), get_search_query() ); ?></h1>
            <div class="columns">
                <div class="column-full block">
                <?php if ( have_posts() ) : ?>
                    <?php while ( have_posts() ) : the_post(); ?>
                        <h2><span>•</span> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        <?php $excerpt = get_the_excerpt();
                        if (!empty($excerpt)) { ?>
                        <?php the_excerpt(); ?>

                        <?php } elseif(empty($excerpt)) { ?>

                        <?php // get excerpt from category parent
                        $excerpt_cat = get_field('section_1_first_content'); ?>
                        <?php if(!(empty($excerpt_cat))) { ?>
                            <p><?php echo wp_trim_words( $excerpt_cat , '44' ); ?></p>

                        <?php // get excerpt from category child
                        } elseif(empty($excerpt_cat)) { 
                        $excerpt_cat_child = get_field('main_content_upper'); ?>
                        <?php if(!(empty($excerpt_cat_child))) { ?>
                            <p><?php echo wp_trim_words( $excerpt_cat_child , '44' ); ?></p>

                        <?php } ?>
                        <?php } ?>
                        <?php } ?>
                    <?php endwhile; ?>
                    <?php the_posts_pagination(); ?>
                <?php else : ?>
                    <p><?php printf( esc_html__( 'Our apologies but there\'s nothing that matches your search for "%s"', 'postali' ), get_search_query() ); ?></p>
                <?php endif; ?>
                </div>
            </div>
        </div><!-- #content -->
    </section>

</div>

<?php get_footer();
