<?php
if (isset($_POST['id']))
{
    $id=(int) $_POST['id'];
    require_once('../../../../wp-load.php');
    global $wpdb;
    $wpdb->query("DELETE FROM `about_ships` WHERE `id`=$id LIMIT 1");
}
?>
1