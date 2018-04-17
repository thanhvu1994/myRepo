<style type="text/css">
    .detail-view tr th{
        width: 70%;
    }
    .detail-view thead th{
        color: blue;
    }
</style>
<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title"><?php echo $title ?></h4>
    </div>
    <?php
        $breadcrumb = [base_url('admin/system') => 'Dashboard', base_url('admin/contactOrder') => 'Liên hệ', 'active' => 'Chi tiết'];
        $this->load->view('admin/layouts/breadcrumbs', ['breadcrumb' => $breadcrumb]);
     ?>
    <!-- /.col-lg-12 -->
</div>
<!-- /row -->
<div class="row">
    <div class="col-sm-12">
        <div class="white-box">
            <div class="row">
                <div class="col-sm-12">
                    <table class="detail-view">
                        <thead>
                            <th>THÔNG TIN KHÁCH HÀNG</th>
                        </thead>
                        <tbody>
                            <tr>
                                <th>Loại:</th>
                                <td><?php echo $model->getType() ?></td>
                            </tr>
                            <tr>
                                <th>Tên khách hàng:</th>
                                <td><?php echo $model->customer_name ?></td>
                            </tr>
                            <tr>
                                <th>Tên công ty:</th>
                                <td><?php echo $model->company_name ?></td>
                            </tr>
                            <tr>
                                <th>Mã số thuế:</th>
                                <td><?php echo $model->tax_code ?></td>
                            </tr>
                            <tr>
                                <th>Địa chỉ:</th>
                                <td><?php echo $model->address ?></td>
                            </tr>
                            <tr>
                                <th>Số điện thoại:</th>
                                <td><?php echo $model->phone ?></td>
                            </tr>
                            <tr>
                                <th>Điện thoại di động:</th>
                                <td><?php echo $model->cell_phone ?></td>
                            </tr>
                            <tr>
                                <th>Địa chỉ email:</th>
                                <td><?php echo $model->email ?></td>
                            </tr>
                            <tr>
                                <th>Ngày tạo:</th>
                                <td><?php echo $model->get_created_date() ?></td>
                            </tr>
                        </tbody>
                        <thead>
                            <th>THÔNG TIN GIAO HÀNG, THANH TOÁN</th>
                        </thead>
                        <tbody class="m-t-30">
                            <tr>
                                <th>Hình thức thanh toán:</th>
                                <td><?php echo $model->get_type_payment() ?></td>
                            </tr>
                            <tr>
                                <th>Địa điểm giao hàng:</th>
                                <td><?php echo $model->shipping_address ?></td>
                            </tr>
                            <tr>
                                <th>Điện thoại người nhận hàng:</th>
                                <td><?php echo $model->shipping_name ?></td>
                            </tr>
                            <tr>
                                <th>Nhân viên kinh doanh liên hệ :</th>
                                <td><?php echo $model->business_man ?></td>
                            </tr>
                            <tr>
                                <th>Tập tin đính kèm:</th>
                                <td>
                                    <?php if (!empty($model->file)): ?>
                                        <a href="<?php echo base_url($model->file) ?>"> Tải về</a>
                                    <?php endif ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Ghi chú:</th>
                                <td><?php echo $model->comment ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row m-t-30">
                <div class="col-sm-12">
                    <div class="table-responsive">
                        <table id="example23" class="display nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Màu sắc</th>
                                    <th>Độ dày</th>
                                    <th>Chiều rộng/khổ</th>
                                    <th>Chiều dài</th>
                                    <th>Số lượng</th>
                                    <th>Ngày yêu cầu</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (count($products) > 0): 
                                foreach ($products as $product) :?>
                                    <tr>
                                        <td><?php echo $product->color ?></td>
                                        <td><?php echo $product->thickness ?></td>
                                        <td><?php echo $product->width ?></td>
                                        <td><?php echo $product->length ?></td>
                                        <td><?php echo $product->quantity ?></td>
                                        <td><?php echo $product->get_created_date() ?></td>
                                    </tr>
                                <?php endforeach;
                                endif ?>
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
    });
</script>
