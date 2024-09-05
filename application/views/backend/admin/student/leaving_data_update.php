<?php
$user_details = $this->db->get_where('users', array('id' => $param1))->row_array();
?>
  <form method="POST" class="d-block ajaxForm" action="<?php echo route('student/updated-leaving-data/'.$param1); ?>">
    <div class="form-row">
        <div class="form-group mb-1">
            <label for="leaving_date"><?php echo get_phrase('leaving_date'); ?></label>
            <input type="text" value="<?php echo date('m/d/Y', $user_details['leaving_date']); ?>" class="form-control date" id="leaving_date" data-bs-toggle="date-picker" data-single-date-picker="true" name = "leaving_date" required>
            <small id="name_help" class="form-text text-muted"><?php echo get_phrase('provide_leaving_date'); ?></small>
        </div>

        <div class="form-group mb-1">
            <label for="phone"><?php echo get_phrase('reason_for_leaving'); ?></label>
            <textarea class="form-control" id="reason_for_leaving" name = "reason_for_leaving" rows="5" required><?php echo $user_details['reason_for_leaving']; ?></textarea>
            <small id="" class="form-text text-muted"><?php echo get_phrase('provide_reason_for_leaving'); ?></small>
        </div>

        <div class="form-group mb-1">
            <label for="phone"><?php echo get_phrase('academic_performance'); ?></label>
            <textarea class="form-control" id="academic_performance" name = "academic_performance" rows="5" required><?php echo $user_details['academic_performance']; ?></textarea>
            <small id="" class="form-text text-muted"><?php echo get_phrase('provide_academic_performance'); ?></small>
        </div>

      <div class="form-group mt-2 col-md-12">
        <button class="btn btn-block btn-primary" type="submit"><?php echo get_phrase('Add'); ?></button>
      </div>
    </div>
  </form>

<script>
    $(".ajaxForm").validate({}); // Jquery form validation initialization
    $(".ajaxForm").submit(function(e) {
        var form = $(this);
        ajaxSubmit(e, form, showAllStudents);
    });
    $("#leaving_date" ).daterangepicker();
</script>
