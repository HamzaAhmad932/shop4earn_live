<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
	public function __Construct(){
		parent::__Construct();
		$this->load->model('Users_model');
		$this->load->model('Admin_model');
	}
	public function index($u_id = null){	 

		if(isset($this->session->userdata['logged_in'])) {
			$sess_data=$this->session->userdata('logged_in');
			//print_r($sess_data); die();
		$data['full_name']=$sess_data;
		$data['user_id'] = $sess_data['user_id'];
		$user_id = !empty($u_id) ? $u_id : $sess_data['user_id'];
		$data['direct_referals']=$this->Users_model->direct_referals($user_id);
		$data['get_comission']=$this->Users_model->get_comission($user_id);
		$data['booster_com']=$this->Users_model->booster_com($user_id);
		$data['direct_bonus']=$this->Users_model->direct_bonus($user_id);
		$data['total_earn']=$this->Users_model->total_earn($user_id);
		$data['payout'] = $this->Users_model->totalPayout($user_id);
		$member_level=$this->Users_model->member_level($user_id);
		$data['downline'] = count($this->Admin_model->get_downline_data($user_id));

		//print_r($member_level);die();
		$get_level1_data=$this->Users_model->get_level1_data();
		$get_level2_data=$this->Users_model->get_level2_data();
		$get_level3_data=$this->Users_model->get_level3_data();
		$get_level4_data=$this->Users_model->get_level4_data();
		$get_level5_data=$this->Users_model->get_level5_data();
		$get_level6_data=$this->Users_model->get_level6_data();
		$get_level7_data=$this->Users_model->get_level7_data();
		$get_level8_data=$this->Users_model->get_level8_data();
		$get_level9_data=$this->Users_model->get_level9_data();
		$get_level10_data=$this->Users_model->get_level10_data();



		if($member_level < $get_level1_data){
			$data['level']="None";
		$this->load->view('Admin_header/admin_header');
		$this->load->view('User_sidebar/user_sidebar');
		$this->load->view('Admin_topbar/admin_topbar',$data);
		$this->load->view('User_body/user_body',$data);
		$this->load->view('Admin_footer/admin_footer');
		}
		elseif($member_level == $get_level1_data || $member_level < $get_level2_data){
			$data['level']="Basic";
		$this->load->view('Admin_header/admin_header');
		$this->load->view('User_sidebar/user_sidebar');
		$this->load->view('Admin_topbar/admin_topbar',$data);
		$this->load->view('User_body/user_body',$data);
		$this->load->view('Admin_footer/admin_footer');
		}
		elseif($member_level == $get_level2_data || $member_level < $get_level3_data){
			$data['level']="Standard";
		$this->load->view('Admin_header/admin_header');
		$this->load->view('User_sidebar/user_sidebar');
		$this->load->view('Admin_topbar/admin_topbar',$data);
		$this->load->view('User_body/user_body',$data);
		$this->load->view('Admin_footer/admin_footer');
		}
		elseif($member_level == $get_level3_data || $member_level < $get_level4_data){
			$data['level']="Silver";
		$this->load->view('Admin_header/admin_header');
		$this->load->view('User_sidebar/user_sidebar');
		$this->load->view('Admin_topbar/admin_topbar',$data);
		$this->load->view('User_body/user_body',$data);
		$this->load->view('Admin_footer/admin_footer');
		}
		elseif($member_level == $get_level4_data || $member_level < $get_level5_data){
			$data['level']="Gold";
		$this->load->view('Admin_header/admin_header');
		$this->load->view('User_sidebar/user_sidebar');
		$this->load->view('Admin_topbar/admin_topbar',$data);
		$this->load->view('User_body/user_body',$data);
		$this->load->view('Admin_footer/admin_footer');
		}
		elseif($member_level == $get_level5_data || $member_level < $get_level6_data){
			$data['level']="diamond";
		$this->load->view('Admin_header/admin_header');
		$this->load->view('User_sidebar/user_sidebar');
		$this->load->view('Admin_topbar/admin_topbar',$data);
		$this->load->view('User_body/user_body',$data);
		$this->load->view('Admin_footer/admin_footer');
		}
		elseif($member_level == $get_level6_data || $member_level < $get_level7_data){
			$data['level']="diamond";
		$this->load->view('Admin_header/admin_header');
		$this->load->view('User_sidebar/user_sidebar');
		$this->load->view('Admin_topbar/admin_topbar',$data);
		$this->load->view('User_body/user_body',$data);
		$this->load->view('Admin_footer/admin_footer');
		}
		elseif($member_level == $get_level7_data || $member_level < $get_level8_data){
			$data['level']="diamond";
		$this->load->view('Admin_header/admin_header');
		$this->load->view('User_sidebar/user_sidebar');
		$this->load->view('Admin_topbar/admin_topbar',$data);
		$this->load->view('User_body/user_body',$data);
		$this->load->view('Admin_footer/admin_footer');
		}
		elseif($member_level == $get_level8_data || $member_level < $get_level9_data){
			$data['level']="diamond";
		$this->load->view('Admin_header/admin_header');
		$this->load->view('User_sidebar/user_sidebar');
		$this->load->view('Admin_topbar/admin_topbar',$data);
		$this->load->view('User_body/user_body',$data);
		$this->load->view('Admin_footer/admin_footer');
		}
		elseif($member_level == $get_level9_data || $member_level < $get_level10_data){
			$data['level']="diamond";
		$this->load->view('Admin_header/admin_header');
		$this->load->view('User_sidebar/user_sidebar');
		$this->load->view('Admin_topbar/admin_topbar',$data);
		$this->load->view('User_body/user_body',$data);
		$this->load->view('Admin_footer/admin_footer');
		}
		elseif($member_level == $get_level10_data){
			$data['level']="diamond";
		$this->load->view('Admin_header/admin_header');
		$this->load->view('User_sidebar/user_sidebar');
		$this->load->view('Admin_topbar/admin_topbar',$data);
		$this->load->view('User_body/user_body',$data);
		$this->load->view('Admin_footer/admin_footer');
		}
		 
		}
		else{
			redirect('Home/Login');
		}
	}
	public function withdraw_payment(){
		if(isset($this->session->userdata['logged_in'])) {
			$sess_data=$this->session->userdata('logged_in');
			//print_r($sess_data); die();
		$data['full_name']=$sess_data;
		$data['user_id'] = $sess_data['user_id'];
		$user_id=$sess_data['user_id'];

		$data['payment_methods'] = $this->Users_model->getPaymentMethods();

		$this->load->view('Admin_header/admin_header');
		$this->load->view('User_sidebar/user_sidebar');
		$this->load->view('Admin_topbar/admin_topbar',$data);
		$this->load->view('Payments/withdraw_payment', $data);
		$this->load->view('Admin_footer/admin_footer');
		}
		else{
			redirect('Login');
			}
	}
	public function withdraw_payment_request(){
		if(isset($this->session->userdata['logged_in'])) {
			$sess_data=$this->session->userdata('logged_in');
			//print_r($sess_data); die();
		$data['full_name']=$sess_data;
		$data['user_id'] = $sess_data['user_id'];
		$user_id=$sess_data['user_id'];
		$password = $this->input->post('password');

		$valid_pass = $this->Users_model->isValidUser($user_id, $password);


		if(!$valid_pass){

			$this->session->set_flashdata('error', "Password does not match, please enter correct password.");
			redirect('Users/withdraw_payment');
		}

		$phone_number = $this->input->post('phone_number');
		$amount = $this->input->post('withdraw_bank_amount');

		$valid_amount = $this->Users_model->isValidAmount($user_id, $amount);

		if(!$valid_amount){

			$this->session->set_flashdata('error', "Requested Amount is greater than the available amount.");
			redirect('Users/withdraw_payment');
		}

		
		$full_name = $sess_data['full_name'];
		date_default_timezone_set("Asia/Karachi");
		$acc_type=$this->input->post('account_type');
		if($acc_type==1){
			$account_type="Jazz Cash";

			if(empty($phone_number) || $phone_number == '0'){
				$this->session->set_flashdata('error', "Phone number is required.");
				redirect('Users/withdraw_payment');
			}
		}
		elseif($acc_type==2){
			$account_type="Easy Paisa";

			if(empty($phone_number) || $phone_number == '0'){
				$this->session->set_flashdata('error', "Phone number is required.");
				redirect('Users/withdraw_payment');
			}
		}
		elseif($acc_type==3){
			$account_type="Cash";
		}else{
			$account_type="";
		}

		// elseif($acc_type==4){
		// 	$account_type="Bank Account";
		// }
		// else{
		// 	$account_type="Hand Cash";
		// }

		$chk_current_bal=$this->Users_model->chk_current_bal($user_id);
		if($chk_current_bal >=1000){
		    $c_date=date("Y-m-d h:i:sa");
			$data = array(
				'user_id'=>$user_id,
				'full_name'=>$full_name,
				'account_type'=>$account_type , 
				'phone_number'=>$phone_number , 
				// 'withdraw_amount'=>$amount , 
				'selected_bank'=>$this->input->post('selected_bank') , 
				'bank_account_number'=>$this->input->post('bank_account_number') ,
				'withdraw_amount'=>$amount,  
				'date_time'=>$c_date,
				'payment_method_id'=> $acc_type
				);
	    $this->Users_model->insert_payment_request($data);
	    $this->session->set_flashdata('success', "Your request has been submit to admin.");
	    redirect('Users/withdraw_payment');
		}
		else{
		$this->session->set_flashdata('error', "Your current Balance is Low");
		redirect('Users/withdraw_payment');
		}
		}
		else{
			redirect('Login');
			}
	}
	public function pending_payments(){
			 
			if(isset($this->session->userdata['logged_in'])) {
			$sess_data=$this->session->userdata('logged_in');
			//print_r($sess_data); die();
		$data['full_name']=$sess_data;
		$data['user_id'] = $sess_data['user_id'];
		$user_id=$sess_data['user_id'];

		$data['row']=$this->Users_model->get_pending_payments($user_id);
		//print_r($data['row']);die();
		$this->load->view('Admin_header/admin_header');
		$this->load->view('User_sidebar/user_sidebar');
		$this->load->view('Admin_topbar/admin_topbar',$data);
		$this->load->view('Payments/pending_payments',$data);
		$this->load->view('Admin_footer/admin_footer');
		}
		else{
			redirect('Login');
			}
		 
	}
	public function approved_payments(){
			 
			if(isset($this->session->userdata['logged_in'])) {
			$sess_data=$this->session->userdata('logged_in');
			//print_r($sess_data); die();
		$data['full_name']=$sess_data;
		$data['user_id'] = $sess_data['user_id'];
		$user_id=$sess_data['user_id'];

		$data['row']=$this->Users_model->get_approved_payments($user_id);
		$this->load->view('Admin_header/admin_header');
		$this->load->view('User_sidebar/user_sidebar');
		$this->load->view('Admin_topbar/admin_topbar',$data);		
		$this->load->view('Payments/approved_payments',$data);
		$this->load->view('Admin_footer/admin_footer');
		}
		else{
			redirect('Login');
			}
		 
	}

		 
}