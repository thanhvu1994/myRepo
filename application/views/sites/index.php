<?php $this->load->view('layouts/banner'); ?>

<?php $this->load->view('layouts/product_index'); ?>

<?php $this->load->view('layouts/projects'); ?>

<div id="SoLuoc">
    <div class="container">
        <div class="row">  
            <div id="htmlcontent_SoLuoc" class="col-md-12" style="text-align: center">
    			<ul class="htmlcontent-home clearfix" >
                    <li class="htmlcontent-item-1">
                    	<a href="content/38-gioi-thieu-cong-ty-tnhh-tm-dv-sx-nhua-nam-viet.html" class="item-link" onclick="return ! window.open(this.href);" title="S&#416; L&#431;&#7906;C V&#7872; C&Ocirc;NG TY">
                        	<div class="ps_block_title">S&#416; L&#431;&#7906;C V&#7872; C&Ocirc;NG TY</div>
                    	</a>
                        <div class="item-html"> Công ty TNHH TM - DV - SX Nhựa Nam Việt là nhà sản xuất và phân phối các sản phẩm từ nhựa Polycarbonate như: Tôn nhựa lấy sáng Polycarbonate - Tấm lợp lấy sáng Polycarbonate - Tấm lợp định hình... tiêu chuẩn quốc tế hàng đầu Việt Nam. Được thành lập năm 2011 với tư cách pháp nhân là Công ty TNHH TM - DV - SX Nhựa Nam Việt, có trụ sở làm việc tại 362 Điện Biên Phủ, phường 17, quận Bình Thạnh, TP. Hồ Chí Minh.
						</div>
                    </li>
                </ul>
			</div>
        </div>
    </div>
</div>

<style>
    .center-cropped-partner {
        object-fit: none; /* Do not scale the image */
        object-position: center; /* Center the image within the element */
        height: 150px;
        width: 150px;
    }
</style>

<?php $partners = $this->partner->get_partner_fe();
	if (count($partners) > 0) :?>
		<div id="KhachHang" style="background: #bcbcbc;padding-bottom: 50px">
		    <div class="container">
		        <div class="row">
		            <div class="col-md-12 ps_block_title">KHÁCH HÀNG CỦA CHÚNG TÔI</div>
		        </div>
		        <div class="row">  
		            <div id="htmlcontent_KhachHang" class="col-md-12">
		    			<ul class="htmlcontent-khachhang clearfix" id="htmlcontent-khachhang" style="text-align: center">
		    				<?php foreach ($partners as $partner): ?>
		    					<li class="htmlcontent-item-1" style="display: inline-block">
			                        <a href="3-san-pham-tam-nhua-polycarbonate.html" class="item-link" onclick="return ! window.open(this.href);" title="<?php echo $partner->name ?>">
			                            <img src="<?php echo $partner->get_image() ?>" class="item-img center-cropped-partner" title="<?php echo $partner->name ?>" alt="<?php echo $partner->name ?>" width="100" height="100"/>
			                        </a>
			                    </li>
		    				<?php endforeach ?>
		                </ul>
					</div>
		        </div>
		    </div>
		</div>
<?php endif; ?>