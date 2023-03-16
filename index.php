<?php
	if (isset($_GET['buscador']) && !empty($_GET['buscador'])) {

		$arrayLibros = array();
		$arrayAutores = array();

		$arrayAutoresUlt = array();

		$fileContents = file_get_contents("dataset.json");
		$arrayData = json_decode($fileContents, TRUE);

		foreach ($arrayData as $key => $value) {
			if ($_GET['buscador'] == $value['titulo']) {
				array_push($arrayLibros, array(
					'titulo' => $value['titulo'],
					'autor' => $value['autor'],
					'isbn' => $value['isbn'],
					'fecha_nov' => $value['fecha_nov'],
					'portada' => $value['portada'],
				));
			} 

			if ($_GET['buscador'] == $value['autor']) {
				array_push($arrayAutores, array(
					'titulo' => $value['titulo'],
					'autor' => $value['autor'],
					'isbn' => $value['isbn'],
					'fecha_nov' => $value['fecha_nov'],
					'portada' => $value['portada'],
				));
			}
		}

		echo "<h1>Libros</h1><pre>";
		print_r(json_encode($arrayLibros));
		echo "</pre>";

		echo "<h1>Autores</h1><pre>";
		print_r(json_encode($arrayAutores));
		echo "</pre>";

	}
?>

<html>
	<head>
		<meta charset="UTF-8" />
    	<meta name="viewport" content="width=device-width" />
		<title>Busqueda de Libros - Joaquin Inthamoussu</title>
	</head>
	<body>
		<h1>Busqueda de Libros - Joaquin Inthamoussu</h1>

		<form method="GET">
		 	<label for="buscador">Busca un Título o un Autor: </label>
		  	<input type="text" name="buscador">
		  	<input type="submit" value="Submit">
		</form> 
	</body>
</html>