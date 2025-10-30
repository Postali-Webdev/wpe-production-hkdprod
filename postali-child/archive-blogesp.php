<?php
/**
 * Template Name: Blog Esp
 * 
 * @package Postali Child
 * @author Postali LLC
 */

$args = array (
	'post_type' => 'blogesp',
	'post_per_page' => '12',
	'post_status' => 'publish',
	'order' => 'DESC',
    'paged' => $paged
);
$the_query = new WP_Query($args);

get_header(); ?>

<div class="body-container">

    <section id="banner">
        <div class="container">
        <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?> 
            <div class="columns">
                <div class="column-full centered block">
                    <h1>Blog Legal</h1>
                    <p class="large"><strong>Revisión gratuita de casos</strong></p>
                    <a href="tel:<?php the_field('global_phone_number','options'); ?>" class="btn"><?php the_field('global_phone_number','options'); ?></a>
                    <div class="scroll">
                        <p class="small">SCROLL</p>
                        <span class="icon-down-arrow"></span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="blog-holder">
        <div class="container">
            <div class="columns">
                <?php $first = true; ?>
                <?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
                    <div class="column-25">
                        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                            <div class="date-title">
                                <div class="date"><?php the_date(); ?></div>
                                <div class="spacer-15"></div>
                                <div class="title"><?php the_title(); ?></div>
                                <div class="spacer-30"></div>
                            </div>
                            <div class="author-categories">
                                <div class="author">By <?php echo get_the_author(); ?></div>
                            </div>
                            <div class="link-box">
                                <span class="icon-right-arrow"></span>
                            </div>
                        </a>
                    </div>
                <?php endwhile; wp_reset_postdata(); ?>
                <?php the_posts_pagination(); ?>
            </div>
        </div><!-- #content -->
    </section>

    <?php get_template_part('blocks/block','prefooter'); ?>

</div>

<?php get_footer(); ?>
