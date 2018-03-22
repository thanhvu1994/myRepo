<div class="columns-container">
    <div id="columns" class="container">
		<div id="slider_row" class="row"></div>
		<div class="row">
			<div id="center_column" class="center_column col-xs-12 col-sm-12">
				<h1 class="page-heading  product-listing"><?php echo ($this->session->userdata['languages'] == 'vn') ? 'Tìm kiếm' : 'Search' ?>
	                <span class="heading-counter"><?php echo count($results) ?> <?php echo ($this->session->userdata['languages'] == 'vn') ? 'kết quả tìm thấy' : 'results have been found' ?></span>
	    		</h1>
	    		<?php if (count($results) == 0): ?>
	    			<p class="alert alert-warning">
	    				<?php echo ($this->session->userdata['languages'] == 'vn') ? 'Không có kết quả nào được tìm thấy' : 'No result found ' ?> "<?php echo $key ?>"
					</p>
				<?php else: ?>
					<p class="alert alert-warning">
						<?php echo count($results) ?> <?php echo ($this->session->userdata['languages'] == 'vn') ? 'kết quả tìm thấy' : 'results have been found' ?>.
					</p>
					<ul id="articles_list" class="clear">
						<?php foreach ($results as $result): ?>
							<li style="padding-bottom: 20px">
			                    <a class="product-name" href="<?php echo base_url('sites/newDetail/'.$result->slug) ?>"><?php echo $result->getFieldFollowLanguage('title') ?></a>
								<div><?php echo $result->getFieldFollowLanguage('short_content') ?></div>
							</li>
						<?php endforeach ?>
					</ul>
	    		<?php endif ?>
			</div><!-- #center_column -->
		</div><!-- .row -->
	</div><!-- #columns -->
</div>