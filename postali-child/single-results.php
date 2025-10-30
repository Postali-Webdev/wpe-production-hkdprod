<?php
/**
 * Single template
 *
 * @package Postali Parent
 * @author Postali LLC
 */

$results_query = new WP_Query( 
	array(
		'post_type' => 'results', 
		'paged' => $paged,
		'post_status'    => 'publish',
		'order'	=> 'DESC',
        'posts_per_page' => 3,
	) 
);

get_header();?>

<div class="body-container">

    <section id="banner">
        <div class="container">
        <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?> 
            <div class="columns">
                <div class="column-66">
                    <p class="large"><span><?php the_date(); ?></span></p>
                    <h1><?php the_title(); ?></h1>
                </div>
                <div class="spacer-break"></div>
                <div class="column-66">
                    
                    <p class="large"><span>Categories:</span><br>
                    <?php
                        $terms = get_the_terms( $post->ID, 'results_category');
                        foreach($terms as $term) {
                            echo '<a href="' . get_term_link($term) . '">' . $term->name . '</a><span class="comma">, </span>';
                        }
                    ?>
                    </p>
                    <article>
                        <?php the_content(); ?>
                    </article>				
                </div>
                <div class="column-33 sidebar">
                    <p class="blue"><strong>Recent Case Results</strong></p>
                    <?php while ( $results_query->have_posts() ) : $results_query->the_post(); ?>
                    <a href="<?php the_permalink(); ?>" class="posts"><?php the_title(); ?></a>
                    <?php endwhile; ?>
                    <div class="spacer-15"></div>
                    <p><a href="/case-results/">All Case Results</a></p>
                </div>
            </div>
        </div>
    </section>

</div>

<?php get_footer(); ?>