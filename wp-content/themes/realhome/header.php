<div class="navigation">
    <div class="container-fluid">
        <?php realhome_menu('main-menu'); ?>
    </div>
</div>

<div class="header">
    <div class="container">
        <!--logo-->
        <div class="logo">
            <h1><a href="<?php echo get_bloginfo( 'url' ); ?>"><?php echo get_bloginfo( 'sitename' ); ?></a></h1>
        </div>
        <!--//logo-->
        <div class="top-nav">
            <ul class="right-icons">
                <li><span ><i class="glyphicon glyphicon-phone"> </i><?php echo get_option('phone_field'); ?></span></li>
                <li><a  href="<?php echo admin_url(); ?>"><i class="glyphicon glyphicon-user"> </i>Login</a></li>
                <li><a class="play-icon popup-with-zoom-anim" href="#small-dialog"><i class="glyphicon glyphicon-search"> </i> </a></li>

            </ul>
            <div class="nav-icon">
                <div class="hero fa-navicon fa-2x nav_slide_button" id="hero">
                    <a href="#"><i class="glyphicon glyphicon-menu-hamburger"></i> </a>
                </div>
                <!---
                <a href="#" class="right_bt" id="activator"><i class="glyphicon glyphicon-menu-hamburger"></i>  </a>
            --->
            </div>
            <div class="clearfix"> </div>
            <!---pop-up-box---->

            <link href="<?php echo THEME_URL; ?>/css/popuo-box.css" rel="stylesheet" type="text/css" media="all"/>
            <script src="<?php echo THEME_URL; ?>/js/jquery.magnific-popup.js" type="text/javascript"></script>
            <!---//pop-up-box---->
            <div id="small-dialog" class="mfp-hide">
                <!----- tabs-box ---->
                <div class="sap_tabs">
                    <div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
                        <ul class="resp-tabs-list">
                            <li class="resp-tab-item " aria-controls="tab_item-0" role="tab"><span>All Homes</span></li>
                            <li class="resp-tab-item" aria-controls="tab_item-1" role="tab"><span>For Sale</span></li>
                            <li class="resp-tab-item" aria-controls="tab_item-2" role="tab"><span>For Rent</span></li>
                            <div class="clearfix"></div>
                        </ul>
                        <div class="resp-tabs-container">
                            <h2 class="resp-accordion resp-tab-active" role="tab" aria-controls="tab_item-0"><span class="resp-arrow"></span>All Homes</h2><div class="tab-1 resp-tab-content resp-tab-content-active" aria-labelledby="tab_item-0" style="display:block">
                                <div class="facts">
                                    <div class="login">
                                        <input type="text" value="Search Address, Neighborhood, City or Zip" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search Address, Neighborhood, City or Zip';}">
                                        <input type="submit" value="">
                                    </div>
                                </div>
                            </div>
                            <h2 class="resp-accordion" role="tab" aria-controls="tab_item-1"><span class="resp-arrow"></span>For Sale</h2><div class="tab-1 resp-tab-content" aria-labelledby="tab_item-1">
                                <div class="facts">
                                    <div class="login">
                                        <input type="text" value="Search Address, Neighborhood, City or Zip" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search Address, Neighborhood, City or Zip';}">
                                        <input type="submit" value="">
                                    </div>
                                </div>
                            </div>
                            <h2 class="resp-accordion" role="tab" aria-controls="tab_item-2"><span class="resp-arrow"></span>For Rent</h2><div class="tab-1 resp-tab-content" aria-labelledby="tab_item-2">
                                <div class="facts">
                                    <div class="login">
                                        <input type="text" value="Search Address, Neighborhood, City or Zip" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search Address, Neighborhood, City or Zip';}">
                                        <input type="submit" value="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script src="<?php echo THEME_URL; ?>/js/easyResponsiveTabs.js" type="text/javascript"></script>
                    <script type="text/javascript">
                        $(document).ready(function () {
                            $('#horizontalTab').easyResponsiveTabs({
                                type: 'default', //Types: default, vertical, accordion
                                width: 'auto', //auto or any width like 600px
                                fit: true   // 100% fit in a container
                            });
                        });
                    </script>
                </div>
            </div>
            <script>
                $(document).ready(function() {
                    $('.popup-with-zoom-anim').magnificPopup({
                        type: 'inline',
                        fixedContentPos: false,
                        fixedBgPos: true,
                        overflowY: 'auto',
                        closeBtnInside: true,
                        preloader: false,
                        midClick: true,
                        removalDelay: 300,
                        mainClass: 'my-mfp-zoom-in'
                    });

                });
            </script>


        </div>
        <div class="clearfix"> </div>
    </div>
</div>