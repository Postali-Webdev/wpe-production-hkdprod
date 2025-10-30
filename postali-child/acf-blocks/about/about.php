<?php 

$aboutColumns = get_field('column_layout');
if ($aboutColumns == '5050') {
    $column1 = "50";
    $column2 = "50";
} elseif ($aboutColumns == '6633') {
    $column1 = "66";
    $column2 = "33";
}

?>

<div id="about">
    <div class="columns">
        <div class="column-<?php echo $column1; ?>">
            <p><?php the_field('about_copy'); ?></p>
        </div>
        <div class="column-<?php echo $column2; ?>" id="attorney-img">
            <div class="attorney_blocks">
            <?php if( have_rows('attorneys') ): ?>
            <?php while( have_rows('attorneys') ) : the_row(); 
                $page_id = url_to_postid(get_sub_field('link')); ?>
                <a href="<?php the_sub_field('link'); ?>">
                    <?php $attorney_img = get_sub_field('image'); ?>
                    <?php if( !empty( $attorney_img ) ): ?>
                        <div class="attorney-wrapper">
                            <img src="<?php echo esc_url($attorney_img['url']); ?>" alt="<?php echo esc_attr($attorney_img['alt']); ?>" class="attorney-img" />
                            <p class="attorney-name"><?php echo get_the_title($page_id); ?></p>
                        </div>
                    <?php endif; ?>
                </a>
            <?php endwhile; ?>
            <?php endif; ?>
            </div>
        </div>
    </div>
</div>