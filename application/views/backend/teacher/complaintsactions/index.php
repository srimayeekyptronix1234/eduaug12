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
                        <i class="mdi mdi-comment title_icon" style="font-size: 1.5rem; color: #ff7580;"></i>
                        <span
                            style="font-size: 1.5rem; font-weight: 700; color: #ff7580; margin-left: 10px; text-transform: capitalize;">
                            <?php echo get_phrase('complaint / actions'); ?>
                        </span>
                    </h4>
                    <p class="text-muted mt-2" style="font-size: 16px; font-weight: 600; color: #2c2c2c !important;">
                        Manage and track complaints and actions effectively.
                    </p>
                </div>
                <button type="button" class="btn btn-outline-primary btn-rounded alignToTitle mt-1 "
                    onclick="rightModal('<?php echo site_url('modal/popup/complaintsactions/create'); ?>', '<?php echo get_phrase('create_Complaints'); ?>')">
                    <i class="mdi mdi-plus"></i> <?php echo get_phrase('add_complaint'); ?>
                </button>
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
                    <select name="student_id" id="student_id" class="form-control select2" data-toggle="select2"
                        required>
                        <option value=""><?php echo get_phrase('select_student'); ?></option>
                    </select>
                </div>

                <!--<div class="col-md-2 mb-1">
                    <select name="teacher" id="teacher_id" class="form-control select2" data-toggle = "select2" required>
                        <option value=""><?php echo get_phrase('select_a_teacher'); ?></option>
                        <?php
                        $allteachers = $this->db->get_where('users', array('role' => 'teacher', 'school_id' => school_id()))->result_array();
                        foreach ($allteachers as $teachers) {
                            ?>
                            <option value="<?php echo $teachers['id']; ?>"><?php echo $teachers['name']; ?></option>
                        <?php } ?>
                    </select>
                </div>-->

                <div class="col-md-2">
                    <button class="btn btn-block btn-secondary filbtn"
                        onclick="filter_complaint_class()"><?php echo get_phrase('filter'); ?></button>
                </div>
            </div>
            <div class="card-body complaint_content">
                <?php include 'list.php'; ?>

            </div>
        </div>
    </div>
</div>

<script>
    function filter_complaint_class() {
        var class_id = $('#class_id').val();
        var section_id = $('#section_id').val();
        var student_id = $('#student_id').val();
        var teacher_id = $('#teacher_id').val();
        if (class_id != "") {
            showAllComplaint();
        }

    }

    var showAllComplaint = function () {
        var class_id = $('#class_id').val();
        var section_id = $('#section_id').val();
        var student_id = $('#student_id').val();
        //  var teacher_id =$('#teacher_id').val();

        if (class_id != "" && section_id != "" && student_id != "") {
            $.ajax({
                url: '<?php echo route('complaintsactions/list/') ?>' + class_id + '/' + section_id + '/' + student_id,
                success: function (response) {
                    $('.complaint_content').html(response);
                }
            });
        } else {
            $.ajax({
                url: '<?php echo route('complaintsactions/list/') ?>',
                success: function (response) {
                    $('.complaint_content').html(response);
                }
            });
        }
    }
    function classWiseSectionTeacherLogin(classId, sectionId) {
        $.ajax({
            url: "<?php echo route('section/list/'); ?>" + classId + '/' + sectionId,
            success: function (response) {
                $('#section_id').html(response);
                showClassWiseStudent(classId);

            }
        });
    }


    function showClassWiseStudent(classId) {
        $.ajax({
            url: "<?php echo route('show_class_wise_student/'); ?>" + classId,
            success: function (response) {
                $('#student_id').html(response);
            }
        });
    }

</script>