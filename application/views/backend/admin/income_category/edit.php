<?php  $income_category_details = $this->db->get_where('income_categories', array('id' => $param1))->row_array(); ?>
<form method="POST" class="d-block ajaxForm" action="<?php echo route('income_category/update/'.$param1); ?>">
  <div class="form-group mb-2">
    <label for="name"><?php echo get_phrase('expense_category_name'); ?></label>
    <input type="text" class="form-control" id="name" name = "name" value="<?php echo $income_category_details['name']; ?>" required>
  </div>

  <div class="form-group">
    <button class="btn btn-block btn-primary" type="submit"><?php echo get_phrase('update_income_category'); ?></button>
  </div>
</form>

<script>
$(".ajaxForm").validate({}); // Jquery form validation initialization
$(".ajaxForm").submit(function(e) {
  var form = $(this);
  ajaxSubmit(e, form, showAllIncomeCategories);
});
</script>
