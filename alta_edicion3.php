<?php
    session_start();
    //usamos database.php pq usamos la función de crear conexión.
    require_once 'database.php';
    // echo $_SESSION['correo'];
    // $correo = $_SESSION['correo'];
    // echo $correo;

    //creamos conexión con la base de datos:
    $conn = crear_conexion();

    //datos personales
    $nombre_2 = (isset($_REQUEST['nombre2'])) ? $_REQUEST['nombre2'] : "";
    $apellido_2 = (isset($_REQUEST['apellido2'])) ? $_REQUEST['apellido2'] : "";
    $direccion_2 = (isset($_REQUEST['direccion2'])) ? $_REQUEST['direccion2'] : "";
    $telefono_2 = (isset($_REQUEST['telefono_2'])) ? $_REQUEST['telefono_2'] : "";
    $fecha_nac_2 = (isset($_REQUEST['fecha_nac_2'])) ? $_REQUEST['fecha_nac_2'] : "";
    $pais_2 = (isset($_REQUEST['pais_2'])) ? $_REQUEST['pais_2'] : "";
    $tel_fijo_2 = (isset($_REQUEST['tel_fijo_2'])) ? $_REQUEST['tel_fijo_2'] : "";
    $estado_civil_2 = (isset($_REQUEST['estado_civil_2'])) ? $_REQUEST['estado_civil_2'] : "";
    $coche_2 = (isset($_REQUEST['coche_2'])) ? $_REQUEST['coche_2'] : "";

    $descripcion_2 = (isset($_REQUEST['descripcion_2'])) ? $_REQUEST['descripcion_2'] : "";

    //HABILIDADES
    $disciplinado = (isset($_REQUEST['disciplinado'])) ? $_REQUEST['disciplinado'] : "";
    $liderazgo = (isset($_REQUEST['liderazgo'])) ? $_REQUEST['liderazgo'] : "";
    $visionario = (isset($_REQUEST['visionario'])) ? $_REQUEST['visionario'] : "";
    $hab_num = (isset($_REQUEST['hab_num'])) ? $_REQUEST['hab_num'] : "";
    $rrpp = (isset($_REQUEST['rrpp'])) ? $_REQUEST['rrpp'] : "";

    // $_SESSION['direccion']= $direccion;
    // $_SESSION['telefono']= $telefono;
    // $_SESSION['fecha_nac']= $fecha_nac;
    // $_SESSION['descripcion']= $descripcion;
    
    echo "aaaaaaaaaaaaaaaaaaaaaaaaa";
    $id_user = $_SESSION['id_user'];
    echo '<br>id user: '.$id_user. '<br>';
    echo '<br>dirección 1:'.$direccion_2."<br>";

    echo '<br>nombre 1:'.$nombre_2."<br>";
    
    //if (!empty($direccion) || !empty($telefono) || !empty($fecha_nac) || !empty($pais) || !empty($tel_fijo) || !empty($estado_civil) || !empty($coche) || !empty($descripcion)) {
    

        //$datos = "INSERT INTO berta_cv.usuari (direccion, telefono, fecha_nac, pais, tel_fijo, estado_civil, coche, descripcion) VALUES ('$direccion', '$telefono', '$fecha_nac', '$pais', '$tel_fijo', '$estado_civil', '$coche', '$descripcion') ";

        $datos2 = "UPDATE berta_cv.usuari SET nombre = '$nombre_2', apellido = '$apellido_2', direccion = '$direccion_2', telefono = '$telefono_2', fecha_nac = '$fecha_nac_2', pais = '$pais_2', tel_fijo = '$tel_fijo_2', estado_civil = '$estado_civil_2', coche = '$coche_2', descripcion = '$descripcion_2' WHERE id = '$id_user'";

        $consulta3 = ejecutarQuery($datos2, $conn);
        //usamos UPDATE pq estamos actuaizando lo que hay en la tabla.
        // $consulta3 = ejecutarQuery("UPDATE berta_cv.usuari SET direccion = '$direccion', telefono = '$telefono', fecha_nac = '$fecha_nac', pais = '$pais', tel_fijo = '$tel_fijo', estado_civil = '$estado_civil', coche = '$coche', descripcion = '$descripcion' WHERE id_user = '$id_user'", $conn);
        echo '<br>dirección 2:'.$direccion_2."<br>";
        echo "consulta ejecutada";
        echo '<br>teléfno:'.$telefono_2."<br>";

        //guardamos dirección, teléfono, fecha_nac y descripción en variables de sesión para ser utilizadas en el CV.
        $query = "SELECT nombre, apellido, direccion, telefono, fecha_nac, pais, tel_fijo, estado_civil, coche, descripcion FROM berta_cv.usuari WHERE id = '$id_user'";
        $resultado2 = $conn->query($query);
        $idioma = selectIdioma($conn, $id_user);
        if ($resultado2->num_rows > 0){
            if ($row = $resultado2->fetch_assoc()){
                $_SESSION['nombre_2']= $row["nombre"];
                $_SESSION['apellido_2']= $row["apellido"];
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
                // echo 'rrpp: '. $_SESSION['rrpp'];

                echo '<br><br>dirección 3:'.$_SESSION['direccion_2'];
                header('Location: editar3.php');
            }
        }
    //}
    echo "<br> Ups, algo ha fallado";

    //---------------------SUBIR FOTO----------------------------------
    if(!empty($_REQUEST['uploadedfile'])){
        $uploadedfileload = "true";
        $uploadedfile_size = $_FILES['uploadedfile']['size'];
        echo $_FILES['uploadedfile']['name'];

        if ($_FILES['uploadedfile']['size'] > 500000) {
            $msg = $msg . "El archivo es mayor que 500KB, debes reduzcirlo antes de subirlo<BR>";
            $uploadedfileload = "false";
        }

        if (!($_FILES['uploadedfile']['type'] == "image/jpg" or $_FILES['uploadedfile']['type'] == "image/gif" or $_FILES['uploadedfile']['type'] == "image/png" or $_FILES['uploadedfile']['type'] == "image/jpeg")) {
            $msg = $msg . " Tu archivo tiene que ser JPG o GIF. Otros archivos no son permitidos<BR>";
            $uploadedfileload = "false";
        }

        $file_name = $_FILES['uploadedfile']['name'];
        $add = "uploads/$file_name";

        //subir foto a carpeta local
        if ($uploadedfileload == "true") {

            if (move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $add)) {
                echo " Se ha sido subido bien a la carpeta UPLOADS";
                echo'<img src="uploads/'.$file_name.'">';
            } else {
                echo "Error al guardar el archivo en la carpeta uploads";
            }
        } 
        else {
            echo $msg;
        }
        //subir foto a la base de datos
        $conn = crear_conexion();
        $foto = $conn->query("INSERT INTO berta_cv.usuari (imagen) VALUES ('$file_name') WHERE correo='$correo'");
        echo $foto;
        if($foto){
            echo "File uploaded successfully.";
        }
        else{
            echo "File upload failed, please try again.";
        } 

        //Get image data from database
        $result = $conn->query("SELECT imagen FROM berta_cv.usuari WHERE correo='$correo'");
        echo $result;
        if($result->num_rows > 0){
            if($row = $result->fetch_assoc()){
                $_SESSION['imagen'] = $row['imagen'];
            
            //Render image
            // header("Content-type: imagen/jpg"); 
            echo $_SESSION['imagen']; 
            }
            
        }else{
            echo 'Image not found...';
        }
    }
?>