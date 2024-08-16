<?php $student_lists = $this->user_model->get_student_list_of_logged_in_parent(); 
?>
<!--title-->
<div class="row ">
  <div class="col-xl-12">
    <div class="card">
      <div class="card-body py-2">
        <h4 class="page-title d-inline-block">
          <i class="mdi mdi-format-list-numbered title_icon"></i> <?php echo get_phrase('manage_final_report_cards'); ?>
        </h4>
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
                     <select name="class" id="class_id" name="class_id" class="form-control select2" data-bs-toggle="select2" required onchange="studentWiseClassId(this.value)">
                        <option value=""><?php echo get_phrase('select_a_class'); ?></option>
                        <?php foreach ($student_lists as $student_list): ?>
                            <option value="<?php echo $student_list['class_id']; ?>"><?php echo $student_list['class_name']; ?></option>
                        <?php endforeach; ?>
                    </select>

                </div>
                <div class="col-md-2 mb-1">
                    <select name="class" id="section_id" name="section_id" class="form-control select2" data-bs-toggle="select2" required onchange="studentWiseClassId(this.value)">
                        <option value=""><?php echo get_phrase('select_a_section'); ?></option>
                        <?php foreach ($student_lists as $student_list): ?>
                            <option value="<?php echo $student_list['section_id']; ?>"><?php echo $student_list['section_name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="col-md-2 mb-1">
                    <select name="student_id" id="student_id" name="student_id" class="form-control select2" data-bs-toggle="select2" required onchange="studentWiseClassId(this.value)">
                        <option value=""><?php echo get_phrase('select_a_student'); ?></option>
                        <?php foreach ($student_lists as $student_list): ?>
                            <option value="<?php echo $student_list['id']; ?>"><?php echo $student_list['name']; ?></option>
                        <?php endforeach; ?>
                    </select>

                </div>
                <div class="col-md-2">
                    <button class="btn btn-block btn-secondary" onclick="filter_reportcard()"><?php echo get_phrase('filter'); ?></button>
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
            $(this).select2({dropdownParent: '#right-modal'});
        });
    });

    function studentWiseClassId(student_id) {
        if (student_id > 0) {
            $.ajax({
                url: "<?php echo route('get_student_details_by_id/class_id/'); ?>"+student_id,
                success: function(response){
                    $('#class_id').val(response);
                    studentWiseSectionId(student_id);
                }
            });
        }else{
            $('#class_id').val("");
            $('#section_id').val("");
        }
    }

    function studentWiseSectionId(student_id) {
        $.ajax({
            url: "<?php echo route('get_student_details_by_id/section_id/'); ?>"+student_id,
            success: function(response){
                $('#section_id').val(response);
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
                url: '<?php echo site_url('parents/final_report_card/list') ?>',
                data: {class_id: class_id, section_id: section_id, student_id: student_id, exam_id: exam},
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
