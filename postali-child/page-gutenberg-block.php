<?php
/*
Template Name: PPC Block Editor Template
*/

get_header();

$block_content = do_blocks( '
<!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group">
<!-- wp:post-content /-->
</div>
<!-- /wp:group -->'
);

?>

<div class="body-container">

    <?php echo $block_content; ?>

</div>

<section class="footer-block">
    <div class="container">
        <div class="columns">
            <div class="column-full">
                <a href="/" class="custom-logo-link" rel="home" aria-current="page">
                    <img width="610" height="220" src="/wp-content/uploads/2024/08/HKD-Logo-final-Personal-Injury-Lawyers-Horizontal.jpg" class="custom-logo" alt="HKD Logo" decoding="async" fetchpriority="high">
                </a>
            </div>
        </div>
    </div>    
</section>

<?php get_footer(); ?>