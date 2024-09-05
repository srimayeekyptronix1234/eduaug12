<style>
  .boxbtn:hover {
    background: #0272F3;
  }
</style>

<?php
$incomes = array();
if (isset($income_category_id) && $income_category_id > 0) {
  if ($income_category_id != 'all') {
    $incomes_data = $this->crud_model->get_income_manager($date_from, $date_to, $income_category_id)->result_array();
  } else {
    $incomes_data = $this->crud_model->get_income_manager($date_from, $date_to)->result_array();
  }
} else {
  $incomes_data = $this->crud_model->get_income_manager($date_from, $date_to)->result_array();
}
if (count($incomes_data) > 0): ?>
  <div class="table-responsive-sm">
    <table id="basic-datatable" class="table table-striped dt-responsive nowrap" width="100%">
      <thead class="thead-dark">
        <tr>
          <th><?php echo get_phrase('date'); ?></th>
          <th><?php echo get_phrase('amount'); ?></th>
          <th><?php echo get_phrase('income_category'); ?></th>
          <th><?php echo get_phrase('option'); ?></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($incomes_data as $income): ?>
          <tr>
            <td>
              <?php echo date('D, d-M-Y', $income['date']); ?>
            </td>
            <td>
              <?php echo currency($income['amount']); ?>
            </td>
            <td>
              <?php
              $income_category_details = $this->db->get_where('income_categories', array('id' => $income['income_category_id']))->row_array();
              echo $income_category_details['name'];
              ?>
            </td>
            <td>
              <div class="dropdown text-center">
                <button type="button"
                  class="btn btn-sm btn-icon btn-rounded btn-outline-secondary dropdown-btn dropdown-toggle arrow-none card-drop boxbtn"
                  data-bs-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-vertical"></i></button>
                <div class="dropdown-menu dropdown-menu-end">
                  <!-- item-->
                  <a href="javascript:void(0);" class="dropdown-item"
                    onclick="rightModal('<?php echo site_url('modal/popup/income_manager/edit/' . $income['id']) ?>', '<?php echo get_phrase('update_income'); ?>');"><?php echo get_phrase('edit'); ?></a>
                  <!-- item-->
                  <a href="javascript:void(0);" class="dropdown-item"
                    onclick="confirmModal('<?php echo route('income_manager/delete/' . $income['id']); ?>', showAllIncomes )"><?php echo get_phrase('delete'); ?></a>
                </div>
              </div>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
<?php else: ?>
  <?php include APPPATH . 'views/backend/empty.php'; ?>
<?php endif; ?>