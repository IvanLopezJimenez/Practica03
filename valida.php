<!-- validación de los datos de index.php con database.php -->
<!-- no se ve. -->
<!-- si estan mal los datos, vuelve a validar. -->

<?php

require_once "database.php";
require_once "index.php";

//pov: user tiene usuario y contraseña correcta
// session_start();
// $_SESSION['user'] = $user;
//hemos creado una sesión, por lo q todos los docs pueden ver q hay aquí dentro.

$usuario = (isset($_REQUEST['usuario'])) ? $_REQUEST['usuario'] : "";
$contraseña = (isset($_REQUEST['passwd'])) ? $_REQUEST['passwd'] : "";

$conn = crear_conexion();

$consulta1 = ejecutarQuery(compararValores_inicio($contraseña, $usuario), $conn) ;



if ( $consulta1-> num_rows > 0){
    session_start();
    $_SESSION['usuario'] = $usuario;
    
    //sacamos el nombre, el apellido y el correo asociado a la cuenta y lo guardamos en una variable
    $query = "SELECT id, nombre, apellido, correo, direccion, telefono, fecha_nac, pais, tel_fijo, estado_civil, coche, descripcion FROM berta_cv.usuari WHERE contraseña='$contraseña' AND user ='$usuario'";


    

    $resultado = $conn->query($query);
    if ($resultado->num_rows > 0){
        if ($row = $resultado->fetch_assoc()){
            echo $row["nombre_2"];
            // $_SESSION['id_user'] = $row["id(PK)"];
            $_SESSION['nombre_2']= $row["nombre"];
            $_SESSION['apellido_2'] = $row["apellido"];
            $_SESSION['correo'] = $row["correo"];

            $_SESSION['direccion_2']= $row["direccion"];
            $_SESSION['telefono_2'] = $row["telefono"];
            $_SESSION['fecha_nac_2'] = $row["fecha_nac"];
            $_SESSION['pais_2'] = $row["pais"];
            $_SESSION['tel_fijo_2'] = $row["tel_fijo"];
            $_SESSION['estado_civil_2'] = $row["estado_civil"];
            $_SESSION['coche_2'] = $row["coche"];
            $_SESSION['descripcion_2'] = $row["descripcion"];
            // $_SESSION['disciplinado'] = $row["disciplinado"];
            // $_SESSION['liderazgo'] = $row["liderazgo"];
            // $_SESSION['visionario'] = $row["visionario"];
            // $_SESSION['hab_num'] = $row["hab_num"];
            // $_SESSION['rrpp'] = $row["rrpp"];

            
            $_SESSION['id_user'] = $row['id'];
            $id_user = $_SESSION['id_user'];
            // $id_user = $_SESSION['id_user'];
            // echo "id:". $id_user;
            header("Location: cv_3.php"); 
            exit;
        }
        else {
            echo "0 results";
          }
    }
    
    
}
else {
    header("Location: index.php?error=no_en_uso");
    exit;
}



?>
