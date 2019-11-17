<script type="text/javascript">
 
   function clickAndDisable(link) {
     // disable subsequent clicks
     link.onclick = function(event) {
        event.preventDefault();
     }
   }   
 
</script>

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
              <th>ID</th>
              <th>Full Name</th>
              <th>Mobile</th>
              <th>Email</th>
              <th>Password</th>
              <th>Referal ID</th>
              <th>Action</th>
             
         </tr>
         </thead>
         <tbody>
          <?php $serial=0;
          if($row > 0){
            foreach($row as $r):                                     
                                    $serial++;
                                        ?>
            <tr <?php if($r->type == '0'){ echo ('style="background: #ddd;"');}?>>
                <td><?php echo $r->user_id; ?></td>
                <td><?php echo $r->full_name; ?></td>
                <td><?php echo $r->mobile; ?></td>
                <td><?php echo $r->email; ?></td>
                <td><?php echo $r->password; ?></td>
                <td><?php echo $r->referal_id; ?></td>
                <td>
                <a class="btn btn-primary btn-sm" href="<?php echo site_url("Admin/customer_tree");?>/<?php echo $r->id; ?>">View</a>
                  <a class="btn btn-danger btn-sm" href="<?php echo site_url("Admin/edit_users");?>/<?php echo $r->id; ?>">Edit</a>

                  <a class="btn btn-info btn-sm" href="<?php echo site_url("Admin/Upline");?>/<?php echo $r->parent_id; ?>">Upline</a>
                   
                  <a class="btn btn-primary btn-sm" href="<?php echo site_url("Admin/Downline");?>/<?php echo $r->user_id; ?>">Downline</a>
                  <a class="btn btn-danger btn-sm" href="#">Delete</a>

                     <?php if($r->type != '1'):?> 
                      <?php if($r->type == '0'):?>
                        <a class="btn btn-primary btn-sm" href="<?php echo site_url("index.php/Admin/approve_user");?>/<?php echo $r->user_id; ?>">Activate</a>
                        
                        <?php else:?>
                          <a class="btn btn-danger btn-sm" href="<?php echo site_url("index.php/Admin/approve_user");?>/<?php echo $r->user_id; ?>">Deactivate</a>
                          
                          <?php endif;?>
                    <?php endif;?>
               
 
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


                            </div>

                            
                            </div>


                        </div><!-- container -->
