<?php
    if($_SERVER['REQUEST_METHOD']=='POST'){
        if(isset($_POST['delete-cart-submit'])){
            $deletedrecord = $Cart->deleteCart($_POST['item_id']);
        }
    }
?>

<!--Cart-->
<section id="cart" class="py-3">
<div class="m-auto">
        <div class="page-title" style="background-color:#ffdc48;">
            <p class="font-opensans text-center font-w-800 "
                style="padding-top:50px; padding-bottom: 50px; font-size:50px;">CART</p>
        </div>
</div>
    <div class="mx-5">

        <!--  shopping cart items   -->
        <div class="row">
            <div class="col-sm-7 col-md-12 col-lg-7">
                <h5 class="font-poppins font-s-20 border-bottom font-w-700 py-3 ">YOUR CART</h5>
                <?php
                foreach ($product->getData('cart')as $item1):
            
                    $cart = $product->getProduct($item1['item_id']);
                    $subTotal[] = array_map(function($item , $quantity){
                ?>
                <!-- cart item -->
                <div class="row border-bottom py-3 mt-3 ">
                    <div class="col-sm-2 mb-3">
                        <img src="<?php echo $item['item_image'] ?? ".assets/Products/1.webp"; ?>"
                            style="height: 120px;">
                    </div>
                    <div class="col-sm-8">
                        <h5 class="font-poppins font-s-18"><?php echo $item['item_brand'] ?? "Unknown"; ?></h5>
                        <small class="font-poppins"
                            style="color: #898989;"><?php echo $item['item_name'] ?? "Unknown"; ?></small>

                        <!-- Quantity -->
                        <div class="qty d-flex pt-2">
                            <div class="d-flex font-poppins " style="width: 120px;">
                                <button class="qty_minus border bg-light" style="width: 120px;"
                                    data-id="<?php echo $item['item_id'] ?? '0';?>"><i
                                        class="fas fa-minus"></i></button>
                                <input type="text" data-id="<?php echo $item['item_id'] ?? '0';?>"
                                    class="qty_input text-center font-poppins font-w-800 border px-2 w-100 bg-light"
                                    disabled value="<?php echo $quantity ?? '0'; ?>" placeholder="1">
                                <button data-id="<?php echo $item['item_id'] ?? '0';?>" style="width: 120px;"
                                    class="qty_plus border bg-light"><i class="fas fa-plus"></i></button>
                            </div>
                            <form method="post">
                                <input type="hidden" value="<?php echo $item['item_id'] ?? 0; ?>" name="item_id">
                                <button type="submit" name="delete-cart-submit"
                                    class="btn font-poppins font-s-12 font-w-700 px-3 border-right">DELETE</button>
                            </form>
                        </div>
                        <!-- !Quantity -->

                    </div>

                    <div class="col-sm-2 text-right">
                        <div class="text-center font-poppins font-s-18 font-w-600 mt-3">
                            ₹<span class="product_price" data-id="<?php echo $item['item_id'] ?? '0';?>"><?php echo $item['item_price']* $quantity ?? '0'; ?></span>
                        </div>
                    </div>
                </div>
                <!--!cart item-->
                <?php
                return $item['item_price']* $quantity;
                    },$cart, array('quantity'=> $item1['quantity']));
                    endforeach;
                    
                ?>

            </div>

            <!-- Subtotal Section-->
            <div class="col-sm-5 col-md-12 col-lg-5 mt-5">
                <div class="sub-total" style="border: 2px solid #dddddd;">
                    <h6 class="font-s-20 font-w-700 font-poppins color-primary mt-3 py-2" style="margin-left: 25px;">
                        CART TOTALS</h6>
                        <hr>
                    <div class="py-4">
                        <table class="font-poppins font-w-700 font-s-20"
                        style="margin-left: 25px;margin-right:25px;padding-bottom: 15px;padding-right: 200px;">
                            <td style="padding:10px;width:300%;">Subtotal</td>
                            <td style="padding:10px;width:300%;">₹<span id = "deal-price"><?php echo isset($subTotal)? $Cart->getSum($subTotal): 0 ?></span></td>
                        </table>
                        
                        <button onclick= "document.location='checkout.php' " type="submit" class="btn btn-add font-poppins font-s-15 font-w-700 mt-3"
                            style="margin:auto; display: block;width: 90%;">PROCEED
                            TO CHECKOUT&nbsp;&nbsp;&nbsp;<i class="fas fa-arrow-right"></i></button>
                    </div>
                </div>
            </div>
            <!-- !Subtotal Section-->
        </div>
        <!--  !Cart Items -->
    </div>
</section>
<!-- !Cart Section -->
</div>
</section>
<!--!Cart-->