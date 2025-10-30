<div class="column-25 filter">
    <div class="accordions filter">    
        <div class="accordions_title">
            <h3>

            <?php if(is_tax('results_category')) { ?>
            <?php $term = get_queried_object(); ?>
            <?php echo $term->name; ?>
            <?php } elseif(is_tax('results_attorney')) { ?>
            <?php $term = get_queried_object(); ?>
            <?php echo $term->name; ?>
            <?php } else { ?>
            FILTER
            <?php } ?>
 
            </h3><span></span>
        </div>
        <div class="accordions_content">

            <?php if(is_post_type_archive('resultsesp') || is_tax('results_attorney_espanol') || is_tax('results_category_esp')) { ?>
            <p>By Abogado</p>
            <ul>
                <li><a href="/espanol/resultados/abogado/jordan-hecht/">Jordan Hecht</a></li>
                <li><a href="/espanol/resultados/abogado/judd-kleeger/">Judd Kleeger</a></li>
                <li><a href="/espanol/resultados/abogado/jonathan-damashek/">Jonathan Damashek</a></li>
                <li><a href="/espanol/resultados/abogado/andrea-borden/">Andrea Borden</a></li>
            </ul>
            <?php } else { ?>
            <p>By Attorney</p>
            <ul>
                <li><a href="/case-results/attorney/jordan-hecht/">Jordan Hecht</a></li>
                <li><a href="/case-results/attorney/judd-kleeger/">Judd Kleeger</a></li>
                <li><a href="/case-results/attorney/jonathan-damashek/">Jonathan Damashek</a></li>
                <li><a href="/case-results/attorney/andrea-borden/">Andrea Borden</a></li>
            </ul>
            <?php } ?>
            <div class="spacer-15"></div>

            <?php if(is_post_type_archive('resultsesp') || is_tax('results_attorney_espanol') || is_tax('results_category_esp')) { ?>
            <p>Por categoria</p>

            
            <?php 
                // your taxonomy name
                $tax = 'results_category_esp';

                // get the terms of taxonomy
                $terms = get_terms( $tax, $args = array( 
                'hide_empty' => false, // do not hide empty terms
                ));

                    if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){                
                        echo '<ul>';
                        // loop through all terms
                        foreach( $terms as $term ) {

                            // Get the term link
                            $term_link = get_term_link( $term );

                            if( $term->count > 0 )
                                // display link to term archive
                                echo '<li><a href="' . esc_url( $term_link ) . '">' . $term->name .'</li></a>';

                            elseif( $term->count !== 0 )
                                // display name
                                echo '<li>' . $term->name .'</li>';
                        }
                        echo '</ul>';
                    }
            ?>
            


            <?php } else { ?>
                
            <p>By Category</p>
            <?php $cats = get_categories('hide_empty=0,');  // Get categories ?>

            <?php if ($cats) : ?>
                <ul>
                    <?php // Loop through categories to print name and count excluding CPTs ?>
                    <?php foreach ($cats as $cat) { 

                        // Create a query for the category to determine the number of posts
                        $category_id= $cat->term_id;
                        $category_link = $cat->slug;
                        $cat_query = new WP_Query( array( 
                            'post_type'         => 'results', 
                            'posts_per_page'    => -1,
                            'cat'               => $category_id,
                        ) );
                        $count = $cat_query->found_posts; ?>

                        <?php 
                        // output category button if category is not empty
                        if ($count != 0) { ?>
                            <li><a href="/case-results/category/<?php echo $category_link; ?>/" class="results-toggle-item"><?php echo $cat->name; ?></a></li>
                        <?php } ?>

                    <?php } ?>

                <?php wp_reset_query();  // Restore global post data  ?> 
                </ul>
                <?php endif; ?>
            <?php } ?>

        </div>
    </div>
</div>