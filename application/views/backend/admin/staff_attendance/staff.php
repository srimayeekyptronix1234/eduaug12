<?php $school_id = school_id();
 ?>
<div class="row" style="margin-bottom: 10px; width: 100%;">
    <div class="col-6"><a href="javascript:" class="btn btn-sm btn-secondary" onclick="present_all()"><?php echo get_phrase('present_all'); ?></a></div>
    <div class="col-6"><a href="javascript:" class="btn btn-sm btn-secondary float-end" onclick="absent_all()"><?php echo get_phrase('absent_all'); ?></a></div>
</div>

<div class="table-responsive-sm row col-md-12" style="padding-right: 0px;">
      <table class="table table-bordered table-centered mb-0">
        <thead>
            <tr>
                <th><?php echo get_phrase('name'); ?></th>
                <th><?php echo get_phrase('status'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php 
                 $all_staffs = $this->db->get_where('users', array('role' => $staff_role, 'school_id' => $school_id))->result_array();
    
             ?>
                <?php foreach($all_staffs as $staff){ ?>
                <tr>
                    <td>
                    <?php if($staff['role'] == 'teacher'){ 
                             $teacher_list=$this->db->get_where('users', array('id' => $staff['id']))->row_array();
                             echo $teacher_list['name'];
                          }else if($staff['role'] == 'librarian'){ 
                             $librarian_list=$this->db->get_where('users', array('id' => $staff['id']))->row_array();
                             echo $librarian_list['name'];
                          }else if($staff['role'] == 'accountant'){ 
                             $librarian_list=$this->db->get_where('users', array('id' => $staff['id']))->row_array();
                             echo $librarian_list['name'];
                          }else if($staff['role'] == 'hr'){ 
                             $librarian_list=$this->db->get_where('users', array('id' => $staff['id']))->row_array();
                             echo $librarian_list['name'];
                          }else if($staff['role'] == 'driver'){ 
                             $librarian_list=$this->db->get_where('users', array('id' => $staff['id']))->row_array();
                             echo $librarian_list['name'];
                          }
                    ?>

                    </td>
                    <td>
                        <input type="hidden" name="staff_id[]" value="<?php echo $staff['id']; ?>">
                        <div class="custom-control custom-radio">
                            <?php $update_attendance = $this->db->get_where('staff_attendance', array('timestamp' => $attendance_date,'session_id' => active_session(), 'school_id' => $school_id, 'staff_id' => $staff['id'])); ?>
                            <?php if($update_attendance->num_rows() > 0): ?>
                                <?php $row = $update_attendance->row(); ?>
                                <input type="hidden" name="attendance_id[]" value="<?php echo $row->id; ?>">
                                <input type="radio" id="" name="status-<?php echo $staff['id']; ?>" value="1" class="present" <?php if($row->status == 1) echo 'checked'; ?> required> <?php echo get_phrase('present'); ?> &nbsp;
                                <input type="radio" id="" name="status-<?php echo $staff['id']; ?>" value="0" class="absent" <?php if($row->status != 1) echo 'checked'; ?> required> <?php echo get_phrase('absent'); ?>
                            <?php else: ?>
                                <input type="radio" id="" name="status-<?php echo $staff['id']; ?>" value="1" class="present" required> <?php echo get_phrase('present'); ?> &nbsp;
                                <input type="radio" id="" name="status-<?php echo $staff['id']; ?>" value="0" class="absent" checked required> <?php echo get_phrase('absent'); ?>
                            <?php endif; ?>
                        </div>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<script type="text/javascript">
    function present_all() {
        $(".present").prop('checked', true);
    }

    function absent_all() {
        $(".absent").prop('checked',true);
    }
</script>
