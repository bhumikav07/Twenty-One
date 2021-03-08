<?php
    $category = array_map(function ($pro){ return $pro['item_cat']; }, $product_shuffle);
    $unique = array_unique($category);
    sort($unique);
    shuffle($product_shuffle);

// request method post 
if($_SERVER['REQUEST_METHOD'] == "POST"){
    if (isset($_POST['shop_submit'])){
        // call method addToCart
        $Cart->addToCart($_POST['user_id'], $_POST['item_id']);
    }
}
$in_cart = $Cart->getCartId($product->getData('cart'));
?>

<section id="shop">
<div class="m-auto">
        <div class="page-title" style="background-color:#ffdc48;">
            <p class="font-opensans text-center font-w-800 "
                style="padding-top:50px; padding-bottom: 50px; font-size:50px;">SHOP</p>
        </div>
</div>
    <div class="container">
        <div id="filter" class="button-group text-right font-poppins">
            <button class="btn is-checked font-w-600" data-filter="*">ALL</button>
            <?php
                array_map(function ($category){
                    printf('<button class="btn" data-filter=".%s">%s</button>', $category, $category);
                }, $unique);
            ?>
        </div>
        <div class="grid">
        <?php array_map(function($item) use($in_cart){?>
            <div class="grid-item p-3 <?php echo $item['item_cat'] ?? "Category";?>">
                <div class="item py-2 font-poppins" style="width:200px;">
                    <div class="product font-poppins">
                        <a href="<?php printf('%s?item_id=%s', 'product.php',  $item['item_id']); ?>"><img src="<?php echo $item['item_image'] ?? ".assets/Products/1.webp"; ?>" class="img-fluid"></a>
                        <div class="text-first mt-2">
                            <h6><?php echo $item['item_brand'] ?? "Unknown"; ?></h6>
                            <p class="font-s-14" style="color:#898989"><?php echo $item['item_name'] ?? "Unknown"; ?></p>
                        </div>
                    </div>
                    <div class="price mb-3">
                        <span class="font-w-700">₹<?php echo $item['item_price'] ?? '0'; ?></span>
                    </div>
                    <form method="post">
                    <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '1'; ?>">
                    <input type="hidden" name="item_id" value="<?php echo 1; ?>">
                    <button type="submit" name="shop_submit" class="btn btn-add font-s-12 font-w-700">ADD TO CART</button>
                    </form>
                </div>
            </div>
        <?php },$product_shuffle)?>
        </div>    
    </div>
    </div>
</section>