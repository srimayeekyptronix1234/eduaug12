<?php
$school_id = school_id();
$user_id = $this->session->userdata('user_id');
$check_data = $this->db->get_where('teachers', array('school_id' => $school_id,'user_id'=>$user_id));
if($check_data->num_rows() > 0):?>
<table id="basic-datatable" class="table table-striped dt-responsive nowrap" width="100%">
    <thead>
        <tr style="background-color: #313a46; color: #ababab;">
            <th><?php echo get_phrase('name'); ?></th>
            <th><?php echo get_phrase('department'); ?></th>
            <th><?php echo get_phrase('designation'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php
        $teachers = $this->db->get_where('teachers', array('school_id' => $school_id,'user_id'=>$user_id))->row_array();
            ?>
            <tr>
                <td><?php echo $this->db->get_where('users', array('id' => $teachers['user_id']))->row('name'); ?></td>
                <td><?php echo $this->db->get_where('departments', array('id' => $teachers['department_id']))->row('name'); ?></td>
                <td><?php echo $teachers['designation']; ?></td>

            </tr>
    </tbody>
</table>
<?php else: ?>
    <?php include APPPATH.'views/backend/empty.php'; ?>
<?php endif; ?>
