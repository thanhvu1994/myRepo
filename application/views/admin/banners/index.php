<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title"><?php echo $title ?></h4>
    </div>
    <?php
        $breadcrumb = [base_url('admin/system') => 'Dashboard', 'active' => $title];
        $this->load->view('admin/layouts/breadcrumbs', ['breadcrumb' => $breadcrumb]);
     ?>
    <!-- /.col-lg-12 -->
</div>
<!-- /row -->

<div class="row">
    <div class="col-sm-12">
        <div class="white-box">
            <div class="row m-b-30">
                <div class="col-xs-12">
                    <a href="<?php echo base_url('admin/banners/create')?>" class="btn btn-create"><i class="fa fa-plus"></i> Thêm mới</a>
                    <button data-href="<?php echo base_url('admin/banners/bulkDelete')?>" class="btn btn-danger bulk-delete"><i class="fa fa-trash-o"></i> Xóa tất cả</button>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="table-responsive">
                        <form enctype="multipart/form-data" id="index_grid-bulk" action="" method="post">
                            <table id="example23" class="display nowrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th class="no-sort text-center"><input type="checkbox" name="" id="select_all"></th>
                                        <th>Tiêu đề Slider</th>
                                        <th>Tên nút Slider</th>
                                        <th>Đường dẫn</th>
                                        <th>Hình ảnh</th>
                                        <th>Hiển thị</th>
                                        <th>Ngày cập nhật</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($models as $model): ?>
                                        <tr id="tr-<?php echo $model->id?>">
                                            <td class="text-center check-element"><input type="checkbox" name="select[]" value="<?php echo $model->id ?>"></td>
                                            <td><?php echo $model->name ?></td>
                                            <td><?php echo $model->button_name ?></td>
                                            <td><?php echo $model->url ?></td>
                                            <td>
                                                <?php if (isset($model) && $model->image != ''): ?>
                                                    <img src="<?php echo $model->get_image() ?>" alt="<?php echo $model->name ?>" width="100">
                                                <?php endif ?>
                                            </td>
                                            <td><?php $checked = $model->publish ? 'checked' : '' ?>
                                                <input type="checkbox" <?php echo $checked ?> class="js-switch publish-ajax" data-color="#13dafe" data-id="<?php echo $model->id ?>" value="1"/>
                                            </td>
                                            <td><?php echo $model->get_update_date() ?></td>
                                            <td class="button-column">
                                                <a class="btn btn-danger" href="<?php echo base_url('admin/banners/update/'.$model->id)?>" title="Cập nhật"><i class="fa fa-edit"></i></a>
                                                <a href="javascript:void(0)" class="button-delete btn btn-danger" title="Xóa" data-id="<?php echo $model->id?>"><i class="fa fa-trash-o"></i></a>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.row -->

<script>
    $(document).ready(function() {
        $('#example23').DataTable();

        $('#select_all').change(function() {
            var checkboxes = $(this).closest('table').find(':checkbox');
            checkboxes.prop('checked', $(this).is(':checked'));
        });
        $("input[type='checkbox'].check-element").change(function(){
            var a = $("input[type='checkbox'].check-element");
            if(a.length == a.filter(":checked").length){
                alert('all checked');
            }
        });
        $('.button-delete').click(function() {
            if (confirm('Are you sure want to delete this item?')) {
                var id = $(this).data('id');
                $.ajax({
                    url: '<?php echo base_url('admin/banners/delete')?>'+'/'+id,
                    type: 'POST',
                    success: function (returndata) {
                        if (returndata == 1) {
                            $('#tr-'+id).remove();
                        }
                    }
                });
            }
        });
        $('.publish-ajax').on('change', function() {
            var id = $(this).data('id');
            var publish;
            if ($(this).is(':checked')) {
                publish = 1;
            } else {
                publish = 0;
            }

            $.ajax({
                url: '<?php echo base_url('admin/banners/ajaxPublish')?>',
                type: 'POST',
                data: {id: id, publish: publish},
                success: function (returndata) {
                }
            });
        });
        $('.bulk-delete').click(function() {
            var atLeastOneIsChecked = $('input[name=\"select[]\"]:checked').length > 0;
            var actionUrl = $('.bulk-delete').data('href');
            if (!atLeastOneIsChecked)
            {
                alert('Chọn ít nhất 1 dữ liệu bạn muốn xóa.');
            }
            else if (window.confirm('Bạn có chắc muốn xóa những dữ liệu đã chọn?'))
            {
                var formObj = $('.table-responsive').find('form');
                if (formObj)
                {
                    document.getElementById(formObj.attr('id')).action = actionUrl;
                    document.getElementById(formObj.attr('id')).submit();
                }
            }
        });
    });
</script>
