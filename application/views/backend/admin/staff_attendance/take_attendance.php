<?php $school_id = school_id();
      $role=array('student','parent','admin','superadmin');
 ?>
<form method="POST" class="d-block ajaxForm responsive_media_query" action="<?php echo route('staff_attendance/take_attendance'); ?>" style="min-width: 300px; max-width: 400px;">
    <div class="form-group row">
        <div class="col-md-12">
            <label for="date_on_taking_attendance"><?php echo get_phrase('date'); ?></label>
            <input type="text" class="form-control date" id="date_on_taking_attendance" data-bs-toggle="date-picker" data-single-date-picker="true" name = "date" value="" required>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-12">
            <label  for="role_on_taking_attendance"><?php echo get_phrase('staff'); ?></label>
            <select name="role" id="role_on_taking_attendance" class="form-control select2" data-bs-toggle="select2"  required>
                <option value=""><?php echo get_phrase('select_a_staff'); ?></option>
                <?php
                      $this->db->select('DISTINCT(u.role)');
                      $this->db->where_not_in('u.role',$role);
                      $all_users=$this->db->get('users u')->result_array();
                ?>
                <?php foreach($all_users as $users): ?>
                    <option value="<?php echo $users['role']; ?>"><?php echo $users['role']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>

 

    <div class="row" id = "staff_content" style="margin-left: 2px;">
    </div>

    <div class='row'>
        <div class="form-group col-md-12" id="showStaffDiv">
            <a class="btn btn-block btn-secondary" onclick="getStaffList()" style="color: #fff;" disabled><?php echo get_phrase('show_staff_list'); ?></a>
        </div>
    </div>
    <div class="form-group col-md-12 mt-4" id = "updateStaffAttendanceDiv" style="display: none;">
        <button class="btn w-100 btn-primary" type="submit"><?php echo get_phrase('update_attendance'); ?></button>
    </div>
</form>

<script>
    $(".ajaxForm").validate({}); // Jquery form validation initialization
    $(".ajaxForm").submit(function(e) {
        var form = $(this);
        ajaxSubmit(e, form, getDailyStaffAttendance);
    });

    $('document').ready(function(){
        $('select.select2:not(.normal)').each(function () { $(this).select2({ dropdownParent: '#right-modal' }); }); //initSelect2(['#class_id_on_taking_attendance', '#section_id_on_taking_attendance']);

        $('#date_on_taking_attendance').change(function(){
            $('#showStaffDiv').show();
            $('#updateStaffAttendanceDiv').hide();
            $('#staff_content').hide();
        });
        $('#role_on_taking_attendance').change(function(){
            $('#showStaffDiv').show();
            $('#updateStaffAttendanceDiv').hide();
            $('#staff_content').hide();
        });
    });

    $('#date_on_taking_attendance').daterangepicker();

    function getStaffList() {
        var date = $('#date_on_taking_attendance').val();
        var role = $('#role_on_taking_attendance').val();

        if(date != '' && role != ''){
            $.ajax({
                type : 'POST',
                data: {date : date, role : role},
                url : '<?php echo route('staff_attendance/staff/'); ?>',
                success : function(response) {
                    $('#staff_content').show();
                    $('#staff_content').html(response);
                    $('#showStaffDiv').hide();
                    $('#updateStaffAttendanceDiv').show();
                }
            });
        }else{
            toastr.error('<?php echo get_phrase('please_select_in_all_fields !'); ?>');
        }
    }
</script>
