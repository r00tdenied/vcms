<?php


dbconn(DB_ADDRESS, DB_NAME, DB_USER, DB_PASSWORD);

$item_prefix_query='SELECT * from item_prefix';
$item_prefix=mysql_query($item_prefix_query,$DbLink);

?>
<form action="" method="post">
<table style='margin-left: auto; margin-right: auto; width: 600px;' >
<tr><td>Select a catagory:</td><td><select name='catPref'>
<?php 

while ($row = mysql_fetch_assoc($item_prefix)) {
	echo '<option value="'. $row['sku_prefix'] .'">' . $row['description'] .' ('. $row['sku_prefix'] .')</option>';
}
?>
</select>
</td></tr>
<tr><td># Skus to Create:</td><td><input type="text" name="numSkus" /></td></tr>
<tr><td colspan='2'><input type="submit"></td></tr>
</form>

<?php 
if ($_POST['numSkus'] == 0){
echo '<tr><td colspan="2"><font color="red">Please enter the number of skus to generate!</font></td></tr>';
}
elseif ($_POST['numSkus'] > 0){
	echo '<tr><td colspan="2"><font color="green">You entered the correct number</font></td></tr>';
}

?>

</table>