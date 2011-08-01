<?php
/**
 * OM ui core functions
 */

//Search and build tables based on InnovExport flag
function OM_InnovExport_Search($trigger)
{
	$i=0;
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
   		    echo '<table class="table_main">';
  		  	echo "<tr>
					<td><b>Ref #</b></td>
  		  			<td><b>Order Date</b></td>
  		  			<td><b>Bill/<br/>Ship Name</b></td>
  		  			<td><b>Bill/<br/>Ship Zip</b></td>
  		  			<td><b>Bill/<br/>Ship Phone</b></td>
  		  		</tr>";
			while (odbc_fetch_row($result))
			{
  		  	   echo "<tr class='table_row" . ($i++ % 2) ."'>
  		  	   			<td>".odbc_result($result,'OrderNumber')."</td>
  		  	   			<td>".substr(odbc_result($result,'OrderDate'),0,-13)."</td>
  		  	   			<td>".odbc_result($result,'Name')."<br/>".odbc_result($result,'ShipName')."</td>
  		  	   			<td>".odbc_result($result,'Zip')."<br/>".odbc_result($result, 'ShipZip')."</td>
  		  	   			<td>".odbc_result($result,'Phone')."<br/>".odbc_result($result,'ShipPhone')."</td>
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
   		    echo '<table class="table_main">';
  		  	echo "<tr>
					<td><b>Ref #</b></td>
  		  			<td><b>Order Date</b></td>
  		  			<td><b>Bill/<br/>Ship Name</b></td>
  		  			<td><b>Bill/<br/>Ship Zip</b></td>
  		  			<td><b>Bill/<br/>Ship Phone</b></td>
  		  		</tr>";
			while (odbc_fetch_row($result))
			{
  		  	   echo "<tr class='table_row" . ($i++ % 2) ."'>
  		  	   			<td>".odbc_result($result,'OrderNumber')."</td>
  		  	   			<td>".substr(odbc_result($result,'OrderDate'),0,-13)."</td>
  		  	   			<td>".odbc_result($result,'Name')."<br/>".odbc_result($result,'ShipName')."</td>
  		  	   			<td>".odbc_result($result,'Zip')."<br/>".odbc_result($result, 'ShipZip')."</td>
  		  	   			<td>".odbc_result($result,'Phone')."<br/>".odbc_result($result,'ShipPhone')."</td>
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
   		    echo '<table class="table_main">';
  		  	echo "<tr>
  		  			<td><b>Ref #</b></td>
  		  			<td><b>Order Date</b></td>
  		  			<td><b>QA Sku</b></td>
  		  		  </tr>";
			while (odbc_fetch_row($result))
			{
  		  	   echo "<tr class='table_row" . ($i++ % 2) ."'>
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
   		    echo '<table class="table_main">';
  		  	echo "<tr>
					<td><b>Ref #</b></td>
  		  			<td><b>Order Date</b></td>
  		  			<td><b>Bill/<br/>Ship Name</b></td>
  		  			<td><b>Bill/<br/>Ship Zip</b></td>
  		  			<td><b>Bill/<br/>Ship Phone</b></td>
  		  		</tr>";
			while (odbc_fetch_row($result))
			{
  		  	   echo "<tr class='table_row" . ($i++ % 2) ."'>
  		  	   			<td>".odbc_result($result,'OrderNumber')."</td>
  		  	   			<td>".substr(odbc_result($result,'OrderDate'),0,-13)."</td>
  		  	   			<td>".odbc_result($result,'Name')."<br/>".odbc_result($result,'ShipName')."</td>
  		  	   			<td>".odbc_result($result,'Zip')."<br/>".odbc_result($result, 'ShipZip')."</td>
  		  	   			<td>".odbc_result($result,'Phone')."<br/>".odbc_result($result,'ShipPhone')."</td>
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
   		    echo '<table class="table_main">';
  		  	echo "<tr>
					<td><b>Ref #</b></td>
  		  			<td><b>Order Date</b></td>
  		  			<td><b>Bill/<br/>Ship Name</b></td>
  		  			<td><b>Bill/<br/>Ship Zip</b></td>
  		  			<td><b>Bill/<br/>Ship Phone</b></td>
  		  		</tr>";
			while (odbc_fetch_row($result))
			{
  		  	   echo "<tr class='table_row" . ($i++ % 2) ."'>
  		  	   			<td>".odbc_result($result,'OrderNumber')."</td>
  		  	   			<td>".substr(odbc_result($result,'OrderDate'),0,-13)."</td>
  		  	   			<td>".odbc_result($result,'Name')."<br/>".odbc_result($result,'ShipName')."</td>
  		  	   			<td>".odbc_result($result,'Zip')."<br/>".odbc_result($result, 'ShipZip')."</td>
  		  	   			<td>".odbc_result($result,'Phone')."<br/>".odbc_result($result,'ShipPhone')."</td>
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
   		    echo '<table class="table_main">';
  		  	echo "<tr>
					<td><b>Ref #</b></td>
  		  			<td><b>Order Date</b></td>
  		  			<td><b>Bill/<br/>Ship Name</b></td>
  		  			<td><b>Bill/<br/>Ship Zip</b></td>
  		  			<td><b>Bill/<br/>Ship Phone</b></td>
  		  		</tr>";
			while (odbc_fetch_row($result))
			{
  		  	   echo "<tr class='table_row" . ($i++ % 2) ."'>
  		  	   			<td>".odbc_result($result,'OrderNumber')."</td>
  		  	   			<td>".substr(odbc_result($result,'OrderDate'),0,-13)."</td>
  		  	   			<td>".odbc_result($result,'Name')."<br/>".odbc_result($result,'ShipName')."</td>
  		  	   			<td>".odbc_result($result,'Zip')."<br/>".odbc_result($result, 'ShipZip')."</td>
  		  	   			<td>".odbc_result($result,'Phone')."<br/>".odbc_result($result,'ShipPhone')."</td>
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
   		    echo '<table class="table_main">';
  		  	echo "<tr>
  		  			<td><b>Ref #</b></td>
  		  			<td><b>Order Date</b></td>
  		  			<td><b>Bill/<br/>Ship Name</b></td>
  		  			<td><b>Bill/<br/>Ship Zip</b></td>
  		  			<td><b>Bill/<br/>Ship Phone</b></td>
  		  			
  		  			<td></td>
  		  			<td></td>
  		  		</tr>";
			while (odbc_fetch_row($result))
			{
  		  	   echo "<tr class='table_row" . ($i++ % 2) ."'>
  		  	   			<td>".odbc_result($result,'OrderNumber')."</td>
  		  	   			<td>".substr(odbc_result($result,'OrderDate'),0,-13)."</td>
  		  	   			<td>".odbc_result($result,'Name')."<br/>".odbc_result($result,'ShipName')."</td>
  		  	   			<td>".odbc_result($result,'Zip')."<br/>".odbc_result($result, 'ShipZip')."</td>
  		  	   			<td>".odbc_result($result,'Phone')."<br/>".odbc_result($result,'ShipPhone')."</td>
  		  	   			<td><form class='table_row_button' method='post' url='?v=innovexport-search'>
  		  	   				<input type='hidden' name='process' value='release'/>
  		  	   				<input type='hidden' name='orderNumber' value='".odbc_result($result,'OrderNumber')."'/>
  		  	   				<input type='submit' name='submit' value='Release'/></form></td>
  		  	   			<td><form class='table_row_button' method='post' url='?v=innovexport-search'>
  		  	   				<input type='hidden' name='process' value='cancel'/>
  		  	   				<input type='hidden' name='orderNumber' value='".odbc_result($result,'OrderNumber')."'/>
  		  	   				<input type='submit' name='submit' value='Cancel'/></form></td>
  		  	   			
  		  	   		</tr>";
  		  	    
			}
			echo '<tr><td colspan="8" style="text-align:center;">Displaying TOP 20 Records</td></tr>';
	
	}
	
	
}