<table class="table_main">
<td><h3>Sears Import Controls</h3></td>
</table>
<table class="table_main">
<tr>
		<td style="text-align: center;"><form url="" method="post">
											<input type=hidden name='process' value='QAsearsScan'></input>
											<input type=submit name='submit' value='Scan for QA Orders'></input>
										</form>
		</td>
		<td style="text-align: center;"><form url="" method="post">
											<input type=hidden name='process' value='QAsearsFetch'></input>
											<input type=submit name='submit' value='Fetch Scanned QA Orders'></input>
										</form>
		</td>
</tr>

<tr>
		<td style="text-align: center;"><form url="" method="post">
											<input type=hidden name='process' value='CALsearsScan'></input>
											<input type=submit name='submit' value='Scan for CAL Orders'></input>
										</form>
		</td>
		<td style="text-align: center;"><form url="" method="post">
											<input type=hidden name='process' value='CALsearsFetch'></input>
											<input type=submit name='submit' value='Fetch Scanned CAL Orders'></input>
										</form>
		</td>
</tr>
</form>
<?php 
if($_POST['process']=='QAsearsScan') {
	OM_QA_Sears_Import('1');
	}

elseif($_POST['process']=='QAsearsFetch') {
	OM_QA_Sears_Import('2');
}	

elseif($_POST['process']=='CALsearsScan') {
	OM_CAL_Sears_Import('1');
	}

elseif($_POST['process']=='CALsearsFetch') {
	OM_CAL_Sears_Import('2');
}	

else {
	echo "<tr><td style='text-align: center;' colspan='2'>Please click <i>Scan for Orders</i> or <i>Fetch Scanned Orders</i></td</tr>";
}

?>


</table>
