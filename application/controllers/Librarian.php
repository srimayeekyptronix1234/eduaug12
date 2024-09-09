<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
*  @author   : Creativeitem
*  date      : November, 2019
*  Ekattor School Management System With Addons
*  http://codecanyon.net/user/Creativeitem
*  http://support.creativeitem.com
*/

class Librarian extends CI_Controller {
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
        $this->load->library('pdf');

		/*SET DEFAULT TIMEZONE*/
		timezone();
		
		// CHECK WHETHER LIBRARIAN IS LOGGED IN
		if($this->session->userdata('librarian_login') != 1){
			redirect(site_url('login'), 'refresh');
		}
	}

	// INDEX FUNCTION
	public function index(){
		redirect(site_url('librarian/dashboard'), 'refresh');
	}

	//DASHBOARD
	public function dashboard(){
		$page_data['page_title'] = 'Dashboard';
		$page_data['folder_name'] = 'dashboard';
		$this->load->view('backend/index', $page_data);
	}

	// BACKOFFICE MANAGEMENT STARTS
	//BOOK LIST MANAGER
	public function book($param1 = "", $param2 = "") {
		// adding book
		if ($param1 == 'create') {
			$response = $this->crud_model->create_book();
			echo $response;
		}

		// update book
		if ($param1 == 'update') {
			$response = $this->crud_model->update_book($param2);
			echo $response;
		}

		// deleting book
		if ($param1 == 'delete') {
			$response = $this->crud_model->delete_book($param2);
			echo $response;
		}
		// showing the list of book
		if ($param1 == 'list') {
			$this->load->view('backend/librarian/book/list');
		}

		// showing the index file
		if(empty($param1)){
			$page_data['folder_name'] = 'book';
			$page_data['page_title']  = 'books';
			$this->load->view('backend/index', $page_data);
		}
	}

	//BOOK ISSUE LIST MANAGER
	public function book_issue($param1 = "", $param2 = "") {
		// adding book
		if ($param1 == 'create') {
			$response = $this->crud_model->create_book_issue();
			echo $response;
		}

		// update book
		if ($param1 == 'update') {
			$response = $this->crud_model->update_book_issue($param2);
			echo $response;
		}

		// Returning a book
		if ($param1 == 'return') {
			$response = $this->crud_model->return_issued_book($param2);
			echo $response;
		}

		// deleting book
		if ($param1 == 'delete') {
			$response = $this->crud_model->delete_book_issue($param2);
			echo $response;
		}
		// showing the list of book
		if ($param1 == 'list') {
			$date = explode('-', $this->input->get('date'));
			$page_data['date_from'] = strtotime($date[0].' 00:00:00');
			$page_data['date_to']   = strtotime($date[1].' 23:59:59');
			$this->load->view('backend/librarian/book_issue/list', $page_data);
		}

		// showing the index file
		if(empty($param1)){
			$page_data['folder_name'] = 'book_issue';
			$page_data['page_title']  = 'book_issue';
			$page_data['date_from'] = strtotime(date('d-M-Y', strtotime(' -30 day')).' 00:00:00');
			$page_data['date_to']   = strtotime(date('d-M-Y').' 23:59:59');
			$this->load->view('backend/index', $page_data);
		}
	}
	// BACKOFFICE MANAGEMENT ENDS

	//STUDENT LIST STARTS
	public function student($param1 = "", $param2 = "") {
		// Get the list of student. Here param2 defines classId
		if ($param1 == 'dropdown') {
			$page_data['enrolments'] = $this->user_model->get_student_details_by_id('class', $param2);
			$this->load->view('backend/superadmin/student/dropdown', $page_data);
		}
	}
	//STUDENT LIST ENDS

	//MANAGE PROFILE STARTS
	public function profile($param1 = "", $param2 = "") {
		if ($param1 == 'update_profile') {
			$response = $this->user_model->update_profile();
			echo $response;
		}
		if ($param1 == 'update_password') {
			$response = $this->user_model->update_password();
			echo $response;
		}

		// showing the Smtp Settings file
		if(empty($param1)){
			$page_data['folder_name'] = 'profile';
			$page_data['page_title']  = 'manage_profile';
			$this->load->view('backend/index', $page_data);
		}
	}
	//MANAGE PROFILE ENDS
	//Staff Salary Start
	public function staff_salary() {
		$page_data['folder_name'] = 'staff_salary';
		$page_data['page_title']  = 'staff_salary';
		$this->load->view('backend/index', $page_data);
	}
   //Staff Salary End
    //EXPORT STAFF SALARY
    public function payslip_download($param1 = "",$user_id='') {
    //RETURN EXPORT URL
    	if ($param1 == 'url') {
    		$type = htmlspecialchars($this->input->post('type'));
    		$user_id = htmlspecialchars($this->input->post('user_id'));
    		echo route('payslip_download/'.$type.'/'.$user_id);
    	}
    // EXPORT AS PDF
    	if($param1 == 'pdf' || $param1 == 'print') {
    		$page_data['action']   = $param1;
    		$page_data['user_id']=$user_id;
    		$html = $this->load->view('backend/librarian/staff_salary/download_payslip',$page_data, true);
    		$this->pdf->loadHtml($html);
    		$this->pdf->set_paper("a4", "landscape" );
    		$this->pdf->render();
      // FILE DOWNLOADING CODES
    		$user_details=$this->db->get_where('users',['id'=>$user_id])->row_array();

    		$fileName = $user_details['role'].'-Salary - '.$user_details['name'].'.pdf';
    		if ($param1 == 'pdf') {
    			$this->pdf->stream($fileName, array("Attachment" => 1));
    		}else{
    			$this->pdf->stream($fileName, array("Attachment" => 0));
    		}
    	}

  }
  /*FUNCTION FOR DOWNLOADING A FILE*/
  function download_file($path, $name)
  {
    // make sure it's a file before doing anything!
    if(is_file($path))
    {
      // required for IE
      if(ini_get('zlib.output_compression')) { ini_set('zlib.output_compression', 'Off'); }

      // get the file mime type using the file extension
      $this->load->helper('file');

      $mime = get_mime_by_extension($path);

      // Build the headers to push out the file properly.
      header('Pragma: public');     // required
      header('Expires: 0');         // no cache
      header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
      header('Last-Modified: '.gmdate ('D, d M Y H:i:s', filemtime ($path)).' GMT');
      header('Cache-Control: private',false);
      header('Content-Type: '.$mime);  // Add the mime type from Code igniter.
      header('Content-Disposition: attachment; filename="'.basename($name).'"');  // Add the file name
      header('Content-Transfer-Encoding: binary');
      header('Content-Length: '.filesize($path)); // provide file size
      header('Connection: close');
      readfile($path); // push it out
      exit();
    }
  }
  //STAFF DAILY ATTENDANCE section
	public function staff_attendance($param1 = '', $param2 = '', $param3 = ''){

		
		if($param1 == 'filter'){
			$date = '01 '.$this->input->post('month').' '.$this->input->post('year');
			$page_data['attendance_date'] = strtotime($date);
			$page_data['month'] = $this->input->post('month');
			$page_data['year'] = $this->input->post('year');
		    $page_data['role'] = $this->input->post('role');
			$this->load->view('backend/librarian/staff_attendance/list', $page_data);
		}

		
		if(empty($param1)){
			$page_data['folder_name'] = 'staff_attendance';
			$page_data['page_title'] = 'attendance';
			$this->load->view('backend/index', $page_data);
		}
	}
	//STAFF DAILY ATTENDANCE section END
    

}
