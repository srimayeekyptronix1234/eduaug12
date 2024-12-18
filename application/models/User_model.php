<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	protected $school_id;
	protected $active_session;

	public function __construct()
	{
		parent::__construct();
		$this->school_id = school_id();
		$this->active_session = active_session();
	}

	// GET SUPERADMIN DETAILS
	public function get_superadmin() {
		$this->db->where('role', 'superadmin');
		return $this->db->get('users')->row_array();
	}
	// GET USER DETAILS
	public function get_user_details($user_id = '', $column_name = '') {
		if($column_name != ''){
			return $this->db->get_where('users', array('id' => $user_id))->row($column_name);
		}else{
			return $this->db->get_where('users', array('id' => $user_id))->row_array();
		}
	}
	
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


	// ADMIN CRUD SECTION STARTS
	public function create_admin() {
		$data['school_id'] = html_escape($this->input->post('school_id'));
		$data['name'] = html_escape($this->input->post('name'));
		$data['email'] = html_escape($this->input->post('email'));
		$data['password'] = sha1($this->input->post('password'));
		$data['phone'] = html_escape($this->input->post('phone'));
		$data['gender'] = html_escape($this->input->post('gender'));
		$data['blood_group'] = html_escape($this->input->post('blood_group'));
		$data['address'] = html_escape($this->input->post('address'));
		$data['role'] = 'admin';
		$data['watch_history'] = '[]';

		// check email duplication
		$duplication_status = $this->check_duplication('on_create', $data['email']);
		if($duplication_status){
			$this->db->insert('users', $data);

			$response = array(
				'status' => true,
				'notification' => get_phrase('admin_added_successfully')
			);
		}else{
			$response = array(
				'status' => false,
				'notification' => get_phrase('sorry_this_email_has_been_taken')
			);
		}

		return json_encode($response);
	}

	public function update_admin($param1 = '')
	{
		$data['name'] = html_escape($this->input->post('name'));
		$data['email'] = html_escape($this->input->post('email'));
		$data['phone'] = html_escape($this->input->post('phone'));
		$data['gender'] = html_escape($this->input->post('gender'));
		$data['blood_group'] = html_escape($this->input->post('blood_group'));
		$data['address'] = html_escape($this->input->post('address'));
		$data['school_id'] = html_escape($this->input->post('school_id'));
		// check email duplication
		$duplication_status = $this->check_duplication('on_update', $data['email'], $param1);
		if($duplication_status){
			$this->db->where('id', $param1);
			$this->db->update('users', $data);

			$response = array(
				'status' => true,
				'notification' => get_phrase('admin_has_been_updated_successfully')
			);

		}else{
			$response = array(
				'status' => false,
				'notification' => get_phrase('sorry_this_email_has_been_taken')
			);
		}

		return json_encode($response);
	}

	public function delete_admin($param1 = '')
	{
		$this->db->where('id', $param1);
		$this->db->delete('users');

		$response = array(
			'status' => true,
			'notification' => get_phrase('admin_has_been_deleted_successfully')
		);
		return json_encode($response);
	}
	// ADMIN CRUD SECTION ENDS

	//START TEACHER section
	public function create_teacher()
	{
		$data['school_id'] = html_escape($this->input->post('school_id'));
		$data['name'] = html_escape($this->input->post('name'));
		$data['email'] = html_escape($this->input->post('email'));
		$data['password'] = sha1($this->input->post('password'));
		$data['phone'] = html_escape($this->input->post('phone'));
		$data['gender'] = html_escape($this->input->post('gender'));
		$data['blood_group'] = html_escape($this->input->post('blood_group'));
		$data['address'] = html_escape($this->input->post('address'));
		$data['role'] = 'teacher';
		$data['watch_history'] = '[]';
		$data['salary'] = html_escape($this->input->post('salary'));

		// check email duplication
		$duplication_status = $this->check_duplication('on_create', $data['email']);
		if($duplication_status){
			$this->db->insert('users', $data);


			$teacher_id = $this->db->insert_id();
			$teacher_table_data['user_id'] = $teacher_id;
			$teacher_table_data['about'] = html_escape($this->input->post('about'));
			$social_links = array(
				'facebook' => $this->input->post('facebook_link'),
				'twitter' => $this->input->post('twitter_link'),
				'linkedin' => $this->input->post('linkedin_link')
			);
			//$teacher_table_data['social_links'] = json_encode($social_links);
			$teacher_table_data['department_id'] = html_escape($this->input->post('department'));
			$teacher_table_data['designation'] = html_escape($this->input->post('designation'));
			$teacher_table_data['school_id'] = html_escape($this->input->post('school_id'));
		    $teacher_table_data['class_id'] = html_escape($this->input->post('class_id'));
		    $teacher_table_data['section_id'] = html_escape($this->input->post('section_id'));

			//$teacher_table_data['show_on_website'] = $this->input->post('show_on_website');
			$this->db->insert('teachers',$teacher_table_data);
			if ($_FILES['image_file']['name'] != "") {
					move_uploaded_file($_FILES['image_file']['tmp_name'], 'uploads/users/'.$teacher_id.'.jpg');
			}

			if ($_FILES['signature_file']['name'] != "") {
					move_uploaded_file($_FILES['signature_file']['tmp_name'], 'uploads/users/'.$teacher_id.'-signature.jpg');
			}

			$response = array(
				'status' => true,
				'notification' => get_phrase('teacher_added_successfully')
			);
		}else{
			$response = array(
				'status' => false,
				'notification' => get_phrase('sorry_this_email_has_been_taken')
			);
		}

		return json_encode($response);
	}

	public function update_teacher($param1 = '')
	{
		$data['name'] = html_escape($this->input->post('name'));
		$data['email'] = html_escape($this->input->post('email'));
		$data['phone'] = html_escape($this->input->post('phone'));
		$data['gender'] = html_escape($this->input->post('gender'));
		$data['blood_group'] = html_escape($this->input->post('blood_group'));
		$data['address'] = html_escape($this->input->post('address'));
        $data['salary'] = html_escape($this->input->post('salary'));

		// check email duplication
		$duplication_status = $this->check_duplication('on_update', $data['email'], $param1);
		if($duplication_status){
			$this->db->where('id', $param1);
			$this->db->where('school_id', $this->input->post('school_id'));
			$this->db->update('users', $data);

			$teacher_table_data['department_id'] = html_escape($this->input->post('department'));
			$teacher_table_data['designation'] = html_escape($this->input->post('designation'));
			$teacher_table_data['about'] = html_escape($this->input->post('about'));
			$teacher_table_data['class_id'] = html_escape($this->input->post('class_id'));
			$teacher_table_data['section_id'] = html_escape($this->input->post('section_id'));

			$social_links = array(
				'facebook' => $this->input->post('facebook_link'),
				'twitter' => $this->input->post('twitter_link'),
				'linkedin' => $this->input->post('linkedin_link')
			);
			$teacher_table_data['social_links'] = json_encode($social_links);
			$teacher_table_data['show_on_website'] = $this->input->post('show_on_website');
			$this->db->where('school_id', $this->input->post('school_id'));
			$this->db->where('user_id', $param1);
			$this->db->update('teachers', $teacher_table_data);

			if ($_FILES['image_file']['name'] != "") {
				move_uploaded_file($_FILES['image_file']['tmp_name'], 'uploads/users/'.$param1.'.jpg');
			}

			if ($_FILES['signature_file']['name'] != "") {
					move_uploaded_file($_FILES['signature_file']['tmp_name'], 'uploads/users/'.$param1.'-signature.jpg');
			}

			$response = array(
				'status' => true,
				'notification' => get_phrase('teacher_has_been_updated_successfully')
			);

		}else{
			$response = array(
				'status' => false,
				'notification' => get_phrase('sorry_this_email_has_been_taken')
			);
		}

		return json_encode($response);
	}

	public function delete_teacher($param1 = '', $param2)
	{
		$this->db->where('id', $param1);
		$this->db->delete('users');

		$this->db->where('user_id', $param1);
		$this->db->delete('teachers');

		$this->db->where('teacher_id', $param2);
		$this->db->delete('teacher_permissions');

		$response = array(
			'status' => true,
			'notification' => get_phrase('teacher_has_been_deleted_successfully')
		);
		return json_encode($response);
	}

	public function delete_assignment($param1 = '')
	{
		$this->db->where('id', $param1);
		$this->db->delete('assignment_new');

		$this->db->where('assignment_new_tbl_id', $param1);
		$this->db->delete('student_assignment_answer');

		$response = array(
			'status' => true,
			'notification' => get_phrase('assignment_has_been_deleted_successfully')
		);
		return json_encode($response);
	}

	public function get_teachers() {
		$checker = array(
			'school_id' => $this->school_id,
			'role' => 'teacher'
		);
		return $this->db->get_where('users', $checker);
	}

	public function get_teacher_by_id($teacher_id = "") {
		$checker = array(
			'school_id' => $this->school_id,
			'id' => $teacher_id
		);
		$result = $this->db->get_where('teachers', $checker)->row_array();
		return $this->db->get_where('users', array('id' => $result['user_id']));
	}
	//END TEACHER section


	//START TEACHER PERMISSION section
	public function teacher_permission(){
		$class_id = html_escape($this->input->post('class_id'));
		$section_id = html_escape($this->input->post('section_id'));
		$teacher_id = html_escape($this->input->post('teacher_id'));
		$column_name = html_escape($this->input->post('column_name'));
		$value = html_escape($this->input->post('value'));

		$check_row = $this->db->get_where('teacher_permissions', array('class_id' => $class_id, 'section_id' => $section_id, 'teacher_id' => $teacher_id));
		if($check_row->num_rows() > 0){
			$data[$column_name] = $value;
			$this->db->where('class_id', $class_id);
			$this->db->where('section_id', $section_id);
			$this->db->where('teacher_id', $teacher_id);
			$this->db->update('teacher_permissions', $data);
		}else{
			$data['class_id'] = $class_id;
			$data['section_id'] = $section_id;
			$data['teacher_id'] = $teacher_id;
			$data[$column_name] = 1;
			$this->db->insert('teacher_permissions', $data);
		}
	}
	//END TEACHER PERMISSION section

	//START PARENT section
	public function parent_create()
	{
		$data['name'] = html_escape($this->input->post('name'));
		$data['email'] = html_escape($this->input->post('email'));
		$data['password'] = sha1($this->input->post('password'));
		$data['phone'] = html_escape($this->input->post('phone'));
		$data['gender'] = html_escape($this->input->post('gender'));
		$data['blood_group'] = html_escape($this->input->post('blood_group'));
		$data['address'] = html_escape($this->input->post('address'));
		$data['school_id'] = $this->school_id;
		$data['role'] = 'parent';
		$data['watch_history'] = '[]';

		// check email duplication
		$duplication_status = $this->check_duplication('on_create', $data['email']);
		if($duplication_status){

			$this->db->insert('users', $data);

			$parent_data['user_id'] = $this->db->insert_id();
			$parent_data['school_id'] = $this->school_id;
			$this->db->insert('parents', $parent_data);

			$response = array(
				'status' => true,
				'notification' => get_phrase('parent_added_successfully')
			);
		}else{
			$response = array(
				'status' => false,
				'notification' => get_phrase('sorry_this_email_has_been_taken')
			);
		}

		return json_encode($response);
	}

	public function parent_update($param1 = '')
	{
		$data['name'] = html_escape($this->input->post('name'));
		$data['email'] = html_escape($this->input->post('email'));
		$data['phone'] = html_escape($this->input->post('phone'));
		$data['gender'] = html_escape($this->input->post('gender'));
		$data['blood_group'] = html_escape($this->input->post('blood_group'));
		$data['address'] = html_escape($this->input->post('address'));

		// check email duplication
		$duplication_status = $this->check_duplication('on_update', $data['email'], $param1);
		if($duplication_status){

			$this->db->where('id', $param1);
			$this->db->update('users', $data);

			$response = array(
				'status' => true,
				'notification' => get_phrase('parent_updated_successfully')
			);
		}else{
			$response = array(
				'status' => false,
				'notification' => get_phrase('sorry_this_email_has_been_taken')
			);
		}

		return json_encode($response);
	}

	public function parent_delete($param1 = '')
	{
		$this->db->where('id', $param1);
		$this->db->delete('users');

		$this->db->where('user_id', $param1);
		$this->db->delete('parents');

		$response = array(
			'status' => true,
			'notification' => get_phrase('parent_has_been_deleted_successfully')
		);

		return json_encode($response);
	}

	public function get_parents() {
		$checker = array(
			'school_id' => $this->school_id,
			'role' => 'parent'
		);
		return $this->db->get_where('users', $checker);
	}

	public function get_parent_by_id($parent_id = "") {
		$checker = array(
			'school_id' => $this->school_id,
			'id' => $parent_id
		);
		$result = $this->db->get_where('parents', $checker)->row_array();
		return $this->db->get_where('users', array('id' => $result['user_id']));
	}
	//END PARENT section


	//START ACCOUNTANT section
	public function accountant_create()
	{
		$data['name'] = html_escape($this->input->post('name'));
		$data['email'] = html_escape($this->input->post('email'));
		$data['password'] = sha1($this->input->post('password'));
		$data['phone'] = html_escape($this->input->post('phone'));
		$data['gender'] = html_escape($this->input->post('gender'));
		$data['blood_group'] = html_escape($this->input->post('blood_group'));
		$data['address'] = html_escape($this->input->post('address'));
		$data['school_id'] = $this->school_id;
		$data['role'] = 'accountant';
		$data['watch_history'] = '[]';
        $data['salary']=html_escape($this->input->post('salary'));
		$duplication_status = $this->check_duplication('on_create', $data['email']);
		if($duplication_status){
			$this->db->insert('users', $data);

			$response = array(
				'status' => true,
				'notification' => get_phrase('accountant_added_successfully')
			);
		}else{
			$response = array(
				'status' => false,
				'notification' => get_phrase('sorry_this_email_has_been_taken')
			);
		}

		return json_encode($response);
	}

	public function accountant_update($param1 = '')
	{
		$data['name'] = html_escape($this->input->post('name'));
		$data['email'] = html_escape($this->input->post('email'));
		$data['phone'] = html_escape($this->input->post('phone'));
		$data['gender'] = html_escape($this->input->post('gender'));
		$data['blood_group'] = html_escape($this->input->post('blood_group'));
		$data['address'] = html_escape($this->input->post('address'));
        $data['salary']=html_escape($this->input->post('salary'));

		$duplication_status = $this->check_duplication('on_update', $data['email'], $param1);
		if($duplication_status){
			$this->db->where('id', $param1);
			$this->db->update('users', $data);

			$response = array(
				'status' => true,
				'notification' => get_phrase('accountant_has_been_updated_successfully')
			);

		}else{
			$response = array(
				'status' => false,
				'notification' => get_phrase('sorry_this_email_has_been_taken')
			);
		}

		return json_encode($response);

	}

	public function accountant_delete($param1 = '')
	{
		$this->db->where('id', $param1);
		$this->db->delete('users');

		$response = array(
			'status' => true,
			'notification' => get_phrase('accountant_has_been_deleted_successfully')
		);

		return json_encode($response);
	}

	public function get_accountants() {
		$checker = array(
			'school_id' => $this->school_id,
			'role' => 'accountant'
		);
		return $this->db->get_where('users', $checker);
	}

	public function get_accountant_by_id($accountant_id = "") {
		$checker = array(
			'school_id' => $this->school_id,
			'id' => $accountant_id
		);
		return $this->db->get_where('users', $checker);
	}
	//END ACCOUNTANT section

	//START LIBRARIAN section
	public function librarian_create()
	{
		$data['name'] = html_escape($this->input->post('name'));
		$data['email'] = html_escape($this->input->post('email'));
		$data['password'] = sha1($this->input->post('password'));
		$data['phone'] = html_escape($this->input->post('phone'));
		$data['gender'] = html_escape($this->input->post('gender'));
		$data['blood_group'] = html_escape($this->input->post('blood_group'));
		$data['address'] = html_escape($this->input->post('address'));
		$data['school_id'] = $this->school_id;
		$data['role'] = 'librarian';
		$data['watch_history'] = '[]';
		$data['salary'] = html_escape($this->input->post('salary'));

		// check email duplication
		$duplication_status = $this->check_duplication('on_create', $data['email']);
		if($duplication_status){
			$this->db->insert('users', $data);

			$response = array(
				'status' => true,
				'notification' => get_phrase('librarian_added_successfully')
			);
		}else{
			$response = array(
				'status' => false,
				'notification' => get_phrase('sorry_this_email_has_been_taken')
			);
		}

		return json_encode($response);
	}

	public function librarian_update($param1 = '')
	{
		$data['name'] = html_escape($this->input->post('name'));
		$data['email'] = html_escape($this->input->post('email'));
		$data['phone'] = html_escape($this->input->post('phone'));
		$data['gender'] = html_escape($this->input->post('gender'));
		$data['blood_group'] = html_escape($this->input->post('blood_group'));
		$data['address'] = html_escape($this->input->post('address'));
		$data['salary'] = html_escape($this->input->post('salary'));

		// check email duplication
		$duplication_status = $this->check_duplication('on_update', $data['email'], $param1);
		if($duplication_status){
			$this->db->where('id', $param1);
			$this->db->update('users', $data);

			$response = array(
				'status' => true,
				'notification' => get_phrase('librarian_updated_successfully')
			);
		}else{
			$response = array(
				'status' => false,
				'notification' => get_phrase('sorry_this_email_has_been_taken')
			);
		}

		return json_encode($response);
	}

	public function librarian_delete($param1 = '')
	{
		$this->db->where('id', $param1);
		$this->db->delete('users');

		$response = array(
			'status' => true,
			'notification' => get_phrase('librarian_deleted_successfully')
		);
		return json_encode($response);
	}


	public function get_librarians() {
		$checker = array(
			'school_id' => $this->school_id,
			'role' => 'librarian'
		);
		return $this->db->get_where('users', $checker);
	}

	public function get_librarian_by_id($librarian_id = "") {
		$checker = array(
			'school_id' => $this->school_id,
			'id' => $librarian_id
		);
		return $this->db->get_where('users', $checker);
	}
	//END LIBRARIAN section


	//START STUDENT AND ADMISSION section
	public function single_student_create(){
		$user_data['name'] = html_escape($this->input->post('name'));
		$user_data['email'] = html_escape($this->input->post('email'));
		$user_data['password'] = sha1(html_escape($this->input->post('password')));
		$user_data['birthday'] = strtotime(html_escape($this->input->post('birthday')));
		$user_data['gender'] = html_escape($this->input->post('gender'));
		$user_data['blood_group'] = html_escape($this->input->post('blood_group'));
		$user_data['address'] = html_escape($this->input->post('address'));
		$user_data['phone'] = html_escape($this->input->post('phone'));
		$user_data['role'] = 'student';
		$user_data['school_id'] = $this->school_id;
		$user_data['watch_history'] = '[]';

		// New code 19/07/2024 //
		$user_data['last_registration_no'] = html_escape($this->input->post('last_registration_no'));
		$user_data['admission_date'] = html_escape($this->input->post('admission_date'));
		$user_data['student_birth_form_id'] = html_escape($this->input->post('student_birth_form_id'));
		$user_data['student_is_orphan'] = html_escape($this->input->post('student_is_orphan'));
		$user_data['student_cast'] = html_escape($this->input->post('student_cast'));
		$user_data['student_osc'] = html_escape($this->input->post('student_osc'));
		$user_data['student_identification_mark'] = html_escape($this->input->post('student_identification_mark'));
		$user_data['previous_school'] = html_escape($this->input->post('previous_school'));
		$user_data['religion'] = html_escape($this->input->post('religion'));
		$user_data['previous_board_id'] = html_escape($this->input->post('previous_board_id'));
		$user_data['student_disease'] = html_escape($this->input->post('student_disease'));
		$user_data['additional_note'] = html_escape($this->input->post('additional_note'));
		$user_data['total_sibling'] = html_escape($this->input->post('total_sibling'));
		// New code End 19/07/2024 //


		// check email duplication
		$duplication_status = $this->check_duplication('on_create', $user_data['email']);
		if($duplication_status){
			$this->db->insert('users', $user_data);
			$user_id = $this->db->insert_id();

			// New code 19/07/2024 //

			// Father data entry
			$father_data['student_id'] = $user_id;
            $father_data['name'] = html_escape($this->input->post('father_name'));
			$father_data['national_id'] = html_escape($this->input->post('father_national_id'));
			$father_data['guardien_type'] = 'father';
			$father_data['occupation'] = html_escape($this->input->post('father_occupation'));
			$father_data['education'] = html_escape($this->input->post('father_education'));
			$father_data['mobile'] = html_escape($this->input->post('father_mobile_no'));
			$father_data['profession'] = html_escape($this->input->post('father_profession'));
			$father_data['income'] = html_escape($this->input->post('father_income'));
			$this->db->insert('student_guardien_information', $father_data);
			// Father data entry end

			// Mother data entry
			$mother_data['student_id'] = $user_id;
            $mother_data['name'] = html_escape($this->input->post('mother_name'));
			$mother_data['national_id'] = html_escape($this->input->post('mother_national_id'));
			$mother_data['guardien_type'] = 'mother';
			$mother_data['occupation'] = html_escape($this->input->post('mother_occupation'));
			$mother_data['education'] = html_escape($this->input->post('mother_education'));
			$mother_data['mobile'] = html_escape($this->input->post('mother_mobile_no'));
			$mother_data['profession'] = html_escape($this->input->post('mother_profession'));
			$mother_data['income'] = html_escape($this->input->post('mother_income'));
			$this->db->insert('student_guardien_information', $mother_data);
			// Mother data entry end

			// New code End 19/07/2024 //

			$student_data['code'] = student_code();
			$student_data['user_id'] = $user_id;
			$student_data['parent_id'] = html_escape($this->input->post('parent_id'));
			$student_data['session'] = $this->active_session;
			$student_data['school_id'] = $this->school_id;
			$this->db->insert('students', $student_data);
			$student_id = $this->db->insert_id();

			$enroll_data['student_id'] = $student_id;
			$enroll_data['class_id'] = html_escape($this->input->post('class_id'));
			$enroll_data['section_id'] = html_escape($this->input->post('section_id'));
			$enroll_data['session'] = $this->active_session;
			$enroll_data['school_id'] = $this->school_id;
			$date=date('Y-m-d');
            $timestamp=(strtotime($date));
            $enroll_data['timestamp'] = $timestamp;
			$this->db->insert('enrols', $enroll_data);

			move_uploaded_file($_FILES['student_image']['tmp_name'], 'uploads/users/'.$user_id.'.jpg');

			$response = array(
				'status' => true,
				'notification' => get_phrase('student_added_successfully')
			);
		}else{
			$response = array(
				'status' => false,
				'notification' => get_phrase('sorry_this_email_has_been_taken')
			);
		}

		return json_encode($response);
	}

	public function bulk_student_create(){
		$duplication_counter = 0;
		$class_id = html_escape($this->input->post('class_id'));
		$section_id = html_escape($this->input->post('section_id'));

		$students_name = html_escape($this->input->post('name'));
		$students_email = html_escape($this->input->post('email'));
		$students_password = html_escape($this->input->post('password'));
		$students_gender = html_escape($this->input->post('gender'));
		$students_parent = html_escape($this->input->post('parent_id'));

		foreach($students_name as $key => $value):
			// check email duplication
			$duplication_status = $this->check_duplication('on_create', $students_email[$key]);
			if($duplication_status){
				$user_data['name'] = $students_name[$key];
				$user_data['email'] = $students_email[$key];
				$user_data['password'] = sha1($students_password[$key]);
				$user_data['gender'] = $students_gender[$key];
				$user_data['role'] = 'student';
				$user_data['school_id'] = $this->school_id;
				$user_data['watch_history'] = '[]';
				$this->db->insert('users', $user_data);
				$user_id = $this->db->insert_id();

				$student_data['code'] = student_code();
				$student_data['user_id'] = $user_id;
				$student_data['parent_id'] = $students_parent[$key];
				$student_data['session'] = $this->active_session;
				$student_data['school_id'] = $this->school_id;
				$this->db->insert('students', $student_data);
				$student_id = $this->db->insert_id();

				$enroll_data['student_id'] = $student_id;
				$enroll_data['class_id'] = $class_id;
				$enroll_data['section_id'] = $section_id;
				$enroll_data['session'] = $this->active_session;
				$enroll_data['school_id'] = $this->school_id;
				$date=date('Y-m-d');
                $timestamp=(strtotime($date));
                $enroll_data['timestamp']=$timestamp;
				$this->db->insert('enrols', $enroll_data);
			}else{
				$duplication_counter++;
			}
		endforeach;

		if ($duplication_counter > 0) {
			$response = array(
				'status' => true,
				'notification' => get_phrase('some_of_the_emails_have_been_taken')
			);
		}else{
			$response = array(
				'status' => true,
				'notification' => get_phrase('students_added_successfully')
			);
		}

		return json_encode($response);
	}

	public function excel_create(){
		$class_id = html_escape($this->input->post('class_id'));
		$section_id = html_escape($this->input->post('section_id'));
		$school_id = $this->school_id;
		$session_id = $this->active_session;
		$role = 'student';

		$file_name = $_FILES['csv_file']['name'];
		move_uploaded_file($_FILES['csv_file']['tmp_name'],'uploads/csv_file/student.generate.csv');

		if (($handle = fopen('uploads/csv_file/student.generate.csv', 'r')) !== FALSE) { // Check the resource is valid
			$count = 0;
			$duplication_counter = 0;
			while (($all_data = fgetcsv($handle, 1000, ",")) !== FALSE) { // Check opening the file is OK!
				if($count > 0){
					$user_data['name'] = html_escape($all_data[0]);
					$user_data['email'] = html_escape($all_data[1]);
					$user_data['password'] = sha1($all_data[2]);
					$user_data['phone'] = html_escape($all_data[3]);
					$user_data['gender'] = html_escape($all_data[5]);
					$user_data['role'] = $role;
					$user_data['school_id'] = $school_id;
					$user_data['watch_history'] = '[]';

					// check email duplication
					$duplication_status = $this->check_duplication('on_create', $user_data['email']);
					if($duplication_status){
						$this->db->insert('users', $user_data);
						$user_id = $this->db->insert_id();

						$student_data['code'] = student_code();
						$student_data['user_id'] = $user_id;
						$student_data['parent_id'] = html_escape($all_data[4]);
						$student_data['session'] = $session_id;
						$student_data['school_id'] = $school_id;
						$this->db->insert('students', $student_data);
						$student_id = $this->db->insert_id();

						$enroll_data['student_id'] = $student_id;
						$enroll_data['class_id'] = $class_id;
						$enroll_data['section_id'] = $section_id;
						$enroll_data['session'] = $session_id;
						$enroll_data['school_id'] = $school_id;
						$this->db->insert('enrols', $enroll_data);
					}else{
						$duplication_counter++;
					}
				}
				$count++;
			}
			fclose($handle);
		}

		if ($duplication_counter > 0) {
			$response = array(
				'status' => true,
				'notification' => get_phrase('some_of_the_emails_have_been_taken')
			);
		}else{
			$response = array(
				'status' => true,
				'notification' => get_phrase('students_added_successfully')
			);
		}

		return json_encode($response);
	}

	// Student leaving data update
	public function student_update_leaving_data($user_id = ''){
		$user_data['leaving_date'] = $this->input->post('leaving_date');
		$user_data['reason_for_leaving'] = html_escape($this->input->post('reason_for_leaving'));
		$user_data['academic_performance'] = html_escape($this->input->post('academic_performance'));

	    $this->db->where('id', $user_id);
		$this->db->update('users', $user_data);
		$response = array(
				'status' => true,
				'notification' => get_phrase('student_leaving_data_updated_successfully')
		);

		return json_encode($response);

	}

	public function student_update($student_id = '', $user_id = ''){
		$student_data['parent_id'] = html_escape($this->input->post('parent_id'));

		$enroll_data['class_id'] = html_escape($this->input->post('class_id'));
		$enroll_data['section_id'] = html_escape($this->input->post('section_id'));

		$user_data['name'] = html_escape($this->input->post('name'));
		$user_data['email'] = html_escape($this->input->post('email'));
		$user_data['birthday'] = strtotime(html_escape($this->input->post('birthday')));
		$user_data['gender'] = html_escape($this->input->post('gender'));
		$user_data['blood_group'] = html_escape($this->input->post('blood_group'));
		$user_data['address'] = html_escape($this->input->post('address'));
		$user_data['phone'] = html_escape($this->input->post('phone'));
		// Check Duplication
		$duplication_status = $this->check_duplication('on_update', $user_data['email'], $user_id);
		if ($duplication_status) {
			$this->db->where('id', $student_id);
			$this->db->update('students', $student_data);

			$this->db->where('student_id', $student_id);
			$this->db->update('enrols', $enroll_data);

			$this->db->where('id', $user_id);
			$this->db->update('users', $user_data);

			move_uploaded_file($_FILES['student_image']['tmp_name'], 'uploads/users/'.$user_id.'.jpg');

			$response = array(
				'status' => true,
				'notification' => get_phrase('student_updated_successfully')
			);

		}else{
			$response = array(
				'status' => false,
				'notification' => get_phrase('sorry_this_email_has_been_taken')
			);
		}

		return json_encode($response);
	}

	public function delete_student($student_id, $user_id) {
		$this->db->where('id', $student_id);
		$this->db->delete('students');

		$this->db->where('student_id', $student_id);
		$this->db->delete('enrols');

		$this->db->where('id', $user_id);
		$this->db->delete('users');

		$path = 'uploads/users/'.$user_id.'.jpg';
		if(file_exists($path)){
			unlink($path);
		}

		$response = array(
			'status' => true,
			'notification' => get_phrase('student_deleted_successfully')
		);

		return json_encode($response);
	}

	public function student_enrolment($section_id = "") {
		return $this->db->get_where('enrols', array('section_id' => $section_id, 'school_id' => $this->school_id, 'session' => $this->active_session));
	}


	// This function will help to fetch student data by section, class or student id
	public function get_student_details_by_id($type = "", $id = "") {
		$enrol_data = array();
		if ($type == "section") {
			$checker = array(
				'section_id' => $id,
				'session' => $this->active_session,
				'school_id' => $this->school_id
			);
			$enrol_data = $this->db->get_where('enrols', $checker)->result_array();
			foreach ($enrol_data as $key => $enrol) {
				$student_details = $this->db->get_where('students', array('id' => $enrol['student_id']))->row_array();
				$enrol_data[$key]['code'] = $student_details['code'];
				$enrol_data[$key]['user_id'] = $student_details['user_id'];
				$enrol_data[$key]['parent_id'] = $student_details['parent_id'];
				$user_details = $this->db->get_where('users', array('id' => $student_details['user_id']))->row_array();
				$enrol_data[$key]['name'] = $user_details['name'];
				$enrol_data[$key]['email'] = $user_details['email'];
				$enrol_data[$key]['role'] = $user_details['role'];
				$enrol_data[$key]['address'] = $user_details['address'];
				$enrol_data[$key]['phone'] = $user_details['phone'];
				$enrol_data[$key]['birthday'] = $user_details['birthday'];
				$enrol_data[$key]['gender'] = $user_details['gender'];
				$enrol_data[$key]['blood_group'] = $user_details['blood_group'];

				$class_details = $this->crud_model->get_class_details_by_id($enrol['class_id'])->row_array();
				$section_details = $this->crud_model->get_section_details_by_id('section', $enrol['section_id'])->row_array();

				$enrol_data[$key]['class_name'] = $class_details['name'];
				$enrol_data[$key]['section_name'] = $section_details['name'];
			}
		}
		elseif ($type == "class") {
			$checker = array(
				'class_id' => $id,
				'session' => $this->active_session,
				'school_id' => $this->school_id
			);
			$enrol_data = $this->db->get_where('enrols', $checker)->result_array();
			foreach ($enrol_data as $key => $enrol) {
				$student_details = $this->db->get_where('students', array('id' => $enrol['student_id']))->row_array();
				$enrol_data[$key]['code'] = $student_details['code'];
				$enrol_data[$key]['user_id'] = $student_details['user_id'];
				$enrol_data[$key]['parent_id'] = $student_details['parent_id'];
				$user_details = $this->db->get_where('users', array('id' => $student_details['user_id']))->row_array();
				$enrol_data[$key]['name'] = $user_details['name'];
				$enrol_data[$key]['email'] = $user_details['email'];
				$enrol_data[$key]['role'] = $user_details['role'];
				$enrol_data[$key]['address'] = $user_details['address'];
				$enrol_data[$key]['phone'] = $user_details['phone'];
				$enrol_data[$key]['birthday'] = $user_details['birthday'];
				$enrol_data[$key]['gender'] = $user_details['gender'];
				$enrol_data[$key]['blood_group'] = $user_details['blood_group'];

				$class_details = $this->crud_model->get_class_details_by_id($enrol['class_id'])->row_array();
				$section_details = $this->crud_model->get_section_details_by_id('section', $enrol['section_id'])->row_array();

				$enrol_data[$key]['class_name'] = $class_details['name'];
				$enrol_data[$key]['section_name'] = $section_details['name'];
			}
		}
		elseif ($type == "student") {
			$checker = array(
				'student_id' => $id,
				'session' => $this->active_session,
				'school_id' => $this->school_id
			);
			$enrol_data = $this->db->get_where('enrols', $checker)->row_array();
			$student_details = $this->db->get_where('students', array('id' => $enrol_data['student_id']))->row_array();
			$enrol_data['code'] = $student_details['code'];
			$enrol_data['user_id'] = $student_details['user_id'];
			$enrol_data['parent_id'] = $student_details['parent_id'];
			$user_details = $this->db->get_where('users', array('id' => $student_details['user_id']))->row_array();
			$enrol_data['name'] = $user_details['name'];
			$enrol_data['email'] = $user_details['email'];
			$enrol_data['role'] = $user_details['role'];
			$enrol_data['address'] = $user_details['address'];
			$enrol_data['phone'] = $user_details['phone'];
			$enrol_data['birthday'] = $user_details['birthday'];
			$enrol_data['gender'] = $user_details['gender'];
			$enrol_data['blood_group'] = $user_details['blood_group'];

			$class_details = $this->crud_model->get_class_details_by_id($enrol_data['class_id'])->row_array();
			$section_details = $this->crud_model->get_section_details_by_id('section', $enrol_data['section_id'])->row_array();

			$enrol_data['class_name'] = $class_details['name'];
			$enrol_data['section_name'] = $section_details['name'];
		}
		return $enrol_data;
	}
	//END STUDENT AND ADMISSION section


	//STUDENT OF EACH SESSION
	public function get_session_wise_student() {
		$checker = array(
			'session' => $this->active_session,
			'school_id' => $this->school_id
		);
		return $this->db->get_where('enrols', $checker);
	}

	// Get User Image Starts
	public function get_user_image($user_id) {
		if (file_exists('uploads/users/'.$user_id.'.jpg'))
		return base_url().'uploads/users/'.$user_id.'.jpg';
		else
		return base_url().'uploads/users/placeholder.jpg';
	}
	// Get User Image Ends

	// Get User Image Starts
	public function get_candidate_image($candidate_id) {
		if (file_exists('uploads/candidate/'.$candidate_id.'.jpg'))
		return base_url().'uploads/candidate/'.$candidate_id.'.jpg';
		else
		return base_url().'uploads/candidate/placeholder.jpg';
	}
	// Get User Image Ends

	// Check user duplication
	public function check_duplication($action = "", $email = "", $user_id = "") {
		$duplicate_email_check = $this->db->get_where('users', array('email' => $email));

		if ($action == 'on_create') {
			if ($duplicate_email_check->num_rows() > 0) {
				return false;
			}else {
				return true;
			}
		}elseif ($action == 'on_update') {
			if ($duplicate_email_check->num_rows() > 0) {
				if ($duplicate_email_check->row()->id == $user_id) {
					return true;
				}else {
					return false;
				}
			}else {
				return true;
			}
		}
	}

	//GET LOGGED IN USER DATA
	public function get_profile_data() {
		return $this->db->get_where('users', array('id' => $this->session->userdata('user_id')))->row_array();
	}

	public function update_profile() {
		$response = array();
		$user_id = $this->session->userdata('user_id');
		$data['name'] = htmlspecialchars($this->input->post('name'));
		$data['email'] = htmlspecialchars($this->input->post('email'));
		$data['phone'] = htmlspecialchars($this->input->post('phone'));
		$data['address'] = htmlspecialchars($this->input->post('address'));
		// Check Duplication
		$duplication_status = $this->check_duplication('on_update', $data['email'], $user_id);
		if($duplication_status) {
			$this->db->where('id', $user_id);
			$this->db->update('users', $data);

			move_uploaded_file($_FILES['profile_image']['tmp_name'], 'uploads/users/'.$user_id.'.jpg');

			$response = array(
				'status' => true,
				'notification' => get_phrase('profile_updated_successfully')
			);
		}else{
			$response = array(
				'status' => false,
				'notification' => get_phrase('sorry_this_email_has_been_taken')
			);
		}

		return json_encode($response);
	}

	public function update_password() {
		$user_id = $this->session->userdata('user_id');
		if (!empty($_POST['current_password']) && !empty($_POST['new_password']) && !empty($_POST['confirm_password'])) {
			$user_details = $this->get_user_details($user_id);
			$current_password = $this->input->post('current_password');
			$new_password = $this->input->post('new_password');
			$confirm_password = $this->input->post('confirm_password');
			if ($user_details['password'] == sha1($current_password) && $new_password == $confirm_password) {
				$data['password'] = sha1($new_password);
				$this->db->where('id', $user_id);
				$this->db->update('users', $data);

				$response = array(
					'status' => true,
					'notification' => get_phrase('password_updated_successfully')
				);
			}else {

				$response = array(
					'status' => false,
					'notification' => get_phrase('mismatch_password')
				);
			}
		}else{
			$response = array(
				'status' => false,
				'notification' => get_phrase('password_can_not_be_empty')
			);
		}
		return json_encode($response);
	}

	//GET LOGGED IN USERS CLASS ID AND SECTION ID (FOR STUDENT LOGGED IN VIEW)
	public function get_logged_in_student_details() {
		$user_id = $this->session->userdata('user_id');
		$student_data = $this->db->get_where('students', array('user_id' => $user_id))->row_array();
		$student_details = $this->get_student_details_by_id('student', $student_data['id']);
		return $student_details;
	}

	// GET STUDENT LIST BY PARENT
	public function get_student_list_of_logged_in_parent() {
		$parent_id = $this->session->userdata('user_id');
		$parent_data = $this->db->get_where('parents', array('user_id' => $parent_id))->row_array();
		$checker = array(
			'parent_id' => $parent_data['id'],
			'session' => $this->active_session,
			'school_id' => $this->school_id
		);
		$students = $this->db->get_where('students', $checker)->result_array();
		foreach ($students as $key => $student) {
			$checker = array(
				'student_id' => $student['id'],
				'session' => $this->active_session,
				'school_id' => $this->school_id
			);
			$enrol_data = $this->db->get_where('enrols', $checker)->row_array();

			$user_details = $this->db->get_where('users', array('id' => $student['user_id']))->row_array();
			$students[$key]['student_id'] = $student['id'];
			$students[$key]['name'] = $user_details['name'];
			$students[$key]['email'] = $user_details['email'];
			$students[$key]['role'] = $user_details['role'];
			$students[$key]['address'] = $user_details['address'];
			$students[$key]['phone'] = $user_details['phone'];
			$students[$key]['birthday'] = $user_details['birthday'];
			$students[$key]['gender'] = $user_details['gender'];
			$students[$key]['blood_group'] = $user_details['blood_group'];
			$students[$key]['class_id'] = $enrol_data['class_id'];
			$students[$key]['section_id'] = $enrol_data['section_id'];

			$class_details = $this->crud_model->get_class_details_by_id($enrol_data['class_id'])->row_array();
			$section_details = $this->crud_model->get_section_details_by_id('section', $enrol_data['section_id'])->row_array();

			$students[$key]['class_name'] = $class_details['name'];
			$students[$key]['section_name'] = $section_details['name'];
		}
		return  $students;
	}

	// In Array for associative array
	function is_in_array($associative_array = array(), $look_up_key = "", $look_up_value = "") {
		foreach ($associative_array as $associative) {
			$keys = array_keys($associative);
			for($i = 0; $i < count($keys); $i++){
				if ($keys[$i] == $look_up_key) {
					if ($associative[$look_up_key] == $look_up_value) {
						return true;
					}
				}
			}
		}
		return false;
	}

	function get_all_teachers($user_id = ""){
		if($user_id > 0){
			$this->db->where('id', $user_id);
		}

		$this->db->where('school_id', $this->school_id);
		$this->db->where("(role='superadmin' OR role='admin' OR role='teacher')");
		return $this->db->get_where('users');
	}
	function get_all_users($user_id = ""){
		if($user_id > 0){
			$this->db->where('id', $user_id);
		}

		$this->db->where('school_id', $this->school_id);
		return $this->db->get_where('users');
	}


	//START Interview Candidate section
	public function create_candidate()
	{
		$data['candidate_name'] = html_escape($this->input->post('candidate_name'));
		$data['candidate_email'] = html_escape($this->input->post('candidate_email'));
		$data['candidate_phone'] = html_escape($this->input->post('candidate_phone'));
		$data['position_applied_for'] = $this->input->post('position_applied_for');
		$data['department'] = html_escape($this->input->post('department'));
		$data['gender'] = html_escape($this->input->post('gender'));
		$data['interview_date'] = $this->input->post('interview_date');
		$data['interview_time'] = $this->input->post('interview_time');
		$data['interview_time_am_pm'] = $this->input->post('interview_time_am_pm');
		$data['interview_location'] = html_escape($this->input->post('interview_location'));
		$data['interview_type'] = html_escape($this->input->post('interview_type'));
		$data['interview_mode'] = html_escape($this->input->post('interview_mode'));
		$data['instruction_of_candidate'] = html_escape($this->input->post('instruction_of_candidate'));
		$data['document_to_bring'] = html_escape($this->input->post('document_to_bring'));
		$data['interview_link'] = html_escape($this->input->post('interview_link'));

		if ($_FILES['resume_file']['name'] != "") {
			$uploadDir = 'uploads/candidate/resume/';
			$candidateId = $candidate_id; // Assuming $candidate_id is already defined
			$fileExtension = pathinfo($_FILES['resume_file']['name'], PATHINFO_EXTENSION);
			// Generate a unique file name using datetime and uniqid
			$newFileName = date('Ymd_His') . '_' . uniqid() . '.' . $fileExtension;
			$uploadFilePath = $uploadDir . $newFileName;

			move_uploaded_file($_FILES['resume_file']['tmp_name'], $uploadFilePath);

			$data['resume'] = $newFileName;
		}

		// check email duplication fdgfdg
		$duplication_status = $this->check_duplication_candidate('on_create', $data['candidate_email']);
		if($duplication_status){
				$this->db->insert('candidate_list', $data);
				$candidate_id = $this->db->insert_id();
			
				if ($_FILES['image_file']['name'] != "") {
						move_uploaded_file($_FILES['image_file']['tmp_name'], 'uploads/candidate/'.$candidate_id.'.jpg');
				}

				// Send mail
				$email = get_settings('system_email');
				$receiver_email = "bikashghosh2807@gmail.com";
				$comment = "Your peofile has been successfully added.";

				$msg = '<p>'.nl2br($comment)."</p>";
				$msg .= '<p>'.$data['candidate_name'].'</p>';
				$msg .= "<p>Phone : ".$data['candidate_phone'].'</p>';
				$msg .= "<p>Candidate Instruction : ". $data['instruction_of_candidate'].'</p>';

				$this->email_model->contact_message_email($email, $receiver_email, $msg);

				$response = array(
					'status' => true,
					'notification' => get_phrase('candidate_added_successfully')
				);
		    }else{
				$response = array(
					'status' => false,
					'notification' => get_phrase('sorry_this_email_has_been_taken')
				);
		    }

		return json_encode($response);
	}

	//Create new assignment section
	public function create_new_assignment()
	{
		$data['school_id'] = $this->school_id;
		$data['teacher_id'] = $this->session->userdata('user_id');
		$data['assignment_name'] = html_escape($this->input->post('assignment_name'));
		$data['publish_time'] = html_escape($this->input->post('publish_time'));
		$data['publish_date'] = html_escape($this->input->post('publish_date'));
		$data['due_date'] = $this->input->post('due_date');
		$data['class_id'] = html_escape($this->input->post('class_id'));
		$data['subject_id'] = html_escape($this->input->post('subject_id'));
		$data['category_name'] = $this->input->post('category_name');
		$data['assignment_content'] = $this->input->post('assignment_content');
		
		if ($_FILES['assignment_content_file']['name'] != "") {
			$uploadDir = 'uploads/teacher/assignment/';
			$candidateId = $candidate_id; // Assuming $candidate_id is already defined
			$fileExtension = pathinfo($_FILES['assignment_content_file']['name'], PATHINFO_EXTENSION);
			// Generate a unique file name using datetime and uniqid
			$newFileName = date('Ymd_His') . '_' . uniqid() . '.' . $fileExtension;
			$uploadFilePath = $uploadDir . $newFileName;

			move_uploaded_file($_FILES['assignment_content_file']['tmp_name'], $uploadFilePath);

			$data['assignment_content_file'] = $newFileName;
		}

		
		$this->db->insert('assignment_new', $data);
		$insert_id = $this->db->insert_id();
		if($insert_id)
		{
			$response = array(
				'status' => true,
				'notification' => get_phrase('assignment_added_successfully')
		    );

		}else{
			$response = array(
				'status' => false,
				'notification' => get_phrase('sorry_assignment_not_added')
			);
		}
			
		return json_encode($response);
	}

	//Update assignment content
	public function update_assignment($param1 = '')
	{
		$data['school_id'] = $this->school_id;
		$data['teacher_id'] = $this->session->userdata('user_id');
		$data['assignment_name'] = html_escape($this->input->post('assignment_name'));
		$data['publish_time'] = html_escape($this->input->post('publish_time'));
		$data['publish_date'] = html_escape($this->input->post('publish_date'));
		$data['due_date'] = $this->input->post('due_date');
		$data['class_id'] = html_escape($this->input->post('class_id'));
		$data['subject_id'] = html_escape($this->input->post('subject_id'));
		$data['category_name'] = $this->input->post('category_name');
		$data['assignment_content'] = $this->input->post('assignment_content');
		
		if ($_FILES['assignment_content_file']['name'] != "") {
			$uploadDir = 'uploads/teacher/assignment/';
			$candidateId = $candidate_id; // Assuming $candidate_id is already defined
			$fileExtension = pathinfo($_FILES['assignment_content_file']['name'], PATHINFO_EXTENSION);
			// Generate a unique file name using datetime and uniqid
			$newFileName = date('Ymd_His') . '_' . uniqid() . '.' . $fileExtension;
			$uploadFilePath = $uploadDir . $newFileName;

			move_uploaded_file($_FILES['assignment_content_file']['tmp_name'], $uploadFilePath);

			$data['assignment_content_file'] = $newFileName;
		}

		
		$this->db->where('id', $param1);
		//$this->db->update('assignment_new', $data);
		if($this->db->update('assignment_new', $data))
		{
			$response = array(
				'status' => true,
				'notification' => get_phrase('assignment_updated_successfully')
		    );

		}else{
			$response = array(
				'status' => false,
				'notification' => get_phrase('sorry_assignment_not_updated')
			);
		}
			
		return json_encode($response);
	}

	//Student assignment answer update
	public function student_assignment_answer($param1 = '')
	{
		$data['school_id'] = $this->school_id;
		$data['assignment_new_tbl_id'] = $param1;
		$data['student_id'] = html_escape($this->input->post('hid_studentId'));
		$data['class_id'] = html_escape($this->input->post('hid_classId'));
		$data['subject_id'] = html_escape($this->input->post('hid_subjectId'));
		$data['category'] = html_escape($this->input->post('hid_category'));
		$data['assignment_answer'] = $this->input->post('assignment_answer');
		
		if ($_FILES['assignment_answer_file']['name'] != "") {
			$uploadDir = 'uploads/student/assignment_answer_files/';
			$candidateId = $candidate_id; // Assuming $candidate_id is already defined
			$fileExtension = pathinfo($_FILES['assignment_answer_file']['name'], PATHINFO_EXTENSION);
			// Generate a unique file name using datetime and uniqid
			$newFileName = date('Ymd_His') . '_' . uniqid() . '.' . $fileExtension;
			$uploadFilePath = $uploadDir . $newFileName;

			move_uploaded_file($_FILES['assignment_answer_file']['tmp_name'], $uploadFilePath);

			$data['assignment_answer_file'] = $newFileName;
		}

		
		$this->db->insert('student_assignment_answer', $data);
		$insert_id = $this->db->insert_id();
		if($insert_id)
		{
			$response = array(
				'status' => true,
				'notification' => get_phrase('assignment_answer_updated_successfully')
		    );

		}else{
			$response = array(
				'status' => false,
				'notification' => get_phrase('sorry_assignment_not_answered')
			);
		}
			
		return json_encode($response);
	}

	public function update_candidate($param1 = '')
	{
		$postion_apply = $this->input->post('position_applied_for');
		$data['candidate_name'] = html_escape($this->input->post('candidate_name'));
		$data['candidate_email'] = html_escape($this->input->post('candidate_email'));
		$data['candidate_phone'] = html_escape($this->input->post('candidate_phone'));
		$data['position_applied_for'] = $this->input->post('position_applied_for');
		$data['department'] = $postion_apply == '1' ? html_escape($this->input->post('department')) : "";
		$data['gender'] = html_escape($this->input->post('gender'));
		$data['interview_date'] = $this->input->post('interview_date');
		$data['interview_time'] = $this->input->post('interview_time');
		$data['interview_time_am_pm'] = $this->input->post('interview_time_am_pm');
		$data['interview_location'] = html_escape($this->input->post('interview_location'));
		$data['interview_type'] = html_escape($this->input->post('interview_type'));
		$data['interview_mode'] = html_escape($this->input->post('interview_mode'));
		$data['instruction_of_candidate'] = html_escape($this->input->post('instruction_of_candidate'));
		$data['document_to_bring'] = html_escape($this->input->post('document_to_bring'));
		$data['interview_link'] = html_escape($this->input->post('interview_link'));

		if ($_FILES['resume_file']['name'] != "") {
			$uploadDir = 'uploads/candidate/resume/';
			$candidateId = $candidate_id; // Assuming $candidate_id is already defined
			$fileExtension = pathinfo($_FILES['resume_file']['name'], PATHINFO_EXTENSION);
			// Generate a unique file name using datetime and uniqid
			$newFileName = date('Ymd_His') . '_' . uniqid() . '.' . $fileExtension;
			$uploadFilePath = $uploadDir . $newFileName;

			move_uploaded_file($_FILES['resume_file']['tmp_name'], $uploadFilePath);

			$data['resume'] = $newFileName;
		}

		// check email duplication
		$duplication_status = $this->check_duplication_candidate('on_update', $data['candidate_email'], $param1);
		if($duplication_status){
			$this->db->where('id', $param1);
			$this->db->update('candidate_list', $data);

			if ($_FILES['image_file']['name'] != "") {
				move_uploaded_file($_FILES['image_file']['tmp_name'], 'uploads/candidate/'.$param1.'.jpg');
			}

			// Send mail
			$email = get_settings('system_email');
			$receiver_email = "bikashghosh2807@gmail.com";
			$comment = "Your peofile has been updated.";

			$msg = '<p>'.nl2br($comment)."</p>";
			$msg .= '<p>'.$data['candidate_name'].'</p>';
			$msg .= "<p>Phone : ".$data['candidate_phone'].'</p>';
			$msg .= "<p>Candidate Instruction : ". $data['instruction_of_candidate'].'</p>';

			$this->email_model->contact_message_email($email, $receiver_email, $msg);

			$response = array(
				'status' => true,
				'notification' => get_phrase('candidate_has_been_updated_successfully')
			);

		}else{
			$response = array(
				'status' => false,
				'notification' => get_phrase('sorry_this_email_has_been_taken')
			);
		}

		return json_encode($response);
	}

	public function delete_candidate($param1 = '')
	{
		$this->db->where('id', $param1);
		$this->db->delete('candidate_list');

		$response = array(
			'status' => true,
			'notification' => get_phrase('candidate_has_been_deleted_successfully')
		);
		return json_encode($response);
	}

	public function get_candidate() {
		$checker = array(
			'school_id' => $this->school_id,
			'role' => 'teacher'
		);
		return $this->db->get_where('users', $checker);
	}

	public function get_candidate_by_id($teacher_id = "") {
		$checker = array(
			'school_id' => $this->school_id,
			'id' => $teacher_id
		);
		$result = $this->db->get_where('teachers', $checker)->row_array();
		return $this->db->get_where('users', array('id' => $result['user_id']));
	}

	// Check user duplication
	public function check_duplication_candidate($action = "", $email = "", $candidate_id = "") {
		$duplicate_email_check = $this->db->get_where('candidate_list', array('candidate_email' => $email));

		if ($action == 'on_create') {
			if ($duplicate_email_check->num_rows() > 0) {
				return false;
			}else {
				return true;
			}
		}elseif ($action == 'on_update') {
			if ($duplicate_email_check->num_rows() > 0) {
				if ($duplicate_email_check->row()->id == $candidate_id) {
					return true;
				}else {
					return false;
				}
			}else {
				return true;
			}
		}
	}
	//END Interview Candidate section


	// Choose I-card design of student
	public function update_IcardDesign($param1 = '',$param2 = '',$param3 = '')
	{
		
		$data['i_card_template_no'] = $param2;
		$data['school_id'] = $param3;

		// check email duplication
		$get_card = $this->db->get_where('i_card_setting', array('school_id' => $param3))->row_array();
		if($get_card){
			$this->db->where('school_id', $param3);
			$this->db->update('i_card_setting', $data);

			$response = array(
				'status' => true,
				'notification' => get_phrase('i_card_design_updated_successfully')
			);

		}else{
			$this->db->insert('i_card_setting', $data);
			$last_id = $this->db->insert_id();
			$response = array(
				'status' => false,
				'notification' => get_phrase('i_card_design_inserted_successfully')
			);
		}

		return json_encode($response);
	}

    public function add_driver()
	{
		$user_data['school_id'] = html_escape($this->input->post('school_id'));
		$user_data['name'] = html_escape($this->input->post('name'));
		$user_data['email'] = html_escape($this->input->post('email'));
		$user_data['password'] = sha1($this->input->post('password'));
		$user_data['phone'] = html_escape($this->input->post('phone'));
		$user_data['role'] = 'driver';
		$user_data['salary'] = html_escape($this->input->post('salary'));

		// check email duplication
		$duplication_status = $this->check_duplication('on_create', $user_data['email']);
		if($duplication_status){
			$this->db->insert('users', $user_data);


			$driver_id = $this->db->insert_id();
			$driver_table_data['id'] = $driver_id;
			$driver_table_data['name'] = html_escape($this->input->post('name'));
		    $driver_table_data['route_id'] = html_escape($this->input->post('route_id'));
		    $driver_table_data['email'] = html_escape($this->input->post('email'));
		    $driver_table_data['password'] = sha1($this->input->post('password'));
		    $driver_table_data['vehicle_id'] = html_escape($this->input->post('vehicle_id'));
	
			$this->db->insert('driver',$driver_table_data);
			
			$response = array(
				'status' => true,
				'notification' => get_phrase('driver_added_successfully')
			);
		}else{
			$response = array(
				'status' => false,
				'notification' => get_phrase('sorry_this_email_has_been_taken')
			);
		}

		return json_encode($response);

	}
	public function driver_update($param1 = '')
	{
		$data['name'] = html_escape($this->input->post('name'));
		$data['route_id'] = html_escape($this->input->post('route_id'));
		$data['vehicle_id'] = html_escape($this->input->post('vehicle_id'));

		$this->db->where('id', $param1);
		$this->db->update('driver', $data);

		$response = array(
			'status' => true,
			'notification' => get_phrase('driver_updated_successfully')
		);
		return json_encode($response);
	}
	public function driver_delete($param1 = '')
	{
		$this->db->where('id', $param1);
		$this->db->delete('driver');

		$response = array(
			'status' => true,
			'notification' => get_phrase('deleted_successfully')
		);
		return json_encode($response);
	}
	public function get_transport_details($role='') {
		$checker = array(
			'role' => $role
		);
		return $this->db->get_where('assign_routes', $checker);
	}
    public function get_logged_in_driver_details() {
		$user_id = $this->session->userdata('user_id');
		$driver_data = $this->db->get_where('driver', array('id' => $user_id))->row_array();
		return $driver_data;
	}
    public function reshedule_candidate()
	{
		$update_id = $this->input->post('hiduser_id');
        $data['interview_date'] = $this->input->post('interview_date'); 
		$data['interview_time'] = $this->input->post('interview_time');
		$data['interview_time_am_pm'] = $this->input->post('interview_time_am_pm');
		$data['interview_link'] = html_escape($this->input->post('interview_link'));
		$data['interview_link'] = html_escape($this->input->post('interview_link'));
		$data['instruction_of_candidate'] = html_escape($this->input->post('instruction_of_candidate'));

		$this->db->where('id', $update_id);
		$this->db->update('candidate_list', $data);

		// Send mail
		//$email = get_settings('system_email');
		$email = "test@kyptronixllp.co.in";
		$receiver_email = "bikashghosh2807@gmail.com";
		$comment = "Your peofile has been updated.";

		$msg = '<p>'.nl2br($comment)."</p>";
		$msg .= '<p>'.$data['candidate_name'].'</p>';
		$msg .= "<p>Phone : ".$data['candidate_phone'].'</p>';
		$msg .= "<p>Candidate Instruction : ". $data['instruction_of_candidate'].'</p>';

		$this->email_model->contact_message_email($email, $receiver_email, $msg);

		$response = array(
					'status' => true,
					'notification' => get_phrase('candidate_resheduled_successfully')
			);
	    
	    return json_encode($response);		
	}
    public function create_users()
	{
		$data['school_id'] = html_escape($this->input->post('school_id'));
		$data['name'] = html_escape($this->input->post('name'));
		$data['email'] = html_escape($this->input->post('email'));
		$data['phone'] = html_escape($this->input->post('phone'));
		$data['password'] = sha1($this->input->post('password'));
		$data['role'] = 'hr';
		$data['salary'] = html_escape($this->input->post('salary'));

		// check email duplication fdgfdg
		$duplication_status = $this->check_duplication_candidate('on_create', $data['email']);
		if($duplication_status){
				$this->db->insert('users', $data);
				
				$response = array(
					'status' => true,
					'notification' => get_phrase('user_added_successfully')
				);
		    }else{
				$response = array(
					'status' => false,
					'notification' => get_phrase('sorry_this_email_has_been_taken')
				);
		    }

		return json_encode($response);
	}
	public function update_users($param1 = '')
	{
		$data['name'] = html_escape($this->input->post('name'));
		$data['email'] = html_escape($this->input->post('email'));
		$data['phone'] = html_escape($this->input->post('phone'));
		$data['salary'] = html_escape($this->input->post('salary'));

		// check email duplication
		$duplication_status = $this->check_duplication_candidate('on_update', $data['email'], $param1);
		if($duplication_status){
			$this->db->where('id', $param1);
			$this->db->update('users', $data);

			$response = array(
				'status' => true,
				'notification' => get_phrase('user_has_been_updated_successfully')
			);

		}else{
			$response = array(
				'status' => false,
				'notification' => get_phrase('sorry_this_email_has_been_taken')
			);
		}

		return json_encode($response);
	}

	public function student_remarks_update($data)
	{
		$student_id = $data['student_id'];
		$update_data['behavior_grade'] = html_escape($data['behavior_grade']);
		$update_data['student_remarks'] = html_escape($data['student_remarks']);
        $this->db->where('id', $student_id);
		$this->db->update('users', $update_data);

		$response = array(
				'status' => true,
				'notification' => get_phrase('student_remarks_has_been_updated_successfully')
			);
	    return json_encode($response);		

	}

    public function delete_users($param1 = '')
	{
		$this->db->where('id', $param1);
		$this->db->delete('users');

		$response = array(
			'status' => true,
			'notification' => get_phrase('user_has_been_deleted_successfully')
		);
		return json_encode($response);
	}
    public function get_total_data($class_id='') {
		$checker = array(
			'session' => $this->active_session,
			'school_id' => $this->school_id,
			'class_id' => $class_id
		);
		return $this->db->get_where('enrols', $checker)->result_array();
	}
    public function get_students_parents($class_id='') {
    	$this->db->select('s.*');
    	$this->db->from('enrols e');
    	$this->db->join('students s','s.id=e.student_id');
    	$checker = array(
			'e.session' => $this->active_session,
			'e.school_id' => $this->school_id,
			'e.class_id' => $class_id
		);
	
    	$this->db->where($checker);
    	return $this->db->get()->result_array();
	}
    public function get_total_students($class_id='',$section_id='') {
		$checker = array(
			'session' => $this->active_session,
			'school_id' => $this->school_id,
			'class_id' => $class_id,
			'section_id'=>$section_id
		);
		return $this->db->get_where('enrols', $checker)->result_array();
	}
    public function get_student_homework_marks_list_of_logged_in_parent() {
        $parent_id = $this->session->userdata('user_id');
        $parent_data = $this->db->get_where('parents', array('user_id' => $parent_id))->row_array();
        $checker = array(
            'parent_id' => $parent_data['id'],
            'session' => $this->active_session,
            'school_id' => $this->school_id
        );
        $students = $this->db->get_where('students', $checker)->result_array();
        foreach ($students as $key => $student) {
            $checker = array(
                'student_id' => $student['id'],
                'session' => $this->active_session,
                'school_id' => $this->school_id
            );
            $enrol_data = $this->db->get_where('enrols', $checker)->row_array();

            $user_details = $this->db->get_where('users', array('id' => $student['user_id']))->row_array();
            $students[$key]['student_id'] = $student['id'];
            $students[$key]['name'] = $user_details['name'];
            $students[$key]['email'] = $user_details['email'];
            $students[$key]['role'] = $user_details['role'];
            $students[$key]['address'] = $user_details['address'];
            $students[$key]['phone'] = $user_details['phone'];
            $students[$key]['birthday'] = $user_details['birthday'];
            $students[$key]['gender'] = $user_details['gender'];
            $students[$key]['blood_group'] = $user_details['blood_group'];
            $students[$key]['class_id'] = $enrol_data['class_id'];
            $students[$key]['section_id'] = $enrol_data['section_id'];

            $class_details = $this->crud_model->get_class_details_by_id($enrol_data['class_id'])->row_array();
            $section_details = $this->crud_model->get_section_details_by_id('section', $enrol_data['section_id'])->row_array();
            $marks = $this->db->get_where('homework',['student_id'=>$student['id'],'class_id'=>$enrol_data['class_id'],'school_id'=>$this->school_id])->result_array();

            $students[$key]['class_name'] = $class_details['name'];
            $students[$key]['section_name'] = $section_details['name'];
         }
        return  $marks;
    }

	


}
