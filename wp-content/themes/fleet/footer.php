<div id="footer-one" class="fadable-content">
    <div class="container">
        <div class="row">
            <?php footer_menu(); ?>
            <div class="fff gtrrr">
                
                <div class="language">
                    
                    <?php echo do_shortcode('[google-translator]'); ?>
                </div>
                <div class="icons">
                    <?php
                    $twitter=get_option('qs_contact_twitter');
                    $facebook=get_option('qs_contact_facebook');
                    $youtube=get_option('qs_contact_youtube');
                    $google=get_option('qs_contact_google');
                    $linkedin=get_option('qs_contact_linkedin');
                    if($twitter) echo '<a href="'.$twitter.'" target="_blank"><span class="fa fa-twitter-square"></span></a>';
                    if($facebook) echo '<a href="'.$facebook.'" target="_blank"><span class="fa fa-facebook-official"></span></a>';
                    if($youtube) echo '<a href="'.$youtube.'" target="_blank"><span class="fa fa-youtube-square"></span></a>';
                    if($google) echo '<a href="'.$google.'" target="_blank"><span class="fa fa-google-plus-square"></span></a>';
                    if($linkedin) echo '<a href="'.$linkedin.'" target="_blank"><span class="fa fa fa-linkedin-square"></span></a>';
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="footer-two" class="fadable-content">
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <div class="wrapper">
                    <img class="img-responsive" src="<?php echo get_bloginfo('template_directory'); ?>/img/logo.png" alt="Red and White Fleet" />
                </div>
            </div>
            <div class="col-md-4">
                <div class="wrapper">
                    <h4>STAY IN TOUCH</h4>
                    <p>Sign up for our newsletter for monthly deals and specials!</p>
                    <div class="footer-conector">
                   
                    <form method="post" action="http://109.235.71.180/?na=s" onsubmit="return newsletter_check(this)">
                        <input class="form-control" type="email" name="ne" placeholder="Please enter your e-mail" style="display:inline;width:250px;" />
                        &nbsp;
                        <input class="subscribe-button" type="submit" value="Subscribe"/>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="wrapper">
                    <table>
                        <tr>
                            <th>Address:</th>
                            <td>
                                <?php
                                echo stripslashes(get_option('qs_contact_street')).', '.get_option('qs_contact_city').', '.get_option('qs_contact_state');
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Phone:</th>
                            <td><?php echo get_option('qs_contact_phone'); ?></td>
                        </tr>
                        <tr>
                            <th>Fax:</th>
                            <td><?php echo get_option('qs_contact_fax'); ?></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="col-md-2">
                <div class="wrapper">
                    <div id="TA_certificateOfExcellence376" class="TA_certificateOfExcellence"><ul id="yWeY8Mh" class="TA_links fwtwJ2bE"><li id="dyY0niG" class="ydnNSNO"><a target="_blank" href="http://www.tripadvisor.com/Attraction_Review-g60713-d653292-Reviews-Red_and_White_Fleet-San_Francisco_California.html"><img src="http://www.tripadvisor.com/img/cdsi/img2/awards/CoE2015_WidgetAsset-14348-2.png" alt="TripAdvisor" class="widCOEImg" id="CDSWIDCOELOGO"/></a></li></ul></div><script src="http://www.jscache.com/wejs?wtype=certificateOfExcellence&amp;uniq=376&amp;locationId=653292&amp;lang=en_US&amp;year=2015&amp;display_version=2"></script>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="footer">
    <div class="container">
        Industry Resources &#169; <?php echo date("Y");?> Red and White Fleet. All Rights Reserved
    </div>
</div>
<script>
jQuery(document).ready(function($){
	window.onload = function(){
	setTimeout(function(){
	$('#footer-one .goog-te-combo').select2({
		placeholder: "Select Language",
		minimumResultsForSearch: Infinity
		});
	}, 500);
	}
	});
</script>
<?php wp_footer();?>
</body>
</html>