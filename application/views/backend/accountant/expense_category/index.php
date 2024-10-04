<style>
  .text-muted {
    text-align: left;
    text-transform: capitalize;
    font-weight: 500;
    color: #000 !important;
  }

  .boxhover {
    box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
    border-radius: 10px;
  }

  .boxhover:hover {
    box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
    transition: 0.3s ease;
  }

  #myLineChart {
    width: 100% !important;
  }

  .adminbar {
    background: #ffdfe8;
    border-radius: 10px;
    box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
  }

  .filbtn {
    background-color: #091E6C;
  }
</style>

<!-- start page title -->
<div class="row">
  <div class="col-xl-12">
    <div class="card" style="border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); background-color: #f8f9fa;">
      <div class="card-body py-3 adminbar">
        <h4 class="page-title d-inline-block text-primary">
          <i class="mdi mdi-database title_icon"></i>
          <?php echo get_phrase('expense_category'); ?>
        </h4>
        <button type="button" class="btn btn-outline-primary btn-rounded float-end mt-1"
          onclick="rightModal('<?php echo site_url('modal/popup/expense_category/create'); ?>', '<?php echo get_phrase('add_expense_category'); ?>')">
          <i class="mdi mdi-plus"></i> <?php echo get_phrase('add_expense_category'); ?>
        </button>
        <p class="mt-2 text-muted" style="font-size: 14px;">
          <?php echo get_phrase('manage_your_expense_categories_here'); ?>
        </p>
      </div> <!-- end card body-->
    </div> <!-- end card -->
  </div><!-- end col-->
</div>

<!-- end page title -->

<div class="row ">
  <div class="col-xl-12">
    <div class="card">
      <div class="card-body">
        <div class="expense_category_content">
          <?php include 'list.php'; ?>
        </div> <!-- end table-responsive-->
      </div> <!-- end card body-->
    </div> <!-- end card -->
  </div><!-- end col-->
</div>


<script>
  var showAllExpenseCategories = function () {
    var url = '<?php echo route('expense_category/list'); ?>';

    $.ajax({
      type: 'GET',
      url: url,
      success: function (response) {
        $('.expense_category_content').html(response);
        initDataTable('basic-datatable');
      }
    });
  }
</script>