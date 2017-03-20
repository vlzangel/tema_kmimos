<?php
	include("../../../../vlz_config.php");
	extract($_POST);
	$conn_my = new mysqli($host, $user, $pass, $db);

	$filtros = "";

	if( $estado != "" ){ 	$filtros .= " estado LIKE '%=$estado=%' AND "; 			}
	if( $municipio != "" ){ $filtros .= " municipio LIKE '%=$municipio=%' AND "; 	}

	if( $name != "" ){ 
		$partes = explode(" ", $name);
		foreach ($partes as $parte) {
			$filtros .= " ( nombre LIKE '%$parte%' OR apellido LIKE '%$parte%' ) AND "; 
		}
	}

	$sql = "
		SELECT 
			* 
		FROM 
			cuidadores 
		WHERE 
			{$filtros}
			activo = 1 
		ORDER BY 
			rating DESC
		LIMIT
			0, 15";
	
	$result = $conn_my->query($sql);
	$resultados = array();
	while ($cuidador = $result->fetch_assoc()){
		$nombre_fichero = "../../../uploads/cuidadores/avatares/{$cuidador['id']}/0.jpg";
		if( file_exists($nombre_fichero) ){
			if( filesize($nombre_fichero) > 0 ){
				$foto = "http://localhost/tema_kmimos/wp-content/uploads/cuidadores/avatares/{$cuidador['id']}/0.jpg";
			}else{
				$foto = "http://localhost/tema_kmimos/wp-content/themes/vlz/recursos/imgs/noimg.png";
			}
		}else{
			$foto = "http://localhost/tema_kmimos/wp-content/themes/vlz/recursos/imgs/noimg.png";
		}
		$resultados[] = array(
			"id"  => $cuidador['id'],
			"nom" => utf8_encode( $cuidador['nombre'] ),
			"ape" => utf8_encode( $cuidador['apellido'] ),
			"img" => $foto,
			"pre" => $cuidador['hospedaje_desde']
		);
	}

	echo "(".json_encode($resultados).")";

?>