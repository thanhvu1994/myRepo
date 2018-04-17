<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title"><?php echo $title ?></h4>
    </div>
    <?php
        $breadcrumb = [base_url('admin/system') => 'Dashboard', 'active' => 'Backmenus'];
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
                    <button data-href="<?php echo base_url('admin/contactOrder/bulkDelete')?>" class="btn btn-danger bulk-delete"><i class="fa fa-trash-o"></i> Xóa tất cả</button>
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
                                    <th>Loại</th>
                                    <th>Tên khách hàng</th>
                                    <th>Tên công ty</th>
                                    <th>Mã số thuế</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Ngày tạo</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($models as $model): ?>
                                    <tr id="tr-<?php echo $model->id?>">
                                        <td class="text-center check-element"><input type="checkbox" name="select[]" value="<?php echo $model->id ?>"></td>
                                        <td><?php echo $model->getType() ?></td>
                                        <td><?php echo $model->customer_name ?></td>
                                        <td><?php echo $model->company_name ?></td>
                                        <td><?php echo $model->tax_code ?></td>
                                        <td><?php echo $model->getProductName() ?></td>
                                        <td><?php echo $model->get_created_date() ?></td>
                                        <td class="button-column">
                                            <a class="btn btn-danger" href="<?php echo base_url('admin/contactOrder/view/'.$model->id)?>" title="Xem"><i class="fa fa-eye"></i></a>
                                            <a class="btn btn-danger button-delete" href="javascript:void(0)" title="Xóa" data-id="<?php echo $model->id?>"><i class="fa fa-trash-o"></i></a>
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

<div id="responsive-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal">
                    <div class="form-group">
                        <label for="menu_name" class="control-label col-md-3">Menu Name:</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="menu_name" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="menu_link" class="control-label col-md-3">Menu Link:</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="menu_link" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="display_order" class="control-label col-md-3">Display Order:</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="display_order" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="icon" class="control-label col-md-3">Icon:</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="icon" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="parent_id" class="control-label col-md-3">Parent:</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="parent_id" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="show_in_menu" class="control-label col-md-3">Show in menu:</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="show_in_menu" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="created_date" class="control-label col-md-3">Created Date:</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="created_date" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="update_date" class="control-label col-md-3">Update Date:</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="update_date" disabled>
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
                    url: '<?php echo base_url('admin/contactOrder/delete')?>'+'/'+id,
                    type: 'POST',
                    success: function (returndata) {
                        if (returndata == 1) {
                            $('#tr-'+id).remove();
                        }
                    }
                });
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
