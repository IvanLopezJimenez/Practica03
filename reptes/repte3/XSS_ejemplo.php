<!DOCTYPE html>
<html>
    <head>
        <title>Práctica 3 - Ejemplo Cross-Site Scripting</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style_reptes.css" type="text/css"> 
        

    </head>
    <body>
        <div class="container">
            <h1>Ejemplo de Cross-Site Scripting</h1>
            
            <h2>Què és?</h2>
            <p>El Cross-Site Scripting (XSS) és una debilitat informàtica que sol passar a les aplicacions web i permet que els atacants executin un script maliciós al navegador i així poder segrestar les sessions de l'usuari, contrasenyes o altres dades personals de la víctima com el seu compte bancari.</p>
            <h2>Exemple</h2>
            <div class="imgs">
                <p>1r pas:</p>
                <img src="img/form.png" alt="formulari">
                <p>2n pas:</p>
                <img src="img/input_exemple.png" alt="input">
                <p>3r pas:</p>
                <img src="img/post.png" alt="post.php">
                <p>Resultat:</p>
                <img src="img/alert.png" alt="resultat">
            </div>
            
            <h3>Prova-ho tu mateix! </h3>
            <form action="post.php" method="post">
                <input type="text" name="comment" value="" style="margin-bottom: 25px;" placeholder="ex: <script>alert('Això és un Cross-Site Scripting')</script>">
                <button type="submit" name="submit">Enviar</button>
            </form>

            <h2>Com es pot evitar?</h2>
            <p>Per una banda, per poder evitar-ho, una de les coses que s'hauria de tenir en compte és un antivirus i actualitzar els navegadors, ja que ells mateixos treballen cada actualització per poder evitar-ho.
            Per altra banda, seria convenient utilitzar frameworks segurs, codificar les dades de requeriments HTTP no confiables en els camps de surtida HTML, aplicar codificacions sensitives al context per prevenir XSS DOM i habilitar una política de seguretat de contingut (CSP) ajuda a una defensa profunda per la mitigació de vulnerabilitats XSS.</p>
        </div>

    </body>
</html>