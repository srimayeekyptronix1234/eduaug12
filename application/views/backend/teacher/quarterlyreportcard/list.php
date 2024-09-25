<?php
$school_id = school_id();
// echo "hello";print_r($user_details); 
// $subject = $this->db->get_where('subjects', array('class_id' => $class_id))
// exit;

// $marks = $this->db->get_where('marks', array(
//     'class_id' => $class_id,
//     'section_id' => $section_id,
//     'student_id' => $student_id,
//     'exam_id' => $exam_id,
//     'school_id' => $school_id,
//     'session' => active_session()
// ))->result_array();

$grades = $this->db->get_where('grades', array(
    'school_id' => $school_id,
    'session' => active_session()
))->result_array();

$subject = $this->db->get_where('subjects', array('class_id' => $class_id))->result_array();
//echo "<pre/>";
//print_r($subject); exit;
?>

<?php if (count($subject) > 0): ?>
    <table class="table table-bordered table-responsive-sm text-center" width="100%">
        <thead class="thead-dark">
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
            <?php 
            $home_work_multiply = 30;
            $test_quize_multiply = 30;
            $class_work_multiply = 25;
            $behavior_multiply = 10;
            $projectmultiply = 5;
            $writtenmultiply = 25;

            $total_grade_points = 0;
            $total_subjects = 0;

            foreach ($subject as $list): 
                if (!empty($list['id'])) {
                    //$subject = $this->db->get_where('subjects', array('id' => $mark['subject_id']))->row_array();
                    $student_id = $student_id;
                    $class_id = $class_id;
                    $subjectId = $list['id'];
                    //$subjectId = 1;
                    $total_subjects++;

                    // Class work Mark calculation
                    $this->db->select('student_id, class_id, exam_id, subject_id, SUM(mark_obtained) AS total_marks');
                    $this->db->from('classwork');
                    $this->db->where('student_id', $student_id);
                    $this->db->where('class_id', $class_id);
                    $this->db->where('subject_id', $subjectId);
                    $this->db->where('exam_id', $exam_id);
                    $this->db->group_by(array('student_id', 'class_id', 'subject_id', 'exam_id'));
                    $classwork_query = $this->db->get();
                    $classwork_marks = $classwork_query->result_array();

                    $class_work_mark = $classwork_marks[0]['total_marks'] ? $classwork_marks[0]['total_marks'] : 0;

                    $class_work_cal_value = $class_work_mark ? $class_work_multiply * ( $class_work_mark / 100) : 0;

                    // End

                    // Home work Mark calculation

                    $this->db->select('student_id, class_id, exam_id, subject_id, SUM(mark_obtained) AS total_marks');
                    $this->db->from('homework');
                    $this->db->where('student_id', $student_id);
                    $this->db->where('class_id', $class_id);
                    $this->db->where('subject_id', $subjectId);
                    $this->db->where('exam_id', $exam_id);
                    $this->db->group_by(array('student_id', 'class_id', 'subject_id', 'exam_id'));
                    $homework_query = $this->db->get();
                    $homework_marks = $homework_query->result_array();

                    $home_work_marks = $homework_marks[0]['total_marks'] ? $homework_marks[0]['total_marks'] : 0;

                    $home_work_cal_value = $home_work_marks ? $home_work_multiply * ( $home_work_marks / 100) : 0;

                    // End

                    // Behaviour Mark calculation

                    $this->db->select('student_id, class_id, exam_id, subject_id, SUM(mark_obtained) AS total_marks');
                    $this->db->from('behaviour');
                    $this->db->where('student_id', $student_id);
                    $this->db->where('class_id', $class_id);
                    $this->db->where('subject_id', $subjectId);
                    $this->db->where('exam_id', $exam_id);
                    $this->db->group_by(array('student_id', 'class_id', 'subject_id','exam_id'));
                    $behaviour_query = $this->db->get();
                    $behaviour_marks = $behaviour_query->result_array();

                    $behavior_mark = $behaviour_marks[0]['total_marks'] ? $behaviour_marks[0]['total_marks'] : 0;

                    $behavior_cal_value = $behavior_mark ? $behavior_multiply * ( $behavior_mark / 100) : 0;

                    // End

                    // Test/Quize Mark calculation

                    $this->db->select('student_id, class_id, subject_id, quarter_id, SUM(total_marks_obtained) AS total_marks');
                    $this->db->from('online_exam_result');
                    $this->db->where('student_id', $student_id);
                    $this->db->where('class_id', $class_id);
                    $this->db->where('subject_id', $subjectId); 
                    $this->db->where('quarter_id', $exam_id);
                    $this->db->group_by(array('student_id', 'class_id', 'subject_id', 'quarter_id'));
                    $test_quize_query = $this->db->get();
                    $test_quize_marks = $test_quize_query->result_array();

                    $test_quize_mark = $test_quize_marks[0]['total_marks'] ? $test_quize_marks[0]['total_marks'] : 0;

                    $test_quize_cal_value = $test_quize_mark ? $test_quize_multiply * ( $test_quize_mark / 100) : 0;

                    // End

                    // Project Mark calculation

                    $this->db->select('student_id, class_id, subject_id, exam_id, SUM(mark_obtained) AS total_marks');
                    $this->db->from('project');
                    $this->db->where('student_id', $student_id);
                    $this->db->where('class_id', $class_id);
                    $this->db->where('subject_id', $subjectId);
                    $this->db->where('exam_id', $exam_id);
                    $this->db->group_by(array('student_id', 'class_id', 'subject_id', 'exam_id'));
                    $project_query = $this->db->get();
                    $project_marks = $project_query->result_array();
 
                    $project_mark = $project_marks[0]['total_marks'] ? $project_marks[0]['total_marks'] : 0;

                    $project_cal_value = $project_mark ? $projectmultiply * ( $project_mark / 100) : 0;

                    // End

                    // Written test calculation

                    $this->db->select('student_id, class_id, exam_id, subject_id, SUM(mark_obtained) AS total_marks');
                    $this->db->from('marks');
                    $this->db->where('student_id', $student_id);
                    $this->db->where('class_id', $class_id);
                    $this->db->where('subject_id', $subjectId);
                    $this->db->where('exam_id', $exam_id);
                    $this->db->group_by(array('student_id', 'class_id', 'subject_id', 'exam_id'));
                    $written_query = $this->db->get();
                    $written_marks = $written_query->result_array();

                    $written_test_mark = $written_marks[0]['total_marks'] ? $written_marks[0]['total_marks'] : 0;

                    $writtent_test_cal_value = $written_test_mark ? $writtenmultiply * ( $written_test_mark / 100) : 0; 

                    // End

                    // Count ExtraCariculam activity
                    $extraCaricularActivityScore = ($class_work_cal_value + $home_work_cal_value + $behavior_cal_value + $test_quize_cal_value + $project_cal_value) / 100;

                    // count Total Score
                    //$get_original_activityVal = intval($extraCaricularActivityScore);
                    $get_extraCaricularActivityScore = $extraCaricularActivityScore ? 75 * ($extraCaricularActivityScore) : 0;
                    $totalScore_of_student = $writtent_test_cal_value + $get_extraCaricularActivityScore;
                    $gettotalScore_of_student = intval($totalScore_of_student);

                    // Calculate Grade
                    $this->db->select('*');
                    $this->db->from('grades');
                    $this->db->where('mark_from <=', $gettotalScore_of_student);
                    $this->db->where('mark_upto >=', $gettotalScore_of_student);
                    $grade_query = $this->db->get();
                    $grade_row = $grade_query->row_array();

                    $grade_name = $grade_row ? $grade_row['name'] : "";
                    $grade_point = $grade_row ? $grade_row['grade_point'] : 0;

                    $total_grade_points += $grade_point;
     
                    ?>
                    <tr class="text-center">
                        <td><?php echo $list['name']; ?></td>
                        <td><?php echo intval($written_test_mark); ?></td>
                        <td><?php echo intval($home_work_marks); ?></td>
                        <td><?php echo intval($test_quize_mark); ?></td>
                        <td><?php echo intval($class_work_mark); ?></td>
                        <td><?php echo intval($behavior_mark); ?></td>
                        <td><?php echo intval($project_mark); ?></td>
                        <td><?php echo intval($get_extraCaricularActivityScore); ?></td>
                        <td><?php echo intval($totalScore_of_student); ?></td>
                        <td><?php echo $grade_name; ?></td>
                        <td><?php echo $grade_point; ?></td>
                    </tr>
                <?php 
                }
            endforeach; 

            // Calculate cumulative grade
            $cumulative_grade_point = $total_subjects > 0 ? $total_grade_points / $total_subjects : 0;
            $cumulative_grade_name = '-';
            foreach ($grades as $grade) {
                if (intval($cumulative_grade_point) == $grade['grade_point']) {
                    $cumulative_grade_name = $grade['name'];
                    break;
                }
            }
            ?>

        </tbody>

        <!-- Cumulative Grade Row -->
        <tfoot>
            <tr class="text-center font-weight-bold">
                <td colspan="4"><b><?php echo get_phrase('cumulative_grades'); ?></b></td>
                <td colspan="6"><span style="float:right"><?php echo $cumulative_grade_name; ?></span></td>
                <td><?php echo number_format($cumulative_grade_point, 2); ?></td>
            </tr>
        </tfoot>

    </table>


<?php else: ?>
    <?php include APPPATH.'views/backend/empty.php'; ?>
<?php endif; ?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

