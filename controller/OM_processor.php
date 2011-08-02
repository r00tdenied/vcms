<?php

//Process for sku generator
if($_POST['process'] == 'omSearch') {
	OM_InnovExport_Search($_POST['export_stat_type']);
}

if($_POST['process'] == 'omRelease') {
	OM_InnovExport_Fraud_Release($_POST['orderNumber']);
	OM_InnovExport_Search('7');
}

if($_POST['process'] == 'omCancel') {
	OM_InnovExport_Fraud_Cancel($_POST['orderNumber']);
	OM_InnovExport_Search('7');
}

