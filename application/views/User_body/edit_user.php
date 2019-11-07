<!-- Start right Content here -->
<div class="content-page">
    <!-- Start content -->
    <div class="content">
		<div class="page-content-wrapper">
			<div class="container">
                <div class="row">
                   	<div class="col-12">
                   		<h3>Edit User</h3>
                        <div class="card m-b-20">
                            <div class="card-block">
                            	<form method="POST" action="<?= base_url().'index.php/Admin/update_user_detail' ?>">
                            		<input name="redirect" type="hidden" value="<?= $this->uri->uri_string() ?>" />
                            		<input type="hidden" name="user_id" value="<?= $user->id?>">
                            		<div class="form-group">
                            			<label>User Name</label>
                            			<input 
                            				type="text" 
                            				name="full_name" 
                            				class="form-control"
                            				value="<?php echo $user->full_name?>"
                            			>
                            			<div style="color: red"><?php echo form_error('full_name'); ?></div>
                            		</div>
                            		<div class="form-group">
                            			<label>Email</label>
                            			<input 
                            				type="email" 
                            				name="email" 
                            				class="form-control"
                            				value="<?php echo $user->email?>"
                            			>
                            			<div style="color: red"><?php echo form_error('email'); ?></div>
                            		</div>
                            		<div class="form-group">
                            			<label>Phone</label>
                            			<input 
                            				type="text" 
                            				name="mobile" 
                            				class="form-control"
                            				value="<?php echo $user->mobile?>"
                            			>
                            			<div style="color: red"><?php echo form_error('mobile'); ?></div>
                            		</div>
                            		<div class="form-group">
                            			<label>Password</label>
                            			<input 
                            				type="text" 
                            				name="password" 
                            				class="form-control"
                            				value="<?php echo $user->password?>"
                            			>
                            			<div style="color: red"><?php echo form_error('password'); ?></div>
                            		</div>
                            		<div>
                            			<button class="btn btn-primary" type="submit">Save Changes</button>
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
