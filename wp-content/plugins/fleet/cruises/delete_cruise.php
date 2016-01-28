<?php
if (isset($_POST['id'])) {
    $id=(int) $_POST['id'];
    require_once('../../../../wp-load.php');
    global $wpdb;
    $wpdb->query("DELETE FROM `cruises` WHERE `id`=$id LIMIT 1");
    
    $pic_count=count(glob('../../../../wp-content/themes/fleet/img/cruises/id'.$id.'/*.jpg'));
    for($i=1; $i<=$pic_count; $i++)
        @unlink('../../../../wp-content/themes/fleet/img/cruises/id'.$id.'/id'.$i.'.jpg');
    
    @rmdir('../../../../wp-content/themes/fleet/img/cruises/id'.$id);
}
?>