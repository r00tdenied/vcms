<form action="?p=vCMS" method="post">
<table class="table_main">
<td><h3>Item Search</h3></td>
</table>
<table class="table_main">
<tr>
	<td><b>Parent SKU:</b></td>
	<td><input type="text" name="parentSku"></input></td>

	<td><b>Item Prefix:</b></td>
	<td><?php item_prefix_select('1') ?></td>
	
	<td rowspan="2" class="table_row_button">
		<input type="hidden" name="process" value="itemSearch"/>
		<input type="submit" value="Search Items"/>
	</td>

</tr>

<tr>
	<td><b>Item Type:</b></td>
	<td><?php item_prefix_type_select('1')?></td>
	
	<td><b>Item Status:</b></td>
	<td><?php item_status_select('1')?></td>
</tr>

</form>
</table>