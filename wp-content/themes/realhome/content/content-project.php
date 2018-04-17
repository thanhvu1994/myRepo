<?php get_template_part( 'inc/page_banner'); ?>



<?php

    switch(get_field('type',$post->ID)){

        case 'sell':

            $type = 'buy';

            break;

        case 'rent':

            $type = 'rent';

            break;

        case 'apartment':

            $type = 'apartment';

            break;

        case 'hotel':

            $type = 'hotel';

            break;

        default:

            $type = 'sell';

            break;

    }

?>



<?php $_SESSION['sessionProjectType'] = $type; ?>



<div class="container">

    <div class="buy-single-single">

        <ol class="breadcrumb">



            <li class="breadcrumb-item"><a href="<?php echo home_url(); ?>">Home</a></li>

            <?php $city = get_page_by_path( get_field('city') , object, 'city' ); ?>

            <li class="breadcrumb-item"><a href="<?php echo get_permalink($city); ?>"><?php echo $city->post_title; ?></a></li>

            <li class="breadcrumb-item active"><?php echo $post->post_title; ?></li>

        </ol>



        <div class="col-md-9 single-box">



            <div class=" buying-top">

                <div class="flexslider">

                    <?php

                    $gallery = acf_photo_gallery('photo_gallery',$post->ID);

                    ?>



                    <ul class="slides">

                        <?php foreach($gallery as $item): ?>

                            <li data-thumb="<?php echo $item['full_image_url']; ?>">

                                <img class="img-project-detail" src="<?php echo $item['full_image_url']; ?>" title="<?php echo $item['caption']; ?>"/>

                            </li>

                        <?php endforeach; ?>

                    </ul>

                </div>

            </div>

            <div class="buy-sin-single">

                <div class="col-sm-5 middle-side immediate">

                    <h4>Project Detail</h4>

                    <div class="table-responsive">

                        <table class="table table-striped table-condensed table-hover">

                            <tr><td>Address</td><td class="td-content"><?php echo get_field('location'); ?></td></tr>

                            <tr><td>Area</td><td class="td-content"><?php echo get_field('area'); ?></td></tr>

                            <tr><td>Floors</td><td class="td-content"><?php echo get_field('floor'); ?></td></tr>

                            <tr><td>Bedrooms</td><td class="td-content"><?php echo get_field('bedroom'); ?></td></tr>

                            <tr><td>Price</td><td class="td-content"><?php echo get_field('price'); ?></td></tr>

                        </table>

                    </div>

                    <div class="   right-side">

                        <a href="<?php echo get_permalink(get_page_by_title('contact')); ?>" class="hvr-sweep-to-right more" >Contact Now</a>

                    </div>

                </div>

                <div class="col-sm-7 buy-sin">

                    <h4>Description</h4>

                    <p><?php echo $post->post_content; ?></p>

                </div>

                <div class="clearfix"> </div>

            </div>

            <div class="map-buy-single">

                <h4>Location</h4>

                <div class="map-buy-single1">

                    <iframe src="<?php echo get_field('iframe_map',$post->ID); ?>"></iframe>

                </div>

            </div>



            <?php

                $videos = explode(';',get_field('iframe_video',$post->ID));

            ?>

            <?php if(!empty($videos)): ?>

                <?php foreach($videos as $key => $video) : ?>

                    <div class="video-pre">

                        <?php echo ($key == 0)? '<h4>Video Presentation</h4>' : '';?>

                        <iframe src="<?php echo $video; ?>"  webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>

                    </div>

                <?php endforeach; ?>

            <?php endif; ?>

        </div>









        <div class="col-md-3">

            <div class="single-box-right right-immediate">

                <h4>Featured Communities</h4>

                <?php

                    $communities = acf_photo_gallery('communitie',$post->ID);

                ?>

                <?php foreach($communities as $community): ?>

                    <div class="single-box-img ">

                        <div class="box-img">

                            <a class="openModal_<?php echo $community['id']; ?>"><img class="img-responsive" src="<?php echo $community['full_image_url']; ?>" alt="<?php echo $community['title']; ?>"></a>

                        </div>

                        <div class="box-text">

                            <p>

                                <a class="openModal_<?php echo $community['id']; ?>" ><?php echo $community['title']; ?></a>

                            </p>

                            <p style="font-weight: normal">

                                <?php echo (strlen ($community['caption']) > 40)? substr($community['caption'],0,40).'...' : $community['caption']; ?>

                            </p>

                            <a class="openModal_<?php echo $community['id']; ?>" style="font-size: 0.8em; margin: 0.3em 0em 0; color: #000;">More Info</a>

                        </div>

                        <div class="clearfix"> </div>

                    </div>



                    <div id="openModal_<?php echo $community['id']; ?>" class="modalDialog">

                        <div class="modal_container">

                            <h2><?php echo $community['title']; ?></h2>

                            <img class="community-image" src="<?php echo $community['full_image_url']; ?>" alt="<?php echo $community['title']; ?>"/>

                            <blockquote>

                                <p><?php echo $community['caption']; ?></p>

                            </blockquote>



                        </div>

                    </div>



                    <script>

                        $('.openModal_<?php echo $community['id']; ?>').click(function(){

                            var id = $(this).attr('class');



                            $('#' + id).css('opacity',1);

                        });



                        $(document).mouseup(function(e)

                        {

                            var container = $("#openModal_<?php echo $community['id']; ?>");



                            // if the target of the click isn't the container nor a descendant of the container

                            if (!container.is(e.target) && container.has(e.target).length === 0)

                            {

                                container.css('opacity',0);

                            }

                        });

                    </script>

                <?php endforeach; ?>

            </div>

        </div>

        <div class="clearfix"> </div>

    </div>

</div>



    <!---->

    <?php

    $args = array(

        'post_type' => 'project',

        'posts_per_page' => 6,

        'orderby' => 'rand',

        'meta_key'		=> 'type',

        'meta_value'	=> get_field('type',$post->ID),

        'post__not_in' => array($post->ID)

    );



    $projects = get_posts($args);

    ?>

    <div class="container">

        <div class="future">

            <?php if(count($projects) >= 2) : ?>

            <h3>Related Projects</h3>

            <div class="content-bottom-in">



                <ul id="flexiselDemo1">

                    <?php foreach($projects as $project): ?>

                        <li>

                            <div class="project-fur">

                                <?php $url = wp_get_attachment_url( get_post_thumbnail_id($project->ID), 'Large' ); ?>

                                <a href="<?php echo get_permalink($project->ID); ?>" ><img style="width: 481px; height:232px;" class="img-responsive" src="<?php echo $url; ?>" alt="<?php echo $project->post_title; ?>" />	</a>

                                <div class="fur">

                                    <div class="fur1">

                                        <span class="fur-money"><?php echo get_field('price',$project->ID); ?></span>

                                        <h6 class="fur-name"><a href="<?php echo get_permalink($project->ID); ?>"><?php echo $project->post_title; ?></a></h6>

                                        <span><?php $string = get_field('location',$project->ID); ?>
					      <?php echo (strlen($string) > 80)? substr($string, 0, 80) : str_pad($string, 80); ?>
					</span>

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