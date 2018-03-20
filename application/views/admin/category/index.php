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
                <a href="<?php echo base_url('admin/category/create')?>" class="btn btn-create"><i class="fa fa-plus"></i> Thêm mới</a>
                <button data-href="<?php echo base_url('admin/category/bulkDelete')?>" class="btn btn-danger bulk-delete"><i class="fa fa-trash-o"></i> Xóa tất cả</button>
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
                                        <th>Ngày cập nhật</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($models as $model):
                                        echo $model->getTableCategory();
                                    endforeach ?>
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
        $('#example23').DataTable({
            "order": []
        });

        $('.btn-refresh').click(function() {
            alert($('#search-category').val());
        });
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
