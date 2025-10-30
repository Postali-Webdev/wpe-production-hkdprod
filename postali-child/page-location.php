<?php
/**
 * Location Page
 * Template Name: Location 
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
                        <img src="<?php echo esc_url($banner_img['url']); ?>" alt="<?php the_field('custom_alt_text'); ?>" />
                        <?php } else { ?>
                        <img src="<?php echo esc_url($banner_img['url']); ?>" alt="<?php echo esc_attr($banner_img['alt']); ?>" />
                        <?php } ?>

                    <?php } else { ?>
                        <?php $default_img = get_field('default_interior_header','options'); ?>
                        <img src="<?php echo esc_url($default_img['url']); ?>" alt="<?php echo esc_attr($default_img['alt']); ?>" />
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
                <div class="column-33 block">
                    <?php if (is_tree('17923')) { ?>
                    <p class="top large">Cuéntanos qué pasó</p>
                    <?php echo do_shortcode('[gravityform id="3" title="false"]'); ?>
                    <?php } else { ?>
                    <p class="top large">Tell Us What Happened</p>
                    <?php echo do_shortcode('[gravityform id="5" title="false"]'); ?>
                    <?php } ?>
                </div>
                <div class="column-66 block">
                    <?php the_field('section_1_first_content'); ?>
                    <a href="tel:<?php echo $phone; ?>" class="btn"><?php echo $phone; ?></a>
                    <div class="spacer-60"></div>
                    <div class="accolades">
                        Awards & accolades
                        <?php if( have_rows('awards','options') ): ?>
                        <div id="awards-sm">
                        <?php while( have_rows('awards','options') ): the_row(); ?>  
                        
                            <div class="award-img">
                            <?php 
                            $award = get_sub_field('award_image');
                            if( !empty( $award ) ) { ?>
                                <img src="<?php echo esc_url($award['url']); ?>" alt="<?php echo esc_attr($award['alt']); ?>" />
                            <?php }?>
                            </div>
                        
                        <?php endwhile; ?>
                        </div>
                        <?php endif; ?> 
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="grey">
        <div class="container">
            <div class="columns">
                <div class="column-66 block">
                <?php the_field('section_2_intro'); ?>
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

                    <?php the_field('section_1_second_content'); ?>
                    <?php if(get_field('section_1_add_video')) { ?>
                        <?php if( have_rows('section_1_video') ): ?>
                        <?php while( have_rows('section_1_video') ): the_row(); ?> 
                            <?php get_template_part('blocks/block','video-block'); ?>
                        <?php endwhile; ?>
                        <?php endif; ?>
                    <?php } ?>
                </div>
                <div class="column-33 block">
                    <div class="spacer-30"></div>

                    <?php if( have_rows('neighborhoods') ): ?>
                    <div class="sidebar-block">
                        <h4>Neighborhoods We Serve</h4>
                        <ul>
                        <?php while( have_rows('neighborhoods') ): the_row(); ?> 
                            <?php if (get_sub_field('neighborhood_link')) { ?>
                            <li>
                                <a href="<?php the_sub_field('neighborhood_link'); ?>">        
                                    <?php the_sub_field('neighborhood'); ?>
                                </a>
                            </li>
                            <?php } else { ?>
                            <li><?php the_sub_field('neighborhood'); ?></li>
                            <?php } ?>
                        <?php endwhile; ?>
                        </ul>
                        <a class="more-link" href="#neighborhoods">
                            <span class="icon-down-arrow"></span> more neighborhoods
                        </a>
                    </div>
                    <div class="spacer-30"></div>
                    <?php endif; ?>
                   
                    <?php if( have_rows('cases_we_handle') ): ?>
                    <div class="sidebar-block">
                        <h4>Cases We Handle</h4>
                        <ul>
                        <?php while( have_rows('cases_we_handle') ): the_row(); ?> 
                            <?php if (get_sub_field('practice_area_link')) { ?>
                            <li>
                                <a href="<?php the_sub_field('practice_area_link'); ?>">
                                    <?php the_sub_field('practice_area'); ?>
                                </a>
                            </li>
                            <?php } else { ?>
                            <li><?php the_sub_field('practice_area'); ?></li>
                            <?php } ?>
                        <?php endwhile; ?>
                        </ul>
                    </div>
                    <div class="spacer-30"></div>
                    <?php endif; ?>

                    <?php if( get_field('section_3_sidebar_callout') ): ?>
                    <div class="sidebar-block">
                        <?php the_field('section_3_sidebar_callout'); ?>
                        <a href="tel:<?php echo $phone; ?>" class="btn"><?php echo $phone; ?></a>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

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
