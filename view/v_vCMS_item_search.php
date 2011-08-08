<form action="?p=vCMS" method="GET">
<table class="table_main">
<td><h3>Item Search</h3></td>
</table>
<table class="table_main">
<tr><td colspan="12" style="text-align:center;"><b>Last Utilized Sku by Prefix</b></td></tr>
<tr>
	<td><b>OS:</b></td><td><?php last_generated_sku('OS');?></td>
	<td><b>AP:</b></td><td><?php last_generated_sku('AP');?></td>
	<td><b>GT:</b></td><td><?php last_generated_sku('GT');?></td>
	<td><b>GE:</b></td><td><?php last_generated_sku('GE');?></td>
	<td><b>TL:</b></td><td><?php last_generated_sku('TL');?></td>
	<td><b>PS:</b></td><td><?php last_generated_sku('PS');?></td>
</tr>
</table>
<table class="table_main">
<tr>
	<td><b>Parent SKU:</b></td>
	<td><input type="hidden" name="p" value="vCMS">
		<input type="text" name="parentSku"></input></td>

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

