<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link rel="stylesheet" type="text/css" media="screen,projection" href="view/css/jquery-sticklr-1.2-light-color.css" />
	<script type="text/javascript" src="view/js/jquery-1.4.3.min.js"></script>
	<script type="text/javascript" src="view/js/jquery-sticklr-1.2.min.js"></script>
	<script type="text/javascript">
	    $(document).ready(function(){
	        $('#example-1').sticklr({
	            animate     : true,
				showOn		: 'hover'
			});
	    });
	</script>
</head>
<body>

    <ul id="example-1" class="sticklr">
    	<li>
    		<a href="?v=portal" class="icon-home" title="Portal"></a>
		</li>    
    	<li>
            <a href="#" class="icon-sign-in" title="Item Management"></a>
            <ul>
                <li class="sticklr-title">
                    <a href="#">Item Management</a>
                </li>
                <li>
                    <a href="?v=skugen" class="icon-database">Generate New Skus</a>
                </li>
                <li>
                    <a href="http://themeforest.net/?ref=amatyr4n" class="icon-facebook">Facebook</a>
                </li>
                <li>
                    <a href="http://codecanyon.net/?ref=amatyr4n" class="icon-google">Google</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="?v=itemsearch" class="icon-zoom" title="Item Search"></a>
       </li>
    </ul>

</body>
</html>
