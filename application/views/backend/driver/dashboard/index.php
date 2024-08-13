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
            <div class="col-xl-12">
              <div class="row">
                  <div class="col-lg-4">
                      <div class="card widget-flat" id="student" style="on">
                          <div class="card-body">
                              <div class="float-end">
                                  <i class="mdi mdi-account-multiple widget-icon"></i>
                              </div>
                              <h5 class="text-muted font-weight-normal mt-0" title="Number of Student"> <i class="mdi mdi-account-group title_icon"></i>  <?php echo get_phrase('students'); ?> <a href="<?php echo route('student'); ?>" style="color: #6c757d; display: none;" id = "student_list"><i class = "mdi mdi-export"></i></a></h5>
                              <h3 class="mt-3 mb-3">
                                  <?php
                                      $current_session_students = $this->user_model->get_transport_details('student');
                                       if(isset($current_session_students) && $current_session_students != ''){
                                          echo $current_session_students->num_rows();
                                       }
                                  ?>
                              </h3>
                              <p class="mb-0 text-muted">
                                  <span class="text-nowrap"><?php echo get_phrase('total_number_of_student'); ?></span>
                              </p>
                          </div> 
                      </div> 
                  </div>

                  <div class="col-lg-4">
                      <div class="card widget-flat" id="teacher" style="on">
                          <div class="card-body">
                              <div class="float-end">
                                  <i class="mdi mdi-account-multiple widget-icon"></i>
                              </div>
                              <h5 class="text-muted font-weight-normal mt-0" title="Number of Teacher"> <i class="mdi mdi-account-group title_icon"></i><?php echo get_phrase('teacher'); ?>  <a href="<?php echo route('teacher'); ?>" style="color: #6c757d; display: none;" id = "teacher_list"><i class = "mdi mdi-export"></i></a></h5>
                              <h3 class="mt-3 mb-3">
                                  <?php
                                      $teachers = $this->user_model->get_transport_details('teacher');
                                      if(isset($teachers) && $teachers != ''){
                                        echo $teachers->num_rows();
                                      }
                                   ?>
                              </h3>
                              <p class="mb-0 text-muted">
                                  <span class="text-nowrap"><?php echo get_phrase('total_number_of_teacher'); ?></span>
                              </p>
                          </div> 
                      </div> 
                  </div> 
                   <div class="col-lg-4">
                      <div class="card widget-flat" id="route" style="on">
                          <div class="card-body">
                              <div class="float-end">
                                  <i class="mdi mdi-account-multiple widget-icon"></i>
                              </div>
                              <h5 class="text-muted font-weight-normal mt-0" title="Route"> <i class="mdi mdi-account-group title_icon"></i><?php echo get_phrase('route'); ?>  <a href="<?php echo route('route'); ?>" style="color: #6c757d; display: none;" id = "route_list"><i class = "mdi mdi-export"></i></a></h5>
                                  <?php
                                      $driver_data = $this->user_model->get_logged_in_driver_details(); 
                                      $check_data = $this->db->get_where('routes',['id'=>$driver_data['route_id']])->result_array();
                                   ?>
                                   <div class="table-responsive-sm">
                                    <table class="table table-striped table-centered table-bordered mb-0 table-responsive">
                                      <thead>
                                        <tr>
                                          <th width = "60%"><?php echo get_phrase('Route Title') ;?></th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        <?php if (count($check_data) > 0): ?>
                                          <?php foreach ($check_data as $data): ?>
                                            <tr>
                                              <td>
                                                <?=$data['route_title'];?>
                                               </td>
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
                 
              </div> 
            </div> <!-- end col -->
            <div class="col-xl-4">
               
                <div class="card">
                </div>
            </div>
        </div>
    </div><!-- end col-->
</div>

