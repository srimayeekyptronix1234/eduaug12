<style>
    .toll-free-box {
        background: linear-gradient(195deg, #ff00c3, #d123ba, #a42dab, #7b2f97, #552b80, #342465, #181a48, #050b2b);
        color: #fff;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    }

    .toll-free-box h4 {
        margin-bottom: 15px;
        font-size: 1.5rem;
        color: #ffffff;
    }

    .table {
        border-collapse: collapse;
        width: 100%;
        margin-top: 20px;
    }

    .table th,
    .table td {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #dee2e6;
    }

    .table thead {
        background: linear-gradient(150deg, #2b2e4a, #3e345e, #57386e, #723b78, #903c7a, #af3d73, #cd3f63, #e84545);
        color: #ffffff;
    }

    .table tbody tr:hover {
        background-color: #f1f1f1;
        cursor: pointer;
    }

    .form-control {
        border-radius: 5px;
        border: 1px solid #ced4da;
    }

    .btn-success {
        background-color: #28a745;
        color: white;
        border: none;
        border-radius: 5px;
        padding: 8px 12px;
    }

    .btn-success:hover {
        background-color: #218838;
    }
</style>

<div class="row mb-3">
    <div class="col-md-4"></div>
    <div class="col-md-4 toll-free-box text-center">
        <h4><?php echo get_phrase('manage_marks'); ?></h4>
        <span><?php echo get_phrase('class'); ?> :
            <?php echo $this->db->get_where('classes', array('id' => $class_id))->row('name'); ?></span><br>
        <span><?php echo get_phrase('section'); ?> :
            <?php echo $this->db->get_where('sections', array('id' => $section_id))->row('name'); ?></span><br>
        <span><?php echo get_phrase('subject'); ?> :
            <?php echo $this->db->get_where('subjects', array('id' => $subject_id))->row('name'); ?></span>
    </div>
</div>

<?php
$school_id = school_id();
$marks = $this->crud_model->get_homework($exam_id, $class_id, $section_id, $subject_id)->result_array();
?>

<?php if (count($marks) > 0): ?>
    <table class="table table-bordered table-responsive-sm">
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
                    <td><input class="form-control" type="number" id="mark-<?php echo $mark['student_id']; ?>" name="mark"
                            placeholder="mark" min="0" value="<?php echo $mark['mark_obtained']; ?>" required
                            onchange="get_grade(this.value, this.id)"></td>
                    <td><span
                            id="grade-for-mark-<?php echo $mark['student_id']; ?>"><?php echo get_grade($mark['mark_obtained']); ?></span>
                    </td>
                    <td><input class="form-control" type="text" id="comment-<?php echo $mark['student_id']; ?>" name="comment"
                            placeholder="comment" value="<?php echo $mark['comment']; ?>"></td>
                    <td class="text-center"><button class="btn btn-success"
                            onclick="homework_update('<?php echo $mark['student_id']; ?>')"><i
                                class="mdi mdi-checkbox-marked-circle"></i></button></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <?php include APPPATH . 'views/backend/empty.php'; ?>
<?php endif; ?>

<script>
    function homework_update(student_id) {
        var class_id = '<?php echo $class_id; ?>';
        var section_id = '<?php echo $section_id; ?>';
        var subject_id = '<?php echo $subject_id; ?>';
        var exam_id = '<?php echo $exam_id; ?>';
        var mark = $('#mark-' + student_id).val();
        var comment = $('#comment-' + student_id).val();
        if (subject_id != "") {
            $.ajax({
                type: 'POST',
                url: '<?php echo route('homework/homework_update'); ?>',
                data: { student_id: student_id, class_id: class_id, section_id: section_id, subject_id: subject_id, exam_id: exam_id, mark: mark, comment: comment },
                success: function (response) {
                    success_notify('<?php echo get_phrase('Homework_has_been_updated_successfully'); ?>');
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