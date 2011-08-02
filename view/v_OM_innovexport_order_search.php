<form action="?p=OM" method="post">
<table class="table_main">
<td><h3>InnovExport Order Search</h3></td>
</table>
<table class="table_main">
<tr>
	<td><b>Status Type:</b></td>
	<td><select name='export_stat_type'>
			<option value=''>All Types</option>
			<option value='0'>New Orders</option>
			<option value='2'>Item Mapping</option>
			<option value='3'>Order Exception(Dropship, Customer Pickup, Discontinued)</option>
			<option value='4'>Cancelled</option>
			<option value='7'>Fraud Exception</option>
		</select> </td>
		<td><input type="hidden" name="process" value="omSearch"></input><input type="submit" name="Search"></input></td>
</tr>

</form>
</table>
