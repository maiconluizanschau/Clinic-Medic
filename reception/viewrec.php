<?php
	include "header.php";

	
?>

 <main class="mdl-layout__content" style="padding-left: 5%;" id="home">
<script type="text/javascript">
	 	
 		$('#search').click(function() {
 			$('#home').toggle('fast', 'linear', function() {
 				
 			});
 		});
 	</script>
 	<div class="mdl-layout-spacer"></div>
	<div class="mdl-grid">
	
		<div class="mdl-cell mdl-cell--7-col">

		<nav aria-label="...">
		  <ul class="pager">
		    <li class="previous"><a href="viewpatient.php"><span aria-hidden="true">&larr;</span> Back </a></li>
		    
		  </ul>
		</nav>

		<?php
				if(isset($_GET['view'])){
					$id = $_GET['view'];
					$data = mysqli_query($db, "SELECT CONCAT (patients.fname, ' ', patients.lname) AS name, services.service_name AS service, services.charge, drugs.drug_name AS drug, drugs.price, consultations.consultation_date AS day, consultations.test_results AS test, consultations.consultation_results AS diagnosis, SUM(services.charge + drugs.price) AS total FROM patients, services, drugs, consultations WHERE patients.patient_id = consultations.patient_id AND services.service_id = consultations.service_id AND drugs.drug_id = consultations.drug_id AND patients.patient_id = '".$id."'");

					if($data){
						
						$countdata = mysqli_num_rows($data);
						if($countdata >= 1) {
							while($row = mysqli_fetch_array($data)){
								echo "<h4>". $row['name'] . "'s records <br/> </h4>";
								echo "<p><b> Service: </b>". $row['service'] . "</p>";
								echo "<p><b> Service Charge: </b>". $row['charge'] . "</p>";
								echo "<p><b> Medication given: </b>". $row['drug'] . "</p>";
								echo "<p><b> Medicine price: </b>". $row['price'] . "</p>";
								echo "<p><b> Day: </b>". $row['day'] . "</p>";
								echo "<p><b> Test Results: </b>". $row['test'] . "</p>";
								echo "<p><b> Diagnosis: </b>". $row['diagnosis'] . "</p>";
								echo "<hr/>";
								echo "<h4><b> Total: </b>". $row['total'] . "</h4>";
							}
						} else {
							echo "<h4> No health records </h4>";
						}
					}
				}

		?>

		</div>
	</div>
	</main>
