<?php
function multi_item_search($parentSku, $catPref, $itemType, $itemStatus) {
	global $DbLink;
	dbconn(DB_ADDRESS, DB_NAME, DB_USER, DB_PASSWORD);

	if($parentSku =='' && $catPref == '' && $itemType == '' && $itemStatus == ''){
		//Query for all items EVER!
		$item_query = "	SELECT 	im.parent_sku,
							 	im.item_sku, 
							 	im.master_title, 
							 	im.variant_flag
						from item_master im
						join item_alloc alloc on im.parent_sku = alloc.parent_sku";
		$item_data = mysql_query($item_query, $DbLink);
	}
	
	if($catPref != '' && $itemType == '' && $itemStatus ==''){
		//Query for catPref only
		$item_query = "	SELECT 	im.parent_sku,
							 	im.item_sku, 
							 	im.master_title, 
							 	im.variant_flag
						from item_master im
						join item_alloc alloc on im.parent_sku = alloc.parent_sku
						where alloc.sku_prefix ='$catPref'";
		$item_data = mysql_query($item_query, $DbLink);
		
	}
	
	if($catPref == '' && $itemType == '' && $itemStatus !=''){
		//Query for itemStatus only
		$item_query = "	SELECT 	im.parent_sku,
							 	im.item_sku, 
							 	im.master_title, 
							 	im.variant_flag
						from item_master im
						join item_alloc alloc on im.parent_sku = alloc.parent_sku
						where alloc.status ='$itemStatus'";
		$item_data = mysql_query($item_query, $DbLink);
		
	}
	
	if($catPref == '' && $itemType != '' && $itemStatus ==''){
		//Query for itemType only
		$item_query = "	SELECT 	im.parent_sku,
							 	im.item_sku, 
							 	im.master_title, 
							 	im.variant_flag
						from item_master im
						join item_alloc alloc on im.parent_sku = alloc.parent_sku
						join item_prefix pref on alloc.sku_prefix = pref.sku_prefix
						where pref.prefix_type ='$itemType'";
		$item_data = mysql_query($item_query, $DbLink);
		
	}
	
	if( $parentSku != '' && $catPref == '' && $itemType == '' && $itemStatus ==''){
		//Query for parentSku only
		$item_query = "	SELECT 	im.parent_sku,
							 	im.item_sku, 
							 	im.master_title, 
							 	im.variant_flag
						from item_master im
						join item_alloc alloc on im.parent_sku = alloc.parent_sku
						where im.parent_sku ='$parentSku'";
		$item_data = mysql_query($item_query, $DbLink);
		
	}
	
	if($parentSku != '' && $catPref != ''){
		//Only allow parentSku field
		echo '<br/><table class="table_main">';
		echo '<tr><td style="color:red;text-align:center;">Search by Parent SKU and Item Prefix is disallowed</td></tr>';
		echo '</table>';
		exit;
	}
	
	if($parentSku != '' && $itemType != ''){
		//Only allow parentSku field
		echo '<br/><table class="table_main">';
		echo '<tr><td style="color:red;text-align:center;">Search by Parent SKU and Item Type is disallowed</td></tr>';
		echo '</table>';
		exit;
	}
	
		if($parentSku != '' && $itemStatus != ''){
		//Only allow parentSku field
		echo '<br/><table class="table_main">';
		echo '<tr><td style="color:red;text-align:center;">Search by Parent SKU and Item Status is disallowed</td></tr>';
		echo '</table>';
		exit;
	}
	
	echo '<br/>';
	echo '<table class="table_main">';
	echo '<tr><td>Parent Sku</td><td>Item Sku</td><td>Internal Title</td><td>Variation</td></tr>';
	while($row = mysql_fetch_assoc($item_data))
	{
		echo '<tr>';
			echo '<td>'.$row['parent_sku'].'</td>';
			echo '<td>'.$row['item_sku'].'</td>';
			echo '<td>'.$row['master_title'].'</td>';
			if($row['variant_flag'] == '1')
				{
					echo '<td>Enabled</td>';
				}
			elseif($row['variant_flag'] == '0') 
				{
					echo '<td>Disabled</td>';
				}
		echo '</tr>';
	}
	
}
