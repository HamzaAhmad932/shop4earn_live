
<div class="content-page">
    <div class="content">
        <div class="page-content-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h3>Matching Commission</h3>
                        <div class="card m-b-20">
                            <div class="card-block">                   
                                <div class="container">
                                    <div class="row card">
                                        <form method="post" action="<?php echo site_url('Admin/saveMatchingCommission'); ?>">
                                        <div class="card-block">
                                            <div class="table-responsive">
                                                    <table class="table">
                                                        <tr>
                                                            <!-- <th  style="width: 150px;"></th> -->
                                                            <th style="width: 67px;">Basic %</th>
                                                            <th style="width: 67px;">Standard %</th>
                                                            <th style="width: 67px;">Silver %</th>
                                                            <th style="width: 67px;">Gold %</th>
                                                            <th style="width: 67px;">Diamond %</th>
                                                            <!-- <th style="width: 100px;"> Total % Per Level</th>  -->
                                                        </tr>                   
                                                        <tr>
                                                            <td>
                                                                <input type="text" value="<?= $commission->basic ?>" name="basic" style="width: 67px;">
                                                            </td>
                                                            <td>
                                                                <input type="text" value="<?= $commission->standard ?>" name="standard" style="width: 67px;">
                                                            </td>
                                                            <td>
                                                                <input type="text" value="<?= $commission->silver ?>" name="silver" style="width: 67px;">
                                                            </td>
                                                            <td>
                                                                <input type="text" value="<?= $commission->gold ?>" name="gold" style="width: 67px;">
                                                            </td>
                                                            <td>
                                                                <input type="text" value="<?= $commission->diamond ?>" name="diamond" style="width: 67px;">
                                                            </td>
                                                        </tr>
                                                    </table>
                                            </div>
                                            <div class="form-footer">
                                                <div class="form-footer-right text-right">
                                                    <div class="row">
                                                        <div class="col-sm-11">
                                                            <button type="submit" class="btn btn-primary">Save</button>
                                                        </div>
                                                        <div class="col-sm-1"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div> 
            </div>
        </div><!-- container -->
    </div>
</div>