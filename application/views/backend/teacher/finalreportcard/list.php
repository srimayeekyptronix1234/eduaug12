<?php
$school_id = school_id();
// $marks = $this->db->get_where('marks', array(
//     'class_id' => $class_id,
//     'section_id' => $section_id,
//     'student_id' => $student_id,
//     'exam_id' => $exam_id,
//     'school_id' => $school_id,
//     'session' => active_session()
// ))->result_array();

// $grades = $this->db->get_where('grades', array(
//     'school_id' => $school_id,
//     'session' => active_session()
// ))->result_array();

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

            foreach ($subject as $list): 
                if (!empty($list['id'])) {
                    //$subject = $this->db->get_where('subjects', array('id' => $mark['subject_id']))->row_array();
                    $student_id = $student_id;
                    $class_id = $class_id;
                    $subjectId = $list['id'];
                    //$subjectId = 1;

                    // Class work Mark calculation
                    $this->db->select('COUNT(*) as row_count');
                    $this->db->from('classwork');
                    $this->db->where('student_id', $student_id);
                    $this->db->where('class_id', $class_id);
                    $this->db->where('subject_id', $subjectId);
                    $cnt_classwork_query = $this->db->get();
                    $classwork_count = $cnt_classwork_query->row()->row_count;

                    $this->db->select('student_id, class_id, subject_id, SUM(mark_obtained) AS total_marks');
                    $this->db->from('classwork');
                    $this->db->where('student_id', $student_id);
                    $this->db->where('class_id', $class_id);
                    $this->db->where('subject_id', $subjectId);
                    $this->db->group_by(array('student_id', 'class_id', 'subject_id'));
                    $classwork_query = $this->db->get();
                    $classwork_marks = $classwork_query->result_array();

                    $number_of_classwork_count = $classwork_count > 0 ? 100 * $classwork_count : 0;
                    $class_work_mark = $classwork_marks[0]['total_marks'] ? $classwork_marks[0]['total_marks'] : 0;

                    $class_work_cal_value = $class_work_mark ? $class_work_multiply * ( $class_work_mark / $number_of_classwork_count) : 0;

                    //echo "class_work_cal_value=".$class_work_cal_value;

                    // End

                    // Home work Mark calculation
                    $this->db->select('COUNT(*) as row_count');
                    $this->db->from('homework');
                    $this->db->where('student_id', $student_id);
                    $this->db->where('class_id', $class_id);
                    $this->db->where('subject_id', $subjectId);
                    $cnt_homework_query = $this->db->get();
                    $homework_count = $cnt_homework_query->row()->row_count;

                    $this->db->select('student_id, class_id, subject_id, SUM(mark_obtained) AS total_marks');
                    $this->db->from('homework');
                    $this->db->where('student_id', $student_id);
                    $this->db->where('class_id', $class_id);
                    $this->db->where('subject_id', $subjectId);
                    $this->db->group_by(array('student_id', 'class_id', 'subject_id'));
                    $homework_query = $this->db->get();
                    $homework_marks = $homework_query->result_array();

                    $number_of_homework_count = $homework_count > 0 ? 100 * $homework_count : 0;
                    $home_work_marks = $homework_marks[0]['total_marks'] ? $homework_marks[0]['total_marks'] : 0;

                    $home_work_cal_value = $home_work_marks ? $home_work_multiply * ( $home_work_marks / $number_of_homework_count) : 0;
                    // End

                    // Behaviour Mark calculation
                    $this->db->select('COUNT(*) as row_count');
                    $this->db->from('behaviour');
                    $this->db->where('student_id', $student_id);
                    $this->db->where('class_id', $class_id);
                    $this->db->where('subject_id', $subjectId);
                    $cnt_behaviour_query = $this->db->get();
                    $behaviour_count = $cnt_behaviour_query->row()->row_count;

                    $this->db->select('student_id, class_id, subject_id, SUM(mark_obtained) AS total_marks');
                    $this->db->from('behaviour');
                    $this->db->where('student_id', $student_id);
                    $this->db->where('class_id', $class_id);
                    $this->db->where('subject_id', $subjectId);
                    $this->db->group_by(array('student_id', 'class_id', 'subject_id'));
                    $behaviour_query = $this->db->get();
                    $behaviour_marks = $behaviour_query->result_array();

                    $number_of_behaviour_count = $behaviour_count > 0 ? 100 * $behaviour_count : 0;
                    $behavior_mark = $behaviour_marks[0]['total_marks'] ? $behaviour_marks[0]['total_marks'] : 0;

                    $behavior_cal_value = $behavior_mark ? $behavior_multiply * ( $behavior_mark / $number_of_behaviour_count) : 0;

                    // End

                    // Test/Quize Mark calculation
                    $this->db->select('COUNT(*) as row_count');
                    $this->db->from('online_exam_result');
                    $this->db->where('student_id', $student_id);
                    $this->db->where('class_id', $class_id);
                    $this->db->where('subject_id', $subjectId);
                    $cnt_test_quize_query = $this->db->get();
                    $test_quize_count = $cnt_test_quize_query->row()->row_count;

                    $this->db->select('student_id, class_id, subject_id, SUM(total_marks_obtained) AS total_marks');
                    $this->db->from('online_exam_result');
                    $this->db->where('student_id', $student_id);
                    $this->db->where('class_id', $class_id);
                    $this->db->where('subject_id', $subjectId);
                    $this->db->group_by(array('student_id', 'class_id', 'subject_id'));
                    $test_quize_query = $this->db->get();
                    $test_quize_marks = $test_quize_query->result_array();

                    $number_of_quize_count = $test_quize_count > 0 ? 100 * $test_quize_count : 0;
                    $test_quize_mark = $test_quize_marks[0]['total_marks'] ? $test_quize_marks[0]['total_marks'] : 0;

                    $test_quize_cal_value = $test_quize_mark ? $test_quize_multiply * ( $test_quize_mark / $number_of_quize_count) : 0;
                    // End

                    // Project Mark calculation

                    $this->db->select('COUNT(*) as row_count');
                    $this->db->from('project');
                    $this->db->where('student_id', $student_id);
                    $this->db->where('class_id', $class_id);
                    $this->db->where('subject_id', $subjectId);
                    $count_project_query = $this->db->get();
                    $row_project_count = $count_project_query->row()->row_count; 

                    $this->db->select('student_id, class_id, subject_id, SUM(mark_obtained) AS total_marks');
                    $this->db->from('project');
                    $this->db->where('student_id', $student_id);
                    $this->db->where('class_id', $class_id);
                    $this->db->where('subject_id', $subjectId);
                    $this->db->group_by(array('student_id', 'class_id', 'subject_id'));
                    $project_query = $this->db->get();
                    $project_marks = $project_query->result_array();

                    $number_of_project_exam = $row_project_count > 0 ? 100 * $row_project_count : 0; 
                    $projectmark = $project_marks[0]['total_marks'] ? $project_marks[0]['total_marks'] : 0;

                    $project_cal_value = $projectmark ? $projectmultiply * ( $projectmark / $number_of_project_exam) : 0;

                    // End

                    // Written test calculation

                    $this->db->select('COUNT(*) as row_count');
                    $this->db->from('marks');
                    $this->db->where('student_id', $student_id);
                    $this->db->where('class_id', $class_id);
                    $this->db->where('subject_id', $subjectId);
                    $count_writtent_query = $this->db->get();
                    $row_written_count = $count_writtent_query->row()->row_count; 

                    $this->db->select('student_id, class_id, subject_id, SUM(mark_obtained) AS total_marks');
                    $this->db->from('marks');
                    $this->db->where('student_id', $student_id);
                    $this->db->where('class_id', $class_id);
                    $this->db->where('subject_id', $subjectId);
                    $this->db->group_by(array('student_id', 'class_id', 'subject_id'));
                    $written_query = $this->db->get();
                    $written_marks = $written_query->result_array();

                    $number_of_written_exam = $row_written_count > 0 ? 100 * $row_written_count : 0; 
                    $writtentest_mark = $written_marks[0]['total_marks'] ? $written_marks[0]['total_marks'] : 0;

                    $writtent_test_cal_value = $writtentest_mark ? $writtenmultiply * ( $writtentest_mark / $number_of_written_exam) : 0; 

                    // End

                    // Count ExtraCariculam activity
                    $extraCaricularActivityScore = ($class_work_cal_value + $home_work_cal_value + $behavior_cal_value + $test_quize_cal_value + $project_cal_value) / 100;

                    // count Total Score
                    $get_original_activityVal = intval($extraCaricularActivityScore);
                    $extracaricul_percent = $get_original_activityVal ? 75 * ($get_original_activityVal / 100) : 0;
                    $totalScore_of_student = $writtent_test_cal_value + $extracaricul_percent;
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

     
                    ?>
                    <tr class="text-center">
                        <td><?php echo $list['name']; ?></td>
                        <td><?php echo intval($writtent_test_cal_value); ?></td>
                        <td><?php echo intval($home_work_cal_value); ?></td>
                        <td><?php echo intval($test_quize_cal_value); ?></td>
                        <td><?php echo intval($class_work_cal_value); ?></td>
                        <td><?php echo intval($behavior_cal_value); ?></td>
                        <td><?php echo intval($project_cal_value); ?></td>
                        <td><?php echo $get_original_activityVal; ?></td>
                        <td><?php echo $gettotalScore_of_student; ?></td>
                        <td><?php echo $grade_name; ?></td>
                        <td><?php echo $grade_point; ?></td>
                    </tr>
                <?php 
                }
            endforeach; 
            ?>
        </tbody>
    </table>
<?php else: ?>
    <?php include APPPATH.'views/backend/empty.php'; ?>
<?php endif; ?>

<script>


    
</script>
