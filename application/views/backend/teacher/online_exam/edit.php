<?php $school_id = school_id(); ?>
<?php $exam_data = $this->db->get_where('online_exam_details', array('id' => $param1))->result_array(); ?>
<?php foreach($exam_data as $exam){ ?>
<form method="POST" class="d-block ajaxForm" action="<?php echo route('online_exam_create/update_exam/'.$param1); ?>">
    <div class="form-row">
          <div class="form-group mb-1">
            <label for="class"><?php echo get_phrase('quarter'); ?></label>
            <select name="quarter_id" id="class_id_on_create" class="form-control select2" data-bs-toggle="select2" required>
                <option value=""><?php echo get_phrase('select_a_exam'); ?></option>
                    <?php
                        $allexams = $this->db->get_where('exams', array('school_id' => $school_id))->result_array();
                        foreach($allexams as $exams){
                    ?>
                        <option value="<?php echo $exams['id']; ?>" <?php if($exams['id'] == $exam['quarter_id']){ echo 'selected'; } ?>><?php echo $exams['name']; ?></option>
                    <?php } ?>
            </select>
            <small id="class_help" class="form-text text-muted"><?php echo get_phrase('select_a_class'); ?></small>
        </div>
        
        <div class="form-group mb-1">
            <label for="class"><?php echo get_phrase('class'); ?></label>
            <select name="class_id" id="class_id_on_create" class="form-control select3" data-bs-toggle="select3" required>
                <option value=""><?php echo get_phrase('select_a_class'); ?></option>
                    <?php
                        $classes = $this->db->get_where('classes', array('school_id' => $school_id))->result_array();
                        foreach($classes as $class){
                    ?>
                        <option value="<?php echo $class['id']; ?>" <?php if($class['id'] == $exam['class_id']){ echo 'selected'; } ?>><?php echo $class['name']; ?></option>
                    <?php } ?>
            </select>
            <small id="class_help" class="form-text text-muted"><?php echo get_phrase('select_a_class'); ?></small>
        </div>
        <div class="form-group mb-1">
            <label for="class"><?php echo get_phrase('subject'); ?></label>
            <select name="subject_id" id="class_id_on_create" class="form-control select4" data-bs-toggle="select4" required>
                <option value=""><?php echo get_phrase('select_a_subject'); ?></option>
                    <?php
                        $subjects = $this->db->get_where('subjects', array('school_id' => $school_id))->result_array();
                        foreach($subjects as $sub){
                    ?>
                        <option value="<?php echo $sub['id']; ?>" <?php if($sub['id'] == $exam['subject_id']){ echo 'selected'; } ?>><?php echo $sub['name']; ?></option>
                    <?php } ?>
            </select>
            <small id="class_help" class="form-text text-muted"><?php echo get_phrase('select_a_subject'); ?></small>
        </div>

        <div class="form-group mb-1">
            <label for="starting_date"><?php echo get_phrase('starting_date'); ?></label>
            <input type="text" class="form-control date" data-bs-toggle="date-picker" data-single-date-picker="true" name = "exam_start_date" value="<?php echo $exam['exam_start_date']; ?>" required>
            <small id="name_help" class="form-text text-muted"><?php echo get_phrase('provide_starting_date'); ?></small>
        </div>

        <div class="form-group mb-1">
            <label for="online_exam_name"><?php echo get_phrase('exam_name'); ?></label>
            <input type="text" class="form-control" id="online_exam_name" name = "online_exam_name" placeholder="name" value="<?php echo $exam['online_exam_name']; ?>" required>
            <small id="name_help" class="form-text text-muted"><?php echo get_phrase('provide_exam_name'); ?></small>
        </div>
        

        <div class="form-group mb-1">
            <label for="from_time"><?php echo get_phrase('from_time'); ?></label>
            <input type="time" id="from-time" name="from-time" class="form-control"  value="<?php echo $exam['exam_start_time']; ?>" required>
            <select id="from-ampm" name="from-ampm">
                <option value="AM" <?php if($exam['exam_start_am_pm'] == 'AM'){ echo 'selected'; } ?>>AM</option>
                <option value="PM" <?php if($exam['exam_start_am_pm'] == 'PM'){ echo 'selected'; } ?>>PM</option>
            </select>
            <small id="name_help" class="form-text text-muted"><?php echo get_phrase('enter_from_time'); ?></small>
        </div>

        <div class="form-group mb-1">
            <label for="to_time"><?php echo get_phrase('to_time'); ?></label>
            <input type="time" id="to-time" name="to-time" class="form-control" value="<?php echo $exam['exam_end_time']; ?>" required>
            <select id="to-ampm" name="to-ampm">
                <option value="AM" <?php if($exam['exam_end_am_pm'] == 'AM'){ echo 'selected'; } ?>>AM</option>
                <option value="PM" <?php if($exam['exam_end_am_pm'] == 'PM'){ echo 'selected'; } ?>>PM</option>
            </select>
            <small id="name_help" class="form-text text-muted"><?php echo get_phrase('enter_to_time'); ?></small>
        </div>

        
        <div class="form-group  col-md-12">
            <button class="btn btn-block btn-primary" type="submit"><?php echo get_phrase('update_exam'); ?></button>
        </div>
    </div>
</form>
<?php } ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(".ajaxForm").validate({}); 
    $(".ajaxForm").submit(function(e) {

    e.preventDefault(); // avoid to execute the actual submit of the form.

    var form = $(this);
    var actionUrl = form.attr('action');
        $.ajax({
            type: "POST",
            url: actionUrl,
            data: form.serialize(), // serializes the form's elements.
            success: function(response)
            {
                console.log(response);
                if (typeof response === 'string') {
                    response = JSON.parse(response);
                }

                // Check the status value
                if (response.status === true) {

                    Swal.fire({
                    title: 'Success!',
                    text: response.notification,
                    icon: 'success',
                    confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Redirect to another URL
                            window.location.href = '<?php echo route('online_exam_create'); ?>'; // Replace with your actual URL
                        }
                    });

                }
                else{
                    Swal.fire({
                    title: 'Error!',
                    text: 'An error occurred',
                    icon: 'error',
                    confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Redirect to another URL (optional, you can remove this if you don't want to redirect on error)
                            window.location.href = '<?php echo route('online_exam_create'); ?>'; // Replace with your actual URL
                        }
                    });
                }
            
            }
        });
    
    });

    // Js for calendar
    $("#starting_date" ).daterangepicker();
</script>
