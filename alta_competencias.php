<?php
    session_start();
    require_once "database.php";
    $id_user = $_SESSION['id_user'];
    echo "id:".$id_user;

    //creamos conexión con la base de datos:
    $conn = crear_conexion();

    $tipo_competencia = (isset($_REQUEST['competencia'])) ? $_REQUEST['competencia'] : "";
    

    if (!empty($tipo_competencia)){
        $comp_insertada = addComp($conn, $id_user, $tipo_competencia);

        // $query = "SELECT idioma, nivel FROM berta_cv.idiomas WHERE id_user = '$id_user'";
        // $resultado = $conn->query($query);
        $comp_mostradas = selectComp($conn, $id_user);
        $_SESSION['competencias'] = $comp_mostradas;
        // $idiomas_mostrados = selectIdioma($conn, $id_user);
        // $_SESSION['idiomas'] = $idiomas_mostrados;
        }
    else{
        header("Location: editar.php?pov=escribe_competencia");
    }

    

    if ($_SESSION['competencias'] -> num_rows >0) {
        header("Location: editar.php?pov=con_competencia");
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
        header("Location: editar.php?pov=sin_competencia");
        // echo "Aún no tienes ningún idioma guardado";
    }
?>