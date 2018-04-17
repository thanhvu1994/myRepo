 <div class="row bg-title">
     <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title"><?php echo $title ?></h4>
     </div>
     <?php
        $breadcrumb = [base_url('admin/system') => 'Dashboard', 'active' => $title];
        $this->load->view('admin/layouts/breadcrumbs', ['breadcrumb' => $breadcrumb]);
     ?>
        <!-- /row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <div class="row m-b-30">
                        <a href="<?php echo base_url('admin/product/create')?>" class="btn btn-create"><i class="fa fa-plus"></i> Thêm mới</a>
                        <btn data-href="<?php echo base_url('admin/product/bulkDelete')?>" class="btn btn-danger bulk-delete"><i class="fa fa-trash-o"></i> Xóa tất cả</btn>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="table-responsive">
                                <form enctype="multipart/form-data" id="index_grid-bulk" action="" method="post">
                                    <table id="example23" class="display nowrap" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th class="no-sort text-center"><input type="checkbox" name="" id="select_all"></th>
                                                <th>Mã</th>
                                                <th>Tên</th>
                                                <th>Danh Mục</th>
                                                <th>Hình Đại Diện</th>
                                                <th>Giá</th>
                                                <th>Giá Khuyến Mãi</th>
                                                <th>Hiển thị</th>
                                                <th>Ngày tạo</th>
                                                <th>Hành động</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($models as $model): ?>
                                                <tr id="tr-<?php echo $model->id?>">
                                                    <td class="text-center check-element"><input type="checkbox" name="select[]" value="<?php echo $model->id ?>"></td>
                                                    <td><?php echo $model->product_code; ?></td>
                                                    <td><?php echo $model->product_name; ?></td>
                                                    <td><?php echo $model->getCategory(); ?></td>
                                                    <td><img class="center-cropped" src="<?php echo $model->getFirstImage(); ?>" /></td>
                                                    <td><?php echo number_format($model->price, 2); ?></td>
                                                    <td><?php echo number_format($model->sale_price, 2); ?></td>
                                                    <td><?php $checked = $model->status ? 'checked' : '' ?>
                                                        <input type="checkbox" <?php echo $checked ?> class="js-switch publish-ajax" data-color="#13dafe" data-id="<?php echo $model->id ?>" value="1"/>
                                                    </td>
                                                    <td><?php echo $model->get_created_date() ?></td>
                                                    <td class="button-column">
                                                        <!--<a href="javascript:void(0)" class="button-view" data-id="<?php /*echo $model->id*/?>"><i class="fa fa-eye"></i></a>-->
                                                        <a class="btn btn-danger" href="<?php echo base_url('admin/product/update/'.$model->id)?>"><i class="fa fa-edit"></i></a>
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
        <!-- /.row -->
    <!-- /.container-fluid -->
    <footer class="footer text-center"> 2017 &copy; Agile Admin brought to you by wrappixel.com </footer>
</div>

<!-- <div id="responsive-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal">
                    <div class="form-group">
                        <label for="menu_name" class="control-label col-md-3">Mã:</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="product_code" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="menu_link" class="control-label col-md-3">Tên:</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="product_name" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="display_order" class="control-label col-md-3">Tiêu Đề:</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="title" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="icon" class="control-label col-md-3">Nội Dung:</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="content" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="icon" class="control-label col-md-3">Mô Tả:</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="description" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="icon" class="control-label col-md-3">Giá Cũ:</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="price" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="icon" class="control-label col-md-3">Giá Mới:</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="sale_price" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="icon" class="control-label col-md-3">Danh Mục:</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="category" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="show_in_menu" class="control-label col-md-3">Ngôn Ngữ:</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="language" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="show_in_menu" class="control-label col-md-3">Trạng Thái:</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="status" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="created_date" class="control-label col-md-3">Ngày Tạo:</label>
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
</div> -->
<script>
    $(document).ready(function() {
        $('#example23').DataTable();
        $('.button-delete').click(function() {
            if (confirm('Are you sure want to delete this item?')) {
                var id = $(this).data('id');
                $.ajax({
                    url: '<?php echo base_url('admin/product/delete')?>'+'/'+id,
                    type: 'POST',
                    success: function (returndata) {
                        $('#tr-'+id).remove();
                    }
                });
            }
        });

        // $('.button-view').click(function() {
        //     var id = $(this).data('id');
        //     $.ajax({
        //         url: '<?php echo base_url('admin/product/view')?>'+'/'+id,
        //         type: 'POST',
        //         contentType: "application/json; charset=utf-8",
        //         dataType: "json",
        //         success: function (returndata) {
        //             if (returndata) {
        //                 $.each( returndata, function( key, value ) {
        //                     $('#'+key).val(value);
        //                 });
        //             }
        //             $('#responsive-modal').modal();
        //         },
        //     });
        // });

        $('.publish-ajax').on('change', function() {
            var id = $(this).data('id');
            var publish;
            if ($(this).is(':checked')) {
                publish = 1;
            } else {
                publish = 0;
            }

            $.ajax({
                url: '<?php echo base_url('admin/product/ajaxPublish')?>',
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
        $('#select_all').change(function() {
            var checkboxes = $(this).closest('table').find(':checkbox');
            checkboxes.prop('checked', $(this).is(':checked'));
        });

        $('#example23_filter').prepend('<label for="myInpput">Danh Mục:</label><select style="margin-right: 10px;" id="myInput"><option value="">Tất Cả</option></select>');

        $(function() {
            var items=[], options=[];

            $('#example23 tbody tr td:nth-child(4)').each( function(){
                items.push( $(this).text() );
            });

            var items = $.unique( items );

            $.each( items, function(i, item){
                options.push('<option value="' + item + '">' + item + '</option>');
            });

            $('#myInput').append( options.join() );
        });

        $('#myInput').on('change', function(){
            var cate = $(this).val();
            var count = 0;
            var length = $('#example23_length select').first().val();
            if (cate.length < 1) {
                $("#example23 tr").css("display", "");
                count = $('#example23 tr').length - 1;
            } else {
                $("#example23 tbody tr:not(:contains('"+cate+"'))").css("display", "none");
                $("#example23 tbody tr:contains('"+cate+"')").css("display", "");
                count = $("#example23 tbody tr:contains('"+cate+"')").length;
            }

            if(count >= length){
                $('#example23_info').html('Showing 1 to '+length+' of '+count+' entities');
            }else{
                $('#example23_info').html('Showing 1 to '+count+' of '+count+' entities');
            }

        });
    });
</script>
 <style>
     .center-cropped {
         object-fit: none; /* Do not scale the image */
         object-position: center; /* Center the image within the element */
         height: 100px;
         /*width: 150px;*/
     }
 </style>
