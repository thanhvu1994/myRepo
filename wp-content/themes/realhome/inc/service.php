<div class="services">
    <div class="container">
        <div class="service-top">
            <h3>Services</h3>
            <p>We provide the best quality Services</p>                                                                                                                                                                                      </p>
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
                                <p><?php echo $item->post_content; ?></p>
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