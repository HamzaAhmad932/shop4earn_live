<!-- Start right Content here -->
<div class="content-page">
    <!-- Start content -->
    <div class="content">
		<div class="page-content-wrapper">
			<div class="container">
                <div class="row">
                   	<div class="col-12">
                   		<h3>All Images</h3>
                        <div class="card m-b-20">
                            <div class="card-block">
                            	<a class="btn btn-primary" href="<?= site_url('Admin/addSliderImage');?>">Add New Image</a>
                                <br>
                                <br>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Sr.</th>
                                            <th>Image</th>
                                            <th>Description</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if($images):?>
                                            <?php $sr = 0;?>
                                            <?php foreach($images as $img):?>
                                                <?php $sr = $sr+1;?>
                                            <tr>
                                                <td><?= $sr;?></td>
                                                <td><img class="img img-responsive" width="80" height="80" src="<?= base_url($img->img_path)?>"></td>
                                                <td><?= $img->img_desc;?></td>
                                                <td><a class="btn btn-danger btn-sm" href="<?= site_url('Admin/deleteSliderImage/'.$img->id)?>">Delete</a></td>
                                            </tr>
                                            <?php endforeach;?>
                                        <?php else:?>
                                            <tr>
                                                <td colspan="4">Record not found</td>
                                            </tr>
                                        <?php endif;?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
