<?php
    
    $check_data = $this->db->get('vehicle')->result_array();

   
  if (count($check_data) > 0):?>
  <table id="basic-datatable" class="table table-striped dt-responsive nowrap" width="100%">
    <thead>
      <tr style="background-color: #313a46; color: #ababab;">
        <th><?php echo get_phrase('Vehicle Number'); ?></th>
        <th><?php echo get_phrase('Vehicle Model'); ?></th>
        <th><?php echo get_phrase('Driver Name'); ?></th>
        <th><?php echo get_phrase(''); ?></th>
      </tr>
    </thead>
    <tbody>
      <?php
      foreach($check_data as $data){
        
        ?>
        <tr>
          <td><?php echo $data['vehicle_number']; ?></td>
          <td><?php echo $data['vehicle_model']; ?></td>
          <td><?php echo $data['vehicle_driver']; ?></td>
       
          <td>

            <div class="dropdown text-center">
              <button type="button" class="btn btn-sm btn-icon btn-rounded btn-outline-secondary dropdown-btn dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-vertical"></i></button>
              <div class="dropdown-menu dropdown-menu-end">
                <!-- item-->
                 <a href="javascript:void(0);" class="dropdown-item" onclick="rightModal('<?php echo site_url('modal/popup/vehicle/edit/'.$data['id'])?>', '<?php echo get_phrase('update_vehicle'); ?>');"><?php echo get_phrase('edit'); ?></a>
                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item" onclick="confirmModal('<?php echo route('vehicle/delete/'.$data['id']); ?>', showAllVehicle)"><?php echo get_phrase('delete'); ?></a>
                                              
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
