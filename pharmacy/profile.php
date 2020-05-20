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
 <div class="mdl-grid">
	<div class="mdl-cell mdl-cell--5-col">
 		<?php 
 			$profile = mysqli_query($db, "SELECT * FROM pharmacist WHERE pharmacist_id = '".$_SESSION['pharma_id']."'");
 			if($profile){
 				$count = mysqli_num_rows($profile);
 				if($count == 1) {
 					while($row = mysqli_fetch_assoc($profile)){
 						echo "<h4> Name:</h4>" . $row['fname'] . " " .$row['lname'] . " ";
 						echo "<h4> Date Of Birth: </h4>" . $row['dob'] . "";
 						echo "<h4> Contact: </h4>" . $row['contact'] . "";
 						echo "<h4> Address: </h4>" . $row['address'] . "";
 						echo "<h4> Username: </h4>" . $row['username'] . "";
 					}
 				}
 			}
 		 ?>

 	</div>
 	
 	<div class='mdl-cell mdl-cell--5-col'>
 	<?php 

 		if(isset($_POST['create'])){
 			$pass1 = stripcslashes($_POST['pass2']);
 			$pass2 = stripcslashes($_POST['pass1']);

 			if($pass1 != $pass2) {
 				echo "<div class='alert alert-warning'> Passwords do not match </div>";
 			} elseif ($pass1 == $pass2){

 			$ins = mysqli_query($db, "UPDATE pharmacist SET pass='$pass2' WHERE pharmacist_id = '".$_SESSION['pharma_id']."'");
 			echo "<div class='alert alert-success'> Password created</div>";
 				}
 				
 			}
 	?>
 	<?php 
 	$getpass = mysqli_query($db, "SELECT pass FROM pharmacist WHERE pharmacist_id = '".$_SESSION['pharma_id']."'");
 	if($getpass){
 				$count1 = mysqli_num_rows($getpass);
 				if($count1 == 1) {
 					while($rows = mysqli_fetch_assoc($getpass)){
 	if(empty($rows['pass'])){ echo "
 	<input type='button' class='btn btn-primary' value='Create Password' id='ubutton'/>
 	<div id='upass' style='display: none;'>
 	<form action='' method='POST'>
 	<div class='mdl-textfield mdl-js-textfield mdl-textfield--floating-label'>
 	<input class='mdl-textfield__input' type='password' name='pass1' required='' />
 	<label for='pass1' class='mdl-textfield__label'> Password: </label>
 	</div>
 	<div class='mdl-textfield mdl-js-textfield mdl-textfield--floating-label'>
 	<input class='mdl-textfield__input' type='password' name='pass2' required=''/>
 	<label for='pass2' class='mdl-textfield__label'> Re-Enter Password: </label>
 	</div> <br/> <br/>
 	<button class='mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored' type='submit' name='create'> Submit </button>
 	</form>
 	</div>
 	";} else {
 		echo "
 	<input type='button' class='btn btn-primary' value='Update Password' id='nbutton'/>
 	<div id='newpass' style='display: none;'>
 	<form action='' method='POST'>
 	<div class='mdl-textfield mdl-js-textfield mdl-textfield--floating-label'>
 	<input class='mdl-textfield__input' type='password' name='oldpass' required/>
 	<label for='pass' class='mdl-textfield__label'> Old Password: </label>
 	</div>
 	<div class='mdl-textfield mdl-js-textfield mdl-textfield--floating-label'>
 	<input class='mdl-textfield__input' type='password' name='newpass' required=/>
 	<label for='pass' class='mdl-textfield__label'> New Password: </label>
 	</div>
 	<div class='mdl-textfield mdl-js-textfield mdl-textfield--floating-label'>
 	<input class='mdl-textfield__input' type='password' name='newpass2' required='/>
 	<label for='pass' class='mdl-textfield__label'> Re-Enter New Password: </label>
 	</div> <br/> <br/>
 	<button class='mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored' type='submit' name='update'> Submit </button>
 	</form>
 	</div>";
 	} 
 	} } }?>

 	
 	

 	<script type="text/javascript">
	 	//$(document).ready(function(){
	 	//	$('#upass').hide();
	 	//})
 		$('#ubutton').click(function() {
 			$('#upass').toggle('fast', 'linear', function() {
 				
 			});
 		});
 	</script>

 	<br/> <br/> <br/>

 	<?php 

 		if(isset($_POST['update'])){
 			$oldpass = stripcslashes($_POST['oldpass']);
 			$newpass = stripcslashes($_POST['newpass']);
 			$newpass2 = stripcslashes($_POST['newpass2']);

 			$checkpass = mysqli_query($db, "SELECT pass FROM pharmacist WHERE pharmacist_id = '".$_SESSION['pharma_id']."'");
 			if($checkpass) {
 				while($thepass = mysqli_fetch_assoc($checkpass)) {
 					$selpass = $thepass['pass'];
 				}

 				if($selpass != $oldpass){
 					echo "<div class='alert alert-warning'> Your <strong> old password </strong> is incorrect </div>";
 				}

 				}
 
 			if($newpass != $newpass2) {
 				echo "<div class='alert alert-warning'> Your <strong> new Passwords </strong> do not match </div>";
 			} elseif ($newpass == $newpass2){

 			$ins = mysqli_query($db, "UPDATE pharmacist SET pass='$newpass2' WHERE pharmacist_id = '".$_SESSION['pharma_id']."'");
 			echo "<div class='alert alert-success'> Password updated</div>";
 				}
 				
 			}
 	?>


 	<script type="text/javascript">
	 	//$(document).ready(function(){
	 	//	$('#newpass').hide();
	 	//})
 		$('#nbutton').click(function() {
 			$('#newpass').toggle('fast', 'linear', function() {
 				
 			});
 		});
 	</script>

 	</div>
  </main>
</div>

