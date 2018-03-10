<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title"><?php echo $title ?></h4>
    </div>
    <?php
        $breadcrumb = [base_url('admin/site') => 'Dashboard', base_url('admin/category') => 'Danh mục', 'active' => $title];
        $this->load->view('admin/layouts/breadcrumbs', ['breadcrumb' => $breadcrumb]);
     ?>
    <!-- /.col-lg-12 -->
</div>
<!-- .row -->
<div class="row">
    <div class="col-sm-12">
        <div class="white-box">
            <!-- Tab panes -->
            <?php echo form_open_multipart($link_submit, ['class' => 'form-horizontal']); ?>
                <div class="form-group">
                    <label class="col-md-12">Tên danh mục</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" value="<?php echo (isset($model)) ? $model->category_name : ''?>" name="Categories[category_name]" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12">Tiêu đề</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" value="<?php echo (isset($model)) ? $model->title : ''?>" name="title">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12">Mô tả</label>
                    <div class="col-md-12">
                        <textarea class="form-control" rows="5" name="Categories[description]"><?php echo (isset($model)) ? $model->description : ''?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12">Đường dẫn</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" value="<?php echo (isset($model)) ? $model->url : ''?>" name="Categories[url]">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-12">Ngôn ngữ</label>
                    <div class="col-md-12">
                        <?php $language = isset($model) ? $model->language : 'vn';?>
                        <select class="form-control" name="Categories[language]" id="language">
                            <?php foreach ($this->categories->language as $key => $value): 
                                    $selected = ($language == $key) ? 'selected' : ''; ?>
                                <option value="<?php echo $key?>" <?php echo $selected?>><?php echo $value?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-12">Lớp cha</label>
                    <div class="col-sm-12">
                        <?php
                            $id = isset($model) ? $model->id : 0;
                            $parent_id = isset($model) ? $model->parent_id : 0;
                            $categories = $this->categories->get_dropdown_category($id);
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
                <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Lưu</button>
                <a href="<?php echo base_url('admin/category')?>" class="btn btn-inverse waves-effect waves-light">Hủy</a>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#language').change(function() {
            var id = '<?php echo isset($model) ? $model->id : 0 ?>'
            $.ajax({
                url: '<?php echo base_url('admin/category/changeParent')?>',
                type: 'POST',
                data: {language: $(this).val(), id: id},
                success: function (returndata) {
                    $('#parent_id').html(returndata);
                },
            });
        });
    });
</script>
