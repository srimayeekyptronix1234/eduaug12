<?php
  if ($action == 'pdf') {
    $action = get_phrase('payslip_pdf');
  }else{
    $action = get_phrase($action);
  }
  $staff_salary_details=$this->db->get_where('staff_salary',['id'=>$staff_salary_id])->row_array();
  $user_details=$this->db->get_where('users',['id'=>$staff_salary_details['staff_name']])->row_array();

?>
<!DOCTYPE html>
<html>
<head>
  <title><?php echo $user_details['name'].' '.$action; ?></title>
  <link rel="shortcut icon" href="<?php echo $this->settings_model->get_favicon(); ?>">
  <style>
    <?php include FCPATH.'assets/backend/css/export.css'; ?>
  </style>
</head>
<body>

 
  <table width="100%">
    <thead>
      <tr>
        <th><?php echo get_phrase('staff_role'); ?></th>
        <th><?php echo get_phrase('staff_name'); ?></th>
        <th><?php echo get_phrase('salary'); ?></th>
        <th><?php echo get_phrase('status'); ?></th>
        <th><?php echo get_phrase('payment_date'); ?></th>
      </tr>
    </thead>
    <tbody>
        <tr>
           <td>
              <?=$staff_salary_details['staff_role'];?>
            </td>
            <td>
              <?php 
                echo $user_details['name'];
              ?>
            </td>
            <td>
              <?php
                  if(!empty($staff_salary_details['salary_amount'])){
                    echo $staff_salary_details['salary_amount'];  
                  }
              ?>
            </td>
            <td>
              <?php
                   if($staff_salary_details['status'] == '1'){
                       echo 'Paid';
                   }else if($staff_salary_details['status'] == '2'){
                       echo 'Unpaid';
                   }else if($staff_salary_details['status'] == '3'){
                       echo 'Partialy';
                   } 
 
              ?>
            </td>
            <td><?=$staff_salary_details['date'];?></td>
        </tr>
    </tbody>
  </table>
</body>
</html>
