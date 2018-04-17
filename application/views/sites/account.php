<link rel="stylesheet" href="<?php echo base_url('themes/website/css/my-account.css')?>" type="text/css" media="all" />
<div class="columns-container" id="my-account">
    <div id="columns" class="container">
		<div id="slider_row" class="row"></div>
		<div class="row">
			<div id="center_column" class="center_column col-xs-12 col-sm-12">
                <h1 class="page-heading">My Account</h1>
                <p class="info-account">
                    <?php echo ($this->session->userdata['languages'] == 'vn')
                        ? 'Chào mừng đến với tài khoản của bạn. Tại đây bạn có thể quản lý thông tin cá nhân và địa chỉ giao hàng'
                        : 'Welcome. You can manage your information and delivery address here'; ?>.
                </p>
                <div class="row addresses-lists">
                    <div class="col-xs-12 col-sm-6 col-lg-4">
                        <ul class="myaccount-link-list">
                            <?php if (count($this->billingAddress->get_model(['user_id' => $user_id])) == 0): ?>
                                <li>
                                    <a href="<?php echo base_url('them-dia-chi.html') ?>" title="Thêm địa chỉ đầu tiên của tôi">
                                        <span><i class="icon-building"></i>
                                            <?php echo ($this->session->userdata['languages'] == 'vn')
                                                ? 'Thêm Địa Chỉ Đầu Tiên'
                                                : 'Add your first address'; ?>.
                                        </span>
                                    </a>
                                </li>
                            <?php endif ?>
                            <!-- <li>
                                <a href="<?php echo base_url('sites/order') ?>" title="đặt hàng">
                                    <span><i class="icon-list-ol"></i>Lịch sử và chi tiết của đơn đặt hàng</span>
                                </a>
                            </li> -->
                            <li>
                                <a href="<?php echo base_url('dia-chi-cua-toi.html') ?>" title="Địa chỉ">
                                    <span><i class="icon-building"></i>
                                        <?php echo ($this->session->userdata['languages'] == 'vn')
                                            ? 'Địa Chỉ Của Tôi'
                                            : 'My Address'; ?>.
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('thong-tin-ca-nhan.html') ?>" title="Thông tin">
                                    <span><i class="icon-user"></i>
                                        <?php echo ($this->session->userdata['languages'] == 'vn')
                                            ? 'Thông Tin Cá Nhân Của Tôi'
                                            : 'My Information'; ?>.
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <ul class="footer_links clearfix">
                    <li><a class="btn btn-default button button-small" href="http://namvietplastic.com/" title="Trang chủ">
                            <span><?php echo ($this->session->userdata['languages'] == 'vn')
                                ? 'Trang Chủ'
                                : 'Home'; ?>
                            </span></a></li>
                </ul>
			</div><!-- #center_column -->
		</div><!-- .row -->
	</div><!-- #columns -->
</div>