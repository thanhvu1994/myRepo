<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title"><?php echo $title ?></h4>
    </div>
    <?php
        $breadcrumb = [base_url('admin/system') => 'Dashboard', base_url('admin/user') => 'Quản lý người dùng', 'active' => $title];
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
                    <button data-href="<?php echo base_url('admin/address/bulkDelete')?>" class="btn btn-danger bulk-delete"><i class="fa fa-trash-o"></i> Xóa tất cả</button>
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
                                        <th>Tên địa chỉ</th>
                                        <th>Tên khách hàng</th>
                                        <th>Điện thoại bàn</th>
                                        <th>Điện thoại di dộng</th>
                                        <th>Ngày cập nhật</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($models as $model): ?>
                                        <tr id="tr-<?php echo $model->id?>">
                                            <td class="text-center check-element"><input type="checkbox" name="select[]" value="<?php echo $model->id ?>"></td>
                                            <td><?php echo $model->title ?></td>
                                            <td><?php echo ucwords($model->getFullName()) ?></td>
                                            <td><?php echo $model->phone ?></td>
                                            <td><?php echo $model->cell_phone ?></td>
                                            <td><?php echo $model->get_update_date() ?></td>
                                            <td class="button-column">
                                                <a class="btn btn-danger" href="<?php echo base_url('admin/address/view/'.$model->id)?>" title="Xem"><i class="fa fa-eye"></i></a>
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
                    url: '<?php echo base_url('admin/address/delete')?>'+'/'+id,
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
