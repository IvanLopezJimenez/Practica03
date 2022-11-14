<?php
//CONEXIÓN A LA BASE DE DATOS QUE HEMOS CREADO EN ALLWAYSDATA

//cogemos de config.php la info de nuestra base de datos.
require_once "config.php";


// include_once "registre.php";




// Creamos una conexión. 
//lo podemos hacer con PDO() o con mysqli()
//      El PDO es una libreria de php pq te busca lo q le pones
//$conexion = new PDO("mysql:host=$host; bdname =$base_datos; $user, $password");

function crear_conexion(){

    $host = "mysql-berta.alwaysdata.net";
    $user = "berta";

    //sí, es mi contraseña. no me robes na Ivan
    $passwd = "dragonballboladedrac";
    $dbname = "berta_cv";

    $conexion = new mysqli($host, $user, $passwd, $dbname);

    //chequeamos si se ha hecho bien la conexión
    if ($conexion -> connect_error) {
        die("Conexión fallida: ". $conexion->connect_error);
    }
    // echo "Connected successfully";
    return $conexion;
}

//____________________AÑADIR LOS DATOS DEL USUARIO REGISTRADO__________________________________________________________________________________

//Programación con objetos
function ejecutarQuery($query, $conexion){
    try{
        if($conexion && $query != ""){
            $resultado = $conexion-> query($query);
            echo "Consulta ejecutada";
            return $resultado;

            // $stmt = $conexion->prepare("UPDATE usuari SET name = ? WHERE id = ?");
            // $stmt->bind_param("si", $_POST['name'], $_SESSION['id']);
            // $stmt->execute();
            // $stmt->close();
        }
    }

    catch (PDOException $e){
        echo "MySQL.connection --Error--";
    }
    return $conexion;

}

//función q coge los datos introducidos en el registre.php y los añade a la tabla.
function insertarValores($nombre, $apellido, $correo, $user, $contraseña){

    //estas varibales deben estar en el config.php, pero no los pilla. Hya q arreglarlo.
    $nombre = ucfirst($_REQUEST['nombre']);
    $apellido = ucfirst($_REQUEST['apellido']);
    $correo = $_REQUEST['correo'];
    $user = $_REQUEST['usuario'];
    $contraseña = $_REQUEST['passwd'];


    $datos = "INSERT INTO berta_cv.usuari (nombre, apellido, correo, user, contraseña) VALUES ('$nombre', '$apellido', '$correo', '$user', '$contraseña')";
    echo $datos;
    return $datos;
}


//función que mira si en la tabla USUARI hay algun "usuario" o "correo" igual a que se está introduciendo en el registre.php. 
//      Cogemos "usuario" o "correo" pq es lo que no se puede repetir. "nombre", "apellido" y "contraseña", sí que se puede repetir.
function compararValores_registro($correo, $user){

    $correo = $_REQUEST['correo'];
    $user = $_REQUEST['usuario'];

    $datos = "SELECT * FROM berta_cv.usuari WHERE correo = '$correo' OR user = '$user'";
    echo $datos;
    return $datos;
}

function compararValores_inicio($contraseña, $user){

    $contraseña = $_REQUEST['passwd'];
    $user = $_REQUEST['usuario'];

    $datos = "SELECT * FROM berta_cv.usuari WHERE contraseña = '$contraseña' AND user = '$user'";
    echo $datos;
    return $datos;
}

//anadir idioma
function addIdioma($conn, $id_user, $tipo_idioma, $nivel){
    $query = "INSERT INTO berta_cv.idiomas (id_user, idioma, nivel) VALUES ('$id_user', '$tipo_idioma', '$nivel')";
    $idiomas_insertados = $conn->query($query);
    return $idiomas_insertados;
}

function selectIdioma($conn, $id_user){
    $query = "SELECT idioma, nivel FROM berta_cv.idiomas WHERE id_user = '$id_user'";
    $resultado = $conn->query($query);
    
    return $resultado;
    // return $resultado->fetch_all();
}

//anadir habilidad
function addHabilidad($conn, $id_user, $tipo_habil, $nivel){
    $query = "INSERT INTO berta_cv.habilidades (id_user, tipo_habil, nivel) VALUES ('$id_user', '$tipo_habil', '$nivel')";
    $habil_insertadas = $conn->query($query);
    return $habil_insertadas;
}

function selectHabilidad($conn, $id_user){
    $query = "SELECT tipo_habil, nivel FROM berta_cv.habilidades WHERE id_user = '$id_user'";
    $resultado = $conn->query($query);
    
    return $resultado;
    // return $resultado->fetch_all();
}

//añadir comptenecia
function addComp($conn, $id_user, $tipo_competencia){
    $consulta = "INSERT INTO berta_cv.competencias (id_user, tipo_competencia) VALUES ('$id_user', '$tipo_competencia')";

    $comp_insertadas = $conn->query($consulta);
    return $comp_insertadas;
}

function selectComp($conn, $id_user){
    $query = "SELECT tipo_competencia FROM berta_cv.competencias WHERE id_user = '$id_user'";
    $resultado = $conn->query($query);
    
    return $resultado;
    // return $resultado->fetch_all();
}

//quitar espacios
// $name = trim($name);
?>  