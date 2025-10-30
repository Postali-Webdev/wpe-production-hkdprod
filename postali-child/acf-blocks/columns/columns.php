<?php 

/**
 * Banner Block template.
 *
 * @param array $block The block settings and attributes.
 */

    $layout = get_field('column_layout');
    if ($layout == '2575') {
        $column1 = '25';
        $column2 = '75';
    }
    if ($layout == '3366') {
        $column1 = '33';
        $column2 = '66';
    }
    if ($layout == '5050') {
        $column1 = '50';
        $column2 = '50';
    }
    if ($layout == '6633') {
        $column1 = '66';
        $column2 = '33';
    }
    if ($layout == '7525') {
        $column1 = '75';
        $column2 = '25';
    }

    $column1_content = get_field('column_1_content');
    $column2_content = get_field('column_2_content');
?>

<section class="columns-layout">
    <div class="container">
        <div class="columns">
            <div class="column-<?php echo $column1; ?> block">
                <?php echo $column1_content; ?>
            </div>

            <div class="column-<?php echo $column2; ?> block">
                <?php echo $column2_content; ?>
            </div>
        </div>
    </div>
</section>