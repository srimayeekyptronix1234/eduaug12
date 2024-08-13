<?php
    
    $check_data = $this->db->get('driver')->result_array();

   
  if (count($check_data) > 0):?>
  <table id="basic-datatable" class="table table-striped dt-responsive nowrap" width="100%">
    <thead>
      <tr style="background-color: #313a46; color: #ababab;">
        <th><?php echo get_phrase('Name'); ?></th>
        <th><?php echo get_phrase('Route'); ?></th>
        <th><?php echo get_phrase('Vehicle'); ?></th>
        <th><?php echo get_phrase(''); ?></th>
      </tr>
    </thead>
    <tbody>
      <?php
      foreach($check_data as $data){
          $route_data = $this->db->get_where('routes', array('id' => $data['route_id']))->row_array();
          $vehicle_data = $this->db->get_where('vehicle', array('id' => $data['vehicle_id']))->row_array();
        ?>
        <tr>
          <td><?=$data['name'];?></td>
          <td><?=$route_data['route_title'];?></td>
          <td><?=$vehicle_data['vehicle_model'];?></td>
          <td>

            <div class="dropdown text-center">
              <button type="button" class="btn btn-sm btn-icon btn-rounded btn-outline-secondary dropdown-btn dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-vertical"></i></button>
              <div class="dropdown-menu dropdown-menu-end">
                <a href="javascript:void(0);" class="dropdown-item" onclick="rightModal('<?php echo site_url('modal/popup/driver/edit/'.$data['id'])?>', '<?php echo get_phrase('update_driver'); ?>');"><?php echo get_phrase('edit'); ?></a>
                <a href="javascript:void(0);" class="dropdown-item" onclick="confirmModal('<?php echo route('driver/delete/'.$data['id']); ?>', showAllDrivers)"><?php echo get_phrase('delete'); ?></a>
                                              
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
