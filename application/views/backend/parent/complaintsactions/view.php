<?php 
$complaint_data = $this->db->get_where('complaint', array('id' => $param1))->row_array();
$section_data =$this->db->get_where('sections', array('id' => $complaint_data['section_id'],'class_id' => $complaint_data['class_id']))->row_array();
$student_data = $this->db->get_where('users', array('id' => $complaint_data['student_id'],'role' => 'student'))->row_array();
$teacher_data = $this->db->get_where('users', array('id' => $complaint_data['teacher_id'],'role' => 'teacher'))->row_array();
                       
?>
<div class="row justify-content-md-center">
        <div class="col-xl-10 col-lg-10 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title"></h4>
                        <div class="col-12">
                            <div class="">
                               <?php if(isset($complaint_data['class_id']) && $complaint_data['class_id'] != ''){?>
                               	<label class="col-md-4 col-form-label"> <?php echo get_phrase('class :') ;?> 
                                 <?=$complaint_data['class_id'].'('.$section_data['name'].')'; ?>
                                </label>
                               <?php } ?>
                            </div>

                            <div class="">
                            	<?php if(isset($complaint_data['student_id']) && $complaint_data['student_id'] != ''){?>
                                <label class="col-md-4 col-form-label"><?php echo get_phrase('student :') ;?>
                                <?=$student_data['name'];?>
                               </label>
                               <?php } ?>
                            </div>
                            
                            <div class="">
                            	<?php if(isset($complaint_data['teacher_id']) && $complaint_data['teacher_id'] != ''){?>
                                <label class="col-md-4 col-form-label"><?php echo get_phrase('teacher :') ;?>
                                <?=$teacher_data['name'];?>
                               </label>
                               <?php } ?>
                            </div>
                             <div class="">
                              <?php if(isset($complaint_data['complaint_type']) && $complaint_data['complaint_type'] != ''){?>
                                <label class="col-md-4 col-form-label"><?php echo get_phrase('complaint_type :') ;?>
                                <?php if($complaint_data['complaint_type'] == '1'){ echo 'Major';}elseif($complaint_data['complaint_type'] == '2'){ echo 'Minor';}?>
                               </label>
                               <?php } ?>
                            </div>
                           
                            <div class="">
                            	<?php if(isset($complaint_data['complaint_by']) && $complaint_data['complaint_by'] != ''){?>
                                <label class="col-md-4 col-form-label"><?php echo get_phrase('complaint_by :') ;?>
                                <?=$complaint_data['complaint_by'];?>
                               </label>
                               <?php } ?>
                            </div>
                            <div class="">
                            	<?php if(isset($complaint_data['complaint_date']) && $complaint_data['complaint_date'] != ''){?>
                                <label class="col-md-4 col-form-label"><?php echo get_phrase('complaint_date :') ;?>
                                <?=$complaint_data['complaint_date'];?>
                               </label>
                               <?php } ?>
                            </div>
                            <div class="">
                            	<?php if(isset($complaint_data['complaint_desc']) && $complaint_data['complaint_desc'] != ''){?>
                                <label class="col-md-4 col-form-label"><?php echo get_phrase('complaint_description :') ;?>
                                <?=$complaint_data['complaint_desc'];?>
                               </label>
                               <?php } ?>
                            </div>
                         </div>

                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div>
    </div>
