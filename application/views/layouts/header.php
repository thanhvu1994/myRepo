<div class="header-container">
    <header id="header" style="padding-bottom: 0">
		<div class="nav">
			<div class="container">
				<div class="row">
					<nav>
						<div id="contact-link">
							<a href="<?php echo base_url('lien-he.html') ?>" title="Contact Us">
							<?php if ($this->session->userdata['languages'] == 'vn'): ?>
								Liên hệ &nbsp
							<?php else: ?>
								&nbsp Contact us &nbsp
							<?php endif ?>
							</a>
								<?php if ($this->session->userdata['languages'] == 'vn'): ?>
								<i class="icon-phone"></i> Gọi ngay bây giờ: <strong><?php echo $this->settings->get_param('companyCellPhone') ?></strong>
							<?php else: ?>
								<i class="icon-phone"></i> Call us now: <strong><?php echo $this->settings->get_param('companyCellPhone') ?></strong>
							<?php endif ?>
						</div>
					</nav>
				</div>
			</div>
		</div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div id="header_logo">
                        <a href="<?php echo base_url()?>" title="<?php echo $this->settings->get_param('defaultPageTitle') ?>">
                            <img class="logo img-responsive" src="<?php echo $this->settings->get_logoFE() ?>" alt="<?php echo $this->settings->get_param('defaultPageTitle') ?>" width="250"/>
                        </a>
                    </div>
                    <div class="ps_header_right">
						<!-- MODULE Block cart -->
						<div class="ps_cart ">
							<div class="shopping_cart">
								<a href="<?php echo base_url('gio-hang.html')?>" title="View my shopping cart" rel="nofollow">
									<?php if (isset($this->session->userdata['languages']) && $this->session->userdata['languages'] == 'vn'): ?>
										<b>Giỏ hàng</b>
									<?php else: ?>
										<b>Shopping Cart</b>
									<?php endif ?>
<!--									<span class="ajax_cart_quantity unvisible">0</span>-->
<!--									<span class="ajax_cart_product_txt unvisible">Sản phẩm</span>-->
<!--									<span class="ajax_cart_no_product">(trống)</span>-->
								</a>
								<div class="cart_block block exclusive">
									<div class="block_content">
										<!-- block list of products -->
										<div class="cart_block_list">
											<p class="cart_block_no_products">Không có sản phẩm</p>
											<div class="cart-prices">
												<div class="cart-prices-line first-line">
													<span class="price cart_block_shipping_cost ajax_cart_shipping_cost">Miễn phí vận chuyển!</span>
													<span>Vận chuyển</span>
												</div>
												<span class="price cart_block_total ajax_block_cart_total">0,00 ₫</span>
												<span>Tổng cộng:</span>
											</div>
										</div>
										<p class="cart-buttons">
											<a id="button_order_cart" class="btn btn-default button button-small" href="order.html" title="Thanh toán" rel="nofollow">
												<span>Thanh toán<i class="icon-chevron-right right"></i></span>
											</a>
										</p>
									</div>
								</div>
							</div><!-- .cart_block -->
						</div>
						<div id="layer_cart">
							<div class="clearfix">
								<div class="layer_cart_product col-xs-12 col-md-6">
									<span class="cross" title="Close window"></span>
	                                <h1 class="page-heading" style="font-size: 14px">Product successfully added to your shopping cart
									</h1>
									<div class="product-image-container layer_cart_img">
									</div>
									<div class="layer_cart_product_info">
										<span id="layer_cart_product_title" class="product-name"></span>
										<span id="layer_cart_product_attributes"></span>
										<div>
											<strong class="dark">Số lượng</strong>
											<span id="layer_cart_product_quantity"></span>
										</div>
										<div>
											<strong class="dark">Tổng cộng:</strong>
											<span id="layer_cart_product_price"></span>
										</div>
									</div>
								</div>
								<div class="layer_cart_cart col-xs-12 col-md-6">
									<h2>
										<!-- Plural Case [both cases are needed because page may be updated in Javascript] -->
										<span class="ajax_cart_product_txt_s  unvisible">
											There are <span class="ajax_cart_quantity">0</span> items in your cart.
										</span>
										<!-- Singular Case [both cases are needed because page may be updated in Javascript] -->
										<span class="ajax_cart_product_txt ">
											There is 1 item in your cart.
										</span>
									</h2>
									<div class="layer_cart_row">
										<strong class="dark">Tổng cộng:(đã bao gồm thuế)</strong>
										<span class="ajax_block_products_total"></span>
									</div>
									<div class="layer_cart_row">
										<strong class="dark">Tổng vận chuyển&nbsp;(đã bao gồm thuế)</strong>
										<span class="ajax_cart_shipping_cost">Miễn phí vận chuyển!</span>
									</div>
									<div class="layer_cart_row">
										<strong class="dark">Tổng cộng:(đã bao gồm thuế)</strong>
										<span class="ajax_block_cart_total"></span>
									</div>
									<div class="button-container">	
										<span class="continue btn btn-default button exclusive-medium button-medium" title="Tiếp tục mua hàng">
											<span>Tiếp tục mua hàng</span>
										</span>
										<a class="btn btn-default button button-medium"	href="order.html" title="Proceed to checkout" rel="nofollow">
											<span>Proceed to checkout</span>
										</a>	
									</div>
								</div>
							</div>
							<div class="crossseling"></div>
						</div> <!-- #layer_cart -->
						<div class="layer_cart_overlay"></div>
						<!-- /MODULE Block cart -->
						<?php if (isset($this->session->userdata['logged_in_FE'])): ?>
							<div class="header_user_info">
								<a class="login" href="<?php echo base_url('tai-khoan.html') ?>" rel="nofollow" title="<?php echo $this->session->userdata['logged_in_FE']['full_name'] ?>"><?php echo $this->session->userdata['logged_in_FE']['full_name'] ?></a>
							</div>
							<div class="header_user_info">
								<a class="login" href="<?php echo base_url('dang-xuat.html') ?>" rel="nofollow" title="Log out">
									<?php if (isset($this->session->userdata['languages']) && $this->session->userdata['languages'] == 'vn'): ?>
										Đăng xuất
									<?php else: ?>
										Logout
									<?php endif ?>
								</a>
							</div>
						<?php else: ?>
							<div class="header_user_info">
								<a class="login" href="<?php echo base_url('dang-nhap.html') ?>" rel="nofollow" title="Login">
									<?php if ($this->session->userdata['languages'] == 'vn'): ?>
										Đăng nhập
									<?php else: ?>
										Login
									<?php endif ?>
								</a>
							</div>
						<?php endif ?>
					<!-- /Block usmodule NAV -->
                    </div>
                    <div id="search_block_top" class="clearfix">
						<form id="searchbox" method="get" action="<?php echo base_url('sites/search') ?>" >
							<input class="search_query form-control" type="text" id="search_query_top" name="key" placeholder="<?php echo ($this->session->userdata['languages'] == 'vn')? 'Tìm kiếm' : 'Search'; ?>" value="" />
							<button type="submit" class="btn btn-default button-search">
								<img src="<?php echo base_url('img/icon-search.png') ?>"/>
							</button>
						</form>
					</div>
                </div>
            </div>
        </div>
    </header>
</div>
<div class="header-container ps_menu_wrapper" >
    <header id="header" style="padding: 0;background: #093a95">
        <div class="container">
            <div class="row">
            	<div class="col-md-12">
    				<div class="clearfix ps_menu">
						<!-- Menu -->
						<div id="block_top_menu" class="sf-contener">
							<div class="cat-title">
								<span></span>
			                </div>
			                <?php
				                $menus = $this->categories->get_menuFE();
				                if (!empty($menus)) : ?>
									<ul class="sf-menu clearfix menu-content">
										<?php foreach ($menus as $menu): ?>
											<li><a href="<?php echo !empty($menu['url']) ? base_url($menu['url']) : 'javascript:void(0)' ?>" title="<?php echo $menu['name'] ?>"><?php echo $menu['name'] ?></a>
												<?php if (!empty($menu['child'])):
													echo '<ul>';
													foreach ($menu['child'] as $childs) :?>
															<li>
																<a href="<?php echo !empty($childs['url']) ? base_url($childs['url']) : 'javascript:void(0)' ?>" title="<?php echo $childs['name'] ?>"><?php echo $childs['name'] ?></a>
																<?php if (!empty($childs['child'])):
																	echo '<ul>';
																	foreach ($childs['child'] as $row) :?>
																		<li>
																			<a href="<?php echo !empty($row['url']) ? base_url($row['url']) : 'javascript:void(0)' ?>" title="<?php echo $row['name'] ?>"><?php echo $row['name'] ?></a>
																		</li>
																<?php endforeach;
																echo '</ul>';
																endif ?>
															</li>
												<?php endforeach;
												echo '</ul>';
												endif ?>
											</li>
										<?php endforeach ?>
									</ul>
							<?php endif; ?>
						</div>
						<!--/ Menu -->
						<script type="text/javascript">
						    $(document).ready(function(){
						    var offset = 250,
								$back_to_top = $('.ps_menu_wrapper');
							$(window).scroll(function(){
								( $(this).scrollTop() > offset ) ? $back_to_top.addClass('cd-is-visible') : $back_to_top.removeClass('cd-is-visible');
							});
						    });
						</script><!-- Block languages module -->
						<div id="languages-block-top" class="languages-block">
							<ul id="first-languages" class="languages-block_ul toogle_content">
								<li>
									<a class="change-languages" href="<?php echo base_url('sites/languages/vn')?>" title="Tiếng Việt (Vietnamese)">
										<img src="<?php echo base_url('img/vn-lang.jpg')?>" />
									</a>
								</li>
								<li>
									<a class="change-languages" href="<?php echo base_url('sites/languages/en')?>" title="English (English)">
					                	<img src="<?php echo base_url('img/us-lang.jpg')?>" />
				                	</a>
					            </li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
</div>

<script>
	$(document).ready(function() {
		$('.change-languages').click(function(e) {
			e.preventDefault();
			var url = $(this).attr('href');
			$.ajax({
                url: url,
                type: 'POST',
                success: function (returndata) {
                    location.replace(returndata);
                }
            });
		});
	});
</script>