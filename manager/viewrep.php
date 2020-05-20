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

		

		<?php
				if(isset($_GET['view'])){
					$id = $_GET['view'];
					$data = mysqli_query($db, "SELECT patients.patient_id AS id, CONCAT (patients.fname, ' ',  patients.lname) AS name, patients.contact, medical_schemes.scheme_name, provider.provider_name, report.report, report.report_id FROM patients, medical_schemes, provider, report WHERE patients.scheme_id = medical_schemes.scheme_id AND medical_schemes.provider_id = provider.provider_id AND report.patient_id = patients.patient_id AND report.report_id = '".$id."'");

					if($data){
						
						$countdata = mysqli_num_rows($data);
						if($countdata >= 1) {
							while($row = mysqli_fetch_array($data)){
								echo "<h4>". $row['name'] . "'s report <br/> </h4>";
								echo "<p><b> Contact: </b>". $row['contact'] . "</p>";
								echo "<p><b> Scheme: </b>". $row['scheme_name'] . "</p>";
								echo "<p><b> Provider: </b>". $row['provider_name'] . "</p>";
								echo "<p><b> Report: </b>". $row['report'] . "</p>";
								echo "<hr/>";
							}
						} else {
							echo "<h4> No reports </h4>";
						}
					}
				}

		?>

		</div>
	</div>
	</main>
