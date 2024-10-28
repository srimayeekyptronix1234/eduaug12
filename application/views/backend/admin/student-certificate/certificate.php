<?php
  if ($action == 'pdf') {
    $action = get_phrase('export_pdf');
  }else{
    $action = get_phrase($action);
  }
  if ($selected_class == 'all') {
    $classNameForTitle = get_phrase('all_class');
  }else{
    $class_details = $this->crud_model->get_classes($selected_class)->row_array();
    $classNameForTitle = $class_details['name'];
  }
  if ($selected_status == 'all') {
    $selectedStatusForTitle = get_phrase('all');
  }else{
    $selectedStatusForTitle = ucfirst($selected_status);
  }

  //$subject = $this->db->get_where('enrols', array('student_id' => $student_id))->result_array();
  $enroll_details = $this->db->get_where('enrols', array('student_id' => $student_id))->row_array();
  $student_classID = $enroll_details['class_id'];
  $student_session = $enroll_details['session'];

  $session_details = $this->db->get_where('sessions', array('id' => $student_session))->row_array();
  $student_year = $session_details['name'];
  $currentYear = date("Y");

  $section_details = $this->db->get_where('sections', array('class_id' => $student_classID))->row_array();

  $subject_list = $this->db->get_where('subjects', array('class_id' => $student_classID))->result_array();

  // Get school details
  $school_details = $this->db->get_where('schools', array('id' => school_id()))->row_array();
?>
<!DOCTYPE html>
<html>
<head>
  <title><?php echo $action.' '.get_phrase('academic_performance_certificate'); ?></title>
  <link rel="shortcut icon" href="<?php echo $this->settings_model->get_favicon(); ?>">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    body {
        background-color: #f7f7f7;
        font-family: Arial, sans-serif;
    }
    .certificate {
        background: white;
        padding: 30px;
        border-radius: 15px;
        box-shadow: 0 0 20px rgba(0,0,0,0.1);
        max-width: 900px;
        margin: 20px auto;
    }
    .certificate-header svg {
        max-height: 100px;
    }
    .certificate-header h2 {
        font-weight: bold;
    }
    .certificate-title {
        text-align: center;
        margin-bottom: 30px;
    }
    .section-title {
        font-weight: bold;
        text-decoration: underline;
        margin-top: 20px;
    }
    .table th, .table td {
        vertical-align: middle;
    }
    .signature {
        margin-top: 30px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .signature div {
        text-align: center;
    }
    .footer {
        margin-top: 40px;
        text-align: center;
    }
</style>
</head>
<body>
    <div class="certificate">
        <div class="certificate-header text-center">
            <svg width="100" height="100">
                <!-- Your SVG logo here -->
            </svg>
            <h2>School Name</h2>
            <h4>Academic Performance Certificate</h4>
        </div>

        <div class="certificate-body">
            <div class="certificate-title">
                <h3>Student Information</h3>
            </div>
            <p><strong>Full Name:</strong> <?php echo $student_details['name'];?></p>
            <p><strong>Student ID:</strong> <?php echo $student_id;?></p>
            <p><strong>Class/Section:</strong> <?php $student_classID;?> <?php echo $section_details['name']; ?></p>
            <p><strong>Academic Year:</strong> <?php echo $student_year;?>-<?php echo $currentYear;?></p>

            <h4 class="section-title">Written Exams</h4>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Subject Name</th>
                        <th>Exam Type</th>
                        <th>Marks Obtained</th>
                        <th>Maximum Marks</th>
                        <th>Grade</th>
                        <!-- <th>Remarks</th> -->
                    </tr>
                </thead>
                <tbody>
                    <!-- Repeat this row for each subject -->
                    <?php 
                    $final_marks = 0;
                    foreach($subject_list as $list)
                    {
                        $subject_id = $list['id'];
                        $subject_details = $this->db->get_where('marks', array('student_id' => $student_id, 'subject_id' => $subject_id))->result_array();

                        $this->db->select_sum('mark_obtained');
                        $this->db->where('student_id', $student_id);
                        $this->db->where('subject_id', $subject_id);
                        $result = $this->db->get('marks')->row_array();

                        $sum_of_marks = $result['mark_obtained'] ? $result['mark_obtained'] : 0;
                        $final_marks = $sum_of_marks / 4;

                        // Get Grades
                        $this->db->select('name, grade_point');
                        $this->db->from('grades');
                        $this->db->where('mark_from <=', $final_marks);
                        $this->db->where('mark_upto >=', $final_marks);
                        $result_grade = $this->db->get()->row_array()
                    ?>
                        <tr>
                            <td><?php echo $list['name']; ?></td>
                            <td>Final Exam</td>
                            <td><?php echo $final_marks; ?></td>
                            <td>100</td>
                            <td><?php echo $result_grade['name']; ?></td>
                            <!-- <td>Excellent</td> -->
                        </tr>
                    <?php 
                    }
                    ?>
                </tbody>
            </table>

            <h4 class="section-title">Extra-Curricular Activities</h4>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Subject Name</th>
                        <th>Marks Obtained</th>
                        <th>Overall Performance</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Repeat this row for each quarter and subject -->
                    <tr>
                        <td>Classwork</td>
                        <td>80</td>
                        <td>B+</td>
                    </tr>
                    <tr>
                        <td>Homework</td>
                        <td>80</td>
                        <td>A+</td>
                    </tr>
                    <tr>
                        <td>Behaviour</td>
                        <td>80</td>
                        <td>A+</td>
                    </tr>
                    <tr>
                        <td>Project</td>
                        <td>80</td>
                        <td>A+</td>
                    </tr>
                </tbody>
            </table>

            <?php 
            // Get student attendance
            $this->db->from('daily_attendances');
            $this->db->where('student_id', $student_id);
            $this->db->where('status !=', 0);
            $attendance_count = $this->db->count_all_results();

            // Attendance percentage
            $total_days = $school_details['total_school_days'];
            $attended_days = $attendance_count;
            $attendance_percentage = ($attended_days / $total_days) * 100;
            ?>
            <h4 class="section-title">Attendance Record</h4>
            <p><strong>Total Days:</strong> <?php echo $school_details['total_school_days'];?></p>
            <p><strong>Days Attended:</strong> <?php echo $attendance_count;?></p>
            <p><strong>Attendance Percentage:</strong> <?php echo round($attendance_percentage, 2) . "%"; ?></p>

            <h4 class="section-title">Behavior and Conduct</h4>
            <p><strong>Conduct Grade:</strong> <?php echo $student_details['behavior_grade'];?></p>

            <h4 class="section-title">Final Remarks</h4>
            <p><?php echo $student_details['student_remarks'];?></p>

            <div class="signature">
                <div>
                    <p>__________________________</p>
                    <p>Principal/Headmaster</p>
                    <p>Date: <?php echo date('jS F Y'); ?></p>
                </div>
                <div>
                    <p>__________________________</p>
                    <p>Class Teacher</p>
                </div>
            </div>

            <div class="footer">
                <p><em><?php echo $school_details['quote'];?></em></p>
                <p>Contact us: <?php echo $school_details['phone'];?> | <?php echo $school_details['email'];?></p>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
