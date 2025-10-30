<?php
/**
 * Post Archive
 *
 * @package Postali Parent
 * @author Postali LLC
 */
get_header(); ?>

<div class="body-container">

    <section class="attorney-top">
        <div class="container">
            <p id="breadcrumbs"><span><span><a href="/">Home</a></span> » <span><a href="/about/">About</a></span> » <span class="breadcrumb_last" aria-current="page">Jonathan Damashek</span></span></p>
            <div class="columns">
                <div class="column-33">
                    <div class="attorney-image">
                    <?php 
                    $image = get_field('headshot');
                    if( !empty( $image ) ): ?>
                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                    <?php endif; ?>
                    </div>
                </div>
                <div class="column-66 block">
                    <div class="title-block">
                        <div class="left">
                            <h1><?php the_title(); ?></h1>
                            <p class="large caps spaced"><?php the_field('title'); ?></p>
                        </div>
                        <div class="right">
                            <p class="phone"><span class="icon-icon-phone-attorney"></span> <a href="tel:<?php the_field('attorney_phone'); ?>"><?php the_field('attorney_phone'); ?></a></p>
                            <p class="email"><span class="icon-icon-email"></span> <a href="mailto:<?php the_field('email'); ?>"><?php the_field('email'); ?></a></p>
                        </div>
                    </div>
                    <div class="spacer-30"></div>
                    <?php the_field('intro_blurb'); ?>
                    <a href="tel:<?php the_field('global_phone_number','options'); ?>" class="btn"><?php the_field('global_phone_number','options'); ?></a>
                </div>
            </div>
        </div>
    </section>

    <section class="grey attorney-middle">
        <div class="container skinny">
            <div class="columns">
                <div class="column-full block">
                    <?php the_field('main_bio'); ?>
                    <div class="bar-admissions-education">
                        <div class="left">
                            <p class="xlarge"><strong>Admisiones del bar</strong></p>
                            <?php the_field('bar_admissions'); ?>
                        </div>
                        <div class="right">
                            <p class="xlarge"><strong>Educación</strong></p>
                            <?php the_field('education'); ?>
                        </div>
                    </div>
                    <?php the_field('main_bio_end'); ?>

                    <div class="bar-admissions-education">
                        <div class="left">
                        <?php if(get_field('professional_memberships')) { ?>
                            <p class="xlarge"><strong>Asociaciones profesionales y membresías</strong></p>
                            <?php the_field('professional_memberships'); ?>
                        <?php } ?>
                        </div>
                        <div class="right">
                        <?php if(get_field('honors_awards')) { ?>
                            <p class="xlarge"><strong>Honores y reconocimientos</strong></p>
                            <?php the_field('honors_awards'); ?>
                        <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php if(get_field('add_verdicts')) { ?>
    <section class="verdicts grey">
        <div class="container">
            <div class="columns">
            <?php if(get_field('notable_verdicts')) { ?>
                <p class="xlarge"><strong>Veredictos notables</strong></p>
                <div class="spacer-30"></div>
                <?php 
                $attorney = get_field('notable_verdicts');
                $custom_query = new WP_Query( 

                    array(
                        'post_type' => 'resultsesp', 
                        'offset' => 0,  
                        'posts_per_page' => 8,
                        'post_status'    => 'publish',
                        'meta_key' => 'result_amount',
                        'orderby' => 'meta_value_num',
                        'order'	=> 'DESC',
                        'tax_query' => array (
                            array (
                                'taxonomy' => 'results_attorney',
                                'field' => 'slug',
                                'terms' => $attorney->post_name,
                                ),
                            ),
                        ) 
                    );

                ?>

                <?php while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>

                <a class="column-25 result" href="<?php the_permalink(); ?>">
                    <?php $amount = get_field('result_amount'); ?>
                    <div class="result-amount">$<?php echo number_format($amount); ?></div>
                    <?php
                        $terms = get_the_terms( $post->ID, 'results_category');
                        foreach($terms as $term) { ?>
                        <div class="result-category">
                        <?php
                            echo $term->name;
                        ?>
                        </div>
                    <?php }
                    ?>
                    <span class="icon-right-arrow"></span>
                </a>

                <?php endwhile; ?>

                <?php 
                    $first_name = $attorney->post_title;
                    $post_slug = $attorney->post_name;
                ?>

                <div class="spacer-30"></div>

                <?php if(!is_single(19658)) { ?>
                <a href="/espanol/resultados/abogado/<?php echo $post_slug; ?>/" class="btn">VER LOS RESULTADOS DE SOBRE</a>
                <?php } ?>

                <?php wp_reset_postdata(); ?>

            </div>
            <?php } ?>
        </div>
    </section>

    <?php } ?>

    <?php if(get_field('practice_areas')) { ?>
    <section class="white attorney-bottom">
        <div class="container skinny">
            <div class="columns center">
                <?php if(get_field('portrait')) { ?>
                <div class="spacer-30"></div>
                <div class="column-50 portrait">
                    <?php 
                    $portrait = get_field('portrait');
                    if( !empty( $portrait ) ): ?>
                        <img src="<?php echo esc_url($portrait['url']); ?>" alt="<?php echo esc_attr($portrait['alt']); ?>" />
                    <?php endif; ?>
                </div>
                <?php } ?>
                <div class="column-50 block practice-areas">
                    <?php the_field('practice_areas'); ?>
                </div>
            </div>
        </div>
    </section>
    <?php } ?>


    <?php get_template_part('blocks/block','prefooter'); ?>

</div>

<?php get_footer();
