<div class="content-page">
                <!-- Start content -->
                <div class="content">
<div class="page-content-wrapper">

                        <div class="container">

                            <div class="row card">
                                
                                <div class="card-block">


                                  <div class="table-responsive">
  <table class="table" id="datatable" style="width: 100%;">

    <thead>
         <tr>
              <th>SR</th>
              <th>Full Name</th>
              <th>Amount</th>
              <th>Method</th>
              <th>Date Time</th>
               <th>Status</th>
         </tr>
    </thead>
    <tbody>
         <?php $serial=0;
          if($row > 0){
            foreach($row as $r):                                     
                                    $serial++;
                                        ?>
            <tr>
                <td><?php echo $serial; ?></td>
                <td><?php echo $r->full_name; ?></td>
                <td><?php echo $r->withdraw_amount; ?></td>
                <td><?php echo $r->account_type; ?></td>
                <td><?php echo $r->date_time; ?></td>
                <td>
                  <?php 
                  $status=$r->status;
                  if($status=='0'){ ?>
                    <a class="btn btn-danger btn-sm" style="color: white;">Pending</a></td>
                <?php  }else{ ?>
                    <a class="btn btn-success btn-sm" style="color: white;">Approved</a></td>
                <?php }  ?>
                </td>
               
 
            </tr>
                  <?php endforeach;
                }else { ?>
                <tr>
                  <td></td>
                  <td></td>
                <td>No Record Found</td>
                <td></td>
                <td></td>
              </tr>

                <?php } ?>   

      </tbody>
  </table>
</div>
<div class="text-center">
                                </div>

                            </div>

                            
                            </div>


                        </div><!-- container -->




                                                </div>

