<!--//head-->
<?php get_template_part( 'head'); ?>

<!--//header-->
<?php get_header(); ?>

<!--page banner-->
<?php
set_query_var( 'post', $post );
get_template_part( 'inc/page_banner');
?>

<div class="terms">
    <div class="container">
        <?php echo $post->post_content; ?>
    </div>
</div>

<!--//footer-->
<?php get_footer(); ?>
