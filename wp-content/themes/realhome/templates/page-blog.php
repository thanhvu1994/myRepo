<?php
/**
 * Template Name: Blog Page
 *
 * @package WordPress
 * @subpackage realhome
 * @since realhome 1.0
 */
?>

<!--//head-->
<?php get_template_part( 'head'); ?>

<!--//header-->
<?php get_header(); ?>

<!--page banner-->
<?php
set_query_var( 'post', $post );
get_template_part( 'inc/page_banner');
?>

<!--blog-->
<div class="blog">
	<div class="container">
		<h3>Blog</h3>
	   	<?php get_template_part('templates/blog/index'); ?>
		
		<!--//side bar-->
	   	<?php get_template_part('templates/blog/side_bar'); ?>

	 	<nav>
	      	<ul class="pagination">
		        <li class="disabled"><a href="#" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
		        <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
		        <li><a href="#">2</a></li>
		        <li><a href="#">3</a></li>
		        <li><a href="#">4</a></li>
		        <li><a href="#">5</a></li>
		        <li><a href="#" aria-label="Next"><span aria-hidden="true">»</span></a></li>
	     	</ul>
	   </nav>
	</div>
</div>
<!--//blog-->

<!--//footer-->
<?php get_footer(); ?>
