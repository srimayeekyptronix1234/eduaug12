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

    .filbtn {
        color: #fff;
        background-color: #00398f;
        border-color: #00398f;
        padding: 6px 50px;
    }
</style>

<?php
$user_id = $this->session->userdata('user_id');
$teacher_table_data = $this->db->get_where('teachers', ['user_id' => $user_id])->row_array();
?>

<!--title-->
<div class="row">
    <div class="col-xl-12">
        <div class="card adminbar">
            <div class="card-body d-flex align-items-center justify-content-between py-2">
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
                        Review and manage student report cards efficiently.
                    </p>
                </div>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="row mt-3">
                <div class="col-md-1 mb-1"></div>

                <div class="col-md-2 mb-1">
                    <select name="class" id="class_id" class="form-control select2" data-toggle="select2" required
                        onchange="classWiseSectionTeacherLogin(this.value,'<?= $teacher_table_data['section_id'] ?>')">
                        <option value=""><?php echo get_phrase('select_a_class'); ?></option>
                        <?php
                        $classes = $this->db->get_where('classes', array('id' => $teacher_table_data['class_id'], 'school_id' => school_id()))->result_array();
                        foreach ($classes as $class) {
                            ?>
                            <option value="<?php echo $class['id']; ?>"><?php echo $class['name']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-md-2 mb-1">
                    <select name="section" id="section_id" class="form-control select2" data-toggle="select2" required>
                        <option value=""><?php echo get_phrase('select_section'); ?></option>
                    </select>
                </div>
                <div class="col-md-2 mb-1">
                    <select name="student" id="student_id" class="form-control select2" data-toggle="select2" required>
                        <option value=""><?php echo get_phrase('select_student'); ?></option>
                    </select>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-block btn-secondary filbtn"
                        onclick="filter_reportcard()"><?php echo get_phrase('filter'); ?></button>
                </div>
            </div>
            <div class="card-body mark_content">
                <table class="table table-bordered table-responsive-sm" width="100%">
                    <tbody id="report_card_body">

                        <!-- Data will be dynamically added here -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    $('document').ready(function () {
        $('select.select2:not(.normal)').each(function () {
            $(this).select2({ dropdownParent: '#right-modal' });
        });
    });

    function classWiseSectionTeacherLogin(classId, sectionId) {
        if(classId)
        {
            $.ajax({
                url: "<?php echo route('section/list/'); ?>" + classId + '/' + sectionId,
                success: function (response) {
                    $('#section_id').html(response);
                    classWiseStudent(classId);
                }
            });
        }
        else 
        {
            $('#student_id').html("");
        }
    }


    function classWiseStudent(classId) {
        $.ajax({
            url: "<?php echo route('class_wise_student/'); ?>" + classId,
            success: function (response) {
                $('#student_id').html(response);
            }
        });
    }

    function filter_reportcard() {
        var exam = $('#exam_id').val();
        var class_id = $('#class_id').val();
        var section_id = $('#section_id').val();
        var student_id = $('#student_id').val();
        if (class_id != "" && section_id != "" && exam != "" && student_id != "") {
            $.ajax({
                type: 'POST',
                url: '<?php echo site_url('teacher/final_report_card/list') ?>',
                data: { class_id: class_id, section_id: section_id, student_id: student_id, exam_id: exam },
                success: function (response) {
                    $('#report_card_body').html(response);
                    //updateGrades();
                }
            });
        } else {
            toastr.error('<?php echo get_phrase('please_select_in_all_fields !'); ?>');
        }
    }

    // function updateGrades() {
    //     $('#report_card_body tr').each(function() {
    //         var mark = $(this).find('.mark_obtained').text();
    //         var id = $(this).data('id');
    //         get_grade(mark, id);
    //     });
    // }

    // function get_grade(exam_mark, id) {
    //     $.ajax({
    //         url: '<?php echo site_url('admin/get_grade'); ?>/' + exam_mark,
    //         success: function(response) {
    //             var grade = JSON.parse(response);
    //             $('#grade-for-' + id).text(grade.name);
    //             $('#grade-point-for-' + id).text(grade.grade_point);
    //         }
    //     });
    // }
</script>