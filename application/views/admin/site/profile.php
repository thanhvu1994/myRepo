<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title"><?php echo $title ?></h4>
    </div>
    <?php
        $breadcrumb = [base_url('admin/system') => 'Dashboard', 'active' => 'Thông tin tài khoản'];
        $this->load->view('admin/layouts/breadcrumbs', ['breadcrumb' => $breadcrumb]);
     ?>
</div>
<!-- /.row -->
<!-- .row -->
<div class="row">
    <div class="col-md-4 col-xs-12">
        <div class="white-box">
            <div class="user-bg"> <img width="100%" alt="user" src="<?php echo $user->get_background()?>">
                <div class="overlay-box">
                    <div class="user-content">
                        <a href="javascript:void(0)"><img src="<?php echo $user->get_avarta()?>" class="thumb-lg img-circle" alt="avarta-user"></a>
                        <h4 class="text-white"><?php echo $user->full_name ?></h4>
                        <h5 class="text-white"><?php echo $user->email ?></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8 col-xs-12">
        <div class="white-box">
            <ul class="nav nav-tabs tabs customtab">
                <li class="active tab">
                    <a href="#settings" data-toggle="tab" aria-expanded="false"> <span class="visible-xs"><i class="fa fa-cog"></i></span> <span class="hidden-xs">Thông tin tài khoản</span> </a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="settings">
                    <?php echo (isset($success)) ? $success : '' ?>
                    <?php echo form_open_multipart('admin/site/profile', ['class' => 'form-horizontal form-material']); ?>
                        <div class="form-group">
                            <label class="col-md-12">Tên đầy đủ</label>
                            <div class="col-md-12">
                                <input type="text" name="full_name" class="form-control form-control-line" value="<?php echo (isset($user)) ? $user->full_name : '' ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="example-email" class="col-md-12">Email</label>
                            <div class="col-md-12">
                                <input type="email" name="email" class="form-control form-control-line" name="example-email" id="example-email" value="<?php echo (isset($user)) ? $user->email : '' ?>">
                                <?php echo form_error('email'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Mật khẩu hiện tại</label>
                            <div class="col-md-12">
                                <input type="password" value="" name="password" class="form-control form-control-line">
                                <?php echo form_error('password'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Mật khẩu mới</label>
                            <div class="col-md-12">
                                <input type="password" value="" name="new_password" class="form-control form-control-line">
                                <?php echo form_error('new_password'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Số điện thoại</label>
                            <div class="col-md-12">
                                <input type="text" name="phone" class="form-control form-control-line" value="<?php echo (isset($user)) ? $user->phone : '' ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-12">Hình đại diện</label>
                            <div class="col-sm-12">
                                <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                    <div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
                                    <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Chọn Tệp</span> <span class="fileinput-exists">Thay đổi</span>
                                    <input type="file" name="file[avarta]">
                                    </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Xóa</a> </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-12">Hình nền</label>
                            <div class="col-sm-12">
                                <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                    <div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
                                    <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Chọn Tệp</span> <span class="fileinput-exists">Thay đổi</span>
                                    <input type="file" name="file[background]">
                                    </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Xóa</a> </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <button class="btn btn-success">Cập nhật thông tin</button>
                            </div>
                        </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
