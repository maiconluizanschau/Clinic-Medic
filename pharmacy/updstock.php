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
		    <li class="previous"><a href="drugs.php"><span aria-hidden="true">&larr;</span> Drugs </a></li>
		    
		  </ul>
		</nav>

	<?php 
		 if(isset($_GET['upd'])){
		 	$upd = $_GET['upd'];

		 	if(isset($_POST['add'])){
		 	$stock = $_POST['stock'];
		 	$pharma = $_POST['pharma'];

	 		$fk = mysqli_query($db, "SET FOREIGN_KEY_CHECKS = 0");
	 		
	 		$query = mysqli_query($db, "UPDATE drugs SET stock = '".$stock."', pharmacist_id = '".$pharma."' WHERE drug_id = '".$upd."'");

	 		if($query) {
	 			echo "<div class='alert alert-success'> Stock Updated </div>";
	 		} else {
	 			echo mysqli_error($db);
	 		}
 		}
 	}  ?>

		<form action='' method='post'>
		   <input type='hidden' name='pharma' value="<?php echo "".$_SESSION['pharma_id'];?>"/>

		    <div class='mdl-textfield mdl-js-textfield mdl-textfield--floating-label'>
		 	<input class='mdl-textfield__input' type='number' name='stock'/>
		 	<label for='stock' class='mdl-textfield__label'> Stock: </label>
		 	</div>
		    
		      <br/> <br/>
		  <button class='mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored' type='submit' name='add'>
  				Submit
			</button>	
		    </form>
		    </div>

		