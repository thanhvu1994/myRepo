<?php
/**
 * Template Name: Privacy Policy Page
 *
 * @package WordPress
 * @subpackage realhome
 * @since realhome 1.0
 */
?>

<!--//head-->
<?php get_template_part('head'); ?>

<!--//header-->
<?php get_header(); ?>

<div class="terms">
	<div class="container">
		<h3>Privacy Policy</h3>
		<?php echo get_post_field('post_content', $post->ID) ?>
	</div>
</div>
<!--//footer-->
<?php get_footer(); ?>