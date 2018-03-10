	<!-- load tag head -->
	<?php $this->load->view('layouts/head'); ?>
	<!-- load content page -->
	<body>
		<div id="page">
			<div class="header-container">
                <header id="header" style="padding-bottom: 0">
					<div class="nav">
						<div class="container">
							<div class="row">
								<nav>
									<div id="contact-link">
										<a href="contact-us.html" title="Contact Us">contact us</a>
									</div>
									<span class="shop-phone">
										<i class="icon-phone"></i>Call us now: <strong>0938018130</strong>
									</span>
								</nav>
							</div>
						</div>
					</div>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div id="header_logo">
                                    <a href="../index.html" title="Nhựa Nam Việt">
                                            <img class="logo img-responsive" src="http://namvietplastic.com/img/-1504147294.jpg" alt="Nhựa Nam Việt" width="4057" height="1096"/>
                                    </a>
                                </div>
                                <div class="ps_header_right">
									<!-- MODULE Block cart -->
									<div class="ps_cart ">
										<div class="shopping_cart">
											<a href="order.html" title="View my shopping cart" rel="nofollow">
												<b>Giỏ hàng:</b>
												<span class="ajax_cart_quantity unvisible">0</span>
												<span class="ajax_cart_product_txt unvisible">Sản phẩm</span>
												<span class="ajax_cart_product_txt_s unvisible">Sản phẩm</span>
												<span class="ajax_cart_total unvisible"></span>
												<span class="ajax_cart_no_product">(trống)</span>
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
									<div class="header_user_info">
										<a class="login" href="loginfd9a.html" rel="nofollow" title="Log in to your customer account">Đăng nhập</a>
									</div>
								<!-- /Block usmodule NAV -->
                                </div>
                                <div id="search_block_top" class="clearfix">
									<form id="searchbox" method="get" action="http://namvietplastic.com/vn/search" >
										<input type="hidden" name="controller" value="search" />
										<input type="hidden" name="orderby" value="position" />
										<input type="hidden" name="orderway" value="desc" />
										<input class="search_query form-control" type="text" id="search_query_top" name="search_query" placeholder="Tìm kiếm" value="" />
										<button type="submit" name="submit_search" class="btn btn-default button-search">
											<img src="http://namvietplastic.com/img/icon-search.png"/>
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
								            <i class="icon-align-justify"></i>
						                </div>
										<ul class="sf-menu clearfix menu-content">
											<li><a href="index.html" title="Trang chủ">Trang chủ</a>
												<ul>
													<li>
														<a href="3-san-pham-tam-nhua-polycarbonate.html" title="Sản phẩm">Sản phẩm</a>
														<ul>
															<li>
																<a href="12-tam-lop-lay-sang-polycarbonate.html" title="Tấm lấy sáng Polycarbonate">Tấm lấy sáng Polycarbonate</a><ul>
																	<li>
																		<a href="18-tam-lop-lay-sang-polycarbonate-dac-ruot.html" title="Tấm lợp lấy sáng Polycarbonate đặc ruột">Tấm lợp lấy sáng Polycarbonate đặc ruột</a>
																	</li>
																	<li>
																		<a href="19-tam-lay-sang-polycarbonate-rong.html" title="Tấm lấy sáng Polycarbonate rỗng">Tấm lấy sáng Polycarbonate rỗng</a>
																	</li>
																</ul>
															</li>
															<li>
																<a href="14-ton-nhua-lay-sang-polycarbonate-nicelight.html" title="Tôn nhựa lấy sáng Polycarbonate">Tôn nhựa lấy sáng Polycarbonate</a>
															</li>
															<li>
																<a href="13-mai-che-lay-sang.html" title="Mái che lấy sáng">Mái che lấy sáng</a>
															</li>
															<li>
																<a href="17-Polycarbonate-dinh-hinh-lay-sang.html" title="Sản phẩm PC định hình">Sản phẩm PC định hình</a>
															</li>
															<li>
																<a href="15-phu-kien-nep-nhua-PC.html" title="Phụ kiện">Phụ kiện</a>
															</li>
															<li>
																<a href="16-huong-dan-lap-dat-mai-che-lay-sang.html" title="Dịch vụ tư vấn & lắp đặt">Dịch vụ tư vấn & lắp đặt</a>
															</li>
															<li id="category-thumbnail"></li>
														</ul>
													</li>
												</ul>
											</li>
											<li>
												<a href="content/category/2-gioi-thieu.html" title="Giới thiệu">Giới thiệu</a>
												<ul>
													<li >
														<a href="content/38-gioi-thieu-cong-ty-tnhh-tm-dv-sx-nhua-nam-viet.html">Giới Thiệu</a>
													</li>
													<li >
														<a href="content/41-quan-he-hop-tac.html">Quan Hệ Hợp Tác</a>
													</li>
												</ul>
											</li>
											<li>
												<a href="3-san-pham-tam-nhua-polycarbonate.html" title="Sản phẩm">Sản phẩm</a>
												<ul>
													<li>
														<a href="12-tam-lop-lay-sang-polycarbonate.html" title="Tấm lấy sáng Polycarbonate">Tấm lấy sáng Polycarbonate</a>
														<ul>
															<li>
																<a href="18-tam-lop-lay-sang-polycarbonate-dac-ruot.html" title="Tấm lợp lấy sáng Polycarbonate đặc ruột">Tấm lợp lấy sáng Polycarbonate đặc ruột</a>
															</li>
															<li>
																<a href="19-tam-lay-sang-polycarbonate-rong.html" title="Tấm lấy sáng Polycarbonate rỗng">Tấm lấy sáng Polycarbonate rỗng</a>
															</li>
														</ul>
													</li>
													<li>
														<a href="14-ton-nhua-lay-sang-polycarbonate-nicelight.html" title="Tôn nhựa lấy sáng Polycarbonate">Tôn nhựa lấy sáng Polycarbonate</a>
													</li>
													<li>
														<a href="13-mai-che-lay-sang.html" title="Mái che lấy sáng">Mái che lấy sáng</a>
													</li>
													<li>
														<a href="17-Polycarbonate-dinh-hinh-lay-sang.html" title="Sản phẩm PC định hình">Sản phẩm PC định hình</a>
													</li>
													<li>
														<a href="15-phu-kien-nep-nhua-PC.html" title="Phụ kiện">Phụ kiện</a>
													</li>
													<li>
														<a href="16-huong-dan-lap-dat-mai-che-lay-sang.html" title="Dịch vụ tư vấn & lắp đặt">Dịch vụ tư vấn & lắp đặt</a>
													</li>
													<li id="category-thumbnail"></li>
												</ul>
											</li>
											<li>
												<a href="content/category/9-catalogue-polycarbonate.html" title="Catalogue">Catalogue</a>
												<ul>
													<li >
														<a href="content/47-gioi-thieu-tam-lop-lay-sang-dac-ruot-nicelight.html">Tấm lấy sáng Polycarbonate đặc ruột NiceLight</a>
													</li>
													<li >
														<a href="content/49-ton-nhua-lay-sang-polycarbonate.html">Tôn nhựa lấy sáng Polycarbonate</a>
													</li>
													<li >
														<a href="content/48-mai-che-canofix-han-quoc.html">Mái che Canofix</a>
													</li>
													<li >
														<a href="content/50-polycarbonate-dinh-hinh.html">Tấm lấy sáng định hình</a>
													</li>
													<li >
														<a href="content/54-bang-mau-polycarbonate.html">Bảng màu sản phẩm</a>
													</li>
												</ul>
											</li>
											<li>
												<a href="content/category/10-chinh-sach-khach-hang.html" title="Chính sách khách hàng">Chính sách khách hàng</a>
												<ul>
													<li>
														<a href="content/8-huong-dan-lap-dat-tam-tam-lay-sang-polycarbonate.html">Hướng Dẫn Lắp Đặt</a>
													</li>
													<li >
														<a href="content/12-huong-dan-mua-hang.html">Hướng dẫn mua hàng</a>
													</li>
													<li >
														<a href="content/10-chinh-sach-bao-hanh-namvietplastic.html">Chính sách bảo hành</a>
													</li>
													<li >
														<a href="content/14-huong-dan-bao-quan-san-pham.html">Hướng dẫn bảo quản sản phẩm</a>
													</li>
												</ul>
											</li>
											<li><a href="news.html" title="Tin tức">Tin tức</a></li>
											<li>
												<a href="content/category/8-tuyen-dung.html" title="Tuyển dụng">Tuyển dụng</a>
												<ul>
													<li >
														<a href="content/2-tuyen-dung-ke-toan-thue.html">Tuyển dụng tháng Nhân viên Kế toán-Thuế</a>
													</li>
													<li >
														<a href="content/3-tuyen-dung-nv-marketing.html">Tuyển dụng chuyên viên Nghiên cứu & Phát triển thị trường</a>
													</li>
													<li >
														<a href="content/52-tuyen-dung-nhan-vien-thu-kho-quan-ly-kho.html">Tuyển dụng Nhân viên Thủ Kho - Quản Lý Kho
														</a>
													</li>
													<li >
														<a href="content/53-tuyen-dung-nhan-vien-ke-toan-kho.html">Tuyển dụng Nhân viên Kế Toán Kho</a>
													</li>
												</ul>
											</li>
											<li><a href="content/45-lien-he.html" title="Li&ecirc;n hệ">Li&ecirc;n hệ</a></li>
											<li class="sf-search noBack" style="float:right">
												<form id="searchbox" action="http://namvietplastic.com/vn/search" method="get">
													<p>
														<input type="hidden" name="controller" value="search" />
														<input type="hidden" value="position" name="orderby"/>
														<input type="hidden" value="desc" name="orderway"/>
														<input type="text" name="search_query" value="" />
													</p>
												</form>
											</li>
										</ul>
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
											<li >
												<a href="../en/index.html" title="English (English)">
													<img src="http://namvietplastic.com/img/vn-lang.jpg" />
												</a>
											</li>
											<li class="selected">
								                <img src="http://namvietplastic.com/img/us-lang.jpg" />
								            </li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</header>
			</div>
			<div id="top_column"><!-- Module HomeSlider -->
		        <div id="homepage-slider" class="flexslider">
					<ul class="slides" id="homeslider" style="max-height:500px;">
						<li class="homeslider-container">
							<a href="14-ton-nhua-lay-sang-polycarbonate-nicelight.html" title="NONE">
								<img src="http://namvietplastic.com/modules/homeslider/images/82ce063072dd8e7bc1d7542f00a9be78bb563f93_tam-lay-sang-nhua-nam-viet.jpg" width="1900" height="500" alt="NONE" />
							</a>
		        			<div class="homeslider-title">TÔN NHỰA LẤY SÁNG</div>
		                </li>
						<li class="homeslider-container">
							<a href="3-san-pham-tam-nhua-polycarbonate.html" title=" ">
								<img src="http://namvietplastic.com/modules/homeslider/images/82ce063072dd8e7bc1d7542f00a9be78bb563f93_tam-lay-sang-nhua-nam-viet.jpg" width="1900" height="500" alt=" " />
							</a>
		                </li>
						<li class="homeslider-container">
							<a href="3-san-pham-tam-nhua-polycarbonate.html" title="Mái che lấy sáng Poly">
								<img src="http://namvietplastic.com/modules/homeslider/images/82ce063072dd8e7bc1d7542f00a9be78bb563f93_tam-lay-sang-nhua-nam-viet.jpg" width="1900" width="1920" height="497" alt="M&aacute;i che l&#7845;y s&aacute;ng Poly" />
							</a>
		                    <div class="homeslider-title">Tấm sáng polycarbonate nice light</div>
		                    <div class="homeslider-description">
		                        <div class="btn btn-default ps_button" style="background: red;">
									<div style="float: left;">
										<a href="3-san-pham-tam-nhua-polycarbonate.html">ĐẶT H&Agrave;NG ONLINE&nbsp;</a>
									</div>
									<div style="float: left;">
										<a href="3-san-pham-tam-nhua-polycarbonate.html">
											<img src="http://namvietplastic.com/img/cms/arrow-button.png" alt="http://namvietplastic.com/vn/3-sn-phm" width="22" height="8" />
										</a>
									</div>
								</div>
		                    </div>
						</li>
					</ul>
				</div>
			<!-- /Module HomeSlider -->
			</div>

			<div id="SanPham" style="clear: both">
		        <div class="row">
		            <div class="col-md-12 ps_block_title">Sản phẩm</div>
		        </div>
		        <div class="container">
		            <div class="row">  
		                <div id="htmlcontent_SanPham">
							<ul class="htmlcontent-home clearfix">
			                    <li class="htmlcontent-item-1 col-xs-4" style="text-align: center">
									<a href="12-tam-lop-lay-sang-polycarbonate.html" class="item-link" onclick="return !window.open(this.href);" title="T&#7844;M L&#7906;P L&#7844;Y S&Aacute;NG POLYCARBONATE">
										<h3 class="item-title">T&#7844;M L&#7906;P L&#7844;Y S&Aacute;NG POLYCARBONATE</h3>
										<img src="http://namvietplastic.com/modules/themeconfigurator/img/fcb6e44a4ce8ace34b292315c89905f8a21536bf_icon-tamlaysangpng" class="item-img img-responsive" title="T&#7844;M L&#7906;P L&#7844;Y S&Aacute;NG POLYCARBONATE" alt="T&#7844;M L&#7906;P L&#7844;Y S&Aacute;NG POLYCARBONATE" width="auto" height="auto" style="display: inline-block"/>
									</a>
									<div class="item-html">Tấm nhựa Polycarbonate được sử dụng làm tấm lợp lấy sáng cho các công trình xây dựng... Sản xuất từ nhựa nguyên sinh của Bayer (Đức), có lớp phủ chống tia UV</div>
								</li>
				                <li class="htmlcontent-item-2 col-xs-4" style="text-align: center">
									<a href="33-ton-nhua-lay-sang-polycarbonate-nicelight.html" class="item-link" onclick="return !window.open(this.href);" title="T&Ocirc;N NH&#7920;A L&#7844;Y S&Aacute;NG">
									<h3 class="item-title">T&Ocirc;N NH&#7920;A L&#7844;Y S&Aacute;NG</h3>
									<img src="http://namvietplastic.com/modules/themeconfigurator/img/2a7ba687f5ae113fe623e04cc8f084702d90df34_" class="item-img img-responsive" title="T&Ocirc;N NH&#7920;A L&#7844;Y S&Aacute;NG" alt="T&Ocirc;N NH&#7920;A L&#7844;Y S&Aacute;NG" width="auto" height="auto" style="display: inline-block"/>
									</a>
									<div class="item-html">Tôn nhựa lấy sáng Polycarbonate Nicelight được định hình thành dạng nhiều dạng sóng khác nhau, tương thích với tất cả các loại tôn kẽm trên thị trường.</div>
								</li>
				                <li class="htmlcontent-item-3 col-xs-4" style="text-align: center">
									<a href="13-mai-che-lay-sang.html" class="item-link" onclick="return !window.open(this.href);" title="M&Aacute;I CHE CANOFIX">
										<h3 class="item-title">M&Aacute;I CHE CANOFIX</h3>
										<img src="http://namvietplastic.com/modules/themeconfigurator/img/2a7ba687f5ae113fe623e04cc8f084702d90df34_" title="M&Aacute;I CHE CANOFIX" alt="M&Aacute;I CHE CANOFIX" width="auto" height="auto" style="display: inline-block"/>
									</a>
									<div class="item-html">Mái che lấy sáng Canofix nhập khẩu từ Hàn Quốc, kiểu dáng sang trọng, tinh tế, nhiều màu sắc để lựa chọn. Dễ dàng thi công và lắp đặt cho mọi công trình</div>
								</li>
			                    <li class="htmlcontent-item-4 col-xs-4" style="text-align: center">
									<a href="15-phu-kien-nep-nhua-PC.html" class="item-link" onclick="return !window.open(this.href);" title="PH&#7908; KI&#7878;N">
										<h3 class="item-title">PH&#7908; KI&#7878;N</h3>
		                                <img src="http://namvietplastic.com/modules/themeconfigurator/img/2a7ba687f5ae113fe623e04cc8f084702d90df34_" title="PH&#7908; KI&#7878;N" alt="PH&#7908; KI&#7878;N" width="auto" height="auto" style="display: inline-block"/>
									</a>
									<div class="item-html">Cung cấp đa dạng phụ kiện khác nhau như nẹp nhựa chữ H, U, khung mái che Canofix trợ giúp cho việc lắp đặt, bảo trì, bảo dưỡng tấm lấy sáng Polycarbonate</div>
								</li>
			                    <li class="htmlcontent-item-5 col-xs-4" style="text-align: center">
									<a href="17-Polycarbonate-dinh-hinh-lay-sang.html" class="item-link" onclick="return !window.open(this.href);" title="S&#7842;N PH&#7848;M PC &#272;&#7882;NH H&Igrave;NH">
										<h3 class="item-title">S&#7842;N PH&#7848;M PC &#272;&#7882;NH H&Igrave;NH</h3>
		                                <img src="http://namvietplastic.com/modules/themeconfigurator/img/2a7ba687f5ae113fe623e04cc8f084702d90df34_" title="S&#7842;N PH&#7848;M PC &#272;&#7882;NH H&Igrave;NH" alt="S&#7842;N PH&#7848;M PC &#272;&#7882;NH H&Igrave;NH" width="auto" height="auto" style="display: inline-block"/>
									</a>
									<div class="item-html">
									Đây là dạng tấm nhựa Polycarbonate được định hình thành khối 3D (khối kim tự tháp, khối bán cầu,…), sử dụng phổ biến trong các công trình mái lấy sáng, giếng trời
									</div>
								</li>
			                    <li class="htmlcontent-item-6 col-xs-4" style="text-align: center">
									<a href="16-huong-dan-lap-dat-mai-che-lay-sang.html" class="item-link" onclick="return !window.open(this.href);" title="D&#7882;CH V&#7908; T&#431; V&#7844;N &amp; L&#7854;P &#272;&#7862;T">
										<h3 class="item-title">D&#7882;CH V&#7908; T&#431; V&#7844;N &amp; L&#7854;P &#272;&#7862;T</h3>
		                                    <img src="http://namvietplastic.com/modules/themeconfigurator/img/2a7ba687f5ae113fe623e04cc8f084702d90df34_" title="D&#7882;CH V&#7908; T&#431; V&#7844;N &amp; L&#7854;P &#272;&#7862;T" alt="D&#7882;CH V&#7908; T&#431; V&#7844;N &amp; L&#7854;P &#272;&#7862;T" width="auto" height="auto" style="display: inline-block"/>
									</a>
									<div class="item-html">
									Công ty chúng tôi nhận tư vấn, thi công các công trình lắp đặt mái che lấy sáng sử dụng tấm polycarbonate trong các công trình công nghiệp và dân dụng
									</div>
								</li>
							</ul>
						</div>
		            </div>
		        </div>
		    </div>
		    <div id="CongTrinh" style="background: #bcbcbc;padding-bottom: 50px">
		        <div class="container">
		            <div class="row">
		                <div class="col-md-12 ps_block_title">
		                    CÁC CÔNG TRÌNH GẦN ĐÂY
		                </div>
		            </div>
		            <div class="row">  
		                <div id="htmlcontent_CongTrinh" class=" col-md-12">
		        			<ul class="htmlcontent-congtrinh clearfix" id="htmlcontent-congtrinh">
		                    <style>
			                    #myModal_contrinh_0 > div > div > div.modal-body > div > p > a{
			                        color: #093a95;
			                    }   
			                    #myModal_contrinh_0 > div > div > div.modal-body > div > p > a:hover{
			                        color: #000;
			                    }   
			                </style>
		                		<li class="htmlcontent-item-1">
		                            <img src="http://namvietplastic.com/modules/themeconfigurator/img/6f7c12e32e97d6f157a8884d5b861a6508a770e1_" data-toggle="modal" data-target="#myModal_contrinh_0" class="item-img img-responsive ct-image" title="M&aacute;i che b&#7879;nh vi&#7879;n &#273;a khoa &#272;&#7891;ng Nai" alt="M&aacute;i che b&#7879;nh vi&#7879;n &#273;a khoa &#272;&#7891;ng Nai"/>
		                            <h3 class="item-title">M&aacute;i che b&#7879;nh vi&#7879;n &#273;a khoa &#272;&#7891;ng Nai</h3>
		                        	<div class="modal fade" id="myModal_contrinh_0" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				                        <div class="modal-dialog">
				                            <div class="modal-content">
				                                <div class="modal-header">
				                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				                                    	<span aria-hidden="true">&times;</span>
				                                    </button>
				                                    <h4 class="modal-title" id="myModalLabel">
				                                    	<a href="content/22-tam-lay-sang-hinh-chop-tu-giac.html" class="item-link" onclick="return ! window.open(this.href);" title="M&aacute;i che b&#7879;nh vi&#7879;n &#273;a khoa &#272;&#7891;ng Nai"></a>
			                                        </h4>
			                                    </div>
			                                	<div class="modal-body">
			                                        <a href="content/22-tam-lay-sang-hinh-chop-tu-giac.html" class="item-link" onclick="return ! window.open(this.href);" title="M&aacute;i che b&#7879;nh vi&#7879;n &#273;a khoa &#272;&#7891;ng Nai">
				                                    <div class="item-html">
				                                        Công trình sử dụng sản phẩm tấm lấy sáng định hình kim tự tháp để làm mái che. Sản phẩm được đúc nguyên khối hình chóp tứ giác đều, mang lại sự tinh tế và hiện đại.
														<p><a href="content/22-tam-lay-sang-hinh-chop-tu-giac.html">Xem chi tiết</a></p>
			                                    	</div>
			                        			</div>
				                                <div class="modal-footer">
				                                	<button type="button" class="btn btn-default" data-dismiss="modal">Close
				                                	</button>
				                                </div>
				                            </div>
				                        </div>
				                    </div>
			                	</li>
			                    <style>
				                    #myModal_contrinh_1 > div > div > div.modal-body > div > p > a{
				                        color: #093a95;
				                    }   
				                    #myModal_contrinh_1 > div > div > div.modal-body > div > p > a:hover{
				                        color: #000;
				                    }   
				                </style>
			                	<li class="htmlcontent-item-2">
			                        <img src="http://namvietplastic.com/modules/themeconfigurator/img/6f7c12e32e97d6f157a8884d5b861a6508a770e1_" data-toggle="modal" data-target="#myModal_contrinh_1" class="item-img img-responsive ct-image" title="Nh&agrave; m&aacute;y &#273;&oacute;ng t&agrave;u Hyundai-Vinashin Kh&aacute;nh H&ograve;a" alt="Nh&agrave; m&aacute;y &#273;&oacute;ng t&agrave;u Hyundai-Vinashin Kh&aacute;nh H&ograve;a"/>
			                        <h3 class="item-title">Nh&agrave; m&aacute;y &#273;&oacute;ng t&agrave;u Hyundai-Vinashin Kh&aacute;nh H&ograve;a</h3>
			                        <div class="modal fade" id="myModal_contrinh_1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				                        <div class="modal-dialog">
				                            <div class="modal-content">
				                                <div class="modal-header">
				                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				                                    <h4 class="modal-title" id="myModalLabel">
				                                        <a href="content/56-ton-nhua-lay-sang-mai-ton-vach-polycarbonate.html" class="item-link" onclick="return ! window.open(this.href);" title="Nh&agrave; m&aacute;y &#273;&oacute;ng t&agrave;u Hyundai-Vinashin Kh&aacute;nh H&ograve;a">
				                                        </a>
				                                    </h4>
				                                </div>
				                                <div class="modal-body">
				                                    <a href="content/56-ton-nhua-lay-sang-mai-ton-vach-polycarbonate.html" class="item-link" onclick="return ! window.open(this.href);" title="Nh&agrave; m&aacute;y &#273;&oacute;ng t&agrave;u Hyundai-Vinashin Kh&aacute;nh H&ograve;a">
					                                <div class="item-html">
										                Công trình sử dụng Tôn nhựa lấy sáng Polycarbonate trong suốt để lấy sáng trên mái và vách, nhờ đó tiết kiệm đáng kể chi phí nặng lượng từ việc chiếu sáng.
														<p><a href="content/56-ton-nhua-lay-sang-mai-ton-vach-polycarbonate.html">Xem chi tiết</a></p>
										            </div>
									            </div>
							                    <div class="modal-footer">
							                        <button type="button" class="btn btn-default" data-dismiss="modal">Close
							                        </button>
							                    </div>
							                </div>
							            </div>
							        </div>
							    </li>
							    <style>
							        #myModal_contrinh_2 > div > div > div.modal-body > div > p > a{
							            color: #093a95;
							        }   
							        #myModal_contrinh_2 > div > div > div.modal-body > div > p > a:hover{
							            color: #000;
							        }   
							    </style>
				                <li class="htmlcontent-item-3">
				                    <img src="http://namvietplastic.com/modules/themeconfigurator/img/6f7c12e32e97d6f157a8884d5b861a6508a770e1_" data-toggle="modal" data-target="#myModal_contrinh_2" class="item-img img-responsive ct-image" title="L&#7845;y s&aacute;ng nh&agrave; m&aacute;y Th&eacute;p Kh&ocirc;ng G&#7881; Long An" alt="L&#7845;y s&aacute;ng nh&agrave; m&aacute;y Th&eacute;p Kh&ocirc;ng G&#7881; Long An"/>
				                    <h3 class="item-title">L&#7845;y s&aacute;ng nh&agrave; m&aacute;y Th&eacute;p Kh&ocirc;ng G&#7881; Long An</h3>
				                    <div class="modal fade" id="myModal_contrinh_2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				                        <div class="modal-dialog">
				                            <div class="modal-content">
				                                <div class="modal-header">
				                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				                                    <h4 class="modal-title" id="myModalLabel">
					                                    <a href="content/57-ton-lay-sang-mai-nha-may.html" class="item-link" onclick="return ! window.open(this.href);" title="L&#7845;y s&aacute;ng nh&agrave; m&aacute;y Th&eacute;p Kh&ocirc;ng G&#7881; Long An">
					                                    </a>
				                                    </h4>
				                                   </div>
				                                <div class="modal-body">
				                                    <a href="content/57-ton-lay-sang-mai-nha-may.html" class="item-link" onclick="return !window.open(this.href);" title="L&#7845;y s&aacute;ng nh&agrave; m&aacute;y Th&eacute;p Kh&ocirc;ng G&#7881; Long An">
				                                    <div class="item-html">
				                                        Tôn nhựa lấy sáng được sử dụng tại nhà máy Thép Không Gỉ Long An
														<p><a href="content/57-ton-lay-sang-mai-nha-may.html">Xem chi tiết</a></p>
				                                    </div>
				                                </div>
				                                <div class="modal-footer">
				                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				                                </div>
				                            </div>
				                        </div>
				                    </div>
				                </li>
				            </ul>
						</div>

		            </div>
		        </div>
		    </div>
		    <div id="SoLuoc">
		        <div class="container">
		            <div class="row">  
		                <div id="htmlcontent_SoLuoc" class="col-md-12" style="text-align: center">
		        			<ul class="htmlcontent-home clearfix" >
		                        <li class="htmlcontent-item-1">
		                        	<a href="content/38-gioi-thieu-cong-ty-tnhh-tm-dv-sx-nhua-nam-viet.html" class="item-link" onclick="return ! window.open(this.href);" title="S&#416; L&#431;&#7906;C V&#7872; C&Ocirc;NG TY">
		                            	<div class="ps_block_title">S&#416; L&#431;&#7906;C V&#7872; C&Ocirc;NG TY</div>
		                        	</a>
		                            <div class="item-html"> Công ty TNHH TM - DV - SX Nhựa Nam Việt là nhà sản xuất và phân phối các sản phẩm từ nhựa Polycarbonate như: Tôn nhựa lấy sáng Polycarbonate - Tấm lợp lấy sáng Polycarbonate - Tấm lợp định hình... tiêu chuẩn quốc tế hàng đầu Việt Nam. Được thành lập năm 2011 với tư cách pháp nhân là Công ty TNHH TM - DV - SX Nhựa Nam Việt, có trụ sở làm việc tại 362 Điện Biên Phủ, phường 17, quận Bình Thạnh, TP. Hồ Chí Minh.
									</div>
		                        </li>
		                    </ul>
		    			</div>
		            </div>
		        </div>
		    </div>
		    <div id="KhachHang" style="background: #bcbcbc;padding-bottom: 50px">
		        <div class="container">
		            <div class="row">
		                <div class="col-md-12 ps_block_title">KHÁCH HÀNG CỦA CHÚNG TÔI</div>
		            </div>
		            <div class="row">  
		                <div id="htmlcontent_KhachHang" class="col-md-12">
		        			<ul class="htmlcontent-khachhang clearfix" id="htmlcontent-khachhang" style="text-align: center">
		                        <li class="htmlcontent-item-1" style="display: inline-block">
		                            <a href="3-san-pham-tam-nhua-polycarbonate.html" class="item-link" onclick="return ! window.open(this.href);" title="CLIENT 1">
		                                <img src="http://namvietplastic.com/modules/themeconfigurator/img/d30d9e0b3453a750788aa40d269465c74712a6ac_" class="item-img" title="CLIENT 1" alt="CLIENT 1"/>
		                            </a>
		                        </li>
		                        <li class="htmlcontent-item-2" style="display: inline-block">
		                            <a href="3-san-pham-tam-nhua-polycarbonate.html" class="item-link" onclick="return ! window.open(this.href);" title="CLIENT 2">
		                                <img src="http://namvietplastic.com/modules/themeconfigurator/img/d30d9e0b3453a750788aa40d269465c74712a6ac_" class="item-img" title="CLIENT 2" alt="CLIENT 2"/>
		                            </a>
		                        </li>
		                        <li class="htmlcontent-item-3" style="display: inline-block">
		                            <a href="3-san-pham-tam-nhua-polycarbonate.html" class="item-link" onclick="return ! window.open(this.href);" title="CLIENT 3">
		                            	<img src="http://namvietplastic.com/modules/themeconfigurator/img/d30d9e0b3453a750788aa40d269465c74712a6ac_" class="item-img" title="CLIENT 3" alt="CLIENT 3"/>
		                            </a>
		                    	</li>
		                        <li class="htmlcontent-item-4" style="display: inline-block">
		                            <a href="3-san-pham-tam-nhua-polycarbonate.html" class="item-link" onclick="return ! window.open(this.href);" title="CLIENT 4">
		                                <img src="http://namvietplastic.com/modules/themeconfigurator/img/d30d9e0b3453a750788aa40d269465c74712a6ac_" class="item-img" title="CLIENT 4" alt="CLIENT 4"/>
		                            </a>
		                        </li>
		                        <li class="htmlcontent-item-5" style="display: inline-block">
		                            <a href="3-san-pham-tam-nhua-polycarbonate.html" class="item-link" onclick="return ! window.open(this.href);" title="CLIENT 5">
		                                <img src="http://namvietplastic.com/modules/themeconfigurator/img/d30d9e0b3453a750788aa40d269465c74712a6ac_" class="item-img" title="CLIENT 5" alt="CLIENT 5"/>
		                            </a>
		                        </li>
		                    </ul>
		    			</div>
		            </div>
		        </div>
		    </div>
			<!-- Footer -->
			<div class="footer-container" >
		        <div class="ps_block_title">
		            C&Ocirc;NG TY TNHH TM DV SX NHỰA NAM VIỆT
		        </div>
				<footer id="footer"  class="container">
					<div class="row"><!-- MODULE Block new products -->
						<div class="col-xs-6 col-sm-3 ps_product_footer">
						    <div>
						        <h4>Sản phẩm</h4>
						        <div class="ps_line">
						            <hr>
						        </div>
						    </div>
							<div class="block_content">
			                    <ul class="product_images clearfix">
			                        <li>
			                            <a href="12-tam-lop-lay-sang-polycarbonate.html" title="">
			                                Tấm lấy sáng Polycarbonate
			                            </a>
			                        </li>
			                        <li>
			                            <a href="13-mai-che-lay-sang.html" title="">
			                                Mái che lấy sáng
			                            </a>
			                        </li>
			                        <li>
			                            <a href="14-ton-nhua-lay-sang-polycarbonate-nicelight.html" title="">
			                                Tôn nhựa lấy sáng Polycarbonate
			                            </a>
			                        </li>
			                        <li>
			                            <a href="15-phu-kien-nep-nhua-PC.html" title="">
			                                Phụ kiện
			                            </a>
			                        </li>
			                        <li>
			                            <a href="16-huong-dan-lap-dat-mai-che-lay-sang.html" title="">
			                                Dịch vụ tư vấn & lắp đặt
			                            </a>
			                        </li>
			                        <li>
			                            <a href="17-Polycarbonate-dinh-hinh-lay-sang.html" title="">
			                                Sản phẩm PC định hình
			                            </a>
			                        </li>
			                    </ul>
		            		</div>
						</div>
						<!-- /MODULE Block new products -->
						<!-- MODULE Block new products -->
						<div class="col-xs-6 col-sm-3 ps_social_bottom">
					        <h4>Các bài viết gần đây</h4>
					        <div class="ps_line">
					            <hr>
					        </div>
		    				<div class="block_content">
		                    	<ul class="product_images clearfix">
		                            <li style="float: none">
		                            	<a href="content/57-ton-lay-sang-mai-nha-may.html" title="Tôn nhựa lấy sáng mái - Thép không gỉ Long An">
		                                Tôn nhựa lấy sáng mái - Thép không gỉ Long An
		                            	</a>
		                        	</li>
		                        	<li style="float: none">
			                            <a href="content/56-ton-nhua-lay-sang-mai-ton-vach-polycarbonate.html" title="Tôn nhựa lấy sáng mái - Tôn vách polycarbonate">
			                                Tôn nhựa lấy sáng mái - Tôn vách polycarbonate
			                            </a>
			                        </li>
		                            <li style="float: none">
				                        <a href="content/54-bang-mau-polycarbonate.html" title="Bảng màu sản phẩm">
				                            Bảng màu sản phẩm
				                        </a>
				                    </li>
		                            <li style="float: none">
		                            	<a href="content/53-tuyen-dung-nhan-vien-ke-toan-kho.html" title="Tuyển dụng Nhân viên Kế Toán Kho">
			                                Tuyển dụng Nhân viên Kế Toán Kho
			                            </a>
			                        </li>
		                            <li style="float: none">
			                            <a href="content/52-tuyen-dung-nhan-vien-thu-kho-quan-ly-kho.html" title="Tuyển dụng Nhân viên Thủ Kho - Quản Lý Kho">
			                                Tuyển dụng Nhân viên Thủ Kho - Quản Lý Kho
			                            </a>
			                        </li>
		                        </ul>
		            		</div>
						</div>
						<!-- /MODULE Block new products -->
						<div class="col-xs-6 col-sm-3 ps_social_bottom">
						    <h4>Tham gia trên</h4>
						    <div class="ps_line">
						        <hr>
						    </div>
						    <ul>
			                    <li class="facebook">
					                <a target="_blank" href="http://www.facebook.com/Polycarbonate.Nicelight">
					                    <i class="icon-facebook"></i>
					                </a>
					            </li>
		                        <li class="youtube">
					                <a target="_blank"  href="http://www.youtube.com/namvietplastic">
					                    <i class="icon-youtube"></i>
					                </a>
					            </li>
		                    </ul>
						</div>
						<!-- MODULE Block contact infos -->
						<section id="block_contact_infos" class="col-xs-6 col-sm-3">
							<div>
						        <h4>Liên hệ</h4>
						        <div class="ps_line">
						            <hr>
						        </div>
						        <ul>
		                        	<li>
		                    			<a href="content/45-lien-he.html"><i class="icon-map-marker"></i>362 Điện Biên Phủ, phường 17, quận Bình Thạnh, TPHCM</a>
		            				</li>
		                            <li>
					            		<i class="icon-phone"></i>
					            		<a href="tel:0938018130"><span>0938018130</span></a>
					            	</li>
					                <li>
					            		<i class="icon-home"></i>
					            		<span>(028) 35125108</span>
					            	</li>
		                        	<li>
					            		<i class="icon-envelope-alt"></i>
					            		<span>
					            			<a href="&#109;&#97;&#105;&#108;&#116;&#111;&#58;%6c%69%65%6e%68%65@%6e%61%6d%76%69%65%74%70%6c%61%73%74%69%63.%63%6f%6d" >&#x6c;&#x69;&#x65;&#x6e;&#x68;&#x65;&#x40;&#x6e;&#x61;&#x6d;&#x76;&#x69;&#x65;&#x74;&#x70;&#x6c;&#x61;&#x73;&#x74;&#x69;&#x63;&#x2e;&#x63;&#x6f;&#x6d;
					            			</a>
					            		</span>
					            	</li>
			                    </ul>
						    </div>
						</section>
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
						        &copy;&nbsp;Copyright 2014 - 2018 www.namvietplastic.com    </div>
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