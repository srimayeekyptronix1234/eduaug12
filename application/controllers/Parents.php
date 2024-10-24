<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
*  @author   : Creativeitem
*  date      : November, 2019
*  Ekattor School Management System With Addons
*  http://codecanyon.net/user/Creativeitem
*  http://support.creativeitem.com
*/

class Parents extends CI_Controller {

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

		if($this->session->userdata('parent_login') != 1){
			redirect(site_url('login'), 'refresh');
		}

	}
	//dashboard
	public function index(){
		redirect(route('dashboard'), 'refresh');
	}

	public function dashboard(){

		$page_data['page_title'] = 'Dashboard';
		$page_data['folder_name'] = 'dashboard';
		$this->load->view('backend/index', $page_data);
	}

	public function class_wise_subject($class_id) {

		// PROVIDE A LIST OF SUBJECT ACCORDING TO CLASS ID
		$page_data['class_id'] = $class_id;
		$this->load->view('backend/parent/subject/dropdown', $page_data);
	}
	//END SUBJECT section


	//START SYLLABUS section
	public function syllabus($param1 = '', $param2 = '', $param3 = ''){

		if($param1 == 'list'){
			$page_data['class_id'] = $param2;
			$page_data['section_id'] = $param3;
			$this->load->view('backend/parent/syllabus/list', $page_data);
		}

		if(empty($param1)){
			$page_data['folder_name'] = 'syllabus';
			$page_data['page_title'] = 'syllabus';
			$this->load->view('backend/index', $page_data);
		}
	}
	//END SYLLABUS section


	//START TEACHER section
	public function teacher($param1 = '', $param2 = '', $param3 = ''){
		$page_data['folder_name'] = 'teacher';
		$page_data['page_title'] = 'techers';
		$this->load->view('backend/index', $page_data);
	}
	//END TEACHER section

	//START CLASS ROUTINE section
	public function routine($param1 = '', $param2 = '', $param3 = '', $param4 = ''){

		if($param1 == 'filter'){
			$page_data['class_id'] = $param2;
			$page_data['section_id'] = $param3;
			$this->load->view('backend/parent/routine/list', $page_data);
		}

		if(empty($param1)){
			$page_data['folder_name'] = 'routine';
			$page_data['page_title'] = 'routine';
			$this->load->view('backend/index', $page_data);
		}
	}
	//END CLASS ROUTINE section


	//START DAILY ATTENDANCE section
	public function attendance($param1 = '', $param2 = '', $param3 = ''){

		if($param1 == 'filter'){
			$date = '01 '.$this->input->post('month').' '.$this->input->post('year');
			$page_data['attendance_date'] = strtotime($date);
			$page_data['class_id'] = htmlspecialchars($this->input->post('class_id'));
			$page_data['section_id'] = htmlspecialchars($this->input->post('section_id'));
			$page_data['month'] = htmlspecialchars($this->input->post('month'));
			$page_data['year'] = htmlspecialchars($this->input->post('year'));
			$page_data['student_id'] = htmlspecialchars($this->input->post('student_id'));
			$this->load->view('backend/parent/attendance/list', $page_data);
		}

		if(empty($param1)){
			$page_data['folder_name'] = 'attendance';
			$page_data['page_title'] = 'attendance';
			$this->load->view('backend/index', $page_data);
		}
	}
	//END DAILY ATTENDANCE section


	//START EVENT CALENDAR section
	public function event_calendar($param1 = '', $param2 = ''){
		if($param1 == 'all_events'){
			echo $this->crud_model->all_events();
		}

		if ($param1 == 'list') {
			$this->load->view('backend/parent/event_calendar/list');
		}

		if(empty($param1)){
			$page_data['folder_name'] = 'event_calendar';
			$page_data['page_title'] = 'event_calendar';
			$this->load->view('backend/index', $page_data);
		}
	}
	//END EVENT CALENDAR section

	// This function is needed for Ajax calls only
	public function get_student_details_by_id($look_up_value = "", $student_id = "") {
		$student_details = $this->user_model->get_student_details_by_id('student', $student_id);
		echo $student_details[$look_up_value];
	}
	//END STUDENT ADN ADMISSION section


	//START EXAM section
	public function exam($param1 = '', $param2 = ''){
		if ($param1 == 'list') {
			$this->load->view('backend/parent/exam/list');
		}

		if(empty($param1)){
			$page_data['folder_name'] = 'exam';
			$page_data['page_title'] = 'exam';
			$this->load->view('backend/index', $page_data);
		}
	}
	//END EXAM section

	//START MARKS section
	public function mark($param1 = '', $param2 = ''){

		if($param1 == 'list'){
			$page_data['class_id'] = htmlspecialchars($this->input->post('class_id'));
			$page_data['section_id'] = htmlspecialchars($this->input->post('section_id'));
			$page_data['subject_id'] = htmlspecialchars($this->input->post('subject'));
			$page_data['exam_id'] = htmlspecialchars($this->input->post('exam'));
			$page_data['student_id'] = htmlspecialchars($this->input->post('student_id'));
			//$this->crud_model->mark_insert($page_data['class_id'], $page_data['section_id'], $page_data['subject_id'], $page_data['exam_id']);
			$this->load->view('backend/parent/mark/list', $page_data);
		}

		if(empty($param1)){
			$page_data['folder_name'] = 'mark';
			$page_data['page_title'] = 'marks';
			$this->load->view('backend/index', $page_data);
		}
	}
	//END MARKS sesction

	// GRADE SECTION STARTS
	public function grade($param1 = "", $param2 = "") {
		$page_data['folder_name'] = 'grade';
		$page_data['page_title'] = 'grades';
		$this->load->view('backend/index', $page_data);
	}
	// GRADE SECTION ENDS

	// ACCOUNTING SECTION STARTS
	public function invoice($param1 = "", $param2 = "") {

		// Get the list of student. Here param2 defines classId
		if ($param1 == 'student') {
			$page_data['enrolments'] = $this->user_model->get_student_details_by_id('class', $param2);
			$this->load->view('backend/parent/student/dropdown', $page_data);
		}

		// showing the list of invoices
		if ($param1 == 'list') {
			$date = explode('-', $this->input->get('date'));
			$page_data['date_from'] = strtotime($date[0].' 00:00:00');
			$page_data['date_to']   = strtotime($date[1].' 23:59:59');
			$this->load->view('backend/parent/invoice/list', $page_data);
		}

		// showing the list of invoices
		if ($param1 == 'invoice') {
			$page_data['invoice_id'] = $param2;
			$page_data['folder_name'] = 'invoice';
			$page_data['page_name'] = 'invoice';
			$page_data['page_title']  = 'invoice';
			$this->load->view('backend/index', $page_data);
		}
		// showing the index file
		if(empty($param1)){
			$page_data['folder_name'] = 'invoice';
			$page_data['page_title']  = 'invoice';
			$this->load->view('backend/index', $page_data);
		}
	}

	// PAYPAL CHECKOUT
	public function paypal_checkout() {
		$invoice_id = htmlspecialchars($this->input->post('invoice_id'));
		$invoice_details = $this->crud_model->get_invoice_by_id($invoice_id);

		$page_data['invoice_id']   = $invoice_id;
		$page_data['user_details']    = $this->user_model->get_student_details_by_id('student', $invoice_details['student_id']);
		$page_data['amount_to_pay']   = $invoice_details['total_amount'] - $invoice_details['paid_amount'];
		$page_data['folder_name'] = 'paypal';
		$page_data['page_title']  = 'paypal_checkout';
		$this->load->view('backend/payment_gateway/paypal_checkout', $page_data);
	}

	// STRIPE CHECKOUT
	public function stripe_checkout() {
		$invoice_id = htmlspecialchars($this->input->post('invoice_id'));
		$invoice_details = $this->crud_model->get_invoice_by_id($invoice_id);

		$page_data['invoice_id']   = $invoice_id;
		$page_data['user_details']    = $this->user_model->get_student_details_by_id('student', $invoice_details['student_id']);
		$page_data['amount_to_pay']   = $invoice_details['total_amount'] - $invoice_details['paid_amount'];
		$page_data['folder_name'] = 'paypal';
		$page_data['page_title']  = 'paypal_checkout';
		$this->load->view('backend/payment_gateway/stripe_checkout', $page_data);
	}

	public function payment_success($payment_method = "", $invoice_id = "", $amount_paid = "", $reference = "") {
		if ($payment_method == 'stripe') {
			$stripe = json_decode(get_payment_settings('stripe_settings'));
			$token_id = $this->input->post('stripeToken');
			$stripe_test_mode = $stripe[0]->stripe_mode;
            if ($stripe_test_mode == 'on') {
                $public_key = $stripe[0]->stripe_test_public_key;
                $secret_key = $stripe[0]->stripe_test_secret_key;
            } else {
                $public_key = $stripe[0]->stripe_live_public_key;
                $secret_key = $stripe[0]->stripe_live_secret_key;
            }
            $payment_status = $this->payment_model->stripe_payment($token_id, $invoice_id, $amount_paid, $secret_key);
		}elseif($payment_method = 'paystack'){
			$this->load->model('addons/paystack_model');
			$payment_status = $this->paystack_model->check_payment($reference);
		}

		$data['payment_method'] = $payment_method;
		$data['invoice_id'] = $invoice_id;
		$data['amount_paid'] = $amount_paid;
		
		if($payment_status == true && $payment_method == 'stripe'){
			$this->crud_model->payment_success($data);
		}elseif($payment_method == 'paystack'){
			$this->crud_model->payment_success($data);
		}elseif($payment_method == 'paypal'){
			$this->crud_model->payment_success($data);
		}

		redirect(route('invoice'), 'refresh');
	}
	// ACCOUNTING SECTION ENDS

	// BACKOFFICE SECTION

	//BOOK LIST MANAGER
	public function book($param1 = "", $param2 = "") {
		// showing the list of book
		if ($param1 == 'list') {
			$this->load->view('backend/parent/book/list');
		}

		// showing the index file
		if(empty($param1)){
			$page_data['folder_name'] = 'book';
			$page_data['page_title']  = 'books';
			$this->load->view('backend/index', $page_data);
		}
	}

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

	public function payment($invoice_id = ""){
		$page_data['page_title']  = 'payment_gateway';
		$page_data['invoice_details'] = $this->crud_model->get_invoice_by_id($invoice_id);
		$this->load->view('backend/payment_gateway/index', $page_data);
	}
	// PAYUMONEY CHECKOUT
	public function payumoney($invoice_id = ""){
		$page_data['page_title']  = 'payment_gateway';
		$page_data['invoice_details'] = $this->crud_model->get_invoice_by_id($invoice_id);
		$this->load->view('backend/payment_gateway/payumoney', $page_data);
	}
	//complaintactions Section Start
	public function complaintsactions($param1 = ''){

		
		if($param1 == 'list'){
			$page_data['page_form']=$param1;
			$this->load->view('backend/parent/complaintsactions/list', $page_data);
		}

		if(empty($param1)){
			$page_data['folder_name'] = 'complaintsactions';
			$page_data['page_title'] = 'complaints / actions';
            $page_data['page_form']=$param1;
			$this->load->view('backend/index', $page_data);
		}
	}
  	//complaintactions Section End
  	public function final_report_card($param1 = '', $param2 = '', $param3 = '') {
		if ($param1 == 'list') {
			// Collect the posted data
			$class_id = $this->input->post('class_id');
			$section_id = $this->input->post('section_id');
			$student_id = $this->input->post('student_id'); 
			//$exam_id = $this->input->post('exam_id');
	
			// Fetch necessary data
			$data['class_id'] = $class_id;
			$data['section_id'] = $section_id;
			$data['student_id'] = $student_id;
			//$data['exam_id'] = $exam_id;
	
			// Load the list view with the data
			$this->load->view('backend/parent/finalreportcard/list', $data);
		} else {
			$page_data['page_name'] = 'finalreportcard/index';
			$page_data['page_title'] = get_phrase('manage_final_report_cards');
			$this->load->view('backend/index', $page_data);
		}
	}
	public function class_wise_student($class_id) {
        $students = $this->crud_model->get_students_by_class($class_id);
        echo '<option value="">'.get_phrase('select_student').'</option>';
        foreach ($students as $student) {
            echo '<option value="'.$student['id'].'">'.$this->user_model->get_user_details($student['user_id'], 'name').'</option>';
        }
    }
    public function section($action = "", $id = "") {

		// PROVIDE A LIST OF SECTION ACCORDING TO CLASS ID
		if ($action == 'list') {
			$page_data['class_id'] = $id;
			$this->load->view('backend/parent/section/list', $page_data);
		}
	}
	public function assignroutes($param1 = '',$param2 = ''){

		if($param1 == 'create'){
			$response = $this->crud_model->assign_routes_add();
			echo $response;
		}
		
		if($param1 == 'update_assign_route'){
			$response = $this->crud_model->assign_routes_update($param2);
			echo $response;
		}

        if($param1 == 'delete'){
			$response = $this->crud_model->assign_routes_delete($param2);
			echo $response;
		}
		
		if($param1 == 'list'){
			$page_data['page_form']=$param1;
			$this->load->view('backend/parent/assign_routes/list', $page_data);
		}

		if(empty($param1)){
			$page_data['folder_name'] = 'assign_routes';
			$page_data['page_title'] = 'Routes';
            $page_data['page_form']=$param1;
			$this->load->view('backend/index', $page_data);
		}
	}

    //Classwork Section Start
	public function classwork($param1 = '', $param2 = ''){

		if($param1 == 'list'){
			$page_data['class_id'] = htmlspecialchars($this->input->post('class_id'));
			$page_data['section_id'] = htmlspecialchars($this->input->post('section_id'));
			$page_data['subject_id'] = htmlspecialchars($this->input->post('subject_id'));
			$page_data['exam_id'] = htmlspecialchars($this->input->post('exam_id'));
           $this->load->view('backend/parent/classwork/list', $page_data);
		}

		
		if(empty($param1)){
			$page_data['folder_name'] = 'classwork';
			$page_data['page_title'] = 'Classwork Marks';
			$this->load->view('backend/index', $page_data);
		}
	}
	
	//Classwork Section End
    //Project Section Start
    public function project($param1 = '', $param2 = ''){

		if($param1 == 'list'){
			$page_data['class_id'] = htmlspecialchars($this->input->post('class_id'));
			$page_data['section_id'] = htmlspecialchars($this->input->post('section_id'));
			$page_data['subject_id'] = htmlspecialchars($this->input->post('subject_id'));
			$page_data['exam_id'] = htmlspecialchars($this->input->post('exam_id'));
           $this->load->view('backend/parent/project/list', $page_data);
		}

		
		if(empty($param1)){
			$page_data['folder_name'] = 'project';
			$page_data['page_title'] = 'Project Marks';
			$this->load->view('backend/index', $page_data);
		}
	}
	
	//Project Section End
    //Behaviour Section Start
	public function behaviours($param1 = '', $param2 = ''){

		if($param1 == 'list'){
			$page_data['class_id'] = htmlspecialchars($this->input->post('class_id'));
			$page_data['section_id'] = htmlspecialchars($this->input->post('section_id'));
			$page_data['subject_id'] = htmlspecialchars($this->input->post('subject_id'));
			$page_data['exam_id'] = htmlspecialchars($this->input->post('exam_id'));
           $this->load->view('backend/parent/behaviour/list', $page_data);
		}
		if(empty($param1)){
			$page_data['folder_name'] = 'behaviour';
			$page_data['page_title'] = 'Behaviour Marks';
			$this->load->view('backend/index', $page_data);
		}
	}

	// HOMEWORK MARK SECTION STARTS

 	public function homework($param1 = '', $param2 = ''){

		if($param1 == 'list'){
			$page_data['class_id'] = htmlspecialchars($this->input->post('class_id'));
			$page_data['section_id'] = htmlspecialchars($this->input->post('section_id'));
			$page_data['subject_id'] = htmlspecialchars($this->input->post('subject_id'));
			$page_data['exam_id'] = htmlspecialchars($this->input->post('exam_id'));
           $this->load->view('backend/parent/homework/list', $page_data);
		}

		if(empty($param1)){
			$page_data['folder_name'] = 'homework';
			$page_data['page_title'] = 'Homework Marks';
			$this->load->view('backend/index', $page_data);
		}
	}
	//Online exam section start
	public function online_exam_create(){
		$page_data['folder_name'] = 'online_exam';
		$page_data['page_title'] = 'online exam details';
		$this->load->view('backend/index', $page_data);
		
	}
    
	

}
