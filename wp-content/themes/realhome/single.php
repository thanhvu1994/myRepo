<!--//head-->
<?php get_template_part( 'head'); ?>

<!--//header-->
<?php dynamic_sidebar('header'); ?>

<?php 
	if ($post->post_type == 'post') {
		get_template_part('content/content-post');
	}else if ($post->post_type == 'project') {
        get_template_part('content/content-project');
    }else if ($post->post_type == 'city') {
        get_template_part('content/content-city');
    }else if ($post->post_type == 'service') {
        get_template_part('content/content-service');
    }else {
        get_template_part('content/content-none');
    }
 ?>

<!--//footer-->
<?php dynamic_sidebar('footer'); ?>