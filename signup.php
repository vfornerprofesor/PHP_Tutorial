<?php
    // Initialize the session
    session_start();
    
    // Check if the user is already logged in, if yes then redirect him to welcome page
    if(isset($_SESSION["user"]) && $_SESSION["user"] != ""){
        header("location: index.php");
        exit;
    }

    //If post check login
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
        require_once "database/get_user.php";
        require_once "database/insert_user.php";

        //Get user and password
        $user = $_POST["user"];
        $password = $_POST["password"];
        $repassword = $_POST["repassword"];

        if($password != $repassword) {
            $error = "Les contrasenyes no coincideixen";
        } else {
            $exists = get_user($user);
            //$exists = false;
            if($exists) {
                $error = "L'usuari ja existeix";
            } else {
                $created = insert_user($user, $password);
                if($created) {
                   session_start();
                   $_SESSION["user"]=$user;
                   header("location:index.php");
               } else {
                   $error = "No s'ha pogut crear l'usuari";
               }                
            }
        }
    }

    //https://www.tutorialrepublic.com/php-tutorial/php-mysql-login-system.php
?>
<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="styles.css" />
    </head> 

    <body>
        <img class="img_logo" src="img/logo.png" />
        <div class="div_signin_signup">
            <h2>Registrar-se</h2>
            
            <form action="signup.php" method="post">
                <p>Usuari:</p>
                <input type="text" name=user placeholder="Usuari" <?php echo "value='".$user."'"; ?>"/>
                <p>Contrasenya:</p>
                <input type="password" name=password placeholder="Contrasenya" <?php echo "value='".$password."'"; ?> />
                <p>Repeteix la contrasenya:</p>
                <input type="password" name=repassword placeholder="Repeteix la contrasenya" <?php echo "value='".$repassword."'"; ?>/>
                <?php if($error != "") { echo "<p class='error'>".$error."</p>"; } ?>
                <input type="submit" name=send value="Registrar-se"/>
            </form>
            <a href='login.php'>Ja tens un compte? Inicia sessió</a>
        </div>
    </body>

</html>