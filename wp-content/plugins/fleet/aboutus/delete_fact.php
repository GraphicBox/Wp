<?php
if (isset($_POST['id']))
{
    $id=(int) $_POST['id'];
    require_once('../../../../wp-load.php');
    global $wpdb;
    $wpdb->query("DELETE FROM `about_facts` WHERE `id`=$id LIMIT 1");
    @unlink('../../../../wp-content/themes/fleet/img/facts/id'.$id.'.jpg');
}
?>
1