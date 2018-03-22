 <div class="row bg-title">
     <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title"><?php echo $title; ?></h4>
     </div>
     <?php
        $breadcrumb = [base_url('admin/system') => 'Dashboard', 'active' => 'Posts'];
        $this->load->view('admin/layouts/breadcrumbs', ['breadcrumb' => $breadcrumb]);
     ?>
        <!-- /row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <div class="row m-b-30">
                        <a href="<?php echo base_url('admin/project/create')?>" class="btn btn-create"><i class="fa fa-plus"></i> Thêm mới</a>
                        <button data-href="<?php echo base_url('admin/project/bulkDelete')?>" class="btn btn-danger bulk-delete"><i class="fa fa-trash-o"></i> Xóa tất cả</button>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="table-responsive">
                                <form enctype="multipart/form-data" id="index_grid-bulk" action="" method="post">
                                <table id="example23" class="display nowrap" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th class="no-sort text-center"><input type="checkbox" name="" id="select_all"></th>
                                            <th>Tiêu Đề</th>
                                            <th>Ngày tạo</th>
                                            <th>Hành Động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($models as $model): ?>
                                            <tr id="tr-<?php echo $model->id?>">
                                                <td class="text-center check-element"><input type="checkbox" name="select[]" value="<?php echo $model->id ?>"></td>
                                                <td><?php echo $model->title; ?></td>
                                                <td><?php echo $model->get_created_date() ?></td>
                                                <td class="button-column">
                                                    <a class="btn btn-danger" href="<?php echo base_url('admin/project/update/'.$model->id)?>"><i class="fa fa-edit"></i></a>
                                                    <a class="btn btn-danger button-delete" href="javascript:void(0)" title="Delete" data-id="<?php echo $model->id?>"><i class="fa fa-trash-o"></i></a>
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
    <footer class="footer text-center"> 2017 &copy; Agile Admin brought to you by wrappixel.com </footer>
</div>

<div id="responsive-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal">
                    <div class="form-group">
                        <label for="menu_name" class="control-label col-md-3">Tiêu Đề:</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="title" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="menu_link" class="control-label col-md-3">Miêu Tả:</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="description" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="display_order" class="control-label col-md-3">Nội Dung Ngắn:</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="short_content" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="icon" class="control-label col-md-3">Nội Dung:</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="content" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="parent_id" class="control-label col-md-3">Ảnh Đại Diện:</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="featured_image" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="show_in_menu" class="control-label col-md-3">Slug:</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="slug" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="show_in_menu" class="control-label col-md-3">Ngôn Ngữ:</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="language" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="show_in_menu" class="control-label col-md-3">Loại:</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="type" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="created_date" class="control-label col-md-3">Ngày tạo:</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="created_date" disabled>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#example23').DataTable();
        $('.button-delete').click(function() {
            if (confirm('Are you sure want to delete this item?')) {
                var id = $(this).data('id');
                $.ajax({
                    url: '<?php echo base_url('admin/project/delete')?>'+'/'+id,
                    type: 'POST',
                    success: function (returndata) {
                        $('#tr-'+id).remove();
                    }
                });
            }
        });

        $('.button-view').click(function() {
            var id = $(this).data('id');
            $.ajax({
                url: '<?php echo base_url('admin/project/view')?>'+'/'+id,
                type: 'POST',
                contentType: "application/json; charset=utf-8",
                dataType: "json",
                success: function (returndata) {
                    if (returndata) {
                        $.each( returndata, function( key, value ) {
                            $('#'+key).val(value);
                        });
                    }
                    $('#responsive-modal').modal();
                },
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
        $('#select_all').change(function() {
            var checkboxes = $(this).closest('table').find(':checkbox');
            checkboxes.prop('checked', $(this).is(':checked'));
        });
    });
</script>
