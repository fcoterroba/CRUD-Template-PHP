<!DOCTYPE html>
<html>
<head>
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
	<title>cruD - @fcoterroba.com</title>
</head>
<body>
	<?php
	include 'conn.php';
	

	if(!empty($_GET['id'])){
		$id = $_GET['id'];

		$get_all = $dbh->prepare("DELETE FROM main_data WHERE ID = '$id'");
		$get_all->execute();

		header('Location: http://localhost/prueba_CRUD/delete.php');



	}

	?>
	<h1>cruD - Delete - Borrar</h1>
	<table>
		<tr>
			<th>ID</th>
			<th>Nombre</th>
			<th>Apellidos</th>
			<th>Borrar</th>
		</tr>
	<?php
			$get_all = $dbh->prepare("SELECT * FROM main_data");
		$get_all->execute();
		while($fila = $get_all->fetch(PDO::FETCH_OBJ)){
			echo "<tr><td>$fila->ID</td><td>$fila->nombre</td><td>$fila->apellidos</td><td><button onclick='borra($fila->ID);'>❌</button></td></tr>";
		}
	?>
	</table>
	<script type="text/javascript">
		function borra(id){
			window.location.replace("http://localhost/prueba_CRUD/delete.php?id="+id);
		}
	</script>
</body>
</html>