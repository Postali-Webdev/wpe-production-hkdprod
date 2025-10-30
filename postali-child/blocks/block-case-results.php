    <?php if(is_page_template('page-category-child.php')) { 
        $query_num = '-4';
    } elseif(is_page_template('page-category.php')) { 
        $query_num = '-4';
    } ?>

    <?php 
    if (has_category('',$post->ID)) {
        $categories = get_the_category();
        $category_id = $categories[0]->cat_ID;
        $category_name = $categories[0]->cat_name;

        $result_query = new WP_Query( array(
            'posts_per_page'    => $query_num,
            'post_type'         => 'results', 
            'cat'               => $category_id,
            'order'             => 'DESC',
            'meta_key'			=> 'result_amount',
            'orderby'			=> 'meta_value_num',
        ) );
    } else {
        $result_query = new WP_Query( array(
            'posts_per_page'    => $query_num,
            'post_type'         => 'results', 
            'order'             => 'DESC',
            'meta_key'			=> 'result_amount',
            'orderby'			=> 'meta_value_num',
        ) );
    } ?>

    <?php if(is_page_template('page-category-child.php')) { ?>
    
    <section id="results-block">
        <div class="container">
            <h3>A Record of Success
            <?php if(!empty($category_name)) { ?>
                <?php 
                if (substr($category_name, -1) == 's') {
                    $new_name = rtrim($category_name, "s"); ?>
                    - <?php echo $new_name; ?> Results 
                <?php } else { ?>
                    - <?php echo $category_name; ?>
                <?php } ?>
            <?php } ?>
            </h3>
            <div class="spacer-30"></div>
            <div class="columns">
                <?php if($result_query->have_posts()) { ?>
                <?php while( $result_query->have_posts() ) : $result_query->the_post(); ?>
                <a class="column-25 result" href="<?php the_permalink(); ?>">
                    <?php $amount = get_field('result_amount'); ?>
                    <div class="result-amount">$<?php echo number_format($amount); ?></div>
                    <?php 
                    $post_categories = get_the_category();
                    $post_category = $post_categories[0]->cat_name;
                    ?>
                    <div class="result-category">
                        <?php echo $post_category; ?>
                    </div>
                </a>
                <?php endwhile; wp_reset_postdata(); ?>
                <?php } ?>
            </div>
            <div class="spacer-60"></div>
            <a href="/case-results/" class="btn">View all <?php if (!empty($new_name)) { echo $new_name; } ?> case results</a>
        </div>
    </section>

    <?php } ?>

    <?php if(is_page_template('page-category.php')) { ?>
    
    <section id="results-block">
        <div class="container">
            <div class="columns">

                <div class="column-full center">
                    <h3><?php the_field('results_content'); ?></h3>
                    <div class="spacer-30"></div>
                </div>

                <?php if($result_query->have_posts()) { ?>
                <?php while( $result_query->have_posts() ) : $result_query->the_post(); ?>
                    <a class="column-25 result" href="<?php the_permalink(); ?>">
                        <?php $amount = get_field('result_amount'); ?>
                        <div class="result-amount">$<?php echo number_format($amount); ?></div>
                        <?php 
                        $post_categories = get_the_category();
                        $post_category = $post_categories[0]->cat_name;
                        ?>
                        <div class="result-category">
                            <?php echo $post_category; ?>
                        </div>
                    </a>
                <?php endwhile; wp_reset_postdata(); ?>
                <?php } ?>

            </div>
        </div>
    </section>

    <?php } ?>