<?php 

/**
 * Slider Block template.
 *
 * @param array $block The block settings and attributes.
 */

    $section_headline = get_field('map_section_headline');
    $map_embed = get_field('map_embed_code');

?>

<section id="map-block">
    <div class="container">
        <div class="columns">
            <div class="column-full">
                <h2><?php echo $section_headline; ?></h2>
                <iframe src="<?php echo $map_embed; ?>" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</section>