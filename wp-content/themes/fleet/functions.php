<?php

add_action( 'init', 'my_add_excerpts_to_pages' );
function my_add_excerpts_to_pages() {
     add_post_type_support( 'page', 'excerpt' );
	 
}
if ( function_exists( 'add_image_size' ) ) { 
	add_image_size( 'custom', 10000, 500 );
	
}
add_theme_support( 'post-thumbnails' );
add_theme_support( 'menus' );

function send_main(){
	$headers = array('Content-Type: text/html; charset=UTF-8');
	$html = '<strong>Name: </strong>'.$_POST['fname'];
	$html .= '<br><strong>E-mail: </strong>'.$_POST['femail'];
	if(isset($_POST['fphone'])){
		$html .= '<br><strong>Phone: </strong>'.$_POST['fphone'];
		}
	$html .= '<br><strong>Topic: </strong>'.$_POST['ftopic'];
	$html .= '<br><strong>Idl: </strong>'.$_POST['fidl'];
	if(isset($_POST['fcity'])){
		$html .= '<br><strong>City: </strong>'.$_POST['fcity'];
		}
	if(isset($_POST['fstate'])){
		$html .= '<br><strong>State: </strong>'.$_POST['fstate'];
		}
	if(isset($_POST['fzip'])){
		$html .= '<br><strong>ZIP: </strong>'.$_POST['fzip'];
		}
	$html .= '<br><br>'.$_POST['fcomments'];
	wp_mail(get_option('qs_contact_email'), addslashes($_POST['ftopic']), $html, $headers);
	echo 'done';
	exit;
	}
add_action('wp_ajax_send_main', 'send_main');
add_action('wp_ajax_nopriv_send_main', 'send_main');

function main_menu($location) {
    $nav_menu=wp_get_nav_menu_items('Homepage menu');
    $count=count($nav_menu); ?>
	 
    <div id="top-nav" class="container-fluid">
        <div class="bg-holder"></div>
        <div class="container wider">
            
			<?php
            echo '<ul style="margin-right:0;z-index:9999;"';
            if ($location == '') echo ' class="nav-in-main"';
            echo '>';
            foreach($nav_menu as $key=>$menu) { ?>
                <li<?php if($key+1 == $count) echo ' class="last"'; ?>>
                    <a href="<?php echo $menu->url; ?>">
                        <span <?php if($location==$menu->title) echo 'class="active"';else{ ?>
                        onmouseover="$('#moving-line<?php echo $key; ?>').show().animate({bottom:'-5px'},300);"
                        onmouseout="$('#moving-line<?php echo $key; ?>').hide().stop().css('bottom','-15px');"<?php } ?>>
                            <?php echo $menu->title; ?>
                        </span>
                        <div id="moving-line<?php echo $key; ?>"></div>
                    </a>
                </li>
            <?php }
            echo '</ul>';
            ?>
        </div>
    </div>
	
	<div id="icon-wrapper">
		  <div class="nav-menu-icon" onclick="nav_menu_icon();">
			  <span></span>
		  </div>
	  </div>
	
	<?php
	if ($location == '') { ?>
              
		  <div style="position:absolute;top:10px;left:30px;z-index:5;">
			   <div class="book-tickets no-border redd" id="mmm">
				   <div><span class="fa fa-ticket"></span></div>
				   Book tickets
			   </div>
		  </div>
		   
	 <?php }
}
function main_menu2($location) {
    $nav_menu=wp_get_nav_menu_items('Homepage menu');
    $count=count($nav_menu);
    ?>
    <div id="top-nav" class="container-fluid hhad">
        <div class="bg-holder"></div>
        <div class="container wider">
            <?php
            if ($location == '') { ?>
                <a href="<?php echo get_home_url(); ?>/booking/">
                    <div class="book-tickets no-border hhad">
                        <div><span class="fa fa-ticket"></span></div>
                        Book tickets
                    </div>
                </a>
            <?php }
            echo '<ul';
            if ($location != '') echo ' style="margin-right:0;"';
            echo '>';
            foreach($nav_menu as $key=>$menu) { ?>
                <li<?php if($key+1 == $count) echo ' class="last"'; ?>>
                    <a href="<?php echo $menu->url; ?>">
                        <span <?php if($location==$menu->title) echo 'class="active"';else{ ?>
                        onmouseover="$('#moving-line<?php echo $key; ?>').show().animate({bottom:'-5px'},300);"
                        onmouseout="$('#moving-line<?php echo $key; ?>').hide().stop().css('bottom','-15px');"<?php } ?>>
                            <?php echo $menu->title; ?>
                        </span>
                        <div id="moving-line<?php echo $key; ?>"></div>
                    </a>
                </li>
            <?php }
            echo '</ul>';
            ?>
            <div id="icon-wrapper">
                <div class="nav-menu-icon" onclick="nav_menu_icon();">
                    <span></span>
                </div>
            </div>
        </div>
    </div>
<?php }
function footer_menu() {
    echo '<div class="fff leave-half"><ul>';
	
    foreach(wp_get_nav_menu_items('Homepage menu') as $menu) {
        echo '<li><a href="'.$menu->url.'">'.$menu->title.'</a></li>';
    }
    echo '</ul></div><div class="fff leave-half borders"><ul class="two">';
	
    foreach(wp_get_nav_menu_items('Footer menu 1') as $menu) {
        echo '<li><a href="'.$menu->url.'">'.$menu->title.'</a></li>';
    }
    echo '</ul></div><div id="fff-break"></div><div class="fff leave-center"><ul class="two no-border">';
    foreach(wp_get_nav_menu_items('Footer menu 2') as $menu) {
        echo '<li><a href="'.$menu->url.'">'.$menu->title.'</a></li>';
    }
    echo '</ul></div>';
}
function get_order($current, $type="next"){
	if($current == 1 && $type == "prev"){
		
		$args = array(
			'posts_per_page'   => -1,
			
			'orderby'          => 'menu_order',
			'order'            => 'DESC',
			'post_type'        => 'post',
			'post_status'      => 'publish',
			'suppress_filters' => true 
			);
		$posts = get_posts($args);
		return $posts[count($posts)-1]->ID;
		}else{
			if($type == "prev"){
				$current = $current-2;
				}
			$args = array(
				'posts_per_page'   => 1,
				'offset'           => $current,
				'orderby'          => 'menu_order',
				'order'            => 'DESC',
				'post_type'        => 'post',
				'post_status'      => 'publish',
				'suppress_filters' => true 
			);
			$posts = get_posts($args);
			if(count($posts)>0){
				return $posts[0]->ID;
				}else{
					$args = array(
						'posts_per_page'   => 1,
						'offset'           => 0,
						'orderby'          => 'menu_order',
						'order'            => 'DESC',
						'post_type'        => 'post',
						'post_status'      => 'publish',
						'suppress_filters' => true 
					);
					$posts = get_posts($args);
					return $posts[0]->ID;
					}
			}
	}
function cruises_list() {
    
    $i=1;
    $args = array('post_status'=>'publish', 'category_name'=>'cruises', 'orderby' => 'menu_order', 'order' => 'DESC');
    $cruises = get_posts( $args );
    foreach ($cruises as $cruise) {
        $meta=get_post_meta($cruise->ID);
        
        $attached_images = get_attached_media('image',$cruise->ID);
        
        
        ?>
    
    <div class="row fadable-content">
          
          <div class="col-md-6 product-image small-screen">
               <div class="cru-image" style="background-image:url('<?php echo wp_get_attachment_url( get_post_thumbnail_id($cruise->ID) ); ?>');"></div>
          </div>
     
        <?php if($i%2==0){ ?>
        <div class="col-md-6 product-image big-screen">
          <div class="cru-image" style="background-image:url('<?php echo wp_get_attachment_url( get_post_thumbnail_id($cruise->ID) ); ?>') ;"></div>
     </div>
        <?php } ?>
        <div class="col-md-6 about-product">
            <h2 class="cruise-descr"><a href="<?php echo get_permalink($cruise->ID); ?>"><?php echo apply_filters('the_title',$cruise->post_title); ?></a></h2>
            <div class="red-line"></div>
            <div class="cruise-desc">
                <?php echo apply_filters('the_content',$cruise->post_content); ?>
            </div>
            <div class="cruise-links functions-links">
                <div data-id="<?php echo $cruise->ID; ?>">
                    <a href="<?php echo get_home_url(); ?>/booking/?id=<?php echo $cruise->ID; ?>" class="book-tickets redd">
                        <div><span class="fa fa-ticket"></span></div>
                        Book tickets
                    </a>
                </div>
			   <div class="new-line-c"></div>
                <a href="<?php echo get_permalink($cruise->ID); ?>">
                    <div class="cruise-details-button">
                        <div><span class="em-info"></span></div>
                        Cruise details
                    </div>
                </a>
            </div>
        </div>
        <?php if($i%2!=0){ ?>
        <div class="col-md-6 product-image big-screen">
            <div class="cru-image" style="background-image:url('<?php echo wp_get_attachment_url( get_post_thumbnail_id($cruise->ID) ); ?>');">
            
            </div>
            
        </div>
        <?php } ?>
       
        
    </div>
    
    <?php $i++;}
    wp_reset_postdata();
}
function cruises_list2() {
    
    $i=1;
    $args = array('post_status'=>'publish', 'category_name'=>'cruises', 'orderby' => 'menu_order', 'order' => 'DESC');
    $cruises = get_posts( $args );
    foreach ($cruises as $cruise) {
        $meta=get_post_meta($cruise->ID);
        
        $attached_images = get_attached_media('image',$cruise->ID);
        
        
        ?>
    
    <div class="row fadable-content">
          
          <div class="col-md-6 product-image small-screen">
               <div class="cru-image" style="background-image:url('<?php echo wp_get_attachment_url( get_post_thumbnail_id($cruise->ID) ); ?>');"></div>
          </div>
     
        <?php if($i%2==0){ ?>
        <div class="col-md-6 product-image big-screen">
          <div class="cru-image" style="background-image:url('<?php echo wp_get_attachment_url( get_post_thumbnail_id($cruise->ID) ); ?>') ;"></div>
     </div>
        <?php } ?>
        <div class="col-md-6 about-product">
            <h2 class="cruise-descr"><?php echo apply_filters('the_title',$cruise->post_title); ?></h2>
            <div class="red-line"></div>
            <div class="cruise-desc">
                <?php echo apply_filters('the_content',$cruise->post_content); ?>
            </div>
            <div class="cruise-links functions-links">
                <a href="<?php echo get_home_url(); ?>/booking/?id=<?php echo $cruise->ID; ?>">
                    <div class="book-tickets shad">
                        <div><span class="fa fa-ticket"></span></div>
                        Book tickets
                    </div>
                </a>
                <a href="<?php echo get_permalink($cruise->ID); ?>">
                    <div class="cruise-details-button shad">
                        <div><span class="em-info"></span></div>
                        Cruise details
                    </div>
                </a>
            </div>
        </div>
        <?php if($i%2!=0){ ?>
        <div class="col-md-6 product-image big-screen">
            <div class="cru-image" style="background-image:url('<?php echo wp_get_attachment_url( get_post_thumbnail_id($cruise->ID) ); ?>');">
            
            </div>
            
        </div>
        <?php } ?>
    </div>
    
    <?php $i++;}
    wp_reset_postdata();
}
function getTemplateId($event){
	$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://sand3-api.acmeticketing.com/v1/b2b/event/instance/".$event,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "cache-control: no-cache",
    "content-type: application/json",
    "x-acme-api-key: 9d4c987984f24b988010939e64e05c8f"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
	$tm = json_decode($response);
  return $tm->templateId;
}
	}
function sortsk($skeds){
	foreach($skeds as $key => $val){
		if(strtotime($val->effectiveEndTime)< strtotime(date("Y-m-d"))){
			unset($skeds[$key]);
			}
		}
	return $skeds;
	}
function get_info($id = 0, $type = "list"){
	if($type == "list"){
		$ur = "v1/b2b/price/lists/".$id;
		}elseif($type == "lists"){
			$ur = "v1/b2b/price/lists/";
			}elseif($type == "sche"){
			$ur = "v1/b2b/event/template/".$id."/schedules";
			}elseif($type=="even"){
				$ur = "v1/b2b/event/template";
				}
			elseif($type=="temp"){
				$ur = "v1/b2b/event/template/".$id;
				}
			elseif($type=="leven"||$type=="levenp"){
				$ur = "v1/b2b/event/instance";
				}
			elseif($type=="thee"){
				$ur = "v1/b2b/event/instance/".$id;
				}
	
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://sand3-api.acmeticketing.com/".$ur,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "cache-control: no-cache",
    "x-acme-api-key: 9d4c987984f24b988010939e64e05c8f"
  ),
));
$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);
if ($err) {
  echo "cURL Error #:" . $err;
} else {
	if($type=="even"){
		$tmp = json_decode($response);
		$return = array();
		foreach($tmp as $resp){
			$resp->startTime = date("d-m-Y", strtotime($resp->startTime));
			$return[$resp->id] = $resp;
			}
		return $return;
  
	}elseif($type=="levenp"){
		return json_decode($response);
		}else{
		return json_decode($response);
		}
}
	}
function get_byid($ids){
	
	}
function set($val){
	if(isset($val)&&$val!=''){
		return true;
		}else{
			return false;
			}
	}
function nullifier($val){
	if($val==''||$val==' '){
		return "null";
		}else{
			return $val;
			}
	}
function order(){
	if(set($_POST['first-name'])&&set($_POST['email-address'])&&set($_POST['last-name'])&&set($_POST['ticket-type'])&&set($_POST['no-of-tickets'])&&set($_POST['product-name'])&&set($_POST['phone-number'])&&set($_POST['cc-number'])&&set($_POST['cvc-number'])&&set($_POST['exp-month'])&&set($_POST['exp-year'])&&set($_POST['zip-code'])){
		$iti = '';
		if(isset($_POST['quan'])&&count($_POST['quan'])>0){
		for($i=0; $i < count($_POST['quan']); $i++){
			$iti .= '{
						"ticketingTypeId": "'.$_POST['type'][$i].'",
						"quantity": "'.$_POST['quan'][$i].'",
						"eventId": "'.$_POST['event'][$i].'"
					}';
				if($i < count($_POST['quan'])-1){
					$iti .= ',';
					}
			}
		if($_POST['coupon-number']=='' || $_POST['coupon-number']==' '){
			$card = '';
			}else{
				$card = ',"giftCardNumber": "'.nullifier($_POST['coupon-number']).'"';
				}
	$curl = curl_init();
	curl_setopt_array($curl, array(
	  CURLOPT_URL => "https://sand3-api.acmeticketing.com/v2/b2c/checkout",
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => "",
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 30,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => "POST",
	  CURLOPT_POSTFIELDS => '{
								"contactFirstName": "'.nullifier($_POST['first-name']).'",
								"email": "'.nullifier($_POST['email-address']).'",
								"contactLastName": "'.nullifier($_POST['last-name']).'",
								"shoppingCart": {
									"items": ['.$iti.']
								},
								"phoneNumber": "'.nullifier($_POST['phone-number']).'",
								"manualEntryCardNumber": "'.nullifier($_POST['cc-number']).'",
								"cvc": "'.nullifier($_POST['cvc-number']).'",
								"expDate": "'.nullifier($_POST['exp-month']).nullifier($_POST['exp-year']).'",
								"zipCode": "'.nullifier($_POST['zip-code']).'"'.$card.'
								
							}',
	  CURLOPT_HTTPHEADER => array(
		"cache-control: no-cache",
		"content-type: application/json",
		"x-acme-api-key: 9d4c987984f24b988010939e64e05c8f"
	  ),
	));
	
	$response = curl_exec($curl);
	$err = curl_error($curl);
	
	curl_close($curl);
	
	if ($err) {
	  echo "cURL Error #:" . $err;
	} else {
	  echo $response;
	  
	  
	}
	}else{
			echo "noitems";
			}
	}else{
		echo "bad";
		}
	exit;
	}
add_action('wp_ajax_order', 'order');
add_action('wp_ajax_nopriv_order', 'order');

function get_times($input, $date){
	$times = array();
	foreach($input->schedules as $sched){
		if(strtotime($date) >= strtotime($sched->effectiveStartTime) && strtotime($date) <= strtotime($sched->effectiveEndTime)){
			$times = array_merge($times, $sched->hours);
			}
		}
	return  $times;
	}
function get_sched($input, $date){
	$times = array();
	foreach($input->schedules as $key => $sched){
		if(strtotime($date) >= strtotime($sched->effectiveStartTime) && strtotime($date) <= strtotime($sched->effectiveEndTime)){
			return  $key;
			}
		}
	
	}
function get_times2(){
	$input = json_decode(stripslashes($_POST['key']));

	$date = $_POST['dt'];
	$times = array();
	foreach($input->schedules as $sched){
		
		if(strtotime($date) >= strtotime($sched->effectiveStartTime) && strtotime($date) <= strtotime($sched->effectiveEndTime)){
			
			$times = array_merge($times, $sched->hours);
			}
		}
		$html = '';
	foreach($times as $tim){
		$html .= '<option value="'.date("g:i a", strtotime($tim->hour.":".sprintf("%02d", $tim->minutes))).'">'.date("g:i A", strtotime($tim->hour.":".sprintf("%02d", $tim->minutes))).'</option>';
		}
	echo $html;
	exit;
	}	
add_action('wp_ajax_get_times', 'get_times2');
add_action('wp_ajax_nopriv_get_times', 'get_times2');
function get_all($api){
				$return = '';
					$curl = curl_init();
				curl_setopt_array($curl, array(
				  CURLOPT_URL => "https://sand3-api.acmeticketing.com/v1/b2c/event/templates/".$api,
				  CURLOPT_RETURNTRANSFER => true,
				  CURLOPT_ENCODING => "",
				  CURLOPT_MAXREDIRS => 10,
				  CURLOPT_TIMEOUT => 30,
				  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				  CURLOPT_CUSTOMREQUEST => "GET",
				  CURLOPT_HTTPHEADER => array(
					"cache-control: no-cache",
					"x-acme-api-key: 9d4c987984f24b988010939e64e05c8f"
				  ),
				));
				$response = curl_exec($curl);
				$err = curl_error($curl);
				curl_close($curl);
				if ($err) {
				  echo "cURL Error #:" . $err;
				} else {
					$info = json_decode($response);
					$return = array("name" => $info->name);
					$curl = curl_init();

					curl_setopt_array($curl, array(
					  CURLOPT_URL => "https://sand3-api.acmeticketing.com/v1/b2b/event/instance?startTime=".date("Y-m-d")."T".date("H:i:s")."Z&templateId=".$api,
					  CURLOPT_RETURNTRANSFER => true,
					  CURLOPT_ENCODING => "",
					  CURLOPT_MAXREDIRS => 10,
					  CURLOPT_TIMEOUT => 30,
					  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
					  CURLOPT_CUSTOMREQUEST => "GET",
					  CURLOPT_HTTPHEADER => array(
						"cache-control: no-cache",
						"content-type: application/json",
						
						"x-acme-api-key: 9d4c987984f24b988010939e64e05c8f"
					  ),
					));
					
					$response = curl_exec($curl);
					$err = curl_error($curl);
					
					curl_close($curl);
					
					if ($err) {
					  echo "cURL Error #:" . $err;
					} else {
						
						$even = json_decode($response);
						$evens = array();
						$dates = array();
						foreach($even as $l){
							$mod = explode("-", $l->startTime);
							unset($mod[count($mod)-1]);
							$unmod = implode("-", $mod);
							$evens[date("d-m-Y",strtotime($unmod))][date("H:i",strtotime($unmod))] = array("id" => $l->id, "startTime" => $unmod, "prices" => $l->priceList->prices, "time" => date("h:i A",strtotime($unmod)));
							if(!in_array(date("d-m-Y",strtotime($unmod)), $dates)){
							$dates[] = date("d-m-Y",strtotime($unmod));
						}
							}
						$return["events"] = $evens;
						$return["dates"] = $dates;
						
					  
					}
					}
				
	return $return;
	}
function get_all_ajax(){
	$api = $_POST['key'];
			$return = '';
					$curl = curl_init();
				curl_setopt_array($curl, array(
				  CURLOPT_URL => "https://sand3-api.acmeticketing.com/v1/b2c/event/templates/".$api,
				  CURLOPT_RETURNTRANSFER => true,
				  CURLOPT_ENCODING => "",
				  CURLOPT_MAXREDIRS => 10,
				  CURLOPT_TIMEOUT => 30,
				  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				  CURLOPT_CUSTOMREQUEST => "GET",
				  CURLOPT_HTTPHEADER => array(
					"cache-control: no-cache",
					"x-acme-api-key: 9d4c987984f24b988010939e64e05c8f"
				  ),
				));
				$response = curl_exec($curl);
				$err = curl_error($curl);
				curl_close($curl);
				if ($err) {
				  echo "cURL Error #:" . $err;
				} else {
					$info = json_decode($response);
					$return = array("name" => $info->name);
					$curl = curl_init();

					curl_setopt_array($curl, array(
					  CURLOPT_URL => "https://sand3-api.acmeticketing.com/v1/b2b/event/instance?startTime=".date("Y-m-d")."T".date("H:i:s")."Z&templateId=".$api,
					  CURLOPT_RETURNTRANSFER => true,
					  CURLOPT_ENCODING => "",
					  CURLOPT_MAXREDIRS => 10,
					  CURLOPT_TIMEOUT => 30,
					  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
					  CURLOPT_CUSTOMREQUEST => "GET",
					  CURLOPT_HTTPHEADER => array(
						"cache-control: no-cache",
						"content-type: application/json",
						
						"x-acme-api-key: 9d4c987984f24b988010939e64e05c8f"
					  ),
					));
					
					$response = curl_exec($curl);
					$err = curl_error($curl);
					
					curl_close($curl);
					
					if ($err) {
					  echo "cURL Error #:" . $err;
					} else {
						
						$even = json_decode($response);
						$evens = array();
						$dates = array();
						foreach($even as $l){
							$mod = explode("-", $l->startTime);
							unset($mod[count($mod)-1]);
							$unmod = implode("-", $mod);
							$evens[date("d-m-Y",strtotime($unmod))][date("H:i",strtotime($unmod))] = array("id" => $l->id, "startTime" => $unmod, "prices" => $l->priceList->prices, "time" => date("h:i A",strtotime($unmod)));
							if(!in_array(date("d-m-Y",strtotime($unmod)), $dates)){
							$dates[] = date("d-m-Y",strtotime($unmod));
						}
							}
						$return["events"] = $evens;
						$return["dates"] = $dates;
						
					  
					}
					}
				
	echo json_encode($return);
	exit;
	}
add_action('wp_ajax_get_all_ajax', 'get_all_ajax');
add_action('wp_ajax_nopriv_get_all_ajax', 'get_all_ajax');
?>