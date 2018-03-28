<div class="columns-container" id="authentication">
    <div id="columns" class="container" >
		<div id="slider_row" class="row"></div>
		<div class="row">
			<div id="center_column" class="center_column col-xs-12 col-sm-12">
				<div class="box">
					<h1 class="page-subheading"><?php if($this->session->userdata['languages'] == 'vn'): ?>
                            Quên Mật Khẩu?
                        <?php else: ?>
                            Forgot Password?
                        <?php endif; ?></h1>
					<p><?php if($this->session->userdata['languages'] == 'vn'): ?>
                            Xin vui lòng nhập địa chỉ e-mail dùng để đăng ký. Chúng tôi sẽ gửi mật khẩu mới của bạn đến địa chỉ đó.
                        <?php else: ?>
                            Please enter the email which using to register. We will send you a new password.
                        <?php endif; ?></p>
					<form action="" method="post" class="std" id="form_forgotpassword">
						<fieldset>
							<div class="form-group">
								<label for="email"><?php if($this->session->userdata['languages'] == 'vn'): ?>
                                        Địa Chỉ Email
                                    <?php else: ?>
                                        Email
                                    <?php endif; ?></label>
								<input class="form-control" type="text" id="email" name="email" value="">
								<span style="color: red;display: none" id="error-email"><?php if($this->session->userdata['languages'] == 'vn'): ?>
                                        Email Không Hợp Lệ
                                    <?php else: ?>
                                        Email Invalid
                                    <?php endif; ?></span>
							</div>
							<p class="submit">
					            <button type="submit" class="btn btn-default button button-medium"><span><?php if($this->session->userdata['languages'] == 'vn'): ?>
                                            Gửi
                                        <?php else: ?>
                                            Send
                                        <?php endif; ?></span></button>
							</p>
						</fieldset>
					</form>
				</div>
				<ul class="clearfix footer_links">
					<li><a class="btn btn-default button button-small" href="<?php echo base_url('dang-nhap.html') ?>" title="Quay lại Đăng nhập" rel="nofollow"><span><?php if($this->session->userdata['languages'] == 'vn'): ?>
                                    Quay lại
                                <?php else: ?>
                                    Back
                                <?php endif; ?></span></a></li>
				</ul>
			</div>
		</div>
	</div>
</div>

<script>
	$(document).ready(function () {
		$('#form_forgotpassword').submit(function() {
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