<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    public function __Construct(){


        parent::__Construct();
        $this->load->model('Home_model');
        $this->load->model('Admin_model');
        $this->load->helper('dump');
    }

    public function playground(){
        $user_id = 129;
        $this->db->select('product_id');
        $this->db->from('tbl_cart_product');
        $this->db->where('user_id', $user_id);
        $result = $this->db->get()->result_array();
    
        var_dump(array_column($result, 'product_id'));
        die();
        return;
    }
    
    public function basic_test($user_id, $product_id){
        // $this->Home_model->get_upline_users(11, 1212);
        // $this->Home_model->insert_boster(20, 1234);
        // echo 'Current PHP version: ' . phpversion();
        // die();
        // return;
        
        $this->Home_model->get_upline_users($user_id, $product_id, true);
    }
    
    public function test_parent_id($ref){
        
        $chk = $this->Home_model->chk_referal_id($ref);
        var_dump($chk);
    }
    
    public function booster_test($user_id, $product_id){
        
        $this->Home_model->insert_boster($user_id, $product_id, true);
    }
    
    public function commissioned_users_count($id){
        $ss = $this->Admin_model->get_upline_data($id);
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
    public function dashboard(){
        

        $data['title'] = 'Home';
        $data['products']=$this->Home_model->get_products_data();
        $data['sliders'] = $this->Home_model->get_slider_data();

        $this->load->view('v2/layout/head', $data);
        $this->load->view('v2/layout/header');
        $this->load->view('v2/components/dashboard/dashboard', $data);
        $this->load->view('v2/layout/footer', $data);
    }

    public function Product_details1($id)
    {
        $data['title'] = 'Product detail';
        $data['product']=$this->Home_model->get_product_detail($id);
        $data['sliders'] = $this->Home_model->get_slider_data();
        
        $size_ids = isset($data['product']->size_id) ? explode(', ', $data['product']->size_id) : 0;
        $color_ids = isset($data['product']->color_id) ? explode(', ', $data['product']->color_id) : 0;
        $data['colors'] = $this->Home_model->get_colors($color_ids);
        $data['sizes']= $this->Home_model->get_sizes($size_ids);

        $this->load->view('v2/layout/head', $data);
        $this->load->view('v2/layout/header');
        $this->load->view('v2/components/product_detail/product_detail', $data);
        $this->load->view('v2/layout/footer', $data);
    }

        public function index(){
            
            redirect('/index.php/Home/dashboard');
            $data['products']=$this->Home_model->get_products_data();
            //dump($data);
            $this->load->view('Header/header');
            $this->load->view('Top_bar/top_bar');
            $this->load->view('Navbar/navbar');
            $this->load->view('Slider/slider');
            $this->load->view('Body/body',$data);
            $this->load->view('Body_slider/body_slider');
            $this->load->view('Banner/banner');
            $this->load->view('Footer/footer');

        }
    public function thankYou(){

        $data['title'] = 'Thank you';
        $this->load->view('v2/layout/head', $data);
        $this->load->view('v2/layout/header');
        $this->load->view('v2/components/confirm/thank_you');
        $this->load->view('v2/layout/footer');
    }

        public function Product_details($id){

            $data['products']=$this->Home_model->get_product_detail($id);
            $this->load->view('Header/header');
            $this->load->view('Top_bar/top_bar');
            $this->load->view('Navbar/navbar');
            $this->load->view('Products/products_details',$data);
            $this->load->view('Footer/footer');
        }
        //Add to cart function remains the same in v2 functionality
        public function Add_cart(){

            $data = array(
                'id' => $this->input->post('product_id'),
                'product_code'=> $this->input->post('product_code'),
                'name' => $this->input->post('product_name') ,
                'price' => $this->input->post('product_price') ,
                'qty' =>$this->input->post('qty'),
                'img_path'=> !empty($this->input->post('img_path')) ? $this->input->post('img_path') : '',
                'options' => [
                    'size_id' => $this->input->post('size_id'),
                    'color' => $this->input->post('color_id')
                ]
            );
            $this->cart->insert($data);
            redirect('/index.php/Home/Cart1');

        }

    public function Cart1(){

        $data['cart_data'] = $this->cart->contents();
        $data['title'] = 'Cart';
//        echo "<pre>";
//        var_dump($data['cart_data']);
//        echo "</pre>";
//        $data['title'] = 'Cart';
        //js file attached to cart module
        $data['js_file_name'] = 'cart.js';
        $this->load->view('v2/layout/head', $data);
        $this->load->view('v2/layout/header');
        $this->load->view('v2/components/cart/cart', $data);
        $this->load->view('v2/layout/footer', $data);

    }
    //AJAX methods
    public function getCart()
    {
        $cart_data = $this->cart->contents();
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($cart_data));
    }
    public function updateCart(){
        if(isset($_POST)){

            $data = array(
                'rowid'     => $_POST['rowid'],
                'qty'       => $_POST['qty']
            );

            $this->cart->update($data);

            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(true));
        }else{
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(false));
        }
    }
    //End AJAX methods
    public function Cart(){
        $this->load->view('Header/header');
        $this->load->view('Top_bar/top_bar');
        $this->load->view('Navbar/navbar');
        $this->load->view('Products/cart');
        $this->load->view('Footer/footer');
    }
    public function removeCartItem($rowId)
    {
        $status = $this->cart->remove($rowId);

        redirect('/index.php/Home/Cart1');

    }
       public function update_cart(){
            // Recieve post values,calcute them and update
            $cart_info =  $_POST['cart'] ;
            foreach( $cart_info as $id => $cart)
            {
                $rowid = $cart['rowid'];
                $price = $cart['price'];
                $amount = $price * $cart['qty'];
                $qty = $cart['qty'];

                    $data = array(
                            'rowid'   => $rowid,
                            'price'   => $price,
                            'amount' =>  $amount,
                            'qty'     => $qty
                    );

                    $this->cart->update($data);
            }
            redirect('Home/cart');
    }
    public function removeCart(){
        if(isset($_POST)){
            $rowid = $_POST['rowid'];
            if($rowid == 'all'){
                $this->cart->destroy();

                $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode(true));
            }else{
                $this->cart->remove($rowid);

                $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode(true));
            }
        }else{
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(false));
        }
    }
    public  function remove_cart($rowid) {

        if ($rowid === "all"){
            $this->cart->destroy();

        }else{
            $data = array(
                'rowid'   => $rowid,
                'qty'     => 0
            );
            $this->cart->update($data);
        }
        redirect('index.php/Home/cart');
    }
    public function confirmOrder($id){
        $data['title'] = 'Confirm order';
        $data['cart_data'] = $this->cart->contents();
        $data['user_id'] = $id;
        $this->load->view('v2/layout/head', $data);
        $this->load->view('v2/layout/header');
        $this->load->view('v2/components/confirm/confirm_order',$data);
        $this->load->view('v2/layout/footer');

    }
    public function testcheckout(){
        $data['user_id']=1;
            $this->load->view('Header/header');
            $this->load->view('Top_bar/top_bar');
            $this->load->view('Navbar/navbar');
            $this->load->view('Products/checkout',$data);
            $this->load->view('Footer/footer');
    }
        public function Register(){

            $this->load->view('Header/header');
            $this->load->view('Top_bar/top_bar');
            $this->load->view('Navbar/navbar');
            $this->load->view('Register/register');

            $this->load->view('Footer/footer');

        }
    public function Register1(){
        $data['title'] = "Register Page";
        $data['user_id']=$this->Home_model->get_user_id();
        $this->load->view('v2/layout/head', $data);
        $this->load->view('v2/layout/header');
        $this->load->view('v2/components/registration/register');
        $this->load->view('v2/layout/footer', $data);
//
    }
    public function registerFormValidation()
    {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('city', 'City', 'required');

        $this->form_validation->set_rules('mobile', 'Email', 'required');
        $this->form_validation->set_rules('province', 'City', 'required');

        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('confirmed_password', 'Confirm Password', 'required|matches[password]');

        if($this->form_validation->run() == FALSE)
        {
            $this->Register1();
        }
        $data = array(
            'parent_id'         => $this->input->post('sponsor_id'),
            'username'          => $this->input->post('username'),
            'user_id'           => $this->Home_model->get_user_id() + 1,
            'email'             => $this->input->post('email') ,
            'city'              => $this->input->post('city') ,
            'mobile'            => $this->input->post('mobile') ,
//          'province'          => $this->input->post('province') ,
            'password'          => $this->input->post('password'),
            'type'              =>'2'
        );
        $insert = $this->Home_model->insertData($data);

        redirect('/index.php/Order/Confirm_order');
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

        public function register_validate(){

        $this->form_validation->set_rules('full_name', 'Username', 'required');
        // $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('city', 'City', 'required');

        $this->form_validation->set_rules('mobile', 'Email', 'required');
        // $this->form_validation->set_rules('provience', 'City', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|matches[password]');
        $this->form_validation->set_rules('referal_id', 'Sponser ID', 'callback_referal_check');

        if($this->form_validation->run() == FALSE)
        {
            $this->Register1();
        
        }else{

            

            $referal_id = $this->input->post('referal_id');
            

        $email = !empty($this->input->post('email')) ? $this->input->post('email') : '';
        $user_id = $this->Home_model->get_user_id();

        $user_id = $user_id + 1;
        
        $referal_id = empty($referal_id) ? 
                        $this->Home_model->get_default_parent_id() : 
                        $referal_id;


        $data = [
                'user_id'   => $user_id,
                'parent_id' => 0,
                'full_name' => $this->input->post('full_name'),
                'mobile'    => $this->input->post('mobile'),
                'email'     => $email,
                'password'  => $this->input->post('password'),
                'referal_id'=> $referal_id,
                'type'      => '0',
            ];

        //Type: 1 => admin, 2 => customer, 0 => deactive customer

        $this->Home_model->insertData($data);

        redirect('index.php/Home/confirmOrder/'.$user_id);


        // $parent_id=$this->Home_model->get_parent_id();
        // $get_user_parent_id=$this->Home_model->get_user_parent_id($parent_id);
        // //print_r($get_user_parent_id);
        // $count_parent_id=$this->Home_model->get_count_parent_id($parent_id);
        // $referal_id=$this->input->post('referal_id');
        // $get_referal_id=$this->Home_model->get_referal_id($referal_id);


        // $user_id=$this->Home_model->get_user_id();
        // if($get_user_parent_id=='0' || $get_user_parent_id <'2' && $referal_id==''){

        //      $user_id=$user_id + 1;
        //       $data = array(
        //         'user_id'=>$user_id,
        //         'parent_id'=>$parent_id,
        //         'full_name'=>$this->input->post('full_name') ,
        //         'mobile'=>$this->input->post('mobile') ,
        //         'email'=> $email ,
        //         'password'=>$this->input->post('password'),
        //         'referal_id'=>$parent_id,
        //         'type'=>'2'

        //         );
        //         $this->Home_model->insertData($data);
        //         // echo "place 1: ";
        //         // var_dump($user_id);
        //         // echo "<br>";
        //         // die();
        //         // return;
        //         redirect('index.php/Home/confirmOrder/'.$user_id);
        // }
        // elseif($count_parent_id=='2' && $referal_id==''){
        // $select_min_parent_id=$this->Home_model->select_min_parent_id($parent_id);
        // $par_id=$select_min_parent_id[0];
        // //print_r($select_min_parent_id);die("par");
        //     $user_id=$user_id + 1;
        //       $data = array(
        //         'user_id'=>$user_id,
        //         'parent_id'=>$par_id,
        //         'full_name'=>$this->input->post('full_name') ,
        //         'mobile'=>$this->input->post('mobile') ,
        //         'email'=> $email ,
        //         'password'=>$this->input->post('password'),
        //         'referal_id'=>$parent_id,
        //         'type'=>'2'

        //         );
        //         // echo "place 2: ";
        //         // var_dump($user_id);
        //         // echo "<br>";
        //         // die();
        //         // return;
        //         $this->Home_model->insertData($data);
        //         redirect('index.php/Home/confirmOrder/'.$user_id);
        // }
        // elseif($get_referal_id=='0' || $get_referal_id <'2'){
        // //print_r($par_id);die("pk");
        //     $user_id=$user_id + 1;
        //     //print_r($user_id);die();
        //       $data = array(
        //         'user_id'=>$user_id,
        //         'parent_id'=>$referal_id,
        //         'full_name'=>$this->input->post('full_name') ,
        //         'mobile'=>$this->input->post('mobile') ,
        //         'email'=> $email ,
        //         'password'=>$this->input->post('password'),
        //         'referal_id'=>$this->input->post('referal_id'),
        //         'type'=>'2'

        //         );
                
        //         // echo "place 3: ";
        //         // var_dump($user_id);
        //         // echo "<br>";
        //         // die();
        //         // return;
        //         $this->Home_model->insertData($data);
        //         redirect('index.php/Home/confirmOrder/'.$user_id);
        // }
        // else{
        //    $ref_id = $this->Home_model->chk_referal_id($referal_id);
        //     // echo "place 4: ";
        //     //     var_dump($chk_referal_id);
        //     //     echo "<br>";
        //     //     die();
        //     //     return;
        // // $ref_id=$chk_referal_id[0];
        // //print_r($ref_id);die("uk");
        //     $user_id=$user_id + 1;
        //       $data = array(
        //         'user_id'=>$user_id,
        //         'parent_id'=>$ref_id,
        //         'full_name'=>$this->input->post('full_name') ,
        //         'mobile'=>$this->input->post('mobile') ,
        //         'email'=> $email,
        //         'password'=>$this->input->post('password'),
        //         'referal_id'=>$this->input->post('referal_id'),
        //         'type'=>'2'

        //         );
                
        //         // echo "place 4: ";
        //         // var_dump($user_id);
        //         // echo "<br>";
        //         // die();
        //         // return;
        //         $this->Home_model->insertData($data);
        //         redirect('index.php/Home/confirmOrder/'.$user_id);
        // }
        }
        }
    public function Confirm_order(){

        $user_id=$this->input->post('user_id');
        $c_date=date('Y-m-d');
        $CartConts = $this->cart->contents();

        if(!empty($CartConts))
        {
            $total = 0;
            $qu=0;

            $total_cart=$this->cart->total_items();
            $data = [
                'userid' =>$user_id ,
                'created_date'=>$c_date,
                'total_cart'=>$total_cart
            ];
            $this->Home_model->insertcart($data);
            $insert_id = $this->db->insert_id(); //this will return tbl_cart id

            foreach ($this->cart->contents() as $items){
                
                $ip = $_SERVER['REMOTE_ADDR'];
                $total = $total + (($items['qty']) * ($items['price']));
                $qu = $qu + $items['qty'];
                $this
                    ->Home_model
                    ->insertcartproductdetail($insert_id,$items['id'],$items['qty'],$user_id,$ip);
                
            }
            $this->cart->destroy();
        }

        redirect('index.php/Home/thankYou');
    }
        public function Logout(){
            
            $this->session->unset_userdata('logged_in');
            $this->session->sess_destroy();
            redirect('index.php/Home/Login1');
        }
        public function Login(){
            $this->load->view('Header/header');
            $this->load->view('Top_bar/top_bar');
            $this->load->view('Navbar/navbar');
            $this->load->view('Login/login');
            $this->load->view('Footer/footer');
        }
    public function Login1(){

        $data['title'] = 'Login';
        $this->load->view('v2/layout/head', $data);
        $this->load->view('v2/layout/header');
        $this->load->view('v2/components/registration/login');
        $this->load->view('v2/layout/footer');

    }
        public function login_validate(){
        $username=$this->input->post('username');
        $password=$this->input->post('password');
        $result=$this->Home_model->login($username,$password);

         //print_r($result->mobile); die();
        if($result){
                       $sess_array = array(
                        'id'   =>$result->id,
                        'user_id' => $result->user_id,
                        'full_name'=>$result->full_name,
                        'username'=>$result->username,
                        'mobile'  => $result->mobile,
                        'email'   => $result->email,
                        'password'=> $result->password,
                        'loggedin'=> TRUE
                       );

                      $this->session->set_userdata('logged_in', $sess_array);

            if($result->type==1){
                $data['username,email']=$sess_array;

                 redirect ('index.php/Admin',$data);
            }

            elseif($result->type==2){
                $data['username,full_name,email,user_id,mobile,cnic,city,password']=$sess_array;

                 //redirect ('Users',$data);
                redirect ('index.php/Users',$data);
            }
            else{
                $this->session->set_flashdata('account_error', "Your account is not approve");
            redirect('index.php/Home/Login1');
            }
        }
        else{
            $this->session->set_flashdata('error', "Invalid User name and password");
            redirect('index.php/Home/Login1');
        }

    }
    public function about(){

        $data['title'] = 'About';        

        $this->load->view('v2/layout/head', $data);
        $this->load->view('v2/layout/header');
        $this->load->view('v2/components/about/about_us');
        $this->load->view('v2/layout/footer');
    }
    public function contact(){

        $data['title'] = 'Contact';
        $data['show_google_maps'] = true;

        $this->load->view('v2/layout/head', $data);
        $this->load->view('v2/layout/header');
        $this->load->view('v2/components/contact/contact_us');
        $this->load->view('v2/layout/footer');
    }



}
