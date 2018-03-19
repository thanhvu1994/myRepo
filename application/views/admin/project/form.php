 <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title"><?php echo $title ?></h4>
            </div>
            <?php
                $breadcrumb = [base_url('admin/site') => 'Dashboard', base_url('admin/project') => 'Dự Án', 'active' => $title];
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
                            <label class="col-md-12">Tiêu Đề <span class="required">*</span></label>
                            <div class="col-md-12">
                                <input required type="text" class="form-control" value="<?php echo (isset($model)) ? $model->title : ''?>" name="title">
                                <?php echo form_error('title'); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12">Mô Tả <span class="required">*</span></label>
                            <div class="col-md-12">
                                <input required type="text" class="form-control" value="<?php echo (isset($model)) ? $model->description : ''?>" name="description">
                                <?php echo form_error('description'); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12">Nội Dung Rút Gọn <span class="required">*</span></label>
                            <div class="col-md-12">
                                <input required type="text" class="form-control" value="<?php echo (isset($model)) ? $model->short_content : ''?>" name="short_content">
                                <?php echo form_error('short_content'); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12">Nội Dung <span class="required">*</span></label>
                            <div class="col-md-12">
                                <textarea required class="form-control" name="content" id="editor-full" rows="40" cols="80">
                                    <?php echo (isset($model)) ? $model->content : ''?>
                                </textarea>
                                <?php echo form_error('content'); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12">Sản Phẩm Liên Quan</label>
                            <div class="col-md-12">
                                <?php $url = isset($model) ? $model->url : '';?>
                                <select class="form-control" name="url">
                                    <option value="0"> -- Chọn Sản Phẩm -- </option>
                                    <?php foreach ($this->products->getListData() as $post_url => $title):
                                        $selected = ($url == $post_url) ? 'selected' : ''; ?>
                                        <option value="<?php echo $post_url?>" <?php echo $selected?>><?php echo $title?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12">Hình Ảnh</label>
                            <div class="col-md-12">
                                <?php if (isset($model)): ?>
                                    <input type="file" name="featured_image" class="dropify" data-default-file="<?php echo base_url($model->featured_image) ?>" />
                                <?php else: ?>
                                    <input type="file" name="featured_image" class="dropify" />
                                <?php endif ?>
                                <?php echo form_error('featured_image'); ?>
                                <?php echo isset($error) ? $error : '' ?>
                            </div>
                        </div>

                        <!--<div class="form-group">
                            <label class="col-md-12">Language</label>
                            <div class="col-md-12">
                                <select class="form-control" name="language">
                                    <option <?php /*echo (isset($model) && $model->language == 'en')? 'selected' : ''; */?> value="en">English</option>
                                    <option <?php /*echo (isset($model) && $model->language == 'vn')? 'selected' : ''; */?> value="vn">Tiếng Việt</option>
                                </select>
                                <?php /*echo form_error('slug'); */?>
                            </div>
                        </div>-->

                        <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                        <a href="<?php echo base_url('admin/project')?>" class="btn btn-inverse waves-effect waves-light">Cancel</a>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    <footer class="footer text-center"> 2017 &copy; Agile Admin brought to you by wrappixel.com </footer>
 <script>
     // Replace the <textarea id="editor1"> with a CKEditor
     // instance, using default configuration.
     CKEDITOR.replace( 'editor-full', {
         filebrowserBrowseUrl: "<?php echo base_url('themes/admin/plugins/ckfinder/ckfinder.html')?>",
         filebrowserUploadUrl: "<?php echo base_url('themes/admin/plugins/ckfinder/core/connector/php/connector.php').'?command=QuickUpload&type=Files' ?>",
         filebrowserWindowWidth: '1000',
         filebrowserWindowHeight: '700'
     } );

     $(document).ready(function() {
         var drEvent = $('.dropify').dropify();
         drEvent.on('dropify.beforeClear', function(event, element){
             return confirm("Bạn có chắc chắn muốn xóa hình này ?");
         });
     });
 </script>