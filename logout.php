<?php
session_start();
?>
<html lang="es">

<head>
    <title>Desconectar</title>
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
</head>

<body>
    <?php
    //Se procede a destruir la variable de sesión que tiene los datos de user y pwd
    if (isset($_SESSION["usuario_valido"])) {
        session_destroy();
        print("<br><br><p align='center'>Conexión Finalizada</p>\n");
        print("<p align='center'> [ <a href='login.php'>Conectar</a> ]</p>\n");
    } else {

     //Si no existe una variable actual entonces 
        print("<br><br>\n");
        print("<p align='center'>No existe una conexión activa</p>\n");
        print("<p align='center' [ <a href='login.php'>Conectar</a> ]</p>\n");
    }
    ?>
</body>
</html>