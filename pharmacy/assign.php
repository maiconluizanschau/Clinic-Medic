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
		<nav aria-label="..." style="padding-left: 2%;">
		  <ul class="pager">
		    <li class="previous"><a href="home.php"><span aria-hidden="true">&larr;</span> Home </a></li>
		    <li class="next"><a href="consultations.php"> Consultations <span aria-hidden="true">&rarr;</span> </a></li>
		    
		  </ul>
		</nav>

	<?php 
		 if(isset($_GET['ass'])){
		 	$assign = $_GET['ass'];

		 	if(isset($_POST['add'])){
		 	$drug = $_POST['drug'];
		 	$pharm = $_POST['pharma'];

	 		$fk = mysqli_query($db, "SET FOREIGN_KEY_CHECKS = 0");
	 		
	 		$query = mysqli_query($db, "UPDATE consultations SET drug_id = '".$drug."', pharmacist_id = '".$pharm."'WHERE cons_id = '".$assign."'");
	 		$query = mysqli_query($db, "UPDATE drugs SET stock = (stock - 1)  WHERE drug_id = '".$drug."'");


	 		if($query) {
	 			echo "<div class='alert alert-success'> Drug Administered </div>";
	 		} else {
	 			echo mysqli_error($db);
	 		}
 		}
 	}  ?>

		<form action='' method='post'>
		   <input type='hidden' name='pharma' value="<?php echo "".$_SESSION['pharma_id'];?>"/>

			<div class='mdl-textfield mdl-js-textfield mdl-textfield--floating-label'>
		    <label class='col-md-9 control-label' style='float: left;'>Drug </label>
		    <?php 
		    $getdrugs = mysqli_query($db, "SELECT drug_name, drug_id FROM drugs");
		    echo "	
		    <select name='drug' class='form-control' class='col-md-9'> Drug 
		    <option disabled selected> --Choose Drug-- </option>";
		    while($row = mysqli_fetch_array($getdrugs)) { 
		    	//echo "<option disabled='' selected=''> Staff </option>";
		    	echo "<option value='" . $row['drug_id'] . "'>" . $row['drug_name'] . "</option>";
		    }
			echo "</select>";

		 if(!$getdrugs) {
		    	echo mysqli_error($db);
		    } ?>
		    </div>
		      <br/> <br/>
		  <button class='mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored' type='submit' name='add'>
  				Submit
			</button>	
		    </form>
		    </div>

		