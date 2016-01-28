<?php
$active=array('','','');

if (isset($_GET['u'])) {
    $u=(int) $_GET['u'];
    if ($u==2) {
        $active[1]=' class="active"';
        $incl='history';
    }
    else if ($u==3) {
        $active[2]=' class="active"';
        $incl='ships';
    }
    else {
        $active[0]=' class="active"';
        $incl='facts';
    }
}
else {
    $active[0]=' class="active"';
    $incl='facts';
}
?>

<div id="nav-top">
    <ul>
        <li<?php echo $active[0]; ?>><a href="admin.php?page=fleet/aboutus.php&amp;u=1">FAST FACTS</a></li>
        <li<?php echo $active[1]; ?>><a href="admin.php?page=fleet/aboutus.php&amp;u=2">HISTORY</a></li>
        <li<?php echo $active[2]; ?>><a href="admin.php?page=fleet/aboutus.php&amp;u=3">SHIPS</a></li>
    </ul>
</div>
<div id="about-body">
    <?php include('aboutus/'.$incl.'.php'); ?>
</div>