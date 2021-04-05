
<?php 
if(isset($_REQUEST['menu']))
{
	if ($_GET['menu']=='peliculas') {
		require_once('Proyecto.php');
	}
	if ($_GET['menu']=='log') {
		require_once('login.php');
	} 
}
 ?>