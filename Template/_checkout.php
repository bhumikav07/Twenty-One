<?php
  if(isset($_POST['checkout_submit'])){
    $data =array();
    $data['username']= $_POST['firstname']." ".$_POST['lastname'];
    session_start();
     $data['user_id'] = $_SESSION['userid'];
    $data['address'] = $_POST['address']." ".$_POST['state']." ".$_POST['city']." ".$_POST['zip'];
    $order_id =  $Order->insertOrderDetail($data['user_id'],$data['username'],$data['address']);
    $Cart->updateDeleted($order_id,$data['user_id']);
    header('location:ordercomplete.php');
  }
?>

<!--Title-->
<div class="m-auto">
  <div class="page-title" style="background-color:#ffdc48;">
    <p class="font-opensans text-center font-w-800 " style="padding-top:50px; padding-bottom: 50px; font-size:50px;">CHECKOUT</p>
  </div>
</div>
<!--Title-->

<div class="mx-5 my-5">
  <div class="row">
    <!--Cart Totals-->
    <div class="col-sm-5 col-md-12 col-lg-5 mt-5">
      <div class="total" style="border: 2px solid #dddddd;">
        <h6 class="font-s-20 font-w-700 font-poppins color-primary mt-3 py-2" style="margin-left: 25px;">
          CART TOTALS</h6>
        <hr>
        <div>
          <?php
          foreach ($product->getData('cart') as $item1) :
            $cart = $product->getProduct($item1['item_id']);
            $total[] = array_map(function ($item, $quantity) {
          ?>
              <!-- cart item -->
              <div class="row border-bottom py-3 mt-3 mx-3 ">
                <div class="col-sm-3 mb-3">
                  <img src="<?php echo $item['item_image'] ?? ".assets/Products/1.webp"; ?>" style="height: 120px;">
                </div>
                <div class="col-sm-6">
                  <h5 class="font-poppins font-s-18"><?php echo $item['item_brand'] ?? "Unknown"; ?></h5>
                  <small class="font-poppins" style="color: #898989;"><?php echo $item['item_name'] ?? "Unknown"; ?></small>
                </div>

                <div class="col-sm-3 text-right">
                  <div class="text-center font-poppins font-s-18 font-w-600 mt-3">
                    ₹<span class="product_price" data-id="<?php echo $item['item_id'] ?? '0'; ?>"><?php echo $item['item_price'] * $quantity ?? '0'; ?></span>
                  </div>
                </div>
              </div>
              <!--!cart item-->
          <?php
              return $item['item_price'] * $quantity;
            }, $cart, array('quantity' => $item1['quantity']));
          endforeach;

          ?>

        </div>

        <div class="py-4">
          <table class="font-poppins font-w-700 font-s-20" style="margin-left: 25px;margin-right:25px;padding-bottom: 15px;padding-right: 200px;">
            <td style="padding:10px;width:300%;">Total</td>
            <td style="padding:10px;width:300%;">₹<span id="deal-price"><?php echo isset($total) ? $Cart->getSumation($total) : 0 ?></span></td>
          </table>
        </div>
      </div>
    </div>
    <!--Cart Totals-->

    <!--Delivery Details-->
    <div class="col-sm-7 col-md-12 col-lg-7">
      <h4 class="mb-3 font-poppins font-s-20  font-w-700 py-3">DELIVERY ADDRESS</h4>
      <form method="post" class="needs-validation">
        <div class="row">
          <div class="col-md-6 mb-3">
            <label class="font-poppins font-s-14 font-w-600" for="firstName">First name</label>
            <input type="text" class="form-control font-poppins font-s-14 rounded-0" name="firstname" placeholder="" value="" required>
            <div class="invalid-feedback">
              Valid first name is required.
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label class="font-poppins font-s-14 font-w-600" for="lastName">Last name</label>
            <input type="text" class="form-control font-poppins font-s-14 rounded-0" name="lastname" placeholder="" value="" required>
            <div class="invalid-feedback">
              Valid last name is required.
            </div>
          </div>
        </div>

        <div class="mb-3">
          <label class="font-poppins font-s-14 font-w-600" for="email">Email</label>
          <input type="email" class="form-control font-poppins font-s-14 rounded-0 font-poppins font-s-14 font-w-600" name="email" placeholder="you@example.com">
          <div class="invalid-feedback">
            Please enter a valid email address for shipping updates.
          </div>
        </div>

        <div class="mb-3">
          <label class="font-poppins font-s-14 font-w-600" for="address">Address</label>
          <input type="text" class="form-control font-poppins font-s-14 rounded-0" name="address" placeholder="" required>
          <div class="invalid-feedback">
            Please enter your shipping address.
          </div>
        </div>

        <div class="row">
          <div class="col-md-5 mb-3">
            <label class="font-poppins font-s-14 font-w-600" for="state">State</label>
            <input type="text" class="form-control font-poppins font-s-14 rounded-0" name="state">
          </div>
          <div class="col-md-4 mb-3">
            <label class="font-poppins font-s-14 font-w-600" for="city">City</label>
            <input type="text" class="form-control font-poppins font-s-14 rounded-0" name="city">
          </div>
          <div class="col-md-3 mb-3">
            <label class="font-poppins font-s-14 font-w-600" for="zip">Zip</label>
            <input type="text" class="form-control font-poppins font-s-14 rounded-0" name="zip" placeholder="" required>
            <div class="invalid-feedback">
              Zip code required.
            </div>
          </div>
        </div>

        <hr class="mb-4">
        <!--Delivery Details-->

        <h4 class="mb-3 font-poppins font-s-20  font-w-700 py-3">PAYMENT</h4>
        <!--Methods-->
        <div class="d-flex my-3">
          <div class="radio-item font-poppins font-s-14 font-w-600 px-3">
            <input type="radio" id="cod" name="ritem" value="cod">
            <label for="ritemc">Cash On Delivery</label>
          </div>
        </div>
        <!--Methods-->

        <hr class="mb-4">
        <button  name="checkout_submit" class="btn btn-add font-poppins font-s-15 font-w-700 mt-3" type="submit">PLACE THE ORDER</button>
      </form>
    </div>

  </div>
</div>