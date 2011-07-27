<table class="table_main">
<tr><td colspan="2"><h3>Sears Import Controls</h3></td></tr>
<tr>
		<td style="text-align: center;"><form url="" method="post">
											<input type=hidden name='scan' value='scan'></input>
											<input type=submit name='submit' value='Scan for Orders'></input>
										</form>
		</td>
		<td style="text-align: center;"><form url="" method="post">
											<input type=hidden name='fetch' value='fetch'></input>
											<input type=submit name='submit' value='Fetch Scanned Orders'></input>
										</form>
		</td>
</tr>
</form>
<?php 
if($_POST['scan']=='scan') {
	OM_Sears_Import('1');
	}

elseif($_POST['fetch']=='fetch') {
	OM_Sears_Import('2');
}	

else {
	echo "<tr><td style='text-align: center;' colspan='2'>Please click <i>Scan for Orders</i> or <i>Fetch Scanned Orders</i></td</tr>";
}

?>


</table>
