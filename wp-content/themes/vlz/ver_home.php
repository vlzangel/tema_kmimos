<?php 
	/*
		Template Name: Home
	*/

	get_header(); ?>

	<div class="vlz_contenedor_mapa">
    	<div id="map"></div>

		<div class="vlz_filtros">

		<!--
			<input type="date" name="inicio" class="vlz_date">

			<input type="date" name="fin" class="vlz_date">
		-->

			<input type="text" name="name" id="name" class="vlz_input">

			<select class="vlz_select" id='estado'>
				<option value=''>Seleccione un Estado</option>
			</select>

			<select class="vlz_select" id='municipio'>
				<option value=''>Seleccione una Delegaci&oacute;n</option>
			</select>

			<input type="submit" name="buscar" value="Buscar" id="buscar" class="vlz_boton">

		</div>
    </div>

	<div class="container">
    	<div class="row">
			<div class="col-md-12">
   				<div id='resultados'></div>
   			</div>
   		</div>
   	</div>

    <script type="text/javascript">
		var map;
		function initMap() {
			map = new google.maps.Map(document.getElementById('map'), {
				zoom: 5,
				center:  new google.maps.LatLng(24.7470528, -101.7249143), 
				mapTypeId: google.maps.MapTypeId.ROADMAP
			});
			<?php
				global $wpdb;
				$cuidadores = $wpdb->get_results("SELECT * FROM cuidadores WHERE activo=1");
				foreach ($cuidadores as $key => $value) {
					echo "
						marker = new google.maps.Marker({
							map: map,
							draggable: false,
							animation: google.maps.Animation.DROP,
							position: new google.maps.LatLng({$value->latitud}, {$value->longitud}),
							icon: 'https://www.kmimos.com.mx/wp-content/themes/pointfinder/vlz/img/pin.png'
						});
					";
				}
			?>
		}

		$("#name").on("change", function(){
      		buscar_inicio();
		});

		$("#estado").on("change", function(){
			buscar_municipio($("#estado").val(), "municipio");
      		buscar_inicio();
		});

		$("#municipio").on("change", function(){
      		buscar_inicio();
		});

		$("#buscar").on("click", function(){
			buscar_inicio();
		});

		$(document).ready(function(){ 
		<?php
				$estados = $wpdb->get_results("SELECT * FROM states ORDER BY name ASC");
				$ests = "<option value=>Seleccione un Estado</option>";
				foreach ($estados as $value) {
					$ests .= utf8_decode( "<option value={$value->id}>{$value->name}</option>" );
				}
				echo "
					$('#estado').html('{$ests}');
					//$('#estado option[value=1]').attr('selected', true);
					buscar_inicio();
				";
			?>
		});

    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD-xrN3-wUMmJ6u2pY_QEQtpMYquGc70F8&callback=initMap"></script>

<?php get_footer(); ?>
