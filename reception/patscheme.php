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
<div class="page-content">
<nav aria-label="...">
          <ul class="pager">
            <li class="previous"><a href="patienthome.php"><span aria-hidden="true">&larr;</span> Back </a></li>
            
          </ul>
        </nav>
<div class="mdl-layout-spacer"></div>
<div class="mdl-layout-spacer"></div>
<br/>

<div class="mdl-grid">


<?php 
	$getpatients = mysqli_query($db, "SELECT CONCAT(fname, ' ', lname) AS Name FROM patients");
?>

  <div class="mdl-cell mdl-cell--7-col">

  <?php 
require "../secure.php";
        if(isset($_POST['add'])) {
            $patient = $_POST['patient'];
            $scheme = $_POST['scheme'];
            $check = mysqli_query($db, "SELECT scheme_id, patient_id FROM patients WHERE patient_id = '$patient'");
            $result = mysqli_num_rows($check);

            if($result == 1) {
                echo "<div class='alert alert-warning'>That patient already belongs to that scheme</div>";
            } else {

            $fk = mysqli_query($db, "SET FOREIGN_KEY_CHECKS = 0");

            $query = mysqli_query($db, "UPDATE patients SET scheme_id = '$scheme' WHERE CONCAT(fname, ' ', lname) = '$patient'");

            if($query === TRUE) {
                echo "<div class='alert alert-success'> Patient added to scheme</div>";
            } else {
                echo "<div class='alert alert-danger'>Error: " . mysqli_error($db) . "</div>";
            }
        } 
    } 

?>

	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
	<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <label class="col-md-9 control-label" style="float: left;">Patient </label>
    <?php

    echo "	
    <select name='patient' class='form-control' class='col-md-9'> Patient 
    <option disabled selected> --Choose Patient-- </option>";
    while($row = mysqli_fetch_array($getpatients)) { 
    	//echo "<option disabled='' selected=''> Staff </option>";
    	echo "<option value='" . $row['Name'] . "'>" . $row['Name'] . "</option>";
    }
	echo "</select>";
 if(!$getpatients) {
    	echo mysqli_error($db);
    } ?> 
    </div>
    
  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <label class="col-md-9 control-label" style="float: left;">Scheme</label>
    <?php
    $getsch = mysqli_query($db, "SELECT scheme_id AS S_ID, scheme_name AS Scheme FROM medical_schemes");

    if($getsch){

    echo "	
    <select name='scheme' class='form-control' class='col-md-9'> Scheme
    <option disabled selected> --Choose Scheme-- </option>";
    while($rows = mysqli_fetch_array($getsch)) { 
    	//echo "<option disabled='' selected=''> Faculty </option>";
    	echo "<option value='" . $rows['S_ID'] . "'>" . $rows['Scheme'] . "</option>";
    }
	echo "</select>";
}
if(!$getsch) {
    	echo mysqli_error($db);
    } ?>
    </div>
    <br/> <br/>
		  <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored" type="submit" name="add">
  				Submit
			</button>	  
	</form>
</div>