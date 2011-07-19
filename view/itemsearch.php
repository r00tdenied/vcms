<form url="" method="post">
<table class="table_main">
<tr><td colspan="4">Item Search</td></tr>
<tr>
	<td><b>Parent SKU:</b></td>
	<td><input type="text" name="parentSku"></input></td>
	
	<td><b>Item Prefix:</b></td>
	<td><?php item_prefix_select('1') ?></td>
</tr>

<tr>
	<td><b>Item Type:</b></td>
	<td><?php item_prefix_type_select('1')?></td>
	
	<td><b>Item Status:</b></td>
	<td><?php item_status_select('1')?></td>
</tr>

<tr>
	<td colspan="4"><input type="hidden" name="process" value="search"></input><input type="submit" name="Search"></input></td>
</tr>
</form>
</table>

<?php 
if($_POST['process'] == 'search') {
	multi_item_search($_POST['parentSku'], $_POST['catPref'],$_POST['itemType'], $_POST['itemStatus']);
}

?>