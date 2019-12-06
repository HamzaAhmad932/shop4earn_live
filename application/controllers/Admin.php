<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __Construct(){

		parent::__Construct();
		$this->load->model('Admin_model');
		$this->load->model('Home_model');
	}

	public function test_sales(){


	}

	public function index(){
		if(isset($this->session->userdata['logged_in'])) {
			$sess_data=$this->session->userdata('logged_in');
            $data['full_name']=$sess_data['full_name'];
            $admin_id = $sess_data['id'];
            $data['total_register_member']=$this->Admin_model->total_register_member();
            $data['base_share_amount']=$this->Admin_model->base_share_amount();
            $data['boster_share_amount']=$this->Admin_model->boster_share_amount();
            $data['approved_users'] = $this->Admin_model->approvedUsers();
            $data['total_active_customers'] = $this->Admin_model->totalActiveCustomers();
            $data['total'] = $this->Admin_model->totalSale();

            $this->load->view('Admin_header/admin_header');
            $this->load->view('Admin_sidebar/admin_sidebar');
            $this->load->view('Admin_topbar/admin_topbar',$data);
            $this->load->view('Admin_body/admin_body',$data);
            $this->load->view('Admin_footer/admin_footer');
		}
		else{

		    redirect('Home/Login1');
		}
	}

	public function approve_user($id){
		if(isset($this->session->userdata['logged_in'])) {
			$sess_data=$this->session->userdata('logged_in');
			$this->Admin_model->approve_users($id);
	    	redirect ('index.php/Admin/customer_list');
		}
		else{
			redirect('Home/Sign_in');
		}
	}

		public function customer_list(){
		if(isset($this->session->userdata['logged_in'])) {
			$sess_data=$this->session->userdata('logged_in');
			//print_r($sess_data); die();
		$data['full_name']=$sess_data['full_name'];
		$admin_id = $sess_data['id'];
		$data['row']=$this->Admin_model->get_customers();

		$this->load->view('Admin_header/admin_header');
		$this->load->view('Admin_sidebar/admin_sidebar');
		$this->load->view('Admin_topbar/admin_topbar',$data);
		$this->load->view('Admin_customer/admin_customer',$data);
		$this->load->view('Admin_footer/admin_footer');
		}
		else{
				redirect('Home/Login1');
		}
	}
	public function customer_tree($id){
		if(isset($this->session->userdata['logged_in'])) {
			$sess_data=$this->session->userdata('logged_in');
			//print_r($sess_data); die();

		$data['full_name']=$sess_data['full_name'];
		$admin_id = $sess_data['id'];
		$data['row']=$this->Admin_model->get_customers_tree($id);
		$data['parent_data']=$this->Admin_model->get_customers_id_data($id);
		// echo "<pre>";
		// print_r($data['row']);die();
		$this->load->view('Admin_header/admin_header');
		$this->load->view('Admin_sidebar/admin_sidebar');
		$this->load->view('Admin_topbar/admin_topbar',$data);
		$this->load->view('Admin_customer/customer_tree',$data);
		$this->load->view('Admin_footer/admin_footer');
		}
		else{
				redirect('Home/Login1');
		}
	}
	public function Upline($parent_id){
		if(isset($this->session->userdata['logged_in'])) {
			$sess_data=$this->session->userdata('logged_in');
			//print_r($sess_data); die();

		$data['full_name']=$sess_data['full_name'];
		$admin_id = $sess_data['id'];
		$data['level1']=$this->Admin_model->get_upline_data($parent_id);
		//$data['level1']=$this->Admin_model->get_upline_data($parent_id);

		// echo "<pre>";
		// print_r($data['level1']);
	 // die();
		$this->load->view('Admin_header/admin_header');
		$this->load->view('Admin_sidebar/admin_sidebar');
		$this->load->view('Admin_topbar/admin_topbar',$data);
		$this->load->view('Admin_customer/Upline',$data);
		$this->load->view('Admin_footer/admin_footer');
		}
		else{
				redirect('Home/Login1');
		}
	}
	public function Downline($user_id){
		if(isset($this->session->userdata['logged_in'])) {
			$sess_data=$this->session->userdata('logged_in');
			//print_r($sess_data); die();

		$data['full_name']=$sess_data['full_name'];
		$admin_id = $sess_data['id'];
		$data['row']=$this->Admin_model->get_downline_data($user_id);

		// echo "<pre>";
		// print_r($data['row']);die();
		$this->load->view('Admin_header/admin_header');
		$this->load->view('Admin_sidebar/admin_sidebar');
		$this->load->view('Admin_topbar/admin_topbar',$data);
		$this->load->view('Admin_customer/Downline',$data);
		$this->load->view('Admin_footer/admin_footer');
		}
		else{
				redirect('Home/Login1');
		}
	}
	public function level_criteria_se(){
		if(isset($this->session->userdata['logged_in'])) {
			$sess_data=$this->session->userdata('logged_in');
			//print_r($sess_data); die();
		$data['full_name']=$sess_data['full_name'];
		$admin_id = $sess_data['id'];
		$data['default_parent_id']=$this->Admin_model->get_default_parent_id();
		//print_r($data['row']);die();
		$data['levels']=$this->Admin_model->get_levels_setting();
		$this->load->view('Admin_header/admin_header');
		$this->load->view('Admin_sidebar/admin_sidebar');
		$this->load->view('Admin_topbar/admin_topbar',$data);
		$this->load->view('Levels/level_criteria_setting',$data);
		$this->load->view('Admin_footer/admin_footer');

		}
		else{
				redirect('Home/Login1');
		}
	}
	public function update_criteria_settings(){
		if(isset($this->session->userdata['logged_in'])) {
			$sess_data=$this->session->userdata('logged_in');
			//print_r($sess_data); die();
		$data['full_name']=$sess_data['full_name'];
		$admin_id = $sess_data['id'];

		      $level_standard = $this->input->post('level_number');
                $ref_per_level = $this->input->post('refer_for_level');
                $name_pkg = $this->input->post('package');

                foreach( $level_standard as $key => $n )
                {
                    $this->db->where('level_number',$level_standard[$key]);
                    $this->db->update('levels_settings',array('level_number'=>$level_standard[$key], 'refer_for_level'=> $ref_per_level[$key],'package'=>$name_pkg[$key]));

                    //$level = $this->input->post('');
                }

                 redirect('Admin/level_criteria_se');

		}
		else{
				redirect('Home/Login1');
		}
	}
	public function comission_setting(){
		if(isset($this->session->userdata['logged_in'])) {
			$sess_data=$this->session->userdata('logged_in');
			//print_r($sess_data); die();
		$data['full_name']=$sess_data['full_name'];
		$admin_id = $sess_data['id'];
		$data['comission']=$this->Admin_model->get_comission_setting();
		$this->load->view('Admin_header/admin_header');
		$this->load->view('Admin_sidebar/admin_sidebar');
		$this->load->view('Admin_topbar/admin_topbar',$data);
		$this->load->view('Levels/comission_setting',$data);
		$this->load->view('Admin_footer/admin_footer');

		}
		else{
				redirect('Home/Login1');
		}
	}
	 public function update_levels_settings(){
			if(isset($this->session->userdata['logged_in'])) {
			$sess_data=$this->session->userdata('logged_in');
			//print_r($sess_data); die();
		$data['full_name']=$sess_data['full_name'];
		$admin_id = $sess_data['id'];
                $level = $this->input->post('level');
                $basic = $this->input->post('basic');
                $standard = $this->input->post('standard');
                $silver = $this->input->post('silver');
                $gold = $this->input->post('gold');
                $diamond = $this->input->post('diamond');

                foreach( $basic as $key => $n )
                {
                    $tital = $basic[$key] + $standard[$key] + $silver[$key] + $gold[$key] + $diamond[$key];
                     $this->db->where('level_number',$level[$key]);
                    $this->db->update('comission_seting',array('basic'=>$basic[$key], 'standard'=> $standard[$key], 'silver'=>$silver[$key], 'gold'=>$gold[$key], 'diamond'=>$diamond[$key],'total'=>$tital));

                    //$level = $this->input->post('');
                }
                 redirect('Admin/comission_setting');
            }
             else{
                redirect('Home/Login1');
            }
        }
	public function update_default_id(){
		if(isset($this->session->userdata['logged_in'])) {
			$sess_data=$this->session->userdata('logged_in');
			//print_r($sess_data); die();
		$data['full_name']=$sess_data['full_name'];
		$admin_id = $sess_data['id'];
		$admin_id = $sess_data['id'];
		$parent_id=$this->input->post('default_parent_id');
		if($data['row']=$this->Admin_model->get_update_parent_id($parent_id,$admin_id)){
			redirect('Admin/level_criteria_se');


		}
		else{
			redirect('Admin/level_criteria_se');
		}
	}
		else{
				redirect('Home/Login1');
		}

	}
	public function Products(){
		if(isset($this->session->userdata['logged_in'])) {
			$sess_data=$this->session->userdata('logged_in');
			//print_r($sess_data); die();
		$data['full_name']=$sess_data['full_name'];
		$admin_id = $sess_data['id'];
		$data['row']=$this->Admin_model->get_product_data();
		$this->load->view('Admin_header/admin_header');
		$this->load->view('Admin_sidebar/admin_sidebar');
		$this->load->view('Admin_topbar/admin_topbar',$data);
		$this->load->view('Products/view_products',$data);
		$this->load->view('Admin_footer/admin_footer');

		}
		else{
				redirect('Home/Login1');
		}
	}
	public function addnew_product(){
		if(isset($this->session->userdata['logged_in'])) {
			$sess_data=$this->session->userdata('logged_in');
			//print_r($sess_data); die();
		$data['full_name']=$sess_data['full_name'];
		$admin_id = $sess_data['id'];
		$this->load->view('Admin_header/admin_header');
		$this->load->view('Admin_sidebar/admin_sidebar');
		$this->load->view('Admin_topbar/admin_topbar',$data);
		$this->load->view('Products/addnew_product',$data);
		$this->load->view('Admin_footer/admin_footer');

		}
		else{
				redirect('Home/Login1');
		}
	}
	public function addnew_product_validate(){
		date_default_timezone_set("Asia/Karachi");
        $c_date=date("h:i:sa");
        
        $config['upload_path']='./v2/assets/images/products/';
        $config['allowed_types']='gif|jpg|png';
        $config['max_size']='1800';
        $config['max_width']='4024';
        $config['max_height']='3468'; 
        
        $target_file1 = '';
        $target_file2 = '';
        $target_file3 = '';
        
        if(!empty($_FILES["image1"]["name"])){
            
            $target_file1 = $config['upload_path'].basename($_FILES["image1"]["name"]);
            $this->load->library('upload',$config);
    	    $this->upload->do_upload('image1');
    	    $data1=$this->upload->data();
        }
        
        if(!empty($_FILES["image2"]["name"])){
            
            $target_file2 = $config['upload_path'].basename($_FILES["image2"]["name"]);
            $this->load->library('upload',$config);
    	    $this->upload->do_upload('image2');
    	    $data2=$this->upload->data();
        }
        
        if(!empty($_FILES["image3"]["name"])){
            
            $target_file3 = $config['upload_path'].basename($_FILES["image3"]["name"]);
            $this->load->library('upload',$config);
    	    $this->upload->do_upload('image3');
    	    $data3=$this->upload->data();
        }
        
		$data = array(
		 		'product_code'=>$this->input->post('product_code') ,
			 	'product_name'=>$this->input->post('product_name') ,
			 	'basic_vol'=>$this->input->post('basic_volume') ,
			 	'booster_vol'=>$this->input->post('booster_volume') ,
			 	'purchase_cost'=>$this->input->post('purchase_cost') ,
			 	'product_des'=>$this->input->post('product_des') ,
			 	'product_cat'=>$this->input->post('product_cat') ,
			 	'related_product'=>$this->input->post('related_products') ,
			 	'product_price'=>$this->input->post('rate') ,
			 	'qty'=>$this->input->post('qty') ,
			 	'discount'=>$this->input->post('discount') ,
			 	'net_amount'=>$this->input->post('net_amount') ,
			 	'c_date'=>$c_date,
			 	'status'=>'0',
				'img_name' =>$data1['file_name'],
				'img_path' =>$target_file1,
				'img_path1'=> $target_file2,
				'img_path2'=> $target_file3,
				'direct_sponser_bonus'=>$this->input->post('direct_sponser_bonus')
			);

		  if($this->Admin_model->insert_product($data)){
		  	// echo "data not inserted";
		  	redirect('Admin/addnew_product');
		  }
		  else{
		  	redirect('Admin/Products');
		  }
	}
	public function approve_products($id){
		if(isset($this->session->userdata['logged_in'])) {
			$sess_data=$this->session->userdata('logged_in');
			//print_r($sess_data); die();
		$data['full_name']=$sess_data['full_name'];
		$admin_id = $sess_data['id'];
		if($this->Admin_model->approve_product($id)){
	    redirect ('Admin/Products');
		}
		else{
			redirect ('Admin/Products');
		}

		}
		else{
				redirect('Home/Login1');
		}
	}
	public function products_view($id){
		if(isset($this->session->userdata['logged_in'])) {
			$sess_data=$this->session->userdata('logged_in');
			//print_r($sess_data); die();
		$data['full_name']=$sess_data['full_name'];
		$admin_id = $sess_data['id'];
		$data['products']=$this->Admin_model->get_product_view($id);
		$this->load->view('Admin_header/admin_header');
		$this->load->view('Admin_sidebar/admin_sidebar');
		$this->load->view('Admin_topbar/admin_topbar',$data);
		$this->load->view('Products/single_product_view',$data);
		$this->load->view('Admin_footer/admin_footer');

		}
		else{
				redirect('Home/Login1');
		}
	}
	public function products_edit($id){
		if(isset($this->session->userdata['logged_in'])) {
			$sess_data=$this->session->userdata('logged_in');
			//print_r($sess_data); die();
		$data['full_name']=$sess_data['full_name'];
		$admin_id = $sess_data['id'];
		$data['products']=$this->Admin_model->get_product_view($id);
		$this->load->view('Admin_header/admin_header');
		$this->load->view('Admin_sidebar/admin_sidebar');
		$this->load->view('Admin_topbar/admin_topbar',$data);
		$this->load->view('Products/products_edit',$data);
		$this->load->view('Admin_footer/admin_footer');

		}
		else{
				redirect('Home/Login1');
		}
	}
	public function product_edit_update(){
	    
	    
	    date_default_timezone_set("Asia/Karachi");
        $m_date=date("h:i:sa");
        $config['upload_path']='./v2/assets/images/products/';
        $config['allowed_types']='gif|jpg|png';
        $config['max_size']='1800';
        $config['max_width']='4024';
        $config['max_height']='3468';
        $id=$this->input->post('hidden');

	    if(!empty($_FILES["image"]["name"])){
	        
		        $target_file = $config['upload_path'].basename($_FILES["image"]["name"]);
		       $this->load->library('upload',$config);
			         $this->upload->do_upload('image');
			         $data=$this->upload->data();
    			     $data = array(
    			    'product_code'=>$this->input->post('product_code') ,
    			 	'product_name'=>$this->input->post('product_name') ,
    			 	'basic_vol'=>$this->input->post('basic_volume') ,
    			 	'booster_vol'=>$this->input->post('booster_volume') ,
    			 	'purchase_cost'=>$this->input->post('purchase_cost') ,
    			 	'product_des'=>$this->input->post('product_des') ,
    			 	'product_cat'=>$this->input->post('product_cat') ,
    			 	'related_product'=>$this->input->post('related_products') ,
    			 	'product_price'=>$this->input->post('rate') ,
    			 	'qty'=>$this->input->post('qty') ,
    			 	'discount'=>$this->input->post('discount') ,
    			 	'net_amount'=>$this->input->post('net_amount') ,
    			 	'm_date'=>$m_date,
    			 	'img_path'=> $target_file,
    			 	'img_name'=> $data['file_name'],
    			 	'direct_sponser_bonus'=> $this->input->post('direct_sponser_bonus')
    			 );
		    $this->Admin_model->get_product_update($data,$id);
		    redirect('Admin/Products');
	        
	    }else{

		$data = array(
			    'product_code'=>$this->input->post('product_code') ,
			 	'product_name'=>$this->input->post('product_name') ,
			 	'basic_vol'=>$this->input->post('basic_volume') ,
			 	'booster_vol'=>$this->input->post('booster_volume') ,
			 	'purchase_cost'=>$this->input->post('purchase_cost') ,
			 	'product_des'=>$this->input->post('product_des') ,
			 	'product_cat'=>$this->input->post('product_cat') ,
			 	'related_product'=>$this->input->post('related_products') ,
			 	'product_price'=>$this->input->post('rate') ,
			 	'qty'=>$this->input->post('qty') ,
			 	'discount'=>$this->input->post('discount') ,
			 	'net_amount'=>$this->input->post('net_amount') ,
			 	'm_date'=>$m_date,
			 	'direct_sponser_bonus'=> $this->input->post('direct_sponser_bonus')
			 );
		$this->Admin_model->get_product_update($data,$id);
		redirect('Admin/Products');
	    }
	    
}
	public function products_delete($id){
		$this->Admin_model->get_product_delete($id);
		redirect('Admin/Products');
	}
	public function Category(){
		if(isset($this->session->userdata['logged_in'])) {
			$sess_data=$this->session->userdata('logged_in');
			//print_r($sess_data); die();
		$data['full_name']=$sess_data['full_name'];
		$admin_id = $sess_data['id'];
		$data['row']=$this->Admin_model->get_category_data();
		$this->load->view('Admin_header/admin_header');
		$this->load->view('Admin_sidebar/admin_sidebar');
		$this->load->view('Admin_topbar/admin_topbar',$data);
		$this->load->view('Category/view_category',$data);
		$this->load->view('Admin_footer/admin_footer');

		}
		else{
				redirect('Home/Login1');
		}
	}
	public function addnew_category(){
		if(isset($this->session->userdata['logged_in'])) {
			$sess_data=$this->session->userdata('logged_in');
			//print_r($sess_data); die();
		$data['full_name']=$sess_data['full_name'];
		$admin_id = $sess_data['id'];
		$this->load->view('Admin_header/admin_header');
		$this->load->view('Admin_sidebar/admin_sidebar');
		$this->load->view('Admin_topbar/admin_topbar',$data);
		$this->load->view('Category/addnew_category',$data);
		$this->load->view('Admin_footer/admin_footer');

		}
		else{
				redirect('Home/Login1');
		}
	}
	public function addnew_category_validate(){
				date_default_timezone_set("Asia/Karachi");
                $c_date=date("h:i:sa");
		 $data = array(
		 		'cat_name'=>$this->input->post('cat_name'),
		 		'c_date'=>$c_date,
		 		'c_by'=>'Admin',
		 		'status'=>'0'
				);
		  if($this->Admin_model->insert_category($data)){
		  	// echo "data not inserted";
		  	redirect('Admin/addnew_category');
		  }
		  else{
		  	redirect('Admin/Category');
		  }
	}
	public function category_view($id){
		if(isset($this->session->userdata['logged_in'])) {
			$sess_data=$this->session->userdata('logged_in');
			//print_r($sess_data); die();
		$data['full_name']=$sess_data['full_name'];
		$admin_id = $sess_data['id'];
		$data['category']=$this->Admin_model->get_category_view($id);
		$this->load->view('Admin_header/admin_header');
		$this->load->view('Admin_sidebar/admin_sidebar');
		$this->load->view('Admin_topbar/admin_topbar',$data);
		$this->load->view('Category/single_category_view',$data);
		$this->load->view('Admin_footer/admin_footer');

		}
		else{
				redirect('Home/Login1');
		}
	}
	public function category_edit($id){
		if(isset($this->session->userdata['logged_in'])) {
			$sess_data=$this->session->userdata('logged_in');
			//print_r($sess_data); die();
		$data['full_name']=$sess_data['full_name'];
		$admin_id = $sess_data['id'];
		$data['category']=$this->Admin_model->get_category_view($id);
		$this->load->view('Admin_header/admin_header');
		$this->load->view('Admin_sidebar/admin_sidebar');
		$this->load->view('Admin_topbar/admin_topbar',$data);
		$this->load->view('Category/category_edit',$data);
		$this->load->view('Admin_footer/admin_footer');

		}
		else{
				redirect('Home/Login1');
		}
	}
	public function category_edit_update(){
				date_default_timezone_set("Asia/Karachi");
                $m_date=date("h:i:sa");
                 	$id=$this->input->post('hidden');
			      $data = array(
			    'cat_name'=>$this->input->post('cat_name') ,
			 	'm_date'=>$m_date

			 );
		$this->Admin_model->get_category_update($data,$id);
		redirect('Admin/Category');



}
	public function category_delete($id){
		$this->Admin_model->get_category_delete($id);
		redirect('Admin/Category');
	}
	public function approve_category($id){
		if(isset($this->session->userdata['logged_in'])) {
			$sess_data=$this->session->userdata('logged_in');
			//print_r($sess_data); die();
		$data['username']=$sess_data;
		if($this->Admin_model->approve_category($id)){
	    redirect ('Admin/Category');
		}
		else{
			redirect ('Admin/Category');
		}

		}
		else{
				redirect('Home/Login1');
		}
	}
	public function pending_payments(){
		if(isset($this->session->userdata['logged_in'])) {
			$sess_data=$this->session->userdata('logged_in');
			//print_r($sess_data); die();
		$data['full_name']=$sess_data['full_name'];
		$admin_id = $sess_data['id'];

		$data['row']=$this->Admin_model->get_pending_payments();
		//print_r($data['row']);die();
		$this->load->view('Admin_header/admin_header');
		$this->load->view('Admin_sidebar/admin_sidebar');
		$this->load->view('Admin_topbar/admin_topbar',$data);
		$this->load->view('Admin/pending_payments',$data);
		$this->load->view('Admin_footer/admin_footer');
		}
		else{
				redirect('Login1');
		}
	}
	public function admin_approved_payments($id){
	    if(isset($this->session->userdata['logged_in'])) {
			$sess_data=$this->session->userdata('logged_in');
			//print_r($sess_data); die();
		$data['username']=$sess_data;
		$status="1";
		$this->Admin_model->admin_approved_payments($id,$status);
	    redirect ('Admin/pending_payments');
		}
		else{
				redirect('Login1');
		}
	}
	public function approve_payments(){
		if(isset($this->session->userdata['logged_in'])) {
			$sess_data=$this->session->userdata('logged_in');
			//print_r($sess_data); die();
		$data['full_name']=$sess_data['full_name'];
		$admin_id = $sess_data['id'];

		$data['row']=$this->Admin_model->get_approved_payments();
		//print_r($data['row']);die();
		$this->load->view('Admin_header/admin_header');
		$this->load->view('Admin_sidebar/admin_sidebar');
		$this->load->view('Admin_topbar/admin_topbar',$data);
		$this->load->view('Admin/approved_payments',$data);
		$this->load->view('Admin_footer/admin_footer');
		}
		else{
				redirect('Login1');
		}
	}
	public function All_orders(){
		if(isset($this->session->userdata['logged_in'])) {
			$sess_data=$this->session->userdata('logged_in');
			//print_r($sess_data); die();
		$data['full_name']=$sess_data['full_name'];
		$admin_id = $sess_data['id'];

 		$data['row']=$this->Admin_model->get_orders();
		//print_r($data['row']);die();
		$this->load->view('Admin_header/admin_header');
		$this->load->view('Admin_sidebar/admin_sidebar');
		$this->load->view('Admin_topbar/admin_topbar',$data);
		$this->load->view('Order/all_orders',$data);
		$this->load->view('Admin_footer/admin_footer');
		}
		else{
				redirect('Login1');
		}
	}
	public function Deliver_orders(){
		if(isset($this->session->userdata['logged_in'])) {
			$sess_data=$this->session->userdata('logged_in');
			//print_r($sess_data); die();
		$data['full_name']=$sess_data['full_name'];
		$admin_id = $sess_data['id'];


		//print_r($data['row']);die();
		$this->load->view('Admin_header/admin_header');
		$this->load->view('Admin_sidebar/admin_sidebar');
		$this->load->view('Admin_topbar/admin_topbar',$data);
		$this->load->view('Order/deliver_orders');
		$this->load->view('Admin_footer/admin_footer');
		}
		else{
				redirect('Login1');
		}
	}

	public function edit_users($id){

		if(isset($this->session->userdata['logged_in'])) {

			$sess_data=$this->session->userdata('logged_in');
			$data['full_name']=$sess_data['full_name'];
			$admin_id = $sess_data['id'];
			$data['user']=$this->Admin_model->get_user_detail($id);
			$this->load->view('Admin_header/admin_header');
			$this->load->view('Admin_sidebar/admin_sidebar');
			$this->load->view('Admin_topbar/admin_topbar',$data);
			$this->load->view('User_body/edit_user',$data);
			$this->load->view('Admin_footer/admin_footer');

		}
		else{

			redirect('Home/Login1');
		}
	}

	public function update_user_detail(){

		$this->form_validation->set_rules('full_name', 'Username', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        // $this->form_validation->set_rules('city', 'City', 'required');

        $this->form_validation->set_rules('mobile', 'Email', 'required');
        // $this->form_validation->set_rules('provience', 'City', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        // $this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|matches[password]');

        $id = $this->input->post('user_id');
        
        if($this->form_validation->run() == FALSE)
        {
            $this->edit_users($id);
        
        }else{

        	$data = [
        		'full_name'=> $this->input->post('full_name'),
				'mobile'=> $this->input->post('mobile'),
				'email'=> $this->input->post('email'),
				'password'=> $this->input->post('password'),
        	];
        	$this->Admin_model->update_user($id, $data);

        	redirect ('index.php/Admin/customer_list');
        }

	}

	public function addSliderImage(){

		if(isset($this->session->userdata['logged_in'])) {

			$sess_data=$this->session->userdata('logged_in');
			$data['full_name']=$sess_data['full_name'];
			$admin_id = $sess_data['id'];
			// $data['user']=$this->Admin_model->get_user_detail($admin_id);
			$this->load->view('Admin_header/admin_header');
			$this->load->view('Admin_sidebar/admin_sidebar');
			$this->load->view('Admin_topbar/admin_topbar',$data);
			$this->load->view('v2/components/slider/slider',$data);
			$this->load->view('Admin_footer/admin_footer');

		}
		else{

			redirect('Home/Login1');
		}

	}
	public function sliders(){

		if(isset($this->session->userdata['logged_in'])) {

			$sess_data=$this->session->userdata('logged_in');
			$data['full_name']=$sess_data['full_name'];
			$admin_id = $sess_data['id'];
			$data['images']=$this->Admin_model->getSliderImages();
			$this->load->view('Admin_header/admin_header');
			$this->load->view('Admin_sidebar/admin_sidebar');
			$this->load->view('Admin_topbar/admin_topbar',$data);
			$this->load->view('v2/components/slider/sliders',$data);
			$this->load->view('Admin_footer/admin_footer');

		}
		else{

			redirect('Home/Login1');
		}

	}

	public function storeSliderImage(){

		$config['upload_path']='./v2/assets/images/slider/';
        $config['allowed_types']='gif|jpg|png';
        $config['max_size']='1800';
        $config['max_width']='4024';
        $config['max_height']='3468'; 
        
        $target_file1 = '';
        $trimed_name = str_replace(" ", "_", $_FILES["image"]["name"]);

        
        if(!empty($_FILES["image"]["name"])){

            $target_file1 = $config['upload_path'].basename($trimed_name);

            $this->load->library('upload',$config);
    	    // $this->upload->do_upload('image');
    	    // $data1 = $this->upload->data();

    	    if ( ! $this->upload->do_upload('image'))
	        {
	            $error = array('error' => $this->upload->display_errors());

	            print_r($error); //debug it here 

	        }
	        else
	        {
	            $data1 = $this->upload->data();

	            $data = [
			    	'img_name'=> $data1['file_name'],
			    	'img_path'=> $target_file1,
			    	'img_desc'=> $this->input->post('desc')	
			    ];

			    if($this->Admin_model->insertSlider($data)){
			    	redirect('Admin/sliders');
			    }
	        }
        }

        // redirect('Admin/sliders');
	}

	public function deleteSliderImage($id){

		$this->Admin_model->deleteSliderImage($id);

		redirect('Admin/sliders');
	}

	public function register_customer(){

		if(isset($this->session->userdata['logged_in'])) {
			$sess_data=$this->session->userdata('logged_in');
            $data['full_name']=$sess_data['full_name'];
            $data['user_id']=$this->Home_model->get_user_id();
            $data['products'] = $this->Home_model->get_products_data();
            
            $this->load->view('Admin_header/admin_header');
            $this->load->view('Admin_sidebar/admin_sidebar');
            $this->load->view('Admin_topbar/admin_topbar',$data);
            $this->load->view('Register/register_customer',$data);
            $this->load->view('Admin_footer/admin_footer');
		}
		else{

		    redirect('Home/Login1');
		}
	}

	public function referal_check($str)
    {
        $invalid_referals = ['0', '1', '2', '3', '4'];
        if (in_array($str, $invalid_referals))
        {
            $this->form_validation->set_message('referal_check', 'Please give original Sponser ID or Leave empty if there is no sponser.');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }

	public function register_customer_validate(){

		$this->form_validation->set_rules('full_name', 'Username', 'required');
        // $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('city', 'City', 'required');

        $this->form_validation->set_rules('mobile', 'Email', 'required');
        // $this->form_validation->set_rules('provience', 'City', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|matches[password]');
        $this->form_validation->set_rules('referal_id', 'Sponser ID', 'callback_referal_check');

        // $this->form_validation->set_rules('is_active', 'Activation status', 'required');

        // $this->form_validation->set_rules('product_id', 'Product', 'required');

        if($this->form_validation->run() == FALSE)
        {
            $this->register_customer();
        
        }else{
            

            $referal_id = $this->input->post('referal_id');
            

	        $email = !empty($this->input->post('email')) ? $this->input->post('email') : '';
	        $user_id = $this->Home_model->get_user_id();

	        $user_id = $user_id + 1;
	        
	        $referal_id = empty($referal_id) ? 
	                        $this->Home_model->get_default_parent_id() : 
	                        $referal_id;
	        $status = !empty($this->input->post('is_active'));

	        $product_ids = $this->input->post('product_id');

	        $qtys = $this->input->post('qty');

	        $ip = $_SERVER['REMOTE_ADDR'];
	        $parent_id = 0;

	        if($status){

	        	$parent_id = $this->Admin_model->get_tree_node_from_referral($referal_id);
	        }


	        $data = [
	                'user_id'   => $user_id,
	                'parent_id' => $parent_id,
	                'full_name' => $this->input->post('full_name'),
	                'mobile'    => $this->input->post('mobile'),
	                'email'     => $email,
	                'password'  => $this->input->post('password'),
	                'referal_id'=> $referal_id,
	                'type'      => $status == TRUE ? '2' : '0',
	            ];

	        //Type: 1 => admin, 2 => customer, 0 => deactive customer

	        $this->Home_model->insertData($data);

	        $data = [
                'userid'		=> $user_id ,
                'created_date'	=> date('Y-m-d'),
                'total_cart'	=> 1
            ];
            $this->Home_model->insertcart($data);
            $insert_id = $this->db->insert_id();

            foreach($product_ids as $k => $product_id){

            	if(!empty($product_id)){
			        $this
		            ->Home_model
		            ->insertcartproductdetail($insert_id,$product_id,$qtys[$k],$user_id,$ip);	
            	}
            }

	        if($status){
	        	$this->Admin_model->deliverCommission($user_id);
	        }

	        redirect('Admin/register_customer');
		}
	}

}
