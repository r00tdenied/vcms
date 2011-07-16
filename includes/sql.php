<?php

function dbconn($strHostName, $strDbName, $strUserName, $strPassword) {

   //
   // MYSQL CONNECTION FUNCTION
   //
   // 2006-08, 2008-09 http://kimbriggs.com/computers/
   //
   // Parameters: Host Name, Database Name, Username and Password for MySQL.
   //
   // Provides: MySQL Connection Resource and Database Selection.
   //

   // Make the connection global. Return it if it exists.
   // Pilfered from the PHP online manual page:
   // http://www.php.net/function.mysql-connect
   global $DbLink;
   if($DbLink) {
      return $DbLink;
   }

   // Use the mysql_connect funtion to connect to database
   // or generate a readable error message.
   $DbLink = mysql_connect(DB_ADDRESS,DB_USER,DB_PASSWORD);
   if (!$DbLink) {
      echo "<br />MySQL SERVER CONNECTION ERROR.<br />\n";
      return false;
   }

   //Use the mysql_select_db function to select a database
   // or generate a readable error message.
   if (!mysql_select_db(DB_NAME, $DbLink)) {
      echo "<br />DATABASE SELECTION ERROR: ".mysql_error()."<br />\n";
      return false;
   }

}

?>