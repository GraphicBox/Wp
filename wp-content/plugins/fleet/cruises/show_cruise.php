<?php
$id=(int) $_GET['id'];
$query=$wpdb->get_results("SELECT `title`,`description`,`details` FROM `cruises` WHERE `id`=$id LIMIT 1");
$nfo=$query[0];
if ($nfo->title != '') {
?>
<div id="cruise-right-side">
    <div class="c-wrap">
        
        <form id="edit-cruise-form" action="admin.php?page=fleet/cruises.php&amp;edit-cruise=1&amp;id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
            <input id="remove-photos" type="hidden" name="remove-photos" value="" />
            <div class="title">
                <input id="edit-cruise-title" type="text" name="edit-cruise-title" placeholder="Cruise name" value="<?php echo $nfo->title; ?>" />
            </div>
            <div class="description">
                <div class="desc-title">Description</div>
                <?php wp_editor($nfo->description, 'edit-cruise-description', $settings=array('media_buttons'=>false)); ?>
            </div>
            <div class="description">
                <div class="desc-title">Details</div>
                <?php wp_editor($nfo->details, 'edit-cruise-details', $settings=array('media_buttons'=>false)); ?>
            </div>
            <div class="photos-title">Photos</div>
            <div class="photos">
                <?php
                $pics=glob('../wp-content/themes/fleet/img/cruises/id'.$id.'/*.jpg');
                $photo_id=1;
                $total_photos=count($pics);
                $time=time();
                foreach($pics as $pic) { ?>
                    <div id="photo-to-remove<?php echo $photo_id; ?>" class="photos-div">
                        <img src="<?php echo $pic.'?'.$time; ?>" alt="" />
                        <div class="remove-photo-btn" title="Remove photo" onclick="remove_photo(<?php echo $photo_id.','.$total_photos; ?>);">
                            <span class="fa fa-times"></span>
                        </div>
                        <div class="removing-photo"></div>
                    </div>
                <?php $photo_id++;} ?>
            </div>
            <div class="photos-add">
                <input type="file" id="file2" name="images2[]" multiple="multiple" />
                <div>Add more photos</div>
            </div>
            <div class="save-kabam">
                <div class="delete-btn" onclick="if(confirm('Delete cruise?')) delete_cruise(<?php echo $id; ?>);">Delete cruise</div>
                <div class="save-btn" onclick="$('.deleting').show();$('#edit-cruise-form').submit();">Save</div>
                <div class="cancel-btn" onclick="$('#cruise-right-side,#cruise-info-msg').fadeOut(300);">Cancel</div>
                <div class="deleting" style="background:#fff;"></div>
            </div>
        </form>
        
        <div class="cruise-close" title="Close" onclick="$('#cruise-right-side,#cruise-info-msg').fadeOut(300);">
            <span class="fa fa-times"></span>
        </div>
    </div>
</div>
<?php } ?>