<?php
/**
 * Category Child
 * Template Name: Category Child
 * @package Postali Parent
 * @author Postali LLC
 */

$phone = get_field('global_phone_number','options');

get_header(); ?>

<div class="body-container">

    <section id="banner">
        <div class="container">
        <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?> 
            <div class="columns">
                <div class="column-50 block">
                    <h1><?php the_title(); ?></h1>
                    <?php the_field('banner_intro_text'); ?>
                    <?php if(get_field('banner_cta')) { ?>
                        <p class="banner-cta"><?php the_field('banner_cta'); ?></p>
                    <?php } else { ?>
                        <p class="banner-cta"><?php the_field('global_cta_text','options'); ?></p>
                    <?php } ?>
                    <a href="tel:<?php echo $phone; ?>" class="btn"><?php echo $phone; ?></a>
                </div>
                <div class="column-50 photo">
                <?php 
                $banner_img = get_field('banner_header_photo');
                if( !empty( $banner_img ) ) { ?>
                    
                    <?php if (get_field('add_custom_alt_text')) { ?>
                        <img class="category-banner-img" src="<?php echo esc_url($banner_img['url']); ?>" alt="<?php the_field('custom_alt_text'); ?>" />
                        <?php } else { ?>
                        <img class="category-banner-img" src="<?php echo esc_url($banner_img['url']); ?>" alt="<?php echo esc_attr($banner_img['alt']); ?>" />
                    <?php } ?>

                <?php } else { ?>
                    <?php $default_img = get_field('default_interior_header','options'); ?>
                    <img class="category-banner-img" src="<?php echo esc_url($default_img['url']); ?>" alt="<?php echo esc_attr($default_img['alt']); ?>" />
                <?php }?>

                </div>
            </div>
        </div>
    </section>

    <section id="scroll">
        <div class="container">
            <div class="columns">
                <div class="column-full">
                    <div class="scroll"><span class="icon-down-arrow"></span>scroll</div>
                </div>
            </div>
        </div>
    </section>

    <section class="main-upper">
        <div class="container">
            <div class="columns">
                <div class="column-66 block">

                <?php if( have_rows('accident_buttons') ) : 
                $desktop_img = get_field('accident_infographic');
                $mobile_img = get_field('accident_mobile_infographic');?> 
                <div class="accident-graphic-container">
                    <img src="<?php esc_html_e($desktop_img['url']);?>" alt="<?php esc_html_e($desktop_img['alt']);?>" class="desktop-infographic">
                    <img src="<?php esc_html_e($mobile_img['url']);?>" alt="<?php esc_html_e($mobile_img['alt']);?>" class="mobile-infographic">
                <div class="link-container">
                    <?php while( have_rows('accident_buttons') ) : the_row(); 
                    $btn_title = get_sub_field('accident_button_title');
                    $btn_link = strtolower(str_replace(" ", "-", $btn_title));?>
                        <a href="#<?php esc_html_e($btn_link); ?>" class="btn nav-btn" id="nav-<?php esc_html_e($btn_link); ?>"><?php esc_html_e($btn_title); ?></a>
                    <?php endwhile; ?>
                </div>
                </div>
            <?php endif; ?>

                    <?php the_field('main_content_upper'); ?>
                </div>
                <div class="column-33 block">
                    <?php if (is_tree('17923')) { ?>
                    <p class="top large">Cuéntanos qué pasó</p>
                    <?php echo do_shortcode('[gravityform id="3" title="false"]'); ?>
                    <?php } else { ?>
                    <p class="top large">Tell Us What Happened</p>
                    <?php echo do_shortcode('[gravityform id="5" title="false"]'); ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>

    <?php $n = 1; ?>
    <?php if( have_rows('main_content_lower') ): ?>
    <?php while( have_rows('main_content_lower') ): the_row(); ?>  
    <section class="main-lower" id="panel_<?php echo $n; ?>">
        <div class="container">
            <div class="columns">
                <div class="column-66 block">
                    <?php the_sub_field('content_block'); ?>
                </div>
            </div>
        </div>
    </section>

    <?php if(get_sub_field('add_video')) { ?>
    <section class="video">
        <div class="container">
            <div class="columns">
                <div class="column-66 block">
                    <p class="accent"><?php the_sub_field('video_title'); ?></p>
                    <div class="video-box">
                        <div class="video-embed">
                            <iframe class="responsive-video" width="560" height="315" src="https://www.youtube.com/embed/<?php the_sub_field('video_id'); ?>?rel=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                        </div>
                        <?php if( have_rows('video_highlights') ): ?>
                        <div class="video-highlights">
                            <p class="spaced caps bottom-15"><strong>Video Highlights</strong></p>
                            <ul>
                            <?php while( have_rows('video_highlights') ): the_row(); ?>  
                                <li><?php the_sub_field('highlight'); ?></li>
                            <?php endwhile; ?>
                            </ul>
                            </p>
                        </div>
                        <?php endif; ?>
                    </div>

                    <?php if(get_sub_field('transcript_intro')) { ?>
                    <div class="spacer-30"></div>
                    <p class="large spaced caps bottom-15"><strong>Video Transcript</strong></p>
                    <div class="content-box">
                        <p><?php the_sub_field('transcript_intro'); ?><span class="ellipsis visible"> ...</span>
                        <span class="extra closed"><?php the_sub_field('transcript_remainder'); ?></p>
                        <div class="transcript-more"><div class="plus">+</div> <p class="small spaced caps">Read Full Video Transcript</p></div>
                    </div>
                    <?php } ?>

                </div>
            </div>
        </div>
    </section>
    <?php $n++; ?>
    <?php } ?>
    <?php endwhile; ?>
    <?php endif; ?>

    <?php get_template_part('blocks/block','testimonials'); ?>

    <?php get_template_part('blocks/block','case-results'); ?>

    <?php get_template_part('blocks/block','prefooter'); ?>

</div><!-- #content -->

<?php get_footer();
