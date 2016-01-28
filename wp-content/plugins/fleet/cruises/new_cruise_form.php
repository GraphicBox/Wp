<div id="new-cruise">
    <div id="new-cruise-wrap">
        
        <form id="new-cruise-form" action="admin.php?page=fleet/cruises.php&amp;new-cruise=1" method="post" enctype="multipart/form-data">
            <div class="title">
                <input type="text" name="cruise-title" placeholder="Cruise name" />
            </div>
            <div class="description">
                <div class="desc-title">Description</div>
                <?php wp_editor('', 'cruise-description', $settings=array('media_buttons'=>false)); ?> 
            </div>
            <div class="description">
                <div class="desc-title">Details</div>
                <?php wp_editor('', 'cruise-details', $settings=array('media_buttons'=>false)); ?> 
            </div>
            <div class="photos">
                <input type="file" id="file" name="images[]" multiple="multiple" />
                <div>Cruise photos</div>
            </div>
            <div class="save-kabam">
                <div class="save-btn" onclick="$('.deleting').show();$('#new-cruise-form').submit();">Save</div>
                <div class="cancel-btn" onclick="$('#new-cruise,#blur').fadeOut(300);">Cancel</div>
                <div class="deleting" style="background:#ccc;"></div>
            </div>
        </form>
        
        <div class="cruise-close" title="Close" onclick="$('#new-cruise,#blur').fadeOut(300);">
            <span class="fa fa-times"></span>
        </div>
    </div>
</div>