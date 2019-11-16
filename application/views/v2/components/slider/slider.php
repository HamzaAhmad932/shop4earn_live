<!-- Start right Content here -->
<div class="content-page">
    <!-- Start content -->
    <div class="content">
		<div class="page-content-wrapper">
			<div class="container">
                <div class="row">
                   	<div class="col-12">
                   		<h3>Add Image</h3>
                        <div class="card m-b-20">
                            <div class="card-block">
                            	<form 
                                    method="post" 
                                    action="<?= base_url().'index.php/Admin/storeSliderImage' ?>"
                                    enctype="multipart/form-data"
                                    >

                            		<input name="redirect" type="hidden" value="<?= $this->uri->uri_string() ?>"
                                     />
                            		<div class="form-group">
                            			<label>Upload Image:</label>
                            			<input 
                            				type="file" 
                            				name="image" 
                            				class="form-control"
                            			>
                            			<div style="color: red"><?php echo form_error('slider_image'); ?></div>
                            		</div>
                                    <div class="form-group">
                                        <label>Heading Description:</label>
                                        <input 
                                            type="text" 
                                            name="desc" 
                                            class="form-control"
                                        >
                                        <div style="color: red"><?php echo form_error('desc'); ?></div>
                                    </div>
                            		<div>
                                        <input type="submit" class="btn btn-primary" value="Submit">
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
