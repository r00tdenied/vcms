<?php 

/**
 * vCMS Specific functions
 **/

//Logic Functions

//Function to generate the next available sku based on item prefix
include 'controller/f_vCMS_generate_sku.php';
//Function to call values from specific fields in tables
include 'controller/f_vCMS_db_obj_item_view.php';
//Function to identify channels for a given item
include 'controller/f_vCMS_db_obj_item_channels.php';


//UI Functions and Objects

//Function for dynamic tab single item view UI
include 'controller/f_vCMS_ui_single_item_view.php';
//Function to write html select code for all available item prefixes
include 'controller/f_vCMS_ui_item_prefix_select.php';
//Function to write html select code for item allocation status
include 'controller/f_vCMS_ui_item_status_select.php';
//Function to write html select code for item prefix types
include 'controller/f_vCMS_ui_item_prefix_type_select.php';
//Function for search and generating lists of multiple items based on specific criteria
include 'controller/f_vCMS_ui_multi_item_search.php';
//Function to build form dropdown for available channels
include 'controller/f_vCMS_ui_channel_master_select.php';
//Function to build item header table for specific parent sku
include 'controller/f_vCMS_ui_item_header_table.php';
//Function to build item vendor table for specific parent sku
include 'controller/f_vCMS_ui_item_vendor_table.php';


/**
 * OM Module functions
 **/

//Function to trigger Sears import process
include 'controller/f_OM_Sears_Importer.php';
//Function to Search InnovExport orders
include 'controller/f_OM_innovexport_search.php';
//Function to update fraud orders for release
include 'controller/f_OM_innovexport_fraud_release.php';
//Function to cancel fraud orders from OM
include 'controller/f_OM_innovexport_fraud_cancel.php';

?>