<!--Featured Products-->
<?php
    shuffle($product_shuffle);
session_start();
    //Request method post
    if($_SERVER['REQUEST_METHOD']=="POST"){
        if(isset($_POST['featured_submit']))
        {
        //call method addToCart
        $Cart->addToCart($_POST['user_id'], $_POST['item_id']);
        }
    }
?>
<section id="featured-products">
    <div class="py-5">
        <p class="text-center color-primary font-poppins font-s-30 font-w-800 ">FEATURED PRODUCTS</p>
        <!--Owl Carousel-->
        <div class="owl-carousel owl-theme">
            <?php foreach ($product_shuffle as $item) { ?>
            <div class="item p-5">
                <div class="product font-poppins">
                    <a href="<?php printf('%s?item_id=%s', 'product.php',  $item['item_id']); ?>"><img
                            src="<?php echo $item['item_image'] ?? ".assets/Products/1.webp"; ?>" class="img-fluid"></a>
                    <div class="text-first py-3">
                        <h6><?php echo $item['item_brand'] ?? "Unknown"; ?></h6>
                        <small class="font-s-14"
                            style="color:#898989"><?php echo $item['item_name'] ?? "Unknown"; ?></small>
                        <div class="rating text-warning font-s-12">
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                        </div>
                        <div class="price py-2">
                            <span>₹<?php echo $item['item_price'] ?? '0'; ?></span>
                        </div>
                        <form method="post">
                            <input type="hidden" name="item_id" value="<?php echo $item['item_id']??'1';?>">
                            <!-- <input type="hidden" name="user_id" value="<?php echo $_SESSION['userid'];?>"> -->
                            <?php
                            if(in_array($item['item_id'],$Cart->getCartId($product->getData('cart'))??[])){
                                echo'<button type="submit" disabled name="featured_submit" class="btn btn-add font-s-12 font-w-700">IN THE CART</button>';
                            }else{
                                echo'<button type="submit" name="featured_submit" class="btn btn-add font-s-12 font-w-700">ADD TO CART</button>';
                            }
                                ?>
                        </form>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
        <!--!Owl Carousel-->
    </div>
</section>
<!--!Featured Products-->
<!--Load More Button-->
<div class="text-center">
    <a href="shop.php" class="text-center btn btn-coll font-poppins font-w-600 mb-5">LOAD MORE
        PRODUCTS&nbsp;&nbsp;&nbsp;<i class="fas fa-arrow-right"></i></a>
</div>
<!--!Load More Button-->