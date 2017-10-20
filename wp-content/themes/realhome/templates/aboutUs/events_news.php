<?php 
$args = array(
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
            'post_type'        => 'event_new',
            'post_mime_type'   => '',
            'post_parent'      => '',
            'author'	   => '',
            'author_name'	   => '',
            'post_status'      => 'publish',
            'suppress_filters' => true,
        );
$menuItem_array = get_posts( $args );
$menuItem_array = array_chunk($menuItem_array, 3)
?>
<div class="container">
	<div class="content-events">
		<h3> Events & News</h3>
		<?php foreach ($menuItem_array as $menuItem) {
			echo '<div class="news">';
			foreach ($menuItem as $item) {
				$date_created = date_create($item->post_date);
				$date_created =  date_format($date_created,"d/m/Y"); ?>
				<div class="col-md-4 new-more">
					<div class="event">
						<h4><?php echo $date_created ?></h4>
						<h6><a href="<?php echo get_permalink($item)?>"><?php echo $item->post_title ?></a></h6>
					</div>
					<p><?php echo get_field('description',$item->ID) ?></p>
					<a class="hvr-sweep-to-right more" href="<?php echo get_permalink($item)?>">Read More</a>
				</div>
				<?php 
			} 
			echo '<div class="clearfix"> </div> </div>';
		}?>
	</div>
</div>
