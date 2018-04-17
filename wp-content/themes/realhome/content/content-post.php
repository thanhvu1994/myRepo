<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.10&appId=898150997005042';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div class="blog">
	<div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo home_url(); ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?php echo get_permalink(get_page_by_title('blog')).'all'; ?>">Blog</a></li>
            <li class="breadcrumb-item active"><?php echo $post->post_title; ?></li>
        </ol>

	   <div class="col-md-9 blog-head">
	     	<div class="blog-top">
		        <img src="<?php echo get_the_post_thumbnail_url()?>" class="img-responsive" alt="<?php echo get_the_title() ?>"/>
	          	<h4><?php echo get_the_title() ?></h4>
	         	<h5>Date : <?php echo get_the_date('d-m-Y') ?></h5>
		        <p>
		        	<?php 
			        	setup_postdata( $post );
			        	the_content();
		        	?>
		        </p>
	           	<div class="links"><hr></div>
		 	</div> 
		 	<!---->
		 	<?php global $wp; ?>
			<div class="single-grid">
				<h5>Our Comment</h5>
			 	<div class="fb-comments" data-href="<?php echo home_url( $wp->request )?>/" data-width="100%" data-numposts="10"></div>
			</div>
			
		</div>
		<!--//side bar-->
	   	<?php get_template_part('templates/blog/side_bar'); ?>
	</div>
</div>