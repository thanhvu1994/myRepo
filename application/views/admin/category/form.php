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
            <?php echo form_open_multipart($link_submit, ['class' => 'form-horizontal']); ?>
                <div class="form-group">
                    <label class="col-md-12">Tên danh mục</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" value="<?php echo (isset($model)) ? $model->category_name : ''?>" name="category_name">
                        <?php echo form_error('category_name'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12">Tiêu đề</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" value="<?php echo (isset($model)) ? $model->title : ''?>" name="title">
                        <?php echo form_error('title'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12">Đường dẫn</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" value="<?php echo (isset($model)) ? $model->url : ''?>" name="title">
                        <?php echo form_error('url'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12">Mô tả</label>
                    <div class="col-md-12">
                        <textarea class="form-control" rows="5" name="description"><?php echo (isset($model)) ? $model->description : ''?></textarea>
                        <?php echo form_error('description'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-12">Parent</label>
                    <div class="col-sm-12">
                        <select class="form-control" name="parent_id">
                            <option value="0"> -- Chọn lớp cha -- </option>
                            <?php
                            $id = isset($model) ? $model->id : 0;
                            foreach ($this->categories->get_dropdown_category($id) as $category_id => $category_name): 
                                $selected = ($model->parent_id == $category_id) ? 'selected' : '';
                            ?>
                                <option value="<?php echo $category_id?>" <?php echo $selected?>><?php echo $category_name?></option>
                            <?php endforeach ?>
                        </select>
                        <?php echo form_error('parent_id'); ?>
                    </div>
                </div>

                <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Lưu</button>
                <a href="<?php echo base_url('admin/category')?>" class="btn btn-inverse waves-effect waves-light">Hủy</a>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
