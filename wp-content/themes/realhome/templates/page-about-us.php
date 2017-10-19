<?php
/**
 * Template Name: About Us Page
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

<?php echo $post->post_title; ?>

<?php echo $post->post_content; ?>

<?php get_footer(); ?>
