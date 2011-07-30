<?php

function db_obj_update($item_sku,$table,$field)
{
	global $DbLink;
	dbconn(DB_ADDRESS, DB_NAME, DB_USER, DB_PASSWORD);
	
	$query = "Select $field from $table where item_sku='".$item_sku."'";
	$exec_query = mysql_query($query, $DbLink);
	while ($row = mysql_fetch_assoc($exec_query))
		{
				if(isset($row[$field]))
				{
					echo $row[$field];
				}
				if(is_null($row[$field]))
				{
					echo 'N/A';
				}
		}
}

?>