<style>
    .filbtn:hover {
        background: #0272f3;
        color: white;
    }
</style>

<?php
$login_student_ID = $login_student_ID; //exit;
$login_student_classId = $login_student_classId; 
$login_student_schoolId = $login_student_schoolId; 
$check_data = $this->db->get_where('assignment_new', array('class_id' => $login_student_classId,'school_id' => $login_student_schoolId,'status' => 1));
if ($check_data->num_rows() > 0): ?>
    <table id="basic-datatable" class="table table-striped dt-responsive nowrap w-100">
        <thead>
            <tr style="background-color: #0272f3; color: #fff;">
                <th><?php echo get_phrase('assignment_name'); ?></th>
                <th><?php echo get_phrase('publish_date'); ?></th>
                <th><?php echo get_phrase('due_date'); ?></th>
                <th><?php echo get_phrase('class'); ?></th>
                <th><?php echo get_phrase('subject'); ?></th>
                <th><?php echo get_phrase('category'); ?></th>
                <th><?php echo get_phrase('options'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $assignmentList = $this->db->get_where('assignment_new', array('class_id' => $login_student_classId,'school_id' => $login_student_schoolId,'status' => 1))->result_array();
            foreach ($assignmentList as $list) {
                $subject_details = $this->db->get_where('subjects', array('id' => $list['subject_id']))->row_array();

                $already_answered = $this->db->get_where('student_assignment_answer', array('assignment_new_tbl_id' => $list['id'],'student_id' => $login_student_ID))->row_array();
                ?>
                <tr>
                    <td><?php echo get_phrase($list['assignment_name']); ?></td>
                    <td><?php echo get_phrase($list['publish_date']); ?></td>
                    <td><?php echo get_phrase($list['due_date']); ?></td>
                    <td><?php echo "Class".get_phrase($list['class_id']); ?></td>
                    <td><?php echo get_phrase($subject_details['name']); ?></td>
                    <td><?php echo get_phrase($list['category_name']); ?></td>
                    <td>
                        <div class="dropdown text-center">
                            <button type="button"
                                class="btn btn-sm btn-icon btn-rounded btn-outline-secondary dropdown-btn dropdown-toggle arrow-none card-drop filbtn"
                                data-bs-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-vertical"></i></button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <?php
                                $publishDate = $list['publish_date'];
                                $dueDate = $list['due_date'];
                                $todayDate = date("Y-m-d");

                                $publishTimestamp = strtotime($publishDate);
                                $dueTimestamp = strtotime($dueDate);
                                $todayTimestamp = strtotime($todayDate);

                                // Check if today is between publish date and due date
                                if ($todayTimestamp >= $publishTimestamp && $todayTimestamp <= $dueTimestamp) {
                                if(isset($already_answered)) {?>
                                    <a href="javascript:void(0);" class="dropdown-item"
                                    onclick="rightModal('<?php echo site_url('modal/popup/assignment_list/edit/' . $list['id'].'/'.$list['subject_id'].'/'.$login_student_classId.'/'.$login_student_ID); ?>', '<?php echo get_phrase('update_assignment'); ?>')" style="color: red;"><?php echo get_phrase('you_already_answered'); ?></a>
                                <?php } else { ?>    
                                        <a href="javascript:void(0);" class="dropdown-item"
                                        onclick="rightModal('<?php echo site_url('modal/popup/assignment_list/edit/' . $list['id'].'/'.$list['subject_id'].'/'.$login_student_classId.'/'.$login_student_ID); ?>', '<?php echo get_phrase('update_assignment'); ?>')"><?php echo get_phrase('give_answer'); ?></a>
                                <?php } ?>    
                                <!-- item-->
                                 <?php } else {?>
                                        <a href="javascript:void(0);" class="dropdown-item"
                                        style="color: red;"><?php echo get_phrase('assignment_expire'); ?></a>
                                 <?php }?>   

                            </div>
                        </div>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
<?php else: ?>
    <?php include APPPATH . 'views/backend/empty.php'; ?>
<?php endif; ?>