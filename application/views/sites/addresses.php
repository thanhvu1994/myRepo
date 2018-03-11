<div class="columns-container">
    <div id="columns" class="container">
		<div id="slider_row" class="row"></div>
		<div class="row">
			<div id="center_column" class="center_column col-xs-12 col-sm-12">
            	<h1 class="page-heading">Địa chỉ của tôi</h1>
                <p>Vui lòng thiết lập Địa chỉ Thanh toán và Địa chỉ Giao hàng mặc định khi đặt hàng</p>
                <?php if (!isset($billings) || count($billings) == 0): ?>
                    <p class="alert alert-warning">Không có địa chỉ này khả dụng.&nbsp;<a href="<?php echo base_url('sites/address') ?>">Thêm một địa chỉ mới</a></p>
                <?php else: ?>
                    <div class="addresses">
                    	<p>Địa chỉ của bạn được liệt kê dưới đây.</p>
                    	<p class="p-indent">Hãy chắc chắn cập nhật địa chỉ nếu chúng bị thay đổi.</p>
                        <?php foreach ($billings as $billing) :?>
                            <div class="bloc_adresses row">
                                <div class="col-xs-12 col-sm-6 address">
                                    <ul class="last_item item box">
                                        <li><h3 class="page-subheading"><?php echo $billing->title ?></h3></li>
                                        <li>
                                            <span class="address_name">Tên: <?php echo $billing->first_name ?></span>
                                            <span class="address_name"><?php echo $billing->last_name ?></span>
                                        </li>
                                        <li>
                                            <span class="address_company">Tên công ty: <?php echo $billing->company_name ?></span>
                                        </li>
                                        <li>
                                            <span class="address_company">Địa chỉ công ty: <?php echo $billing->address ?></span>
                                        </li>
                                        <li>
                                            <span class="address_address1">Mã số thuế: <?php echo $billing->tax_code ?></span>
                                        </li>
                                        <li>
                                            <span>Mã bưu điện: <?php echo $billing->postal_code ?></span>
                                        </li>
                                        <li>
                                            <span>Quốc gia: Vietnam</span>
                                        </li>
                                        <li>
                                            <span class="address_phone">Điện thoại nhà: <?php echo $billing->phone ?></span>
                                        </li>
                                        <li>
                                            <span class="address_phone_mobile">Số di động: <?php echo $billing->cell_phone ?></span>
                                        </li>
                                        <li>
                                            <span>CMND: <?php echo $billing->identity_card ?></span>
                                        </li>
                                        <li>
                                            <span>Thông tin thêm: <?php echo $billing->more_info ?></span>
                                        </li>
                                        <li>
                                            <span>Ngày tạo: <?php echo $billing->get_created_date() ?></span>
                                        </li>
                                        <li>
                                            <span>Ngày Cập nhật: <?php echo $billing->get_update_date() ?></span>
                                        </li>
                                        <li class="address_update">
                                            <a class="btn btn-default button button-small" href="<?php echo base_url('sites/address/'.$billing->id) ?>" title="Cập nhật"><span>Cập nhật</span></a>
                                            <a class="btn btn-default button button-small" href="<?php echo base_url('sites/delete/'.$billing->id) ?>" onclick="return confirm('Bạn chắc chứ?');" title="Xóa"><span>Xóa</span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        <?php endforeach;?>
                    </div>
                <?php endif ?>
                <div class="clearfix main-page-indent">
                	<a href="<?php echo base_url('sites/address') ?>" title="Thêm địa chỉ mới" class="btn btn-default button button-medium">
                        <span>Thêm một địa chỉ mới</span>
                    </a>
                </div>
                <ul class="footer_links clearfix">
                	<li><a class="btn btn-defaul button button-small" href="<?php echo base_url('sites/account') ?>"><span> Quay lại tài khoản của bạn</span></a></li>
                	<li><a class="btn btn-defaul button button-small" href="<?php echo base_url('sites') ?>"><span> Trang chủ</span></a></li>
                </ul>
            </div><!-- #center_column -->
		</div><!-- .row -->
	</div><!-- #columns -->
</div>