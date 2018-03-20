<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title"><?php echo $title ?></h4>
    </div>
    <?php
        $breadcrumb = [base_url('admin/system') => 'Dashboard', base_url('admin/user') => 'Quản lý người dùng', base_url('admin/address/index/'.$model->user_id) => 'Danh sách địa chỉ', 'active' => $title];
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
                        <tbody>
                            <tr>
                                <th>Tên địa chỉ:</th>
                                <td><?php echo $model->title ?></td>
                            </tr>
                            <tr>
                                <th>Tên khách hàng:</th>
                                <td><?php echo $model->getFullName() ?></td>
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
                                <th>Địa chỉ công ty:</th>
                                <td><?php echo $model->company_address ?></td>
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
                                <th>Chứng minh nhân dân:</th>
                                <td><?php echo $model->identity_card ?></td>
                            </tr>
                            <tr>
                                <th>Địa chỉ khách hàng:</th>
                                <td><?php echo $model->address ?></td>
                            </tr>
                            <tr>
                                <th>Thông tin thêm: </th>
                                <td><?php echo $model->more_info ?></td>
                            </tr>
                            <tr>
                                <th>Ngày tạo:</th>
                                <td><?php echo $model->get_created_date() ?></td>
                            </tr>
                            <tr>
                                <th>Ngày cập nhật:</th>
                                <td><?php echo $model->get_update_date() ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.row -->
