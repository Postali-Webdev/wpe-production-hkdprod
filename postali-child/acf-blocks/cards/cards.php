<div id="cards">
    <div class="columns">
        <?php if( have_rows('cards') ): ?>
            <?php while( have_rows('cards') ): the_row(); ?> 
                <div class="column-33">
                    <p class="xlarge blue"><strong><?php the_sub_field('title'); ?></strong></p>
                    <p><?php the_sub_field('copy'); ?></p>
                </div>
            <?php $n++; ?>
            <?php endwhile; ?>
        <?php endif; ?> 
    </div>
</div>    