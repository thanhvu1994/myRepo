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
	   	<?php 
	   	set_query_var( 'has_category', true );
	   	get_template_part('templates/blog/index'); 
	   	?>
		<!--//side bar-->
	   	<?php get_template_part('templates/blog/side_bar'); ?>
	</div>
</div>
<!--//blog-->

<!--//footer-->
<?php get_footer(); ?>
