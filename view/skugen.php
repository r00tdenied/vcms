<form action="" method="post">
<table style='margin-left: auto; margin-right: auto; width: 600px;border: 2px solid #ccc;border-radius: 5px;-webkit-border-radius:5px;' >
<tr><td>Select item category:</td><td><select name='catPref'>
<?php 
item_prefix_select();
?>
</select>
</td></tr>
<tr><td>Total items to create:</td><td><input type="text" name="numSkus" /></td></tr>
<tr><td>Build items with variation:</td><td><select name='varFlag'><option value='0'>Disabled</option><option value='1'>Enabled</option></select>
<tr><td colspan='2' style="text-align:center;"><input type="submit" value="Generate Skus"></td></tr>
</form>
<?php 
generate_sku($_POST['numSkus'], $_POST['catPref'], $_POST['varFlag']);
?>
</table>
