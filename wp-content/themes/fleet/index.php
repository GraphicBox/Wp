<?php get_header(); ?>

<div>
    <img src="<?php bloginfo('template_url'); ?>/img/bg.jpg" alt="Red and white fleet" style="width:100%;height:auto;" />
</div>

<div id="top-nav" class="container-fluid">
    <div class="container">
        <a href="<?php echo get_home_url(); ?>/booking/">
            <div class="book-tickets no-border">
                <div><span class="fa fa-ticket"></span></div>
                Book tickets
            </div>
        </a>
        <ul>
            <li><a href="<?php echo get_home_url(); ?>/?page_id=12"><span>CRUISES</span></a></li>
            <li><a href="<?php echo get_home_url(); ?>/?page_id=8"><span>ABOUT US</span></a></li>
            <li><a href=""><span>PARTNERS</span></a></li>
            <li class="last"><a href=""><span>CONTACT</span></a></li>
        </ul>
        <div class="nav-menu-icon" onclick="nav_menu_icon();">
            <span id="nav1" class="glyphicon glyphicon-menu-hamburger"></span>
            <span id="nav2" class="glyphicon glyphicon-remove no-display"></span>
        </div>
    </div>
</div>

<div id="watermark">
    <img src="<?php bloginfo('template_url'); ?>/img/watermark.png" alt="Red and white fleet" />
</div>

<div id="main-scroll-down">
    <a href="#popular-cruises"><div class="glyphicon glyphicon-chevron-down"></div></a>
</div>

<div id="popular-cruises" class="short-block">
    <div class="container">
        <h1>POPULAR CRUISES</h1>
        <p>
            Enjoy stunning views of the Bay and Alcatraz without ever having to leave the ship. <br>
            leo eged bibendum sodales, augue velit cursus nunc
        </p>
    </div>
</div>

<div id="popular-list" class="container">
    <?php cruises_list(); ?>
</div>


<div class="short-block">
    <div class="container">
        <h1>ABOUT US</h1>
        <p>
            Enjoy stunning views of the Bay and Alcatraz without ever having to leave the ship. <br>
            leo eged bibendum sodales, augue velit cursus nunc
        </p>
    </div>
</div>

<div id="main-icons" class="container">
    <div class="main-icon">
        <div class="icon">
            <img src="<?php bloginfo('template_url'); ?>/img/icon1.png" alt=""/>
        </div>
        <div class="line"></div>
        <h3>16</h3>
        <p>languages</p>
    </div>
    <div class="main-icon">
        <div class="icon">
            <img src="<?php bloginfo('template_url'); ?>/img/icon2.png" alt=""/>
        </div>
        <div class="line"></div>
        <p>founded in</p>
        <h3>1892</h3>
    </div>
    <div class="main-icon">
        <div class="icon">
            <img src="<?php bloginfo('template_url'); ?>/img/icon3.png" alt=""/>
        </div>
        <div class="line"></div>
        <h3>10</h3>
        <p>cruises</p>
    </div>
    <div class="main-icon">
        <div class="icon">
            <img src="<?php bloginfo('template_url'); ?>/img/icon4.png" alt=""/>
        </div>
        <div class="line"></div>
        <h3>5</h3>
        <p>boats</p>
    </div>
    <div class="main-icon no-border">
        <div class="icon">
            <img src="<?php bloginfo('template_url'); ?>/img/icon5.png" alt=""/>
        </div>
        <div class="line"></div>
        <h3>10</h3>
        <p>cruises</p>
    </div>
</div>

<div id="main-bottom">
    <div class="container">
        <div class="col-md-7">
            <p class="paragraph">
                Founded in 1892, the historic Red and White Fleet&#174; is legendary for its premiere San Francisco cruises.
                Family owned, the Red and White Fleet&#174; is committed to environmental sustainability and community education.
            </p>
            <p>
                In 1892, seventeen year old Thomas Crowley launched the first of many companies which would one day be a fixture of the San Francisco Bay.
                Using $80 he had saved, he purchased a used Whitehall boat, and in so doing entered the competitive boating business of the time.
                His inaugural boat was just eighteen feet long and less than
            </p>
            <div class="red-button">
                Read more
                <span class="glyphicon glyphicon-chevron-right"></span>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>