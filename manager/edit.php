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
 	<div class="mdl-layout-spacer"></div>
	<div class="mdl-grid">
	
		<div class="mdl-cell mdl-cell--6-col">

		<nav aria-label="..." style="padding-left: 2%;">
		  <ul class="pager">
		    <li class="previous"><a href="schemes.php"><span aria-hidden="true">&larr;</span> Back </a></li>		    
		  </ul>
		</nav>

		<?php

				if(isset($_POST['update'])) {
						$sname = $_POST['sname'];
						$stype = $_POST['stype'];
						$svalid = $_POST['svalid'];
						$drid = $_POST['drid'];

						$fk = mysqli_query($db, "SET FOREIGN_KEY_CHECKS = 0");

						$query = mysqli_query($db, "UPDATE medical_schemes SET scheme_name = '".$sname."', scheme_type = '".$stype."', validity = '".$svalid."' WHERE scheme_id = '".$drid."'");

							if($query) {
				 				echo "<div class='alert alert-success'> Scheme details updated </div>";
						 			} else {
						 				echo "damn" . mysqli_error($db);
						 			}
							}
			?>
					
			<?php
				if(isset($_GET['view'])){
					$sid = $_GET['view'];
					 
					
			$scheme = mysqli_query($db, "SELECT * FROM `medical_schemes` JOIN provider ON medical_schemes.provider_id = provider.provider_id WHERE scheme_id = '".$sid."'");	
				while ($rows = mysqli_fetch_array($scheme)) { 
					$id = $rows['scheme_id']; 
					$name = $rows['scheme_name'];
					$type = $rows['scheme_type'];
					$valid = $rows['validity'];

		?>

		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
		<input type='hidden' name='drid' value="<?php echo "".$sid;?>"/>
		  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
		    <input class="mdl-textfield__input" type="text" name="sname" value="<?php echo "".$name;?>">
		    <label class="mdl-textfield__label" for="Scheme Name">Scheme Name</label>
		  </div>
		  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
		    <input class="mdl-textfield__input" type="text" name="stype" value="<?php echo "".$type;?>">
		    <label class="mdl-textfield__label" for="Scheme Type" >Scheme Type </label>
		  </div>
		  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
		    <input class="mdl-textfield__input" type="text" name="svalid" value="<?php echo "".$valid;?>">
		    <label class="mdl-textfield__label" for="Validity" >Validity </label>
		  </div> <br/> <br/>
		  <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored" type="submit" name="update">
  				Submit
			</button>	  
	</form>

	<?php }} ?>
	


		</div>
<div class="mdl-cell mdl-cell--6-col">
	</div>
	</div>
	</main>
