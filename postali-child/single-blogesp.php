<?php
/**
 * Single template - Spanish blog
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
            <div class="spacer-60"></div>
            <div class="columns">
                <div class="column-66">
                    <article>
                        <?php the_content(); ?>
                    </article>				
                </div>
            </div>
        </div>
    </section>

</div>

<?php get_footer(); ?>