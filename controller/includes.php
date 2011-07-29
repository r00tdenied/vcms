<?php 

/*
 * vCMS Specific functions
 */

//Function to generate the next available sku based on item prefix
include 'controller/f_generate_sku.php';
//Function to write html select code for all available item prefixes
include 'controller/f_item_prefix_select.php';
//Function for search and generating lists of multiple items based on specific criteria
include 'controller/f_multi_item_search.php';
//Function to write html select code for item allocation status
include 'controller/f_item_status_select.php';
//Function to write html select code for item prefix types
include 'controller/f_item_prefix_type_select.php';
//Function to call values from specific fields in tables
include 'controller/f_db_obj_item_view.php';
//Function to identify channels for a given item
include 'controller/f_db_obj_item_channels.php';



/*
 * OM Module functions
 */

//Function to trigger Sears import process
include 'controller/f_OM_Sears_Importer.php';
//Function to Search InnovExport orders
include 'controller/f_OM_innovexport_search.php';
//Function to update fraud orders for release
include 'controller/f_OM_innovexport_fraud_release.php';
//Function to cancel fraud orders from OM
include 'controller/f_OM_innovexport_fraud_cancel.php';

?>