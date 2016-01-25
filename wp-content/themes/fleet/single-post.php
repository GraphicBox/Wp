<?php
/* Template Name: Cruise */
get_header();

/*$link=explode('/',$_SERVER['REQUEST_URI']);
$id=(int) $link[count($link)-2];*/
$id = $post->ID;
$api = get_post_meta($id, 'api-id', true);

$api = $api[0]['id'];
$nfo=get_post();
$my_meta = get_post_meta( $id, 'Editor', true );
$map_text = get_post_meta( $id, 'map_text', true );
$map_text  = $map_text[0]['text'];
$cruises_text=get_post(12);
?>

<div id="about-us-head">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
            
                <h1><?php echo $cruises_text->post_title; ?></h1>
                <p>
                    <?php echo apply_filters('the_content',$cruises_text->post_content); ?>
                </p>
                <ul>
                    <li><a href="<?php echo get_home_url(); ?>">Home page</a></li>
                    <li><span class="fa fa-chevron-right"></span></li>
                    <li><a href="<?php echo get_home_url(); ?>/?page_id=12">Cruises</a></li>
                    <li><span class="fa fa-chevron-right"></span></li>
                    <li><a href="<?php echo get_home_url().'/?page_id=10&amp;id='.$id; ?>"><?php echo $nfo->post_title; ?></a></li>
                </ul>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12 cruise-fast-nav" style="text-align:center;">
                <br>
                <br>
                <div class="very-fast-nav1">
                    <?php if(get_order($nfo->menu_order, "next")):?>
                    <a class="prv" href="<?php echo get_permalink(get_order($nfo->menu_order, "next"));?>"><div class="post_nav"><span>Next cruise</span><i class="fa fa-angle-right"></i></div></a>
                    <?php endif;?>
                </div>
                <div class="very-fast-nav2">
                    <?php if(get_order($nfo->menu_order, "prev")):?>
                    <a class="nez" href="<?php echo  get_permalink(get_order($nfo->menu_order, "prev"));?>"><div class="post_nav"><i class="fa fa-angle-left"></i><span>Previous cruise</span></div></a>
                    <?php endif;?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php main_menu('CRUISE'); ?>

<div class="container in-cruise-wrap">
    <div class="row" style="background:#f6f6f6;">
        
        <!--<div id="photos-galery">
            <div id="sliderx">
                
                <?php // include('slider.php'); ?>
                
                <div class="image-slide col-md-4">
                    <div class="image-slide-button" onclick="show_galery();">
                        <span class="fa fa-camera"></span>
                    </div>
                </div>
                
                <div id="slider-opened-buttons">
                    <div><span class="fa fa-info" onclick="hide_galery();"></span></div>
                    <div><span class="fa fa-chevron-right" onclick="$('#slide-to-right').click();"></span></div>
                    <div style="margin:0;"><span class="fa fa-chevron-left" onclick="$('#slide-to-left').click();"></span></div>
                </div>
                
            </div>
        </div>-->
        
        <div class="cruise-left-side">
            
            <div id="cruise-body">
                <h2 class="cruise-descr"><?php echo apply_filters('the_title',$nfo->post_title); ?></h2>
                <div class="red-line"></div>
                <p class="cruise-desc">
                    <?php echo apply_filters('the_content',$nfo->post_content); ?>
                </p>
                <div class="cruise-links cruise-inner-page">
                    <a href="<?php echo get_home_url(); ?>/booking/?id=<?php echo $id; ?>">
                        <div class="book-tickets redd">
                            <div><span class="fa fa-ticket"></span></div>
                            Book tickets
                        </div>
                    </a>
                    <div class="breaker"></div>
                    <div class="cruise-details-button" onclick="$('html,body').animate({scrollTop:$('#cruise-details').offset().top},500);">
                        <div><span class="fa fa-info"></span></div>
                        Cruise details
                    </div>
                    <div class="breaker"></div>
                    <div class="cruise-details-button" onclick="show_schedule();">
                        <div><span class="fa fa-calendar"></span></div>
                        View Schedule
                    </div>
                </div>
            </div>
            
            <div id="cruise-details">
                <h1>CRUISE DETAILS</h1>
                <p class="cruise-desc" style="margin-top:20px;">
                    <?php echo apply_filters('the_content',$my_meta[0]['editor']); ?>
                </p>
            </div>
            
            <div id="map-schedule">
                <div class="navigation">
                    <div id="map-nav" class="active" onclick="show_map();">
                        <span class="fa fa-map-marker"></span>
                        CRUISE MAP
                    </div>
                    <div id="schedule-nav" onclick="show_schedule();">
                        <span class="fa fa-calendar"></span>
                        SCHEDULE
                    </div>
                </div>
                <div id="map">
                    <p>
                        <?php echo $map_text; ?>
                    </p>
                    <div class="cruise-route-map">
                        <div id="map-canvas" style="width:100%;height:300px;"></div>
                    </div>
                </div>
                <div id="schedule">
                
                    <?php
					
					$whole = get_info($api, 'temp');
					$skeds = sortsk($whole->schedules);
					foreach($skeds as $sched):
					?>
					<div class="one-sched" style="width:<?php echo 100/count($whole->schedules);?>%;">
                    <div class="sc-name"><h3>
                    <?php echo $sched->name;?> <?php echo date("Y", strtotime($sched->effectiveEndTime));?>
                    </h3> 
                    <span><?php echo date("M-d", strtotime($sched->effectiveStartTime));?> - <?php echo date("M-d", strtotime($sched->effectiveEndTime));?></span>
                    </div>
                    <?php foreach($sched->hours as $sh):?>
                    <div class="sc-time">
                    <?php echo date("g:i a", strtotime($sh->hour.":".sprintf("%02d", $sh->minutes)));//$sh->hour.":".sprintf("%02d", $sh->minutes); ?>
                    </div>
                    <?php endforeach;?>
                    </div>
					<?php
					endforeach;
				?>
                </div>
            </div>
            
        </div>
        
        <div class="cruise-right-side pictures-cruise">
           <div class="slide-conf">
           		<div class="image-slide">
                    <div class="image-slide-button" >
                        <span class="fa fa-camera"></span>
                    </div>
                </div>
                <div id="slider-opened-buttons">
                    <div><span class="fa fa-info"></span></div>
                    <div><span class="fa fa-chevron-right"></span></div>
                    <div style="margin:0;"><span class="fa fa-chevron-left"></span></div>
                </div>
                <div class="slides-only">
                <?php
				
					$attached_images = get_post_meta($id, 'Image',true);
					
					foreach($attached_images as $image) { ?>
                    <?php $urr = wp_get_attachment_image_src($image['image'], 'custom'); ?>
						<img class="shlide" src="<?php echo $urr[0]; ?>" alt=""/>
							
						
					<?php } ?>
                </div>
           </div>
        </div>
        
        <div class="cruise-right-side cruise-prising">
            <div class="the-info">
                 <div class="the-info-box">
                 <h2>Pricing</h2>
                 <?php
                 
                  
                 // $the_info = get_info($api, 'thee');
                  
                  //print_r($the_info->priceList);
                
				  foreach($whole->priceLists as $listt):
                  foreach($listt->prices as $key =>$pris):
                  if($pris->personType->name == "Youth"||$pris->personType->name == "Student"||$pris->personType->name == "Adult"):
                  
                  
                  ?>
                  <div class="the-price"><?php echo $pris->personType->name;?>: <span><?php echo $pris->price != 0 ? "$".number_format((float)$pris->price, 2, '.', '') : "Free";?></span>
                  </div>
                  <?php endif; endforeach;endforeach;?>
                  <div class="lo-text">Group rates are also avalable for<br>parties of 15 or more</div>
                  <a href="<?php echo get_home_url(); ?>/booking/?id=<?php echo $id; ?>">
                              <div class="book-tickets redd">
                                  <div><span class="fa fa-ticket"></span></div>
                                  Book tickets
                              </div>
                          </a>
                          <div class="full"></div>
                          <a class="mart" href="<?php echo get_permalink(12); ?>">
                              <div class="book-tickets">
                                  <div><span class="fa fa-anchor"></span></div>
                                  All cruises
                              </div>
                          </a>
                  </div>
             </div>
            <div class="bg-on-left"></div>
            <div class="bg-on-right"></div>
         </div>
        
    </div>
</div>

<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/javascript/slick/slick.js"></script>
<script type="text/javascript">

    
    function initialize() {
    var bounds = new google.maps.LatLngBounds();
    var coo = <?php $coo = get_post_meta( $id, 'coo', true ); echo json_encode($coo);?>;
    var position = new google.maps.LatLng(coo[0]['latitude'], coo[0]['longitude']);
    var myOptions = {
      mapTypeId: google.maps.MapTypeId.ROADMAP
    };
	
    var map = new google.maps.Map(
        document.getElementById("map-canvas"),
        myOptions);
    
  
	
		var lats = [];
    for (var i=0; i<coo.length; i++) {
		var temp = new google.maps.LatLng(coo[i]['latitude'], coo[i]['longitude']);
	lats.push( temp);
  bounds.extend(temp);
    }
	map.fitBounds(bounds);
	var flightPath = new google.maps.Polyline({
    path: lats,
    geodesic: true,
    strokeColor: '#c93030',
    strokeOpacity: 0.8,
    strokeWeight: 4
  });
   flightPath.setMap(map);
	console.log(lats);
   /* var request = {
                    origin: lats[0],
                    destination: lats[0],
                    waypoints: lats,
                    optimizeWaypoints: false,
                    travelMode: google.maps.DirectionsTravelMode.WALKING
                };
	 directionsService.route(request, function (response, status) {
                    if (status == google.maps.DirectionsStatus.OK) {
                        directionsDisplay.setDirections(response);
					}
	 });*/
   /* var contentString = '';
    var infowindow = new google.maps.InfoWindow({
        content: contentString
    });*/
	//directionsDisplay.setMap(map);
}
google.maps.event.addDomListener(window, 'load', initialize);

jQuery(document).ready(function($){
	
	$('.image-slide-button').click(function(){
		$('.image-slide').toggle();
		$('#slider-opened-buttons').toggle();
		$('.slide-conf').css('width', $('.in-cruise-wrap .row').width()+'px');
		$('.slides-only img').fadeOut(500);
		setTimeout(function(){
			$('.slides-only img').fadeIn();
		$('.slides-only').slick({
		  dots: false,
		  infinite: true,
		  speed: 300,
		   slide: 'img',
		  slidesToShow: 1,
		 slidesToScroll: 1,
		
		  lazyLoad: 'ondemand',
		  prevArrow: $('#slider-opened-buttons .fa-chevron-left'), 
		  nextArrow: $('#slider-opened-buttons .fa-chevron-right'),
		  centerMode: true,
		    variableWidth: true
  
		});}, 501);
		});
	$('#slider-opened-buttons .fa-info').click(function(){
		$('.image-slide').toggle();
		$('#slider-opened-buttons').toggle();
		$('.slide-conf').css('width', '100%');
		$('.slides-only').slick('unslick');
		});
	});
</script>

<?php get_footer();?>