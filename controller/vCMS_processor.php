<?php

//Process for sku generator
if($_POST['process'] == 'generateSku')
{
	generate_sku($_POST['numSkus'], $_POST['catPref'], $_POST['varFlag']);
}

//Process for item search
if($_POST['process'] == 'itemSearch') 
{
	item_search($_POST['parentSku'], $_POST['catPref'],$_POST['itemType'], $_POST['itemStatus'], $_POST['min'], $_POST['max']);

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
	echo '<meta http-equiv="refresh" content=".5;url=?v=item_view&sku='.$_POST['parent_sku'].'&tab=item_header">';
}

//Process updates for individual item mfg
if($_POST['update'] == 'itemMfg') {
	db_obj_item_update($_POST['parent_sku'], 'item_vendor', 'mfg_name', $_POST['mfgName']);
	db_obj_item_update($_POST['parent_sku'], 'item_vendor', 'mfg_upc', $_POST['mfgUPC']);
	db_obj_item_update($_POST['parent_sku'], 'item_alloc', 'status', 'USED');
	echo '<meta http-equiv="refresh" content=".5;url=?v=item_view&sku='.$_POST['parent_sku'].'&tab=item_vendor">';
}

//Process inserts for item vendors
if($_POST['insert'] == 'itemVendor') {
		db_obj_insert_vendor($_POST['parent_sku'], $_POST['vendorCode'], $_POST['vendorSku']);
		echo '<meta http-equiv="refresh" content=".5;url=?v=item_view&sku='.$_POST['parent_sku'].'&tab=item_vendor">';
}

if($_POST['update'] == 'itemVendor') {
		db_obj_update_vendor($_POST['parent_sku'], $_POST['newVendorCode'], $_POST['oldVendorCode'], $_POST['newVendorSku'], $_POST['oldVendorSku']);
		echo '<meta http-equiv="refresh" content=".5;url=?v=item_view&sku='.$_POST['parent_sku'].'&tab=item_vendor">';		
}


?>