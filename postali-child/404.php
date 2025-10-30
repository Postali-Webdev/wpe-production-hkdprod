<?php
/**
 * 404 Page Not Found.
 *
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
                    <h1>Error 404: Page Not Found</h1>
                    <?php the_field('banner_intro_text'); ?>
                    <p class="banner-cta">Free Case Review</p>
                    <a href="tel:<?php echo $phone; ?>" class="btn"><?php echo $phone; ?></a>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="columns">
                <div class="column-full block">
                <h2>Page Not Found</h2>
                <p>We apologize but the page you're looking for could not be found.</p>

                <p><a href="/" title="home">Let's Get You Back on Track!</a></p>
                </div>
            </div>
        </div>
    </section>

    <?php get_template_part('blocks/block','prefooter'); ?>

</div><!-- #content -->

<?php get_footer();
