<?php
/**
 * About Page
 * Template Name: About
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
                    <h1><?php the_title(); ?></h1>
                    <p><strong><?php the_field('banner_intro_copy'); ?></strong></p>
                    <?php if(get_field('banner_cta_text')) { ?>
                        <p class="banner-cta"><?php the_field('banner_cta_text'); ?></p>
                    <?php } else { ?>
                        <p class="banner-cta"><?php the_field('global_cta_text','options'); ?></p>
                    <?php } ?>
                    <a href="tel:<?php echo $phone; ?>" class="btn"><?php echo $phone; ?></a>
                </div>
                <div class="column-50 photo">
                <?php 
                $banner_img = get_field('banner_photo');
                if( !empty( $banner_img ) ) { ?>
                    <img src="<?php echo esc_url($banner_img['url']); ?>" alt="<?php echo esc_attr($banner_img['alt']); ?>" />
                <?php }?>

                </div>
            </div>
        </div>
    </section>

    <section class="grey" id="panel2">
        <div class="container skinny">
            <div class="columns">
                <div class="column-75">
                    <?php the_field('panel2_intro_content'); ?>
                    <div class="logo-block">
                        <div class="logo">
                        <?php 
                        $logo = get_field('panel2_logo');
                        if( !empty( $logo ) ) { ?>
                            <img src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr($logo['alt']); ?>" />
                        <?php }?>
                        </div>
                        <div class="highlight">
                            <p class="large blue"><strong><em><?php the_field('pane2_logo_highlight_text'); ?></em></strong></p>
                        </div>
                    </div>
                </div>
                <div class="column-25">
                    <div class="jump-link">
                        <span class="icon-down-arrow"></span>
                        <p class="top large">Meet Our Attorneys </p>
                        <a href="#attorneys">JUMP TO SECTION</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="spacer-30"></div>

    <section class="video grey">
        <div class="container skinny">
            <div class="columns">
                <div class="column-75 block">
                    <p class="accent"><?php the_sub_field('panel2_video_title'); ?></p>
                    <div class="video-box">
                        <div class="video-embed">
                            <iframe class="responsive-video" width="560" height="315" src="https://www.youtube.com/embed/pVJfwi7OzeM?si=<?php the_sub_field('panel2_video_id'); ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                        </div>
                        <?php if( have_rows('panel2_video_highlights') ): ?>
                        <div class="video-highlights">
                            <p class="spaced caps bottom-15"><strong>Video Highlights</strong></p>
                            <ul>
                            <?php while( have_rows('panel2_video_highlights') ): the_row(); ?>  
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

    <section id="attorneys">
        <div class="container">
            <div class="columns">
                <h2><?php the_field('panel3_headline'); ?></h2>
                <div class="spacer-30"></div>
                <?php if( have_rows('attorneys') ): ?>
                <?php while( have_rows('attorneys') ): the_row(); ?>
                    <?php $post_object = get_sub_field('attorney'); ?>
                    <?php if( $post_object ): ?>
                        <?php // override $post
                        $post = $post_object;
                        setup_postdata( $post );
                        ?>
                        <a href="<?php the_permalink(); ?>" class="column-25">
                            <div class="attorney-img">
                            <?php 
                            $headshot = get_field('headshot');
                            if( !empty( $headshot ) ) { ?>
                                <img src="<?php echo esc_url($headshot['url']); ?>" alt="<?php echo esc_attr($headshot['alt']); ?>" />
                            <?php }?>
                            </div>
                            <div class="attorney-details">
                                <p class="large blue"><strong><?php the_title(); ?></strong></p>
                                <p><em><?php the_field('title'); ?></em></p>
                            </div>
                            <div class="attorney-link">
                            <?php 
                                $first_name = get_the_title();
                                global $post;
                                $post_slug = $post->post_name;
                            ?>
                                <p>Read <?php echo strtok($first_name, " "); ?>'s Bio <span class="icon-right-arrow"></span></p>
                            </div>
                        </a>
                        <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
                    <?php endif; ?>
                <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <?php get_template_part('blocks/block','testimonials'); ?>

    <section id="results-block">
        <div class="container">
            <div class="columns top">
                <div class="column-50">
                    <h2><?php the_field('results_headline'); ?></h2>
                </div>
                <div class="column-50">
                    <p><?php the_field('results_copy'); ?></p>
                </div>
            </div>
            <div class="spacer-60"></div>
            <h3><?php the_field('results_block_headline'); ?></h3>
            <div class="spacer-30"></div>
            <div class="columns">
            <?php if( have_rows('results') ): ?>
            <?php while( have_rows('results') ): the_row(); ?>
                <?php $post_object = get_sub_field('result'); ?>
                <?php if( $post_object ): ?>
                    <?php // override $post
                    $post = $post_object;
                    setup_postdata( $post );
                    ?>
                    <a class="column-25 result" href="<?php the_permalink(); ?>">
                        <?php $amount = get_field('result_amount'); ?>
                        <div class="result-amount">$<?php echo number_format($amount); ?></div>
                        <?php 
                        $post_categories = get_the_category();
                        $post_category = $post_categories[0]->cat_name;
                        ?>
                        <div class="result-category">
                            <?php echo $post_category; ?>
                        </div>
                    </a>
                    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
                <?php endif; ?>
            <?php endwhile; ?>
            <?php endif; ?>
            </div>
            <div class="spacer-60"></div>
            <a href="/case-results/" class="btn">View all <?php if (!empty($new_name)) { echo $new_name; } ?> case results</a>
        </div>
    </section>

    <section id="panel6">
        <div class="container">
            <div class="columns">
                <div class="column-75 block">
                    <?php the_field('panel6_copy'); ?>
                </div>
            </div>
        </div>
    </section>

    <?php get_template_part('blocks/block','awards'); ?>

    <?php get_template_part('blocks/block','prefooter'); ?>

</div><!-- #content -->

<?php get_footer();
