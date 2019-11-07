<main class="main">
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index-2.html"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
                    </ol>
                </div><!-- End .container -->
            </nav>

            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="cart-table-container">
                            <table class="table table-cart">
                                <thead>
                                    <tr>
                                        <th class="product-col">Product</th>
                                        <th class="price-col">Price</th>
                                        <th class="qty-col">Qty</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	<?php $total = 0;?>
                                	<?php foreach($cart_data as $cart):?>
                                		<?php $total = $total + (float) $cart['subtotal'];?>
	                                    <tr class="product-row">
	                                        <td class="product-col">
	                                            <h2 class="product-title">
	                                                <a href="product.html"><?php echo $cart['name']?></a>
	                                            </h2>
	                                        </td>
	                                        <td><?php echo $cart['price']?></td>
	                                        <td><?php echo $cart['qty']?></td>
	                                        <td><?php echo $cart['subtotal']?></td>
	                                    </tr>
                                	<?php endforeach;?>
                                    <tr class="product-action-row">
                                        <td colspan="4" class="clearfix">
                                            <hr>
                                            <div class="float-right">
                                                <span>
                                                	<h3>Total :</h3>
                                                </span>
                                                <span>Rs. <?php echo $total?></span>  
                                            </div><!-- End .float-right -->
                                        </td>
                                    </tr>
                                </tbody>

                                <tfoot>
                                    <tr>
                                        <td colspan="4" class="clearfix">
                                            <div class="float-left">
                                                <a href="<?php echo base_url('index.php/Home/dashboard')?>" class="btn btn-outline-secondary">Continue Shopping</a>
                                            </div><!-- End .float-left -->

                                            <div class="float-right">
                                            	<form action="<?= base_url()."index.php/Home/Confirm_order" ?>" method="post">
                                            		<input type="hidden" name="user_id" value="<?php echo $user_id;?>">
                                            		<input type="submit" class="btn btn-block btn-sm btn-primary" value="Confirm order">
                                            	</form>
                                                
                                            </div><!-- End .float-right -->
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div><!-- End .cart-table-container -->

                    </div><!-- End .col-lg-8 -->

                </div><!-- End .row -->
            </div><!-- End .container -->

            <div class="mb-6"></div><!-- margin -->
        </main><!-- End .main -->