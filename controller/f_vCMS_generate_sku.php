<?php

function generate_sku($numSkus,$catPref,$varFlag)
{
	global $DbLink;
	dbconn(DB_ADDRESS, DB_NAME, DB_USER, DB_PASSWORD);

	if ($numSkus == 0)
	{
		echo '<tr><td colspan="2" style="text-align:center;"><font color="red">Please enter the number of skus to generate!</font></td></tr>';
	}
	elseif ($numSkus >=1000)
	{
		echo '<tr><td colspan="2" style="text-align:center;" ><font color="red">You are not allowed to generate that many skus!</font></td></tr>';
	}
	else 
	{
		echo '<tr><td colspan="2" style="text-align:center;"><font color="green">Generated '. $numSkus .' SKUs for the '. $catPref .' prefix</td></tr>';
		$topPrefNum_check =  'Select parent_sku FROM item_alloc where sku_prefix ="'.$catPref.'" order by parent_sku desc limit 1';
		$topPrefNum = mysql_query($topPrefNum_check, $DbLink);
		$topPrefNum = mysql_fetch_assoc($topPrefNum);
		$topPrefNum = explode('-',$topPrefNum['parent_sku']);
		
		while($i < $numSkus) 
		{
			$topPrefNum[1] = $topPrefNum[1]+1;
			$topPrefNum[1] = str_pad($topPrefNum[1],6,"0", STR_PAD_LEFT);
			$newSku = implode('-', array($catPref, $topPrefNum[1]));
			mysql_query("INSERT INTO item_master (parent_sku,variant_flag) VALUES ('$newSku','$varFlag')");
			mysql_query("INSERT INTO item_alloc (parent_sku,sku_prefix,status) VALUES ('$newSku','$catPref','NEW')");
			mysql_query("INSERT INTO item_uom (parent_sku) VALUES ('$newSku')");
			mysql_query("INSERT INTO listed_item (parent_sku) VALUES ('$newSku')");
			mysql_query("INSERT INTO item_vendor (parent_sku) VALUES  ('$newSku')");
			mysql_query("INSERT INTO item_alias  (parent_sku) VALUES  ('$newSku')");
			mysql_query("INSERT INTO content_log (parent_sku,type,message,user) VALUES ('$newSku','item_created','Item inserted into vcms','admin')");
						
			$i++;
		}
	}
}
?>