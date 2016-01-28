<?php
if (isset($_GET['new-ship']) AND isset($_POST['ship-text']) AND !empty($_POST['ship-text']))
{
    $text=$_POST['ship-text'];
    $wpdb->insert('about_ships', array('text'=>$text));
}
else if (isset($_GET['edit-ship']) AND isset($_POST['ship-text-edit']) AND isset($_POST['id']))
{
    $id=(int) $_POST['id'];
    $text=$_POST['ship-text-edit'];
    $wpdb->query("UPDATE `about_ships` SET `text`='$text' WHERE `id`=$id LIMIT 1");
}
?>

<div id="new-fact" onclick="$('#new-ship-div').toggle(300);">
    <span class="fa fa-plus"></span>
    Add new ship
</div>

<div class="clear"></div>

<div id="new-ship-div">
    <form id="ship-form" action="admin.php?page=fleet/aboutus.php&amp;u=3&amp;new-ship=1" method="post">
        <div class="text">
            <textarea name="ship-text" placeholder="Type ship text here"></textarea>
            <div class="close-button2" onclick="$('#new-ship-div').hide(300);"><span class="fa fa-times"></span></div>
            <div class="save-button2" onclick="$('.deleting').show();$('form#ship-form').submit();">Save</div>
        </div>
    </form>
    <div class="deleting" style="bottom:-30px;"></div>
</div>

<?php
$query=$wpdb->get_results("SELECT `id`,`text` FROM `about_ships`");
foreach($query as $nfo) {
?>

<div id="ship<?php echo $nfo->id; ?>" class="ships-row" onclick="edit_ship(<?php echo $nfo->id; ?>);">
    <div class="first"><span class="fa fa-chevron-right"></span></div>
    <div class="second"><?php echo $nfo->text; ?></div>
</div>

<div id="shipedit<?php echo $nfo->id; ?>" class="ships-row2">
    <form id="ship-form<?php echo $nfo->id; ?>" action="admin.php?page=fleet/aboutus.php&amp;u=3&amp;edit-ship=1" method="post">
        <input type="hidden" name="id" value="<?php echo $nfo->id; ?>"/>
        <div class="first"><span class="fa fa-chevron-down"></span></div>
        <div class="second">
            <textarea name="ship-text-edit" placeholder="Type ship text here"><?php echo $nfo->text; ?></textarea>
            <div class="ship-edit-cancel" title="Cancel" onclick="edit_ship_cancel(<?php echo $nfo->id; ?>);">
                <span class="fa fa-times"></span>
            </div>
            <div class="ship-edit-save" title="Save" onclick="$('.deleting').show();$('form#ship-form<?php echo $nfo->id; ?>').submit();">
                <span class="fa fa-check"></span>
            </div>
            <div class="ship-edit-delete" title="Delete ship" onclick="if(confirm('Delete this ship?')) delete_ship(<?php echo $nfo->id; ?>);">
                <span class="fa fa-trash-o"></span>
            </div>
        </div>
    </form>
    <div class="deleting"></div>
</div>

<?php } ?>