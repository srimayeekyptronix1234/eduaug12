<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teacher extends CI_Controller {

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
		
		if($this->session->userdata('teacher_login') != 1){
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

	//START STUDENT ADN ADMISSION section
	public function student($param1 = '', $param2 = '', $param3 = '', $param4 = '', $param5 = ''){

		if($param1 == 'create'){
			//form view
			if($param2 == 'bulk'){
				$page_data['aria_expand'] = 'bulk';
				$page_data['working_page'] = 'create';
				$page_data['folder_name'] = 'student';
				$page_data['page_title'] = 'add_student';
				$this->load->view('backend/index', $page_data);
			}elseif($param2 == 'excel'){
				$page_data['aria_expand'] = 'excel';
				$page_data['working_page'] = 'create';
				$page_data['folder_name'] = 'student';
				$page_data['page_title'] = 'add_student';
				$this->load->view('backend/index', $page_data);
			}else{
				$page_data['aria_expand'] = 'single';
				$page_data['working_page'] = 'create';
				$page_data['folder_name'] = 'student';
				$page_data['page_title'] = 'add_student';
				$this->load->view('backend/index', $page_data);
			}
		}

		//create to database
		if($param1 == 'create_single_student'){
			$response = $this->user_model->single_student_create();
			echo $response;
		}

		if($param1 == 'create_bulk_student'){
			$response = $this->user_model->bulk_student_create();
			echo $response;
		}

		if($param1 == 'create_excel'){
			$response = $this->user_model->excel_create();
			echo $response;
		}

		// form view
		if($param1 == 'edit'){
			$page_data['student_id'] = $param2;
			$page_data['working_page'] = 'edit';
			$page_data['folder_name'] = 'student';
			$page_data['page_title'] = 'update_student_information';
			$this->load->view('backend/index', $page_data);
		}

		//updated to database
		if($param1 == 'updated'){
			$response = $this->user_model->student_update($param2, $param3);
			echo $response;
		}

		if($param1 == 'delete'){
			$response = $this->user_model->delete_student($param2, $param3);
			echo $response;
		}

		if($param1 == 'filter'){
			$page_data['class_id'] = $param2;
			$page_data['section_id'] = $param3;
			$this->load->view('backend/teacher/student/list', $page_data);
		}

		if(empty($param1)){
			$page_data['working_page'] = 'filter';
			$page_data['folder_name'] = 'student';
			$page_data['page_title'] = 'student_list';
			$this->load->view('backend/index', $page_data);
		}
	}
	//END STUDENT ADN ADMISSION section

	//START TEACHER section
	public function teacher($param1 = '', $param2 = '', $param3 = ''){


		if($param1 == 'create'){
			$response = $this->user_model->create_teacher();
			echo $response;
		}

		if($param1 == 'update'){
			$response = $this->user_model->update_teacher($param2);
			echo $response;
		}

		if($param1 == 'delete'){
			$teacher_id = $this->db->get_where('teachers', array('user_id' => $param2))->row('id');
			$response = $this->user_model->delete_teacher($param2, $teacher_id);
			echo $response;
		}

		if ($param1 == 'list') {
			$this->load->view('backend/teacher/teacher/list');
		}

		if(empty($param1)){
			$page_data['folder_name'] = 'teacher';
			$page_data['page_title'] = 'techers';
			$this->load->view('backend/index', $page_data);
		}
	}
	//END TEACHER section

	//START CLASS secion
	public function manage_class($param1 = '', $param2 = '', $param3 = ''){

		if($param1 == 'create'){
			$response = $this->crud_model->class_create();
			echo $response;
		}

		if($param1 == 'delete'){
			$response = $this->crud_model->class_delete($param2);
			echo $response;
		}

		if($param1 == 'update'){
			$response = $this->crud_model->class_update($param2);
			echo $response;
		}

		if($param1 == 'section'){
			$response = $this->crud_model->section_update($param2);
			echo $response;
		}

		// show data from database
		if ($param1 == 'list') {
			$this->load->view('backend/teacher/class/list');
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
			$this->load->view('backend/teacher/section/list', $page_data);
		}
	}
	//	SECTION ENDED

	//START SUBJECT section
	public function subject($param1 = '', $param2 = ''){

		if($param1 == 'create'){
			$response = $this->crud_model->subject_create();
			echo $response;
		}

		if($param1 == 'update'){
			$response = $this->crud_model->subject_update($param2);
			echo $response;
		}

		if($param1 == 'delete'){
			$response = $this->crud_model->subject_delete($param2);
			echo $response;
		}

		if($param1 == 'list'){
			$page_data['class_id'] = $param2;
			$this->load->view('backend/teacher/subject/list', $page_data);
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
		$this->load->view('backend/teacher/subject/dropdown', $page_data);
	}
	//END SUBJECT section

	//START SYLLABUS section
	public function syllabus($param1 = '', $param2 = '', $param3 = ''){

		if($param1 == 'create'){
			$response = $this->crud_model->syllabus_create();
			echo $response;
		}

		if($param1 == 'delete'){
			$response = $this->crud_model->syllabus_delete($param2);
			echo $response;
		}

		if($param1 == 'list'){
			$page_data['class_id'] = $param2;
			$page_data['section_id'] = $param3;
			$this->load->view('backend/teacher/syllabus/list', $page_data);
		}

		if(empty($param1)){
			$page_data['folder_name'] = 'syllabus';
			$page_data['page_title'] = 'syllabus';
			$this->load->view('backend/index', $page_data);
		}
	}
	//END SYLLABUS section

	//START CLASS ROUTINE section
	public function routine($param1 = '', $param2 = '', $param3 = '', $param4 = ''){

		if($param1 == 'create'){
			$response = $this->crud_model->routine_create();
			echo $response;
		}

		if($param1 == 'update'){
			$response = $this->crud_model->routine_update($param2);
			echo $response;
		}

		if($param1 == 'delete'){
			$response = $this->crud_model->routine_delete($param2);
			echo $response;
		}

		if($param1 == 'filter'){
			$page_data['class_id'] = $param2;
			$page_data['section_id'] = $param3;
			$this->load->view('backend/teacher/routine/list', $page_data);
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

		if($param1 == 'take_attendance'){
			$response = $this->crud_model->take_attendance();
			echo $response;
		}

		if($param1 == 'filter'){
			$date = '01 '.$this->input->post('month').' '.$this->input->post('year');
			$page_data['attendance_date'] = strtotime($date);
			$page_data['class_id'] = htmlspecialchars($this->input->post('class_id'));
			$page_data['section_id'] = htmlspecialchars($this->input->post('section_id'));
			$page_data['month'] = htmlspecialchars($this->input->post('month'));
			$page_data['year'] = htmlspecialchars($this->input->post('year'));
			$this->load->view('backend/teacher/attendance/list', $page_data);
		}

		if($param1 == 'student'){
			$page_data['attendance_date'] = strtotime($this->input->post('date'));
			$page_data['class_id'] = htmlspecialchars($this->input->post('class_id'));
			$page_data['section_id'] = htmlspecialchars($this->input->post('section_id'));
			$this->load->view('backend/teacher/attendance/student', $page_data);
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

		if($param1 == 'create'){
			$response = $this->crud_model->event_calendar_create();
			echo $response;
		}

		if($param1 == 'update'){
			$response = $this->crud_model->event_calendar_update($param2);
			echo $response;
		}

		if($param1 == 'delete'){
			$response = $this->crud_model->event_calendar_delete($param2);
			echo $response;
		}

		if($param1 == 'all_events'){
			echo $this->crud_model->all_events();
		}

		if ($param1 == 'list') {
			$this->load->view('backend/teacher/event_calendar/list');
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

		if($param1 == 'create'){
			$response = $this->crud_model->exam_create();
			echo $response;
		}

		if($param1 == 'update'){
			$response = $this->crud_model->exam_update($param2);
			echo $response;
		}

		if($param1 == 'delete'){
			$response = $this->crud_model->exam_delete($param2);
			echo $response;
		}

		if ($param1 == 'list') {
			$this->load->view('backend/teacher/exam/list');
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
			$this->crud_model->mark_insert($page_data['class_id'], $page_data['section_id'], $page_data['subject_id'], $page_data['exam_id']);
			$this->load->view('backend/teacher/mark/list', $page_data);
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

	// GET THE GRADE ACCORDING TO MARK
	public function get_grade($acquired_mark) {
		echo get_grade($acquired_mark);
	}
	//END MARKS sesction


	// BACKOFFICE SECTION

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
			$this->load->view('backend/teacher/book/list');
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
	// HOMEWORK MARK SECTION STARTS

    public function homework($param1 = '', $param2 = ''){

		if($param1 == 'list'){
			$page_data['class_id'] = htmlspecialchars($this->input->post('class_id'));
			$page_data['section_id'] = htmlspecialchars($this->input->post('section_id'));
			$page_data['subject_id'] = htmlspecialchars($this->input->post('subject_id'));
			$page_data['exam_id'] = htmlspecialchars($this->input->post('exam_id'));
			$this->crud_model->homework_mark_insert($page_data['exam_id'],$page_data['class_id'],$page_data['section_id'],$page_data['subject_id']);
           $this->load->view('backend/teacher/homework/list', $page_data);
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
			$this->load->view('backend/teacher/assign_routes/list', $page_data);
		}

		if(empty($param1)){
			$page_data['folder_name'] = 'assign_routes';
			$page_data['page_title'] = 'Routes';
            $page_data['page_form']=$param1;
			$this->load->view('backend/index', $page_data);
		}
	}

  	//AssignRoutes Section End
	//Classwork Section Start
	public function classwork($param1 = '', $param2 = ''){

		if($param1 == 'list'){
			$page_data['class_id'] = htmlspecialchars($this->input->post('class_id'));
			$page_data['section_id'] = htmlspecialchars($this->input->post('section_id'));
			$page_data['subject_id'] = htmlspecialchars($this->input->post('subject_id'));
			$page_data['exam_id'] = htmlspecialchars($this->input->post('exam_id'));
			$this->crud_model->classwork_mark_insert($page_data['exam_id'],$page_data['class_id'],$page_data['section_id'],$page_data['subject_id']);
           $this->load->view('backend/teacher/classwork/list', $page_data);
		}

		if($param1 == 'classwork_update'){
            $this->crud_model->classwork_mark_update();
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
			$this->crud_model->project_mark_insert($page_data['exam_id'],$page_data['class_id'],$page_data['section_id'],$page_data['subject_id']);
           $this->load->view('backend/teacher/project/list', $page_data);
		}

		if($param1 == 'project_update'){
            $this->crud_model->project_mark_update();
		}

		if(empty($param1)){
			$page_data['folder_name'] = 'project';
			$page_data['page_title'] = 'Project Marks';
			$this->load->view('backend/index', $page_data);
		}
	}
	//Project Section End
	//Quiz Section Start
	public function quiz($param1 = '', $param2 = '',$param3 = '',$param4 = ''){

		if($param1 == 'create'){
			$response = $this->crud_model->quiz_create();
			echo $response;
		}

		if($param1 == 'update'){
			$response = $this->crud_model->quiz_update($param2);
			echo $response;
		}

		if($param1 == 'delete'){
			$response = $this->crud_model->quiz_delete($param2);
			echo $response;
		}

		if($param1 == 'list'){
			$page_data['class_id'] = $param2;
			$page_data['exam']=$param3;
			$page_data['subject_id']=$param4;	
			$this->load->view('backend/teacher/quiz/list', $page_data);
		}

		if(empty($param1)){
			$page_data['folder_name'] = 'quiz';
			$page_data['page_title'] = 'quiz';
			$this->load->view('backend/index', $page_data);
		}
	}

	//Quiz Section End
	//Behaviour Section Start
	public function behaviours($param1 = '', $param2 = ''){

		if($param1 == 'list'){
			$page_data['class_id'] = htmlspecialchars($this->input->post('class_id'));
			$page_data['section_id'] = htmlspecialchars($this->input->post('section_id'));
			$page_data['subject_id'] = htmlspecialchars($this->input->post('subject_id'));
			$page_data['exam_id'] = htmlspecialchars($this->input->post('exam_id'));
			$this->crud_model->behaviour_mark_insert($page_data['exam_id'],$page_data['class_id'],$page_data['section_id'],$page_data['subject_id']);
           $this->load->view('backend/teacher/behaviour/list', $page_data);
		}

		if($param1 == 'behaviour_update'){
            $this->crud_model->behaviour_mark_update();
		}

		if(empty($param1)){
			$page_data['folder_name'] = 'behaviour';
			$page_data['page_title'] = 'Behaviour Marks';
			$this->load->view('backend/index', $page_data);
		}
	}
	//Behaviour Section End
    //complaintactions Section Start
	public function complaintsactions($param1 = '', $param2 = '',$param3 = '',$param4 = '',$param5 = ''){

		if($param1 == 'create'){
			$response = $this->crud_model->complaints_add();
			echo $response;
		}

		if($param1 == 'update'){
			$response = $this->crud_model->complaints_update($param2);
			echo $response;
		}

		if($param1 == 'delete'){
			$response = $this->crud_model->complaints_delete($param2);
			echo $response;
		}
		
		if($param1 == 'list'){
			$page_data['class_id'] = $param2;
			$page_data['section_id']=$param3;
			$page_data['student_id']=$param4;
			$page_data['teacher_id']=$param5;
			$page_data['page_form']=$param1;
			$this->load->view('backend/teacher/complaintsactions/list', $page_data);
		}

		if(empty($param1)){
			$page_data['folder_name'] = 'complaintsactions';
			$page_data['page_title'] = 'complaints / actions';
            $page_data['page_form']=$param1;
			$this->load->view('backend/index', $page_data);
		}
	}
    
  	//complaintactions Section End
	public function show_class_wise_student($class_id) {
        $students = $this->crud_model->get_students_by_class($class_id);
        echo '<option value="">'.get_phrase('select_student').'</option>';
        foreach ($students as $student) {
            echo '<option value="'.$student['user_id'].'">'.$this->user_model->get_user_details($student['user_id'], 'name').'</option>';
        }
    }
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
     public function class_wise_student($class_id) {
        $students = $this->crud_model->get_students_by_class($class_id);
        echo '<option value="">'.get_phrase('select_student').'</option>';
        foreach ($students as $student) {
            echo '<option value="'.$student['id'].'">'.$this->user_model->get_user_details($student['user_id'], 'name').'</option>';
        }
    }



	
}
