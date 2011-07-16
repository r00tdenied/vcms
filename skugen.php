<?php


dbconn(DB_ADDRESS, DB_NAME, DB_USER, DB_PASSWORD);

$item_prefix_query='SELECT * from item_prefix';
$item_prefix=mysql_query($item_prefix_query,$DbLink);

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

$numSkus = $_POST['numSkus'];
$catPref = $_POST['catPref'];
$varFlag = $_POST['varFlag'];

if ($numSkus == 0){
echo '<tr><td colspan="2"><font color="red">Please enter the number of skus to generate!</font></td></tr>';
}
elseif ($numSkus > 1){
	echo '<tr><td colspan="2"><font color="green">You entered the correct number</font></td></tr>';
	echo '<tr><td colspan="2">You entered '. $numSkus .' skus and selected the '. $catPref .' prefix</td></tr>';
	$topPrefNum_check =  'Select parent_sku FROM item_alloc where sku_prefix ="'.$catPref.'" order by parent_sku desc limit 1';
	$topPrefNum = mysql_query($topPrefNum_check, $DbLink);
	$topPrefNum = mysql_fetch_assoc($topPrefNum);
	$topPrefNum = explode('-',$topPrefNum['parent_sku']);
	//echo $topPrefNum[1];
	
	while($i <= $numSkus) {
	$topPrefNum[1] = $topPrefNum[1]+1;
	$topPrefNum[1] = str_pad($topPrefNum[1],6,"0", STR_PAD_LEFT);

	$newSku = implode('-', array($catPref, $topPrefNum[1]));
	echo '<tr><td>Generated: </td><td>'.$newSku.'</td></tr>';
	$i++;
	}
}

?>

</table>

<?php 
?>