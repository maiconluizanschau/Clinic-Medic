<?php

	$db = mysqli_connect ("localhost", "root", "", "theclinic") or die (mysqli_query());

	if(!$db) {
		die ("Failed" . mysqli_connect_error() . "");
	}

?>