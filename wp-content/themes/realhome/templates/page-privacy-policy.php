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
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo home_url(); ?>">Home</a></li>
            <li class="breadcrumb-item active"><?php echo $post->post_title; ?></li>
        </ol>
		<h3>Privacy Policy</h3>
		<?php echo get_post_field('post_content', $post->ID) ?>
	</div>
</div>
<!--//footer-->
<?php get_footer(); ?>