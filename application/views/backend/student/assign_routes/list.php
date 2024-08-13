<?php
    $student_data = $this->user_model->get_logged_in_student_details(); 
    $check_data = $this->db->get_where('assign_routes',['user_id'=>$student_data['user_id']])->result_array();

   
  if (count($check_data) > 0):?>
  <table id="basic-datatable" class="table table-striped dt-responsive nowrap" width="100%">
    <thead>
      <tr style="background-color: #313a46; color: #ababab;">
        <th><?php echo get_phrase('Route'); ?></th>
        <th><?php echo get_phrase('Vehicle'); ?></th>
        <th><?php echo get_phrase('Driver Name'); ?></th>
        <th><?php echo get_phrase(''); ?></th>
      </tr>
    </thead>
    <tbody>
      <?php
      foreach($check_data as $data){
          $assign_vehicle_data = $this->db->get_where('assignvehicle', array('route_id' => $data['route_id']))->row_array();
          $route_data = $this->db->get_where('routes', array('id' => $assign_vehicle_data['route_id']))->row_array();
          $vehicle_data = $this->db->get_where('vehicle', array('id' => $assign_vehicle_data['vehicle_id']))->row_array();

        ?>
        <tr>
          <td><?php echo $route_data['route_title']; ?></td>
          <td><?php echo $vehicle_data['vehicle_model']; ?></td>
          <td><?php echo $vehicle_data['vehicle_driver']; ?></td>
          <td>

            <div class="dropdown text-center">
              <button type="button" class="btn btn-sm btn-icon btn-rounded btn-outline-secondary dropdown-btn dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-vertical"></i></button>
              <div class="dropdown-menu dropdown-menu-end">
                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item" onclick="rightModal('<?php echo site_url('modal/popup/assign_routes/edit/'.$data['id'])?>', '<?php echo get_phrase('update_assign_route'); ?>');"><?php echo get_phrase('edit'); ?></a>
                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item" onclick="confirmModal('<?php echo route('assignroutes/delete/'.$data['id']); ?>', showAllAssignRoutes)"><?php echo get_phrase('delete'); ?></a>
                                              
              </div>
            </div>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
<?php else: ?>
  <?php include APPPATH.'views/backend/empty.php'; ?>
<?php endif; ?>
