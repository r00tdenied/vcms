<?php

function item_status_select($allow_any_status)
{
	global $DbLink;
	dbconn(DB_ADDRESS, DB_NAME, DB_USER, DB_PASSWORD);
	$item_status_query="SELECT distinct status from item_alloc";
	$item_status=mysql_query($item_status_query,$DbLink);

	echo '<select name="itemStatus">';
	if($allow_any_status == '1'){
		echo '<option value="">Any Status</option>';
	}
	while ($row = mysql_fetch_assoc($item_status)) 
	{
		echo "<option value=".$row['status'].">".$row['status']."</option>";
	}
}
	echo '</select>';
?>