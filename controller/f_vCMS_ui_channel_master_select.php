<?php

function channel_master_select()
{
	global $DbLink;
	dbconn(DB_ADDRESS, DB_NAME, DB_USER, DB_PASSWORD);
	$channels_query="SELECT * from channel_master";
	$channels=mysql_query($channels_query,$DbLink);

	echo '<select name="channels">';
	
	while ($row = mysql_fetch_assoc($channels)) 
	{
		echo "<option value=".$row['channel_code'].">".$row['channel_description']." (".$row['channel_code'].")</option>";
	}
	echo '</select>';
}
?>