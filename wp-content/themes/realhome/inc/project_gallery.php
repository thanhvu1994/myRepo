<?php
    $args = array(
        'post_type' => 'project',
        'posts_per_page' => 6,
        'orderby' => 'rand'
    );

    $projects = get_posts($args);
?>

<div class="project">
    <div class="container"  style="width:1400px">
            <h3>Projects Gallery</h3>
            <div class="content-bottom-in">
                <ul id="project-gallery">
                    <?php foreach($projects as $project): ?>
                        <?php
                            $gallery = acf_photo_gallery('photo_gallery',$project->ID);
                            $ranImage = array_rand ( $gallery, 1);
                        ?>
                    <li>
                        <div style="margin : 0px 2px 0px 2px;">
                            <a href="<?php echo get_permalink($project->ID); ?>" ><img class="img-responsive cover" src="<?php echo $gallery[$ranImage]['full_image_url']; ?>" alt="<?php echo $gallery[$ranImage]['caption']; ?>" /></a>
                            <div class="fur2">
                                <span><a href="<?php echo get_permalink($project->ID); ?>" ><?php echo $project->post_title; ?></a></span>
                            </div>
                        </div>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
    </div>
</div>