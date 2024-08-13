<?php
    
    $check_data = $this->db->get_where('users',['role'=>'hr'])->result_array();

   
  if (count($check_data) > 0):?>
  <table id="basic-datatable" class="table table-striped dt-responsive nowrap" width="100%">
    <thead>
      <tr style="background-color: #313a46; color: #ababab;">
        <th><?php echo get_phrase('Name'); ?></th>
        <th><?php echo get_phrase('Email'); ?></th>
        <th><?php echo get_phrase('Phone'); ?></th>
        <th><?php echo get_phrase(''); ?></th>
      </tr>
    </thead>
    <tbody>
      <?php
      foreach($check_data as $data){
        ?>
        <tr>
          <td><?=$data['name'];?></td>
          <td><?=$data['email'];?></td>
          <td><?=$data['phone'];?></td>
          <td>

            <div class="dropdown text-center">
              <button type="button" class="btn btn-sm btn-icon btn-rounded btn-outline-secondary dropdown-btn dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-vertical"></i></button>
              <div class="dropdown-menu dropdown-menu-end">
                <a href="javascript:void(0);" class="dropdown-item" onclick="rightModal('<?php echo site_url('modal/popup/users_list/edit/'.$data['id'])?>', '<?php echo get_phrase('update_user'); ?>');"><?php echo get_phrase('edit'); ?></a>
                <a href="javascript:void(0);" class="dropdown-item" onclick="confirmModal('<?php echo route('users_list/delete/'.$data['id']); ?>', showAllUsers)"><?php echo get_phrase('delete'); ?></a>
                                              
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
