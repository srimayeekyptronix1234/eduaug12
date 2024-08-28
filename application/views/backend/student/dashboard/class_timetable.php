<style>
    thead {
        background-color: #035FBD;
        /* Blue background */
        color: #fff;
        /* White text color */
        text-transform: uppercase;
        /* Uppercase text for headers */
    }

    thead th {
        padding: 15px 10px;
        /* Add padding to table headers */
        font-weight: 600;
        /* Bold font weight */
        font-size: 14px;
        /* Font size */
        border-right: 1px solid #004080;
        /* Right border for separation */
    }

    thead th:last-child {
        border-right: none;
        /* Remove right border for last header */
    }

    thead th:first-child {
        border-left: none;
        /* Remove left border for the first header */
    }

    thead th:hover {
        background-color: #004080;
        /* Slightly darker background on hover */
        cursor: pointer;
        /* Change cursor to pointer on hover */
    }

    /* Table Styles */
    #basic-datatable {
        width: 100%;
        border-collapse: collapse;
        font-family: 'Arial', sans-serif;
        background-color: #f9f9f9;
        /* Light background for better contrast */
        border-radius: 8px;
        /* Rounded corners */
        overflow: hidden;
        /* Ensure round corners are visible */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        /* Subtle shadow for depth */
    }

    #basic-datatable thead {
        background-color: #4A76A8;
        /* Darker blue for header */
        color: #ffffff;
        /* White text color */
        text-transform: uppercase;
        /* Uppercase text for headers */
    }

    #basic-datatable thead th {
        padding: 15px 10px;
        /* Padding for header cells */
        font-weight: 600;
        /* Bold font weight */
        font-size: 14px;
        /* Font size */
        text-align: left;
        /* Align text to the left */
        border-right: 1px solid #3B5A7C;
        /* Border between header cells */
    }

    #basic-datatable thead th:last-child {
        border-right: none;
        /* Remove border on the last header cell */
    }

    #basic-datatable tbody tr {
        border-bottom: 1px solid #ddd;
        /* Subtle border for row separation */
    }

    #basic-datatable tbody tr:last-child {
        border-bottom: none;
        /* Remove border on the last row */
    }

    #basic-datatable tbody td {
        padding: 10px;
        /* Padding for table cells */
        font-size: 13px;
        /* Font size */
        color: #333333;
        /* Darker text color */
        vertical-align: top;
        /* Align text to the top */
    }

    #basic-datatable tbody td p {
        margin: 5px 0;
        /* Margin for paragraphs */
        font-size: 14px;
        /* Font size */
        color: #000;
        /* Subtle text color */
        font-weight: 600;
    }

    #basic-datatable tbody tr:hover {
        background-color: #e8f0fe;
        /* Light hover effect */
        transition: background-color 0.3s ease;
        /* Smooth transition for hover */
    }

    #basic-datatable tbody td i {
        color: #33397abf;
        margin-right: 5px;
        font-size: 17px;

    }
</style>

<?php
$user_id = $this->session->userdata('user_id');
$student_table_data = $this->db->get_where('students', ['user_id' => $user_id])->row_array();
$enrols_table_data = $this->db->get_where('enrols', ['student_id' => $student_table_data['id']])->row_array();
$current_session_teachers = $this->user_model->get_total_data($enrols_table_data['class_id']);
$school_id = school_id();
?>
<table id="basic-datatable" class="table table-striped dt-responsive nowrap" width="100%">
    <thead>
        <tr>
            <th><?php echo get_phrase('saturday'); ?></th>
            <th><?php echo get_phrase('sunday'); ?></th>
            <th><?php echo get_phrase('monday'); ?></th>
            <th><?php echo get_phrase('tuesday'); ?></th>
            <th><?php echo get_phrase('wednesday'); ?></th>
            <th><?php echo get_phrase('thursday'); ?></th>
            <th><?php echo get_phrase('friday'); ?> </th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <?php
            $satureday_routines = $this->db->get_where('routines', array('class_id' => $enrols_table_data['class_id'], 'section_id' => $enrols_table_data['section_id'], 'session_id' => active_session(), 'day' => 'saturday'))->result_array();
            foreach ($satureday_routines as $satureday_routine) {
                ?>
                <td>
                    <p style="margin-bottom: 0px;"><i class="mdi mdi-book-open-variant"></i>
                        <?php echo $this->db->get_where('subjects', array('id' => $satureday_routine['subject_id']))->row('name'); ?>
                    </p>
                    <p style="margin-bottom: 0px;"><i class="mdi mdi-clock"></i>
                        <?php echo $satureday_routine['starting_hour'] . ':' . $satureday_routine['starting_minute'] . ' - ' . $satureday_routine['ending_hour'] . ':' . $satureday_routine['ending_minute']; ?>
                    </p>
                    <p style="margin-bottom: 0px;"><i class="mdi mdi-account"></i>
                        <?php echo $this->user_model->get_user_details($this->db->get_where('teachers', array('id' => $satureday_routine['teacher_id']))->row('user_id'), 'name'); ?>
                    </p>
                    <p style="margin-bottom: 0px;"><i class="mdi mdi-home-automation"></i>
                        <?php echo $this->db->get_where('class_rooms', array('id' => $satureday_routine['room_id']))->row('name'); ?>
                    </p>

                </td>
            <?php } ?>
            <?php
            $sunday_routines = $this->db->get_where('routines', array('class_id' => $enrols_table_data['class_id'], 'section_id' => $enrols_table_data['section_id'], 'session_id' => active_session(), 'day' => 'sunday'))->result_array();
            foreach ($sunday_routines as $sunday_routine) {
                ?>
                <td>
                    <p style="margin-bottom: 0px;"><i class="mdi mdi-book-open-variant"></i>
                        <?php echo $this->db->get_where('subjects', array('id' => $sunday_routine['subject_id']))->row('name'); ?>
                    </p>
                    <p style="margin-bottom: 0px;"><i class="mdi mdi-clock"></i>
                        <?php echo $sunday_routine['starting_hour'] . ':' . $sunday_routine['starting_minute'] . ' - ' . $sunday_routine['ending_hour'] . ':' . $sunday_routine['ending_minute']; ?>
                    </p>
                    <p style="margin-bottom: 0px;"><i class="mdi mdi-account"></i>
                        <?php echo $this->user_model->get_user_details($this->db->get_where('teachers', array('id' => $sunday_routine['teacher_id']))->row('user_id'), 'name'); ?>
                    </p>
                    <p style="margin-bottom: 0px;"><i class="mdi mdi-home-automation"></i>
                        <?php echo $this->db->get_where('class_rooms', array('id' => $sunday_routine['room_id']))->row('name'); ?>
                    </p>

                </td>
            <?php } ?>
            <?php
            $monday_routines = $this->db->get_where('routines', array('class_id' => $enrols_table_data['class_id'], 'section_id' => $enrols_table_data['section_id'], 'session_id' => active_session(), 'day' => 'monday'))->result_array();
            foreach ($monday_routines as $monday_routine) {
                ?>

                <td>
                    <p style="margin-bottom: 0px;"><i class="mdi mdi-book-open-variant"></i>
                        <?php echo $this->db->get_where('subjects', array('id' => $monday_routine['subject_id']))->row('name'); ?>
                    </p>
                    <p style="margin-bottom: 0px;"><i class="mdi mdi-clock"></i>
                        <?php echo $monday_routine['starting_hour'] . ':' . $monday_routine['starting_minute'] . ' - ' . $monday_routine['ending_hour'] . ':' . $monday_routine['ending_minute']; ?>
                    </p>
                    <p style="margin-bottom: 0px;"><i class="mdi mdi-account"></i>
                        <?php echo $this->user_model->get_user_details($this->db->get_where('teachers', array('id' => $monday_routine['teacher_id']))->row('user_id'), 'name'); ?>
                    </p>
                    <p style="margin-bottom: 0px;"><i class="mdi mdi-home-automation"></i>
                        <?php echo $this->db->get_where('class_rooms', array('id' => $monday_routine['room_id']))->row('name'); ?>
                    </p>

                </td>
            <?php } ?>
            <?php
            $tuesday_routines = $this->db->get_where('routines', array('class_id' => $enrols_table_data['class_id'], 'section_id' => $enrols_table_data['section_id'], 'session_id' => active_session(), 'day' => 'tuesday'))->result_array();
            foreach ($tuesday_routines as $tuesday_routine) {
                ?>

                <td>
                    <p style="margin-bottom: 0px;"><i class="mdi mdi-book-open-variant"></i>
                        <?php echo $this->db->get_where('subjects', array('id' => $tuesday_routine['subject_id']))->row('name'); ?>
                    </p>
                    <p style="margin-bottom: 0px;"><i class="mdi mdi-clock"></i>
                        <?php echo $tuesday_routine['starting_hour'] . ':' . $tuesday_routine['starting_minute'] . ' - ' . $tuesday_routine['ending_hour'] . ':' . $tuesday_routine['ending_minute']; ?>
                    </p>
                    <p style="margin-bottom: 0px;"><i class="mdi mdi-account"></i>
                        <?php echo $this->user_model->get_user_details($this->db->get_where('teachers', array('id' => $tuesday_routine['teacher_id']))->row('user_id'), 'name'); ?>
                    </p>
                    <p style="margin-bottom: 0px;"><i class="mdi mdi-home-automation"></i>
                        <?php echo $this->db->get_where('class_rooms', array('id' => $tuesday_routine['room_id']))->row('name'); ?>
                    </p>

                </td>
            <?php } ?>
            <?php
            $wednesday_routines = $this->db->get_where('routines', array('class_id' => $enrols_table_data['class_id'], 'section_id' => $enrols_table_data['section_id'], 'session_id' => active_session(), 'day' => 'wednesday'))->result_array();
            foreach ($wednesday_routines as $wednesday_routine) {
                ?>

                <td>
                    <p style="margin-bottom: 0px;"><i class="mdi mdi-book-open-variant"></i>
                        <?php echo $this->db->get_where('subjects', array('id' => $wednesday_routine['subject_id']))->row('name'); ?>
                    </p>
                    <p style="margin-bottom: 0px;"><i class="mdi mdi-clock"></i>
                        <?php echo $wednesday_routine['starting_hour'] . ':' . $wednesday_routine['starting_minute'] . ' - ' . $wednesday_routine['ending_hour'] . ':' . $wednesday_routine['ending_minute']; ?>
                    </p>
                    <p style="margin-bottom: 0px;"><i class="mdi mdi-account"></i>
                        <?php echo $this->user_model->get_user_details($this->db->get_where('teachers', array('id' => $wednesday_routine['teacher_id']))->row('user_id'), 'name'); ?>
                    </p>
                    <p style="margin-bottom: 0px;"><i class="mdi mdi-home-automation"></i>
                        <?php echo $this->db->get_where('class_rooms', array('id' => $wednesday_routine['room_id']))->row('name'); ?>
                    </p>

                </td>
            <?php } ?>
            <?php
            $thursday_routines = $this->db->get_where('routines', array('class_id' => $enrols_table_data['class_id'], 'section_id' => $enrols_table_data['section_id'], 'session_id' => active_session(), 'day' => 'thursday'))->result_array();
            foreach ($thursday_routines as $thursday_routine) {
                ?>

                <td>
                    <p style="margin-bottom: 0px;"><i class="mdi mdi-book-open-variant"></i>
                        <?php echo $this->db->get_where('subjects', array('id' => $thursday_routine['subject_id']))->row('name'); ?>
                    </p>
                    <p style="margin-bottom: 0px;"><i class="mdi mdi-clock"></i>
                        <?php echo $thursday_routine['starting_hour'] . ':' . $thursday_routine['starting_minute'] . ' - ' . $thursday_routine['ending_hour'] . ':' . $thursday_routine['ending_minute']; ?>
                    </p>
                    <p style="margin-bottom: 0px;"><i class="mdi mdi-account"></i>
                        <?php echo $this->user_model->get_user_details($this->db->get_where('teachers', array('id' => $thursday_routine['teacher_id']))->row('user_id'), 'name'); ?>
                    </p>
                    <p style="margin-bottom: 0px;"><i class="mdi mdi-home-automation"></i>
                        <?php echo $this->db->get_where('class_rooms', array('id' => $thursday_routine['room_id']))->row('name'); ?>
                    </p>

                </td>
            <?php } ?>
            <?php
            $friday_routines = $this->db->get_where('routines', array('class_id' => $enrols_table_data['class_id'], 'section_id' => $enrols_table_data['section_id'], 'session_id' => active_session(), 'day' => 'friday'))->result_array();
            foreach ($friday_routines as $friday_routine) {
                ?>
                <td>
                    <p style="margin-bottom: 0px;"><i class="mdi mdi-book-open-variant"></i>
                        <?php echo $this->db->get_where('subjects', array('id' => $friday_routine['subject_id']))->row('name'); ?>
                    </p>
                    <p style="margin-bottom: 0px;"><i class="mdi mdi-clock"></i>
                        <?php echo $friday_routine['starting_hour'] . ':' . $friday_routine['starting_minute'] . ' - ' . $friday_routine['ending_hour'] . ':' . $friday_routine['ending_minute']; ?>
                    </p>
                    <p style="margin-bottom: 0px;"><i class="mdi mdi-account"></i>
                        <?php echo $this->user_model->get_user_details($this->db->get_where('teachers', array('id' => $friday_routine['teacher_id']))->row('user_id'), 'name'); ?>
                    </p>
                    <p style="margin-bottom: 0px;"><i class="mdi mdi-home-automation"></i>
                        <?php echo $this->db->get_where('class_rooms', array('id' => $friday_routine['room_id']))->row('name'); ?>
                    </p>

                </td>
            <?php } ?>
        </tr>
    </tbody>
</table>