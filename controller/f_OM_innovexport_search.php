<?php

function OM_InnovExport_Search($trigger)
{
	$connect=odbc_connect("qa-om","sa","systemop",SQL_CUR_USE_ODBC);
	if (!$connect)
  	{exit("Connection Failed: " . $connect);}

	if($trigger==''){
			
			echo '<br/>';
			echo '<table class="table_main">';
			echo '<tr><td style="text-align:center;">Not yet allowed to search by All Types yet :( </td></tr>';	
	}
	
	if($trigger=='0'){
			$sql = "select * from Orders where InnovExport ='0' order by OrderDate desc";

			$result=odbc_exec($connect,$sql);
			if (!$result)
 		 	{     odbc_errormsg($connect);
   		     exit("Error in SQL");}
			echo '<br/>';
   		    echo '<table class="table_main" style="font-size:11px;">';
  		  	echo "<tr>
  		  			<td>Ref #</td>
  		  			<td>Order Date</td>
  		  			<td>Billing Name</td>
  		  			<td>Billing Zip</td>
  		  			<td>Shipping Name</td>
  		  			<td>Shipping Zip</td>
  		  		</tr>";
			while (odbc_fetch_row($result))
			{
  		  	   echo "<tr>
  		  	   			<td>".odbc_result($result,'OrderNumber')."</td>
  		  	   			<td>".substr(odbc_result($result,'OrderDate'),0,-13)."</td>
  		  	   			<td>".odbc_result($result,'Name')."</td>
  		  	   			<td>".odbc_result($result,'Zip')."</td>
  		  	   			<td>".odbc_result($result,'ShipName')."</td>
  		  	   			<td>".odbc_result($result, 'ShipZip')."</td>
  		  	   		</tr>";
  		  	    
			}
			echo '<tr><td colspan="6" style="text-align:center;">Displaying TOP 20 Records</td></tr>';
	}
	
	if($trigger=='1'){
			$sql = "select * from Orders where InnovExport ='1' order by OrderDate desc";

			$result=odbc_exec($connect,$sql);
			if (!$result)
 		 	{     odbc_errormsg($connect);
   		     exit("Error in SQL");}
			echo '<br/>';
   		    echo '<table class="table_main" style="font-size:11px;">';
  		  	echo "<tr>
  		  			<td>Ref #</td>
  		  			<td>Order Date</td>
  		  			<td>Billing Name</td>
  		  			<td>Billing Zip</td>
  		  			<td>Shipping Name</td>
  		  			<td>Shipping Zip</td>
  		  		</tr>";
			while (odbc_fetch_row($result))
			{
  		  	   echo "<tr>
  		  				<td>".odbc_result($result,'OrderNumber')."</td>
  		  				<td>".substr(odbc_result($result,'OrderDate'),0,-13)."</td>
  		  				<td>".odbc_result($result,'Name')."</td>
  		  				<td>".odbc_result($result,'Zip')."</td>
  		  				<td>".odbc_result($result,'ShipName')."</td>
  		  				<td>".odbc_result($result, 'ShipZip')."</td>
  		  			</tr>";
  		  	    
			}
			echo '<tr><td colspan="6" style="text-align:center;">Displaying TOP 20 Records</td></tr>';
	
	}
	if($trigger=='2'){
			$sql = "select * from Orders ord 
					join [Order Details] od on ord.OrderNumber = od.OrderNumber
					where ord.InnovExport ='2'
					and od.SKU not in ('Shipping','Sales Tax 1','Product','Sales Tax 3')
					order by OrderDate desc ";

			$result=odbc_exec($connect,$sql);
			if (!$result)
 		 	{     odbc_errormsg($connect);
   		     exit("Error in SQL");}
			echo '<br/>';
   		    echo '<table class="table_main" style="font-size:11px;">';
  		  	echo "<tr>
  		  			<td>Ref #</td>
  		  			<td>Order Date</td>
  		  			<td>QA Sku</td>
  		  		  </tr>";
			while (odbc_fetch_row($result))
			{
  		  	   echo "<tr>
  		  	   			<td>".odbc_result($result,'OrderNumber')."</td>
  		  	   			<td>".substr(odbc_result($result,'OrderDate'),0,-13)."</td>
  		  	   			<td>".odbc_result($result,'SKU')."</td>
  		  	   		</tr>";
  		  	    
			}
			echo '<tr><td colspan="6" style="text-align:center;">Displaying TOP 20 Records</td></tr>';
	}
	
	if($trigger=='3'){
			$sql = "select TOP 20 * from Orders where InnovExport ='3' and Cancelled = '0' order by OrderDate desc";

			$result=odbc_exec($connect,$sql);
			if (!$result)
 		 	{     odbc_errormsg($connect);
   		     exit("Error in SQL");}
			echo '<br/>';
   		    echo '<table class="table_main" style="font-size:11px;">';
  		  	echo "<tr>
  		  			<td>Ref #</td>
  		  			<td>Order Date</td>
  		  			<td>Billing Name</td>
  		  			<td>Billing Zip</td>
  		  			<td>Shipping Name</td>
  		  			<td>Shipping Zip</td>
  		  		</tr>";
			while (odbc_fetch_row($result))
			{
  		  	   echo "<tr>
  		  	   			<td>".odbc_result($result,'OrderNumber')."</td>
  		  	   			<td>".substr(odbc_result($result,'OrderDate'),0,-13)."</td>
  		  	   			<td>".odbc_result($result,'Name')."</td>
  		  	   			<td>".odbc_result($result,'Zip')."</td>
  		  	   			<td>".odbc_result($result,'ShipName')."</td>
  		  	   			<td>".odbc_result($result, 'ShipZip')."</td>
  		  	   		</tr>";
  		  	    
			}
			echo '<tr><td colspan="6" style="text-align:center;">Displaying TOP 20 Records</td></tr>';
	
	}
	if($trigger=='4'){
			$sql = "select top 20 * from Orders where InnovExport ='4' order by OrderDate desc";

			$result=odbc_exec($connect,$sql);
			if (!$result)
 		 	{     odbc_errormsg($connect);
   		     exit("Error in SQL");}
			echo '<br/>';
   		    echo '<table class="table_main" style="font-size:11px;">';
  		  	echo "<tr>
  		  			<td>Ref #</td>
  		  			<td>Order Date</td>
  		  			<td>Billing Name</td>
  		  			<td>Billing Zip</td>
  		  			<td>Shipping Name</td>
  		  			<td>Shipping Zip</td>
  		  		</tr>";
			while (odbc_fetch_row($result))
			{
  		  	   echo "<tr>
  		  	   			<td>".odbc_result($result,'OrderNumber')."</td>
  		  	   			<td>".substr(odbc_result($result,'OrderDate'),0,-13)."</td>
  		  	   			<td>".odbc_result($result,'Name')."</td>
  		  	   			<td>".odbc_result($result,'Zip')."</td>
  		  	   			<td>".odbc_result($result,'ShipName')."</td>
  		  	   			<td>".odbc_result($result, 'ShipZip')."</td>
  		  	   		</tr>";
  		  	    
			}
			echo '<tr><td colspan="6" style="text-align:center;">Displaying TOP 20 Records</td></tr>';
	
	}
	
	if($trigger=='5'){
			$sql = "select top 20 * from Orders where InnovExport ='5' order by OrderDate desc";

			$result=odbc_exec($connect,$sql);
			if (!$result)
 		 	{     odbc_errormsg($connect);
   		     exit("Error in SQL");}
			echo '<br/>';
   		    echo '<table class="table_main" style="font-size:11px;">';
  		  	echo "<tr>
  		  			<td>Ref #</td>
  		  			<td>Order Date</td>
  		  			<td>Billing Name</td>
  		  			<td>Billing Zip</td>
  		  			<td>Shipping Name</td>
  		  			<td>Shipping Zip</td>
  		  		</tr>";
			while (odbc_fetch_row($result))
			{
  		  	   echo "<tr>
  		  	   			<td>".odbc_result($result,'OrderNumber')."</td>
  		  	   			<td>".substr(odbc_result($result,'OrderDate'),0,-13)."</td>
  		  	   			<td>".odbc_result($result,'Name')."</td>
  		  	   			<td>".odbc_result($result,'Zip')."</td>
  		  	   			<td>".odbc_result($result,'ShipName')."</td>
  		  	   			<td>".odbc_result($result, 'ShipZip')."</td>
  		  	   		</tr>";
  		  	}
			echo '<tr><td colspan="6" style="text-align:center;">Displaying TOP 20 Records</td></tr>';
	
	}
	
	if($trigger=='7'){
			$sql = "select * from Orders ord
					where InnovExport = '7' 
					and FraudScore is NULL
					and OrderNumber not in (select OrderNum from Tracking)
					order by OrderDate desc";

			$result=odbc_exec($connect,$sql);
			if (!$result)
 		 	{     odbc_errormsg($connect);
   		     exit("Error in SQL");}
   		     
			echo '<br/>';
   		    echo '<table class="table_main" style="font-size:11px;">';
  		  	echo "<tr>
  		  			<td>Ref #</td>
  		  			<td>Order Date</td>
  		  			<td>Bill/<br/>Ship Name</td>
  		  			<td>Bill/<br/>Ship Zip</td>
  		  			<td>Bill/<br/>Ship Phone</td>
  		  			
  		  			<td></td>
  		  			<td></td>
  		  		</tr>";
			while (odbc_fetch_row($result))
			{
  		  	   echo "<tr>
  		  	   			<td>".odbc_result($result,'OrderNumber')."</td>
  		  	   			<td>".substr(odbc_result($result,'OrderDate'),0,-13)."</td>
  		  	   			<td>".odbc_result($result,'Name')."<br/>".odbc_result($result,'ShipName')."</td>
  		  	   			<td>".odbc_result($result,'Zip')."<br/>".odbc_result($result, 'ShipZip')."</td>
  		  	   			<td>".odbc_result($result,'Phone')."<br/>".odbc_result($result,'ShipPhone')."</td>
  		  	   			<td><form method='post' url='?v=innovexport-search'>
  		  	   				<input type='hidden' name='process' value='release'/>
  		  	   				<input type='hidden' name='orderNumber' value='".odbc_result($result,'OrderNumber')."'/>
  		  	   				<input style='font-size:11px;' type='submit' name='submit' value='Release'/></form></td>
  		  	   			<td><form method='post' url='?v=innovexport-search'>
  		  	   				<input type='hidden' name='process' value='cancel'/>
  		  	   				<input type='hidden' name='orderNumber' value='".odbc_result($result,'OrderNumber')."'/>
  		  	   				<input style='font-size:11px;' type='submit' name='submit' value='Cancel'/></form></td>
  		  	   			
  		  	   		</tr>";
  		  	    
			}
			echo '<tr><td colspan="8" style="text-align:center;">Displaying TOP 20 Records</td></tr>';
	
	}
	
	
}


?>