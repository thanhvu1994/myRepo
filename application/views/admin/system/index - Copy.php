<style type="text/css">
    .custom-settings label{
        text-align: left !important;
    }
</style>
<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title"><?php echo $title ?></h4>
    </div>
    <?php
        $breadcrumb = [base_url('admin/site') => 'Dashboard', 'active' => 'Chỉnh sửa website'];
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
                    <ul class="nav nav-tabs" role="tablist">
                        <?php
                        $i = 1;
                        if (is_array($settingDefine)):
                            foreach ($settingDefine as $key => $item):
                                $active = $i == 1 ? ' class="active" ' : '';
                                $itemObject = (object)$item;
                                ?>
                                <li role="presentation" <?php echo $active; ?>>
                                    <a href="#<?php echo $key; ?>" aria-controls="<?php echo $key; ?>" role="tab" data-toggle="tab" aria-expanded="true"><?php echo $itemObject->icon ?><span class="hidden-xs"> <?php echo $itemObject->label ?></span></a>
                                <?php
                                $i++;
                            endforeach;
                        endif;
                        ?>
                    </ul>
                    <?php echo form_open_multipart($link_submit, ['class' => 'form-horizontal custom-settings']); ?>
                        <div class="tab-content">
                        <?php
                        $i = 1;
                        if (is_array($settingDefine)):
                            foreach ($settingDefine as $key => $item):
                                $active = $i == 1 ? 'class="tab-pane active"' : 'class="tab-pane"';
                                $itemObject = (object)$item; ?>
                                <div <?php echo $active ?> id="<?php echo $key; ?>" role="tabpanel">
                                <?php
                                    $totalField = count($itemObject->items);
                                    $aHalf = (int)round($totalField / 2, 0);
                                    $i = 0;
                                    if ($itemObject->items && is_array($itemObject->items)):
                                        foreach ($itemObject->items as $data):
                                            $dataObj = (object)$data;
                                            if ($totalField >= 8 && $i == 0): ?>
                                                <div class="col-sm-6">
                                            <?php elseif ($totalField >= 8 && $i % $aHalf == 0): ?>
                                                </div>
                                                <div class="col-sm-6">
                                            <?php endif;?>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label"><?php echo $this->settings->getAttributeName($dataObj->name) ?></label>
                                            <?php $unit = '';
                                            if (isset($dataObj->unit) && $dataObj->unit != '')
                                                $unit = ' ' . $dataObj->unit;

                                            $note = '';
                                            if (isset($dataObj->notes) && $dataObj->notes != '')
                                                $note = '<div class="notes">' . $dataObj->notes . '</div>';
                                            $htmlOptions = $class= '';
                                            if (isset($dataObj->htmlOptions) && !empty($dataObj->htmlOptions)) {
                                                foreach ($dataObj->htmlOptions as $key => $value) {
                                                    if ($key == 'class') {
                                                        $class = $value;
                                                    } else {
                                                        $htmlOptions .= $key.'="'.$value.'" ';
                                                    }
                                                }
                                            }
                                            if ($dataObj->controlTyle == 'text'):
                                                echo '<div class="col-sm-9"><input type="text" name="Settings['.$dataObj->name.']" class="form-control" '.$htmlOptions.' value="'.$this->settings->get_value_setting($dataObj->name).'">' . $unit . $note . '</div>';
                                            elseif ($dataObj->controlTyle == 'textarea'):
                                                echo '<div class="col-sm-9"><textArea rows="3" name="Settings['.$dataObj->name.']" class="form-control '.$class.'" '.$htmlOptions.'>'.$this->settings->get_value_setting($dataObj->name).'</textArea>'. $note . '</div>';
                                            elseif ($dataObj->controlTyle == 'file'):
                                                echo '<div class="col-sm-9"><input type="file" name="Settings['.$dataObj->name.']">' . $unit . $note;
                                                if (!empty($this->settings->get_value_setting($dataObj->name))) {
                                                    if (is_file('./'.$this->settings->get_value_setting($dataObj->name))) {
                                                        echo '<div class="col-sm-3 m-t-10" id="'.$dataObj->name.'">';
                                                        echo '<div class="thumbnail">
                                                                <img src="'.base_url($this->settings->get_value_setting($dataObj->name)).'" width="100">
                                                                <span class="del-img-setting" data-key="'.$dataObj->name.'">x</span>
                                                            </div>';
                                                        echo '</div>';
                                                    }
                                                    echo '</div>';
                                                } else {
                                                    echo '</div>';
                                                }
                                            endif;
                                            echo '</div>';
                                            $i++;
                                        endforeach;
                                    endif;
                                    ?>
                                </div>
                                <?php if ($totalField >= 8) echo '</div>'; ?>
                                <?php
                                $i++;
                            endforeach;
                        endif; ?>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Lưu</button>
                            <a href="<?php echo base_url('admin/partners')?>" class="btn btn-inverse waves-effect waves-light">Hủy</a>
                        </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- /.row -->
<script>
    $(document).ready(function() {
        $('.del-img-setting').click(function() {
            if (confirm('Are you sure want to delete this image?')) {
                var key = $(this).data('key');
                $.ajax({
                    url: '<?php echo base_url('admin/system/delete')?>/'+key,
                    type: 'POST',
                    success: function (returndata) {
                        $('#'+key).remove();
                    }
                });
            }
        });
        CKEDITOR.replace('editor-full', {
            filebrowserBrowseUrl: "<?php echo base_url('themes/admin/plugins/ckfinder/ckfinder.html')?>",
            filebrowserUploadUrl: "<?php echo base_url('themes/admin/plugins/ckfinder/core/connector/php/connector.php').'?command=QuickUpload&type=Files' ?>",
            filebrowserWindowWidth: '1000',
            filebrowserWindowHeight: '700'
        });
    });
</script>
