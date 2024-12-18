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
        background: hsl(248, 100%, 97%);
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

<?php $school_data = $this->settings_model->get_current_school_data(); ?>
<div class="row justify-content-md-center">
        <div class="col-xl-10 col-lg-10 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title"><?php echo get_phrase('school_settings') ;?></h4>
                    <form method="POST" class="col-12 schoolForm" action="<?php echo route('school_settings/update') ;?>" id = "schoolForm">
                        <div class="col-12">
                            <div class="form-group row mb-3">
                                <label class="col-md-3 col-form-label" for="school_name"> <?php echo get_phrase('school_name') ;?></label>
                                <div class="col-md-9">
                                    <input type="text" id="school_name" name="school_name" class="form-control"  value="<?php echo $school_data['name'] ;?>" required>
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label class="col-md-3 col-form-label" for="phone"><?php echo get_phrase('phone') ;?></label>
                                <div class="col-md-9">
                                    <input type="text" id="phone" name="phone" class="form-control"  value="<?php echo $school_data['phone'] ;?>" required>
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label class="col-md-3 col-form-label" for="email"><?php echo get_phrase('email') ;?></label>
                                <div class="col-md-9">
                                    <input type="text" id="email" name="email" class="form-control"  value="<?php echo $school_data['email'] ;?>" required>
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label class="col-md-3 col-form-label" for="total_school_days"><?php echo get_phrase('total_school_days') ;?></label>
                                <div class="col-md-9">
                                    <input type="number" id="total_school_days" name="total_school_days" class="form-control"  value="<?php echo $school_data['total_school_days'] ;?>" required>
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label class="col-md-3 col-form-label" for="address"> <?php echo get_phrase('address') ;?></label>
                                <div class="col-md-9">
                                    <textarea class="form-control" id="address" name = "address" rows="5" required><?php echo $school_data['address'] ;?></textarea>
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label class="col-md-3 col-form-label" for="quote"> <?php echo get_phrase('certificate_quote') ;?></label>
                                <div class="col-md-9">
                                    <textarea class="form-control" id="quote" name = "quote" rows="5" required><?php echo $school_data['quote'] ;?></textarea>
                                </div>
                            </div>

                            <div class="form-group mb-1">
                                <label for="image_file"><?php echo get_phrase('upload_principal_signature'); ?></label>
                                <input type="file" class="form-control" id="principal_signature_file" name="principal_signature_file">
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-secondary col-xl-4 col-lg-4 col-md-12 col-sm-12" onclick="updateSchoolInfo()"><?php echo get_phrase('update_settings') ;?></button>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label" for="phone">
                                <?php echo get_phrase('phone'); ?>
                            </label>
                            <div class="col-md-9">
                                <input type="text" id="phone" name="phone" class="form-control"
                                    value="<?php echo $school_data['phone']; ?>" required>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label class="col-md-3 col-form-label" for="address">
                                <?php echo get_phrase('address'); ?>
                            </label>
                            <div class="col-md-9">
                                <textarea class="form-control" id="address" name="address" rows="5"
                                    required><?php echo $school_data['address']; ?></textarea>
                            </div>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-secondary col-xl-4 col-lg-4 col-md-12 col-sm-12 filbtn"
                                onclick="updateSchoolInfo()">
                                <?php echo get_phrase('update_settings'); ?>
                            </button>
                        </div>
                    </div>
                </form>
            </div> <!-- end card body-->
        </div>
        <!-- end card -->
    </div>
</div>