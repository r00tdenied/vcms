<form action="?p=vCMS" method="post">
<table class="table_main" >
<td><h3>Generate New Skus</h3></td>
</table>
<table class="table_main">
<tr><td>Select item category:</td><td>
<?php item_prefix_select('0') ?>
</td></tr>
<tr><td>Total items to create:</td><td><input type="text" name="numSkus" /></td></tr>
<tr><td>Build items with variation:</td><td><select name='varFlag'><option value='0'>Disabled</option><option value='1'>Enabled</option></select>
<tr><td style="text-align:center;" colspan="2"><input type="hidden" name="process" value="generateSku"></input><input type="submit" name="submit" value="Generate Skus"></form></td></tr>
</form>
