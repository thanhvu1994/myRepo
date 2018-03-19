<?php if(!empty($projects)): ?>
<div id="CongTrinh" style="background: #bcbcbc;padding-bottom: 50px">
    <div class="container">
        <div class="row">
            <div class="col-md-12 ps_block_title">
                CÁC CÔNG TRÌNH GẦN ĐÂY
            </div>
        </div>
        <div class="row">
            <div id="htmlcontent_CongTrinh" class=" col-md-12">
                <ul class="htmlcontent-congtrinh clearfix" id="htmlcontent-congtrinh">
                    <?php foreach($projects as $key => $project): ?>
                        <style>
                            #myModal_contrinh_<?php echo $key; ?> > div > div > div.modal-body > div > p > a{
                                color: #093a95;
                            }
                            #myModal_contrinh_<?php echo $key; ?> > div > div > div.modal-body > div > p > a:hover{
                                color: #000;
                            }
                        </style>
                        <li class="htmlcontent-item-<?php echo $key +1; ?>">
                            <img class="center-cropped-project" src="<?php echo base_url($project->featured_image); ?>" data-toggle="modal" data-target="#myModal_contrinh_<?php echo $key; ?>" class="item-img img-responsive ct-image" title="<?php echo $project->title; ?>" />
                            <h3 class="item-title"><?php echo $project->title; ?></h3>
                            <div class="modal fade" id="myModal_contrinh_<?php echo $key; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            <h4 class="modal-title" id="myModalLabel">
                                                <a href="<?php echo $project->url; ?>" class="item-link" onclick="return ! window.open(this.href);" title="<?php echo $project->title; ?>">
                                                    <h3 class="item-title"><?php echo $project->title; ?></h3></a>
                                            </h4>
                                        </div>
                                        <div class="modal-body">
                                            <?php echo $project->content; ?>
                                            <p><a href="<?php echo $project->url; ?>">Xem chi tiết</a></p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>
<style>
    .center-cropped-project {
        object-fit: none; /* Do not scale the image */
        object-position: center; /* Center the image within the element */
        height: 428px;
        width: 570px;
    }
</style>
