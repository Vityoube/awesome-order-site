
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
$('#cart').on('click',function(){
    $.ajax({
        url: '/awesome-order-site/cart/show',
        type: 'get',
        success: function (data, textStatus, jqXHR) {
            if(!data) alert('No data found');
            showCart(data);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Error');
        }
    })
})
function addProduct(id,relatedProductsId,restaurantId){
    var qty=$('#qty'+id).val();
    orderedRelatedProductsId=[];
    for (var relatedProductId of relatedProductsId) {
        if ($('#related-product-'+id+'-'+relatedProductId).is(":checked"))
            orderedRelatedProductsId.push(relatedProductId);
    }
//    alert("Product id: "+id+ " Restaurant id: "+restaurantId+
//            " Related products: "+orderedRelatedProductsId+' qty: '+qty);
    $.ajax({
       url: '/awesome-order-site/cart/add',
         data: {id: id,qty: qty, relatedProductsId: orderedRelatedProductsId,restaurantId: restaurantId },
         type: 'get',
         success: function (res) {
             alert(res);
         },
         error: function(xhr,status,error){
             alert('Error');
         }
         
    });
}

function showCart(cart){
    $('#cart').children().html(cart);
}