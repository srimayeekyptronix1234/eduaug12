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
                        <i class="mdi mdi-book-open-page-variant title_icon"></i>
                        <span class="ms-2"><?php echo get_phrase('quiz'); ?></span>
                    </h4>
                    <p class="inspiring-line mt-2">
                        Engage minds and challenge skills with dynamic quizzes that drive learning.
                    </p>
                </div>
                <button type="button" class="btn btn-outline-primary btn-rounded alignToTitle float-end mt-1"
                    onclick="rightModal('<?php echo site_url('modal/popup/quiz/create'); ?>', '<?php echo get_phrase('create_quiz'); ?>')">
                    <i class="mdi mdi-plus"></i> <?php echo get_phrase('add_quiz'); ?>
                </button>
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
                    <select name="subject" id="subject_id" class="form-control select2" data-toggle="select2" required
                        onchange="classWiseSection(this.value)">
                        <option value=""><?php echo get_phrase('select_a_subject'); ?></option>
                        <?php
                        $subjects = $this->db->get_where('subjects', array('school_id' => school_id()))->result_array();
                        foreach ($subjects as $sub) {
                            ?>
                            <option value="<?php echo $sub['id']; ?>"><?php echo $sub['name']; ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="col-md-2">
                    <button class="btn btn-block btn-secondary filbtn"
                        onclick="filter_class()"><?php echo get_phrase('filter'); ?></button>
                </div>
            </div>
            <div class="card-body quiz_content">
                <?php include 'list.php'; ?>
            </div>
        </div>
    </div>
</div>

<script>
    function filter_class() {
        var class_id = $('#class_id').val();
        var exam = $('#exam_id').val();
        var subject_id = $('#subject_id').val();

        if (class_id != "") {
            showAllQuiz();
        }

    }

    var showAllQuiz = function () {
        var exam = $('#exam_id').val();
        var class_id = $('#class_id').val();
        var subject_id = $('#subject_id').val();

        if (class_id != "" && exam != "" && subject_id != "") {
            $.ajax({
                url: '<?php echo route('quiz/list/') ?>' + class_id + '/' + exam + '/' + subject_id,
                success: function (response) {
                    $('.quiz_content').html(response);
                }
            });
        }
    }
</script>