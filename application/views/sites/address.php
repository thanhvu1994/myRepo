<div class="columns-container" id="address">
    <div id="columns" class="container">
		<div id="slider_row" class="row"></div>
		<div class="row">
			<div id="center_column" class="center_column col-xs-12 col-sm-12">
				<div class="box">
					<h1 class="page-subheading"><?php echo ($this->session->userdata['languages'] == 'vn') ? 'Địa Chỉ Của Bạn' : 'Your Address'; ?></h1>
					<p class="info-title">
                        <?php echo ($this->session->userdata['languages'] == 'vn') ? 'Để thêm một địa chỉ mới, vui lòng nhập vào biểu mẫu dưới đây' : 'To add new address, please complete the following form'; ?>
					</p>
					<p class="required"><sup>*</sup><?php echo ($this->session->userdata['languages'] == 'vn') ? 'Trường Bắt Buộc' : 'Required Field'; ?></p>
					<form action="" method="post" class="std" id="add_address">
						<div class="form-group">
							<label for="firstname"><?php echo ($this->session->userdata['languages'] == 'vn') ? 'Tên' : 'Last Name'; ?> <sup>*</sup></label>
							<input class="form-control" type="text" name="BillingAddress[first_name]" id="firstname" value="<?php echo isset($billing) ? $billing->first_name : '' ?>" required>
						</div>
						<div class="form-group">
							<label for="lastname"><?php echo ($this->session->userdata['languages'] == 'vn') ? 'Họ' : 'First Name'; ?> <sup>*</sup></label>
							<input class="form-control" type="text" id="lastname" name="BillingAddress[last_name]" value="<?php echo isset($billing) ? $billing->last_name : '' ?>" required>
						</div>
						<div class="form-group">
							<label for="company"><?php echo ($this->session->userdata['languages'] == 'vn') ? 'Công Ty' : 'Company'; ?></label>
							<input class="form-control" type="text" id="company" name="BillingAddress[company_name]" value="<?php echo isset($billing) ? $billing->company_name : '' ?>">
						</div>
						<div class="form-group" style="display: none" id="tax_code">
							<div id="vat_number">
								<div class="form-group">
									<label for="vat-number"><?php echo ($this->session->userdata['languages'] == 'vn') ? 'Mã Số Thuế' : 'Tax Code'; ?></label>
									<input type="text" class="form-control" name="BillingAddress[tax_code]" value="<?php echo isset($billing) ? $billing->tax_code : '' ?>">
								</div>
							</div>
						</div>
						<div class="form-group" style="display: none" id="company_address">
							<label for="address1"><?php echo ($this->session->userdata['languages'] == 'vn') ? 'Địa Chỉ Công Ty' : 'Company Address'; ?></label>
							<textarea class="form-control" name="BillingAddress[company_address]" cols="26" rows="3"><?php echo isset($billing) ? $billing->company_address : '' ?></textarea>
						</div>
						<div class="form-group">
							<label for="postcode"><?php echo ($this->session->userdata['languages'] == 'vn') ? 'Mã Bưu Điện' : 'Postal Code'; ?> <sup>*</sup></label>
							<input class="form-control" type="text" id="postcode" name="BillingAddress[postal_code]" value="<?php echo isset($billing) ? $billing->postal_code : '' ?>">
						</div>
						<div class="form-group">
							<label for="id_country"><?php echo ($this->session->userdata['languages'] == 'vn') ? 'Quốc Gia' : 'Country'; ?> <sup>*</sup></label>
							<select id="id_country" class="form-control" name="BillingAddress[country]">
								<option value="1">Vietnam</option>
							</select>
						</div>
						<div class="form-group">
							<label for="phone"><?php echo ($this->session->userdata['languages'] == 'vn') ? 'Điện Thoại Nhà' : 'Phone Number'; ?>: <sup>*</sup></label>
							<input class="form-control" type="tel" id="phone" name="BillingAddress[phone]" value="<?php echo isset($billing) ? $billing->phone : '' ?>">
						</div>
						<div class="clearfix"></div>
						<div class="form-group">
							<label for="phone_mobile"><?php echo ($this->session->userdata['languages'] == 'vn') ? 'Số Di Động' : 'Cell Phone Number'; ?>: <sup>*</sup></label>
							<input class="form-control" type="tel" id="phone_mobile" name="BillingAddress[cell_phone]" value="<?php echo isset($billing) ? $billing->cell_phone : '' ?>">
						</div>
						<div class="form-group">
							<label for="dni"><?php echo ($this->session->userdata['languages'] == 'vn') ? 'CMND/PASSPORT' : 'CMND/PASSPORT'; ?> <sup>*</sup></label>
							<input class="form-control" type="text" name="BillingAddress[identity_card]" id="dni" value="<?php echo isset($billing) ? $billing->identity_card : '' ?>" required>
						</div>
						<div class="form-group">
							<label for="address1"><?php echo ($this->session->userdata['languages'] == 'vn') ? 'Địa Chỉ' : 'Address'; ?><sup>*</sup></label>
							<textarea class="form-control" name="BillingAddress[address]" cols="26" rows="3" required><?php echo isset($billing) ? $billing->address : '' ?></textarea>
						</div>
						<div class="form-group">
							<label for="other"><?php echo ($this->session->userdata['languages'] == 'vn') ? 'Thông Tin Thêm' : 'More Information'; ?></label>
							<textarea class="form-control" name="BillingAddress[more_info]" cols="26" rows="3"><?php echo isset($billing) ? $billing->more_info : '' ?></textarea>
						</div>
						<div class="clearfix"></div>
						<div class="form-group" id="adress_alias">
							<label for="alias"><?php echo ($this->session->userdata['languages'] == 'vn') ? 'Đặt Tên cho Địa Chỉ này' : 'Giving a name to this Address'; ?> <sup>*</sup></label>
							<input type="text" id="alias" class="form-control" name="BillingAddress[title]" value="<?php echo isset($billing) ? $billing->title : '' ?>" required>
						</div>
						<button type="submit" class="btn btn-default button button-medium"><?php echo ($this->session->userdata['languages'] == 'vn') ? 'Lưu' : 'Save'; ?></button>
					</form>
				</div>
				<ul class="footer_links clearfix">
					<li>
						<a class="btn btn-defaul button button-small" href="<?php echo base_url('dia-chi-cua-toi.html')?>">
							<span> <?php echo ($this->session->userdata['languages'] == 'vn') ? 'Trở lại' : 'Back'; ?></span>
						</a>
					</li>
				</ul>
			</div><!-- #center_column -->
		</div><!-- .row -->
	</div><!-- #columns -->
</div>

<script>
	$(document).ready(function() {
		$('#company').on('keyup', function () {
			if ($(this).val() != '') {
				$('#tax_code').show();
				$('#company_address').show();
			} else {
				$('#tax_code').hide();
				$('#company_address').hide();
			}
		});
	});
</script>