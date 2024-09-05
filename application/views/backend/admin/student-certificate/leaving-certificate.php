<?php
  if ($action == 'pdf') {
    $action = get_phrase('export_pdf');
  }else{
    $action = get_phrase($action);
  }
  if ($selected_class == 'all') {
    $classNameForTitle = get_phrase('all_class');
  }else{
    $class_details = $this->crud_model->get_classes($selected_class)->row_array();
    $classNameForTitle = $class_details['name'];
  }
  if ($selected_status == 'all') {
    $selectedStatusForTitle = get_phrase('all');
  }else{
    $selectedStatusForTitle = ucfirst($selected_status);
  }

  //$subject = $this->db->get_where('enrols', array('student_id' => $student_id))->result_array();
  $enroll_details = $this->db->get_where('enrols', array('student_id' => $student_id))->row_array();
  $student_classID = $enroll_details['class_id'];

  $section_details = $this->db->get_where('sections', array('class_id' => $student_classID))->row_array();

  $subject_list = $this->db->get_where('subjects', array('class_id' => $student_classID))->result_array();
  
  // Get school details
  $school_details = $this->db->get_where('schools', array('id' => school_id()))->row_array();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $action.' '.get_phrase('school_leaving_certificate'); ?></title>
  <link rel="shortcut icon" href="<?php echo $this->settings_model->get_favicon(); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f7f7f7;
            font-family: 'Times New Roman', serif;
        }
        .certificate {
            background: white;
            padding: 40px;
            border-radius: 15px;
            max-width: 1000px;
            margin: 20px auto;
            position: relative;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
            border: 15px solid #d4af37; 
            background-image: 
                url('https://www.svgrepo.com/download/1154/floral-design-of-asymmetric-shape.svg'),
                url('https://www.svgrepo.com/download/1154/floral-design-of-asymmetric-shape.svg'),
                url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none"><path fill="%23d9d9d9" fill-opacity="0.2" d="M0 0 L100 0 L100 100 Z"/><path fill="%23d9d9d9" fill-opacity="0.2" d="M0 100 L100 0 L0 0 Z"/></svg>');
            background-repeat: no-repeat, no-repeat, no-repeat;
            background-position: top left, bottom right, center;
            background-size: 15%, 15%, cover;
            overflow: hidden;
        }
        .certificate-header, .certificate-body, .footer {
            position: relative;
            z-index: 1;
        }
        .certificate-header svg {
            max-height: 100px;
        }
        .certificate-header h1 {
            font-family: 'Garamond', serif;
            font-size: 2.5rem;
            font-weight: bold;
            color: #d4af37;
        }
        .certificate-title {
            text-align: center;
            margin-bottom: 20px;
            font-family: 'Garamond', serif;
            font-size: 2rem;
        }
        .certificate-body p {
            font-size: 1.2rem;
            line-height: 1.6;
        }
        .section-title {
            font-weight: bold;
            font-size: 1.5rem;
            margin-top: 20px;
            text-decoration: underline;
        }
        .signature {
            margin-top: 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .signature div {
            text-align: center;
        }
        .footer {
            margin-top: 40px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="certificate">
        <div class="certificate-header text-center">
            <svg width="100" height="100">
                <!-- School Logo by School ID -->
            </svg>
            <h1>St. Xavier High Scool</h1>
            <h2>School Leaving Certificate</h2>
        </div>

        <div class="certificate-body">
            <p><strong>Student Name:</strong> <?php echo $student_details['name'];?></p>
            <p><strong>Student ID:</strong> <?php echo $student_id;?></p>
            <p><strong>Date of Birth:</strong> <?php echo date('jS F Y', $student_details['birthday']);?></p>
            <!-- <p><strong>Class/Sec:</strong> 12th B</p> -->
            <p><strong>Date of Admission:</strong> March 15, 2018</p>
            <p><strong>Date of Leaving:</strong> <?php echo date('jS F Y'); ?></p>
            <p><strong>Reason for Leaving:</strong> Completion of studies</p>

            <h4 class="section-title">Academic Performance</h4>
            <p><?php echo $student_details['name'];?> has successfully completed his schooling with commendable grades. He has demonstrated excellent academic performance and exemplary behavior throughout his years at the school.</p>

            <div class="signature">
                <div>
                    <p>__________________________</p>
                    <p>Principal/Headmaster</p>
                    <p>Date: <?php echo date('jS F Y'); ?></p>
                </div>
                <div>
                    <p>__________________________</p>
                    <p>Class Teacher</p>
                </div>
            </div>

            <div class="footer">
                <p><em><?php echo $school_details['quote'];?></em></p>
                <p>Contact us: <?php echo $school_details['phone'];?> | <?php echo $school_details['email'];?></p>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
