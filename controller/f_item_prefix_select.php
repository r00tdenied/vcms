<?php

function item_prefix_select($allow_any_prefix)
{
	global $DbLink;
	dbconn(DB_ADDRESS, DB_NAME, DB_USER, DB_PASSWORD);
	$item_prefix_query='SELECT * from item_prefix';
	$item_prefix=mysql_query($item_prefix_query,$DbLink);

	echo '<select name="catPref">';
	if($allow_any_prefix == '1'){
		echo '<option value="">Any Prefix</option>';
	}
	while ($row = mysql_fetch_assoc($item_prefix)) 
	{
		echo '<option value="'. $row['sku_prefix'] .'">' . $row['description'] .' ('. $row['sku_prefix'] .')</option>';
	}
}
	echo '</select>';
?>