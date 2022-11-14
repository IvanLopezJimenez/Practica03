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
    $direccion = (isset($_REQUEST['direccion'])) ? $_REQUEST['direccion'] : "";
    $telefono = (isset($_REQUEST['telefono'])) ? $_REQUEST['telefono'] : "";
    $fecha_nac = (isset($_REQUEST['fecha_nac'])) ? $_REQUEST['fecha_nac'] : "";
    $pais = (isset($_REQUEST['pais'])) ? $_REQUEST['pais'] : "";
    $tel_fijo = (isset($_REQUEST['tel_fijo'])) ? $_REQUEST['tel_fijo'] : "";
    $estado_civil = (isset($_REQUEST['estado_civil'])) ? $_REQUEST['estado_civil'] : "";
    $coche = (isset($_REQUEST['coche'])) ? $_REQUEST['coche'] : "";

    $descripcion = (isset($_REQUEST['descripcion'])) ? $_REQUEST['descripcion'] : "";

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
    echo '<br>dirección 1:'.$direccion."<br>";
    
    if (!empty($direccion) AND !empty($telefono) AND !empty($fecha_nac) AND !empty($pais) AND !empty($tel_fijo) AND !empty($estado_civil) AND !empty($coche) AND !empty($descripcion)) {
    

        //$datos = "INSERT INTO berta_cv.usuari (direccion, telefono, fecha_nac, pais, tel_fijo, estado_civil, coche, descripcion) VALUES ('$direccion', '$telefono', '$fecha_nac', '$pais', '$tel_fijo', '$estado_civil', '$coche', '$descripcion') ";

        $datos2 = "UPDATE berta_cv.usuari SET direccion = '$direccion', telefono = '$telefono', fecha_nac = '$fecha_nac', pais = '$pais', tel_fijo = '$tel_fijo', estado_civil = '$estado_civil', coche = '$coche', descripcion = '$descripcion' WHERE id = '$id_user'";

        $consulta3 = ejecutarQuery($datos2, $conn);
        //usamos UPDATE pq estamos actuaizando lo que hay en la tabla.
        // $consulta3 = ejecutarQuery("UPDATE berta_cv.usuari SET direccion = '$direccion', telefono = '$telefono', fecha_nac = '$fecha_nac', pais = '$pais', tel_fijo = '$tel_fijo', estado_civil = '$estado_civil', coche = '$coche', descripcion = '$descripcion' WHERE id_user = '$id_user'", $conn);
        echo '<br>dirección 2:'.$direccion."<br>";
        
        echo '<br>teléfno:'.$telefono."<br>";

        //guardamos dirección, teléfono, fecha_nac y descripción en variables de sesión para ser utilizadas en el CV.
        $query = "SELECT direccion, telefono, fecha_nac, pais, tel_fijo, estado_civil, coche, descripcion FROM berta_cv.usuari WHERE id = '$id_user'";
        $resultado2 = $conn->query($query);
        echo "consulta ejecutada";
        echo $query;
        if ($resultado2->num_rows > 0){
            if ($row = $resultado2->fetch_assoc()){
                $_SESSION['direccion']= $row["direccion"];
                $_SESSION['telefono'] = $row["telefono"];
                $_SESSION['fecha_nac'] = $row["fecha_nac"];
                $_SESSION['pais'] = $row["pais"];
                $_SESSION['tel_fijo'] = $row["tel_fijo"];
                $_SESSION['estado_civil'] = $row["estado_civil"];
                $_SESSION['coche'] = $row["coche"];
                $_SESSION['descripcion'] = $row["descripcion"];
                // $_SESSION['disciplinado'] = $row["disciplinado"];
                // $_SESSION['liderazgo'] = $row["liderazgo"];
                // $_SESSION['visionario'] = $row["visionario"];
                // $_SESSION['hab_num'] = $row["hab_num"];
                // $_SESSION['rrpp'] = $row["rrpp"];
                // echo 'rrpp: '. $_SESSION['rrpp'];

                echo '<br><br>dirección 3:'.$_SESSION['direccion'];
                header('Location: editar.php?error=guardado');
            }
        }
    }
    else {
        header("Location: editar.php?error=rellena_todo");
        exit;
    }
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