<?php
/* Template Name: Booking */
get_header();





?>
<div class="spinner fx">
 <div class='uil-ring-css' style='transform:scale(1);'><div></div></div>
</div>
<div id="about-us-head">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1>CRUISES</h1>
                <p>
                    During the winter months, Red and White Fleet offers visitors and locals alike the opportunity to see San Francisco's skyline and the Bay Lights
                </p>
                <ul>
                    <li><a href="<?php echo get_home_url(); ?>">Home page</a></li>
                    <li><span class="fa fa-chevron-right"></span></li>
                    <li><a href="<?php echo get_home_url(); ?>/?page_id=12">Cruises</a></li>
                    <li><span class="fa fa-chevron-right"></span></li>
                    <li><a href="<?php echo get_home_url(); ?>/booking/">Book tickets</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<?php main_menu('BOOKING'); ?>

<div id="booking-body" class="container nk">

    <h1>Book tickets</h1>
    <div class="red-line">
    
    </div>
    <form id="the-form" action="#" method="post">
    <div class="book-part">
    <div class="booking-form">
        
        <div class="product-name">
            <span>Select Cruise:</span>
            <select class="form-control" name="product-name" id="product-name">
               <?php
				$args = array(
					'posts_per_page'   => -1,
					'orderby'          => 'menu_order',
					'order'            => 'DESC',
					'post_type'        => 'post',
					'post_status'      => 'publish',
					'suppress_filters' => true 
				);
				$cruz = get_posts( $args );
				 if (isset($_GET['id'])) {$id=(int) $_GET['id'];}
else {$id=$cruz[0]->ID;}
                foreach($cruz as $nfo) {
					$api = get_post_meta($nfo->ID, 'api-id', true);
					$api = $api[0]['id'];
					?>
                   
                   <option value="<?php echo $api;?>"<?php if($nfo->ID==$id):?> selected="selected"<?php endif;?>><?php echo apply_filters("the_title", $nfo->post_title);?></option>
                <?php } ?>
            </select>
        </div>
        <div class="product-date">
            <div class="half" style="padding-right:20px;">
             <?php
			
					$api = get_post_meta($id, 'api-id', true);
					
					$api = $api[0]['id'];
					
					 ?>
                <span>Cruise date:</span>
                <div class="input-group">
                    <input name="product-date" id="product-date" type="text" class="datepicker form-control" data-provide="datepicker">
                    <span class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </span>
                </div>
            </div>
            <div class="half" style="padding-left:20px;">
                <span>Cruise time:</span>
                <div>
                    <select name="product-time" class="form-control" id="product-time">
                       
                    </select>
                </div>
            </div>
        </div>
        <div class="no-of-tickets">
            <span>Number of Tickets:</span> <input class="form-control" type="text" name="no-of-tickets" id="no-of-tickets" value="1" />
        </div>
        <div class="no-of-people">
            <span>Number of People under 70 pounds:</span> <input class="form-control" type="text" name="no-of-people" value="1" />
        </div>
        <div class="ticket-type">
            <span>Ticket type:</span>
            <?php  //print_r($whole["events"][date("Y-m-d", strtotime($whole["dates"][0]))][$vv]["prices"]);?>
            <select class="form-control" name="ticket-type" id="ticket-type">
               
            </select>
        </div>
        
        
    </div>
    
    </div>
     <div class="book-part">
    <div class="booking-form">
        
        <div class="product-name">
            <span>First name:</span>
            <input class="form-control" name="first-name">
        </div>
        <div class="product-name">
            <span>Last name:</span>
            <input class="form-control" name="last-name">
        </div>
        <div class="product-name">
            <span>Email address:</span>
            <input class="form-control" name="email-address">
        </div>
        <div class="product-name">
            <span>Phone number:</span>
            <input class="form-control" name="phone-number">
        </div>
    </div>
    
    </div>
     <div class="book-part">
    <div class="booking-form form-3">
        
        <div class="half left">
            <span>CC number:</span>
            <div><input class="form-control" name="cc-number" /></div>
        </div>
        <div class="half right">
            <span>CVC number:</span>
            <div><input class="form-control" name="cvc-number" /></div>
        </div>
        
        <div class="half left">
            <span>EXP month:</span>
            <div>
                <select class="form-control" name="exp-month">
                    <option value="01">January</option>
                    <option value="02">February</option>
                    <option value="03">March</option>
                    <option value="04">April</option>
                    <option value="05">May</option>
                    <option value="06">June</option>
                    <option value="07">July</option>
                    <option value="08">August</option>
                    <option value="09">September</option>
                    <option value="10">October</option>
                    <option value="11">November</option>
                    <option value="12">December</option>
                </select>
            </div>
        </div>
        <div class="half right">
            <span>EXP year:</span>
            <div>
                <select class="form-control" name="exp-year">
                	<option value="16">2016</option>
                    <option value="17">2017</option>
                    <option value="18">2018</option>
                    <option value="19">2019</option>
                    <option value="20">2020</option>
                    <option value="21">2021</option>
                    <option value="22">2022</option>
                </select>
            </div>
        </div>
        
        <div class="half left">
            <span>ZIP code:</span>
            <div><input class="form-control" name="zip-code" /></div>
        </div>
        <div class="half right">
            <span>Coupon code:</span>
            <div><input class="form-control" name="coupon-number" /></div>
        </div>
        
    </div>
    
    <div style="clear:both;margin-top:20px;"></div>
    
    
     
    </div>
    <div class="book-control">
    <div class="small-book">
    <button type="button" class="book-tickets no-border redbor" id="addtik">
            <div><span class="fa fa-plus"></span></div>Add ticket
        </button>
    </div>
    <div class="mid-book">
    <button type="submit" class="book-tickets redd">
        <span><span class="fa fa-ticket"></span></span>
        Book tickets
    </button>
    </div>
    </div>
    <div class="intik"></div>
   </form>
</div>

<script>
var whole = {dates:["<?php echo date("d-m-Y");?>"]};
    jQuery(document).ready(function ($) {
       $('#addtik').click(function(){
		var htm = '';
		htm = htm + '<div class="ticket"><div class="book-tickets no-border redbor removeitem"><span><span class="fa fa-close"></span></span><n>Remove item</n></div><div class="overflow"><table><tr><td><strong>Cruise:</strong> '+$('#product-name option:selected').text()+'</td><td><strong>Number of Tickets:</strong> '+$('#no-of-tickets').val()+'</td><td><strong>Ticket type:</strong> '+$('#ticket-type option:selected').text()+'</td><td><strong>Cruise date:</strong> '+$('.datepicker').val()+'</td><td><strong>Cruise time:</strong> '+$('#product-time option:selected').text()+'</td></tr></table><input type="hidden" name="quan['+$('.intik .ticket').length+']" value="'+$('#no-of-tickets').val()+'"/><input type="hidden" name="event['+$('.intik .ticket').length+']" value="'+$('#product-time').val()+'"/><input type="hidden" name="type['+$('.intik .ticket').length+']" value="'+$('#ticket-type').val()+'"/></div></div>';
		$('.intik').append(htm);
		$('.removeitem').on('click', function(){
		$(this).parent('.ticket').remove();
		});
		});
	
	$('#product-name').change(function(){
		$('.spinner').fadeIn();
		var b = $(this).val();
		var data = new FormData();
			data.append("action", "get_all_ajax");
			data.append("key", b);
			$.ajax({
				url: "<?php echo site_url();?>/wp-admin/admin-ajax.php",
				type: "POST",
				data: data,
				cache: false,
				contentType: false,
				processData: false,
				success: function(data)
				{
					whole = JSON.parse(data);
						 $("#datepicker").datepicker("refresh"); 	
					
				var html = '';
				var ct=0;
				
				$.each(whole['events'][$('#product-date').val()], function(i, v){
					html = html+'<option data-time="'+i+'" value="'+v['id']+'">'+v['time']+'</option>';
					if(ct==0){
						var html2 = '';
						$.each(v['prices'], function(j, w){
							html2 = html2+'<option value="'+w['personType']['id']+'">'+w['personType']['name']+'</option>';					
							});
						$('#ticket-type').html(html2);
						}
					ct++;
					});
					$('#product-time').html(html);
					$('.spinner').fadeOut();
					}
				});	
		});
	$('#product-time').change(function(){
		var html2 = '';
		$.each(whole['events'][$('#product-date').val()][$('#product-time option:selected').data('time')]['prices'], function(j, w){
					html2 = html2+'<option value="'+w['personType']['id']+'">'+w['personType']['name']+'</option>';
					});
				$('#ticket-type').html(html2);
		});
	$('#product-date').change(function(){
		var c = $(this).val();
		
		var html = '';
		var ct=0;
		$.each(whole['events'][c], function(i, v){
			html = html+'<option data-time="'+i+'" value="'+v['id']+'">'+v['time']+'</option>';
			if(ct==0){
				var html2 = '';
				$.each(v['prices'], function(j, w){
					html2 = html2+'<option value="'+w['personType']['id']+'">'+w['personType']['name']+'</option>';					
					});
				$('#ticket-type').html(html2);
				}
			ct++;
			});
			$('#product-time').html(html);
		});	

			$('.datepicker').datepicker({ 
					dateFormat: 'dd-mm-yy', 
					minDate: whole['dates'][0],  
					beforeShowDay: function(d) {
					// normalize the date for searching in array
					var dmy = "";
					dmy += ("00" + d.getDate()).slice(-2) + "-";
					dmy += ("00" + (d.getMonth() + 1)).slice(-2) + "-";
					dmy += d.getFullYear();
					return [$.inArray(dmy, whole['dates']) >= 0 ? true : false, ""];
							}
						});
		$('.datepicker').datepicker("setDate", "1");
		$('#the-form').submit(function(e){
			e.preventDefault();
			var data = new FormData($('#the-form')[0]);
			data.append("action", "order");
			$.ajax({
				url: "<?php echo site_url();?>/wp-admin/admin-ajax.php",
				type: "POST",
				data: data,
				cache: false,
				contentType: false,
				processData: false,
				success: function(data)
				{
					console.log(data);
					}
				});	
			
			});
	var b = '<?php echo $api?>';
		var data = new FormData();
			data.append("action", "get_all_ajax");
			data.append("key", b);
			$.ajax({
				url: "<?php echo site_url();?>/wp-admin/admin-ajax.php",
				type: "POST",
				data: data,
				cache: false,
				contentType: false,
				processData: false,
				success: function(data)
				{
					whole = JSON.parse(data);
						 $("#datepicker").datepicker("refresh"); 	
					
				var html = '';
				var ct=0;
				
				$.each(whole['events'][$('#product-date').val()], function(i, v){
					html = html+'<option data-time="'+i+'" value="'+v['id']+'">'+v['time']+'</option>';
					if(ct==0){
						var html2 = '';
						$.each(v['prices'], function(j, w){
							html2 = html2+'<option value="'+w['personType']['id']+'">'+w['personType']['name']+'</option>';					
							});
						$('#ticket-type').html(html2);
						}
					ct++;
					});
					$('#product-time').html(html);
					$('.spinner').fadeOut();
					}
				});	
    });
</script>

<?php get_footer(); ?>