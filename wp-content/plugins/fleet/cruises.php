<?php
$show_msg=0;
if (isset($_GET['new-cruise']) AND isset($_POST['cruise-title']) AND !empty($_POST['cruise-title'])) {
    include('cruises/add_cruise.php');
}
else if (isset($_GET['edit-cruise']) AND isset($_GET['id']) AND isset($_POST['edit-cruise-title']) AND !empty($_POST['edit-cruise-title'])) {
    include('cruises/edit_cruise.php');
    $show_msg=1;
}
?>

<div style="float:left;width:40%;">
    <div id="nav-top">
        <h1>CRUISES</h1>
    </div>
    <div id="about-body">
        
        <div id="new-fact" onclick="$('#cruise-right-side,#cruise-info-msg').hide();$('#new-cruise,#blur').fadeIn(300);">
            <span class="fa fa-plus"></span>
            Add new cruise
        </div>
        <div class="clear"></div>
        
        <div id="cruise-list">
            <?php
            $query=$wpdb->get_results("SELECT `id`,`title`,`description`,`details` FROM `cruises` ORDER BY `id` DESC");
            foreach($query as $nfo) { ?>
            
            <div id="cruise-item<?php echo $nfo->id; ?>" class="single-item">
                <a href="admin.php?page=fleet/cruises.php&amp;id=<?php echo $nfo->id; ?>">
                    <span class="fa fa-chevron-right"></span>
                    <?php echo $nfo->title; ?>
                </a>
            </div>
                
            <?php } ?>
        </div>
    
    </div>
</div>

<div id="cruise-info-msg"<?php if($show_msg) echo '>Cruise has been updated';else echo ' class="no-display">'; ?></div>

<?php
if (isset($_GET['id'])) include('cruises/show_cruise.php');
?>

<?php include('cruises/new_cruise_form.php'); ?>