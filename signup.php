<?php
    // Initialize the session
    session_start();
    
    // Check if the user is already logged in, if yes then redirect him to welcome page
    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
        header("location: index.php");
        exit;
    }
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
            
            <form action="check_registry.php" method="post">
                <p>Usuari:</p>
                <input type="text" name=usuari placeholder="Usuari" />
                <p>Contrasenya:</p>
                <input type="password" name=password placeholder="Contrasenya" />
                <p>Repeteix la contrasenya:</p>
                <input type="repassword" name=repassword placeholder="Repeteix la contrasenya" />
                <input type="submit" name=send value="Registrar-se"/>
            </form>
            <a href='login.php'>Ja tens un compte? Inicia sessió</a>
        </div>
    </body>

</html>