function make_bold(id) {
    if(id==1) {
        jQuery('.radio-btn.one div').show();
        jQuery('.radio-btn.two div').hide();
    }
    else {
        jQuery('.radio-btn.two div').show();
        jQuery('.radio-btn.one div').hide();
    }
}

function make_bold2(i, id) {
    if(i==1) {
        jQuery('#item-edit'+id+' .radio-btn2.one div').show();
        jQuery('#item-edit'+id+' .radio-btn2.two div').hide();
    }
    else {
        jQuery('#item-edit'+id+' .radio-btn2.two div').show();
        jQuery('#item-edit'+id+' .radio-btn2.one div').hide();
    }
}

function delete_item(id) {
    jQuery('#loading').show();
    jQuery.post('../wp-content/plugins/aboutus/delete_item.php',{'id':id},function()
    {
        jQuery('#item'+id).remove();
        jQuery('#item-edit'+id).remove();
        jQuery('#loading').hide();
    });
}

function set_image() {
    jQuery('#new-fact-div .pic span').hide();
    jQuery('#new-fact-div .pic span.is-image').show();
}

function set_imageid(id) {
    jQuery('#item-edit'+id+' .picture-edit .click2').show();
}

function edit_item(id) {
    jQuery('.cran1').show();
    jQuery('.cran2').hide();
    jQuery('#item'+id).hide();
    jQuery('#item-edit'+id).show();
}