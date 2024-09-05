<?php
$school_id = school_id();
$check_data = $this->db->get_where('teachers', array('school_id' => $school_id));
if ($check_data->num_rows() > 0): ?>
    <table id="basic-datatable" class="table table-striped dt-responsive nowrap" width="100%"
        style="border-collapse: collapse; width: 100%; margin-bottom: 1em; color: #333; font-family: Arial, sans-serif;">
        <thead>
            <tr style="background-color: #013A7C; color: #fff;">
                <th style="padding: 10px; border-bottom: 2px solid #e2e8f0;"><?php echo get_phrase('name'); ?></th>
                <th style="padding: 10px; border-bottom: 2px solid #e2e8f0;"><?php echo get_phrase('department'); ?></th>
                <th style="padding: 10px; border-bottom: 2px solid #e2e8f0;"><?php echo get_phrase('designation'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $teachers = $this->db->get_where('teachers', array('school_id' => $school_id))->result_array();
            foreach ($teachers as $teacher) {
                ?>
                <tr
                    style="border-bottom: 1px solid #e2e8f0; background-color: #f7fafc; transition: background-color 0.3s ease;">
                    <td style="padding: 10px; color: #000; font-size: 16px;">
                        <?php echo $this->db->get_where('users', array('id' => $teacher['user_id']))->row('name'); ?>
                    </td>
                    <td style="padding: 10px; color: #000; font-size: 16px;">
                        <?php echo $this->db->get_where('departments', array('id' => $teacher['department_id']))->row('name'); ?>
                    </td>
                    <td style="padding: 10px; color: #000; font-size: 16px;"><?php echo $teacher['designation']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
<?php else: ?>
    <?php include APPPATH . 'views/backend/empty.php'; ?>
<?php endif; ?>