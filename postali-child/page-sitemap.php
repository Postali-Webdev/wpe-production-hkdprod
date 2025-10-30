<?php
/**
 * Sitemap Page
 * Template Name: Sitemap
 * @package Postali Parent
 * @author Postali LLC
 */

$phone = get_field('global_phone_number','options');

get_header(); ?>

<div class="body-container">

    <section id="banner">
        <div class="container">
            <div class="columns">
                <div class="spacer-30"></div>
                <div class="column-50 block">
                    <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?> 
                    <h1><?php the_title(); ?></h1>
                    <p><strong><?php the_field('banner_intro_copy'); ?></strong></p>
                    <?php if(get_field('banner_cta_text')) { ?>
                        <p class="banner-cta"><?php the_field('banner_cta_text'); ?></p>
                    <?php } else { ?>
                        <p class="banner-cta"><?php the_field('global_cta_text','options'); ?></p>
                    <?php } ?>
                    <a href="tel:<?php echo $phone; ?>" class="btn"><?php echo $phone; ?></a>
                </div>
                <div class="column-50 photo">
                <?php 
                $banner_img = get_field('banner_photo');
                if( !empty( $banner_img ) ) { ?>
                    <img src="<?php echo esc_url($banner_img['url']); ?>" alt="<?php echo esc_attr($banner_img['alt']); ?>" />
                <?php }?>

                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="columns">
                <div class="column-50">
                    <h2>Pages</h2> 
                        <ul>
                            <?php                         
                            $templates = array(
                                'page-ppc-landing.php', //replace these with the correct template names
                                'page-ppc-landing-options.php'
                            );

                            $ppc_ids = array();
                            foreach ( $templates as $template ) {
                                $args = [
                                    'post_type'  => 'page',
                                    'fields'     => 'ids',
                                    'nopaging'   => true,
                                    'meta_key'   => '_wp_page_template',
                                    'meta_value' => $template
                                ];

                                $ppc_pages = get_posts( $args );
                                $ppc_ids = array_merge($ppc_ids, $ppc_pages);
                            }
                            $ppc_list = implode(', ', $ppc_ids);
                            $page_args = array(
                                'exclude' => $ppc_list,
                                'title_li' => null
                            );
                            wp_list_pages($page_args); 
                            ?>
                        </ul> 
                </div>
                <div class="column-50">        
                    <h2>Blog Posts</h2> 
                    <ul>
                        <?php wp_get_archives('type=postbypost'); ?>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <?php get_template_part('blocks/block','prefooter'); ?>

</div><!-- #content -->

<?php get_footer();
