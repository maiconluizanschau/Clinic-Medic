<?php
  include "header.php";
?>

 <main class="mdl-layout__content" style="padding-left: 5%;">
  <div class="mdl-layout-spacer"></div>
  <div class="mdl-grid">

   
    <div class="mdl-cell mdl-cell--7-col" id="home">
<script type="text/javascript">
    
    $('#search').click(function() {
      $('#home').toggle('fast', 'linear', function() {
        
      });
    });
  </script>

  <h3> Consultations </h3>
  <?php 
    $data = mysqli_query($db, "SELECT CONCAT (patients.fname, ' ', patients.lname) AS name, patients.patient_id, services.service_name AS service, services.charge, consultations.consultation_date AS day, consultations.test_results AS test, consultations.consultation_results AS diagnosis, consultations.drug_id AS drug FROM patients, services, consultations WHERE patients.patient_id = consultations.patient_id AND services.service_id = consultations.service_id");

          if($data){
            echo "<table class='mdl-data-table mdl-js-data-table mdl-shadow--3dp'>
            <thead>
            <tr>
            <th> Patient </th>
            <th> Service </th>
            <th> Charge </th>
            <th> Pre-consultation Test Results </th>
            <th> Diagnosis </th>
            </tr> </thead> ";
        
            $countdata = mysqli_num_rows($data);
            if($countdata >= 1) {
              while($row = mysqli_fetch_array($data)){
                $id = $row['patient_id'];
                echo "<tbody>";
                echo "<tr>";
                echo "<td>". $row['name'] . "</td>";
                echo "<td>". $row['service'] . "</td>";
                echo "<td>". $row['charge'] . "</td>";
                echo "<td>". $row['test'] . "</td>";
                echo "<td>". $row['diagnosis'] . "</td>";

                  $rep = mysqli_query($db, "SELECT report.patient_id AS rid, patients.patient_id FROM report, patients WHERE report.patient_id = patients.patient_id");
                  if($rep){
                    $countrep = mysqli_num_rows($rep); 
                      if ($countrep >= 1) {
                              #continue as it is
                      } else {
                    
                echo "<td> <a class='btn btn-primary btn-sm' href='viewrec.php?view=$id'> Create Report </a></td> ";} } }
                echo "</tr>";
                echo "</tbody>";
              echo "</table>";
                } else {
              echo "<h4> No consultations today </h4>";
            }
        } 
     
  ?>
</div>
</div>
  </main>
</div>