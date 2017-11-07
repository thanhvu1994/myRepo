<?php
/*
Plugin Name: Real Home Footer Widget
Plugin URI: https://realhome.vn
Description: Real Home Footer Widget
Author: Thanh Vu
Version: 1.0
Author URI: http://google.com
*/

add_action( 'widgets_init', 'register_realhome_footer_widget' );
function register_realhome_footer_widget() {
    register_widget('Realhome_Footer_Widget');
}

/**
 * Tạo class Realhome_Footer Widget
 */
class Realhome_Footer_Widget extends WP_Widget {

    /**
     * Thiết lập widget: đặt tên, base ID
     */
    function __construct() {
        parent::__construct (
            'realhome_footer_widget', // id của widget
            'Realhome Footer Widget', // tên của widget

            array(
                'description' => 'Footer Widget for showing footer' // mô tả
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
            <label for="<?php echo $this->get_field_id('address'); ?>">Company Address</label><br />
            <input type="text" name="<?php echo $this->get_field_name('address'); ?>" id="<?php echo $this->get_field_id('address'); ?>" value="<?php echo $instance['address']; ?>" class="widefat" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('iframe'); ?>">iFrame Url ( Maps or Facebook Like Box )</label><br />
            <input type="text" name="<?php echo $this->get_field_name('iframe'); ?>" id="<?php echo $this->get_field_id('iframe'); ?>" value="<?php echo $instance['iframe']; ?>" class="widefat" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('phone'); ?>">Phone Number</label><br />
            <input type="text" name="<?php echo $this->get_field_name('phone'); ?>" id="<?php echo $this->get_field_id('phone'); ?>" value="<?php echo $instance['phone']; ?>" class="widefat" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('email'); ?>">Email</label><br />
            <input type="text" name="<?php echo $this->get_field_name('email'); ?>" id="<?php echo $this->get_field_id('email'); ?>" value="<?php echo $instance['email']; ?>" class="widefat" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('email'); ?>">Facebook</label><br />
            <input type="text" name="<?php echo $this->get_field_name('facebook'); ?>" id="<?php echo $this->get_field_id('facebook'); ?>" value="<?php echo $instance['facebook']; ?>" class="widefat" />

            <label for="<?php echo $this->get_field_id('email'); ?>">Twitter</label><br />
            <input type="text" name="<?php echo $this->get_field_name('twitter'); ?>" id="<?php echo $this->get_field_id('twitter'); ?>" value="<?php echo $instance['twitter']; ?>" class="widefat" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('email'); ?>">Instagram</label><br />
            <input type="text" name="<?php echo $this->get_field_name('instagram'); ?>" id="<?php echo $this->get_field_id('instagram'); ?>" value="<?php echo $instance['instagram']; ?>" class="widefat" />

            <label for="<?php echo $this->get_field_id('email'); ?>">Google Plus</label><br />
            <input type="text" name="<?php echo $this->get_field_name('google-plus'); ?>" id="<?php echo $this->get_field_id('plus'); ?>" value="<?php echo $instance['plus']; ?>" class="widefat" />
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
        $instance['address'] = strip_tags( $new_instance['address']);
        $instance['iframe'] = strip_tags( $new_instance['iframe']);
        $instance['phone'] = strip_tags( $new_instance['phone'] );
        $instance['email'] = strip_tags( $new_instance['email'] );
        $instance['facebook'] = strip_tags( $new_instance['facebook'] );
        $instance['twitter'] = strip_tags( $new_instance['twitter'] );
        $instance['instagram'] = strip_tags( $new_instance['instagram'] );
        $instance['google-plus'] = strip_tags( $new_instance['google-plus'] );

        return $instance;
    }

    /**
     * Show widget
     */

    function widget( $args, $instance ) {
        echo $before_widget;
        ?>

        <footer class="footer-distributed">

            <div class="footer-left">

                <h3><span><img class="logo-footer" src="<?php echo $instance['media_uri']; ?>" alt="logo foolter"/></span><?php echo $instance['title'].'  '; ?></h3>

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
                    'post_type'        => 'page',
                    'post_mime_type'   => '',
                    'post_parent'      => '',
                    'author'	   => '',
                    'author_name'	   => '',
                    'post_status'      => 'publish',
                    'suppress_filters' => true
                );
                $pageItem_array = get_posts( $args );
                ?>

                <p class="footer-links">
                    <?php foreach ($pageItem_array as $index => $item) : ?>
                        <a href="<?php echo get_permalink($item->ID); ?>"><?php echo $item->post_title; ?></a>
                            <?php if(end($pageItem_array) !== $item): ?>
                                .
                            <?php endif; ?>
                    <?php endforeach; ?>
                </p>

                <p class="footer-company-name"><?php echo $instance['title']; ?> © <?php echo date("Y"); ?> </p>
            </div>

            <div class="footer-center">

                <div>
                    <p><i class="fa fa-map-marker"></i><?php echo $instance['address']; ?></p>
                </div>

                <div>
                    <i class="fa fa-phone"></i>
                    <p><?php echo $instance['phone']; ?></p>
                </div>

                <div>
                    <i class="fa fa-envelope"></i>
                    <p><a href="mailto:<?php echo $instance['email']; ?>"><?php echo $instance['email']; ?></a></p>
                </div>

                <div class="footer-icons">

                    <?php if(!empty($instance['facebook'])): ?>
                        <a href="<?php echo $instance['facebook']; ?>" style="width: 38px; height: 38px"><i class="fa fa-facebook"  style="margin: 0px"></i></a>
                    <?php endif; ?>

                    <?php if(!empty($instance['twitter'])): ?>
                        <a href="<?php echo $instance['twitter']; ?>" style="width: 38px; height: 38px"><i class="fa fa-twitter"  style="margin: 0px"></i></a>
                    <?php endif; ?>

                    <?php if(!empty($instance['instagram'])): ?>
                        <a href="<?php echo $instance['instagram']; ?>" style="width: 38px; height: 38px"><i class="fa fa-linkedin"  style="margin: 0px"></i></a>
                    <?php endif; ?>

                    <?php if(!empty($instance['google-plus'])): ?>
                        <a href="<?php echo $instance['google-plus']; ?>" style="width: 38px; height: 38px"><i class="fa fa-google-plus"  style="margin: 0px"></i></a>
                    <?php endif; ?>

                </div>
            </div>

            <div class="footer-right">

                <p class="footer-company-about">
                    <span><?php echo (strpos($instance['iframe'], 'facebook'))? 'Like us on facebook' : 'Our Location'; ?></span>
                    <iframe class="iframe-index" src="<?php echo $instance['iframe']; ?>"></iframe>
                </p>

            </div>

        </footer>

        <?php
        echo $after_widget;
    }
}

// queue up the necessary js
function hrw_enqueue_realhome_footer()
{
    // moved the js to an external file, you may want to change the path
    wp_enqueue_script('hrw_enqueue_realhome_footer', '/wp-content/plugins/realhome-footer/script.js', null, null, true);
}
add_action('admin_enqueue_scripts', 'hrw_enqueue_realhome_footer');
?>