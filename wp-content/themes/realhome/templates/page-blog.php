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
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo home_url(); ?>">Home</a></li>
            <li class="breadcrumb-item active"><?php echo $post->post_title; ?></li>
        </ol>

		<h3>Blog</h3>
	   	<?php get_template_part('templates/blog/index'); ?>
		
		<!--//side bar-->
	   	<?php get_template_part('templates/blog/side_bar'); ?>
	</div>
</div>
<!--//blog-->

<!--//footer-->
<?php get_footer(); ?>
