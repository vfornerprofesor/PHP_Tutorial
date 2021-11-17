<?php
    
    function get_user_password($user, $password) {
        require_once "config.php";
        $connection = get_connection();

        //Prepare SQL
        $sql = "SELECT username FROM users WHERE username = '$user' and password= '$password'";

        $results = mysqli_query($connection, $sql);
        mysqli_close($connection);
        while($row = mysqli_fetch_row($results)) {
            return $row[0];
        }
        return null;
    }

    function get_user($user) {
        require_once "config.php";
        $connection = get_connection();

        //Prepare SQL
        $sql = "SELECT * FROM users WHERE username = '$user'";
        $results = mysqli_query($connection, $sql);
        mysqli_close($connection);

        while($row = mysqli_fetch_row($results)) {
            return $row[0];
        }
        return null;
    }

       


?>