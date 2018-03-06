<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title"><?php echo $title ?></h4>
    </div>
    <?php
        $breadcrumb = [base_url('admin/site') => 'Dashboard', base_url('admin/partners') => 'Partners', 'active' => $title];
        $this->load->view('admin/layouts/breadcrumbs', ['breadcrumb' => $breadcrumb]);
     ?>
    <!-- /.col-lg-12 -->
</div>
<!-- .row -->
<div class="row">
    <div class="col-sm-12">
        <div class="white-box">
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#vng" aria-controls="vng" role="tab" data-toggle="tab" aria-expanded="true"><span class="visible-xs"><i class="ti-home"></i></span><span class="hidden-xs"> Tiếng việt</span></a></li>
                <li role="presentation" class=""><a href="#eng" aria-controls="eng" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="ti-user"></i></span> <span class="hidden-xs">Tiếng Anh</span></a></li>
            </ul>
            <?php echo form_open_multipart($link_submit, ['class' => 'form-horizontal']); ?>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="vng">
                        <div class="form-group">
                            <label class="col-md-12">Tên đối tác</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" value="<?php echo (isset($model)) ? $model->name : ''?>" name="name" required>
                                <?php echo form_error('name'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Mô tả</label>
                            <div class="col-md-12">
                                <textarea rows="3" class="form-control" name="description"><?php echo (isset($model)) ? $model->description : ''?></textarea>
                                <?php echo form_error('description'); ?>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="eng">
                        <div class="form-group">
                            <label class="col-md-12">Tên đối tác</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" value="<?php echo (isset($model)) ? $model->name_en : ''?>" name="name_en" required>
                                <?php echo form_error('name_en'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Mô tả</label>
                            <div class="col-md-12">
                                <textarea rows="3" class="form-control" name="description_en"><?php echo (isset($model)) ? $model->description_en : ''?></textarea>
                                <?php echo form_error('description_en'); ?>
                            </div>
                        </div>
                        <div class="clearfix"></div>
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
