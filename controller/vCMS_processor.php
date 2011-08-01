<?php

//Process sku generation
if($_POST['process'] == 'generateSku')
{
	generate_sku($_POST['numSkus'], $_POST['catPref'], $_POST['varFlag']);
}

//Process for item search
if($_POST['process'] == 'itemSearch') 
{
	multi_item_search($_POST['parentSku'], $_POST['catPref'],$_POST['itemType'], $_POST['itemStatus']);
}
?>