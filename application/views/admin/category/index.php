<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title"><?php echo $title ?></h4>
    </div>
    <?php
        $breadcrumb = [base_url('admin/site') => 'Dashboard', 'active' => $title];
        $this->load->view('admin/layouts/breadcrumbs', ['breadcrumb' => $breadcrumb]);
     ?>
    <!-- /.col-lg-12 -->
</div>
<!-- /row -->
<div class="row">
    <div class="col-sm-12">
        <div class="white-box">
            <div class="row m-b-30">
                <a href="<?php echo base_url('admin/category/create')?>" class="btn btn-create"><i class="fa fa-plus"></i> Thêm mới</a>
                <btn data-href="<?php echo base_url('admin/category/bulkDelete')?>" class="btn btn-danger bulk-delete"><i class="fa fa-trash-o"></i> Xóa tất cả</btn>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="table-responsive">
                        <form enctype="multipart/form-data" id="index_grid-bulk" action="" method="post">
                            <table id="example23" class="display nowrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th class="no-sort text-center"><input type="checkbox" name="" id="select_all"></th>
                                        <th>Tên danh mục</th>
                                        <th>Danh mục cha</th>
                                        <th>Loại</th>
                                        <th>Ngày cập nhật</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($models as $model): ?>
                                        <tr id="tr-<?php echo $model->id?>">
                                            <td class="text-center check-element"><input type="checkbox" name="select[]" value="<?php echo $model->id ?>"></td>
                                            <td><?php echo $model->category_name ?></td>
                                            <td><?php echo $model->get_parent_name() ?></td>
                                            <td><?php echo ucfirst($model->type) ?></td>
                                            <td><?php echo $model->get_update_date() ?></td>
                                            <td class="button-column">
                                                <!-- <a href="javascript:void(0)" class="button-view" data-id="<?php echo $model->id?>"><i class="fa fa-eye"></i></a> -->
                                                <a href="<?php echo base_url('admin/category/update/'.$model->id)?>"><i class="fa fa-edit"></i></a>
                                                <a href="javascript:void(0)" class="button-delete" title="Delete" data-id="<?php echo $model->id?>"><i class="fa fa-trash-o"></i></a>
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

<!-- <div id="responsive-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal">
                    <div class="form-group">
                        <label for="menu_name" class="control-label col-md-3">Tên danh mục:</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="category_name" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="menu_link" class="control-label col-md-3">Tiêu đề:</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="title" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="display_order" class="control-label col-md-3">Mô tả:</label>
                        <div class="col-md-8">
                            <textarea type="text" class="form-control" id="description" disabled></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="icon" class="control-label col-md-3">Đường dẫn:</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="url" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="icon" class="control-label col-md-3">Hình ảnh:</label>
                        <div class="col-md-8">
                            <img src="" id="thumb" width="100">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="parent_id" class="control-label col-md-3">Lớp cha:</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="parent_id" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="created_date" class="control-label col-md-3">Ngày tạo:</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="created_date" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="update_date" class="control-label col-md-3">Ngày cập nhật:</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="update_date" disabled>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div> -->

<script>
    $(document).ready(function() {
        $('#example23').DataTable();
        $('.button-delete').click(function() {
            if (confirm('Are you sure want to delete this item?')) {
                var id = $(this).data('id');
                $.ajax({
                    url: '<?php echo base_url('admin/category/delete')?>'+'/'+id,
                    type: 'POST',
                    dataType: "json",
                    success: function (returndata) {
                        if (returndata) {
                            $.each( returndata, function( key, value ) {
                                $('#tr-'+value).remove();
                            });
                        }
                    }
                });
            }
        });

        // $('.button-view').click(function() {
        //     var id = $(this).data('id');
        //     $.ajax({
        //         url: '<?php echo base_url('admin/category/view')?>'+'/'+id,
        //         type: 'POST',
        //         dataType: "json",
        //         success: function (returndata) {
        //             if (returndata) {
        //                 $.each( returndata, function( key, value ) {
        //                     if (key == 'thumb') {
        //                         $('#'+key).attr('src', value)
        //                     } else {
        //                         $('#'+key).val(value);
        //                     }
        //                 });
        //             }
        //             $('#responsive-modal').modal();
        //         },
        //     });
        // });

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
