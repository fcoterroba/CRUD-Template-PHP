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
	<title>cRud - @fcoterroba.com</title>
</head>
<body>
	<h1>cRud - Read - Lectura</h1>
	<?php
	include 'conn.php';
	
	?>
	<table>
		<tr>
			<th>ID</th>
			<th>Nombre</th>
			<th>Apellidos</th>
		</tr>
	<?php
			$get_all = $dbh->prepare("SELECT * FROM main_data");
		$get_all->execute();
		while($fila = $get_all->fetch(PDO::FETCH_OBJ)){
			echo "<tr><td>$fila->ID</td><td>$fila->nombre</td><td>$fila->apellidos</td></tr>";
		}
	?>
	</table>
</body>
</html>