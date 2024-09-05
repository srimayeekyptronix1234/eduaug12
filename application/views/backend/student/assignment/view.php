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
$school_id = school_id(); 
$assignment_data = $this->db->get_where('assignment', array('id' => $param1))->row_array();
$section_data = $this->db->get_where('sections', array('id' => $assignment_data['section'], 'class_id' => $assignment_data['class']))->row_array();
$class_data = $this->db->get_where('classes', array('id' => $assignment_data['class']))->row_array();
$subject_data=$this->db->get_where('subjects',['id'=>$assignment_data['subject'],'class_id' =>$assignment_data['class'],'school_id'=>$school_id])->row_array();
?>
<div class="row justify-content-md-center">
    <div class="col-xl-10 col-lg-10 col-md-12 col-sm-12">
        <div class="card shadow-sm" style="border-radius: 15px; overflow: hidden;">
            <div class="card-body p-4" style="background: linear-gradient(135deg, #ffecd2 0%, #fcb69f 100%);">
                <h4 class="header-title text-center mb-4" style="color: #ffffff;
                    font-size: 22px; font-weight: 900; padding: 15px; border-radius: 4px; background: #013A7C;">
                    Assignment Details
                </h4>

                <div class="row mb-3">
                    <?php if (isset($class_data['name']) && $class_data['name'] != '') { ?>
                        <div class="col-md-6">
                            <div class="glass-card rounded shadow-sm">
                                <label class="col-form-label text-muted"><?php echo get_phrase('Class:'); ?></label>
                                <p class="mb-0" style="color: #2c3e50; font-weight: 600;">
                                    <?= $class_data['name']; ?>
                                </p>
                            </div>
                        </div>
                    <?php } ?>
                    <?php if (isset($section_data['name']) && $section_data['name'] != '') { ?>
                        <div class="col-md-6">
                            <div class="glass-card rounded shadow-sm">
                                <label class="col-form-label text-muted"><?php echo get_phrase('Section:'); ?></label>
                                <p class="mb-0" style="color: #2c3e50; font-weight: 600;">
                                    <?= $section_data['name']; ?>
                                </p>
                            </div>
                        </div>
                    <?php } ?>
                </div>

                <div class="row mb-3">
                    <?php if (isset($subject_data['name']) && $subject_data['name'] != '') { ?>
                        <div class="col-md-6">
                            <div class="glass-card rounded shadow-sm">
                                <label class="col-form-label text-muted"><?php echo get_phrase('Subject:'); ?></label>
                                <p class="mb-0" style="color: #2c3e50; font-weight: 600;">
                                    <?= $subject_data['name']; ?>
                                </p>
                            </div>
                        </div>
                    <?php } ?>
                    <?php if (isset($assignment_data['lesson']) && $assignment_data['lesson'] != '') { ?>
                        <div class="col-md-6">
                            <div class="glass-card rounded shadow-sm">
                                <label
                                    class="col-form-label text-muted"><?php echo get_phrase('lesson:'); ?></label>
                                <p class="mb-0" style="color: #2c3e50; font-weight: 600;">
                                    <?= $assignment_data['lesson']; ?>
                                </p>
                            </div>
                        </div>
                    <?php } ?>
                </div>

                <div class="row">
                    <?php if (isset($assignment_data['remark']) && $assignment_data['remark'] != '') { ?>
                        <div class="col-12">
                            <div class="glass-card rounded shadow-sm">
                                <label
                                    class="col-form-label text-muted"><?php echo get_phrase('remark:'); ?></label>
                                <p class="mb-0" style="color: #2c3e50; font-weight: 600;">
                                    <?= $assignment_data['remark']; ?>
                                </p>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>