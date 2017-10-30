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
<?php get_template_part('head'); ?>

<!--//header-->
<?php get_header(); ?>

<!--page banner-->
<?php
set_query_var( 'post', $post );
get_template_part( 'inc/page_banner');
?>


<div class="about">	
	<div class="about-head">
		<div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo home_url(); ?>">Home</a></li>
                <li class="breadcrumb-item active"><?php echo $post->post_title; ?></li>
            </ol>
			<h3><?php echo get_the_title($post) ?></h3>
			<div class="about-in">
				<a href="javascript:void(0)"><img src="<?php echo the_post_thumbnail_url(); ?>" alt="image" class="img-responsive "></a>
                <?php
                    $subtitle = str_replace('<p>','',get_field('subtitle',$post->ID));
                    $subtitle = str_replace('/<p>','',$subtitle);
                ?>
				<h6><a href="javascript:void(0)"><?php echo $subtitle; ?></a></h6>
				<p><?php echo $post->post_content; ?></p>
			</div>
		</div>
	</div>

    <!--features-->
    <?php
    set_query_var( 'inner_banner_slug', 'about-middle-banner' );
    get_template_part( 'inc/inner_banner');
    ?>

    <!--service-->
    <?php
        get_template_part( 'inc/why-choose-us');
    ?>

    <!--features-->
    <?php
    set_query_var( 'inner_banner_slug', 'about-bottom-banner' );
    get_template_part( 'inc/inner_banner');
    ?>

	<!---->
	<?php get_template_part('templates/aboutUs/events_news'); ?>
</div>

<?php get_footer(); ?>