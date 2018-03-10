<div class="columns-container" id="contact">
    <div id="columns" class="container" >
		<div id="slider_row" class="row"></div>
		<div class="row">
			<div id="center_column" class="center_column col-xs-12 col-sm-12">
				<h1 class="page-heading bottom-indent">Dịch vụ Khách hàng - contact us</h1>
				<form action="" method="post" class="contact-form-box" enctype="multipart/form-data">
    				<fieldset>
			            <div class="clearfix">
			                <div class="col-xs-12 col-md-12">
			                    <div class="form-group selector1">
			                        <label for="id_contact" class="page-subheading" style="float: left">Tiêu đề tin nhắn *</label>
			                        <?php if ($is_product): ?>
	                                    <select id="id_contact" class="form-control" name="Contact[type]" required>
	                            			<option value="">-- Chọn --</option>
	                                        <option value="1" >Báo giá</option>
	                                        <option value="2" >Đặt hàng</option>
	                                	</select>
			                        <?php else: ?>
										<select id="id_contact" class="form-control" name="Contact[type]" required>
	                            			<option value="">-- Chọn --</option>
	                                        <option value="1" >Báo giá</option>
	                                        <option value="2" >Đặt hàng</option>
	                                        <option value="3" >Hỗ trợ</option>
	                                	</select>
			                        <?php endif; ?>
                    			</div>
                    			<p id="desc_contact0" class="desc_contact">&nbsp;</p>
                                <p id="desc_contact2" class="desc_contact contact-title" style="display:none;">
                            		<i class="icon-comment-alt"></i>Báo giá
                        		</p>
                                <p id="desc_contact3" class="desc_contact contact-title" style="display:none;">
                            		<i class="icon-comment-alt"></i>Hỗ trợ
                    			</p>
                                <p id="desc_contact1" class="desc_contact contact-title" style="display:none;">
                            		<i class="icon-comment-alt"></i>Đặt hàng
                        		</p>
                                <h3 class="page-subheading">Thông tin khách hàng</h3>
			                    <p class="form-group">
			                        <label for="sender" style="float: left">Tên khách hàng*</label>
			                        <input class="form-control grey" type="text" id="sender" name="Contact[customer_name]" value="" required />
			                    </p>
                                <p class="form-group">
		                            <label for="company" style="float: left"> Tên công ty</label>
		                            <input class="form-control grey" type="text" id="company" name="Contact[company_name]" value="" />
		                        </p>
		                        <p class="form-group">
		                            <label for="tax-code" style="float: left"> Mã số thuế</label>
		                            <input class="form-control grey" type="text" id="tax-code" name="Contact[tax_code]" value="" />
		                        </p>
		                        <p class="form-group">
		                            <label for="address" style="float: left">Địa chỉ *</label>
		                            <input class="form-control grey" type="text" id="address" name="Contact[address]" value="" required/>
		                        </p>
		                        <p class="form-group">
		                            <label for="phone" style="float: left">Số điện thoại *</label>
		                            <input class="form-control grey" type="number" id="phone" name="Contact[phone]" value="" required/>
		                        </p>
		                        <p class="form-group">
		                            <label for="cell_phone" style="float: left">Điện thoại di động *</label>
		                            <input class="form-control grey" type="number" id="cell_phone" name="Contact[cell_phone]" value="" required/>
		                        </p>
                                <p class="form-group">
                    				<label for="email" style="float: left">Địa chỉ email *</label>
                                    <input class="form-control grey validate" type="text" id="email" name="Contact[email]" value="" required/>
                                    <span style="color: red;display: none" id="error-email">Email không hợp lệ</span>
                                </p>
			                	<?php if ($is_product): ?>
	                                <div class="form-group selector1">
	                            		<label style="float: left"> Mã sản phẩm</label>
	                                    <input class="form-control grey" type="text" name="id_order" id="id_order" value="" />
	                                </div>

	                                <table id="border-add" border="1">
						                <thead>
						                    <tr>
						                        <th> Màu sắc<i class=" icon-question-sign" />
						                        	<span class="ps_property iq-color"> Trắng sữa (White)<br>
														 Trắng trong (Clear)<br>
														 Nâu đồng (Bronze)<br>
														 Xanh dương (Blue)<br>
														 Xanh lá (Green)<br>
														 Xanh ngọc lam (Green Blue)
													</span>
												</th>
						                        <th>Độ dày <i class=" icon-question-sign" />
						                        	<span class="ps_property iq-thickness">1.6mm<br>
														2mm<br>
														3mm<br>
														4mm<br>
														5mm<br>
														6mm<br>
													</span>
												</th>
						                        <th>Chiều rộng / khổ <i class=" icon-question-sign" />
						                        	<span class="ps_property iq-width">1.22m<br>
														1.52m
													</span>
												</th>
						                        <th>Chiều dài <i class=" icon-question-sign" />
						                        	<span class="ps_property iq-length"></span>
						                        </th>
						                        <th>Số lượng <i class=" icon-question-sign" />
						                        	<span class="ps_property iq-number"></span>
						                        </th>
						                    </tr>
						                </thead>
						                <tbody>
						                    <tr>
						                        <td>
						                            <input class="form-control grey" type="text" name="ContactPro[][color]" placeholder=""/>
						                        </td>
						                        <td>
						                            <input class="form-control grey" type="text" name="ContactPro[][thickness]" placeholder=""/>
						                        </td>
						                        <td>
						                            <input class="form-control grey" type="text" name="ContactPro[][width]" placeholder=""/>
						                        </td>
						                        <td>
						                            <input class="form-control grey" type="text" name="ContactPro[][length]" placeholder=""/>
						                        </td>
						                        <td>
						                            <input class="form-control grey" type="text" name="ContactPro[][number]" placeholder=""/>
						                        </td>
						                    </tr>
						                </tbody>
						            </table>
						            <button type="button" id="add_row" class="btn btn-default button-small"><span> Thêm</span></button>
						            <h3 class="page-subheading">Lưu ý:</h3>
						            <p> Khách hàng có thể đặt hàng ngoài quy cách phổ thông (đặt hàng ngoại khổ) đối với số lượng sản phẩm có giá trị trên 20 triệu đồng.</p>
				                	<button type="button" class="btn btn-default button-small">
				                		<a style="color: white" href="content/19-chinh-sach-hang-ngoai-khod27a.html?content_only=1" class="iframe" rel="nofollow"> Chính sách đặt hàng ngoại khổ</a>
				                	</button>
						            <h3 class="page-subheading"> Thông tin thanh toán</h3>
						        	<p class="form-group">
						                <label>Hình thức thanh toán:</label>
						                <input class="form-control grey" type="radio" id="payment" name="payment" value="1" /> Tiền mặt
						                <input class="form-control grey" type="radio" id="payment" name="payment" value="0" /> Chuyển khoản
						            </p>
						            <h3 class="page-subheading">Thông tin giao hàng</h3>
						            <p class="form-group">
						                <label for="delivery_address" style="float: left">Địa điểm giao hàng *</label>
						                <input class="form-control grey" type="text" id="delivery_address" name="delivery_address" value="" />
						            </p>
						            <p class="form-group">
						                <label for="invoicer" style="float: left"> Họ tên người nhận hàng</label>
						                <input class="form-control grey" type="text" id="invoicer" name="invoicer" value="" />
						            </p>
						            <p class="form-group">
						                <label for="invoicer_phone" style="float: left">Điện thoại người nhận hàng * </label>
						                <input class="form-control grey" type="text" id="invoicer_phone" name="invoicer_phone" value="" />
						            </p>
						            <p class="form-group">
						                <label for="sale_employee" style="float: left">Nhân viên kinh doanh liên hệ (nếu có)</label>
						                <input class="form-control grey" type="text" id="sale_employee" name="sale_employee" value="" />
						            </p>
			                	<?php endif ?>
                                <p class="form-group">
		                            <label for="fileUpload"> Đính kèm tập tin</label>
		                            <input type="file" name="file" id="fileUpload" class="form-control" />
		                        </p>
                            </div>
			                <div class="col-xs-12 col-md-12">
			                    <div class="form-group">
			                        <label for="message">Ghi chú </label>
			                        <textarea class="form-control" id="message" name="Contact[comment]"></textarea>
			                    </div>
			                </div>
			                <?php if ($is_product): ?>
			                	<div class="col-xs-12 col-md-12">
				                    <div style="float: left"><input type="checkbox" name="cgv" id="cgv" value="0" checked="checked"></div>
				                    <div style="float: left"><a href="content/category/4-chinh-sach-khach-hang.html" target="_blank">Tôi đã đọc và chấp nhận các điều khoản và chính sách của công ty TNHH TM-DV-SX Nhựa Nam Việt.</a></div>
				                </div>
			                <?php endif ?>
    					</div>
			            <div class="submit col-xs-12 col-md-12">
			                <button type="submit" name="submitMessage" id="submitMessage" class="button btn btn-default button-medium"><span>Gởi</span>
			                </button>
			            </div>
    				</fieldset>
				</form>
			</div><!-- #center_column -->
		</div><!-- .row -->
	</div><!-- #columns -->
</div><!-- .columns-container -->

<script>
    $(document).ready(function () {
    	$('.contact-form-box').submit(function() {
    		if (!isEmail($('#email').val())) {
    			$('#error-email').show();
    			return false;
    		}
    		return true;
    	});

        $("#add_row").click(function () {
            var n = $("#center_column > form > fieldset > div.clearfix > div> table > tbody > tr").length + 1;
            $("#center_column > form > fieldset > div.clearfix > div > table > tbody").
                    append("<tr><td><input class='form-control grey' type='text' name='ContactPro[][color]'/></td><td><input class='form-control grey' type='text' name='ContactPro[][thickness]'/></td><td><input class='form-control grey' type='text' name='ContactPro[][width]'/></td><td><input class='form-control grey' type='text' name='ContactPro[][length]'/></td><td><input class='form-control grey' type='text' name='ContactPro[][number]'/></td></tr>");
        });
        if (!!$.prototype.fancybox)
            $("a.iframe").fancybox({
                'type': 'iframe',
                'width': 600,
                'height': 600
            });
    });

    function isEmail(email) {
	  	var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	  	return regex.test(email);
	}
</script>