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

	
		<div class="mdl-cell mdl-cell--4-col">
		
		<?php 

 	include "../secure.php";
 	if(isset($_POST['add'])) {
 		$service = $_POST['service'];
 		$patient = $_POST['patient'];
 		$date = $_POST['day'];
 		$pname = $_POST['pname'];
 		$reminder = $_POST['reminder'];

 		
 		
 		$query = mysqli_query($db, "INSERT INTO appointments (service_id, patient_id, appointment_day, reminder) VALUES ('".$service."', '".$patient."', '".$date."', '".$reminder."')");

 		if($query) {

 			$getmail = mysqli_query($db, "SELECT patients.email, appointments.appointment_day FROM patients, appointments WHERE appointments.patient_id = patients.patient_id AND appointments.patient_id = '".$patient."'");
			  if($getmail) {
			    $result = mysqli_num_rows($getmail);
			    if($result == 1) {
			    while($themail = mysqli_fetch_assoc($getmail)){
			      $email = $themail['email'] ;
			      $appday = $themail['appointment_day'] ;
			       
			      require '../PHPMailer/PHPMailerAutoload.php';
			          $mail = new PHPMailer(true);

			          //$mail->SMTPDebug = 3;                               // Enable verbose debug output

			          $mail->isSMTP();                                      // Set mailer to use SMTP
			          $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
			          $mail->SMTPAuth = true;                               // Enable SMTP authentication
			          $mail->Username = 'webentgroup3@gmail.com';                 // SMTP username
			          $mail->Password = 'webenterprise3';                           // SMTP password
			          $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
			          $mail->Port = 587;                                    // TCP port to connect to

			          $mail->setFrom('wenentgroup3@gmail.com', 'The Clinic');
			          $mail->addAddress(''.$email.'');     // Add a recipient
			          //$mail->addReplyTo('webentgroup3@gmail.com', 'Web Group');

			          $mail->isHTML(true);                                  // Set email format to HTML

			          $mail->Subject = 'Appointment Reminder';
			          $mail->Body    = "Dear '".$email."', a quick reminder that you scheduled an appointment at the on clinic on '".$appday."' ";

			          if(!$mail->send()) {
			              echo "<p class='alert alert-danger'>Message could not be sent.</p>";
			              echo "<p class='alert alert-danger'>Mailer Error: " . $mail->ErrorInfo . "</p>";
			          } else {
			              echo "<p class='alert alert-success'> Message has been sent </p>";
			          }
			      } 
			      }
			    }
 			echo "<div class='alert alert-success'> Appointment Set </div>";
 		} else {
 			echo mysqli_error($db);
 		}
 	} ?>

 	<input type='button' class='btn btn-primary' value='Book Appointment' id='ubutton'/>
 	<div id='upass' style='display: none;'>
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
	<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
		    <input class="mdl-textfield__input" type="text" name="pname">
		    <label class="mdl-textfield__label" for="Pat Name">Patient Name (Not on scheme): </label>
	</div>
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
		    <p> Date </p><input class="mdl-textfield__input" type="date" name="day" required>
		    <label class="mdl-textfield__label" for="date"></label>
	</div>
	<div class="mdl-textfield mdl-js-textfield">
		    <p> Date of Reminder</p><input class="mdl-textfield__input" type="date" name="reminder">
		    <label class="mdl-textfield__label" for="reminder"></label>
	</div>
    <br/> <br/>
		  <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored" type="submit" name="add">
  				Submit
			</button>	  
	</form>
</div>
</div>
	

	<script type="text/javascript">
	 	//$(document).ready(function(){
	 	//	$('#upass').hide();
	 	//})
 		$('#ubutton').click(function() {
 			$('#upass').toggle('fast', 'linear', function() {
 				
 			});
 		});
 	</script>

<div class="mdl-cell mdl-cell--6-col"> 
<h3> Appointments </h3>

<?php
	if(isset($_GET['done'])) {
		$app = $_GET['done'];
		$done = mysqli_query($db, "UPDATE appointments SET status = 'Done' WHERE app_id = '".$app."'");
		echo "<div class ='alert alert-success'>Appointment done</div>";
	}
?>

<?php

		if(isset($_GET['cancel'])) {
			$app1 = $_GET['cancel'];
			$cancel = mysqli_query($db, "UPDATE appointments SET status = 'Cancelled' WHERE app_id = '".$app1."'");
			echo "<div class ='alert alert-warning'> Appointment Cancelled </div>";
		}
?>

	<?php 
		$apps = mysqli_query($db, "SELECT CONCAT(patients.fname, ' ', patients.lname) AS patient, services.service_name AS services, appointments.app_id AS id, appointments.appointment_day AS day, appointments.status FROM patients, services, appointments WHERE patients.patient_id = appointments.patient_id AND services.service_id = appointments.service_id ORDER BY appointments.appointment_day DESC");

		if($apps){
			echo "<table class='mdl-data-table mdl-js-data-table mdl-shadow--3dp'>
			<thead>
			<tr>
			<th> Service</th>
			<th> Patient </th>
			<th> Date </th>
			<th> Status </th>
			</tr> </thead> ";
			while ($approws = mysqli_fetch_assoc($apps)) {
				$id = $approws['id'];
				echo "<tbody>";
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
		}

	?>

</div>