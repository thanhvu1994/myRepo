<?php $innerBanner = get_page_by_path( $inner_banner_slug, OBJECT, 'inner_banner' ) ?>

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