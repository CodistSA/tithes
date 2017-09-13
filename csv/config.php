<?php
function getdb()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "codistco_tithes";
    //$password = "@ntoky1990";
    //$db = "codistco_tithes";

    try {
       
        $conn = mysqli_connect($servername, $username, $password, $db);
         //echo "Connected successfully"; 
        }
    catch(exception $e)
        {
        echo "Connection failed: " . $e->getMessage();
        }
        return $conn;
}
?>