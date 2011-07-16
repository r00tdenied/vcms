<?php


dbconn(DB_ADDRESS, DB_NAME, DB_USER, DB_PASSWORD);

$item_prefix_query='SELECT * from item_prefix';
$item_prefix=mysql_query($item_prefix_query,$DbLink);

$topSkuNum = '000001';

?>
<form action="" method="post">
<table style='margin-left: auto; margin-right: auto; width: 600px;' >
<tr><td>Select item category:</td><td><select name='catPref'>
<?php 

while ($row = mysql_fetch_assoc($item_prefix)) {
	echo '<option value="'. $row['sku_prefix'] .'">' . $row['description'] .' ('. $row['sku_prefix'] .')</option>';
}
?>
</select>
</td></tr>
<tr><td># items to create:</td><td><input type="text" name="numSkus" /></td></tr>
<tr><td>Build with item variation:</td><td><select name='varFlag'><option value='0'>Disabled</option><option value='1'>Enabled</option></select>
<tr><td colspan='2'><input type="submit"></td></tr>
</form>

<?php 
if ($_POST['numSkus'] == 0){
echo '<tr><td colspan="2"><font color="red">Please enter the number of skus to generate!</font></td></tr>';
}
elseif ($_POST['numSkus'] > 0){
	echo '<tr><td colspan="2"><font color="green">You entered the correct number</font></td></tr>';
	echo '<tr><td colspan="2">You entered '. $_POST['numSkus'] .' skus and selected the '. $_POST['catPref'] .' prefix</td></tr>';
	while($i <= $_POST['numSkus']) {
		echo $_POST['catPref'] .'-'. $topSkuNum +1;
		$i++;
	}
}

?>

</table>