<!DOCTYPE html>
<html>
    <head>
        <title>Práctica 3 - CV Actualizado</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="styles/style_user.css" type="text/css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0" />
    </head>
    <body>
        <?php 
            session_start();
            if (isset($_SESSION['usuario'])){
                header('Location: cv.php');
                exit;
            }
            echo '<form action="valida.php" method="POST" role="form" class="container"> 
                <h1>¡Bienvenid@!</h1>        
                <h2>Login</h2>
                <div class="alert">';
                    if (isset($_GET['error'])){
                        if ($_GET['error']==1){
                            echo "El usuario o la contraseña son incorrectos";
                        } 
                        
                        else if ($_GET['error']=='no_en_uso'){
                            echo "Usuario o contraseña no registrado";
                        } 
                    }
                echo '</div>
                <span class="material-symbols-rounded">person</span><input id="username" type="text" placeholder="Username" name="usuario">
                <span class="material-symbols-rounded">key</span><input type="password" placeholder="Password"  name="passwd">
                <br>
                <button id="iniciar_sesion" type="submit" value="Iniciar Sesion">Inicar sesión</button>
                <p class="subtitulo">¿Todavía no estás registrado?</p>
                <br>  
                <button type="submit" formaction="registre.php" class="regist" value="Registrarse">Registrarse</button>
                <br>
            </form>';  
        ?>         
         
    </body>
    <footer class= "copyright">
        <p style="position: relative;">© Ivan Lopez & Berta Pasamontes</p>
    </footer>
</html>