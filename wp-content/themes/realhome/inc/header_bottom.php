<!--header-bottom-->
<div class="banner-bottom-top">
    <div class="container">
        <div class="bottom-header">

            <?php $args = array(
                'posts_per_page'   => MAX_HEADER_BOTTOM_MENU,
                'offset'           => 0,
                'category'         => '',
                'category_name'    => '',
                'orderby'          => 'menu_order',
                'order'            => 'ASC',
                'include'          => '',
                'exclude'          => '',
                'meta_key'         => '',
                'meta_value'       => '',
                'post_type'        => 'header_bottom_menu',
                'post_mime_type'   => '',
                'post_parent'      => '',
                'author'	   => '',
                'author_name'	   => '',
                'post_status'      => 'publish',
                'suppress_filters' => true
            );
            $menuItem_array = get_posts( $args );
            $countMenuItem = count($menuItem_array);
            $marginPercent = WIDTH_PERCENT_HEADER_BOTTOM_MENU_ITEM*(MAX_HEADER_BOTTOM_MENU-$countMenuItem)/2;
            ?>
            <div class="header-bottom" style="width: <?php echo WIDTH_PERCENT_HEADER_BOTTOM_MENU_ITEM*$countMenuItem; ?>%; margin-left: <?php echo $marginPercent; ?>%;">

                <?php foreach($menuItem_array as $menuItem) :?>
                    <div class=" bottom-head" style="width: <?php echo 100/$countMenuItem; ?>%;">
                        <a href="<?php echo get_field('page',$menuItem->ID); ?>">
                            <div class="buy-media">
                                <i class="<?php echo get_field('icon',$menuItem->ID); ?>"></i>
                                <h6><?php echo get_field('title',$menuItem->ID); ?></h6>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>

                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
</div>