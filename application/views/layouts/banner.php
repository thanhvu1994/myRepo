<style>
    /*.center-cropped-banner {
        object-fit: none;
        object-position: center;
        height: 1920px;
        width: 497px;
    }*/
</style>
<div id="top_column"><!-- Module HomeSlider -->
    <div id="homepage-slider" class="flexslider">
    	<?php if (count($banners) > 0): ?>
    		<ul class="slides" id="homeslider" style="max-height:500px;">
    			<?php foreach ($banners as $banner): ?>
    				<li class="homeslider-container">
						<a href="<?php echo !empty($banner->url) ? $banner->url : 'javascript:void(0)'?>" title="<?php echo $banner->name ?>">
							<img src="<?php echo $banner->get_image() ?>" width="1920" height="497" alt="<?php echo $banner->name ?>" class="center-cropped-banner"/>
						</a>
						<?php if (!empty($banner->name)): ?>
		                	<div class="homeslider-title"><?php echo $banner->name ?></div>
						<?php endif ?>
						<?php if (!empty($banner->button_name)): ?>
			                <div class="homeslider-description">
			                    <div class="btn btn-default ps_button" style="background: red;">
									<div style="float: left;">
										<a href="<?php echo $banner->url ?>"><?php echo $banner->button_name ?></a>
									</div>
									<div style="float: left;">
										<a href="<?php echo $banner->url ?>">
											<img src="<?php echo base_url('img/cms/arrow-button.png') ?>" alt="http://namvietplastic.com/vn/3-sn-phm" width="22" height="8" />
										</a>
									</div>
								</div>
			                </div>
						<?php endif ?>
					</li>
    			<?php endforeach ?>
			</ul>
    	<?php endif ?>
	</div>
<!-- /Module HomeSlider -->
</div>