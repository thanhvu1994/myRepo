<div class="columns-container" id="authentication">
    <div id="columns" class="container">
		<div id="slider_row" class="row"></div>
		<div class="row">
			<div id="center_column" class="center_column col-xs-12 col-sm-12">
				<div id="noSlide" style="display: block;">
					<h1 class="page-heading">Tạo tài khoản mới</h1>
					<!---->
					<form action="" method="post" id="account-creation_form" class="std">
		                <div class="account_creation" style="line-height: 28px;">
							<h3 class="page-subheading">Thông tin cá nhân của bạn</h3>
							<div class="clearfix">
								<label>Tiêu đề</label>
								<br>
	                            <div class="radio-inline" style="line-height: 0px;">
									<label for="id_gender1" class="top">
										<div class="radio" id="uniform-id_gender1">
											<span><input type="radio" name="Users[gender]" id="id_gender1" value="Nam" checked></span>
										</div>
										Mr.
									</label>
								</div>
				                <div class="radio-inline" style="line-height: 0px;">
									<label for="id_gender2" class="top">
										<div class="radio" id="uniform-id_gender2"><span><input type="radio" name="Users[gender]" id="id_gender2" value="Nữ"></span>
										</div>
										Mrs.
									</label>
								</div>
							</div>
							<div class="required form-group">
								<label for="customer_firstname">Tên <sup>*</sup></label>
								<input type="text" class="form-control" id="customer_firstname" name="Users[last_name]" value="<?php echo isset($info) ? $info['last_name'] : '' ?>" required>
							</div>
							<div class="required form-group">
								<label for="customer_lastname">Họ <sup>*</sup></label>
								<input type="text" class="form-control" id="customer_lastname" name="Users[first_name]" value="<?php echo isset($info) ? $info['first_name'] : '' ?>">
							</div>
							<div class="required form-group">
								<label for="email">Hộp thư <sup>*</sup></label>
								<input type="text" class="form-control" id="email" name="Users[email]" value="<?php echo isset($info) ? $info['email'] : '' ?>" required>
								<span style="color: red" id="error-email-exists"><?php echo isset($error_user_exists) ? $error_user_exists : '' ?></span>
								<span style="color: red;display: none" id="error-email">Email không hợp lệ</span>
							</div>
							<div class="required password form-group">
								<label for="passwd">Mật khẩu <?php echo isset($info['info']) ? 'hiện tại' : '' ?> <sup>*</sup></label>
								<input type="password" class="form-control" name="Users[password]" id="passwd" required minlength="5">
								<span id="wrong_password"><?php echo isset($wrong_password) ? $wrong_password : '' ?></span>
							</div>
							<?php if (isset($info['info'])): ?>
								<div class="required password form-group">
									<label for="passwd">Mật khẩu mới<sup>*</sup></label>
									<input type="password" class="form-control" name="Users[new_password]" minlength="5" id="new_password">
								</div>
								<div class="required password form-group">
									<label for="passwd">Xác nhận <sup>*</sup></label>
									<input type="password" class="form-control" name="Users[confirm_password]" minlength="5" id="confirm_password">
									<span id="message"></span>
								</div>
							<?php endif ?>
							<div class="form-group">
								<label>Ngày sinh</label>
								<div class="row">
									<div class="col-xs-4">
										<select id="days" name="days" class="form-control" required>
											<option value="">-</option>
											<?php
												for ($i=1; $i <= 31; $i++) {
													echo '<option value="'.$i.'">'.$i.'</option>';
												}
											?>
										</select>
									</div>
									<div class="col-xs-4">
										<select id="months" name="months" class="form-control" required>
											<option value="">-</option>
											<?php
												for ($i=1; $i <= 12; $i++) {
													echo '<option value="'.$i.'">Tháng '.$i.'</option>';
												}
											?>
										</select>
									</div>
									<div class="col-xs-4">
										<select id="years" name="years" class="form-control" required>
											<option value="">-</option>
											<?php
												for ($i=date("Y"); $i >= 1900; $i--) { 
													echo '<option value="'.$i.'">'.$i.'</option>';
												}
											?>
										</select>
									</div>
								</div>
							</div>
						</div>
						<div class="submit clearfix">
							<button type="submit" class="btn btn-default button button-medium"><span><?php echo isset($info['info']) ? 'Lưu': 'Đăng ký' ?></span></button>
						</div>
					</form>
				</div><!-- #center_column -->
				<?php if (isset($info['info'])): ?>
					<ul class="footer_links clearfix" style="margin-top: 30px">
						<li>
					        <a class="btn btn-default button button-small" href="<?php echo base_url('sites/account') ?>">
					            <span>
					                Quay lại tài khoản của bạn
					            </span>
					        </a>
					    </li>
						<li>
					        <a class="btn btn-default button button-small" href="<?php echo base_url('sites') ?>">
					            <span>
					                Trang chủ
					            </span>
					        </a>
					    </li>
					</ul>
				<?php endif ?>
			</div><!-- .row -->
		</div><!-- #columns -->
	</div>
</div>

<script>
	$(document).ready(function () {
		$('#account-creation_form').submit(function() {
    		if (!isEmail($('#email').val())) {
    			$('#error-email-exists').hide();
    			$('#error-email').show();
    			return false;
    		}
    		return true;
    	});

    	$('#confirm_password').on('keyup', function () {
		  	if ($('#new_password').val() != $('#confirm_password').val()) {
		    	$('#message').html('Không trùng khớp').css('color', 'red');
		  	} else 
		    	$('#message').html('');
		});
		$('#passwd').on('keyup', function () {
	    	$('#wrong_password').html('');
		});

    	var days = parseInt('<?php echo isset($info) ? $info["days"] : ""?>');
    	$("#days").val(days);
    	var months = parseInt('<?php echo isset($info) ? $info["months"] : ""?>');
    	$("#months").val(months);
    	var years = parseInt('<?php echo isset($info) ? $info["years"] : ""?>');
    	$("#years").val(years);
    	var gender = '<?php echo isset($info) ? $info["gender"] : "Nam"?>';
    	if (gender == "Nam") {
    		$("#id_gender1").attr('checked', true);
    	} else {
    		$("#id_gender2").attr('checked', true);
    	}
	});

	function isEmail(email) {
	  	var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	  	return regex.test(email);
	}
</script>