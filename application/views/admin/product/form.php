 <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title"><?php echo $title ?></h4>
            </div>
            <?php
                $breadcrumb = [base_url('admin/site') => 'Dashboard', base_url('admin/product') => 'Quản lý sản phẩm', 'active' => $title];
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
                            <label class="col-md-12">Product Code</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" value="<?php echo (isset($model)) ? $model->product_code : $newCode ;?>" name="product_code" readonly>
                                <?php echo form_error('product_code'); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12">Product Name</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" value="<?php echo (isset($model)) ? $model->product_name : ''?>" name="product_name">
                                <?php echo form_error('product_name'); ?>
                            </div>
                        </div>

                        <!-- <div class="form-group">
                            <label class="col-md-12">Price</label>
                            <div class="col-md-12">
                                <input type="number" class="form-control" value="<?php echo (isset($model)) ? $model->price : ''?>" name="price">
                                <?php echo form_error('price'); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12">Sale Price</label>
                            <div class="col-md-12">
                                <input type="number" class="form-control" value="<?php echo (isset($model)) ? $model->sale_price : ''?>" name="sale_price">
                                <?php echo form_error('sale_price'); ?>
                            </div>
                        </div> -->

                        <div class="form-group">
                            <label class="col-md-12">Category</label>
                            <div class="col-md-12">
                                <select class="form-control" name="category">
                                    <?php if(isset($categories)) : ?>
                                        <?php foreach($categories as $id => $cate): ?>
                                            <option value="<?php echo $id; ?>"><?php echo $cate; ?></option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                                <?php echo form_error('category'); ?>
                            </div>
                        </div>

                        <!-- <div class="form-group">
                            <label class="col-md-12">Status</label>
                            <div class="col-md-12">
                                <select class="form-control" name="status">
                                    <option <?php echo (isset($model) && $model->status == STATUS_ACTIVE)? 'selected' : ''; ?> value="<?php echo STATUS_ACTIVE; ?>">Active</option>
                                    <option <?php echo (isset($model) && $model->status == STATUS_INACTIVE)? 'selected' : ''; ?> value="<?php echo STATUS_INACTIVE; ?>">In-Active</option>
                                </select>
                                <?php echo form_error('status'); ?>
                            </div>
                        </div> -->

                        <div class="form-group">
                            <label for="publish" class="col-md-12">Hiển thị</label>
                            <div class="col-md-12">
                                <?php $checked = isset($model) && $model->status == true ? 'checked' : '' ?>
                                <input type="checkbox" <?php echo $checked ?> class="js-switch publish-ajax" data-color="#13dafe" value="1" id="publish" name="status"/>
                            </div>
                        </div>

                        <!-- <div class="form-group">
                            <label class="col-md-12">Feature</label>
                            <div class="col-md-12">
                                <select class="form-control" name="feature">
                                    <option <?php echo (isset($model) && $model->feature == STATUS_ACTIVE)? 'selected' : ''; ?> value="<?php echo STATUS_ACTIVE; ?>">Active</option>
                                    <option <?php echo (isset($model) && $model->feature == STATUS_INACTIVE)? 'selected' : ''; ?> value="<?php echo STATUS_INACTIVE; ?>">In-Active</option>
                                </select>
                                <?php echo form_error('feature'); ?>
                            </div>
                        </div> -->
                    </div>
                    <div class="col-sm-6 col-xs-12">
                        <div class="form-group">
                            <label class="col-md-12">Title</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" value="<?php echo (isset($model)) ? $model->title : ''?>" name="title">
                                <?php echo form_error('title'); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12">Meta Description</label>
                            <div class="col-md-12">
                                    <textarea class="form-control" name="meta_description" rows="5" cols="80"><?php echo (isset($model)) ? $model->meta_description : ''?></textarea>
                                <?php echo form_error('meta_description'); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12">Short Content</label>
                            <div class="col-md-12">
                                <textarea class="form-control" name="short_content" rows="5" cols="80"><?php echo (isset($model)) ? $model->short_content : ''?></textarea>
                                <?php echo form_error('short_content'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label class="col-md-12">Description</label>
                            <div class="col-md-12">
                                    <textarea class="form-control" name="description" id="editor-full-2" rows="10" cols="80"><?php echo (isset($model)) ? $model->description : ''?></textarea>
                                <?php echo form_error('description'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Content</label>
                            <div class="col-md-12">
                                <textarea class="form-control" name="content" id="editor-full" rows="10" cols="80"><?php echo (isset($model)) ? $model->content : ''?></textarea>
                                <?php echo form_error('content'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="form-group attribute-container">
                            <label class="col-md-12">Attributes <a href="javascript:void(0)" onClick="addAttribute()"><span class="glyphicon glyphicon-plus"></span></a></label>
                            <div class="attribute-input default-item">
                                <div class="col-md-4">
                                    <input type="text" class="form-control att-input" value="" name="attributes[]" list="options">
                                    <?php echo form_error('attributes'); ?>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" value="" name="attribute_values[]">
                                    <?php echo form_error('attribute_values'); ?>
                                </div>
                            </div>

                            <?php if(isset($attribute) && !empty($attribute)): ?>
                                <?php foreach($attribute as $key => $item): ?>
                                    <div class="attribute-input">
                                        <div class="col-md-4">
                                            <input type="text" class="form-control att-input" value="<?php echo $item->name; ?>" name="attributes[]" list="options">
                                            <?php echo form_error('attributes'); ?>
                                        </div>
                                        <?php if(isset($attribute_value) && !empty($attribute_value)): ?>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control" value="<?php echo $attribute_value[$item->id][0]->name; ?>" name="attribute_values[]">
                                                <?php echo form_error('attribute_values'); ?>
                                            </div>
                                        <?php else: ?>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control" value="" name="attribute_values[]">
                                                <?php echo form_error('attribute_values'); ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <div class="attribute-input">
                                    <div class="col-md-4">
                                        <input type="text" class="form-control att-input" value="" name="attributes[]" list="options">
                                        <?php echo form_error('attributes'); ?>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" value="" name="attribute_values[]">
                                        <?php echo form_error('attribute_values'); ?>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <datalist id="options">
                                <option value="Color">Màu Sắc</option>
                                <option value="Size">Kích Cỡ</option>
                                <option value="Material">Chất Liệu</option>
                            </datalist>
                            <script>
                                $('.att-input').change(function(){
                                    if($(this).closest('input').val() === 'Color'){
                                        $(this).closest('input').asColorPicker();
                                    }
                                });
                            </script>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label class="col-md-12">Product Images</label>
                            <div class="col-md-12">
                                <input type="file" name="product_image[]" class="dropify" multiple/>
                                <?php if(isset($images) && !empty($images)): ?>
                                    <?php foreach($images as $image): ?>
                                        <div class="gallery">
                                            <a target="_blank" href="<?php echo base_url($image->image); ?>">
                                                <img style="max-height: 150px;" src="<?php echo base_url($image->image); ?>"/>
                                            </a>
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 text-center">
                        <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                        <a href="<?php echo base_url('admin/product')?>" class="btn btn-inverse waves-effect waves-light">Cancel</a>
                    </div>
                    <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.right-sidebar -->
    <!-- /.container-fluid -->
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

     CKEDITOR.replace( 'editor-full-2', {
         filebrowserBrowseUrl: "<?php echo base_url('themes/admin/plugins/ckfinder/ckfinder.html')?>",
         filebrowserUploadUrl: "<?php echo base_url('themes/admin/plugins/ckfinder/core/connector/php/connector.php').'?command=QuickUpload&type=Files' ?>",
         filebrowserWindowWidth: '1000',
         filebrowserWindowHeight: '700'
     } );

     function addAttribute(){
         $('.attribute-input.default-item').clone().removeClass('default-item').appendTo( ".attribute-container" );
     }
 </script>