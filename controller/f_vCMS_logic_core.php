<?php

/**
 * 
 * f_vCMS_logic_core
 * All core logic functions
 */

//
// Generate sku based on user selection for prefix
//
function generate_sku($numSkus,$catPref,$varFlag)
{
	global $DbLink;
	dbconn(DB_ADDRESS, DB_NAME, DB_USER, DB_PASSWORD);

	if ($numSkus == 0)
	{
		include 'view/v_vCMS_generate_sku.php';
		echo '<table class="table_main">';
		echo '<td style="text-align:center;"><font color="red">Please enter the number of skus to generate!</font></td>';
		echo '</table>';
	}
	elseif ($numSkus >=1000)
	{
		include 'view/v_vCMS_generate_sku.php';
		echo '<table class="table_main">';
		echo '<td style="text-align:center;" ><font color="red">You are not allowed to generate that many skus!</font></td>';
		echo '</table>';
	}
	else 
	{
		include 'view/v_vCMS_generate_sku.php';
		echo '<table class="table_main">';
		echo '<tr><td style="text-align:center;"><font color="green">Generated '. $numSkus .' SKUs for the '. $catPref .' prefix</td></tr>';
		echo '</table>';
		$topPrefNum_check =  'Select parent_sku FROM item_alloc where sku_prefix ="'.$catPref.'" order by parent_sku desc limit 1';
		$topPrefNum = mysql_query($topPrefNum_check, $DbLink);
		$topPrefNum = mysql_fetch_assoc($topPrefNum);
		$topPrefNum = explode('-',$topPrefNum['parent_sku']);
		
		while($i < $numSkus) 
		{
			$topPrefNum[1] = $topPrefNum[1]+1;
			$topPrefNum[1] = str_pad($topPrefNum[1],6,"0", STR_PAD_LEFT);
			$newSku = implode('-', array($catPref, $topPrefNum[1]));
			//Adjust inserts if schema changes otherwise other view pages WILL BREAK!!!
			//A record for parent_sku should exist in virtual every table that stores item data
			mysql_query("INSERT INTO item_master (parent_sku,variant_flag) VALUES ('$newSku','$varFlag')");
			mysql_query("INSERT INTO item_alloc (parent_sku,sku_prefix,status) VALUES ('$newSku','$catPref','NEW')");
			mysql_query("INSERT INTO item_uom (parent_sku) VALUES ('$newSku')");
			mysql_query("INSERT INTO listed_item (parent_sku) VALUES ('$newSku')");
			mysql_query("INSERT INTO item_vendor (parent_sku) VALUES  ('$newSku')");
			mysql_query("INSERT INTO content_log (parent_sku,type,message,user) VALUES ('$newSku','item_created','Item inserted into vcms','admin')");
						
			$i++;
		}
		echo '</table>';
		echo "<meta http-equiv='refresh' content='.01;url=?p=vCMS&parentSku=&catPref=$catPref&process=itemSearch&itemType=&itemStatus=NEW'>";
	}
}
//Detect channels parent_sku is configured for in db
function db_obj_item_channels($parent_sku)
{
	global $DbLink;
	dbconn(DB_ADDRESS, DB_NAME, DB_USER, DB_PASSWORD);

	$query = "Select active_channels from listed_item where parent_sku='".$parent_sku."'";
	$exec_query = mysql_query($query, $DbLink);

	$row = mysql_fetch_assoc($exec_query);
	return $row['active_channels'];
}

//Extracts any single row field from the db based on params parent_sku, table and field
function db_obj_item_view($parent_sku,$table,$field)
{
	global $DbLink;
	dbconn(DB_ADDRESS, DB_NAME, DB_USER, DB_PASSWORD);
	
	$query = "Select $field from $table where parent_sku='".$parent_sku."'";
	$exec_query = mysql_query($query, $DbLink);
	
	if(mysql_num_rows($exec_query)>0)
	{
		while ($row = mysql_fetch_assoc($exec_query))
		{
			//If field is used return field value
			if(isset($row[$field]))
			{
				return($row[$field]);
			}
			//If field is Null return N/A
			if(is_null($row[$field]))
			{
				return('N/A');
			}
		}
	}
	//If no rows return error
	else 
	{
		return('ERR');
	}
}

function db_obj_item_update($parent_sku,$table,$field,$value)
{
	global $DbLink;
	dbconn(DB_ADDRESS, DB_NAME, DB_USER, DB_PASSWORD);
	$value = htmlspecialchars($value,ENT_QUOTES);
	
	$query = "update ".$table." set ".$field." = '".$value."' where parent_sku='".$parent_sku."'";
	$exec_query = mysql_query($query, $DbLink);
	
}

function db_obj_insert_item_vendor($parent_sku,$vendorCode,$vendorSku)
{
	global $DbLink;
	dbconn(DB_ADDRESS, DB_NAME, DB_USER, DB_PASSWORD);
	$vendorCode = htmlspecialchars($vendorCode,ENT_QUOTES);
	$vendorSku = htmlspecialchars($vendorSku,ENT_QUOTES);
		
	mysql_query("insert into item_vendor (parent_sku,vendor_code,vendor_sku) values ('$parent_sku','$vendorCode','$vendorSku')");		
}

function db_obj_update_item_vendor($parent_sku,$newVendorCode,$oldVendorCode, $newVendorSku, $oldVendorSku)
{
	global $DbLink;
	dbconn(DB_ADDRESS, DB_NAME, DB_USER, DB_PASSWORD);
	$newVendorCode = htmlspecialchars($newVendorCode,ENT_QUOTES);
	$oldVendorCode = htmlspecialchars($oldVendorCode,ENT_QUOTES);
	$newVendorSku = htmlspecialchars($newVendorSku,ENT_QUOTES);
	$oldVendorSku = htmlspecialchars($oldVendorSku,ENT_QUOTES);
	
	mysql_query("update item_vendor 
					set vendor_code='$newVendorCode',
					vendor_sku='$newVendorSku' 
				where parent_sku='$parent_sku' 
				and vendor_code = '$oldVendorCode'
				and vendor_sku = '$oldVendorSku'");
}

function db_obj_delete_item_vendor($parent_sku,$vendorCode,$vendorSku)
{
	global $DbLink;
	dbconn(DB_ADDRESS, DB_NAME, DB_USER, DB_PASSWORD);
	$vendorCode = htmlspecialchars($vendorCode,ENT_QUOTES);
	$vendorSku = htmlspecialchars($vendorSku,ENT_QUOTES);
	
	mysql_query("delete from item_vendor where parent_sku='$parent_sku' and vendor_code='$vendorCode' and vendor_sku='$vendorSku'");
}


function db_obj_insert_item_alias($parent_sku,$aliasType,$aliasSku)
{
	global $DbLink;
	dbconn(DB_ADDRESS, DB_NAME, DB_USER, DB_PASSWORD);
	$aliasSku = htmlspecialchars($aliasSku,ENT_QUOTES);
	mysql_query("insert into item_alias (parent_sku,type,alias_sku) values ('$parent_sku','$aliasType','$aliasSku')");		
}

function db_obj_update_item_alias($parent_sku,$newAliasType,$oldAliasType, $newAliasSku, $oldAliasSku)
{
	global $DbLink;
	dbconn(DB_ADDRESS, DB_NAME, DB_USER, DB_PASSWORD);
	mysql_query("update item_alias 
					set type='$newAliasType',
					alias_sku='$newAliasSku' 
				where parent_sku='$parent_sku' 
				and type = '$oldAliasType'
				and alias_sku = '$oldAliasSku'");
}

function db_obj_delete_item_alias($parent_sku,$aliasType,$aliasSku)
{
	global $DbLink;
	dbconn(DB_ADDRESS, DB_NAME, DB_USER, DB_PASSWORD);
	$aliasSku = htmlspecialchars($aliasSku,ENT_QUOTES);
	mysql_query("delete from item_alias where parent_sku='$parent_sku' and type='$aliasType' and alias_sku='$aliasSku'");
}

function db_obj_insert_item_variant($parent_sku,$item_sku,$variant_sku,$variant_desc,$variant_type)
{
	global $DbLink;
	dbconn(DB_ADDRESS, DB_NAME, DB_USER, DB_PASSWORD);
	$variant_desc = htmlspecialchars($variant_desc,ENT_QUOTES);	
	mysql_query("insert into variant_header (parent_sku,item_sku,variant_sku,variant_desc,variant_type) 
									values ('$parent_sku','$item_sku','$variant_sku','$variant_desc','$variant_type')");
}

function db_obj_update_item_variant($item_sku,$variant_sku,$variant_desc,$variant_type){
	global $DbLink;
	dbconn(DB_ADDRESS, DB_NAME, DB_USER, DB_PASSWORD);
	$variant_desc = htmlspecialchars($variant_desc,ENT_QUOTES);
	mysql_query("update variant_header 
				set variant_sku = '$variant_sku', 
				variant_desc='$variant_desc', 
				variant_type='$variant_type'
				where item_sku = '$item_sku'");
}


function db_obj_delete_item_variant($item_sku)
{
	global $DbLink;
	dbconn(DB_ADDRESS, DB_NAME, DB_USER, DB_PASSWORD);
	mysql_query("delete from variant_header where item_sku = '$item_sku'");
}


//Based off the catPref variable, outputs the last used parent sku for that prefix
function last_generated_sku($catPref)
{
	global $DbLink;
	dbconn(DB_ADDRESS, DB_NAME, DB_USER, DB_PASSWORD);
	$last_gen_query="SELECT parent_sku from item_alloc where sku_prefix='".$catPref."' order by parent_sku desc limit 1";
	$result=mysql_query($last_gen_query,$DbLink);
	$fetch = mysql_fetch_row($result);
	if(is_null($fetch[0]))
	{
		echo '<font color="Red">None</font>';
	}
	else 
	{	
		echo '<font color="Green">'.$fetch[0].'</font>';
	}
}