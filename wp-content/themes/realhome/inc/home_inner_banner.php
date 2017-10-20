<!--features-->
<div class="content-middle">
    <div class="container">

        <?php $innerBanner = get_page_by_path( 'home-inner-banner', OBJECT, 'inner_banner' ) ?>

        <div class="mid-content">
            <h3><?php echo $innerBanner->post_title; ?></h3>
            <p><?php echo $innerBanner->post_content; ?></p>
            <a class="hvr-sweep-to-right more-in" href="<?php echo get_field('url', $innerBanner->ID); ?>">Read More</a>
        </div>
    </div>
</div>
<style>
    .content-middle {
        background: url(<?php echo get_field('background_image', $innerBanner->ID); ?>) no-repeat center;
        width: 100%;
        min-height: 250px;
        display: block;
        background-size: cover;
    }
</style>