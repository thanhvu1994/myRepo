<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title"><?php echo $title ?></h4>
    </div>
    <?php
        $breadcrumb = [base_url('admin/system') => 'Dashboard', base_url('admin/partners') => 'Quản lý đối tác', 'active' => $title];
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
                </div>
                <div class="col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label class="col-md-12">Tên đối tác (tiếng anh)</label>
                        <div class="col-md-12">
                            <input type="text" class="form-control" value="<?php echo (isset($model)) ? $model->name_en : ''?>" name="name_en" required>
                            <?php echo form_error('name_en'); ?>
                        </div>
                    </div>

                    <div class="form-group hidden">
                        <label class="col-md-12">Mô tả (tiếng anh)</label>
                        <div class="col-md-12">
                            <textarea rows="3" class="form-control" name="description_en"><?php echo (isset($model)) ? $model->description_en : ''?></textarea>
                            <?php echo form_error('description_en'); ?>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12">
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
                        <label for="publish" class="col-md-12">Hiển thị</label>
                        <div class="col-md-12">
                            <?php
                            $checked = 'checked';
                            if (isset($model)) {
                                if ($model->publish == true) {
                                    $checked = 'checked';
                                } else {
                                    $checked = '';
                                }
                            }
                            ?>
                            <input type="checkbox" <?php echo $checked ?> class="js-switch publish-ajax" data-color="#13dafe" value="1" id="publish" name="publish"/>
                        </div>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Lưu</button>
                        <a href="<?php echo base_url('admin/partners')?>" class="btn btn-inverse waves-effect waves-light">Hủy</a>
                    </div>
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
            return confirm("Bạn có chắc chắn muốn xóa hình này ?");
        });
    })
</script>
