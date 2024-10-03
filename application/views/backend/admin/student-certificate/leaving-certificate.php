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

  $section_details = $this->db->get_where('sections', array('id' => $enroll_details['section_id']))->row_array();

  $subject_list = $this->db->get_where('subjects', array('class_id' => $student_classID))->result_array();
  
  // Get school details
  $school_details = $this->db->get_where('schools', array('id' => school_id()))->row_array();

  $number = $enroll_details['class_id'];
  function addOrdinalSuffix($number) {
    $ends = ['th', 'st', 'nd', 'rd'];
    // Handle special cases: 11th, 12th, 13th
    if (($number % 100 >= 11) && ($number % 100 <= 13)) {
        return $number . 'th';
    } else {
        switch ($number % 10) {
            case 1:
                return $number . $ends[1];
            case 2:
                return $number . $ends[2];
            case 3:
                return $number . $ends[3];
            default:
                return $number . $ends[0];
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>School Leaving Certificate</title>
  </head>
  <body
    style="
      margin: 0;
      padding: 0;
      background-color: #f9f9f9;
      font-family: 'Times New Roman', Times, serif;
    "
  >
    <div
      style="
        border: 15px solid;
        border-image: linear-gradient(to right, #003366, #006699) 1;
        border-radius: 10px;
        padding: 40px;
        max-width: 800px;
        margin: 20px auto;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
        background-color: #ffffff;
        background-image: url('data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22 preserveAspectRatio=%22none%22%3E%3Cpath fill=%22%23d9d9d9%22 fill-opacity=%220.2%22 d=%22M0 0 L100 0 L100 100 Z%22/%3E%3Cpath fill=%22%23d9d9d9%22 fill-opacity=%220.2%22 d=%22M0 100 L100 0 L0 0 Z%22/%3E%3C/svg%3E');
      "
    >
      <h1 style="margin: 0; color: #003366; text-align: center">
        <?php echo $school_details['name'];?>
      </h1>
      <h2 style="margin: 0; color: #003366; text-align: center">
        School Leaving Certificate
      </h2>
      <hr style="border: 1px solid #003366; width: 60%; margin: 10px auto" />

      <p style="margin: 20px 0; text-align: justify">
        This is to certify that <strong><?php echo $student_details['name'];?></strong> has successfully
        completed his studies at our institution and has shown commendable
        performance during his academic journey.
      </p>

      <!-- Student Information Section -->
      <div style="margin: 20px 0">
        <h3 style="color: #003366">Student Information</h3>
        <table style="width: 100%; border-collapse: collapse; margin: 10px 0">
          <tr>
            <th
              style="
                border: 1px solid #003366;
                padding: 10px;
                text-align: left;
                background: linear-gradient(to right, #006699, #003366);
                color: white;
              "
            >
              Student Name
            </th>
            <td
              style="border: 1px solid #003366; padding: 10px; text-align: left"
            >
              <?php echo $student_details['name'];?>
            </td>
          </tr>
          <tr>
            <th
              style="
                border: 1px solid #003366;
                padding: 10px;
                text-align: left;
                background: linear-gradient(to right, #006699, #003366);
                color: white;
              "
            >
              Student ID
            </th>
            <td
              style="border: 1px solid #003366; padding: 10px; text-align: left"
            >
              <?php echo $student_id;?>
            </td>
          </tr>
          <tr>
            <th
              style="
                border: 1px solid #003366;
                padding: 10px;
                text-align: left;
                background: linear-gradient(to right, #006699, #003366);
                color: white;
              "
            >
              Date of Birth
            </th>
            <td
              style="border: 1px solid #003366; padding: 10px; text-align: left"
            >
              <?php echo date('F j, Y', $student_details['birthday']);?>
            </td>
          </tr>
          <tr>
            <th
              style="
                border: 1px solid #003366;
                padding: 10px;
                text-align: left;
                background: linear-gradient(to right, #006699, #003366);
                color: white;
              "
            >
              Class/Sec
            </th>
            <td
              style="border: 1px solid #003366; padding: 10px; text-align: left"
            >
              <?php echo addOrdinalSuffix($number); ?> <?php echo $section_details['name'];?>
            </td>
          </tr>
          <tr>
            <th
              style="
                border: 1px solid #003366;
                padding: 10px;
                text-align: left;
                background: linear-gradient(to right, #006699, #003366);
                color: white;
              "
            >
              Date of Admission
            </th>
            <td
              style="border: 1px solid #003366; padding: 10px; text-align: left"
            >
              March 15, 2018
            </td>
          </tr>
          <tr>
            <th
              style="
                border: 1px solid #003366;
                padding: 10px;
                text-align: left;
                background: linear-gradient(to right, #006699, #003366);
                color: white;
              "
            >
              Date of Leaving
            </th>
            <td
              style="border: 1px solid #003366; padding: 10px; text-align: left"
            >
            <?php echo !empty($student_details['leaving_date']) ? date("F j, Y", strtotime($student_details['leaving_date'])) : date('F j, Y');?>
            </td>
          </tr>
          <tr>
            <th
              style="
                border: 1px solid #003366;
                padding: 10px;
                text-align: left;
                background: linear-gradient(to right, #006699, #003366);
                color: white;
              "
            >
              Reason for Leaving
            </th>
            <td
              style="border: 1px solid #003366; padding: 10px; text-align: left"
            >
              <?php echo $student_details['reason_for_leaving'];?>
            </td>
          </tr>
        </table>
      </div>

      <!-- Academic Information Section -->
      <!-- <div style="margin: 20px 0">
        <h3 style="color: #003366">Academic Information</h3>
        <p style="margin: 10px 0; text-align: justify">
          John has successfully completed his schooling with commendable grades.
          He has demonstrated excellent academic performance and exemplary
          behavior throughout his years at the school.
        </p>
      </div> -->

      <!-- Academic Performance Section -->
      <div style="margin: 20px 0">
        <h3 style="color: #003366">Academic Performance</h3>
        <table style="width: 100%; border-collapse: collapse; margin: 10px 0">
          <tr>
            <th
              style="
                border: 1px solid #003366;
                padding: 10px;
                text-align: left;
                background: linear-gradient(to right, #006699, #003366);
                color: white;
              "
            >
              Performance Summary
            </th>
            <td
              style="border: 1px solid #003366; padding: 10px; text-align: left"
            >
              <?php echo $student_details['academic_performance'];?>
            </td>
          </tr>
        </table>
      </div>

      <div
        style="display: flex; justify-content: space-between; margin-top: 40px"
      >
        <div style="width: 45%; text-align: center">
          <p>__________________________</p>
          <p><b>Principal/Headmaster</b></p>
          <p>Date: <?php echo date('F j, Y'); ?></p>
        </div>
        <div style="width: 45%; text-align: center">
          <p>__________________________</p>
          <p><b>Class Teacher</b></p>
        </div>
      </div>

      <div style="margin-top: 40px; text-align: center">
        <i
          ><?php echo $school_details['quote'];?></i
        >
        <p>Contact us: <?php echo $school_details['phone'];?> | <?php echo $school_details['email'];?></p>
      </div>
    </div>
  </body>
</html>
