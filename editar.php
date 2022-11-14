<!DOCTYPE html>
<html lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
    <title>Form de edición</title>
    <meta name="author" content="Norfi Carrodeguas">
    <link rel="stylesheet" href="styles/style_edit.css" type="text/css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,300,0,0" />
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    
    <!-- <style type="text/css" media="screen">
        body {
            font-size: 1.2em;
        }
    </style> -->
</head>
<body>
    <?php session_start();?>
    <!-- Formulario siguiente al de registro. -->
    <div class=" col-lg-12 container">
        <!-- Datos personales -->
        <div class="row form-edit">
            <form enctype="multipart/form-data" action="alta_edicion.php" method="POST" role="form">
                <a href="cv.php"><button class = "atras" style="border-radius: 25px;" formaction="index.php"><span class="material-symbols-outlined">arrow_back</span></button></a>
                <br>
                <h2>Añade información</h2>

                <!-- DATOS PERSONALES -->
                <h3>Datos personales:</h3>
                <?php
                echo '<div class="alert" style="text-align:center;">';
                 if (isset($_GET['error'])){
                    if ($_GET['error']=="rellena_todo"){
                        echo "Por favor, rellena todos los campos";
                    } 
                }
                echo '</div>';
                ?>

                <label>Dirección</label>
                <input type="text" placeholder="ej: Av. Santa Justa Klan, 10" name = "direccion" >
                <label>Teléfono</label>
                <input type="text" placeholder="ej: 789 879 789"  name = "telefono">
                <label>Fecha de nacimiento</label>
                <input type="date" id="start" name="fecha_nac" value="2002-02-02" min="1900-01-01" max="2018-12-31">
                <!-- <label>Añade una foto de perfil</label>
                <input type="text" placeholder="User" name = "usuario"> -->
                <br>
                <label>Lugar de nacimiento</label>
                <input type="text" placeholder="ej: Argentina" name = "pais" value="Argentina">
                <br>
                <label>Teléfono fijo</label>
                <input type="text" placeholder="ej: 93 543 89 32" name = "tel_fijo" value="93 543 89 32">
                <label for="estado_civil">Estado civil:</label>
                <select name="estado_civil" id="estado_civil">
                    <option value="Soltero">Solter@</option>
                    <option value="Casado">Casad@</option>
                    <option value="Prefiero no decirlo">Prefiero no decirlo</option>
                </select>
                <label for="coche">Carné de conducir</label>
                <select name="coche" id="coche">
                    <option value="Sin carné">Sin carné</option>
                    <option value="Clase AM">Clase AM</option>
                    <option value="Clase A1">Clase A1</option>
                    <option value="Clase A2">Clase A2</option>
                    <option value="Clase A">Clase A</option>
                    <option value="Clase B">Clase B</option>
                    <option value="Clase C1">Clase C1</option>
                    <option value="Clase C">Clase C</option>
                </select>
                <br><br>
                <label>Descripción del Perfil</label>
                <textarea name="descripcion" rows="10" cols="30" class="textarea"></textarea>
                <br>
                <label>Añade una foto de perfil</label>
                <input name="uploadedfile" type="file">
                <button type="submit" value="actualizar">Guardar</button>
                <?php
                echo '<div class="alert" style="text-align:center; color: #DBBDBD">';
                 if (isset($_GET['error'])){
                    if ($_GET['error']=="guardado"){
                        echo "Datos personales guardados";
                    } 
                }
                echo '</div>';
                ?>
            </form>
        </div>
        <hr style="color: #752e7c6a; background-color: #752e7c6a; border-color: #752e7c6a; width: 398px;">    
        <!-- Habilidades -->
        <div class="row">
            <form enctype="multipart/form-data" action="alta_habil.php" method="POST" class="form-habil-idiom">
                <h3>Habilidades:</h3>
                <?php
                    if (isset($_GET['pov'])){
                        if ($_GET['pov']=="con_habilidades"){
                            require_once 'database.php';
                            $conn = crear_conexion();
                            $id_user = $_SESSION['id_user'];
                            $habil_mostradas = selectHabilidad($conn, $id_user);
                            $_SESSION['habilidades'] = $habil_mostradas;
    
                            echo '<table class="tabla-ranges" >
                                <tr>
                                    <td><strong> Habilidad: </strong></td>
                                    <td><strong> Nivel: </strong></td>
                                </tr>';
                            while ($row = $_SESSION['habilidades'] -> fetch_assoc()){
                            echo '<tr>
                                <td>'. $row['tipo_habil']. '</td>
                                <td colspan=3><div class="barra"><div class="porcentaje" style="width: 100%; margin-top: 7px;">
                                <div style="height: 15px; border-radius: 5px; background-color: #752e7c; animation: prog 1s linear; width: '. $row["nivel"].'% ;">
                                </div></div></div></div></td>
                                </tr>';
                            }
                            echo '</table>';
                        } 
                        if ($_GET['pov']=="sin_habilidades"){
                            echo "<p style='color:#fff;'>Aún no tienes ninguna habilidad guardada</p>";
                        } 
                    }
                ?>
                <div class="input-barra">
                    <input type="text" name="habil" value="" class="habil-idiom">
                    <input type="range" name="nivel" min="0" max="100" step="1" value="100" class="percen range-habil-idiom">
                    <label for="habil"><output class="percen-output" for="percen"></output>%</label>
                    <?php
                    if ($_GET['pov']=="escribe_habil"){
                        echo "<p style='color:#fff;'>Introduce una habilidad, por favor</p>";
                    } 
                    ?>
                    <button type="submit" class="add"><span class="material-symbols-outlined">add</span></button>
                </div>
            </form>
        </div>
        <hr style="color: #752e7c6a; background-color: #752e7c6a; border-color: #752e7c6a; width: 398px;"> 
        <!-- Idiomas -->
        <div class="row">
            <form enctype="multipart/form-data" action="alta_idiomas.php" method="POST" class="form-habil-idiom">
                <h3>Idiomas: </h3>
                <?php

                if (isset($_GET['pov'])){
                    if ($_GET['pov']=="con_idiomas"){
                        require_once 'database.php';
                        $conn = crear_conexion();
                        $id_user = $_SESSION['id_user'];
                        $idiomas_mostrados = selectIdioma($conn, $id_user);
                        $_SESSION['idiomas'] = $idiomas_mostrados;

                        echo '<table class="tabla-ranges" >
                            <tr>
                                <td><strong> Idiomas: </strong></td>
                                <td><strong> Nivel: </strong></td>
                            </tr>';
                        while ($row = $_SESSION['idiomas'] -> fetch_assoc()){
                        echo '<tr>
                            <td>'. $row['idioma']. '</td>
                            <td colspan=3><div class="barra"><div class="porcentaje" style="width: 100%; margin-top: 7px;">
                            <div style="height: 15px; border-radius: 5px; background-color: #752e7c; animation: prog 1s linear; width: '. $row["nivel"].'% ;">
                            </div></div></div></div></td>
                            </tr>';
                        }
                        echo '</table>';
                    } 
                    if ($_GET['pov']=="sin_idiomas"){
                        echo "<p style='color:#fff;'>Aún no tienes ningún idioma guardado</p>";
                    } 
                    
                    }
                
                               
                ?> 
                <div class="input-barra">
                    <input type="text" name="idioma" value="" class="habil-idiom">
                    <input type="range" name="nivel" min="0" max="100" step="1" value="100" class="percen1 range-habil-idiom">
                    <label for="idioma"><output class="percen-output1" for="percen1"></output>%</label>
                    <?php
                    if ($_GET['pov']=="escribe"){
                        echo "<p style='color:#fff;'>Introduce un idioma, por favor</p>";
                    } 
                    ?>
                    <button type="submit" class="add"><span class="material-symbols-outlined">add</span></button>
                </div>
            </form>
            
        </div>
        <hr style="color: #752e7c6a; background-color: #752e7c6a; border-color: #752e7c6a; width: 398px;">
        <!-- competencias -->
        <div class="row">
            <form enctype="multipart/form-data" action="alta_competencias.php" method="POST" class="form-habil-idiom">
            <h3>Competencias:</h3>
            <br>
            <?php
                if (isset($_GET['pov'])){
                    if ($_GET['pov']=="con_competencia"){
                        require_once 'database.php';
                        $conn = crear_conexion();
                        $id_user = $_SESSION['id_user'];
                        $comp_mostradas = selectComp($conn, $id_user);
                        $_SESSION['competencias'] = $comp_mostradas;

                        echo '<table class="tabla-ranges">
                            <tr>
                                <td><strong> Competencias: </strong></td>
                            </tr>';
                        while ($row = $_SESSION['competencias'] -> fetch_assoc()){
                        echo '<tr>
                            <td>'. $row['tipo_competencia']. '</td>
                            </tr>';
                        }
                        echo '</table>';
                    } 
                    if ($_GET['pov']=="sin_competencia"){
                        echo "<p style='color:#fff; margin-left: 25px;'>Aún no tienes ninguna competencia</p>";
                    } 
                    }
                ?> 
                <div class="input-barra">
                    <input type="text" name="competencia" value="" style="width: 85%;">
                    <button type="submit" class="add"><span class="material-symbols-outlined">add</span></button>
                    <?php
                    if ($_GET['pov']=="escribe_competencia"){
                        echo "<p style='color:#fff;'>Por favor, introduce una competencia</p>";
                    } 
                    ?>
                </div>                
            </div>
            
            </form>
            <form action="cv.php"><button type="submit" formaction="cv.php" value="actualizar">Enviar</button></form>
        </div>
    </div>
    
        
        
        
        
        
        <script type="text/javascript">
            //Para mostrar el valor de las barras actuales y actualizarlo a medida que cambia
            const percen = document.querySelector('.percen')
            const output = document.querySelector('.percen-output')

            output.textContent = percen.value

            percen.addEventListener('input', function() {
            output.textContent = percen.value
            });
            const percen1 = document.querySelector('.percen1')
            const output1 = document.querySelector('.percen-output1')

            output1.textContent = percen1.value

            percen1.addEventListener('input', function() {
            output1.textContent = percen1.value
            });

            //para añadir y eliminar campos
            // $(document).ready(function(){
            // var maxField = 10; //Input fields increment limitation
            // var addButton = $('.add_button'); //Add button selector
            // var wrapper = $('.field_wrapper'); //Input field wrapper
            // var fieldHTML = '<div><input type="text" name="field_name[]" value=""/><a href="javascript:void(0);" class="remove_button" title="Remove field"><label for="disciplinado">Disciplinado: <output class="percen-output" for="percen"></output>%</label><input type="range" name="disciplinado" class="percen" min="0" max="100" step="1" value='100' style="background-color: #752e7c; "><span class="material-symbols-outlined">delete_forever</span></a></div>'; //New input field html 
            // var x = 1; //Initial field counter is 1
            // $(addButton).click(function(){ //Once add button is clicked
            //     if(x < maxField){ //Check maximum number of input fields
            //         x++; //Increment field counter
            //         $(wrapper).append(fieldHTML); // Add field html
            //     }
            // });
            // $(wrapper).on('click', '.remove_button', function(e){ //Once remove button is clicked
            //     e.preventDefault();
            //     $(this).parent('div').remove(); //Remove field html
            //     x--; //Decrement field counter
            // });
            // });

        </script>
    
</body>
</html>