<?php
$i=1;
$posts = get_post_meta( 85, 'history', true );

foreach($posts as $pt) {
?>

<div class="row history-row fadable-content">
    <?php if($i%2==0) {echo '<div class="col-md-6"></div>';$pre=' line-left';}else $pre=''; ?>
    <div class="col-md-6" style="padding:0;">
        <div class="history-pic" style="background-image:url('<?php  echo wp_get_attachment_url($pt['image']); ?>');">
            <?php
          
            echo $pt['text'];
            ?>
            <div class="history-year<?php echo $pre; ?>"><?php echo $pt['year']; ?></div>
            <div class="history-line<?php echo $pre; ?>"></div>
        </div>
    </div>
</div>

<?php $i++; } ?>

<div id="on-top">
    <div onclick="$('html,body').animate({scrollTop:$('#our-history-top').offset().top},500);">
        <span class="fa fa-chevron-up"></span><br>
        ON TOP
    </div>
</div>