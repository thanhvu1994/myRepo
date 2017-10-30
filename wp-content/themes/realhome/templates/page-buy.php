<?php
/**
 * Template Name: Buy Page
 *
 * @package WordPress
 * @subpackage realhome
 * @since realhome 1.0
 */
?>

<!--//head-->
<?php get_template_part('head'); ?>

<!--//header-->
<?php get_header(); ?>

    <!--page banner-->
<?php
set_query_var( 'post', $post );
get_template_part( 'inc/page_banner');
?>
    <!--top city-->
    <?php $args = array(
        'posts_per_page'   => 6,
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
            <div class="grid-at">
                <?php if(array_key_exists(0,$cities)) : ?>
                    <div class="col-md-3 grid-city">
                        <div class="grid-lo">
                            <a href="<?php echo get_permalink( $cities[0]->ID ).'buy/'; ?>">
                                <figure class="effect-layla">
                                    <?php
                                        $image = wp_get_attachment_url( get_post_thumbnail_id($cities[0]->ID));
                                    ?>
                                    <img style="height:491.03px" class=" img-responsive" src="<?php echo $image; ?>" alt="<?php echo $cities[0]->post_title; ?>">
                                    <figcaption>
                                        <h4><?php echo $cities[0]->post_title; ?></h4>
                                    </figcaption>
                                </figure>
                            </a>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if(array_key_exists(1,$cities)) : ?>
                    <div class="col-md-3 grid-city">
                    <div class="grid-lo">
                        <a href="<?php echo get_permalink( $cities[1]->ID ).'buy/'; ?>">
                            <figure class="effect-layla">
                                <?php
                                $image = wp_get_attachment_url( get_post_thumbnail_id($cities[1]->ID));
                                ?>
                                <img style="height:491.03px" class=" img-responsive" src="<?php echo $image; ?>" alt="<?php echo $cities[1]->post_title; ?>">
                                <figcaption>
                                    <h4><?php echo $cities[1]->post_title; ?></h4>
                                </figcaption>
                            </figure>
                        </a>
                    </div>
                </div>
                <?php endif; ?>


                <div class="col-md-6 grid-city grid-city1">
                    <div class="grid-me">
                        <?php if(array_key_exists(2,$cities)) : ?>
                        <div class="col-md-8 grid-lo1">
                            <div class=" grid-lo">
                                <a href="<?php echo get_permalink( $cities[2]->ID ).'buy/'; ?>">
                                    <figure class="effect-layla">
                                        <?php
                                        $image = wp_get_attachment_url( get_post_thumbnail_id($cities[2]->ID));
                                        ?>
                                        <img style="width:377px; height:277.5px;" class=" img-responsive" src="<?php echo $image; ?>" alt="<?php echo $cities[2]->post_title; ?>">
                                        <figcaption>
                                            <h4 class="effect1"><?php echo $cities[2]->post_title; ?></h4>
                                        </figcaption>
                                    </figure>
                                </a>
                            </div>
                        </div>
                        <?php endif; ?>

                        <?php if(array_key_exists(3,$cities)) : ?>
                        <div class="col-md-4 grid-lo2">
                            <div class=" grid-lo">
                                <a href="<?php echo get_permalink( $cities[3]->ID ).'buy/'; ?>">
                                    <figure class="effect-layla">
                                        <?php
                                        $image = wp_get_attachment_url( get_post_thumbnail_id($cities[3]->ID));
                                        ?>
                                        <img style="width:188px; height:276.73px;" class=" img-responsive" src="<?php echo $image; ?>" alt="<?php echo $cities[3]->post_title; ?>">
                                        <figcaption>
                                            <h4 class="effect2"><?php echo $cities[3]->post_title; ?></h4>
                                        </figcaption>
                                    </figure>
                                </a>
                            </div>
                        </div>
                        <?php endif; ?>
                        <div class="clearfix"> </div>
                    </div>
                    <div class="grid-me">
                        <?php if(array_key_exists(4,$cities)) : ?>
                        <div class="col-md-6 grid-lo3">
                            <div class=" grid-lo">
                                <a href="<?php echo get_permalink( $cities[4]->ID ).'buy/'; ?>">
                                    <figure class="effect-layla">
                                        <?php
                                        $image = wp_get_attachment_url( get_post_thumbnail_id($cities[4]->ID));
                                        ?>
                                        <img style="width:279px; height:209.25px;" class="img-responsive" src="<?php echo $image; ?>" alt="<?php echo $cities[4]->post_title; ?>">
                                        <figcaption>
                                            <h4 class="effect3"><?php echo $cities[4]->post_title; ?></h4>
                                        </figcaption>
                                    </figure>
                                </a>
                            </div>
                        </div>
                        <?php endif; ?>

                        <?php if(array_key_exists(5,$cities)) : ?>
                        <div class="col-md-6 grid-lo4">
                            <div class=" grid-lo">
                                <a href="<?php echo get_permalink( $cities[5]->ID ).'buy/'; ?>">
                                    <figure class="effect-layla">
                                        <?php
                                        $image = wp_get_attachment_url( get_post_thumbnail_id($cities[5]->ID));
                                        ?>
                                        <img style="width:279px; height:209.25px;" class="img-responsive" src="<?php echo $image; ?>" alt="<?php echo $cities[5]->post_title; ?>">
                                        <figcaption>
                                            <h4 class="effect3"><?php echo $cities[5]->post_title; ?></h4>
                                        </figcaption>
                                    </figure>
                                </a>
                            </div>
                        </div>
                        <?php endif; ?>
                        <div class="clearfix"> </div>
                    </div>
                </div>
                <div class="clearfix"> </div>
            </div>

        </div>
    </div>

    <?php
    $args = array(
        'post_type' => 'project',
        'posts_per_page' => 1,
        'meta_key'		=> 'type',
        'meta_value'	=> 'sell',
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
        'meta_value'	=> 'sell',
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
                                    <a href="<?php echo get_permalink($project->ID); ?>" ><img style="width: 310px; height:232px;" class="img-responsive" src="<?php echo $url; ?>" alt="" />	</a>
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
<?php get_footer(); ?>

<?php set_query_var( 'meta_key', 'type' ); ?>
<?php set_query_var( 'meta_value', 'buy' ); ?>

<?php
var_dump(get_query_var( 'meta_value'));
?>
