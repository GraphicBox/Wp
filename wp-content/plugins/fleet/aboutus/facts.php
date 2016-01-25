<?php
$time=time();
if (isset($_GET['new-fact']) AND isset($_POST['fact-text']) AND !empty($_POST['fact-text']))
{
    $check=getimagesize($_FILES['image']['tmp_name']);
    if ($check !== false) {
        $extension=pathinfo(basename($_FILES['image']['name']),PATHINFO_EXTENSION);
        if ($extension == 'jpg') {
            $fact=$_POST['fact-text'];
            $wpdb->insert('about_facts', array('fact'=>$fact));
            $id=$wpdb->insert_id;
            move_uploaded_file($_FILES['image']['tmp_name'], '../wp-content/themes/fleet/img/facts/id'.$id.'.jpg');
            chmod('../wp-content/themes/fleet/img/facts/id'.$id.'.jpg',0777);
        }
    }
}
else if (isset($_GET['edit-fact']) AND isset($_POST['fact-text-edit']) AND isset($_POST['id']))
{
    $id=(int) $_POST['id'];
    $fact=$_POST['fact-text-edit'];
    $wpdb->query("UPDATE `about_facts` SET `fact`='$fact' WHERE `id`=$id LIMIT 1");
    $extension=pathinfo(basename($_FILES['image']['name']),PATHINFO_EXTENSION);
    if ($extension == 'jpg')
    {
        @unlink('../wp-content/themes/fleet/img/facts/id'.$id.'.jpg');
        move_uploaded_file($_FILES['image']['tmp_name'], '../wp-content/themes/fleet/img/facts/id'.$id.'.jpg');
        chmod('../wp-content/themes/fleet/img/facts/id'.$id.'.jpg',0777);
    }
}
?>

<div id="new-fact" onclick="$('#new-fact-div').toggle(300);">
    <span class="fa fa-plus"></span>
    Add new fact
</div>

<div class="clear"></div>

<div id="new-fact-div">
    <form id="fact-form" action="admin.php?page=fleet/aboutus.php&amp;u=1&amp;new-fact=1" method="post" enctype="multipart/form-data">
        <div id="upload">
            <input id="upload-img" type="file" name="image" onchange="set_image();">
        </div>
        <div id="upload-hide"></div>
        <div class="pic" onclick="$('#upload-img').click();">
            <span class="fa fa-plus"></span>
            <span class="fa fa-check hidden is-image"></span>
        </div>
        <div class="text">
            <textarea name="fact-text" placeholder="Enter fact here"></textarea>
            <div class="close" onclick="$('#new-fact-div').hide(300);"><span class="fa fa-times"></span></div>
            <div class="save" onclick="$('.deleting').show();$('form#fact-form').submit();">Save</div>
        </div>
    </form>
    <div class="deleting" style="bottom:-30px;"></div>
</div>

<?php
$query=$wpdb->get_results("SELECT `id`,`fact` FROM `about_facts`");
foreach($query as $nfo) { ?>

<div id="factid<?php echo $nfo->id; ?>" class="about-fact" onmouseover="$('.edit',this).show();" onmouseout="$('.edit',this).hide();" onclick="edit_fact(<?php echo $nfo->id; ?>);">
    <div class="picture">
        <img class="img-responsive" src="<?php echo get_bloginfo('template_directory').'/img/facts/id'.$nfo->id.'.jpg?'.$time; ?>" alt=""/>
    </div>
    <div class="fact"><?php echo $nfo->fact; ?></div>
    <div class="edit"><span class="fa fa-pencil"></span></div>
</div>

<div id="factidedit<?php echo $nfo->id; ?>" class="about-fact-edit">
    <form id="fact-form<?php echo $nfo->id; ?>" action="admin.php?page=fleet/aboutus.php&amp;u=1&amp;edit-fact=1" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $nfo->id; ?>"/>
        <div class="upload2">
            <input id="upload-img<?php echo $nfo->id; ?>" type="file" name="image" onchange="set_imageid(<?php echo $nfo->id; ?>);">
        </div>
        <div class="upload-hide2"></div>
        <div class="picture-edit" onmouseover="$('div.click',this).show();" onmouseout="$('div.click',this).hide();" onclick="$('#upload-img<?php echo $nfo->id; ?>').click();">
            <img class="img-responsive" src="<?php echo get_bloginfo('template_directory').'/img/facts/id'.$nfo->id.'.jpg?'.$time; ?>" alt=""/>
            <div class="click2"><span class="fa fa-check"></span></div>
            <div class="click">Click to change</div>
        </div>
        <div class="fact-edit">
            <textarea name="fact-text-edit" placeholder="Enter fact here"><?php echo $nfo->fact; ?></textarea>
            <div class="fact-edit-cancel" title="Cancel" onclick="edit_fact_cancel(<?php echo $nfo->id; ?>);">
                <span class="fa fa-times"></span>
            </div>
            <div class="fact-edit-save" title="Save" onclick="$('.deleting').show();$('form#fact-form<?php echo $nfo->id; ?>').submit();">
                <span class="fa fa-check"></span>
            </div>
            <div class="fact-edit-delete" title="Delete fact" onclick="if(confirm('Delete this fact?')) delete_fact(<?php echo $nfo->id; ?>);">
                <span class="fa fa-trash-o"></span>
            </div>
        </div>
    </form>
    <div class="deleting"></div>
</div>

<?php } ?>