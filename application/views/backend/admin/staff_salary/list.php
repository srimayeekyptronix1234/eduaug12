<style>
  .boxbtn:hover {
    background: #0272F3;
  }
</style>

<?php
$staff_salary=$this->db->get('staff_salary')->result_array();
if (count($staff_salary) > 0): ?>
  <div class="table-responsive-sm">
    <table id="basic-datatable" class="table table-striped dt-responsive nowrap" width="100%">
      <thead class="thead-dark">
        <tr>
          <th><?php echo get_phrase('staff_role'); ?></th>
          <th><?php echo get_phrase('staff_name'); ?></th>
          <th><?php echo get_phrase('salary'); ?></th>
          <th><?php echo get_phrase('status'); ?></th>
          <th><?php echo get_phrase('option'); ?></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($staff_salary as $staff): ?>
          <tr>
            <td>
              <?=$staff['staff_role'];?>
            </td>
            <td>
              <?php 
                $user_details=$this->db->get_where('users',['id'=>$staff['staff_name']])->row_array();
                echo $user_details['name'];
              ?>
            </td>
            <td>
              <?php
                  if(!empty($staff['salary_amount'])){
                    echo $staff['salary_amount'];  
                  }
              ?>
            </td>
            <td>
              <?php
                   if($staff['status'] == '1'){
                       echo 'Paid';
                   }else if($staff['status'] == '2'){
                       echo 'Unpaid';
                   }else if($staff['status'] == '3'){
                       echo 'Partialy';
                   } 
 
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
                    onclick="rightModal('<?php echo site_url('modal/popup/staff_salary/edit/' . $staff['id']) ?>', '<?php echo get_phrase('update'); ?>');"><?php echo get_phrase('edit'); ?></a>
                  <!-- item-->
                  <a href="javascript:void(0);" class="dropdown-item"
                    onclick="confirmModal('<?php echo route('staff_salary/delete/' . $staff['id']); ?>', showAllStaffSalary )"><?php echo get_phrase('delete'); ?></a>
                  <a class="dropdown-item" id="export-pdf" href="javascript:0" onclick="getPayslip('pdf','<?=$staff['id']?>')">Download Payslip</a>

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
<script type="text/javascript">
    function getPayslip(type='',staff_salary_id='') {
    var url = '<?php echo route('payslip_download/url'); ?>';
    $.ajax({
      type: 'post',
      data: { type: type, staff_salary_id: staff_salary_id },
      url: url,
      success: function (response) {
        if (type == 'csv') {
          window.open(response, '_self');
        } else {
          window.open(response, '_blank');
        }
      }
    });
  }

</script>