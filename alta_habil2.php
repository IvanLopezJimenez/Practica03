<?php
    session_start();
    require_once "database.php";
    $id_user = $_SESSION['id_user'];
    echo "id:".$id_user;

    //creamos conexión con la base de datos:
    $conn = crear_conexion();

    $tipo_habil = (isset($_REQUEST['habil'])) ? $_REQUEST['habil'] : "";
    $nivel = (isset($_REQUEST['nivel'])) ? $_REQUEST['nivel'] : "";


    // $idiomas = "INSERT INTO berta_cv.idiomas (id_user, idioma, nivel) VALUES ('$id_user', '$idioma', '$nivel')";

    // $consulta_idiomas = ejecutarQuery($idiomas, $conn);
    if (!empty($tipo_habil)){
        $habil_insertada = addHabilidad($conn, $id_user, $tipo_habil, $nivel);

        // $query = "SELECT idioma, nivel FROM berta_cv.idiomas WHERE id_user = '$id_user'";
        // $resultado = $conn->query($query);
        $habil_mostradas = selectHabilidad($conn, $id_user);
        $_SESSION['habilidades'] = $habil_mostradas;
        
    }
    else{
        header("Location: editar.php?pov=escribe_habil");
    }
    

    if ($_SESSION['habilidades'] -> num_rows >0) {
        header("Location: editar2.php?pov=con_habilidades");
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
        header("Location: editar2.php?pov=sin_habilidades");
        // echo "Aún no tienes ningún idioma guardado";
    }
?>