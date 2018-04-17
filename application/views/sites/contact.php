<link rel="stylesheet" href="<?php echo base_url('themes/website/css/contact-form.css')?>" type="text/css" media="all" />

<style type="text/css">
	.notify{
	    border: 1px solid;
	    padding: 10px;
	    text-align: center;
	    background-color: #093a95;
	    color: #fff;
	}
</style>
<div class="columns-container" id="contact">
    <div id="columns" class="container" >
		<div id="slider_row" class="row"></div>
		<div class="row">
			<div id="center_column" class="center_column col-xs-12 col-sm-12">
				<h1 class="page-heading bottom-indent"><?php echo ($this->session->userdata['languages'] == 'vn')? 'Dịch vụ Khách hàng' : 'Contact Us'; ?></h1>
				<?php if (isset($status)): ?>
					<p class="notify"><?php echo isset($status) ? $status : '' ?></p>
				<?php endif ?>
				<form action="" method="post" class="contact-form-box" enctype="multipart/form-data">
    				<fieldset>
			            <div class="clearfix">
			                <div class="col-xs-12 col-md-12">
			                    <div class="form-group selector1">
			                        <label for="id_contact" class="page-subheading" style="float: left"><?php echo ($this->session->userdata['languages'] == 'vn')? 'Tiêu đề tin nhắn' : 'Message Title'; ?> *</label>
			                        <?php if ($is_product):
			                        	if ($type == 'dat-hang') :?>
		                                    <select id="id_contact" class="form-control" name="Contact[type]" required>
		                            			<option value=""><?php echo ($this->session->userdata['languages'] == 'vn')? '-- Chọn --' : '-- Select --'; ?></option>
		                                        <option value="1" selected><?php echo ($this->session->userdata['languages'] == 'vn')? 'Đặt hàng' : 'Order'; ?></option>
		                                	</select>
	                                	<?php else: ?>
											<select id="id_contact" class="form-control" name="Contact[type]" required>
		                            			<option value=""><?php echo ($this->session->userdata['languages'] == 'vn')? '-- Chọn --' : '-- Select --'; ?></option>
		                                        <option value="2" selected><?php echo ($this->session->userdata['languages'] == 'vn')? 'Báo giá' : 'Price'; ?></option>
		                                	</select>
	                                	<?php endif; ?>
			                        <?php else: ?>
										<select id="id_contact" class="form-control" name="Contact[type]" required>
	                            			<option value=""><?php echo ($this->session->userdata['languages'] == 'vn')? '-- Chọn --' : '-- Select --'; ?></option>
	                                        <option value="1" ><?php echo ($this->session->userdata['languages'] == 'vn')? 'Đặt hàng' : 'Order'; ?></option>
	                                        <option value="2" ><?php echo ($this->session->userdata['languages'] == 'vn')? 'Báo giá' : 'Price'; ?></option>
	                                        <option value="3" ><?php echo ($this->session->userdata['languages'] == 'vn')? 'Hỗ trợ' : 'Support'; ?></option>
	                                	</select>
			                        <?php endif; ?>
                    			</div>
                    			<p id="desc_contact0" class="desc_contact">&nbsp;</p>
                                <p id="desc_contact2" class="desc_contact contact-title" style="display:none;">
                            		<i class="icon-comment-alt"></i><?php echo ($this->session->userdata['languages'] == 'vn')? 'Báo giá' : 'Price'; ?>
                        		</p>
                                <p id="desc_contact3" class="desc_contact contact-title" style="display:none;">
                            		<i class="icon-comment-alt"></i><?php echo ($this->session->userdata['languages'] == 'vn')? 'Hỗ trợ' : 'Support'; ?>
                    			</p>
                                <p id="desc_contact1" class="desc_contact contact-title" style="display:none;">
                            		<i class="icon-comment-alt"></i><?php echo ($this->session->userdata['languages'] == 'vn')? 'Đặt hàng' : 'Order'; ?>
                        		</p>
                                <h3 class="page-subheading"><?php echo ($this->session->userdata['languages'] == 'vn')? 'Thông Tin Khách Hàng' : 'Customer Information'; ?></h3>
			                    <p class="form-group">
			                        <label for="sender" style="float: left"><?php echo ($this->session->userdata['languages'] == 'vn')? 'Tên Khách Hàng' : 'Customer Name'; ?> *</label>
			                        <input class="form-control grey" type="text" id="sender" name="Contact[customer_name]" value="" required />
			                    </p>
                                <p class="form-group">
		                            <label for="company" style="float: left"><?php echo ($this->session->userdata['languages'] == 'vn')? 'Tên Công Ty' : 'Company Name'; ?></label>
		                            <input class="form-control grey" type="text" id="company" name="Contact[company_name]" value="" />
		                        </p>
		                        <p class="form-group">
		                            <label for="tax-code" style="float: left"><?php echo ($this->session->userdata['languages'] == 'vn')? 'Mã Số Thuế' : 'Tax Code'; ?></label>
		                            <input class="form-control grey" type="text" id="tax-code" name="Contact[tax_code]" value="" />
		                        </p>
		                        <p class="form-group">
		                            <label for="address" style="float: left"><?php echo ($this->session->userdata['languages'] == 'vn')? 'Địa Chỉ' : 'Address'; ?> *</label>
		                            <input class="form-control grey" type="text" id="address" name="Contact[address]" value="" required/>
		                        </p>
		                        <p class="form-group">
		                            <label for="phone" style="float: left"><?php echo ($this->session->userdata['languages'] == 'vn')? 'Số Điện Thoại' : 'Phone Number'; ?> *</label>
		                            <input class="form-control grey" type="number" id="phone" name="Contact[phone]" value="" required/>
		                        </p>
		                        <p class="form-group">
		                            <label for="cell_phone" style="float: left"><?php echo ($this->session->userdata['languages'] == 'vn')? 'Điện Thoại Di Động' : 'Cellphone Number'; ?> *</label>
		                            <input class="form-control grey" type="number" id="cell_phone" name="Contact[cell_phone]" value="" required/>
		                        </p>
                                <p class="form-group">
                    				<label for="email" style="float: left"><?php echo ($this->session->userdata['languages'] == 'vn')? 'Địa Chỉ Email' : 'Email Address'; ?> *</label>
                                    <input class="form-control grey validate" type="text" id="email" name="Contact[email]" value="" required/>
                                    <span style="color: red;display: none" id="error-email"><?php echo ($this->session->userdata['languages'] == 'vn')? 'Email không hợp lệ' : 'Email Invalid'; ?></span>
                                </p>
			                	<?php if ($is_product): ?>
                                    <h3 class="page-subheading"><?php echo ($this->session->userdata['languages'] == 'vn')? 'Thông Tin Sản Phẩm Yêu Cầu' : 'Product'; ?></h3>
	                                <div class="form-group selector1">
	                            		<label style="float: left"> <?php echo ($this->session->userdata['languages'] == 'vn')? 'Mã Sản Phẩm' : 'Product Code'; ?></label>
	                                    <input class="form-control grey" type="text" value="<?php echo $product->product_name.' - '.$product->product_code ?>" disabled/>
	                                </div>

	                                <table id="border-add" border="1">
						                <thead>
						                    <tr>
						                        <th> <?php echo ($this->session->userdata['languages'] == 'vn')? 'Màu Sắc' : 'Color'; ?>
						                        	<?php /*if (isset($arr_color) && !empty($arr_color)): ?>
						                        		<i class=" icon-question-sign" />
							                        	<span class="ps_property iq-color">
							                        		<?php echo implode('<br>', $arr_color) ?>
														</span>
						                        	<?php endif*/ ?>
												</th>
						                        <th><?php echo ($this->session->userdata['languages'] == 'vn')? 'Độ Dày' : 'Thickness'; ?>
						                        	<?php /*if (isset($arr_thick) && !empty($arr_thick)): ?>
							                        	<i class="icon-question-sign" />
							                        	<span class="ps_property iq-thickness">
														</span>
						                        	<?php endif*/  ?>
												</th>
						                        <th><?php echo ($this->session->userdata['languages'] == 'vn')? 'Chiều Rộng / Khổ' : 'Width'; ?>
						                        	<?php /*if (isset($arr_width) && !empty($arr_width)): ?>
							                        	<i class="icon-question-sign" />
							                        	<span class="ps_property iq-width"></span>
						                        	<?php endif*/  ?>
												</th>
						                        <th><?php echo ($this->session->userdata['languages'] == 'vn')? 'Chiều Dài' : 'Length'; ?>
						                        	<?php /*if (isset($arr_length) && !empty($arr_length)): ?>
							                        	<i class="icon-question-sign" />
							                        	<span class="ps_property iq-length"></span>
						                        	<?php endif*/  ?>
						                        </th>
						                        <th><?php echo ($this->session->userdata['languages'] == 'vn')? 'Số Lượng' : 'Quantity'; ?>
						                        	<!-- <i class="icon-question-sign" /> -->
						                        	<!-- <span class="ps_property iq-number"></span> -->
						                        </th>
						                    </tr>
						                </thead>
						                <tbody>
						                    <tr>
						                        <td>
						                            <input class="form-control grey" type="text" name="ContactPro[0][color]" placeholder=""/>
						                        </td>
						                        <td>
						                            <input class="form-control grey" type="text" name="ContactPro[0][thickness]" placeholder=""/>
						                        </td>
						                        <td>
						                            <input class="form-control grey" type="text" name="ContactPro[0][width]" placeholder=""/>
						                        </td>
						                        <td>
						                            <input class="form-control grey" type="text" name="ContactPro[0][length]" placeholder=""/>
						                        </td>
						                        <td>
						                            <input class="form-control grey" type="text" name="ContactPro[0][quantity]" placeholder=""/>
						                        </td>
						                    </tr>
						                </tbody>
						            </table>
						            <button type="button" id="add_row" class="btn btn-default button-small"><span> Thêm</span></button>
						            <h3 class="page-subheading">Lưu ý:</h3>
						            <p> <?php echo ($this->session->userdata['languages'] == 'vn')? 'Khách hàng có thể đặt hàng ngoài quy cách phổ thông (đặt hàng ngoại khổ) đối với số lượng sản phẩm có giá trị trên 20 triệu đồng' : 'You can order for product that not in regular size with order greater than 20.000.000 vnđ'; ?>.</p>
				                	<button type="button" class="btn btn-default button-small">
				                		<a style="color: white" href="#" class="iframe" rel="nofollow"> <?php echo ($this->session->userdata['languages'] == 'vn')? 'Chính Sách Đặt Hàng Ngoại Khổ' : 'Policy for Custom Order'; ?>.
                                        </a>
				                	</button>
						            <h3 class="page-subheading"> <?php echo ($this->session->userdata['languages'] == 'vn')? 'Thông Tin Thanh Toán' : 'Payment Detail'; ?></h3>
						        	<p class="form-group">
						                <label><?php echo ($this->session->userdata['languages'] == 'vn')? 'Hình Thức Thanh Toán' : 'Payment Type'; ?>:</label>
						                <input class="form-control grey" type="radio" id="payment" name="Contact[type_payment]" value="1" checked/> <?php echo ($this->session->userdata['languages'] == 'vn')? 'Tiền Mặt' : 'Cash'; ?>
						                <input class="form-control grey" type="radio" id="payment" name="Contact[type_payment]" value="2" /> <?php echo ($this->session->userdata['languages'] == 'vn')? 'Chuyển Khoản' : 'Bank Transfer'; ?>
						            </p>
						            <h3 class="page-subheading"><?php echo ($this->session->userdata['languages'] == 'vn')? 'Thông Tin Giao Hàng' : 'Delivery Detail'; ?></h3>
						            <p class="form-group">
						                <label for="delivery_address" style="float: left"><?php echo ($this->session->userdata['languages'] == 'vn')? 'Địa Điểm Giao Hàng' : 'Delivery Address'; ?> *</label>
						                <input class="form-control grey" type="text" id="delivery_address" name="Contact[shipping_address]" value="" />
						            </p>
						            <p class="form-group">
						                <label for="invoicer" style="float: left"> <?php echo ($this->session->userdata['languages'] == 'vn')? 'Họ Tên Người Nhận' : 'Full Name'; ?></label>
						                <input class="form-control grey" type="text" id="invoicer" name="Contact[shipping_name]" value="" />
						            </p>
						            <p class="form-group">
						                <label for="invoicer" style="float: left"> <?php echo ($this->session->userdata['languages'] == 'vn')? 'Điện Thoại Người Nhận Hàng' : 'Phone Number'; ?> *</label>
						                <input class="form-control grey" type="text" id="invoicer" name="Contact[shipping_name]" value="" />
						            </p>
						            <p class="form-group">
						                <label for="sale_employee" style="float: left"><?php echo ($this->session->userdata['languages'] == 'vn')? 'Nhân Viên Kinh Doanh (nếu có)' : 'Sale Employee ( if there is )'; ?></label>
						                <input class="form-control grey" type="text" id="sale_employee" name="Contact[business_man]" value="" />
						            </p>
			                	<?php endif ?>
                                <p class="form-group">
		                            <label for="fileUpload"> <?php echo ($this->session->userdata['languages'] == 'vn')? 'Đính Kèm Tập Tin' : 'File'; ?></label>
		                            <input type="file" name="file" id="fileUpload" class="form-control" />
		                        </p>
                            </div>
			                <div class="col-xs-12 col-md-12">
			                    <div class="form-group">
			                        <label for="message"><?php echo ($this->session->userdata['languages'] == 'vn')? 'Ghi Chú' : 'Note'; ?> </label>
			                        <textarea class="form-control" id="message" name="Contact[comment]"></textarea>
			                    </div>
			                </div>
			                <?php if ($is_product): ?>
			                	<div class="col-xs-12 col-md-12">
				                    <div style="float: left"><input type="checkbox" name="cgv" id="cgv" value="0" checked="checked" required></div>
				                    <div style="float: left"><a href="javascript:void(0)" target="_blank"><?php echo ($this->session->userdata['languages'] == 'vn')? 'Tôi đã đọc và chấp nhận các điều khoản và chính sách của công ty' : 'I have read and agree with company\'s policy'; ?>.</a></div>
				                </div>
			                <?php endif ?>
    					</div>
			            <div class="submit col-xs-12 col-md-12">
			                <button type="submit" name="submitMessage" id="submitMessage" class="button btn btn-default button-medium"><span><?php echo ($this->session->userdata['languages'] == 'vn')? 'Gởi' : 'Send'; ?></span>
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
    	$('#id_contact').trigger( "change" );
    	$('.contact-form-box').submit(function() {
    		if (!isEmail($('#email').val())) {
    			$('#error-email').show();
    			return false;
    		}
    		return true;
    	});

        $("#add_row").click(function () {
            var n = $("#center_column > form > fieldset > div.clearfix > div> table > tbody > tr").length;
            $("#center_column > form > fieldset > div.clearfix > div > table > tbody").
                    append("<tr><td><input class='form-control grey' type='text' name='ContactPro["+n+"][color]'/></td><td><input class='form-control grey' type='text' name='ContactPro["+n+"][thickness]'/></td><td><input class='form-control grey' type='text' name='ContactPro["+n+"][width]'/></td><td><input class='form-control grey' type='text' name='ContactPro["+n+"][length]'/></td><td><input class='form-control grey' type='text' name='ContactPro["+n+"][quantity]'/></td></tr>");
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