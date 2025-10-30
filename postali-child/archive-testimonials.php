<?php
/**
 * Testimonials Archive
 *
 * @package Postali Parent
 * @author Postali LLC
 */
get_header(); ?>

<div class="body-container">

    <section id="banner">
        <div class="container">
        <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?> 
            <div class="columns">
                <div class="column-75 centered center block">
                    <h1>Testimonials</h1>
                    <p><strong>We Are Committed to Providing Superior Service as Personal Injury Attorneys</strong><br>
                    Our level of service is what has made the difference in your results. When we say that we do whatever it takes, we mean that our <a href= "https://lawyer1.com/">personal injury lawyers</a> will investigate, compile the evidence, and fight for you until you get the maximum compensation possible. We also understand that this is a difficult time for you, but our firm wants to alleviate the headache by giving you confidence. Interested in reading more reviews? <a href= "https://www.google.com/search?hl=en-US&gl=us&q=Hecht,+Kleeger+%26+Damashek,+P.C.,+19+W+44th+St+%231500,+New+York,+NY+10036&ludocid=8659450127134643718&lsig=AB86z5XiUC-FZ7_8OoqeVLErvIY8#lrd=0x89c258ffdbaecc0d:0x782c8c02ca125606,1" target= "_blank">Read our 100+ 5-star reviews on Google</a>.</p>
                    <p class="large"><strong>Free Case Review</strong></p>
                    <a href="tel:<?php the_field('global_phone_number','options'); ?>" class="btn"><?php the_field('global_phone_number','options'); ?></a>
                    <div class="scroll">
                        <p class="small">SCROLL</p>
                        <span class="icon-down-arrow"></span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section class="grey" id="testimonials">
        <div class="container">
            <div class="grid">
            <?php while ( have_posts() ) : the_post(); ?>
                <div class="item">
                    <span class="icon-icon-quotes"></span>
                    <?php the_content(); ?>
                    <div class="author-logo">
                        <div class="author">
                            <p class="caps spaced"><strong><?php the_field('name'); ?></strong></p>
                        </div>
                        <div class="logo">
                            <img src="/wp-content/uploads/2024/03/google-reviews-hkd.png" alt="Google Reviews logo">
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
            </div>
            <?php the_posts_pagination(); ?>

        </div>
    </section>

</div>

<?php get_footer();
