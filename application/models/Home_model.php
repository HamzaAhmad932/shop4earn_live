<?php
class Home_model extends CI_Model{
	public function __construct(){
		parent::__construct();
		
		$this->load->model('Admin_model');
	}
	public function insertData($data){
		$this->db->insert('users',$data);

	}
	public function insert_cart_data($data){
		$this->db->insert('card',$data);

	}
	public function get_slider_data()
	{
		$sql = "select * from slider";
		$result = $this->db->query($sql)->result();
		return $result;
	}
	public function login($username,$password){
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('full_name',$username);
		$this->db->where('password',$password);
		$query=$this->db->get();
		if($query->row()){
			return $query->row();
		}else{
			return false;
		}
	}
	public function get_colors($ids){
        $this->db->select(['id', 'name']);
        $this->db->from('colors');
        $this->db->where_in('id', $ids);
        $query=$this->db->get();
        if($query->num_rows()){
            return $query->result_array();
        }else{
            return false;
        }
    }
    public function get_sizes($ids){
        $this->db->select(['id', 'name']);
        $this->db->from('sizes');
        $this->db->where_in('id', $ids);
        $query=$this->db->get();
        if($query->num_rows()){
            return $query->result_array();
        }else{
            return false;
        }
    }
	public function get_default_parent_id(){
		$this->db->select_max('parent_id');
		$this->db->from('users');
		$this->db->where("type", "1");
		$query=$this->db->get();
		$par_id = $query->row();
	    $parent_id= $par_id->parent_id;
	    return $parent_id;
	}
	public function get_user_parent_id($parent_id){
	    $this->db->select('*');
		$this->db->from('users');
		$this->db->where('parent_id',$parent_id);
		$this->db->where('type !=1');
		$total_credit=$this->db->get();
		$total_count= $total_credit->num_rows();
		return $total_count;
	}
	public function get_count_parent_id($parent_id){
	    $this->db->select('*');
		$this->db->from('users');
		$this->db->where('parent_id',$parent_id);
		$this->db->where('type !=1');
		$total_credit=$this->db->get();
		$total_count= $total_credit->num_rows();
		return $total_count;
	}
	public function get_referal_id($referal_id){
	    $this->db->select('*');
		$this->db->from('users');
		$this->db->where('parent_id',$referal_id);
		$this->db->where('type !=1');
		$total_credit=$this->db->get();
		$total_count= $total_credit->num_rows();
		return $total_count;
	}
	public function select_min_parent_id($parent_id){
    $this->db->select("GROUP_CONCAT(user_id) as my_ids");
    $this->db->where("parent_id", $parent_id);
    $this->db->where("type !=1");
    $query = $this->db->get('users')->result_array();
    $my_ids     =   $query[0]['my_ids'];
    $my_array   =   explode(',',$my_ids);
    //2nd level
 	$this->db->select("GROUP_CONCAT(user_id) as ids");
    $this->db->where_in('parent_id',$my_array);
    $query = $this->db->get('users')->result_array();
    $ids     =   $query[0]['ids'];
    $o_array   =   explode(',',$ids);
    //3rd level
 	$this->db->select("GROUP_CONCAT(user_id) as ids");
    $this->db->where_in('parent_id',$o_array);
    $query = $this->db->get('users')->result_array();
    $ids     =   $query[0]['ids'];
    $third_array   =   explode(',',$ids);
        //4th level
 	$this->db->select("GROUP_CONCAT(user_id) as ids");
    $this->db->where_in('parent_id',$third_array);
    $query = $this->db->get('users')->result_array();
    $ids     =   $query[0]['ids'];
    $fourth_array   =   explode(',',$ids);
            //5th level
 	$this->db->select("GROUP_CONCAT(user_id) as ids");
    $this->db->where_in('parent_id',$fourth_array);
    $query = $this->db->get('users')->result_array();
    $ids     =   $query[0]['ids'];
    $fifth_array   =   explode(',',$ids);
        //6th level
 	$this->db->select("GROUP_CONCAT(user_id) as ids");
    $this->db->where_in('parent_id',$fifth_array);
    $query = $this->db->get('users')->result_array();
    $ids     =   $query[0]['ids'];
    $sixth_array   =   explode(',',$ids);
            //7th level
 	$this->db->select("GROUP_CONCAT(user_id) as ids");
    $this->db->where_in('parent_id',$sixth_array);
    $query = $this->db->get('users')->result_array();
    $ids     =   $query[0]['ids'];
    $seaven_array   =   explode(',',$ids);
    //8th level
 	$this->db->select("GROUP_CONCAT(user_id) as ids");
    $this->db->where_in('parent_id',$seaven_array);
    $query = $this->db->get('users')->result_array();
    $ids     =   $query[0]['ids'];
    $eight_array   =   explode(',',$ids);
    //9th level
 	$this->db->select("GROUP_CONCAT(user_id) as ids");
    $this->db->where_in('parent_id',$eight_array);
    $query = $this->db->get('users')->result_array();
    $ids     =   $query[0]['ids'];
    $ninth_array   =   explode(',',$ids);
    //10th level
 	$this->db->select("GROUP_CONCAT(user_id) as ids");
    $this->db->where_in('parent_id',$ninth_array);
    $query = $this->db->get('users')->result_array();
    $ids     =   $query[0]['ids'];
    $ten_array   =   explode(',',$ids);
    //11th level
 	$this->db->select("GROUP_CONCAT(user_id) as ids");
    $this->db->where_in('parent_id',$ten_array);
    $query = $this->db->get('users')->result_array();
    $ids     =   $query[0]['ids'];
    $eleven_array   =   explode(',',$ids);
    //12th level
 	$this->db->select("GROUP_CONCAT(user_id) as ids");
    $this->db->where_in('parent_id',$eleven_array);
    $query = $this->db->get('users')->result_array();
    $ids     =   $query[0]['ids'];
    $twelve_array   =   explode(',',$ids);
        //13th level
 	$this->db->select("GROUP_CONCAT(user_id) as ids");
    $this->db->where_in('parent_id',$twelve_array);
    $query = $this->db->get('users')->result_array();
    $ids     =   $query[0]['ids'];
    $thirteen_array   =   explode(',',$ids);


    $add_att = array_merge($my_array, $o_array,$third_array,$fourth_array,$fifth_array,$sixth_array,$seaven_array,$eight_array,$ninth_array,$ten_array,$eleven_array,$twelve_array,$thirteen_array);

$return=array();
foreach($add_att as $key => $id) {
    $this->db->select("*");
    $this->db->where("parent_id", $id);
    $this->db->where("type !=1");
    $query = $this->db->get('users')->num_rows();
     if(!is_array($id) &&  $query!=2){

 $return[]=$id;

}
}

return $return;
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

public function chk_referal_id($referal_id){
    
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
    
    return $this->chk_referal_id($childs);

//  	$this->db->select("GROUP_CONCAT(user_id) as ids");
//     $this->db->where_in('parent_id',$my_array);
//     $query = $this->db->get('users')->result_array();
//     $ids     =   $query[0]['ids'];
//     $o_array   =   explode(',',$ids);
    
//     var_dump($o_array);
//     echo "<br>";
    

//     $add_att = array_merge($my_array, $o_array);
//     var_dump($add_att);
//     echo "<br>";
//     $return=array();
//     foreach($add_att as $key => $id) {
//         $this->db->select("*");
//         $this->db->where("parent_id", $id);
//         $this->db->where("type !=1");
//         $query = $this->db->get('users')->num_rows();
//         var_dump($query);
//         echo "<br>";
//         if(!is_array($id) &&  $query!=2){
//             $return[]=$id;
//         }
//     }
//     var_dump($return);
//     die();
//     return;
    

    // return $return;
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
	public function get_products_data(){
		$sql = "select * from products where status = 1 order by id desc";
		$query = $this->db->query($sql);
		if($query->num_rows()){
			return $query->result();
		}else{
			return false;
		}
	}
	public function get_product_detail($id){
		$this->db->select('*');
		$this->db->from('products');
		$this->db->where('id',$id);
		$query=$this->db->get();
		if($query->num_rows()){
			return $query->row_array();
		}else{
			return false;
		}
	}
	public function get_cart_data($user_id){
		$this->db->select('*');
		$this->db->from('card');
		$this->db->where('user_id',$user_id);
		$query=$this->db->get();
		if($query->num_rows()){
			return $query->result();
		}else{
			return false;
		}
	}
	public function get_payment_data($user_id){
		$this->db->select('*');
		$this->db->from('payment_method');
		$this->db->where('user_id',$user_id);
		$query=$this->db->get();
		if($query->num_rows()){
			return $query->result();
		}else{
			return false;
		}
	}
	public function get_user_data($user_id){
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('id',$user_id);
		$query=$this->db->get();
		if($query->num_rows()){
			return $query->result();
		}else{
			return false;
		}
	}
	public function insert_shipping_data($data){
		$this->db->insert('shipping_address',$data);

	}
	public function insert_payment_data($data){
		$this->db->insert('payment_method',$data);

	}
	public function insert_confirm_order_data($data){
		$this->db->insert('confirm_orders',$data);

	}
	
	public function commissioned_users_count($parent_id){
        $ss = $this->Admin_model->get_upline_data($parent_id);
        $user_ids = [];
        $counter = 0;
        foreach($ss as $s){
            if($s->type == '2'){
            array_push($user_ids, $s->user_id);
            }
        }
        $user_ids = array_unique($user_ids);
        foreach($user_ids as $id){
            
            $this->db->select('*');
    		$this->db->from('users');
    		$this->db->where('referal_id',$id);
    		$this->db->where('type','2');
    		$query=$this->db->get();
    		$count=$query->num_rows();
    		if($count >= 2){
    		    $counter++;
    		}
        }
       
        return $counter;
    }

    public function insert_direct_bonus($user_id, $product_ids){

    	$this->db->select_sum('direct_sponser_bonus');
		$this->db->where_in('id', $product_ids);
		$this->db->from('products');
		$query = $this->db->get();
		$result = $query->row();

		$direct_bonus_amount = (float) $result->direct_sponser_bonus;

		if($direct_bonus_amount <= 0){
			return;
		}

		$this->db->select('referal_id');
		$this->db->where('user_id', $user_id);
		$this->db->from('users');
		$user_query = $this->db->get();
		$user = $user_query->row();

		$this->db->trans_start();
		$this->db->set('direct_bonus', "direct_bonus + $direct_bonus_amount", FALSE);
		$this->db->where('user_id', $user->referal_id);
		$this->db->where('type','2');
        $this->db->update('users');

        $this->db->trans_complete();

    }
    
	public function get_upline_users($user_id,$pid, $test = false){

		$this->db->select_sum('basic_vol');
		$this->db->where_in('id', $pid);
		$this->db->from('products');
		$query = $this->db->get();
		$result = $query->row();

		$product_price = (float) $result->basic_vol;

		if($product_price <= 0){
			return;
		}


		$this->db->select('basic');
	    $this->db->from('comission_seting');
	    $query=$this->db->get()->result_array();
	    $ten_com = implode ((array)$query['9']);
	    $ninth_com = implode ((array)$query['8']);
	    $eight_com = implode ((array)$query['7']);
	    $seven_com = implode ((array)$query['6']);
	    $six_com = implode ((array)$query['5']);
	    $five_com = implode ((array)$query['4']);
	    $four_com = implode ((array)$query['3']);
	    $three_com = implode ((array)$query['2']);
	    $two_com = implode ((array)$query['1']);
	    $one_com = implode ((array)$query['0']);
	   
	    

	    $this->db->select("*");
	    $this->db->from("levels_settings");
	    $levels_settings = $this->db->get()->result_array();
	    
	    $basic_users = 0;
	    $standard_users = 0;
	    $silver_users = 0;
	    $gold_users = 0;
	    $diamond_users = 0;
	    $more_than_diamond = 0;
	    
	    foreach($levels_settings as $ls){
	        if($ls['level_number'] == '1'){
	            $basic_users = $ls['refer_for_level'];
	        }
	        if($ls['level_number'] == '2'){
	            $standard_users = $ls['refer_for_level'];
	        }
	        if($ls['level_number'] == '3'){
	            $silver_users = $ls['refer_for_level'];
	        }
	        if($ls['level_number'] == '4'){
	            $gold_users = $ls['refer_for_level'];
	        }
	        if($ls['level_number'] == '5'){
	            $diamond_users = $ls['refer_for_level'];
	        }
	        if($ls['level_number'] == '6'){
	            $more_than_diamond = $ls['refer_for_level'];
	        }
	        
	    }
	    
	    $percentage = 100;
	    
	    recalculate_basic:

	    $winners = [];
	    $t_comission = 0;

	    $except = ['', '1', '2', '3'];


		$this->db->select('parent_id');
		$this->db->from('users');
		$this->db->where('user_id',$user_id);
		$this->db->where('type','2');
		$query=$this->db->get();
		$level1_id = $query->row();

		if($level1_id->parent_id == '0'){
			if($this->verify_self_parent_position($level1_id->referal_id)){
				$level1_id = $level1_id->referal_id;
			}else{
				$level1_id = $this->find_tree_node($level1_id->referal_id);
			}
		}else{
			$level1_id= $level1_id->parent_id;
		}
	    
	    
	    $this->db->select('*');
		$this->db->from('users');
		$this->db->where('referal_id',$level1_id);
		$this->db->where('type','2');
		$this->db->where('user_id !=', $user_id);
		$query=$this->db->get();
		$level_1_basic=$query->num_rows();

		if($level_1_basic >= $basic_users || $level_1_basic >= $standard_users || $level_1_basic >= $silver_users || $level_1_basic >= $gold_users || $level_1_basic >= $diamond_users ){

			$comission=$product_price * $ten_com/$percentage;

			$winner = new stdClass();
			$winner->user_id = $level1_id;
			$winner->u_comission = $comission;
			$t_comission += $comission;
			array_push($winners, $winner);
            
		}



	    //return $level1_id;
		//level 2
		if(!empty($level1_id) && !in_array($level1_id, $except)){

		$this->db->select('parent_id');
		$this->db->from('users');
		$this->db->where('user_id',$level1_id);
		$this->db->where('type','2');
		$query=$this->db->get();
		$level2_id = $query->row();
	    $level2_id= $level2_id->parent_id;

	    $this->db->select('*');
		$this->db->from('users');
		$this->db->where('referal_id',$level2_id);
		$this->db->where('user_id !=', $user_id);
		$this->db->where('type','2');
		$query=$this->db->get();
		$level_2_basic=$query->num_rows();

		if($level_2_basic >= $basic_users || $level_2_basic >= $standard_users || $level_2_basic >= $silver_users || $level_2_basic >= $gold_users || $level_2_basic >= $diamond_users ){
		$comission=$product_price * $ninth_com/$percentage;

		$winner = new stdClass();
		$winner->user_id = $level2_id;
		$winner->u_comission = $comission;
		$t_comission += $comission;
		array_push($winners, $winner);
		}
	}


		//level 3
	if(!empty($level2_id) && !in_array($level2_id, $except)){

		$this->db->select('parent_id');
		$this->db->from('users');
		$this->db->where('user_id',$level2_id);
		$this->db->where('type','2');
		$query=$this->db->get();
		$level3_id = $query->row();
	    $level3_id= $level3_id->parent_id;

	    $this->db->select('*');
		$this->db->from('users');
		$this->db->where('referal_id',$level3_id);
		$this->db->where('user_id !=', $user_id);
		$this->db->where('type','2');
		$query=$this->db->get();
		$level_3_basic=$query->num_rows();
		if($level_3_basic >= $basic_users || $level_3_basic >= $standard_users || $level_3_basic >= $silver_users || $level_3_basic >= $gold_users || $level_3_basic >= $diamond_users ){
		$comission=$product_price * $eight_com/$percentage;

		$winner = new stdClass();
		$winner->user_id = $level3_id;
		$winner->u_comission = $comission;
		$t_comission += $comission;
		array_push($winners, $winner);
		}
 	}



		//level 4
 		if(!empty($level3_id) && !in_array($level3_id, $except)){

		$this->db->select('parent_id');
		$this->db->from('users');
		$this->db->where('user_id',$level3_id);
		$this->db->where('type','2');
		$query=$this->db->get();
		$level4_id = $query->row();
	    $level4_id= $level4_id->parent_id;
	    $this->db->select('*');
		$this->db->from('users');
		$this->db->where('referal_id',$level4_id);
		$this->db->where('user_id !=', $user_id);
		$this->db->where('type','2');
		$query=$this->db->get();
		$level_4_basic=$query->num_rows();
		if($level_4_basic >= $basic_users || $level_4_basic >= $standard_users || $level_4_basic >= $silver_users || $level_4_basic >= $gold_users || $level_4_basic >= $diamond_users ){
		$comission=$product_price * $seven_com/$percentage;
	    
	    $winner = new stdClass();
		$winner->user_id = $level4_id;
		$winner->u_comission = $comission;
		$t_comission += $comission;
		array_push($winners, $winner);
		}
	}


		//level 5
	if(!empty($level4_id) && !in_array($level4_id, $except)){

		$this->db->select('parent_id');
		$this->db->from('users');
		$this->db->where('user_id',$level4_id);
		$this->db->where('type','2');
		$query=$this->db->get();
		$level5_id = $query->row();
	    $level5_id= $level5_id->parent_id;
	    $this->db->select('*');
		$this->db->from('users');
		$this->db->where('referal_id',$level5_id);
		$this->db->where('user_id !=', $user_id);
		$this->db->where('type','2');
		$query=$this->db->get();
		$level_5_basic=$query->num_rows();
		if($level_5_basic >= $basic_users || $level_5_basic >= $standard_users || $level_5_basic >= $silver_users || $level_5_basic >= $gold_users || $level_5_basic >= $diamond_users ){
		$comission=$product_price * $six_com/$percentage;
	    $winner = new stdClass();
		$winner->user_id = $level5_id;
		$winner->u_comission = $comission;
		$t_comission += $comission;
		array_push($winners, $winner);
		}
	    }

		//level 6
		if(!empty($level5_id) && !in_array($level5_id, $except)){

		$this->db->select('parent_id');
		$this->db->from('users');
		$this->db->where('user_id',$level5_id);
		$this->db->where('type','2');
		$query=$this->db->get();
		$level6_id = $query->row();
	    $level6_id= $level6_id->parent_id;
	    $this->db->select('*');
		$this->db->from('users');
		$this->db->where('referal_id',$level6_id);
		$this->db->where('user_id !=', $user_id);
		$this->db->where('type','2');
		$query=$this->db->get();
		$level_6_basic=$query->num_rows();
		if($level_6_basic >= $basic_users || $level_6_basic >= $standard_users || $level_6_basic >= $silver_users || $level_6_basic >= $gold_users || $level_6_basic >= $diamond_users ){
		$comission=$product_price * $five_com/$percentage;
	    $winner = new stdClass();
		$winner->user_id = $level6_id;
		$winner->u_comission = $comission;
		$t_comission += $comission;
		array_push($winners, $winner);
		}
	}


        //level 7
	if(!empty($level6_id) && !in_array($level6_id, $except)){

		$this->db->select('parent_id');
		$this->db->from('users');
		$this->db->where('user_id',$level6_id);
		$this->db->where('type','2');
		$query=$this->db->get();
		$level7_id = $query->row();
	    $level7_id= $level7_id->parent_id;
	    $this->db->select('*');
		$this->db->from('users');
		$this->db->where('referal_id',$level7_id);
		$this->db->where('user_id !=', $user_id);
		$this->db->where('type','2');
		//$this->db->where('referal_id','2');
		$query=$this->db->get();
		$level_7_basic=$query->num_rows();
		if($level_7_basic >= $basic_users || $level_7_basic >= $standard_users || $level_7_basic >= $silver_users || $level_7_basic >= $gold_users || $level_7_basic >= $diamond_users ){
		$comission=$product_price * $four_com/$percentage;
	    $winner = new stdClass();
		$winner->user_id = $level7_id;
		$winner->u_comission = $comission;
		$t_comission += $comission;
		array_push($winners, $winner);
		}
	}



        //level 8
	if(!empty($level7_id) && !in_array($level7_id, $except)){

		$this->db->select('parent_id');
		$this->db->from('users');
		$this->db->where('user_id',$level7_id);
		$this->db->where('type','2');
		$query=$this->db->get();
		$level8_id = $query->row();
	    $level8_id= $level8_id->parent_id;
	    $this->db->select('*');
		$this->db->from('users');
		$this->db->where('referal_id',$level8_id);
		$this->db->where('user_id !=', $user_id);
		$this->db->where('type','2');
		$query=$this->db->get();
		$level_8_basic=$query->num_rows();
		if($level_8_basic >= $basic_users || $level_8_basic >= $standard_users || $level_8_basic >= $silver_users || $level_8_basic >= $gold_users || $level_8_basic >= $diamond_users ){
		$comission=$product_price * $three_com/$percentage;
	    $winner = new stdClass();
		$winner->user_id = $level8_id;
		$winner->u_comission = $comission;
		$t_comission += $comission;
		array_push($winners, $winner);
		}
	}


        //level 9
	if(!empty($level8_id) && !in_array($level8_id, $except)){

		$this->db->select('parent_id');
		$this->db->from('users');
		$this->db->where('user_id',$level8_id);
		$this->db->where('type','2');
		$query=$this->db->get();
		$level9_id = $query->row();
	    $level9_id= $level9_id->parent_id;
	    $this->db->select('*');
		$this->db->from('users');
		$this->db->where('referal_id',$level9_id);
		$this->db->where('user_id !=', $user_id);
		$this->db->where('type','2');
		$query=$this->db->get();
		$level_9_basic=$query->num_rows();
		if($level_9_basic >= $basic_users || $level_9_basic >= $standard_users || $level_9_basic >= $silver_users || $level_9_basic >= $gold_users || $level_9_basic >= $diamond_users ){
		$comission=$product_price * $two_com/$percentage;
	    $winner = new stdClass();
		$winner->user_id = $level9_id;
		$winner->u_comission = $comission;
		$t_comission += $comission;
		array_push($winners, $winner);
		}
	}


        //level 10
		if(!empty($level9_id) && !in_array($level9_id, $except)){

		$this->db->select('parent_id');
		$this->db->from('users');
		$this->db->where('user_id',$level9_id);
		$this->db->where('type','2');
		$query=$this->db->get();
		$level10_id = $query->row();
	    $level10_id= $level10_id->parent_id;
	    $this->db->select('*');
		$this->db->from('users');
		$this->db->where('referal_id',$level10_id);
		$this->db->where('user_id !=', $user_id);
		$this->db->where('type','2');
		$query=$this->db->get();
		$level_10_basic=$query->num_rows();
		if($level_10_basic >= $basic_users || $level_10_basic >= $standard_users || $level_10_basic >= $silver_users || $level_10_basic >= $gold_users || $level_10_basic >= $diamond_users ){
		$comission=$product_price * $one_com/$percentage;
	    $winner = new stdClass();
		$winner->user_id = $level10_id;
		$winner->u_comission = $comission;
		$t_comission += $comission;
		array_push($winners, $winner);
		}
	}
	
	if($test){
	
    	print_r('Total_commission_calculated: '.$t_comission);
    	echo "<br>";
    	echo "<table style='border: 1px solid black'>";
    	echo "<thead>";
    	echo "<tr>";
    	echo "<th style='border: 1px solid black'>User ID</th>";
    	echo "<th style='border: 1px solid black'>Commission</th>";
    	echo "</tr>";
    	echo "</thead>";
    	echo "<tbody>";
    	echo "<tr>";
    	foreach($winners as $w){
    	    echo "<tr>";
    	    echo "<td style='border: 1px solid black'>$w->user_id</td>";   
    	    echo "<td style='border: 1px solid black'>$w->u_comission</td>";   
    	echo "</tr>";
    	    
    	}
    	echo "</tr>";
    	echo "</tbody>";
    	echo "</table>";
    	echo "<br>";
    	print_r('Total_commission_available: '.$product_price);
    	echo "<br>";
    }
    
	if(round($t_comission) > round($product_price)){
	    $percentage = ($t_comission/$product_price)*100;
        
        goto recalculate_basic;
        
		foreach($winners as $winr){
			$winr->u_comission -= $subtract;
			$com_round = round($winr->u_comission, 2);
			
			if(!$test){
			    $this->update_users_for_basic_comission($winr->user_id, $com_round);   
			}
		}
	}
	else{

		foreach ($winners as $key => $winner) {
			$com_round_full = round($winner->u_comission, 2);
			if(!$test){
			    $this->update_users_for_basic_comission($winner->user_id, $com_round_full);   
			}
		}
	}
	
	if($test){
	
    	echo "---------------------------------------------------------------------------------------------------------------";
    	echo "<br>";
    	echo "-----------------------------------------Delivered Commmission-----------------------------------------";
    	echo "<br>";
    	echo "---------------------------------------------------------------------------------------------------------------";
    	echo "<br>";
    	
    	print_r('Total_commission_calculated'.$t_comission);
    	echo "<br>";
    	echo "<table style='border: 1px solid black'>";
    	echo "<thead>";
    	echo "<tr>";
    	echo "<th style='border: 1px solid black'>User ID</th>";
    	echo "<th style='border: 1px solid black'>Commission</th>";
    	echo "</tr>";
    	echo "</thead>";
    	echo "<tbody>";
    	foreach($winners as $w){
    	    echo "<tr>";
    	    echo "<td style='border: 1px solid black'>$w->user_id</td>";   
    	    echo "<td style='border: 1px solid black'>$w->u_comission</td>";   
    	echo "</tr>";
    	    
    	}
    	echo "</tbody>";
    	echo "</table>";
    	echo "<br>";
    	print_r('Total_commission_available'.$product_price);
    	echo "<br>";
        die();
        return;
    }
	$last_user = end($winners);

	return !empty($last_user->user_id) ? $last_user->user_id : 0;


	}

	public function update_users_for_basic_comission($user_id, $comission){

		$this->db->trans_start();
		$this->db->set('comission', "comission + $comission", FALSE);
		$this->db->where('user_id', $user_id);
		$this->db->where('type','2');
        $this->db->update('users');

        $this->db->trans_complete();
	}
	
	
	
	public function insert_boster($user_id,$pid, $test = false){


		$this->db->select_sum('booster_vol');
		$this->db->where_in('id', $pid);
		$this->db->from('products');
		$query = $this->db->get();
		$result = $query->row();

		$booster_comission = (int) $result->booster_vol;

		if($booster_comission <= 0){
			return;
		}

		$this->db->select('standard');
	    $this->db->from('comission_seting');
	    $st_query=$this->db->get()->result_array();
	    $st_ten= implode ((array)$st_query['9']);
	    $st_ninth= implode ((array)$st_query['8']);
	    $st_eight= implode ((array)$st_query['7']);
	    $st_seven= implode ((array)$st_query['6']);
	    $st_six= implode ((array)$st_query['5']);
	    $st_five= implode ((array)$st_query['4']);
	    $st_four= implode ((array)$st_query['3']);
	    $st_three= implode ((array)$st_query['2']);
	    $st_two= implode ((array)$st_query['1']);
	    $st_one= implode ((array)$st_query['0']);

	    $this->db->select('silver');
	    $this->db->from('comission_seting');
	    $silver_query=$this->db->get()->result_array();
	    $silver_ten= implode ((array)$silver_query['9']);
	    $silver_ninth= implode ((array)$silver_query['8']);
	    $silver_eight= implode ((array)$silver_query['7']);
	    $silver_seven= implode ((array)$silver_query['6']);
	    $silver_six= implode ((array)$silver_query['5']);
	    $silver_five= implode ((array)$silver_query['4']);
	    $silver_four= implode ((array)$silver_query['3']);
	    $silver_three= implode ((array)$silver_query['2']);
	    $silver_two= implode ((array)$silver_query['1']);
	    $silver_one= implode ((array)$silver_query['0']);
	    //Gold
	    $this->db->select('gold');
	    $this->db->from('comission_seting');
	    $gold_query=$this->db->get()->result_array();
	    
	    $gold_ten= implode ((array)$gold_query['9']);
	    $gold_ninth= implode ((array)$gold_query['8']);
	    $gold_eight= implode ((array)$gold_query['7']);
	    $gold_seven= implode ((array)$gold_query['6']);
	    $gold_six= implode ((array)$gold_query['5']);
	    $gold_five= implode ((array)$gold_query['4']);
	    $gold_four= implode ((array)$gold_query['3']);
	    $gold_three= implode ((array)$gold_query['2']);
	    $gold_two= implode ((array)$gold_query['1']);
	    $gold_one= implode ((array)$gold_query['0']);
	    //Diamond
	    $this->db->select('diamond');
	    $this->db->from('comission_seting');
	    $diamond_query=$this->db->get()->result_array();
	    $diamond_ten= implode ((array)$diamond_query['9']);
	    $diamond_ninth= implode ((array)$diamond_query['8']);
	    $diamond_eight= implode ((array)$diamond_query['7']);
	    $diamond_seven= implode ((array)$diamond_query['6']);
	    $diamond_six= implode ((array)$diamond_query['5']);
	    $diamond_five= implode ((array)$diamond_query['4']);
	    $diamond_four= implode ((array)$diamond_query['3']);
	    $diamond_three= implode ((array)$diamond_query['2']);
	    $diamond_two= implode ((array)$diamond_query['1']);
	    $diamond_one= implode ((array)$diamond_query['0']);
	    
	    
	    $this->db->select("*");
	    $this->db->from("levels_settings");
	    $levels_settings = $this->db->get()->result_array();
	    
	    $basic_users = 0;
	    $standard_users = 0;
	    $silver_users = 0;
	    $gold_users = 0;
	    $diamond_users = 0;
	    $more_than_diamond = 0;
	    
	    foreach($levels_settings as $ls){
	        if($ls['level_number'] == '1'){
	            $basic_users = $ls['refer_for_level'];
	        }
	        if($ls['level_number'] == '2'){
	            $standard_users = $ls['refer_for_level'];
	        }
	        if($ls['level_number'] == '3'){
	            $silver_users = $ls['refer_for_level'];
	        }
	        if($ls['level_number'] == '4'){
	            $gold_users = $ls['refer_for_level'];
	        }
	        if($ls['level_number'] == '5'){
	            $diamond_users = $ls['refer_for_level'];
	        }
	        if($ls['level_number'] == '6'){
	            $more_than_diamond = $ls['refer_for_level'];
	        }
	        
	    }


	    $percentage = 100;

	    recalculate_booster:

	    $except = ['', '1', '2', '3'];
	    $winners = [];
	    $t_comission = 0;

		$this->db->select('parent_id');
		$this->db->from('users');
		$this->db->where('user_id',$user_id);
		//$this->db->where('type','2');
		$query=$this->db->get();
		$level1_id = $query->row();

		if($level1_id->parent_id == '0'){
			if($this->verify_self_parent_position($level1_id->referal_id)){
				$level1_id = $level1_id->referal_id;
			}else{
				$level1_id = $this->find_tree_node($level1_id->referal_id);
			}
		}else{
			$level1_id= $level1_id->parent_id;
		}
	    
	    $this->db->select('*');
		$this->db->from('users');
		$this->db->where('referal_id',$level1_id);
		$this->db->where('user_id !=', $user_id);
		$this->db->where('type','2');
		$query=$this->db->get();
		$level_1_boster=$query->num_rows();

		

		if($level_1_boster >= $standard_users || $level_1_boster >= $silver_users || $level_1_boster >= $gold_users || $level_1_boster >= $diamond_users ){

		    $comission=$booster_comission * $st_ten/$percentage;
		    
		    $winner = new stdClass();
            $winner->user_id = $level1_id;
            $winner->u_comission = 0;

			$winner->u_comission += $comission;
			$t_comission += $comission;
		}
		if ($level_1_boster >= $silver_users || $level_1_boster >= $gold_users || $level_1_boster >= $diamond_users || $level_1_boster >= $more_than_diamond) {
		$comission=$booster_comission * $silver_ten/$percentage;

        	$winner->u_comission += $comission;
        	$t_comission += $comission;

		}
		if ($level_1_boster >= $gold_users || $level_1_boster >= $diamond_users  || $level_1_boster >= $more_than_diamond) {
		$comission=$booster_comission * $gold_ten/$percentage;
        
        	$winner->u_comission += $comission;
        	$t_comission += $comission;

		}
		if ($level_1_boster >= $diamond_users || $level_1_boster >= $more_than_diamond) {
		$comission=$booster_comission * $diamond_ten/$percentage;
        
        	$winner->u_comission += $comission;
        	$t_comission += $comission;

		}
		
		if(!empty($winner)){
		    array_push($winners, $winner);
		    unset($winner);
		}
		

		
		if(!empty($level1_id) && !in_array($level1_id, $except)){

			
		$this->db->select('parent_id');
		$this->db->from('users');
		$this->db->where('user_id',$level1_id);
		$this->db->where('type','2');
		$query=$this->db->get();
		$level2_id = $query->row();
	    $level2_id= $level2_id->parent_id;

	    

	    $this->db->select('*');
		$this->db->from('users');
		$this->db->where('referal_id',$level2_id);
		$this->db->where('user_id !=', $user_id);
		$this->db->where('type','2');
		$query=$this->db->get();
		$level_2_boster=$query->num_rows();
		if($level_2_boster >= $standard_users  || $level_2_boster >= $silver_users  || $level_2_boster >= $gold_users  || $level_2_boster >= $diamond_users){

		    $comission=$booster_comission * $st_ninth/$percentage;
		
    		$winner = new stdClass();
            $winner->user_id = $level2_id;
            $winner->u_comission = 0;
    		
    		$winner->u_comission += $comission;
    		$t_comission += $comission;
		}
		if ($level_2_boster >= $silver_users || $level_2_boster >= $gold_users || $level_2_boster >= $diamond_users || $level_2_boster >= $more_than_diamond) {
			$comission=$booster_comission * $silver_ninth/$percentage;
        	$winner->u_comission += $comission;
        	$t_comission += $comission;
		}
		//gold
		if ($level_2_boster >= $gold_users || $level_2_boster >= $diamond_users || $level_2_boster >= $more_than_diamond) {
			$comission=$booster_comission * $gold_ninth/$percentage;
        	$winner->u_comission += $comission;
        	$t_comission += $comission;
		}
		//diamond
		if ($level_2_boster >= $diamond_users || $level_2_boster >= $more_than_diamond) {
			$comission=$booster_comission * $diamond_ninth/$percentage;
	        $winner->u_comission += $comission;
	        $t_comission += $comission;
		}
		
		if(!empty($winner)){
		    array_push($winners, $winner);
		    unset($winner);
		}
	}



		//level 3
		if(!empty($level2_id) && !in_array($level2_id, $except)){

		$this->db->select('parent_id');
		$this->db->from('users');
		$this->db->where('user_id',$level2_id);
		$this->db->where('type','2');
		$query=$this->db->get();
		$level3_id = $query->row();
	    $level3_id= $level3_id->parent_id;


	    $this->db->select('*');
		$this->db->from('users');
		$this->db->where('referal_id',$level3_id);
		$this->db->where('user_id !=', $user_id);
		$this->db->where('type','2');
		$query=$this->db->get();
		$level_3_boster=$query->num_rows();
		if($level_3_boster >= $standard_users  || $level_3_boster >= $silver_users  || $level_3_boster >= $gold_users  || $level_3_boster >= $diamond_users){

		$comission=$booster_comission * $st_eight/$percentage;
		
		$winner = new stdClass();
	    $winner->user_id = $level3_id;
	    $winner->u_comission = 0;
	    
		$winner->u_comission += $comission;
		$t_comission += $comission;
		}
		if ($level_3_boster >= $silver_users || $level_3_boster >= $gold_users || $level_3_boster >= $diamond_users || $level_3_boster >= $more_than_diamond) {
		$comission=$booster_comission * $silver_eight/$percentage;
        $winner->u_comission += $comission;
		$t_comission += $comission;
		}
		//gold
		if ($level_3_boster >= $gold_users || $level_3_boster >= $diamond_users || $level_3_boster >= $more_than_diamond) {
		$comission=$booster_comission * $gold_eight/$percentage;
        $winner->u_comission += $comission;
		$t_comission += $comission;
		}
		//diamond
		if ($level_3_boster >= $diamond_users || $level_3_boster >= $more_than_diamond) {
		$comission=$booster_comission * $diamond_eight/$percentage;
        $winner->u_comission += $comission;
		$t_comission += $comission;
		}
		
		if(!empty($winner)){
		    array_push($winners, $winner);
		    unset($winner);
		}

	}

		//level 4
	if(!empty($level3_id) && !in_array($level3_id, $except)){

		$this->db->select('parent_id');
		$this->db->from('users');
		$this->db->where('user_id',$level3_id);
		$this->db->where('type','2');
		$query=$this->db->get();
		$level4_id = $query->row();
	    $level4_id= $level4_id->parent_id;

	    
	    $this->db->select('*');
		$this->db->from('users');
		$this->db->where('referal_id',$level4_id);
		$this->db->where('user_id !=', $user_id);
		$this->db->where('type','2');
		$query=$this->db->get();
		$level_4_boster=$query->num_rows();
		if($level_4_boster >= $standard_users  || $level_4_boster >= $silver_users  || $level_4_boster >= $gold_users  || $level_4_boster >= $diamond_users || $level_4_boster >= $more_than_diamond){

		$comission=$booster_comission * $st_seven/$percentage;
		$winner = new stdClass();
	    $winner->user_id = $level4_id;
	    $winner->u_comission = 0;

		$winner->u_comission += $comission;
		$t_comission += $comission;
		}
		if ($level_4_boster >= $silver_users || $level_4_boster >= $gold_users || $level_4_boster >= $diamond_users  || $level_4_boster >= $more_than_diamond) {
		$comission=$booster_comission * $silver_seven/$percentage;
        $winner->u_comission += $comission;
		$t_comission += $comission;
		}
		//gold
		if ($level_4_boster >= $gold_users || $level_4_boster >= $diamond_users  || $level_4_boster >= $more_than_diamond) {
		$comission=$booster_comission * $gold_seven/$percentage;
        $winner->u_comission += $comission;
		$t_comission += $comission;
		}
		//diamond
		if ($level_4_boster >= $diamond_users || $level_4_boster >= $more_than_diamond) {
		$comission=$booster_comission * $diamond_seven/$percentage;
        $winner->u_comission += $comission;
		$t_comission += $comission;
		}
		
		if(!empty($winner)){
		    array_push($winners, $winner);
		    unset($winner);
		}
		
	}

		//level 5
	if(!empty($level4_id) && !in_array($level4_id, $except)){

		$this->db->select('parent_id');
		$this->db->from('users');
		$this->db->where('user_id',$level4_id);
		$this->db->where('type','2');
		$query=$this->db->get();
		$level5_id = $query->row();
	    $level5_id= $level5_id->parent_id;

	    

	    $this->db->select('*');
		$this->db->from('users');
		$this->db->where('referal_id',$level5_id);
		$this->db->where('user_id !=', $user_id);
		$this->db->where('type','2');
		$query=$this->db->get();
		$level_5_boster=$query->num_rows();
		if($level_5_boster >= $standard_users  || $level_5_boster >= $silver_users  || $level_5_boster >= $gold_users  || $level_5_boster >= $diamond_users  || $level_5_boster >= $more_than_diamond){

		$comission=$booster_comission * $st_six/$percentage;
		
		$winner = new stdClass();
	    $winner->user_id = $level5_id;
	    $winner->u_comission = 0;
	    
		$winner->u_comission += $comission;
		$t_comission += $comission;

		}
		if ($level_5_boster >= $silver_users || $level_5_boster >= $gold_users || $level_5_boster >= $diamond_users || $level_5_boster >= $more_than_diamond) {
		$comission=$booster_comission * $silver_six/$percentage;
        $winner->u_comission += $comission;
		$t_comission += $comission;

		}
		//gold
		if ($level_5_boster >= $gold_users || $level_5_boster >= $diamond_users || $level_5_boster >= $more_than_diamond) {
		$comission=$booster_comission * $gold_six/$percentage;
        $winner->u_comission += $comission;
		$t_comission += $comission;

		}
		//diamond
		if ($level_5_boster >= $diamond_users || $level_5_boster >= $more_than_diamond) {
		$comission=$booster_comission * $diamond_six/$percentage;
        $winner->u_comission += $comission;
		$t_comission += $comission;

		}
		
		if(!empty($winner)){
		    array_push($winners, $winner);
		    unset($winner);
		}
	}

	
		//level 6
	if(!empty($level5_id) && !in_array($level5_id, $except)){

		$this->db->select('parent_id');
		$this->db->from('users');
		$this->db->where('user_id',$level5_id);
		$this->db->where('type','2');
		$query=$this->db->get();
		$level6_id = $query->row();
	    $level6_id= $level6_id->parent_id;

	    
	    $this->db->select('*');
		$this->db->from('users');
		$this->db->where('referal_id',$level6_id);
		$this->db->where('user_id !=', $user_id);
		$this->db->where('type','2');
		$query=$this->db->get();
		$level_6_boster=$query->num_rows();
		if($level_6_boster >= $standard_users  || $level_6_boster >= $silver_users  || $level_6_boster >= $gold_users  || $level_6_boster >= $diamond_users  || $level_6_boster >= $more_than_diamond){

		$comission=$booster_comission * $st_five/$percentage;

		$winner = new stdClass();
	    $winner->user_id = $level6_id;
	    $winner->u_comission = 0;


		$winner->u_comission += $comission;
		$t_comission += $comission;

		}
		if ($level_6_boster >= $silver_users || $level_6_boster >= $gold_users || $level_6_boster >= $diamond_users || $level_6_boster >= $more_than_diamond) {
		$comission=$booster_comission * $silver_five/$percentage;
        $winner->u_comission += $comission;
		$t_comission += $comission;

		}
		//gold
		if ($level_6_boster >= $gold_users || $level_6_boster >= $diamond_users  || $level_6_boster >= $more_than_diamond) {
		$comission=$booster_comission * $gold_five/$percentage;
        $winner->u_comission += $comission;
		$t_comission += $comission;

		}
		//diamond
		if ($level_6_boster >= $diamond_users || $level_6_boster >= $more_than_diamond) {
		$comission=$booster_comission * $diamond_five/$percentage;
        $winner->u_comission += $comission;
		$t_comission += $comission;

		}
		
		if(!empty($winner)){
		    array_push($winners, $winner);
		    unset($winner);
		}
	}


		//level 7
	if(!empty($level6_id) && !in_array($level6_id, $except)){

		$this->db->select('parent_id');
		$this->db->from('users');
		$this->db->where('user_id',$level6_id);
		$this->db->where('type','2');
		$query=$this->db->get();
		$level7_id = $query->row();
	    $level7_id= $level7_id->parent_id;

	    

	    $this->db->select('*');
		$this->db->from('users');
		$this->db->where('referal_id',$level7_id);
		$this->db->where('user_id !=', $user_id);
		$this->db->where('type','2');
		$query=$this->db->get();
		$level_7_boster=$query->num_rows();
		if($level_7_boster >= $standard_users  || $level_7_boster >= $silver_users  || $level_7_boster >= $gold_users  || $level_7_boster >= $diamond_users  || $level_7_boster >= $more_than_diamond){

		$comission=$booster_comission * $st_four/$percentage;
		
		$winner = new stdClass();
	    $winner->user_id = $level7_id;
	    $winner->u_comission = 0;
	    
		$winner->u_comission += $comission;
		$t_comission += $comission;

		}
		if ($level_7_boster >= $silver_users || $level_7_boster >= $gold_users || $level_7_boster >= $diamond_users || $level_7_boster >= $more_than_diamond) {
		$comission=$booster_comission * $silver_four/$percentage;
        $winner->u_comission += $comission;
		$t_comission += $comission;

		}
		//gold
		if ($level_7_boster >= $gold_users || $level_7_boster >= $diamond_users || $level_7_boster >= $more_than_diamond) {
		$comission=$booster_comission * $gold_four/$percentage;
        $winner->u_comission += $comission;
		$t_comission += $comission;

		}
		//diamond
		if ($level_7_boster >= $diamond_users || $level_7_boster >= $more_than_diamond) {
		$comission=$booster_comission * $diamond_four/$percentage;
        $winner->u_comission += $comission;
		$t_comission += $comission;

		}
		
		if(!empty($winner)){
		    array_push($winners, $winner);
		    unset($winner);
		}
	}
		//level 8
	if(!empty($level7_id) && !in_array($level7_id, $except)){

		$this->db->select('parent_id');
		$this->db->from('users');
		$this->db->where('user_id',$level7_id);
		$this->db->where('type','2');
		$query=$this->db->get();
		$level8_id = $query->row();
	    $level8_id= $level8_id->parent_id;


	    $this->db->select('*');
		$this->db->from('users');
		$this->db->where('referal_id',$level8_id);
		$this->db->where('user_id !=', $user_id);
		$this->db->where('type','2');
		$query=$this->db->get();
		$level_8_boster=$query->num_rows();
		if($level_8_boster >= $standard_users || $level_8_boster >= $silver_users || $level_8_boster >= $gold_users || $level_8_boster >= $diamond_users || $level_8_boster >= $more_than_diamond){

		$comission=$booster_comission * $st_three/$percentage;
		
		$winner = new stdClass();
	    $winner->user_id = $level8_id;
	    $winner->u_comission = 0;
	    
		$winner->u_comission += $comission;
		$t_comission += $comission;

		}
		if ($level_8_boster >= $silver_users || $level_8_boster >= $gold_users || $level_8_boster >= $diamond_users || $level_8_boster >= $more_than_diamond) {
		$comission=$booster_comission * $silver_three/$percentage;
        $winner->u_comission += $comission;
		$t_comission += $comission;

		}
		//gold
		if ($level_8_boster >= $gold_users || $level_8_boster >= $diamond_users || $level_8_boster >= $more_than_diamond) {
		$comission=$booster_comission * $gold_three/$percentage;
        $winner->u_comission += $comission;
		$t_comission += $comission;

		}
		//diamond
		if ($level_8_boster >= $diamond_users || $level_8_boster >= $more_than_diamond) {
		$comission=$booster_comission * $diamond_three/$percentage;
        $winner->u_comission += $comission;
		$t_comission += $comission;

		}
		
		if(!empty($winner)){
		    array_push($winners, $winner);
		    unset($winner);
		}
	}
		//level 9
	if(!empty($level8_id) && !in_array($level8_id, $except)){

		$this->db->select('parent_id');
		$this->db->from('users');
		$this->db->where('user_id',$level8_id);
		$this->db->where('type','2');
		$query=$this->db->get();
		$level9_id = $query->row();
	    $level9_id= $level9_id->parent_id;


	    $this->db->select('*');
		$this->db->from('users');
		$this->db->where('referal_id',$level9_id);
		$this->db->where('user_id !=', $user_id);
		$this->db->where('type','2');
		$query=$this->db->get();
		$level_9_boster=$query->num_rows();
		if($level_9_boster >= $standard_users  || $level_9_boster >= $silver_users || $level_9_boster >= $gold_users || $level_9_boster >= $diamond_users || $level_9_boster >= $more_than_diamond){

		$comission=$booster_comission * $st_two/$percentage;
		
		$winner = new stdClass();
	    $winner->user_id = $level9_id;
	    $winner->u_comission = 0;
	    
		$winner->u_comission += $comission;
		$t_comission += $comission;

		}
		if ($level_9_boster >= $silver_users || $level_9_boster >= $gold_users || $level_9_boster >= $diamond_users || $level_9_boster >= $more_than_diamond) {
		$comission=$booster_comission * $silver_two/$percentage;
        $winner->u_comission += $comission;
		$t_comission += $comission;

		}
		//gold 
		if ($level_9_boster >= $gold_users || $level_9_boster >= $diamond_users || $level_9_boster >= $more_than_diamond) {
		$comission=$booster_comission * $gold_two/$percentage;
        $winner->u_comission += $comission;
		$t_comission += $comission;

		}
		//diamond
		if ($level_9_boster >= $diamond_users || $level_9_boster >= $more_than_diamond) {
		$comission=$booster_comission * $diamond_two/$percentage;
        $winner->u_comission += $comission;
		$t_comission += $comission;

		}
		
		if(!empty($winner)){
		    array_push($winners, $winner);
		    unset($winner);
		}
	}
		//level 10
	if(!empty($level9_id) && !in_array($level9_id, $except)){

		$this->db->select('parent_id');
		$this->db->from('users');
		$this->db->where('user_id',$level9_id);
		$this->db->where('type','2');
		$query=$this->db->get();
		$level10_id = $query->row();
	    $level10_id= $level10_id->parent_id;


	    $this->db->select('*');
		$this->db->from('users');
		$this->db->where('referal_id',$level10_id);
		$this->db->where('user_id !=', $user_id);
		$this->db->where('type','2');
		$query=$this->db->get();
		$level_10_boster=$query->num_rows();
		if($level_10_boster >= $standard_users  || $level_10_boster >= $silver_users  || $level_10_boster >= $gold_users || $level_10_boster >= $diamond_users  || $level_10_boster >= $more_than_diamond){

		$comission=$booster_comission * $st_one/$percentage;
		
		$winner = new stdClass();
	    $winner->user_id = $level10_id;
	    $winner->u_comission = 0;
	    
		$winner->u_comission += $comission;
		$t_comission += $comission;

		}
		if ($level_10_boster >= $silver_users || $level_10_boster >= $gold_users || $level_10_boster >= $diamond_users || $level_10_boster > $more_than_diamond) {
		$comission=$booster_comission * $silver_one/$percentage;
        $winner->u_comission += $comission;
		$t_comission += $comission;

		}
		//gold
		if ($level_10_boster >= $gold_users || $level_10_boster >= $diamond_users || $level_10_boster >= $more_than_diamond) {
		$comission=$booster_comission * $gold_one/$percentage;
        $winner->u_comission += $comission;
		$t_comission += $comission;

		}
		//diamond
		if ($level_10_boster >= $diamond_users || $level_10_boster >= $more_than_diamond) {
		$comission=$booster_comission * $diamond_one/$percentage;
        $winner->u_comission += $comission;
		$t_comission += $comission;

		}
		
		if(!empty($winner)){
		    array_push($winners, $winner);
		    unset($winner);
		}
	}


    if($test){
    	print_r('Total_calculated_commission: '.$t_comission);
    	echo "<br>";
    	echo "<table style='border: 1px solid black'>";
    	echo "<thead>";
    	echo "<tr>";
    	echo "<th style='border: 1px solid black'>User ID</th>";
    	echo "<th style='border: 1px solid black'>Commission</th>";
    	echo "</tr>";
    	echo "</thead>";
    	echo "<tbody>";
    	echo "<tr>";
    	foreach($winners as $w){
    	    echo "<tr>";
    	    echo "<td style='border: 1px solid black'>$w->user_id</td>";   
    	    echo "<td style='border: 1px solid black'>$w->u_comission</td>";   
    	echo "</tr>";
    	    
    	}
    	echo "</tr>";
    	echo "</tbody>";
    	echo "</table>";
    	echo "<br>";
    	print_r('Total_available_commission: '.$booster_comission);
    	echo "<br>";
    }

	if(round($t_comission) > round($booster_comission)){
	    $percentage = ($t_comission/$booster_comission)*100;
        
        goto recalculate_booster;
        
		foreach($winners as $winr){
			
			$com_round = round($winr->u_comission, 2);
            if(!$test){
             $this->update_users_for_booster_comission($winr->user_id, $com_round);   
            }
		}
	}
	else{

		foreach ($winners as $key => $winner) {
			$com_round_full = round($winner->u_comission, 2);
			if(!$test){
			 $this->update_users_for_booster_comission($winner->user_id, $com_round_full);   
			}
		}
	}
	
	if($test){
    	echo "------------------------------------------";
    	echo "<br>";
    	print_r('Total_calculated_commission: '.$t_comission);
    	echo "<br>";
    	echo "<table style='border: 1px solid black'>";
    	echo "<thead>";
    	echo "<tr>";
    	echo "<th style='border: 1px solid black'>User ID</th>";
    	echo "<th style='border: 1px solid black'>Commission</th>";
    	echo "</tr>";
    	echo "</thead>";
    	echo "<tbody>";
    	echo "<tr>";
    	foreach($winners as $w){
    	    echo "<tr>";
    	    echo "<td style='border: 1px solid black'>$w->user_id</td>";   
    	    echo "<td style='border: 1px solid black'>$w->u_comission</td>";   
    	echo "</tr>";
    	    
    	}
    	echo "</tr>";
    	echo "</tbody>";
    	echo "</table>";
    	echo "<br>";
    	print_r('Total_available_commission: '.$booster_comission);
    	echo "<br>";
        die();
        return;
}
	$last_user = end($winners);

	return !empty($last_user) ? $last_user->user_id : 0;


	}
	
	public function update_users_for_booster_comission($user_id, $comission){
	    
	    $this->db->trans_start();
	    
	    $this->db->set('booster_com', "booster_com + $comission", FALSE); 
		$this->db->where('user_id', $user_id);
		$this->db->where('type','2');              
        $this->db->update('users');
        
        $this->db->trans_complete();
	}
	
	
	public function insertcart($data){
				$this->db->insert('tbl_cart',$data);
        }
    public function insertcartproductdetail($insert_id,$pid,$price,$qty,$user_id,$ip){
                                //pay PV to direct reffernce ID
                                $PV_for_DRF = $this->db->get_where('products',array('product_code'=>$pid))->result_array();
                                //$PV_for_DRF[0]['basic_vol'];//PV of product
                                //$PV_for_DRF[0]['booster_vol'];//BV of product
                                //DirectRefferID

                                //add to checkout
                                $this->db->set('product_cart_id',$insert_id);
                                $this->db->set('product_id',$pid);
                                $this->db->set('product_price',$price);
                                $this->db->set('quantity',$qty);
                                // $this->db->set('pv',$PV_for_DRF[0]['basic_vol']);
                                $this->db->set('pv', 0);
                                // $this->db->set('bv',$PV_for_DRF[0]['booster_vol']);
                                $this->db->set('bv',0);
                                $this->db->set('user_id',$user_id);
                                $this->db->set('ip',$ip);
                                $this->db->insert('tbl_cart_product');
        }
}
