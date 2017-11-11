<?php
/*
Plugin Name: Real Home Header Widget
Plugin URI: https://realhome.vn
Description: Real Home Header Widget
Author: Thanh Vu
Version: 1.0
Author URI: http://google.com
*/

add_action( 'widgets_init', 'register_realhome_header_widget' );
function register_realhome_header_widget() {
    register_widget('Realhome_Header_Widget');
}

/**
 * Tạo class Realhome_Header Widget
 */
class Realhome_Header_Widget extends WP_Widget {

    /**
     * Thiết lập widget: đặt tên, base ID
     */
    function __construct() {
        parent::__construct (
            'realhome_header_widget', // id của widget
            'Realhome Header Widget', // tên của widget

            array(
                'description' => 'Header Widget for showing header' // mô tả
            )
        );
    }

    /**
     * Tạo form option cho widget
     */
    function form( $instance ) {
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('media_uri'); ?>">Company Logo</label><br />
            <input type="text" class="widefat custom_media_url" name="<?php echo $this->get_field_name('media_uri'); ?>" id="<?php echo $this->get_field_id('media_uri'); ?>" value="<?php echo $instance['media_uri']; ?>">
            <input type="button" value="<?php _e( 'Upload Media', 'theme name' ); ?>" class="button static_custom_media_upload" id="custom_image_uploader"/>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>">Company Name</label><br />
            <input type="text" name="<?php echo $this->get_field_name('title'); ?>" id="<?php echo $this->get_field_id('title'); ?>" value="<?php echo $instance['title']; ?>" class="widefat" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('phone'); ?>">Phone Number</label><br />
            <input type="text" name="<?php echo $this->get_field_name('phone'); ?>" id="<?php echo $this->get_field_id('phone'); ?>" value="<?php echo $instance['phone']; ?>" class="widefat" />
        </p>
        <?php
    }

    /**
     * save widget form
     */

    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['title'] = strip_tags( $new_instance['title'] );
        $instance['media_uri'] = strip_tags( $new_instance['media_uri'] );
        $instance['phone'] = strip_tags( $new_instance['phone'] );
        return $instance;
    }

    /**
     * Show widget
     */

    function widget( $args, $instance ) {
        echo $before_widget;
        ?>

        <div class="navigation">
            <div class="container-fluid">
                <?php realhome_menu('main-menu'); ?>
            </div>
        </div>

        <div class="header">
            <div class="container">
                <!--logo-->
                <div class="logo">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img class="header-img" src="<?php echo $instance['media_uri'] ?>" alt="logo" height=250/><span class="helper"></span></a>
                    <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo $instance['title'] ?></a></h1>

                </div>
                <!--//logo-->
                <div class="top-nav">
                    <ul class="right-icons">
                        <li><span ><i class="glyphicon glyphicon-phone"> </i><?php echo $instance['phone'] ?></span></li>
                        <li><a class="play-icon popup-with-zoom-anim" href="#small-dialog"><i class="glyphicon glyphicon-search"> </i> </a></li>

                    </ul>
                    <div class="nav-icon">
                        <div class="hero nav_slide_button" id="hero">
                            <a href="javascript:void(0)"><i class="glyphicon glyphicon-menu-hamburger"></i> </a>
                        </div>
                    </div>
                    <div class="clearfix"> </div>
                    <!---pop-up-box---->
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
                                                <form role="search" action="<?php echo site_url('/'); ?>" method="get">
                                                    <input type="hidden" name="post_type" value="project" />
                                                    <input type="text" name="s" value="Search Address" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search Address';}">
                                                    <input type="submit" alt="Search" value="" />
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <h2 class="resp-accordion" role="tab" aria-controls="tab_item-1"><span class="resp-arrow"></span>For Sale</h2><div class="tab-1 resp-tab-content" aria-labelledby="tab_item-1">
                                        <div class="facts">
                                            <div class="login">
                                                <form role="search" action="<?php echo site_url('/'); ?>" method="get">
                                                    <input type="hidden" name="post_type" value="project" />
                                                    <input type="hidden" name="type" value="sell" />
                                                    <input type="text" name="s" value="Search Address" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search Address';}">
                                                    <input type="submit" alt="Search" value="" />
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <h2 class="resp-accordion" role="tab" aria-controls="tab_item-2"><span class="resp-arrow"></span>For Rent</h2><div class="tab-1 resp-tab-content" aria-labelledby="tab_item-2">
                                        <div class="facts">
                                            <div class="login">
                                                <form role="search" action="<?php echo site_url('/'); ?>" method="get">
                                                    <input type="hidden" name="post_type" value="project" />
                                                    <input type="hidden" name="type" value="rent" />
                                                    <input type="text" name="s" value="Search Address" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search Address';}">
                                                    <input type="submit" alt="Search" value="" />
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
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
    </div>

        <?php
        echo $after_widget;
    }
}

// queue up the necessary js
function hrw_enqueue_realhome_header()
{
    // moved the js to an external file, you may want to change the path
    wp_enqueue_script('hrw_enqueue_realhome_header', '/wp-content/plugins/realhome-header/script.js', null, null, true);
}
add_action('admin_enqueue_scripts', 'hrw_enqueue_realhome_header');
?>