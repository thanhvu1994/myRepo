<!--//head-->
<?php get_template_part( 'head'); ?>

<!--//header-->
<?php dynamic_sidebar('header'); ?>

<!--//banner-->
<?php get_template_part( 'inc/banner'); ?>

<!--//header_bottom-->
<?php get_template_part( 'inc/header_bottom'); ?>

<!--content-->
<div class="content">
    <?php dynamic_sidebar('home_page'); ?>
</div>

<!--//footer-->
<?php dynamic_sidebar('footer'); ?>
