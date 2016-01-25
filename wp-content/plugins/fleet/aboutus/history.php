<?php
$time=time();
if (isset($_GET['new-event']) AND isset($_POST['event-text']) AND isset($_POST['event-year']) AND (!empty($_POST['event-text'])))
{
    $check=@getimagesize($_FILES['image']['tmp_name']);
    if ($check !== false) {
        $extension=pathinfo(basename($_FILES['image']['name']),PATHINFO_EXTENSION);
        if ($extension == 'jpg') {
            $year=(int) $_POST['event-year'];
            $text=$_POST['event-text'];
            $wpdb->insert('about_history', array('year'=>$year,'text'=>$text));
            $id=$wpdb->insert_id;
            move_uploaded_file($_FILES['image']['tmp_name'], '../wp-content/themes/fleet/img/history/id'.$id.'.jpg');
            chmod('../wp-content/themes/fleet/img/history/id'.$id.'.jpg',0777);
        }
    }
}
else if (isset($_GET['edit-event']) AND isset($_POST['event-text']) AND isset($_POST['event-year']) AND isset($_POST['id']))
{
    $id=(int) $_POST['id'];
    $text=$_POST['event-text'];
    $year=(int) $_POST['event-year'];
    $wpdb->query("UPDATE `about_history` SET `year`='$year',`text`='$text' WHERE `id`=$id LIMIT 1");
    $extension=pathinfo(basename($_FILES['image']['name']),PATHINFO_EXTENSION);
    if ($extension == 'jpg')
    {
        @unlink('../wp-content/themes/fleet/img/history/id'.$id.'.jpg');
        move_uploaded_file($_FILES['image']['tmp_name'], '../wp-content/themes/fleet/img/history/id'.$id.'.jpg');
        chmod('../wp-content/themes/fleet/img/history/id'.$id.'.jpg',0777);
    }
}
?>

<div id="new-fact" onclick="$('#new-event-div').toggle(300);">
    <span class="fa fa-plus"></span>
    Add new event
</div>

<div class="clear"></div>

<div id="new-event-div">
    <form id="event-form" action="admin.php?page=fleet/aboutus.php&amp;u=2&amp;new-event=1" method="post" enctype="multipart/form-data">
        <div>
            <input id="upload-img" type="file" name="image">
        </div>
        <div>
            <input type="text" name="event-year" style="width:70px;" placeholder="Year" />
        </div>
        <div>
            <textarea name="event-text" placeholder="Type event here"></textarea>
        </div>
        <div class="close-button" onclick="$('#new-event-div').hide(300);"><span class="fa fa-times"></span></div>
        <div class="save-button" onclick="$('.deleting').show();$('form#event-form').submit();">Save</div>
    </form>
    <div class="deleting" style="bottom:-30px;"></div>
</div>

<?php
$i=1;
$query=$wpdb->get_results("SELECT `id`,`year`,`text` FROM `about_history`");
foreach($query as $nfo) {
?>

<div style="margin-bottom:20px;">
    <div id="event<?php echo $nfo->id; ?>" class="history-row" style="background-image:url('<?php echo get_bloginfo('template_directory').'/img/history/id'.$nfo->id.'.jpg?'.$time; ?>');" onclick="edit_event(<?php echo $nfo->id; ?>);">
        <?php echo $nfo->text; ?>
        <div class="history-year"><?php echo $nfo->year; ?></div>
    </div>
    
    <div id="eventedit<?php echo $nfo->id; ?>" class="history-row2" style="background-image:url('<?php echo get_bloginfo('template_directory').'/img/history/id'.$nfo->id.'.jpg?'.$time; ?>');">
        <form id="event-form<?php echo $nfo->id; ?>" action="admin.php?page=fleet/aboutus.php&amp;u=2&amp;edit-event=1" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $nfo->id; ?>" />
            <div class="upload2">
                <input id="upload-img<?php echo $nfo->id; ?>" type="file" name="image" onchange="set_event_imageid(<?php echo $nfo->id; ?>);">
            </div>
            <div class="upload-hide2"></div>
            <textarea name="event-text" placeholder="Type event here"><?php echo $nfo->text; ?></textarea>
            <div class="history-year">
                <input type="text" name="event-year" value="<?php echo $nfo->year; ?>" placeholder="Year" />
                <div class="edit-items">
                    <span class="fa fa-times" title="Cancel" onclick="cancel_event_edit(<?php echo $nfo->id; ?>);"></span>
                    <span class="fa fa-camera picture-selected" title="Change picture" onclick="$('#upload-img<?php echo $nfo->id; ?>').click();"></span>
                    <span class="fa fa-check" title="Save" onclick="$('.deleting').show();$('#event-form<?php echo $nfo->id; ?>').submit();"></span>
                    <span class="fa fa-trash-o delete-item" title="Delete event" onclick="if(confirm('Delete this event?')) delete_event(<?php echo $nfo->id; ?>);"></span>
                </div>
            </div>
        </form>
        <div class="deleting event-deleting"></div>
    </div>
</div>

<?php $i++; } ?>