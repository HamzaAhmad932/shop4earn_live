        <main class="main">
            <div class="home-slider-container">
                <div class="home-slider owl-carousel owl-theme owl-theme-light">
                <?php foreach($sliders as $slider):?>
                    <div class="home-slide">
                        <div class="slide-bg owl-lazy"  data-src="<?php echo base_url($slider->img_path)?>"></div><!-- End .slide-bg -->
                        <div class="container">
                            <div class="home-slide-content">
                                <div class="slide-border-top">
                                    <img src="<?php echo base_url($slider->img_path)?>" alt="Border" width="290" height="38">
                                </div><!-- End .slide-border-top -->
                                <h3>80% off for select items</h3>
                                <h1>fashion mega sale</h1>
                                <a href="category.html" class="btn btn-primary">Shop Now</a>
                                <div class="slide-border-bottom">
                                    <img src="<?php echo base_url($slider->img_path)?>" alt="Border" width="290" height="111">
                                </div><!-- End .slide-border-bottom -->
                            </div><!-- End .home-slide-content -->
                        </div><!-- End .container -->
                    </div><!-- End .home-slide -->
                <?php endforeach;?>
                </div><!-- End .home-slider -->
            </div><!-- End .home-slider-container -->

            <div class="info-boxes-container">
                <div class="container">
                    <div class="info-box">
                        <i class="icon-shipping"></i>

                        <div class="info-box-content">
                            <h4>FREE SHIPPING & RETURN</h4>
                            <p>Free shipping on all orders over Pakistan</p>
                        </div><!-- End .info-box-content -->
                    </div><!-- End .info-box -->

                    <div class="info-box">
                        <i class="icon-us-dollar"></i>

                        <div class="info-box-content">
                            <h4>MONEY BACK GUARANTEE</h4>
                            <p>100% money back guarantee</p>
                        </div><!-- End .info-box-content -->
                    </div><!-- End .info-box -->

                    <div class="info-box">
                        <i class="icon-support"></i>

                        <div class="info-box-content">
                            <h4>ONLINE SUPPORT 24/7</h4>
                            <p>Team is ready to provide support</p>
                        </div><!-- End .info-box-content -->
                    </div><!-- End .info-box -->
                </div><!-- End .container -->
            </div><!-- End .info-boxes-container -->
            
        
           <main class="main">

            <div class="container">
                <!-- <nav class="toolbox">
                    <div class="toolbox-left">
                        <div class="toolbox-item toolbox-sort">
                            <div class="select-custom">
                                <select name="orderby" class="form-control">
                                    <option value="menu_order" selected="selected">Default sorting</option>
                                    <option value="popularity">Sort by popularity</option>
                                    <option value="rating">Sort by average rating</option>
                                    <option value="date">Sort by newness</option>
                                    <option value="price">Sort by price: low to high</option>
                                    <option value="price-desc">Sort by price: high to low</option>
                                </select>
                            </div>

                            <a href="#" class="sorter-btn btn-desc" title="Set Descending Direction"><span class="sr-only">Set Descending Direction</span></a>
                        </div>
                    </div>

                    <div class="toolbox-item toolbox-show">
                            <label>Showing 1–9 of 60 results</label>
                        </div>

                    <div class="layout-modes">
                        <a href="category.html" class="layout-btn btn-grid active" title="Grid">
                            <i class="icon-mode-grid"></i>
                        </a>
                        <a href="category-list.html" class="layout-btn btn-list" title="List">
                            <i class="icon-mode-list"></i>
                        </a>
                    </div>
                </nav> -->
                <div class="row row-sm">
                    <?php foreach($products as $product):?>
                    <div class="col-6 col-md-4 col-lg-3 col-xl-5col">
                        <div class="product">
                            <figure class="product-image-container">
                                <a href="<?php echo base_url('index.php/Home/Product_details1/'.$product->id)?>" class="product-image">
                                    <img style="width: 218px !important; height: 218px !important;"src="<?php echo base_url($product->img_path)?>" alt="product">
                                </a>
                                <a href="#" data-toggle="modal" data-target="#exampleModal" class="btn-quickview">Quickview</a>
                            </figure>
                            <div class="product-details">
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:80%"></span><!-- End .ratings -->
                                    </div><!-- End .product-ratings -->
                                </div><!-- End .product-container -->
                                <h2 class="product-title">
                                    <a href="<?php echo base_url('index.php/Home/Product_details1/'.$product->id)?>"><?php echo $product->product_name?></a>
                                </h2>
                                <div class="price-box">
                                    <span class="product-price">Rs.<?php echo $product->product_price?></span>
                                </div><!-- End .price-box -->

                                <div class="product-action">
                                    <a href="#" class="paction add-wishlist" title="Add to Wishlist">
                                        <span>Add to Wishlist</span>
                                    </a>

                                    <a href="<?php echo base_url('index.php/Home/Product_details1/'.$product->id)?>" class="paction add-cart" title="Add to Cart">
                                        <span>Add to Cart</span>
                                    </a>

                                    <a href="#" class="paction add-compare" title="Add to Compare">
                                        <span>Add to Compare</span>
                                    </a>
                                </div><!-- End .product-action -->
                            </div><!-- End .product-details -->
                        </div><!-- End .product -->
                    </div>
                <?php endforeach;?>
                </div><!-- End .row -->

                <nav class="toolbox toolbox-pagination">
                    <div class="toolbox-item toolbox-show">
                        <label>Showing 1–9 of 60 results</label>
                    </div><!-- End .toolbox-item -->

                    <ul class="pagination">
                        <li class="page-item disabled">
                            <a class="page-link page-link-btn" href="#"><i class="icon-angle-left"></i></a>
                        </li>
                        <li class="page-item active">
                            <a class="page-link" href="#">1 <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">4</a></li>
                        <li class="page-item"><span>...</span></li>
                        <li class="page-item"><a class="page-link" href="#">15</a></li>
                        <li class="page-item">
                            <a class="page-link page-link-btn" href="#"><i class="icon-angle-right"></i></a>
                        </li>
                    </ul>
                </nav>
            </div><!-- End .container -->

            <div class="mb-5"></div><!-- margin -->
        </main><!-- End .main -->

            <div class="mb-5"></div><!-- margin -->

            <div class="info-section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="feature-box feature-box-simple text-center">
                                <i class="icon-earphones-alt"></i>

                                <div class="feature-box-content">
                                    <h3>Customer Support<span>Need Assistence?</span></h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec vestibulum magna, et dapib.</p>
                                </div><!-- End .feature-box-content -->
                            </div><!-- End .feature-box -->
                        </div><!-- End .col-md-4 -->
                        
                        <div class="col-md-4">
                            <div class="feature-box feature-box-simple text-center">
                                <i class="icon-credit-card"></i>

                                <div class="feature-box-content">
                                    <h3>secured payment <span>Safe & Fast</span></h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec vestibulum magna, et dapibus lacus. Lorem ipsum dolor sit amet.consectetur adipiscing elit. </p>
                                </div><!-- End .feature-box-content -->
                            </div><!-- End .feature-box -->
                        </div><!-- End .col-md-4 -->

                        <div class="col-md-4">
                            <div class="feature-box feature-box-simple text-center">
                                <i class="icon-action-undo"></i>

                                <div class="feature-box-content">
                                    <h3>Returns <span>Easy & Free</span></h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec vestibulum magna, et dapibus lacus.</p>
                                </div><!-- End .feature-box-content -->
                            </div><!-- End .feature-box -->
                        </div><!-- End .col-md-4 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .info-section -->

        

            <div class="partners-container">
                <div class="container">
                    <div class="partners-carousel owl-carousel owl-theme">
                        <a href="#" class="partner">
                            <img src="<?php echo base_url('v2/assets/images/logos/1.png')?>" alt="logo">
                        </a>
                        <a href="#" class="partner">
                            <img src="<?php echo base_url('v2/assets/images/logos/2.png')?>" alt="logo">
                        </a>
                        <a href="#" class="partner">
                            <img src="<?php echo base_url('v2/assets/images/logos/3.png')?>" alt="logo">
                        </a>
                        <a href="#" class="partner">
                            <img src="<?php echo base_url('v2/assets/images/logos/4.png')?>" alt="logo">
                        </a>
                        <a href="#" class="partner">
                            <img src="<?php echo base_url('v2/assets/images/logos/5.png')?>" alt="logo">
                        </a>
                        <a href="#" class="partner">
                            <img src="<?php echo base_url('v2/assets/images/logos/2.png')?>" alt="logo">
                        </a>
                        <a href="#" class="partner">
                            <img src="<?php echo base_url('v2/assets/images/logos/1.png')?>" alt="logo">
                        </a>
                    </div><!-- End .partners-carousel -->
                </div><!-- End .container -->
            </div><!-- End .partners-container -->

        
        </main><!-- End .main -->

        <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>