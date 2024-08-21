<?php 
$parent_id = $this->session->userdata('user_id');
$school_id  = school_id();
$parent_data = $this->db->get_where('parents', array('user_id' => $parent_id))->row_array();

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
                      <div class="card widget-flat" id="complaints" style="on">
                          <div class="card-body">
                              <div class="float-end">
                                  <i class="mdi mdi-account-multiple widget-icon"></i>
                              </div>
                              <h5 class="text-muted font-weight-normal mt-0" title="Active Complaints Count"> <i class="mdi mdi-account-group title_icon"></i>  <?php echo get_phrase('Active Complaints'); ?> <a href="" style="color: #6c757d; display: none;" id = "complaint_list"><i class = "mdi mdi-export"></i></a></h5>
                              <h3 class="mt-3 mb-3">
                                  <?php
                                       $this->db->select('c.*');
                                       $this->db->from('students s');
                                       $this->db->join('complaint c', 'c.student_id = s.user_id');
                                       $this->db->where('s.parent_id', $parent_data['id']);
                                       $this->db->where('c.status','1');
                                       $total_active_complaints=$this->db->get()->num_rows();

                                      if(isset($total_active_complaints) && $total_active_complaints != ''){
                                           echo $total_active_complaints;

                                      }
                                    
                                  ?>
                              </h3>
                              <p class="mb-0 text-muted">
                                  <span class="text-nowrap"><?php echo get_phrase('Active Complaints'); ?></span>
                              </p>
                          </div> 
                      </div> 
                  </div> 

                  <div class="col-lg-6">
                      <div class="card widget-flat" id="homework" style="on">
                          <div class="card-body">
                              <div class="float-end">
                                  <i class="mdi mdi-account-multiple widget-icon"></i>
                              </div>
                              <h5 class="text-muted font-weight-normal mt-0" title="Homework"> <i class="mdi mdi-account-group title_icon"></i><?php echo get_phrase('Homework'); ?>  <a href="" style="color: #6c757d; display: none;" id = "academic_progress"><i class = "mdi mdi-export"></i></a></h5>
                              <h3 class="mt-3 mb-3">
                                  <?php
                                       $this->db->select('h.*');
                                       $this->db->from('students s');
                                       $this->db->join('homework h', 'h.student_id = s.id');
                                       $this->db->where('s.parent_id', $parent_data['id']);
                                       $total_homework=$this->db->get()->num_rows();

                                      if(isset($total_homework) && $total_homework != ''){
                                           echo $total_homework;

                                      }
                                    
                                  ?>
                               </h3>

                              <p class="mb-0 text-muted">
                                  <span class="text-nowrap"><?php echo get_phrase('Homework'); ?></span>
                              </p>
                          </div> 
                      </div> 
                  </div> 
              </div> 
              <div class="row">
                 <!-- <div class="col-lg-6">
                      <div class="card widget-flat" id = "parent">
                          <div class="card-body">
                              <div class="float-end">
                                  <i class="mdi mdi-account-multiple widget-icon"></i>
                              </div>
                              <h5 class="text-muted font-weight-normal mt-0" title="Number of Parents"> <i class="mdi mdi-account-group title_icon"></i> <?php echo get_phrase('parents'); ?> <a href="<?php echo route('parent'); ?>" style="color: #6c757d; display: none;" id = "parent_list"><i class = "mdi mdi-export"></i></a></h5>
                              <h3 class="mt-3 mb-3">
                                  <?php
                                      $parents = $this->user_model->get_parents();
                                      echo $parents->num_rows();
                                   ?>
                              </h3>
                              <p class="mb-0 text-muted">
                                  <span class="text-nowrap"><?php echo get_phrase('total_number_of_parent'); ?></span>
                              </p>
                          </div> 
                      </div> 
                  </div> -->

                 <!-- <div class="col-lg-6">
                      <div class="card widget-flat">
                          <div class="card-body">
                              <div class="float-end">
                                  <i class="mdi mdi-account-multiple widget-icon"></i>
                              </div>
                              <h5 class="text-muted font-weight-normal mt-0" title="Number of Staff"> <i class="mdi mdi-account-group title_icon"></i> <?php echo get_phrase('staff'); ?></h5>
                              <h3 class="mt-3 mb-3">
                                  <?php
                                      $accountants = $this->user_model->get_accountants()->num_rows();
                                      $librarians = $this->user_model->get_librarians()->num_rows();
                                      echo $accountants + $librarians;

                                   ?>
                              </h3>
                              <p class="mb-0 text-muted">
                                  <span class="text-nowrap"><?php echo get_phrase('total_number_of_staff'); ?></span>
                              </p>
                          </div> 
                      </div> 
                  </div> -->
              </div>
            </div> <!-- end col -->
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title"><?php echo get_phrase('todays_attendance'); ?></h4>
                        <div class="text-center">
                            <h3 class="font-weight-normal mb-2">
                                <?php
                                       $this->db->select('da.*');
                                       $this->db->from('students s');
                                       $this->db->join('daily_attendances da', 'da.student_id = s.id');
                                       $this->db->where('s.parent_id', $parent_data['id']);
                                       $this->db->where('da.school_id', $school_id);
                                       $childs_attendances=$this->db->get()->num_rows();

                                      if(isset($childs_attendances) && $childs_attendances != ''){
                                           echo $childs_attendances;
                                      }
                                    
                                  ?>
                            </h3>
                            <p class="mb-0 text-muted">
                              <?php 
                                    if(isset($childs_attendances) && $childs_attendances != ''){
                                           echo $childs_attendances;} 
                              ?> <?php echo get_phrase('childs_are_attending_today'); ?></p>
                         
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title"><?php echo get_phrase('recent_events'); ?><a href="<?php echo route('event_calendar'); ?>" style="color: #6c757d;"><i class = "mdi mdi-export"></i></a></h4>
                        <?php include 'event.php'; ?>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- end col-->
</div>

<script>
$(document).ready(function() {
    initDataTable("expense-datatable");
});

$(".widget-flat").mouseenter(function() {
    var id = $(this).attr('id');
    $('#'+id+'_list').show();
}).mouseleave(function() {
    var id = $(this).attr('id');
    $('#'+id+'_list').hide();
});
</script>
