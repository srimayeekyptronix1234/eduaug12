<?php
$school_id = school_id();
$check_data = $this->db->get_where('candidate_list', array('status' => 1));
if($check_data->num_rows() > 0):?>
<table id="basic-datatable" class="table table-striped dt-responsive nowrap w-100">
    <thead>
        <tr style="background-color: #313a46; color: #ababab;">
            <th><?php echo get_phrase('image'); ?></th>
            <th><?php echo get_phrase('name'); ?></th>
            <th><?php echo get_phrase('emai'); ?></th>
            <th><?php echo get_phrase('interview_date'); ?></th>
            <th><?php echo get_phrase('phone'); ?></th>
            <th><?php echo get_phrase('applied_for'); ?></th>
            <th><?php echo get_phrase('options'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php
        $candidateList = $this->db->get_where('candidate_list', array('status' => 1))->result_array();
        foreach($candidateList as $list){
            $applied_position = $this->db->get_where('position_applied_for', array('id' => $list['position_applied_for']))->row_array();
            ?>
            <tr>
                <td><img class="rounded-circle" width="50" height="50" src="<?php echo $this->user_model->get_candidate_image($list['id']); ?>"></td>
                <td><?php echo get_phrase($list['candidate_name']); ?></td>
                <td><?php echo get_phrase($list['candidate_email']); ?></td>
                <td><?php echo (DateTime::createFromFormat('m/d/Y', $list['interview_date']))->format('jS M Y');?></td>
                <td><?php echo get_phrase($list['candidate_phone']); ?></td>
                <td><?php echo get_phrase($applied_position['position_name']); ?></td>
                <td>
                    <div class="dropdown text-center">
                        <button type="button" class="btn btn-sm btn-icon btn-rounded btn-outline-secondary dropdown-btn dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-vertical"></i></button>
                        <div class="dropdown-menu dropdown-menu-end">
                             <a href="<?php echo site_url('uploads/candidate/resume/'.$list['resume']); ?>" target="_blank" class="dropdown-item"><?php echo get_phrase('download_resume'); ?></a>
                             <a href="javascript:void(0);" class="dropdown-item" onclick="ResheduleCandidate('<?php echo $list['id']; ?>')"><?php echo get_phrase('reshedule_candidate'); ?></a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item" onclick="rightModal('<?php echo site_url('modal/popup/candidate_list/edit/'.$list['id']); ?>', '<?php echo get_phrase('update_candidate'); ?>')"><?php echo get_phrase('edit'); ?></a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item" onclick="confirmModal('<?php echo route('candidate_list/delete/'.$list['id']); ?>', showAllCandidate )"><?php echo get_phrase('delete'); ?></a>
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
