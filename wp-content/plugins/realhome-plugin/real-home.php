<?php
/*
Plugin Name: Real Home Widget
Plugin URI: https://realhome.vn
Description: Real Home Widget
Author: Thanh Vu
Version: 1.0
Author URI: http://google.com
*/

add_action( 'widgets_init', 'register_realhome_widget' );
function register_realhome_widget() {
    register_widget('Realhome_Widget');
}

/**
 * Tạo class Realhome_Widget
 */
class Realhome_Widget extends WP_Widget {

    /**
     * Thiết lập widget: đặt tên, base ID
     */
    function __construct() {
        parent::__construct (
            'realhome_widget', // id của widget
            'Realhome Widget', // tên của widget

            array(
                'description' => 'Widget for showing parts at home page' // mô tả
            )
        );
    }

    /**
     * Tạo form option cho widget
     */
    function form( $instance ) {
        ?>
        <p>
            <label for="selector">Select a content : </label>
            <select id="selector" class="selector" name="<?php echo $this->get_field_name('type'); ?>" onchange="showForm(jQuery(this).val())">
                <option <?php echo ($instance['type']=='most_popu')? 'selected' : ''; ?> value="most_popu">Most Popular</option>
                <option <?php echo ($instance['type']=='service')? 'selected' : ''; ?> value="service">Service</option>
                <option <?php echo ($instance['type']=='inner_banner')? 'selected' : ''; ?> value="inner_banner">Inner Banner</option>
                <option <?php echo ($instance['type']=='project_gallery')? 'selected' : ''; ?> value="project_gallery">Project Gallery</option>
                <option <?php echo ($instance['type']=='testimonial')? 'selected' : ''; ?> value="testimonial">Testimonial</option>
                <option <?php echo ($instance['type']=='partner')? 'selected' : ''; ?> value="partner">Partner</option>
            </select>
        </p>


        <div>
            <p class="title" <?php echo ($instance['type']=='inner_banner')? 'style="display:none"' : ''; ?>>
                <label for="<?php echo $this->get_field_id('title'); ?>">Title</label><br />
                <input type="text" name="<?php echo $this->get_field_name('title'); ?>" id="<?php echo $this->get_field_id('title'); ?>" value="<?php echo $instance['title']; ?>" class="widefat" />
            </p>
            <p class="widget_subtitle" <?php echo ($instance['type']=='service')? '' : 'style="display:none"'; ?> >
                <label for="<?php echo $this->get_field_id('subtitle'); ?>">Subtitle:</label><br />
                <input type="text" name="<?php echo $this->get_field_name('subtitle'); ?>" id="<?php echo $this->get_field_id('subtitle'); ?>" value="<?php echo $instance['subtitle']; ?>" class="widefat" />
            </p>
        </div>
        <?php
    }

    /**
     * save widget form
     */

    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['title'] = strip_tags( $new_instance['title'] );
        $instance['subtitle'] = strip_tags( $new_instance['subtitle'] );
        $instance['type'] = strip_tags( $new_instance['type'] );
        return $instance;
    }

    /**
     * Show widget
     */

    function widget( $args, $instance ) {
        echo $before_widget;

        switch($instance['type']){
            case 'most_popu':
                $this->getMostPopular($instance);
                break;
            case 'service':
                $this->getService($instance);
                break;
            case 'inner_banner':
                $this->getInnerBanner($instance);
                break;
            case 'project_gallery':
                $this->getProjectGallery($instance);
                break;
            case 'testimonial':
                $this->getTestimonial($instance);
                break;
            case 'partner':
                $this->getPartner($instance);
                break;
        }

        echo $after_widget;
    }

    function getMostPopular($instance){
        ?>
        <div class="most_popular">
                <?php $args = array(
                    'posts_per_page'   => 4,
                    'offset'           => 0,
                    'category'         => '',
                    'category_name'    => '',
                    'orderby'          => 'menu_order',
                    'order'            => 'ASC',
                    'include'          => '',
                    'exclude'          => '',
                    'meta_key'         => '',
                    'meta_value'       => '',
                    'post_type'        => 'project',
                    'post_mime_type'   => '',
                    'post_parent'      => '',
                    'author'	   => '',
                    'author_name'	   => '',
                    'post_status'      => 'publish',
                    'suppress_filters' => true
                );
                $mostPopuItem_array = get_posts( $args ); ?>
                    <?php foreach($mostPopuItem_array as $item) : ?>
                        <?php $url = wp_get_attachment_url( get_post_thumbnail_id($item->ID), 'Large' ); ?>
                            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                <div class="hovereffect">
                                    <img class="img-responsive" src="<?php echo $url; ?>" alt="<?php echo $item->post_title; ?>">
                                    <div class="overlay">
                                        <h2><u><?php echo $item->post_title; ?></u></h2>
                                        <p>
                                            <a href="<?php echo get_permalink($item->ID); ?>">DETAIL</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                    <?php endforeach; ?>

        </div>
        <?php
    }

    function getService($instance){
        ?>
        <div class="services">
            <div class="container">
                <div class="service-top">
                    <h3><?php echo $instance['title']; ?></h3>
                    <p><?php echo $instance['subtitle']; ?></p>                                                                                                                                                                                      </p>
                </div>
                <?php $args = array(
                    'posts_per_page'   => 4,
                    'offset'           => 0,
                    'category'         => '',
                    'category_name'    => '',
                    'orderby'          => 'menu_order',
                    'order'            => 'ASC',
                    'include'          => '',
                    'exclude'          => '',
                    'meta_key'         => '',
                    'meta_value'       => '',
                    'post_type'        => 'service',
                    'post_mime_type'   => '',
                    'post_parent'      => '',
                    'author'	   => '',
                    'author_name'	   => '',
                    'post_status'      => 'publish',
                    'suppress_filters' => true
                );
                $serviceItem_array = get_posts( $args ); ?>

                <?php foreach($serviceItem_array as $key => $item): ?>

                    <?php if($key%2 == 0) : ?>
                        <div class="services-grid">
                    <?php endif; ?>

                    <div class="col-md-6 service-top1">
                        <div class=" ser-grid">
                            <a href="<?php echo get_permalink($item->ID)?>" class="hi-icon hi-icon-archive fa <?php echo get_field('icon',$item->ID)?>"></a>
                        </div>
                        <div  class="ser-top">
                            <h4><?php echo $item->post_title; ?></h4>
                            <p><?php echo get_field('short_content', $item->ID); ?></p>
                        </div>
                        <div class="clearfix"> </div>
                    </div>

                    <?php if($key%2 != 0) : ?>
                        <div class="clearfix"> </div>
                        </div>
                    <?php endif; ?>

                <?php endforeach; ?>
            </div>
        </div>
        <!--//services-->
        <?php
    }

    function getInnerBanner($instance){
        ?>
        <?php $innerBanner = get_page_by_path( 'home-inner-banner', OBJECT, 'inner_banner' ) ?>

        <!--features-->
        <?php if($innerBanner): ?>
            <?php if(get_field('type',$innerBanner->ID) == INNER_BANNER_WITH_BACKGROUND): ?>
                <div class="content-middle">
                    <div class="container">
                        <div class="mid-content">
                            <h3><?php echo get_field('subtitle', $innerBanner->ID); ?></h3>
                            <p><?php echo $innerBanner->post_content; ?></p>
                            <a class="hvr-sweep-to-right more-in" href="<?php echo get_field('url', $innerBanner->ID); ?>">Read More</a>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php if(get_field('type',$innerBanner->ID) == INNER_BANNER_NO_BACKGROUND): ?>
                <div class="about-middle">
                    <div class="container">
                        <div class="col-md-8 about-mid">
                            <h4><?php echo $innerBanner->post_title; ?></h4>
                            <h6><a href="<?php echo get_field('url', $innerBanner->ID); ?>"><?php echo get_field('subtitle', $innerBanner->ID); ?></a> </h6>
                            <p><?php echo $innerBanner->post_content; ?></p>
                        </div>
                        <div class="col-md-4 about-mid1">
                            <p><?php echo get_field('block_content', $innerBanner->ID); ?></p>
                            <a href="<?php echo get_field('url', $innerBanner->ID); ?>" class="hvr-sweep-to-right more-in">READ MORE</a>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php if(get_field('type',$innerBanner->ID) == INNER_BANNER_WITH_VIDEO): ?>
                <div class="about-bottom">
                    <div class="container">
                        <div class="col-md-6 bottom-about">
                            <h4><a href="<?php echo get_field('url', $innerBanner->ID); ?>"><?php echo get_field('subtitle', $innerBanner->ID); ?></a></h4>
                            <p><?php echo $innerBanner->post_content; ?></p>
                            <a href="<?php echo get_field('url', $innerBanner->ID); ?>" class="hvr-sweep-to-right more">Read More</a>
                        </div>
                        <div class="col-md-6 bottom-about1">
                            <iframe src="<?php echo get_field('video', $innerBanner->ID); ?>"  webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php endif; ?>


        <style>
            .content-middle {
                background: url(<?php echo get_field('background_image', $innerBanner->ID); ?>) no-repeat center;
                width: 100%;
                min-height: 250px;
                display: block;
                background-size: cover;
            }
        </style>
        <?php
    }

    function getProjectGallery($instance){
        ?>
        <?php
        $args = array(
            'post_type' => 'project',
            'posts_per_page' => 4,
            'orderby' => 'rand'
        );

        $projects = get_posts($args);
        ?>

        <div class="project">
            <div class="container">
                <h3><?php echo $instance['title']; ?></h3>
                <div class="project-top">
                    <?php foreach($projects as $key => $project): ?>
                    <?php
                        $gallery = acf_photo_gallery('photo_gallery',$project->ID);
                        $ranImage = array_rand ( $gallery, 1);
                        $image = wp_get_attachment_image_src( get_post_thumbnail_id( $project->ID ), '275x206' );
                    ?>
                    <div class="col-md-3 col-sm-6 col-xs-12 project-grid" <?php echo ($key == 0)? 'style="margin-bottom: 0.9em;"' : ''; ?>>
                        <div class="project-grid-top custom-img">
                             <a href="<?php echo get_permalink($project->ID); ?>" class="mask">
                                <img class="img-responsive zoom-img" src="<?php echo isset($image[0]) ? $image[0] : '' ?>" alt="<?php echo $gallery[$ranImage]['caption']; ?>" />
                            </a>
                             <div class="col-md1">
                                 <div class="col-md2">
                                     <div class="col-md3">
                                        <span class="star"></span>
                                     </div>
                                     <div class="col-md4">
                                        <strong><?php echo $project->post_title; ?></strong>
                                     </div>
                                     <div class="clearfix"> </div>
                                 </div>
                                 <p><?php echo get_field('location', $project->ID); ?></p>
                                 <a href="<?php echo get_permalink($project->ID); ?>" class="hvr-sweep-to-right more">See Details</a>
                             </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    <div class="clearfix"> </div>
                </div>
            </div>
        </div>
        <?php
    }

    function getTestimonial($instance){
        ?>
        <?php
        $args = array(
            'post_type' => 'testimonial',
            'posts_per_page' => 3,
            'orderby' => 'rand'
        );

        $testimonials = get_posts($args);
        ?>

        <!--test-->
        <div class="content-bottom">
            <div class="container">
                <h3><?php echo $instance['title']; ?></h3>
                <div class="col-md-6 name-in">
                    <?php for($i = 0; $i < 2 ; $i++): ?>
                        <?php if(!empty(get_field('comment',$testimonials[$i]))): ?>
                            <div class=" bottom-in">
                                <p class="para-in"><?php echo get_field('comment',$testimonials[$i]); ?></p>
                                <i class="dolor"></i>
                                <div class="men-grid">
                                    <a href="#" class="men-top"><img class="img-responsive men-top" src="<?php echo get_field('avatar',$testimonials[$i]); ?>" alt="image-<?php echo get_field('username',$testimonials[$i]); ?>"></a>
                                    <div class="men">
                                        <span><?php echo get_field('username',$testimonials[$i]); ?></span>
                                        <p><?php echo get_field('description',$testimonials[$i]); ?></p>
                                    </div>
                                    <div class="clearfix"> </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endfor; ?>
                </div>
                <div class="col-md-6  name-on">
                    <?php for($i = 2; $i < 3 ; $i++): ?>
                        <?php if(!empty(get_field('comment',$testimonials[$i]))): ?>
                            <div class=" bottom-in">
                                <p class="para-in"><?php echo get_field('comment',$testimonials[$i]); ?></p>
                                <i class="dolor"></i>
                                <div class="men-grid">
                                    <a href="#" class="men-top"><img class="img-responsive men-top" src="<?php echo get_field('avatar',$testimonials[$i]); ?>" alt="image-<?php echo get_field('username',$testimonials[$i]); ?>"></a>
                                    <div class="men">
                                        <span><?php echo get_field('username',$testimonials[$i]); ?></span>
                                        <p><?php echo get_field('description',$testimonials[$i]); ?></p>
                                    </div>
                                    <div class="clearfix"> </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endfor; ?>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
        <!--//test-->
        <?php
    }

    function getPartner($instance){
        ?>
        <?php $args = array(
            'posts_per_page'   => 10,
            'offset'           => 0,
            'category'         => '',
            'category_name'    => '',
            'orderby'          => 'menu_order',
            'order'            => 'ASC',
            'include'          => '',
            'exclude'          => '',
            'meta_key'         => '',
            'meta_value'       => '',
            'post_type'        => 'partner',
            'post_mime_type'   => '',
            'post_parent'      => '',
            'author'	   => '',
            'author_name'	   => '',
            'post_status'      => 'publish',
            'suppress_filters' => true
        );

        $partnerItem_array = get_posts( $args );

        $countPartner = count($partnerItem_array);
        ?>

        <div class="content-bottom1">
            <h3><?php echo $instance['title']; ?></h3>
            <div class="container">
                <ul>
                    <?php for($i = 0; $i < (($countPartner > 5) ? 5 : $countPartner) ; $i++): ?>
                        <li><a <?php echo (!empty(get_field('url',$partnerItem_array[$i])))? 'href="'.get_field('url',$partnerItem_array[$i]).'"' : ''; ?> ><img class="img-responsive" src="<?php echo get_the_post_thumbnail_url($partnerItem_array[$i]); ?>" alt="<?php echo get_the_title($partnerItem_array[$i])?>"></a></li>
                    <?php endfor; ?>
                    <div class="clearfix"> </div>
                </ul>
                <ul>
                    <?php for($i = 5; $i < $countPartner ; $i++): ?>
                        <li><a <?php echo (!empty(get_field('url',$partnerItem_array[$i])))? 'href="'.get_field('url',$partnerItem_array[$i]).'"' : ''; ?> ><img class="img-responsive" src="<?php echo get_the_post_thumbnail_url($partnerItem_array[$i]); ?>" alt="<?php echo get_the_title($partnerItem_array[$i])?>"></a></li>
                    <?php endfor; ?>
                    <div class="clearfix"> </div>
                </ul>
            </div>
        </div>
        <?php
    }
}

// queue up the necessary js
function hrw_enqueue_static()
{
    // moved the js to an external file, you may want to change the path
    wp_enqueue_script('hrw_enqueue_static', '/wp-content/plugins/realhome-plugin/script.js', null, null, true);
}
add_action('admin_enqueue_scripts', 'hrw_enqueue_static');
?>