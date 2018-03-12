<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title"><?php echo $title ?></h4>
    </div>
    <?php
        $breadcrumb = [base_url('admin/site') => 'Dashboard', base_url('admin/partners') => 'Quản lý đối tác', 'active' => $title];
        $this->load->view('admin/layouts/breadcrumbs', ['breadcrumb' => $breadcrumb]);
     ?>
    <!-- /.col-lg-12 -->
</div>
<!-- .row -->
<div class="row">
    <div class="col-sm-12">
        <div class="white-box">
            <?php echo form_open_multipart($link_submit, ['class' => 'form-horizontal']); ?>
                <div class="form-group">
                    <label class="col-md-12">Tên đối tác</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" value="<?php echo (isset($model)) ? $model->name : ''?>" name="name" required>
                        <?php echo form_error('name'); ?>
                    </div>
                </div>
                <div class="form-group hidden">
                    <label class="col-md-12">Mô tả</label>
                    <div class="col-md-12">
                        <textarea rows="3" class="form-control" name="description"><?php echo (isset($model)) ? $model->description : ''?></textarea>
                        <?php echo form_error('description'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12">Đường dẫn</label>
                    <div class="col-md-12">
                        <input type="text" name="url" class="form-control" value="<?php echo (isset($model)) ? $model->url : ''?>">
                        <?php echo form_error('url'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12">Logo</label>
                    <div class="col-md-12">
                        <?php if (isset($model)): ?>
                            <input type="file" name="logo" class="dropify" data-default-file="<?php echo base_url($model->logo) ?>" />
                        <?php else: ?>
                            <input type="file" name="logo" class="dropify" />
                        <?php endif ?>
                        <?php echo form_error('logo'); ?>
                        <?php echo isset($error) ? $error : '' ?>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="checkbox checkbox-success">
                            <?php $checked = isset($model) && $model->publish == true ? 'checked' : '' ?>
                            <input id="publish" name="publish" type="checkbox" value="1" <?php echo $checked ?>>
                            <label for="publish">Publish</label>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Lưu</button>
                <a href="<?php echo base_url('admin/partners')?>" class="btn btn-inverse waves-effect waves-light">Hủy</a>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
