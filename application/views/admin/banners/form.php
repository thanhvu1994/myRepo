<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title"><?php echo $title ?></h4>
    </div>
    <?php
        $breadcrumb = [base_url('admin/system') => 'Dashboard', base_url('admin/banners') => 'Quản lý Slider', 'active' => $title];
        $this->load->view('admin/layouts/breadcrumbs', ['breadcrumb' => $breadcrumb]);
     ?>
    <!-- /.col-lg-12 -->
</div>
<!-- .row -->
<div class="row">
    <div class="col-sm-12">
        <div class="white-box">
            <?php echo form_open_multipart($link_submit, ['class' => 'form-horizontal']); ?>
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#content_vn">Tiếng Việt</a></li>
                    <li><a data-toggle="tab" href="#content_en">Tiếng Anh</a></li>
                </ul>
                <div class="tab-content">
                    <div id="content_vn" class="tab-pane fade in active">
                        <div class="form-group">
                            <label class="col-md-12">Tiêu đề Slider</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" value="<?php echo (isset($model)) ? $model->name : ''?>" name="Banner[name]">
                                <?php echo form_error('name'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Tên nút Slider</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" value="<?php echo (isset($model)) ? $model->button_name : ''?>" name="Banner[button_name]">
                                <?php echo form_error('button_name'); ?>
                            </div>
                        </div>
                    </div>
                    <div id="content_en" class="tab-pane fade">
                        <div class="form-group">
                            <label class="col-md-12">Tiêu đề Slider (tiếng anh)</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" value="<?php echo (isset($model)) ? $model->name_en : ''?>" name="Banner[name_en]">
                                <?php echo form_error('name_en'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Tên nút Slider (tiếng anh)</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" value="<?php echo (isset($model)) ? $model->button_name_en : ''?>" name="Banner[button_name_en]">
                                <?php echo form_error('button_name_en'); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12">Đường dẫn</label>
                    <div class="col-md-12">
                        <input type="text" name="Banner[url]" class="form-control" value="<?php echo (isset($model)) ? $model->url : ''?>">
                        <?php echo form_error('url'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12">Hình ảnh</label>
                    <div class="col-md-12">
                        <?php if (isset($model) && $model->image != ''): ?>
                            <input type="file" name="Banner[image]" class="dropify" data-default-file="<?php echo base_url($model->image) ?>" />
                        <?php else: ?>
                            <input type="file" name="Banner[image]" class="dropify" />
                        <?php endif ?>
                        <?php echo form_error('image'); ?>
                        <?php echo isset($error) ? $error : '' ?>
                        <input type="checkbox" value="1" name="remove_img" id="rm-img" style="display: none">
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
                        <input type="checkbox" <?php echo $checked ?> class="js-switch publish-ajax" data-color="#13dafe" value="1" id="publish" name="Banner[publish]"/>
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Lưu</button>
                    <a href="<?php echo base_url('admin/banners')?>" class="btn btn-inverse waves-effect waves-light">Hủy</a>
                </div>
            <?php echo form_close(); ?>
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
