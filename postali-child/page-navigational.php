<?php
/**
 * Navigational Page
 * Template Name: Navigational
 * @package Postali Parent
 * @author Postali LLC
 */

$phone = get_field('global_phone_number','options');

get_header(); ?>

<div class="body-container">

    <section id="banner">
        <div class="container">
            <div class="columns">
                <div class="column-50 block">
                <div class="spacer-30"></div>
                    <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?> 
                    <h1><?php the_title(); ?></h1>
                    <p><strong><?php the_field('banner_copy'); ?></strong></p>
                    <p class="banner-cta">Free Case Review</p>
                    <a href="tel:<?php echo $phone; ?>" class="btn"><?php echo $phone; ?></a>
                </div>
                <div class="column-50 photo">
                    <?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail' ); ?>
                    <img src="<?php echo $url ?>" />
                </div>
            </div>
        </div>
    </section>

    <section id="navigational" class="grey">
        <div class="container">
            <div class="columns">
            <?php if( have_rows('practice_areas') ): ?>
            <?php while( have_rows('practice_areas') ): the_row(); ?>  
                <div class="column-66 block">
                    <h2><?php the_sub_field('section_title'); ?></h2>
                    <?php if(get_sub_field('section_copy')) { ?>
                        <?php the_sub_field('section_copy'); ?>
                    <?php } ?>
                </div>
                <div class="spacer-break"></div>
                <?php if( have_rows('practice_areas_section') ): ?>
                <p class="caps spaced">Page Topics</p>
                <div class="spacer-break"></div>
                <?php while( have_rows('practice_areas_section') ): the_row(); ?>  
                    <a class="column-33 navigational" href="<?php the_sub_field('page_link'); ?>">
                        <?php the_sub_field('practice_area_name'); ?>
                    </a>
                <?php endwhile; ?>
                <?php endif; ?>
                
                <?php if( have_rows('practice_areas_resources') ): ?>
                <div class="spacer-30"></div>
                <div class="column-66 block">
                <p class="caps spaced">Resources & Blogs</p>
                <ul class="navigational-resources">
                <?php while( have_rows('practice_areas_resources') ): the_row(); ?>  
                <?php 
                    $link = get_sub_field('practice_area_resource');
                    if( $link ): 
                        $link_url = $link['url'];
                        $link_title = $link['title'];
                        $link_target = $link['target'] ? $link['target'] : '_self';
                        ?>
                        <li><a class="button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a></li>
                    <?php endif; ?>
                <?php endwhile; ?>
                </ul>
                </div>
                <?php endif; ?>
            <div class="spacer-30"></div>
            <?php endwhile; ?>
            <?php endif; ?>
            </div>
        </div>
    </section>

    <?php get_template_part('blocks/block','prefooter'); ?>

</div><!-- #content -->

<?php get_footer();
