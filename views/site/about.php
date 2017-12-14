<?php
?>


<!DOCTYPE html>
<html lang="es">
  <head>
	<title>LocateME</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8">

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDvVdl9cfEsiLYLRU_5RmUhKyFq8-viTjw&callback=initMap"
  type="text/javascript">
</script>
                
	  	<script type="text/javascript">
	  		var mapa;
	  		var opcionesMapa;

			function InicializarMapa() {
				//declaramos un objeto de la clase google.maps.LatLng con la posicion
			    var AVBCPosition = new google.maps.LatLng(41.392215729, 2.20155715);
			    
			    //define las opciones del mapa, el centro, el zoom y el tipo (ROADMAP)
			    opcionesMapa = {
			        center: AVBCPosition,
			        zoom: 11,
			        mapTypeId: google.maps.MapTypeId.ROADMAP
			    }
			    //define un objeto de la clase google.maps.Map (el mapa) y define en que elemento aparece y cuales son las opciones
			    mapa = new google.maps.Map(document.getElementById("map_canvas"), opcionesMapa);
			    
			    //define un marcador para esa posicion inicial
			    var opcionesMarcador = {
			        position: AVBCPosition,
			        map: mapa,
			        draggable:true,
			        animation: google.maps.Animation.DROP,
			        title: "Hola."
			    }
			    //define un objeto de la clase google.maps.Maker 
			    var marcador = new google.maps.Marker(opcionesMarcador);

			    // activa la escucha del evento clik del raton para que muestre las coord del punto
			    google.maps.event.addListener(mapa, "click", function(evento) {
			        // mostrar las coordenadas del punto seleccionado
			        MostrarCoordenadas(mapa, evento.latLng);
			    });
			    //muestra las coordenadas en la infoventana de google maps
				function MostrarCoordenadas(mapa, latLng) {
				    var opcionesVentana = {
				        content: "Las coordenadas del punto son:<br>(" +
				            latLng.lat() + " &deg;N, " +
				            latLng.lng() + " &deg;E)",
				        position: latLng
				    }
				    //define un objeto de la clase google.maps.infoWindow
				    var ventanaInfo = new google.maps.InfoWindow(opcionesVentana);
				    
				    ventanaInfo.open(mapa);
				}
				//========MUESTRA LA POSICION DEL NAVEGADOR===============
				var botonGET=document.getElementById('getPosition');
				botonGET.addEventListener('click', obtenerPosicion, false);
			
				function obtenerPosicion(){
					var geoconfig={
					    enableHighAccuracy: true,
					    maximumAge: 60000
				  	};
				  	control=navigator.geolocation.watchPosition(mostrar, errores, geoconfig);
				}

				function mostrar(posicion){
				  	var ubicacion=document.getElementById('ubicacion');
					var datos='';
					datos+='Latitud: '+posicion.coords.latitude+'<br>';
					datos+='Longitud: '+posicion.coords.longitude+'<br>';
					datos+='Exactitud: '+posicion.coords.accuracy+'mts.<br>';
//                                        datos+='Latitud: '+1+'<br>';
//					datos+='Longitud: '+1+'<br>';
//					datos+='Exactitud: '+1+'mts.<br>';
					ubicacion.innerHTML=datos;

				  	var miPosicion = new google.maps.LatLng(
				  		posicion.coords.latitude,posicion.coords.longitude
			        );
				  	//centra el mapa en esa posicion, tambien funciona con:
			        //mapa.map.setCenter(miPosicion, 11);
			        mapa.panTo(miPosicion);
			        mapa.setZoom(11);
			        //define un marcador para esa posicion 
				    var opcionesMarcadorMe = {
				        position:miPosicion,
				        map: mapa,
				        draggable:true,
				        animation: google.maps.Animation.DROP,
				        title: "HOLA MUNDO, estoy aquí."
				    }
				    //define un objeto de la clase google.maps.Maker 
				    var marcadorMe = new google.maps.Marker(opcionesMarcadorMe);
				}
				function errores(error){
				  alert('Error: '+error.code+' '+error.message);
				}



				//=====EL CENTRO DEL MAPA MUESTRA UNA POSICION AL AZAR======

				var botonRANDOM=document.getElementById('randomPosition');
				botonRANDOM.addEventListener('click', PosicionRandom, false);

				function PosicionRandom () {
					var surOeste = new google.maps.LatLng(51.203405,12.244141);
					var norEste = new google.maps.LatLng(-25.363882,180.044922);

					var longSpan = norEste.lng() - surOeste.lng();
					var latSpan = norEste.lat() - surOeste.lat();

					var randomLat =surOeste.lat() + latSpan * Math.random();
					var randomLon =surOeste.lng() + longSpan * Math.random();

					var randomlocation = new google.maps.LatLng(randomLat,randomLon);
					
					marcador.setPosition(randomlocation);
					//mapa.setCenter(randomlocation, 8);
			        //mapa.panTo(randomlocation);
			        mapa.setCenter(marcador.getPosition());
			        mapa.setZoom(5);

					var datos='';
					datos+='Latitud: '+randomLat+'<br>';
					datos+='Longitud: '+randomLon+'<br>';
					
					document.getElementById('ubicacion').innerHTML=datos;   
				}
				//=====INTRODUCE COORDENADAS DEL LUGAR QUE SE QUIERE MOSTRAR======
				var botonGO=document.getElementById('goToPosition');
				botonGO.addEventListener('click', muestraCoord, false);

				function muestraCoord () {
					document.getElementById('coordenadas').style.display = 'block';
				}

				document.getElementById('go').addEventListener('click', goToCoord, false);

				function goToCoord (){

					var cLat =document.getElementById('Latitud').value;
					var cLon =document.getElementById('Longitud').value;
					var destino = new google.maps.LatLng(cLat,cLon);
					
					marcador.setPosition(destino);
			        mapa.setCenter(marcador.getPosition());
			        mapa.setZoom(5);

					var datos='';
					datos+='Latitud: '+cLat+'<br>';
					datos+='Longitud: '+cLon+'<br>';
					
					document.getElementById('ubicacion').innerHTML=datos;   
				}
			}	
		</script>
	</head>

	<body onload="InicializarMapa()">
		<div style="text-align: center;">
			<button id="getPosition">Obtener mi posicion</button>
		    <button id="randomPosition">Obtener posicion al azar</button>
		    <button id="goToPosition">Ir a una determinada posicion</button>
		  <section id="ubicacion" >
		  </section>
		  <div id="coordenadas" style="display:none">
		  	Latitud<input id="Latitud" name="Latitud" placeholder="4.3922157">
		  	Longitud<input id="Longitud" name="Longitud" placeholder="-2.2045689">
		    <button id="go">GO</button>

		  </div>
		  <div id="map_canvas" style="width: 800px; height: 500px; background-color:#666; margin: 0 auto;"></div>
		  <div><p>Haciendo clik en cualquier posicion del mapa puedes saber las coordenadas</p></div>
		</div>
	</body>
</html>

