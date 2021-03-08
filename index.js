$(document).ready(function(){
    
    //Bootstrap Carousel 
    $('.carousel').carousel({
        interval: 3000
      })

    // Featured Product
    $("#featured-products .owl-carousel").owlCarousel({
        loop: true,
        nav: true,
        dots: false,
        responsive : {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            700: {
                items: 2
            },
            1000 : {
                items:3
            },
            1440 : {
                items: 4
            }
        }
    });
    
    $("#related-products .owl-carousel").owlCarousel({
        loop: true,
        nav: true,
        dots: false,
        responsive : {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            700: {
                items: 2
            },
            1000 : {
                items:3
            },
            1440 : {
                items: 4
            }
        }
    });
    
    //isotope filter
    var $grid = $(".grid").isotope({
        itemSelector : '.grid-item',
        layoutMode : 'fitRows'
    });
    
    // filter items on button click
    $(".button-group").on("click", "button", function(){
        var filterValue = $(this).attr('data-filter');
        $grid.isotope({ filter: filterValue});
    })
    
    
    //Product Quantity
    let $qtyplus = $(".qty .qty_plus");
    let $qtyminus = $(".qty .qty_minus");
    let $deal_price = $("#deal-price");
    // let $qtyinput = $(".qty .qty_input");
    
    //Click on qty plus button
    $qtyplus.click(function(e){
        let $qtyinput = $(`.qty_input[data-id='${$(this).data("id")}']`);
        let $price = $(`.product_price[data-id = '${$(this).data("id")}']`);
        //Change Product price using ajax call
        $.ajax({url:"template/ajax.php" , type:'post', data:{itemid:$(this).data("id"),type:"incr"},success:function(result){
            console.log(result); 
            let obj = JSON.parse(result);
            let item_price = obj[0]['item_price'];

            if($qtyinput.val()>=1 && $qtyinput.val()<=9){
                $qtyinput.val(function(i,oldval){
                    return ++oldval;
                });
                //Increase price of the product
            $price.text(parseInt(item_price * $qtyinput.val()).toFixed(2));
            // set subtotal price
            let subtotal = parseInt($deal_price.text()) + parseInt(item_price);
            $deal_price.text(subtotal.toFixed(2));
            }
        }}); // Closing ajax request
        
    });
    
    //Click on qty minus button
    $qtyminus.click(function(e){
        let $qtyinput = $(`.qty_input[data-id='${$(this).data("id")}']`);
        let $price = $(`.product_price[data-id = '${$(this).data("id")}']`);
        //Change Product price using ajax call
        $.ajax({url:"template/ajax.php" , type:'post', data:{itemid:$(this).data("id"),type:"decr"},success:function(result){
        let obj = JSON.parse(result);
        let item_price = obj[0]['item_price'];
        
        if($qtyinput.val()>1 && $qtyinput.val()<=10){
            $qtyinput.val(function(i,oldval){
                return --oldval;
            });
        //Increase price of the product
        $price.text(parseInt(item_price * $qtyinput.val()).toFixed(2));
        // set subtotal price
        let subtotal = parseInt($deal_price.text()) - parseInt(item_price);
        $deal_price.text(subtotal.toFixed(2));
        }
    }}); // Closing ajax request
    });
    
});