<?php

function db_obj_insert($parent_sku,$table,$field,$value)
{
	global $DbLink;
	dbconn(DB_ADDRESS, DB_NAME, DB_USER, DB_PASSWORD);
	
	$query = "update $table
				set $field='$value'
				where item_sku='".$parent_sku."'";
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