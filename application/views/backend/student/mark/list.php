<style>
    .card-body.popbox {
        background: #013A7C;
        border: 1px solid #fff;
        box-shadow: rgb(14 30 37 / 84%) 0px 2px 4px 0px, rgba(14, 30, 37, 0.32) 0px 2px 16px 0px;
        background: -webkit-linear-gradient(170deg, hsl(221.54deg 81.96% 31.16%) 0%, hsl(230.37deg 92.38% 21.28%) 100%);
    }

    .modern-table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px 0;
        font-family: 'Poppins', sans-serif;
        font-size: 16px;
        color: #444;
    }

    .modern-table thead {
        background-color: #013A7C;
        color: #fff;
        border-radius: 10px;
        overflow: hidden;
    }

    .modern-table th,
    .modern-table td {
        padding: 15px 20px;
        text-align: left;
    }

    .modern-table th {
        text-transform: uppercase;
        letter-spacing: 1px;
        font-weight: 600;
        border-bottom: 3px solid #ddd;
    }

    .modern-table tbody tr {
        background-color: #fff;
        transition: all 0.3s ease;
        position: relative;
    }

    .modern-table tbody tr:hover {
        background-color: #f1f1f1;
        box-shadow: 0px 6px 15px rgba(0, 0, 0, 0.1);
        transform: translateY(-3px);
    }

    .modern-table td {
        border: 1px solid #eee;
    }

    .modern-table td:first-child {
        border-top-left-radius: 10px;
        border-bottom-left-radius: 10px;
    }

    .modern-table td:last-child {
        border-top-right-radius: 10px;
        border-bottom-right-radius: 10px;
    }

    .modern-table input[type="number"],
    .modern-table input[type="text"] {
        width: 100%;
        padding: 10px 15px;
        border: 1px solid #ddd;
        border-radius: 6px;
        background-color: #f9f9f9;
        font-size: 16px;
        color: #333;
        transition: all 0.3s ease;
    }

    .modern-table input[type="number"]:focus,
    .modern-table input[type="text"]:focus {
        border-color: #2A3F54;
        background-color: #fff;
        box-shadow: 0 0 5px rgba(42, 63, 84, 0.3);
    }

    .modern-table input[readonly] {
        background-color: #eaeaea;
        cursor: not-allowed;
    }
</style>

<?php $student_data = $this->user_model->get_logged_in_student_details(); ?>
<div class="row mb-3">
    <div class="col-md-4"></div>
    <div class="col-md-4 toll-free-box text-center text-white pb-2" style="background: #013A7C;
        border: 1px solid #fff;
        box-shadow: rgb(14 30 37 / 84%) 0px 2px 4px 0px, rgba(14, 30, 37, 0.32) 0px 2px 16px 0px;
        background: -webkit-linear-gradient(170deg, hsl(221.54deg 81.96% 31.16%) 0%, hsl(230.37deg 92.38% 21.28%) 100%);
        padding-top: 20px; padding-bottom: 26px !important;">
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
$marks = $this->crud_model->get_marks($class_id, $section_id, $subject_id, $exam_id)->result_array();
?>
<?php if (count($marks) > 0): ?>
    <table class="modern-table">
        <thead>
            <tr>
                <th><?php echo get_phrase('student_name'); ?></th>
                <th><?php echo get_phrase('mark'); ?></th>
                <th><?php echo get_phrase('comment'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($marks as $mark): ?>
                <?php if ($mark['student_id'] == $student_data['id']): ?>
                    <tr>
                        <td><?php echo $student_data['name']; ?></td>
                        <td><input class="form-control readonly" type="number" id="mark-<?php echo $mark['student_id']; ?>"
                                name="mark" placeholder="mark" min="0" value="<?php echo $mark['mark_obtained']; ?>" required></td>
                        <td><input class="form-control readonly" type="text" id="comment-<?php echo $mark['student_id']; ?>"
                                name="comment" placeholder="comment" value="<?php echo $mark['comment']; ?>"></td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <?php include APPPATH . 'views/backend/empty.php'; ?>
<?php endif; ?>

<script>
    function mark_update(student_id) {
        var class_id = '<?php echo $class_id; ?>';
        var section_id = '<?php echo $section_id; ?>';
        var subject_id = '<?php echo $subject_id; ?>';
        var exam_id = '<?php echo $exam_id; ?>';
        var mark = $('#mark-' + student_id).val();
        var comment = $('#comment-' + student_id).val();
        if (subject_id != "") {
            $.ajax({
                type: 'POST',
                url: '<?php echo route('mark/mark_update'); ?>',
                data: { student_id: student_id, class_id: class_id, section_id: section_id, subject_id: subject_id, exam_id: exam_id, mark: mark, comment: comment },
                success: function (response) {
                    success_notify('<?php echo get_phrase('mark_hass_been_updated_successfully'); ?>');
                }
            });
        } else {
            toastr.error('<?php echo get_phrase('required_mark_field'); ?>');
        }
    }
</script>