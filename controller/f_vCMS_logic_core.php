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
		echo '<td style="text-align:center;"><font color="green">Generated '. $numSkus .' SKUs for the '. $catPref .' prefix</td>';
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
			mysql_query("INSERT INTO item_alias  (parent_sku) VALUES  ('$newSku')");
			mysql_query("INSERT INTO content_log (parent_sku,type,message,user) VALUES ('$newSku','item_created','Item inserted into vcms','admin')");
						
			$i++;
		}
		echo '</table>';
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
	
	$query = "update ".$table." set ".$field." = '".$value."' where parent_sku='".$parent_sku."'";
	$exec_query = mysql_query($query, $DbLink);
	
}

function db_obj_insert_vendor($parent_sku,$vendorCode,$vendorSku)
{
	global $DbLink;
	dbconn(DB_ADDRESS, DB_NAME, DB_USER, DB_PASSWORD);
	mysql_query("insert into item_vendor (parent_sku,vendor_code,vendor_sku) values ('$parent_sku','$vendorCode','$vendorSku')");		
}

function db_obj_update_vendor($parent_sku,$newVendorCode,$oldVendorCode, $newVendorSku, $oldVendorSku)
{
	global $DbLink;
	dbconn(DB_ADDRESS, DB_NAME, DB_USER, DB_PASSWORD);
	mysql_query("update item_vendor 
					set vendor_code='$newVendorCode',
					vendor_sku='$newVendorSku' 
				where parent_sku='$parent_sku' 
				and vendor_code = '$oldVendorCode'
				and vendor_sku = '$oldVendorSku'");
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