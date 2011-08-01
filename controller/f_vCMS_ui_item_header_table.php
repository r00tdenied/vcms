<?php

function item_header_table($parent_sku)
{
?>	
	 <table class="table_window">
						<tr><td colspan="3"><h3>Internal Item Header</h3></td></tr>
						<tr>
							<td><b>Parent SKU</b></td>
							<td><b>Variation</b></td>
							<td><b>Item Title</b></td>
						</tr>
						
						<tr>
							<td><form method="post" url=""><?php echo $parent_sku; ?></td>
							<td><?php echo db_obj_item_view($parent_sku,'item_master','variant_flag')?></td>
							<td><input size= "100" type="text" name="master_title" value="<?php echo db_obj_item_view($parent_sku,'item_master','master_title')?>"/>
							</td>
						</tr>
					</table>
					<br>
					<table class="table_window">
						<tr>
							<td><h3>Internal Item Description</h3></td>
						</tr>
						<tr>
							<td>
								<textarea rows="3" cols="95" name="master_desc"><?php echo db_obj_item_view($parent_sku,'item_master','master_desc')?></textarea>
							</td>
						</tr>
					</table>
					<br>
					<table class="table_window">
						<tr>
							<td colspan="4"><h3>Units of Measure</h3></td>
						</tr>
						<tr>
							<td style="text-align:center;"><b>Length<br/>(inches)</b></td>
							<td style="text-align:center;"><b>Width<br/>(inches)</b></td>
							<td style="text-align:center;"><b>Height<br/>(inches)</b></td>
							<td style="text-align:center;"><b>Weight<br/>(pounds)</b></td>
						</tr>
						<tr>
							<td style="text-align:center;">
								<input size="3" name="length" value="<?php echo db_obj_item_view($parent_sku, 'item_uom', 'length')?>"/>
							</td>
							<td style="text-align:center;">
								<input size="3" name="width" value="<?php echo db_obj_item_view($parent_sku, 'item_uom', 'width')?>"/>
							</td>
							<td style="text-align:center;">
								<input size="3" name="height" value="<?php echo db_obj_item_view($parent_sku, 'item_uom', 'height')?>"/>
							</td>
							<td style="text-align:center;">
								<input size="3" name="weight" value="<?php echo db_obj_item_view($parent_sku, 'item_uom', 'weight')?>"/>
							</td>
						</tr>
					</table>
					<br>
					<table class="table_window">
						<tr>
							<td style="text-align:left;">
								<input type="hidden" name="update" value="itemHeader"/>
								<input type="submit" value="Update Item Header"/>
								</form>
							</td>
							<td style="text-align:right;">
								<form method="post" url="">
								<input type="hidden" name="insert" value="addChannel"/>
								<?php channel_master_select(); ?>
								<input type="submit" value="Add item to Channel"/>
								</form>
							</td>
						</tr>
					</table>
	
<?php	
}
?>