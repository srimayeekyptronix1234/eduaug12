<form method="POST" class="d-block ajaxForm" action="<?php echo route('income_manager/create'); ?>">
  <div class="form-row">
    <div class="form-group mb-1">
      <label for="date"><?php echo get_phrase('date'); ?></label>
      <input type="text" class="form-control date" id="date" data-bs-toggle="date-picker" data-single-date-picker="true" name="date" value="" required>
    </div>

    <div class="form-group mb-1">
      <label for="amount"><?php echo get_phrase('amount').' ('.currency_code_and_symbol('code').')'; ?></label>
      <input type="text" class="form-control" id="amount" name = "amount" required>
    </div>
    
    <div class="form-group mb-1">
      <label for="income_category_id"><?php echo get_phrase('income_category'); ?></label>
      <select class="form-control select2" data-toggle = "select2" name="income_category_id" id = "income_category_id_on_create" required>
        <option value=""><?php echo get_phrase('select_an_income_category'); ?></option>
        <?php
        $income_categories = $this->crud_model->get_income_categories()->result_array();
        foreach ($income_categories as $income_category): ?>
        <option value="<?php echo $income_category['id']; ?>"><?php echo $income_category['name']; ?></option>
      <?php endforeach; ?>
    </select>
  </div>

  <div class="form-group  col-md-12">
    <button class="btn btn-block btn-primary" type="submit"><?php echo get_phrase('create_income'); ?></button>
  </div>
</div>
</form>

<script>
$(document).ready(function() {
  $('select.select2:not(.normal)').each(function () { $(this).select2({ dropdownParent: '#right-modal' }); }); //initSelect2(['#expense_category_id_on_create']);
  $('#date').daterangepicker();
});

$(".ajaxForm").validate({}); // Jquery form validation initialization
$(".ajaxForm").submit(function(e) {
  var form = $(this);
  ajaxSubmit(e, form, showAllIncomes);
});
</script>
