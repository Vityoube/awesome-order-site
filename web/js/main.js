
$('#category_menu').on('click','li',function (id) {
    $('.nav li').removeClass('active');
    $(this).addClass('active');
    var id=$(this).data('id');
    $.ajax({
        url: 'category/view',
        data: {id: id},
        type: 'get',
        success: function (res) {
            if (!res)alert('error!');
//            console.log(res);
            $("#restaurant_block").html(res);
        },
        error: function () {
            console.log('Error');
        }
    })

});
function orderProduct(id){
    $.ajax({
       url: 'cart/order',
         data: {id: id},
         type: 'post',
         success: function (res) {
             alert(res);
         },
         error: function(){
             alert('Error');
         }
         
    });
}
