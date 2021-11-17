<?php
    /* Database credentials. Assuming you are running MySQL
    server with default setting (user 'root' with no password) */
    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'phpmyadmin');
    define('DB_PASSWORD', 'vf');
    define('DB_NAME', 'reparacionsvf_db');

    function get_connection() {
        $connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME) or die ("could not connect to mysql");;
        if(mysqli_connect_errno()) {
            echo "Error al connectar amb la base de dades";
            exit();
        }
        mysqli_set_charset($connection, "utf8");
        return $connection;
    }
    

?>