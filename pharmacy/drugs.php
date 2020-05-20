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
	<div class="mdl-cell mdl-cell--4-col"">

	<?php 

 	include "../secure.php";
 	if(isset($_POST['add'])) {
 		$drug = $_POST['drug'];
 		$dtype = $_POST['dtype'];
 		$stock = $_POST['stock'];
 		$pharma = $_POST['pharma'];
 		$price = $_POST['price'];

 		
 		$query = mysqli_query($db, "INSERT INTO drugs (drug_name, drug_type, stock, price, pharmacist_id) VALUES ('".$drug."', '".$dtype."', '".$stock."', '".$price."', '".$pharma."')");

 		if($query) {
 			echo "<div class='alert alert-success'> Drug added </div>";
 		} else {
 			echo mysqli_error($db);
 		}
 	} ?>

	<input type='button' class='btn btn-primary' value='Add drug' id='ubutton'/>
 	<div id='upass' style='display: none;'>
 	<form action='<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>' method='POST'>
 	<input class='mdl-textfield__input' type='hidden' name='pharma' value="<?php echo "".$_SESSION['pharma_id'];?>" />
 	<div class='mdl-textfield mdl-js-textfield mdl-textfield--floating-label'>
 	<input class='mdl-textfield__input' type='text' name='drug' required='' />
 	<label for='drug' class='mdl-textfield__label'> Drug Name: </label>
 	</div>
 	<div class='mdl-textfield mdl-js-textfield mdl-textfield--floating-label'>
 	<input class='mdl-textfield__input' type='text' name='dtype' required=''/>
 	<label for='dtype' class='mdl-textfield__label'> Drug Type: </label>
 	</div> 
 	<div class='mdl-textfield mdl-js-textfield mdl-textfield--floating-label'>
 	<input class='mdl-textfield__input' type='number' name='stock' required=''/>
 	<label for='stock' class='mdl-textfield__label'> Stock: </label>
 	</div>
 	 
 	<div class='mdl-textfield mdl-js-textfield mdl-textfield--floating-label'>
 	<input class='mdl-textfield__input' type='number' name='price' required=''/>
 	<label for='price' class='mdl-textfield__label'> Price: </label>
 	</div>
 	


 	<br/> <br/>
 	<button class='mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored' type='submit' name='add'> Submit </button>
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

	<div class="mdl-cell mdl-cell--6-col" style="padding-left: 4%;">

	<?php 
		if(isset($_GET['del'])){
			$deldrug = $_GET['del'];

			$fk = mysqli_query($db,"SET FOREIGN_KEY_CHECKS = 0");

			$delete = mysqli_query($db, "DELETE FROM drugs WHERE drug_id = '".$deldrug."'");

			if($delete == TRUE) {
				echo "<div class='alert alert-warning'> Drug removed from stock </div>";
			}
		}

	?>
		<h3> Medicine </h3>

		<?php
		include ("../database/dbconnect.php");
	            $drugs = mysqli_query($db, "SELECT * FROM `drugs`");
            
                if($drugs) {
                	$result = mysqli_num_rows($drugs);

	                echo "<table class='mdl-data-table mdl-js-data-table mdl-shadow--3dp'>
                    <thead>
                    <tr>
					<th class='mdl-data-table__cell--non-numeric'> Name </th>
					<th class='mdl-data-table__cell--non-numeric'> Type </th>
					<th class='mdl-data-table__cell--non-numeric'> Price </th>
					<th class='mdl-data-table__cell--non-numeric'> Stock </th>
					</tr>
			        </thead>";

						//change this
			        
			    while ($rows = mysqli_fetch_array($drugs)) {
			    	$id = $rows['drug_id'];
			        echo "<tbody>";
					echo "<tr>";
					echo "<td class='mdl-data-table__cell--non-numeric'>". $rows['drug_name'] . "</td>"; 
					echo "<td class='mdl-data-table__cell--non-numeric'>". $rows['drug_type'] . "</td>"; 
					echo "<td class='mdl-data-table__cell--non-numeric'>". $rows['price'] . "</td>"; 
					echo "<td class='mdl-data-table__cell--non-numeric'>". $rows['stock'] . "</td>"; 
					echo "<td><a href='updstock.php?upd=$id'> Update Stock </a> </td>"; 
					echo "<td><a href='drugs.php?del=$id'> Remove Drug </a> </td>"; 
					echo "</tr>";
			        echo "</tbody>";
			       }
			      }

				echo "</table>";

			?>
		</div>
		</div>