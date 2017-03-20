<?php 
	/*
		Template Name: ver cuidador
	*/

	get_header(); ?>

		<div class="container">
	    	<div class="row">
				<div class="col-md-12">
					<?php 
						$id = $page;
						$cuidador = $wpdb->get_row("SELECT * FROM cuidadores WHERE id = {$id}");

						$nombre_fichero = "wp-content/uploads/cuidadores/avatares/{$cuidador->id}/0.jpg";
						if( file_exists($nombre_fichero) ){
							if( filesize($nombre_fichero) > 0 ){
								$foto = "http://localhost/tema_kmimos/wp-content/uploads/cuidadores/avatares/{$cuidador->id}/0.jpg";
							}else{
								$foto = "http://localhost/tema_kmimos/wp-content/themes/vlz/recursos/imgs/noimg.png";
							}
						}else{
							$foto = "http://localhost/tema_kmimos/wp-content/themes/vlz/recursos/imgs/noimg.png";
						}

						echo "
							<div class='vlz_contenedor_cuidador_perfil '>
								<div class='vlz_contenedor_foto_perfil ' style='background-image: url({$foto});'></div>
								<div class='vlz_foto_perfil ' style='background-image: url({$foto});'></div>
							</div>
						";

						echo "<pre>";
							print_r($cuidador);
						echo "</pre>";
					?>
				</div>
			</div>
		</div>

<?php get_footer(); ?>
