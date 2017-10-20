<?php 
$args = array(
            'posts_per_page'   => 1,
            'offset'           => 0,
            'category'         => '',
            'category_name'    => '',
            'orderby'          => 'menu_order',
            'order'            => 'ASC',
            'include'          => '',
            'exclude'          => '',
            'meta_key'         => '',
            'meta_value'       => '',
            'post_type'        => 'inner_banner',
            'post_mime_type'   => '',
            'post_parent'      => '',
            'author'	   => '',
            'author_name'	   => '',
            'post_status'      => 'publish',
            'suppress_filters' => true,
            'meta_query' => array(
		        array(
		            'key'   => 'type',
		            'value' => '3',
		        )
		    )
        );
$menuItem_array = get_posts( $args );
?>
<?php if (!empty($menuItem_array)) {
	foreach ($menuItem_array as $item) { ?>
		<?php if (!empty(get_field('background_image',$item->ID))): ?>
			<div class="about-bottom" style="background: url(<?php echo get_field('background_image',$item->ID);?>) no-repeat center; background-size: cover;">
		<?php else: ?>
			<div class="about-bottom">
		<?php endif ?>
			<div class="container">
				<div class="col-md-6 bottom-about">
					<h4><a href="<?php echo get_permalink($item) ?>"><?php echo get_field('subtitle',$item->ID) ?></a></h4>
					<p><?php echo $item->post_content ?></p>
					<a href="<?php echo get_permalink($item) ?>" class="hvr-sweep-to-right more">Read More</a>
				</div>
				<div class="col-md-6 bottom-about1">
					<iframe src="<?php echo get_field('video',$item->ID) ?>"  webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe> 
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
<?php } 
} ?>