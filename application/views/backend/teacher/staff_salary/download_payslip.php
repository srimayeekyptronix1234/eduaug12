<?php
  if ($action == 'pdf') {
    $action = get_phrase('payslip_pdf');
  }else{
    $action = get_phrase($action);
  }
  $staff_salary_details=$this->db->get_where('staff_salary',['staff_name'=>$user_id])->result_array();
  $user_details=$this->db->get_where('users',['id'=>$user_id])->row_array();
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
        <th><?php echo get_phrase('payment_month');?></th>
        <th><?php echo get_phrase('staff_role'); ?></th>
        <th><?php echo get_phrase('staff_name'); ?></th>
        <th><?php echo get_phrase('salary'); ?></th>
        <th><?php echo get_phrase('status'); ?></th>
        <th><?php echo get_phrase('payment_date'); ?></th>
      </tr>
    </thead>
    <tbody>
      <?php if(count($staff_salary_details) > 0){
             foreach($staff_salary_details as $staff){
      ?>
        <tr>
           <td><?php 
                 $monthNum = sprintf("%02s", $staff["month"]);
                 $monthName = date("F", strtotime($monthNum));
                  echo $monthName;
             ?>
          </td>
           <td>
              <?=$staff['staff_role'];?>
            </td>
            <td>
              <?php 
                $user_detail=$this->db->get_where('users',['id'=>$staff['staff_name']])->row_array();
                echo $user_detail['name'];
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
            <td><?=$staff['date'];?></td>
        </tr>
      <?php }} ?>
    </tbody>
  </table>
</body>
</html>
