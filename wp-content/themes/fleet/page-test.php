<?php
get_header();
$popular_cruises = get_post_meta(12, 'popular-cruises', true );
$main_page = get_page(20);
?>

<div class="hero">
    <img src="<?php bloginfo('template_url'); ?>/img/screen.png" alt="Red and white fleet" style="width:100%;height:auto;" />
     <?php $vid = get_post_meta($main_page->ID, "Video", true);
	 
	 if(isset($vid[0])):
	 $vid = $vid[0];
	 ?>
    <canvas id="vidio"></canvas>
    <video id="video" controls loop muted>
     	 <source src="<?php echo wp_get_attachment_url($vid['video-file']); ?>" type="video/mp4">
     </video>
     <script>
	 window.onload = function(){
	
		var v = document.getElementById('video');
		var canvas = document.getElementById('vidio');
		var context = canvas.getContext('2d');
	
		var cw = canvas.clientWidth ;
		var ch = canvas.clientHeight ;
		canvas.width = cw;
		canvas.height = ch;
	v.play();
		v.addEventListener('play', function(){
			v.muted;
			draw(this,context,cw,ch);
		},false);
	
	}
	
	function draw(v,c,w,h) {
		if(v.paused || v.ended) return false;
		c.drawImage(v,0,0,w,h);
		setTimeout(draw,20,v,c,w,h);
	}
	 
	</script>
    <?php endif;?>
</div>

<?php main_menu2(''); ?>

<div id="watermark">
    <img src="<?php bloginfo('template_url'); ?>/img/watermark.png" alt="Red and white fleet" />
</div>

<div id="main-scroll-down">
    <div onclick="$('html,body').animate({scrollTop:$('#popular-cruises').offset().top},500);">
        <span class="em-chevron-thin-down"></span>
    </div>
</div>

<div id="popular-cruises" class="short-block">
    <div class="container semi">
        <h1>POPULAR CRUISES</h1>
        <p>
            <?php echo apply_filters('the_content',$popular_cruises); ?>
        </p>
    </div>
</div>

<div id="popular-list" class="container">
    <?php cruises_list2(); ?>
</div>


<div class="short-block fadable-content">
    <div class="container semi">
        <?php
        $about_page = get_page(8);
        $about_us_text = get_post_meta(8, 'about-us-main', true );
        ?>
        <h1><?php echo $about_page->post_title; ?></h1>
        <p>
            <?php echo apply_filters('the_content',$about_us_text); ?>
        </p>
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
                <div><?php echo apply_filters('the_content',$main_page->post_content); ?></div>
            </div>
            <a href="<?php echo get_permalink(8);?>" class="red-button">
                Read more
                <span class="glyphicon glyphicon-chevron-right"></span>
            </a>
        </div>
    </div>
</div>
<script>
jQuery(document).ready(function($){
	/*$(window).scroll(function(){
		
		$('.cru-image').each(function(){
			
			$(this).css('background-position', 'top '+($(window).scrollTop()-$(this).offset().top)+'px center;');
			});
		});*/
	});
</script>
<?php get_footer(); ?>