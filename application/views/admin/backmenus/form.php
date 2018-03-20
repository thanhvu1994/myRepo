<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title"><?php echo $title ?></h4>
    </div>
    <?php
        $breadcrumb = [base_url('admin/system') => 'Dashboard', base_url('admin/backmenus') => 'Backmenus', 'active' => $title];
        $this->load->view('admin/layouts/breadcrumbs', ['breadcrumb' => $breadcrumb]);
     ?>
    <!-- /.col-lg-12 -->
</div>
<!-- .row -->
<div class="row">
    <div class="col-sm-12">
        <div class="white-box">
            <?php echo form_open($link_submit, ['class' => 'form-horizontal']); ?>
                <div class="form-group">
                    <label class="col-md-12">Menu Name</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" value="<?php echo (isset($model)) ? $model->menu_name : ''?>" name="menu_name">
                        <?php echo form_error('menu_name'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12">Menu Link</label>
                    <div class="col-md-12">
                        <input type="text" name="menu_link" class="form-control" value="<?php echo (isset($model)) ? $model->menu_link : ''?>">
                        <?php echo form_error('menu_link'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12">Display Order</label>
                    <div class="col-md-12">
                        <input type="text" name="display_order" class="form-control" value="<?php echo (isset($model)) ? $model->display_order : ''?>">
                        <?php echo form_error('display_order'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12">Icon</label>
                    <div class="col-md-12">
                        <input type="text" name="icon" class="form-control" value="<?php echo (isset($model)) ? $model->icon : ''?>">
                        <?php echo form_error('icon'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-12">Parent</label>
                    <div class="col-sm-12">
                        <select class="form-control" name="parent_id">
                            <option> -- select an parent -- </option>
                            <?php
                            foreach ($dropdown_menu as $menu_id => $menu_name): 
                                $selected = ($model->parent_id == $menu_id) ? 'selected' : '';
                            ?>
                                <option value="<?php echo $menu_id?>" <?php echo $selected?>><?php echo $menu_name?></option>
                            <?php endforeach ?>
                        </select>
                        <?php echo form_error('parent_id'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="checkbox checkbox-success">
                            <?php $checked = isset($model) && $model->show_in_menu == true ? 'checked' : '' ?>
                            <input id="show-menu" name="show_in_menu" type="checkbox" <?php echo $checked ?>>
                            <label for="show-menu">Show In Menu</label>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                <a href="<?php echo base_url('admin/backmenus')?>" class="btn btn-inverse waves-effect waves-light">Cancel</a>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
