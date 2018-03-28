<div class="columns-container">
    <div id="columns" class="container">
		<div id="slider_row" class="row"></div>
		<div class="row">
			<div id="center_column" class="center_column col-xs-12 col-sm-12">
            	<h1 class="page-heading"><?php echo ($this->session->userdata['languages'] == 'vn') ? 'Địa Chỉ Của Tôi' : 'My Address'; ?></h1>
                <p><?php echo ($this->session->userdata['languages'] == 'vn') ? 'Vui lòng thiết lập Địa chỉ Thanh toán và Địa chỉ Giao hàng mặc định khi đặt hàng' : 'Please setup Payment Address and Delivery Address'; ?>
                    </p>
                <?php if (!isset($billings) || count($billings) == 0): ?>
                    <p class="alert alert-warning"><?php echo ($this->session->userdata['languages'] == 'vn') ? 'Không có địa chỉ khả dụng nào' : 'No Address Yet'; ?>.&nbsp;<a href="<?php echo base_url('sites/address') ?>"><?php echo ($this->session->userdata['languages'] == 'vn') ? 'Thêm một địa chỉ mới' : 'Add Address'; ?></a></p>
                <?php else: ?>
                    <div class="addresses">
                    	<p><?php echo ($this->session->userdata['languages'] == 'vn') ? 'Địa chỉ của bạn được liệt kê dưới đây' : 'Your Address'; ?>.</p>
                    	<p class="p-indent"><?php echo ($this->session->userdata['languages'] == 'vn') ? 'Hãy chắc chắn cập nhật địa chỉ nếu chúng bị thay đổi' : 'Please update address if any change'; ?>.</p>
                        <?php foreach ($billings as $billing) :?>
                            <div class="bloc_adresses row">
                                <div class="col-xs-12 col-sm-6 address">
                                    <ul class="last_item item box">
                                        <li><h3 class="page-subheading"><?php echo $billing->title ?></h3></li>
                                        <li>
                                            <span class="address_name"><?php echo ($this->session->userdata['languages'] == 'vn') ? 'Tên' : 'Name'; ?>: <?php echo $billing->first_name ?></span>
                                            <span class="address_name"><?php echo $billing->last_name ?></span>
                                        </li>
                                        <li>
                                            <span class="address_company"><?php echo ($this->session->userdata['languages'] == 'vn') ? 'Tên Công Ty' : 'Company Name'; ?>: <?php echo $billing->company_name ?></span>
                                        </li>
                                        <li>
                                            <span class="address_company"><?php echo ($this->session->userdata['languages'] == 'vn') ? 'Địa chỉ Công Ty' : 'Company Address'; ?>: <?php echo $billing->address ?></span>
                                        </li>
                                        <li>
                                            <span class="address_address1"><?php echo ($this->session->userdata['languages'] == 'vn') ? 'Mã Số Thuế' : 'Tax Code'; ?>: <?php echo $billing->tax_code ?></span>
                                        </li>
                                        <li>
                                            <span><?php echo ($this->session->userdata['languages'] == 'vn') ? 'Mã bưu điện' : 'Postal Code'; ?>: <?php echo $billing->postal_code ?></span>
                                        </li>
                                        <li>
                                            <span><?php echo ($this->session->userdata['languages'] == 'vn') ? 'Quốc Gia' : 'Country'; ?>: Vietnam</span>
                                        </li>
                                        <li>
                                            <span class="address_phone"><?php echo ($this->session->userdata['languages'] == 'vn') ? 'Số Điện Thoại' : 'Phone Number'; ?>: <?php echo $billing->phone ?></span>
                                        </li>
                                        <li>
                                            <span class="address_phone_mobile"><?php echo ($this->session->userdata['languages'] == 'vn') ? 'Số Di Động' : 'CellPhone Number'; ?>: <?php echo $billing->cell_phone ?></span>
                                        </li>
                                        <li>
                                            <span>CMND/Passport: <?php echo $billing->identity_card ?></span>
                                        </li>
                                        <li>
                                            <span><?php echo ($this->session->userdata['languages'] == 'vn') ? 'Thông Tin Thêm' : 'More Info'; ?>: <?php echo $billing->more_info ?></span>
                                        </li>
                                        <li>
                                            <span><?php echo ($this->session->userdata['languages'] == 'vn') ? 'Ngày tạo' : 'Created Date'; ?> : <?php echo $billing->get_created_date() ?></span>
                                        </li>
                                        <li>
                                            <span><?php echo ($this->session->userdata['languages'] == 'vn') ? 'Ngày cập nhật' : 'Updated Date'; ?>: <?php echo $billing->get_update_date() ?></span>
                                        </li>
                                        <li class="address_update">
                                            <a class="btn btn-default button button-small" href="<?php echo base_url('sites/address/'.$billing->id) ?>" title="Cập nhật"><span><?php echo ($this->session->userdata['languages'] == 'vn') ? 'Cập Nhật' : 'Update'; ?></span></a>
                                            <a class="btn btn-default button button-small" href="<?php echo base_url('sites/delete/'.$billing->id) ?>" onclick="return confirm('<?php echo ($this->session->userdata['languages'] == 'vn') ? 'Bạn Chắc Chứ' : 'Are you sure'; ?>?');" title="<?php echo ($this->session->userdata['languages'] == 'vn') ? 'Xóa' : 'Delete'; ?>"><span><?php echo ($this->session->userdata['languages'] == 'vn') ? 'Xóa' : 'Delete'; ?></span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        <?php endforeach;?>
                    </div>
                <?php endif ?>
                <div class="clearfix main-page-indent">
                	<a href="<?php echo base_url('them-dia-chi.html') ?>" title="Thêm địa chỉ mới" class="btn btn-default button button-medium">
                        <span><?php echo ($this->session->userdata['languages'] == 'vn') ? 'Thêm Địa Chỉ Mới' : 'Add Address'; ?></span>
                    </a>
                </div>
                <ul class="footer_links clearfix">
                	<li><a class="btn btn-defaul button button-small" href="<?php echo base_url('tai-khoan.html') ?>"><span> <?php echo ($this->session->userdata['languages'] == 'vn') ? 'Quay Lại Trang Tài Khoản' : 'Back to Account'; ?></span></a></li>
                	<li><a class="btn btn-defaul button button-small" href="<?php echo base_url('/') ?>"><span> <?php echo ($this->session->userdata['languages'] == 'vn') ? 'Trang Chủ' : 'Home'; ?></span></a></li>
                </ul>
            </div><!-- #center_column -->
		</div><!-- .row -->
	</div><!-- #columns -->
</div>