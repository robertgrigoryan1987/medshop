$( document ).ready(function() {
    $.ajaxSetup({

        headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }

    });

    $('.shoping-cart').click(function () {

        let product_id = $(this).data('id');
        let product_name = $(this).data('name');
        let product_price = $(this).data('price');
        let product_image = $(this).data('image');
        console.log(product_image,'product_image');

        //
        // $.ajax({
        //     type: 'POST',
        //     url: '/shop_cart',
        //     data:{product_id:product_id, product_name:product_name, product_price:product_price, product_image:product_image} ,
        //     error: function(data){
        //         var errors = data.responseJSON;
        //        console.log(errors);
        //     },
        //     success: function(resp){
        //         var count_product = $('.count-product').text();
        //         count_product++;
        //
        //         $('.count-product').text(count_product);
        //     }
        //
        // });


    })
});