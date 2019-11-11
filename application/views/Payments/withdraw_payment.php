<div class="content-page">
                <!-- Start content -->
<div class="content">
<div class="page-content-wrapper">
  <div class="container">

                            <div class="row">
                                <div class="col-12">
                                    <div class="card m-b-20">
                                        <div class="card-block">


 <?php if($this->session->flashdata('error')){?>
 <div class="alert alert-warning">
  <strong>Error!</strong> <?php echo $this->session->flashdata('error')?>
</div>   
 <?php }elseif($this->session->flashdata('success')){ ?>
 <div class="alert alert-success">
  <strong>Success!</strong> <?php echo $this->session->flashdata('success')?>
</div>
<?php } ?>


<form method="post" action="<?php echo site_url('Users/withdraw_payment_request'); ?>">
    <div class="form-group row">
        <label for="example-text-input" class="col-sm-2 col-form-label">Select Method</label>
            <div class="col-sm-10">
<select class="form-control" name="account_type" onchange="myFunction()" id="account_type_id" required>
        <option value="" selected>Select Withdarw Method</option>
        <?php foreach($payment_methods as $method):?>
          <option value="<?= $method->id;?>"><?= $method->payment_method;?></option>
        <?php endforeach;?>                
</select>
    </div>
    </div>  

    <div id="cash_id" style="display: none;">
      <div class="form-group row">
          <label for="example-text-input" class="col-sm-2 col-form-label">Enter Number</label>
          <div class="col-sm-10">
              <input class="form-control" type="number" name="phone_number"  id="example-text-input" placeholder="ex: 03011234567">
          </div>
      </div>
       
  </div>                                       
        <div id="bank_id" style="display: none;">
         <div class="form-group row">
        <label for="example-text-input" class="col-sm-2 col-form-label">Select Bank</label>
        <div class="col-sm-10">
        <select class="form-control" name="selected_bank">
        <option value="">Select Bank</option>                       
        <option value="Allied Bank">Allied Bank</option>
        <option value="Habib Bank">Habib Bank</option>             
          </select>
               </div>
             </div>
             <div class="form-group row">
        <label for="example-text-input" class="col-sm-2 col-form-label">Enter Account Number</label>
           <div class="col-sm-10">
        <input class="form-control" type="number" value="0" name="bank_account_number"  id="example-text-input" >
            </div>
           </div>
       </div>
       <div id="amount" style="display: none;">
              <div class="form-group row">
        <label for="example-text-input" class="col-sm-2 col-form-label">Amount</label>
              <div class="col-sm-10">
          <select class="form-control" name="withdraw_bank_amount">                            
                 <option value="1000" selected>1000</option>
                 <option value="2000">2000</option>
                 <option value="3000">3000</option>
                 <option value="4000">4000</option>
                 <option value="5000">5000</option>                 
         </select>
               </div>
               </div>
            </div>

            <div class="form-group row">
          <label for="example-text-input" class="col-sm-2 col-form-label">Enter Password</label>
          <div class="col-sm-10">
              <input class="form-control" type="password" name="password" required>
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
