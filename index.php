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
<script type="text/javascript" src="view/js/jquery-sticklr-1.2.min.js"></script>

<style> @import "view/css/main.css"; </style>      
<link rel="stylesheet" type="text/css" media="screen,projection" href="view/css/jquery-sticklr-1.2-light-color.css" />
         
</head>
<body>

<?php 
//Menu Elements
	include "view/menu.php";


// View Control
switch ($_GET[v])
{
	//Portal
	case '': include "view/portal.php"; break;
		
	//Admin Control pages
	case 'acp': include "view/admin/main.php"; break;
	case 'acp-users': include "view/admin/users.php"; break;
	case 'acp-channels': include "view/admin/channels.php"; break;
	case 'acp-categories': include "view/admin/categories.php"; break;
	case 'acp-prefix': include "view/admin/prefix.php"; break;
	
	//User Control Pages
	case 'ucp': include "view/users/main.php"; break;
	case 'ucp-profile': include "view/users/profile.php"; break;
	
	//Main Pages
	case 'itemview'; include "view/itemview.php"; break;
	case 'skugen'; include "view/skugen.php"; break;
	case 'itemsearch'; include "view/itemsearch.php"; break;
	case 'portal'; include "view/portal.php"; break;
	
	//External import tools
	case 'sears-importer'; include "view/sears-importer.php"; break;
	
}

// Footer Page Elements
//	include "view/footer.php"
?>
</body>
</html>