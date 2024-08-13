<!--title-->
<div class="row ">
  <div class="col-xl-12">
    <div class="card">
      <div class="card-body py-2">
        <h4 class="page-title d-inline-block">
          <i class="mdi mdi-account-circle title_icon"></i> <?php echo get_phrase('candidate'); ?>
        </h4>
        <button type="button" class="btn btn-outline-primary btn-rounded alignToTitle float-end mt-1" onclick="rightModal('<?php echo site_url('modal/popup/candidate_list/create'); ?>', '<?php echo get_phrase('create_candidate'); ?>')"> <i class="mdi mdi-plus"></i> <?php echo get_phrase('create_candidate'); ?></button>
      </div> <!-- end card body-->
    </div> <!-- end card -->
  </div><!-- end col-->
</div>

<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body candidate_content">
        <?php include 'list.php'; ?>
      </div>
    </div>
  </div>
</div>

<script>
var showAllCandidate = function () {
  var url = '<?php echo route('candidate_list/list'); ?>';

  $.ajax({
    type : 'GET',
    url: url,
    success : function(response) {
      // Hide the loader
      document.getElementById('loader').style.display = 'none';
      document.getElementById('submitbtn').disabled = false;
      $('.candidate_content').html(response);
      initDataTable('basic-datatable');
    }
  });
}
</script>
