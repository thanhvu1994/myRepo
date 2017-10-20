<!--banner-->

<div class=" header-right">
    <div class="banner">
        <?php $args = array(
            'posts_per_page'   => 5,
            'offset'           => 0,
            'category'         => '',
            'category_name'    => '',
            'orderby'          => 'menu_order',
            'order'            => 'ASC',
            'include'          => '',
            'exclude'          => '',
            'meta_key'         => '',
            'meta_value'       => '',
            'post_type'        => 'banner_item',
            'post_mime_type'   => '',
            'post_parent'      => '',
            'author'	   => '',
            'author_name'	   => '',
            'post_status'      => 'publish',
            'suppress_filters' => true
        );
        $bannerItem_array = get_posts( $args ); ?>

        <div class="slider">
            <div class="callbacks_container">
                <ul class="rslides" id="slider">
                    <?php foreach($bannerItem_array as $bannerItem): ?>
                        <?php if(get_field('active',$bannerItem->ID)) : ?>
                            <li>
                                <div class="banner-item" style="background: url(<?php echo (get_field('background_image',$bannerItem->ID)); ?>) no-repeat; background-size: cover;">
                                    <div class="caption">
                                        <?php
                                        $first = substr($bannerItem->post_title, 0, 5);
                                        $theRest = substr($bannerItem->post_title, 5 , 1000);
                                        ?>
                                        <h3><span><?php echo $first; ?></span><?php echo $theRest; ?></h3>
                                        <p><?php echo $bannerItem->post_content; ?></p>
                                    </div>
                                </div>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</div>