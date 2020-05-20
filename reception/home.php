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

 	
 	<?php 
		$apps = mysqli_query($db, "SELECT CONCAT(patients.fname, ' ', patients.lname) AS patient, services.service_name AS services, appointments.app_id AS id, appointments.appointment_day AS day, appointments.status FROM patients, services, appointments WHERE patients.patient_id = appointments.patient_id AND services.service_id = appointments.service_id AND appointments.appointment_day = CURDATE() ORDER BY patients.lname");

		if($apps == TRUE){
			$countdata = mysqli_num_rows($apps);
            if($countdata >= 1) {
			echo "
			<h3> Today's Appointments </h3>
			<table class='mdl-data-table mdl-js-data-table mdl-shadow--3dp'>
						<thead>
						<tr>
						<th> Service</th>
						<th> Patient </th>
						<th> Date </th>
						<th> Status </th>
						</tr> </thead> ";
				echo "<tbody>";

			while ($approws = mysqli_fetch_assoc($apps)) {
				$id = $approws['id'];
				$today = $approws['day'];
				
				
				echo"<tr>";
				echo "<td class='mdl-data-table__cell--non-numeric' data-id1='".$approws['id']."'>". $approws['services'] . "</td>";
				echo "<td class='mdl-data-table__cell--non-numeric' data-id2='".$approws['id']."'>". $approws['patient'] . "</td>";
				echo "<td class='mdl-data-table__cell--non-numeric' data-id3='".$approws['id']."'>". $approws['day'] . "</td>";
				echo "<td class='mdl-data-table__cell--non-numeric' data-id4='".$approws['id']."'>". $approws['status'] . "</td>";
				echo "<td>"; if(empty($approws['status'])) { echo "<a class='btn btn-success' href='appointment.php?done=$id'> Done </a> </td>"; echo "<td><a class='btn btn-danger' href='appointment.php?cancel=$id'> Cancel </a>";}"</td> ";  
				echo "</tr>";
				}
				echo "</tbody>";
				echo "</table>";
			} else {
					echo "<h3> No appointments today </h3>";
				}		
	}
	?>
</div>
</div>
  </main>
</div>

