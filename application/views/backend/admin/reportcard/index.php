<style>
    .title_icon {
        font-size: 1.5rem;
        color: #ff7580;
        vertical-align: middle;
    }

    .page-title {
        font-size: 20px;
        font-weight: 700;
        color: #ff7580;
        line-height: 1.5;
    }

    .ms-2 {
        margin-left: 0.5rem;
    }

    .parentbar {
        box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
        background: #ffdfe8;
    }

    .inspiring-line {
        font-size: 16px;
        color: #2c2c2c !important;
        font-weight: 600;
    }

    .parbox {
        font-weight: 600;
        box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
        border-radius: 10px;
        padding: 20px 10px 20px 10px;
    }

    .parbox:hover {
        box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
        transition: 1s ease;
    }

    .filbtn {
        background: #0272f3;
        padding: 7px 50px 7px 50px;
    }
</style>

<!--title-->
<div class="row">
    <div class="col-xl-12">
        <div class="card parentbar">
            <div class="card-body py-2 d-flex justify-content-between align-items-center">
                <div>
                    <h4 class="page-title d-flex align-items-center">
                        <i class="mdi mdi-format-list-numbered title_icon"></i>
                        <span class="ms-2"><?php echo get_phrase('manage_report_cards'); ?></span>
                    </h4>
                    <p class="inspiring-line mt-2">
                        Empowering students through insights and achievements.
                    </p>
                </div>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>


<div class="row">
    <div class="col-12">
        <div class="card parbox">
            <div class="row mt-3">
                <div class="col-md-1 mb-1"></div>
                <div class="col-md-2 mb-1">
                    <select name="exam" id="exam_id" class="form-control select2" data-toggle="select2" required>
                        <option value=""><?php echo get_phrase('select_a_exam'); ?></option>
                        <?php $school_id = school_id();
                        $exams = $this->db->get_where('exams', array('school_id' => $school_id, 'session' => active_session()))->result_array();
                        foreach ($exams as $exam) { ?>
                            <option value="<?php echo $exam['id']; ?>"><?php echo $exam['name']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-md-2 mb-1">
                    <select name="class" id="class_id" class="form-control select2" data-toggle="select2" required
                        onchange="classWiseSection(this.value)">
                        <option value=""><?php echo get_phrase('select_a_class'); ?></option>
                        <?php
                        $classes = $this->db->get_where('classes', array('school_id' => school_id()))->result_array();
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

    function classWiseSection(classId) {
        $.ajax({
            url: "<?php echo route('section/list/'); ?>" + classId,
            success: function (response) {
                $('#section_id').html(response);
                classWiseStudent(classId);
            }
        });
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
                url: '<?php echo site_url('admin/reportcard/list') ?>',
                data: { class_id: class_id, section_id: section_id, student_id: student_id, exam_id: exam },
                success: function (response) {
                    $('#report_card_body').html(response);
                    updateGrades();
                }
            });
        } else {
            toastr.error('<?php echo get_phrase('please_select_in_all_fields !'); ?>');
        }
    }

    function updateGrades() {
        $('#report_card_body tr').each(function () {
            var mark = $(this).find('.mark_obtained').text();
            var id = $(this).data('id');
            get_grade(mark, id);
        });
    }

    function get_grade(exam_mark, id) {
        $.ajax({
            url: '<?php echo site_url('admin/get_grade'); ?>/' + exam_mark,
            success: function (response) {
                var grade = JSON.parse(response);
                $('#grade-for-' + id).text(grade.name);
                $('#grade-point-for-' + id).text(grade.grade_point);
            }
        });
    }
</script>