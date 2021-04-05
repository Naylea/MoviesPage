<?php
session_start();

//Si el campo de entrada usuario y clave tienen un valor entonces 
if (isset($_REQUEST['usuario']) && isset($_REQUEST['clave'])) {

    //Guardar el valor tomado en variables
    $usuario = $_REQUEST['usuario'];
    $clave = $_REQUEST['clave'];


    //Preguntar, probablemente tiene que ver con un proceso de encriptación lo que se 
    //se desea encriptar, desde donde debe inciar y la longitud
    $salt = substr($usuario, 0, 2);
    //Encriptación de la clave
    $clave_crypt = crypt($clave, $salt);

    //Llamado de clase que convoca al procedimiento de la BD
    require_once("class/usuarios.php");
    //Instanciación de un objeto, se hace uso del método  
    //y luego su posterior asignación en una variable de trabajo
    $obj_usuarios = new usuarios();
    $usuario_validado = $obj_usuarios->validar_usuario($usuario, $clave_crypt);

    foreach ($usuario_validado as $array_resp) {
        foreach ($array_resp as $value) {
            $nfilas = $value;
        }
    }
    //Se guarda en una variable de sesión los datos del usuario
    if ($nfilas > 0) {
        $usuario_validado = $usuario;
        $_SESSION["usuario_valido"] = $usuario_validado;
    }
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C/DTD HTML 4.0//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="es">

<head>
    <title>Proyecto Final</title>
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
</head>

<body>
<header>
	<?php 
		require_once('header.php');
	?>	
</header>
    <?php
    // Sesión Iniciada
    if (isset($_SESSION["usuario_valido"])) {
            include_once('index2.php');
        ?>
        
        <p>[<a href='logout.php'>Desconectar</a>]</p>
    <?php    
    
    }
    // Intento de Entrada Fallido
    else if (isset($usuario)) {
        print("<BR><BR>\n");
        print("<P Align='center'>Acceso no autorizado</p>\n");
        print("<P Align='center'>[ <a href='login.php'> Conectar </a> ]</p>\n");
    }
    //Sesión no iniciada
    else {
        print("<DIV class=card>\n");
       
        print("<br><br>\n");
        print("<div class='container'>");
        print("<h2>Movie Reviews<br>" .
        
            " Iniciar Sesion</h2>\n");
            print(" <img id='profile-img' class='profile-img-card' src='img/avatar_2x.png' />\n");
        print("<FORM class='entrada' name='login' action='login.php?menu=peliculas' method='POST'> \n");
        print("     <input type='text'  class='form-control'  placeholder='Usuario'  name='usuario' size='15' required></p>\n");
        print("<DIV >\n");
        print("     <input type='password' placeholder='Contraseña' name='clave' size='15'></p>\n");
        print("     <input type='submit' class='btn' value='Iniciar Sesion'></p>\n");
        print("</DIV>\n");
        print("</FORM>\n");
        print("<p class='parrafocentrado'>Nota: Si no dispone de indentificación o tiene problemas ". 
        "para entrar<br>pongase en contacto con él ". "<a href='mailto: webmaster@localhost'>Administrador</a> del sitio</p>\n");
        print("</DIV>\n");
		print("</DIV>\n");
    }
    ?>

<footer>
	<?php 
		include_once('footer.php');
	?>
</footer>
</body>
</html>