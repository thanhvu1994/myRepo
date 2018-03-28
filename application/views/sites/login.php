<link rel="stylesheet" href="<?php echo base_url('themes/website/css/authentication.css')?>" type="text/css" media="all" />
<div class="columns-container" id="authentication">
    <div id="columns" class="container" >
		<div id="slider_row" class="row"></div>
		<div class="row">
			<div id="center_column" class="center_column col-xs-12 col-sm-12">
				<h1 class="page-heading"><?php if($this->session->userdata['languages'] == 'vn'): ?>
                        Đăng Nhập
                    <?php else: ?>
                        Login
                    <?php endif; ?></h1>
				<!---->
				<div class="row">
					<div class="col-xs-12 col-sm-12">
						<form action="" method="post" id="login_form" class="box">
							<h3 class="page-subheading"><?php if($this->session->userdata['languages'] == 'vn'): ?>
                                    Tài Khoản
                                <?php else: ?>
                                    Account
                                <?php endif; ?></h3>
							<div class="form_content clearfix">
								<div class="form-group">
									<label for="email"><?php if($this->session->userdata['languages'] == 'vn'): ?>
                                            Địa Chỉ Email
                                        <?php else: ?>
                                            Email
                                        <?php endif; ?></label>
									<input class="form-control" type="text" id="email" name="Users[email]" value="" required />
									<span style="color: red;display: none" id="error-email"><?php if($this->session->userdata['languages'] == 'vn'): ?>
                                            Email Không Hợp Lệ
                                        <?php else: ?>
                                            Email Invalid
                                        <?php endif; ?></span>
								</div>
								<div class="form-group">
									<label for="passwd"><?php if($this->session->userdata['languages'] == 'vn'): ?>
                                            Mật Khẩu
                                        <?php else: ?>
                                            Password
                                        <?php endif; ?></label>
									<span><input class="form-control" type="password" name="Users[password]" value="" required/></span>
								</div>
								<p class="lost_password form-group"><a href="<?php echo base_url('quen-mat-khau.html') ?>" title="Khôi phục mật khẩu bị quên" rel="nofollow">
                                        <?php if($this->session->userdata['languages'] == 'vn'): ?>
                                            Quên Mật Khẩu?
                                        <?php else: ?>
                                            Forgot Password?
                                        <?php endif; ?></a></p>
								<p class="submit">
									<input type="hidden" class="hidden" name="back" value="" />						<button type="submit" id="SubmitLogin" name="SubmitLogin" class="button btn btn-default button-medium">
										<span>
											<?php if($this->session->userdata['languages'] == 'vn'): ?>
                                                Đăng Nhập
                                            <?php else: ?>
                                                Login
                                            <?php endif; ?>
										</span>
									</button>
									<a class="btn btn-default button button-medium exclusive" href="<?php echo base_url('dang-ki-html') ?>">
										<span>
											<?php if($this->session->userdata['languages'] == 'vn'): ?>
                                                Tạo Tài Khoản Mới
                                            <?php else: ?>
                                                Register
                                            <?php endif; ?>
										</span>
									</a>
								</p>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	$(document).ready(function () {
		$('#login_form').submit(function() {
    		if (!isEmail($('#email').val())) {
    			$('#error-email').show();
    			return false;
    		}
    		return true;
    	});
	});

	function isEmail(email) {
	  	var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	  	return regex.test(email);
	}
</script>