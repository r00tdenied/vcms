<?php

function OM_Sears_Import($trigger)
{
	if($trigger==''){
		echo 'Please select an option';
	}
	
	if($trigger=='1'){
		include '/scripts/QA-Sears/sears_order_scanner.php';
	}
	if($trigger=='2'){
		include '/scripts/QA-Sears/sears_order_fetcher.php';
	}
}

?>