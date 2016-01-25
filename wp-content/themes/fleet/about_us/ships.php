<?php
$ships = get_post_meta(87, 'ships', true );
foreach($ships as $ship) {
?>

<div class="row ships-row">
    <div class="first"><span class="fa fa-chevron-right"></span></div>
    <div class="second"><?php echo $ship['text']; ?></div>
</div>

<?php } ?>