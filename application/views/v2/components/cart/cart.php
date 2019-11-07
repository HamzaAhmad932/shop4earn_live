<input type="hidden" id="base_url" value="<?php echo base_url()?>">
<main class="main">
            <!-- <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index-2.html"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
                    </ol>
                </div>
            </nav> -->

            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="cart-table-container">
                            
                            <table class="table table-cart" id="cart_table">
                                <thead>
                                    <tr>
                                        <th class="product-col">Product</th>
                                        <th class="price-col">Price</th>
                                        <th class="qty-col">Qty</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <!-- <tr class="product-action-row">
                                        <td colspan="4" class="clearfix">
                                            <div class="float-left">
                                                <a href="#" class="btn-move">Move to Wishlist</a>
                                            </div>
                                            
                                            <div class="float-right">
                                                <a href="#" title="Edit product" class="btn-edit"><span class="sr-only">Edit</span><i class="icon-pencil"></i></a>
                                                <a href="#" title="Remove product" class="btn-remove"><span class="sr-only">Remove</span></a>
                                            </div>
                                        </td>
                                    </tr> -->
                                </tbody>

                                <tfoot>
                                    <tr>
                                        <td colspan="4" class="clearfix">
                                            <div class="float-left">
                                                <a href="<?php echo base_url('index.php/Home/dashboard')?>" class="btn btn-outline-secondary">Continue Shopping</a>
                                            </div><!-- End .float-left -->

                                            <div class="float-right">
                                                <a href="#" class="btn btn-outline-secondary btn-clear-cart">Clear Shopping Cart</a>
<!--                                                <button type="submit" class="btn btn-outline-secondary btn-update-cart">Update Shopping Cart</button>-->
                                            </div><!-- End .float-right -->
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div><!-- End .cart-table-container -->

                        <!-- <div class="cart-discount">
                            <h4>Apply Discount Code</h4>
                            <form action="#">
                                <div class="input-group">
                                    <input type="text" class="form-control form-control-sm" placeholder="Enter discount code"  required>
                                    <div class="input-group-append">
                                        <button class="btn btn-sm btn-primary" type="submit">Apply Discount</button>
                                    </div>
                                </div>
                            </form>
                        </div> -->
                    </div><!-- End .col-lg-8 -->

                    <div class="col-lg-4">
                        <div class="cart-summary">
                            <h3>Summary</h3>

<!--                             <h4>
                                <a data-toggle="collapse" href="#total-estimate-section" class="collapsed" role="button" aria-expanded="false" aria-controls="total-estimate-section">Estimate Shipping and Tax</a>
                            </h4> -->

                            <!-- <div class="collapse" id="total-estimate-section">
                                <form action="#">
                                    <div class="form-group form-group-sm">
                                        <label>Country</label>
                                        <div class="select-custom">
                                            <select class="form-control form-control-sm">
                                                <option value="USA">United States</option>
                                                <option value="Turkey">Turkey</option>
                                                <option value="China">China</option>
                                                <option value="Germany">Germany</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group form-group-sm">
                                        <label>State/Province</label>
                                        <div class="select-custom">
                                            <select class="form-control form-control-sm">
                                                <option value="CA">California</option>
                                                <option value="TX">Texas</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group form-group-sm">
                                        <label>Zip/Postal Code</label>
                                        <input type="text" class="form-control form-control-sm">
                                    </div>

                                    <div class="form-group form-group-custom-control">
                                        <label>Flat Way</label>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="flat-rate">
                                            <label class="custom-control-label" for="flat-rate">Fixed $5.00</label>
                                        </div>
                                    </div>

                                    <div class="form-group form-group-custom-control">
                                        <label>Best Rate</label>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="best-rate">
                                            <label class="custom-control-label" for="best-rate">Table Rate $15.00</label>
                                        </div>
                                    </div>
                                </form>
                            </div> -->

                            <table class="table table-totals">
                                <tbody>
                                    <tr>
                                        <td>Subtotal</td>
                                        <td id="sub_total">Rs. 0</td>
                                    </tr>

                                    <tr>
                                        <td>Tax</td>
                                        <td>0.00</td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td>Order Total</td>
                                        <td id="total_order">Rs. 0</td>
                                    </tr>
                                </tfoot>
                            </table>

                            <div class="checkout-methods">
                                <a href="<?php echo site_url('index.php/Home/Register1')?>" class="btn btn-block btn-sm btn-primary">Go to Checkout</a>
                                <!-- <a href="#" class="btn btn-link btn-block">Check Out with Multiple Addresses</a> -->
                            </div><!-- End .checkout-methods -->
                        </div><!-- End .cart-summary -->
                    </div><!-- End .col-lg-4 -->
                </div><!-- End .row -->
            </div><!-- End .container -->

            <div class="mb-6"></div><!-- margin -->
        </main><!-- End .main -->

<!--<tr class="product-row">-->
<!--	<td class="product-col">-->
<!--		<figure class="product-image-container">-->
<!--			<a href="product.html" class="product-image">-->
<!--				<img src="--><?//= base_url($cart['img_path'])?><!--" alt="product">-->
<!--			</a>-->
<!--		</figure>-->
<!--		<h2 class="product-title">-->
<!--			<a href="product.html">--><?//= $cart['name'];?><!--</a>-->
<!--		</h2>-->
<!--	</td>-->
<!--	<td>Rs. --><?php //echo $cart['price']?><!--</td>-->
<!--	<td>-->
<!--		<input name="qty" class="vertical-quantity form-control" type="text" value="--><?//= $cart['qty']?><!--">-->
<!--	</td>-->
<!--	<td>Rs. --><?php //echo $cart['subtotal']?><!--</td>-->
<!--	<td>-->
<!--		<div class="float-right">-->
<!--			<a href="--><?php //echo site_url('/index.php/Home/removeCartItem/'.$cart['rowid'])?><!--" title="Remove product" class="btn-remove"><span class="sr-only">Remove</span></a>-->
<!--		</div>-->
<!--	</td>-->
<!--</tr>-->
