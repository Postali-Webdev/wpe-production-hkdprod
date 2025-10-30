<div id="results" class="grey">
    <div class="container">
        <div class="columns">
            <?php if(is_tree(17923)) { 
                $result_args = array( 
                    'posts_per_page'    => 3,
                    'post_type'         => 'resultsesp', 
                    'order'             => 'DESC',
                    'meta_key'			=> 'result_amount',
                    'orderby'			=> 'meta_value_num',
                );
                if( get_field('results_category') !== 'default' ) {
                    $result_args['tax_query'] = [array(
                        'taxonomy' => 'results_category',
                        'field' => 'slug',
                        'terms' => get_field('results_category')
                    )];    
                }
                $result_query = new WP_Query( $result_args );
                $btn_copy = 'LEER MÁS RESULTADOS DE CASOS';

            } else {
                $result_args = array(
                    'posts_per_page'    => 3,
                    'post_type'         => 'results', 
                    'order'             => 'DESC',
                    'meta_key'			=> 'result_amount',
                    'orderby'			=> 'meta_value_num',
                );
                if( get_field('results_category') !== 'default' ) {
                    $result_args['tax_query'] = [array(
                            'taxonomy' => 'results_category',
                            'field' => 'slug',
                            'terms' => get_field('results_category')
                    )];    
                }
                $result_query = new WP_Query( $result_args );
                $btn_copy = 'READ MORE CASE RESULTS';
            } ?>
            <div class="column-25 result-cta desktop">
                <div class="cta-container">
                    <p class="large"><strong><?php the_field('results_cta'); ?></strong></p>
                    <a href="/case-results/" class="btn"><?php echo $btn_copy; ?></a>
                </div>
            </div>
            <?php if($result_query->have_posts()) { ?>
            <?php while( $result_query->have_posts() ) : $result_query->the_post(); ?>
            <a class="column-25 result" href="<?php the_permalink(); ?>">
                <?php $amount = get_field('result_amount', get_the_ID()); ?>
                <div class="result-amount">$<?php echo number_format($amount); ?></div>
                <div class="result-category">
                    <?php
                        $terms = get_the_terms( get_the_ID(), 'results_category');
                        foreach($terms as $term) {
                            echo $term->name;
                        }
                    ?>
                </div>
            </a>
            <?php endwhile; wp_reset_postdata(); ?>
            <?php } ?>
            <div class="column-25 result-cta mobile">
                <div class="spacer-15"></div>
                <div class="cta-container">
                    <p class="large"><strong><?php the_field('results_cta'); ?></strong></p>
                    <a href="/case-results/" class="btn"><?php echo $btn_copy; ?></a>
                </div>
            </div>                
        </div>
    </div>
</div>