<?php
/**
 * Case Results Archive
 *
 * @package Postali Parent
 * @author Postali LLC
 */

$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

$results_query = new WP_Query( 
	array(
		'post_type' => 'resultsesp', 
		'paged' => $paged,
		'post_status'    => 'publish',
		'meta_key' => 'result_amount',
		'orderby' => 'meta_value_num',
		'order'	=> 'DESC',
	) 
);

get_header(); ?>

<div class="body-container">

    <section id="banner">
        <div class="container">
        <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?> 
            <div class="columns">
                <div class="column-full centered block">
                    <h1>Resultados del caso</h1>
                    <p><strong>Un historial de éxito: luchamos por los mejores resultados posibles para nuestros clientes.</strong></p>
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

    <section id="results-block">
        <div class="spacer-60"></div>
        <div class="container">
            <div class="columns">
                <?php get_template_part('blocks/block','results-filter'); ?>
            </div>
            <div class="columns">
            <?php while ( $results_query->have_posts() ) : $results_query->the_post(); ?>

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
