<div class="columns-container" id="authentication">
    <div id="columns" class="container">
		<div id="slider_row" class="row"></div>
		<div class="row">
			<div id="center_column" class="center_column col-xs-12 col-sm-12">
				<div id="noSlide" style="display: block;">
					<h1 class="page-heading">
                        <?php if(isset($this->session->userdata['logged_in_FE'])): ?>
                            <?php if($this->session->userdata['languages'] == 'vn'): ?>
                                Thông Tin Tài Khoản
                            <?php else: ?>
                                Account Information
                            <?php endif; ?>
                        <?php else: ?>
                            <?php if($this->session->userdata['languages'] == 'vn'): ?>
                                Tạo Tài Khoản Mới
                            <?php else: ?>
                                Create Account
                            <?php endif; ?>
                        <?php endif; ?>
                    </h1>
					<!---->
					<form action="" method="post" id="account-creation_form" class="std">
		                <div class="account_creation" style="line-height: 28px;">
							<h3 class="page-subheading">
                                <?php if($this->session->userdata['languages'] == 'vn'): ?>
                                    Thông Tin Cá Nhân
                                <?php else: ?>
                                    Account Information
                                <?php endif; ?>
                            </h3>
							<div class="clearfix">
								<label><?php if($this->session->userdata['languages'] == 'vn'): ?>
                                        Tiêu Đề
                                    <?php else: ?>
                                        Title
                                    <?php endif; ?></label>
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
								<label for="customer_firstname"><?php if($this->session->userdata['languages'] == 'vn'): ?>
                                        Tên
                                    <?php else: ?>
                                        Last Name
                                    <?php endif; ?> <sup>*</sup></label>
								<input type="text" class="form-control" id="customer_firstname" name="Users[last_name]" value="<?php echo isset($info) ? $info['last_name'] : '' ?>" required>
							</div>
							<div class="required form-group">
								<label for="customer_lastname"><?php if($this->session->userdata['languages'] == 'vn'): ?>
                                        Họ
                                    <?php else: ?>
                                        First Name
                                    <?php endif; ?> <sup>*</sup></label>
								<input type="text" class="form-control" id="customer_lastname" name="Users[first_name]" value="<?php echo isset($info) ? $info['first_name'] : '' ?>">
							</div>
							<div class="required form-group">
								<label for="email"><?php if($this->session->userdata['languages'] == 'vn'): ?>
                                        Email
                                    <?php else: ?>
                                        Email
                                    <?php endif; ?> <sup>*</sup></label>
								<input type="text" class="form-control" id="email" name="Users[email]" value="<?php echo isset($info) ? $info['email'] : '' ?>" required>
								<span style="color: red" id="error-email-exists"><?php echo isset($error_user_exists) ? $error_user_exists : '' ?></span>
								<span style="color: red;display: none" id="error-email"><?php if($this->session->userdata['languages'] == 'vn'): ?>
                                        Email Không Hợp Lệ
                                    <?php else: ?>
                                        Email Invalid
                                    <?php endif; ?></span>
							</div>
							<div class="required password form-group">
								<label for="passwd"><?php if($this->session->userdata['languages'] == 'vn'): ?>
                                        Mật Khẩu
                                    <?php else: ?>
                                        Password
                                    <?php endif; ?> <sup>*</sup></label>
								<input type="password" class="form-control" name="Users[password]" id="passwd" required minlength="5">
								<span id="wrong_password"><?php echo isset($wrong_password) ? $wrong_password : '' ?></span>
							</div>
							<?php if (isset($info['info'])): ?>
								<div class="required password form-group">
									<label for="passwd"><?php if($this->session->userdata['languages'] == 'vn'): ?>
                                            Mật Khẩu Mới
                                        <?php else: ?>
                                            New Password
                                        <?php endif; ?><sup>*</sup></label>
									<input type="password" class="form-control" name="Users[new_password]" minlength="5" id="new_password">
								</div>
								<div class="required password form-group">
									<label for="passwd"><?php if($this->session->userdata['languages'] == 'vn'): ?>
                                            Xác Nhận Mật Khẩu Mới
                                        <?php else: ?>
                                            Password Confirm
                                        <?php endif; ?> <sup>*</sup></label>
									<input type="password" class="form-control" name="Users[confirm_password]" minlength="5" id="confirm_password">
									<span id="message"></span>
								</div>
							<?php endif ?>
							<div class="form-group">
								<label><?php if($this->session->userdata['languages'] == 'vn'): ?>
                                        Ngày Sinh
                                    <?php else: ?>
                                        Birth Day
                                    <?php endif; ?></label>
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
											<?php if($this->session->userdata['languages'] == 'vn'): ?>
                                                    <?php for ($i=1; $i <= 12; $i++): ?>
                                                        <option value="<?php echo $i; ?>">Tháng <?php echo $i; ?></option>
                                                    <?php endfor; ?>
											<?php else: ?>
                                                        <option value="1">January</option>
                                                        <option value="2">February</option>
                                                        <option value="3">March</option>
                                                        <option value="4">April</option>
                                                        <option value="5">May</option>
                                                        <option value="6">June</option>
                                                        <option value="7">July</option>
                                                        <option value="8">August</option>
                                                        <option value="9">September</option>
                                                        <option value="10">Octorber</option>
                                                        <option value="11">November</option>
                                                        <option value="12">December</option>
                                            <?php endif; ?>
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
							<button type="submit" class="btn btn-default button button-medium"><span>
                                    <?php if(isset($info['info'])): ?>
                                        <?php if($this->session->userdata['languages'] == 'vn'): ?>
                                            Lưu
                                        <?php else: ?>
                                            Save
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <?php if($this->session->userdata['languages'] == 'vn'): ?>
                                            Đăng Ký
                                        <?php else: ?>
                                            Register
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </span>
                            </button>
						</div>
					</form>
				</div><!-- #center_column -->
				<?php if (isset($info['info'])): ?>
					<ul class="footer_links clearfix" style="margin-top: 30px">
						<li>
					        <a class="btn btn-default button button-small" href="<?php echo base_url('tai-khoan.html') ?>">
					            <span>
					                <?php if($this->session->userdata['languages'] == 'vn'): ?>
                                        Quay Lại
                                    <?php else: ?>
                                        Back
                                    <?php endif; ?>
					            </span>
					        </a>
					    </li>
						<li>
					        <a class="btn btn-default button button-small" href="<?php echo base_url('/') ?>">
					            <span>
					                <?php if($this->session->userdata['languages'] == 'vn'): ?>
                                        Trang Chủ
                                    <?php else: ?>
                                        Home
                                    <?php endif; ?>
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