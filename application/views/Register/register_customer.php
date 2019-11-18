<!-- Start right Content here -->
<div class="content-page">
    <!-- Start content -->
    <div class="content">
		<div class="page-content-wrapper">
			<div class="container">
                <div class="row">
                   	<div class="col-12">
                   		<h3>Register Customer</h3>
                        <div style="color: red"><?php echo validation_errors(); ?></div>
                        <div class="card m-b-20">
                            <div class="card-block">
                            	<form action="<?= base_url()."index.php/Admin/register_customer_validate" ?>" method="post">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group required-field">
                                            <label for="acc-name">Sponser ID.</label>
                                            <input type="text" class="form-control" id="referal_id" name="referal_id" value="<?php echo set_value('referal_id'); ?>"  >
                                        </div><!-- End .form-group -->
                                        <div style="color: red"><?php echo form_error('referal_check'); ?></div>
                                    </div><!-- End .col-md-4 -->

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="acc-mname">User Name</label>
                                            <input type="text" class="form-control" id="full_name" name="full_name" value="<?php echo set_value('full_name'); ?>"  >
                                        </div><!-- End .form-group -->
                                        <div style="color: red"><?php echo form_error('full_name'); ?></div>
                                    </div><!-- End .col-md-4 -->
                                </div><!-- End .row -->
                            </div><!-- End .col-sm-11 -->
                        </div><!-- End .row -->

                        <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="acc-lastname">Email Address</label>
                                <input type="text" class="form-control" id="email" name="email" value="<?php echo set_value('email'); ?>">
                            </div><!-- End .form-group -->
                        </div><!-- End .col-md-4 -->

                        <div class="col-md-6">
                            <div class="form-group required-field">
                                <label for="acc-lastname">User ID</label>
                                <input type="text" class="form-control" id="user_id" name="user_id" value="<?= $user_id + 1 ?>" disabled>
                            </div><!-- End .form-group -->
                        </div>

                        <div class="col-md-6">
                            <div class="form-group required-field">
                                <label for="acc-lastname">City</label>
                                <input type="text" class="form-control" id="city" name="city" value="<?php echo set_value('city'); ?>"required>
                            </div><!-- End .form-group -->
                            <div style="color: red"><?php echo form_error('city'); ?></div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group required-field">
                                <label for="acc-lastname">Mobile</label>
                                <input type="text" class="form-control" id="mobile" name="mobile" value="<?php echo set_value('mobile'); ?>" required>
                                <div style="color: red"><?php echo form_error('mobile'); ?></div>
                            </div><!-- End .form-group -->
                        </div>


                        <!-- <div class="col-md-6">
                            <div class="form-group required-field">
                                <label for="acc-lastname">Province</label>
                                <input type="text" class="form-control" id="provience" name="provience" value="<?php echo set_value('provience'); ?>" required>
                            </div>
                        </div> -->

                            <div class="col-md-6">
                                <div class="form-group required-field">
                                    <label for="acc-lastname"> Password</label>
                                    <input type="password" class="form-control" id="password" name="password" required>
                                    <div style="color: red"><?php echo form_error('password'); ?></div>
                                </div><!-- End .form-group -->
                            </div>
                            <div class="col-md-6">
                                <div class="form-group required-field">
                                    <label for="acc-lastname">Confirm Password</label>
                                    <input type="password" class="form-control" id="cpassword" name="cpassword" required>
                                </div><!-- End .form-group -->
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                      <div class="checkbox">
                                        <label><input type="checkbox" name="is_active"> &nbsp;&nbsp; Active (User is activated and commission is delivered immediatly)</label>
                                      </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group required-field">
                                    <label for="acc-lastname">Product</label>
                                    <select class="form-control" name="product_id" required>
                                        <option value="" selected>Select product</option>
                                        <?php foreach($products as $product):?>
                                            <option value="<?= $product->id;?>"><?= '('.$product->product_code.') '.$product->product_name.' (Rs. '.$product->product_price.')';?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div><!-- End .form-group -->
                            </div>
                            <div class="col-md-6">
                                <div class="form-group required-field">
                                    <label for="acc-lastname">Quantity</label>
                                    <input type="number" name="qty" class="form-control" value="1" required>
                                </div><!-- End .form-group -->
                            </div>
                        </div>

                            <!-- <div class="required text-right">* Required Field</div> -->
                            <div class="form-footer">
                                <!-- <a href="#"><i class="icon-angle-double-left"></i>Back</a> -->

                                <div class="form-footer-right text-right">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </div><!-- End .form-footer -->

                        </div>
                    </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
