    <section id="testimonial-block">
        <div class="container">
            <div class="columns">
                <div class="column-66">
                <?php
                $topics = get_field('testimonial_topic');
                if(!empty(get_field('testimonial_topic'))) {
                    $args = array (
                        'post_type'              => array( 'testimonials' ),
                        'post_status'            => array( 'publish' ),
                        'posts_per_page'         => 1,
                        'order'                  => 'DESC',
                        // 'orderby'                => 'rand',
                        'tax_query' => array(
                            array(
                            'taxonomy' => 'testimonial_topic',
                            'terms' => $topics,
                            ),
                        ),
                    );

                } else {
                    $args = array (
                        'post_type'              => array( 'testimonials' ),
                        'post_status'            => array( 'publish' ),
                        'posts_per_page'         => 1,
                        'order'                  => 'DESC',
                        'orderby'                => 'rand',
                    );
                }

                $testi_topic = new WP_Query( $args );
                ?>

                <?php while( $testi_topic->have_posts() ) :?>
                <?php $testi_topic->the_post(); ?>
                    <?php $review_logo = '/wp-content/uploads/2024/02/google_reviews_black.png'; ?>

                    <div class="google-schema_single" itemtype="http://schema.org/Review" itemscope="" itemprop="review">
                        <div class="google-schema_review-rating" itemtype="http://schema.org/Rating" itemscope="" itemprop="reviewRating">
                            <?php if( get_field('star_numeric') == '1' ): ?>
                                <img src="<?php echo $review_logo; ?>" alt="Google Reviews Logo"> <span class="stars">★</span> <span itemprop="ratingValue" class="ratingValue">1</span>
                            <?php elseif( get_field('star_numeric') == '2'): ?>
                                <img src="<?php echo $review_logo; ?>" alt="Google Reviews Logo"> <span class="stars">★★</span> <span itemprop="ratingValue" class="ratingValue">2</span>
                            <?php elseif( get_field('star_numeric') == '3'): ?>
                                <img src="<?php echo $review_logo; ?>" alt="Google Reviews Logo"> <span class="stars">★★★</span> <span itemprop="ratingValue" class="ratingValue">3</span>
                            <?php elseif( get_field('star_numeric') == '4'): ?>
                                <img src="<?php echo $review_logo; ?>" alt="Google Reviews Logo"> <span class="stars">★★★★</span> <span itemprop="ratingValue" class="ratingValue">4</span>
                            <?php elseif( get_field('star_numeric') == '5'): ?>
                                <img src="<?php echo $review_logo; ?>" alt="Google Reviews Logo"> <span class="stars">★★★★★</span> <span itemprop="ratingValue" class="ratingValue">5</span>
                            <?php endif; ?>
                        </div>
                        <div class="google-schema_excerpt"><?php the_excerpt(); ?></div>
                        <div class="google-schema_meta"><p class="google-schema_name" itemtype="http://schema.org/Person" itemprop="author" itemscope=""><span itemprop="name"><?php the_field('name'); ?></span></p></div>
                        <div itemprop="itemReviewed" itemtype="https://schema.org/Organization" itemscope=""><meta itemprop="name" content="Hecht, Kleeger, & Damashek P.C."></div>
                        <div class="spacer-15"></div>
                        <a class="bold" href="/testimonials/" title="Read Full Testimonial Review" class="google-schema_link">Read More Reviews <span class="icon-right-arrow"></span></a>
                    </div>
                    <?php endwhile; wp_reset_postdata(); ?>
                </div>
                <div class="column-33 cta">
                    <?php the_field('global_testimonial_cta','options'); ?>
                    <a href="tel:<?php the_field('global_phone_number','options'); ?>" class="btn"><?php the_field('global_phone_number','options'); ?></a>
                    <p class="small"><a href="/contact/#contact-form-block" class="form-link">Online Form</a></p>
                </div>
            </div>
        </div>
    </section>