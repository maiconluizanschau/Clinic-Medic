<?php
include "header.php"; ?>
?>

 <main class="mdl-layout__content" style="padding-left: 5%;" id="home">
<script type="text/javascript">
	 	
 		$('#search').click(function() {
 			$('#home').toggle('fast', 'linear', function() {
 				
 			});
 		});
 	</script>
<nav aria-label="...">
		  <ul class="pager">
		    <li class="previous"><a href="patienthome.php"><span aria-hidden="true">&larr;</span> Back </a></li>
		    
		  </ul>
		</nav>
 	<h2> Add Patients </h2>
 	<!-- Textfield with Floating Label -->
 	
		
			<div class="mdl-grid">
			<div class="mdl-cell mdl-cell--4-col">
 	<?php
 	include "../secure.php";
 	if(isset($_POST['addpat'])) {
 		$fname = $_POST['fname'];
 		$lname = $_POST['lname'];
 		$dob = $_POST['dob'];
 		$address = $_POST['address'];
 		$contact = $_POST['contact'];
 		$dep = $_POST['dep'];
 		$email = $_POST['email'];
 		$condep = $_POST['condep'];
 		$sex = $_POST['sex'];

 		$fk = mysqli_query($db, "SET FOREIGN_KEY_CHECKS = 0");
 		$query = mysqli_query($db, "INSERT INTO patients (fname, lname, sex, dob, address, contact, email, dependent, dependent_contact) VALUES ('".$fname."', '".$lname."', '".$sex."' '".$dob."', '".$address."', '".$contact."', '".$email."', '".$dep."', '".$condep."')");

 		if($query) {
 			echo "<div class='alert alert-success'> Patient added </div>";
 		} else {
 			echo mysqli_error($db);
 		}
 	} ?>
		

		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
		  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
		    <input class="mdl-textfield__input" type="text" name="fname" required>
		    <label class="mdl-textfield__label" for="First Name">First Name </label>
		  </div>
		  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
		    <input class="mdl-textfield__input" type="text" name="lname" required>
		    <label class="mdl-textfield__label" for="Last Name" >Last Name </label>
		  </div>
		  <div class="mdl-textfield mdl-js-textfield">
		    <p> Date of birth </p><input class="mdl-textfield__input" type="date" name="dob" required>
		    <label class="mdl-textfield__label" for="DOB"></label>
		  </div>
		  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
		    <label class="col-md-9 control-label" style="float: left;">Sex</label>
		    <select name='sex' class='form-control' class='col-md-9'> Sex
		    <option disabled selected> --Gender-- </option>";
		    <option value="Male"> Male </option>
		    <option value="Female"> Female </option>
		    </select>
		    </div> </div>
		    <div class="mdl-layout-spacer"></div>
		<div class="mdl-cell mdl-cell--6-col">
		  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
		    <input class="mdl-textfield__input" type="address" name="address" required>
		    <label class="mdl-textfield__label" for="Address">Address</label>
		  </div>
		
		
		<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
		    <input class="mdl-textfield__input" type="number" name="contact" required>
		    <label class="mdl-textfield__label" for="Contact">Contact Details (Cell) </label>
		  </div>
		  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
		    <input class="mdl-textfield__input" type="email" name="email" required>
		    <label class="mdl-textfield__label" for="Contact">Email </label>
		  </div>
		  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
		    <input class="mdl-textfield__input" type="text" name="dep" required>
		    <label class="mdl-textfield__label" for="Dependent">Dependent </label>
		  </div>
		  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
		    <input class="mdl-textfield__input" type="number" name="condep" required>
		    <label class="mdl-textfield__label" for="Dependent Contact">Dependent Contact </label>
		  </div>
		  </div> <br/> <br/> <br/>
		  	<button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored" type="submit" name="addpat">
  				Submit
			</button>	  
	</form>

</div> </div>

  </main>

