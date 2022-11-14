<!DOCTYPE html>
<html>
    <head>
        <title>Práctica 3 - CV Actualizado</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="styles/style_user.css" type="text/css"> 
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0" />
    </head>
    <body>
        <content>
            <?php
            //formulario donde introducimos los datos del usuario y su contraseña 
            echo'<a href="index.php"><button class = "atras" style=" width: 75px; padding: 10px; margin: 25px;"><span class="material-symbols-outlined">arrow_back</span></button></a>';
            
            echo '<form action="alta_user.php" method="POST" role="form" class="container">
                    <h1>Registrarse</h1>
                    <div class="alert">';
                        if (isset($_GET['error'])){
                            if ($_GET['error']=='faltan_cosas'){
                                echo "Rellene todos los campos, por favor";
                            } 
                            else if ($_GET['error']=='ya_en_uso'){
                                echo "Usuario o Correo ya registrado.";
                            } 
                            else if ($_GET['error']=='wrongUsername'){
                                echo "Usuario no encontrado";
                            } 
                            else if ($_GET['error']=='wrongPassword'){
                                echo "Contraseña incorrecta";
                            } 
                            else if ($_GET['error']=='unfilled'){
                                echo "Tienes que completar todos los campos";
                            }
                        }
                    echo '</div>
                    <span class="material-symbols-rounded">assignment_ind</span><input type="text" placeholder="Name" name = "nombre">
                    <span class="material-symbols-rounded">badge</span><input type="text" placeholder="Surname" name = "apellido">
                    <span class="material-symbols-rounded">mail</span><input type="text" placeholder="Email" name = "correo">
                    <span class="material-symbols-rounded">person</span><input type="text" placeholder="User" name = "usuario">
                    <span class="material-symbols-rounded">key</span><input type="password" placeholder="Password" name = "passwd">
                    <br>
                    <button type="submit" value="Registrarse">Registrarse</button>
                </form>';

            
            // if (!isset($_REQUEST['usuario']) && isset($_REQUEST['passwd'])){
            //     $user = $_REQUEST['usuario'];
            //     $passwd = $_REQUEST['passwd'];
            // }

           
            
           
            
            // if (isset($nombre) && isset($apellido) && isset($usuario) && isset($contraseña) && isset($correo)) {
            //     $nombre = $_REQUEST['nombre'];
            //     $apellido = $_REQUEST['apellido'];
            //     $correo = $_REQUEST['correo'];
            //     $usuario = $_REQUEST['usuario'];
            //     $contraseña = $_REQUEST['passwd'];
            //     // header('Location: alta.php');
            //     // echo "hoal";
                
            // }
            // if ($nombre = "" || $apellido = "" || $correo = "" || $usuario = "" || $contraseña = "") {
            //                 echo "Rellene todos los campos, por favor.";
            //             }
            
            ?>
        </content>        
    </body>
    <footer>
        <p>© Ivan Lopez & Berta Pasamontes</p>
    </footer> 
</html>