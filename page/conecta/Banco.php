<?php 
class DB_CONNECT
{
    private $con;

    function __construct() {
        $this->connect();
    }

    function __destruct() {
        $this->close();
    }

    function connect()
    {
        if ($this->con) {
            return NULL;
        }

        $this->con = mysqli_connect('localhost', 'cnogueira','07101997@Julio', 'Devs') or die(mysqli_error());
    }

    function getConnection()
    {
        return $this->con;
    }

    function close()
    {
        mysqli_close($this->con);
    }
}
?>