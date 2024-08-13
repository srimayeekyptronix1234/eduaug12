<?php $student_data = $this->user_model->get_logged_in_student_details(); 
?>
<!--title-->
<div class="row ">
  <div class="col-xl-12">
    <div class="card">
      <div class="card-body py-2">
        <h4 class="page-title d-inline-block">
          <i class="mdi mdi-comment title_icon"></i> <?php echo get_phrase('complaint / actions'); ?>
        </h4>
        </div> <!-- end card body-->
    </div> <!-- end card -->
  </div><!-- end col-->
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="row mt-3">
                <div class="col-md-1 mb-1"></div>                 
            </div>
            <div class="card-body complaint_content">
                <?php
                            $check_data=$this->db->get_where('complaint',['student_id'=>$student_data['user_id']])->result_array();


                            if (count($check_data) > 0):?>
                              <table id="basic-datatable" class="table table-striped dt-responsive nowrap" width="100%">
                                <thead>
                                  <tr style="background-color: #313a46; color: #ababab;">
                                    <th><?php echo get_phrase('Class'); ?></th>
                                    <th><?php echo get_phrase('Student'); ?></th>
                                    <th><?php echo get_phrase('Teacher'); ?></th>
                                    <th><?php echo get_phrase('Status'); ?></th>
                                    <th><?php echo get_phrase(''); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php
                              foreach($check_data as $data){
                                 $student_data = $this->db->get_where('users', array('id' => $data['student_id'],'role' => 'student'))->row_array();
                                 $teacher_data = $this->db->get_where('users', array('id' => $data['teacher_id'],'role' => 'teacher'))->row_array();
                                 $section_data =$this->db->get_where('sections', array('id' => $data['section_id'],'class_id' => $data['class_id']))->row_array();

                                 ?>
                                 <tr>
                                  <td><?php echo 'class'. $data['class_id'].'('.$section_data['name'].')'; ?></td>
                                  <td><?php echo $student_data['name']; ?></td>
                                  <td><?php echo $teacher_data['name']; ?></td>
                                  <td><?php if(isset($data['status']) && $data['status'] == '1'){ echo "Active";}else if(isset($data['status']) && $data['status'] == '0'){ echo "Inctive";}
                                  ?>
                                  </td>

                              <td>

                                <div class="dropdown text-center">
                                    <button type="button" class="btn btn-sm btn-icon btn-rounded btn-outline-secondary dropdown-btn dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-vertical"></i></button>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a href="javascript:void(0);" class="dropdown-item" onclick="previewModal('<?php echo site_url('modal/popup/complaintsactions/view/'.$data['id'])?>', '<?php echo get_phrase('Complaint'); ?>');"><?php echo get_phrase('view'); ?></a>

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

            
           </div>
</div>
</div>
</div>

