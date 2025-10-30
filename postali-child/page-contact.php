<?php
/**
 * Contact Page
 * Template Name: Contact
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
                <div class="spacer-break"></div>
                <div class="column-50 block">                    
                    <h1><?php the_field('page_title'); ?></h1>
                    <h2><?php the_field('banner_subtitle'); ?></h2>
                    <p><strong><?php the_field('banner_copy'); ?></strong></p>
                    <div class="spacer-30"></div>
                    <div class="phone-address">
                        <div class="phone">
                            <a href="tel:<?php echo $phone; ?>" class="btn"><?php echo $phone; ?></a>
                        </div>
                        <div class="address">
                            <p>
                                <strong>OFFICE ADDRESS</strong><br>
                                <em>Hecht, Kleeger & Damashek, Personal Injury Lawyers</em><br>
                                <a target="_blank" href="<?php the_field('driving_directions', 'options'); ?>">
                                    <?php the_field('global_address','options'); ?>
                                </a>
                            </p>
                        </div>
                    </div>
                    
                </div>
                <div class="column-50 map">
                    <iframe src="<?php the_field('map_embed','options'); ?>" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </section>

    <section id="contact-form-block">
        <div class="container">
            <div class="columns">
                <div class="column-50 photo">
                <?php 
                $image = get_field('contact_page_photo');
                if( !empty( $image ) ): ?>
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                <?php endif; ?>
                </div>
                <div class="column-50"> 
                    <?php if (is_tree('17923')) { ?>
                    <p class="xlarge"><strong>Cuéntanos qué pasó</strong></p>
                    <?php echo do_shortcode('[gravityform id="3" title="false" description="false"]'); ?>
                    <?php } else { ?>
                    <p class="xlarge"><strong>Tell Us What Happened</strong></p>
                    <?php echo do_shortcode('[gravityform id="2" title="false" description="false"]'); ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>

</div><!-- #content -->

<?php get_footer();
