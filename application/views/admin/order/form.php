<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title"><?php echo $title ?></h4>
    </div>
    <?php
        $breadcrumb = [base_url('admin/system') => 'Dashboard', base_url('admin/order') => 'Quản lý đơn đặt hàng', 'active' => $title];
        $this->load->view('admin/layouts/breadcrumbs', ['breadcrumb' => $breadcrumb]);
     ?>
    <!-- /.col-lg-12 -->
</div>
<!-- .row -->
<div class="row">
    <div class="col-sm-12">
        <div class="white-box">
            <div class="row">
                <?php echo form_open_multipart($link_submit, ['class' => 'form-horizontal']); ?>
                <div class="col-xs-12">
                    <h3>Thông tin đơn hàng</h3>
                </div>
                <div class="col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label class="col-md-12">Mã đơn hàng</label>
                        <div class="col-md-12">
                            <input type="text" class="form-control" value="<?php echo (isset($model)) ? $model->number_invoice : ''?>" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12">Email</label>
                        <div class="col-md-12">
                            <input type="text" class="form-control" value="<?php echo (isset($model)) ? $model->email : ''?>" disabled>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-12">Trạng thái</label>
                        <div class="col-md-12">
                            <select name="Orders[status]" class="form-control">
                                <?php 
                                if (isset($model)) :
                                    foreach ($model->all_status as $status => $status_name):
                                        $selected = $model->status == $status ? 'selected' : '';
                                        echo '<option value="'.$status.'" '.$selected.'>'.$status_name.'</option>';
                                    endforeach; 
                                endif;
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                
                <div class="col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label class="col-md-12">Tên khách hàng</label>
                        <div class="col-md-12">
                            <input type="text" class="form-control" value="<?php echo (isset($model)) ? $model->getCustomerName() : ''?>" disabled>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-12">Ngày đặt hàng</label>
                        <div class="col-md-12">
                            <input type="text" class="form-control" value="<?php echo (isset($model)) ? $model->get_order_date() : ''?>" disabled>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12">
                    <h3>Thông tin địa chỉ giao hàng</h3>
                </div>

                <div class="col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label class="col-md-12">Tên người nhận</label>
                        <div class="col-md-12">
                            <input type="text" class="form-control" value="<?php echo (isset($billing)) ? $billing->getFullName() : ''?>" disabled>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-12">Tên công ty</label>
                        <div class="col-md-12">
                            <input type="text" class="form-control" value="<?php echo (isset($billing)) ? $billing->company_name : ''?>" disabled>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-12">Mã số thuế</label>
                        <div class="col-md-12">
                            <input type="text" class="form-control" value="<?php echo (isset($billing)) ? $billing->tax_code : ''?>" disabled>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-12">Điện thoại bàn</label>
                        <div class="col-md-12">
                            <input type="text" class="form-control" value="<?php echo (isset($billing)) ? $billing->phone : ''?>" disabled>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-12">Chứng minh nhân dân</label>
                        <div class="col-md-12">
                            <input type="text" class="form-control" value="<?php echo (isset($billing)) ? $billing->identity_card : ''?>" disabled>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-12">Thông tin thêm</label>
                        <div class="col-md-12">
                            <textarea class="form-control" disabled><?php echo (isset($billing)) ? $billing->more_info : '' ?></textarea>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label class="col-md-12">Quốc gia</label>
                        <div class="col-md-12">
                            <input type="text" class="form-control" value="Việt Nam" disabled>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-12">Địa chỉ công ty</label>
                        <div class="col-md-12">
                            <input type="text" class="form-control" value="<?php echo (isset($billing)) ? $billing->company_address : ''?>" disabled>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-12">Mã bưu chính</label>
                        <div class="col-md-12">
                            <input type="text" class="form-control" value="<?php echo (isset($billing)) ? $billing->postal_code : ''?>" disabled>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-12">Điện thoại di động</label>
                        <div class="col-md-12">
                            <input type="text" class="form-control" value="<?php echo (isset($billing)) ? $billing->cell_phone : ''?>" disabled>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-12">Địa chỉ cá nhân</label>
                        <div class="col-md-12">
                            <input type="text" class="form-control" value="<?php echo (isset($billing)) ? $billing->address : ''?>" disabled>
                        </div>
                    </div>
                </div>

                <div class="row m-t-30">
                    <div class="col-sm-12">
                        <div class="table-responsive">
                            <table id="example23" class="display nowrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Tên sản phẩm</th>
                                        <th>Màu sắc</th>
                                        <th>Số lượng</th>
                                        <th>Thông tin thêm</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php if (isset($order_details) && count($order_details) > 0): 
                                    foreach ($order_details as $detail) :?>
                                        <tr>
                                            <td><?php echo $detail->getProductName() ?></td>
                                            <td><span style="background-color: <?php echo $detail->getColor() ?>; color: <?php echo $detail->getColor() ?>"><?php echo $detail->getColor() ?></span></td>
                                            <td><?php echo $detail->quantity ?></td>
                                            <td><?php echo $detail->getMoreInfo() ?></td>
                                        </tr>
                                <?php endforeach;
                                endif ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12">
                    <div class="text-center">
                        <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Lưu</button>
                        <a href="<?php echo base_url('admin/order')?>" class="btn btn-inverse waves-effect waves-light">Hủy</a>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#example23').DataTable();
    })
</script>
