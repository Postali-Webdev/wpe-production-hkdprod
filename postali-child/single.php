<?php
/**
 * Single template
 *
 * @package Postali Parent
 * @author Postali LLC
 */

$blogDefault = get_field('default_blog_image', 'options');

get_header();?>

<div class="body-container">

    <section id="banner">
        <div class="container">
        <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?> 
            <div class="columns">
                <div class="column-50">
                    <p class="large"><span><?php the_date(); ?></span> | By <?php echo get_the_author(); ?></p>
                    <h1><?php the_title(); ?></h1>
                    <p class="large"><span>Categories:</span><br>
                    <?php the_category( ', ' ); ?></p>
                </div>
                <div class="column-50">
                <?php if ( has_post_thumbnail() ) { ?> <!-- If featured image set, use that, if not use options page default -->
                <?php $featImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>

                    <?php if (get_field('add_custom_alt_text')) { ?>
                        <?php if(get_field('custom_alt_text')) { ?>
                        <img src="<?php echo $featImg[0]; ?>" class="article-featured-image" alt="<?php the_field('custom_alt_text'); ?>" />
                        <?php } else { ?>
                        <img src="<?php echo $featImg[0]; ?>" class="article-featured-image" alt="<?php the_title(); ?>" />
                        <?php } ?>
                    <?php } else { ?>
                        <img src="<?php echo $featImg[0]; ?>" class="article-featured-image" alt="<?php echo get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true ); ?>" />
                    <?php } ?>
                <?php } else { ?>

                    <?php if (get_field('add_custom_alt_text')) { ?>
                        <?php if(get_field('custom_alt_text')) { ?>
                        <img src="<?php echo $blogDefault['url']; ?>" id="article-featured-image-default" class="article-featured-image" alt="<?php the_field('custom_alt_text'); ?>">
                        <?php } else { ?>
                        <img src="<?php echo $blogDefault['url']; ?>" id="article-featured-image-default" class="article-featured-image" alt="<?php the_title(); ?>">
                        <?php } ?>
                    <?php } else { ?>
                        <img src="<?php echo $blogDefault['url']; ?>" id="article-featured-image-default" class="article-featured-image" alt="<?php echo esc_attr($blogDefault['alt']); ?>">
                    <?php } ?>

                <?php } ?>
                </div>
            </div>
        </div>
    </section>
    
    <section>
        <div class="container">
            <div class="columns">
                <div class="column-66">
                    <article>
                        <?php the_content(); ?>
                    </article>				
                </div>
                <div class="column-33">
                    <!-- Related Posts Block --> 
                    <?php $categories = get_the_category();
                    $category_id = $categories[0]->cat_ID; ?>

                    <?php $args = array( 
                        'posts_per_page' => 5, 
                        'category' => $category_id,
                        'post__not_in' => array( $post->ID )
                    );

                    $relatedposts = get_posts( $args );
                    $count = count($relatedposts); 
                    ?>

                    <?php if ($count >= 1) { ?>

                    <h3>Related Blog Posts</h3>
                    <ul class="related-posts">
                    <?php                 
                    $relatedposts = get_posts( $args );
                    foreach ( $relatedposts as $post ) : setup_postdata( $post ); 
                    foreach (get_the_category() as $cat) { $category = $cat->name; }?>
                        <li><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title_attribute(); ?></a></li>
                    <?php endforeach; 
                    wp_reset_postdata();?>
                    </ul>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>

    <section class="blog-share">
        <div class="container">
            <div class="columns">
                <div class="column-25">
                    <div class="share-container">
                        <p><strong>Share this blog on:</strong></p>
                        <div class="social-container">
                            <a class="social-icon icon-footer-facebook-icon" title="view our facebook" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php esc_html_e( get_the_permalink() ); ?>"></a>
                            <a class="social-icon icon-footer-twitter-icon" title="view our twitter" target="_blank" href="http://www.twitter.com/share?url=<?php esc_html_e( get_the_permalink() ); ?>"></a>
                        </div>
                    </div>
                </div>
                <div class="column-75 block">
                    <p><strong>More Reading You Might Be Interested In:</strong></p>
                    
                    <ul class="more-reading">
                    <?php $categories = get_the_category();
                    $category_id = $categories[0]->cat_ID; ;

                    $args = array(
                        'post_type' => 'page', 
                        'posts_per_page' => 6, 
                        'category' => $category_id,
                        'post__not_in' => array( $post->ID )
                    );

                    $relatedposts = get_posts( $args );
                    foreach ( $relatedposts as $post ) : setup_postdata( $post ); 
                    foreach (get_the_category() as $cat) { $category = $cat->name; }
                    ?>
                        <li><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a><span class="comma">, </span></li>
                    <?php endforeach; 
                    wp_reset_postdata();
                    ?>
                    </ul>

                </div>
            </div>
        </div>
    </section>

    <?php get_template_part('blocks/block','prefooter'); ?>

</div>

<?php get_footer(); ?>