<style>
    .progress {
        margin: 20px auto;
        padding: 0;
        width: 90%;
        background: #e5e5e5;
        border-radius: 6px;
        position: relative;
    }

    p {
        text-align: left;
        text-transform: capitalize;
        font-weight: 500;
    }

    .progress-header {
        text-align: center;
        margin-bottom: 5px;
        font-size: 14px;
        color: black;
    }

    .bar-container {
        position: relative;
        width: 100%;
        height: 30px;
        background: #e5e5e5;
        border-radius: 6px;
        overflow: hidden;
    }

    .bar {
        height: 100%;
        background: cornflowerblue;
        border-radius: 6px 0 0 6px;
    }

    .percent-outside {
        position: absolute;
        top: 50%;
        right: 10px;
        transform: translateY(-50%);
        margin: 0;
        font-family: tahoma, arial, helvetica;
        font-size: 12px;
        color: black;
    }

    .bar-box {
        background: #fff;
        border-radius: 10px;
        padding: 20px 20px;
        box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
    }

    .bar-box:hover {
        box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
        transition: 0.3s ease;
    }

    .linebar {
        background: white;
        padding: 20px;
        border-radius: 10px;
        margin-bottom: 20px;
        box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
    }

    .linebar:hover {
        box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
        transition: 0.3s ease;
    }

    .boxhover {
        box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
        border-radius: 10px;
    }

    .boxhover:hover {
        box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
        transition: 0.3s ease;
    }

    .colhover {
        box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;
        border-radius: 10px;
    }

    .colhover:hover {
        box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;
        transition: 1s ease;
    }

    #myLineChart {
        width: 100% !important;
    }

    .adminbar {
        background: #ffdfe8;
        border-radius: 10px;
        box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;

    }

    .table-responsive {
        display: revert !important;
    }

    .card {
        border: none !important;
    }

    .boxbtn {
        background: #0272F3;
        color: #fff;
    }

    .boxbtn:hover {
        background: #000;
        color: #fff;
    }

    /* General Table Styling */
    .modern-table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0 10px;
        font-family: 'Poppins', sans-serif;
        font-size: 16px;
        color: #444;
        margin: 20px 0;
    }

    /* Table Header Styling */
    .modern-table thead {
        background-color: #013A7C;
        color: #fff;
        text-align: left;
        border-radius: 10px;
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

    /* Table Row Styling */
    .modern-table tbody tr {
        background-color: #fff;
        transition: all 0.3s ease;
        position: relative;
        box-shadow: 0px 6px 15px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
    }

    .modern-table tbody tr:hover {
        background-color: #f9f9f9;
        transform: translateY(-3px);
    }

    .modern-table td:first-child {
        border-top-left-radius: 10px;
        border-bottom-left-radius: 10px;
    }

    .modern-table td:last-child {
        border-top-right-radius: 10px;
        border-bottom-right-radius: 10px;
    }

    /* Grade Point Highlight */
    .modern-table td span[id^="grade-for-mark"] {
        display: inline-block;
        padding: 5px 10px;
        background-color: #ffeb3b;
        border-radius: 5px;
        font-weight: bold;
        color: #333;
    }

    /* Responsive Design */
    @media (max-width: 768px) {

        .modern-table th,
        .modern-table td {
            padding: 10px;
            font-size: 14px;
        }
    }
</style>

<?php

$login_user_id = $this->session->userdata('user_id');
$student_details = $this->db->get_where('students', ['user_id' => $login_user_id])->row_array();
$get_student_data = $this->db->get_where('enrols', ['student_id' => $student_details['id']])->row_array();
$school_id = school_id();
$marks = $this->db->get_where('marks', ['student_id' => $student_details['id'], 'class_id' => $get_student_data['class_id']])->result_array();
?>

<!--title-->
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body d-flex align-items-center justify-content-between adminbar py-2">
                <div>
                    <h4 class="page-title mb-0 d-flex align-items-center">
                        <i class="mdi mdi-book-open-page-variant title_icon"
                            style="font-size: 1.5rem; color: #ff7580;"></i>
                        <span
                            style="font-size: 1.5rem; font-weight: 700; color: #ff7580; margin-left: 10px; text-transform: capitalize;">
                            <?php echo get_phrase('quiz'); ?>
                        </span>
                    </h4>
                    <p class="text-muted mt-2" style="font-size: 16px; font-weight: 600; color: #2c2c2c !important;">
                        Assess and enhance your knowledge with our quizzes.
                    </p>
                </div>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body boxhover">
                <?php if (count($marks) > 0): ?>
                    <table class="modern-table">
                        <thead>
                            <tr>
                                <th><?php echo get_phrase('subject_name'); ?></th>
                                <th><?php echo get_phrase('exam'); ?></th>
                                <th><?php echo get_phrase('mark'); ?></th>
                                <th><?php echo get_phrase('grade_point'); ?></th>
                                <th><?php echo get_phrase('comment'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($marks as $mark):
                                $subject = $this->db->get_where('subjects', array('id' => $mark['subject_id'], 'class_id' => $mark['class_id'], 'school_id' => $school_id))->row_array();
                                $exam_details = $this->db->get_where('exams', ['id' => $mark['exam_id']])->row_array();
                                ?>
                                <tr>
                                    <td><?= $subject['name']; ?></td>
                                    <td><?= $exam_details['name']; ?></td>
                                    <td><?php echo $mark['mark_obtained']; ?></td>
                                    <td>
                                        <span id="grade-for-mark-<?php echo $mark['student_id']; ?>">
                                            <?php echo get_grade($mark['mark_obtained']); ?>
                                        </span>
                                    </td>
                                    <td><?php echo $mark['comment']; ?></td>
                                </tr>
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