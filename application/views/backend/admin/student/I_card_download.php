<?php
$user_details = $this->db->get_where('users', array('id' => $param1))->row_array();
?>

<div class="card-container" style="display: flex; gap: 20px; flex-wrap: wrap; justify-content: center;">

<div class="id-card-holder" id="idCard" style="width: 280px; padding: 4px; background-color: #1f1f1f; border-radius: 5px; position: relative; text-align: center;">
          <div class="id-card" style="background-image: url('<?php echo site_url(); ?>uploads/ICardImages/3.jpg'); background-size: cover; background-position: center; padding: 15px; border-radius: 10px; text-align: center; box-shadow: 0 0 1.5px 0px #b9b9b9; position: relative; overflow: hidden;">
            <div class="header">
              <img src="<?php echo site_url(); ?>uploads/ICardImages/logo.png" alt="University Logo" style="width: 90px;" />
            </div>
            <div class="photo">
              <label for="card3">
                <img src="<?php echo site_url(); ?>uploads/ICardImages/user.jpeg" alt="Student Photo" style="border-radius: 5%; border: 3px solid #41686b; width: 100px; margin: 6px;" />
              </label>
            </div>
            <h2 style="font-size: 18px; margin: 5px 0; position: relative; z-index: 2; color: #000;">Maria Garcia</h2>
            <h3 style="font-size: 14px; margin: 5.5px 0; font-weight: 500; position: relative; z-index: 2; color: #000;">Student</h3>
            <h3 style="font-size: 14px; margin: 5.5px 0; font-weight: 500; position: relative; z-index: 2; color: #000;">Class-VIII</h3>
            <h3 style="font-size: 14px; margin: 5.5px 0; font-weight: 500; position: relative; z-index: 2; color: #000;">BT19GCS123</h3>
            <hr style="border: 1px dashed #0000003b;">
            <p style="font-size: 12px; margin: 1px; position: relative; z-index: 2; color: #000;"><strong>Eduquest University</strong></p>
            <p style="font-size: 12px; margin: 1px; position: relative; z-index: 2; color: #000;">3068 Conaway Street, Houston.</p>
            <p style="font-size: 12px; margin: 1px; position: relative; z-index: 2; color: #000;">Texas, United States <strong>301705</strong></p>
            <p style="font-size: 12px; margin: 1px; position: relative; z-index: 2; color: #000;">Ph: 01494-660600, 7073222393</p>
          </div>
          <div class="radio-section" style="margin-top: 10px;">
            <input type="radio" name="cardSelection" value="3" id="card3" <?php if ($selectedICardNo == 3) { ?>checked<?php } ?> required />
            <label for="card3" style="display: block; cursor: pointer; color: #fff;">Choose Card 3</label>
          </div>
        </div>

</div>      

<button onclick="printIDCard()">Print ID Card</button>

<script>
    // function printIDCard() {
    //     const printContents = document.getElementById('idCard').innerHTML;
    //     const originalContents = document.body.innerHTML;

    //     document.body.innerHTML = printContents;
    //     window.print();
    //     document.body.innerHTML = originalContents;
    // }

    function printIDCard() {
        // Get the HTML of the card element
        const printContents = document.getElementById('idCard').outerHTML;
        
        // Create a new iframe for printing
        const iframe = document.createElement('iframe');
        document.body.appendChild(iframe);

        // Set iframe properties
        iframe.style.position = 'absolute';
        iframe.style.width = '0';
        iframe.style.height = '0';
        iframe.style.border = 'none';

        // Write the HTML content into the iframe document
        const doc = iframe.contentWindow.document;
        doc.open();
        doc.write(`
            <html>
            <head>
                <style>
                    /* Styles for print */
                    .card-container { display: flex; gap: 20px; flex-wrap: wrap; justify-content: center; }
                    .id-card-holder { width: 280px; padding: 4px; background-color: #1f1f1f; border-radius: 5px; text-align: center; }
                    .id-card { background-size: cover; background-position: center; padding: 15px; border-radius: 10px; text-align: center; box-shadow: 0 0 1.5px 0px #b9b9b9; overflow: hidden; }
                    .header img { width: 90px; }
                    .photo img { border-radius: 5%; border: 3px solid #41686b; width: 100px; margin: 6px; }
                    h2, h3, p { color: #000; }
                    .radio-section label { color: #fff; }
                </style>
            </head>
            <body onload="window.print(); window.close();">
                ${printContents}
            </body>
            </html>
        `);
        doc.close();
    }
</script>
