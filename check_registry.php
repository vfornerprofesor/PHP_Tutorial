<?php
    // Include config file
    require_once "config.php";

    $user = $_POST["user"];
    $password = $_POST["password"];

    //cho $user;
    //echo $password;

    $sql = "SELECT * FROM users WHERE username = :user and password= :password";
    $resultado=$base->prepare($sql);

    $resultado->bindValue(":user", $user);
    $resultado->bindValue(":password", $password);
    $resultado->execute();

    $num_registro = $resultado->rowCount();
    if($num_registro!=0) {
        session_start();
        $_SESSION["user"]=$user;
        header("location:index.php");
    } else {
        header("location:login.php");
    }
    

?>