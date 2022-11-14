<!-- Tancarà la sessió i tornarà a la pantalla principal (index.php) -->
<?php
 session_start();
 session_destroy();
 header('Location: index.php');
?>