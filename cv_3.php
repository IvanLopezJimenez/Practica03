
<!DOCTYPE html>
<html>
    <head>
        <title>Práctica 3 - CV Actualizado</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="styles/style_cv.css" type="text/css"> 
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,300,0,0" />
    </head>
    <?php

    //si el usuario no está logueado, se envia al usuario al index.php.
    session_start();

    if(!isset($_SESSION['usuario'])){
        ?>
        <div class="refresh">No estás registrado <br> La página lo redireccionará en 10 segs.</div>
        <?php
        header("refresh: 20; url= index.php");
        
        die;
    }


    ?>
    <body >
        <?php 
        // include_once "config.php";
        ?>
        
        
        <br>
        <!-- <header>
            <div class="row">
                <div class="col-lg-4">
                    <img src="host.jpg" class="rounded-circle host" alt="Host" style="border:8px solid grey ;">
                </div>
                <div class="col-lg-8">
                    <h1>
                        Ivan Lopez -->
                         <!-- <?php $usuario ?>  -->
                    <!-- </h1>
                </div>
            </div>
        </header>
        <br> -->
        <div class="content"> 
            <!-- BOTONES -->
            <div class = "row cabecera botones" >
                <div class="col-lg-3 boton" >
                    <!-- El boton Atrás va a logout.php pq se tiene q destruir la sesion para volver al inicio. Si no se destruye, no regresa pq se quedan guardados los datos. -->
                    <a href="logout.php"><button class = "atras" style="border-radius: 25px;" formaction="index.php"><span class="material-symbols-outlined">arrow_back</span></button></a>
                </div>
                <div class="col-lg-3 boton">
                    <!-- boton modo oscuro -->
                    <button id="bdark" style="border-radius: 25px;"><span class="material-symbols-outlined">brightness_6</span></button>
                </div>
                <div class="col-lg-3 boton">
                    <!-- boton editar -->
                    <!-- <a href="editar.php"><button class="editar" style="border-radius: 25px;"><span class="material-symbols-outlined">add_circle</span></button></a> -->
                    <a href="editar3.php"><button class="editar" style="border-radius: 25px;"><span class="material-symbols-outlined">edit_note</span></button></a>
                </div>
                <div class="col-lg-3 boton">
                    <a href="logout.php"><button class = "salir" style="border-radius: 25px;"><span class="material-symbols-outlined">logout</span></button></a>
                </div>
                 
            </div>
            <div class="row header">
                    <div class="col-lg-4">
                        <img src="host2.jpg" class="rounded-circle host" alt="Host" style="border:8px solid #752e7cb2; ;">
                        <!-- <?php echo $_SESSION['imagen'] ?> -->
                    </div>
                    <div class="col-lg-8">
                        <h1>
                            <?php echo $_SESSION['nombre_2']."&nbsp".$_SESSION['apellido_2'] ?> 
                        </h1>
                    </div>
                </div>
            <div class="row">
 
                <!-- COLUMNA 1 -->
                <div class ="col-lg-5 columna1">
                    <div class="row DATOS PERSONALES">
                        <!-- flechitas -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-double-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M3.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L9.293 8 3.646 2.354a.5.5 0 0 1 0-.708z"/>
                            <path fill-rule="evenodd" d="M7.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L13.293 8 7.646 2.354a.5.5 0 0 1 0-.708z"/>
                        </svg>
                        <h5>Datos personales</h5>
                        <hr>
                        <p>
                            <!-- logo personita -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                              </svg>
                            <b><?php echo $_SESSION['nombre_2']."&nbsp".$_SESSION['apellido_2'] ?> </b>
                            <br>
                            <!-- logo casita -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
                                <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z"/>
                              </svg>
                            <b><?php echo $_SESSION['direccion_2']?></b>
                            <br>
                            <!-- logo telefono -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                              </svg>
                            <b><?php echo $_SESSION['telefono_2']?></b>
                            <br>
                            <!-- logo @ -->
                            <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 48 48"><path d="M24 44q-4.15 0-7.8-1.575-3.65-1.575-6.35-4.275-2.7-2.7-4.275-6.35Q4 28.15 4 24t1.575-7.8Q7.15 12.55 9.85 9.85q2.7-2.7 6.35-4.275Q19.85 4 24 4t7.8 1.575q3.65 1.575 6.35 4.275 2.7 2.7 4.275 6.35Q44 19.85 44 24v2.65q0 2.8-1.975 4.725Q40.05 33.3 37.2 33.3q-1.8 0-3.4-.875-1.6-.875-2.45-2.475-1.3 1.7-3.25 2.525T24 33.3q-3.9 0-6.625-2.7T14.65 24q0-3.9 2.725-6.65Q20.1 14.6 24 14.6t6.625 2.75Q33.35 20.1 33.35 24v2.65q0 1.55 1.125 2.6T37.2 30.3q1.55 0 2.675-1.05Q41 28.2 41 26.65V24q0-7.1-4.95-12.05Q31.1 7 24 7q-7.1 0-12.05 4.95Q7 16.9 7 24q0 7.1 4.95 12.05Q16.9 41 24 41h10.7v3Zm0-13.7q2.65 0 4.5-1.825T30.35 24q0-2.7-1.85-4.55-1.85-1.85-4.5-1.85t-4.5 1.85Q17.65 21.3 17.65 24q0 2.65 1.85 4.475Q21.35 30.3 24 30.3Z"/></svg>
                            <b><?php echo $_SESSION['correo']?></b>
                            <br>
                            <!-- logo calendario -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar3" viewBox="0 0 16 16">
                                <path d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857V3.857z"/>
                                <path d="M6.5 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                              </svg>
                            <b><?php echo $_SESSION['fecha_nac_2']?></b>
                            <br>
                            <!-- logo bandera -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-flag-fill" viewBox="0 0 16 16">
                                <path d="M14.778.085A.5.5 0 0 1 15 .5V8a.5.5 0 0 1-.314.464L14.5 8l.186.464-.003.001-.006.003-.023.009a12.435 12.435 0 0 1-.397.15c-.264.095-.631.223-1.047.35-.816.252-1.879.523-2.71.523-.847 0-1.548-.28-2.158-.525l-.028-.01C7.68 8.71 7.14 8.5 6.5 8.5c-.7 0-1.638.23-2.437.477A19.626 19.626 0 0 0 3 9.342V15.5a.5.5 0 0 1-1 0V.5a.5.5 0 0 1 1 0v.282c.226-.079.496-.17.79-.26C4.606.272 5.67 0 6.5 0c.84 0 1.524.277 2.121.519l.043.018C9.286.788 9.828 1 10.5 1c.7 0 1.638-.23 2.437-.477a19.587 19.587 0 0 0 1.349-.476l.019-.007.004-.002h.001"/>
                              </svg>
                            <b><?php echo $_SESSION['pais_2']?></b>
                            <br>
                            <!-- logo mobil -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-phone" viewBox="0 0 16 16">
                                <path d="M11 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h6zM5 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H5z"/>
                                <path d="M8 14a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                              </svg>
                            <b><?php echo $_SESSION['tel_fijo_2']?></b>
                            <br>
                            <!-- logo soltero -->
                            <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 48 48">><path d="M13 11.65q-1.5 0-2.575-1.075Q9.35 9.5 9.35 8q0-1.5 1.075-2.575Q11.5 4.35 13 4.35q1.5 0 2.575 1.075Q16.65 6.5 16.65 8q0 1.5-1.075 2.575Q14.5 11.65 13 11.65ZM34.75 23q-1.25 0-2.125-.875T31.75 20q0-1.25.875-2.125T34.75 17q1.25 0 2.125.875T37.75 20q0 1.25-.875 2.125T34.75 23ZM9.5 44V29.5H6V17q0-1.25.875-2.125T9 14h7.6q.85 0 1.575.45T19.3 15.7l6.8 13.9 3.65-3.9q.3-.35.725-.525Q30.9 25 31.35 25h6.45q.9 0 1.55.65T40 27.2v8.3h-2.5V44h-7V28.85L27.55 32h-3.5L17.5 18.85V44Z"/></svg>
                            <b><?php echo $_SESSION['estado_civil_2']?></b>
                            <br>
                            <!-- logo coche -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-car-front-fill" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M2.52 3.515A2.5 2.5 0 0 1 4.82 2h6.362c1 0 1.904.596 2.298 1.515l.792 1.848c.075.175.21.319.38.404.5.25.855.715.965 1.262l.335 1.679c.033.161.049.325.049.49v.413c0 .814-.39 1.543-1 1.997V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.338c-1.292.048-2.745.088-4 .088s-2.708-.04-4-.088V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.892c-.61-.454-1-1.183-1-1.997v-.413a2.5 2.5 0 0 1 .049-.49l.335-1.68c.11-.546.465-1.012.964-1.261a.807.807 0 0 0 .381-.404l.792-1.848ZM3 10a1 1 0 1 0 0-2 1 1 0 0 0 0 2Zm10 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2ZM6 8a1 1 0 0 0 0 2h4a1 1 0 1 0 0-2H6ZM2.906 5.189l.956-1.913A.5.5 0 0 1 4.309 3h7.382a.5.5 0 0 1 .447.276l.956 1.913a.51.51 0 0 1-.497.731c-.91-.073-3.35-.17-4.597-.17-1.247 0-3.688.097-4.597.17a.51.51 0 0 1-.497-.731Z"/>
                              </svg>
                            <b><?php echo $_SESSION['coche_2']?></b>
                        </p>


                    </div>
                    <div class="row HABILIDADES">
                        <!-- flechitas -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-double-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M3.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L9.293 8 3.646 2.354a.5.5 0 0 1 0-.708z"/>
                            <path fill-rule="evenodd" d="M7.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L13.293 8 7.646 2.354a.5.5 0 0 1 0-.708z"/>
                        </svg>
                        
                        <h5>Habilidades</h5>
                        <br>
                        <hr>
                        
                        <div class="row">
                        <?php
                   
                        require_once 'database.php';
                        $conn = crear_conexion();
                        $id_user = $_SESSION['id_user'];
                        $habil_mostradas = selectHabilidad($conn, $id_user);
                        $_SESSION['habilidades'] = $habil_mostradas;

                        echo '<table class="tabla-ranges" >';
                        while ($row = $_SESSION['habilidades'] -> fetch_assoc()){
                        echo '<tr>
                            <td>'. $row['tipo_habil']. '</td>
                            <td colspan=3><div class="barra"><div class="porcentaje" style="width: 100%; margin-top: 7px;">
                            <div style="height: 15px; border-radius: 5px; background-color: #752e7c; animation: prog 1s linear; width: '. $row["nivel"].'% ;">
                            </div></div></div></div></td>
                            </tr>';
                        }
                        echo '</table>';

                        ?>
                        </div>
                        
                    </div>
                    <div class="row IDIOMAS">
                        <!-- flechitas -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-double-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M3.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L9.293 8 3.646 2.354a.5.5 0 0 1 0-.708z"/>
                            <path fill-rule="evenodd" d="M7.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L13.293 8 7.646 2.354a.5.5 0 0 1 0-.708z"/>
                        </svg>
                        
                        <h5>Idiomas</h5>
                        <br>
                        <hr>
                        <div class="row">
                        <?php

                
                            require_once 'database.php';
                            $conn = crear_conexion();
                            $id_user = $_SESSION['id_user'];
                            $idiomas_mostrados = selectIdioma($conn, $id_user);
                            $_SESSION['idiomas'] = $idiomas_mostrados;

                            echo '<table class="tabla-ranges" >';
                            while ($row = $_SESSION['idiomas'] -> fetch_assoc()){
                            echo '<tr>
                                <td>'. $row['idioma']. '</td>
                                <td colspan=3><div class="barra"><div class="porcentaje" style="width: 100%; margin-top: 7px;">
                                <div style="height: 15px; border-radius: 5px; background-color: #752e7c; animation: prog 1s linear; width: '. $row["nivel"].'% ;">
                                </div></div></div></div></td>
                                </tr>';
                            }
                            echo '</table>';

                                        
                            ?>
                        </div>
                        
                    </div>
                    <div class="row INFORMATICA">
                        <!-- flechitas -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-double-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M3.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L9.293 8 3.646 2.354a.5.5 0 0 1 0-.708z"/>
                            <path fill-rule="evenodd" d="M7.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L13.293 8 7.646 2.354a.5.5 0 0 1 0-.708z"/>
                        </svg>
                        
                        <h5>Informatica</h5>
                        <br>
                        <hr>
                        <div class="row">
                            <div class="col-lg-7">
                                <p>Microsoft Excel
                                    <br>
                                    Microsoft Word
                                    <br>
                                    Software DelBol
                                    <br>
                                    Contalux
                                    <br>
                                    Cegit
                                </p>
                            </div>
                            <div class="col-lg-5" style="padding-left: 40px;">
                                <!-- barras de progreso -->
                                <div class="barra">
                                    <div class="porcentaje" style="width:145px; margin-top: 7px;">
                                    <div class="avanzador"></div>
                                    </div>
                                 </div>
                                 <div class="barra">
                                    <div class="porcentaje" style="width:110px;">
                                    <div class="avanzador"></div>
                                    </div>
                                 </div>
                                 <div class="barra">
                                    <div class="porcentaje" style="width:110px;">
                                    <div class="avanzador"></div>
                                    </div>
                                 </div>
                                 <div class="barra">
                                    <div class="porcentaje" style="width:72px;">
                                    <div class="avanzador"></div>
                                    </div>
                                 </div>
                                 <div class="barra">
                                    <div class="porcentaje" style="width:72px;">
                                    <div class="avanzador"></div>
                                    </div>
                                 </div>
                                
                            </div>
                        </div>
                        
                    </div>
                    <div class="row COMPETENCIAS">
                        <!-- flechitas -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-double-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M3.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L9.293 8 3.646 2.354a.5.5 0 0 1 0-.708z"/>
                            <path fill-rule="evenodd" d="M7.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L13.293 8 7.646 2.354a.5.5 0 0 1 0-.708z"/>
                        </svg>
                        
                        <h5>Competencias</h5>
                        <br>
                        <hr>
                        <div class="row">
                            <!-- icono flecha -->
                            <?php

                                require_once 'database.php';
                                $conn = crear_conexion();
                                $id_user = $_SESSION['id_user'];
                                $comp_mostradas = selectComp($conn, $id_user);
                                $_SESSION['competencias'] = $comp_mostradas;

                                echo '<table class="tabla-ranges">';
                                while ($row = $_SESSION['competencias'] -> fetch_assoc()){
                                echo '<tr>
                                    <td>'. $row['tipo_competencia']. '</td>
                                    </tr>';
                                }
                                echo '</table>';
                                    ?> 
                        </div>
                        
                    </div>
                </div>
                <div class="col-lg-7 columna2">
                    <!-- Perfil -->
                    <div class="row">
                        <!-- flechitas -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-double-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M3.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L9.293 8 3.646 2.354a.5.5 0 0 1 0-.708z"/>
                            <path fill-rule="evenodd" d="M7.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L13.293 8 7.646 2.354a.5.5 0 0 1 0-.708z"/>
                        </svg>
                        
                        <h5>Perfil</h5>
                        <!-- <br> -->
                        <hr>
                        <p><?php echo $_SESSION['descripcion_2']. '&nbsp'?></p>
                    </div>
                    <!-- Experiencia -->
                    <div class="row">
                        <!-- flechitas -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-double-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M3.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L9.293 8 3.646 2.354a.5.5 0 0 1 0-.708z"/>
                            <path fill-rule="evenodd" d="M7.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L13.293 8 7.646 2.354a.5.5 0 0 1 0-.708z"/>
                        </svg>
                        
                        <h5>Experiencias de trabajo</h5>
                        <br>
                        <hr>
                        <!-- fila 01/2017 - Presente -->
                        <div class="row">
                            <div class="col-lg-4">
                                <p>01/2017 - Presente</p>
                            </div>
                            <div class="col-lg-8">
                                <p><b>Consultor SAP</b>
                                    <br>
                                    <span class="subtitulo">Bunge Cono Bur</span>
                                    <br>
                                    Mantenimiento Correctivo / evolutivo Moduls FI-CO-TRM. Implementación interfase con bancos para registro de cobranzas por cuentas recaudadoras. Implementación del registro de recaudadores a través de sistema Lapos. Líder FUncional FICO para proyecto Upgrade.
                                </p>
                            </div>
                        </div>
                        <!-- fila 08/2016 - 12/2016 -->
                        <div class="row">
                            <div class="col-lg-4">
                                <p>08/2016 - 12/2016</p>
                            </div>
                            <div class="col-lg-8">
                                <p>Consultor SAP FICO Br.
                                    <br>
                                    <span class="subtitulo">Boldek - La Plata, Buenos Aires</span>
                                    <br>
                                    Como consultor SAP FICO, participé activamente en los siguientes proyectos:
                                    <ul>
                                        <li>Banco Hipotecario - Upgrade de versión 5.0 a 6.0</li>
                                        <li>Laboratorios Banof Aventis Soporte para LATAM</li>
                                        <li>Investigación y desarrollo de casos de estudios sobre parametrización y aplicación del módulo TRM - Plazos Fijos.</li>
                                    </ul>
                                </p>
                            </div>
                        </div>
                        <!-- fila 01/2015 - 07/2016 -->
                        <div class="row">
                            <div class="col-lg-4">
                                <p>01/2015 - 07/2016</p>
                            </div>
                            <div class="col-lg-8">
                                <p>Especialista SAP FI
                                    <br>
                                    <span class="subtitulo">Accenture Argentina</span>
                                    <br>
                                    Consultor funcional del modulo FI creación de nuevas sociedades FI, configuración de operaciones bancarias de extractos automáticos, configuración de nuevas estructuras de balances, configuración de nuevas cuentas bancarias en las distintas sociedades del grupo de empresas, configuración parcial modulo activo fijo, configuración de nuevos indicadores de impuestos, soporte funcional a usuarios del módulo FI-AR, FI-TR, FI-GL, FI-AP
                                </p>
                            </div>
                        </div>
                    
                    <!-- Educación -->
                    <div class="row">
                        <!-- flechitas -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-double-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M3.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L9.293 8 3.646 2.354a.5.5 0 0 1 0-.708z"/>
                            <path fill-rule="evenodd" d="M7.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L13.293 8 7.646 2.354a.5.5 0 0 1 0-.708z"/>
                        </svg>
                        
                        <h5>Educación</h5>
                        <br>
                        <hr>
                        <div class="row">
                            <div class="col-lg-4">
                                <p>08/2019 - Presente</p>
                            </div>
                            <div class="col-lg-8">
                                <p>Contador Público
                                    <br>
                                    <span class="subtitulo">Universidad de Buenos Aires (UBA) - Buenos Aires - Promedio: 8</span>
                                    <br>
                                    Durante mi formación me he capacitado para asesorar personas y empresas en las áreas financiera, impositiva, contable, laboral, de costos, y societaria. Diseñar, interpretar e implementar sistemas de información contables, dentro de las organizaciones públicas y privadas, para la toma de
                                </p>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>

            <span class="pagina"><p><b>Pagina 1/2</b></p></span>
        </div>
        <script>
            const bdark=document.querySelector('#bdark');
            const body=document.querySelector('.content');

            load();

            //función q mira si hya un darkmode en bodi. si no lo hya, lo creo y si lo hay, lo borra.
            bdark.addEventListener('click', e =>{
                body.classList.toggle('darkmode');
                store(body.classList.contains('darkmode'));
            });

            //función q permite ver si hya un valor guardado.
            function load(){
                const darkmode = localStorage.getItem('darkmode');
                if(!darkmode == 'true'){
                    body.classList.add('darkmode');
                }
                else if (darkmode=='true'){
                    body.classList.add('darkmode');
                }
            }
            //función q pemite guardar un valor
            function store(value){
                localStorage.setItem('darkmode', value);
            }
        </script>


        
    </body>
</html>