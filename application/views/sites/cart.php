<div class="columns-container">
    <div id="columns" class="container">
        <div id="slider_row" class="row">
        </div>
        <div class="row">
            <div id="center_column" class="center_column col-xs-12 col-sm-12">
                <h1 id="cart_title" class="page-heading">Tổng hợp giỏ hàng
                </h1>

                <?php if(isset($order_success)) :?>
                    <p class="alert alert-warning"><?php echo $order_success?></p>
                <?php else: ?>
                    <?php if(!isset($order_details)) :?>
                        <p class="alert alert-warning">Giỏ hàng trống</p>
                    <?php else: ?>
                        <form enctype="multipart/form-data" action="" method="post">
                            <table id="border-add" border="1">
                                <thead>
                                <tr>
                                    <th>Hình ảnh</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Màu sắc</th>
                                    <th>Số lượng</th>
                                    <th>Thông tin thêm</th>
                                    <th>Hành động</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($order_details as $order_detail) : ?>
                                <tr>
                                    <td>
                                        <?php if ($order_detail->getProductImage() != '') {
                                            echo '<img src="'.$order_detail->getProductImage().'">';
                                        }?>
                                    </td>
                                    <td>
                                        <?php echo $order_detail->getProductName();?>
                                        <input class="form-control grey" type="hidden" name="Orders[<?php echo $order_detail->id?>][product_id]" value="<?php echo $order_detail->product_id?>"/>
                                    </td>
                                    <td>
                                        <select name="Orders[<?php echo $order_detail->id?>][product_option_value_id]" class="change-color" required>
                                            <option value="">--------------</option>
                                            <?php foreach ($order_detail->getProductColor() as $color_id => $color) :?>
                                                <option value="<?php echo $color_id?>" style="background-color: <?php echo $color?>; color: <?php echo $color?>;"><?php echo $color?></option>
                                        <?php endforeach;?>
                                        </select>
                                    </td>
                                    <td>
                                        <input class="form-control grey" type="number" name="Orders[<?php echo $order_detail->id?>][quantity]" min="0" value="<?php echo $order_detail->quantity?>" required/>
                                    </td>
                                    <td>
                                        <textarea class="form-control grey" name="Orders[<?php echo $order_detail->id?>][more_info]" cols="50" maxlength="255"></textarea>
                                    </td>
                                    <td class="button-column" style="text-align: center">
                                        <a class="button-delete" href="javascript:void(0)" title="Delete" data-id="<?php echo $order_detail->id?>">Xóa</a>
                                    </td>
                                </tr>
                                <?php endforeach;?>
                                </tbody>
                            </table>
                            <div style="padding: 15px 15px 30px 0;">
                                <p>Địa chỉ giao hàng: </p>
                                <?php if(isset($billings) && count($billings) > 0) :?>
                                    <select name="shipping_address">
                                        <?php foreach ($billings as $billing) :?>
                                            <option value="<?php echo $billing->id?>"><?php echo $billing->title?></option>
                                        <?php endforeach;?>
                                    </select>
                                <?php else: ?>
                                    <p class="buttons_bottom_block no-print">
                                        <a href="<?php echo base_url('sites/addresses')?>">
                                            <button type="button" class="exclusive ps_product_addcart">
                                                <span>Thêm địa chỉ mua hàng</span>
                                            </button>
                                        </a>
                                    </p>
                                <?php endif;?>
                            </div>
                            <?php if(isset($billings) && count($billings) > 0) :?>
                                <div style="padding: 15px 15px 30px 0;float: left">
                                    <p class="buttons_bottom_block no-print">
                                        <button type="submit" class="exclusive ps_product_addcart">
                                            <span>Đặt hàng</span>
                                        </button>
                                    </p>
                                </div>
                            <?php endif;?>
                        </form>
                    <?php endif;?>
                <?php endif?>
            </div><!-- #center_column -->
        </div><!-- .row -->
    </div><!-- #columns -->
</div>

<script>
    $(document).ready(function() {
        $('.change-color').click(function () {
            var color = $(this).find('option:selected').text();
            $(this).attr('style', 'background-color: '+color+'; color: '+color);
        });
        $('.button-delete').click(function () {
            var id = $(this).data('id');
            var order_id = '<?php echo isset($order_id) ? $order_id : 0 ?>';
            if (confirm('Bạn có chắc muốn xóa sản phẩm này?')) {
                $.ajax({
                    url: '<?php echo base_url('sites/deleteCart')?>',
                    type: 'POST',
                    data: {id: id, order_id: order_id},
                    success: function (returndata) {
                        location.reload();
                    }
                });
            }
        });
    });
</script>