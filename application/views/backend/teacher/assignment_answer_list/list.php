<style>
    .filbtn:hover {
        background: #0272f3;
        color: white;
    }
</style>

<?php
$school_id = school_id();
$assignment_id = $assignment_ID; //exit;
$check_data = $this->db->get_where('student_assignment_answer', array('assignment_new_tbl_id' => $assignment_id));
if ($check_data->num_rows() > 0): ?>
    <table id="basic-datatable" class="table table-striped dt-responsive nowrap w-100">
        <thead>
            <tr style="background-color: #0272f3; color: #fff;">
                <th><?php echo get_phrase('student_name'); ?></th>
                <th><?php echo get_phrase('class'); ?></th>
                <th><?php echo get_phrase('subject'); ?></th>
                <th><?php echo get_phrase('category'); ?></th>
                <th><?php echo get_phrase('view_answer'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $assignmentList = $this->db->get_where('student_assignment_answer', array('assignment_new_tbl_id' => $assignment_id))->result_array();
            foreach ($assignmentList as $list) {

                $this->db->select('students.*, users.name, users.email'); 
                $this->db->from('students');
                $this->db->join('users', 'students.user_id = users.id', 'left');
                $this->db->where('students.id', $list['student_id']); 
                $query = $this->db->get();
                $user_details = $query->row_array(); 

                $subject_details = $this->db->get_where('subjects', array('id' => $list['subject_id']))->row_array();

                $class_details = $this->db->get_where('classes', array('id' => $list['class_id']))->row_array();
                ?>
                <tr>
                    <td><?php echo get_phrase($user_details['name']); ?></td>
                    <td><?php echo get_phrase($class_details['name']); ?></td>
                    <td><?php echo get_phrase($subject_details['name']); ?></td>
                    <td><?php echo get_phrase($list['category']); ?></td>
                    <td>
                        <a href="javascript:void(0);" class="dropdown-item"
                        onclick="rightModal('<?php echo site_url('modal/popup/assignment_answer_list/edit/' . $list['id'].'/'.$list['student_id'].'/'.$list['subject_id']); ?>', '<?php echo get_phrase('check_assignment_answer'); ?>')"><?php echo get_phrase('click_to_view_answer'); ?></a>
                   </td>
                   
                </tr>
            <?php } ?>
        </tbody>
    </table>
<?php else: ?>
    <?php include APPPATH . 'views/backend/empty.php'; ?>
<?php endif; ?>