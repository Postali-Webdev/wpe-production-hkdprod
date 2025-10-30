<?php
/**
 * Case Results Archive
 *
 * @package Postali Parent
 * @author Postali LLC
 */

 $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
			
 $queried_object = get_queried_object () ;
 
 $custom_query = new WP_Query( 

    array(
        'post_type' => 'resultsesp', 
        'offset' => 0,  
        'posts_per_page' => -1,
        'paged' => $paged,
        'post_status'    => 'publish',
        'meta_key' => 'result_amount',
        'orderby' => 'meta_value_num',
        'order'	=> 'DESC',
        'tax_query' => array (
            array (
                'taxonomy' => $queried_object->taxonomy,
                'field' => 'slug',
                'terms' => $queried_object->slug,
                ),
            ),
        ) 
    );

get_header(); ?>

<div class="body-container">

    <section id="banner">
        <div class="container">
        <p id="breadcrumbs"><span><span><a href="/">Home</a></span> » <a href="/espanol/resultados-del-caso/">Resultados del caso</a></span> » <span class="breadcrumb_last" aria-current="page"><?php echo single_term_title(); ?></span></span></p>
            <div class="columns">
                <div class="column-full centered block">
                    <h1>Resultados del caso - <?php echo single_term_title(); ?></h1>
                    <p><strong>Un historial de éxito: luchamos por los mejores resultados posibles para nuestros clientes.</strong></p>
                    <p class="xlarge"><strong>Revisión gratuita de casos</strong></p>
                    <a href="tel:<?php the_field('global_phone_number','options'); ?>" class="btn"><?php the_field('global_phone_number','options'); ?></a>
                    <div class="scroll">
                        <p class="small">SCROLL</p>
                        <span class="icon-down-arrow"></span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="results-block">
        <div class="spacer-60"></div>
        <div class="container">
            <div class="columns">
                <?php get_template_part('blocks/block','results-filter'); ?>
            </div>
            <div class="columns">
            <?php while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>

            <a class="column-25 result" href="<?php the_permalink(); ?>">
                <?php $amount = get_field('result_amount'); ?>
                <div class="result-amount">$<?php echo number_format($amount); ?></div>
                <?php 
                $terms = wp_get_post_terms( $post->ID, 'results_category_esp' );
                ?>
                <div class="result-category">
                <?php 
                foreach( $terms as $term){
                    echo $term->name;
                } ?>
                </div>
                <span class="icon-right-arrow"></span>
            </a>

            <?php endwhile; ?>
            <?php the_posts_pagination(); ?>
            </div>
        </div>
    </section>

</div>

<?php get_footer();
