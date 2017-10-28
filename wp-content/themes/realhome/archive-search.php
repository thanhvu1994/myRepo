<!--//head-->
<?php get_template_part( 'head'); ?>

<!--//header-->
<?php get_header(); ?>

<!--page banner-->
<?php
set_query_var( 'post', $post );
get_template_part( 'inc/page_banner');
?>

<?php
    $paged = ( get_query_var( 'page' ) ) ? get_query_var( 'page' ) : 1;
    global $wp_query;

    $post_type = get_query_var('post_type');
    $type = isset($_GET['type']) ? $_GET['type'] : "";
    $name = isset($_GET['s']) ? $_GET['s'] : "";
    $custom_args = array(
        'post_type' => 'project',
        's' => $name,
        'posts_per_page' => DEFAULT_PAGE_SIZE,
        'post_status' => 'publish',
        'orderby' => 'date',
        'order' => 'DESC',
        'paged' => $paged,
    );

    if (!empty($type)) {
        $custom_args['meta_query'] = [[
                                        'key'   => 'type',
                                        'value' => $type,
                                    ]];
    }

    $custom_query = new WP_Query( $custom_args );
 ?>

<div class="container">
    <div class="buy-single">
        <h3>All House</h3>
        <div class="box-sin">
            <div class="col-md-9 single-box">
                <?php if ( $custom_query->have_posts() ) : while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>
                <div class="box-col">
                     <div class=" col-sm-7 left-side ">
                        <a href="<?php echo get_permalink()?>"><img src="<?php echo get_the_post_thumbnail_url(); ?>" class="img-responsive" alt="<?php echo get_the_title() ?>"/></a>
                    </div>
                    <div class="  col-sm-5 middle-side">
                        <h4><?php echo the_title(); ?></h4>
                        <p><span class="bath">Location </span>: <span class="two"><?php echo get_field('location'); ?></span></p>
                        <p><span class="bath1">Area </span>: <span class="two"><?php echo get_field('area'); ?> m<sup>2</sup></span></p>
                        <p><span class="bath2">Floors </span>: <span class="two"><?php echo get_field('floor'); ?></span></p>
                        <p><span class="bath3">Bedrooms </span>: <span class="two"><?php echo get_field('bedroom'); ?></span></p>
                        <p><span class="bath4">Price </span> : <span class="two"><?php echo get_field('price'); ?></span></p>
                        <div class="   right-side">
                            <a href="<?php echo get_permalink(get_page_by_title('contact')); ?>" class="hvr-sweep-to-right more" >Contact Builder</a>
                         </div>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
                <div class="nav-page">
                    <?php
                        if (function_exists(custom_pagination)) {
                            custom_pagination($custom_query->max_num_pages,"", $paged, esc_url( $home_url ) );
                        }
                    ?>
                </div>
            <?php endif; ?>
            </div>
        </div>
        <div class="col-md-3 map-single-bottom">
            <div class="map-single">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d37494223.23909492!2d103!3d55!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x453c569a896724fb%3A0x1409fdf86611f613!2sRussia!5e0!3m2!1sen!2sin!4v1415776049771"></iframe>
            </div>
            <div class="single-box-right">
                <h4>Featured Communities</h4>
                <div class="single-box-img">
                    <div class="box-img">
                        <a href="single.html"><img class="img-responsive" src="images/sl.jpg" alt=""></a>
                    </div>
                    <div class="box-text">
                        <p><a href="single.html">Lorem ipsum dolor sit amet</a></p>
                        <a href="single.html" class="in-box">More Info</a>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
        </div>
        <div class="clearfix"> </div>
    </div>
</div>

<!--//footer-->
<?php get_footer(); ?>