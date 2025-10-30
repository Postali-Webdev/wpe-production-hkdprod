<?php
/**
 * Template Name: Front Page
 * @package Postali Child
 * @author Postali LLC
**/

$phone = get_field('global_phone_number','options');

get_header(); ?>

<div class="body-container">

    <section id="banner">
        <div class="container">
            <div class="columns">
                <h1 class="desktop"><?php the_title(); ?></h1>
                <div class="spacer-break"></div>
                <div class="column-50 photo">
                <?php 
                $image = get_field('banner_photo');
                if( !empty( $image ) ): ?>
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                <?php endif; ?>
                </div>
                <div class="column-50 block">
                    <h1 class="mobile"><?php the_title(); ?></h1>
                    <div class="banner-headline"><?php the_field('banner_headline'); ?></div>
                    <div class="banner-subhead"><?php the_field('banner_subhead'); ?></div>
                    <?php the_field('banner_copy'); ?>
                    <p class="banner-cta"><?php the_field('banner_cta'); ?></p>
                    <a href="tel:<?php echo $phone; ?>" class="btn"><?php echo $phone; ?></a>
                </div>
            </div>
        </div>
    </section>

    <section id="hp-results" class="grey">
        <div class="container">
            <div class="columns">
            <?php if(is_page(17923)) { ?>

                <div class="column-25 result-cta desktop">
                    <div class="cta-container">
                        <p class="large"><strong><?php the_field('results_cta'); ?></strong></p>
                        <a href="/espanol/resultados-del-caso/" class="btn">LEER MÁS RESULTADOS DE CASOS</a>
                    </div>
                </div>
            
                <?php
                $result_query = new WP_Query( array(
                    'posts_per_page'    => 3,
                    'post_type'         => 'resultsesp', 
                    'order'             => 'DESC',
                    'meta_key'			=> 'result_amount',
                    'orderby'			=> 'meta_value_num',
                ) );
                ?>
                <?php if($result_query->have_posts()) { ?>
                <?php while( $result_query->have_posts() ) : $result_query->the_post(); ?>
                <a class="column-25 result" href="<?php the_permalink(); ?>">
                    <?php $amount = get_field('result_amount'); ?>
                    <div class="result-amount">$<?php echo number_format($amount); ?></div>
                    <div class="result-category">
                    <?php
                        $terms = get_the_terms( $post->ID, 'results_category_esp');
                        foreach($terms as $term) {
                            echo $term->name;
                        }
                    ?>
                    </div>
                </a>
                <?php endwhile; wp_reset_postdata(); ?>
                <?php } ?>
                <div class="column-25 result-cta mobile">
                    <div class="spacer-15"></div>
                    <div class="cta-container">
                        <p class="large"><strong><?php the_field('results_cta'); ?></strong></p>
                        <a href="/espanol/resultados-del-caso/" class="btn">LEER MÁS RESULTADOS DE CASOS</a>
                    </div>
                </div>

            <?php } else { ?>

            <div class="column-25 result-cta desktop">
                <div class="cta-container">
                    <p class="large"><strong><?php the_field('results_cta'); ?></strong></p>
                    <a href="/case-results/" class="btn">READ MORE CASE RESULTS</a>
                </div>
            </div>
            
            <?php
            $result_query = new WP_Query( array(
                'posts_per_page'    => 3,
                'post_type'         => 'results', 
                'order'             => 'DESC',
                'meta_key'			=> 'result_amount',
                'orderby'			=> 'meta_value_num',
            ) );
            ?>
            <?php if($result_query->have_posts()) { ?>
            <?php while( $result_query->have_posts() ) : $result_query->the_post(); ?>
            <a class="column-25 result" href="<?php the_permalink(); ?>">
                <?php $amount = get_field('result_amount'); ?>
                <div class="result-amount">$<?php echo number_format($amount); ?></div>
                <div class="result-category">
                <?php
                    $terms = get_the_terms( $post->ID, 'results_category');
                    foreach($terms as $term) {
                        echo $term->name;
                    }
                ?>
                </div>
            </a>
            <?php endwhile; wp_reset_postdata(); ?>
            <?php } ?>
            <div class="column-25 result-cta mobile">
                <div class="spacer-15"></div>
                <div class="cta-container">
                    <p class="large"><strong><?php the_field('results_cta'); ?></strong></p>
                    <a href="/case-results/" class="btn">READ MORE CASE RESULTS</a>
                </div>
            </div>

            <?php } ?>

                
            </div>
        </div>
    </section>

    <section id="hp-difference">
        <div class="container">
            <div class="columns">
                <div class="column-50 block">
                    <p class="top"><?php the_field('difference_headline'); ?></p>
                    <div class="spacer-break"></div>
                    <h2><?php the_field('difference_subhead'); ?></h2>
                    <div class="bottom-link desktop">
                        <a href="<?php the_field('difference_hkd_page_link'); ?>" class="bold"><?php the_field('difference_hkd_link_text'); ?> <span class="icon-right-arrow"></span></a>
                    </div>
                </div>
                <div class="column-50">
                    <?php the_field('difference_copy'); ?>
                    <div class="bottom-link mobile">
                        <a href="<?php the_field('difference_hkd_page_link'); ?>" class="bold"><?php the_field('difference_hkd_link_text'); ?> <span class="icon-right-arrow"></span></a>
                    </div>
                    <div class="difference-awards">
                        <p class="blue"><strong>Awards & Accolades</strong></p>
                        <div class="spacer-30"></div>
                        <?php if( have_rows('difference_awards') ): ?>
                        <?php while( have_rows('difference_awards') ): the_row(); ?> 
                        <?php 
                        $award = get_sub_field('logo');
                        if( !empty( $award ) ): ?>
                            <img src="<?php echo esc_url($award['url']); ?>" alt="<?php echo esc_attr($award['alt']); ?>" />
                        <?php endif; ?>
                        <?php endwhile; ?>
                        <?php endif; ?> 

                    </div>
                </div>
            </div>
            <div class="spacer-60"></div>
            <div class="columns" id="difference">
                <div class="column-50 block">
                    <h3><?php the_field('difference_bottom_headline'); ?></h3>
                    <?php the_field('difference_bottom_copy'); ?>
                </div>
                <div class="column-50 block">
                    <?php if(get_field('difference_add_video')) { ?>
                        <div class="video-embed">
                            <iframe class="responsive-video" width="560" height="315" src="https://www.youtube.com/embed/<?php the_field('difference_video_id'); ?>?rel=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                        </div>
                        <?php if(get_field('difference_video_transcript_intro')) { ?>
                            <div class="spacer-30"></div>
                            <p class="large spaced caps bottom-0"><strong>Video Transcript</strong></p>
                            <div class="content-box">
                                <p><?php the_field('difference_video_transcript_intro'); ?><span class="ellipsis visible"> ...</span>
                                <span class="extra closed"><?php the_field('difference_video_transcript_remainder'); ?></p>
                                <div class="transcript-more"><div class="plus"><span>+</span></div> <p class="small spaced caps">Read Full Video Transcript</p></div>
                            </div>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>

    <section id="hp-practice-areas">
        <div class="container">
            <div class="columns">
                <div class="column-full centered">
                    <h3><?php the_field('pa_headline'); ?></h3>
                </div>
                <div class="spacer-30"></div>
                <?php if( have_rows('practice_areas') ): ?>
                <?php while( have_rows('practice_areas') ): the_row(); ?>  
                
                    <div class="column-33 hp-pa">
                        <div class="name">
                            <a href="<?php the_sub_field('practice_area_link'); ?>" title="Learn more about <?php the_sub_field('practice_area_name'); ?>"><?php the_sub_field('practice_area_name'); ?></a>
                        </div>
                        <div class="copy">
                            <p><?php the_sub_field('practice_area_copy'); ?></p>
                        </div>
                </div>
                
                <?php endwhile; ?>

                    <a class="column-33 hp-pa all" href="/practice-areas/" title="All The Cases & NY Injuries We Handle">
                        <div class="block-content">

                            <p class="xlarge"><strong>
                            <?php if(is_page(17923)) { 
                                $all_cases = "Todos los casos y lesiones de Nueva York que manejamos";
                            } else {
                                $all_cases = "All The Cases & NY Injuries We Handle";
                            }    
                            ?>
                            <?php echo $all_cases; ?>                        
                            </strong></p>
                            <span class="icon-right-arrow"></span>
                        </div>
                    </a>

                <?php endif; ?> 
            </div>
        </div>
    </section>

    <section id="hp-result" class="grey">
        <div class="container">
            <div class="columns">
                <div class="column-50 photo">
                <?php 
                $image = get_field('featured_result_image');
                if( !empty( $image ) ): ?>
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                <?php endif; ?>
                </div>
                <div class="column-50 block">
                    <p><strong>
                    <?php if(is_page(17923)) { 
                        $featured_result = "Resultado Destacado";
                    } else {
                        $featured_result = "Featured Result";
                    }    
                    ?>
                    <?php echo $featured_result; ?>  
                    </strong></p>
                    <div class="amount"><?php the_field('featured_result_amount'); ?></div>
                    <div class="category"><?php the_field('featured_result_category'); ?></div>
                    <div class="spacer-30"></div>
                    <div class="copy"><p><strong><?php the_field('featured_result_copy'); ?></strong></p></div>
                    <a href="<?php the_field('featured_result_link'); ?>" class="btn">
                    <?php if(is_page(17923)) { 
                        $feat_btn_txt = "LEER SOBRE EL CASO";
                    } else {
                        $feat_btn_txt = "READ ABOUT THE CASE";
                    }    
                    ?>
                    <?php echo $feat_btn_txt; ?>  
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section id="hp-help">
        <div class="container">
            <div class="columns">
                <p class="top"><?php the_field('help_headline'); ?></p>
                <div class="spacer-break"></div>
                <h3><?php the_field('help_subhead'); ?></h3>
                <div class="spacer-30"></div>
                <div class="column-50 photo">
                <?php 
                $image = get_field('help_photo');
                if( !empty( $image ) ): ?>
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                <?php endif; ?>
                </div>
                <div class="column-50 block">
                    <?php the_field('help_copy'); ?>
                    <a href="/areas-served/" class="bold">View our Areas Served <span class="icon-right-arrow"></span></a>
                    <div class="spacer-60"></div>
                    <div class="address-map">
                        <div class="address">
                            <p>
                                <strong>Our Office</strong><br>
                                <?php the_field('global_address','options'); ?>
                                <span class="spacer-30"></span>
                                <a href="<?php the_field('driving_directions','options'); ?>" target="blank">DIRECTIONS</a>
                            </p>
                        </div>
                        <div class="map">
                            <iframe src="<?php the_field('map_embed','options'); ?>" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php get_template_part('blocks/block','testimonials'); ?>

    <section id="hp-about" class="grey">
        <div class="container">
            <div class="columns">
                <div class="column-50 block">
                    <p class="top"><?php the_field('about_headline'); ?></p>
                    <h2><?php the_field('about_subhead'); ?></h2>
                    <div class="bottom-link desktop">
                        <a href="<?php the_field('more_about_link'); ?>" class="bold"><?php the_field('more_about_link_text'); ?> <span class="icon-right-arrow"></span></a>
                    </div>
                </div>
                <div class="column-50 block">
                    <?php the_field('about_copy'); ?>
                    <div class="bottom-link mobile">
                        <a href="<?php the_field('more_about_link'); ?>" class="bold"><?php the_field('more_about_link_text'); ?> <span class="icon-right-arrow"></span></a>
                    </div>
                    <p><strong><?php the_field('about_cta_text'); ?></strong></p>
                    <a href="tel:<?php echo $phone; ?>" class="btn"><?php echo $phone; ?></a>
                </div>
            </div>
        </div>
    </section>

    <section id="hp-meet">
        <div class="container">
            <div class="columns">
                <h3><?php the_field('meet_headline'); ?></h3>
                <div class="spacer-30"></div>

                <?php if(is_page(17923)) { ?>

                <?php if( have_rows('meet_attorneys_esp') ): ?>
                <?php while( have_rows('meet_attorneys_esp') ): the_row(); ?>  
                <?php $post_object = get_sub_field('attorney'); ?>
                    <?php if( $post_object ): ?>
                        <?php // override $post
                        $post = $post_object;
                        setup_postdata( $post );
                        ?>
                        
                        <div class="column-33 attorney">
                            <a class="attorney-photo" href="<?php the_permalink(); ?>">
                            <?php 
                            $headshot = get_field('headshot');
                            if( !empty( $headshot ) ): ?>
                                <img src="<?php echo esc_url($headshot['url']); ?>" alt="<?php echo esc_attr($headshot['alt']); ?>" />
                            <?php endif; ?>
                            </a>
                            <div class="attorney-content">
                                <p class="title"><?php the_title(); ?><br>
                                <em><?php the_field('title'); ?></em></p>
                                <p><?php the_field('short_bio'); ?></p>
                            </div>
                            <div class="attorney-link">
                                <?php
                                $atty_name = get_the_title();
                                $arr = explode(' ',trim($atty_name));
                                ?>
                                <a href="<?php the_permalink(); ?>" class="btn">Lea la biografía de <?php echo $arr[1]; ?></a>
                            </div>
                            </div>
                        
                        <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
                    <?php endif; ?>
                
                <?php endwhile; ?>
                <?php endif; ?> 

                <div class="spacer-60"></div>
                <a href="/espanol/nuestros-abogados/" class="btn centered">Conoce a Nuestro Equipo Completo</a>

                <?php } else { ?>

                <?php if( have_rows('meet_attorneys') ): ?>
                <?php while( have_rows('meet_attorneys') ): the_row(); ?> 
                <?php $post_object = get_sub_field('attorney'); ?>
                    <?php if( $post_object ): ?>
                        <?php // override $post
                        $post = $post_object;
                        setup_postdata( $post );
                        ?>
                        
                        <div class="column-33 attorney">
                            <a class="attorney-photo" href="<?php the_permalink(); ?>">
                            <?php 
                            $headshot = get_field('headshot');
                            if( !empty( $headshot ) ): ?>
                                <img src="<?php echo esc_url($headshot['url']); ?>" alt="<?php echo esc_attr($headshot['alt']); ?>" />
                            <?php endif; ?>
                            </a>
                            <div class="attorney-content">
                                <p class="title"><?php the_title(); ?><br>
                                <em><?php the_field('title'); ?></em></p>
                                <p><?php the_field('short_bio'); ?></p>
                            </div>
                            <div class="attorney-link">
                                <?php
                                $atty_name = get_the_title();
                                $arr = explode(' ',trim($atty_name));
                                ?>
                                <a href="<?php the_permalink(); ?>" class="btn">Read <?php echo $arr[0]; ?>'s Bio</a>
                            </div>
                            </div>
                        
                        <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
                    <?php endif; ?>
                
                <?php endwhile; ?>
                <?php endif; ?> 

                <div class="spacer-60"></div>
                <a href="/about/" class="btn centered">Meet our full team</a>

                <?php } ?>

            </div>
        </div>
    </section>

    <section id="hp-process">
        <div class="container">
            <div class="columns">
                <div class="column-50 block">
                    <p class="top"><?php the_field('process_headline'); ?></p>
                    <h2><?php the_field('process_subhead'); ?></h2>
                </div>
                <div class="column-50 steps">
                <?php $n=1; ?>
                <?php if( have_rows('steps_process') ): ?>
                <?php while( have_rows('steps_process') ): the_row(); ?> 
                    <div class="step">
                        <div class="step-box">
                            <div class="number"><?php echo $n; ?></div>
                        </div>
                        <p><?php the_sub_field('step_title'); ?></p>
                    </div>
                <?php $n++; ?>
                <?php endwhile; ?>
                <?php endif; ?> 
                </div>
                <div class="spacer-60"></div>
                <div class="column-75 center steps">
                <?php $n=1; ?>
                <?php if( have_rows('steps_process') ): ?>
                <?php while( have_rows('steps_process') ): the_row(); ?> 
                    <div class="step">
                        <div class="step-box">
                            <div class="number"><?php echo $n; ?></div>
                        </div>
                        <div class="step-copy">
                            <p><strong><?php the_sub_field('step_title'); ?></strong><br>
                            <?php the_sub_field('step_copy'); ?></p>
                        </div>
                    </div>
                <?php $n++; ?>
                <?php endwhile; ?>
                <?php endif; ?> 
                </div>
            </div>
        </div>
    </section>

    <section id="hp-assessment" class="grey">
        <div class="container">
            <div class="columns">
                <div class="column-50 photo">
                <?php 
                $image = get_field('tell_us_image');
                if( !empty( $image ) ): ?>
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                <?php endif; ?>
                </div>
                <div class="column-50 block">
                    <p><strong>Tell Us About Your Case</strong></p>
                    <h3><?php the_field('tell_us_subhead'); ?></h3>
                    <div class="spacer-15"></div>
                    <div class="copy"><p><strong><?php the_field('tell_us_copy'); ?></strong></p></div>
                    <div class="cta-block">
                        <a href="tel:<?php echo $phone; ?>" class="btn"><?php echo $phone; ?></a> <div class="form"><a href="/contact/" class="form-link">Online Form</a></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="hp-elements">
        <div class="container">
            <div class="columns">
                <div class="column-50 ">
                    <h2><?php the_field('elements_headline'); ?></h2>
                </div>
                <div class="column-50">
                    <?php the_field('elements_copy'); ?>
                </div>
                <div class="spacer-60"></div>
                <?php if( have_rows('elements') ): ?>
                <?php while( have_rows('elements') ): the_row(); ?> 
                <div class="column-33">
                    <p class="xlarge blue"><strong><?php the_sub_field('step_title'); ?></strong></p>
                    <p><?php the_sub_field('step_copy'); ?></p>
                </div>
                <?php $n++; ?>
                <?php endwhile; ?>
                <?php endif; ?> 
            </div>
            <div class="columns">
                <p><strong><?php the_field('elements_cta_text'); ?></strong></p>
                <a href="tel:<?php echo $phone; ?>" class="btn"><?php echo $phone; ?></a> 
            </div>
        </div>
    </section>

    <section id="hp-damages">
        <div class="container">
            <div class="columns">
                <div class="column-50 block">
                    <h2><?php the_field('damages_copy'); ?></h2>
                </div>
                <div class="column-50 photo">
                <?php 
                $image = get_field('damages_image');
                if( !empty( $image ) ): ?>
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <section id="hp-faqs" class="grey">
        <div class="container">
            <div class="columns">
                <div class="column-full centered center">
                    <h2><?php the_field('faq_headline'); ?></h2>
                </div>
                <div class="column-50 ">
                <?php if( have_rows('faqs_left_column') ): ?>
                <?php while( have_rows('faqs_left_column') ): the_row(); ?> 
                    <h3><?php the_sub_field('faq_question'); ?></h3>
                    <?php the_sub_field('faq_answer'); ?>
                <?php endwhile; ?>
                <?php endif; ?> 
                </div>
                <div class="column-50">
                <?php if( have_rows('faqs_right_column') ): ?>
                <?php while( have_rows('faqs_right_column') ): the_row(); ?> 
                    <h3><?php the_sub_field('faq_question'); ?></h3>
                    <?php the_sub_field('faq_answer'); ?>
                <?php endwhile; ?>
                <?php endif; ?> 
                </div>
            </div>
        </div>
    </section>

    <section id="hp-contact">
        <div class="container">
            <div class="columns">
                <div class="column-50 centered center block">
                    <p><strong><?php the_field('contact_headline'); ?></strong></p>
                    <h2><?php the_field('contact_subhead'); ?></h2>
                    <?php the_field('contact_copy'); ?>
                    <p><strong><?php the_field('contact_cta_text'); ?></strong></p>
                    <a href="tel:<?php echo $phone; ?>" class="btn centered"><?php echo $phone; ?></a> 
                </div>
                <div class="spacer-60"></div>
                <div class="column-50 ">
                    <div class="map" style="background-image:url('<?php the_field('map_image'); ?>');">
                        <div class="quote">
                            <div class="stars">★ ★ ★ ★ ★</div>
                            <div class="spacer-30"></div>
                            <p class="xlarge"><?php the_field('map_quote'); ?></p>
                            <p class="small blue"><strong><?php the_field('map_author'); ?></strong></p>
                        </div>
                        <div class="logo">
                        <?php 
                        $image = get_field('map_review_logo');
                        if( !empty( $image ) ): ?>
                            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                        <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="column-50 block">
                    <p><strong>Tell Us What Happened</strong></p>
                    <?php $contactform = get_field('contact_form_shortcode'); ?>
                    <?php echo do_shortcode($contactform) ?>
                </div>
            </div>
        </div>
    </section>

<?php get_footer();?>