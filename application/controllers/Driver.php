<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Driver extends CI_Controller {
	public function __construct(){

		parent::__construct();

		$this->load->database();
		$this->load->library('session');

		/*LOADING ALL THE MODELS HERE*/
		$this->load->model('Crud_model',     'crud_model');
		$this->load->model('User_model',     'user_model');
		$this->load->model('Settings_model', 'settings_model');
		$this->load->model('Payment_model',  'payment_model');
		$this->load->model('Email_model',    'email_model');
		$this->load->model('Addon_model',    'addon_model');
		$this->load->model('Frontend_model', 'frontend_model');

		/*cache control*/
		$this->output->set_header("Expires: Tue, 01 Jan 2000 00:00:00 GMT");
		$this->output->set_header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
		$this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
		$this->output->set_header("Cache-Control: post-check=0, pre-check=0", false);
		$this->output->set_header("Pragma: no-cache");

		/*SET DEFAULT TIMEZONE*/
		timezone();

		// CHECK WHETHER Driver IS LOGGED IN
		if($this->session->userdata('driver_login') != 1){
			redirect(site_url('login'), 'refresh');
		}
	}

	// INDEX FUNCTION
	public function index(){
		redirect(site_url('driver/dashboard'), 'refresh');
	}

	//DASHBOARD
	public function dashboard(){
		$page_data['page_title'] = 'Dashboard';
		$page_data['folder_name'] = 'dashboard';
		$this->load->view('backend/index', $page_data);
	}
	//Routes Section Start
	public function routes($param1 = '', $param2 = ''){

		if($param1 == 'create'){
			$response = $this->crud_model->routes_add();
			echo $response;
		}

		if($param1 == 'update_route'){
			$response = $this->crud_model->routes_update($param2);
			echo $response;
		}

		if($param1 == 'delete'){
			$response = $this->crud_model->routes_delete($param2);
			echo $response;
		}
		
		if($param1 == 'list'){
			$page_data['page_form']=$param1;
			$this->load->view('backend/driver/routes/list', $page_data);
		}

		if(empty($param1)){
			$page_data['folder_name'] = 'routes';
			$page_data['page_title'] = 'Routes';
            $page_data['page_form']=$param1;
			$this->load->view('backend/index', $page_data);
		}
	}

  	//Routes Section End
	//Vehicle Section Start
	public function vehicle($param1 = '', $param2 = ''){

		if($param1 == 'create'){
			$response = $this->crud_model->vehicle_add();
			echo $response;
		}

		if($param1 == 'update_vehicle'){
			$response = $this->crud_model->vehicle_update($param2);
			echo $response;
		}

		if($param1 == 'delete'){
			$response = $this->crud_model->vehicle_delete($param2);
			echo $response;
		}
		
		if($param1 == 'list'){
			$page_data['page_form']=$param1;
			$this->load->view('backend/driver/vehicle/list', $page_data);
		}

		if(empty($param1)){
			$page_data['folder_name'] = 'vehicle';
			$page_data['page_title'] = 'Vehicle';
            $page_data['page_form']=$param1;
			$this->load->view('backend/index', $page_data);
		}
	}

  	//Vehicle Section End
	 //AssignVehicle Section Start
	public function assignvehicle($param1 = '', $param2 = ''){

		if($param1 == 'create'){
			$response = $this->crud_model->assign_vehicle_add();
			echo $response;
		}

		if($param1 == 'update_assign_vehicle'){
			$response = $this->crud_model->assign_vehicle_update($param2);
			echo $response;
		}

		if($param1 == 'delete'){
			$response = $this->crud_model->assign_vehicle_delete($param2);
			echo $response;
		}
		
		if($param1 == 'list'){
			$page_data['page_form']=$param1;
			$this->load->view('backend/driver/assignvehicle/list', $page_data);
		}

		if(empty($param1)){
			$page_data['folder_name'] = 'assignvehicle';
			$page_data['page_title'] = 'Assign Vehicle';
            $page_data['page_form']=$param1;
			$this->load->view('backend/index', $page_data);
		}
	}

  	//AssignVehicle Section End

     //START Driver section
	public function driver($param1 = '', $param2 = ''){

		if($param1 == 'create'){
			$response = $this->user_model->add_driver();
			echo $response;
		}

		if($param1 == 'update'){
			$response = $this->user_model->driver_update($param2);
			echo $response;
		}

		if($param1 == 'delete'){
			$response = $this->user_model->driver_delete($param2);
			echo $response;
		}

		// show data from database
		if ($param1 == 'list') {
			$this->load->view('backend/driver/driver/list');
		}

		if(empty($param1)){
			$page_data['folder_name'] = 'driver';
			$page_data['page_title'] = 'driver';
			$this->load->view('backend/index', $page_data);
		}
	}
	//END Driver section

	
  	
	
}
