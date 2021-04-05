
<HTML LANG="es">
<HEAD>
 <TITLE>Movie Reviews</TITLE>
 <div class="container">
 <form action='#' method='post'>
 <LINK REL="stylesheet" TYPE="text/css" HREF="css/estilo.css?2.0">
 <link rel=icon href='img/cine.png' sizes="32x32" type="image/png">
 <meta charset="UTF-8">
 </form>
</HEAD>
<BODY>
<h1>Movie Review</h1>
<?PHP
if(isset($_SESSION["usuario_valido"])){
require_once("class/peliculas.php");


$obj_pelicula= new peliculas();

if (isset($_COOKIE['contador']))
{
	setcookie('contador',$_COOKIE['contador'] + 1, time() + 365 * 24 * 60*60);
$mensaje = 'Gracias por visitarnos. Numero de visitas: ' .$_COOKIE['contador'];
}
else
{
	// caduca en un año
	setcookie('contador',1,time() + 365 * 24 * 60 * 60);
	$mensaje= 'Bienvenida a nuestro sitio web';
}


if(isset($_POST['del'])){
	$obj_pelicula= new peliculas();
  $obj_pelicula->eliminA($_REQUEST['campos']);
}

if(isset($_POST['add'])){
	$obj_pelicula= new peliculas();
  $agregar = $obj_pelicula->agregar_peliculas($_REQUEST['agregar']);
}

if(isset($_POST['mod'])){
	$obj_pelicula= new peliculas();
  $actualizar = $obj_pelicula->actualizar_peliculas($_REQUEST['agregar'],$_REQUEST['campos']);
}




$pelicula= $obj_pelicula->consultar_peliculas();
echo"<FORM NAME=FormFiltro METHOD=POST ACTION=login.php?menu=peliculas>";
echo"<BR/>";
echo "Seleccionar Pelicula: <SELECT NAME=campos>";
echo"<OPTION value=texto SELECTED>Seleccionar";
	foreach ($pelicula as $resultado){
		echo "<OPTION value=".$resultado['id']."> ".$resultado['id']."";
	}
echo"</SELECT>";
echo"<input type='text' name='agregar' >";
echo "<input type='submit' name='del' value=Eliminar id=boton2>";
echo"</FORM>";
echo"<FORM  METHOD=POST ACTION=crear.php>";
echo "<input type='submit' name='add' value=Crear href=crear.php id=boton1>";
echo "<input type='submit' name='mod' value=Actualizar id=boton3>";
echo"</FORM>";

$nfilas=count($pelicula);

if ($nfilas > 0){
	/*print("<TABLE>\n");
	print("<TR>\n");
	print("<TH>Pelicula</TH>\n");
	print("<TH>Sinopsis</TH>\n");
	print("<TH>Review</TH>\n");	
	print("<TH>Puntuacion</TH>\n");	
	print("<TR>\n");*/
	if(isset($_REQUEST['cam'])){
	
		$obj_pelicula= new peliculas();
		echo $_REQUEST['cam'];
		// echo $resultado['id'];
		//   $obj_pelicula->subir_puntuacion($_REQUEST['cam'],$resultado['id']);
	}
	echo"<FORM NAME=FormFiltro1 METHOD=POST ACTION=login.php?menu=peliculas>";
	foreach ($pelicula as $resultado){
		print("<DIV class=movie>\n");
		
			print("<img src= img/".$resultado['imagen']." class=f1></img>\n");
				print("<DIV class=movieText>\n");
					print("<P class=titulo>" . $resultado['Pelicula'] . "</P>\n");
					print("<h4 class=movieText> Sinopsis</h4>\n");
					print("<P>" . $resultado['Sinopsis'] . "</P>\n");
					echo "<br>";
					print("<h4 class=movieText>Review</h4>\n");
					print("<P>" . $resultado['Review'] . "</P>\n");
					print("<h4 class=movieText>Puntuacion</h4>\n");
                    print("<P>" . $resultado['Puntuacion'] . "</P>\n");

				
				print("</DIV>\n");
		print("</DIV>\n");
	}
echo"</FORM>";
	
}
?>
 
        <?php
    } else {
        print("<BR><BR>\n");
        print("<P Align='center'>Acceso no autorizado</p>\n");
        print("<P Align='center'>[ <a href='login.php'> Conectar </a> ]</p>\n");
    }

	?>
	<H3><?PHP echo $mensaje; ?></H3>
	</BODY>
	</HTML>