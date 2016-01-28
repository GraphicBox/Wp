function set_image() {
    $('#new-fact-div .pic span').hide();
    $('#new-fact-div .pic span.is-image').show();
}

function set_imageid(id) {
    $('#factidedit'+id+' .picture-edit .click2').show();
}

function edit_fact(id) {
    $('.about-fact').show();
    $('.about-fact-edit').hide();
    $('#factid'+id).hide();
    $('#factidedit'+id).show();
}

function edit_fact_cancel(id) {
    $('#factidedit'+id).hide();
    $('#factid'+id).show();
}

function delete_fact(id) {
    $('#factidedit'+id+' .deleting').show();
    $.post('../wp-content/plugins/fleet/aboutus/delete_fact.php',{'id':id},function()
    {
        $('#factidedit'+id).remove();
        $('#factid'+id).remove();
    });
}

function edit_event(id) {
    $('.history-row').show();
    $('.history-row2').hide();
    $('#event'+id).hide();
    $('#eventedit'+id).show();
}

function cancel_event_edit(id) {
    $('#eventedit'+id).hide();
    $('#event'+id).show();
}

function set_event_imageid(id) {
    $('#eventedit'+id+' .picture-selected').css('color','#0c0');
}

function delete_event(id) {
    $('#eventedit'+id+' .deleting').show();
    $.post('../wp-content/plugins/fleet/aboutus/delete_event.php',{'id':id},function()
    {
        $('#eventedit'+id).remove();
        $('#event'+id).remove();
    });
}

function edit_ship(id) {
    $('.ships-row').show();
    $('.ships-row2').hide();
    $('#ship'+id).hide();
    $('#shipedit'+id).show();
}

function edit_ship_cancel(id) {
    $('#shipedit'+id).hide();
    $('#ship'+id).show();
}

function delete_ship(id) {
    $('#shipedit'+id+' .deleting').show();
    $.post('../wp-content/plugins/fleet/aboutus/delete_ship.php',{'id':id},function()
    {
        $('#shipedit'+id).remove();
        $('#ship'+id).remove();
    });
}

function delete_cruise(id) {
    $('.deleting').show();
    $.post('../wp-content/plugins/fleet/cruises/delete_cruise.php',{'id':id},function()
    {
        $('#cruise-right-side').hide();
        $('#cruise-item'+id).remove();
        $('#cruise-info-msg').show(300).html('Cruise has been deleted');
        setTimeout(function(){$('#cruise-info-msg').fadeOut(300);},5000);
    });
}

var selected_photos=0;
function remove_photo(id, total_photos) {
    selected_photos++;
    if (selected_photos>=total_photos) alert('There must be at least one photo');
    else {
        var value = $('#remove-photos').val()+id+'|';
        $('#remove-photos').val(value);
        $('#photo-to-remove'+id+' .removing-photo').show();
    }
}