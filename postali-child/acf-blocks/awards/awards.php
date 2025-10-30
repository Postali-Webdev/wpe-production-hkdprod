<div id="our-awards">
    <div class="container">
        <div class="columns">
            <div class="column-full centered">
            <?php if( have_rows('awards') ): ?>
            <?php while( have_rows('awards') ) : the_row(); ?>
            <?php $award_img = get_sub_field('awards_image'); ?>
                <?php if( !empty( $award_img ) ): ?>
                    <img src="<?php echo esc_url($award_img['url']); ?>" alt="<?php echo esc_attr($award_img['alt']); ?>" class="award-img" />
                <?php endif; ?>
            <?php endwhile; ?>
            <?php endif; ?>
            </div>
        </div>
    </div>
</div>