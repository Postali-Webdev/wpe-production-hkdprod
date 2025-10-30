<?php 

/**
 * Slider Block template.
 *
 * @param array $block The block settings and attributes.
 */

    $cta_text = get_field('cta_text');
    $cta_button_text = get_field('cta_button_text');
    $cta_button_link = get_field('cta_button_link');

    $slider_type = get_field('slider_type');
    $awards = get_field('awards');
        $award_image = get_sub_field('award_image');
    $case_results = get_field('case_results');
    $testimonials = get_field('testimonials');
    $generic_content = get_field('generic_content');

    // load slider scripts
    wp_register_script('slick', get_stylesheet_directory_uri() . '/assets/js/slick.min.js', array('jquery'));
    wp_enqueue_script('slick');	
    wp_register_script('slick-custom', '/wp-content/themes/knr-legal/blocks/assets/scripts/slick-custom.js?ver=1.06', array('jquery'), '1.06', true);
	wp_enqueue_script('slick-custom');	
    wp_enqueue_style( 'slick-css', get_stylesheet_directory_uri() . '/assets/css/slick.css'); // Enqueue child theme styles.css
?>

<?php if ($slider_type == 'awards') { ?>

<section id="scroller-awards">
    <div class="container">
        <div class="columns">
            <div class="column-full block">                
                <div class="slider-container">
                    <div class="post-tag">Awards</div>
                    <div id="awards-slider" class="slide">
                    <?php $n=1 ?>
                    <?php if( have_rows('awards') ): ?>
                    <?php while( have_rows('awards') ): the_row(); ?>  
                        <div class="column-50" id="award_<?php echo $n; ?>">
                        <?php 
                        $award_image = get_sub_field('award_image');
                        if( !empty( $award_image ) ): ?>
                            <img src="<?php echo esc_url($award_image['url']); ?>" alt="<?php echo esc_attr($award_image['alt']); ?>" />
                        <?php endif; ?>
                        </div>
                        <?php $n++; ?>
                    <?php endwhile; ?>
                    <?php endif; ?> 
                    </div>
                </div>
                <div class="slider-dots"></div>
            </div>
            <?php if (get_field('add_cta_block')) { ?>
            <div class="column-full">
                <div class="spacer-30"></div>
                <div class="ppc-cta-block">
                    <a href="<?php echo $cta_button_link; ?>" class="btn"><?php echo $cta_button_text; ?></a><?php echo $cta_text; ?></p>
                </div>
                <div class="spacer-30"></div>
            </div>
            <?php } ?>
        </div>
    </div>
</section>

<?php } elseif ($slider_type == 'results') { ?>

<section id="scroller-results">
    <div class="container">
        <div class="columns">
            <h2><?php the_field('slider_section_headline'); ?></h2>    
            <div class="column-full block">     
                <div class="slider-container">
                    <div class="slider-nav">
                        <div class="slide-pagination">
                            <div class="slider-next-button-slick"><span class="icon-chevron-right"></span></div><span class="pagingInfo"></span><div class="slider-prev-button-slick"><span class="icon-chevron-left"></span></div>
                        </div>
                    </div>
                    <div id="results-slider" class="slide">
                    <?php if( have_rows('case_results') ): ?>
                    <?php while( have_rows('case_results') ): the_row(); ?>  
                        <?php $post_object = get_sub_field('result_link'); ?>
                        <?php $postURL = get_permalink($post_object->ID); //URL
                        ?>
                        <a class="column-50" href="<?php echo $postURL; ?>">
                            <h3><?php the_sub_field('result_title'); ?></h3>
                            <p><?php the_sub_field('result_copy'); ?></p>
                            <div class="spacer-30"></div>
                        </a>
                    <?php endwhile; ?>
                    <?php endif; ?> 
                    </div>
                    <div class="slider-dots-result"></div>
                </div>
            </div>
            <?php if (get_field('add_cta_block')) { ?>
            <div class="spacer-30"></div>
            <div class="column-full">
                <div class="ppc-cta-block">
                    <a href="<?php echo $cta_button_link; ?>" class="btn"><?php echo $cta_button_text; ?></a><?php echo $cta_text; ?></p>
                </div>
                <div class="spacer-30"></div>
            </div>
            <?php } ?>
        </div>
    </div>
</section>

<?php } elseif ($slider_type == 'testimonial') { ?>

<section id="scroller-testimonial">
    <div class="container">
        <div class="columns">
            <h2><?php the_field('slider_section_headline'); ?></h2>  
            <div class="column-full block">                   
                <div class="slider-container">
                    <div class="slider-nav">
                        <div class="slide-pagination">
                            <div class="slider-next-button-slick-testimonial"><span class="icon-chevron-right"></span></div><span class="pagingInfo"></span><div class="slider-prev-button-slick-testimonial"><span class="icon-chevron-left"></span></div>
                        </div>
                    </div>
                    <div id="testimonial-slider" class="slide">
                    <?php if( have_rows('testimonials') ): ?>
                    <?php while( have_rows('testimonials') ): the_row(); ?>  
                        <div class="column-50">
                            <p><strong><?php the_sub_field('testimonial_quote'); ?></strong></p>
                            <div class="spacer-30"></div>
                            <p><?php the_sub_field('testimonial_author'); ?></p>
                            <div class="spacer-60"></div>
                        </div>
                    <?php endwhile; ?>
                    <?php endif; ?> 
                    </div>
                    <div class="slider-dots-testimonial"></div>
                    <img src="/wp-content/uploads/2025/02/reviews-google.png" alt="Google Review logo" class="review-logo">
                </div>
            </div>
            <?php if (get_field('add_cta_block')) { ?>
            <div class="spacer-30"></div>
            <div class="column-full">
                <div class="ppc-cta-block">
                    <a href="<?php echo $cta_button_link; ?>" class="btn"><?php echo $cta_button_text; ?></a><?php echo $cta_text; ?></p>
                </div>
                <div class="spacer-30"></div>
            </div>
            <?php } ?>
        </div>
    </div>
</section>

<?php } elseif ($slider_type == 'attorney') { ?>

<section id="scroller-attorney">
    <div class="container">
        <div class="columns">
            <h2><?php the_field('slider_section_headline'); ?></h2>  
            <div class="column-full block">              
                <div class="slider-container">
                    <div id="attorney-slider" class="slide">
                    <?php if( have_rows('attorneys') ): ?>
                    <?php while( have_rows('attorneys') ): the_row(); ?>  
                        <div class="attorney-container">
                            <div class="column-50">
                            <?php 
                            $attorney = get_sub_field('attorney_image');
                            if( !empty( $attorney ) ): ?>
                                <img src="<?php echo esc_url($attorney['url']); ?>" alt="<?php echo esc_attr($attorney['alt']); ?>" />
                            <?php endif; ?>
                            </div>
                            <div class="column-50">
                                <h3><?php the_sub_field('attorney_name'); ?></h3>
                                <p><?php the_sub_field('attorney_bio'); ?></p>
                            </div>
                            <div class="spacer-30"></div>
                            <div class="column-full">
                                <div class="slider-nav">
                                    <div class="slide-pagination">
                                        <div class="slider-prev-button-slick-attorney"><span class="icon-chevron-left"></span></div>&nbsp;<span class="pagingInfo"></span>&nbsp;<div class="slider-next-button-slick-attorney"><span class="icon-chevron-right"></span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                    <?php endif; ?> 
                    </div>
                </div>
            </div>
            <?php if (get_field('add_cta_block')) { ?>
            <div class="spacer-30"></div>
            <div class="column-full">
                <div class="ppc-cta-block">
                    <a href="<?php echo $cta_button_link; ?>" class="btn"><?php echo $cta_button_text; ?></a><?php echo $cta_text; ?></p>
                </div>
                <div class="spacer-30"></div>
            </div>
            <?php } ?>
        </div>
    </div>
</section>

<?php } elseif ($slider_type == 'generic') { ?>

<section id="scroller-generic">
    <div class="container">
        <div class="columns">
            <h2><?php the_field('slider_section_headline'); ?></h2>  
            <div class="column-full block">              
                <div class="slider-container">
                    <div class="slider-nav">
                        <div class="slide-pagination">
                            <div class="slider-next-button-slick-generic"><span class="icon-chevron-right"></span></div><span class="pagingInfo"></span><div class="slider-prev-button-slick-generic"><span class="icon-chevron-left"></span></div>
                        </div>
                    </div>
                    <div id="generic-slider" class="slide">
                    <?php if( have_rows('generic_content') ): ?>
                    <?php while( have_rows('generic_content') ): the_row(); ?>  
                        <div class="column-50">
                            <h3><?php the_sub_field('generic_headline'); ?></h3>
                            <p><?php the_sub_field('generic_copy'); ?></p>
                            <div class="spacer-30"></div>
                        </div>
                    <?php endwhile; ?>
                    <?php endif; ?> 
                    </div>
                    <div class="slider-dots-generic"></div>
                </div>
            </div>
            <?php if (get_field('add_cta_block')) { ?>
            <div class="column-full">
                <div class="spacer-30"></div>
                <div class="ppc-cta-block">
                    <a href="<?php echo $cta_button_link; ?>" class="btn"><?php echo $cta_button_text; ?></a><?php echo $cta_text; ?></p>
                </div>
                <div class="spacer-30"></div>
            </div>
            <?php } ?>
        </div>
    </div>
</section>

<?php } ?>