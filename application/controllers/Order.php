<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {
    public function __Construct(){


        parent::__Construct();
//        $this->load->model('Order_model');
//        $this->load->helper('dump');
    }
 	public function Confirm_order()
	{
		$data['title'] = "Confirm Order";
		$this->load->view('v2/layout/head', $data);
		$this->load->view('v2/layout/header');
		$this->load->view('v2/components/Order/confirmOrder');
	}

}
