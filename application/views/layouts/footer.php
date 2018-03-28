			<!-- Footer -->
			<div class="footer-container" >
		        <div class="ps_block_title">
                    <?php echo $this->settings->get_param('defaultPageTitle') ?>
		        </div>
				<footer id="footer"  class="container">
					<div class="row"><!-- MODULE Block new products -->
						<div class="col-xs-12 col-sm-3 ps_product_footer">
						    <div>
						        <?php if ($this->session->userdata['languages'] == 'vn'): ?>
						        	<h4>Sản phẩm</h4>
					            <?php else: ?>
						        	<h4>Products</h4>
					            <?php endif ?>
						        <div class="ps_line">
						            <hr>
						        </div>
						    </div>
							<div class="block_content">
								<?php 
								$menuFooter = $this->categories->getMenuProductFooter();
								if (count($menuFooter) > 0): 
									echo '<ul class="product_images clearfix">';
									foreach ($menuFooter as $menu) :?>
				                        <li>
				                            <a href="<?php echo base_url('cat-'. $menu->slug.'.html') ?>" title="<?php echo $menu->category_name ?>">
				                                <?php echo ucfirst($menu->getFieldFollowLanguage('category_name')) ?>
				                            </a>
				                        </li>
				                    <?php endforeach;
				                    echo '</ul>';
								 endif ?>
		            		</div>
						</div>
						<!-- /MODULE Block new products -->
						<!-- MODULE Block new products -->
						<div class="col-xs-12 col-sm-3 ps_social_bottom">
							<?php if ($this->session->userdata['languages'] == 'vn'): ?>
					        	<h4>Các bài viết gần đây</h4>
				            <?php else: ?>
					        	<h4>Newest Post</h4>
				            <?php endif ?>

					        <div class="ps_line">
					            <hr>
					        </div>
		    				<div class="block_content">
		                    	<ul class="product_images clearfix">
                                    <?php $news = $this->news->getNews(6,0); ?>
                                    <?php foreach($news as $new): ?>
                                        <li style="float: none">
                                            <a href="<?php echo base_url('new-'.$new->getCategoryLink().'/'.$new->slug.'.html'); ?>" title="<?php echo ($this->session->userdata['languages'] == 'vn') ? $new->title : $new->title_en; ?>">
                                                <?php echo ($this->session->userdata['languages'] == 'vn') ? $new->title : $new->title_en; ?>
                                            </a>
                                        </li>
                                    <?php endforeach; ?>
		                        </ul>
		            		</div>
						</div>
						<!-- /MODULE Block new products -->
						<div class="col-xs-12 col-sm-3 ps_social_bottom">
						    <?php if ($this->session->userdata['languages'] == 'vn'): ?>
					        	<h4>Tham gia trên</h4>
				            <?php else: ?>
					        	<h4>Follow Us</h4>
				            <?php endif ?>
						    <div class="ps_line">
						        <hr>
						    </div>
						    <?php
						    	$facebook = $this->settings->get_param('facebook');
						    	$googleplus = $this->settings->get_param('googleplus');
						    	$twitter = $this->settings->get_param('twitter');
						    	$youtube = $this->settings->get_param('youtube');
						    	$instagram = $this->settings->get_param('instagram');
						    	$pinterest = $this->settings->get_param('pinterest');
						    	$linkedin = $this->settings->get_param('linkedin');
						     ?>
						    <ul>
						    	<?php if (!empty($facebook)): ?>
					    			<li class="facebook">
						                <a target="_blank" href="<?php echo $facebook ?>">
						                    <i class="icon-facebook"></i>
						                </a>
						            </li>
						    	<?php endif ?>
						    	<?php if (!empty($googleplus)): ?>
						    	<li class="google">
					                <a target="_blank"  href="<?php echo $googleplus ?>">
					                    <i class="icon-google-plus"></i>
					                </a>
					            </li>
						    	<?php endif ?>
						    	<?php if (!empty($instagram)): ?>
					            <li class="instagram">
					                <a target="_blank"  href="<?php echo $instagram ?>">
					                    <i class="icon-instagram"></i>
					                </a>
					            </li>
						    	<?php endif ?>
						    	<?php if (!empty($youtube)): ?>
		                        <li class="youtube">
					                <a target="_blank"  href="<?php echo $youtube ?>">
					                    <i class="icon-youtube"></i>
					                </a>
					            </li>
						    	<?php endif ?>
						    	<?php if (!empty($twitter)): ?>
					            <li class="twitter">
					                <a target="_blank"  href="<?php echo $twitter ?>">
					                    <i class="icon-twitter"></i>
					                </a>
					            </li>
						    	<?php endif ?>
						    	<?php if (!empty($pinterest)): ?>
					            <li class="pinterest">
					                <a target="_blank"  href="<?php echo $pinterest ?>">
					                    <i class="icon-pinterest"></i>
					                </a>
					            </li>
						    	<?php endif ?>
						    	<?php if (!empty($linkedin)): ?>
					            <li class="linkedin">
					                <a target="_blank"  href="<?php echo $linkedin ?>">
					                    <i class="icon-linkedin"></i>
					                </a>
					            </li>
						    	<?php endif ?>
		                    </ul>
						</div>
						<!-- MODULE Block contact infos -->
						<div class="clear hidden-lg hidden-md hidden-sm"></div>
						<div id="block_contact_infos" class="col-xs-12 col-sm-3">
						        <?php if ($this->session->userdata['languages'] == 'vn'): ?>
						        	<h4>Liên hệ</h4>
					            <?php else: ?>
						        	<h4>Contact</h4>
					            <?php endif ?>
						        <div class="ps_line">
						            <hr>
						        </div>
						        <ul>
					            	<?php if (!empty($this->settings->get_param('companyAddress'))): ?>
			                        	<li>
			                    			<a href="<?php echo base_url('lien-he.html') ?>">
			                    				<i class="icon-map-marker"></i>
			                    				<?php echo $this->settings->get_param('companyAddress') ?>
			                    			</a>
			            				</li>
					            	<?php endif ?>
					            	<?php if (!empty($this->settings->get_param('companyCellPhone'))): ?>
			                            <li>
						            		<i class="icon-phone"></i>
						            		<a href="tel:<?php echo $this->settings->get_param('companyCellPhone') ?>"><span><?php echo $this->settings->get_param('companyCellPhone') ?></span></a>
						            	</li>
					            	<?php endif ?>
					            	<?php if (!empty($this->settings->get_param('companyPhone'))): ?>
						                <li>
						            		<i class="icon-home"></i>
						            		<span><?php echo $this->settings->get_param('companyPhone') ?></span>
						            	</li>
					            	<?php endif ?>
					            	<?php if (!empty($this->settings->get_param('companyEmail'))): ?>
					            		<li>
						            		<i class="icon-envelope-alt"></i>
						            		<span>
						            			<a href="mailto:<?php echo $this->settings->get_param('companyEmail') ?>"><?php echo $this->settings->get_param('companyEmail') ?>
						            			</a>
						            		</span>
						            	</li>
					            	<?php endif ?>
			                    </ul>
						</div>
						<!-- /MODULE Block contact infos -->
					</div>
				</footer>
			</div><!-- #footer -->
			<div style="background: #093a96;padding-top: 20px;padding-bottom: 23px !important;">
		        <div class="container">
		            <div class="row">
		                <!-- MODULE Block contact infos -->
						<div id="block_footer_link" class="col-md-12">
						    <div style="float: left">
						        &copy;&nbsp; <?php echo $this->settings->get_param('copyrightOnFooter') ?>    </div>
						    <div style="float: right">
							<ul>
						    </ul>
						    </div>
						</div>
						<!-- /MODULE Block contact infos -->
		            </div>
		        </div>
		    </div>
		</div>
	</body>

</html>