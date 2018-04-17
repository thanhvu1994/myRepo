<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title"><?php echo $title ?></h4>
    </div>
    <?php
        $breadcrumb = [base_url('admin/system') => 'Dashboard', base_url('admin/menu') => 'Menu', 'active' => $title];
        $this->load->view('admin/layouts/breadcrumbs', ['breadcrumb' => $breadcrumb]);
     ?>
    <!-- /.col-lg-12 -->
</div>
<!-- .row -->
<div class="row">
    <div class="col-sm-12">
        <div class="white-box">
            <div class="row">
            <!-- Tab panes -->
            <?php echo form_open_multipart($link_submit, ['class' => 'form-horizontal']); ?>
                <div class="col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label class="col-md-12">Tên danh mục</label>
                        <div class="col-md-12">
                            <input type="text" class="form-control" value="<?php echo (isset($model)) ? $model->category_name : ''?>" name="Categories[category_name]" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12">Tên danh mục tiếng anh</label>
                        <div class="col-md-12">
                            <input type="text" class="form-control" value="<?php echo (isset($model)) ? $model->category_name_en : ''?>" name="Categories[category_name_en]" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-12">Đường dẫn</label>
                        <div class="col-md-12">
                            <?php $url = isset($model) ? $model->url : '';?>
                            <select class="form-control" name="Categories[url]">
                                <option value="0"> -- Chọn đường dẫn -- </option>
                                <?php foreach ($this->posts->get_dropdown_posts() as $post_url => $title): 
                                        $selected = ($url == $post_url) ? 'selected' : ''; ?>
                                    <option value="<?php echo $post_url?>" <?php echo $selected?>><?php echo $title?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>

<!--                    <div class="form-group">-->
<!--                        <label class="col-md-12">Kiểu Danh Mục</label>-->
<!--                        <div class="col-md-12">-->
<!--                            <select class="form-control" name="Categories[type]" id="type_category">-->
<!--                                <option --><?php //echo (isset($model) && $model->type == 'menu')? 'selected' : ''; ?><!-- value="menu">Menu</option>-->
<!--                                <option --><?php //echo (isset($model) && $model->type == 'category')? 'selected' : ''; ?><!-- value="category">Category</option>-->
<!--                            </select>-->
<!--                            --><?php //echo form_error('type'); ?>
<!--                        </div>-->
<!--                    </div>-->

                    <div class="form-group">
                        <label class="col-sm-12">Lớp cha</label>
                        <div class="col-sm-12">
                            <?php
                                $id = isset($model) ? $model->id : 0;
                                $parent_id = isset($model) ? $model->parent_id : 0;
                                $categories = $this->categories->get_dropdown_category($id, 'menu');
                            ?>
                            <select class="form-control" name="Categories[parent_id]" id="parent_id">
                                <option value="0"> -- Chọn lớp cha -- </option>
                                <?php
                                if (!empty($categories)) :
                                    foreach ($categories as $category_id => $category_name):
                                        $selected = ($parent_id == $category_id) ? 'selected' : ''; ?>
                                        <option value="<?php echo $category_id?>" <?php echo $selected?>><?php echo $category_name?></option>
                                    <?php endforeach;
                                endif; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label class="col-md-12">Tiêu đề</label>
                        <div class="col-md-12">
                            <input type="text" class="form-control" value="<?php echo (isset($model)) ? $model->title : ''?>" name="Categories[title]">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12">Mô tả</label>
                        <div class="col-md-12">
                            <textarea class="form-control" rows="5" name="Categories[description]"><?php echo (isset($model)) ? $model->description : ''?></textarea>
                        </div>
                    </div>
                </div>
<!--                <div class="col-xs-12">-->
<!--                    <div class="form-group">-->
<!--                        <label class="col-md-12">Hình ảnh</label>-->
<!--                        <div class="col-md-12">-->
<!--                            --><?php //if (isset($model) && $model->thumb != ''): ?>
<!--                                <input type="file" name="thumb" class="dropify" data-default-file="--><?php //echo base_url($model->thumb) ?><!--" />-->
<!--                            --><?php //else: ?>
<!--                                <input type="file" name="thumb" class="dropify" />-->
<!--                            --><?php //endif ?>
<!--                            <input type="checkbox" value="1" name="remove_img" id="rm-img" style="display: none">-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
                <div class="col-xs-12 text-center">
                    <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Lưu</button>
                    <a href="<?php echo base_url('admin/menu')?>" class="btn btn-inverse waves-effect waves-light">Hủy</a>
                </div>
            <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        var drEvent = $('.dropify').dropify();
        drEvent.on('dropify.beforeClear', function(event, element){
            if(confirm("Bạn có chắc chắn muốn xóa hình này ?")) {
                $('#rm-img').prop('checked', true);
                return true;
            }
            return false;
        });

//        $('#type_category').change(function() {
//            var id = '<?php //echo isset($model) ? $model->id : 0 ?>//';
//            $.ajax({
//                url: '<?php //echo base_url('admin/category/changeParent')?>//',
//                type: 'POST',
//                data: {id: id, type: $('#type_category').val()},
//                success: function (returndata) {
//                    $('#parent_id').html(returndata);
//                },
//            });
//        });
    });
</script>
