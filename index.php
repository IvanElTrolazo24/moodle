<?php $titulo = 'Bienvenidos a PHP'; ?>
<?php require 'conexion.php'; ?>
<?php require 'usuario.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $titulo;?></title>
</head>
<body>
	<h1><?php echo 'Apache + PHP funciona!'?></h1>
	<?php
	 $usuario = new Usuario();
	 $usuario->id = 10;
	 $usuario->nombre ='Iván';	
	?>
	<table>
	<tr>		
	<thead>
		<th>UserID</th>
		<th>Nombre</th>	
		</thead>
		</tr>

		<tbody>
			<tr>
				<td><?php echo $usuario->id;?></td>		
				<td><?php echo $usuario->nombre;?></td>
			</tr>
		</tbody>
	</table>
	<div style="padding: 50px;background-color:gray;" >
		<form action="#" method="get">
			<label for="userid">ID de Usuario</label>
			<input type="text" name="userid" id="userid">
			<button type="submit">Buscar por ID</button>	
		</form>	
	</div>
	<?php
	//leer la variable via metodo get
	//isset() evalua que exista y que sea distinto de null 
	if(isset($_GET['userid']))
	{
		$id = $_GET['userid'];
		if($usuario->findById($id)) {
			var_dump($usuario);
		}else{
			echo 'usuario no encontrado';	 
		}
	}
	?>
</body>
</html>