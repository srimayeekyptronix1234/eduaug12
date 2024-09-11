<style>
    .glass-card {
        background: rgb(255 255 255 / 66%);
        border-radius: 15px;
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
        border: 1px solid rgba(255, 255, 255, 0.3);
        padding: 10px 10px 20px 10px;
    }

    .glass-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2);
    }

    .card-body {
        position: relative;
        z-index: 1;
    }

    .header-title {
        text-transform: uppercase;
        font-weight: 700;
        letter-spacing: 1px;
    }

    p {

        text-align: center;
        color: #000 !important;
        font-size: 16px;
        text-transform: capitalize;
    }

    .text-muted {
        color: #013A7C !important;
        font-size: 18px;
        text-transform: capitalize;
        font-weight: 800;
    }
</style>

<?php
$classroom_walkthrough_data = $this->db->get_where('classroom_walkthrough', array('id' => $param1))->row_array();
$section_data = $this->db->get_where('sections', array('id' => $classroom_walkthrough_data['section_id']))->row_array();
$teacher_data = $this->db->get_where('users', array('id' => $classroom_walkthrough_data['teacher_id'], 'role' => 'teacher'))->row_array();
$class_room_data = $this->db->get_where('class_rooms', array('id' => $classroom_walkthrough_data['class_rooms_id']))->row_array();


?>
<div class="row justify-content-md-center">
    <div class="col-xl-10 col-lg-10 col-md-12 col-sm-12">
        <div class="card shadow-sm" style="border-radius: 15px; overflow: hidden;">
            <div class="card-body p-4" style="background: linear-gradient(135deg, #ffecd2 0%, #fcb69f 100%);">
                <h4 class="header-title text-center mb-4" style="color: #ffffff;
                    font-size: 19px; font-weight: 900; padding: 15px; border-radius: 4px; background: #013A7C;">
                    Classroom Walkthrough Details
                </h4>

                <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="glass-card rounded shadow-sm">
                                <label class="col-form-label text-muted"><?php echo get_phrase('Class:'); ?></label>
                               <?php if (isset($classroom_walkthrough_data['class_id']) && $classroom_walkthrough_data['class_id'] != '') { ?>
                                    <p class="mb-0" style="color: #2c3e50; font-weight: 600;">
                                        <?= $classroom_walkthrough_data['class_id'] . '(' . $section_data['name'] . ')'; ?>
                                    </p>
                               <?php } ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="glass-card rounded shadow-sm">
                                <label class="col-form-label text-muted"><?php echo get_phrase('classrooms:'); ?></label>
                                <?php if (isset($classroom_walkthrough_data['class_rooms_id']) && $classroom_walkthrough_data['class_rooms_id'] != '') { ?>
                                    <p class="mb-0" style="color: #2c3e50; font-weight: 600;">
                                        <?= $class_room_data['name']; ?>
                                    </p>
                                <?php } ?>
                            </div>
                        </div>
                </div>

                <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="glass-card rounded shadow-sm">
                                <label class="col-form-label text-muted"><?php echo get_phrase('Teacher:'); ?></label>
                                <?php if (isset($classroom_walkthrough_data['teacher_id']) && $classroom_walkthrough_data['teacher_id'] != '') { ?>
                                    <p class="mb-0" style="color: #2c3e50; font-weight: 600;">
                                        <?= $teacher_data['name']; ?>
                                    </p>
                                <?php } ?>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="glass-card rounded shadow-sm">
                                <label class="col-form-label text-muted"><?php echo get_phrase('Subject:'); ?></label>
                                <?php if (isset($classroom_walkthrough_data['subject_id']) && $classroom_walkthrough_data['subject_id'] != '') { 
                                   $subject_data=$this->db->get_where('subjects',['id'=>$classroom_walkthrough_data['subject_id']])->row_array();
                                 ?>
                     
                                    <p class="mb-0" style="color: #2c3e50; font-weight: 600;">
                                        <?= $subject_data['name']; ?>
                                    </p>
                                <?php } ?>

                            </div>
                        </div>
                   
                </div>

                <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="glass-card rounded shadow-sm">
                                <label
                                    class="col-form-label text-muted"><?php echo get_phrase('observer name:'); ?></label>
                                <?php if (isset($classroom_walkthrough_data['observer_name']) && $classroom_walkthrough_data['observer_name'] != '') { ?>

                                    <p class="mb-0" style="color: #2c3e50; font-weight: 600;">
                                        <?= $classroom_walkthrough_data['observer_name']; ?>
                                    </p>
                                <?php } ?>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="glass-card rounded shadow-sm">
                                <label
                                    class="col-form-label text-muted"><?php echo get_phrase('classroom layout:'); ?></label>
                               <?php if (isset($classroom_walkthrough_data['classroom_layout']) && $classroom_walkthrough_data['classroom_layout'] != '') { ?>

                                    <p class="mb-0" style="color: #2c3e50; font-weight: 600;">
                                        <?= $classroom_walkthrough_data['classroom_layout']; ?>
                                    </p>
                                <?php } ?>

                            </div>
                        </div>
                </div>
                 <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="glass-card rounded shadow-sm">
                                <label
                                    class="col-form-label text-muted"><?php echo get_phrase('classroom management:'); ?></label>
                                <?php if (isset($classroom_walkthrough_data['classroom_management']) && $classroom_walkthrough_data['classroom_management'] != '') { ?>

                                    <p class="mb-0" style="color: #2c3e50; font-weight: 600;">
                                        <?= $classroom_walkthrough_data['classroom_management']; ?>
                                    </p>
                                <?php } ?>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="glass-card rounded shadow-sm">
                                <label
                                    class="col-form-label text-muted"><?php echo get_phrase('lesson_objective:'); ?></label>
                              <?php if (isset($classroom_walkthrough_data['lesson_objective']) && $classroom_walkthrough_data['lesson_objective'] != '') { ?>

                                    <p class="mb-0" style="color: #2c3e50; font-weight: 600;">
                                        <?= $classroom_walkthrough_data['lesson_objective']; ?>
                                    </p>
                              <?php } ?>

                            </div>
                        </div>
                </div>
                 <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="glass-card rounded shadow-sm">
                                <label
                                    class="col-form-label text-muted"><?php echo get_phrase('instructional strategies:'); ?></label>
                               <?php if (isset($classroom_walkthrough_data['instructional_strategies']) && $classroom_walkthrough_data['instructional_strategies'] != '') { ?>
                                    <p class="mb-0" style="color: #2c3e50; font-weight: 600;">
                                        <?= $classroom_walkthrough_data['instructional_strategies']; ?>
                                    </p>
                               <?php } ?>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="glass-card rounded shadow-sm">
                                <label
                                    class="col-form-label text-muted"><?php echo get_phrase('questioning_techniques:'); ?></label>
                               <?php if (isset($classroom_walkthrough_data['questioning_techniques']) && $classroom_walkthrough_data['questioning_techniques'] != '') { ?>
                                    <p class="mb-0" style="color: #2c3e50; font-weight: 600;">
                                        <?= $classroom_walkthrough_data['questioning_techniques']; ?>
                                    </p>
                               <?php } ?>
                            </div>
                        </div>
                </div>
                <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="glass-card rounded shadow-sm">
                                <label
                                    class="col-form-label text-muted"><?php echo get_phrase('use_resources:'); ?></label>
                               <?php if (isset($classroom_walkthrough_data['use_resources']) && $classroom_walkthrough_data['use_resources'] != '') { ?>
                    
                                <p class="mb-0" style="color: #2c3e50; font-weight: 600;">
                                    <?= $classroom_walkthrough_data['use_resources']; ?>
                                </p>
                              <?php } ?>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="glass-card rounded shadow-sm">
                                <label
                                    class="col-form-label text-muted"><?php echo get_phrase('student_understanding:'); ?></label>
                              <?php if (isset($classroom_walkthrough_data['student_understanding']) && !empty($classroom_walkthrough_data['student_understanding'])) { ?>
                                <p class="mb-0" style="color: #2c3e50; font-weight: 600;">
                                    <?= $classroom_walkthrough_data['student_understanding']; ?>
                                </p>
                             <?php } ?>

                            </div>
                        </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                            <div class="glass-card rounded shadow-sm">
                                <label
                                    class="col-form-label text-muted"><?php echo get_phrase('student_work:'); ?></label>
                               <?php if (isset($classroom_walkthrough_data['student_work']) && $classroom_walkthrough_data['student_work'] != '') { ?>
                    
                                <p class="mb-0" style="color: #2c3e50; font-weight: 600;">
                                    <?= $classroom_walkthrough_data['student_work']; ?>
                                </p>
                              <?php } ?>

                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="glass-card rounded shadow-sm">
                                <label
                                    class="col-form-label text-muted"><?php echo get_phrase('differentiation:'); ?></label>
                             <?php if (isset($classroom_walkthrough_data['differentiation']) && $classroom_walkthrough_data['differentiation'] != '') { ?>
                                <p class="mb-0" style="color: #2c3e50; font-weight: 600;">
                                    <?= $classroom_walkthrough_data['differentiation']; ?>
                                </p>
                            <?php } ?>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>