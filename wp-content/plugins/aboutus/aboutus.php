<?php
$time=time();
if (isset($_GET['new-item'])
    AND isset($_POST['top-text'])
    AND !empty($_POST['top-text'])
    AND isset($_POST['bottom-text'])
    AND !empty($_POST['bottom-text'])
    AND isset($_POST['text-bold']))
{
    $check=getimagesize($_FILES['image']['tmp_name']);
    if ($check !== false) {
        $extension=pathinfo(basename($_FILES['image']['name']),PATHINFO_EXTENSION);
        if ($extension == 'png') {
            $top_text=$_POST['top-text'];
            $bottom_text=$_POST['bottom-text'];
            $bold=(int) $_POST['text-bold'];
            if($bold==1) $wpdb->insert('aboutus', array('top'=>$top_text,'bottom'=>$bottom_text,'top_bold'=>1));
            else $wpdb->insert('aboutus', array('top'=>$top_text,'bottom'=>$bottom_text,'bottom_bold'=>1));
            $id=$wpdb->insert_id;
            move_uploaded_file($_FILES['image']['tmp_name'], '../wp-content/uploads/about_icons/id'.$id.'.png');
            chmod('../wp-content/uploads/about_icons/id'.$id.'.png',0777);
        }
    }
}
else if (isset($_GET['edit-item'])
    AND isset($_POST['top-text'])
    AND !empty($_POST['top-text'])
    AND isset($_POST['bottom-text'])
    AND !empty($_POST['bottom-text'])
    AND isset($_POST['text-bold'])
    AND isset($_POST['id']))
{
    $id=(int) $_POST['id'];
    $top_text=$_POST['top-text'];
    $bottom_text=$_POST['bottom-text'];
    $bold=(int) $_POST['text-bold'];
    if($bold==1) $wpdb->query("UPDATE `aboutus` SET `top`='$top_text',`bottom`='$bottom_text',`top_bold`=1,`bottom_bold`=0 WHERE `id`=$id LIMIT 1");
    else $wpdb->query("UPDATE `aboutus` SET `top`='$top_text',`bottom`='$bottom_text',`top_bold`=0,`bottom_bold`=1 WHERE `id`=$id LIMIT 1");
    $extension=pathinfo(basename($_FILES['image']['name']),PATHINFO_EXTENSION);
    if ($extension == 'png')
    {
        @unlink('../wp-content/uploads/about_icons/id'.$id.'.png');
        move_uploaded_file($_FILES['image']['tmp_name'], '../wp-content/uploads/about_icons/id'.$id.'.png');
        chmod('../wp-content/uploads/about_icons/id'.$id.'.png',0777);
    }
}
?>

<div id="nav-top">
    <h1>ABOUT US</h1>
</div>

<div id="about-body">
    <div id="new-fact" onclick="jQuery('#new-fact-div').slideToggle();">
        <span class="fa fa-plus"></span>
        Add new item
    </div>

    <div class="clear"></div>
    
    <div id="new-fact-div">
        <form id="about-form" action="admin.php?page=aboutus/aboutus.php&amp;new-item=1" method="post" enctype="multipart/form-data">
            <div id="upload">
                <input id="upload-img" type="file" name="image" onchange="set_image();">
            </div>
            <div id="upload-hide"></div>
            <div class="pic" onclick="jQuery('#upload-img').click();">
                <span class="fa fa-plus"></span>
                <span class="fa fa-check hidden is-image"></span>
            </div>
            <div class="red-line"></div>
            <div class="text">
                <input type="text" name="top-text" placeholder="Top text" /> <br>
                <input type="text" name="bottom-text" placeholder="Bottom text" />
                <div class="radio-btn one">
                    <input type="radio" name="text-bold" value="1" checked onclick="make_bold(1);" />
                    <div>bold</div>
                </div>
                <div class="radio-btn two">
                    <input type="radio" name="text-bold" value="2" onclick="make_bold(2);" />
                    <div class="hidden">bold</div>
                </div>
            </div>
            <div class="save" onclick="jQuery('#loading').show();jQuery('form#about-form').submit();">Save</div>
            <div class="cancel" onclick="jQuery('#new-fact-div').hide(300);">Cancel</div>
        </form>
    </div>
    
    <div id="item-list">
        <?php
        $query=$wpdb->get_results("SELECT `id`,`top`,`bottom`,`top_bold`,`bottom_bold` FROM `aboutus` ORDER BY `id` ASC");
        foreach($query as $nfo) { ?>
            <div id="item<?php echo $nfo->id; ?>" class="body cran1" onclick="edit_item(<?php echo $nfo->id; ?>);">
                <div class="picture">
                    <img src="../wp-content/uploads/about_icons/id<?php echo $nfo->id.'.png?'.$time; ?>" alt=""/>
                </div>
                <div class="red-line"></div>
                <p<?php if($nfo->top_bold==1) echo ' class="bold"'; ?>>
                    <?php echo $nfo->top; ?>
                </p>
                <p<?php if($nfo->bottom_bold==1) echo ' class="bold"'; ?>>
                    <?php echo $nfo->bottom; ?>
                </p>
            </div>
            
            <div id="item-edit<?php echo $nfo->id; ?>" class="body hidden cran2" style="cursor:default;">
                <form id="item-form<?php echo $nfo->id; ?>" action="admin.php?page=aboutus/aboutus.php&amp;edit-item=1" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $nfo->id; ?>"/>
                    <div class="upload2">
                        <input id="upload-img<?php echo $nfo->id; ?>" type="file" name="image" onchange="set_imageid(<?php echo $nfo->id; ?>);">
                    </div>
                    <div class="upload-hide2"></div>
                    <div class="picture-edit" onmouseover="jQuery('div.click',this).show();" onmouseout="jQuery('div.click',this).hide();" onclick="jQuery('#upload-img<?php echo $nfo->id; ?>').click();">
                        <img src="../wp-content/uploads/about_icons/id<?php echo $nfo->id.'.png?'.$time; ?>" alt=""/>
                        <div class="click2"><span class="fa fa-check"></span></div>
                        <div class="click">Click to change</div>
                    </div>
                    <div class="red-line"></div>
                    <p<?php if($nfo->top_bold==1) echo ' class="bold"'; ?>>
                        <input type="text" name="top-text" value="<?php echo $nfo->top; ?>" placeholder="Top text" />
                    </p>
                    <p<?php if($nfo->bottom_bold==1) echo ' class="bold"'; ?>>
                        <input type="text" name="bottom-text" value="<?php echo $nfo->bottom; ?>" placeholder="Bottom text" />
                    </p>
                    
                    <div class="radio-btn2 one">
                        <input type="radio" name="text-bold" value="1"<?php if($nfo->top_bold) echo 'checked'; ?> onclick="make_bold2(1,<?php echo $nfo->id; ?>);" />
                        <div<?php if(!$nfo->top_bold) echo ' class="hidden"'; ?>>bold</div>
                    </div>
                    <div class="radio-btn2 two">
                        <input type="radio" name="text-bold" value="2"<?php if($nfo->bottom_bold) echo 'checked'; ?> onclick="make_bold2(2,<?php echo $nfo->id; ?>);" />
                        <div<?php if(!$nfo->bottom_bold) echo ' class="hidden"'; ?>>bold</div>
                    </div>
                    
                    <div class="save-btn" onclick="jQuery('#loading').show();jQuery('form#item-form<?php echo $nfo->id; ?>').submit();">Save</div>
                    <div class="cancel-btn" onclick="jQuery('#item<?php echo $nfo->id; ?>').show();jQuery('#item-edit<?php echo $nfo->id; ?>').hide();">Cancel</div>
                </form>
                <div class="delete" title="Delete item" onclick="if(confirm('Delete this item?')) delete_item(<?php echo $nfo->id; ?>);">
                    <span class="fa fa-trash-o"></span>
                </div>
            </div>
        <?php } ?>
    </div>

</div>
<div id="loading"></div>