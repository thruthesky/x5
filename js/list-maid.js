
$(function() {
    $('#filter').change(function(){
        $('.hideable').hide();
        $('#div' + $(this).val()).show();
    });
});