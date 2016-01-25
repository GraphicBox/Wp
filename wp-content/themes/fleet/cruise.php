<?php
/* Template Name: Cruise */
get_header();

/*$link=explode('/',$_SERVER['REQUEST_URI']);
$id=(int) $link[count($link)-2];*/
$id = $post->ID;

$nfo=get_post();
$my_meta = get_post_meta( $id, 'Editor', true );
$maps = get_post_meta( $id, 'map', false );
$map_text = get_post_meta( $id, 'map-text', true );

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
    </div>
</div>

<?php main_menu('CRUISE'); ?>

<div class="container">
    <div class="row" style="background:#f6f6f6;">
        
        <div id="photos-galery">
            <div id="sliderx">
                
                <?php include('slider.php'); ?>
                
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
        </div>
        
        <div class="col-md-8 cruise-left-side">
            
            <div id="cruise-body">
                <h2 class="cruise-descr"><?php echo apply_filters('the_content',$nfo->post_title); ?></h2>
                <div class="red-line"></div>
                <p class="cruise-desc">
                    <?php echo apply_filters('the_content',$nfo->post_content); ?>
                </p>
                <div class="cruise-links">
                    <a href="<?php echo get_home_url(); ?>/booking/?id=<?php echo $id; ?>">
                        <div class="book-tickets">
                            <div><span class="fa fa-ticket"></span></div>
                            Book tickets
                        </div>
                    </a>
                    <div class="cruise-details-button" onclick="$('html,body').animate({scrollTop:$('#cruise-details').offset().top},500);">
                        <div><span class="fa fa-info"></span></div>
                        Cruise details
                    </div>
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
                    Schedule
                </div>
            </div>
            
        </div>
        <div class="col-md-4 cruise-right-side">
            
        </div>
        
    </div>
</div>

<script type="text/javascript">
    function initialize() {
    
    var locations=[], location=[];
    <?php foreach($maps as $map) { $map=explode(',',$map); ?>
        location[0] = parseFloat(<?php echo $map[0]; ?>);
        location[1] = parseFloat(<?php echo $map[1]; ?>);
        locations.push(location);
        location=[];
    <?php } ?>
    
    var position = new google.maps.LatLng(locations[0][0], locations[0][1]);
    var myOptions = {
      zoom: 7,
      center: position,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    var map = new google.maps.Map(
        document.getElementById("map-canvas"),
        myOptions);
    
    var marker;
    for (var i=0; i<2; i++) {
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][0], locations[i][1]),
        map: map
      });
    }
    
    var contentString = '';
    var infowindow = new google.maps.InfoWindow({
        content: contentString
    });
}
google.maps.event.addDomListener(window, 'load', initialize);
</script>

<?php get_footer(); ?>