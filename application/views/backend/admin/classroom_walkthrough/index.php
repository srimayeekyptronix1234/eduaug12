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
        padding: 20PX;
    }

    .parbox:hover {
        box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
        transition: 1s ease;
    }

    .boxbtn {
        background: #0272f3;
        color: white;
    }
</style>

<!--title-->
<div class="row">
    <div class="col-xl-12">
        <div class="card parentbar">
            <div class="card-body py-2 d-flex justify-content-between align-items-center">
                <div>
                    <h4 class="page-title d-inline-block">
                        <i class="mdi mdi-comment title_icon"></i> <?php echo get_phrase('classroom walkthrough'); ?>
                    </h4>
                    <p class="inspiring-line">
                        Addressing concerns with empathy and action to drive positive change.
                    </p>
                </div>
                <button type="button" class="btn btn-outline-primary btn-rounded alignToTitle float-end"
                    onclick="rightModal('<?php echo site_url('modal/popup/classroom_walkthrough/create'); ?>', '<?php echo get_phrase('create_classroom_walkthrough'); ?>')">
                    <i class="mdi mdi-plus"></i> <?php echo get_phrase('add_classroom_walkthrough'); ?>
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
                    <select name="class_room" id="class_room_id" class="form-control select2" data-toggle="select2" required>
                        <option value=""><?php echo get_phrase('select_a_class_rooms'); ?></option>
                        <?php
                        $class_rooms = $this->db->get_where('class_rooms', array('school_id' => school_id()))->result_array();
                        foreach ($class_rooms as $class) {
                            ?>
                            <option value="<?php echo $class['id']; ?>"><?php echo $class['name']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                
                <div class="col-md-2 mb-1">
                    <select name="teacher" id="teacher_id" class="form-control select2" data-toggle="select2" required>
                        <option value=""><?php echo get_phrase('select_a_teacher'); ?></option>
                        <?php
                        $allteachers = $this->db->get_where('users', array('role' => 'teacher', 'school_id' => school_id()))->result_array();
                        foreach ($allteachers as $teachers) {
                            ?>
                            <option value="<?php echo $teachers['id']; ?>"><?php echo $teachers['name']; ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="col-md-2">
                    <button class="btn btn-block btn-secondary boxbtn"
                        onclick="filter_class_rooms_walkthrough()"><?php echo get_phrase('filter'); ?></button>
                </div>
            </div>
            <div class="card-body classroom_walkthrough_content">
                <?php include 'list.php'; ?>

            </div>
        </div>
    </div>
</div>

<script>
    function filter_class_rooms_walkthrough() {
        var class_id = $('#class_id').val();
        var section_id = $('#section_id').val();
        var class_room_id = $('#class_room_id').val();
        var teacher_id = $('#teacher_id').val();
        if (class_id != "") {
            showAllClassroomWalkthrough();
        }

    }

    var showAllClassroomWalkthrough = function () {
        var class_id = $('#class_id').val();
        var section_id = $('#section_id').val();
        var class_room_id = $('#class_room_id').val();
        var teacher_id = $('#teacher_id').val();
      
        if (class_id != "" && section_id != "" && class_room_id != "" && teacher_id != "") {
            $.ajax({
                url: '<?php echo route('classroom_walkthrough/list/') ?>' + class_id + '/' + '/' + section_id + '/' + '/' + class_room_id + '/' + teacher_id,
                success: function (response) {
                    $('.classroom_walkthrough_content').html(response);
                }
            });
        } else {
            $.ajax({
                url: '<?php echo route('classroom_walkthrough/list/') ?>',
                success: function (response) {
                    $('.classroom_walkthrough_content').html(response);
                }
            });
        }
    }
    function classWiseSection(classId) {
        $.ajax({
            url: "<?php echo route('section/list/'); ?>" + classId,
            success: function (response) {
                $('#section_id').html(response);
            }
        });
    }
  
   
</script>