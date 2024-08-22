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
                        <?php echo get_phrase('student_admission_form'); ?>
                    </h4>
                </div>
                <p class="inspiring-line">
                    Guiding every step towards a brighter and more successful future.
                </p>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>


<div class="row">
    <div class="col-12">
        <div class="card pt-0">
            <ul class="custom-nav-menu">
                <li class="nav-item">
                    <a href="<?php echo route('student/create'); ?>" class="nav-link <?php if ($aria_expand == 'single')
                           echo 'active'; ?>">
                        <i class="mdi mdi-home-variant icon"></i>
                        <span class="text">
                            <?php echo get_phrase('single_student_admission'); ?>
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo route('student/create/bulk'); ?>" class="nav-link <?php if ($aria_expand == 'bulk')
                           echo 'active'; ?>">
                        <i class="mdi mdi-account-circle icon"></i>
                        <span class="text">
                            <?php echo get_phrase('bulk_student_admission'); ?>
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo route('student/create/excel'); ?>" class="nav-link <?php if ($aria_expand == 'excel')
                           echo 'active'; ?>">
                        <i class="mdi mdi-file-excel icon"></i> <!-- Fixed icon class for Excel -->
                        <span class="text">
                            <?php echo get_phrase('excel_upload'); ?>
                        </span>
                    </a>
                </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane active">
                    <?php
                    if ($aria_expand == 'single'):
                        include 'single_student_admission.php';
                    elseif ($aria_expand == 'bulk'):
                        include 'bulk_student_admission.php';
                    elseif ($aria_expand == 'excel'):
                        include 'excel_student_admission.php';
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>