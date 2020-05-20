<?php
include "header.php";
?>

<main class="mdl-layout__content" style="padding-left: 1%;" id="home">
<script type="text/javascript">
        
        $('#search').click(function() {
            $('#home').toggle('fast', 'linear', function() {
                
            });
        });
    </script>
<div class="mdl-layout-spacer"></div>
	<div class="mdl-grid">

	
		<div class="mdl-cell mdl-cell--5-col">
		
		<?php 

 	include "../secure.php";
 	if(isset($_POST['add'])) {
 		$patient = $_POST['patient'];
 		$service = $_POST['service'];
 		$test = $_POST['test']; 		
 		$therecep = $_POST['therecep'];
 		$consults = $_POST['consults'];

 		$fk = mysqli_query($db, "SET FOREIGN_KEY_CHECKS = 0");
 		
 		$query = mysqli_query($db, "INSERT INTO consultations (`service_id`, `patient_id`, `consultation_date`, `test_results`, `consultation_results`, `recep_id`) VALUES ('".$service."', '".$patient."', now(), '".$test."', '".$consults."', '".$therecep."')");

 		if($query) {
 			echo "<div class='alert alert-success'> Records Added </div>";
 		} else {
 			echo mysqli_error($db);
 		}
 	} ?>

 	
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
    <input class='mdl-textfield__input' type='hidden' name='therecep' value="<?php echo "".$_SESSION['recep_id'];?>" />

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
		    <p><strong> Pre-Consultation Test Results </strong></p><textarea class="form-control" name="test" required> </textarea>
		    <label class="mdl-textfield__label" for="test"></label>
	</div>
	
	</div>
	<div class="mdl-cell mdl-cell--5-col"> 
	<div class="mdl-textfield mdl-js-textfield">
            <p><strong> Diagnosis and recommended medication </strong></p><textarea class="form-control" name="consults" required> </textarea>
            <label class="mdl-textfield__label" for="consults"></label>
    </div>
    <br/> <br/>
		  <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored" type="submit" name="add">
  				Submit
			</button>	  
	
</div>
</form></div> </div> </main>


</div>