<div class="row mb-3">
    <div class="col-md-4"></div>
    <div class="col-md-4 toll-free-box text-center text-white pb-2">
        <h4><?php echo get_phrase('manage_marks'); ?></h4>
        <span><?php echo get_phrase('class'); ?>:
            <?php echo $this->db->get_where('classes', array('id' => $class_id))->row('name'); ?></span>
        <span><?php echo get_phrase('section'); ?>:
            <?php echo $this->db->get_where('sections', array('id' => $section_id))->row('name'); ?></span>
        <span><?php echo get_phrase('subject'); ?>:
            <?php echo $this->db->get_where('subjects', array('id' => $subject_id))->row('name'); ?></span>
    </div>
</div>


<?php
$school_id = school_id();
$marks = $this->crud_model->get_classwork($exam_id, $class_id, $section_id, $subject_id)->result_array();
?>

<?php if (count($marks) > 0): ?>
    <div class="table-responsive">
        <table class="table custom-table">
            <thead>
                <tr>
                    <th><?php echo get_phrase('student_name'); ?></th>
                    <th><?php echo get_phrase('mark'); ?></th>
                    <th><?php echo get_phrase('grade_point'); ?></th>
                    <th><?php echo get_phrase('comment'); ?></th>
                    <th><?php echo get_phrase('action'); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($marks as $mark):
                    $student = $this->db->get_where('students', array('id' => $mark['student_id']))->row_array(); ?>
                    <tr>
                        <td><?php echo $this->user_model->get_user_details($student['user_id'], 'name'); ?></td>
                        <td>
                            <input class="form-control" type="number" id="mark-<?php echo $mark['student_id']; ?>" name="mark"
                                placeholder="mark" min="0" value="<?php echo $mark['mark_obtained']; ?>" required
                                onchange="get_grade(this.value, this.id)">
                        </td>
                        <td>
                            <span
                                id="grade-for-mark-<?php echo $mark['student_id']; ?>"><?php echo get_grade($mark['mark_obtained']); ?></span>
                        </td>
                        <td>
                            <input class="form-control" type="text" id="comment-<?php echo $mark['student_id']; ?>"
                                name="comment" placeholder="comment" value="<?php echo $mark['comment']; ?>">
                        </td>
                        <td class="text-center">
                            <button class="btn btn-success" onclick="classwork_update('<?php echo $mark['student_id']; ?>')">
                                <i class="mdi mdi-checkbox-marked-circle"></i>
                            </button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
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

    .custom-table tbody tr:hover {
        transform: scale(1.02);
    }

    .custom-table tfoot {
        background-color: #e9ecef;
        font-weight: bold;
    }

    td {
        color: #000;
        font-weight: 600;
        font-size: 16px;
    }

    .toll-free-box {
        background: linear-gradient(195deg, #ff00c3, #d123ba, #a42dab, #7b2f97, #552b80, #342465, #181a48, #050b2b);
        border-radius: 10px;
        padding: 13px 30px;
        transition: transform 0.3s, box-shadow 0.3s;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    }

    .toll-free-box h4 {
        font-size: 1.5rem;
        font-weight: bold;
    }

    .toll-free-box span {
        display: block;
        font-size: 1.1rem;
        margin: 5px;
    }

    .toll-free-box:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
    }

    @media (max-width: 768px) {
        .toll-free-box {
            margin: 10px;
        }
    }
</style>

<script>
    function classwork_update(student_id) {
        var class_id = '<?php echo $class_id; ?>';
        var section_id = '<?php echo $section_id; ?>';
        var subject_id = '<?php echo $subject_id; ?>';
        var exam_id = '<?php echo $exam_id; ?>';
        var mark = $('#mark-' + student_id).val();
        var comment = $('#comment-' + student_id).val();

        if (subject_id != "") {
            $.ajax({
                type: 'POST',
                url: '<?php echo route('classwork/classwork_update'); ?>',
                data: { student_id: student_id, class_id: class_id, section_id: section_id, subject_id: subject_id, exam_id: exam_id, mark: mark, comment: comment },
                success: function (response) {
                    success_notify('<?php echo get_phrase('Classwork_has_been_updated_successfully'); ?>');
                }
            });
        } else {
            toastr.error('<?php echo get_phrase('required_mark_field'); ?>');
        }
    }

    function get_grade(exam_mark, id) {
        $.ajax({
            url: '<?php echo base_url('admin/get_grade'); ?>/' + exam_mark,
            success: function (response) {
                $('#grade-for-' + id).text(response);
            }
        });
    }
</script>