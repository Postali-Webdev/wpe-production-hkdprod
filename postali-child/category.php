<?php
/**
 * Template Name: Blog
 * 
 * @package Postali Child
 * @author Postali LLC
 */

get_header(); ?>

<div class="body-container">

    <section id="banner">
        <div class="container">
            <p id="breadcrumbs"><span><span><a href="/">Home</a></span> » <a href="/blog/">Legal Blog</a></span> » <span class="breadcrumb_last" aria-current="page"><?php echo single_cat_title(); ?></span></span></p>
            <div class="columns">
                <div class="column-full centered block">
                    <h1>Legal Blog - <?php echo single_cat_title(); ?></h1>
                    <p class="xlarge"><strong>Free Case Review</strong></p>
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
                <div class="column-25 filter">
                    <div class="accordions filter">    
                        <div class="accordions_title">
                            <h3>FILTER BY CATEGORY</h3><span></span>
                        </div>
                        <div class="accordions_content">
                            <ul>
                                <?php wp_list_categories( array(
                                    'orderby'    => 'name',
                                    'title_li' => ''
                                ) ); ?> 
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="columns">
                <?php $first = true; ?>
                <?php while( have_posts() ) : the_post(); ?>
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
                                <div class="categories">
                                <?php
                                foreach((get_the_category()) as $category) { ?>
                                <?php  echo $category->cat_name . '<span>,</span> '; ?>
                                <?php } ?>
                                </div>
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
