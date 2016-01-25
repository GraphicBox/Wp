<?php

if (isset($_POST['cruise-title'])) $title=str_replace('|','&#124;',$_POST['cruise-title']); else $title='empty';
if (isset($_POST['cruise-description'])) $description=str_replace('|','&#124;',$_POST['cruise-description']); else $description='';
if (isset($_POST['cruise-details'])) $details=str_replace('|','&#124;',$_POST['cruise-details']); else $details='';
$wpdb->insert('cruises', array('title'=>$title, 'description'=>$description, 'details'=>$details));
$id=$wpdb->insert_id;

mkdir('../wp-content/themes/fleet/img/cruises/id'.$id);
chmod('../wp-content/themes/fleet/img/cruises/id'.$id,0777);

$ciklas=0;
$pic_id=1;
foreach ($_FILES['images']['tmp_name'] as $failas) {
    if($failas!='') {
        $check = getimagesize($failas);
        if($check !== false) {
            $extension=pathinfo(basename($_FILES['images']['name'][$ciklas]),PATHINFO_EXTENSION);
            if ($extension == 'jpg') {
                move_uploaded_file($_FILES['images']['tmp_name'][$ciklas], '../wp-content/themes/fleet/img/cruises/id'.$id.'/id'.$pic_id.'.jpg');
                chmod('../wp-content/themes/fleet/img/cruises/id'.$id.'/id'.$pic_id.'.jpg',0777);
                $pic_id++;
            }
        }
        $ciklas++;
    }
}

?>