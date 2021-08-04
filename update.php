<!DOCTYPE html>
<html>
<head>
	<script src="jquery-3.5.1.min.js"></script>
	<style type="text/css">
		*{
			font-family: Arial, Helvetica, sans-serif;
		}
		table{
			width: 100%;
		}
		table tr:nth-child(even){
			background-color: #f2f2f2
		;}
		table tr:hover {background-color: #ddd;
		}
		table th {
		  padding-top: 12px;
		  padding-bottom: 12px;
		  text-align: left;
		  background-color: #04AA6D;
		  color: white;
		}
	</style>
	<title>crUd - @fcoterroba.com</title>
</head>
<body>
	<h1>crUd - Update - Actualizar</h1>
	<?php
	include 'conn.php';
	if(!empty($_POST['nombre']) && !empty($_POST['apellidos'])){

		$id = $_GET['id'];
		$name = $_POST['nombre'];
		$apellidos = $_POST['apellidos'];

		$get_all = $dbh->prepare("UPDATE main_data SET nombre = '$name', apellidos = '$apellidos' WHERE ID = '$id'");
		$get_all->execute();


		header('Location: http://localhost/prueba_CRUD/update.php');



	}else if (!empty($_GET['id'])) {
		$id = $_GET['id'];
		echo "<form action='' method='POST'>";
		$get_all = $dbh->prepare("SELECT * FROM main_data WHERE ID = '$id'");
		$get_all->execute();
		while($fila = $get_all->fetch(PDO::FETCH_OBJ)){
			echo "Nombre a modificar: <input type='text' value='$fila->nombre' name='nombre'><br>Apellidos a modificar: <input type='text' value='$fila->apellidos' name='apellidos'>";
		}
		echo "<br><input type='submit' value='Actualizar datos'></form>";
	}else{
		echo "<table>
		<tr>
			<th>ID</th>
			<th>Nombre</th>
			<th>Apellidos</th>
			<th>Actualizar</th>
		</tr>";
	
		$get_all = $dbh->prepare("SELECT * FROM main_data");
		$get_all->execute();
		while($fila = $get_all->fetch(PDO::FETCH_OBJ)){
			echo "<tr><td>$fila->ID</td><td>$fila->nombre</td><td>$fila->apellidos</td><td><button id='boton' onclick='prueba($fila->ID);'>Actualizar</button></td></tr>";
		}
		echo "</table>";
		}
		?>
	<script type="text/javascript">
		function prueba(id){
			window.location.replace("http://localhost/prueba_CRUD/update.php?id="+id);
		}
	</script>
</body>
</html>