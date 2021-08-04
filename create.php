<!DOCTYPE html>
<html>
<head>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script src="sweetalert2.all.min.js"></script>
	<style type="text/css">
		input[type=text] {
		  width: 30%;
		  box-sizing: border-box;
		  border: 2px solid #ccc;
		  border-radius: 4px;
		  font-size: 16px;
		  background-color: white;
		  background-image: url('searchicon.png');
		  background-position: 10px 10px; 
		  background-repeat: no-repeat;
		  padding: 12px 20px 12px 40px;
		  transition: width 0.4s ease-in-out;
		}
		input[type=text]:focus {
			width: 100%;
			border: 2px solid blue;
  			border-radius: 4px;
		}
		input[type=submit]{
			background-color: #4CAF50;
		  border: none;
		  color: white;
		  padding: 16px 32px;
		  text-align: center;
		  text-decoration: none;
		  display: inline-block;
		  font-size: 16px;
		  margin: 4px 2px;
		  transition-duration: 0.4s;
		  cursor: pointer;
		}
		input[type=submit]:hover {
		  background-color: #008CBA;
		  color: white;
		}
	</style>
	<title>Crud - @fcoterroba.com</title>
</head>
<body>
	<h1>Crud - Create - Crear</h1>
	<?php
	if (!empty($_POST['name']) && !empty($_POST['apellidos'])) {
		include 'conn.php';
		$nombre = $_POST['name'];
		$apellidos = $_POST['apellidos'];
		$insert_data = $dbh->prepare("INSERT INTO main_data (nombre, apellidos) VALUES ('$nombre', '$apellidos')");
		$insert_data->execute();
		?>
		<script type="text/javascript">
		Swal.fire(
  			'Dato añadido!',
  			'Se ha añadido tu información a la base de datos',
  			'success'
		)
		</script>
		<?php
	}
	?>
	<form action="" method="POST">
		Escriba su nombre:
		<br>
		<input type="text" name="name" placeholder="Escriba su nombre" required>
		<br>
		Escriba sus apellidos:
		<br>
		<input type="text" name="apellidos" placeholder="Escriba sus apellidos" required>
		<br>
		<input type="submit" value="Crear usuario">
	</form>
</body>
</html>