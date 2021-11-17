<?php 
    
    // Initialize the session
    session_start();

    // Check if the user is already logged in, if not then redirect him to login page
    if(!isset($_SESSION["user"]) || $_SESSION["user"] == ""){
        header("location: login.php");
        exit;
    } else {
        $user=$_SESSION["user"];
    }
?>
<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="styles.css" />
    </head> 

    <body>
        <div class="header">
            <table>
                <tr>
                    <td>
                        <img style="display: block;margin-left: auto;margin-right: auto;" width=100px src="img/icon.png" />
                    </td>
                    <td>
                        <h1 style="text-align:center">Reparacions VF</h1>
                    </td>
                    <td>
                        <p style="text-align:right">Benvingut <?php echo $user; ?>  <a href='logout.php'>Tancar sessió</a></p>
                    </td>
                </tr>
            </table>
        </div>


    </body>

</html>