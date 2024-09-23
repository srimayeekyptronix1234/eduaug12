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
    <div class="table-responsive">
        <table class="table custom-table">
            <thead>
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
                            <td class="mark_obtained"><?php echo isset($mark['mark_obtained']) ? $mark['mark_obtained'] : '-'; ?>
                            </td>
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
            <tfoot>
                <tr class="font-weight-bold">
                    <td><?php echo get_phrase('cumulative_grades'); ?></td>
                    <td><?php echo $total_marks; ?></td>
                    <td><?php echo number_format($cumulative_grade_point, 2); ?></td>
                    <td><?php echo $cumulative_grade_name; ?></td>
                </tr>
            </tfoot>
        </table>
    </div>
<?php else: ?>
    <?php include APPPATH . 'views/backend/empty.php'; ?>
<?php endif; ?>

<style>
    .custom-table {
        width: 100%;
        border-collapse: collapse;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    .custom-table thead {
        background: radial-gradient(circle at -10% 100%, #b70c00, #c10020, #c6003a, #c50055, #bd0073, #aa0093, #8c00b2, #5900cd);
        color: #ffffff;
        text-transform: uppercase;
    }

    .custom-table th,
    .custom-table td {
        padding: 15px;
        text-align: center;
    }

    .custom-table tbody tr:hover {
        background-color: #f1f1f1;
        transition: background-color 0.3s;
    }

    .custom-table tbody tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    .custom-table tbody tr {
        transition: transform 0.2s;
    }

    .custom-table tfoot {
        background-color: #e9ecef;
        font-weight: bold;
    }

    td {
        color: #000;
        font-weight: 700;
        font-size: 16px;
    }
</style>

<script>
    function updateGrades() {
        var grades = <?php echo json_encode($grades); ?>;
        $('#report_card_body tr').each(function () {
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

    $(document).ready(function () {
        updateGrades();
    });
</script>