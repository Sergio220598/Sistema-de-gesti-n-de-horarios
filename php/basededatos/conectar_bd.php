
<?php
    function conectarBD()
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database   = "sotr20202";

        $mysqli = new mysqli($servername, $username, $password,$database);

        if ($mysqli->connect_error) {
            die("Fallo de conexion: " . $mysqli->connect_error);
        }
        else
           
            return $mysqli;
    }

?>