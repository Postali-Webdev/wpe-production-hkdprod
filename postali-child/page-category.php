<?php
/**
 * Category
 * Template Name: Category 
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
                <div class="column-33 photo">
                    <?php 
                    $banner_img = get_field('banner_header_photo');
                    if( !empty( $banner_img ) ) { ?>

                        <?php if (get_field('add_custom_alt_text')) { ?>
                            <?php if(get_field('custom_alt_text')) { ?>
                                <?php echo wp_get_attachment_image( $banner_img['ID'], 'full', false, array( 'alt' => get_field('custom_alt_text'), 'class' => 'banner-img' ) ); ?>
                            <?php } else { ?>
                                <?php echo wp_get_attachment_image( $banner_img['ID'], 'full', false, array( 'alt' => get_the_title(), 'class' => 'banner-img' ) ); ?>
                            <?php } ?>
                        <?php } else { ?>
                            <?php echo wp_get_attachment_image( $banner_img['ID'], 'full', false, array( 'class' => 'banner-img' ) ); ?>
                        <?php } ?>
                        
                    <?php } else { ?>
                        <?php $default_img = get_field('default_interior_header','options'); ?>
                        <?php echo wp_get_attachment_image( $default_img['ID'], 'full', false, array( 'class' => 'banner-img' ) ); ?>
                    <?php }?>

                </div>
                <div class="column-66 block">
                    <h1><?php the_title(); ?></h1>
                    <?php the_field('banner_intro'); ?>
                    <?php if(get_field('banner_cta_text')) { ?>
                        <p class="banner-cta"><?php the_field('banner_cta_text'); ?></p>
                    <?php } else { ?>
                        <p class="banner-cta"><?php the_field('global_cta_text','options'); ?></p>
                    <?php } ?>
                    <a href="tel:<?php echo $phone; ?>" class="btn"><?php echo $phone; ?></a>
                </div>
            </div>
        </div>
    </section>

    <div class="cta-banner">
        <?php if (is_tree('17923')) { ?>
        <p>Evaluaciones de casos gratuitas | Costo inicial cero | ¡Más de $825 millones ganados! | Aquí para escuchar, listos para luchar.</p>
        <?php } else { ?>
        <p>Free Case Evaluations | Zero Cost Upfront | Over $825 Million Won! | Here to Listen, Ready to Fight.</p>
        <?php } ?>
    </div>

    <section id="first" class="grey">
        <div class="container">
            <div class="columns">
                <div class="column-66 block">
                    <div class="badge-intro">
                        <div class="badge">
                            <img src="/wp-content/uploads/2024/08/hkd-825m-badge.png" alt="Over $825 Million Won">
                        </div>
                        <div class="intro">
                            <?php the_field('section_1_first_content'); ?>
                        </div>
                    </div>
                    
                    <?php the_field('section_1_second_content'); ?>

                    <?php if( have_rows('on_page_links') ): ?>
                    <?php if (is_tree('17923')) { ?>
                    <p class="on-page"><strong>En esta página</strong></p>
                    <?php } else { ?>
                    <p class="on-page"><strong>On This Page</strong></p>
                    <?php } ?>
                    <ul class="on-page">
                    <?php while( have_rows('on_page_links') ): the_row(); ?> 
                        <li><a href="#<?php the_sub_field('on_this_page_anchor'); ?>"><?php the_sub_field('on_this_page_title'); ?></a>
                    <?php endwhile; ?>
                    </ul>
                    <?php endif; ?>

                    <?php the_field('section_1_third_content'); ?>
                    

                </div>
                <div class="column-33 block">
                    <?php if (is_tree('17923')) { ?>
                    <p class="top large">Cuéntanos qué pasó</p>
                    <?php echo do_shortcode('[gravityform id="3" title="false"]'); ?>
                    <?php } else { ?>
                    <p class="top large">Tell Us What Happened</p>
                    <?php echo do_shortcode('[gravityform id="5" title="false"]'); ?>
                    <?php } ?>
                    
                    <div class="spacer-30"></div>

                    <?php
                    $add_custom_sidebar_menu = get_field('sidebar_custom');

                    if( $add_custom_sidebar_menu ) {

                        if( have_rows('sidebar_custom_links') ) : ?>
                        <div class="sidebar-menu">
                            <p class="top large"><?php the_field('sidebar_menu_title'); ?></p>
                            <ul>
                            <?php while( have_rows('sidebar_custom_links') ): the_row(); 
                                $link = get_sub_field('link'); ?>
                                <li class="page_item"><a href="<?php echo $link['url']; ?>"><?php echo $link['title']; ?></a></li>
                            <?php endwhile; ?>

                            </ul>
                        </div>
                        <?php endif;

                    } else {
                    
                        $child_page_args = array(
                            'post_parent' => $post->ID,
                            'post_type' => 'page',
                            'post_status' => 'publish',
                            'orderby' => 'menu_order',
                            'order' => 'ASC',
                            'posts_per_page' => -1
                        );
                        $child_page_query = new WP_Query( $child_page_args );

                        $default_pi_args = array(
                            'post_type' => 'page',
                            'post_status' => 'publish',
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'category',
                                    'field' => 'id',
                                    'terms' => array(2),
                                    'include_children' => false
                                )
                            ),
                            'orderby' => 'menu_order',
                            'order' => 'ASC',
                            'posts_per_page' => 5
                        );
                        $default_pi_query = new WP_Query( $default_pi_args );

                        if ( $child_page_query->have_posts() ) : ?>
                        
                            <div class="sidebar-menu">
                                <p class="top large"><?php the_field('sidebar_menu_title'); ?></p>
                                <ul>
                                <?php while ( $child_page_query->have_posts() ) : $child_page_query->the_post(); 
                                    $title = get_field('sidebar_short_title') ? get_field('sidebar_short_title') : get_the_title(); ?>
                                    <li class="page_item"><a href="<?php echo get_the_permalink( $post->ID ); ?>"><?php echo $title ?></a></li>
                                <?php endwhile; ?>
                                </ul>
                            </div>
                        <?php else : ?> 
                            <div class="sidebar-menu">
                                <p class="top large">General Resources</p>
                                <ul>
                                <?php while( $default_pi_query->have_posts() ) : $default_pi_query->the_post(); ?>
                                    <?php $title = get_field('sidebar_short_title') ? get_field('sidebar_short_title') : get_the_title(); ?>
                                    <li class="page_item"><a href="<?php echo get_the_permalink( $post->ID ); ?>"><?php echo $title ?></a></li>
                                <?php endwhile; ?> 
                                </ul>
                            </div>
                        <?php endif;  wp_reset_postdata();
                    } ?>

                </div>
            </div>
        </div>
    </section>

    <?php get_template_part('blocks/block','case-results'); ?>

    <?php if(get_field('section_1_add_video')) { ?>
    <section class="grey">
        <div class="container">
            <div class="columns">
                <div class="column-75">
                <?php if( have_rows('section_1_video') ): ?>
                <?php while( have_rows('section_1_video') ): the_row(); ?> 
                    <?php get_template_part('blocks/block','video-block'); ?>
                <?php endwhile; ?>
                <?php endif; ?>
                </div>
            </div>
        </div>
    </section>             
    <?php } ?>
    

    <section id="second">
        <div class="container">
            <div class="columns">
                <div class="column-75 block">
                    <?php the_field('section_2_content'); ?>
                    <?php if(get_field('section_2_add_video')) { ?>
                        <?php if( have_rows('section_2_video') ): ?>
                        <?php while( have_rows('section_2_video') ): the_row(); ?> 
                            <?php get_template_part('blocks/block','video-block'); ?>
                        <?php endwhile; ?>
                        <?php endif; ?>
                    <?php } ?>
                </div>
                <div class="column-25 block">
                    <?php if(get_field('section_2_jump_link')) { ?>
                    <div class="jump-link">
                        <span class="icon-down-arrow"></span>
                        <p class="top large"><?php the_field('section_2_jump_link'); ?></p>
                        <a href="#third">JUMP TO SECTION</a>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>

    <?php get_template_part('blocks/block','testimonials'); ?>

    <?php if(get_field('section_3_content')) { ?>
    <section id="third">
        <div class="container">
            <div class="columns">
                <div class="column-75 block">
                    <?php the_field('section_3_content'); ?>
                    <?php if(get_field('section_3_add_video')) { ?>
                        <?php if( have_rows('section_3_video') ): ?>
                        <?php while( have_rows('section_3_video') ): the_row(); ?> 
                            <?php get_template_part('blocks/block','video-block'); ?>
                        <?php endwhile; ?>
                        <?php endif; ?>
                    <?php } ?>
                </div>
                <div class="column-25 block">
                    <?php if(get_field('section_3_jump_link')) { ?>
                    <div class="jump-link">
                        <span class="icon-down-arrow"></span>
                        <p class="top large"><?php the_field('section_3_jump_link'); ?></p>
                        <a href="#fourth">JUMP TO SECTION</a>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
    <?php } ?>

    <?php if(get_field('section_4_content')) { ?>
    <section id="fourth">
        <div class="container">
            <div class="columns">
                <div class="column-75 block">
                    <?php the_field('section_4_content'); ?>
                    <?php if(get_field('section_4_add_video')) { ?>
                        <?php if( have_rows('section_4_video') ): ?>
                        <?php while( have_rows('section_4_video') ): the_row(); ?> 
                            <?php get_template_part('blocks/block','video-block'); ?>
                        <?php endwhile; ?>
                        <?php endif; ?>
                    <?php } ?>
                </div>
                <div class="column-25 block">

                </div>
            </div>
        </div>
    </section>
    <?php } ?>

    <?php get_template_part('blocks/block','prefooter'); ?>

</div><!-- #content -->

<?php get_footer();
