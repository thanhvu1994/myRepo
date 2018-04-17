<?php $this->load->view('layouts/banner'); ?>

<?php $this->load->view('layouts/product_index'); ?>

<?php $this->load->view('layouts/projects'); ?>

<div id="SoLuoc">
    <div class="container">
        <div class="row">  
            <div id="htmlcontent_SoLuoc" class="col-md-12" style="text-align: center">
    			<ul class="htmlcontent-home clearfix" >
                    <li class="htmlcontent-item-1">
                    	<!-- <a href="content/38-gioi-thieu-cong-ty-tnhh-tm-dv-sx-nhua-nam-viet.html" class="item-link" onclick="return ! window.open(this.href);" title="S&#416; L&#431;&#7906;C V&#7872; C&Ocirc;NG TY"> -->
                    	<div class="ps_block_title"> 
	                    	<?php if ($this->session->userdata['languages'] == 'vn'): ?>
								Sơ lược về công ty
							<?php else: ?>
								About us
							<?php endif ?>
                    	</div>
                    	<!-- </a> -->
                        <div class="item-html"><?php echo $this->settings->get_param('introduce') ?>
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
		            <div class="col-md-12 ps_block_title">
			            <?php if ($this->session->userdata['languages'] == 'vn'): ?>
							KHÁCH HÀNG CỦA CHÚNG TÔI
						<?php else: ?>
							OUR CLIENTS
						<?php endif ?>
		            </div>
		        </div>
		        <div class="row">  
		            <div id="htmlcontent_KhachHang" class="col-md-12">
		    			<ul class="htmlcontent-khachhang clearfix" id="htmlcontent-khachhang" style="text-align: center">
		    				<?php foreach ($partners as $partner): ?>
		    					<li class="htmlcontent-item-1" style="display: inline-block">
			                        <a href="<?php echo !empty($partner->url) ? base_url($partner->url) : 'javascript:void(0)'?>" class="item-link" title="<?php echo $partner->getFieldFollowLanguage('name') ?>">
			                            <img src="<?php echo $partner->get_image() ?>" class="item-img center-cropped-partner" title="<?php echo $partner->getFieldFollowLanguage('name') ?>" alt="<?php echo $partner->getFieldFollowLanguage('name') ?>" width="100" height="100"/>
			                        </a>
			                    </li>
		    				<?php endforeach ?>
		                </ul>
					</div>
		        </div>
		    </div>
		</div>
<?php endif; ?>