<?php
class Admin_model extends CI_Model{
	public function __construct(){
		parent::__construct();
	}
	public function get_customers(){
		$this->db->select('*');
		$this->db->from('users');
		$this->db->order_by("id", "desc");
		$query=$this->db->get();
		if($query->num_rows()){
			return $query->result();
		}else{
			return false;
		}
	}
	public function get_customers_tree($id){
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('parent_id ',$id);
		$this->db->where('type = 2');
		$this->db->order_by("user_id", "asc");
		$query=$this->db->get();
		 
			return $query->result();
		 
	}
	public function get_customers_id_data($id){
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('id ',$id);
		$this->db->where('type = 2');
		$this->db->order_by("user_id", "asc");
		$query=$this->db->get();
		if($query->num_rows()){
			return $query->result();
		}else{
			return false;
		}
	}
	public function get_default_parent_id(){
		$this->db->select('parent_id');
		$this->db->from('users');
		$this->db->where('type=1');
		$query=$this->db->get();
		$par_id = $query->row();
	    $parent_id= $par_id->parent_id;
	    return $parent_id;
	}
	public function get_user_id(){
		$this->db->select_max('user_id');
	    $this->db->from('users');
	    $this->db->where('user_id !=0');
	    $query = $this->db->get();
	    $ret = $query->row();
	    $user_id= $ret->user_id;
	    return $user_id;	 
	}
	public function update_user_table($user_id,$parent_id,$id){

		$this->db->set('user_id',$user_id);
		$this->db->set('parent_id',$parent_id);
		$this->db->where('id',$id);
		$this->db->update('users'); 
	}
	public function get_user_detail($id){

		$this->db->where('id', $id);
		$query = $this->db->get('users');
		$user = $query->row();

		return $user;
	}

	public function update_user($id, $data){

		$this->db->where('id',$id);
		$this->db->update("users",$data);
	}

	
	public function count_parent_id_rows(){
		$this->db->select_max('parent_id');
	    $this->db->from('users');
	    $this->db->where('type =2');
	    $query = $this->db->get();
	    $ret = $query->row();
	    $parent_id= $ret->parent_id;

	    $this->db->select('*');
		$this->db->from('users');
		$this->db->where('parent_id',$parent_id);
		$this->db->where('type =2');
		$total_credit=$this->db->get();
		$total_count= $total_credit->num_rows();
		return $total_count;
	}
	public function find_tree_node($referal_id){
    
	    $this->db->select("GROUP_CONCAT(user_id) as my_ids");
	    $this->db->where_in("parent_id", $referal_id);
	    $this->db->where("type", "2");
	    $query = $this->db->get('users')->result_array();
	    $my_ids     =   $query[0]['my_ids'];
	    if($my_ids == null){
	        if(is_array($referal_id)){
	            return $referal_id[0];
	        }else{
	            return $referal_id;
	        }
	    }
	    $childs   =   explode(',',$my_ids);
	    
	    foreach($childs as $ch){
	        
	        $this->db->select("*");
	        $this->db->where("parent_id", $ch);
	        $this->db->where("type", "2");
	        $query = $this->db->get('users')->num_rows();
	        
	        if(!is_array($ch) &&  $query < 2){
	            return $ch;
	        }
	    }
	    
	    return $this->find_tree_node($childs);
	}

	public function verify_self_parent_position($referal_id){

		$this->db->select("*");
        $this->db->where("parent_id", $referal_id);
        $this->db->where("type", "2");
        $query = $this->db->get('users')->num_rows();
        
        if(!is_array($referal_id) &&  $query < 2){
            return true;
        }else{
        	return false;
        }
	}

	public function get_tree_node_from_referral($referral_id){

		if($this->verify_self_parent_position($referral_id)){
			return $referral_id;
		}else{
			return $this->find_tree_node($referral_id);
		}
	}
	public function approve_users($id){

		$this->db->where('user_id', $id);
		$user = $this->db->get('users')->row();

		if(!empty($user)){

			if($user->parent_id == '0'){
				if($this->verify_self_parent_position($user->referal_id)){
					$parent_id = $user->referal_id;
				}else{
					$parent_id = $this->find_tree_node($user->referal_id);
				}
			}else{
				$parent_id = $user->parent_id;
			}

			$data = [
				'type'		=> $user->type == '0' ? '2' : '0',
				'parent_id' => $parent_id,
			];
			$this->db->where('user_id',$id);
			$this->db->update('users',$data);

			$this->deliverCommission($user->user_id);
		}
		

	}

	public function deliverCommission($user_id){

		$this->db->select('product_id');
        $this->db->from('tbl_cart_product');
        $this->db->where('user_id', $user_id);
        $result = $this->db->get()->result_array();

        $products_id = array_column($result, 'product_id');

		$upline_users=$this->Home_model->get_upline_users($user_id,$products_id);
        $insert_boster=$this->Home_model->insert_boster($user_id,$products_id);
        $direct_bonus = $this->Home_model->insert_direct_bonus($user_id,$products_id);
	}
	public function get_levels_setting(){
		$this->db->select('*');
		$this->db->from('levels_settings');
		$query=$this->db->get();
		if($query->num_rows()){
			return $query->result_array();
		}else{
			return false;
		}
	}
	public function get_comission_setting(){
		$this->db->select('*');
		$this->db->from('comission_seting');
		$query=$this->db->get();
		if($query->num_rows()){
			return $query->result_array();
		}else{
			return false;
		}
	}
	public function get_update_parent_id($parent_id,$admin_id){
		$data=array('parent_id'=>$parent_id);
		$this->db->set('parent_id',$parent_id);
		$this->db->where('id',$admin_id);
		$this->db->update('users',$data);
	}
	public function get_upline_data($parent_id){
		//get parent id data
        $this->db->select('*');
		$this->db->from('users');
		$this->db->where('user_id ',$parent_id);
		$query=$this->db->get();
		$level1=$query->result();
		
		//get parent id  
		$this->db->select('parent_id');
		$this->db->from('users');
		$this->db->where('user_id',$parent_id);
		$query=$this->db->get();
		$level1_id = $query->row();
	    $level1_id= $level1_id->parent_id;
	    //get parent id data
	    $this->db->select('*');
		$this->db->from('users');
		$this->db->where('user_id',$level1_id);
		$query=$this->db->get();
		$query->num_rows();
		$level2=$query->result();
		//get parent id  
		$this->db->select('parent_id');
		$this->db->from('users');
		$this->db->where('user_id',$level1_id);
		$query=$this->db->get();
		$level2_id = $query->row();
	    $level2_id= $level2_id->parent_id;
	    //get parent id data
	    $this->db->select('*');
		$this->db->from('users');
		$this->db->where('user_id',$level2_id);
		$query=$this->db->get();
		$query->num_rows();
		$level3=$query->result();
		//get parent id 
		$this->db->select('parent_id');
		$this->db->from('users');
		$this->db->where('user_id',$level2_id);
		$query=$this->db->get();
		$level3_id = $query->row();
	    $level3_id= $level3_id->parent_id;
	    //get parent id data
	    $this->db->select('*');
		$this->db->from('users');
		$this->db->where('user_id',$level3_id);
		$query=$this->db->get();
		$query->num_rows();
		$level4=$query->result();

		//get parent id 
		$this->db->select('parent_id');
		$this->db->from('users');
		$this->db->where('user_id',$level3_id);
		$query=$this->db->get();
		$level4_id = $query->row();
	    $level4_id= $level4_id->parent_id;
	    //get parent id data
	    $this->db->select('*');
		$this->db->from('users');
		$this->db->where('user_id',$level4_id);
		$query=$this->db->get();
		$query->num_rows();
		$level5=$query->result();

		//get parent id 
		$this->db->select('parent_id');
		$this->db->from('users');
		$this->db->where('user_id',$level4_id);
		$query=$this->db->get();
		$level5_id = $query->row();
	    $level5_id= $level5_id->parent_id;
	    //get parent id data
	    $this->db->select('*');
		$this->db->from('users');
		$this->db->where('user_id',$level5_id);
		$query=$this->db->get();
		$query->num_rows();
		$level6=$query->result();

		//get parent id 
		$this->db->select('parent_id');
		$this->db->from('users');
		$this->db->where('user_id',$level5_id);
		$query=$this->db->get();
		$level6_id = $query->row();
	    $level6_id= $level6_id->parent_id;
	    //get parent id data
	    $this->db->select('*');
		$this->db->from('users');
		$this->db->where('user_id',$level6_id);
		$query=$this->db->get();
		$query->num_rows();
		$level7=$query->result();

		//get parent id 
		$this->db->select('parent_id');
		$this->db->from('users');
		$this->db->where('user_id',$level6_id);
		$query=$this->db->get();
		$level7_id = $query->row();
	    $level7_id= $level7_id->parent_id;
	    //get parent id data
	    $this->db->select('*');
		$this->db->from('users');
		$this->db->where('user_id',$level7_id);
		$query=$this->db->get();
		$query->num_rows();
		$level8=$query->result();

		//get parent id 
		$this->db->select('parent_id');
		$this->db->from('users');
		$this->db->where('user_id',$level7_id);
		$query=$this->db->get();
		$level8_id = $query->row();
	    $level8_id= $level8_id->parent_id;
	    //get parent id data
	    $this->db->select('*');
		$this->db->from('users');
		$this->db->where('user_id',$level8_id);
		$query=$this->db->get();
		$query->num_rows();
		$level9=$query->result();

		//get parent id 
		$this->db->select('parent_id');
		$this->db->from('users');
		$this->db->where('user_id',$level8_id);
		$query=$this->db->get();
		$level9_id = $query->row();
	    $level9_id= $level9_id->parent_id;
	    //get parent id data
	    $this->db->select('*');
		$this->db->from('users');
		$this->db->where('user_id',$level9_id);
		$query=$this->db->get();
		$query->num_rows();
		$level10=$query->result();

		//get parent id 
		$this->db->select('parent_id');
		$this->db->from('users');
		$this->db->where('user_id',$level9_id);
		$query=$this->db->get();
		$level10_id = $query->row();
	    $level10_id= $level10_id->parent_id;
	    //get parent id data
	    $this->db->select('*');
		$this->db->from('users');
		$this->db->where('user_id',$level10_id);
		$query=$this->db->get();
		$query->num_rows();
		$level11=$query->result();


return array_merge($level1, $level2,$level3,$level4,$level5,$level6,$level7,$level8,$level9,$level10,$level11); 
	}
 
	public function get_downline_data($user_id){
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('parent_id ',$user_id);
		$this->db->where('type!= 1');
		$query=$this->db->get();
		$level1=$query->result();
		// return $level1;
	$this->db->select("GROUP_CONCAT(user_id) as my_ids");
    $this->db->where("parent_id", $user_id);
    $this->db->where('type!= 1');
    $query = $this->db->get('users')->result_array();
    $my_ids     =   $query[0]['my_ids'];    
    $my_array   =   explode(',',$my_ids); 
     //return $my_array; 
    $this->db->where_in('parent_id',$my_array);
    $this->db->where('type!= 1');
    $this->db->order_by("user_id", "asc");    	
    $level2    =   $this->db->get('users')->result();

    $this->db->select("GROUP_CONCAT(user_id) as ids");
    $this->db->where_in('parent_id',$my_array);
    $query = $this->db->get('users')->result_array();
    $ids     =   $query[0]['ids']; 
    $o_array   =   explode(',',$ids);
            //level 2 return $o_array;
    $this->db->where_in('parent_id',$o_array);   
    $this->db->where('type!= 1');
    $this->db->order_by("user_id", "asc"); 
    $level3    =   $this->db->get('users')->result();

    $this->db->select("GROUP_CONCAT(user_id) as ids");
    $this->db->where_in('parent_id',$o_array);
    $query = $this->db->get('users')->result_array();
    $ids     =   $query[0]['ids']; 
    $third_array   =   explode(',',$ids);
            //level 3 return $o_array;
    $this->db->where_in('parent_id',$third_array);   
    $this->db->where('type!= 1');
    $this->db->order_by("user_id", "asc"); 
    $level4    =   $this->db->get('users')->result();

    $this->db->select("GROUP_CONCAT(user_id) as ids");
    $this->db->where_in('parent_id',$third_array);
    $query = $this->db->get('users')->result_array();
    $ids     =   $query[0]['ids']; 
    $fourth_array   =   explode(',',$ids);
            //level 3 return $o_array;
    $this->db->where_in('parent_id',$fourth_array);   
    $this->db->where('type!= 1');
    $this->db->order_by("user_id", "asc"); 
    $level5    =   $this->db->get('users')->result();

    $this->db->select("GROUP_CONCAT(user_id) as ids");
    $this->db->where_in('parent_id',$fourth_array);
    $query = $this->db->get('users')->result_array();
    $ids     =   $query[0]['ids']; 
    $fifth_array   =   explode(',',$ids);
            //level 3 return $o_array;
    $this->db->where_in('parent_id',$fifth_array);   
    $this->db->where('type!= 1');
    $this->db->order_by("user_id", "asc"); 
    $level6    =   $this->db->get('users')->result();

    $this->db->select("GROUP_CONCAT(user_id) as ids");
    $this->db->where_in('parent_id',$fifth_array);
    $query = $this->db->get('users')->result_array();
    $ids     =   $query[0]['ids']; 
    $sixth_array   =   explode(',',$ids);
            //level 3 return $o_array;
    $this->db->where_in('parent_id',$sixth_array);   
    $this->db->where('type!= 1');
    $this->db->order_by("user_id", "asc"); 
    $level7    =   $this->db->get('users')->result();

    $this->db->select("GROUP_CONCAT(user_id) as ids");
    $this->db->where_in('parent_id',$sixth_array);
    $query = $this->db->get('users')->result_array();
    $ids     =   $query[0]['ids']; 
    $seven_array   =   explode(',',$ids);
            //level 3 return $o_array;
    $this->db->where_in('parent_id',$seven_array);   
    $this->db->where('type!= 1');
    $this->db->order_by("user_id", "asc"); 
    $level8    =   $this->db->get('users')->result();

    $this->db->select("GROUP_CONCAT(user_id) as ids");
    $this->db->where_in('parent_id',$seven_array);
    $query = $this->db->get('users')->result_array();
    $ids     =   $query[0]['ids']; 
    $eight_array   =   explode(',',$ids);
            //level 3 return $o_array;
    $this->db->where_in('parent_id',$eight_array);   
    $this->db->where('type!= 1');
    $this->db->order_by("user_id", "asc"); 
    $level9    =   $this->db->get('users')->result();

    $this->db->select("GROUP_CONCAT(user_id) as ids");
    $this->db->where_in('parent_id',$eight_array);
    $query = $this->db->get('users')->result_array();
    $ids     =   $query[0]['ids']; 
    $ninth_array   =   explode(',',$ids);
            //level 3 return $o_array;
    $this->db->where_in('parent_id',$ninth_array);   
    $this->db->where('type!= 1');
    $this->db->order_by("user_id", "asc"); 
    $level10    =   $this->db->get('users')->result();

    $this->db->select("GROUP_CONCAT(user_id) as ids");
    $this->db->where_in('parent_id',$ninth_array);
    $query = $this->db->get('users')->result_array();
    $ids     =   $query[0]['ids']; 
    $ten_array   =   explode(',',$ids);
            //level 3 return $o_array;
    $this->db->where_in('parent_id',$ten_array);   
    $this->db->where('type!= 1');
    $this->db->order_by("user_id", "asc"); 
    $level11    =   $this->db->get('users')->result();


		return array_merge($level1, $level2,$level3,$level4,$level5,$level6,$level7,$level8,$level9,$level10,$level11); 
	}
	public function insert_product($data){
		$this->db->insert('products',$data);
	}
	public function insertSlider($data){
		return $this->db->insert('slider',$data);
	}
	public function get_product_data(){
		$this->db->select('*');
		$this->db->from('products');
		$query=$this->db->get();
		if($query->num_rows()){
			return $query->result();
		}else{
			return false;
		}
	}
	public function get_product_delete($id){
		$this->db->where('id',$id);
		$this->db->delete("products");
	}
	public function approve_product($id){
		$data=array('status'=>'1');
		$this->db->where('id',$id);
		$this->db->update('products',$data);
	}
	public function get_product_view($id){
		$this->db->select('*');
		$this->db->from('products');
		$this->db->where('id',$id);
		$query=$this->db->get();
		if($query->num_rows()){
			return $query->result();
		}else{
			return false;
		}
	}
	public function get_product_update($data,$id){
		$this->db->where('id',$id);
		$this->db->update("products",$data);
	}
	public function insert_category($data){
		$this->db->insert('category',$data);
	}
	public function get_category_data(){
		$this->db->select('*');
		$this->db->from('category');
		$query=$this->db->get();
		if($query->num_rows()){
			return $query->result();
		}else{
			return false;
		}
	}
 	public function get_category_view($id){
		$this->db->select('*');
		$this->db->from('category');
		$this->db->where('id',$id);
		$query=$this->db->get();
		if($query->num_rows()){
			return $query->result();
		}else{
			return false;
		}
	}
	public function get_category_update($data,$id){
		$this->db->where('id',$id);
		$this->db->update("category",$data);
	}
	public function get_category_delete($id){
		$this->db->where('id',$id);
		$this->db->delete("category");
	}
	public function approve_category($id){
		$data=array('status'=>'1');
		$this->db->where('id',$id);
		$this->db->update('category',$data);
	}
	public function total_register_member(){
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('type =2');
		$total_credit=$this->db->get();
		$total_register_member= $total_credit->num_rows();
		return $total_register_member;
	}
	public function base_share_amount(){
		$this->db->select_sum('comission');
	    $this->db->from('users');
	    $this->db->where('(type = 2) ');
	    $query = $this->db->get();
	    $base_share_amount=$query->row()->comission;
	    return $base_share_amount;
	}
	public function boster_share_amount(){
		$this->db->select_sum('booster_com');
	    $this->db->from('users');
	    $this->db->where('(type = 2) ');
	    $query = $this->db->get();
	    $boster_share_amount=$query->row()->booster_com;
	    return $boster_share_amount;
	}
	public function get_pending_payments(){
		$this->db->select('*');
        $this->db->from('pending_payments');
        $this->db->where('status=0');
        $this->db->order_by('id', 'desc');
        $query=$this->db->get();
        if($query->num_rows()){
            return $query->result();
        }else{
            return false;
        }
	}
	public function admin_approved_payments($id,$status){

		$this->db->set('status',$status);
		$this->db->where('id',$id);
		$this->db->update('pending_payments'); 

		$this->db->select('*');
		$this->db->where('id', $id);
		$this->db->from('pending_payments'); 
		$query = $this->db->get();
		if($query->num_rows()){
			$result = $query->row();
			$payout = $result->withdraw_amount;
			$this->db->set('payout', "payout + $payout", FALSE);
			$this->db->where('user_id', $result->user_id);
			$this->db->where('type', '2');
			$this->db->update('users');

		}

	}
	public function get_approved_payments(){
		$this->db->select('*');
        $this->db->from('pending_payments');
        $this->db->where('status=1');
        $query=$this->db->get();
        if($query->num_rows()){
            return $query->result();
        }else{
            return false;
        }
	}
	public function get_orders(){
	    $this->db->select('*');
	    $this->db->from('tbl_cart_product'); 
	    $this->db->join('users', 'users.user_id=tbl_cart_product.user_id', 'left');
	    $this->db->join('products', 'products.product_code=tbl_cart_product.product_id', 'left');     
	    $query = $this->db->get(); 
	    if($query->num_rows() != 0)
	    {
	        return $query->result();
	    }
	    else
	    {
	        return false;
	    }
	}

	public function approvedUsers(){

		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('type', '2');
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function getSliderImages(){

		$this->db->select('*');
		$this->db->from('slider');
		$query = $this->db->get();

		return $query->num_rows() > 0 ? $query->result() : false;
	}

	public function deleteSliderImage($id){

		$this->db->where('id', $id);
		$this->db->delete('slider');
	}
	 
}