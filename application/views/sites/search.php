<div class="columns-container">
    <div id="columns" class="container">
		<div id="slider_row" class="row"></div>
		<div class="row">
			<div id="center_column" class="center_column col-xs-12 col-sm-12">
				<h1 class="page-heading  product-listing"><?php echo ($this->session->userdata['languages'] == 'vn') ? 'Tìm kiếm' : 'Search' ?>
	                <span class="heading-counter"><?php echo $count ?> <?php echo ($this->session->userdata['languages'] == 'vn') ? 'kết quả tìm thấy' : 'results have been found' ?></span>
	    		</h1>
	    		<?php if ($count == 0): ?>
	    			<p class="alert alert-warning">
	    				<?php echo ($this->session->userdata['languages'] == 'vn') ? 'Không có kết quả nào được tìm thấy' : 'No result found ' ?> "<?php echo $key ?>"
					</p>
				<?php else: ?>
					<p class="alert alert-warning">
						<?php echo $count ?> <?php echo ($this->session->userdata['languages'] == 'vn') ? 'kết quả tìm thấy' : 'results have been found' ?>.
					</p>
					<?php if (count($results)): ?>
						<h3><?php echo ($this->session->userdata['languages'] == 'vn') ? 'Tin tức' : 'News' ?></h3>
						<ul id="articles_list" class="clear">
							<?php foreach ($results as $result): ?>
								<li style="padding-bottom: 20px">
				                    <a class="product-name" href="<?php echo base_url('new-'.$new->getCategoryLink().'/'.$new->slug.'.html'); ?>"><?php echo $result->getFieldFollowLanguage('title') ?></a>
									<div><?php echo $result->getFieldFollowLanguage('short_content') ?></div>
								</li>
							<?php endforeach ?>
						</ul>
					<?php endif ?>
					<?php if (count($products)): ?>
						<h3><?php echo ($this->session->userdata['languages'] == 'vn') ? 'Sản phẩm' : 'Products' ?></h3>
						<ul id="articles_list" class="clear">
							<?php foreach ($products as $product): ?>
								<li style="padding-bottom: 20px">
				                    <a class="product-name" href="<?php echo base_url('pro-'.$product->getCategorySlug().'/'.$product->slug) ?>"><?php echo $product->getFieldFollowLanguage('product_name') ?></a>
								</li>
							<?php endforeach ?>
						</ul>
					<?php endif ?>
	    		<?php endif ?>
			</div><!-- #center_column -->
		</div><!-- .row -->
	</div><!-- #columns -->
</div>