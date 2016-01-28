<?php

$facts = get_post_meta( 83, 'fastf', true );

?>
<div id="facts-wrap">
    <?php
    foreach($facts as $fact) { ?>
        <div class="col-md-6 fact-block">
            <div class="picture">
                <img class="img-responsive" src="<?php echo wp_get_attachment_url($fact['image']); ?>" alt=""/>
            </div>
            <div class="fact"><?php echo $fact['text']; ?></div>
        </div>
    <?php } ?>
</div>