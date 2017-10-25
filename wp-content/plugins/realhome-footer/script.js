jQuery(document).ready( function(){
    function static_media_upload( button_class) {
        var _custom_media = true;
        if(typeof wp.media != 'undefined')
        {
            _orig_send_attachment = wp.media.editor.send.attachment;
        }
        jQuery('body').on('click',button_class, function(e) {
            var thisElement = jQuery(this);
            var button_id ='#'+jQuery(this).attr('id');
            /* console.log(button_id); */
            var self = jQuery(button_id);
            var send_attachment_bkp = wp.media.editor.send.attachment;
            var button = jQuery(button_id);
            var id = button.attr('id').replace('_button', '');
            _custom_media = true;
            wp.media.editor.send.link = function (a) {
                thisElement.siblings('.custom_media_url').val(a.url);
                // thisElement.siblings('.custom_media_image').attr('src',a.url).css('display','none');
            };
            wp.media.editor.send.attachment = function(props, attachment){
                if ( _custom_media  ) {
                    thisElement.siblings('.custom_media_url').val(attachment.url);

                    // thisElement.siblings('.custom_media_image').attr('src',attachment.url).css('display','block');
                } else {
                    return _orig_send_attachment.apply( button_id, [props, attachment] );
                }
            };

            wp.media.editor.open(button);
            return false;
        });
    }
    static_media_upload( '.static_custom_media_upload');
});