<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title"><?php echo $title ?></h4>
    </div>
    <?php
        $breadcrumb = [base_url('admin/system') => 'Dashboard', base_url('admin/user') => 'Quản lý người dùng', 'active' => $title];
        $this->load->view('admin/layouts/breadcrumbs', ['breadcrumb' => $breadcrumb]);
     ?>
    <!-- /.col-lg-12 -->
</div>
<!-- .row -->
<div class="row">
    <div class="col-sm-12">
        <div class="white-box">
            <div class="row">
            <?php echo form_open_multipart($link_submit, ['class' => 'form-horizontal']); ?>
                <div class="col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label class="col-md-12">Họ</label>
                        <div class="col-md-12">
                            <input type="text" class="form-control" value="<?php echo (isset($model)) ? $model->last_name : ''?>" name="Users[last_name]">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12">Giới tính</label>
                        <div class="col-md-12">
                            <?php
                            $check_nam = $check_nu = '';
                                if (isset($model)) {
                                    if ($model->gender == 'Nam') {
                                        $check_nam = 'checked';
                                    } else {
                                        $check_nu = 'checked';
                                    }
                                } else {
                                    $check_nam = 'checked';
                                }
                            ?>
                            <div class="col-md-2">
                                <input type="radio" name="Users[gender]" value="Nam" <?php echo $check_nam?>> Nam
                            </div>
                            <div class="col-md-2">
                                <input type="radio" name="Users[gender]" value="Nữ" <?php echo $check_nu?>> Nữ
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label class="col-md-12">Tên</label>
                        <div class="col-md-12">
                            <input type="text" class="form-control" value="<?php echo (isset($model)) ? $model->first_name : ''?>" name="Users[first_name]">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12">Email</label>
                        <div class="col-md-12">
                            <input type="text" class="form-control" value="<?php echo (isset($model)) ? $model->email : ''?>" name="Users[email]">
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 text-center">
                    <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Lưu</button>
                    <a href="<?php echo base_url('admin/user')?>" class="btn btn-inverse waves-effect waves-light">Hủy</a>
                </div>
            <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        var drEvent = $('.dropify').dropify();
        drEvent.on('dropify.beforeClear', function(event, element){
            if(confirm("Bạn có chắc chắn muốn xóa hình này ?")) {
                $('#rm-img').prop('checked', true);
                return true;
            }
            return false;
        });
    })
</script>
