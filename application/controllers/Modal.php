<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Modal extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->database();

		/*LOADING ALL THE MODELS HERE*/
		$this->load->model('Crud_model',     'crud_model');
		$this->load->model('User_model',     'user_model');
		$this->load->model('Settings_model', 'settings_model');
		$this->load->model('Payment_model',  'payment_model');
		$this->load->model('Email_model',    'email_model');
		$this->load->model('Addon_model',    'addon_model');
		$this->load->model('Frontend_model', 'frontend_model');

		if(addon_status('online_courses') != 0){
			$this->load->model('addons/Lms_model','lms_model');
			$this->load->model('addons/Video_model','video_model');
		}
		/*SET DEFAULT TIMEZONE*/
		timezone();
		
	}

	function popup($folder_name = '', $page_name = '' , $param1 = '' , $param2 = '', $param3 = '', $param4 = '')
	{
		$page_data['param1']		=	$param1;
		$page_data['param2']		=	$param2;
		$page_data['param3']		=	$param3;

		// Check exam time
		date_default_timezone_set('Asia/kolkata');
		$currentDatetimeToday = new DateTime(); 
		$currentDatetimeString = $currentDatetimeToday->format('Y-m-d h:i A'); 

		$currentDatetime = DateTime::createFromFormat('Y-m-d h:i A', $currentDatetimeString);

		$get_exam_status = $this->db->get_where('online_exam_details', array('status' => '1','id' => $param2))->row_array();

		$get_exam_start_dt = $get_exam_status['exam_start_date'];
		$get_exam_start_time = $get_exam_status['exam_start_time'];
		$get_exam_start_am_pm = $get_exam_status['exam_start_am_pm'];
			
		$examStartDateTimeString = $get_exam_start_dt.' '.$get_exam_start_time.' '.$get_exam_start_am_pm;

		$examStartDateTime = DateTime::createFromFormat('Y-m-d h:i A', $examStartDateTimeString);
		$page_data['exam_start_status'] = ($currentDatetime >= $examStartDateTime ) ? 'start' : 'notstart';
		$page_data['getexam_start_date'] = $get_exam_start_dt;
		$page_data['getexam_start_time'] = $get_exam_start_time." ".$get_exam_start_am_pm;

		$page_data['getexam_id'] = $param2;
		$page_data['getquarter_id'] = $get_exam_status && $get_exam_status['quarter_id'] ? $get_exam_status['quarter_id'] : "";


		// Get Data of question and options
		$quarter_id = $param1;
		$getclass_id = $param3;
		$getsubject_id = $param4;
		$questions = $this->crud_model->get_questions($quarter_id,$getclass_id,$getsubject_id);

		$js_array = [];
		foreach ($questions as $key => $question) {
			$js_array[] = [
				'question' => ($key + 1) . ". " . $question->questions,
				'options' => [
					$question->answers1,
					$question->answers2,
					$question->answers3,
					$question->answers4
				]
			];
		}

		if($page_data['exam_start_status'] == 'notstart')
		{
			$js_array = [];
		}

		$page_data['js_array'] = json_encode($js_array);
		$page_data['exam_durations'] = $get_exam_status['exam_duration'];

		// Code to find remaining exam duration
		$currentTime = $currentDatetimeToday->format('h:i'); 
		$currentAmPm = $currentDatetimeToday->format('A'); 
		$DatabasetoTime = $get_exam_status['exam_end_time'];
		$DatabasetoAmPm = $get_exam_status['exam_end_am_pm'];

		$duration = $this->calculateDurationInMinutes($currentTime, $currentAmPm, $DatabasetoTime, $DatabasetoAmPm);
		$page_data['actual_exam_duration'] = urlencode($duration);

		// End

		
		//exit;

		$page_data['get_quize_class_id'] = $getclass_id ? $getclass_id : "";
		$page_data['get_quize_subject_id'] = $getsubject_id ? $getsubject_id : "";
		$page_data['get_quarter_id'] = $quarter_id ? $quarter_id : "";

		if($folder_name == 'academy'){
			$this->load->view( 'backend/'.$folder_name.'/'.$page_name.'.php' ,$page_data);
		}else{
			$this->load->view( 'backend/'.$this->session->userdata('user_type').'/'.$folder_name.'/'.$page_name.'.php' ,$page_data);
		}		
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

        $fromDateTime = new DateTime($fromTime24);
        $toDateTime = new DateTime($toTime24);

        if ($toDateTime < $fromDateTime) {
            $toDateTime->modify('+1 day');
        }

        $interval = $fromDateTime->diff($toDateTime);
        $minutes = ($interval->h * 60) + $interval->i;

        return $minutes;
    }


}
