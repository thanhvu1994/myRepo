<?php get_template_part( 'inc/page_banner'); ?>

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
                    <p><span class="bath">Address </span>: <span class="two"><?php echo get_field('location',$post->ID); ?></span></p>
                    <p><span class="bath1">Area </span>: <span class="two"><?php echo get_field('area',$post->ID); ?> m<sup>2</sup></span></p>
                    <p><span class="bath2">Floors </span>: <span class="two"><?php echo get_field('floor',$post->ID); ?></span></p>
                    <p><span class="bath3">Bedrooms </span>: <span class="two"><?php echo get_field('bedroom',$post->ID); ?></span></p>
                    <p><span class="bath4">Price </span> : <span class="two"><?php echo get_field('price',$post->ID); ?></span></p>
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
                            <a href="#openModal_<?php echo $community['id']; ?>"><img class="img-responsive" src="<?php echo $community['full_image_url']; ?>" alt=""></a>
                        </div>
                        <div class="box-text">
                            <p>
                                <a href="#openModal_<?php echo $community['id']; ?>" ><?php echo $community['title']; ?></a>
                            </p>
                            <p style="font-weight: normal">
                                <?php echo (strlen ($community['caption']) > 40)? substr($community['caption'],0,40).'...' : $community['caption']; ?>
                            </p>
                            <a href="#openModal_<?php echo $community['id']; ?>" class="in-box">More Info</a>
                        </div>
                        <div class="clearfix"> </div>
                    </div>

                    <div id="openModal_<?php echo $community['id']; ?>" class="modalDialog">
                        <div>
                            <a href="#close" title="Close" class="close">X</a>
                            <h2><?php echo $community['title']; ?></h2>
                            <div class="community-image" style="background: url(<?php echo $community['full_image_url']; ?>);">
                            </div>
                            <p><?php echo $community['caption']; ?></p>
                        </div>
                    </div>
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
                                <a href="<?php echo get_permalink($project->ID); ?>" ><img style="width: 481px; height:232px;" class="img-responsive" src="<?php echo $url; ?>" alt="" />	</a>
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