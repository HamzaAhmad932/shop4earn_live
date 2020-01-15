<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">
        $(document).ready(function(){
            $("#image1").change(function(){
                readImageData(this, 'preview_img1');
            });
            $("#image2").change(function(){
                readImageData(this, 'preview_img2');
            });
            $("#image3").change(function(){
                readImageData(this, 'preview_img3');
            });
        });

        function readImageData(imgData, preview=''){
            if (imgData.files && imgData.files[0]) {
                var readerObj = new FileReader();
                
                readerObj.onload = function (element) {
                    $('#'+preview).attr('src', element.target.result);
                }
                
                readerObj.readAsDataURL(imgData.files[0]);
            }
        }
        </script>
            <style>
            .form_box{width:500px; margin:0 auto; margin-top:10px; margin-bottom: 40px; text-align: left;}
            .fileinput{margin-left: 10px;}
            .preview_box{clear: both; padding: 5px; margin-top: 10px; text-align: center;}
            .preview_box img{max-width: 100%; max-height: 500px;}
        </style>

<!-- Start right Content here -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
<div class="page-content-wrapper">
  
  <div class="container">

                            <div class="row">
                                <div class="col-12">
                                    <div class="card m-b-20">
                                        <div class="card-block">
     

    <form method="post" action="<?php echo site_url('Admin/addnew_product_validate'); ?>" enctype="multipart/form-data">
                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-2 col-form-label">Product Code</label>
                                                <div class="col-sm-10">
                                    <input class="form-control" type="text" value="" name="product_code"  id="example-text-input" required>
                                                </div>
                                            </div>

                                             <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-2 col-form-label">Product Name</label>
                                                <div class="col-sm-10">
    <input class="form-control" type="text" value="" name="product_name" id="example-text-input" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-2 col-form-label">Basic Volume</label>
                                                <div class="col-sm-10">
    <input class="form-control" type="text" value="" name="basic_volume" id="example-text-input" required>
                                                </div>
                                            </div>
 <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-2 col-form-label">Booster Volume</label>
                                                <div class="col-sm-10">
    <input class="form-control" type="text" value="" name="booster_volume" id="example-text-input" required>
                                                </div>
                                            </div>
            <div class="form-group row">
                <label for="example-text-input" class="col-sm-2 col-form-label">Direct Referal Bonus</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" value="" name="direct_sponser_bonus" id="example-text-input" required>
                    </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-sm-2 col-form-label">Matching Bonus</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" value="" name="matching_bonus" id="example-text-input" >
                    </div>
            </div>
                                             <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-2 col-form-label">Purchase Cost</label>
                                                <div class="col-sm-10">
    <input class="form-control" type="text" value="" name="purchase_cost" id="example-text-input" required>
                                                </div>
                                            </div>

 <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-2 col-form-label">Product Description</label>
                                                <div class="col-sm-10">
    <input class="form-control" type="text" value="" name="product_des" id="example-text-input" required>
                                                </div>
                                            </div>
                                             <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-2 col-form-label">Product Category</label>
                                                <div class="col-sm-10">
    <input class="form-control" type="text" value="" name="product_cat" id="example-text-input" required>
                                                </div>
                                            </div>
 <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-2 col-form-label">Related Product</label>
                                                <div class="col-sm-10">
    <input class="form-control" type="text" value="" name="related_products" id="example-text-input" required>
                                                </div>
                                            </div>
       <div class="form-group row">
                <label for="example-text-input" class="col-sm-2 col-form-label">Select Images</label>
                <div class="col-sm-3">
                    <input type="file" id="image1" name="image1" class="fileinput"/>
                </div> 
                <div class="col-sm-3">
                    <input type="file" id="image2" name="image2" class="fileinput"/>
                </div> 
                <div class="col-sm-3">
                    <input type="file" id="image3" name="image3" class="fileinput"/>
                </div> 
        </div>
        <div class="form-group-row">
            <div class="col-sm-2">
                <label>Preview</label>
            </div>
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-3">
                  <div class="preview_box" style="height: 150px !important; width: 150px !important;">
                    <img id="preview_img1" name="image" src="" style="width: 50%;height: 50%;" />
                </div>   
                </div>
                <div class="col-sm-3">
                    <div class="preview_box" style="height: 150px !important; width: 150px !important;">
                    <img id="preview_img2" name="image" src="" style="width: 50%;height: 50%;" />
                </div>
                </div>
                <div class="col-sm-3">
                    <div class="preview_box" style="height: 150px !important; width: 150px !important;">
                    <img id="preview_img3" name="image" src="" style="width: 50%;height: 50%;" />
                </div>
                </div>
            </div>
        </div>
 <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-2 col-form-label">Rate</label>
                                                <div class="col-sm-10">
    <input class="form-control" type="text" value="" name="rate" id="example-text-input" required>
                                                </div>
                                            </div>

 <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-2 col-form-label">Quantity</label>
                                                <div class="col-sm-10">
    <input class="form-control" type="text" value="" name="qty" id="example-text-input" required>
                                                </div>
                                            </div>
 <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-2 col-form-label">Discount</label>
                                                <div class="col-sm-10">
    <input class="form-control" type="text" value="" name="discount" id="example-text-input" required>
                                                </div>
                                            </div>

 <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-2 col-form-label">Net Amount(after discount)</label>
                                                <div class="col-sm-10">
    <input class="form-control" type="text" value="" name="net_amount" id="example-text-input" required>
                                                </div>
                                            </div>



                                          
                                                    <div class="form-group row">
                                                <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                                                <div class="col-sm-10">

                                                       <button type="submit" class="btn btn-primary waves-effect waves-light">
                                                            Submit
                                                        </button>
                                                </div>
                                            </div>
                                     

                                      </form>
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->

                        </div>
                

</div><!-- container -->