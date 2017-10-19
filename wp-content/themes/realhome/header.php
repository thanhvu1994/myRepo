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
<!--//-->
<div class=" header-right">
    <div class="banner">
        <?php $args = array(
            'posts_per_page'   => 5,
            'offset'           => 0,
            'category'         => '',
            'category_name'    => '',
            'orderby'          => 'menu_order',
            'order'            => 'ASC',
            'include'          => '',
            'exclude'          => '',
            'meta_key'         => '',
            'meta_value'       => '',
            'post_type'        => 'banner_item',
            'post_mime_type'   => '',
            'post_parent'      => '',
            'author'	   => '',
            'author_name'	   => '',
            'post_status'      => 'publish',
            'suppress_filters' => true
        );
        $bannerItem_array = get_posts( $args ); ?>

        <div class="slider">
            <div class="callbacks_container">
                <ul class="rslides" id="slider">
                    <?php foreach($bannerItem_array as $bannerItem): ?>
                        <?php if(get_field('active',$bannerItem->ID)) : ?>
                            <li>
                                <div class="banner-item" style="background: url(<?php echo (get_field('background_image',$bannerItem->ID)); ?>) no-repeat; background-size: cover;">
                                    <div class="caption">
                                        <?php
                                        $first = substr($bannerItem->post_title, 0, 5);
                                        $theRest = substr($bannerItem->post_title, 5 , 1000);
                                        ?>
                                        <h3><span><?php echo $first; ?></span><?php echo $theRest; ?></h3>
                                        <p><?php echo $bannerItem->post_content; ?></p>
                                    </div>
                                </div>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</div>

<!--header-bottom-->
<div class="banner-bottom-top">
    <div class="container">
        <div class="bottom-header">

            <?php $args = array(
                'posts_per_page'   => MAX_HEADER_BOTTOM_MENU,
                'offset'           => 0,
                'category'         => '',
                'category_name'    => '',
                'orderby'          => 'menu_order',
                'order'            => 'ASC',
                'include'          => '',
                'exclude'          => '',
                'meta_key'         => '',
                'meta_value'       => '',
                'post_type'        => 'header_bottom_menu',
                'post_mime_type'   => '',
                'post_parent'      => '',
                'author'	   => '',
                'author_name'	   => '',
                'post_status'      => 'publish',
                'suppress_filters' => true
            );
            $menuItem_array = get_posts( $args );
            $countMenuItem = count($menuItem_array);
            $marginPercent = WIDTH_PERCENT_HEADER_BOTTOM_MENU_ITEM*(MAX_HEADER_BOTTOM_MENU-$countMenuItem)/2;
            ?>
            <div class="header-bottom" style="width: <?php echo WIDTH_PERCENT_HEADER_BOTTOM_MENU_ITEM*$countMenuItem; ?>%; margin-left: <?php echo $marginPercent; ?>%;">

                <?php foreach($menuItem_array as $menuItem) :?>
                    <div class=" bottom-head" style="width: <?php echo WIDTH_PERCENT_HEADER_BOTTOM_MENU_ITEM; ?>%;">
                        <a href="buy.html">
                            <div class="buy-media">
                                <i class="<?php echo get_field('icon',$menuItem->ID); ?>"></i>
                                <h6><?php echo get_field('title',$menuItem->ID); ?></h6>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>

                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
</div>
<!--//-->

<!--//header-bottom-->


<!--//header-->