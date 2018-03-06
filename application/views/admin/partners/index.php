<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title"><?php echo $title ?></h4>
    </div>
    <?php
        $breadcrumb = [base_url('admin/site') => 'Dashboard', 'active' => 'Partners'];
        $this->load->view('admin/layouts/breadcrumbs', ['breadcrumb' => $breadcrumb]);
     ?>
    <!-- /.col-lg-12 -->
</div>
<!-- /row -->
<div class="row">
    <div class="col-sm-12">
        <div class="white-box">
            <div class="row m-b-30">
                <div class="col-lg-2 col-sm-4 col-xs-12">
                    <a href="<?php echo base_url('admin/partners/create')?>" class="btn btn-block btn-default">Thêm mới</a>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="table-responsive">
                        <table id="example23" class="display nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Tên đối tác</th>
                                    <th>Logo</th>
                                    <th>Publish</th>
                                    <th>Ngày tạo</th>
                                    <th>Ngày cập nhật</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($models as $model): ?>
                                    <tr id="tr-<?php echo $model->id?>">
                                        <td><?php echo $model->name ?></td>
                                        <td><img src="<?php echo $model->get_image() ?>" alt="<?php echo $model->name ?>" width="100"></td>
                                        <td><?php echo $model->get_publish() ?></td>
                                        <td><?php echo $model->get_created_date() ?></td>
                                        <td><?php echo $model->get_update_date() ?></td>
                                        <td class="button-column">
                                            <a href="javascript:void(0)" class="button-view" data-id="<?php echo $model->id?>"><i class="fa fa-eye"></i></a>
                                            <a href="<?php echo base_url('admin/partners/update/'.$model->id)?>"><i class="fa fa-edit"></i></a>
                                            <a href="javascript:void(0)" class="button-delete" title="Delete" data-id="<?php echo $model->id?>"><i class="fa fa-trash-o"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.row -->

<div id="responsive-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#vng" aria-controls="vng" role="tab" data-toggle="tab" aria-expanded="true"><span class="visible-xs"><i class="ti-home"></i></span><span class="hidden-xs"> Tiếng việt</span></a></li>
                    <li role="presentation" class=""><a href="#eng" aria-controls="eng" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="ti-user"></i></span> <span class="hidden-xs">Tiếng Anh</span></a></li>
                </ul>
                <form class="form-horizontal">
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="vng">
                            <div class="form-group">
                                <label for="name" class="control-label col-md-3">Tên đối tác:</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" id="name" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="display_order" class="control-label col-md-3">Mô tả:</label>
                                <div class="col-md-8">
                                    <textarea type="text" class="form-control" id="description" disabled></textarea>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="eng">
                            <div class="form-group">
                                <label for="name_en" class="control-label col-md-3">Tên đối tác:</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" id="name_en" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="display_order" class="control-label col-md-3">Mô tả:</label>
                                <div class="col-md-8">
                                    <textarea type="text" class="form-control" id="description_en" disabled></textarea>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="icon" class="control-label col-md-3">Logo:</label>
                        <div class="col-md-8">
                            <img src="" id="logo" width="100">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="icon" class="control-label col-md-3">Đường dẫn:</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="url" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="show_in_menu" class="control-label col-md-3">Publish:</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="publish" disabled>
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
</div>

<script>
    $(document).ready(function() {
        $('#example23').DataTable();
        $('.button-delete').click(function() {
            if (confirm('Are you sure want to delete this item?')) {
                var id = $(this).data('id');
                $.ajax({
                    url: '<?php echo base_url('admin/partners/delete')?>'+'/'+id,
                    type: 'POST',
                    success: function (returndata) {
                        if (returndata == 1) {
                            $('#tr-'+id).remove();
                        }
                    }
                });
            }
        });

        $('.button-view').click(function() {
            var id = $(this).data('id');
            $.ajax({
                url: '<?php echo base_url('admin/partners/view')?>'+'/'+id,
                type: 'POST',
                dataType: "json",
                success: function (returndata) {
                    if (returndata) {
                        $.each( returndata, function( key, value ) {
                            if (key == 'logo') {
                                $('#'+key).attr('src', value)
                            } else {
                                $('#'+key).val(value);
                            }
                        });
                    }
                    $('#responsive-modal').modal();
                },
            });
        });
    });
</script>
