<?php

function db_obj_view($parent_sku,$table,$field)
{
	global $DbLink;
	dbconn(DB_ADDRESS, DB_NAME, DB_USER, DB_PASSWORD);
	
	$query = "Select $field from $table where item_sku='".$parent_sku."'";
	$exec_query = mysql_query($query, $DbLink);
	
	if(mysql_num_rows($exec_query)>0)
	{
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
	else 
	{
		//If no rows throw error
		echo 'ERR';
	}
}

?>