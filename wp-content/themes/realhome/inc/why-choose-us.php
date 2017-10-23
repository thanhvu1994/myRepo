<div class="choose-us">
    <div class="container">
        <h3>why choose us</h3>

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
            'post_type'        => 'why_choose_us',
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
                <div class="us-choose">
            <?php endif; ?>

            <div class="col-md-6 why-choose">
                <div class="  ser-grid ">
                    <i class="hi-icon hi-icon-archive fa <?php echo get_field('icon',$item->ID)?>"> </i>
                </div>
                <div class="ser-top beautiful">
                    <h5><?php echo $item->post_title; ?></h5>
                    <label><?php echo get_field('subtitle',$item->ID)?></label>
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