<?php

function item_vendor_table($parent_sku)
{
	global $DbLink;
	dbconn(DB_ADDRESS, DB_NAME, DB_USER, DB_PASSWORD);
	$item_vendor_query="SELECT 	iv.parent_sku,
								vd.vendor_name,
								iv.vendor_code,
								iv.vendor_sku,
								iv.cost,
								iv.primary_vsku,
								iv.mfg_name,
								iv.mfg_upc,
								iv.fulfillment_type
						from item_vendor iv
						join vendor_detail vd on iv.vendor_code = vd.vendor_code
						where parent_sku='$parent_sku'";
	$item_vendor=mysql_query($item_vendor_query,$DbLink);
?>
	<table class='table_window'>
	<tr>
		<td colspan='3'>
			<h3>Item Manufacturer</h3>
		</td>
	</tr>
	<tr>
		<td style='text-align:center;'>
			<b>Mfg Name</b>
		</td>
		<td style='text-align:center;'>
			<b>Mfg UPC</b>
		</td>
	</tr>
	
	<tr>
		<td style='text-align:center;'>
			<form method='post' url=''>
			<input type='hidden' name='update' value='itemMfg'/>
			<input type='text' size='20' name='mfgName' value='<?php echo db_obj_item_view($parent_sku, 'item_vendor', 'mfg_name')?>'/>
		</td>
		<td style='text-align:center;'>
			<input type='text' size='20' name='mfgUPC' value='<?php echo db_obj_item_view($parent_sku, 'item_vendor', 'mfg_upc')?>'/>
		</td>
		<td style='text-align:right;'>
			<input type='submit' value='Update Mfg'/>
			</form>
		</td>
	</tr>
<?php 
	if(is_null(db_obj_item_view($parent_sku, 'item_vendor', 'mfg_name')))
	{
?>
		<tr>
				<td style='text-align:center;'>
					<form method='post' url=''>
					<input type='hidden' name='insert' value='itemMfg'/>
					<input type='text' size='20' name='mfgName'/>
				</td>
				<td style='text-align:center;'>
					<input type='text' size='20' name='mfgUPC''/>
				</td>
				<td style='text-align:right;'>
					<input type='submit' value='Add Mfg'/>
					</form>
				</td>
		</tr>
		<tr>
			<td colspan='3' style='text-align:center;'><i>No manufacturer data is specified. Please add it and insert</i></td></tr>
<?php 			
	}
?>	
	
		</table>
		<br/>

		<table class='table_window'>
    		<tr><td colspan='3'><h3>Item Vendor</h3></td></tr>
			<tr>
				<td style='text-align:center;'><b>Vendor Name</b></td>
				<td style='text-align:center;'><b>Vendor Code</b></td>
 				<td style='text-align:center;'><b>Vendor Sku</b></td>
			</tr>
<?php 
	while ($row = mysql_fetch_assoc($item_vendor)) 
	{
?>
			<tr>
				<td style='text-align:center;'><?php echo $row['vendor_name'] ?></td>
				<td style='text-align:center;'>
					<form method='post' url=''>
					<input type='hidden' name='update' value='itemVendor'/>
					<input type='text' size='3' name='vendorCode' value='<?php echo $row['vendor_code']?>'/>
				</td>
				<td style='text-align:center;'>
					<input type='text' size='10' name='vendorSku' value='<?php echo $row['vendor_sku']?>'/>
				</td>
			</tr>
<?php 
	}
	if(is_null($row['vendor_code']))
	{
?>
			<tr>
				<td style='text-align:center;'>---</td>
				<td style='text-align:center;'>
					<form method='post' url=''>
					<input type='hidden' name='insert' value='itemVendor'/>
					<input type='text' size='3' name='vendorCode'/>
				</td>
				<td style='text-align:center;'>
					<input type='text' size='10' name='vendorSku'/>
				</td>
			</tr>	
			<tr><td colspan='3' style='text-align:center;'><i>No vendor data is specified. Please add one</i></td></tr>
<?php 
	}	

?>
	<tr><td></td><td></td><td style='text-align:right;'><input type='submit' value='Add Vendor'/></form></td></tr>
	</table>
<?php 
}
?>
