<style>
    .progress {
        margin: 20px auto;
        padding: 0;
        width: 90%;
        background: #e5e5e5;
        border-radius: 6px;
        position: relative;
    }

    p {
        text-align: left;
        text-transform: capitalize;
        font-weight: 500;
    }

    .progress-header {
        text-align: center;
        margin-bottom: 5px;
        font-size: 14px;
        color: black;
    }

    .bar-container {
        position: relative;
        width: 100%;
        height: 30px;
        background: #e5e5e5;
        border-radius: 6px;
        overflow: hidden;
    }

    .bar {
        height: 100%;
        background: cornflowerblue;
        border-radius: 6px 0 0 6px;
    }

    .percent-outside {
        position: absolute;
        top: 50%;
        right: 10px;
        transform: translateY(-50%);
        margin: 0;
        font-family: tahoma, arial, helvetica;
        font-size: 12px;
        color: black;
    }

    .bar-box {
        background: #fff;
        border-radius: 10px;
        padding: 20px 20px;
        box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
    }

    .bar-box:hover {
        box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
        transition: 0.3s ease;
    }

    .linebar {
        background: white;
        padding: 20px;
        border-radius: 10px;
        margin-bottom: 20px;
        box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
    }

    .linebar:hover {
        box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
        transition: 0.3s ease;
    }

    .boxhover {
        box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
        border-radius: 10px;
    }

    .boxhover:hover {
        box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
        transition: 0.3s ease;
    }

    .colhover {
        box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;
        border-radius: 10px;
    }

    .colhover:hover {
        box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;
        transition: 1s ease;
    }

    #myLineChart {
        width: 100% !important;
    }

    .adminbar {
        background: #ffdfe8;
        border-radius: 10px;
        box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;

    }

    .table-responsive {
        display: revert !important;
    }

    .card {
        border: none !important;
    }

    .filbtn {
        color: #fff;
        background-color: #00398f;
        border-color: #00398f;
        padding: 6px 50px;
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
                    <p class="text-muted mt-2" style="font-size: 16px; font-weight: 600; color: #000 !important;">
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
                            style="background-image: linear-gradient(to right top, #d32f07, #bd0d0d);
             border-radius: 10px; transition: all 0.3s ease-in-out; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); position: relative; overflow: hidden;">
                            <div class="card-body" style="color: #fff;">
                                <div class="float-end">
                                    <i class="mdi mdi-account-multiple widget-icon"
                                        style="font-size: 24px; color: #fff;"></i>
                                </div>
                                <h5 class="font-weight-normal mt-0" style="font-size: 1.2rem; color: #fff;"
                                    title="Number of Students">
                                    <i class="mdi mdi-account-group title_icon" style="color: #fff;"></i>
                                    <?php echo get_phrase('students'); ?>
                                    <a href="<?php echo route('student'); ?>" style="color: #fff; display: none;"
                                        id="student_list">
                                        <i class="mdi mdi-export"></i>
                                    </a>
                                </h5>
                                <h3 class="mt-3 mb-3" style="font-size: 26px; color: #fff;">
                                    <?php
                                    $current_session_students = $this->user_model->get_session_wise_student();
                                    echo $current_session_students->num_rows();
                                    ?>
                                </h3>
                                <p class="mb-0 text-muted" style="color: #fff;">
                                    <span class="text-nowrap" style="color: white; font-weight: 600; font-size: 16px;">
                                        <?php echo get_phrase('total_number_of_student'); ?>
                                    </span>
                                </p>
                            </div> <!-- end card-body-->
                        </div>

                        <!-- end card-->
                    </div> <!-- end col-->

                    <div class="col-lg-6">
                        <div class="card widget-flat" id="teacher"
                            style="background-image: linear-gradient(to right top, #6a11cb, #2575fc);
             border-radius: 10px; transition: all 0.3s ease-in-out; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); position: relative; overflow: hidden;">
                            <div class="card-body" style="color: #fff;">
                                <div class="float-end">
                                    <i class="mdi mdi-account-multiple widget-icon"
                                        style="font-size: 24px; color: #fff;"></i>
                                </div>
                                <h5 class="font-weight-normal mt-0" style="font-size: 1.2rem; color: #fff;"
                                    title="Number of Teacher">
                                    <i class="mdi mdi-account-group title_icon"
                                        style="color: #fff;"></i><?php echo get_phrase('teacher'); ?>
                                    <a href="<?php echo route('teacher'); ?>" style="color: #fff; display: none;"
                                        id="teacher_list">
                                        <i class="mdi mdi-export"></i>
                                    </a>
                                </h5>
                                <h3 class="mt-3 mb-3" style="font-size: 26px; color: #fff;">
                                    <?php
                                    $teachers = $this->user_model->get_teachers();
                                    echo $teachers->num_rows();
                                    ?>
                                </h3>
                                <p class="mb-0 text-muted" style="color: #fff;">
                                    <span class="text-nowrap" style="color: white; font-weight: 600; font-size: 16px;">
                                        <?php echo get_phrase('total_number_of_teacher'); ?>
                                    </span>
                                </p>
                            </div> <!-- end card-body-->
                        </div>
                        <!-- end card-->
                    </div> <!-- end col-->
                </div> <!-- end row -->

                <div class="row">
                    <div class="col-lg-6">
                        <div class="card widget-flat" id="parent"
                            style="background-image: linear-gradient(to right top, #006a70, #4f6e02);
             border-radius: 10px; transition: all 0.3s ease-in-out; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); position: relative; overflow: hidden;">
                            <div class="card-body" style="color: #fff;">
                                <div class="float-end">
                                    <i class="mdi mdi-account-multiple widget-icon"
                                        style="font-size: 24px; color: #fff;"></i>
                                </div>
                                <h5 class="font-weight-normal mt-0" style="font-size: 1.2rem; color: #fff;"
                                    title="Number of Parents">
                                    <i class="mdi mdi-account-group title_icon" style="color: #fff;"></i>
                                    <?php echo get_phrase('parents'); ?>
                                    <a href="<?php echo route('parent'); ?>" style="color: #fff; display: none;"
                                        id="parent_list">
                                        <i class="mdi mdi-export"></i>
                                    </a>
                                </h5>
                                <h3 class="mt-3 mb-3" style="font-size: 26px; color: #fff;">
                                    <?php
                                    $parents = $this->user_model->get_parents();
                                    echo $parents->num_rows();
                                    ?>
                                </h3>
                                <p class="mb-0 text-muted" style="color: #fff;">
                                    <span class="text-nowrap" style="color: white; font-weight: 600; font-size: 16px;">
                                        <?php echo get_phrase('total_number_of_parent'); ?>
                                    </span>
                                </p>
                            </div> <!-- end card-body-->
                        </div>

                        <!-- end card-->
                    </div> <!-- end col-->

                    <div class="col-lg-6">
                        <div class="card widget-flat" id="staff"
                            style="background-image: linear-gradient(to right top, #6c0768, #9f0f00);
             border-radius: 10px; transition: all 0.3s ease-in-out; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); position: relative; overflow: hidden;">
                            <div class="card-body" style="color: #fff;">
                                <div class="float-end">
                                    <i class="mdi mdi-account-multiple widget-icon"
                                        style="font-size: 24px; color: #fff;"></i>
                                </div>
                                <h5 class="font-weight-normal mt-0" style="font-size: 1.2rem; color: #fff;"
                                    title="Number of Staff">
                                    <i class="mdi mdi-account-group title_icon" style="color: #fff;"></i>
                                    <?php echo get_phrase('staff'); ?>
                                </h5>
                                <h3 class="mt-3 mb-3" style="font-size: 26px; color: #fff;">
                                    <?php
                                    $accountants = $this->user_model->get_accountants()->num_rows();
                                    $librarians = $this->user_model->get_librarians()->num_rows();
                                    echo $accountants + $librarians;
                                    ?>
                                </h3>
                                <p class="mb-0 text-muted" style="color: #fff;">
                                    <span class="text-nowrap" style="color: white; font-weight: 600; font-size: 16px;">
                                        <?php echo get_phrase('total_number_of_staff'); ?>
                                    </span>
                                </p>
                            </div> <!-- end card-body-->
                        </div>
                        <!-- end card-->
                    </div> <!-- end col-->
                </div>
            </div> <!-- end col -->
            <div class="col-xl-4">
                <div class="card"
                    style="background-image: linear-gradient(to right top, #00c6ff, #0072ff); border-radius: 10px;">
                    <div class="card-body">
                        <h4 class="header-title text-white mb-2" style="text-align: center;">
                            <?php echo get_phrase('todays_attendance'); ?>
                        </h4>
                        <div class=" text-center">
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
                    style="background-image: linear-gradient(to right top, #6a11cb, #2575fc); border-radius: 10px;">
                    <div class="card-body">
                        <h4 class="header-title text-white">
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
<!--
<div class="row">
    <div class="col-xl-12">
        <div class="row">
            <div class="col-xl-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mb-3"><?php echo get_phrase('accounts_of'); ?> <?php echo date('F'); ?> <a href="<?php echo route('invoice'); ?>" style="color: #6c757d"><i class = "mdi mdi-export"></i></a></h4>
                        <?php include 'invoice.php'; ?>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mb-3"> <?php echo get_phrase('expense_of'); ?> <?php echo date('F'); ?> <a href="<?php echo route('expense'); ?>" style="color: #6c757d"><i class = "mdi mdi-export"></i></a></h4>
                        <?php include 'expense.php'; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->

<script>
    $(document).ready(function () {
        initDataTable("expense-datatable");
    });
</script>