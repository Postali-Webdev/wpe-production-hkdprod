<div class="steps">
    <?php $n=1; ?>
    <?php if( have_rows('steps_process') ): ?>
        <?php while( have_rows('steps_process') ): the_row(); ?> 
            <div class="step">
                <div class="step-box">
                    <div class="number"><?php echo $n; ?></div>
                </div>
                <p><?php the_sub_field('step_title'); ?></p>
            </div>
            <?php $n++; ?>
        <?php endwhile; ?>
    <?php endif; ?> 
</div>