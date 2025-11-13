<?php
/**
 * Theme footer
 *
 * @package Postali Child
 * @author Postali LLC
**/
?>
<footer>

    <section id="footer">
        <div class="container">
            <div class="columns">
                <div class="column-1">
                    <?php the_custom_logo(); ?>
                </div>
                <div class="column-2">
                    <p><strong>Hecht, Kleeger & Damashek, P.C.</strong></p>
                    <p>
                        <a target="_blank" href="<?php the_field('driving_directions', 'options'); ?>">
                            <?php the_field('global_address','options'); ?>
                        </a>
                    </p>
                    <p><a href="<?php the_field('driving_directions','options'); ?>" target="blank">DIRECTIONS</a></p>
                    <p>Phone: <a href="tel:<?php the_field('global_phone_number','options'); ?>"><?php the_field('global_phone_number','options'); ?></a></p>                   
                    <div class="footer-map"><iframe src="<?php the_field('map_embed','options'); ?>" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></div>
                </div>
                <div class="column-3">
                <?php if (is_tree('17923') || is_post_type_archive('blogesp') || is_singular('blogesp') || is_singular('attorneysesp') || is_post_type_archive('resultsesp') || is_singular('resultsesp') || is_tax('results_attorney_espanol') || is_tax('results_category_esp')) { ?>
                    <p><strong>NAVEGACIÓN</strong></p>
                    <nav role="navigation">
                    <?php
                        $args = array(
                            'container' => false,
                            'theme_location' => 'footer-nav-esp'
                        );
                        wp_nav_menu( $args );
                    ?>	
                    </nav>
                    <?php } else { ?>
                    <p><strong>NAVIGATION</strong></p>
                    <nav role="navigation">
                    <?php
                        $args = array(
                            'container' => false,
                            'theme_location' => 'footer-nav'
                        );
                        wp_nav_menu( $args );
                    ?>
                    </nav>
                    <?php } ?>
                </div>
                <div class="column-4">
                    
                <?php if (is_tree('17923') || is_post_type_archive('blogesp') || is_singular('blogesp') || is_singular('attorneysesp') || is_post_type_archive('resultsesp') || is_singular('resultsesp') || is_tax('results_attorney_espanol') || is_tax('results_category_esp')) { ?>
                    <p><strong>ACERCA DE LA FIRMA</strong></p>    
                    <p class="disclaimer"><?php the_field('disclaimer_copy_spanish','options'); ?></p>
                    <?php } else { ?>
                    <p><strong>ABOUT THE FIRM</strong></p>    
                    <p class="disclaimer"><?php the_field('disclaimer_copy','options'); ?></p>
                    <?php } ?>
                    <?php if( have_rows('social_media','options') ): ?>
                        <div class="spacer-30"></div>
                        <ul class="social">
                        <?php while( have_rows('social_media','options') ): the_row(); ?>  
                            <li><a href="<?php the_sub_field('page_link'); ?>" title="<?php the_sub_field('link_title'); ?>" target="blank"><?php the_sub_field('link_icon'); ?></a></li>
                        <?php endwhile; ?>
                        </ul>
                    <?php endif; ?> 
                </div>
            </div>
        </div>
    </section>
    <section id="footer-utility">
        <div class="container">
            <div class="columns">
                <div class="column-full centered">
                    <?php the_field('utility_footer_copy','options'); ?>
                    <?php if(is_page_template('front-page.php')) { ?>
                    <div class="spacer-break"></div>
                    <a href="https://www.postali.com" title="Site design and development by Postali" target="blank"><img src="https://www.postali.com/wp-content/themes/postali-site/img/postali-tag.png" alt="Postali | Results Driven Marketing" style="display:block; max-width:250px; margin:10px auto 10px;"></a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>

</footer>
<script type="text/javascript" src="//cdn.callrail.com/companies/432159079/d6dc5407da8778df60e7/12/swap.js"></script> 

<?php wp_footer(); ?>
</body>
</html>


