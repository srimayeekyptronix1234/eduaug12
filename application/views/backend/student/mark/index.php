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
</style>

<?php $student_data = $this->user_model->get_logged_in_student_details(); ?>
<!--title-->
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body d-flex align-items-center justify-content-between adminbar py-2">
                <div>
                    <h4 class="page-title mb-0 d-flex align-items-center">
                        <i class="mdi mdi-format-list-numbered title_icon"
                            style="font-size: 1.5rem; color: #ff7580;"></i>
                        <span
                            style="font-size: 1.5rem; font-weight: 700; color: #ff7580; margin-left: 10px; text-transform: capitalize;">
                            <?php echo get_phrase('manage_marks'); ?>
                        </span>
                    </h4>
                    <p class="text-muted mt-2" style="font-size: 16px; font-weight: 600; color: #2c2c2c !important;">
                        Keep track of student marks and assessments efficiently.
                    </p>
                </div>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

<div class="row">
    <div class="col-12">
        <div class="card boxhover ">
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
                        onchange="classWiseSubject(this.value)">
                        <option value=""><?php echo get_phrase('select_a_class'); ?></option>
                        <option value="<?php echo $student_data['class_id']; ?>">
                            <?php echo $student_data['class_name']; ?>
                        </option>
                    </select>
                </div>
                <div class="col-md-2 mb-1">
                    <select name="section" id="section_id" class="form-control select2" data-toggle="select2" required>
                        <option value=""><?php echo get_phrase('select_section'); ?></option>
                        <option value="<?php echo $student_data['section_id']; ?>">
                            <?php echo $student_data['section_name']; ?>
                        </option>
                    </select>
                </div>
                <div class="col-md-2 mb-1">
                    <select name="subject" id="subject_id" class="form-control select2" data-toggle="select2" required>
                        <option value=""><?php echo get_phrase('select_subject'); ?></option>
                    </select>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-block btn-secondary boxbtn"
                        onclick="filter_marks()"><?php echo get_phrase('filter'); ?></button>
                </div>
            </div>
            <div class="card-body mark_content">
                <div class="empty_box text-center">
                    <img class="mb-3" width="150px"
                        src="<?php echo base_url('assets/backend/images/empty_box.png'); ?>" />
                    <br>
                    <span class=""><?php echo get_phrase('no_data_found'); ?></span>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $('document').ready(function () {
        $('select.select2:not(.normal)').each(function () { $(this).select2({ dropdownParent: '#right-modal' }); }); //initSelect2(['#class_id', '#exam_id', '#section_id', '#subject_id']);
    });

    function classWiseSection(classId) {
        $.ajax({
            url: "<?php echo route('section/list/'); ?>" + classId,
            success: function (response) {
                $('#section_id').html(response);
                classWiseSubject(classId);
            }
        });
    }

    function classWiseSubject(classId) {
        $.ajax({
            url: "<?php echo route('class_wise_subject/'); ?>" + classId,
            success: function (response) {
                $('#subject_id').html(response);
            }
        });
    }

    function filter_marks() {
        var exam = $('#exam_id').val();
        var class_id = $('#class_id').val();
        var section_id = $('#section_id').val();
        var subject = $('#subject_id').val();
        if (class_id != "" && section_id != "" && exam != "" && subject != "") {
            $.ajax({
                type: 'POST',
                url: '<?php echo route('mark/list') ?>',
                data: { class_id: class_id, section_id: section_id, subject: subject, exam: exam },
                success: function (response) {
                    $('.mark_content').html(response);
                }
            });
        } else {
            toastr.error('<?php echo get_phrase('please_select_in_all_fields !'); ?>');
        }
    }
</script>