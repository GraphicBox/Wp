<div class="content">
<?php 
$post = get_post( 81);
  $morestring = '<!--more-->';
  $explodemore = explode($morestring, $post->post_content);
  echo apply_filters("the_content", $explodemore[0]);
  $meta = get_post_meta($post->ID, "page2", true);
  if(isset($meta)&&is_array($meta)):
  foreach($meta as $me):
  ?>
  <div class="titl"><i class="fa fa-angle-right"></i><?php echo $me['title'];?></div>
  <div class="dtext"><?php echo $me['text'];?></div>
  <?php endforeach;endif; if(count($explodemore)>1){echo apply_filters("the_content", $explodemore[1]);}?>
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