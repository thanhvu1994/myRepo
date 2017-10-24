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
					$category_link = sprintf('<a href="%1$s" alt="%2$s"><i class="glyphicon glyphicon-arrow-right"> </i>%3$s</a>', esc_url( get_category_link( $category->term_id ) ), esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ), esc_html( $category->name )
				    ); ?>
				<li><?php echo $category_link ?></li>
				<?php } ?>
			</ul>
		<?php endif ?>
		<div class="clearfix"> </div>
 	</div>
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
				echo '<li><a href="#"><i class="glyphicon glyphicon-arrow-right"> </i>'.$month_name.' ('.$post_count.')</a></li>';
			}
		} ?>
		</ul>
 	</div>

 	<div class="blog-list1">
     	<h4>Popular Blog</h4>
		<div class="blog-list-top">
			<div class="blog-img">
				<a href="blog_single.html"><img class="img-responsive" src="images/bo.jpg" alt=""></a>
			</div>
			<div class="blog-text">
				<p ><a href="#">Lorem ipsum dolor sit amet, consectetuer</a></p>
				<span class="link">
					Feb 14, 2015
					<a href="#">
						<i class="glyphicon glyphicon-heart"> </i>
					</a>16
				</span>
			</div>
			<div class="clearfix"> </div>
		</div>
 	</div>
  	<div class="blog-list2">
     	<h4>Tags</h4>
		<ul>
			<li><a href="#">Web Design</a></li>
		</ul>
	</div>
</div>
<div class="clearfix"> </div>