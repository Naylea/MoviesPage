<!DOCTYPE html>
<HTML LANG="es">
<HEAD>
 <TITLE>Creacion</TITLE>
 <div class="container">
 <form action='#' method='post'>
 <LINK REL="stylesheet" TYPE="text/css" HREF="css/estilo.css?2.0">
 </form>
 </HEAD>
 <BODY> 
 <h1>Agregar o actualizar Nueva Pelicula</h1>
     <?php
     
        require_once("class/peliculas.php");
        $obj_titulo= new peliculas();

        if(isset($_POST['agregar'])){
        $obj_titulo = new peliculas();
        $agregar = $obj_titulo->agregar_pelicula($_REQUEST['pelicula1'],$_REQUEST['sinopsis1'],$_REQUEST['review1'],$_REQUEST['puntuacion1']);
        }

        if(isset($_POST['actualizar'])){
        $obj_titulo = new peliculas();
        $agregar = $obj_titulo->actualizar_peliculas($_REQUEST['id'],$_REQUEST['pelicula1'],$_REQUEST['sinopsis1'],$_REQUEST['review1'],$_REQUEST['puntuacion1']);
        }
        
        print("<DIV class=card>\n");
        print("<br><br>\n");
        print("<div class='container'>");
 echo"<FORM  METHOD=POST ACTION=crear.php enctype=multipart/form-data>";
 echo"<p><label >Id:</label>\n";
 echo "<input type='text' name='id'  >";
 echo"<p><label >Titulo:</label>\n";
 echo "<input type='text' name='pelicula1'  >";
 echo"<p><label >Sinopsis:</label>\n";
 echo "<textarea type='text' name='sinopsis1'\n ></textarea>";
 echo"<p><label >Review:</label>\n";
 echo "<textarea type='text' name='review1'></textarea>";
 echo"<p><label >Puntuacion:</label>\n";
 echo "<input type='text' name='puntuacion1'>";
 echo"<p><label >Imagen:</label>\n";
 echo "<input type=file name=imagen1>";
 echo"<BR/>";
 echo "<input type='submit' name='agregar' value=Agregar>";
 echo "<input type='submit' name='actualizar' value=Actualizar>";
 echo"</FORM>";

 echo"<FORM  METHOD=POST ACTION=login.php?menu=peliculas>";
 echo "<input type='submit' name='reg' value=Regresar>";
 echo"</FORM>";
 print("</DIV>\n");
 ?>
 
	</BODY>
	</HTML>