function showForm(id){
    if(id === 'service'){
        jQuery('.title').show();
        jQuery('.widget_subtitle').show();
    }else if(id === 'inner_banner'){
        jQuery('.title').hide();
        jQuery('.widget_subtitle').hide();
    }else
    {
        jQuery('.title').show();
        jQuery('.widget_subtitle').hide();
    }
}