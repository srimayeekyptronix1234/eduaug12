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

    .parentbar {
        box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
        background: #ffdfe8;
    }

    .inspiring-line {
        font-size: 16px;
        color: #2c2c2c !important;
        font-weight: 600;
    }

    .parbox {
        font-weight: 600;
        box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
        border-radius: 10px;
    }

    .parbox:hover {
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
        <div class="card parentbar">
            <div class="card-body py-2 d-flex justify-content-between align-items-center">
                <div>
                    <h4 class="page-title d-flex align-items-center">
                        <i class="mdi mdi-book-open-page-variant title_icon"></i>
                        <span class="ms-2"><?php echo get_phrase('subject'); ?></span>
                    </h4>
                    <p class="inspiring-line mt-2">
                        Unlocking knowledge, one subject at a time.
                    </p>
                </div>
                <button type="button" class="btn btn-outline-primary btn-rounded alignToTitle float-end mt-1"
                    onclick="rightModal('<?php echo site_url('modal/popup/subject/create'); ?>', '<?php echo get_phrase('create_subject'); ?>')">
                    <i class="mdi mdi-plus"></i> <?php echo get_phrase('add_subject'); ?>
                </button>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

<div class="row">
    <div class="col-12">
        <div class="card parbox">
            <div class="row mt-3">
                <div class="col-md-3"></div>
                <div class="col-md-4">
                    <select name="class_id" id="class_id" class="form-control select2" data-toggle="select2" required>
                        <option value=""><?php echo get_phrase('select_a_class'); ?></option>
                        <?php
                        $classes = $this->db->get_where('classes', array('school_id' => $school_id))->result_array(); ?>
                        <?php foreach ($classes as $class): ?>
                            <option value="<?php echo $class['id']; ?>"><?php echo $class['name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-block btn-secondary filbtn"
                        onclick="filter_class()"><?php echo get_phrase('filter'); ?></button>
                </div>
            </div>
            <div class="card-body subject_content">
                <?php include 'list.php'; ?>
            </div>
        </div>
    </div>
</div>


<script>
    function filter_class() {
        var class_id = $('#class_id').val();
        if (class_id != "") {
            showAllSubjects();
        } else {
            toastr.error('<?php echo get_phrase('please_select_a_class'); ?>');
        }
    }

    var showAllSubjects = function () {
        var class_id = $('#class_id').val();
        if (class_id != "") {
            $.ajax({
                url: '<?php echo route('subject/list/') ?>' + class_id,
                success: function (response) {
                    $('.subject_content').html(response);
                }
            });
        }
    }
</script>