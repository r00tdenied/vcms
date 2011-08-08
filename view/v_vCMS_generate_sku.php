<form action="?p=vCMS" method="post">
<table class="table_main">
<td><h3>Generate New Skus</h3></td>
</table>
<table class="table_main">
<tr><td colspan="14" style="text-align:center;"><b>Last Utilized Sku by Prefix</b></td></tr>
<tr>
	<td><b>OS:</b></td><td><?php last_generated_sku('OS');?></td>
	<td><b>AP:</b></td><td><?php last_generated_sku('AP');?></td>
	<td><b>GT:</b></td><td><?php last_generated_sku('GT');?></td>
	<td><b>GE:</b></td><td><?php last_generated_sku('GE');?></td>
	<td><b>GH:</b></td><td><?php last_generated_sku('GH');?></td>
	<td><b>TL:</b></td><td><?php last_generated_sku('TL');?></td>
	<td><b>PS:</b></td><td><?php last_generated_sku('PS');?></td>
</tr>
</table>

<table class="table_main">
<tr>
	<td><b>Select item prefix:</td>
	<td><?php item_prefix_select('0') ?></td>
	<td class="table_row_button" rowspan="3">
		<input type="hidden" name="process" value="generateSku"/>
		<input type="submit" name="submit" value="Generate Skus"></td>
</tr>
<tr>
	<td><b>Total items to create:</b></td>
	<td><input type="text" name="numSkus" /></td>
</tr>
<tr>
	<td><b>Build items with variation:</b></td>
	<td>
		<select name='varFlag'>
			<option value='0'>Disabled</option>
			<option value='1'>Enabled</option>
		</select>	
</tr>
</table>
</form>
