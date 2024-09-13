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
 $student_data = $this->user_model->get_logged_in_student_details(); 
?>
<!--title-->
<div class="row">
    <div class="col-xl-12">
        <div class="card parentbar">
            <div class="card-body py-2 d-flex justify-content-between align-items-center">
                    <h4 class="page-title d-flex align-items-center">
                        <i class="mdi mdi-chart-timeline title_icon"></i>
                        <span class="ms-2"><?php echo get_phrase('syllabus'); ?></span>
                    </h4>
                    <p class="inspiring-line mt-2">
                        Mapping out the path to your educational journey.
                    </p>
            
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>


<div class="row">
    <div class="col-12">
        <div class="card parbox">
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-1 mb-1"></div>
                    <div class="col-md-4 mb-1">
                        <select name="class" id="class_id" class="form-control select2" data-toggle="select2"
                            onchange="classWiseSection(this.value)" required>
                            <option value=""><?php echo get_phrase('select_a_class'); ?></option>
                                <option value="<?php echo $student_data['class_id']; ?>"><?php echo $student_data['class_name']; ?></option>
                        </select>
                    </div>
                    <div class="col-md-4 mb-1">
                        <select name="section" id="section_id" class="form-control select2" data-toggle="select2"
                            required>
                            <option value=""><?php echo get_phrase('select_section'); ?></option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-block btn-secondary filbtn"
                            onclick="filter_syllabus()"><?php echo get_phrase('filter'); ?></button>
                    </div>
                </div>
                <div class="syllabus_content">
                    <?php include 'list.php'; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

    $('document').ready(function () {
        $('select.select2:not(.normal)').each(function () { $(this).select2({ dropdownParent: '#right-modal' }); }); //initSelect2(['#class_id', '#section_id']);
    });

    function classWiseSection(classId) {
        $.ajax({
            url: "<?php echo route('section/list/'); ?>" + classId,
            success: function (response) {
                $('#section_id').html(response);
            }
        });
    }

    function filter_syllabus() {
        var class_id = $('#class_id').val();
        var section_id = $('#section_id').val();
        if (class_id != "" && section_id != "") {
            showAllSyllabuses();
        } 
    }

    var showAllSyllabuses = function () {
        var class_id = $('#class_id').val();
        var section_id = $('#section_id').val();
        if (class_id != "" && section_id != "") {
            $.ajax({
                url: '<?php echo route('syllabus/list/') ?>' + class_id + '/' + section_id,
                success: function (response) {
                    $('.syllabus_content').html(response);
                    initDataTable('basic-datatable');
                }
            });
        }else{
            $.ajax({
                url: '<?php echo route('syllabus/list/') ?>',
                success: function (response) {
                    $('.syllabus_content').html(response);
                    initDataTable('basic-datatable');
                }
            });
   

        }
    }
</script>