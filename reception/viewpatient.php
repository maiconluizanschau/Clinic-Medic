<?php
include "header.php";
?>

<main class="mdl-layout__content" style="padding-left: 0%;" id="home">
<script type="text/javascript">
	 	
 		$('#search').click(function() {
 			$('#home').toggle('fast', 'linear', function() {
 				
 			});
 		});
 	</script>
<div class="mdl-layout-spacer"></div>
<nav aria-label="..." style="padding-left: 2%;">
		  <ul class="pager">
		    <li class="previous"><a href="patienthome.php"><span aria-hidden="true">&larr;</span> Back </a></li>
		    
		  </ul>
		</nav>
	<div class="mdl-grid">


		<div class="mdl-cell mdl-cell--11-col" style="padding-left: 5%;">

		<?php
		include ("../database/dbconnect.php");
  
	            $patients = mysqli_query($db, "SELECT patients.patient_id AS id, patients.fname, patients.lname, patients.dob, patients.sex, patients.address, patients.contact, patients.dependent, patients.dependent_contact, medical_schemes.scheme_name FROM patients JOIN medical_schemes ON patients.scheme_id = medical_schemes.scheme_id ORDER BY patients.lname");
	            echo "<table class='mdl-data-table mdl-js-data-table mdl-shadow--3dp'>
                    <thead>
                    <tr>
					<th class='mdl-data-table__cell--non-numeric'> Name </th>
					<th class='mdl-data-table__cell--non-numeric'> Date of Birth </th>
					<th class='mdl-data-table__cell--non-numeric'> Sex</th>
					<th class='mdl-data-table__cell--non-numeric'> Scheme</th>
					
					</tr>
			        </thead>";
            
                if($patients) {
                	$result = mysqli_num_rows($patients);

	                

						//change this
		 	    while ($rows = mysqli_fetch_array($patients)) {

		 	    	$id = $rows['id'];
			        echo "<tbody>";
					echo "<tr>";
					echo "<td class='mdl-data-table__cell--non-numeric' data-id1='".$rows['id']."'> <a href='patprof.php?prof=$id'>". $rows['fname'] . " " . $rows['lname'] . "</a></td>"; 
					echo "<td class='mdl-data-table__cell--non-numeric' data-id2='".$rows['id']."'>". $rows['dob'] . "</td>"; 
					echo "<td class='mdl-data-table__cell--non-numeric' data-id3='".$rows['id']."'>". $rows['sex'] . " </td>";   
					echo "<td class='mdl-data-table__cell--non-numeric'>". $rows['scheme_name'] . " </td>";
					echo "<td> <a class='btn btn-primary btn-sm' href='viewrec.php?view=$id'> Records </a>";}"</td> "; 
					echo "</tr>";
			        echo "</tbody>";
			       } 

				echo "</table>";

			?>