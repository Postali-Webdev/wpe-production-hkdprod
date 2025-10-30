<?php 

/**
 * Banner Block template.
 *
 * @param array $block The block settings and attributes.
 */

    $cta_headline = get_field('cta_headline');
    $cta_text = get_field('cta_text');
    $cta_button_text = get_field('cta_button_text');
    $cta_button_link = get_field('cta_button_link');
    $cta_button_cta_text = get_field('cta_button_cta_text');
?>

<section class="cta">
    <div class="container">
        <div class="columns">
            <div class="ppc-cta-block">
                <?php if($cta_headline) { ?>
                <h2><?php echo $cta_headline; ?></h2>
                <?php } ?>
                <p><?php echo $cta_text; ?></p>
                <a href="<?php echo $cta_button_link; ?>" class="btn"><?php echo $cta_button_text; ?></a> <p><?php echo $cta_button_cta_text; ?></p>
            </div>
        </div>
    </div>
</section>