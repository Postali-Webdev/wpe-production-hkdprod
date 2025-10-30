<section id="prefooter">
    <div class="container">
        <div class="columns">
            <div class="column-50 block">
                <?php if(get_field('prefooter_headline')) { ?>
                    <h2><?php the_field('prefooter_headline'); ?></h2>
                <?php } else { ?>
                    <?php if (is_tree('17923') || (is_singular('attorneysesp'))) { ?>
                    <h2><?php the_field('prefooter_headline_esp','options'); ?></h2>
                    <?php } else { ?>
                    <h2><?php the_field('prefooter_headline','options'); ?></h2>
                    <?php } ?>
                <?php } ?>

                <?php if(get_field('prefooter_copy')) { ?>
                    <?php the_field('prefooter_copy'); ?>
                <?php } else { ?>
                    <?php if (is_tree('17923') || (is_singular('attorneysesp'))) { ?>
                        <?php the_field('prefooter_copy_esp','options'); ?>
                    <?php } else { ?>
                        <?php the_field('prefooter_copy','options'); ?>
                    <?php } ?>
                <?php } ?>

                <?php if(get_field('prefooter_cta')) { ?>
                    <p><strong><?php the_field('prefooter_cta'); ?></strong></p>
                <?php } else { ?>
                    <?php if(!is_404()) { ?>
                    <?php if (is_tree('17923') || (is_singular('attorneysesp'))) { ?>
                    <p><strong>Llame a HKD hoy</strong></p>
                    <?php } else { ?>
                    <p><strong><?php the_field('prefooter_cta','options'); ?></strong></p>
                    <?php } ?>
                    <?php } elseif(is_404()) { ?>
                    <p><strong><?php the_field('prefooter_cta','options'); ?></strong></p>
                    <?php } ?>
                <?php } ?>

                <a href="tel:<?php the_field('global_phone_number','options'); ?>" class="btn"><?php the_field('global_phone_number','options'); ?></a>
            </div>
            <div class="column-50">
                <?php if(!is_404()) { ?>
                    <?php if (is_tree('17923') || (is_singular('attorneysesp'))) { ?>
                    <p class="large bottom-0"><strong>Solicite una consulta gratuita</strong></p>
                    <?php echo do_shortcode('[gravityform id="6" title="false" description="false"]'); ?>
                    <?php } else { ?>
                    <p class="large bottom-0"><strong>Request A Free Consultation</strong></p>
                    <?php echo do_shortcode('[gravityform id="2" title="false" description="false"]'); ?>
                    <?php } ?>
                <?php } elseif(is_404()) { ?>
                    <p class="large bottom-0"><strong>Request A Free Consultation</strong></p>
                    <?php echo do_shortcode('[gravityform id="2" title="false" description="false"]'); ?>
                <?php } ?>
            </div>
        </div>
    </div>
</section>

