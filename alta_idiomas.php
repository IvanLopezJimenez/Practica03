<?php
    session_start();
    require_once "database.php";
    $id_user = $_SESSION['id_user'];
    echo "id:".$id_user;

    //creamos conexión con la base de datos:
    $conn = crear_conexion();

    $tipo_idioma = (isset($_REQUEST['idioma'])) ? $_REQUEST['idioma'] : "";
    $nivel = (isset($_REQUEST['nivel'])) ? $_REQUEST['nivel'] : "";


    // $idiomas = "INSERT INTO berta_cv.idiomas (id_user, idioma, nivel) VALUES ('$id_user', '$idioma', '$nivel')";

    // $consulta_idiomas = ejecutarQuery($idiomas, $conn);
    if (!empty($tipo_idioma)){
        $idiomas_insertados = addIdioma($conn, $id_user, $tipo_idioma, $nivel);

        
        $idiomas_mostrados = selectIdioma($conn, $id_user);
        $_SESSION['idiomas'] = $idiomas_mostrados;
    }
    else{
        header("Location: editar.php?pov=escribe");
    }
    

    // if ($idiomas_mostrados->num_rows > 0){
        // if ($row = $idiomas_mostrados->fetch_assoc()){
        //     array_push($_SESSION['idioma'], $row["idioma"]);
        //     // $_SESSION['nivel']= $row["nivel"]; 
        // }
        // if (!empty($_SESSION['idioma'])){
            //redirección al editar del CV
            // header("Location: editar.php");
        // }
        // else{
        //     //redirección al editar del CV con un aviso
        //     header("Location: editar2.php?pov=sin_idiomas");
        // }
    //}

    if ($_SESSION['idiomas'] -> num_rows >0) {
        header("Location: editar.php?pov=con_idiomas");
        // echo '<table>
        //         <tr>
        //             <th> Habilidad </th>
        //             <th> Nivel </th>
        //         </tr>';
        //     while ($row = $_SESSION['idiomas'] -> fetch_assoc()){
        //     echo '<tr>
        //         <td>'. $row['idioma']. '</td>
        //         <td>'. $row['nivel']. '</td>
        //         </tr>';
        //     }
        //     echo '</table>';
    }
    else {
        header("Location: editar.php?pov=sin_idiomas");
        // echo "Aún no tienes ningún idioma guardado";
    }
?>