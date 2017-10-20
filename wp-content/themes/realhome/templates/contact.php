<?php
/**
 * Template Name: Contact Page
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

<div class="contact">
	<div class="container">
		<h3><?php echo get_the_title($post) ?></h3>
	 <div class="contact-top">
		<div class="col-md-6 contact-top1">
		  <h4> Info</h4>
          <p class="text-contact"><?php echo $post->post_content; ?></p>
		  <div class="contact-address">
		  	<div class="col-md-6 contact-address1">
			  	<h5>Address</h5>
			  	<p><b>The Company Name</b></p>
			  	<p>25478 charms of pleasur</p>
			  	<p>On the other hand, we denounce</p>
		  	</div>
		  	<div class="col-md-6 contact-address1">
			  	<h5>Email Address</h5>
			  	<p>General :<a href="malito:mail@demolink.org"> info(at)Lorem.com</a></p>
			  	<p>Office :<a href="malito:mail@demolink.org"> info(at)Lorem.com</a></p>
		  	</div>
		  	<div class="clearfix"></div>
		  </div>
		  <div class="contact-address">
		  	<div class="col-md-6 contact-address1">
			  	<h5>Phone</h5>
			  	<p>Landline : 254-8974-5847</p>
			  	<p>Mobile : +174 1478 74755</p>
	        </div>
		  	<div class="clearfix"></div>
		  </div>
		</div>
		<div class="col-md-6 contact-right">
            <?php echo get_post_field('form', $post->ID) ?>
		</div>
		<div class="clearfix"> </div>
</div>
	</div>
	<div class="map">
	     <iframe src="<?php echo get_post_field('map', $post->ID) ?>"> </iframe>
	    </div>
</div>

<!--//footer-->
<?php get_footer(); ?>