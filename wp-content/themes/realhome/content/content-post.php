<div class="blog">
	<div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo home_url(); ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?php echo get_permalink(get_page_by_title('blog')).'all'; ?>">Blog</a></li>
            <li class="breadcrumb-item active"><?php echo $post->post_title; ?></li>
        </ol>

	   <div class="col-md-9 blog-head">
	     	<div class="blog-top">
		        <img src="<?php echo get_the_post_thumbnail_url()?>" class="img-responsive" alt=""/>
	          	<h4><?php echo get_the_title() ?></h4>
	         	<h5>Date : <?php echo get_the_date('d-m-Y') ?></h5>
		        <p><?php echo $post->post_content ?></p>
	           	<div class="links"><hr></div>
		 	</div> 
		 	<!---->
			<div class="single-grid">
				<h5>Our Comment</h5>
			 	<div class="media">
		          	<div class="media-left">
			            <a href="#">
			            	<img class="media-object" src="images/av.png" alt="" />
			            </a>
	          		</div>
		          	<div class="media-body">
			            <h4 class="media-heading">Nested media heading</h4>
		              	<p> Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
		          	</div>
		        </div>
	  			<div class="media">
		          	<div class="media-left">
			            <a href="#">
			            	<img class="media-object" src="images/av.png" alt="" />
			            </a>
	          		</div>
		          	<div class="media-body">
			            <h4 class="media-heading">Nested media heading</h4>
			              <p> Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
			          	<div class="media">
				          	<div class="media-left">
					            <a href="#">
					            	<img class="media-object" src="images/av.png" alt="" />
					            </a>
				          	</div>
				          	<div class="media-body">
					            <h4 class="media-heading">Nested media heading</h4>
				              	<p> Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
				          	</div>
		        		</div>
			        	<div class="media">
			          		<div class="media-left">
					            <a href="#">
					            	<img class="media-object" src="images/av.png" alt="" />
					            </a>
			          		</div>
			          		<div class="media-body">
			            		<h4 class="media-heading">Nested media heading</h4>
			              		<p> Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
			          	
			          		</div>
			        	</div>
		          	</div>
		        </div>
		 	 	<div class="media">
	          		<div class="media-left">
			            <a href="#">
			            	<img class="media-object" src="images/av.png" alt="" />
			            </a>
		          	</div>
		          	<div class="media-body">
		            	<h4 class="media-heading">Nested media heading</h4>
		              	<p> Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
		          	</div>
	        	</div>
	        	<div class="media">
	          		<div class="media-left">
			            <a href="#">
			            	<img class="media-object" src="images/av.png" alt="" />
			            </a>
		          	</div>
	          		<div class="media-body">
	            		<h4 class="media-heading">Nested media heading</h4>
	              		<p> Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
	          		</div>
	        	</div>
			</div>
			<!---->
			<div class="leave">
				<h5>Leave a Comment</h5>
				<form>
				   <input type="text"  placeholder="Name" required="">
				   <input type="text" placeholder="Email" required="">
				   <input type="text" placeholder="Subject" required="">
				   <textarea  placeholder="Comment" required=""></textarea>
				   <label class="hvr-sweep-to-right">
		           <input type="submit" value="Post Comment">
		           </label>
				</form>
			</div>
		</div>
		<!--//side bar-->
	   	<?php get_template_part('templates/blog/side_bar'); ?>
	</div>
</div>