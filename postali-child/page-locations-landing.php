<?php
/**
 * Areas We Serve
 * Template Name: Locations Landing
 * @package Postali Parent
 * @author Postali LLC
 */

$phone = get_field('global_phone_number','options');

get_header(); ?>

<div class="body-container">

    <section id="banner">
        <div class="container">
            <div class="columns">
                <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?> 
                <div class="spacer-30"></div>
                <div class="column-50 block">
                    <h1><?php the_title(); ?></h1>
                    <?php the_field('banner_intro_copy'); ?>
                    <?php if(get_field('banner_cta_text')) { ?>
                        <p class="banner-cta"><?php the_field('banner_cta_text'); ?></p>
                    <?php } else { ?>
                        <p class="banner-cta"><?php the_field('global_cta_text','options'); ?></p>
                    <?php } ?>
                    <a href="tel:<?php echo $phone; ?>" class="btn"><?php echo $phone; ?></a>
                </div>
                <div class="column-50">
                <?php 
                $image = get_field('banner_image');
                if( !empty( $image ) ): ?>
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <section id="locations">
        <div class="container">
            <div class="columns">
                
            <?php if( have_rows('locations') ): ?>
            <?php while( have_rows('locations') ): the_row(); ?>  
                
                <div class="locations-block">
                    <a href="<?php the_sub_field('location_button_link'); ?>"><img src="<?php the_sub_field('location_image'); ?>" alt="<?php the_sub_field('location_name'); ?>" /></a>
                    <a href="<?php the_sub_field('location_button_link'); ?>"><h2><?php the_sub_field('location_name'); ?></h2></a>
                    <p><?php the_sub_field('location_copy'); ?></p>
                    <div class="btn-block">
                        <a href="<?php the_sub_field('location_button_link'); ?>" class="btn"><?php the_sub_field('location_button_text'); ?></a>
                    </div>
                </div>
                
            <?php endwhile; ?>
            <?php endif; ?> 
            
            <div class="spacer-90"></div>

            <div class="column-full centered areas" style="background-image:url('<?php the_field('background'); ?>');">
                <div>
                    <h2><?php the_field('headline'); ?></h2>
                    <p><?php the_field('copy'); ?></p>
                </div>
            </div>

            </div>
        </div>
    </section>

    <?php get_template_part('blocks/block','prefooter'); ?>

</div><!-- #content -->

<?php get_footer();
