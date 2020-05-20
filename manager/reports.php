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
	<div class="mdl-grid">

<div class="mdl-cell mdl-cell--7-col">
<h3> Reports </h3> <br/> 
		
		<?php 

 	include "../secure.php";
 	if(isset($_POST['add'])) {
 		$service = $_POST['service'];
 		$patient = $_POST['patient'];
 		$report = $_POST['report'];

 		
 		$query = mysqli_query($db, "INSERT INTO report (service_id, patient_id, report, report_date) VALUES ('".$service."', '".$patient."', '".$report."', now())");

 		if($query) {
 			echo "<div class='alert alert-success'> Report Made </div>";
 		} else {
 			echo mysqli_error($db);
 		}
 	} ?>

 	<input type='button' class='btn btn-primary' value='Write Report' id='ubutton'/> <input type='button' class='btn btn-primary' value='Show Reports' id='urep'/>
 	<div id='upass' style='display: none;'>
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
	<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <label class="col-md-9 control-label" style="float: left;">Patient </label>
    <?php
    $getpatients = mysqli_query($db, "SELECT CONCAT(fname, ' ', lname) AS Name, patient_id FROM patients");
    echo "	
    <select name='patient' class='form-control' class='col-md-9'> Patient 
    <option disabled selected> --Choose Patient-- </option>";
    while($row = mysqli_fetch_array($getpatients)) { 
    	//echo "<option disabled='' selected=''> Staff </option>";
    	echo "<option value='" . $row['patient_id'] . "'>" . $row['Name'] . "</option>";
    }
	echo "</select>";
 if(!$getpatients) {
    	echo mysqli_error($db);
    } ?> 
    </div>
    
  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <label class="col-md-9 control-label" style="float: left;">Service</label>
    <?php
    $getser = mysqli_query($db, "SELECT service_id, service_name AS service FROM services");

    if($getser){

    echo "	
    <select name='service' class='form-control' class='col-md-9'> Service
    <option disabled selected> --Choose Service-- </option>";
    while($rows = mysqli_fetch_array($getser)) { 
    	//echo "<option disabled='' selected=''> Faculty </option>";
    	echo "<option value='" . $rows['service_id'] . "'>" . $rows['service'] . "</option>";
    }
	echo "</select>";
}
if(!$getser) {
    	echo mysqli_error($db);
    } ?>
    </div>
		<div class="mdl-textfield mdl-js-textfield">
		    <p><strong> Write Report </strong></p><textarea class="form-control" name="report" required> </textarea>
		    <label class="mdl-textfield__label" for="report"></label>
		</div>
		<br/> <br/>
		  <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored" type="submit" name="add">
  				Submit
			</button>
	</form>
	</div>
	




		
		<div id="reptab" style='display: none;'>
		<?php
		include ("../database/dbconnect.php");
  
	            $patients = mysqli_query($db, "SELECT patients.patient_id AS id, patients.fname, patients.lname, patients.contact, medical_schemes.scheme_name, provider.provider_name, report.report, report.report_id FROM patients, medical_schemes, provider, report WHERE patients.scheme_id = medical_schemes.scheme_id AND medical_schemes.provider_id = provider.provider_id AND report.patient_id = patients.patient_id ORDER BY patients.lname");
	            
            
                if($patients) {
                	$result = mysqli_num_rows($patients);
                	echo " <br/><table class='mdl-data-table mdl-js-data-table mdl-shadow--3dp'>
                    <thead>
                    <tr>
					<th class='mdl-data-table__cell--non-numeric'> Name </th>
					<th class='mdl-data-table__cell--non-numeric'> Contact </th>
					<th class='mdl-data-table__cell--non-numeric'> Scheme</th>
					<th class='mdl-data-table__cell--non-numeric'> Provider</th>
					<th class='mdl-data-table__cell--non-numeric'> Report </th>
					
					</tr>
			        </thead>";
	                

						//change this
		 	    while ($rows = mysqli_fetch_array($patients)) {

		 	    	$id = $rows['id'];
		 	    	$rid = $rows['report_id'];
			        echo "<tbody>";
					echo "<tr>";
					echo "<td class='mdl-data-table__cell--non-numeric' data-id1='".$rows['id']."'> <a href='patprof.php?prof=$id'>". $rows['fname'] . " " . $rows['lname'] . "</a></td>"; 
					echo "<td class='mdl-data-table__cell--non-numeric' data-id2='".$rows['id']."'>". $rows['contact'] . "</td>"; 
					echo "<td class='mdl-data-table__cell--non-numeric' data-id2='".$rows['id']."'>". $rows['scheme_name'] . "</td>"; 
					echo "<td class='mdl-data-table__cell--non-numeric' data-id3='".$rows['id']."'>". $rows['provider_name'] . " </td>";   
					echo "<td> <a class='btn btn-sm btn-primary' href='viewrep.php?view=$rid'> View Report </a> </td> "; 
					echo "</tr>";
			        echo "</tbody>";
			       } 

				echo "</table>";
			}

			?>
			</div>
			</div>
			<script type="text/javascript">
    
    $('#ubutton').click(function() {
      $('#upass').toggle('fast', 'linear', function() {
        
      });
      $('#reptab').hide('fast', 'linear', function() {
        
      });

    });

    $('#urep').click(function() {
      $('#reptab').toggle('fast', 'linear', function() {
        
      });

      $('#upass').hide('fast', 'linear', function() {
        
      });

    });
  </script>
 	</div>
 	</main>