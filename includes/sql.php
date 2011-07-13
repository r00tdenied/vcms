<?
// Class to connect to Database
class SQL
{
        private $host;
        private $user;
        private $pass;
        private $table;

        public function SQL($HostName, $UserName, $Password, $Table)
        {
                // Setup
                $this->host = $HostName;
                $this->user = $UserName;
                $this->pass = $Password;
                $this->table = $Table;

                // Connect
                $this->Connect();
        }


        private function Connect()
        {
                $db = mysql_connect($this->host, $this->user, $this->pass); mysql_select_db($this->table);
                if (!$db)
                {
                        mysql_error();
                        exit();
                        die;
                }
        }
}

// Setup connection
$SQL = new SQL(DB_ADDRESS, DB_USER, DB_PASSWORD, DB_TABLE);
?>
