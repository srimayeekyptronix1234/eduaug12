<form method="POST" class="d-block ajaxForm" action="<?php echo route('online_exam_create/create'); ?>">
    <div class="form-row">
        <input type="hidden" name="school_id" value="<?php echo school_id(); ?>">
        <input type="hidden" name="session" value="<?php echo active_session();?>">
        <div class="form-group mb-1">
        <label for="quarter_id"><?php echo get_phrase('quarter'); ?></label>
        <select name="quarter_id" id="quarter_id" class="form-control select2" data-bs-toggle="select2" required>
            <option value=""><?php echo get_phrase('select_a_quarter'); ?></option>
            <?php
            $quarters = $this->db->get_where('exams', array('school_id' => school_id()))->result_array();
            foreach($quarters as $quarter){
            ?>
            <option value="<?php echo $quarter['id']; ?>"><?php echo $quarter['name']; ?></option>
            <?php } ?>
        </select>
        <small id="class_help" class="form-text text-muted"><?php echo get_phrase('select_a_quarter'); ?></small>

       </div>

        <div class="form-group mb-1">
            <label for="class_id_on_create"><?php echo get_phrase('class'); ?></label>
            <select name="class_id" id="class_id_on_create" class="form-control select2" data-bs-toggle="select2" required>
                <option value=""><?php echo get_phrase('select_a_class'); ?></option>
                <?php
                $classes = $this->db->get_where('classes', array('school_id' => school_id()))->result_array();
                foreach($classes as $class){
                ?>
                <option value="<?php echo $class['id']; ?>"><?php echo $class['name']; ?></option>
                <?php } ?>
            </select>
            <small id="class_help" class="form-text text-muted"><?php echo get_phrase('select_a_class'); ?></small>
        </div>

        <div class="form-group mb-1">
            <label for="sub_id_on_create"><?php echo get_phrase('subject'); ?></label>
            <select name="subject_id" id="sub_id_on_create" class="form-control select3" data-bs-toggle="select3" required>
                <option value=""><?php echo get_phrase('select_a_subject'); ?></option>
                <?php
                $all_subjects = $this->db->get_where('subjects', array('school_id' => school_id()))->result_array();
                foreach($all_subjects as $sub){
                ?>
                <option value="<?php echo $sub['id']; ?>"><?php echo $sub['name']; ?></option>
                <?php } ?>
            </select>
            <small id="class_help" class="form-text text-muted"><?php echo get_phrase('select_a_subject'); ?></small>
        </div>

        <div class="form-group mb-1">
            <label for="starting_date"><?php echo get_phrase('starting_date'); ?></label>
            <input type="text" class="form-control date" id="starting_date" data-bs-toggle="date-picker" data-single-date-picker="true" name = "exam_start_date" value="<?php echo date('m/d/Y'); ?>" required>
            <small id="name_help" class="form-text text-muted"><?php echo get_phrase('provide_starting_date'); ?></small>
        </div>

        <div class="form-group mb-1">
            <label for="online_exam_name"><?php echo get_phrase('exam_name'); ?></label>
            <input type="text" class="form-control" id="online_exam_name" name = "online_exam_name" placeholder="name" required>
            <small id="name_help" class="form-text text-muted"><?php echo get_phrase('provide_exam_name'); ?></small>
        </div>
        

        <div class="form-group mb-1">
            <label for="from_time"><?php echo get_phrase('from_time'); ?></label>
            <input type="time" id="from-time" name="from-time" class="form-control" required>
            <select id="from-ampm" name="from-ampm">
                <option value="AM">AM</option>
                <option value="PM">PM</option>
            </select>
            <small id="name_help" class="form-text text-muted"><?php echo get_phrase('enter_from_time'); ?></small>
        </div>

        <div class="form-group mb-1">
            <label for="to_time"><?php echo get_phrase('to_time'); ?></label>
            <input type="time" id="to-time" name="to-time" class="form-control" required>
            <select id="to-ampm" name="to-ampm">
                <option value="AM">AM</option>
                <option value="PM">PM</option>
            </select>
            <small id="name_help" class="form-text text-muted"><?php echo get_phrase('enter_to_time'); ?></small>
        </div>

        <!-- <div class="time-input-container">
            <label for="from-time">From:</label>
            <input type="time" id="from-time" name="from-time">
            <select id="from-ampm" name="from-ampm">
                <option value="AM">AM</option>
                <option value="PM">PM</option>
            </select>
         </div>

        <div class="time-input-container">
        <label for="to-time">To:</label>
        <input type="time" id="to-time" name="to-time">
        <select id="to-ampm" name="to-ampm">
            <option value="AM">AM</option>
            <option value="PM">PM</option>
        </select>
        </div> -->

        <!-- <div class="form-group mb-1">
            <label for="exam_duration"><?php //echo get_phrase('exam_duration(Min)'); ?></label>
            <input type="number" class="form-control" id="exam_duration" name = "exam_duration" required>
            <small id="name_help" class="form-text text-muted"><?php //echo get_phrase('enter_exam_duration'); ?></small>
        </div> -->

        <div class="form-group  col-md-12">
            <button class="btn btn-block btn-primary" type="submit"><?php echo get_phrase('create_exam'); ?></button>
        </div>
    </div>
</form>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(".ajaxForm").validate({}); // Jquery form validation initialization
    // $(".ajaxForm").submit(function(e) {
    //     var form = $(this);
    //     ajaxSubmit(e, form, showAllExamsList);
    // });

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
