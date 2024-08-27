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

<!-- start page title -->
<div class="row">
  <div class="col-xl-12">
    <div class="card parentbar">
      <div class="card-body py-2 d-flex justify-content-between align-items-center">
        <div>
          <h4 class="page-title d-flex align-items-center">
            <i class="mdi mdi-book-open-page-variant title_icon"></i>
            <span class="ms-2"><?php echo get_phrase('income'); ?></span>
          </h4>
          <p class="inspiring-line mt-2">
            Master your financial goals with precise expense tracking.
          </p>
        </div>
        <button type="button" class="btn btn-outline-primary btn-rounded alignToTitle float-end mt-2"
          onclick="rightModal('<?php echo site_url('modal/popup/income_manager/create'); ?>', '<?php echo get_phrase('add_new_income'); ?>')">
          <i class="mdi mdi-plus"></i> <?php echo get_phrase('add_new_income'); ?>
        </button>
      </div> <!-- end card body-->
    </div> <!-- end card -->
  </div><!-- end col-->
</div>

<!-- end page title -->

<div class="row ">
  <div class="col-xl-12">
    <div class="card parbox">
      <div class="card-body">
        <div class="row justify-content-md-center" style="margin-bottom: 10px;">
          <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 mb-3 mb-lg-0">
            <div class="form-group">
              <div id="reportrange" class="form-control" data-toggle="date-picker-range"
                data-target-display="#selectedValue" data-cancel-class="btn-light">
                <i class="mdi mdi-calendar"></i>&nbsp;
                <span id="selectedValue"> <?php echo date('F d, Y', strtotime(' -30 day')) . ' - ' . date('F d, Y'); ?>
                </span>
              </div>
            </div>
          </div>

          <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 mb-3 mb-lg-0">
            <select class="form-control select2" data-toggle="select2" name="income_category_id"
              id="income_category_id">
              <option value="all"><?php echo get_phrase('income_category'); ?></option>
              <?php
              $income_categories = $this->crud_model->get_income_categories()->result_array();
              foreach ($income_categories as $income_category): ?>
                <option value="<?php echo $income_category['id']; ?>"><?php echo $income_category['name']; ?></option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 mb-3 mb-lg-0">
            <button type="button" class="btn btn-icon btn-secondary form-control filbtn"
              onclick="showAllIncomes()"><?php echo get_phrase('filter'); ?></button>
          </div>
        </div>
        <div class="income_content">
          <?php include 'list.php'; ?>
        </div> <!-- end table-responsive-->
      </div> <!-- end card body-->
    </div> <!-- end card -->
  </div><!-- end col-->
</div>


<script>
  $(document).ready(function () {
    $('select.select2:not(.normal)').each(function () { $(this).select2({ dropdownParent: '#right-modal' }); }); //initSelect2(['#expense_category_id']);
  });
  var showAllIncomes = function () {
    var url = '<?php echo route('income_manager/list'); ?>';
    $.ajax({
      type: 'GET',
      url: url,
      data: { date: $('#selectedValue').text(), income_category_id: $('#income_category_id').val() },
      success: function (response) {
        $('.income_content').html(response);
        initDataTable("basic-datatable");
      }
    });
  }
</script>