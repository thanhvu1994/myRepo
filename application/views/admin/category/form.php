<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title"><?php echo $title ?></h4>
    </div>
    <?php
        $breadcrumb = [base_url('admin/system') => 'Dashboard', base_url('admin/category') => 'Danh mục', 'active' => $title];
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
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#content_vn">Tiếng Việt</a></li>
                        <li><a data-toggle="tab" href="#content_en">Tiếng Anh</a></li>
                    </ul>

                    <div class="tab-content">
                        <div id="content_vn" class="tab-pane fade in active">
                            <div class="form-group">
                                <label class="col-md-12">Tiêu đề</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" value="<?php echo (isset($model)) ? $model->title : ''?>" name="Categories[title]">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Tên danh mục</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" value="<?php echo (isset($model)) ? $model->category_name : ''?>" name="Categories[category_name]" required>
                                </div>
                            </div>
                        </div>
                        <div id="content_en" class="tab-pane fade">
                            <div class="form-group">
                                <label class="col-md-12">Tiêu đề</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" value="<?php echo (isset($model)) ? $model->title_en : ''?>" name="Categories[title_en]">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Tên danh mục</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" value="<?php echo (isset($model)) ? $model->category_name_en : ''?>" name="Categories[category_name_en]" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-12">Lớp cha</label>
                        <div class="col-sm-12">
                            <?php
                                $id = isset($model) ? $model->id : 0;
                                $parent_id = isset($model) ? $model->parent_id : 0;
                                $categories = $this->categories->get_dropdown_category($id, 'category');
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
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#description_vn">Tiếng Việt</a></li>
                        <li><a data-toggle="tab" href="#description_en">Tiếng Anh</a></li>
                    </ul>

                    <div class="tab-content">
                        <div id="description_vn" class="tab-pane fade in active">
                            <div class="form-group">
                                <label class="col-md-12">Mô tả</label>
                                <div class="col-md-12">
                                    <textarea class="form-control" rows="10" name="Categories[description]"><?php echo (isset($model)) ? $model->description : ''?></textarea>
                                </div>
                            </div>
                        </div>
                        <div id="description_en" class="tab-pane fade">
                            <div class="form-group">
                                <label class="col-md-12">Mô tả</label>
                                <div class="col-md-12">
                                    <textarea class="form-control" rows="10" name="Categories[description_en]"><?php echo (isset($model)) ? $model->description_en : ''?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12">
                    <div class="form-group">
                        <label class="col-md-12">Hình ảnh</label>
                        <div class="col-md-12">
                            <?php if (isset($model) && $model->thumb != ''): ?>
                                <input type="file" name="thumb" class="dropify" data-default-file="<?php echo base_url($model->thumb) ?>" />
                            <?php else: ?>
                                <input type="file" name="thumb" class="dropify" />
                            <?php endif ?>
                            <input type="checkbox" value="1" name="remove_img" id="rm-img" style="display: none">
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 text-center">
                    <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Lưu</button>
                    <a href="<?php echo base_url('admin/category')?>" class="btn btn-inverse waves-effect waves-light">Hủy</a>
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
