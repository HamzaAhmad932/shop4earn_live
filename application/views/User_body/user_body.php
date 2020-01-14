Start right Content here -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">

<div class="page-content-wrapper">

    <div class="container">

    <div class="container">

        <div class="row">

          <!-- First widget -->
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
            <!-- End first widget -->

            <!-- Second widget -->
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
                      Direct Reffered Members
                  </div>
              </div>
            </div>
            <!-- End second widget -->

            <!-- Third widget -->
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="mini-stat clearfix bg-white">
                    <span class="mini-stat-icon bg-teal "><i class="fa fa-user"></i></span>
                    <div class="mini-stat-info text-right">
                        <span class="counter text-warning">
                        <?php 
                          echo strtoupper($level);
                           ?>                                          
                         </span>
                        Rank
                    </div>
                </div>
            </div>

            <!-- End third widget -->

            <!-- Fourth widget -->
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="mini-stat clearfix bg-white">
                    <span class="mini-stat-icon bg-pink"><i class="fa fa-users"></i></span>
                    <div class="mini-stat-info text-right">
                        <span class="counter text-pink">
                          2046/<?php echo $downline;?>
                        </span>
                      Downline
                  </div>
                    
                </div>
            </div>
            <!-- End fourth widget -->

            <!-- Fifth widget -->
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="mini-stat clearfix bg-white">
                    <span class="mini-stat-icon bg-primary"><i class="fa fa-user"></i></span>
                    <div class="mini-stat-info text-right">
                        <span class="counter text-primary">
                        <?php echo ($total_earn > 0 ? round($total_earn, 2) : 0);?>
                            </span>
                        Total Commission
                    </div>
                </div>
            </div>
            <!-- End fifth widget -->

            <!-- Sixth widget -->
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="mini-stat clearfix bg-white">
                  <span class="mini-stat-icon bg-pink"><i class="fa fa-users"></i></span>
                    <div class="mini-stat-info text-right">
                      <span class="counter text-pink">
                        <?php echo ($direct_bonus == '' ? 0 : round($direct_bonus, 2))?>
                      </span>
                      Direct Referral Bonous
                    </div>
                </div>
            </div>
            <!-- End six widget -->

            <!-- Seventh widget -->
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="mini-stat clearfix bg-white">
                    <span class="mini-stat-icon bg-warning">
                      <i class="fa fa-envelope"></i>
                    </span>
                    <div class="mini-stat-info text-right">
                      <span class="counter text-warning">
                        <?php echo ($get_comission == '' ? 0 : round($get_comission, 2));?>
                         </span>
                       Basic Bonus
                    </div>
                </div>
            </div>
            <!-- End seventh widget -->

            <!-- Eighth widget -->
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="mini-stat clearfix bg-white">
                    <span class="mini-stat-icon bg-pink"><i class="fa fa-users"></i></span>
                    <div class="mini-stat-info text-right">
                      <span class="counter text-pink">
                        <?php echo ($booster_com == '' ? 0 : round($booster_com, 2));?>
                      </span>
                      Booster Bonous
                    </div>
                </div>
            </div>
            <!-- End eighth widget -->

            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="mini-stat clearfix bg-white">
                    <span class="mini-stat-icon bg-pink"><i class="fa fa-users"></i></span>
                    <div class="mini-stat-info text-right">
                      <span class="counter text-pink">
                        <?php echo ($matching_comm == '' ? 0 : round($matching_comm, 2));?>
                      </span>
                      Matching Bonous
                    </div>
                </div>
            </div>
            <!-- End eighth widget -->


            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="mini-stat clearfix bg-white">
                    <span class="mini-stat-icon bg-success"><i class="fa fa-key"></i></span>
                    <div class="mini-stat-info text-right">
                        <span class="counter text-success">
                          <?php echo $payout;?>
                        </span>
                        Withdrawn
                    </div>
                   
                </div>
            </div>
            

            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="mini-stat clearfix bg-white">
                    <span class="mini-stat-icon bg-success"><i class="fa fa-key"></i></span>
                    <div class="mini-stat-info text-right">
                        <span class="counter text-success">
                          <?php echo $total_earn - $payout;?>
                        </span>
                        Balance
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
                        </div><!-- container