<?php
    function insert_user($user, $password) {
        require_once "config.php";
                
        $connection = get_connection();

        $sql = "INSERT INTO users (id, username, password) VALUES (null, '$user', '$password')";

        $results = mysqli_query($connection, $sql);
        echo "Error: ".mysqli_error($connection);
        mysqli_close($connection);
        if($results==false) {
            return null;
        } else {
            return $user;
        }
        
    }
?>