<?php
  include "header.php";
?>

 <main class="mdl-layout__content" style="padding-left: 5%;">
  <div class="mdl-layout-spacer"></div>
  <div class="mdl-grid">

  
    <div class="mdl-cell mdl-cell--12-col" id="home">
<script type="text/javascript">
    
    $('#search').click(function() {
      $('#home').toggle('fast', 'linear', function() {
        
      });
    });
  </script>

   
  <?php 
    $data = mysqli_query($db, "SELECT CONCAT (patients.fname, ' ', patients.lname) AS name, services.service_name AS service, services.charge, consultations.cons_id, consultations.consultation_date AS day, consultations.test_results AS test, consultations.consultation_results AS diagnosis, consultations.drug_id AS drug FROM patients, services, consultations WHERE patients.patient_id = consultations.patient_id AND services.service_id = consultations.service_id AND consultations.consultation_date >= CURDATE()");

          if($data){
        
            $countdata = mysqli_num_rows($data);
            if($countdata >= 1) {
              echo "<h3> Today's Consultations </h3>
              <table class='table table-striped'>
            <thead>
            <tr>
            <th> Patient </th>
            <th> Service </th>
            <th> Charge </th>
            <th> Pre-consultation Test Results </th>
            <th> Diagnosis </th>
            </tr> </thead> ";
              while($row = mysqli_fetch_array($data)){
                $id = $row['cons_id'];
                echo "<tbody>";
                echo "<tr>";
                echo "<td>". $row['name'] . "</td>";
                echo "<td>". $row['service'] . "</td>";
                echo "<td>". $row['charge'] . "</td>";
                echo "<td>". $row['test'] . "</td>";
                echo "<td>". $row['diagnosis'] . "</td>";
                echo "<td>"; if(empty($row['drug'])){echo"<a class='btn btn-sm btn-primary' href='assign.php?ass=$id'> Assign Medication </a>";} "</td>";
                echo "</tr>";
              }
            } else {
              echo "<h3> No consultations today </h3>";
            }
          }
     
  ?>
</div>
</div>
  </main>
</div>

