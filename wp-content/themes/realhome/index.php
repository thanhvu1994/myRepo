<!--//head-->
<?php get_template_part( 'inc/head'); ?>

<!--//header-->
<?php get_header(); ?>

<!--//banner-->
<?php get_template_part( 'inc/banner'); ?>

<!--//header_bottom-->
<?php get_template_part( 'inc/header_bottom'); ?>

<!--//main-->
<!--content-->
<div class="content">
    <!--//most_popular-->
    <?php get_template_part( 'inc/most_popular'); ?>

    <!--service-->
    <?php
        get_template_part( 'inc/service');
    ?>

    <!--features-->
    <?php
        set_query_var( 'inner_banner_slug', 'home-inner-banner' );
        get_template_part( 'inc/inner_banner');
    ?>

    <!--project--->
    <?php
    get_template_part( 'inc/project_gallery');
    ?>

    <!--test-->
    <div class="content-bottom">
        <div class="container">
            <h3>Testimonials</h3>
            <div class="col-md-6 name-in">
                <div class=" bottom-in">
                    <p class="para-in">Duis aute irure dolor in reprehenderit in voluptate
                        velit esse cillum dolore eu fugiat nulla pariatur.</p>
                    <i class="dolor"> </i>
                    <div class="men-grid">
                        <a href="#" class="men-top"><img class="img-responsive men-top" src="<?php echo THEME_URL; ?>/images/te.jpg" alt=""></a>
                        <div class="men">
                            <span>Roger V. Coates</span>
                            <p>Ut enim ad minim</p>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                </div>
                <div class=" bottom-in">
                    <p class="para-in">Duis aute irure dolor in reprehenderit in voluptate
                        velit esse cillum dolore eu fugiat nulla pariatur.</p>
                    <i class="dolor"> </i>
                    <div class="men-grid">
                        <a href="#" class="men-top"><img class="img-responsive " src="<?php echo THEME_URL; ?>/images/te2.jpg" alt=""></a>
                        <div class="men">
                            <span>Ann K. Perez</span>
                            <p>Ut enim ad minim</p>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6  name-on">
                <div class="bottom-in ">
                    <p class="para-in">Duis aute irure dolor in reprehenderit in voluptate
                        velit esse cillum dolore eu fugiat nulla pariatur.</p>
                    <i class="dolor"> </i>
                    <div class="men-grid">
                        <a href="#" class="men-top"><img class="img-responsive " src="<?php echo THEME_URL; ?>/images/te1.jpg" alt=""></a>
                        <div class="men">
                            <span>Nancy M. Picker</span>
                            <p>Ut enim ad minim</p>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
    <!--//test-->
    <!--partners-->
    <div class="content-bottom1">
        <h3>Our Partners</h3>
        <div class="container">
            <ul>
                <li><a href="#"><img class="img-responsive" src="<?php echo THEME_URL; ?>/images/lg.png" alt=""></a></li>
                <li><a href="#"><img class="img-responsive" src="<?php echo THEME_URL; ?>/images/lg1.png" alt=""></a></li>
                <li><a href="#"><img class="img-responsive" src="<?php echo THEME_URL; ?>/images/lg2.png" alt=""></a></li>
                <li><a href="#"><img class="img-responsive" src="<?php echo THEME_URL; ?>/images/lg3.png" alt=""></a></li>
                <li><a href="#"><img class="img-responsive" src="<?php echo THEME_URL; ?>/images/lg4.png" alt=""></a></li>
                <div class="clearfix"> </div>
            </ul>
            <ul>
                <li><a href="#"><img class="img-responsive" src="<?php echo THEME_URL; ?>/images/lg5.png" alt=""></a></li>
                <li><a href="#"><img class="img-responsive" src="<?php echo THEME_URL; ?>/images/lg6.png" alt=""></a></li>
                <li><a href="#"><img class="img-responsive" src="<?php echo THEME_URL; ?>/images/lg7.png" alt=""></a></li>
                <li><a href="#"><img class="img-responsive" src="<?php echo THEME_URL; ?>/images/lg8.png" alt=""></a></li>
                <li><a href="#"><img class="img-responsive" src="<?php echo THEME_URL; ?>/images/lg9.png" alt=""></a></li>
                <div class="clearfix"> </div>
            </ul>
        </div>
    </div>
    <!--//partners-->
</div>

<!--//footer-->
<?php get_footer(); ?>
