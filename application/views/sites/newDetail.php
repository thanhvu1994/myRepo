<div class="columns-container">
    <div id="columns" class="container" >
        <div id="slider_row" class="row">
        </div>
        <div class="row">
            <div id="left_column" class="column col-xs-12 col-sm-2"><!-- Block categories module -->
            </div>
            <div id="center_column" class="center_column col-xs-12 col-sm-8">
                <div id="content" class="block">
                    <div itemtype="#" itemscope="" id="sdsblogArticle" class="blog-post">
                        <div class="page-item-title">
                            <h1><?php echo ($this->session->userdata['languages'] == 'vn') ? $new->title : $new->title_en; ?></h1>
                        </div>
                        <div class="post-info">
                            <span><?php echo ($this->session->userdata['languages'] == 'vn') ? 'Đăng Bởi' : 'Posted By'; ?>  &nbsp;<i class="icon icon-user"></i><span itemprop="author">Admin</span>&nbsp;
                                <i class="icon icon-calendar"></i>&nbsp;<span itemprop="dateCreated"><?php echo date('d M, Y', strtotime($new->created_date)); ?></span>&nbsp;&nbsp;
                                <i class="icon icon-comments"></i>&nbsp; <div style="display: inline-block;" class="fb-comments-count" data-href="<?php echo base_url('new-'.$new->getCategoryLink().'/'.$new->slug.'.html'); ?>">0</div> <?php echo ($this->session->userdata['languages'] == 'vn') ? 'Bình Luận' : 'Comments'; ?></span>
                            <a title="" style="display:none" itemprop="url" href="#"></a>
                        </div>
                        <div itemprop="articleBody">
                            <?php echo ($this->session->userdata['languages'] == 'vn') ? $new->content : $new->content_en; ?>
                        </div>
                    </div>


                </div>
                <div class="smartblogcomments" id="respond">
                    <div data-width="100%" class="fb-comments" data-href="<?php echo base_url('new-'.$new->getCategoryLink().'/'.$new->slug.'.html'); ?>" data-numposts="5"></div>
                </div>

                <script type="text/javascript">
                    $('#submitComment').bind('click',function(event) {
                        event.preventDefault();


                        var data = { 'action':'postcomment',
                            'id_post':$('input[name=\'id_post\']').val(),
                            'comment_parent':$('input[name=\'comment_parent\']').val(),
                            'name':$('input[name=\'name\']').val(),
                            'website':$('input[name=\'website\']').val(),
                            'smartblogcaptcha':$('input[name=\'smartblogcaptcha\']').val(),
                            'comment':$('textarea[name=\'comment\']').val(),
                            'mail':$('input[name=\'mail\']').val() };
                        $.ajax( {
                            url: baseDir + 'modules/smartblog/ajax.php',
                            data: data,

                            dataType: 'json',

                            beforeSend: function() {
                                $('.success, .warning, .error').remove();
                                $('#submitComment').attr('disabled', true);
                                $('#commentInput').before('<div class="attention"><img src="http://321cart.com/sellya/catalog/view/theme/default/image/loading.gif" alt="" />Please wait!</div>');

                            },
                            complete: function() {
                                $('#submitComment').attr('disabled', false);
                                $('.attention').remove();
                            },
                            success: function(json) {
                                if (json['error']) {

                                    $('#commentInput').before('<div class="warning">' + '<i class="icon-warning-sign icon-lg"></i>' + json['error']['common'] + '</div>');

                                    if (json['error']['name']) {
                                        $('.inputName').after('<span class="error">' + json['error']['name'] + '</span>');
                                    }
                                    if (json['error']['mail']) {
                                        $('.inputMail').after('<span class="error">' + json['error']['mail'] + '</span>');
                                    }
                                    if (json['error']['comment']) {
                                        $('.inputContent').after('<span class="error">' + json['error']['comment'] + '</span>');
                                    }
                                    if (json['error']['captcha']) {
                                        $('.smartblogcaptcha').after('<span class="error">' + json['error']['captcha'] + '</span>');
                                    }
                                }

                                if (json['success']) {
                                    $('input[name=\'name\']').val('');
                                    $('input[name=\'mail\']').val('');
                                    $('input[name=\'website\']').val('');
                                    $('textarea[name=\'comment\']').val('');
                                    $('input[name=\'smartblogcaptcha\']').val('');

                                    $('#commentInput').before('<div class="success">' + json['success'] + '</div>');
                                    setTimeout(function(){
                                        $('.success').fadeOut(300).delay(450).remove();
                                    },2500);

                                }
                            }
                        } );
                    } );






                    var addComment = {
                        moveForm : function(commId, parentId, respondId, postId) {

                            var t = this, div, comm = t.I(commId), respond = t.I(respondId), cancel = t.I('cancel-comment-reply-link'), parent = t.I('comment_parent'), post = t.I('comment_post_ID');

                            if ( ! comm || ! respond || ! cancel || ! parent )
                                return;

                            t.respondId = respondId;
                            postId = postId || false;

                            if ( ! t.I('wp-temp-form-div') ) {
                                div = document.createElement('div');
                                div.id = 'wp-temp-form-div';
                                div.style.display = 'none';
                                respond.parentNode.insertBefore(div, respond);
                            }


                            comm.parentNode.insertBefore(respond, comm.nextSibling);
                            if ( post && postId )
                                post.value = postId;
                            parent.value = parentId;
                            cancel.style.display = '';

                            cancel.onclick = function() {
                                var t = addComment, temp = t.I('wp-temp-form-div'), respond = t.I(t.respondId);

                                if ( ! temp || ! respond )
                                    return;

                                t.I('comment_parent').value = '0';
                                temp.parentNode.insertBefore(respond, temp);
                                temp.parentNode.removeChild(temp);
                                this.style.display = 'none';
                                this.onclick = null;
                                return false;
                            };

                            try { t.I('comment').focus(); }
                            catch(e) {}

                            return false;
                        },

                        I : function(e) {
                            return document.getElementById(e);
                        }
                    };



                </script>
            </div><!-- #center_column -->
            <div id="right_column" class="column col-xs-12 col-sm-2"><!-- Block categories module -->
            </div>
        </div><!-- .row -->
    </div><!-- #columns -->
</div><!-- .columns-container -->
<style>
    .center-cropped-new {
        object-fit: none; /* Do not scale the image */
        object-position: center; /* Center the image within the element */
        height: 266px;
        width: 522px;
    }
</style>