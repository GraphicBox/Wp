<?php
if (isset($_POST['id']))
{
    $id=(int) $_POST['id'];
    require_once('../../../wp-load.php');
    global $wpdb;
    $wpdb->query("DELETE FROM `aboutus` WHERE `id`=$id LIMIT 1");
    @unlink('../../../wp-content/uploads/about_icons/id'.$id.'.png');
}
?>
1