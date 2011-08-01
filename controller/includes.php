<?php 

/**
 * vCMS Specific functions
 **/

//Logic Functions
include 'controller/f_vCMS_logic_core.php';

//UI Functions and Objects
include 'controller/f_vCMS_ui_core.php';


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