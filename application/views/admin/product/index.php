 <div class="row bg-title">
     <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Data Table</h4>
     </div>
     <?php
        $breadcrumb = [base_url('admin/site') => 'Dashboard', 'active' => 'Products'];
        $this->load->view('admin/layouts/breadcrumbs', ['breadcrumb' => $breadcrumb]);
     ?>
        <!-- /row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <div class="row m-b-30">
                        <div class="col-lg-2 col-sm-4 col-xs-12">
                            <a href="<?php echo base_url('admin/product/create')?>" class="btn btn-block btn-default">Create</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="table-responsive">
                                <table id="example23" class="display nowrap" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Code</th>
                                            <th>Name</th>
                                            <th>Title</th>
                                            <th>Content</th>
                                            <th>Description</th>
                                            <th>Meta Description</th>
                                            <th>Price</th>
                                            <th>Sale Price</th>
                                            <th>Status</th>
                                            <th>Language</th>
                                            <th>Created Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($models as $model): ?>
                                            <tr id="tr-<?php echo $model->id?>">
                                                <td><?php echo $model->product_code; ?></td>
                                                <td><?php echo $model->product_name; ?></td>
                                                <td><?php echo $model->title; ?></td>
                                                <td><?php echo $model->content; ?></td>
                                                <td><?php echo $model->description; ?></td>
                                                <td><?php echo $model->meta_description; ?></td>
                                                <td><?php echo $model->price; ?></td>
                                                <td><?php echo $model->sale_price; ?></td>
                                                <td><?php echo $model->status; ?></td>
                                                <td><?php echo ($model->language == 'vn') ? 'Tiếng Việt' : 'English'; ?></td>
                                                <td><?php echo $model->get_created_date() ?></td>
                                                <td class="button-column">
                                                    <a href="javascript:void(0)" class="button-view" data-id="<?php echo $model->id?>"><i class="fa fa-eye"></i></a>
                                                    <a href="<?php echo base_url('admin/product/update/'.$model->id)?>"><i class="fa fa-edit"></i></a>
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
        <!-- .right-sidebar -->
        <div class="right-sidebar">
            <div class="slimscrollright">
                <div class="rpanel-title"> Service Panel <span><i class="ti-close right-side-toggle"></i></span> </div>
                <div class="r-panel-body">
                    <ul>
                        <li><b>Layout Options</b></li>
                        <li>
                            <div class="checkbox checkbox-info">
                                <input id="checkbox1" type="checkbox" class="fxhdr">
                                <label for="checkbox1"> Fix Header </label>
                            </div>
                        </li>
                        <li>
                            <div class="checkbox checkbox-warning">
                                <input id="checkbox2" type="checkbox" checked="" class="fxsdr">
                                <label for="checkbox2"> Fix Sidebar </label>
                            </div>
                        </li>
                        <li>
                            <div class="checkbox checkbox-success">
                                <input id="checkbox4" type="checkbox" class="open-close">
                                <label for="checkbox4"> Toggle Sidebar </label>
                            </div>
                        </li>
                    </ul>
                    <ul id="themecolors" class="m-t-20">
                        <li><b>With Light sidebar</b></li>
                        <li><a href="javascript:void(0)" theme="default" class="default-theme working">1</a></li>
                        <li><a href="javascript:void(0)" theme="green" class="green-theme">2</a></li>
                        <li><a href="javascript:void(0)" theme="gray" class="yellow-theme">3</a></li>
                        <li><a href="javascript:void(0)" theme="blue" class="blue-theme">4</a></li>
                        <li><a href="javascript:void(0)" theme="purple" class="purple-theme">5</a></li>
                        <li><a href="javascript:void(0)" theme="megna" class="megna-theme">6</a></li>
                        <li><b>With Dark sidebar</b></li>
                        <br/>
                        <li><a href="javascript:void(0)" theme="default-dark" class="default-dark-theme">7</a></li>
                        <li><a href="javascript:void(0)" theme="green-dark" class="green-dark-theme">8</a></li>
                        <li><a href="javascript:void(0)" theme="gray-dark" class="yellow-dark-theme">9</a></li>
                        <li><a href="javascript:void(0)" theme="blue-dark" class="blue-dark-theme">10</a></li>
                        <li><a href="javascript:void(0)" theme="purple-dark" class="purple-dark-theme">11</a></li>
                        <li><a href="javascript:void(0)" theme="megna-dark" class="megna-dark-theme">12</a></li>
                    </ul>
                    <ul class="m-t-20 chatonline">
                        <li><b>Chat option</b></li>
                        <li>
                            <a href="javascript:void(0)"><img src="../plugins/images/users/varun.jpg" alt="user-img" class="img-circle"> <span>Varun Dhavan <small class="text-success">online</small></span></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><img src="../plugins/images/users/genu.jpg" alt="user-img" class="img-circle"> <span>Genelia Deshmukh <small class="text-warning">Away</small></span></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><img src="../plugins/images/users/ritesh.jpg" alt="user-img" class="img-circle"> <span>Ritesh Deshmukh <small class="text-danger">Busy</small></span></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><img src="../plugins/images/users/arijit.jpg" alt="user-img" class="img-circle"> <span>Arijit Sinh <small class="text-muted">Offline</small></span></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><img src="../plugins/images/users/govinda.jpg" alt="user-img" class="img-circle"> <span>Govinda Star <small class="text-success">online</small></span></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><img src="../plugins/images/users/hritik.jpg" alt="user-img" class="img-circle"> <span>John Abraham<small class="text-success">online</small></span></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><img src="../plugins/images/users/john.jpg" alt="user-img" class="img-circle"> <span>Hritik Roshan<small class="text-success">online</small></span></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><img src="../plugins/images/users/pawandeep.jpg" alt="user-img" class="img-circle"> <span>Pwandeep rajan <small class="text-success">online</small></span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /.right-sidebar -->
    <!-- /.container-fluid -->
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
                        <label for="menu_name" class="control-label col-md-3">Code:</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="product_code" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="menu_link" class="control-label col-md-3">Name:</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="product_name" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="display_order" class="control-label col-md-3">Title:</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="title" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="icon" class="control-label col-md-3">Content:</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="content" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="icon" class="control-label col-md-3">Description:</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="description" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="icon" class="control-label col-md-3">Meta Description:</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="meta_description" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="icon" class="control-label col-md-3">Price:</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="price" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="icon" class="control-label col-md-3">Sale Price:</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="sale_price" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="show_in_menu" class="control-label col-md-3">Slug:</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="slug" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="show_in_menu" class="control-label col-md-3">Language:</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="language" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="show_in_menu" class="control-label col-md-3">Feature:</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="feature" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="show_in_menu" class="control-label col-md-3">Status:</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="status" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="created_date" class="control-label col-md-3">Created Date:</label>
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
                    url: '<?php echo base_url('admin/product/delete')?>'+'/'+id,
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
                url: '<?php echo base_url('admin/product/view')?>'+'/'+id,
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
    });
</script>
