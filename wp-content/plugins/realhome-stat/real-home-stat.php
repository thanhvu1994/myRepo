<?php
/*
Plugin Name: Real Home Stat Widget
Plugin URI: https://realhome.vn
Description: Real Home Stat Widget
Author: Thanh Vu
Version: 1.0
Author URI: http://google.com
*/

add_action( 'widgets_init', 'register_realhome_stat_widget' );
function register_realhome_stat_widget() {
    register_widget('Realhome_Stat_Widget');
}

/**
 * Tạo class Realhome_Footer Widget
 */
class Realhome_Stat_Widget extends WP_Widget {

    /**
     * Thiết lập widget: đặt tên, base ID
     */
    function __construct() {
        parent::__construct (
            'realhome_stat_widget', // id của widget
            'Realhome Stat Widget', // tên của widget

            array(
                'description' => 'Stat Widget for showing in home page' // mô tả
            )
        );
    }

    /**
     * Tạo form option cho widget
     */
    function form( $instance ) {
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>">Title</label><br />
            <input type="text" name="<?php echo $this->get_field_name('title'); ?>" id="<?php echo $this->get_field_id('title'); ?>" value="<?php echo $instance['title']; ?>" class="widefat" />
        </p>

        <div class="slideList">
            <!--Nếu có dữ liệu cũ thì load dữ liệu của các slide ra-->
            <?php if (isset($instance['number']) && !empty($instance['number'])): ?>
                <?php foreach($instance['number'] as $key => $item): ?>
                    <fieldset class="widget-listing-fieldset">
                        <legend class="widget-listing-legend"><b>Field</b></legend>
                        <!--Number-->
                        <p>
                            <label for="<?php echo $this->get_field_id('number'); ?>[]">Number</label><br />
                            <input type="number"
                                   name="<?php echo $this->get_field_name('number') ?>[]"
                                   value="<?php echo $instance['number'][$key]; ?>"
                                   class="widefat" />
                        </p>
                        <button type="button" class="btnDeleteFile">Delete this file</button>
                    </fieldset>
                <?php endforeach; ?>
            <?php else: ?>
                <fieldset class="widget-listing-fieldset">
                    <legend class="widget-listing-legend"><b>Field</b></legend>
                    <!--Number-->
                    <p>
                        <label for="<?php echo $this->get_field_id('number'); ?>[]">Number</label><br />
                        <input type="number"
                               name="<?php echo $this->get_field_name('number') ?>[]"
                               value=""
                               class="widefat" />
                    </p>
                    <button type="button" class="btnDeleteFile">Delete this file</button>
                </fieldset>
            <?php endif; ?>
            <button style="margin-bottom: 15px; <?php echo (count($instance['number']) >= 3)? 'display:none;' : '';?> " data-formname="<?php echo 'widget-' . $this->id_base . '[' . $this->number . ']'; ?>" id="<?php echo $this->get_field_id('btnAddSlideSet')?>" type="button" onclick="addNewFileListing(id)">Add more file</button>
        </div>
        <?php
    }

    /**
     * save widget form
     */

    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['title'] = strip_tags( $new_instance['title'] );
        $instance['number'] = $new_instance['number'];
        return $instance;
    }

    /**
     * Show widget
     */

    function widget( $args, $instance ) {
        echo $before_widget;
        ?>

        <div class="stats">
            <div class="container">
                <h3>Overview</h3>
                <div class="stats-info">
                    <div class="col-md-4 col-sm-4 stats-grid slideanim">
                        <i class="fa fa-smile-o"></i>
                        <div class='numscroller numscroller-big-bottom' data-slno='1' data-min='0' data-max='15500' data-delay='.5' data-increment="20">15500</div>
                        <p class="stats-info">Happy Clients</p>
                    </div>
                    <div class="col-md-4 col-sm-4 stats-grid slideanim">
                        <i class="fa fa-tags" aria-hidden="true"></i>
                        <div class='numscroller numscroller-big-bottom' data-slno='1' data-min='0' data-max='18' data-delay='.5' data-increment="1">18</div>
                        <p class="stats-info">Sales per month</p>
                    </div>
                    <div class="col-md-4 col-sm-4 stats-grid slideanim">
                        <i class="fa fa-home" aria-hidden="true"></i>
                        <div class='numscroller numscroller-big-bottom' data-slno='1' data-min='0' data-max='21500' data-delay='.5' data-increment="20">21500</div>
                        <p class="stats-info">Number of Homes</p>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>

        <?php
        echo $after_widget;
    }
}

// queue up the necessary js
function hrw_enqueue_realhome_stat()
{
    // moved the js to an external file, you may want to change the path
    wp_enqueue_script('hrw_enqueue_realhome_stat', '/wp-content/plugins/realhome-stat/script.js', null, null, true);
}
add_action('admin_enqueue_scripts', 'hrw_enqueue_realhome_stat');

wp_register_style( 'widget_realhome-stat', '/wp-content/plugins/realhome-stat/index.css' );
wp_enqueue_style('widget_realhome-stat');
?>