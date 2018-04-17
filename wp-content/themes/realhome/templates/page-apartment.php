<?php
/**
 * Template Name: Apartment Page
 *
 * @package WordPress
 * @subpackage realhome
 * @since realhome 1.0
 */
?>

<!--//head-->
<?php get_template_part('head'); ?>
<link rel="stylesheet" href="<?php echo THEME_URL; ?>/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo THEME_URL; ?>/css/templatemo-style.css">
<script src="<?php echo THEME_URL; ?>/js/vendor/modernizr-2.6.2.min.js"></script>
<!--//header-->
<?php get_header(); ?>

    <!--page banner-->
<?php
set_query_var( 'post', $post );
get_template_part( 'inc/page_banner');
?>
    <!--top city-->
    <?php $args = array(
        'posts_per_page'   => 64,
        'offset'           => 0,
        'category'         => '',
        'category_name'    => '',
        'orderby'          => 'menu_order',
        'order'            => 'ASC',
        'include'          => '',
        'exclude'          => '',
        'meta_key'         => '',
        'meta_value'       => '',
        'post_type'        => 'city',
        'post_mime_type'   => '',
        'post_parent'      => '',
        'author'	   => '',
        'author_name'	   => '',
        'post_status'      => 'publish',
        'suppress_filters' => true
    );
    $cities = get_posts( $args );
    ?>

    <div class="container">
        <div class="top-grid">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo home_url(); ?>">Home</a></li>
                <li class="breadcrumb-item active"><?php echo $post->post_title; ?></li>
            </ol>

            <h3>Top City</h3>
        </div>
    </div>

    <!-- MAIN POSTS -->
    <div class="main-posts">
        <div class="container">
            <div class="row">
                <div class="blog-masonry masonry-true">
                    <?php foreach ($cities as $city): ?>
                        <div class="post-masonry col-md-4 col-sm-6">
                            <div class="post-thumb">
                                <?php
                                    $image = wp_get_attachment_url( get_post_thumbnail_id($city->ID));
                                 ?>
                                <img src="<?php echo $image; ?>" alt="<?php echo $city->post_title; ?>">
                                <div class="title-over">
                                    <h4><a href="<?php echo get_permalink( $city->ID ).'apartment/'; ?>"><?php echo $city->post_title; ?></a></h4>
                                </div>
                                <div class="post-hover text-center">
                                    <div class="inside">
                                        <i class="fa fa-plus"></i>
                                        <h4><a href="<?php echo get_permalink( $city->ID ).'apartment/'; ?>"><?php echo $city->post_title; ?></a></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </div>

    <?php
    $args = array(
        'post_type' => 'project',
        'posts_per_page' => 1,
        'meta_key'		=> 'type',
        'meta_value'	=> 'apartment',
        'orderby' => 'rand'
    );

    $projects = get_posts($args);
    ?>
    <!--premium-project-->
    <?php if(!empty($projects)) : ?>
        <?php
        $gallery = acf_photo_gallery('photo_gallery',$projects[0]->ID);
        $ranImage = array_rand ( $gallery, 1);
        ?>
        <div class="premium" style="background: url(<?php echo $gallery[$ranImage]['full_image_url']; ?>); background-size: cover;">
            <div class="pre-top">
                <h5><a href="<?php echo get_permalink($projects[0]->ID); ?>"><?php echo $projects[0]->post_title; ?></a></h5>
                <p><?php echo get_field('price',$projects[0]->ID).' - '.get_field('bedroom',$projects[0]->ID).' bedrooms, '.get_field('area',$projects[0]->ID).'m<sup>2</sup' ?></p>
            </div>
        </div>
    <?php endif; ?>

    <!--featured project-->
    <?php
    $args = array(
        'post_type' => 'project',
        'posts_per_page' => 6,
        'orderby' => 'rand',
        'meta_key'		=> 'type',
        'meta_value'	=> 'apartment',
    );

    $projects = get_posts($args);
    ?>
    <div class="container">
        <div class="future">
            <?php if(count($projects) >= 2) : ?>
                <h3>Featured Projects</h3>
                <div class="content-bottom-in">

                    <ul id="flexiselDemo1">
                        <?php foreach($projects as $project): ?>
                            <li>
                                <div class="project-fur">
                                    <?php $url = wp_get_attachment_url( get_post_thumbnail_id($project->ID), 'Large' ); ?>
                                    <a href="<?php echo get_permalink($project->ID); ?>" ><img class="img-responsive" src="<?php echo $url; ?>" alt="<?php echo $project->post_title; ?>" />	</a>
                                    <div class="fur">
                                        <div class="fur1">
                                            <span class="fur-money"><?php echo get_field('price',$project->ID); ?></span>
                                            <h6 class="fur-name"><a href="<?php echo get_permalink($project->ID); ?>"><?php echo $project->post_title; ?></a></h6>
                                            <span><?php echo get_field('location',$project->ID); ?></span>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    </ul>

                    <script type="text/javascript">
                        $(window).load(function() {
                            $("#flexiselDemo1").flexisel({
                                visibleItems: <?php echo (count($projects) > 4) ? '4' : count($projects); ?>,
                                animationSpeed: 1000,
                                autoPlay: true,
                                autoPlaySpeed: 3000,
                                pauseOnHover: true,
                                enableResponsiveBreakpoints: true,
                                responsiveBreakpoints: {
                                    portrait: {
                                        changePoint:480,
                                        visibleItems: 1
                                    },
                                    landscape: {
                                        changePoint:640,
                                        visibleItems: 2
                                    },
                                    tablet: {
                                        changePoint:768,
                                        visibleItems: 3
                                    }
                                }
                            });

                        });
                    </script>
                </div>
            <?php endif; ?>
        </div>
    </div>

<!--//footer-->
<script src="<?php echo THEME_URL; ?>/js/min/plugins.min.js"></script>
<script src="<?php echo THEME_URL; ?>/js/min/main.min.js"></script>
<?php get_footer(); ?>

<?php set_query_var( 'meta_key', 'type' ); ?>
<?php set_query_var( 'meta_value', 'apartment' ); ?>