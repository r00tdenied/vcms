<?php
//Model include
	include "model/includes.php";
//Controller include
	include "controller/includes.php";			
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><? SetPageTitle(); ?></title>

<script type="text/javascript" src="view/js/jquery-1.4.3.min.js"></script>
<?php 
if($_GET[v] != 'item_view' && $_GET[p] != 'vCMS-tab' & $_GET[p] !='OM-tab'){
	echo '<script type="text/javascript" src="view/js/jquery-sticklr-1.2.min.js"></script>';
	echo '<link rel="stylesheet" type="text/css" media="screen,projection" href="view/css/jquery-sticklr-1.2-light-color.css" />';
	include "view/ui_menu.php";
}
?>

<script type="text/javascript" src="view/js/jquery.colorbox.js"></script>

<link rel="stylesheet" type="text/css" media="screen,projection" href="view/css/slidingtabs-horizontal.css" />
<link rel="stylesheet" type="text/css" media="screen,projection" href="view/css/main.css" />
<link rel="stylesheet" type="text/css" media="screen,projection" href="view/css/colorbox.css" />

<!-- Begin Jquery Colorbox script -->

<script>
		$(document).ready(function(){
			//Examples of how to assign the ColorBox event to elements
			$(".example7").colorbox({innerWidth:"880px", innerHeight:"575px", iframe:true, top:"10px", opacity:".70"});
			
		});
	</script>     
<!-- End Jquery Colorbox script -->

<!--  Begin Sliding Tabs script -->
  <script type="text/javascript" src="view/js/slidingtabs/plugins/jquery.mousewheel.min.js"></script>
	<script type="text/javascript" src="view/js/slidingtabs/plugins/jquery.easing.1.3.js"></script>
	<script type="text/javascript" src="view/js/slidingtabs/jquery.slidingtabs.pack.js"></script>
    <script type="text/javascript">  
  	$(document).ready(function() {		
  		// Horizontal Sliding Tabs demo
  		$('div#st_horizontal').slideTabs({  			
			// Options  			
			contentAnim: 'slideH',
			contentAnimTime: 600,
			contentEasing: 'easeInOutExpo',
			orientation: 'horizontal',
			tabsAnimTime: 300			
  		});		  		  			
  	});		
    </script>
<!--  End Sliding Tabs script -->    
</head>
<body>
<?php 

// View Control
switch ($_GET[v])
{
	//Main Pages
	case 'item_view'; include "view/v_vCMS_item_view.php"; break;
	case 'generate_sku'; include "view/v_vCMS_generate_sku.php"; break;
	case 'item_search'; include "view/v_vCMS_item_search.php"; break;
	case 'portal'; include "view/portal.php"; break;
	
	//External import tools
	case 'OM_sears_importer'; include "view/v_OM_sears_importer.php"; break;
	
	//InnovExport Tools
	case 'OM_innovexport_order_search'; include "view/v_OM_innovexport_order_search.php"; break;
}
//Processors
switch ($_GET[p])
{
	case 'vCMS' ; include "controller/vCMS_processor.php"; break;
	case 'vCMS-tab' ; include "controller/vCMS_processor.php"; break;
	case 'OM' ; include "controller/OM_processor.php"; break;
	case 'OM-tab' ; include "controller/OM_processor.php"; break;
}

	// Footer Page Elements
	//include "view/footer.php"
?>
</body>
</html>