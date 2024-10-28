<?php
$user_details = $this->db->get_where('users', array('id' => $param1))->row_array();
?>

    <style>
      body {
        background-color: transparent;
        font-family: "Verdana", sans-serif;
      }

      .id-card-holder {
        width: 225px;
        padding: 4px;
        margin: 0 auto;
        background-color: #1f1f1f;
        border-radius: 5px;
        position: relative;
      }

      .id-card {
        background-image: url("1.jpg");
        background-size: cover; /* Ensures the image covers the entire card */
        background-position: center; /* Centers the image */
        padding: 15px;
        border-radius: 10px;
        text-align: center;
        box-shadow: 0 0 1.5px 0px #b9b9b9;
        position: relative; /* Needed for overlay positioning */
        overflow: hidden; /* Ensures overlay doesn't affect card size */
      }

      .id-card::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgb(255 255 255 / 22%); /* Light white overlay */
        border-radius: 10px; /* Match card border radius */
        z-index: 1; /* Place overlay above background */
      }

      .id-card img {
        margin: 0 auto;
        position: relative; /* Ensure images appear above the overlay */
        z-index: 2; /* Place images above the overlay */
      }

      .header img {
        width: 90px;
      }

      .photo img {
        width: 80px;
        border-radius: 5%;
        border: 3px solid #78b5db;
      }

      h2 {
        font-size: 15px;
        margin: 5px 0;
        position: relative; /* Ensure text appears above overlay */
        z-index: 2;
      }

      h3 {
        font-size: 12px;
        margin: 2.5px 0;
        font-weight: 300;
        position: relative; /* Ensure text appears above overlay */
        z-index: 2;
      }

      p {
        font-size: 6px;
        margin: 3px;
        position: relative; /* Ensure text appears above overlay */
        z-index: 2;
      }
    </style>


<div class="id-card-holder" id="idCard">
    <div class="id-card">
    <div class="header">
        <img src="<?php echo site_url(); ?>uploads/ICardImages/logo.png" alt="University Logo" />
    </div>

    <div class="photo">
        <img src="<?php echo site_url(); ?>uploads/ICardImages/user.jpeg" alt="Student Photo" />
    </div>

    <h2 style="color:green">Prabsaran Singh</h2>

    <h3>Student</h3>
    <h3>Class-VI</h3>
    <h3>BT19GCS121</h3>

    <hr />

    <p><strong>Eduquest University</strong></p>
    <p>3068 Conaway Street,Houston.</p>
    <p>Texas,United Stated <strong>301705</strong></p>
    <p>Ph: 01494-660600, 7073222393</p>
    </div>
</div>

<button onclick="printIDCard()">Print ID Card</button>

<script>
    function printIDCard() {
        const printContents = document.getElementById('idCard').innerHTML;
        const originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
</script>
