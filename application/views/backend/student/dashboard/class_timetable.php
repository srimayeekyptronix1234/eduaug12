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