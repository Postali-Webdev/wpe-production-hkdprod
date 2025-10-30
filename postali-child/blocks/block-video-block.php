<div class="video">
    <p class="accent"><?php the_sub_field('video_title'); ?></p>
    <div class="video-box">
        <div class="share-embed">
            <div class="video-embed">
                <iframe class="responsive-video" width="560" height="315" src="https://www.youtube.com/embed/<?php the_sub_field('video_id'); ?>?rel=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>
            <div class="share">
                <span class="text">Share to:</span>  
                <a href="http://www.facebook.com/dialog/share?app_id=87741124305&href=https%3A//youtube.com/watch%3Fv%3D<?php the_sub_field('video_id'); ?>%26si%3DCgCMtYFU3kE7LgeN&display=popup" target="blank"><span class="icon-footer-facebook-icon"></span></a> &nbsp;
                <a href="https://twitter.com/intent/tweet?url=https%3A//youtu.be/<?php the_sub_field('video_id'); ?>%3Fsi%3DCgCMtYFU3kE7LgeN&text=About%20the%20New%20York%20City%20Law%20Firm%20of%20Hecht%2C%20Kleeger%20%26%20Damashek%2C%20P.C.&via=YouTube&related=YouTube,YouTubeTrends,YTCreators" target="blank"><span class="icon-footer-twitter-icon"></span></a>
            </div>
        </div>
        <?php if( have_rows('video_highlights') ): ?>
        <div class="video-highlights">
            <p class="spaced caps bottom-15"><strong>Video Highlights</strong></p>
            <ul>
            <?php while( have_rows('video_highlights') ): the_row(); ?>  
                <li><?php the_sub_field('highlight'); ?></li>
            <?php endwhile; ?>
            </ul>
            </p>
        </div>
        <?php endif; ?>


    </div>

    <?php if(get_sub_field('transcript_intro')) { ?>
    <div class="spacer-30"></div>
    <p class="large spaced caps bottom-15"><strong>Video Transcript</strong></p>
    <div class="content-box">
        <p><?php the_sub_field('transcript_intro'); ?><span class="ellipsis visible"> ...</span>
        <span class="extra closed"><?php the_sub_field('transcript_remainder'); ?></p>
        <div class="transcript-more"><div class="plus"><span>+</span></div> <p class="small spaced caps">Read Full Video Transcript</p></div>
    </div>
    <?php } ?>

</div>