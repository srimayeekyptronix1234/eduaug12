<style>
    .filbtn:hover {
        background: #0272f3;
        color: white;
    }
</style>

<?php
$school_id = school_id();
$teacher_id = $teacher_ID; //exit;
$check_data = $this->db->get_where('assignment_new', array('teacher_id' => $teacher_id,'status' => 1));
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
            $assignmentList = $this->db->get_where('assignment_new', array('teacher_id' => $teacher_id,'status' => 1))->result_array();
            foreach ($assignmentList as $list) {
                 $subject_details = $this->db->get_where('subjects', array('id' => $list['subject_id']))->row_array();
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
                                    <a href="javascript:void(0);" class="dropdown-item"
                                    onclick="rightModal('<?php echo site_url('modal/popup/create_assignment_list/edit/' . $list['id'].'/'.$list['subject_id']); ?>', '<?php echo get_phrase('update_assignment'); ?>')"><?php echo get_phrase('edit'); ?></a>
                                <!-- item-->
                                    <a href="<?php echo route('check_assignment_answer_list?assignId=' . $list['id']); ?>" class="dropdown-item" ><?php echo get_phrase('view_student_answer'); ?></a>

                                    <a href="javascript:void(0);" class="dropdown-item"
                                    onclick="confirmModal('<?php echo route('candidate_list/delete/' . $list['id']); ?>', showAllCandidate )"><?php echo get_phrase('delete'); ?></a>
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