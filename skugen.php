<?php


dbconn(DB_ADDRESS, DB_NAME, DB_USER, DB_PASSWORD);

$item_prefix_query='SELECT * from item_prefix';
$item_prefix=mysql_query($item_prefix_query,$DbLink);

?>
<form>
<select name='catagory'>
<?php 

while ($row = mysql_fetch_assoc($item_prefix)) {
	echo '<option value="'. $row['sku_prefix'] .'">' . $row['description'] .'('. $row['sku_prefix'] .')</option>';
}
?>
</select>
</form>
