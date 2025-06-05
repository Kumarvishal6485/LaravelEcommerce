$(document).ready(function (){
    $(document).on('click','#filter-button',function (){
        $('.filters').css('display','block');
        $('#filter-by-text').css('display','none');
        $('#filter-button').css('display','none');
    })

    $('#chat-form').hide();
    $('#get-support').click(function(e){
        $('#chat-form').show();
    })
})