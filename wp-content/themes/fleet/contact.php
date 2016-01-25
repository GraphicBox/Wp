<?php
/* Template Name: Contact */
get_header();

$contact=get_post(165);
$info_text = get_post_meta( 165, 'information', true );
$map = get_post_meta( 165, 'map', true );
?>

<div id="about-us-head">
    <div class="container sm">
        <div class="row">
            <div class="col-md-6">
                <h1><?php echo $contact->post_title; ?></h1>
                <p>
                    <?php echo apply_filters('the_content',$contact->post_content); ?>
                </p>
                <ul>
                    <li><a href="<?php echo get_home_url(); ?>">Home page</a></li>
                    <li><span class="fa fa-chevron-right"></span></li>
                    <li><a href="<?php echo get_home_url(); ?>/contact/">Contact</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<?php main_menu('CONTACT'); ?>

<div id="contact-body" class="container">
    <div class="row">
        <div class="col-md-7">
            <h1>LOCATION</h1>
            <div id="map" style="border:1px solid #ddd;height:400px;padding:10px;">
                <div id="map-canvas" style="width:100%;height:100%;"></div>
            </div>
            <h1>INFORMATION</h1>
            <div id="contact-info">
                <?php echo apply_filters('the_content',$info_text); ?>
            </div>
            <div id="simple-info" class="row">
                <div class="ccc">
                    <div class="inline-block">
                        <span class="fa fa-map-marker"></span>
                        <?php
                        echo get_option('qs_contact_street').', '.get_option('qs_contact_city').', '.get_option('qs_contact_state');
                        ?>
                    </div>
                </div>
                <div class="ccc-c"></div>
                <div class="ccc" style="text-align:right;">
                    <div class="inline-block">
                        <span class="fa fa-phone"></span>
                        Phone:
                        <?php echo get_option('qs_contact_phone'); ?>
                    </div>
                </div>
                <div class="ccc-c"></div>
                <div class="ccc" style="text-align:right;">
                    <div class="inline-block">
                        <span class="fa fa-fax"></span>
                        Fax:
                        <?php echo get_option('qs_contact_fax'); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-1">
        </div>
        <div class="col-md-4">
            <h1 class="line">FILL FORM</h1>
            <!--<form action="#" method="post" id="dat">
            <input class="clean" id="fname" name="fname" type="text" placeholder="Name"/>
            <input class="clean" id="femail" name="femail" type="text" placeholder="E-mail"/>
            <input class="clean" id="fphone" name="fphone" type="text" placeholder="Phone"/>
            <select class="clean" id="ftopic" name="ftopic" type="text" placeholder="Topic">
           <option value=""></option>
            <option value="topic1">Topic 1</option>
            <option value="topic1">Topic 2</option>
            <option value="topic1">Topic 3</option>
            </select>
            <select class="clean" id="fidl" name="fidl" type="text" placeholder="I'd like to...">
            <option value=""></option>
            <option value="topic1">Topic 1</option>
            <option value="topic1">Topic 2</option>
            <option value="topic1">Topic 3</option>
            </select>
            <input class="clean" id="fcity" name="fcity"  type="text" placeholder="City"/>
            <input class="clean" id="fstate" name="fstate"  type="text" placeholder="State"/>
            <input class="clean" id="fzip" name="fzip"  type="text" placeholder="Zip"/>
            <textarea class="clean" id="fcomments" name="fcomments" placeholder="Comments"></textarea>
            <button type="submit">Submit</button>
            <div id="err"></div>
            </form>-->
            <?php echo  do_shortcode('[contact-form-7 id="280" title="Contact form 1"]');?>
        </div>
    </div>
</div>

<script type="text/javascript">
function validateEmail(email) {
    var re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}
jQuery(document).ready(function($){
	
	$('select').select2({
		
		minimumResultsForSearch: Infinity
		});
	$('.clean').focus(function(){
			$(this).css('outline', 'none');
			});
	$('select.clean').change(function(){
			$(this).next('span').css('outline', 'none');
			});
	$('#dat').submit(function(e){
		e.preventDefault();
		$('.clean').css('outline', 'none');
		$('.clean').next('span').css('outline', 'none');
		var name = $('#fname').val();
		var email = $('#femail').val();
		var topic = $('#ftopic').val();
		var idl = $('#fidl').val();
		var comment = $('#fcomments').val();
		var val = true;
		var text = '';
		if(!name || name==''){
			$('#fname').css('outline', '1px solid #b93030');
			text ='Fill in the required fields.';
			val = false;
			}
		if(!email || email==''){
			$('#femail').css('outline', '1px solid #b93030');
			text ='Fill in the required fields.';
			val = false;
			}
		if(!topic || topic==''){
			$('#ftopic').next('span').css('outline', '1px solid #b93030');
			text ='Fill in the required fields.';
			val = false;
			}
		if(!idl || idl==''){
			$('#fidl').next('span').css('outline', '1px solid #b93030');
			text ='Fill in the required fields.';
			val = false;
			}
		if(!comment || comment==''){
			$('#fcomments').css('outline', '1px solid #b93030');
			text ='Fill in the required fields.';
			val = false;
			}
		if(!validateEmail(email)){
			$('#femail').css('outline', '1px solid #b93030');
			if(text==''){
			text = 'Invalid e-mail';
			}
			val = false;
			}
		if(val){
			var data = new FormData($('#dat')[0]);
			data.append("action", "send_main");
			$.ajax({
				url: "<?php echo site_url();?>/wp-admin/admin-ajax.php",
				type: "POST",
				data: data,
				cache: false,
				contentType: false,
				processData: false,
				success: function(data)
				{
					if(data=='done'){
						$('#err').css('color', '#0f0');
						$('#err').text('Thank You for Your message.');
						setTimeout(function(){
							window.location.reload();
							}, 1000);
						}else{
							console.log(data);
							}
					}
				});	
			}else{
			$('#err').text(text);
			}
		});
		
	});
    function initialize() {
    var position = new google.maps.LatLng(<?php echo $map; ?>);
    var myOptions = {
      zoom: 12,
      center: position,
      mapTypeId: google.maps.MapTypeId.ROADMAP,
	  scrollwheel: false,
    };
    var map = new google.maps.Map(
        document.getElementById("map-canvas"),
        myOptions);
    
   var marker = new google.maps.Marker({
        position: position,
        map: map,
        title:""
    });  
    
    var contentString = '';
    var infowindow = new google.maps.InfoWindow({
        content: contentString
    });
}
google.maps.event.addDomListener(window, 'load', initialize);
</script>

<?php get_footer(); ?>