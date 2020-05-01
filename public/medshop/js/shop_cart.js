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

        $.ajax({
            type: 'POST',
            url: '/shop_cart',
            data:{product_id:product_id, product_name:product_name, product_price:product_price, product_image:product_image} ,
            error: function(data){
                var errors = data.responseJSON;
               console.log(errors);
            },
            success: function(resp){
                var count_product = $('.count-product').text();
                count_product++;

                $('.count-product').text(count_product);
            }
        });

    });

    $('.quantity-moins').click(function(e){
        e.preventDefault();
        var count = $(this).parent( "div" ).children('input.count').val();

        if (count > 1) {
            count--;
        }

        var id = $(this).parent( "div" ).children('input.count').data('id');
        var sub_total = $(this).parent().parent().parent().children('td.sub-total');
        var price = $(this).parent().parent().parent().children('td.price').text();
        var count_input = $(this).parent( "div" ).children('input.count');
        $.ajax({
            type: 'POST',
            url: '/shop_cart_quantity',
            data:{id:id, quantity:count} ,
            error: function(data){
                var errors = data.responseJSON;
                console.log(errors);
            },
            success: function(resp){
                count_input.val(count);
                sub_total.text(price*count);
            }
        });
    });

    $('.quantity-plus').click(function(e){
        e.preventDefault();
        var count = $(this).parent( "div" ).children('input.count').val();
        count++;

        var id = $(this).parent( "div" ).children('input.count').data('id');
        var sub_total = $(this).parent().parent().parent().children('td.sub-total');
        var price = $(this).parent().parent().parent().children('td.price').text();
        var count_input = $(this).parent( "div" ).children('input.count');
        $.ajax({
            type: 'POST',
            url: '/shop_cart_quantity',
            data:{id:id, quantity:count} ,
            error: function(data){
                var errors = data.responseJSON;
                console.log(errors);
            },
            success: function(resp){
                console.log(resp);
                count_input.val(count);
                sub_total.text(price*count);
            }
        });
    });

    $('.delete-order-product').click(function(e){
        e.preventDefault();
        var ordered_product = $(this).data( "id" );

        $.ajax({
            type: 'POST',
            url: '/delete_ordered_product',
            data:{ordered_product:ordered_product} ,
            error: function(data){
                var errors = data.responseJSON;
                console.log(errors);
            },
            success: function(resp){
                $('#ordered-product-'+resp ).remove();
                var count_product = $('.count-product').text();
                count_product--;

                $('.count-product').text(count_product);
            }
        });
    });

});


