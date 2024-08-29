<?php
$school_id = school_id();
$marks = $this->db->get_where('marks', array(
    'class_id' => $class_id,
    'section_id' => $section_id,
    'student_id' => $student_id,
    'exam_id' => $exam_id,
    'school_id' => $school_id,
    'session' => active_session()
))->result_array();

$grades = $this->db->get_where('grades', array(
    'school_id' => $school_id,
    'session' => active_session()
))->result_array();
?>

<?php if (count($marks) > 0): ?>
    <table class="table table-bordered table-responsive-sm text-center" width="100%">
        <thead class="thead-dark">
            <tr>
                <th><?php echo get_phrase('subject'); ?></th>
                <th><?php echo get_phrase('mark'); ?></th>
                <th><?php echo get_phrase('grade_point'); ?></th>
                <th><?php echo get_phrase('grade_name'); ?></th>
            </tr>
        </thead>
        <tbody id="report_card_body">
            <?php 
            $total_marks = 0;
            $total_grade_points = 0;
            $total_subjects = 0;

            foreach ($marks as $mark): 
                if (!empty($mark['subject_id']) && isset($mark['mark_obtained'])) {
                    $subject = $this->db->get_where('subjects', array('id' => $mark['subject_id']))->row_array();
                    $total_marks += $mark['mark_obtained'];
                    $total_subjects++;
                    // Calculate grade and grade point
                    $grade_name = '-';
                    $grade_point = '-';
                    foreach ($grades as $grade) {
                        if ($mark['mark_obtained'] >= $grade['mark_from'] && $mark['mark_obtained'] <= $grade['mark_upto']) {
                            $grade_name = $grade['name'];
                            $grade_point = $grade['grade_point'];
                            $total_grade_points += $grade_point;
                            break;
                        }
                    }
                    ?>
                    <tr class="text-center" data-id="<?php echo $mark['id']; ?>">
                        <td><?php echo $subject['name']; ?></td>
                        <td class="mark_obtained"><?php echo isset($mark['mark_obtained']) ? $mark['mark_obtained'] : '-'; ?></td>
                        <td id="grade-point-for-<?php echo $mark['id']; ?>"><?php echo $grade_point; ?></td>
                        <td id="grade-for-<?php echo $mark['id']; ?>"><?php echo $grade_name; ?></td>
                    </tr>
                <?php 
                }
            endforeach; 

            // Calculate cumulative grade
            $cumulative_grade_point = $total_subjects > 0 ? $total_grade_points / $total_subjects : 0;
            $cumulative_grade_name = '-';
            foreach ($grades as $grade) {
                if ($cumulative_grade_point >= $grade['mark_from'] && $cumulative_grade_point <= $grade['mark_upto']) {
                    $cumulative_grade_name = $grade['name'];
                    break;
                }
            }
            ?>
        </tbody>
        <!-- Cumulative Grade Row -->
        <tfoot>
            <tr class="text-center font-weight-bold">
                <td><?php echo get_phrase('cumulative_grades'); ?></td>
                <td><?php echo $total_marks; ?></td>
                <td><?php echo number_format($cumulative_grade_point, 2); ?></td>
                <td><?php echo $cumulative_grade_name; ?></td>
            </tr>
        </tfoot>
    </table>
<?php else: ?>
    <?php include APPPATH.'views/backend/empty.php'; ?>
<?php endif; ?>

<script>
    function updateGrades() {
        var grades = <?php echo json_encode($grades); ?>;
        $('#report_card_body tr').each(function() {
            var mark = parseInt($(this).find('.mark_obtained').text());
            var id = $(this).data('id');
            var gradeData = getGrade(mark, grades);
            if (gradeData) {
                $('#grade-for-' + id).text(gradeData.name);
                $('#grade-point-for-' + id).text(gradeData.grade_point);
            }
        });
    }

    function getGrade(mark, grades) {
        for (var i = 0; i < grades.length; i++) {
            var grade = grades[i];
            if (mark >= grade.mark_from && mark <= grade.mark_upto) {
                return grade;
            }
        }
        return null;
    }

    $(document).ready(function() {
        updateGrades();
    });
</script>
