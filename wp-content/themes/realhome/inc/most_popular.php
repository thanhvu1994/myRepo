<div class="content-grid">
    <div class="container" style="width: 1400px">
        <h3>Most Popular</h3>
        <div class="content-bottom-in">
            <ul id="mostPopularSlider">
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
                    <li>
                        <div class="mostPopu box_2">
                            <a href="<?php echo get_permalink($item->ID); ?>" class="mask">
                                <?php $url = wp_get_attachment_url( get_post_thumbnail_id($item->ID), 'Large' ); ?>

                                <img class="img-responsive zoom-img" src="<?php echo $url; ?>">
                            </a>
                            <div class="most-1">
                                <h5><a href="<?php echo get_permalink($item->ID); ?>"><?php echo $item->post_title; ?></a></h5>
                                <p>
                                    <br>
                                    <?php echo get_field('short_description',$item->ID); ?>
                                </p>
                            </div>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>