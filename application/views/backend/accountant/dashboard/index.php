<style>
    .text-muted {
        text-align: left;
        text-transform: capitalize;
        font-weight: 500;
        color: #000 !important;
    }

    .boxhover {
        box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
        border-radius: 10px;
    }

    .boxhover:hover {
        box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
        transition: 0.3s ease;
    }

    #myLineChart {
        width: 100% !important;
    }

    .adminbar {
        background: #ffdfe8;
        border-radius: 10px;
        box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
    }

    .filbtn {
        background-color: #091E6C;
    }
</style>

<!-- start page title -->
<div class="row ">
    <div class="col-xl-12">
        <div class="card adminbar">
            <div class="card-body d-flex align-items-center justify-content-between py-2">
                <div>
                    <h4 class="page-title mb-0 d-flex align-items-center">
                        <i class="mdi mdi-view-dashboard title_icon" style="font-size: 1.5rem; color: #ff7580;"></i>
                        <span
                            style="font-size: 1.5rem; font-weight: 700; color: #ff7580; margin-left: 10px; text-transform: capitalize;">
                            <?php echo get_phrase('dashboard'); ?>
                        </span>
                    </h4>
                    <p class="text-muted mt-2" style="font-size: 16px; font-weight: 600; color: #2c2c2c;">
                        Get an overview of key metrics and system status on the dashboard.
                    </p>
                </div>
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
                        <div class="card widget-flat" id="student"
                            style="background-image: linear-gradient(to right top, #ff6a00, #ee0979); border-radius: 10px; color: #fff;">
                            <div class="card-body">
                                <div class="float-end">
                                    <i class="mdi mdi-account-multiple widget-icon" style="color: #fff;"></i>
                                </div>
                                <h5 class="font-weight-normal mt-0" title="Number of Student" style="color: #fff;">
                                    <i class="mdi mdi-account-group title_icon" style="color: #fff;"></i>
                                    <?php echo get_phrase('students'); ?>
                                    <a href="<?php echo route('student'); ?>" style="color: #fff; display: none;"
                                        id="student_list">
                                        <i class="mdi mdi-export"></i>
                                    </a>
                                </h5>
                                <h3 class="mt-3 mb-3" style="color: #fff;">
                                    <?php
                                    $current_session_students = $this->user_model->get_session_wise_student();
                                    echo $current_session_students->num_rows();
                                    ?>
                                </h3>
                                <p class="mb-0 text-muted">
                                    <span class="text-nowrap"
                                        style="color: #fff;"><?php echo get_phrase('total_number_of_student'); ?></span>
                                </p>
                            </div> <!-- end card-body-->
                        </div>
                        <!-- end card-->
                    </div> <!-- end col-->

                    <div class="col-lg-6">
                        <div class="card widget-flat" id="teacher" style="on">
                            <div class="card widget-flat" id="teacher"
                                style="background-image: linear-gradient(to right top, #301e72, #105ee7); border-radius: 10px; color: #fff;">
                                <div class="card-body">
                                    <div class="float-end">
                                        <i class="mdi mdi-account-multiple widget-icon" style="color: #fff;"></i>
                                    </div>
                                    <h5 class="font-weight-normal mt-0" title="Number of Teacher" style="color: #fff;">
                                        <i class="mdi mdi-account-group title_icon" style="color: #fff;"></i>
                                        <?php echo get_phrase('teacher'); ?>
                                        <a href="<?php echo route('teacher'); ?>" style="color: #fff; display: none;"
                                            id="teacher_list">
                                            <i class="mdi mdi-export"></i>
                                        </a>
                                    </h5>
                                    <h3 class="mt-3 mb-3" style="color: #fff;">
                                        <?php
                                        $teachers = $this->user_model->get_teachers();
                                        echo $teachers->num_rows();
                                        ?>
                                    </h3>
                                    <p class="mb-0 text-muted">
                                        <span class="text-nowrap"
                                            style="color: #fff;"><?php echo get_phrase('total_number_of_teacher'); ?></span>
                                    </p>
                                </div> <!-- end card-body-->
                            </div>
                            <!-- end card-body-->
                        </div> <!-- end card-->
                    </div> <!-- end col-->
                </div> <!-- end row -->

                <div class="row">
                    <div class="col-lg-6">
                        <div class="card widget-flat" id="parent"
                            style="background-image: linear-gradient(to right top, #216200, #01280b); border-radius: 10px; color: #fff;">
                            <div class="card-body">
                                <div class="float-end">
                                    <i class="mdi mdi-account-multiple widget-icon" style="color: #fff;"></i>
                                </div>
                                <h5 class="font-weight-normal mt-0" title="Number of Parents" style="color: #fff;">
                                    <i class="mdi mdi-account-group title_icon" style="color: #fff;"></i>
                                    <?php echo get_phrase('parents'); ?>
                                    <a href="<?php echo route('parent'); ?>" style="color: #fff; display: none;"
                                        id="parent_list">
                                        <i class="mdi mdi-export"></i>
                                    </a>
                                </h5>
                                <h3 class="mt-3 mb-3" style="color: #fff;">
                                    <?php
                                    $parents = $this->user_model->get_parents();
                                    echo $parents->num_rows();
                                    ?>
                                </h3>
                                <p class="mb-0 text-muted">
                                    <span class="text-nowrap"
                                        style="color: #fff;"><?php echo get_phrase('total_number_of_parent'); ?></span>
                                </p>
                            </div> <!-- end card-body-->
                        </div>
                        <!-- end card-->
                    </div> <!-- end col-->

                    <div class="col-lg-6">
                        <div class="card widget-flat" id="staff"
                            style="background-image: linear-gradient(to right top, #680e65, #ff3030); border-radius: 10px; color: #fff;">
                            <div class="card-body">
                                <div class="float-end">
                                    <i class="mdi mdi-account-multiple widget-icon" style="color: #fff;"></i>
                                </div>
                                <h5 class="font-weight-normal mt-0" title="Number of Staff" style="color: #fff;">
                                    <i class="mdi mdi-account-group title_icon" style="color: #fff;"></i>
                                    <?php echo get_phrase('staff'); ?>
                                </h5>
                                <h3 class="mt-3 mb-3" style="color: #fff;">
                                    <?php
                                    $accountants = $this->user_model->get_accountants()->num_rows();
                                    $librarians = $this->user_model->get_librarians()->num_rows();
                                    echo $accountants + $librarians;
                                    ?>
                                </h3>
                                <p class="mb-0 text-muted">
                                    <span class="text-nowrap"
                                        style="color: #fff;"><?php echo get_phrase('total_number_of_staff'); ?></span>
                                </p>
                            </div> <!-- end card-body-->
                        </div>
                        <!-- end card-->
                    </div> <!-- end col-->
                </div>
            </div> <!-- end col -->
            <div class="col-xl-4">
                <div class="card"
                    style="background-image: linear-gradient(to right top, #6a11cb, #2575fc); border-radius: 10px;">
                    <div class="card-body">
                        <h4 class="header-title text-white mb-2"><?php echo get_phrase('todays_attendance'); ?></h4>
                        <div class="text-center">
                            <h3 class="font-weight-normal text-white mb-2">
                                <?php echo $this->crud_model->get_todays_attendance(); ?>
                            </h3>
                            <p class="text-light text-uppercase font-13 font-weight-bold">
                                <?php echo $this->crud_model->get_todays_attendance(); ?>
                                <?php echo get_phrase('students_are_attending_today'); ?>
                            </p>
                            <!-- <a href="<?php echo route('attendance'); ?>" class="btn btn-outline-light btn-sm mb-1"><?php echo get_phrase('go_to_attendance'); ?>
                                <i class="mdi mdi-arrow-right ms-1"></i>
                            </a> -->
                        </div>
                    </div>
                </div>

                <div class="card"
                    style="background-image: linear-gradient(to right top, #ff7e5f, #feb47b); border-radius: 10px;">
                    <div class="card-body">
                        <h4 class="header-title text-white mb-3">
                            <?php echo get_phrase('recent_events'); ?>
                            <a href="<?php echo route('event_calendar'); ?>" style="color: #fff;">
                                <i class="mdi mdi-export"></i>
                            </a>
                        </h4>
                        <?php include 'event.php'; ?>
                    </div>
                </div>

            </div>
        </div>
    </div><!-- end col-->
</div>

<div class="row">
    <div class="col-xl-12">
        <div class="row">
            <div class="col-xl-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mb-3"><?php echo get_phrase('accounts_of'); ?> <?php echo date('F'); ?>
                            <a href="<?php echo route('invoice'); ?>" style="color: #6c757d"><i
                                    class="mdi mdi-export"></i></a>
                        </h4>
                        <?php include 'invoice.php'; ?>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mb-3"> <?php echo get_phrase('expense_of'); ?> <?php echo date('F'); ?>
                            <a href="<?php echo route('expense'); ?>" style="color: #6c757d"><i
                                    class="mdi mdi-export"></i></a>
                        </h4>
                        <?php include 'expense.php'; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        initDataTable("expense-datatable");
    });
</script>