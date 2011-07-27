<?php 
//Get sku
$parent_sku = $_GET['sku'];
?>

<table class="table_window">
	<tr><td colspan="3"><h3>Internal Item Header</h3></td></tr>
	<tr><td><b>Parent SKU</b></td><td><b>Variation</b></td><td><b>Item Title</b></td></tr>
	<tr><td><?php echo $parent_sku; ?></td><td><?php single_item_view($parent_sku,'variant_flag');?></td><td><?php single_item_view($parent_sku,'master_title');?></td></tr>
</table>
<br/>
<table class="table_window">
	<tr><td colspan="3"><h3>Internal Item Description</h3></td></tr>
	<tr><td colspan="3"><?php single_item_view($parent_sku, 'master_desc')?> </td></tr>
</table>


</table>

