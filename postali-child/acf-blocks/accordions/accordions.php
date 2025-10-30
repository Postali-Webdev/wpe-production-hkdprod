<?php 

/**
 * Banner Block template.
 *
 * @param array $block The block settings and attributes.
 */

    $section_headline = get_field('accordions_section_headline');
?>

<section id="accordions-block">
    <div class="container">
        <div class="columns">
            <div class="column-full">
            <h2><?php echo $section_headline; ?></h2>
            <?php if( have_rows('accordions') ): ?>
            <?php while( have_rows('accordions') ): the_row(); ?>  
                <div class="accordions">
                    <div class="accordions_title">
                        <h3><?php the_sub_field('accordion_title'); ?></h3>
                        <p><span></span></p>
                    </div>
                    <div class="accordions_content">
                        <p><?php the_sub_field('accordion_content'); ?></p>
                    </div>
                </div>
            <?php endwhile; ?>
            <?php endif; ?> 
            </div>
        </div>
    </div>
</section>