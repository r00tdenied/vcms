<table class="table_main">
<tr><td colspan="2"><h3 style="text-align: center;">Sears Import Tool</h3></td></tr>
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
if($_POST['scan']) {
	OM_Sears_Import('1');
	}

else {
	OM_Sears_Import('2');
}	

?>


</table>
