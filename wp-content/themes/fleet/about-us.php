<?php
/* Template Name: About Us */
get_header();
$active = array('', '', '', '');
    $triangle = array('', '', '', '');
if(isset($_GET['u'])) {
    $u = $_GET['u'];
    
    
    if($u=='people') {
        $link_title = 'People';
        $h_title = 'PEOPLE';
        $active[1] = ' class="active"';
        $triangle[1] = '<div class="triangle-right"></div>';
        $link = 'people';
        $incl = 'people';
    }
    else if($u=='history') {
        $link_title = 'History';
        $h_title = 'OUR HISTORY';
        $active[2] = ' class="active"';
        $triangle[2] = '<div class="triangle-right"></div>';
        $link = 'history';
        $incl = 'history';
    }
    else if($u=='ships') {
        $link_title = 'Ships';
        $h_title = 'SHIPS';
        $active[3] = ' class="active"';
        $triangle[3] = '<div class="triangle-right"></div>';
        $link = 'ships';
        $incl = 'ships';
    }
    else {
        $link_title = 'Fast facts';
        $h_title = 'FAST FACTS';
        $active[0] = ' class="active"';
        $triangle[0] = '<div class="triangle-right"></div>';
        $link = 'fast-facts';
        $incl = 'facts';
    }
}
else {
    $link_title = 'Fast facts';
    $h_title = 'FAST FACTS';
    $active[0] = ' class="active"';
    $triangle[0] = '<div class="triangle-right"></div>';
    $link = 'fast-facts';
    $incl = 'facts';
}
$page = get_page(8);
?>
<div id="about-us-head">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1><?php echo $page->post_title; ?></h1>
                <p>
                    <?php echo apply_filters('the_content',$page->post_content); ?>
                </p>
                <ul>
                    <li><a href="<?php echo get_home_url(); ?>">Home page</a></li>
                    <li><span class="fa fa-chevron-right"></span></li>
                    <li><a href="<?php echo get_home_url(); ?>/?page_id=8">About</a></li>
                    <li><span class="fa fa-chevron-right"></span></li>
                    <li><a href="<?php echo get_home_url(); ?>/?page_id=8&amp;u=<?php echo $link; ?>"><?php echo $link_title; ?></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<?php main_menu('ABOUT US'); ?>

<div id="about-us-body" class="container abo">
    <div class="row">
        <div class="col-md-4 left-side">
            <ul>
                <li><a<?php echo $active[0]; ?> href="<?php echo get_home_url(); ?>/?page_id=8&amp;u=fast-facts">FAST FACTS<?php echo $triangle[0]; ?></a></li>
                <li><a<?php echo $active[1]; ?> href="<?php echo get_home_url(); ?>/?page_id=8&amp;u=people">PEOPLE<?php echo $triangle[1]; ?></a></li>
                <li><a<?php echo $active[2]; ?> href="<?php echo get_home_url(); ?>/?page_id=8&amp;u=history">HISTORY<?php echo $triangle[2]; ?></a></li>
                <li class="no-border"><a<?php echo $active[3]; ?> href="<?php echo get_home_url(); ?>/?page_id=8&amp;u=ships">SHIPS<?php echo $triangle[3]; ?></a></li>
            </ul>
        </div>
        <div id="our-history-top" class="col-md-8">
            
            <h1><?php echo $h_title; ?></h1>
            <?php include('about_us/'.$incl.'.php'); ?>
            
        </div>
    </div>
</div>
<script>
jQuery(document).ready(function($){
	if($(window).height()>500&&$(window).width()>991){
	var top = $(window).scrollTop();
	if(top > ($('#about-us-body').height() - 250)){
		top = $('#about-us-body').height() - 250;
		}
	$('.left-side ul').css('margin-top', top+'px');
	
	$(window).scroll(function(){
	var top = $(window).scrollTop();
	
	if(top > ($('#about-us-body').height() - 250)){
		top = $('#about-us-body').height() - 250;
		}
	$('.left-side ul').css('margin-top', top+'px');
	});
	}
	});
</script>
<?php get_footer(); ?>