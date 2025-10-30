<?php
/**
 * Practice Area Landing Page 
 * Template Name: Landing Page
 * @package Postali Parent
 * @author Postali LLC
 */
$telephone = get_field('telephone', 'options');
get_header(); ?>
<?php 
    if ( has_post_thumbnail( $post->ID ) ) :
        $imageInfo = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
        $imageUrl = $imageInfo[0];
    else:
        $imageUrl = get_theme_file_uri() . '/img/courthouse-header-img.jpg';
    endif;
?>
<div id="landing-page">
    <section id="landing-page_banner" style="background-image:url('<?php echo $imageUrl; ?>');">
        <div id="banner-overlay">
            <div class="column-50-50">
                <div class="column1">
                    <h1 class="small-h1"><?php the_title(); ?></h1>
                    <h2 class="large-h2"><?php the_field('landing_title'); ?></h2>

                    <div class="landing-intro">
                        <span><?php the_field('landing_intro'); ?></span>
                        <span class="landing-cta"><?php the_field('landing_cta'); ?></span>
                    </div>
                    <a class="banner-cta" href="tel:<?php echo $telephone; ?>" title="call now">
                        <span class="icon-phone">&nbsp;</span>
                        <div class="cta-holder">
                        <p class="bold"> <span class="phone-number"><?php echo $telephone; ?></span></p>
                        </div>
                    </a>
                    <span class="btn-disclaimer">No fee unless we win – free case review</span>
                </div>
                <div class="column2">
                    <div class="contact-form-holder"><?php echo do_shortcode('[gravityform id="2" title="false" description="false" ajax="true"]'); ?></div>      
                </div>
            </div>
            <div class="learn-more">
                <div id="learn-more">&nbsp;</div>
                <a href="#learn-more" title="Learn More">Learn More</a>
            </div>
        </div>
    </section>

    <div id="back-to-top"><a data-scroll href="#header-top" title="back to top"><span class="icon-page-up-icon"></span></a><a class="icon-phone mobile-phone-btn" href="tel:<?php echo $telephone;?>"></a></div>
    <section id="landing-page_body-first">
        <div class="container column-33-66">
            <div class="column1">
            <?php if( have_rows('on_page') ):
                // loop through the rows of data
                while ( have_rows('on_page') ) : the_row(); ?>
                    <a class="page-btn" data-scroll href="#<?php the_sub_field('on_this_page_anchor'); ?>" title="<?php the_sub_field('on_this_page_title'); ?>"><?php the_sub_field('on_this_page_title'); ?></a>
                <?php endwhile;

            else :

                // no rows found

            endif; ?>
                <a class="btn" href="/contact/" title="contact us">Contact an Attorney</a>
            </div>
            <div class="column2">
                <?php the_field('first_content'); ?>
            </div>
        </div>
    </section>
    <?php $centered_content = get_field('first_content_centered');
    if ( !empty($centered_content) ) : ?>
        <section id="landing-page_body-first_centered">
            <div class="container">
                <div class="column">
                    <?php echo $centered_content; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>
    <?php get_template_part('block', 'awards');?>
    </section>
    <section id="landing-page_body-second">
    <div class="container column-66-33">
            <div class="column1">
                <?php the_field('second_content'); ?>
            </div>
            <div class="column2">
                <h4>Hear it from our clients:</h4>
                <?php get_template_part('block', 'google-schema');?>
            </div>
        </div>
    </section>
    <section id="landing-page_results">
        <p class="big-text centered">Some of our results include:</p>
        <div class="container results">
            
            <?php if( have_rows('featured_result_copy') ):
                    // loop through the rows of data
                    while ( have_rows('featured_result_copy') ) : the_row(); ?>
                        <div class="result-holder">
                            <div class="result-top">
                                <!-- <a href="<?php the_sub_field('link'); ?>" title="<?php the_sub_field('result_title'); ?>"> -->
                                    <div class=""><p class="result-amount"><?php the_sub_field('amount'); ?></p>   
                                    <p class="result-title"><?php the_sub_field('result_title'); ?></p></div>
                                    <p class="result-PA"><?php the_sub_field('practice_area'); ?></p>
                                <!-- </a> -->
                            </div>
                            <div class="result-bottom">
                                <?php $post_object = get_sub_field('attorney'); ?>
                                <?php if( $post_object ): ?>

                                    <?php $post = $post_object; setup_postdata( $post ); ?>
                                    
                                    <div class="atty-holder">
                                        <a href="<?php the_permalink(); ?>" title="<?php echo $title; ?> page">
                                            <img src="<?php the_field('headshot'); ?>" alt="<?php the_field('title'); ?> <?php the_title(); ?> " />
                                            <div class="atty-on-case">
                                                <p class="case-title">ATTORNEY ON THE CASE</p>
                                                <p class="atty-name"><?php the_title(); ?></p>   
                                            </div>
                                        </a>
                                    </div>
                                    <?php wp_reset_postdata(); ?>

                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endwhile;

                else :

                    // no rows found

                endif; ?>

        </div>
    </section>
    <section id="landing-page_body-third">
        <div class="container">
            <div class="column">
                <?php the_field('third_content'); ?>
            </div>
        </div>
    </section>
</div><!-- #landing-page -->	
<?php get_footer(); ?>