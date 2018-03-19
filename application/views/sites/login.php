<link rel="stylesheet" href="<?php echo base_url('themes/website/css/authentication.css')?>" type="text/css" media="all" />
<div class="columns-container" id="authentication">
    <div id="columns" class="container" >
		<div id="slider_row" class="row"></div>
		<div class="row">
			<div id="center_column" class="center_column col-xs-12 col-sm-12">
				<h1 class="page-heading">Authentication</h1>
				<!---->
				<div class="row">
					<div class="col-xs-12 col-sm-12">
						<form action="" method="post" id="login_form" class="box">
							<h3 class="page-subheading">Đã đăng kí</h3>
							<div class="form_content clearfix">
								<div class="form-group">
									<label for="email">Địa chỉ e-mail</label>
									<input class="form-control" type="text" id="email" name="Users[email]" value="" required />
									<span style="color: red;display: none" id="error-email">Email không hợp lệ</span>
								</div>
								<div class="form-group">
									<label for="passwd">Mật khẩu</label>
									<span><input class="form-control" type="password" name="Users[password]" value="" required/></span>
								</div>
								<p class="lost_password form-group"><a href="<?php echo base_url('sites/forgot') ?>" title="Khôi phục mật khẩu bị quên" rel="nofollow">Quên mật khẩu?</a></p>
								<p class="submit">
									<input type="hidden" class="hidden" name="back" value="" />						<button type="submit" id="SubmitLogin" name="SubmitLogin" class="button btn btn-default button-medium">
										<span>
											Đăng nhập
										</span>
									</button>
									<a class="btn btn-default button button-medium exclusive" href="<?php echo base_url('sites/register') ?>">
										<span>
											Tạo tài khoản mới
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