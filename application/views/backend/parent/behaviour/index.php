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
<?php 
   $parent_id = $this->session->userdata('user_id');
   $school_id  = school_id();
   $parent_data = $this->db->get_where('parents', array('user_id' => $parent_id))->row_array();
                                    
?>

<!--title-->
<div class="row">
    <div class="col-xl-12">
        <div class="card parentbar">
            <div class="card-body py-2 d-flex flex-column">
                <h4 class="page-title d-inline-block">
                    <i class="mdi mdi-format-list-numbered title_icon"></i>
                    <span class="ms-2"><?php echo get_phrase('behaviour_marks'); ?></span>
                </h4>
                <p class="inspiring-line">
                    Encourage positive actions and recognize growth with comprehensive behaviour assessments.
                </p>
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
                        <?php
                        $school_id = school_id();
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
                              $this->db->select('DISTINCT(c.id) as classid,c.name as classname');
                              $this->db->from('students s');
                              $this->db->join('enrols e', 'e.student_id = s.id');
                              $this->db->join('classes c','c.id = e.class_id');
                              $this->db->where('s.parent_id', $parent_data['id']);
                              $classess=$this->db->get()->result_array();

                        foreach ($classess as $class) {
                            ?>
                            <option value="<?=$class['classid'];?>"><?=$class['classname'];?></option>
                        <?php } ?>

                    </select>
                </div>
                <div class="col-md-2 mb-1">
                    <select name="section" id="section_id" class="form-control select2" data-toggle="select2" required>
                        <option value=""><?php echo get_phrase('select_section'); ?></option>
                    </select>
                </div>
                <div class="col-md-2 mb-1">
                    <select name="subject" id="subject_id" class="form-control select2" data-toggle="select2" required>
                        <option value=""><?php echo get_phrase('select_subject'); ?></option>
                    </select>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-block btn-secondary filbtn"
                        onclick="filter_behaviour_marks()"><?php echo get_phrase('filter'); ?></button>
                </div>
            </div>
            <div class="card-body behaviours_content">
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
        $('select.select2:not(.normal)').each(function () { $(this).select2({ dropdownParent: '#right-modal' }); });
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

    function filter_behaviour_marks() {
        var exam_id = $('#exam_id').val();
        var class_id = $('#class_id').val();
        var section_id = $('#section_id').val();
        var subject_id = $('#subject_id').val();
        if (exam_id != "" && class_id != "" && section_id != "" && subject_id != "") {
            $.ajax({
                type: 'POST',
                url: '<?php echo route('behaviours/list') ?>',
                data: { exam_id: exam_id, class_id: class_id, section_id: section_id, subject_id: subject_id },
                success: function (response) {
                    $('.behaviours_content').html(response);
                }
            });
        } else {
            toastr.error('<?php echo get_phrase('please_select_in_all_fields !'); ?>');
        }
    }
</script>