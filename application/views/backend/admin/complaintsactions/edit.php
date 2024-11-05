<!--title-->
<style>
    .title_icon {
        font-size: 1.5rem;
        color: #ff7580;
        vertical-align: middle;
    }

    .page-title {
        font-size: 20px;
        font-weight: 700;
        color: #ff7580;
        line-height: 1.5;
    }

    .admissionbox {
        box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
        background: #ffdfe8;
    }

    .inspiring-line {
        font-size: 16px;
        font-weight: 600;
        color: #2c2c2c !important;
    }

    /* General styling for the navigation menu */
    .custom-nav-menu {
        display: flex;
        justify-content: space-around;
        background-color: #eeeeee;
        /* Light background color */
        border-radius: 5px;
        padding: 0.5rem 0;
        margin-bottom: 1rem;
        list-style-type: none;
    }

    .custom-nav-menu .nav-item {
        flex: 1;
    }

    .custom-nav-menu .nav-link {
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 0.5rem 1rem;
        text-align: center;
        background: #fff;
        border: 1px solid #d9d9d9;
        margin-left: 10px;
        margin-right: 10px;
        color: #333;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s, color 0.3s;
    }

    .custom-nav-menu .nav-link .icon {
        font-size: 1.25rem;
        /* Adjust icon size */
        margin-right: 0.5rem;
    }

    .custom-nav-menu .nav-link .text {
        font-size: 0.875rem;
        /* Adjust text size */
    }

    .custom-nav-menu .nav-link.active,
    .custom-nav-menu .nav-link:hover {
        background-color: #007bff;
        /* Highlight color for active and hover state */
        color: #fff;
    }

    .custom-nav-menu .nav-link.active .icon,
    .custom-nav-menu .nav-link:hover .icon {
        color: #fff;
    }
</style>

<div class="row">
    <div class="col-xl-12">
        <div class="card admissionbox">
            <div class="card-body py-2 d-flex flex-column align-items-start">
                <div class="d-flex align-items-center">
                    <i class="mdi mdi-account-multiple-plus title_icon"></i>
                    <h4 class="page-title ms-2">
                        <?php echo get_phrase('complaint_edit_form'); ?>
                    </h4>
                </div>
                <!-- <p class="inspiring-line">
                    Guiding every step towards a brighter and more successful future.
                </p> -->
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>


<div class="row">
    <div class="col-12">
        <div class="card pt-0">
        <?php $school_id = school_id(); ?>
        <?php $complaint_data = $this->db->get_where('complaint', array('id' => $param2))->result_array(); ?>
        <?php foreach($complaint_data as $complaint){ ?>
        <form method="POST" class="d-block ajaxForm" action="<?php echo route('complaintsactions/update/'.$param2); ?>">
        <div class="form-row">
          <div class="form-group mb-1">
            <label for="class"><?php echo get_phrase('class'); ?></label>
            <select name="class_id" id="class_id_on_create" class="form-control select2"  data-bs-toggle="select2" onchange="classWiseSection(this.value)" required>
                <option value=""><?php echo get_phrase('select_a_class'); ?></option>
                    <?php
                       $allclasses = $this->db->get_where('classes', array('school_id' => $school_id))->result_array();
                        foreach($allclasses as $class){
                    ?>
                        <option value="<?php echo $class['id']; ?>" <?php if($class['id'] == $complaint['class_id']){ echo 'selected'; } ?>><?php echo $class['name']; ?></option>
                    <?php } ?>
            </select>
            <small id="class_help" class="form-text text-muted"><?php echo get_phrase('select_a_class'); ?></small>
        </div>

        <div class="form-group mb-1">
          <label for=""><?php echo get_phrase('section'); ?></label>
               <select name="section_id" id="section_id" class="form-control select9" data-toggle = "select9" required >
                <option value=""><?php echo get_phrase('select_section'); ?></option>
                <?php
                       $allsections = $this->db->get_where('sections', array('class_id' => $complaint['class_id']))->result_array();
                        foreach($allsections as $sections){
                    ?>
                        <option value="<?php echo $sections['id']; ?>" <?php if($sections['id'] == $complaint['section_id']){ echo 'selected'; } ?>><?php echo $sections['name']; ?></option>
                    <?php } ?>
              </select>        
       </div>
        <div class="form-group mb-1">
            <label for="class"><?php echo get_phrase('student'); ?></label>
            <select name="student_id" id="student_id" class="form-control select4" data-bs-toggle="select4" required>
                <option value=""><?php echo get_phrase('select_a_student'); ?></option>
                    <?php
                        $allstudents = $this->db->get_where('users', array('id'=>$complaint['student_id'],'role'=>'student','school_id' => $school_id))->result_array();
                        foreach($allstudents as $student){
                    ?>
                        <option value="<?php echo $student['id']; ?>" <?php if($student['id'] == $complaint['student_id']){ echo 'selected'; } ?>><?php echo $student['name']; ?></option>
                    <?php } ?>
            </select>
            <small id="class_help" class="form-text text-muted"><?php echo get_phrase('select_a_student'); ?></small>
        </div>
        <div class="form-group mb-1">
          <label for=""><?php echo get_phrase('class teacher'); ?></label>
          <select name="teacher_id" id="teacher_id" class="form-control select5" data-toggle = "select5" required>
            <option value=""><?php echo get_phrase('select_a_teacher'); ?></option>
            <?php $allteachers = $this->db->get_where('users', array('role'=>'teacher','school_id' => $school_id))->result_array(); ?>
            <?php foreach($allteachers as $teachers){ ?>
                <option value="<?php echo $teachers['id']; ?>" <?php if($teachers['id'] == $complaint['teacher_id']){ echo 'selected'; } ?>><?php echo $teachers['name']; ?></option>
            <?php } ?>
        </select>
        <small id="class_help" class="form-text text-muted"><?php echo get_phrase('select_a_teacher'); ?></small>
      </div>
            <!-- <div class="form-group mb-1">
            <label for=""><?php //echo get_phrase('type'); ?></label>
            <select name="complaint_type" id="complaint_type" class="form-control select10" data-toggle = "select10"  required>
                <option value=""><?php echo get_phrase('select_a_type'); ?></option>
                <option value="1">Major</option>
                <option value="2">Minor</option>
            </select>
                <small id="class_help" class="form-text text-muted"><?php echo get_phrase('select_a_type'); ?></small>
            </div> -->

            <!-- Problem Behavior Minor Section -->
             <?php 
             $minorProblem = !empty($complaint['minor_problem']) ? explode(",",$complaint['minor_problem']) : []; 
             $majorProblem = !empty($complaint['major_problem']) ? explode(",",$complaint['major_problem']) : []; 
             ?>
        <div class="form-group mb-3">
            <label><strong>Problem Behavior Minor:</strong></label>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="behavior_minor[]" value="Inappropriate Language" id="minor_inappropriate_language" <?php echo in_array("Inappropriate Language", $minorProblem) ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="minor_inappropriate_language">Inappropriate Language</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="behavior_minor[]" value="Disruption" id="minor_disruption" <?php echo in_array("Disruption", $minorProblem) ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="minor_disruption">Disruption</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="behavior_minor[]" value="Other" id="minor_other" <?php echo in_array("Other", $minorProblem) ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="minor_other">Other</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="behavior_minor[]" value="Physical Contact" id="minor_physical_contact" <?php echo in_array("Physical Contact", $minorProblem) ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="minor_physical_contact">Physical Contact</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="behavior_minor[]" value="Property Misuse" id="minor_property_misuse" <?php echo in_array("Property Misuse", $minorProblem) ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="minor_property_misuse">Property Misuse</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="behavior_minor[]" value="Defiant/Disrespectful/Non-Compliant" id="minor_defiant" <?php echo in_array("Defiant/Disrespectful/Non-Compliant", $minorProblem) ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="minor_defiant">Defiant/Disrespectful/Non-Compliant</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="behavior_minor[]" value="Dress Code" id="minor_dress_code" <?php echo in_array("Dress Code", $minorProblem) ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="minor_dress_code">Dress Code</label>
                    </div>
                </div>
            </div>
        </div>

        <!-- Problem Behavior Major Section -->
        <div class="form-group mb-3">
            <label><strong>Problem Behavior Major:</strong></label>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="behavior_major[]" value="Abusive/Inappropriate Lang" id="major_abusive_language" <?php echo in_array("Abusive/Inappropriate Lang", $majorProblem) ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="major_abusive_language">Abusive/Inappropriate Lang</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="behavior_major[]" value="Fighting/Physical Aggression" id="major_fighting_aggression" <?php echo in_array("Fighting/Physical Aggression", $majorProblem) ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="major_fighting_aggression">Fighting/Physical Aggression</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="behavior_major[]" value="Forgery/Theft" id="major_forgery_theft" <?php echo in_array("Forgery/Theft", $majorProblem) ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="major_forgery_theft">Forgery/Theft</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="behavior_major[]" value="Dress Code Violation" id="major_dress_code_violation" <?php echo in_array("Dress Code Violation", $majorProblem) ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="major_dress_code_violation">Dress Code Violation</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="behavior_major[]" value="Bomb Threat" id="major_bomb_threat" <?php echo in_array("Bomb Threat", $majorProblem) ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="major_bomb_threat">Bomb Threat</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="behavior_major[]" value="Arson" id="major_arson" <?php echo in_array("Arson", $majorProblem) ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="major_arson">Arson</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="behavior_major[]" value="Weapons" id="major_weapons" <?php echo in_array("Weapons", $majorProblem) ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="major_weapons">Weapons</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="behavior_major[]" value="Drug usage/possession" id="major_drug_possession" <?php echo in_array("Drug usage/possession", $majorProblem) ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="major_drug_possession">Drug usage/possession</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="behavior_major[]" value="Skip Class/Truancy/AWOL" id="major_skip_awol" <?php echo in_array("Skip Class/Truancy/AWOL", $majorProblem) ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="major_skip_awol">Skip Class/Truancy/AWOL</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="behavior_major[]" value="Property Damage" id="major_property_damage" <?php echo in_array("Property Damage", $majorProblem) ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="major_property_damage">Property Damage</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="behavior_major[]" value="Combustibles" id="major_combustibles" <?php echo in_array("Combustibles", $majorProblem) ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="major_combustibles">Combustibles</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="behavior_major[]" value="Vandalism" id="major_vandalism" <?php echo in_array("Vandalism", $majorProblem) ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="major_vandalism">Vandalism</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="behavior_major[]" value="Harassment/Bullying" id="major_harassment" <?php echo in_array("Harassment/Bullying", $majorProblem) ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="major_harassment">Harassment/Bullying</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="behavior_major[]" value="Disruption" id="major_disruption" <?php echo in_array("Disruption", $majorProblem) ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="major_disruption">Disruption</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="behavior_major[]" value="Tardy" id="major_tardy" <?php echo in_array("Tardy", $majorProblem) ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="major_tardy">Tardy</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="behavior_major[]" value="Drug sales/distribution" id="major_drug_sales" <?php echo in_array("Drug sales/distribution", $majorProblem) ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="major_drug_sales">Drug sales/distribution</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="behavior_major[]" value="Alcohol" id="major_alcohol" <?php echo in_array("Alcohol", $majorProblem) ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="major_alcohol">Alcohol</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="behavior_major[]" value="Defiant/Disrespectful/Insubordinate/Non-Compliant" id="major_disrespectful" <?php echo in_array("Defiant/Disrespectful/Insubordinate/Non-Compliant", $majorProblem) ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="major_disrespectful">Defiant/Disrespectful/Insubordinate/Non-Compliant</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="behavior_major[]" value="Lying/Cheating" id="major_lying" <?php echo in_array("Lying/Cheating", $majorProblem) ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="major_lying">Lying/Cheating</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="behavior_major[]" value="Technology Violation" id="major_technology_violation" <?php echo in_array("Technology Violation", $majorProblem) ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="major_technology_violation">Technology Violation</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="behavior_major[]" value="Inappropriate Affection" id="major_inappropriate_affection" <?php echo in_array("Inappropriate Affection", $majorProblem) ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="major_inappropriate_affection">Inappropriate Affection</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="behavior_major[]" value="Inappropriate Location" id="major_inappropriate_location" <?php echo in_array("Inappropriate Location", $majorProblem) ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="major_inappropriate_location">Inappropriate Location</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="behavior_major[]" value="Tobacco" id="major_tobacco" <?php echo in_array("Tobacco", $majorProblem) ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="major_tobacco">Tobacco</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="behavior_major[]" value="Other Behavior" id="major_other_behavior" <?php echo in_array("Other Behavior", $majorProblem) ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="major_other_behavior">Other Behavior</label>
                    </div>
                </div>
            </div>
        </div>
            
            <div class="form-group mb-1">
          <label for="name">Complaint By</label>
          <input type="text" class="form-control" id="complaint_by" name="complaint_by"  value="<?=$complaint['complaint_by']?>" required>
      </div>
      <div class="form-group mb-1">
          <label for="name">Complaint Date</label>
          <input type="date" class="form-control" id="complaint_date" name="complaint_date" value="<?=$complaint['complaint_date']?>" required>
      </div>
      <div class="form-group mb-1">
          <label for="name">Complaint Description</label>
          <textarea class="form-control" id="example-textarea" rows="5" name = "desc" required><?=$complaint['complaint_desc']?></textarea>
      </div>
      <div class="form-group mb-1">
          <label for="name">Status</label>
          <input type="radio" id="active" name="status" value="1" <?php if($complaint['status'] == '1'){ echo 'checked'; } ?>>Active
          <input type="radio" id="inactive" name="status" value="0" <?php if($complaint['status'] == '0'){ echo 'checked'; } ?>>Inactive

      </div>
            
        
            <div class="form-group  col-md-12">
            <button class="btn btn-block btn-primary" type="submit"><?php echo get_phrase('update_complaint'); ?></button>
            </div>
        </div>
        </form>
        <?php } ?>
        </div>
    </div>
</div>


<script>
$(document).ready(function() {
 $(".ajaxForm").validate({}); // Jquery form validation initialization
$(".ajaxForm").submit(function(e) {
  var form = $(this);
  var baseUrl = "<?php echo base_url(); ?>";
  var type = "admin";
  ajaxSubmit(e, form, showAllComplaint, baseUrl, type);
});

});


</script>