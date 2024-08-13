<?php $school_id = school_id(); ?>
<style>
.newdesign.col-md-4 {
    float: left;
    padding: 0 4px;
}

.custom-button {
    background-color: yellow;
    border: none;
    color: black;
    font-size: 10px;
    padding: 10px 20px;
    cursor: pointer;
}
.custom-button:hover {
    background-color: #f7d100;
}
</style>    

<form method="POST" class="p-3 d-block ajaxForm" action="<?php echo route('student/create_single_student'); ?>" id="student_admission_form" enctype="multipart/form-data">
    
    <!------ New design Start(18/07/2024) ------>

    <h4 class="mb-3"><u>Student Information</u></h4>
            <div class="form-row">
                <div class="form-group newdesign col-md-4">
                    <label class="col-form-label" for="example-fileinput"><?php echo get_phrase('student_profile_image'); ?></label>
                    <div class="box" style="width: 250px;">
                        <div class="js--image-preview" style="background-image: url(<?php echo base_url('uploads/users/placeholder.jpg'); ?>); background-color: #F5F5F5;"></div>
                        <div class="upload-options">
                            <label for="student_image" class="btn"> <i class="mdi mdi-camera"></i> <?php echo get_phrase('upload_an_image'); ?> </label>
                            <input id="student_image" style="visibility:hidden;" type="file" class="image-upload" name="student_image" accept="image/*">
                        </div>
                    </div>
                </div>
                <div class="form-group newdesign col-md-4">
                    <label class="col-md-3 col-form-label" for="name"><?php echo get_phrase('name'); ?></label>
                    <input type="text" id="name" name="name" class="form-control" placeholder="name" required>
                </div>
                <div class="form-group newdesign col-md-4">
                    <label class="col-md-3 col-form-label" for="email"><?php echo get_phrase('email'); ?></label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="email" required>
                </div>
                <div class="form-group newdesign col-md-4">
                    <label class="col-form-label" for="password"><?php echo get_phrase('password'); ?></label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="password" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group newdesign col-md-4">
                    <label class="col-form-label" for="name"><?php echo get_phrase('last_registration'); ?></label>
                    <input type="text" id="last_registration_no" name="last_registration_no" class="form-control" placeholder="Registration No" required>
                </div>
                <div class="form-group newdesign col-md-4">
                    <label class="col-form-label" for="email"><?php echo get_phrase('mobile_no_for_sms/whatsapp'); ?></label>
                     <input type="text" id="phone" name="phone" class="form-control" placeholder="phone" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group newdesign col-md-4">
                    <label class="col-form-label" for="admission_date">Admission-Date</label>
                    <input type="text" class="form-control" data-provide="datepicker" data-date-autoclose="true" data-date-container="#datepicker4" name="admission_date"   value="<?php echo date('m/d/Y'); ?>" required>
                </div>
                <div class="form-group newdesign col-md-4">
                    <label class="col-form-label" for="class_id"><?php echo get_phrase('class'); ?></label>
                    <select name="class_id" id="class_id" class="form-control select2" data-toggle = "select2" required onchange="classWiseSection(this.value)">
                    <option value=""><?php echo get_phrase('select_a_class'); ?></option>
                    <?php $classes = $this->db->get_where('classes', array('school_id' => $school_id))->result_array(); ?>
                    <?php foreach($classes as $class){ ?>
                        <option value="<?php echo $class['id']; ?>"><?php echo $class['name']; ?></option>
                    <?php } ?>
                </select>
                </div>
                <div class="form-group newdesign col-md-4">
                    <label class="col-form-label" for="section_id"><?php echo get_phrase('section'); ?></label>
                    <select name="section_id" id="section_id" class="form-control select2" data-toggle = "select2" required >
                     <option value=""><?php echo get_phrase('select_section'); ?></option>
                    </select>
                </div>
            </div>
            <div clas="col-md-12"><p>&nbsp;</p></div>
            <h4 class="mb-3"><u>Other Information</u></h4>
            <div class="form-row">
                
                <div class="form-group newdesign col-md-4">
                    <label class="col-md-3 col-form-label" for="birthdatepicker"><?php echo get_phrase('birthday'); ?></label>
                    <div class="position-relative" id="datepicker4">
                        <input type="text" class="form-control" data-provide="datepicker" data-date-autoclose="true" data-date-container="#datepicker4" name="birthday"   value="<?php echo date('m/d/Y'); ?>">
                    </div>
                </div>
                <div class="form-group newdesign col-md-4">
                    <label class="col-form-label" for="birthdatepicker">Student Birth Form ID/NIC</label>
                    <input type="text" class="form-control" name="student_birth_form_id"   value="">
                </div>
                <div class="form-group newdesign col-md-4">
                    <label class="col-form-label" for="birthdatepicker">Orphan Student</label>
                    <select name="student_is_orphan" id="student_is_orphan" class="form-control select2" data-toggle = "select2">
                     <option value="">Please select</option>
                     <option value="Yes">Yes</option>
                     <option value="No">No</option>
                    </select>
                </div>
            </div>
            <div class="form-row">

                <div class="form-group newdesign col-md-4">
                    <label class="col-form-label" for="gender"><?php echo get_phrase('gender'); ?></label>
                    <select name="gender" id="gender" class="form-control select2" data-toggle = "select2">
                    <option value=""><?php echo get_phrase('select_gender'); ?></option>
                    <option value="Male"><?php echo get_phrase('male'); ?></option>
                    <option value="Female"><?php echo get_phrase('female'); ?></option>
                    <option value="Others"><?php echo get_phrase('others'); ?></option>
                </select>
                </div>
                <div class="form-group newdesign col-md-4">
                    <label class="col-md-3 col-form-label" for="birthdatepicker"><?php echo get_phrase('cast'); ?></label>
                    <input type="text" class="form-control" name="student_cast"   value="" placeholder="cast">
                </div>
                <div class="form-group newdesign col-md-4">
                    <label class="col-form-label" for="birthdatepicker">OSC</label>
                    <select name="student_osc" id="student_osc" class="form-control select2" data-toggle = "select2">
                     <option value="">Please select</option>
                     <option value="Yes">Yes</option>
                     <option value="No">No</option>
                    </select>
                </div>
            </div>
            <div class="form-row">

                <div class="form-group newdesign col-md-4">
                    <label class="col-form-label">Any Identification Mark?</label>
                    <input type="text" class="form-control" name="student_identification_mark" value="" placeholder="Any Identification Mark?">
                </div>
                <div class="form-group newdesign col-md-4">
                    <label class="col-form-label">Previous School</label>
                    <input type="text" class="form-control" name="previous_school" value="" placeholder="Previous School">
                </div>
                <div class="form-group newdesign col-md-4">
                    <label class="col-form-label" for="birthdatepicker">Religion</label>
                    <select name="religion" id="religion" class="form-control select2" data-toggle = "select2">
                    <option value="">Choose...</option>
                    <option value="christianity">Christianity</option>
                    <option value="islam">Islam</option>
                    <option value="hinduism">Hinduism</option>
                    <option value="buddhism">Buddhism</option>
                    <option value="judaism">Judaism</option>
                    <option value="sikhism">Sikhism</option>
                    <option value="other">Other</option>
                    </select>
                </div>
            </div>
            <div class="form-row">   

                <div class="form-group newdesign col-md-4">
                    <label class="col-form-label" for="blood_group"><?php echo get_phrase('blood_group'); ?></label>
                    <select name="blood_group" id="blood_group" class="form-control select2" data-toggle = "select2"  required>
                    <option value=""><?php echo get_phrase('select_a_blood_group'); ?></option>
                    <option value="a+">A+</option>
                    <option value="a-">A-</option>
                    <option value="b+">B+</option>
                    <option value="b-">B-</option>
                    <option value="ab+">AB+</option>
                    <option value="ab-">AB-</option>
                    <option value="o+">O+</option>
                    <option value="o-">O-</option>
                </select>
                </div>
                <div class="form-group newdesign col-md-4">
                    <label class="col-form-label">Previous ID / Board Roll No.</label>
                    <input type="text" class="form-control" name="previous_board_id" value="" placeholder="Previous ID / Board Roll No">
                </div>
                <div class="form-group newdesign col-md-4">
                    <label class="col-form-label" for="parent_id"><?php echo get_phrase('select_guardian'); ?></label>  
                    <button class="custom-button" onclick="rightModal('<?php echo site_url('modal/popup/parent/create')?>', 'Create parent');">+ Add Parents</button>
                    <select id="parent_id" name="parent_id" class="form-control select2" data-toggle = "select2"  >
                    <option value=""><?php echo get_phrase('select_a_parent'); ?></option>
                    <?php $parents = $this->db->get_where('parents', array('school_id' => $school_id))->result_array(); ?>
                    <?php foreach($parents as $parent): ?>
                        <option value="<?php echo $parent['id']; ?>"><?php echo $this->user_model->get_user_details($parent['user_id'], 'name'); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

            </div>
            <div class="form-row">

                <div class="form-group newdesign col-md-4">
                    <label class="col-form-label">Disease If Any?</label>
                    <input type="text" class="form-control" name="student_disease" value="" placeholder="Disease If Any?">
                </div>
                <div class="form-group newdesign col-md-4">
                    <label class="col-form-label">Any Additional Note</label>
                    <input type="text" class="form-control" name="additional_note" value="" placeholder="Any Additional ">
                </div>

                <div class="form-group newdesign col-md-4">
                    <label class="col-form-label">Total Siblings</label>
                    <select name="total_sibling" id="total_sibling" class="form-control select2" data-toggle = "select2">
                     <option value="">Please select</option>
                     <option value="1">1</option>
                     <option value="2">2</option>
                     <option value="3">3</option>
                     <option value="4">4</option>
                     <option value="5">5</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group newdesign col-md-4">
                    <label class="col-form-label" for="address"><?php echo get_phrase('address'); ?></label>
                    <textarea class="form-control" id="example-textarea" rows="2" name="address" placeholder="address"></textarea>
                </div>

            </div>

            <div clas="col-md-12"><p>&nbsp;</p></div>
            <p>&nbsp;</p><br/><br/>
            <h4 class="mb-3"><u>Parent/Guardian Information</u></h4>
            <div class="form-row">

                <div class="form-group newdesign col-md-4">
                    <label class="col-form-label">Father Name</label>
                    <input type="text" class="form-control" name="father_name" value="" placeholder="Father Name">
                </div>
                <div class="form-group newdesign col-md-4">
                    <label class="col-form-label">Father National ID</label>
                    <input type="text" class="form-control" name="father_national_id" value="" placeholder="Father National ID">
                </div>

                <div class="form-group newdesign col-md-4">
                    <label class="col-form-label">Occupation</label>
                    <input type="text" class="form-control" name="father_occupation" value="" placeholder="Father Occupation">
                </div>

            </div>

            <div class="form-row">

                <div class="form-group newdesign col-md-4">
                    <label class="col-form-label">Father Education</label>
                    <input type="text" class="form-control" name="father_education" value="" placeholder="Father Education">
                </div>
                <div class="form-group newdesign col-md-4">
                    <label class="col-form-label">Father Mobile No.</label>
                    <input type="text" class="form-control" name="father_mobile_no" value="" placeholder="Father Mobile No">
                </div>

                <div class="form-group newdesign col-md-4">
                    <label class="col-form-label">Profession</label>
                    <input type="text" class="form-control" name="father_profession" value="" placeholder="Father Profession">
                </div>
                
            </div>

            <div class="form-row">
                <div class="form-group newdesign col-md-4">
                    <label class="col-form-label">Father Income</label>
                    <input type="text" class="form-control" name="father_income" value="" placeholder="Father Income">
                </div>
            </div>

            <div clas="col-md-12"><p>&nbsp;</p></div>
            <p>&nbsp;</p><br/>
            <h4 class="mb-3"><u>Mother Information</u></h4>
            <div class="form-row">

                <div class="form-group newdesign col-md-4">
                    <label class="col-form-label">Mother Name</label>
                    <input type="text" class="form-control" name="mother_name" value="" placeholder="Mother Name">
                </div>
                <div class="form-group newdesign col-md-4">
                    <label class="col-form-label">Mother National ID</label>
                    <input type="text" class="form-control" name="mother_national_id" value="" placeholder="Mother National ID">
                </div>

                <div class="form-group newdesign col-md-4">
                    <label class="col-form-label">Occupation</label>
                    <input type="text" class="form-control" name="mother_occupation" value="" placeholder="Mother Occupation">
                </div>

            </div>

            <div class="form-row">

                <div class="form-group newdesign col-md-4">
                    <label class="col-form-label">Mother Education</label>
                    <input type="text" class="form-control" name="mother_education" value="" placeholder="Mother Education">
                </div>
                <div class="form-group newdesign col-md-4">
                    <label class="col-form-label">Mother Mobile No.</label>
                    <input type="text" class="form-control" name="mother_mobile_no" value="" placeholder="Mother Mobile No">
                </div>

                <div class="form-group newdesign col-md-4">
                    <label class="col-form-label">Profession</label>
                    <input type="text" class="form-control" name="mother_profession" value="" placeholder="Mother Profession">
                </div>
                
            </div>

            <div class="form-row">

                <div class="form-group newdesign col-md-4">
                    <label class="col-form-label">Mother Income</label>
                    <input type="text" class="form-control" name="mother_income" value="" placeholder="Mother Income">
                </div>
                <div class="form-group newdesign col-md-4"><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p></div>
                <div class="form-group newdesign col-md-4"><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p></div>
            </div>

    <!------ New design End ------>

    <!-- <div class="col-md-12">
        <div class="form-group row mb-3">
            <label class="col-md-3 col-form-label" for="name"><?php echo get_phrase('name'); ?></label>
            <div class="col-md-9">
                <input type="text" id="name" name="name" class="form-control" placeholder="name" required>
            </div>
        </div>

        <div class="form-group row mb-3">
            <label class="col-md-3 col-form-label" for="email"><?php echo get_phrase('email'); ?></label>
            <div class="col-md-9">
                <input type="email" class="form-control" id="email" name="email" placeholder="email" required>
            </div>
        </div>

        <div class="form-group row mb-3">
            <label class="col-md-3 col-form-label" for="password"><?php echo get_phrase('password'); ?></label>
            <div class="col-md-9">
                <input type="password" class="form-control" id="password" name="password" placeholder="password" required>
            </div>
        </div>

        <div class="form-group row mb-3">
            <label class="col-md-3 col-form-label" for="parent_id"><?php echo get_phrase('parent'); ?></label>
            <div class="col-md-9">
                <select id="parent_id" name="parent_id" class="form-control select2" data-toggle = "select2"  >
                    <option value=""><?php echo get_phrase('select_a_parent'); ?></option>
                    <?php $parents = $this->db->get_where('parents', array('school_id' => $school_id))->result_array(); ?>
                    <?php foreach($parents as $parent): ?>
                        <option value="<?php echo $parent['id']; ?>"><?php echo $this->user_model->get_user_details($parent['user_id'], 'name'); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <div class="form-group row mb-3">
            <label class="col-md-3 col-form-label" for="class_id"><?php echo get_phrase('class'); ?></label>
            <div class="col-md-9">
                <select name="class_id" id="class_id" class="form-control select2" data-toggle = "select2" required onchange="classWiseSection(this.value)">
                    <option value=""><?php echo get_phrase('select_a_class'); ?></option>
                    <?php $classes = $this->db->get_where('classes', array('school_id' => $school_id))->result_array(); ?>
                    <?php foreach($classes as $class){ ?>
                        <option value="<?php echo $class['id']; ?>"><?php echo $class['name']; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>

        <div class="form-group row mb-3">
            <label class="col-md-3 col-form-label" for="section_id"><?php echo get_phrase('section'); ?></label>
            <div class="col-md-9" id = "section_content">
                <select name="section_id" id="section_id" class="form-control select2" data-toggle = "select2" required >
                    <option value=""><?php echo get_phrase('select_section'); ?></option>
                </select>
            </div>
        </div>

        <div class="form-group row mb-3">
            <label class="col-md-3 col-form-label" for="birthdatepicker"><?php echo get_phrase('birthday'); ?></label>
            <div class="col-md-9 position-relative" id="datepicker4">
                <input type="text" class="form-control" data-provide="datepicker" data-date-autoclose="true" data-date-container="#datepicker4" name = "birthday"   value="<?php echo date('m/d/Y'); ?>" required>
            </div>
        </div>

        <div class="form-group row mb-3">
            <label class="col-md-3 col-form-label" for="gender"><?php echo get_phrase('gender'); ?></label>
            <div class="col-md-9">
                <select name="gender" id="gender" class="form-control select2" data-toggle = "select2"  required>
                    <option value=""><?php echo get_phrase('select_gender'); ?></option>
                    <option value="Male"><?php echo get_phrase('male'); ?></option>
                    <option value="Female"><?php echo get_phrase('female'); ?></option>
                    <option value="Others"><?php echo get_phrase('others'); ?></option>
                </select>
            </div>
        </div>
        
        <div class="form-group row mb-3">
            <label class="col-md-3 col-form-label" for="blood_group"><?php echo get_phrase('blood_group'); ?></label>
            <div class="col-md-9">
                <select name="blood_group" id="blood_group" class="form-control select2" data-toggle = "select2"  required>
                    <option value=""><?php echo get_phrase('select_a_blood_group'); ?></option>
                    <option value="a+">A+</option>
                    <option value="a-">A-</option>
                    <option value="b+">B+</option>
                    <option value="b-">B-</option>
                    <option value="ab+">AB+</option>
                    <option value="ab-">AB-</option>
                    <option value="o+">O+</option>
                    <option value="o-">O-</option>
                </select>
            </div>
        </div>

        <div class="form-group row mb-3">
            <label class="col-md-3 col-form-label" for="example-textarea"><?php echo get_phrase('address'); ?></label>
            <div class="col-md-9">
                <textarea class="form-control" id="example-textarea" rows="5" name = "address" placeholder="address"></textarea>
            </div>
        </div>

        <div class="form-group row mb-3">
            <label class="col-md-3 col-form-label" for="phone"><?php echo get_phrase('phone'); ?></label>
            <div class="col-md-9">
                <input type="text" id="phone" name="phone" class="form-control" placeholder="phone" required>
            </div>
        </div>

        <div class="form-group row mb-3">
            <label class="col-md-3 col-form-label" for="example-fileinput"><?php echo get_phrase('student_profile_image'); ?></label>
            <div class="col-md-9 custom-file-upload">
                <div class="wrapper-image-preview" style="margin-left: -6px;">
                    <div class="box" style="width: 250px;">
                        <div class="js--image-preview" style="background-image: url(<?php echo base_url('uploads/users/placeholder.jpg'); ?>); background-color: #F5F5F5;"></div>
                        <div class="upload-options">
                            <label for="student_image" class="btn"> <i class="mdi mdi-camera"></i> <?php echo get_phrase('upload_an_image'); ?> </label>
                            <input id="student_image" style="visibility:hidden;" type="file" class="image-upload" name="student_image" accept="image/*">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-secondary col-md-4 col-sm-12 mb-4"><?php echo get_phrase('add_student'); ?></button>
        </div>
    </div> -->

<!------ New design Start(18/07/2024) ------>
<br/><button type="button" id="resetButton" style="color: brown; background-color: transparent; border: none; cursor: pointer; margin-bottom: 1rem;" class="btn">Reset</button><button type="submit" class="btn btn-secondary col-md-4 col-sm-12 mb-4"><?php echo get_phrase('add_student'); ?></button>
<!------ New design End ----->
       
</form>

<script type="text/javascript">
var form;
$(".ajaxForm").submit(function(e) {
  form = $(this);
  ajaxSubmit(e, form, refreshForm);
});
var refreshForm = function () {
    form.trigger("reset");
}

/*** New code Start(18/07/2024) ***/
$(document).ready(function() {
    $('#resetButton').click(function() {
        $('#student_admission_form')[0].reset(); // Reset the form using plain 
    });
});
/*** New code End(18/07/2024) ***/
// $(document).ready(function () {
//     $('select.select2:not(.normal)').each(function () { $(this).select2({ dropdownParent: '#right-modal' }); }); //initSelect2(['#gender', '#blood_group']);
// });
// $(".ajaxForm").validate({}); // Jquery form validation initialization
// $(".ajaxForm").submit(function(e) {
//     var form = $(this);
//     ajaxSubmit(e, form, showAllParents);
// });
</script>
