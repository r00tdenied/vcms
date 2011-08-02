<form action="?p=vCMS" method="post">
<table class="table_main">
<td><h3>Generate New Skus</h3></td>
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
