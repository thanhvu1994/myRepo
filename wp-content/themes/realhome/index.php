<!DOCTYPE html>
<!--[if IE 8]> <html <?php language_attributes(); ?> class="ie8"> <![endif]-->
<!--[if !IE]> <html <?php language_attributes(); ?>> <![endif]-->

<html lang="vi">
<!--//head-->
<?php get_template_part( 'head'); ?>

<!--//header-->
<?php get_header(); ?>

<!--//banner-->
<?php get_template_part( 'inc/banner'); ?>

<!--//header_bottom-->
<?php get_template_part( 'inc/header_bottom'); ?>

<!--content-->
<div class="content">
    <?php dynamic_sidebar('home_page'); ?>
</div>

<!--//footer-->
<?php get_footer(); ?>
<script type="text/javascript">
	$(window).load(function() {
		$("#flexiselDemo1").flexisel({
			visibleItems: 4,
			animationSpeed: 1000,
			autoPlay: true,
			autoPlaySpeed: 3000,
			pauseOnHover: true,
			enableResponsiveBreakpoints: true,
	    	responsiveBreakpoints: {
	    		portrait: {
	    			changePoint:480,
	    			visibleItems: 1
	    		},
	    		landscape: {
	    			changePoint:640,
	    			visibleItems: 2
	    		},
	    		tablet: {
	    			changePoint:768,
	    			visibleItems: 3
	    		}
	    	}
	    });
	});
</script>
</html>