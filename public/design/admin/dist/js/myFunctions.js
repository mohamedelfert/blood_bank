<!-- This For check all boxes -->
function checkAll() {
    $('input[class="box"]:checkbox').each(function(){
        if($('input[class="select_all"]:checkbox:checked').length == 0){
            $(this).prop('checked',false);
        }else{
            $(this).prop('checked',true);
        }
    });
}
<!-- This For check all boxes -->

<!-- This For Deletes all checked boxes show modal to delete or not -->
function delete_all() {
    // for submitting
    $(document).on('click','.del_all',function(){
        $('#data_form').submit();
    });
    // for show modal
    $(document).on('click','.delBtn',function(){
        var item_checked = $('input[class="box"]:checkbox').filter(':checked').length;
        if(item_checked > 0){
            $('.record_count').text(item_checked);
            $('.not_empty_record').removeClass('d-none');
            $('.empty_record').addClass('d-none');
        }else{
            $('.record_count').text('');
            $('.not_empty_record').addClass('d-none');
            $('.empty_record').removeClass('d-none');
        }
        $('#delete_all').modal('show');
    });
}
<!-- This For Deletes all checked boxes show modal to delete or not -->
