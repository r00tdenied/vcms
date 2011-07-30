<?php

function item_prefix_type_select($allow_any_type)
{
	global $DbLink;
	dbconn(DB_ADDRESS, DB_NAME, DB_USER, DB_PASSWORD);
	$item_prefix_type_query="SELECT distinct prefix_type from item_prefix";
	$item_prefix_type=mysql_query($item_prefix_type_query,$DbLink);

	echo '<select name="itemType">';
	if($allow_any_type == '1'){
		echo '<option value="">Any Type</option>';
	}
	while ($row = mysql_fetch_assoc($item_prefix_type)) 
	{
		echo "<option value=".$row['prefix_type'].">".$row['prefix_type']."</option>";
	}
}
	echo '</select>';
?>