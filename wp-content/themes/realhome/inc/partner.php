<?php $args = array(
    'posts_per_page'   => 10,
    'offset'           => 0,
    'category'         => '',
    'category_name'    => '',
    'orderby'          => 'menu_order',
    'order'            => 'ASC',
    'include'          => '',
    'exclude'          => '',
    'meta_key'         => '',
    'meta_value'       => '',
    'post_type'        => 'partner',
    'post_mime_type'   => '',
    'post_parent'      => '',
    'author'	   => '',
    'author_name'	   => '',
    'post_status'      => 'publish',
    'suppress_filters' => true
);

$partnerItem_array = get_posts( $args ); ?>

<div class="content-bottom1">
    <h3>Our Partners</h3>
    <div class="container">
        <ul>
            <?php for($i = 0; $i < 5 ; $i++): ?>
                <li><a href="#"><img class="img-responsive" src="<?php echo get_the_post_thumbnail_url($partnerItem_array[$i]); ?>" alt=""></a></li>
            <?php endfor; ?>
            <div class="clearfix"> </div>
        </ul>
        <ul>
            <?php for($i = 5; $i < 10 ; $i++): ?>
                <li><a href="#"><img class="img-responsive" src="<?php echo get_the_post_thumbnail_url($partnerItem_array[$i]); ?>" alt=""></a></li>
            <?php endfor; ?>
            <div class="clearfix"> </div>
        </ul>
    </div>
</div>