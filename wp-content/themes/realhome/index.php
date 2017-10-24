<!--//head-->
<?php get_template_part( 'inc/head'); ?>

<!--//header-->
<?php get_header(); ?>

<!--//banner-->
<?php get_template_part( 'inc/banner'); ?>

<!--//header_bottom-->
<?php get_template_part( 'inc/header_bottom'); ?>

<!--content-->
<div class="content">
    <!--//most_popular-->
    <?php get_template_part( 'inc/most_popular'); ?>

    <!--service-->
    <?php
        get_template_part( 'inc/service');
    ?>

    <!--features-->
    <?php
        set_query_var( 'inner_banner_slug', 'home-inner-banner' );
        get_template_part( 'inc/inner_banner');
    ?>

    <!--project--->
    <?php get_template_part( 'inc/project_gallery'); ?>

    <!--testimonial--->
    <?php get_template_part( 'inc/testimonial'); ?>

    <!--partners-->
    <?php get_template_part( 'inc/partner'); ?>
</div>

<!--//footer-->
<?php get_footer(); ?>
