   <div id="video-embed">
    <div class="container">
        <div class="video-embed">
            <iframe class="responsive-video" width="560" height="315" src="https://www.youtube.com/embed/<?php the_field('video_id'); ?>?rel=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>
        <?php if(get_field('video_transcript_intro')) { ?>
            <div class="spacer-30"></div>
            <p class="large spaced caps bottom-0"><strong>Video Transcript</strong></p>
            <div class="content-box">
                <p><?php the_field('video_transcript_intro'); ?><span class="ellipsis visible"> ...</span>
                <span class="extra closed"><?php the_field('video_transcript_remainder'); ?></p>
                <div class="transcript-more"><div class="plus"><span>+</span></div> <p class="small spaced caps">Read Full Video Transcript</p></div>
            </div>
        <?php } ?>
    </div>
</div>