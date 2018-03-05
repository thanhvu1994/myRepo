<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title">Data Table</h4>
    </div>
    <?php
        $breadcrumb = [base_url('admin/site') => 'Dashboard', 'active' => 'Backmenus'];
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
                    <a href="<?php echo base_url('admin/banners/create')?>" class="btn btn-block btn-default">Create</a>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="table-responsive">
                        <table id="example23" class="display nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Banner Title</th>
                                    <th>Button Name</th>
                                    <th>Url</th>
                                    <th>Image</th>
                                    <th>Publish</th>
                                    <th>Created Date</th>
                                    <th>Update Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($models as $model): ?>
                                    <tr id="tr-<?php echo $model->id?>">
                                        <td><?php echo $model->name ?></td>
                                        <td><?php echo $model->button_name ?></td>
                                        <td><?php echo $model->url ?></td>
                                        <td><img src="<?php echo $model->get_image() ?>" alt="<?php echo $model->name ?>" width="100"></td>
                                        <td><?php echo $model->get_publish() ?></td>
                                        <td><?php echo $model->get_created_date() ?></td>
                                        <td><?php echo $model->get_update_date() ?></td>
                                        <td class="button-column">
                                            <a href="<?php echo base_url('admin/banners/update/'.$model->id)?>"><i class="fa fa-edit"></i></a>
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
