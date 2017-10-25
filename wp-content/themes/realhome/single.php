<!--//head-->
<?php get_template_part( 'head'); ?>

<!--//header-->
<?php get_header(); ?>

<?php 
	if ($post->post_type == 'post') {
		get_template_part('content/content-post');
	}
 ?>

<!--//footer-->
<?php get_footer(); ?>