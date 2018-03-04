<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
    <ol class="breadcrumb">
        <?php foreach ($breadcrumb as $link => $name) {
        	if ($link != 'active') {
        		echo '<li><a href="'.$link.'">'.$name.'</a></li>';
        	} else {
                echo '<li class="active">'.$name.'</li>';
        	}
        } ?>
    </ol>
</div>