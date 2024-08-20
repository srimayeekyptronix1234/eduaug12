
<?php 
$user_id = $this->session->userdata('user_id');
$student_table_data=$this->db->get_where('students',['user_id'=>$user_id])->row_array();
$enrols_table_data=$this->db->get_where('enrols',['student_id'=>$student_table_data['id']])->row_array();
$current_session_teachers = $this->user_model->get_total_data($enrols_table_data['class_id']);
$school_id  = school_id();
?>
<table id="basic-datatable" class="table table-striped dt-responsive nowrap" width="100%">
    <thead>
        <tr>
            <th><?php echo  get_phrase('saturday') ; ?></th>
            <th><?php echo  get_phrase('sunday') ; ?></th>
            <th><?php echo  get_phrase('monday') ; ?></th>
            <th><?php echo  get_phrase('tuesday') ; ?></th>
            <th><?php echo  get_phrase('wednesday') ; ?></th>
            <th><?php echo  get_phrase('thursday') ; ?></th>
            <th><?php echo  get_phrase('friday'); ?> </th>
        </tr>
    </thead>
    <tbody>
         <tr>
            <?php
               $satureday_routines = $this->db->get_where('routines', array('class_id' => $enrols_table_data['class_id'], 'section_id' => $enrols_table_data['section_id'], 'session_id' => active_session(), 'day' => 'saturday'))->result_array();
                 foreach($satureday_routines as $satureday_routine){
            ?>
            <td>
                <p style="margin-bottom: 0px;"><i class="mdi mdi-book-open-variant"></i>
                  <?php echo $this->db->get_where('subjects', array('id' => $satureday_routine['subject_id']))->row('name'); ?>
              </p>
              <p style="margin-bottom: 0px;"><i class="mdi mdi-clock"></i>
                  <?php echo $satureday_routine['starting_hour'].':'.$satureday_routine['starting_minute'].' - '.$satureday_routine['ending_hour'].':'.$satureday_routine['ending_minute']; ?>
              </p>
              <p style="margin-bottom: 0px;"><i class="mdi mdi-account"></i>
                  <?php echo $this->user_model->get_user_details($this->db->get_where('teachers', array('id' => $satureday_routine['teacher_id']))->row('user_id'), 'name'); ?>
              </p>
              <p style="margin-bottom: 0px;"><i class="mdi mdi-home-automation"></i>
                  <?php echo $this->db->get_where('class_rooms', array('id' => $satureday_routine['room_id']))->row('name'); ?>
              </p>

            </td>
            <?php } ?>
             <?php
                $sunday_routines = $this->db->get_where('routines', array('class_id' => $enrols_table_data['class_id'], 'section_id' => $enrols_table_data['section_id'], 'session_id' => active_session(), 'day' => 'sunday'))->result_array();
                 foreach($sunday_routines as $sunday_routine){
            ?>
            <td>
               <p style="margin-bottom: 0px;"><i class="mdi mdi-book-open-variant"></i>
                  <?php echo $this->db->get_where('subjects', array('id' => $sunday_routine['subject_id']))->row('name'); ?>
              </p>
              <p style="margin-bottom: 0px;"><i class="mdi mdi-clock"></i>
                  <?php echo $sunday_routine['starting_hour'].':'.$sunday_routine['starting_minute'].' - '.$sunday_routine['ending_hour'].':'.$sunday_routine['ending_minute']; ?>
              </p>
              <p style="margin-bottom: 0px;"><i class="mdi mdi-account"></i>
                  <?php echo $this->user_model->get_user_details($this->db->get_where('teachers', array('id' => $sunday_routine['teacher_id']))->row('user_id'), 'name'); ?>
              </p>
              <p style="margin-bottom: 0px;"><i class="mdi mdi-home-automation"></i>
                  <?php echo $this->db->get_where('class_rooms', array('id' => $sunday_routine['room_id']))->row('name'); ?>
              </p>

            </td>
            <?php } ?>
            <?php
                $monday_routines = $this->db->get_where('routines', array('class_id' => $enrols_table_data['class_id'], 'section_id' => $enrols_table_data['section_id'], 'session_id' => active_session(), 'day' => 'monday'))->result_array();
                foreach($monday_routines as $monday_routine){
            ?>
                        
            <td>
              <p style="margin-bottom: 0px;"><i class="mdi mdi-book-open-variant"></i>
                  <?php echo $this->db->get_where('subjects', array('id' => $monday_routine['subject_id']))->row('name'); ?>
              </p>
              <p style="margin-bottom: 0px;"><i class="mdi mdi-clock"></i>
                  <?php echo $monday_routine['starting_hour'].':'.$monday_routine['starting_minute'].' - '.$monday_routine['ending_hour'].':'.$monday_routine['ending_minute']; ?>
              </p>
              <p style="margin-bottom: 0px;"><i class="mdi mdi-account"></i>
                  <?php echo $this->user_model->get_user_details($this->db->get_where('teachers', array('id' => $monday_routine['teacher_id']))->row('user_id'), 'name'); ?>
              </p>
              <p style="margin-bottom: 0px;"><i class="mdi mdi-home-automation"></i>
                  <?php echo $this->db->get_where('class_rooms', array('id' => $monday_routine['room_id']))->row('name'); ?>
              </p>

            </td>
            <?php } ?>
            <?php
                $tuesday_routines = $this->db->get_where('routines', array('class_id' => $enrols_table_data['class_id'], 'section_id' => $enrols_table_data['section_id'], 'session_id' => active_session(), 'day' => 'tuesday'))->result_array();
                foreach($tuesday_routines as $tuesday_routine){
             ?>
                        
            <td>
              <p style="margin-bottom: 0px;"><i class="mdi mdi-book-open-variant"></i>
                  <?php echo $this->db->get_where('subjects', array('id' => $tuesday_routine['subject_id']))->row('name'); ?>
              </p>
              <p style="margin-bottom: 0px;"><i class="mdi mdi-clock"></i>
                  <?php echo $tuesday_routine['starting_hour'].':'.$tuesday_routine['starting_minute'].' - '.$tuesday_routine['ending_hour'].':'.$tuesday_routine['ending_minute']; ?>
              </p>
              <p style="margin-bottom: 0px;"><i class="mdi mdi-account"></i>
                  <?php echo $this->user_model->get_user_details($this->db->get_where('teachers', array('id' => $tuesday_routine['teacher_id']))->row('user_id'), 'name'); ?>
              </p>
              <p style="margin-bottom: 0px;"><i class="mdi mdi-home-automation"></i>
                  <?php echo $this->db->get_where('class_rooms', array('id' => $tuesday_routine['room_id']))->row('name'); ?>
              </p>

            </td>
             <?php } ?>
              <?php
                $wednesday_routines = $this->db->get_where('routines', array('class_id' => $enrols_table_data['class_id'], 'section_id' => $enrols_table_data['section_id'], 'session_id' => active_session(), 'day' => 'wednesday'))->result_array();
                 foreach($wednesday_routines as $wednesday_routine){
             ?>
                       
            <td>
               <p style="margin-bottom: 0px;"><i class="mdi mdi-book-open-variant"></i>
                  <?php echo $this->db->get_where('subjects', array('id' => $wednesday_routine['subject_id']))->row('name'); ?>
              </p>
              <p style="margin-bottom: 0px;"><i class="mdi mdi-clock"></i>
                  <?php echo $wednesday_routine['starting_hour'].':'.$wednesday_routine['starting_minute'].' - '.$wednesday_routine['ending_hour'].':'.$wednesday_routine['ending_minute']; ?>
              </p>
              <p style="margin-bottom: 0px;"><i class="mdi mdi-account"></i>
                  <?php echo $this->user_model->get_user_details($this->db->get_where('teachers', array('id' => $wednesday_routine['teacher_id']))->row('user_id'), 'name'); ?>
              </p>
              <p style="margin-bottom: 0px;"><i class="mdi mdi-home-automation"></i>
                  <?php echo $this->db->get_where('class_rooms', array('id' => $wednesday_routine['room_id']))->row('name'); ?>
              </p>

            </td>
            <?php } ?>
            <?php
                $thursday_routines = $this->db->get_where('routines', array('class_id' => $enrols_table_data['class_id'], 'section_id' => $enrols_table_data['section_id'], 'session_id' => active_session(), 'day' => 'thursday'))->result_array();
                 foreach($thursday_routines as $thursday_routine){
            ?>
                       
            <td>
               <p style="margin-bottom: 0px;"><i class="mdi mdi-book-open-variant"></i>
                  <?php echo $this->db->get_where('subjects', array('id' => $thursday_routine['subject_id']))->row('name'); ?>
              </p>
              <p style="margin-bottom: 0px;"><i class="mdi mdi-clock"></i>
                  <?php echo $thursday_routine['starting_hour'].':'.$thursday_routine['starting_minute'].' - '.$thursday_routine['ending_hour'].':'.$thursday_routine['ending_minute']; ?>
              </p>
              <p style="margin-bottom: 0px;"><i class="mdi mdi-account"></i>
                  <?php echo $this->user_model->get_user_details($this->db->get_where('teachers', array('id' => $thursday_routine['teacher_id']))->row('user_id'), 'name'); ?>
              </p>
              <p style="margin-bottom: 0px;"><i class="mdi mdi-home-automation"></i>
                  <?php echo $this->db->get_where('class_rooms', array('id' => $thursday_routine['room_id']))->row('name'); ?>
              </p>

            </td>
            <?php } ?>
            <?php
                $friday_routines = $this->db->get_where('routines', array('class_id' => $enrols_table_data['class_id'], 'section_id' => $enrols_table_data['section_id'], 'session_id' => active_session(), 'day' => 'friday'))->result_array();
                foreach($friday_routines as $friday_routine){
            ?>
            <td>
                <p style="margin-bottom: 0px;"><i class="mdi mdi-book-open-variant"></i>
                  <?php echo $this->db->get_where('subjects', array('id' => $friday_routine['subject_id']))->row('name'); ?>
              </p>
              <p style="margin-bottom: 0px;"><i class="mdi mdi-clock"></i>
                  <?php echo $friday_routine['starting_hour'].':'.$friday_routine['starting_minute'].' - '.$friday_routine['ending_hour'].':'.$friday_routine['ending_minute']; ?>
              </p>
              <p style="margin-bottom: 0px;"><i class="mdi mdi-account"></i>
                  <?php echo $this->user_model->get_user_details($this->db->get_where('teachers', array('id' => $friday_routine['teacher_id']))->row('user_id'), 'name'); ?>
              </p>
              <p style="margin-bottom: 0px;"><i class="mdi mdi-home-automation"></i>
                  <?php echo $this->db->get_where('class_rooms', array('id' => $friday_routine['room_id']))->row('name'); ?>
              </p>

           </td>
            <?php } ?>           
        </tr>
</tbody>
</table>
