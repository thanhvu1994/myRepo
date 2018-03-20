<link rel="stylesheet" href="<?php echo base_url('themes/website/css/my-account.css')?>" type="text/css" media="all" />
<div class="columns-container" id="my-account">
    <div id="columns" class="container">
		<div id="slider_row" class="row"></div>
		<div class="row">
			<div id="center_column" class="center_column col-xs-12 col-sm-12">
                <h1 class="page-heading">My Account</h1>
                <p class="info-account">Chào mừng đến với tài khoản của bạn. Tại đây bạn có thể quản lý thông tin cá nhân và địa chỉ giao hàng.</p>
                <div class="row addresses-lists">
                    <div class="col-xs-12 col-sm-6 col-lg-4">
                        <ul class="myaccount-link-list">
                            <?php if (count($this->billingAddress->get_model(['user_id' => $user_id])) == 0): ?>
                                <li>
                                    <a href="<?php echo base_url('sites/address') ?>" title="Thêm địa chỉ đầu tiên của tôi">
                                        <span><i class="icon-building"></i>Thêm địa chỉ đầu tiên của tôi</span>
                                    </a>
                                </li>
                            <?php endif ?>
                            <!-- <li>
                                <a href="<?php echo base_url('sites/order') ?>" title="đặt hàng">
                                    <span><i class="icon-list-ol"></i>Lịch sử và chi tiết của đơn đặt hàng</span>
                                </a>
                            </li> -->
                            <li>
                                <a href="<?php echo base_url('sites/addresses') ?>" title="Địa chỉ">
                                    <span><i class="icon-building"></i>Địa chỉ của tôi</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('sites/infomation') ?>" title="Thông tin">
                                    <span><i class="icon-user"></i>Thông tin cá nhân của tôi</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <ul class="footer_links clearfix">
                    <li><a class="btn btn-default button button-small" href="http://namvietplastic.com/" title="Trang chủ"><span> Trang chủ</span></a></li>
                </ul>
			</div><!-- #center_column -->
		</div><!-- .row -->
	</div><!-- #columns -->
</div>