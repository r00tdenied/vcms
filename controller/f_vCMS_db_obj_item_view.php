<?php

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

?>