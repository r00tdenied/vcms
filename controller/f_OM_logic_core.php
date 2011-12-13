<?php
 /**
  * Order Manager module logic functions
  */

// Release order from fraud check
function OM_InnovExport_Fraud_Release($OrderNumber)
{
	if($OrderNumber != ''){
		
		$connect=odbc_connect("qa-om","sa","systemop",SQL_CUR_USE_ODBC);
		if (!$connect)
  		{exit("Connection Failed: " . $connect);}

		$sql = "use QAData update Orders set InnovExport = '0', FraudScore = '1' where OrderNumber = '$OrderNumber'";

		$result=odbc_exec($connect,$sql);
		if (!$result)
 		{     odbc_errormsg($connect);
   		exit("Error in SQL");}
   		     
   		echo '<table class="table_main">';
  		echo "<tr><td colspan='6' style='text-align:center;color:green;'>Released $OrderNumber from Fraud Exception</td></tr>";
		echo '</table>';
	}
}

//Cancel an order held in fraud check
function OM_InnovExport_Fraud_Cancel($OrderNumber)
{
	if($OrderNumber != ''){
		
		$connect=odbc_connect("qa-om","sa","systemop",SQL_CUR_USE_ODBC);
		if (!$connect)
  		{exit("Connection Failed: " . $connect);}

		$sql = "use QAData update Orders set FraudScore = '10', Cancelled = '1' where OrderNumber = '$OrderNumber'";

		$result=odbc_exec($connect,$sql);
		if (!$result)
 		{     odbc_errormsg($connect);
   		exit("Error in SQL");
 		}
   		echo '<table class="table_main">';
  		echo "<tr><td colspan='6' style='text-align:center;color:green;'>Cancelled $OrderNumber from Fraud Exception</td></tr>";
		echo '</table>';
	}
}

// Generic Order Release function
function OM_InnovExport_Order_Release($OrderNumber)
{
	if($OrderNumber != ''){
		
		$connect=odbc_connect("qa-om","sa","systemop",SQL_CUR_USE_ODBC);
		if (!$connect)
  		{exit("Connection Failed: " . $connect);}

		$sql = "use QAData update Orders set InnovExport = '0' where OrderNumber = '$OrderNumber'";

		$result=odbc_exec($connect,$sql);
		if (!$result)
 		{     odbc_errormsg($connect);
   		exit("Error in SQL");}
   		     
   		echo '<table class="table_main">';
  		echo "<tr><td colspan='6' style='text-align:center;color:green;'>Reset $OrderNumber</td></tr>";
		echo '</table>';
	}
}



//Trigger Sears import scripts
function OM_QA_Sears_Import($trigger)
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

//Trigger Sears import scripts
function OM_CAL_Sears_Import($trigger)
{
	if($trigger==''){
		echo 'Please select an option';
	}
	
	if($trigger=='1'){
		include '/scripts/CAL-Sears/sears_order_scanner.php';
	}
	if($trigger=='2'){
		include '/scripts/CAL-Sears/sears_order_fetcher.php';
	}	
}

	?>