<?php
# Main includes
	include "includes/defines.php";
    //include "includes/database.php";
    //include "includes/session.php";
    include "includes/sql.php";
#Header Page Elements
	//include "menu.php";		
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><? SetPageTitle(); ?></title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>              <!-- Googles Jquery -->
<style> @import "css/all.css"; </style>               
</head>
<body>
<?php 
//if (PageURL () == 'http://qa-vcms/') { include "home.php"; }

// Page Control
switch ($_GET[p])
{
	//Admin Control pages
	case 'acp': include "admin/main.php"; break;
	case 'acp-users': include "admin/users.php"; break;
	case 'acp-channels': include "admin/channels.php"; break;
	case 'acp-categories': include "admin/categories.php"; break;
	case 'acp-prefix': include "admin/prefix.php"; break;
	
	//User Control Pages
	case 'ucp': include "users/main.php"; break;
	case 'ucp-profile': include "users/profile.php"; break;
	
	//Main Pages
	case 'itemview'; include "itemview.php"; break;
	case 'skugen'; include "skugen.php"; break;
	case 'portal'; include "portal.php"; break;
}



// Footer Page Elements
	include "footer.php"
?>
</body>
</html>