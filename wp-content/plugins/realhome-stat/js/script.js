jQuery(document).ready( function(){
    //Delete file
    jQuery('body').on('click', '.btnDeleteFile', function () {
        jQuery(this).closest('fieldset').remove();
    });
});
//Add new file
if (typeof addNewFileListing !== "function")
{
    function addNewFileListing(id) {
        var currentSlideNumber = jQuery('#'+id).closest('.slideList').children('fieldset').length;
        var formName = jQuery('#'+id).data('formname');
        var slideSet = '<fieldset class="widget-listing-fieldset">';
        slideSet += '<legend class="widget-listing-legend"><b>Field</b></legend>';

        <!--Number-->
        slideSet += '<p>';
        slideSet += '<label for="'+formName+'[number][]">Number</label><br />';
        slideSet += '<input type="number" name="'+formName+'[number][]" class="widefat" />';
        slideSet += '</p>';

        <!--Content-->
        slideSet += '<p>';
        slideSet += '<label for="'+formName+'[content][]">Content</label><br />';
        slideSet += '<input type="text" name="'+formName+'[content][]" class="widefat" />';
        slideSet += '</p>';

        slideSet += '<button type="button" class="btnDeleteFile">Delete this file</button>';
        slideSet += '</fieldset>';
        jQuery('#'+id).before(slideSet);

        currentSlideNumber++;

        if(currentSlideNumber >= 3){
            jQuery('#'+id).hide();
        }
    }
}
