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
    padding: 20px 10px 20px 10px;
  }

  .parbox:hover {
    box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
    transition: 1s ease;
  }

  .filbtn {
    background: #0272f3;
  }
</style>
<?php 
  $user_id = $this->session->userdata('user_id');
?>
<!-- start page title -->
<div class="row">
  <div class="col-xl-12">
    <div class="card parentbar">
      <div class="card-body py-2 d-flex justify-content-between align-items-center">
        <div>
          <h4 class="page-title d-flex align-items-center">
            <i class="mdi mdi-book-open-page-variant title_icon"></i>
            <span class="ms-2"><?php echo get_phrase('staff_salary'); ?></span>
          </h4>
          <p class="inspiring-line mt-2">
            Fostering growth and unlocking potential with every advancement.
          </p>
        </div>
      </div> <!-- end card body-->
    </div> <!-- end card -->
  </div><!-- end col-->
</div>
<!-- end page title -->

<div class="row ">
  <div class="col-xl-12">
    <div class="card parbox">
      <div class="card-body">
        <div class="staff_salary_content">
          <style>
            .boxbtn:hover {
              background: #0272F3;
            }
          </style>

          <?php
          $staff_salary=$this->db->get_where('staff_salary',['staff_name'=>$user_id])->result_array();
          if (count($staff_salary) > 0): ?>
            <div class="table-responsive-sm">
              <table id="basic-datatable" class="table table-striped dt-responsive nowrap" width="100%">
                <thead class="thead-dark">
                  <tr>
                    <th><?php echo get_phrase('staff_name'); ?></th>
                    <th><?php echo get_phrase('month');?></th>
                    <th><?php echo get_phrase('salary'); ?></th>
                    <th><?php echo get_phrase('status'); ?></th>
                    <th><?php echo get_phrase('option'); ?></th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($staff_salary as $staff): ?>
                    <tr>
                      <td>
                        <?php 
                        $user_details=$this->db->get_where('users',['id'=>$staff['staff_name']])->row_array();
                        echo $user_details['name'];
                        ?>
                      </td>
                      <td>
                        <?php 
                           $month_num=sprintf("%02s",$staff['month']);
                           $month_name=date("F",strtotime($month_num));
                           echo $month_name;
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
                          <a class="dropdown-item" id="export-pdf" href="javascript:0" onclick="getPayslip('pdf','<?=$staff['staff_name']?>')">Download Payslip</a>

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
        </div> <!-- end table-responsive-->
      </div> <!-- end card body-->
    </div> <!-- end card -->
  </div><!-- end col-->
</div>
<script type="text/javascript">
    function getPayslip(type='',user_id='') {
    var url = '<?php echo route('payslip_download/url'); ?>';
    $.ajax({
      type: 'post',
      data: { type: type, user_id:user_id},
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




