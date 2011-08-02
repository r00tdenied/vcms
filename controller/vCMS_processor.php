<?php

//Process for sku generator
if($_POST['process'] == 'generateSku')
{
	generate_sku($_POST['numSkus'], $_POST['catPref'], $_POST['varFlag']);
}

//Process for item search
if($_POST['process'] == 'itemSearch') 
{
	item_search($_POST['parentSku'], $_POST['catPref'],$_POST['itemType'], $_POST['itemStatus']);
}

//Process updates for individual item header
if($_POST['update'] == 'itemHeader') {
	db_obj_item_update($_POST['parent_sku'], 'item_master', 'master_title', $_POST['master_title']);
	db_obj_item_update($_POST['parent_sku'], 'item_master', 'master_desc', $_POST['master_desc']);
	db_obj_item_update($_POST['parent_sku'], 'item_master', 'length', $_POST['length']);
	db_obj_item_update($_POST['parent_sku'], 'item_master', 'width', $_POST['width']);
	db_obj_item_update($_POST['parent_sku'], 'item_master', 'height', $_POST['height']);
	db_obj_item_update($_POST['parent_sku'], 'item_master', 'weight', $_POST['weight']);
	echo '<meta http-equiv="refresh" content=".5;url=?v=item_view&sku='.$_POST['parent_sku'].'">';
}

?>