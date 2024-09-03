<?php
$user_id = $this->session->userdata('user_id');
$student_table_data = $this->db->get_where('students', ['user_id' => $user_id])->row_array();
$enrols_table_data = $this->db->get_where('enrols', ['student_id' => $student_table_data['id']])->row_array();
$current_session_teachers = $this->user_model->get_total_data($enrols_table_data['class_id']);
$school_id = school_id();
?>
<?php if (isset($enrols_table_data['class_id']) && isset($enrols_table_data['section_id'])): ?>
    <table class="table table-striped table-bordered table-centered mb-0">
        <tbody>
            <?php
            // Define days of the week array
            $days = ['saturday', 'sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday'];

            // Loop through each day
            foreach ($days as $day) {
                ?>
                <tr>
                    <td style="font-weight: bold; width : 100px;"><?php echo get_phrase($day); ?></td>
                    <td class="m-1">
                        <?php
                        // Fetch routines for the current day
                        $routines = $this->db->get_where('routines', array(
                            'class_id' => $enrols_table_data['class_id'],
                            'section_id' => $enrols_table_data['section_id'],
                            'session_id' => active_session(),
                            'day' => $day
                        ))->result_array();

                        // Loop through each routine
                        foreach ($routines as $routine) {
                            ?>
                            <div class="btn-group text-start">
                                <button type="button" class="btn btn-secondary dropdown-toggle">
                                    <p style="margin-bottom: 0px;"><i class="mdi mdi-book-open-variant"></i>
                                        <?php echo $this->db->get_where('subjects', array('id' => $routine['subject_id']))->row('name'); ?>
                                    </p>
                                    <p style="margin-bottom: 0px;"><i class="mdi mdi-clock"></i>
                                        <?php echo $routine['starting_hour'] . ':' . $routine['starting_minute'] . ' - ' . $routine['ending_hour'] . ':' . $routine['ending_minute']; ?>
                                    </p>
                                    <p style="margin-bottom: 0px;"><i class="mdi mdi-account"></i>
                                        <?php echo $this->user_model->get_user_details($this->db->get_where('teachers', array('id' => $routine['teacher_id']))->row('user_id'), 'name'); ?>
                                    </p>
                                    <p style="margin-bottom: 0px;"><i class="mdi mdi-home-automation"></i>
                                        <?php echo $this->db->get_where('class_rooms', array('id' => $routine['room_id']))->row('name'); ?>
                                    </p>
                                    <span class="caret"></span>
                                </button>
                            </div>
                        <?php } ?>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

<?php else: ?>
    <?php include APPPATH . 'views/backend/empty.php'; ?>
<?php endif; ?>