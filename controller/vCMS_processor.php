<?php

//Process for sku generator
if($_POST['process'] == 'generateSku')
{
	generate_sku($_POST['numSkus'], $_POST['catPref'], $_POST['varFlag']);
}

//Process for item search
if($_GET['process'] == 'itemSearch') 
{
	item_search($_GET['parentSku'], $_GET['catPref'],$_GET['itemType'], $_GET['itemStatus'], $_GET['min'], $_GET['max'], $_GET['sort']);

}

//Process updates for individual item header
if($_POST['update'] == 'itemHeader') {
	db_obj_item_update($_POST['parent_sku'], 'item_master', 'master_title', $_POST['master_title']);
	db_obj_item_update($_POST['parent_sku'], 'item_master', 'master_desc', $_POST['master_desc']);
	db_obj_item_update($_POST['parent_sku'], 'item_uom', 'length', $_POST['length']);
	db_obj_item_update($_POST['parent_sku'], 'item_uom', 'width', $_POST['width']);
	db_obj_item_update($_POST['parent_sku'], 'item_uom', 'height', $_POST['height']);
	db_obj_item_update($_POST['parent_sku'], 'item_uom', 'weight', $_POST['weight']);
	db_obj_item_update($_POST['parent_sku'], 'item_alloc', 'status', 'USED');
	echo '<meta http-equiv="refresh" content=".01;url=?v=item_view&sku='.$_POST['parent_sku'].'&tab=item_header&variant='.$_POST['variant'].'">';
}

//Process updates for individual item mfg
if($_POST['update'] == 'itemMfg') {
	db_obj_item_update($_POST['parent_sku'], 'item_vendor', 'mfg_name', $_POST['mfgName']);
	db_obj_item_update($_POST['parent_sku'], 'item_vendor', 'mfg_upc', $_POST['mfgUPC']);
	db_obj_item_update($_POST['parent_sku'], 'item_alloc', 'status', 'USED');
	echo '<meta http-equiv="refresh" content=".01;url=?v=item_view&sku='.$_POST['parent_sku'].'&tab=item_vendor&variant='.$_POST['variant'].'">';
}

//Processes for item vendor insert,update,delete
if($_POST['insert'] == 'itemVendor') {
		db_obj_insert_item_vendor($_POST['parent_sku'], $_POST['vendorCode'], $_POST['vendorSku']);
		db_obj_item_update($_POST['parent_sku'], 'item_alloc', 'status', 'USED');
		echo '<meta http-equiv="refresh" content=".01;url=?v=item_view&sku='.$_POST['parent_sku'].'&tab=item_vendor&variant='.$_POST['variant'].'">';
}

if($_POST['update'] == 'itemVendor') {
		db_obj_update_item_vendor($_POST['parent_sku'], $_POST['newVendorCode'], $_POST['oldVendorCode'], $_POST['newVendorSku'], $_POST['oldVendorSku']);
		db_obj_item_update($_POST['parent_sku'], 'item_alloc', 'status', 'USED');
		echo '<meta http-equiv="refresh" content=".01;url=?v=item_view&sku='.$_POST['parent_sku'].'&tab=item_vendor">';		
}

if($_POST['delete'] == 'itemVendor') {
		db_obj_delete_item_vendor($_POST['parent_sku'], $_POST['vendorCode'],$_POST['vendorSku']);
		db_obj_item_update($_POST['parent_sku'], 'item_alloc', 'status', 'USED');
		echo '<meta http-equiv="refresh" content=".01;url=?v=item_view&sku='.$_POST['parent_sku'].'&tab=item_vendor">';
}

//Processes for item alias insert,update,delete
if($_POST['insert'] == 'itemAlias') {
		db_obj_insert_item_alias($_POST['parent_sku'], $_POST['aliasType'], $_POST['aliasSku']);
		db_obj_item_update($_POST['parent_sku'], 'item_alloc', 'status', 'USED');
		echo '<meta http-equiv="refresh" content=".01;url=?v=item_view&sku='.$_POST['parent_sku'].'&tab=item_vendor">';
}

if($_POST['update'] == 'itemAlias') {
		db_obj_update_item_alias($_POST['parent_sku'], $_POST['newAliasType'], $_POST['oldAliasType'], $_POST['newAliasSku'], $_POST['oldAliasSku']);
		db_obj_item_update($_POST['parent_sku'], 'item_alloc', 'status', 'USED');
		echo '<meta http-equiv="refresh" content=".01;url=?v=item_view&sku='.$_POST['parent_sku'].'&tab=item_vendor&variant='.$_POST['variant'].'">';		
}

if($_POST['delete'] == 'itemAlias') {
		db_obj_delete_item_alias($_POST['parent_sku'], $_POST['aliasType'],$_POST['aliasSku']);
		db_obj_item_update($_POST['parent_sku'], 'item_alloc', 'status', 'USED');
		echo '<meta http-equiv="refresh" content=".01;url=?v=item_view&sku='.$_POST['parent_sku'].'&tab=item_vendor&variant='.$_POST['variant'].'">';
}

//Process for item variations insert, update delete
if($_POST['insert'] == 'itemVariant'){
		//Create item sku based on parent_sku and variant_sku
		$parent_sku = $_POST['parent_sku'];
		$varSku = $_POST['varSku'];
		$item_sku_arr = array($parent_sku,$varSku);
		$item_sku = join(" ",$item_sku_arr);
		db_obj_insert_item_variant($_POST['parent_sku'], $item_sku, $_POST['varSku'], $_POST['varDesc'], $_POST['varType']);
		echo '<meta http-equiv="refresh" content=".01;url=?v=item_view&sku='.$_POST['parent_sku'].'&tab=item_variant&variant=1">';
}

if($_POST['delete'] == 'itemVariant'){
		db_obj_delete_item_variant($_POST['item_sku']);
		echo '<meta http-equiv="refresh" content=".01;url=?v=item_view&sku='.$_POST['parent_sku'].'&tab=item_variant&variant=1">';
}

if($_POST['update'] == 'itemVariant'){
		db_obj_update_item_variant($_POST['item_sku'],$_POST['newVarSku'],$_POST['newVarDesc'],$_POST['newVarType']);
		echo '<meta http-equiv="refresh" content=".01;url=?v=item_view&sku='.$_POST['parent_sku'].'&tab=item_variant&variant=1">';
}


?>