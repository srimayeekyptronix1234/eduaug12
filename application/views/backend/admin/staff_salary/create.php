
<form method="POST" class="d-block ajaxForm" action="<?php echo route('staff_salary/create'); ?>">
  <div class="form-row">
    
    <div class="form-group mb-1">
      <label for="staff_role"><?php echo get_phrase('staff'); ?></label>
      <select name="role" id="role_on_taking_attendance" class="form-control select2" data-bs-toggle="select2" onchange="staffRoleWiseName(this.value)"  required>
        <option value=""><?php echo get_phrase('select_a_staff'); ?></option>
        <?php
          $role=array('student','parent','admin','superadmin');
          $this->db->select('DISTINCT(u.role)');
          $this->db->where_not_in('u.role',$role);
          $all_users=$this->db->get('users u')->result_array();
        ?>
        <?php foreach($all_users as $users): ?>
          <option value="<?php echo $users['role']; ?>"><?php echo $users['role']; ?></option>
        <?php endforeach; ?>
      </select>

    </div>
    <div class="form-group mb-1">
      <label for="staff_name"><?php echo get_phrase('staff_name'); ?></label>
      <select name="staff_name" id="staff_name" class="form-control select2" data-toggle="select2" onchange="staffNameWiseSalary(this.value)" required>
        <option value=""><?php echo get_phrase('select'); ?></option>
      </select>
    </div>
    <div class="form-group mb-1">
      <label for="date"><?php echo get_phrase('salary_month'); ?></label>
       <input type="month" name="month" onchange="changeMonth()" id="month" class="form-control" required="" data-gtm-form-interact-field-id="0">   
   </div>
   <div class="form-group mb-1" id="salary_amount">
   </div>
   
    <div class="form-group mb-1">
      <label for="date"><?php echo get_phrase('payment_date'); ?></label>
      <input type="text" class="form-control date" id="date" data-bs-toggle="date-picker" data-single-date-picker="true" name="date" value="" required>
    </div>
    <div class="form-group mb-1">
      <label for="name">Status</label>
      <select name="status" id="status" class="form-control select2" data-toggle="select2">
        <option value=""><?php echo get_phrase('select status'); ?></option>
        <option value="1">Paid</option>
        <option value="2">Unpaid</option>
        <option value="3">Partialy</option>
      </select>

   </div>
    

               
  <div class="form-group  col-md-12">
    <button class="btn btn-block btn-primary" type="submit"><?php echo get_phrase('add_salary'); ?></button>
  </div>
</div>
</form>

<script>
$(document).ready(function() {
  $('select.select2:not(.normal)').each(function () { $(this).select2({ dropdownParent: '#right-modal' }); }); //initSelect2(['#expense_category_id_on_create']);
  $('#date').daterangepicker();
});
function staffRoleWiseName(staffRole) {
  $.ajax({
    url: "<?php echo route('role_wise_staff_name/list/'); ?>" + staffRole,
    success: function (response) {
      $('#staff_name').html(response);
    }
  });
}
function staffNameWiseSalary(staffId) {
  $.ajax({
    url: "<?php echo route('staff_salary/salary/'); ?>" + staffId,
    success: function (response) {
      $('#salary_amount').html(response);
    }
  });
}

$(".ajaxForm").validate({}); // Jquery form validation initialization
$(".ajaxForm").submit(function(e) {
  var form = $(this);
  ajaxSubmit(e, form, showAllStaffSalary);
});
</script>