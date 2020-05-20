<?php
include "header.php";
?>

<main class="mdl-layout__content" style="padding-left: 2%;" id="home">
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
 		$sname = $_POST['sname'];
 		$stype = $_POST['stype'];
 		$prov = $_POST['provider'];
 		$valid = $_POST['valid'];

 		$fk = mysqli_query($db, "SET FOREIGN_KEY_CHECKS = 0");
 		$query = mysqli_query($db, "INSERT INTO medical_schemes (scheme_name, scheme_type, provider_id, validity) VALUES ('".$sname."', '".$stype."', '".$prov."', '".$valid."')");

 		if($query) {
 			echo "<div class='alert alert-success'> Medical Scheme Added </div>";
 		} else {
 			echo mysqli_error($db);
 		}
 	} ?>

 	<?php 

 	include "../secure.php";
 	if(isset($_POST['addp'])) {
 		$pname = $_POST['pname'];
 		$addr = $_POST['address'];
 		$email = $_POST['email'];
 		$cont = $_POST['contact'];

 		$fk = mysqli_query($db, "SET FOREIGN_KEY_CHECKS = 0");
 		$query = mysqli_query($db, "INSERT INTO provider (provider_name, address, email, contact) VALUES ('".$pname."', '".$addr."', '".$email."', '".$cont."')");

 		if($query) {
 			echo "<div class='alert alert-success'> Medical Scheme Provider Added </div>";
 		} else {
 			echo mysqli_error($db);
 		}
 	} ?>
 		<input type='button' class='btn btn-primary' value='Add Scheme' id='ubutton'/> <input type='button' class='btn btn-primary' value='Add Provider' id='pbutton'/>
 		<div id='upass' style='display: none;'>
		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
		  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
		    <input class="mdl-textfield__input" type="text" name="sname" required>
		    <label class="mdl-textfield__label" for="Scheme Name">Scheme Name </label>
		  </div>
		  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
		    <input class="mdl-textfield__input" type="text" name="stype" required>
		    <label class="mdl-textfield__label" for="Scheme Type" >Scheme Type </label>
		  </div>
		  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
		    <label class="col-md-9 control-label" style="float: left;">Provider</label>
		    <?php
		    $getsch = mysqli_query($db, "SELECT provider_id AS S_ID, provider_name AS provider FROM provider");

		    if($getsch){

		    echo "	
		    <select name='provider' class='form-control' class='col-md-9'> Provider
		    <option disabled selected> --Choose Provider-- </option>";
		    while($rows = mysqli_fetch_array($getsch)) { 
		    	//echo "<option disabled='' selected=''> Faculty </option>";
		    	echo "<option value='" . $rows['S_ID'] . "'>" . $rows['provider'] . "</option>";
		    }
			echo "</select>";
		}
		if(!$getsch) {
		    	echo mysqli_error($db);
		    } ?>
		  </div>
		  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
		    <input class="mdl-textfield__input" type="text" name="valid" required>
		    <label class="mdl-textfield__label" for="Validity" >Validity </label>
		  </div> <br/> <br/>
		  <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored" type="submit" name="add">
  				Submit
			</button>	  
	</form>
	</div>
	
 		<div id='ppass' style='display: none;'>
		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
		  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
		    <input class="mdl-textfield__input" type="text" name="pname" required>
		    <label class="mdl-textfield__label" for="Provider Name">Provider Name </label>
		  </div>
		  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
		    <input class="mdl-textfield__input" type="text" name="address" required>
		    <label class="mdl-textfield__label" for="Scheme Name">Address </label>
		  </div>
		  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
		    <input class="mdl-textfield__input" type="email" name="rmail" required>
		    <label class="mdl-textfield__label" for="Scheme Name">Email </label>
		  </div>
		  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
		    <input class="mdl-textfield__input" type="number" name="contact" required>
		    <label class="mdl-textfield__label" for="contact">Contact </label>
		  </div>
		  <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored" type="submit" name="addp">
  				Submit
			</button>	  
	</form>
	</div>
	</div>
	

	<script type="text/javascript">
 		$('#ubutton').click(function() {
 			$('#upass').toggle('fast', 'linear', function() {
 				
 			});
 		});

 		$('#pbutton').click(function() {
 			$('#ppass').toggle('fast', 'linear', function() {
 				
 			});
 		});
 	</script>


		<div class="mdl-cell mdl-cell--7-col" style="padding-left: 1%;">
		<h3> Medical Schemes </h3>

		<?php 
		if(isset($_GET['del'])){
			$delsch = $_GET['del'];

			$fk = mysqli_query($db,"SET FOREIGN_KEY_CHECKS = 0");

			$delete = mysqli_query($db, "DELETE FROM medical_schemes WHERE scheme_id = '".$delsch."'");

			if($delete == TRUE) {
				echo "<div class='alert alert-warning'> Scheme removed </div>";
			} 
		} 

	?>

		<?php
		include ("../database/dbconnect.php");
	            $scheme = mysqli_query($db, "SELECT * FROM `medical_schemes` JOIN provider ON medical_schemes.provider_id = provider.provider_id ORDER BY scheme_name");
            
                if($scheme) {
                	$result = mysqli_num_rows($scheme);

	                echo "<table class='table table-hover'>
                    <thead>
                    <tr>
					<th> Name </th>
					<th> Type</th>
					<th> Provider</th>
					</tr>
			        </thead>";

						//change this
			    while ($rows = mysqli_fetch_array($scheme)) {
			    	$id = $rows['scheme_id'];
			        echo "<tbody>";
					echo "<tr>";
					echo "<td >". $rows['scheme_name'] . "</td>"; 
					echo "<td >". $rows['scheme_type'] . "</td>"; 
					echo "<td >". $rows['provider_name'] . "</td>";
					//echo "<td><form action='edit.php' method='get'> <input type='hidden' name='view' value='".$id."'/><input type='submit' class='btn btn-primary btn-sm' value='Edit'/> </form></td> ";
					echo "<td> <a class='btn btn-primary btn-sm' href='edit.php?view=$id'> Edit </a></td> ";
					echo "<td> <a class='btn btn-primary btn-sm' href='schemes.php?del=$id'> Remove </a></td> ";
					echo "</tr>";
			        echo "</tbody>";
			       }

			       echo "</table>";
			      }

				

			?>
		</div>