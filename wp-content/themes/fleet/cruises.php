<?php
/* Template Name: Cruises */
get_header();
$page=get_post(12);
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
                    <li><a href="<?php echo get_home_url(); ?>/?page_id=12">Cruises</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<?php main_menu('CRUISES'); ?>

<div id="popular-list" class="container">
    <?php cruises_list(); ?>
</div>
<script>
jQuery(document).ready(function($){	
if($(window).width() > 800){
$('.cru-image').each(function(index, element) {
            var top = Math.round((($(window).height()+ $(window).scrollTop() )-$(this).offset().top)/1.6)-500;
			console.log(top);
			if(top < -250){
				top = -250;
				}else if(top > 500){
					top = 500;
					}
				$(this).css('background-position', 'center top '+top+'px');
        });
	$(window).scroll(function(){
		$('.cru-image').each(function(index, element) {
            var top = Math.round((($(window).height()+ $(window).scrollTop() )-$(this).offset().top)/1.6)-500;
			console.log(top);
			if(top < -250){
				top = -250;
				}else if(top > 500){
					top = 500;
					}
				$(this).css('background-position', 'center top '+top+'px');
        });
		});
}
});
</script>
<?php get_footer(); ?>