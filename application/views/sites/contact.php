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
				<h1 class="page-heading bottom-indent">Dịch vụ Khách hàng - contact us</h1>
				<?php if (isset($status)): ?>
					<p class="notify"><?php echo isset($status) ? $status : '' ?></p>
				<?php endif ?>
				<form action="" method="post" class="contact-form-box" enctype="multipart/form-data">
    				<fieldset>
			            <div class="clearfix">
			                <div class="col-xs-12 col-md-12">
			                    <div class="form-group selector1">
			                        <label for="id_contact" class="page-subheading" style="float: left">Tiêu đề tin nhắn *</label>
			                        <?php if ($is_product):
			                        	if ($type == 'dat-hang') :?>
		                                    <select id="id_contact" class="form-control" name="Contact[type]" required>
		                            			<option value="">-- Chọn --</option>
		                                        <option value="1" selected>Đặt hàng</option>
		                                	</select>
	                                	<?php else: ?>
											<select id="id_contact" class="form-control" name="Contact[type]" required>
		                            			<option value="">-- Chọn --</option>
		                                        <option value="2" selected>Báo giá</option>
		                                	</select>
	                                	<?php endif; ?>
			                        <?php else: ?>
										<select id="id_contact" class="form-control" name="Contact[type]" required>
	                            			<option value="">-- Chọn --</option>
	                                        <option value="1" >Đặt hàng</option>
	                                        <option value="2" >Báo giá</option>
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
	                                    <input class="form-control grey" type="text" value="<?php echo $product->product_name.' - '.$product->product_code ?>" disabled/>
	                                </div>

	                                <table id="border-add" border="1">
						                <thead>
						                    <tr>
						                        <th> Màu sắc
						                        	<?php if (isset($arr_color) && !empty($arr_color)): ?>
						                        		<i class=" icon-question-sign" />
							                        	<span class="ps_property iq-color">
							                        		<?php echo implode('<br>', $arr_color) ?>
														</span>
						                        	<?php endif ?>
												</th>
						                        <th>Độ dày
						                        	<?php if (isset($arr_thick) && !empty($arr_thick)): ?>
							                        	<i class="icon-question-sign" />
							                        	<span class="ps_property iq-thickness">
														</span>
						                        	<?php endif ?>
												</th>
						                        <th>Chiều rộng / khổ
						                        	<?php if (isset($arr_width) && !empty($arr_width)): ?>
							                        	<i class="icon-question-sign" />
							                        	<span class="ps_property iq-width"></span>
						                        	<?php endif ?>
												</th>
						                        <th>Chiều dài
						                        	<?php if (isset($arr_length) && !empty($arr_length)): ?>
							                        	<i class="icon-question-sign" />
							                        	<span class="ps_property iq-length"></span>
						                        	<?php endif ?>
						                        </th>
						                        <th>Số lượng
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
						            <p> Khách hàng có thể đặt hàng ngoài quy cách phổ thông (đặt hàng ngoại khổ) đối với số lượng sản phẩm có giá trị trên 20 triệu đồng.</p>
				                	<button type="button" class="btn btn-default button-small">
				                		<a style="color: white" href="" class="iframe" rel="nofollow"> Chính sách đặt hàng ngoại khổ</a>
				                	</button>
						            <h3 class="page-subheading"> Thông tin thanh toán</h3>
						        	<p class="form-group">
						                <label>Hình thức thanh toán:</label>
						                <input class="form-control grey" type="radio" id="payment" name="Contact[type_payment]" value="1" checked/> Tiền mặt
						                <input class="form-control grey" type="radio" id="payment" name="Contact[type_payment]" value="2" /> Chuyển khoản
						            </p>
						            <h3 class="page-subheading">Thông tin giao hàng</h3>
						            <p class="form-group">
						                <label for="delivery_address" style="float: left">Địa điểm giao hàng *</label>
						                <input class="form-control grey" type="text" id="delivery_address" name="Contact[shipping_address]" value="" />
						            </p>
						            <p class="form-group">
						                <label for="invoicer" style="float: left"> Họ tên người nhận hàng</label>
						                <input class="form-control grey" type="text" id="invoicer" name="Contact[shipping_name]" value="" />
						            </p>
						            <p class="form-group">
						                <label for="invoicer_phone" style="float: left">Điện thoại người nhận hàng * </label>
						                <input class="form-control grey" type="text" id="invoicer_phone" name="Contact[shipping_phone]" value="" />
						            </p>
						            <p class="form-group">
						                <label for="sale_employee" style="float: left">Nhân viên kinh doanh liên hệ (nếu có)</label>
						                <input class="form-control grey" type="text" id="sale_employee" name="Contact[business_man]" value="" />
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