<style>
    p {
        text-align: left;
        text-transform: capitalize;
        font-weight: 500;
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
</style>

<?php
$parent_id = $this->session->userdata('user_id');
$school_id = school_id();
$parent_data = $this->db->get_where('parents', array('user_id' => $parent_id))->row_array();
?>

<!-- start page title -->
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body py-2 d-flex align-items-center justify-content-between adminbar">
                <div>
                    <h4 class="page-title mb-0 d-flex align-items-center">
                        <i class="mdi mdi-view-dashboard title_icon" style="font-size: 1.5rem; color: #ff7580;"></i>
                        <span
                            style="font-size: 1.5rem; font-weight: 700; color: #ff7580; margin-left: 10px; text-transform: capitalize;">
                            <?php echo get_phrase('dashboard'); ?>
                        </span>
                    </h4>
                    <p class="text-muted mt-2" style="font-size: 16px; font-weight: 600; color: #2c2c2c !important;">
                        Get an overview of the system and manage your activities from the dashboard.
                    </p>
                </div>
                <img src="<?php echo base_url('assets/backend/images/dashboardimg.png'); ?>" alt="Dashboard Image"
                    class="img-fluid" style="width: 215px; margin-top: -30px;">
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
                    <!--Active Complaints Count Start-->
                    <div class="col-lg-6">
                        <div class="card widget-flat" id="complaints"
                            style="background-image: linear-gradient(to right top, rgb(12 2 76), rgb(8 43 116), rgb(14 67 135), rgb(0, 102, 185), rgb(26 51 241));
                             border-radius: 10px; transition: all 0.3s ease-in-out; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); position: relative; overflow: hidden;">
                            <div class="card-body" style="color: #fff;">
                                <div class="float-end">
                                    <i class="mdi mdi-account-multiple widget-icon"
                                        style="font-size: 24px; color: #fff;"></i>
                                </div>
                                <h5 class="font-weight-normal mt-0" style="font-size: 1.2rem; color: #fff;"
                                    title="Active Complaints Count">
                                    <i class="mdi mdi-account-group title_icon" style="color: #fff;"></i>
                                    <?php echo get_phrase('Active Complaints'); ?>
                                    <a href="" style="color: #fff; display: none;" id="complaint_list">
                                        <i class="mdi mdi-export"></i>
                                    </a>
                                </h5>
                                <h3 class="mt-3 mb-3" style="font-size: 2rem; color: #fff;">
                                    <?php
                                    $this->db->select('c.*');
                                    $this->db->from('students s');
                                    $this->db->join('complaint c', 'c.student_id = s.user_id');
                                    $this->db->where('s.parent_id', $parent_data['id']);
                                    $this->db->where('c.status', '1');
                                    $total_active_complaints = $this->db->get()->num_rows();

                                    if (isset($total_active_complaints) && $total_active_complaints != '') {
                                        echo $total_active_complaints;
                                    }
                                    ?>
                                </h3>
                                <p class="mb-0 text-muted" style="color: #fff;">
                                    <span class="text-nowrap"
                                        style="color: white; font-weight: 600; font-size: 16px;"><?php echo get_phrase('Active Complaints'); ?>
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <script>
                        // Hover effect using JavaScript
                        document.getElementById('complaints').addEventListener('mouseenter', function () {
                            this.style.transform = 'translateY(-5px)';
                            this.style.boxShadow = '0 8px 16px rgba(0, 0, 0, 0.2)';
                        });
                        document.getElementById('complaints').addEventListener('mouseleave', function () {
                            this.style.transform = 'translateY(0)';
                            this.style.boxShadow = '0 4px 8px rgba(0, 0, 0, 0.1)';
                        });
                    </script>

                    <!--Active Complaints Count End-->
                    <!--Homework Count Start-->
                    <div class="col-lg-6">
                        <div class="card widget-flat" id="homework"
                            style="background-image: linear-gradient(to right top, #051937, #004d7a, #008793, #00bf72, #a8eb12); border-radius: 10px; transition: all 0.3s ease-in-out; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); position: relative; overflow: hidden;">
                            <div class="card-body" style="color: #fff;">
                                <div class="float-end">
                                    <i class="mdi mdi-account-multiple widget-icon"
                                        style="font-size: 23px; color: #fff;"></i>
                                </div>
                                <h5 class="font-weight-normal mt-0" style="font-size: 1.2rem; color: #fff;"
                                    title="Homework">
                                    <i class="mdi mdi-account-group title_icon"
                                        style="font-size: 23px; color: #fff;"></i>
                                    <?php echo get_phrase('Homework'); ?>
                                    <a href="" style="color: #fff; display: none;" id="academic_progress">
                                        <i class="mdi mdi-export"></i>
                                    </a>
                                </h5>
                                <h3 class="mt-3 mb-3" style="font-size: 2rem; color: #fff;">
                                    <?php
                                    $this->db->select('h.*');
                                    $this->db->from('students s');
                                    $this->db->join('homework h', 'h.student_id = s.id');
                                    $this->db->where('s.parent_id', $parent_data['id']);
                                    $total_homework = $this->db->get()->num_rows();

                                    if (isset($total_homework) && $total_homework != '') {
                                        echo $total_homework;
                                    }
                                    ?>
                                </h3>
                                <p class="mb-0 text-muted" style="color: #fff;">
                                    <span class="text-nowrap"
                                        style="font-size: 18px; font-weight: 600; color: #fff !important;"><?php echo get_phrase('Homework'); ?>
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>

                    <script>
                        // Hover effect using JavaScript
                        document.getElementById('homework').addEventListener('mouseenter', function () {
                            this.style.transform = 'translateY(-5px)';
                            this.style.boxShadow = '0 8px 16px rgba(0, 0, 0, 0.2)';
                        });
                        document.getElementById('homework').addEventListener('mouseleave', function () {
                            this.style.transform = 'translateY(0)';
                            this.style.boxShadow = '0 4px 8px rgba(0, 0, 0, 0.1)';
                        });
                    </script>

                    <!--Homework Count End-->

                </div>
                <div class="row"></div>
            </div> <!-- end col -->
            <div class="col-xl-4">
                <!--childs attendance start-->
                <div class="card"
                    style="background-image: linear-gradient(to right top, #a62917, #b22e66, #9057a5, #4c79bf, #048fb5); border-radius: 12px; box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15); transition: all 0.3s ease;">
                    <div class="card-body" style="color: #fff; text-align: center;">
                        <h4 class="header-title" style="font-size: 18px; font-weight: 600; margin-bottom: 15px;">
                            <?php echo get_phrase('Today\'s Attendance'); ?>
                        </h4>
                        <div class="attendance-info"
                            style="display: flex; flex-direction: column; align-items: center; justify-content: center;">
                            <h3 style="font-size: 3rem; font-weight: 700; margin-bottom: 10px; color: #fff;">
                                <?php
                                $date = date('Y-m-d');
                                $timestamp = (strtotime($date));
                                $this->db->select('da.*');
                                $this->db->from('students s');
                                $this->db->join('daily_attendances da', 'da.student_id = s.id');
                                $this->db->where('s.parent_id', $parent_data['id']);
                                $this->db->where('da.school_id', $school_id);
                                $this->db->where('da.timestamp', $timestamp);
                                $this->db->where('da.status', 1);
                                $childs_attendances = $this->db->get()->num_rows();

                                if (isset($childs_attendances) && $childs_attendances != '') {
                                    echo $childs_attendances;
                                }
                                ?>
                            </h3>
                            <p style="font-size: 1.25rem; font-weight: 500; margin-bottom: 0; color: #f8f9fa;">
                                <?php
                                if (isset($childs_attendances) && $childs_attendances != '') {
                                    echo $childs_attendances;
                                }
                                ?> <?php echo get_phrase('childs_are_attending_today'); ?>
                            </p>
                        </div>
                    </div>
                </div>

                <script>
                    // Smooth hover effect
                    const card = document.querySelector('.card');
                    card.addEventListener('mouseenter', function () {
                        this.style.transform = 'translateY(-10px)';
                        this.style.boxShadow = '0 15px 30px rgba(0, 0, 0, 0.3)';
                    });
                    card.addEventListener('mouseleave', function () {
                        this.style.transform = 'translateY(0)';
                        this.style.boxShadow = '0 10px 20px rgba(0, 0, 0, 0.15)';
                    });
                </script>

                <!--childs attendance End-->
            </div>
            <div class="col-xl-12">
                <!--Recent events Start-->
                <div class="card boxhover"
                    style="background-color: #035fbd; border-radius: 12px; box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15); transition: all 0.3s ease; overflow: hidden;">
                    <div class="card-body" style="color: #fff; padding: 20px;">
                        <h4 class="header-title"
                            style="font-size: 21px; font-weight: 600; display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                            <?php echo get_phrase('Recent Events'); ?>
                            <a href="<?php echo route('event_calendar'); ?>"
                                style="color: #fff; font-size: 1.25rem; text-decoration: none;">
                                <i class="mdi mdi-export"></i>
                            </a>
                        </h4>
                        <?php include 'event.php'; ?>
                    </div>
                </div>

                <script>
                    // Hover effect
                    const card = document.querySelector('.boxhover');
                    card.addEventListener('mouseenter', function () {
                        this.style.transform = 'translateY(-8px)';
                        this.style.boxShadow = '0 15px 30px rgba(0, 0, 0, 0.2)';
                    });
                    card.addEventListener('mouseleave', function () {
                        this.style.transform = 'translateY(0)';
                        this.style.boxShadow = '0 10px 20px rgba(0, 0, 0, 0.15)';
                    });
                </script>

                <!--Recent events End-->
            </div>
        </div>
    </div><!-- end col-->
</div>

<script>
    $(document).ready(function () {
        initDataTable("expense-datatable");
    });

    $(".widget-flat").mouseenter(function () {
        var id = $(this).attr('id');
        $('#' + id + '_list').show();
    }).mouseleave(function () {
        var id = $(this).attr('id');
        $('#' + id + '_list').hide();
    });
</script>