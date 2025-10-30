    <section class="awards">
        <div class="container">
            <p><strong><?php the_field('awards_block_headline','options'); ?></strong></p>
            <div class="columns">
            <?php if( have_rows('awards','options') ): ?>
                <div id="awards">
                <?php while( have_rows('awards','options') ): the_row(); ?>  
                
                    <div class="award-img">
                    <?php 
                    $award = get_sub_field('award_image');
                    if( !empty( $award ) ) { ?>
                        <img src="<?php echo esc_url($award['url']); ?>" alt="<?php echo esc_attr($award['alt']); ?>" />
                    <?php }?>
                    </div>
                
                <?php endwhile; ?>
                </div>
            <?php endif; ?> 
            </div>
        </div>
    </section>