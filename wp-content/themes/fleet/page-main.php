<?php
get_header();
$popular_cruises = get_post_meta(12, 'popular-cruises', true );
$main_page = get_page(20);
?>

<div class="book-top">
<div class="spinner">
 <div class='uil-ring-css' style='transform:scale(1);'><div></div></div>
</div>
<div class="greylay">
<div class="succ">
<div class="closepo"><i class="fa fa-close"></i></div>
<img src="<?php bloginfo('template_url'); ?>/img/booking-land.png" alt="ok"/>
<h2>Tickets booked successfully!</h2>
<h3>Thank you for booking.</h3>
</div>
</div>
<div class="book-block">
        <div id="booking-body">
        
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
                foreach($cruz as $nfo) {
					$api = get_post_meta($nfo->ID, 'api-id', true);
					$api = $api[0]['id'];
					?>
                   
                   <option value="<?php echo $api;?>"><?php echo apply_filters("the_title", $nfo->post_title);?></option>
                <?php } ?>
            </select>
        </div>
        <div class="product-date">
            <div class="half" style="padding-right:20px;">
             <?php
					$api = get_post_meta($cruz[0]->ID, 'api-id', true);
					
					$api = $api[0]['id'];
					// $whole = get_all($api);
					
					//$times = get_times($whole, date('Y-m-d', strtotime('+1 days')));
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
            <input class="req form-control" name="first-name">
        </div>
        <div class="product-name">
            <span>Last name:</span>
            <input class="req form-control" name="last-name">
        </div>
        <div class="product-name">
            <span>Email address:</span>
            <input class="req form-control" name="email-address">
        </div>
        <div class="product-name">
            <span>Phone number:</span>
            <input class="req form-control" name="phone-number">
        </div>
    </div>
    
    </div>
     <div class="book-part">
    <div class="booking-form form-3">
        
        <div class="half left">
            <span>CC number:</span>
            <div><input class="req form-control" name="cc-number" /></div>
        </div>
        <div class="half right">
            <span>CVC number:</span>
            <div><input class="req form-control" name="cvc-number" /></div>
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
            <div><input class="req form-control" name="zip-code" /></div>
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
    <div class="noitems"><strong>Error:</strong> No items in the cart were found</div>
   </form>
  
</div>

        
       
    </div>
</div>
<div class="hero" style="position:relative;">
    <img src="<?php bloginfo('template_url'); ?>/img/screen.png" alt="Red and white fleet" style="width:100%;height:auto;" />
     <?php $vid = get_post_meta($main_page->ID, "Video", true);
	 
	 if(isset($vid[0])):
	 $vid = $vid[0];
	 ?>
    <canvas id="vidio"></canvas>
    <video id="video" controls loop muted>
     	 <source src="<?php echo wp_get_attachment_url($vid['video-file']); ?>" type="video/mp4">
     </video>
    
    <?php endif;?>
	
		<div id="watermark">
			<img src="<?php bloginfo('template_url'); ?>/img/watermark.png" alt="Red and white fleet" />
		</div>

</div>

<?php main_menu(''); ?>

<div id="main-scroll-down">
    <div onclick="$('html,body').animate({scrollTop:$('#popular-cruises').offset().top},500);">
        <span class="em-chevron-thin-down"></span>
    </div>
</div>

<div id="popular-cruises" class="short-block">
    <div class="container semi">
        <h1>POPULAR CRUISES</h1>
        
            <?php $meta = get_post_meta(20, "fields", true); echo apply_filters("the_content", $meta[0]['popular-cruises']); ?>
        
    </div>
</div>

<div id="popular-list" class="container">
    <?php cruises_list(); ?>
</div>


<div class="short-block fadable-content">
    <div class="container semi">
       
        <h1>ABOUT US</h1>
       
            <?php echo apply_filters("the_content", $meta[0]['about-us']); ?>
        
    </div>
</div>

<div id="main-icons" class="container fadable-content">
    <?php
    $query=$wpdb->get_results("SELECT `id`,`top`,`bottom`,`top_bold`,`bottom_bold` FROM `aboutus` ORDER BY `id` ASC");
    $total_icons=count($query);
    foreach($query as $key=>$nfo) {$key++; ?>
        <div id="icon<?php echo $nfo->id; ?>" class="main-icon<?php if($key%5==0 OR $key==$total_icons) echo ' no-border'; ?>">
            <div class="icon">
                <img src="wp-content/uploads/about_icons/id<?php echo $nfo->id; ?>.png" alt=""/>
            </div>
            <div class="line"></div>
            <p<?php if($nfo->top_bold) echo ' class="bold"'; ?>><?php echo $nfo->top; ?></p>
            <p<?php if($nfo->bottom_bold) echo ' class="bold"'; ?>><?php echo $nfo->bottom; ?></p>
            <div class="absolute-wrap"
            onmouseenter="$('#icon<?php echo $nfo->id; ?> .icon').stop(true,true).effect('bounce',{times:3},1500);"
            onmouseout="$('#icon<?php echo $nfo->id; ?> .icon').stop(false,true);"></div>
        </div>
    <?php } ?>
</div>

<div id="main-bottom">
    <div class="container">
        <div class="col-md-6 lefter">
            <div style="border:1px solid transparent;">
                <div><?php 
				$bbb = explode("<!--more-->", $main_page->post_content);
				?>
				<h4 class="paragraph"><?php echo $bbb[0];?></h4>
                <h4><?php echo $bbb[1];?></h4>
				
			</div>
            </div>
            <a href="<?php echo get_permalink(8);?>" class="red-button">
                Read more
                <span class="glyphicon glyphicon-chevron-right"></span>
            </a>
        </div>
    </div>
    
</div>
 <script>
	
	
	function draw(v,c,w,h) {
		if(v.paused || v.ended) return false;
		c.drawImage(v,0,0,w,h);
		setTimeout(draw,20,v,c,w,h);
	}
	 
	


var whole = {dates:["<?php echo date("d-m-Y");?>"]};
jQuery(document).ready(function($){	

var vd = document.getElementById('video');
		var canvas = document.getElementById('vidio');
		var context = canvas.getContext('2d');
	
		var cw = canvas.clientWidth ;
		var ch = canvas.clientHeight ;
		canvas.width = cw;
		canvas.height = ch;
	
		vd.addEventListener('play', function(){
			vd.muted;
			draw(this,context,cw,ch);
		},false);
	
		vd.play();
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
	$('.closepo').click(function(){
		$('.greylay').fadeOut();
			
		});
	$('.greylay').click(function(e){
		if($(e.target).hasClass('greylay')){
			$('.greylay').fadeOut();
			}
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
			$('.req').css('border', '1px solid #ccc');
			$('.errpop').remove();
			$('input[name=coupon-number]').css('border', '1px solid #ccc');
			$('input[name=no-of-tickets]').css('border', '1px solid #ccc');
			$('.noitems').hide();
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
					if(data == 'bad'){
						$('.req').each(function(){
							if($(this).val()==''||$(this).val()==' '){
								$(this).css('border', '2px solid #ffabab');
								}
							});
						}else if(data == 'noitems'){
							$('.noitems').show();
							}else{
								var obj = JSON.parse(data);
								if(obj.errorCode==1028){
									$('input[name=coupon-number]').css('border', '2px solid #ffabab');
									$('input[name=coupon-number]').parent('div').parent('.half').parent('.booking-form').parent('.book-part').append('<div class="errpop" style="top:'+($('input[name=coupon-number]').offset().top+$('input[name=coupon-number]').height()+24)+'px;left:'+($('input[name=coupon-number]').offset().left+($('input[name=coupon-number]').width()*0.5)-80)+'px">'+obj.message+'</div>');
									}else if(obj.code == 402){
								var mess = obj.message.split('Card exception during payment processing: ');
								if(mess.length > 1 && (mess[1]=="Your card number is incorrect." || mess[1]=="The card number is not a valid credit card number.")){
									var mi = 80;
									if(mess[1]=="The card number is not a valid credit card number."){
										mi = 135;
										}
									$('input[name=cc-number]').css('border', '2px solid #ffabab');
									$('input[name=cc-number]').parent('div').parent('.half').parent('.booking-form').parent('.book-part').append('<div class="errpop" style="top:'+($('input[name=cc-number]').offset().top+$('input[name=cc-number]').height()+24)+'px;left:'+($('input[name=cc-number]').offset().left+($('input[name=cc-number]').width()*0.5)-mi)+'px">'+mess[1]+'</div>');
									}else if(mess.length > 1 && mess[1]=="Your card's security code is invalid."){
										$('input[name=cvc-number]').css('border', '2px solid #ffabab');
										$('input[name=cvc-number]').parent('div').parent('.half').parent('.booking-form').parent('.book-part').append('<div class="errpop" style="top:'+($('input[name=cvc-number]').offset().top+$('input[name=cvc-number]').height()+24)+'px;left:'+($('input[name=cvc-number]').offset().left+($('input[name=cvc-number]').width()*0.5)-95)+'px">'+mess[1]+'</div>');
										}else{
											var mess = obj.message.split("There are not enough tickets available to satisfy this order: ");
											if(mess.length > 1){
												$('input[name=no-of-tickets]').css('border', '2px solid #ffabab');
												$('input[name=no-of-tickets]').parent('.no-of-tickets').parent('.booking-form').parent('.book-part').append('<div class="errpop" style="top:'+($('input[name=no-of-tickets]').offset().top+$('input[name=no-of-tickets]').height()+24)+'px;left:'+($('input[name=no-of-tickets]').offset().left+($('input[name=no-of-tickets]').width()*0.5)-126)+'px">'+mess[1]+'</div>');
												}
											}
									}else{
										var hei = ($(window).height()-330)/2 - 50;
										if(hei < 0){
											hei = 0;
											}
										$('.succ').css('top', hei+'px');
										$('.greylay').fadeIn();
										
										$('.req').val('');
										$('input[name=coupon-number]').val('');
										$('.ticket').remove();
										}
							}
					}
				});	
			
			});
		$('.req').focus(function(){
			$(this).css('border', '1px solid #ccc');
			});
if($(window).width() > 800){
$('.cru-image').each(function(index, element) {
            var top = Math.round((($(window).height()+ $(window).scrollTop() )-$(this).offset().top)/2)-600;
			if(top < -250){
				top = -250;
				}else if(top > 500){
					top = 500;
					}
				$(this).css('background-position', 'center top '+top+'px');
        });
	var top2 = Math.round((($(window).height()+ $(window).scrollTop() )-$('#main-bottom').offset().top)/2)-600;	
	$('#main-bottom').css('background-position', 'center top '+top2+'px');
	$(window).scroll(function(){
		$('.cru-image').each(function(index, element) {
            var top = Math.round((($(window).height()+ $(window).scrollTop() )-$(this).offset().top)/2)-600;
			if(top < -250){
				top = -250;
				}else if(top > 500){
					top = 500;
					}
				$(this).css('background-position', 'center top '+top+'px');
        });
		var top2 = Math.round((($(window).height()+ $(window).scrollTop() )-$('#main-bottom').offset().top)/2.0)-600;	
		$('#main-bottom').css('background-position', 'center top '+top2+'px');
		});
}
	$('#mmm').click(function(){
		$(this).toggleClass('redd');
		$(this).toggleClass('redbor');
		if($('.book-top').is(':visible')){
		$(this).html('<div><span class="fa fa-ticket"></span></div>Book tickets');
		}else{
			$('.spinner').fadeIn();
		$(this).html('<div><span class="fa fa-close"></span></div>Close form');	
		var b = $('#product-name').val();
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
		}
		$('.book-top').slideToggle();
		});
	/* $(window).scroll(function(){
		
		$('.cru-image').each(function(){
			
			$(this).css('background-position', 'top '+($(window).scrollTop()-$(this).offset().top)/2+'px center;');
			});
		}); */
	});
</script>
<?php get_footer(); //echo "<pre>";print_r(get_all($api));?>