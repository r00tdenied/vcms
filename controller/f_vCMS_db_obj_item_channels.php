<?php

function db_obj_item_channels($parent_sku)
{
	global $DbLink;
	dbconn(DB_ADDRESS, DB_NAME, DB_USER, DB_PASSWORD);
	
	$query = "Select active_channels from listed_item where parent_sku='".$parent_sku."'";
	$exec_query = mysql_query($query, $DbLink);

	$row = mysql_fetch_assoc($exec_query);
	return $row['active_channels'];
 	

	
	
}

?>