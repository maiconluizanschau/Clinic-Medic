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
	<div class="mdl-cell mdl-cell--6-col">
	
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
 		
 		
		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
		      <div class="mdl-textfield mdl-js-textfield">
		    <p><strong> Write Report </strong></p><textarea class="form-control" name="test" required> </textarea>
		    <label class="mdl-textfield__label" for="test"></label>
			</div>


		  
		  <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored" type="submit" name="add">
  				Submit
			</button>	  
	</form>
	</div>