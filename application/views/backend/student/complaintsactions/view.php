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
$complaint_data = $this->db->get_where('complaint', array('id' => $param1))->row_array();
$section_data = $this->db->get_where('sections', array('id' => $complaint_data['section_id'], 'class_id' => $complaint_data['class_id']))->row_array();
$student_data = $this->db->get_where('users', array('id' => $complaint_data['student_id'], 'role' => 'student'))->row_array();
$teacher_data = $this->db->get_where('users', array('id' => $complaint_data['teacher_id'], 'role' => 'teacher'))->row_array();

?>
<div class="row justify-content-md-center">
    <div class="col-xl-10 col-lg-10 col-md-12 col-sm-12">
        <div class="card shadow-sm" style="border-radius: 15px; overflow: hidden;">
            <div class="card-body p-4" style="background: linear-gradient(135deg, #ffecd2 0%, #fcb69f 100%);">
                <h4 class="header-title text-center mb-4" style="color: #ffffff;
                    font-size: 22px; font-weight: 900; padding: 15px; border-radius: 4px; background: #013A7C;">
                    Complaint Details
                </h4>

                <div class="row mb-3">
                    <?php if (isset($complaint_data['class_id']) && $complaint_data['class_id'] != '') { ?>
                        <div class="col-md-6">
                            <div class="glass-card rounded shadow-sm">
                                <label class="col-form-label text-muted"><?php echo get_phrase('Class:'); ?></label>
                                <p class="mb-0" style="color: #2c3e50; font-weight: 600;">
                                    <?= $complaint_data['class_id'] . '(' . $section_data['name'] . ')'; ?>
                                </p>
                            </div>
                        </div>
                    <?php } ?>
                    <?php if (isset($complaint_data['student_id']) && $complaint_data['student_id'] != '') { ?>
                        <div class="col-md-6">
                            <div class="glass-card rounded shadow-sm">
                                <label class="col-form-label text-muted"><?php echo get_phrase('Student:'); ?></label>
                                <p class="mb-0" style="color: #2c3e50; font-weight: 600;">
                                    <?= $student_data['name']; ?>
                                </p>
                            </div>
                        </div>
                    <?php } ?>
                </div>

                <div class="row mb-3">
                    <?php if (isset($complaint_data['teacher_id']) && $complaint_data['teacher_id'] != '') { ?>
                        <div class="col-md-6">
                            <div class="glass-card rounded shadow-sm">
                                <label class="col-form-label text-muted"><?php echo get_phrase('Teacher:'); ?></label>
                                <p class="mb-0" style="color: #2c3e50; font-weight: 600;">
                                    <?= $teacher_data['name']; ?>
                                </p>
                            </div>
                        </div>
                    <?php } ?>
                    <?php if (isset($complaint_data['complaint_type']) && $complaint_data['complaint_type'] != '') { ?>
                        <div class="col-md-6">
                            <div class="glass-card rounded shadow-sm">
                                <label
                                    class="col-form-label text-muted"><?php echo get_phrase('Complaint Type:'); ?></label>
                                <p class="mb-0" style="color: #2c3e50; font-weight: 600;">
                                    <?= $complaint_data['complaint_type'] == '1' ? 'Major' : 'Minor'; ?>
                                </p>
                            </div>
                        </div>
                    <?php } ?>
                </div>

                <div class="row mb-3">
                    <?php if (isset($complaint_data['complaint_by']) && $complaint_data['complaint_by'] != '') { ?>
                        <div class="col-md-6">
                            <div class="glass-card rounded shadow-sm">
                                <label class="col-form-label text-muted"><?php echo get_phrase('Complaint By:'); ?></label>
                                <p class="mb-0" style="color: #2c3e50; font-weight: 600;">
                                    <?= $complaint_data['complaint_by']; ?>
                                </p>
                            </div>
                        </div>
                    <?php } ?>
                    <?php if (isset($complaint_data['complaint_date']) && $complaint_data['complaint_date'] != '') { ?>
                        <div class="col-md-6">
                            <div class="glass-card rounded shadow-sm">
                                <label
                                    class="col-form-label text-muted"><?php echo get_phrase('Complaint Date:'); ?></label>
                                <p class="mb-0" style="color: #2c3e50; font-weight: 600;">
                                    <?= $complaint_data['complaint_date']; ?>
                                </p>
                            </div>
                        </div>
                    <?php } ?>
                </div>

                <div class="row">
                    <?php if (isset($complaint_data['complaint_desc']) && $complaint_data['complaint_desc'] != '') { ?>
                        <div class="col-12">
                            <div class="glass-card rounded shadow-sm">
                                <label
                                    class="col-form-label text-muted"><?php echo get_phrase('Complaint Description:'); ?></label>
                                <p class="mb-0" style="color: #2c3e50; font-weight: 600;">
                                    <?= $complaint_data['complaint_desc']; ?>
                                </p>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>