<?php

function single_item_view($parent_sku,$field)
{
	global $DbLink;
	dbconn(DB_ADDRESS, DB_NAME, DB_USER, DB_PASSWORD);
	
	if($field == 'master_title') {
		$query = "Select master_title from item_master where parent_sku='".$parent_sku."'";
		$exec_query = mysql_query($query, $DbLink);
		while ($row = mysql_fetch_assoc($exec_query))
		{
				echo $row['master_title'];
		}
	}
	
	if($field == 'variant_flag') {
		$query = "Select variant_flag from item_master where parent_sku='".$parent_sku."'";
		$exec_query = mysql_query($query, $DbLink);
		while ($row = mysql_fetch_assoc($exec_query))
		{		
			if($row['variant_flag'] == '0'){
				echo 'Disabled';
			}
			if($row['variant_flag'] == '1'){
			 	echo 'Enabled';
			}
		}	
	}
	
	if($field == 'master_desc') {
		$query = "Select master_desc from item_master where parent_sku='".$parent_sku."'";
		$exec_query = mysql_query($query, $DbLink);
		while ($row = mysql_fetch_assoc($exec_query))
		{
			if(is_null($row['master_desc']))
			{
			echo '<center><i>Description has not yet been added</i></center>';
			}
			if(isset($row['master_desc']))
			{
				echo $row['master_desc'];
			}
		}
	}
}


?>