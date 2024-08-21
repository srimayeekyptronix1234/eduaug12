<?php 
$user_id = $this->session->userdata('user_id');
$teacher_table_data=$this->db->get_where('teachers',['user_id'=>$user_id])->row_array();
$teacher_permissions_data=$this->db->get_where('teacher_permissions',['teacher_id'=>$teacher_table_data['id']])->row_array();
$current_session_students = $this->user_model->get_total_data($teacher_permissions_data['class_id']);
$total_exam=$this->db->get_where('online_exam_details',['class_id'=>$teacher_permissions_data['class_id']])->num_rows();
$school_id  = school_id();
?>
<!-- start page title -->
<div class="row ">
  <div class="col-xl-12">
    <div class="card">
      <div class="card-body py-2">
        <h4 class="page-title"> <i class="mdi mdi-view-dashboard title_icon"></i> <?php echo get_phrase('dashboard'); ?> </h4>
      </div> <!-- end card body-->
    </div> <!-- end card -->
  </div><!-- end col-->
</div>
<!-- end page title -->

<div class="row ">
    <div class="col-xl-12">
        <div class="row">
            <div class="col-xl-8">
              <div class="row">
                  <div class="col-lg-6">
                      <div class="card widget-flat" id="student" style="on">
                          <div class="card-body">
                              <div class="float-end">
                                  <i class="mdi mdi-account-multiple widget-icon"></i>
                              </div>
                              <h5 class="text-muted font-weight-normal mt-0" title="Number of Student"> <i class="mdi mdi-account-group title_icon"></i>  <?php echo get_phrase('students'); ?> <a href="<?php echo route('student'); ?>" style="color: #6c757d; display: none;" id = "student_list"><i class = "mdi mdi-export"></i></a></h5>
                              <h3 class="mt-3 mb-3">
                                  <?php
                                      if(isset($current_session_students) && $current_session_students != ''){
                                           echo count($current_session_students);

                                      }
                                  ?>
                              </h3>
                              <p class="mb-0 text-muted">
                                  <span class="text-nowrap"><?php echo get_phrase('total_number_of_student'); ?></span>
                              </p>
                          </div> <!-- end card-body-->
                      </div> <!-- end card-->
                  </div> <!-- end col-->
                   <!-- COMPLAINT SECTION START -->
                  <div class="col-lg-6">
                      <div class="card widget-flat" id="complaints" style="on">
                          <div class="card-body">
                              <div class="float-end">
                                  <i class="mdi mdi-account-multiple widget-icon"></i>
                              </div>
                              <h5 class="text-muted font-weight-normal mt-0" title="Number of Complaints"> <i class="mdi mdi-file-compare title_icon"></i><?php echo get_phrase('complaints'); ?>  <a href="<?php echo route('complaints'); ?>" style="color: #6c757d; display: none;" id = "parent_list"><i class = "mdi mdi-export"></i></a></h5>
                              <h4 class="mt-3 mb-3">
                                  <?php
                                      $total_active_complaints = $this->db->get_where('complaint',['teacher_id'=>$user_id,'status'=>'1'])->num_rows();
                                      if(isset($total_active_complaints) && $total_active_complaints != ''){
                                           echo 'Active:' .$total_active_complaints;

                                      }
                                      $total_closed_complaints = $this->db->get_where('complaint',['teacher_id'=>$user_id,'status'=>'0'])->num_rows();
                                      if(isset($total_closed_complaints) && $total_closed_complaints != ''){
                                           echo 'Closed:' .$total_closed_complaints;

                                      }


                                   ?>
                              </h4>
                              <p class="mb-0 text-muted">
                                  <span class="text-nowrap"><?php echo get_phrase('total_number_of_parent'); ?></span>
                              </p>
                          </div> 
                      </div> 
                  </div>
                  <!-- COMPLAINT SECTION END -->


              </div> <!-- end row -->

              <div class="row">
                <!-- Upcoming classes and subjects start-->
                  <div class="col-lg-6">
                      <div class="card widget-flat" id = "Class Schedule">
                          <div class="card-body">
                              <div class="float-end">
                                  <i class="mdi mdi-account-multiple widget-icon"></i>
                              </div>
                              <h5 class="text-muted font-weight-normal mt-0" title="Upcoming classes and subjects"> <i class="mdi mdi-book-variant title_icon"></i> <?php echo get_phrase('Upcoming classes and subjects'); ?> <a href="<?php echo route('class'); ?>" style="color: #6c757d; display: none;" id = "class_list"><i class = "mdi mdi-export"></i></a></h5>
                              <h3 class="mt-3 mb-3">
                                 
                              </h3>
                                 <?php 
                                       $this->db->select('c.id as class_id, c.name as class_name, GROUP_CONCAT(s.name SEPARATOR " , ") as subjects');
                                       $this->db->from('routines r');
                                       $this->db->join('subjects s', 's.id = r.subject_id', 'left');
                                       $this->db->join('classes c', 'c.id = r.class_id', 'left');
                                       $this->db->where('r.school_id', $teacher_table_data['school_id']);
                                       $this->db->where('r.teacher_id', $teacher_table_data['id']);
                                       $this->db->group_by('c.id, c.name');
                                       $check_data=$this->db->get()->result_array();


                                   ?>
                                   <div class="table-responsive-sm">
                                    <table class="table table-striped table-centered table-bordered mb-0 table-responsive">
                                      <thead>
                                        <tr>
                                          <th width = "60%"><?php echo get_phrase('Class') ;?></th>
                                          <th width = "60%"><?php echo get_phrase('subject') ;?></th>

                                        </tr>
                                      </thead>
                                      <tbody>
                                        <?php if (count($check_data) > 0): ?>
                                          <?php foreach ($check_data as $data): 
                                              $class_data=$this->db->get_where('classes',['id'=>$data['class_id']])->row_array();
                                              $subject=$this->db->get_where('subjects',['id'=>$data['subject_id'],'class_id'=>$data['class_id']])->row_array();
                                            ?>
                                            <tr>
                                              <td>
                                                <?=$data['class_name'];?>
                                               </td>
                                               <td><?=$data['subjects'];?></td>
                                            </tr>
                                          <?php endforeach; ?>
                                          <?php else: ?>
                                            <td colspan="2"><?php echo get_phrase('No Data Found'); ?></td>
                                          <?php endif; ?>
                                        </tbody>
                                      </table>
                                    </div>

                          </div> 
                      </div> 
                  </div> 
                <!-- Upcoming classes and subjects end-->
                 <!-- Class Subects start-->
                   <div class="col-lg-6">
                      <div class="card widget-flat" id = "class_subects">
                          <div class="card-body">
                              <div class="float-end">
                                  <i class="mdi mdi-account-multiple widget-icon"></i>
                              </div>
                              <h5 class="text-muted font-weight-normal mt-0" title="Class Subects"> <i class="mdi mdi-book-multiple title_icon"></i> <?php echo get_phrase('Class Subects'); ?> <a href="<?php echo route('class'); ?>" style="color: #6c757d; display: none;" id = "class_sub_list"><i class = "mdi mdi-export"></i></a></h5>
                              <h3 class="mt-3 mb-3">
                                 
                              </h3>
                                 <?php 
                                       $this->db->select('c.id as class_id, c.name as class_name, GROUP_CONCAT(s.name SEPARATOR " , ") as subjects');
                                       $this->db->from('classes c');
                                       $this->db->join('subjects s', 's.class_id = c.id', 'left');
                                       $this->db->where('c.school_id', $school_id);
                                       $this->db->where('c.id', $teacher_permissions_data['class_id']);
                                       $this->db->group_by('c.id, c.name');
                                       $check_data=$this->db->get()->result_array();


                                   ?>
                                   <div class="table-responsive-sm">
                                    <table class="table table-striped table-centered table-bordered mb-0 table-responsive">
                                      <thead>
                                        <tr>
                                          <th width = "60%"><?php echo get_phrase('Class') ;?></th>
                                          <th width = "60%"><?php echo get_phrase('subject') ;?></th>

                                        </tr>
                                      </thead>
                                      <tbody>
                                          <?php if (count($check_data) > 0): ?>
                                          <?php foreach ($check_data as $data): 
                                           ?>
                                            <tr>
                                              <td>
                                                <?=$data['class_name'];?>
                                               </td>
                                               <td><?=$data['subjects'];?></td>
                                            </tr>
                                          <?php endforeach; ?>
                                          <?php else: ?>
                                            <td colspan="2"><?php echo get_phrase('No Data Found'); ?></td>
                                          <?php endif; ?>
                                      
                                        </tbody>
                                      </table>
                                    </div>

                          </div> 
                      </div> 
                  </div>
                  <!-- Class Subects end-->

              </div>
            </div> <!-- end col -->

            <div class="col-xl-4">
                <div class="card bg-primary">
                    <div class="card-body">
                        <h4 class="header-title text-white mb-2"><?php echo get_phrase('todays_attendance'); ?></h4>
                        <div class="text-center">
                            <h3 class="font-weight-normal text-white mb-2">
                                <?php 

                                    $students_attendence=$this->db->get_where('daily_attendances',['class_id'=>$teacher_permissions_data['class_id'],'school_id'=>$school_id,'status'=>1,'timestamp' => strtotime(date('Y-m-d'))])->num_rows();
                                       if(isset($students_attendence) && $students_attendence != ''){
                                           echo $students_attendence;
                                        }
                                ?>
                            </h3>
                            <p class="text-light text-uppercase font-13 font-weight-bold">
                              <?php 
                                  if(isset($students_attendence) && $students_attendence != ''){
                                           echo $students_attendence;
                                  }
                              ?>
                             <?php echo get_phrase('students_are_attending_today'); ?></p>
                        </div>
                    </div>
                </div>
                <?php 
                     if(isset($teacher_permissions_data['online_exam']) && $teacher_permissions_data['online_exam'] == '1'){

                ?>
                <div class="card">
                    <div class="card-body">
                              <h5 class="text-muted font-weight-normal mt-0" title="Exam Schedule"> <i class="mdi mdi-book-clock title_icon"></i>  <?php echo get_phrase('Exam Schedule'); ?> <a href="<?php echo route('exam'); ?>" style="color: #6c757d; display: none;" id = "exam_list"><i class = "mdi mdi-export"></i></a></h5>
                              <h3 class="mt-3 mb-3">
                                  <?php
                                      $this->db->select('oed.*');
                                      $this->db->from('online_exam_details oed');
                                      $this->db->where('NOT EXISTS (
                                        SELECT oer.exam_status 
                                        FROM online_exam_result oer 
                                        WHERE oer.exam_id = oed.id
                                      )');
                                      $check_data = $this->db->get()->result_array();
                                  ?>
                              </h3>
                              <div class="table-responsive-sm">
                                    <table class="table table-striped table-centered table-bordered mb-0 table-responsive">
                                      <thead>
                                        <tr>
                                          <th width = "60%"><?php echo get_phrase('exam_name') ;?></th>
                                          <th width = "60%"><?php echo get_phrase('starting_date') ;?></th>
                                          <th width = "60%"><?php echo get_phrase('exam_time') ;?></th>
                                          
                                        </tr>
                                      </thead>
                                      <tbody>
                                          <?php if (count($check_data) > 0): ?>
                                          <?php foreach ($check_data as $data): 
                                           ?>
                                            <tr>
                                              <td>
                                                <?=$data['online_exam_name'];?>
                                               </td>
                                               <td><?=$data['exam_start_date'];?></td>
                                               <td>Time: <?php echo $data['exam_start_time'].$data['exam_start_am_pm']."-".$data['exam_end_time'].$data['exam_end_am_pm']; ?></td>

                                            </tr>
                                          <?php endforeach; ?>
                                          <?php else: ?>
                                            <td colspan="3"><?php echo get_phrase('No Data Found'); ?></td>
                                          <?php endif; ?>
                                      
                                        </tbody>
                                      </table>
                                    </div>

                              <p class="mb-0 text-muted">
                                  <span class="text-nowrap"><?php echo get_phrase('Exam Schedule'); ?></span>
                              </p>
                          
                    </div>
                </div>
                 <?php } ?>
            </div>
        </div>
    </div><!-- end col-->
</div>

<script>
$(document).ready(function() {
    initDataTable("expense-datatable");
});
</script>
