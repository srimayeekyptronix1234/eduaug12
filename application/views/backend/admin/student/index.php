<?php if ($working_page == 'filter'): ?>

    <style>
        /* Style for the title icon */
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

        .studentbox {
            box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
            background: #ffdfe8;
        }

        .studentpanel {
            box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
            border-radius: 10px;
        }

        .studentpanel:hover {
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
            transition: 1s ease;
        }

        .inspiring-line {
            font-size: 16px;
            font-weight: 600;
            color: #2c2c2c !important;
        }

        .filbtn {
            background: #0272f3;
            padding: 7px 50px 7px 50px;
        }
    </style>

    <!--title-->
    <div class="row">
        <div class="col-xl-12">
            <div class="card teacherbox">
                <div class="card-body d-flex justify-content-between align-items-start">
                    <div class="text-content">
                        <div class="d-flex align-items-center mb-2">
                            <i class="mdi mdi-account-circle title_icon"></i>
                            <h4 class="page-title ms-2 mb-0">
                                <?php echo get_phrase('teachers_panel'); ?>
                            </h4>
                        </div>
                        <p class="inspiring-line mb-2">
                            Guiding every step towards a brighter and more successful future.
                        </p>
                    </div>
                    <button type="button" class="btn btn-outline-primary btn-rounded"
                        onclick="rightModal('<?php echo site_url('modal/popup/teacher/create'); ?>', '<?php echo get_phrase('create_teacher'); ?>')">
                        <i class="mdi mdi-plus"></i> <?php echo get_phrase('create_teacher'); ?>
                    </button>
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>



    <div class="row d-print-none">
        <div class="col-12">
            <div class="card studentpanel">
                <div class="row mt-3">
                    <div class="col-md-1 mb-1"></div>
                    <div class="col-md-4 mb-1">
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
                    <div class="col-md-4 mb-1">
                        <select name="section" id="section_id" class="form-control select2" data-toggle="select2" required>
                            <option value=""><?php echo get_phrase('select_section'); ?></option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-block btn-secondary filbtn"
                            onclick="filter_student()"><?php echo get_phrase('filter'); ?></button>
                    </div>
                </div>
                <div class="card-body student_content">
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
<?php elseif ($working_page == 'create'): ?>
    <?php include 'create.php'; ?>
<?php elseif ($working_page == 'edit'): ?>
    <?php include 'update.php'; ?>
<?php endif; ?>

<script>
    $('document').ready(function () {

    });

    function classWiseSection(classId) {
        $.ajax({
            url: "<?php echo route('section/list/'); ?>" + classId,
            success: function (response) {
                $('#section_id').html(response);
            }
        });
    }

    function filter_student() {
        var class_id = $('#class_id').val();
        var section_id = $('#section_id').val();
        if (class_id != "" && section_id != "") {
            showAllStudents();
        } else {
            toastr.error('<?php echo get_phrase('please_select_a_class_and_section'); ?>');
        }
    }

    var showAllStudents = function () {
        var class_id = $('#class_id').val();
        var section_id = $('#section_id').val();
        if (class_id != "" && section_id != "") {
            $.ajax({
                url: '<?php echo route('student/filter/') ?>' + class_id + '/' + section_id,
                success: function (response) {
                    $('.student_content').html(response);
                }
            });
        }
    }
</script>