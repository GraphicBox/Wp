<?php
/* Template Name: About Us */
get_header();

if(isset($_GET['u'])) {
    $u = $_GET['u'];
    $active = array('', '', '', '');
    $triangle = array('', '', '', '');
    
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
                <h1><?php echo $post->post_title; ?></h1>
                <p>
                    <?php echo apply_filters('the_content',$post->post_excerpt); ?>
                </p>
                <ul>
                    <li><a href="<?php echo get_home_url(); ?>">Home page</a></li>
                    <li><span class="fa fa-chevron-right"></span></li>
                    <li><a href="<?php echo get_permalink(); ?>"><?php echo apply_filters("the_title", $post->post_title);?></a></li>
                    
                </ul>
            </div>
        </div>
    </div>
</div>

<?php main_menu(strtoupper($post->post_title));?>

<div class="container content">
  <?php 
  $morestring = '<!--more-->';
  $explodemore = explode($morestring, $post->post_content);
  
  echo apply_filters("the_content", $explodemore[0]);
  $meta = get_post_meta($post->ID, "page", true);
  if(isset($meta)&&is_array($meta)):
  foreach($meta as $me):
  ?>
  <div class="titl"><i class="fa fa-angle-right"></i><?php echo $me['title'];?></div>
  <div class="dtext"><?php echo $me['text'];?></div>
  <?php endforeach;endif; if(count($explodemore)>1){ echo apply_filters("the_content", $explodemore[1]);}?>
</div>
<script>
jQuery(document).ready(function($){
	$('.titl').click(function(){
		$(this).children('i').toggleClass('fa-angle-right');
		$(this).children('i').toggleClass('fa-angle-down');
		$(this).next('.dtext').slideToggle();
		});
	});
</script>
<?php get_footer(); ?>