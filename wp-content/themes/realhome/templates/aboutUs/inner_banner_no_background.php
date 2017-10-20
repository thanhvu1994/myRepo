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
		            'value' => '2',
		        )
		    )
        );
$menuItem_array = get_posts( $args );
?>
<?php if (!empty($menuItem_array)) {
	foreach ($menuItem_array as $item) { ?>
		<div class="about-middle">
			<div class="container">		
				<div class="col-md-8 about-mid">
					<h4><?php echo get_the_title($item) ?></h4>
					<h6><a href="<?php echo get_permalink($item) ?>"><?php echo get_field('subtitle',$item->ID) ?></a></h6>
					<p ><?php echo $item->post_content ?></p>
				</div>
				<div class="col-md-4 about-mid1">
					<p><?php echo get_field('block_content',$item->ID) ?></p>
					<a href="<?php echo get_field('url',$item->ID) ?>" class="hvr-sweep-to-right more-in">READ MORE</a>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
<?php } 
} ?>