<?php

function OM_InnovExport_Fraud_Cancel($OrderNumber)
{
	if($OrderNumber != ''){
		
		$connect=odbc_connect("qa-om","sa","systemop",SQL_CUR_USE_ODBC);
		if (!$connect)
  		{exit("Connection Failed: " . $connect);}

		$sql = "update Orders set FraudScore = '1', Cancelled = '1' where OrderNumber = '$OrderNumber'";

		$result=odbc_exec($connect,$sql);
		if (!$result)
 		{     odbc_errormsg($connect);
   		exit("Error in SQL");}
   		     
		echo '<br/>';
   		echo '<table class="table_main">';
  		echo "<tr><td colspan='6' style='text-align:center;color:green;'>Cancelled $OrderNumber from Fraud Exception</td></tr>";
		echo '</table>';
	}
	//OM_InnovExport_Search('7');
}

?>