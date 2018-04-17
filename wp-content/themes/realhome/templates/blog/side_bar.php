<?php 
	$arr_month = [
		1 => 'January',
		2 => 'February',
		3 => 'March',
		4 => 'April',
		5 => 'May',
		6 => 'June',
		7 => 'July',
		8 => 'August',
		9 => 'September',
		10 => 'October',
		11 => 'November',
		12 => 'December',
	];
 ?>
<div class="col-md-3 blog-sidebar">
	<div class="blog-list">
     	<h4>Categories</h4>
     	<?php
			$categories = get_categories( array(
			    'orderby' => 'name',
			    'order'   => 'ASC'
			) ); 
		?>
		<?php if (!empty($categories)): ?>
			<ul >
				<?php foreach( $categories as $category ) { 
					$category_link = home_url( '/blog/' ) . strtolower($category->slug);?>
				<li><a href="<?php echo $category_link?>"><i class="glyphicon glyphicon-arrow-right"> </i><?php echo $category->name ?></a></li>
				<?php } ?>
			</ul>
		<?php endif ?>
		<div class="clearfix"> </div>
 	</div>
 	<?php /*
  	<div class="blog-list">
     	<h4>Archive</h4>
		<ul >
		<?php 
		$today = getdate();
		foreach ($arr_month as $month => $month_name) {
			if ($month <= $today['mon']) {
				$args = array(
					'monthnum' => $month,
				    'post_status' => 'publish',
				);
				$the_query = new WP_Query( $args );
				$post_count = $the_query->post_count;
				echo '<li><a href="'.home_url( '/blog/month/'.strtolower($month_name)).'"><i class="glyphicon glyphicon-arrow-right"> </i>'.$month_name.' ('.$post_count.')</a></li>';
			}
		} ?>
		</ul>
 	</div>*/?>
	<?php 
	$args = array(
	            'posts_per_page'   => 3,
	            'offset'           => 0,
	            'category'         => '',
	            'category_name'    => '',
	            'orderby'          => 'menu_order',
	            'order'            => 'ASC',
	            'include'          => '',
	            'exclude'          => '',
	            'meta_key'         => '',
	            'meta_value'       => '',
	            'post_type'        => 'post',
	            'post_mime_type'   => '',
	            'post_parent'      => '',
	            'author'	   => '',
	            'author_name'	   => '',
	            'post_status'      => 'publish',
	            'suppress_filters' => true,
	            'meta_query' => array(
							        array(
							            'key'   => 'popular',
							            'value' => true,
							        	)
							    	)
			);
	$menuItem_array = get_posts( $args );
	?>
 	<div class="blog-list1">
     	<h4>Popular Blog</h4>
     	<?php if ($menuItem_array) {
     		foreach ($menuItem_array as $blog) { 
     			$detail_url = home_url( '/blog/');
     			$category = get_the_category();
                if (isset($category[0])) {
                    $slug_category_detail = $category[0]->slug;
                    $detail_url = home_url( '/blog/').$slug_category_detail.'/'.get_post_field( 'post_name', $blog->ID);
                }
				?>
	     		<div class="blog-list-top">
					<div class="blog-img">
						<a href="<?php echo $detail_url?>">
							<img class="img-responsive" src="<?php echo wp_get_attachment_url(get_post_thumbnail_id($blog->ID)); ?>" alt="<?php echo $blog->post_title?>">
						</a>
					</div>
					<div class="blog-text">
						<p ><a href="<?php echo $detail_url?>"><?php echo $blog->post_title?></a></p>
						<span class="link">
							<?php echo get_the_date('d-m-Y', $blog->ID) ?>
						</span>
					</div>
					<div class="clearfix"> </div>
				</div>
     	<?php }
     	} ?>
 	</div>
 	<?php /*
 	<?php $tags = get_tags(); ?>
  	<div class="blog-list2">
     	<h4>Tags</h4>
     	<?php if (!empty($tags)): ?>
     		<ul>
     		<?php foreach ($tags as $tag): ?>
				<li><a href="<?php echo get_tag_link( $tag->term_id )?>"><?php echo $tag->name ?></a></li>
     		<?php endforeach ?>
			</ul>
     	<?php endif ?>
	</div>*/?>
</div>
<div class="clearfix"> </div>