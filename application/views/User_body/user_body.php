<!-- Start right Content here -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">

<div class="page-content-wrapper">

    <div class="container">

    <div class="container">

        <div class="row">

            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="mini-stat clearfix bg-white">
                    <span class="mini-stat-icon bg-primary"><i class="fa fa-user"></i></span>
                    <div class="mini-stat-info text-right">
                        <span class="counter text-primary">
                        <?php
                         if($total_earn > 0){
                          echo round($total_earn, 2);
                          }
                          else{
                            echo "0";
                          }

                           ?>
                            </span>
                        Total Earn
                    </div>
                
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="mini-stat clearfix bg-white">
                    <span class="mini-stat-icon bg-success"><i class="fa fa-key"></i></span>
                    <div class="mini-stat-info text-right">
                        <span class="counter text-success">
                          <?php echo $payout;?>
                        </span>
                        Total Payouts
                    </div>
                   
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="mini-stat clearfix bg-white">
                    <span class="mini-stat-icon bg-warning"><i class="fa fa-envelope"></i></span>
                    <div class="mini-stat-info text-right">
                        <span class="counter text-warning">
                            <?php 
                if($get_comission==''){
                    echo '0';
                }          
                else{
                echo round($get_comission, 2);
           }

                           ?> 
                         </span>
                       Basic Comission
                    </div>
                  
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="mini-stat clearfix bg-white">
                    <span class="mini-stat-icon bg-pink"><i class="fa fa-users"></i></span>
                    <div class="mini-stat-info text-right">
                        <span class="counter text-pink">
                         
                        <?php 
                if($booster_com==''){
                    print_r("0");
                }          
                else{
               echo round($booster_com, 2);
           }

                           ?> 
                   </span>
                       Booster Bonous
                    </div>
                    
                </div>
            </div>

            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="mini-stat clearfix bg-white">
                    <span class="mini-stat-icon bg-pink"><i class="fa fa-users"></i></span>
                    <div class="mini-stat-info text-right">
                        <span class="counter text-pink">
                         
                        <?php 
                if($direct_bonus==''){
                    echo "0";
                }          
                else{
               echo round($direct_bonus, 2);
           }

                           ?> 
                   </span>
                       Direct Referal Bonous
                    </div>
                    
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="mini-stat clearfix bg-white">
                    <span class="mini-stat-icon bg-teal "><i class="fa fa-envelope"></i></span>
                    <div class="mini-stat-info text-right">
                        <span class="counter text-warning">
                           <?php 
                if($total_earn==''){
                    print_r("0");
                }          
                else{
               echo round($total_earn, 2);
           }

                           ?> 
                         </span>
                       Total Comission
                    </div>
                  
                </div>
    </div>
                              <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="mini-stat clearfix bg-white">
                    <span class="mini-stat-icon bg-blue-grey"><i class="fa fa-user"></i></span>
                    <div class="mini-stat-info text-right">
                        <span class="counter text-warning">
                        <?php print_r($user_id); ?>                                          </span>
                        My ID
                    </div>
                  
                </div>
            </div>

    <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="mini-stat clearfix bg-white">
                    <span class="mini-stat-icon bg-brown"><i class="fa fa-lock"></i></span>
                    <div class="mini-stat-info text-right">
                        <span class="counter text-warning">
                             <?php 
                if($direct_referals==''){
                    echo "0";
                }          
                else{
               print_r($direct_referals);
           }

                           ?> 
                          </span>
                        Refered Members
                    </div>
                  
                </div>
    </div>
              <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="mini-stat clearfix bg-white">
                    <span class="mini-stat-icon bg-teal "><i class="fa fa-user"></i></span>
                    <div class="mini-stat-info text-right">
                        <span class="counter text-warning">
                        <?php 
                 print_r($level);

                           ?>                                          </span>
                        Member Level
                    </div>
                  
                </div>
    </div>


    <!-- <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="mini-stat clearfix bg-white">
                    <span class="mini-stat-icon bg-teal "><i class="fa fa-user"></i></span>
                    <div class="mini-stat-info text-right">
                        <span class="counter text-warning">
                          
                                              </span>
                        Direct Bonus
                    </div>
                  
                </div>
    </div> -->
            <!-- <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="mini-stat clearfix bg-white">
                    <span class="mini-stat-icon bg-purple"><i class="fa fa-lock"></i></span>
                    <div class="mini-stat-info text-right">
                        <span class="counter text-pink">
                                                                      </span>
                        Current Level
                    </div>
                    
                </div>
            </div> -->
        </div>


    </div><!-- container -->
        </div>
                        </div><!-- container -->