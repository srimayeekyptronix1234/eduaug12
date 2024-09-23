<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {
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

		// CHECK WHETHER student IS LOGGED IN
		if($this->session->userdata('student_login') != 1){
			redirect(site_url('login'), 'refresh');
		}
	}

	// INDEX FUNCTION
	public function index(){
		redirect(site_url('student/dashboard'), 'refresh');
	}

	//DASHBOARD
	public function dashboard(){
		$page_data['page_title'] = 'Dashboard';
		$page_data['folder_name'] = 'dashboard';
		$this->load->view('backend/index', $page_data);
	}

	//START CLASS secion
	public function manage_class($param1 = '', $param2 = '', $param3 = ''){
		if($param1 == 'section'){
			$response = $this->crud_model->section_update($param2);
			echo $response;
		}

		// show data from database
		if ($param1 == 'list') {
			$this->load->view('backend/student/class/list');
		}

		if(empty($param1)){
			$page_data['folder_name'] = 'class';
			$page_data['page_title'] = 'class';
			$this->load->view('backend/index', $page_data);
		}
	}
	//END CLASS section
	//	SECTION STARTED
	public function section($action = "", $id = "") {

		// PROVIDE A LIST OF SECTION ACCORDING TO CLASS ID
		if ($action == 'list') {
			$page_data['class_id'] = $id;
			$this->load->view('backend/student/section/list', $page_data);
		}
	}
	//	SECTION ENDED

	//START SUBJECT section
	public function subject($param1 = '', $param2 = ''){

		if($param1 == 'list'){
			$page_data['class_id'] = $param2;
			$this->load->view('backend/student/subject/list', $page_data);
		}

		if(empty($param1)){
			$page_data['folder_name'] = 'subject';
			$page_data['page_title'] = 'subject';
			$this->load->view('backend/index', $page_data);
		}
	}

	public function class_wise_subject($class_id) {

		// PROVIDE A LIST OF SUBJECT ACCORDING TO CLASS ID
		$page_data['class_id'] = $class_id;
		$this->load->view('backend/student/subject/dropdown', $page_data);
	}
	//END SUBJECT section


	//START SYLLABUS section
	
	public function syllabus($param1 = '', $param2 = '', $param3 = ''){

		
		if($param1 == 'list'){
			$page_data['class_id'] = $param2;
			$page_data['section_id'] = $param3;
			$this->load->view('backend/student/syllabus/list', $page_data);
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
			$this->load->view('backend/student/routine/list', $page_data);
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
			$this->load->view('backend/student/attendance/list', $page_data);
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
			$this->load->view('backend/student/event_calendar/list');
		}

		if(empty($param1)){
			$page_data['folder_name'] = 'event_calendar';
			$page_data['page_title'] = 'event_calendar';
			$this->load->view('backend/index', $page_data);
		}
	}
	//END EVENT CALENDAR section

	//START EXAM section
	public function exam($param1 = '', $param2 = ''){

		if ($param1 == 'list') {
			$this->load->view('backend/student/exam/list');
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
			// $this->crud_model->mark_insert($page_data['class_id'], $page_data['section_id'], $page_data['subject_id'], $page_data['exam_id']);
			$this->load->view('backend/student/mark/list', $page_data);
		}

		if($param1 == 'mark_update'){
			$this->crud_model->mark_update();
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

	// ACCOUNT SECTION STARTS
	public function invoice($param1 = "", $param2 = "") {
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
	// ACCOUNT SECTION ENDS

	// BACKOFFICE SECTION

	//BOOK LIST MANAGER
	public function book($param1 = "", $param2 = "") {
		$page_data['folder_name'] = 'book';
		$page_data['page_title']  = 'books';
		$this->load->view('backend/index', $page_data);
	}

	// BOOK ISSUED BY THE STUDENT
	public function book_issue($param1 = "", $param2 = "") {
		// showing the index file
		$page_data['folder_name'] = 'book_issue';
		$page_data['page_title']  = 'issued_book';
		$this->load->view('backend/index', $page_data);
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
	// HOMEWORK MARK SECTION STARTS

    public function homework($param1 = '', $param2 = ''){

		if($param1 == 'list'){
			$page_data['class_id'] = htmlspecialchars($this->input->post('class_id'));
			$page_data['section_id'] = htmlspecialchars($this->input->post('section_id'));
			$page_data['subject_id'] = htmlspecialchars($this->input->post('subject_id'));
			$page_data['exam_id'] = htmlspecialchars($this->input->post('exam_id'));
			//$this->crud_model->homework_mark_insert($page_data['exam_id'],$page_data['class_id'],$page_data['section_id'],$page_data['subject_id']);
           $this->load->view('backend/admin/homework/list', $page_data);
		}

		if($param1 == 'homework_update'){
            $this->crud_model->homework_mark_update();
		}

		if(empty($param1)){
			$page_data['folder_name'] = 'homework';
			$page_data['page_title'] = 'Homework Marks';
			$this->load->view('backend/index', $page_data);
		}
	}	

    // HOMEWORK MARK SECTION ENDS

	// Student Online exam
	//START EXAM section
	public function student_online_exam($param1 = '', $param2 = '',$param3='',$param4='',$param5='',$param6=''){

		if($param1 == 'create'){
			$response = $this->crud_model->online_exam_data_submit();
			echo $response;
		}
        if($param1 == 'start_exam_details'){
        	 $render_data['quarter_id']=$param2;
        	 $render_data['exam_id']=$param3;
        	 $render_data['class_id']=$param4;
        	 $render_data['subject_id']=$param5;
			 $render_data['quarter_set_id']=$param6;
        	 $render_data['working_page'] = 'start_exam';
			 $render_data['folder_name'] = 'online_exam';
			 $render_data['page_title'] = 'start_exam';
             $this->load->view('backend/index', $render_data);
		}

		//if(empty($param1)){

		// if($param1 == 'update'){
		// 	$response = $this->crud_model->exam_update($param2);
		// 	echo $response;
		// }

		// if($param1 == 'delete'){
		// 	$response = $this->crud_model->online_exam_delete($param2);
		// 	echo $response;
		// }

		// if ($param1 == 'exam-page') {
		// 	//echo "hello"; //exit;
		// 	$quarter_id = 1;
		// 	$questions = $this->crud_model->get_questions($quarter_id);

		// 	$js_array = [];
		// 	foreach ($questions as $key => $question) {
		// 		$js_array[] = [
		// 			'question' => ($key + 1) . ". " . $question->questions,
		// 			'options' => [
		// 				$question->answers1,
		// 				$question->answers2,
		// 				$question->answers3,
		// 				$question->answers4
		// 			]
		// 		];
		// 	}

		// 	$page_data['js_array'] = json_encode($js_array);

		// 	$this->load->view('backend/student/online_exam/exam-page2', $page_data);
		// }

		if(empty($param1)){
			$page_data['working_page']='exam-list';
			$page_data['folder_name'] = 'online_exam';
			$page_data['page_title'] = 'online exam details';
			$this->load->view('backend/index', $page_data);
		}
	//}
   }

	// Student Online status update

	public function updateExamStatus()
	{
		
		$loginStudentId = $this->session->userdata('user_id'); 
        $quarter_id = $this->input->post('quarter_id');
		$quarter_set_id = $this->input->post('quarter_set_id');
		$class_id = $this->input->post('class_id');
		$subject_id = $this->input->post('subject_id');
		$exam_id = $this->input->post('exam_id');
		$student_answers = $this->input->post('student_answers');
		
		$get_student_answers = $student_answers ? $student_answers : "";
        // Any additional data
        // $additional_data = [
        //     'answer' => $get_student_answers,
        //     //'extra_param2' => '',
        //     // Add more parameters as needed
        // ];

		$response = $this->crud_model->student_online_exam_status_update($loginStudentId, $quarter_id,$quarter_set_id,$class_id, $subject_id, $exam_id, $get_student_answers);

		echo $response;
	}
    
    //complaintactions Section Start
	public function complaintsactions($param1 = ''){

		if($param1 == 'list'){
			$page_data['class_id'] = $param2;
			$page_data['section_id']=$param3;
			$page_data['student_id']=$param4;
			$page_data['teacher_id']=$param5;
			$page_data['page_form']=$param1;
			$this->load->view('backend/student/complaintsactions/list', $page_data);
		}

		if(empty($param1)){
			$page_data['folder_name'] = 'complaintsactions';
			$page_data['page_title'] = 'complaints / actions';
            $page_data['page_form']=$param1;
			$this->load->view('backend/index', $page_data);
		}
	}

  	//complaintactions Section End
	//AssignRoutes Section Start
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
			$this->load->view('backend/student/assign_routes/list', $page_data);
		}

		if(empty($param1)){
			$page_data['folder_name'] = 'assign_routes';
			$page_data['page_title'] = 'Routes';
            $page_data['page_form']=$param1;
			$this->load->view('backend/index', $page_data);
		}
	}

  	//Final Reportcard
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
			$this->load->view('backend/teacher/finalreportcard/list', $data);
		} else {
			$page_data['page_name'] = 'finalreportcard/index';
			$page_data['page_title'] = get_phrase('manage_final_report_cards');
			$this->load->view('backend/index', $page_data);
		}
	}
		//Classwork Section Start
		public function classwork(){
			$page_data['folder_name'] = 'classwork';
			$page_data['page_title'] = 'Classwork Marks';
			$this->load->view('backend/index', $page_data);
		}
		//Classwork Section End
	    //Project Section Start
		public function project(){

			$page_data['folder_name'] = 'project';
			$page_data['page_title'] = 'Project Marks';
			$this->load->view('backend/index', $page_data);
		}
		//Project Section End
	    //Quiz Section Start
		public function quiz(){	
			$page_data['folder_name'] = 'quiz';
			$page_data['page_title'] = 'quiz';
			$this->load->view('backend/index', $page_data);
		}
		//Quiz Section End
	    //Behaviour Section Start
		public function behaviours(){
			$page_data['folder_name'] = 'behaviour';
			$page_data['page_title'] = 'Behaviour Marks';
			$this->load->view('backend/index', $page_data);
		}
		//Assignment Section Start
		public function assignment($param1 = '', $param2 = '',$param3 = '',$param4 = ''){
			if($param1 == 'list'){
				$page_data['class_id'] = $param2;
				$page_data['section_id']=$param3;
				$page_data['subject_id']=$param4;	
				$this->load->view('backend/student/assignment/list', $page_data);
			}

			if(empty($param1)){
				$page_data['folder_name'] = 'assignment';
				$page_data['page_title'] = 'assignment';
				$this->load->view('backend/index', $page_data);
			}
		}

	//Assignment Section End

	
}
