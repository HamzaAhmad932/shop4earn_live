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

                                    if($total_register_member > 0){

                                        echo $total_register_member;
                                    } else{

                                        echo "0";
                                    }
                                    ?>
                                    </span>
                                    Total Network Member
                                </div>

                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-3">
                            <div class="mini-stat clearfix bg-white">
                                <span class="mini-stat-icon bg-success"><i class="fa fa-key"></i></span>
                                <div class="mini-stat-info text-right">
                                            <span class="counter text-success">
                                            <?= $approved_users;?>
                                            </span>
                                    Total Approved Customer
                                </div>

                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-3">
                            <div class="mini-stat clearfix bg-white">
                                <span class="mini-stat-icon bg-success"><i class="fa fa-key"></i></span>
                                <div class="mini-stat-info text-right">
                                            <span class="counter text-success">
                                            <?= $total_active_customers?>
                                            </span>
                                    Total Active Customer
                                </div>

                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-3">
                            <div class="mini-stat clearfix bg-white">
                                <span class="mini-stat-icon bg-success"><i class="fa fa-key"></i></span>
                                <div class="mini-stat-info text-right">
                                            <span class="counter text-success">
                                            0
                                            </span>
                                    Today Joining
                                </div>

                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-3">
                            <div class="mini-stat clearfix bg-white">
                                <span class="mini-stat-icon bg-success"><i class="fa fa-key"></i></span>
                                <div class="mini-stat-info text-right">
                                            <span class="counter text-success">
                                            <?= $total['total_sale']?>
                                            </span>
                                    Total Sale
                                </div>

                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-3">
                            <div class="mini-stat clearfix bg-white">
                                <span class="mini-stat-icon bg-warning"><i class="fa fa-envelope"></i></span>
                                <div class="mini-stat-info text-right">
                                            <span class="counter text-warning">
                                                <?php
                                                if($total['total_basic'] > 0){
                                                    echo round($total['total_basic'], 2);
                                                }
                                                else{
                                                    echo "0";
                                                }

                                                ?>
                                            </span>

                                    Total Basic
                                </div>

                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-3">
                            <div class="mini-stat clearfix bg-white">
                                <span class="mini-stat-icon bg-warning"><i class="fa fa-envelope"></i></span>
                                <div class="mini-stat-info text-right">
                                            <span class="counter text-warning">
                                                <?php
                                                if($base_share_amount > 0){
                                                    echo round($base_share_amount, 2);
                                                }
                                                else{
                                                    echo "0";
                                                }

                                                ?>
                                            </span>

                                    Basic Consumed
                                </div>

                            </div>
                        </div>

                        <div class="col-md-6 col-lg-6 col-xl-3">
                            <div class="mini-stat clearfix bg-white">
                                <span class="mini-stat-icon bg-warning"><i class="fa fa-envelope"></i></span>
                                <div class="mini-stat-info text-right">
                                            <span class="counter text-warning">
                                                <?php
                                                $basic_bal = $total['total_basic'] - $base_share_amount;
                                                echo round($basic_bal, 2);
                                                ?>
                                            </span>

                                    Balance Basic
                                </div>

                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-3">
                            <div class="mini-stat clearfix bg-white">
                                <span class="mini-stat-icon bg-pink"><i class="fa fa-users"></i></span>
                                <div class="mini-stat-info text-right">
                                            <span class="counter text-warning">
                                                <?php
                                               if($total['direct_bonus'] > 0){
                                                   echo round($total['direct_bonus'], 2);
                                               }
                                               else{
                                                   echo "0";
                                               }

                                               ?>
                                            </span>
                                            Total Direct Bonus
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-6 col-xl-3">
                            <div class="mini-stat clearfix bg-white">
                                <span class="mini-stat-icon bg-pink"><i class="fa fa-users"></i></span>
                                <div class="mini-stat-info text-right">
                                            <span class="counter text-pink">
                                               <?php
                                               if($total['total_booster'] > 0){
                                                   echo round($total['total_booster'], 2);
                                               }
                                               else{
                                                   echo "0";
                                               }

                                               ?>
                                       </span>
                                    Total Booster
                                </div>

                            </div>
                        </div>

                        <div class="col-md-6 col-lg-6 col-xl-3">
                            <div class="mini-stat clearfix bg-white">
                                <span class="mini-stat-icon bg-pink"><i class="fa fa-users"></i></span>
                                <div class="mini-stat-info text-right">
                                            <span class="counter text-pink">
                                               <?php
                                               if($boster_share_amount > 0){
                                                   echo round($boster_share_amount, 2);
                                               }
                                               else{
                                                   echo "0";
                                               }

                                               ?>
                                       </span>
                                    Booster Consumed
                                </div>

                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-3">
                            <div class="mini-stat clearfix bg-white">
                                <span class="mini-stat-icon bg-pink"><i class="fa fa-users"></i></span>
                                <div class="mini-stat-info text-right">
                                            <span class="counter text-pink">
                                               <?php
                                               $booster_bal = $total['total_booster'] - $boster_share_amount;
                                                   echo round($booster_bal, 2);
                                               ?>
                                       </span>
                                    Balance Booster
                                </div>

                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-3">
                            <div class="mini-stat clearfix bg-white">
                                <span class="mini-stat-icon bg-blue-grey"><i class="fa fa-user"></i></span>
                                <div class="mini-stat-info text-right">
                                            <span class="counter text-warning">
                                                <?= $total['product_profit'];?>
                                            </span>
                                    Product Profit
                                </div>

                            </div>
                        </div>

                        <div class="col-md-6 col-lg-6 col-xl-3">
                            <div class="mini-stat clearfix bg-white">
                                <span class="mini-stat-icon bg-brown"><i class="fa fa-lock"></i></span>
                                <div class="mini-stat-info text-right">
                                            <span class="counter text-warning">
                                                <?= $total['payment_paid']?>
                                            </span>
                                    Payment Paid
                                </div>

                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-3">
                            <div class="mini-stat clearfix bg-white">
                                <span class="mini-stat-icon bg-teal "><i class="fa fa-user"></i></span>
                                <div class="mini-stat-info text-right">
                                            <span class="counter text-warning">
                                                <?= $total['payment_pending']?>
                                            </span>
                                    Pending Payments
                                </div>

                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-3">
                            <div class="mini-stat clearfix bg-white">
                                <span class="mini-stat-icon bg-teal "><i class="fa fa-envelope"></i></span>
                                <div class="mini-stat-info text-right">
                                            <span class="counter text-warning">
                                                <?php 
                                                    $hold = $total['product_profit'] + $basic_bal + $booster_bal;
                                                    echo round($hold, 2);
                                                ?>
                                            </span>
                                    Company Hold
                                </div>

                            </div>
                        </div>

                        <div class="col-md-6 col-lg-6 col-xl-3">
                            <div class="mini-stat clearfix bg-white">
                                <span class="mini-stat-icon bg-teal "><i class="fa fa-envelope"></i></span>
                                <div class="mini-stat-info text-right">
                                            <span class="counter text-warning">
                                                <?php 
                                                    echo $total['visitor_count'];
                                                ?>
                                            </span>
                                    Site visitors
                                </div>

                            </div>
                        </div>
                    </div>


                </div><!-- container -->
            </div>
        </div><!-- container -->