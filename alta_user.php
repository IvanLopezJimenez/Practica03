<!-- validación de los datos de registre.php con database.php  -->
<!-- no se ve. -->
<!-- si estan mal los datos, vuelve a validar. -->
<!-- cojo la función de crear_user, lo creo y lo guardo en la database.php -->
<?php


require_once "database.php";
// include_once "registre.php";


//creamos conexión con la base de datos:
$conn = crear_conexion();

$usuario = (isset($_REQUEST['usuario'])) ? $_REQUEST['usuario'] : "";
$contraseña = (isset($_REQUEST['passwd'])) ? $_REQUEST['passwd'] : "";
$nombre = (isset($_REQUEST['nombre'])) ? $_REQUEST['nombre'] : "";
$apellido = (isset($_REQUEST['apellido'])) ? $_REQUEST['apellido'] : "";
$correo = (isset($_REQUEST['correo'])) ? $_REQUEST['correo'] : ""; 


//si hya algun dato vació, redirige al usuario al registro co el mensaje de que faltan campos por rellenar
if (empty($usuario) || empty($contraseña) || empty($nombre) || empty($apellido) || empty($correo)) {
    header("Location: registre.php?error=faltan_cosas");
    exit;
}


//comparamos si el correo o el usuario estan en la tabla
$consulta1 = ejecutarQuery(compararValores_registro($correo, $usuario), $conn);

if ($consulta1-> num_rows > 0) {
    header("Location: registre.php?error=ya_en_uso");
    exit;
}

else {
    session_start();
    //añadimos los datos registrados en la tabla
    $consulta2 = ejecutarQuery(insertarValores($nombre, $apellido, $correo, $usuario, $contraseña), $conn);
    $_SESSION['usuario'] = $usuario;
    
    //guardamos nombre, apellid y correo en variables de sesión para ser utilizadas en el CV.
    $query = "SELECT id, nombre, apellido, correo FROM berta_cv.usuari WHERE contraseña='$contraseña' AND user ='$usuario'";
    $resultado = $conn->query($query);

 
    if ($resultado->num_rows > 0){
        if ($row = $resultado->fetch_assoc()){
            // $_SESSION['id_user'] = $row["id(PK)"];
            $_SESSION['nombre']= $row["nombre"];
            $_SESSION['apellido'] = $row["apellido"];
            $_SESSION['correo'] = $row["correo"];

            $_SESSION['id_user'] = $row['id'];
            $id_user = $_SESSION['id_user'];

            // $_SESSION['direccion']= "";
            // $_SESSION['telefono']= "";
            // $_SESSION['fecha_nac']= "";
            // $_SESSION['descripcion']= "";

            // $id_user = $_SESSION['id_user'];

            //mail de agradecimiento
            $para = $_SESSION['correo'];
            $titulo = "¡Bienvenid@, " . $_SESSION['nombre']. "!";
            $mensaje = "Rumanía ha sido conquistada por Russia. Tenemos a tus primos segundos. Pedimos 200.000€ por cabeza";
            $de = "bertapasamontes@gmail.com";
            $cabecera = "De:" . $de;

            mail($para, $titulo, $mensaje, $cabecera);

            //redirección al editar del CV
            header("Location: editar.php"); 
            exit;
        }
        
    }


}





?>