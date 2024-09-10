<style>
    .boxhover {
        box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
        border-radius: 10px;
    }

    .boxhover:hover {
        box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
        transition: 0.3s ease;
    }

    .adminbar {
        background: #ffdfe8;
        border-radius: 10px;
        box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;

    }

    .card {
        border: none !important;
    }

    .modern-table {
        width: 100%;
        border-collapse: collapse;
        border-radius: 8px;
        overflow: hidden;
        background: #f9f9f9;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .modern-table thead {
        background: #013A7C;
        color: #fff;
    }

    .modern-table thead th {
        padding: 12px;
        text-align: left;
    }

    .modern-table tbody tr:nth-child(odd) {
        background: #f2f2f2;
    }

    .modern-table tbody tr:hover {
        background: #e0f2f1;
    }

    .modern-table td {
        padding: 12px;
        text-align: center;
    }

    .modern-table td:last-child {
        border-right: none;
    }

    .modern-table th,
    .modern-table td {
        border: 1px solid #ddd;
    }

    .modern-table tbody tr:last-child td {
        border-bottom: none;
    }
</style>

<?php

$login_user_id = $this->session->userdata('user_id');
$student_details = $this->db->get_where('students', ['user_id' => $login_user_id])->row_array();
$get_student_data = $this->db->get_where('enrols', ['student_id' => $student_details['id']])->row_array();
$school_id = school_id();
$subject = $this->db->get_where('subjects', array('class_id' => $get_student_data['class_id']))->result_array();


?>
<!--title-->
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body d-flex align-items-center justify-content-between adminbar py-2">
                <div>
                    <h4 class="page-title mb-0 d-flex align-items-center">
                        <i class="mdi mdi-format-list-numbered title_icon"
                            style="font-size: 1.5rem; color: #ff7580;"></i>
                        <span
                            style="font-size: 1.5rem; font-weight: 700; color: #ff7580; margin-left: 10px; text-transform: capitalize;">
                            <?php echo get_phrase('manage_final_report_cards'); ?>
                        </span>
                    </h4>
                    <p class="text-muted mt-2" style="font-size: 16px; font-weight: 600; color: #2c2c2c !important;">
                        Manage and view final report cards for students efficiently.
                    </p>
                </div>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

<div class="row">
    <div class="col-12">
        <div class="card boxhover">
            <div class="card-body mark_content">
                <?php if (count($subject) > 0): ?>
                    <table class="modern-table">
                        <thead>
                            <tr>
                                <th><?php echo get_phrase('subject'); ?></th>
                                <th><?php echo get_phrase('writtent_test'); ?></th>
                                <th><?php echo get_phrase('home_work_mark'); ?></th>
                                <th><?php echo get_phrase('test/quize'); ?></th>
                                <th><?php echo get_phrase('class_work'); ?></th>
                                <th><?php echo get_phrase('behavior'); ?></th>
                                <th><?php echo get_phrase('project'); ?></th>
                                <th><?php echo get_phrase('Extra_activity'); ?></th>
                                <th><?php echo get_phrase('total_score'); ?></th>
                                <th><?php echo get_phrase('grade_name'); ?></th>
                                <th><?php echo get_phrase('grade_point'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($subject as $list): ?>
                                <?php if (!empty($list['id'])): ?>
                                    <?php
                                    // Fetch and calculate scores as in your original code
                                    $student_id = $student_details['id'];
                                    $class_id = $get_student_data['class_id'];
                                    $subjectId = $list['id'];

                                    // Class work Mark calculation
                                    $this->db->select('COUNT(*) as row_count, SUM(mark_obtained) AS total_marks');
                                    $this->db->from('classwork');
                                    $this->db->where('student_id', $student_id);
                                    $this->db->where('class_id', $class_id);
                                    $this->db->where('subject_id', $subjectId);
                                    $classwork_query = $this->db->get()->row_array();
                                    $number_of_classwork_count = $classwork_query['row_count'] > 0 ? 100 * $classwork_query['row_count'] : 0;
                                    $class_work_mark = $classwork_query['total_marks'] ? $classwork_query['total_marks'] : 0;
                                    $class_work_cal_value = $class_work_mark ? $class_work_multiply * ($class_work_mark / $number_of_classwork_count) : 0;

                                    // Home work Mark calculation
                                    $this->db->select('COUNT(*) as row_count, SUM(mark_obtained) AS total_marks');
                                    $this->db->from('homework');
                                    $this->db->where('student_id', $student_id);
                                    $this->db->where('class_id', $class_id);
                                    $this->db->where('subject_id', $subjectId);
                                    $homework_query = $this->db->get()->row_array();
                                    $number_of_homework_count = $homework_query['row_count'] > 0 ? 100 * $homework_query['row_count'] : 0;
                                    $home_work_marks = $homework_query['total_marks'] ? $homework_query['total_marks'] : 0;
                                    $home_work_cal_value = $home_work_marks ? $home_work_multiply * ($home_work_marks / $number_of_homework_count) : 0;

                                    // Behaviour Mark calculation
                                    $this->db->select('COUNT(*) as row_count, SUM(mark_obtained) AS total_marks');
                                    $this->db->from('behaviour');
                                    $this->db->where('student_id', $student_id);
                                    $this->db->where('class_id', $class_id);
                                    $this->db->where('subject_id', $subjectId);
                                    $behaviour_query = $this->db->get()->row_array();
                                    $number_of_behaviour_count = $behaviour_query['row_count'] > 0 ? 100 * $behaviour_query['row_count'] : 0;
                                    $behavior_mark = $behaviour_query['total_marks'] ? $behaviour_query['total_marks'] : 0;
                                    $behavior_cal_value = $behavior_mark ? $behavior_multiply * ($behavior_mark / $number_of_behaviour_count) : 0;

                                    // Test/Quiz Mark calculation
                                    $this->db->select('COUNT(*) as row_count, SUM(total_marks_obtained) AS total_marks');
                                    $this->db->from('online_exam_result');
                                    $this->db->where('student_id', $student_id);
                                    $this->db->where('class_id', $class_id);
                                    $this->db->where('subject_id', $subjectId);
                                    $test_quize_query = $this->db->get()->row_array();
                                    $number_of_quize_count = $test_quize_query['row_count'] > 0 ? 100 * $test_quize_query['row_count'] : 0;
                                    $test_quize_mark = $test_quize_query['total_marks'] ? $test_quize_query['total_marks'] : 0;
                                    $test_quize_cal_value = $test_quize_mark ? $test_quize_multiply * ($test_quize_mark / $number_of_quize_count) : 0;

                                    // Project Mark calculation
                                    $this->db->select('COUNT(*) as row_count, SUM(mark_obtained) AS total_marks');
                                    $this->db->from('project');
                                    $this->db->where('student_id', $student_id);
                                    $this->db->where('class_id', $class_id);
                                    $this->db->where('subject_id', $subjectId);
                                    $project_query = $this->db->get()->row_array();
                                    $number_of_project_exam = $project_query['row_count'] > 0 ? 100 * $project_query['row_count'] : 0;
                                    $projectmark = $project_query['total_marks'] ? $project_query['total_marks'] : 0;
                                    $project_cal_value = $projectmark ? $projectmultiply * ($projectmark / $number_of_project_exam) : 0;

                                    // Written test calculation
                                    $this->db->select('COUNT(*) as row_count, SUM(mark_obtained) AS total_marks');
                                    $this->db->from('marks');
                                    $this->db->where('student_id', $student_id);
                                    $this->db->where('class_id', $class_id);
                                    $this->db->where('subject_id', $subjectId);
                                    $written_query = $this->db->get()->row_array();
                                    $number_of_written_exam = $written_query['row_count'] > 0 ? 100 * $written_query['row_count'] : 0;
                                    $writtentest_mark = $written_query['total_marks'] ? $written_query['total_marks'] : 0;
                                    $writtent_test_cal_value = $writtentest_mark ? $writtenmultiply * ($writtentest_mark / $number_of_written_exam) : 0;

                                    // Count Extra Curricular Activity
                                    $extraCaricularActivityScore = ($class_work_cal_value + $home_work_cal_value + $behavior_cal_value + $test_quize_cal_value + $project_cal_value) / 100;

                                    // Count Total Score
                                    $extracaricul_percent = $get_original_activityVal ? 75 * ($get_original_activityVal / 100) : 0;
                                    $totalScore_of_student = $writtent_test_cal_value + $extracaricul_percent;
                                    $gettotalScore_of_student = intval($totalScore_of_student);

                                    // Calculate Grade
                                    $this->db->select('*');
                                    $this->db->from('grades');
                                    $this->db->where('mark_from <=', $gettotalScore_of_student);
                                    $this->db->where('mark_upto >=', $gettotalScore_of_student);
                                    $grade_query = $this->db->get()->row_array();
                                    $grade_name = $grade_query ? $grade_query['name'] : "";
                                    $grade_point = $grade_query ? $grade_query['grade_point'] : 0;
                                    ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($list['name']); ?></td>
                                        <td><?php echo intval($writtent_test_cal_value); ?></td>
                                        <td><?php echo intval($home_work_cal_value); ?></td>
                                        <td><?php echo intval($test_quize_cal_value); ?></td>
                                        <td><?php echo intval($class_work_cal_value); ?></td>
                                        <td><?php echo intval($behavior_cal_value); ?></td>
                                        <td><?php echo intval($project_cal_value); ?></td>
                                        <td><?php echo intval($get_original_activityVal); ?></td>
                                        <td><?php echo intval($gettotalScore_of_student); ?></td>
                                        <td><?php echo htmlspecialchars($grade_name); ?></td>
                                        <td><?php echo intval($grade_point); ?></td>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                <?php else: ?>
                    <?php include APPPATH . 'views/backend/empty.php'; ?>
                <?php endif; ?>

            </div>
        </div>
    </div>
</div>