<?php
$id=(int) $_GET['id'];

// update cruise info
if (isset($_POST['edit-cruise-title'])) $title=str_replace('|','&#124;',$_POST['edit-cruise-title']); else $title='empty';
if (isset($_POST['edit-cruise-description'])) $description=str_replace('|','&#124;',$_POST['edit-cruise-description']); else $description='';
if (isset($_POST['edit-cruise-details'])) $details=str_replace('|','&#124;',$_POST['edit-cruise-details']); else $details='';
$wpdb->query("UPDATE `cruises` SET `title`='$title',`description`='$description',`details`='$details' WHERE `id`=$id LIMIT 1");

//remove photo 2|1|3|
if (isset($_POST['remove-photos'])) $ex_photos=$_POST['remove-photos']; else $ex_photos='';
$ex_photos=explode('|',$ex_photos);
$count_ex_photos=count($ex_photos);
for($i=1; $i<$count_ex_photos; $i++)
    @unlink('../wp-content/themes/fleet/img/cruises/id'.$id.'/id'.$ex_photos[$i-1].'.jpg');

$photos=glob('../wp-content/themes/fleet/img/cruises/id'.$id.'/*.jpg');
$i=1;
foreach($photos as $photo) {
    rename($photo, '../wp-content/themes/fleet/img/cruises/id'.$id.'/id'.$i.'.jpg');
    $i++;
}

// add new photos
$ciklas=0;
$pic_id=count(glob('../wp-content/themes/fleet/img/cruises/id'.$id.'/*.jpg'))+1;
foreach ($_FILES['images2']['tmp_name'] as $failas) {
    if($failas!='') {
        $check = getimagesize($failas);
        if($check !== false) {
            $extension=pathinfo(basename($_FILES['images2']['name'][$ciklas]),PATHINFO_EXTENSION);
            if ($extension == 'jpg') {
                move_uploaded_file($_FILES['images2']['tmp_name'][$ciklas], '../wp-content/themes/fleet/img/cruises/id'.$id.'/id'.$pic_id.'.jpg');
                chmod('../wp-content/themes/fleet/img/cruises/id'.$id.'/id'.$pic_id.'.jpg',0777);
                $pic_id++;
            }
        }
        $ciklas++;
    }
}
?>