<?php
defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH.'third_party/PHPExcel/IOFactory.php';
class Crud_model extends CI_Model {

	protected $school_id;
	protected $active_session;

	public function __construct()
	{
		parent::__construct();
		$this->school_id = school_id();
		$this->active_session = active_session();
	}


	//START CLASS section
	public function get_classes($id = "") {

		$this->db->where('school_id', $this->school_id);

		if ($id > 0) {
			$this->db->where('id', $id);

		}
		return $this->db->get('classes');


	}
	public function class_create()
	{
		$data['name'] = html_escape($this->input->post('name'));
		$data['school_id'] = $this->school_id;
		$this->db->insert('classes', $data);

		$insert_id = $this->db->insert_id();
		$section_data['name'] = 'A';
		$section_data['class_id'] = $insert_id;
		$this->db->insert('sections', $section_data);

		$response = array(
			'status' => true,
			'notification' => get_phrase('class_added_successfully')
		);
		return json_encode($response);
	}

	public function class_update($param1 = '')
	{
		$data['name'] = html_escape($this->input->post('name'));
		$this->db->where('id', $param1);
		$this->db->update('classes', $data);

		$response = array(
			'status' => true,
			'notification' => get_phrase('class_added_successfully')
		);
		return json_encode($response);
	}

	public function section_update($param1 = '')
	{
		$section_id = html_escape($this->input->post('section_id'));
		$section_name = html_escape($this->input->post('name'));
		foreach($section_id as $key => $value){
			if($value == 0){
				$data['class_id'] = $param1;
				$data['name'] = $section_name[$key];
				$this->db->insert('sections', $data);
			}
			if($value != 0 && $value != 'delete'){
				$data['name'] = $section_name[$key];
				$this->db->where('class_id', $param1);
				$this->db->where('id', $value);
				$this->db->update('sections', $data);
			}

			$section_value = null;
			if (strpos($value, 'delete') == true) {
				$section_value = str_replace('delete', '', $value);
			}
			if($value == $section_value.'delete'){
				$data['name'] = $section_name[$key];
				$this->db->where('class_id', $param1);
				$this->db->where('id', $section_value);
				$this->db->delete('sections');
			}
		}

		$response = array(
			'status' => true,
			'notification' => get_phrase('section_list_updated_successfully')
		);
		return json_encode($response);
	}

	public function class_delete($param1 = '')
	{
		$this->db->where('id', $param1);
		$this->db->delete('classes');

		$this->db->where('class_id', $param1);
		$this->db->delete('sections');

		$response = array(
			'status' => true,
			'notification' => get_phrase('class_deleted_successfully')
		);
		return json_encode($response);
	}

	// Get section details by class and section id
	public function get_section_details_by_id($type = "", $id = "") {
		$section_details = array();
		if ($type == 'class') {
			$section_details = $this->db->get_where('sections', array('class_id' => $id));
		}elseif ($type == 'section') {
			$section_details = $this->db->get_where('sections', array('id' => $id));
		}
		return $section_details;
	}

	//get Class details by id
	public function get_class_details_by_id($id) {
		$class_details = $this->db->get_where('classes', array('id' => $id));
		return $class_details;
	}
	//END CLASS section


	//START CLASS_ROOM section
	public function class_room_create()
	{
		$data['name'] = html_escape($this->input->post('name'));
		$data['school_id'] = html_escape($this->input->post('school_id'));
		$this->db->insert('class_rooms', $data);

		$response = array(
			'status' => true,
			'notification' => get_phrase('classroom_added_successfully')
		);
		return json_encode($response);
	}

	public function class_room_update($param1 = '')
	{
		$data['name'] = html_escape($this->input->post('name'));
		$this->db->where('id', $param1);
		$this->db->update('class_rooms', $data);

		$response = array(
			'status' => true,
			'notification' => get_phrase('classroom_updated_successfully')
		);
		return json_encode($response);
	}

	public function class_room_delete($param1 = '')
	{
		$this->db->where('id', $param1);
		$this->db->delete('class_rooms');

		$response = array(
			'status' => true,
			'notification' => get_phrase('classroom_deleted_successfully')
		);
		return json_encode($response);
	}
	//END CLASS_ROOM section


	//START MANAGE_SESSION section
	public function session_create()
	{
		$data['name'] = html_escape($this->input->post('session_title'));
		$this->db->insert('sessions', $data);

		$response = array(
			'status' => true,
			'notification' => get_phrase('session_has_been_created_successfully')
		);

		return json_encode($response);
	}

	public function session_update($param1 = '')
	{
		$data['name'] = html_escape($this->input->post('session_title'));
		$this->db->where('id', $param1);
		$this->db->update('sessions', $data);
		$response = array(
			'status' => true,
			'notification' => get_phrase('session_has_been_updated_successfully')
		);

		return json_encode($response);
	}

	public function session_delete($param1 = '')
	{
		$this->db->where('id', $param1);
		$this->db->delete('sessions');
		$response = array(
			'status' => true,
			'notification' => get_phrase('session_has_been_deleted_successfully')
		);

		return json_encode($response);
	}

	public function active_session($param1 = ''){
		$previous_session_id = active_session();
		$this->db->where('id', $previous_session_id);
		$this->db->update('sessions', array('status' => 0));
		$this->db->where('id', $param1);
		$this->db->update('sessions', array('status' => 1));
		$response = array(
			'status' => true,
			'notification' => get_phrase('session_has_been_activated')
		);
		return json_encode($response);
	}
	//END MANAGE_SESSION section


	//START SUBJECT section
	public function subject_create()
	{
		$data['name'] = html_escape($this->input->post('name'));
		$data['class_id'] = html_escape($this->input->post('class_id'));
		$data['school_id'] = html_escape($this->input->post('school_id'));
		$data['session'] = html_escape($this->input->post('session'));
		$this->db->insert('subjects', $data);

		$response = array(
			'status' => true,
			'notification' => get_phrase('subject_has_been_added_successfully')
		);

		return json_encode($response);
	}

	public function subject_update($param1 = '')
	{
		$data['class_id'] = html_escape($this->input->post('class_id'));
		$data['name'] = html_escape($this->input->post('name'));
		$this->db->where('id', $param1);
		$this->db->update('subjects', $data);

		$response = array(
			'status' => true,
			'notification' => get_phrase('subject_has_been_updated_successfully')
		);

		return json_encode($response);
	}

	public function subject_delete($param1 = '')
	{
		$this->db->where('id', $param1);
		$this->db->delete('subjects');

		$response = array(
			'status' => true,
			'notification' => get_phrase('subject_has_been_deleted_successfully')
		);

		return json_encode($response);
	}

	public function get_subject_by_id($subject_id = '') {
		return $this->db->get_where('subjects', array('id' => $subject_id))->row_array();
	}
	
	//END SUBJECT section


	//START DEPARTMENT section
	public function department_create()
	{
		$data['name'] = html_escape($this->input->post('name'));
		$data['school_id'] = html_escape($this->input->post('school_id'));
		$this->db->insert('departments', $data);

		$response = array(
			'status' => true,
			'notification' => get_phrase('department_has_been_added_successfully')
		);

		return json_encode($response);
	}

	public function department_update($param1 = '')
	{
		$data['name'] = html_escape($this->input->post('name'));
		$this->db->where('id', $param1);
		$this->db->update('departments', $data);

		$response = array(
			'status' => true,
			'notification' => get_phrase('department_has_been_updated_successfully')
		);

		return json_encode($response);
	}

	public function department_delete($param1 = '')
	{
		$this->db->where('id', $param1);
		$this->db->delete('departments');

		$response = array(
			'status' => true,
			'notification' => get_phrase('department_has_been_deleted_successfully')
		);

		return json_encode($response);
	}
	//END DEPARTMENT section


	//START SYLLABUS section
	public function syllabus_create($param1 = '')
	{
		$data['title'] = html_escape($this->input->post('title'));
		$data['class_id'] = html_escape($this->input->post('class_id'));
		$data['section_id'] = html_escape($this->input->post('section_id'));
		$data['subject_id'] = html_escape($this->input->post('subject_id'));
		$data['session_id'] = html_escape($this->input->post('session_id'));
		$data['school_id'] = html_escape($this->input->post('school_id'));
		$file_ext = pathinfo($_FILES['syllabus_file']['name'], PATHINFO_EXTENSION);
		$data['file'] = md5(rand(10000000, 20000000)).'.'.$file_ext;
		move_uploaded_file($_FILES['syllabus_file']['tmp_name'], 'uploads/syllabus/'.$data['file']);
		$this->db->insert('syllabuses', $data);

		$response = array(
			'status' => true,
			'notification' => get_phrase('syllabus_added_successfully')
		);
		return json_encode($response);
	}
	public function syllabus_delete($param1){
		$syllabus_details = $this->get_syllabus_by_id($param1);
		$this->db->where('id', $param1);
		$this->db->delete('syllabuses');
		$path = 'uploads/syllabus/'.$syllabus_details['file'];
		if (file_exists($path)){
				unlink($path);
		}
		$response = array(
			'status' => true,
			'notification' => get_phrase('syllabus_deleted_successfully')
		);
		return json_encode($response);
	}

	public function get_syllabus_by_id($syllabus_id = "") {
		return $this->db->get_where('syllabuses', array('id' => $syllabus_id))->row_array();
	}
	//END SYLLABUS section

	//START CLASS ROUTINE section
	public function routine_create()
	{
		$data['class_id'] = html_escape($this->input->post('class_id'));
		$data['section_id'] = html_escape($this->input->post('section_id'));
		$data['subject_id'] = html_escape($this->input->post('subject_id'));
		$data['teacher_id'] = html_escape($this->input->post('teacher_id'));
		$data['room_id'] = html_escape($this->input->post('class_room_id'));
		$data['day'] = html_escape($this->input->post('day'));
		$data['starting_hour'] = html_escape($this->input->post('starting_hour'));
		$data['starting_minute'] = html_escape($this->input->post('starting_minute'));
		$data['ending_hour'] = html_escape($this->input->post('ending_hour'));
		$data['ending_minute'] = html_escape($this->input->post('ending_minute'));
		$data['school_id'] = $this->school_id;
		$data['session_id'] = $this->active_session;
		$this->db->insert('routines', $data);

		$response = array(
			'status' => true,
			'notification' => get_phrase('class_routine_added_successfully')
		);

		return json_encode($response);
	}

	public function routine_update($param1 = '')
	{
		$data['class_id'] = html_escape($this->input->post('class_id'));
		$data['section_id'] = html_escape($this->input->post('section_id'));
		$data['subject_id'] = html_escape($this->input->post('subject_id'));
		$data['teacher_id'] = html_escape($this->input->post('teacher_id'));
		$data['room_id'] = html_escape($this->input->post('class_room_id'));
		$data['day'] = html_escape($this->input->post('day'));
		$data['starting_hour'] = html_escape($this->input->post('starting_hour'));
		$data['starting_minute'] = html_escape($this->input->post('starting_minute'));
		$data['ending_hour'] = html_escape($this->input->post('ending_hour'));
		$data['ending_minute'] = html_escape($this->input->post('ending_minute'));
		$this->db->where('id', $param1);
		$this->db->update('routines', $data);

		$response = array(
			'status' => true,
			'notification' => get_phrase('class_routine_updated_successfully')
		);

		return json_encode($response);
	}

	public function routine_delete($param1 = '')
	{
		$this->db->where('id', $param1);
		$this->db->delete('routines');

		$response = array(
			'status' => true,
			'notification' => get_phrase('class_routine_deleted_successfully')
		);

		return json_encode($response);
	}
	//END CLASS ROUTINE section


	//START DAILY ATTENDANCE section
	public function take_attendance()
	{
		$students = $this->input->post('student_id');
		$data['timestamp'] = strtotime($this->input->post('date'));
		$data['class_id'] = html_escape($this->input->post('class_id'));
		$data['section_id'] = html_escape($this->input->post('section_id'));
		$data['school_id'] = $this->school_id;
		$data['session_id'] = $this->active_session;
		$data['month']=html_escape($this->input->post('month'));
		$check_data = $this->db->get_where('daily_attendances', array('timestamp' => $data['timestamp'], 'class_id' => $data['class_id'], 'section_id' => $data['section_id'], 'session_id' => $data['session_id'], 'school_id' => $data['school_id']));
		if($check_data->num_rows() > 0){
			foreach($students as $key => $student):
				$data['status'] = $this->input->post('status-'.$student);
				$data['comment_for_late'] = $this->input->post('lateReason-'.$student);
				$data['student_id'] = $student;
				$attendance_id = $this->input->post('attendance_id');
				$this->db->where('id', $attendance_id[$key]);
				$this->db->update('daily_attendances', $data);
			endforeach;
		}else{
			foreach($students as $student):
				$data['status'] = $this->input->post('status-'.$student);
				$data['comment_for_late'] = $this->input->post('lateReason-'.$student);
				$data['student_id'] = $student;
				$this->db->insert('daily_attendances', $data);
			endforeach;
		}

		$this->settings_model->last_updated_attendance_data();

		$response = array(
			'status' => true,
			'notification' => get_phrase('attendance_updated_successfully')
		);

		return json_encode($response);
	}

	public function get_todays_attendance() {
		$checker = array(
			'timestamp' => strtotime(date('Y-m-d')),
			'school_id' => $this->school_id,
			'status'    => 1
		);
		$todays_attendance = $this->db->get_where('daily_attendances', $checker);
		return $todays_attendance->num_rows();
	}
	//END DAILY ATTENDANCE section


	//START EVENT CALENDAR section
	public function event_calendar_create()
	{
		$data['title'] = html_escape($this->input->post('title'));
		$data['starting_date'] = $this->input->post('starting_date').' 00:00:1';
		$data['ending_date'] = $this->input->post('ending_date').' 23:59:59';
		$data['school_id'] = $this->school_id;
		$data['session'] = $this->active_session;
		$this->db->insert('event_calendars', $data);

		$response = array(
			'status' => true,
			'notification' => get_phrase('event_has_been_added_successfully')
		);

		return json_encode($response);
	}

	public function event_calendar_update($param1 = '')
	{
		$data['title'] = html_escape($this->input->post('title'));
		$starting_date = strtotime(date('d/m/Y')) +1;
		$ending_date = strtotime(date('d/m/Y')) -1;
		$data['starting_date'] = $this->input->post('starting_date').' 00:00:1';
		$data['ending_date'] = $this->input->post('ending_date').' 23:59:59';
		$this->db->where('id', $param1);
		$this->db->update('event_calendars', $data);

		$response = array(
			'status' => true,
			'notification' => get_phrase('event_has_been_updated_successfully')
		);

		return json_encode($response);
	}

	public function event_calendar_delete($param1 = '')
	{
		$this->db->where('id', $param1);
		$this->db->delete('event_calendars');

		$response = array(
			'status' => true,
			'notification' => get_phrase('event_has_been_deleted_successfully')
		);

		return json_encode($response);
	}

	public function all_events(){

		$event_calendars = $this->db->get_where('event_calendars', array('school_id' => $this->school_id, 'session' => $this->active_session))->result_array();
		return json_encode($event_calendars);
	}

	public function get_current_month_events() {
		$this->db->where('school_id', $this->school_id);
		$this->db->where('session', $this->active_session);
		$events = $this->db->get('event_calendars');
		return $events;
	}
	//END EVENT CALENDAR section

	// START OF NOTICEBOARD SECTION
	public function create_notice() {
		$data['notice_title']     = html_escape($this->input->post('notice_title'));
		$data['notice']           = html_escape($this->input->post('notice'));
		$data['show_on_website']  = $this->input->post('show_on_website');
		$data['date'] 						= $this->input->post('date').' 00:00:1';
		$data['school_id'] 				= $this->school_id;
		$data['session'] 					= $this->active_session;
		if ($_FILES['notice_photo']['name'] != '') {
			$data['image']  = random(15).'.jpg';
			move_uploaded_file($_FILES['notice_photo']['tmp_name'], 'uploads/images/notice_images/'. $data['image']);
		}else{
			$data['image']  = 'placeholder.png';
		}
		$this->db->insert('noticeboard', $data);

		$response = array(
			'status' => true,
			'notification' => get_phrase('notice_has_been_created')
		);

		return json_encode($response);
	}

	public function update_notice($notice_id) {
		$data['notice_title']     = html_escape($this->input->post('notice_title'));
		$data['notice']           = html_escape($this->input->post('notice'));
		$data['show_on_website']  = $this->input->post('show_on_website');
		$data['date'] 						= $this->input->post('date').' 00:00:1';
		if ($_FILES['notice_photo']['name'] != '') {
			$data['image']  = random(15).'.jpg';
			move_uploaded_file($_FILES['notice_photo']['tmp_name'], 'uploads/images/notice_images/'. $data['image']);
		}
		$this->db->where('id', $notice_id);
		$this->db->update('noticeboard', $data);

		$response = array(
			'status' => true,
			'notification' => get_phrase('notice_has_been_updated')
		);

		return json_encode($response);
	}

	public function delete_notice($notice_id) {
		$this->db->where('id', $notice_id);
		$this->db->delete('noticeboard');

		$response = array(
			'status' => true,
			'notification' => get_phrase('notice_has_been_deleted')
		);

		return json_encode($response);
	}

	public function get_all_the_notices() {
		$notices = $this->db->get_where('noticeboard', array('school_id' => $this->school_id, 'session' => $this->active_session))->result_array();
		return json_encode($notices);
	}

	public function get_noticeboard_image($image) {
		if (file_exists('uploads/images/notice_images/'.$image))
		return base_url().'uploads/images/notice_images/'.$image;
		else
		return base_url().'uploads/images/notice_images/placeholder.png';
	}
	// END OF NOTICEBOARD SECTION

	//START EXAM section
	public function exam_create()
	{
		$data['name'] = html_escape($this->input->post('exam_name'));
		$data['starting_date'] = strtotime($this->input->post('starting_date'));
		$data['ending_date'] = strtotime($this->input->post('ending_date'));
		$data['school_id'] = $this->school_id;
		$data['session'] = $this->active_session;
		$this->db->insert('exams', $data);

		$response = array(
			'status' => true,
			'notification' => get_phrase('exam_created_successfully')
		);
		return json_encode($response);
	}

	//START Online EXAM Data Insert
	public function online_exam_data_submit()
	{
		$data['online_exam_name'] = html_escape($this->input->post('online_exam_name'));
		$data['exam_start_date'] = date('Y-m-d', strtotime($this->input->post('exam_start_date')));
		$data['quarter_id'] = $this->input->post('quarter_id');
		$data['quarter_set_id'] = $this->input->post('quarter_set_id');
		$data['school_id'] = $this->input->post('school_id');
		$data['session'] = $this->input->post('session');
		$data['class_id'] = $this->input->post('class_id'); 
		$data['subject_id'] = $this->input->post('subject_id');
		$data['exam_start_time'] = $this->input->post('from-time');
		//$data['exam_start_am_pm'] = $this->input->post('from-ampm');
		$data['exam_end_time'] = $this->input->post('to-time');
		//$data['exam_end_am_pm'] = $this->input->post('to-ampm');

		// Calculate time duration
		$fromTime = $this->input->post('from-time');
		$fromTimeParts = explode(" ", $fromTime);
		$fromAmPm = $fromTimeParts[1];
		$toTime = $this->input->post('to-time');
		$toTimeParts = explode(" ", $toTime);
		$toAmPm = $toTimeParts[1];


        $duration = $this->calculateDurationInMinutes($fromTime, $fromAmPm, $toTime, $toAmPm);

		$data['exam_duration'] = $duration;
		$this->db->insert('online_exam_details', $data);

		$response = array(
			'status' => true,
			'notification' => get_phrase('exam_created_successfully')
		);
		return json_encode($response);
	}

	// Function for time duration start
	public function convertTo24HourFormat($time, $ampm) {
        list($hours, $minutes) = explode(':', $time);
        $hours = (int)$hours;
        $minutes = (int)$minutes;

        if ($ampm === 'PM' && $hours != 12) {
            $hours += 12;
        } elseif ($ampm === 'AM' && $hours == 12) {
            $hours = 0;
        }

        return sprintf('%02d:%02d', $hours, $minutes);
    }

    public function calculateDurationInMinutes($fromTime, $fromAmPm, $toTime, $toAmPm) {
		date_default_timezone_set('Asia/kolkata'); 
		
        $fromTime24 = $this->convertTo24HourFormat($fromTime, $fromAmPm);
        $toTime24 = $this->convertTo24HourFormat($toTime, $toAmPm);
		

        //$fromDateTime = new DateTime($fromTime24);
        //$toDateTime = new DateTime($toTime24);
		$fromDateTime = new DateTime(date('Y-m-d') . ' ' . $fromTime24);
		$toDateTime = new DateTime(date('Y-m-d') . ' ' . $toTime24);
		//echo "SubmitTTMMZZWW===>"; exit;

        if ($toDateTime < $fromDateTime) {
            $toDateTime->modify('+1 day');
        }

        $interval = $fromDateTime->diff($toDateTime);
        $minutes = ($interval->h * 60) + $interval->i;

        return $minutes;
    }


	public function exam_update($param1 = '')
	{
		$data['name'] = html_escape($this->input->post('exam_name'));
		$data['starting_date'] = strtotime($this->input->post('starting_date'));
		$data['ending_date'] = strtotime($this->input->post('ending_date'));
		$this->db->where('id', $param1);
		$this->db->update('exams', $data);

		$response = array(
			'status' => true,
			'notification' => get_phrase('exam_updated_successfully')
		);
		return json_encode($response);
	}

	public function exam_delete($param1 = '')
	{
		$this->db->where('id', $param1);
		$this->db->delete('exams');

		$response = array(
			'status' => true,
			'notification' => get_phrase('exam_deleted_successfully')
		);
		return json_encode($response);
	}

	// online examp details delete
	public function online_exam_delete($param1 = '')
	{
		$this->db->where('id', $param1);
		$this->db->delete('online_exam_details');

		$response = array(
			'status' => true,
			'notification' => get_phrase('exam_deleted_successfully')
		);
		return json_encode($response);
	}

	public function get_exam_by_id($exam_id = "") {
		return $this->db->get_where('exams', array('id' => $exam_id))->row_array();
	}
	//END EXAM section
    
    //Cumulative Grades
    public function get_students_by_class_and_section($class_id, $section_id) {
    $this->db->where('class_id', $class_id);
    $this->db->where('section_id', $section_id);
    $this->db->where('school_id', $this->school_id);
    $this->db->where('session', active_session());
    return $this->db->get('enrols')->result_array();
    }


	//START MARKS section
	public function get_marks($class_id = "", $section_id = "", $subject_id = "", $exam_id = "") {
		$checker = array(
			'class_id' => $class_id,
			'section_id' => $section_id,
			'subject_id' => $subject_id,
			'exam_id' => $exam_id,
			'school_id' => $this->school_id,
			'session' => $this->active_session
		);
		$this->db->where($checker);
		return $this->db->get('marks');
	}
	public function mark_insert($class_id = "", $section_id = "", $subject_id = "", $exam_id = "") {
		$student_enrolments = $this->user_model->student_enrolment($section_id)->result_array();
		foreach ($student_enrolments as $student_enrolment) {
			$checker = array(
				'student_id' => $student_enrolment['student_id'],
				'class_id' => $class_id,
				'section_id' => $section_id,
				'subject_id' => $subject_id,
				'exam_id' => $exam_id,
				'school_id' => $this->school_id,
				'session' => $this->active_session
			);
			$this->db->where($checker);
			$number_of_rows = $this->db->get('marks')->num_rows();
			if($number_of_rows == 0) {
				$this->db->insert('marks', $checker);
			}
		}
	}

	public function mark_update(){
		$data['student_id'] = html_escape($this->input->post('student_id'));
		$data['class_id'] = html_escape($this->input->post('class_id'));
		$data['section_id'] = html_escape($this->input->post('section_id'));
		$data['subject_id'] = html_escape($this->input->post('subject_id'));
		$data['exam_id'] = html_escape($this->input->post('exam_id'));
		$data['mark_obtained'] = html_escape($this->input->post('mark'));
		$data['comment'] = html_escape($this->input->post('comment'));
		$data['school_id'] = $this->school_id;
		$data['session'] = $this->active_session;
		$query = $this->db->get_where('marks', array('student_id' => $data['student_id'], 'class_id' => $data['class_id'], 'section_id' => $data['section_id'], 'subject_id' => $data['subject_id'], 'exam_id' => $data['exam_id'], 'session' => $data['session'], 'school_id' => $data['school_id']));
		if($query->num_rows() > 0){
			$update_data['mark_obtained'] = html_escape($this->input->post('mark'));
			$update_data['comment'] = html_escape($this->input->post('comment'));
			$row = $query->row();
			$this->db->where('id', $row->id);
			$this->db->update('marks', $update_data);
		}else{
			$this->db->insert('marks', $data);
		}
	}
	//END MARKS section

	// Grade creation
	public function grade_create() {
		$data['name'] = html_escape($this->input->post('grade'));
		$data['grade_point'] = htmlspecialchars($this->input->post('grade_point'));
		$data['mark_from'] = htmlspecialchars($this->input->post('mark_from'));
		$data['mark_upto'] = htmlspecialchars($this->input->post('mark_upto'));
		$data['school_id'] = $this->school_id;
		$data['session'] = $this->active_session;
		$this->db->insert('grades', $data);

		$response = array(
			'status' => true,
			'notification' => get_phrase('grade_added_successfully')
		);
		return json_encode($response);
	}

	public function grade_update($id = "") {
		$data['name'] = html_escape($this->input->post('grade'));
		$data['grade_point'] = htmlspecialchars($this->input->post('grade_point'));
		$data['mark_from'] = htmlspecialchars($this->input->post('mark_from'));
		$data['mark_upto'] = htmlspecialchars($this->input->post('mark_upto'));
		$data['school_id'] = $this->school_id;
		$data['session'] = $this->active_session;

		$this->db->where('id', $id);
		$this->db->update('grades', $data);

		$response = array(
			'status' => true,
			'notification' => get_phrase('grade_updated_successfully')
		);
		return json_encode($response);
	}

	public function grade_delete($id = '')
	{
		$this->db->where('id', $id);
		$this->db->delete('grades');
		$response = array(
			'status' => true,
			'notification' => get_phrase('grade_deleted_successfully')
		);
		return json_encode($response);
	}
	// Grade ends

	// Student Promotion section Starts
	public function get_student_list() {
		$session_from = htmlspecialchars($this->input->post('session_from'));
		$session_to = htmlspecialchars($this->input->post('session_to'));
		$class_id_from = htmlspecialchars($this->input->post('class_id_from'));
		$class_id_to = htmlspecialchars($this->input->post('class_id_to'));
		$checker = array(
			'class_id' => $class_id_from,
			'session' => $session_from,
			'school_id' => $this->school_id
		);
		return $this->db->get_where('enrols', $checker);
	}

	//promote student
	public function promote_student($promotion_data = "") {
		$promotion_data = explode('-', $promotion_data);
		$enroll_id = $promotion_data[0];
		$class_id = $promotion_data[1];
		$session_id = $promotion_data[2];
		$enroll = $this->db->get_where('enrols', array('id' => $enroll_id))->row_array();
		$enroll['class_id'] = $class_id;
		$enroll['session'] = $session_id;
		$first_section_details = $this->db->get_where('sections', array('class_id' => $class_id))->row_array();
		$enroll['section_id'] = $first_section_details['id'];
		$this->db->where('id', $enroll_id);
		$this->db->update('enrols', $enroll);
		return true;
	}
	// Student Promotion section Ends

    // Get Student Details
    public function get_students_by_class($class_id, $section_id = null) {
    $this->db->select('s.*');
    $this->db->from('students s');
    $this->db->join('enrols e', 'e.student_id = s.id');
    $this->db->where('e.class_id', $class_id);
    if ($section_id) {
        $this->db->where('e.section_id', $section_id);
    }
        return $this->db->get()->result_array();
    }


	//STUDENT ACCOUNTING SECTION STARTS
	public function get_invoice_by_id($id = "") {
		return $this->db->get_where('invoices', array('id' => $id))->row_array();
	}

	public function get_invoice_by_date_range($date_from = "", $date_to = "", $selected_class = "", $selected_status = "") {
		if ($selected_class != "all") {
			$this->db->where('class_id', $selected_class);
		}
		if ($selected_status != "all") {
			$this->db->where('status', $selected_status);
		}
		$this->db->where('created_at >=', $date_from);
		$this->db->where('created_at <=', $date_to);
		$this->db->where('school_id', $this->school_id);
		$this->db->where('session', $this->active_session);
		return $this->db->get('invoices');
	}

	public function get_invoice_by_student_id($student_id = "") {
		$this->db->where('school_id', $this->school_id);
		$this->db->where('session', $this->active_session);
		$this->db->where('student_id', $student_id);
		return $this->db->get('invoices');
	}

	// This function will be triggered if parent logs in
	public function get_invoice_by_parent_id() {
		$parent_user_id = $this->session->userdata('user_id');
		$parent_data = $this->db->get_where('parents', array('user_id' => $parent_user_id))->row_array();
		$student_list = $this->user_model->get_student_list_of_logged_in_parent();
		$student_ids = array();
		foreach ($student_list as $student) {
			if(!in_array($student['student_id'], $student_ids)){
				array_push($student_ids, $student['student_id']);
			}
		}

		if (count($student_ids) > 0) {
			$this->db->where_in('student_id', $student_ids);
			$this->db->where('school_id', $this->school_id);
			$this->db->where('session', $this->active_session);
			return $this->db->get('invoices')->result_array();
		}else{
			return array();
		}
	}

	public function create_single_invoice() {
		$data['title'] = htmlspecialchars($this->input->post('title'));
		$data['total_amount'] = htmlspecialchars($this->input->post('total_amount'));
		$data['class_id'] = htmlspecialchars($this->input->post('class_id'));
		$data['student_id'] = htmlspecialchars($this->input->post('student_id'));
		$data['paid_amount'] = htmlspecialchars($this->input->post('paid_amount'));
		$data['status'] = htmlspecialchars($this->input->post('status'));
		$data['school_id'] = $this->school_id;
		$data['session'] = $this->active_session;
		$data['created_at'] = strtotime(date('d-M-Y'));

		/*KEEPING TRACK OF PAYMENT DATE*/
		if ($this->input->post('paid_amount') > 0) {
			$data['updated_at'] = strtotime(date('d-M-Y'));
		}

		
		$this->db->insert('invoices', $data);
		if($data['status'] == 'paid' || $data['status'] == 'partialy'){
		   $insert_data['date'] = strtotime(date('d-M-Y'));
		   $insert_data['income_category_id'] = '1';
		   $insert_data['school_id'] = $this->school_id;
		   $insert_data['session'] = $this->active_session;
		   $insert_data['created_at'] = strtotime(date('d-M-Y'));
		   $insert_data['amount'] = $data['paid_amount'];
		   $this->db->insert('income_manager', $insert_data);
		}

		$response = array(
			'status' => true,
			'notification' => get_phrase('invoice_added_successfully')
		);
		return json_encode($response);
	}

	public function create_mass_invoice() {
		$data['total_amount'] = htmlspecialchars($this->input->post('total_amount'));
		$data['paid_amount'] = htmlspecialchars($this->input->post('paid_amount'));
		$data['status'] = htmlspecialchars($this->input->post('status'));
		if ($data['total_amount'] == $data['paid_amount']) {
			$data['status'] = 'paid';
		}
		$data['title'] = htmlspecialchars($this->input->post('title'));
		$data['class_id'] = htmlspecialchars($this->input->post('class_id'));
		$data['school_id'] = $this->school_id;
		$data['session'] = $this->active_session;
		$data['created_at'] = strtotime(date('d-M-Y'));

		/*KEEPING TRACK OF PAYMENT DATE*/
		if ($this->input->post('paid_amount') > 0) {
			$data['updated_at'] = strtotime(date('d-M-Y'));
		}

		$enrolments = $this->user_model->get_student_details_by_id('section', htmlspecialchars($this->input->post('section_id')));
		foreach ($enrolments as $enrolment) {
			$data['student_id'] = $enrolment['student_id'];
			$this->db->insert('invoices', $data);
			if($data['status'] == 'paid' || $data['status'] == 'partialy'){
			   $insert_data['date'] = strtotime(date('d-M-Y'));
			   $insert_data['income_category_id'] = '1';
			   $insert_data['school_id'] = $this->school_id;
			   $insert_data['session'] = $this->active_session;
			   $insert_data['created_at'] = strtotime(date('d-M-Y'));
			   $insert_data['amount'] = $data['paid_amount'];
			   $this->db->insert('income_manager', $insert_data);
		   }
		}

		if (sizeof($enrolments) > 0) {
			$response = array(
				'status' => true,
				'notification' => get_phrase('invoice_added_successfully')
			);
		}else{
			$response = array(
				'status' => false,
				'notification' => get_phrase('no_student_found')
			);
		}
		return json_encode($response);
	}

	public function update_invoice($id = "") {

		/*GET THE PREVIOUS INVOICE DETAILS FOR GETTING THE PAID AMOUNT*/
		$previous_invoice_data = $this->db->get_where('invoices', array('id' => $id))->row_array();

		$data['title'] = htmlspecialchars($this->input->post('title'));
		$data['total_amount'] = htmlspecialchars($this->input->post('total_amount'));
		$data['class_id'] = htmlspecialchars($this->input->post('class_id'));
		$data['student_id'] = htmlspecialchars($this->input->post('student_id'));
		$data['paid_amount'] = htmlspecialchars($this->input->post('paid_amount'));
		$data['status'] = htmlspecialchars($this->input->post('status'));

		if ($data['paid_amount'] > $data['total_amount']) {
			$response = array(
				'status' => false,
				'notification' => get_phrase('paid_amount_can_not_get_bigger_than_total_amount')
			);
			return json_encode($response);
		}
		if ($data['status'] == 'paid' && $data['total_amount'] != $data['paid_amount']) {
			$response = array(
				'status' => false,
				'notification' => get_phrase('paid_amount_is_not_equal_to_total_amount')
			);
			return json_encode($response);
		}

		if ($data['total_amount'] == $data['paid_amount']) {
			$data['status'] = 'paid';
		}

		/*KEEPING TRACK OF PAYMENT DATE*/
		if ($this->input->post('paid_amount') != $previous_invoice_data && $this->input->post('paid_amount') > 0) {
			$data['updated_at'] = strtotime(date('d-M-Y'));
		}elseif ($this->input->post('paid_amount') == 0 || $this->input->post('paid_amount') == "") {
			$data['updated_at'] = 0;
		}

		$this->db->where('id', $id);
		$this->db->update('invoices', $data);

		$response = array(
			'status' => true,
			'notification' => get_phrase('invoice_updated_successfully')
		);
		return json_encode($response);
	}

	public function delete_invoice($id = "") {
		$this->db->where('id', $id);
		$this->db->delete('invoices');

		$response = array(
			'status' => true,
			'notification' => get_phrase('invoice_deleted_successfully')
		);
		return json_encode($response);
	}
	//STUDENT ACCOUNTING SECTION ENDS

	//Expense Category Starts
	public function get_expense_categories($id = "") {
		if ($id > 0) {
			$this->db->where('id', $id);
		}
		$this->db->where('school_id', $this->school_id);
		$this->db->where('session', $this->active_session);
		return $this->db->get('expense_categories');
	}
	public function create_expense_category() {
		$data['name'] = htmlspecialchars($this->input->post('name'));
		$data['school_id'] = $this->school_id;
		$data['session'] = $this->active_session;
		$this->db->insert('expense_categories', $data);
		$response = array(
			'status' => true,
			'notification' => get_phrase('expense_category_added_successfully')
		);
		return json_encode($response);
	}

	public function update_expense_category($id) {
		$data['name'] = htmlspecialchars($this->input->post('name'));
		$this->db->where('id', $id);
		$this->db->update('expense_categories', $data);
		$response = array(
			'status' => true,
			'notification' => get_phrase('expense_category_updated_successfully')
		);
		return json_encode($response);
	}

	public function delete_expense_category($id) {
		$this->db->where('id', $id);
		$this->db->delete('expense_categories');
		$response = array(
			'status' => true,
			'notification' => get_phrase('expense_category_deleted_successfully')
		);
		return json_encode($response);
	}
	//Expense Category Ends

	//Expense Manager Starts
	public function get_expense_by_id($id = "") {
		return $this->db->get_where('expenses', array('id' => $id))->row_array();
	}

	public function get_expense($date_from = "", $date_to = "", $expense_category_id = "") {
		if ($expense_category_id > 0) {
			$this->db->where('expense_category_id', $expense_category_id);
		}
		$this->db->where('date >=', $date_from);
		$this->db->where('date <=', $date_to);
		$this->db->where('school_id', $this->school_id);
		$this->db->where('session', $this->active_session);
		return $this->db->get('expenses');
	}

	// creating
	public function create_expense() {
		$data['date'] = strtotime($this->input->post('date'));
		$data['amount'] = htmlspecialchars($this->input->post('amount'));
		$data['expense_category_id'] = htmlspecialchars($this->input->post('expense_category_id'));
		$data['school_id'] = $this->school_id;
		$data['session'] = $this->active_session;
		$data['created_at'] = strtotime(date('d-M-Y'));
		$this->db->insert('expenses', $data);

		$response = array(
			'status' => true,
			'notification' => get_phrase('expense_added_successfully')
		);
		return json_encode($response);
	}

	// updating
	public function update_expense($id = "") {
		$data['date'] = strtotime($this->input->post('date'));
		$data['amount'] = htmlspecialchars($this->input->post('amount'));
		$data['expense_category_id'] = htmlspecialchars($this->input->post('expense_category_id'));
		$data['school_id'] = $this->school_id;
		$data['session'] = $this->active_session;
		$this->db->where('id', $id);
		$this->db->update('expenses', $data);

		$response = array(
			'status' => true,
			'notification' => get_phrase('expense_updated_successfully')
		);
		return json_encode($response);
	}

	// deleting
	public function delete_expense($id = "") {
		$this->db->where('id', $id);
		$this->db->delete('expenses');

		$response = array(
			'status' => true,
			'notification' => get_phrase('expense_deleted_successfully')
		);
		return json_encode($response);
	}
	// Expense Manager Ends

	// PROVIDE ENTRY AFTER PAYMENT SUCCESS
	public function payment_success($data = array()) {
		$this->db->where('id', $data['invoice_id']);
		$invoice_details = $this->db->get('invoices')->row_array();
		$due_amount = $invoice_details['total_amount'] - $invoice_details['paid_amount'];
		if ($due_amount == $data['amount_paid']) {
			$updater = array(
				'status' => 'paid',
				'payment_method' => $data['payment_method'],
				'paid_amount' => $data['amount_paid'] + $invoice_details['paid_amount'],
				'updated_at'  => strtotime(date('d-M-Y'))
			);
			$this->db->where('id', $data['invoice_id']);
			$this->db->update('invoices', $updater);
		}
	}

	// Back Office Section Starts
	public function get_session($id = "") {
		if ($id > 0) {
			$this->db->where('id', $id);
		}
		$sessions = $this->db->get('sessions');
		return $sessions;
	}

	// Book Manager
	public function get_books() {
		$checker = array(
			'session' => $this->active_session,
			'school_id' => $this->school_id
		);
		return $this->db->get_where('books', $checker);
	}

	public function get_book_by_id($id = "") {
		return $this->db->get_where('books', array('id' => $id))->row_array();
	}

	public function create_book() {
		$data['name']      = htmlspecialchars($this->input->post('name'));
		$data['author']    = htmlspecialchars($this->input->post('author'));
		$data['copies']    = htmlspecialchars($this->input->post('copies'));
		$data['school_id'] = $this->school_id;
		$data['session']   = $this->active_session;
		$this->db->insert('books', $data);

		$response = array(
			'status' => true,
			'notification' => get_phrase('books_added_successfully')
		);
		return json_encode($response);
	}

	public function update_book($id = "") {
		$data['name']      = htmlspecialchars($this->input->post('name'));
		$data['author']    = htmlspecialchars($this->input->post('author'));
		$data['copies']    = htmlspecialchars($this->input->post('copies'));
		$data['school_id'] = $this->school_id;
		$data['session']   = $this->active_session;

		$this->db->where('id', $id);
		$this->db->update('books', $data);

		$response = array(
			'status' => true,
			'notification' => get_phrase('books_updated_successfully')
		);
		return json_encode($response);
	}

	public function delete_book($id = "") {
		$this->db->where('id', $id);
		$this->db->delete('books');

		$response = array(
			'status' => true,
			'notification' => get_phrase('books_deleted_successfully')
		);
		return json_encode($response);
	}

	// Book Issue
	public function get_book_issues($date_from = "", $date_to = "") {
		$this->db->where('session', $this->active_session);
		$this->db->where('school_id', $this->school_id);
		$this->db->where('issue_date >=', $date_from);
		$this->db->where('issue_date <=', $date_to);
		return $this->db->get('book_issues');
	}
	public function get_book_issues_by_student_id($student_id = "") {
		$this->db->where('student_id', $student_id);
		return $this->db->get('book_issues');
	}

	public function get_book_issue_by_id($id = "") {
		return $this->db->get_where('book_issues', array('id' => $id))->row_array();
	}

	public function create_book_issue() {
		$data['book_id']    = htmlspecialchars($this->input->post('book_id'));
		$data['class_id']   = htmlspecialchars($this->input->post('class_id'));
		$data['student_id'] = htmlspecialchars($this->input->post('student_id'));
		$data['issue_date'] = strtotime($this->input->post('issue_date'));
		$data['school_id'] = $this->school_id;
		$data['session']   = $this->active_session;

		$this->db->insert('book_issues', $data);

		$response = array(
			'status' => true,
			'notification' => get_phrase('added_successfully')
		);
		return json_encode($response);
	}

	public function update_book_issue($id = "") {
		$data['book_id']    = htmlspecialchars($this->input->post('book_id'));
		$data['class_id']   = htmlspecialchars($this->input->post('class_id'));
		$data['student_id'] = htmlspecialchars($this->input->post('student_id'));
		$data['issue_date'] = strtotime($this->input->post('issue_date'));
		$data['school_id'] = $this->school_id;
		$data['session']   = $this->active_session;

		$this->db->where('id', $id);
		$this->db->update('book_issues', $data);

		$response = array(
			'status' => true,
			'notification' => get_phrase('updated_successfully')
		);
		return json_encode($response);
	}

	public function return_issued_book($id = "") {
		$data['status']   = 1;

		$this->db->where('id', $id);
		$this->db->update('book_issues', $data);

		$response = array(
			'status' => true,
			'notification' => get_phrase('returned_successfully')
		);
		return json_encode($response);
	}

	public function get_number_of_issued_book_by_id($id) {
		return $this->db->get_where('book_issues', array('book_id' => $id, 'status' => 0))->num_rows();
	}

	public function delete_book_issue($id = "") {
		$this->db->where('id', $id);
		$this->db->delete('book_issues');

		$response = array(
			'status' => true,
			'notification' => get_phrase('deleted_successfully')
		);
		return json_encode($response);
	}

	//SCHOOL DETAILS
	public function get_schools() {
		if (!addon_status('multi-school')) {
			$this->db->where('id', school_id());
		}
		$schools = $this->db->get('schools');
		return $schools;
	}
	public function get_school_details_by_id($school_id = "") {
		return $this->db->get_where('schools', array('id' => $school_id))->row_array();
	}
	// Back Office Section Ends
	
	
	//Homework marks section
    public function get_homeworks($exam_id = "", $class_id = "", $section_id = "", $subject_id = "") {
        $checker = array(
            'exam_id' => $exam_id,
            'class_id' => $class_id,
            'section_id' => $section_id,
            'subject_id' => $subject_id,
            'school_id' => $this->school_id,
            'session' => $this->active_session
        );
        $this->db->where($checker);
        return $this->db->get('homework');
    }
    
    public function homework_mark_insert($exam_id = "", $class_id = "", $section_id = "", $subject_id = "") {
        $student_enrolments = $this->user_model->student_enrolment($section_id)->result_array();
        foreach ($student_enrolments as $student_enrolment) {
            $checker = array(
                'student_id' => $student_enrolment['student_id'],
                'class_id' => $class_id,
                'section_id' => $section_id,
                'subject_id' => $subject_id,
                'exam_id' => $exam_id,
                'school_id' => $this->school_id,
                'session' => $this->active_session
            );
            $this->db->where($checker);
            $number_of_rows = $this->db->get('homework')->num_rows();
            if($number_of_rows == 0) {
                $this->db->insert('homework', $checker);
            }
        }
    }
    
    public function homework_mark_update(){
        $data['student_id'] = html_escape($this->input->post('student_id'));
        $data['class_id'] = html_escape($this->input->post('class_id'));
        $data['section_id'] = html_escape($this->input->post('section_id'));
        $data['subject_id'] = html_escape($this->input->post('subject_id'));
        $data['exam_id'] = html_escape($this->input->post('exam_id'));
        $data['mark_obtained'] = html_escape($this->input->post('mark'));
        $data['comment'] = html_escape($this->input->post('comment'));
        $data['school_id'] = $this->school_id;
        $data['session'] = $this->active_session;
        $query = $this->db->get_where('homework', array('student_id' => $data['student_id'], 'class_id' => $data['class_id'], 'section_id' => $data['section_id'], 'subject_id' => $data['subject_id'], 'exam_id' => $data['exam_id'], 'session' => $data['session'], 'school_id' => $data['school_id']));
        if($query->num_rows() > 0){
            $update_data['mark_obtained'] = html_escape($this->input->post('mark'));
            $update_data['comment'] = html_escape($this->input->post('comment'));
            $row = $query->row();
            $this->db->where('id', $row->id);
            $this->db->update('homework', $update_data);
        }else{
            $this->db->insert('homework', $data);
        }
    }
    // HOMEWORK MARKS SECTION ENDS


	// GET INSTALLED ADDONS
	public function get_addons($unique_identifier = "") {
		if ($unique_identifier != "") {
			$addons = $this->db->get_where('addons', array('unique_identifier' => $unique_identifier));
		}else{
			$addons = $this->db->get_where('addons');
		}
		return $addons;
	}

	// A function to convert excel to csv
	public function excel_to_csv($file_path = "", $rename_to = "") {
		//read file from path
		$inputFileType = PHPExcel_IOFactory::identify($file_path);
		$objReader = PHPExcel_IOFactory::createReader($inputFileType);
		$objPHPExcel = $objReader->load($file_path);
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'CSV');
		$index = 0;
		if ($objPHPExcel->getSheetCount() > 1) {
			foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) {
				$objPHPExcel->setActiveSheetIndex($index);
				$fileName = strtolower(str_replace(array("-"," "), "_", $worksheet->getTitle()));
				$outFile = str_replace(".", "", $fileName) .".csv";
				$objWriter->setSheetIndex($index);
				$objWriter->save("assets/csv_file/".$outFile);
				$index++;
			}
		}else{
			$outFile = $rename_to;
			$objWriter->setSheetIndex($index);
			$objWriter->save("assets/csv_file/".$outFile);
		}

		return true;
	}

	public function check_recaptcha(){
        if (isset($_POST["g-recaptcha-response"])) {
            $url = 'https://www.google.com/recaptcha/api/siteverify';
            $data = array(
                'secret' => get_common_settings('recaptcha_secretkey'),
                'response' => $_POST["g-recaptcha-response"]
            );
                $query = http_build_query($data);
                $options = array(
                'http' => array (
                    'header' => "Content-Type: application/x-www-form-urlencoded\r\n".
                        "Content-Length: ".strlen($query)."\r\n".
                        "User-Agent:MyAgent/1.0\r\n",
                    'method' => 'POST',
                    'content' => $query
                )
            );
            $context  = stream_context_create($options);
            $verify = file_get_contents($url, false, $context);
            $captcha_success = json_decode($verify);
            if ($captcha_success->success == false) {
                return false;
            } else if ($captcha_success->success == true) {
                return true;
            }
        } else {
            return false;
        }
    }
    public function quiz_create()
	{
		$data['quarter_id'] = html_escape($this->input->post('quarter_id')); 
		$data['quarter_set_id'] = html_escape($this->input->post('quarter_set_id'));
		$data['class_id'] = html_escape($this->input->post('class_id'));
		$data['school_id'] = html_escape($this->input->post('school_id'));
		$data['subject_id'] = html_escape($this->input->post('subject_id'));
		$data['questions'] = html_escape($this->input->post('questions'));
		$data['answers1'] = html_escape($this->input->post('answers1'));
		$data['answers2'] = html_escape($this->input->post('answers2'));
		$data['answers3'] = html_escape($this->input->post('answers3'));
		$data['answers4'] = html_escape($this->input->post('answers4'));

		$correct_answer_number = $this->input->post('correct_answer');
		// Concatenate 'answers' with the value of the variable
		$correctVariable = 'answers' . $correct_answer_number;

		// Use the concatenated variable name in the html_escape function
		$correct_answer_value = html_escape($this->input->post($correctVariable));
		$data['correct_answer'] = $correct_answer_value;

		$this->db->insert('quiz', $data);

		$response = array(
			'status' => true,
			'notification' => get_phrase('quiz_has_been_added_successfully')
		);

		return json_encode($response);
	}
	public function quiz_update($param1 = '')
	{
		$data['quarter_id'] = html_escape($this->input->post('quarter_id'));
		$data['quarter_set_id'] = html_escape($this->input->post('quarter_set_id'));
		$data['class_id'] = html_escape($this->input->post('class_id'));
		$data['subject_id'] = html_escape($this->input->post('subject_id'));
		$data['questions'] = html_escape($this->input->post('questions'));
		$data['answers1'] = html_escape($this->input->post('answers1'));
		$data['answers2'] = html_escape($this->input->post('answers2'));
		$data['answers3'] = html_escape($this->input->post('answers3'));
		$data['answers4'] = html_escape($this->input->post('answers4'));

		$correct_answer_number = $this->input->post('correct_answer');
		// Concatenate 'answers' with the value of the variable
		$correctVariable = 'answers' . $correct_answer_number;

		// Use the concatenated variable name in the html_escape function
		$correct_answer_value = html_escape($this->input->post($correctVariable));
		$data['correct_answer'] = $correct_answer_value;

		$this->db->where('id', $param1);
		$this->db->update('quiz', $data);

		$response = array(
			'status' => true,
			'notification' => get_phrase('quiz_has_been_updated_successfully')
		);

		return json_encode($response);
	}
	public function quiz_delete($param1 = '')
	{
		$this->db->where('id', $param1);
		$this->db->delete('quiz');

		$response = array(
			'status' => true,
			'notification' => get_phrase('quiz_has_been_deleted_successfully')
		);

		return json_encode($response);
	}
    public function get_homework($exam_id = "",$class_id = "",$section_id = "", $subject_id = "") {
		$checker = array(
			'class_id' => $class_id,
			'section_id' => $section_id,
			'subject_id' => $subject_id,
			'exam_id' => $exam_id,
			'school_id' => $this->school_id,
			'session' => $this->active_session
		);
		$this->db->where($checker);
		return $this->db->get('homework');
	}
	public function classwork_mark_insert($exam_id = "", $class_id = "", $section_id = "", $subject_id = "") {
        $student_enrolments = $this->user_model->student_enrolment($section_id)->result_array();
        foreach ($student_enrolments as $student_enrolment) {
            $checker = array(
                'student_id' => $student_enrolment['student_id'],
                'class_id' => $class_id,
                'section_id' => $section_id,
                'subject_id' => $subject_id,
                'exam_id' => $exam_id,
                'school_id' => $this->school_id,
                'session' => $this->active_session
            );
            $this->db->where($checker);
            $number_of_rows = $this->db->get('classwork')->num_rows();
            if($number_of_rows == 0) {
                $this->db->insert('classwork', $checker);
            }
        }
    }
	// add student in 'quiz_marks' table 
	public function quiz_exam_mark_insert($exam_id = "", $class_id = "", $section_id = "", $subject_id = "") {
        $student_enrolments = $this->user_model->student_enrolment($section_id)->result_array();
        foreach ($student_enrolments as $student_enrolment) {
            $checker = array(
                'student_id' => $student_enrolment['student_id'],
                'class_id' => $class_id,
                'section_id' => $section_id,
                'subject_id' => $subject_id,
                'exam_id' => $exam_id,
                'school_id' => $this->school_id,
                'session' => $this->active_session
            );
            $this->db->where($checker);
            $number_of_rows = $this->db->get('quiz_marks')->num_rows();
            if($number_of_rows == 0) {
                $this->db->insert('quiz_marks', $checker);
            }
        }
    }

	public function get_quiz_mark($exam_id = "",$class_id = "",$section_id = "", $subject_id = "") {
		$checker = array(
			'class_id' => $class_id,
			'section_id' => $section_id,
			'subject_id' => $subject_id,
			'exam_id' => $exam_id,
			'school_id' => $this->school_id,
			'session' => $this->active_session
		);
		$this->db->where($checker);
		return $this->db->get('quiz_marks');
	}

	public function quiz_mark_update(){
        $data['student_id'] = html_escape($this->input->post('student_id'));
        $data['class_id'] = html_escape($this->input->post('class_id'));
        $data['section_id'] = html_escape($this->input->post('section_id'));
        $data['subject_id'] = html_escape($this->input->post('subject_id'));
        $data['exam_id'] = html_escape($this->input->post('exam_id'));
        $data['mark_obtained'] = html_escape($this->input->post('mark'));
        $data['comment'] = html_escape($this->input->post('comment'));
        $data['school_id'] = $this->school_id;
        $data['session'] = $this->active_session;
        $query = $this->db->get_where('quiz_marks', array('student_id' => $data['student_id'], 'class_id' => $data['class_id'], 'section_id' => $data['section_id'], 'subject_id' => $data['subject_id'], 'exam_id' => $data['exam_id'], 'session' => $data['session'], 'school_id' => $data['school_id']));
        if($query->num_rows() > 0){
            $update_data['mark_obtained'] = html_escape($this->input->post('mark'));
            $update_data['comment'] = html_escape($this->input->post('comment'));
            $row = $query->row();
            $this->db->where('id', $row->id);
            $this->db->update('quiz_marks', $update_data);
        }else{
            $this->db->insert('quiz_marks', $data);
        }
    }

    public function get_classwork($exam_id = "",$class_id = "",$section_id = "", $subject_id = "") {
		$checker = array(
			'class_id' => $class_id,
			'section_id' => $section_id,
			'subject_id' => $subject_id,
			'exam_id' => $exam_id,
			'school_id' => $this->school_id,
			'session' => $this->active_session
		);
		$this->db->where($checker);
		return $this->db->get('classwork');
	}
	 public function classwork_mark_update(){
        $data['student_id'] = html_escape($this->input->post('student_id'));
        $data['class_id'] = html_escape($this->input->post('class_id'));
        $data['section_id'] = html_escape($this->input->post('section_id'));
        $data['subject_id'] = html_escape($this->input->post('subject_id'));
        $data['exam_id'] = html_escape($this->input->post('exam_id'));
        $data['mark_obtained'] = html_escape($this->input->post('mark'));
        $data['comment'] = html_escape($this->input->post('comment'));
        $data['school_id'] = $this->school_id;
        $data['session'] = $this->active_session;
        $query = $this->db->get_where('classwork', array('student_id' => $data['student_id'], 'class_id' => $data['class_id'], 'section_id' => $data['section_id'], 'subject_id' => $data['subject_id'], 'exam_id' => $data['exam_id'], 'session' => $data['session'], 'school_id' => $data['school_id']));
        if($query->num_rows() > 0){
            $update_data['mark_obtained'] = html_escape($this->input->post('mark'));
            $update_data['comment'] = html_escape($this->input->post('comment'));
            $row = $query->row();
            $this->db->where('id', $row->id);
            $this->db->update('classwork', $update_data);
        }else{
            $this->db->insert('classwork', $data);
        }
    }
     public function project_mark_insert($exam_id = "", $class_id = "", $section_id = "", $subject_id = "") {
        $student_enrolments = $this->user_model->student_enrolment($section_id)->result_array();
        foreach ($student_enrolments as $student_enrolment) {
            $checker = array(
                'student_id' => $student_enrolment['student_id'],
                'class_id' => $class_id,
                'section_id' => $section_id,
                'subject_id' => $subject_id,
                'exam_id' => $exam_id,
                'school_id' => $this->school_id,
                'session' => $this->active_session
            );
            $this->db->where($checker);
            $number_of_rows = $this->db->get('project')->num_rows();
            if($number_of_rows == 0) {
                $this->db->insert('project', $checker);
            }
        }
    }
    public function get_project($exam_id = "",$class_id = "",$section_id = "", $subject_id = "") {
		$checker = array(
			'class_id' => $class_id,
			'section_id' => $section_id,
			'subject_id' => $subject_id,
			'exam_id' => $exam_id,
			'school_id' => $this->school_id,
			'session' => $this->active_session
		);
		$this->db->where($checker);
		return $this->db->get('project');
	}
	public function project_mark_update(){
        $data['student_id'] = html_escape($this->input->post('student_id'));
        $data['class_id'] = html_escape($this->input->post('class_id'));
        $data['section_id'] = html_escape($this->input->post('section_id'));
        $data['subject_id'] = html_escape($this->input->post('subject_id'));
        $data['exam_id'] = html_escape($this->input->post('exam_id'));
        $data['mark_obtained'] = html_escape($this->input->post('mark'));
        $data['comment'] = html_escape($this->input->post('comment'));
        $data['school_id'] = $this->school_id;
        $data['session'] = $this->active_session;
        $query = $this->db->get_where('project', array('student_id' => $data['student_id'], 'class_id' => $data['class_id'], 'section_id' => $data['section_id'], 'subject_id' => $data['subject_id'], 'exam_id' => $data['exam_id'], 'session' => $data['session'], 'school_id' => $data['school_id']));
        if($query->num_rows() > 0){
            $update_data['mark_obtained'] = html_escape($this->input->post('mark'));
            $update_data['comment'] = html_escape($this->input->post('comment'));
            $row = $query->row();
            $this->db->where('id', $row->id);
            $this->db->update('project', $update_data);
        }else{
            $this->db->insert('project', $data);
        }
    }
     public function behaviour_mark_insert($exam_id = "", $class_id = "", $section_id = "", $subject_id = "") {
        $student_enrolments = $this->user_model->student_enrolment($section_id)->result_array();
        foreach ($student_enrolments as $student_enrolment) {
            $checker = array(
                'student_id' => $student_enrolment['student_id'],
                'class_id' => $class_id,
                'section_id' => $section_id,
                'subject_id' => $subject_id,
                'exam_id' => $exam_id,
                'school_id' => $this->school_id,
                'session' => $this->active_session
            );
            $this->db->where($checker);
            $number_of_rows = $this->db->get('behaviour')->num_rows();
            if($number_of_rows == 0) {
                $this->db->insert('behaviour', $checker);
            }
        }
    }
    public function get_behaviour_marks($exam_id = "",$class_id = "",$section_id = "", $subject_id = "") {
		$checker = array(
			'class_id' => $class_id,
			'section_id' => $section_id,
			'subject_id' => $subject_id,
			'exam_id' => $exam_id,
			'school_id' => $this->school_id,
			'session' => $this->active_session
		);
		$this->db->where($checker);
		return $this->db->get('behaviour');
	}
	public function behaviour_mark_update(){
        $data['student_id'] = html_escape($this->input->post('student_id'));
        $data['class_id'] = html_escape($this->input->post('class_id'));
        $data['section_id'] = html_escape($this->input->post('section_id'));
        $data['subject_id'] = html_escape($this->input->post('subject_id'));
        $data['exam_id'] = html_escape($this->input->post('exam_id'));
        $data['mark_obtained'] = html_escape($this->input->post('mark'));
        $data['comment'] = html_escape($this->input->post('comment'));
        $data['school_id'] = $this->school_id;
        $data['session'] = $this->active_session;
        $query = $this->db->get_where('behaviour', array('student_id' => $data['student_id'], 'class_id' => $data['class_id'], 'section_id' => $data['section_id'], 'subject_id' => $data['subject_id'], 'exam_id' => $data['exam_id'], 'session' => $data['session'], 'school_id' => $data['school_id']));
        if($query->num_rows() > 0){
            $update_data['mark_obtained'] = html_escape($this->input->post('mark'));
            $update_data['comment'] = html_escape($this->input->post('comment'));
            $row = $query->row();
            $this->db->where('id', $row->id);
            $this->db->update('behaviour', $update_data);
        }else{
            $this->db->insert('behaviour', $data);
        }
    }

	public function complaints_add()
	{
		$data['class_id'] = html_escape($this->input->post('class_id'));
		$data['section_id'] = html_escape($this->input->post('section_id'));
		$data['student_id'] = html_escape($this->input->post('student_id'));
		$data['teacher_id'] = html_escape($this->input->post('teacher_id'));
		$data['complaint_by'] = html_escape($this->input->post('complaint_by'));
		$data['complaint_date'] = html_escape($this->input->post('complaint_date'));
		$data['complaint_desc'] = html_escape($this->input->post('desc'));
		$data['status'] = html_escape($this->input->post('status'));
		$data['complaint_type'] = html_escape($this->input->post('complaint_type'));


		$this->db->insert('complaint', $data);

		$response = array(
			'status' => true,
			'notification' => get_phrase('complaint_has_been_added_successfully')
		);

		return json_encode($response);
	}
    public function get_complaints_data() {
		return $this->db->get('complaint')->result_array();
	}
    public function complaints_update($param1 = '')
	{
		$data['class_id'] = html_escape($this->input->post('class_id'));
		$data['section_id'] = html_escape($this->input->post('section_id'));
		$data['student_id'] = html_escape($this->input->post('student_id'));
		$data['teacher_id'] = html_escape($this->input->post('teacher_id'));
		$data['complaint_by'] = html_escape($this->input->post('complaint_by'));
		$data['complaint_date'] = html_escape($this->input->post('complaint_date'));
		$data['complaint_desc'] = html_escape($this->input->post('desc'));
		$data['status'] = html_escape($this->input->post('status'));
		$data['complaint_type'] = html_escape($this->input->post('complaint_type'));

		$this->db->where('id', $param1);
		$this->db->update('complaint', $data);

		$response = array(
			'status' => true,
			'notification' => get_phrase('complaint_has_been_updated_successfully')
		);

		return json_encode($response);
	}
  
	// Get online exam question and option list
	public function get_questions($quarter_id,$quarter_set_id,$class_id,$subject_id){
        $this->db->select('questions, answers1, answers2, answers3, answers4');
        $this->db->from('quiz');
		$this->db->where('quarter_id', $quarter_id);
		$this->db->where('quarter_set_id', $quarter_set_id); 
		$this->db->where('class_id', $class_id);
		$this->db->where('subject_id', $subject_id);
        $query = $this->db->get();
        return $query->result();
	}
    public function complaints_delete($param1 = '')
	{
		$this->db->where('id', $param1);
		$this->db->delete('complaint');

		$response = array(
			'status' => true,
			'notification' => get_phrase('complaint_has_been_deleted_successfully')
		);

		return json_encode($response);
	}

	// Get online exam question and option list
	// public function get_questions($quarter_id,$class_id,$subject_id){
    //     $this->db->select('questions, answers1, answers2, answers3, answers4');
    //     $this->db->from('quiz');
	// 	$this->db->where('quarter_id', $quarter_id); 
	// 	$this->db->where('class_id', $class_id);
	// 	$this->db->where('subject_id', $subject_id);
    //     $query = $this->db->get();
    //     return $query->result();
	// }

	// Student online exam status update
	// Student online exam status update
	public function student_online_exam_status_update($loginStudentId, $quarter_id,$quarter_set_id,$class_id, $subject_id, $exam_id, $get_student_answers)
	{
		$checkexam_details = $this->db->get_where('online_exam_result', array('student_id' => $loginStudentId,'exam_id' => $exam_id,'class_id'=>$class_id,'subject_id'=>$subject_id,'quarter_id'=>$quarter_id,'quarter_set_id'=>$quarter_set_id))->row_array(); 
		if(!empty($checkexam_details))
		{

	    // Get correct answer from quiz table working
			$resultData = $this->db->select('correct_answer')->get_where('quiz', array('quarter_id' => $quarter_id, 'quarter_set_id' => $quarter_set_id, 'class_id' => $class_id, 'subject_id' => $subject_id))->result_array();

			$correct_answers = array_map(function($item) {
                return $item['correct_answer'];
            }, $resultData);

			// $checkstudent_ans = $this->db->select('exam_result')->get_where('online_exam_result', array('student_id' => $loginStudentId, 'quarter_id' => $quarter_id, 'exam_id' => $exam_id, 'class_id' => $class_id, 'subject_id' => $subject_id))->row_array(); 
			$originalArray = json_decode($get_student_answers,true);

			// Transform the array
			$student_given_answer = array_map(function($item) {
				return $item === null ? "" : $item;
			}, $originalArray);


			// Get the count of matching elements
			$matching_count = $this->count_matching_elements($correct_answers, $student_given_answer);

			// Update
			$update_data['exam_result'] = $get_student_answers;
			$update_data['exam_status'] = '2'; 
			$update_data['total_marks_obtained'] = $matching_count;
			$this->db->where('id', $checkexam_details['id']);
			$this->db->update('online_exam_result', $update_data);
			

			$response = array(
				'status' => true,
				'get_student_answers' => $get_student_answers,
				'notification' => get_phrase('exam_status_updated_successfully')
			);
			return json_encode($response);
        

		}
		else{
			
        // Insert
		$data['student_id'] = $loginStudentId;
		$data['school_id'] = school_id();
		$data['class_id'] = $class_id;
		$data['subject_id'] = $subject_id;
		$data['exam_id'] = $exam_id;
		$data['quarter_id'] = $quarter_id;
		$data['quarter_set_id'] = $quarter_set_id;
		$data['exam_result'] = $get_student_answers;
		$this->db->insert('online_exam_result', $data);

		$response = array(
			'status' => true,
			'notification' => get_phrase('exam_status_added_successfully')
		);
		return json_encode($response);
		}

	}

	// Answer matching function
	public function count_matching_elements($array1, $array2) {
		$count = 0;
		$length = min(count($array1), count($array2));  // Get the length of the shorter array to avoid out-of-bound errors

		for ($i = 0; $i < $length; $i++) {
			if ($array1[$i] == $array2[$i]) {
				$count++;
			}
		}

		return $count;
    }

    public function routes_add()
	{
		$data['route_title'] = html_escape($this->input->post('route_title'));
		$data['route_fare'] = html_escape($this->input->post('route_fare'));
		
		$this->db->insert('routes', $data);

		$response = array(
			'status' => true,
			'notification' => get_phrase('route_has_been_added_successfully')
		);

		return json_encode($response);
	}
    public function routes_update($param1 = '')
	{
		$data['route_title'] = html_escape($this->input->post('route_title'));
		$data['route_fare'] = html_escape($this->input->post('route_fare'));
		$this->db->where('id', $param1);
		$this->db->update('routes', $data);

		$response = array(
			'status' => true,
			'notification' => get_phrase('route_has_been_updated_successfully')
		);

		return json_encode($response);
	}
    public function routes_delete($param1 = '')
	{
		$this->db->where('id', $param1);
		$this->db->delete('routes');

		$response = array(
			'status' => true,
			'notification' => get_phrase('route_has_been_deleted_successfully')
		);

		return json_encode($response);
	}
	public function vehicle_add()
	{
		$data['vehicle_number'] = html_escape($this->input->post('vehicle_number'));
		$data['vehicle_model'] = html_escape($this->input->post('vehicle_model'));
		$data['vehicle_driver'] = html_escape($this->input->post('vehicle_driver'));
		$data['note'] = html_escape($this->input->post('note'));
		
		$this->db->insert('vehicle', $data);

		$response = array(
			'status' => true,
			'notification' => get_phrase('vehicle_has_been_added_successfully')
		);

		return json_encode($response);
	}
	public function vehicle_update($param1 = '')
	{
		$data['vehicle_number'] = html_escape($this->input->post('vehicle_number'));
		$data['vehicle_model'] = html_escape($this->input->post('vehicle_model'));
		$data['vehicle_driver'] = html_escape($this->input->post('vehicle_driver'));
		$data['note'] = html_escape($this->input->post('note'));
		$this->db->where('id', $param1);
		$this->db->update('vehicle', $data);

		$response = array(
			'status' => true,
			'notification' => get_phrase('vehicle_has_been_updated_successfully')
		);

		return json_encode($response);
	}
	public function vehicle_delete($param1 = '')
	{
		$this->db->where('id', $param1);
		$this->db->delete('vehicle');

		$response = array(
			'status' => true,
			'notification' => get_phrase('vehicle_has_been_deleted_successfully')
		);

		return json_encode($response);
	}
	public function assign_vehicle_add()
	{
		$data['route_id'] = html_escape($this->input->post('route_id'));
		$data['vehicle_id'] = html_escape($this->input->post('vehicle_id'));
		
		$this->db->insert('assignvehicle', $data);

		$response = array(
			'status' => true,
			'notification' => get_phrase('vehicle_has_been_assigned_successfully')
		);

		return json_encode($response);
	}
    public function assign_vehicle_update($param1 = '')
	{
		$data['route_id'] = html_escape($this->input->post('route_id'));
		$data['vehicle_id'] = html_escape($this->input->post('vehicle_id'));
		$this->db->where('id', $param1);
		$this->db->update('assignvehicle', $data);

		$response = array(
			'status' => true,
			'notification' => get_phrase('vehicle_has_been_updated_successfully')
		);

		return json_encode($response);
	}
	public function assign_vehicle_delete($param1 = '')
	{
		$this->db->where('id', $param1);
		$this->db->delete('assignvehicle');

		$response = array(
			'status' => true,
			'notification' => get_phrase('vehicle_has_been_deleted_successfully')
		);

		return json_encode($response);
	}
    public function assign_routes_add()
	{
		$data['route_id'] = html_escape($this->input->post('route_id'));
		$data['user_id'] = html_escape($this->input->post('school_id'));
		$data['role'] = html_escape($this->input->post('type'));

		$this->db->insert('assign_routes', $data);

		$response = array(
			'status' => true,
			'notification' => get_phrase('route_has_been_assigned_successfully')
		);

		return json_encode($response);
	}
    public function assign_routes_update($param1='')
	{
		$data['route_id'] = html_escape($this->input->post('route_id'));
		$this->db->where('id', $param1);		
		$this->db->update('assign_routes', $data);

		$response = array(
			'status' => true,
			'notification' => get_phrase('assign_route_has_been_updated_successfully')
		);

		return json_encode($response);
	}
	public function assign_routes_delete($param1 = '')
	{
		$this->db->where('id', $param1);
		$this->db->delete('assign_routes');

		$response = array(
			'status' => true,
			'notification' => get_phrase('assign_route_has_been_deleted_successfully')
		);

		return json_encode($response);
	}
    public function update_online_exam_data($param1 = '')
	{
		$data['online_exam_name'] = html_escape($this->input->post('online_exam_name'));
		$data['exam_start_date'] = date('Y-m-d', strtotime($this->input->post('exam_start_date')));
		$data['quarter_id'] = $this->input->post('quarter_id');
		$data['quarter_set_id'] = $this->input->post('quarter_set_id');
		$data['school_id'] = $this->input->post('school_id');
		$data['session'] = $this->input->post('session');
		$data['class_id'] = $this->input->post('class_id');
		$data['subject_id'] = $this->input->post('subject_id');
		$data['exam_start_time'] = $this->input->post('from-time');
		//$data['exam_start_am_pm'] = $this->input->post('from-ampm');
		$data['exam_end_time'] = $this->input->post('to-time');
		//$data['exam_end_am_pm'] = $this->input->post('to-ampm');

		// Calculate time duration

		$fromTime = $this->input->post('from-time');
		$fromTimeParts = explode(" ", $fromTime);
		$fromAmPm = $fromTimeParts[1];
		$toTime = $this->input->post('to-time');
		$toTimeParts = explode(" ", $toTime);
		$toAmPm = $toTimeParts[1];

        $duration = $this->calculateDurationInMinutes($fromTime, $fromAmPm, $toTime, $toAmPm);
		$data['exam_duration'] = $duration;
		$this->db->where('id', $param1);
		$this->db->update('online_exam_details', $data);

		$response = array(
			'status' => true,
			'notification' => get_phrase('exam_updated_successfully')
		);
		return json_encode($response);
	}
	public function take_staff_attendance()
	{
		$staffs = $this->input->post('staff_id');
		$data['timestamp'] = strtotime($this->input->post('date'));
		$data['school_id'] = $this->school_id;
		$data['session_id'] = $this->active_session;
		$data['role']=$this->input->post('role');
		$check_data = $this->db->get_where('staff_attendance', array('timestamp' => $data['timestamp'],'session_id' => $data['session_id'], 'school_id' => $data['school_id'],'role'=>$data['role']));
		if($check_data->num_rows() > 0){
			foreach($staffs as $key => $staff):
				$data['status'] = $this->input->post('status-'.$staff);
				$data['staff_id'] = $staff;
				$attendance_id = $this->input->post('attendance_id');
				$this->db->where('id', $attendance_id[$key]);
				$this->db->update('staff_attendance', $data);
			endforeach;
		}else{
			foreach($staffs as $staff):
				$data['status'] = $this->input->post('status-'.$staff);
				$data['staff_id'] = $staff;
				$this->db->insert('staff_attendance', $data);
			endforeach;
		}

		$this->settings_model->last_updated_attendance_data();

		$response = array(
			'status' => true,
			'notification' => get_phrase('attendance_updated_successfully')
		);

		return json_encode($response);
	}
    public function create_income_category() {
		$data['name'] = htmlspecialchars($this->input->post('name'));
		$data['school_id'] = $this->school_id;
		$data['session'] = $this->active_session;
		$this->db->insert('income_categories', $data);
		$response = array(
			'status' => true,
			'notification' => get_phrase('income_category_added_successfully')
		);
		return json_encode($response);
	}
	public function get_income_categories($id = "") {
		if ($id > 0) {
			$this->db->where('id', $id);
		}
		$this->db->where('school_id', $this->school_id);
		$this->db->where('session', $this->active_session);
		return $this->db->get('income_categories');
	}
	
    public function update_income_category($id) {
		$data['name'] = htmlspecialchars($this->input->post('name'));
		$this->db->where('id', $id);
		$this->db->update('income_categories', $data);
		$response = array(
			'status' => true,
			'notification' => get_phrase('income_category_updated_successfully')
		);
		return json_encode($response);
	}
    public function delete_income_category($id) {
		$this->db->where('id', $id);
		$this->db->delete('income_categories');
		$response = array(
			'status' => true,
			'notification' => get_phrase('income_category_deleted_successfully')
		);
		return json_encode($response);
	}
    public function create_income_manager() {
		$data['date'] = strtotime($this->input->post('date'));
		$data['amount'] = htmlspecialchars($this->input->post('amount'));
		$data['income_category_id'] = htmlspecialchars($this->input->post('income_category_id'));
		$data['school_id'] = $this->school_id;
		$data['session'] = $this->active_session;
		$data['created_at'] = strtotime(date('d-M-Y'));
		$this->db->insert('income_manager', $data);

		$response = array(
			'status' => true,
			'notification' => get_phrase('income_added_successfully')
		);
		return json_encode($response);
	}
    public function get_income_manager($date_from = "", $date_to = "", $income_category_id = "") {
		if ($income_category_id > 0) {
			$this->db->where('income_category_id', $income_category_id);
		}
		$this->db->where('date >=', $date_from);
		$this->db->where('date <=', $date_to);
		$this->db->where('school_id', $this->school_id);
		$this->db->where('session', $this->active_session);
		return $this->db->get('income_manager');
	}
    public function get_income_by_id($id = "") {
		return $this->db->get_where('income_manager', array('id' => $id))->row_array();
	}
    public function update_income_manager($id = "") {
		$data['date'] = strtotime($this->input->post('date'));
		$data['amount'] = htmlspecialchars($this->input->post('amount'));
		$data['income_category_id'] = htmlspecialchars($this->input->post('income_category_id'));
		$data['school_id'] = $this->school_id;
		$data['session'] = $this->active_session;
		$this->db->where('id', $id);
		$this->db->update('income_manager', $data);

		$response = array(
			'status' => true,
			'notification' => get_phrase('income_updated_successfully')
		);
		return json_encode($response);
	}
    public function delete_income_manager($id = "") {
		$this->db->where('id', $id);
		$this->db->delete('income_manager');

		$response = array(
			'status' => true,
			'notification' => get_phrase('income_deleted_successfully')
		);
		return json_encode($response);
	}
	public function save_staff_salary() {
		$data['staff_name'] = htmlspecialchars($this->input->post('staff_name'));
		$data['staff_role'] = htmlspecialchars($this->input->post('role'));
		$data['month'] = htmlspecialchars($this->input->post('month'));
		$data['date'] = htmlspecialchars($this->input->post('date'));
		$data['salary_amount'] = htmlspecialchars($this->input->post('salary_amount'));
		$data['status'] = htmlspecialchars($this->input->post('status'));

		$this->db->insert('staff_salary', $data);
		if($data['status'] == '1' || $data['status'] == '3'){
		   $insert_data['date'] = strtotime(date('d-M-Y'));
		   $insert_data['expense_category_id'] = '1';
		   $insert_data['school_id'] = $this->school_id;
		   $insert_data['session'] = $this->active_session;
		   $insert_data['created_at'] = strtotime(date('d-M-Y'));
		   $insert_data['amount'] = $data['salary_amount'];
		   $this->db->insert('expenses', $insert_data);
		}
		$response = array(
			'status' => true,
			'notification' => get_phrase('staff_salary_added_successfully')
		);
		return json_encode($response);
	}
    public function update_staff_salary($id) {
		$data['month'] = htmlspecialchars($this->input->post('month'));
		$data['date'] = htmlspecialchars($this->input->post('date'));
		$data['salary_amount'] = htmlspecialchars($this->input->post('salary_amount'));
		$data['status'] = htmlspecialchars($this->input->post('status'));

		$this->db->where('id', $id);
		$this->db->update('staff_salary', $data);
		$response = array(
			'status' => true,
			'notification' => get_phrase('staff_salary_updated_successfully')
		);
		return json_encode($response);
	}
	public function delete_staff_salary($id) {
		$this->db->where('id', $id);
		$this->db->delete('staff_salary');
		$response = array(
			'status' => true,
			'notification' => get_phrase('staff_salary_deleted_successfully')
		);
		return json_encode($response);
	}
	public function get_student_classwork_marks_parent_login($exam_id = "",$class_id = "",$section_id = "", $subject_id = "") {
		  $parent_id = $this->session->userdata('user_id');
          $parent_data = $this->db->get_where('parents', array('user_id' => $parent_id))->row_array();

		  $this->db->select('c.*,s.user_id');
          $this->db->from('students s');
			$checker = array(
				'c.class_id' => $class_id,
				'c.section_id' => $section_id,
				'c.subject_id' => $subject_id,
				'c.exam_id' => $exam_id,
				'c.school_id' => $this->school_id,
				'c.session' => $this->active_session
			);
			$this->db->where($checker);
	        $this->db->where('s.parent_id', $parent_data['id']);
	        $this->db->join('classwork c','c.student_id =s.id');
			return $this->db->get()->result_array();
	}
    public function get_student_project_marks_parent_login($exam_id = "",$class_id = "",$section_id = "", $subject_id = "") {
		  $parent_id = $this->session->userdata('user_id');
          $parent_data = $this->db->get_where('parents', array('user_id' => $parent_id))->row_array();

		  $this->db->select('p.*,s.user_id');
          $this->db->from('students s');
			$checker = array(
				'p.class_id' => $class_id,
				'p.section_id' => $section_id,
				'p.subject_id' => $subject_id,
				'p.exam_id' => $exam_id,
				'p.school_id' => $this->school_id,
				'p.session' => $this->active_session
			);
			$this->db->where($checker);
	        $this->db->where('s.parent_id', $parent_data['id']);
	        $this->db->join('project p','p.student_id =s.id');
			return $this->db->get()->result_array();
	}
    public function get_student_behaviour_marks_parent_login($exam_id = "",$class_id = "",$section_id = "", $subject_id = "") {
		  $parent_id = $this->session->userdata('user_id');
          $parent_data = $this->db->get_where('parents', array('user_id' => $parent_id))->row_array();

		  $this->db->select('b.*,s.user_id');
          $this->db->from('students s');
			$checker = array(
				'b.class_id' => $class_id,
				'b.section_id' => $section_id,
				'b.subject_id' => $subject_id,
				'b.exam_id' => $exam_id,
				'b.school_id' => $this->school_id,
				'b.session' => $this->active_session
			);
			$this->db->where($checker);
	        $this->db->where('s.parent_id', $parent_data['id']);
	        $this->db->join('behaviour b','b.student_id =s.id');
			return $this->db->get()->result_array();
	}
    public function get_student_homework_marks_parent_login($exam_id = "",$class_id = "",$section_id = "", $subject_id = "") {
		  $parent_id = $this->session->userdata('user_id');
          $parent_data = $this->db->get_where('parents', array('user_id' => $parent_id))->row_array();

		  $this->db->select('h.*,s.user_id');
          $this->db->from('students s');
			$checker = array(
				'h.class_id' => $class_id,
				'h.section_id' => $section_id,
				'h.subject_id' => $subject_id,
				'h.exam_id' => $exam_id,
				'h.school_id' => $this->school_id,
				'h.session' => $this->active_session
			);
			$this->db->where($checker);
	        $this->db->where('s.parent_id', $parent_data['id']);
	        $this->db->join('homework h','h.student_id =s.id');
			return $this->db->get()->result_array();
	}
    public function assignment_create()
	{
		$data['class'] = html_escape($this->input->post('class'));
		$data['section'] = html_escape($this->input->post('section'));
		$data['school_id'] = html_escape($this->input->post('school_id'));
		$data['subject'] = html_escape($this->input->post('subject'));
		$data['remark'] = html_escape($this->input->post('remark'));
		$data['lesson'] = html_escape($this->input->post('lesson'));
		$data['teacher_id'] = html_escape($this->input->post('teacher_id'));
		$data['date'] = htmlspecialchars($this->input->post('date'));
		$this->db->insert('assignment', $data);

		$response = array(
			'status' => true,
			'notification' => get_phrase('assignment_has_been_added_successfully')
		);

		return json_encode($response);
	}
	public function assignment_update($id)
	{
		$data['class'] = html_escape($this->input->post('class'));
		$data['section'] = html_escape($this->input->post('section'));
		$data['subject'] = html_escape($this->input->post('subject'));
		$data['remark'] = html_escape($this->input->post('remark'));
		$data['lesson'] = html_escape($this->input->post('lesson'));
	    $data['date'] = htmlspecialchars($this->input->post('date'));
        $this->db->where('id',$id);
		$this->db->update('assignment', $data);

		$response = array(
			'status' => true,
			'notification' => get_phrase('assignment_has_been_updated_successfully')
		);

		return json_encode($response);
	}
    public function assignment_delete($id) {
		$this->db->where('id', $id);
		$this->db->delete('assignment');
		$response = array(
			'status' => true,
			'notification' => get_phrase('assignment_deleted_successfully')
		);
		return json_encode($response);
	}
    public function classroom_walkthrough_add()
	{
		$data['class_id'] = html_escape($this->input->post('class_id'));
		$data['section_id'] = html_escape($this->input->post('section_id'));
		$data['class_rooms_id'] = html_escape($this->input->post('class_rooms_id'));
		$data['observer_name'] = html_escape($this->input->post('observer_name'));
		$data['date'] = html_escape($this->input->post('date'));
		$data['time'] = html_escape($this->input->post('time'));
		$data['grade'] = html_escape($this->input->post('grade'));
		$data['teacher_id'] = html_escape($this->input->post('teacher_id'));
		$data['subject_id'] = html_escape($this->input->post('subject_id'));
		$data['location'] = html_escape($this->input->post('location'));
		$classroom_layout= html_escape($this->input->post('classroom_layout'));
		if(isset($classroom_layout) && $classroom_layout !=''){
		   $class_layout=implode(',', $classroom_layout);
           $data['classroom_layout']=$class_layout;
		}
        $student_engagement= html_escape($this->input->post('student_engagement'));
		if(isset($student_engagement) && $student_engagement !=''){
		     $s_layout=implode(',', $student_engagement);
             $data['student_engagement']=$s_layout;
        }
        $classroom_management= html_escape($this->input->post('classroom_management'));
        if(isset($classroom_management) && $classroom_management !=''){
		    $c_management=implode(',', $classroom_management);
            $data['classroom_management']=$c_management;
        }
        $lesson_objective= html_escape($this->input->post('lesson_objective'));
        if(isset($lesson_objective) && $lesson_objective !=''){
		    $objective=implode(',', $lesson_objective);
            $data['lesson_objective']=$objective;
        }
        $instructional_strategies= html_escape($this->input->post('instructional_strategies'));
        if(isset($instructional_strategies) && $instructional_strategies !=''){
		    $strategies=implode(',', $instructional_strategies);
            $data['instructional_strategies']=$strategies;
        }
        $questioning_techniques= html_escape($this->input->post('questioning_techniques'));
        if(isset($questioning_techniques) && $questioning_techniques !=''){
		    $questioning=implode(',', $questioning_techniques);
            $data['questioning_techniques']=$questioning;
        }
        $use_resources= html_escape($this->input->post('use_resources'));
        if(isset($use_resources) && $use_resources !=''){

		    $resources=implode(',', $use_resources);
            $data['use_resources']=$resources;
        }
        $student_understanding= html_escape($this->input->post('student_understanding'));
        if(isset($student_understanding) && $student_understanding !=''){
	    	$understanding=implode(',', $student_understanding);
            $data['student_understanding']=$understanding;
        }
        $student_work= html_escape($this->input->post('student_work'));
        if(isset($student_work) && $student_work !=''){

		     $works=implode(',', $student_work);
             $data['student_work']=$works;
        }
        $differentiation= html_escape($this->input->post('differentiation'));
        if(isset($differentiation) && $differentiation !=''){
		    $all_differentiation=implode(',', $differentiation);
            $data['differentiation']=$all_differentiation;
        }
        $data['school_id']=html_escape($this->input->post('school_id'));
		$this->db->insert('classroom_walkthrough', $data);

		$response = array(
			'status' => true,
			'notification' => get_phrase('classroom_walkthrough_has_been_added_successfully')
		);

		return json_encode($response);
	}
	public function get_classroom_walkthrough_data() {
		return $this->db->get('classroom_walkthrough')->result_array();
	}
    public function classroom_walkthrough_update($param1 = '')
	{
		$data['class_id'] = html_escape($this->input->post('class_id'));
		$data['section_id'] = html_escape($this->input->post('section_id'));
		$data['class_rooms_id'] = html_escape($this->input->post('class_rooms_id'));
		$data['observer_name'] = html_escape($this->input->post('observer_name'));
		$data['date'] = html_escape($this->input->post('date'));
		$data['time'] = html_escape($this->input->post('time'));
		$data['grade'] = html_escape($this->input->post('grade'));
		$data['teacher_id'] = html_escape($this->input->post('teacher_id'));
		$data['subject_id'] = html_escape($this->input->post('subject_id'));
		$data['location'] = html_escape($this->input->post('location'));
		$classroom_layout= html_escape($this->input->post('classroom_layout'));
		if(isset($classroom_layout) && $classroom_layout !=''){
		   $class_layout=implode(',', $classroom_layout);
           $data['classroom_layout']=$class_layout;
		}
        $student_engagement= html_escape($this->input->post('student_engagement'));
		if(isset($student_engagement) && $student_engagement !=''){
		     $s_layout=implode(',', $student_engagement);
             $data['student_engagement']=$s_layout;
        }
        $classroom_management= html_escape($this->input->post('classroom_management'));
        if(isset($classroom_management) && $classroom_management !=''){
		    $c_management=implode(',', $classroom_management);
            $data['classroom_management']=$c_management;
        }
        $lesson_objective= html_escape($this->input->post('lesson_objective'));
        if(isset($lesson_objective) && $lesson_objective !=''){
		    $objective=implode(',', $lesson_objective);
            $data['lesson_objective']=$objective;
        }
        $instructional_strategies= html_escape($this->input->post('instructional_strategies'));
        if(isset($instructional_strategies) && $instructional_strategies !=''){
		    $strategies=implode(',', $instructional_strategies);
            $data['instructional_strategies']=$strategies;
        }
        $questioning_techniques= html_escape($this->input->post('questioning_techniques'));
        if(isset($questioning_techniques) && $questioning_techniques !=''){
		    $questioning=implode(',', $questioning_techniques);
            $data['questioning_techniques']=$questioning;
        }
        $use_resources= html_escape($this->input->post('use_resources'));
        if(isset($use_resources) && $use_resources !=''){

		    $resources=implode(',', $use_resources);
            $data['use_resources']=$resources;
        }
        $student_understanding= html_escape($this->input->post('student_understanding'));
        if(isset($student_understanding) && $student_understanding !=''){
	    	$understanding=implode(',', $student_understanding);
            $data['student_understanding']=$understanding;
        }
        $student_work= html_escape($this->input->post('student_work'));
        if(isset($student_work) && $student_work !=''){

		     $works=implode(',', $student_work);
             $data['student_work']=$works;
        }
        $differentiation= html_escape($this->input->post('differentiation'));
        if(isset($differentiation) && $differentiation !=''){
		    $all_differentiation=implode(',', $differentiation);
            $data['differentiation']=$all_differentiation;
        }
        
		$this->db->where('id', $param1);
		$this->db->update('classroom_walkthrough', $data);

		$response = array(
			'status' => true,
			'notification' => get_phrase('classroom_walkthrough_has_been_updated_successfully')
		);

		return json_encode($response);
	}
    public function classroom_walkthrough_delete($param1 = '')
	{
		$this->db->where('id', $param1);
		$this->db->delete('classroom_walkthrough');

		$response = array(
			'status' => true,
			'notification' => get_phrase('classroom_walkthrough_has_been_deleted_successfully')
		);

		return json_encode($response);
	}
    //START Semester section
	public function semester_plan_create($param1 = '')
	{
		$data['quarter_id'] = html_escape($this->input->post('quarter_id'));
		$data['class_id'] = html_escape($this->input->post('class_id'));
		$data['section_id'] = html_escape($this->input->post('section_id'));
		$data['subject_id'] = html_escape($this->input->post('subject_id'));
		$data['teacher_id'] = html_escape($this->input->post('teacher_id'));
		$data['semester_id'] = html_escape($this->input->post('semester_id'));
		$data['week'] = html_escape($this->input->post('week'));
		$data['date'] = html_escape($this->input->post('date'));
		$data['content'] = html_escape($this->input->post('content'));
		$data['events_id'] = html_escape($this->input->post('events_id'));
		$data['school_id'] = html_escape($this->input->post('school_id'));
		$this->db->insert('semester_plan', $data);

		$response = array(
			'status' => true,
			'notification' => get_phrase('semester_plan_added_successfully')
		);
		return json_encode($response);
	}
	
	public function get_semester_plan_data() {
		return $this->db->get('semester_plan')->result_array();
	}
    
    public function update_semester_plan($param1 = '')
	{
		$data['quarter_id'] = html_escape($this->input->post('quarter_id'));
		$data['class_id'] = html_escape($this->input->post('class_id'));
		$data['section_id'] = html_escape($this->input->post('section_id'));
		$data['subject_id'] = html_escape($this->input->post('subject_id'));
		$data['teacher_id'] = html_escape($this->input->post('teacher_id'));
		$data['semester_id'] = html_escape($this->input->post('semester_id'));
		$data['week'] = html_escape($this->input->post('week'));
		$data['date'] = html_escape($this->input->post('date'));
		$data['content'] = html_escape($this->input->post('content'));
		$data['events_id'] = html_escape($this->input->post('events_id'));
	
		$this->db->where('id', $param1);
		$this->db->update('semester_plan', $data);

		$response = array(
			'status' => true,
			'notification' => get_phrase('semester_plan_has_been_updated_successfully')
		);

		return json_encode($response);
	}
	public function semester_plan_delete($param1=''){
		$this->db->where('id', $param1);
		$this->db->delete('semester_plan');

		$response = array(
			'status' => true,
			'notification' => get_phrase('semester_plan_has_been_deleted_successfully')
		);

		return json_encode($response);

	}



}
