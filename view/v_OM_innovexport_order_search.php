<form url="" method="post">
<table class="table_main">
<tr><td colspan="4"><h3>InnovExport Order Search</h3></td></tr>
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
</tr>

<tr>
	<td colspan="4"><input type="hidden" name="process" value="search"></input><input type="submit" name="Search"></input></td>
</tr>
</form>
</table>

<?php 
if($_POST['process'] == 'search') {
	OM_InnovExport_Search($_POST['export_stat_type']);
}

if($_POST['process'] == 'release') {
	OM_InnovExport_Fraud_Release($_POST['orderNumber']);
	OM_InnovExport_Search('7');
}

if($_POST['process'] == 'cancel') {
	OM_InnovExport_Fraud_Cancel($_POST['orderNumber']);
	OM_InnovExport_Search('7');
}

?>