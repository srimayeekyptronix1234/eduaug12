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

    .ms-2 {
        margin-left: 0.5rem;
    }

    .perbox {
        box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
        background: #ffdfe8;
    }

    .inspiring-line {
        font-size: 16px;
        font-weight: 600;
        color: #2c2c2c !important;
    }

    .permain {
        box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
        border-radius: 10px;
    }

    .permain:hover {
        box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
        transition: 1s ease;
    }

    .filbtn {
        background: #0272f3;
        padding: 7px 50px 7px 50px;
    }
</style>

<!--title-->
<div class="row">
    <div class="col-xl-12">
        <div class="card perbox">
            <div class="card-body py-2">
                <div class="d-flex align-items-center">
                    <i class="mdi mdi-account-multiple-check title_icon"></i>
                    <h4 class="page-title ms-2 mb-0">
                        <?php echo get_phrase('assigned_permission_for_teacher'); ?>
                    </h4>
                </div>
                <p class="inspiring-line mt-2">
                    Empowering educators with the tools they need to inspire success.
                </p>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>



<div class="row">
    <div class="col-12">
        <div class="card permain">
            <div class="row mt-3">
                <div class="col-md-1"></div>
                <div class="col-md-4">
                    <select name="class" id="class_id" class="form-control select2" data-toggle="select2"
                        onchange="classWiseSection(this.value)" required>
                        <option value=""><?php echo get_phrase('select_a_class'); ?></option>
                        <?php
                        $classes = $this->db->get_where('classes', array('school_id' => school_id()))->result_array();
                        foreach ($classes as $class) {
                            ?>
                            <option value="<?php echo $class['id']; ?>"><?php echo $class['name']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-md-4">
                    <select name="section" id="section_id" class="form-control select2" data-toggle="select2" required>
                        <option value=""><?php echo get_phrase('select_a_section'); ?></option>
                    </select>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-block btn-secondary filbtn"
                        onclick="filter()"><?php echo get_phrase('filter'); ?></button>
                </div>
            </div>
            <div class="card-body permission_content">
                <div class="empty_box text-center">
                    <img class="mb-3" width="150px"
                        src="<?php echo base_url('assets/backend/images/empty_box.png'); ?>" />
                    <br>
                    <span class=""><?php echo get_phrase('no_data_found'); ?></span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- modyfy section -->
<script>
    $('document').ready(function () {

    });

    function classWiseSection(classId) {
        $.ajax({
            url: "<?php echo route('section/list/'); ?>" + classId,
            success: function (response) {
                $('#section_id').html(response);
            }
        });
    }

    function filter() {
        var class_id = $('#class_id').val();
        var section_id = $('#section_id').val();
        if (class_id != "" && section_id != "") {
            $.ajax({
                url: '<?php echo route('permission/filter/') ?>' + class_id + '/' + section_id,
                success: function (response) {
                    $('.permission_content').html(response);
                }
            });
        } else {
            toastr.error('<?php echo get_phrase('please_select_a_class_and_section'); ?>');
        }
    }
</script>

<!-- permission insert and update -->
<script>
    function togglePermission(checkbox_id, column_name, teacher_id) {

        var value = $('#' + checkbox_id).val();
        if (value == 1) {
            value = 0;
        } else {
            value = 1;
        }
        var class_id = $('#class_id').val();
        var section_id = $('#section_id').val();

        $.ajax({
            type: 'POST',
            url: '<?php echo route('permission/modify_permission/') ?>',
            data: { class_id: class_id, section_id: section_id, teacher_id: teacher_id, column_name: column_name, value: value },
            success: function (response) {
                $('.permission_content').html(response);
                success_notify('<?php echo get_phrase('permission_updated_successfully.'); ?>');
            }
        });

    }
</script>