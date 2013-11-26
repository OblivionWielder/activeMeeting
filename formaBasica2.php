<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="EN" lang="EN" dir="ltr">
	<head profile="http://gmpg.org/xfn/11">
		<title>Active Meeting :: Generar junta</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<meta http-equiv="imagetoolbar" content="no" />
		<link rel="stylesheet" href="template/styles/layout.css" type="text/css" />
		<script type="text/javascript" src="template/scripts/jquery-1.4.1.min.js"></script>
		<?php
			session_start();
		?> 
		<script type="text/javascript">
			function hideEveryone()
			{
				$("#creacionJunta").hide();
				$("#seleccionFechas").hide();
				$("#seleccionInvitados").hide();
				$("#distribucionAInvitados").hide();	
				$("#confirmacionInformacion").hide();
				$("#juntaCreada").hide();
			}

			function loadCreacionJunta()
			{
				var distPart = document.getElementById("participantesDist");
				distPart.remove(0);
				
				$("#creacionJunta").show();
				$("#seleccionFechas").hide();
				$("#seleccionInvitados").hide();
				$("#distribucionAInvitados").hide();
				$("#confirmacionInformacion").hide();
				$("#juntaCreada").hide();
			}
			function loadSeleccionFechas()
			{
				$("#creacionJunta").hide();
				$("#seleccionFechas").show();
				$("#seleccionInvitados").hide();
				$("#distribucionAInvitados").hide();
				$("#confirmacionInformacion").hide();
				$("#juntaCreada").hide();
			}
			function loadSeleccionInvitados()
			{
				$("#creacionJunta").hide();
				$("#seleccionFechas").hide();
				$("#seleccionInvitados").show();
				$("#distribucionAInvitados").hide();
				$("#confirmacionInformacion").hide();
				$("#juntaCreada").hide();
			}
			function loadDistribucionAInvitados()
			{
				$("#creacionJunta").hide();
				$("#seleccionFechas").hide();
				$("#seleccionInvitados").hide();
				$("#distribucionAInvitados").show();
				$("#confirmacionInformacion").hide();
				$("#juntaCreada").hide();
			}
			function loadConfirmacionInformacion()
			{ 
				$("#creacionJunta").hide();
				$("#seleccionFechas").hide();
				$("#seleccionInvitados").hide();
				$("#distribucionAInvitados").hide();
				$("#confirmacionInformacion").show();
				$("#juntaCreada").hide();
			}
			function loadJuntaCreada()
			{
				$("#creacionJunta").hide();
				$("#seleccionFechas").hide();
				$("#seleccionInvitados").hide();
				$("#distribucionAInvitados").hide();
				$("#confirmacionInformacion").hide();
				$("#juntaCreada").show();
			}
		</script>
	</head>

	<body onload="loadCreacionJunta()">
	<!--Divs Varios-->
		<div class="wrapper col1">
		  <div id="header">
			<div id="logo">
			  <h1 title="version 2"><a href="#">Active Meeting</a></h1>
			  <p>Crea juntas f&aacute;cil y r&aacute;pido</p>
			</div>
			<div id="topnav">
			  <ul>
				<li><a href="index.php">Inicio</a></li>
				<li><a href="style-demo.html">Crear Junta</a></li>
				<li><a href="#">Link 1</a></li>
				<li><a href="#">Link 2</a></li>
				<li><a href="#">DropDown</a>
				  <ul>
					<li><a href="#">Link 1</a></li>
					<li><a href="#">Link 2</a></li>
					<li><a href="#">Link 3</a></li>
				  </ul>
				</li>
			  </ul>
			</div>
			<br class="clear" />
		  </div>
		</div>
	
		<!--Div de creacion de junta-->
		<div class="wrapper col3">
			<div id="container">
				<div id="content">
					<h3>Generar Junta</h3>
					<div id="creacionJunta" hidden>
						<p>Soy creacionJunta</p>
						<!--<form id="creacionJuntaForm" method="post">-->
						<form id="creacionJuntaForm" action="javascript:alert( 'successOMG!' );">
						  <fieldset>
							<label for="nombreJunta">Nombre De La Junta: </label>
							<input type="text" name="nombreJunta" id="nombreJunta" />
							<br />
							<label for="emailCreador">Email: </label>
							<input type="text" name="emailCreador" id="emailCreador" />
							<br />
							<label for="cierreVotacion">Fecha De Cierre De Votaci&oacute;n: </label>
							<input type="text" name="cierreVotacion" id="cierreVotacion" />
							<label for="horaCierreVotacion"> Hora: </label>
							<input type="text" name="horaCierreVotacion" id="horaCierreVotacion" />
							<br />
							<label for="descripcionJunta">Descripci&oacute;n: </label>
							<textarea name="descripcionJunta" id="descripcionJunta" rows="4" cols="50">
							</textarea>
						  </fieldset>
						  <input type ="hidden" value=1 id="accion" name ="accion"/>
							<button type="submit">Siguiente</button>
						<!--<input type="submit" id="creacionJuntaFormButton" name="Submit" value="Siguiente (Fechas)" />-->
						</form>
						<span></span>
						<script>
							$( "#creacionJuntaForm" ).submit(function(event) {
							    //agregado para que pueda votar el creador
								var inputEmail = document.getElementById("emailCreador");
								var distPart = document.getElementById("participantesDist");
								
								if(inputEmail.value != "") {
									var email = document.createElement("option");
									email.text = inputEmail.value;
									distPart.add(email, null);
								}
								
								console.log( JSON.stringify($( this ).serializeArray() ));
								event.preventDefault();
								$.ajax({
									type: "POST",
									dataType: "json",
									url: "saveInSession.php",
									//data: {myData:JSON.stringify($( this ).serializeArray() )},
									data: {myData:$( this ).serializeArray() },
									success: function(data){
										alert('Llegue!');
									},
									error: function(e){
										console.log(e.message);
									}
								});
								loadSeleccionFechas();
							});
						</script>
					</div>

					<!--Div de Fechas-->
					<div id="seleccionFechas" hidden>
						<p> Soy seleccionFechas</p>
						<script type="text/javascript">
							$(function() {
								var scntDiv = $('#fechas');
								var i = $('#fechas p').size() + 1;			
								
								var fechas = new Array();
								var calendario = new Array();
								
								fechas = [document.getElementById("fechaElegir1"), document.getElementById("horaInicio1"), document.getElementById("horaFin1")];
								calendario.push(fechas);
								
								$('#agregafecha').live('click', function() {
									$('<p><input type="text" id="fechaElegir' + i +'" size="20" name="fechaElegir' + i +'" />'
										+'<input type="text" id="horaInicio' + i +'" size="20" name="horaInicio' + i +'" />'
										+'<input type="text" id="horaFin' + i +'" size="20" name="horaFin' + i +'" />'
										+'<button type="button" href="#" id="borrafecha">Borrar Fecha</button></p>').appendTo(scntDiv);
									fechas = [document.getElementById("fechaElegir"+i), document.getElementById("horaInicio"+i), document.getElementById("horaFin"+i)];
									calendario.push(fechas);
									i++;
									return false;
								});
					
								$('#borrafecha').live('click', function() { 
									if( i > 2 ) {
										$(this).parents('p').remove();
										var fechaBorrar = [document.getElementById("fechaElegir"+i), document.getElementById("horaInicio"+i), document.getElementById("horaFin"+i)];
										var indice = calendario.indexOf(fechaBorrar);
										calendario.splice(indice,1);
										i--;
										
									}
									return false;
								});
							});
						</script>
						<form id="seleccionFechasForm" action="javascript:alert( 'successOMG!' );">
							<fieldset>
								<b>Fechas a elegir:</b>
								<br /><br />
								<label for="fechaDeJunta">Fecha de junta</label> <label for="horaDeInicio">Hora de Inicio</label> <label for="HoraDeFin">Hora de Conclusi&oacute;n</label>
								<div id="fechas">
									<p>
										<input type="text" id="fechaElegir1" size="20" name="fechaElegir1"/>
										<input type="text" id="horaInicio1" size="20" name="horaInicio1"/>
										<input type="text" id="horaFin1" size="20" name="horaFin1"/>
									</p>
								</div>
								<br />
								<button type="button" href="#" id="agregafecha">Agregar Fecha</button>
								<br />
							</fieldset>
							<button type="button" onclick="loadCreacionJunta()">Anterior</button>
							<button type="submit">Siguiente</button>
						</form>
						<script>
							$( "#seleccionFechasForm" ).submit(function(event) {
								console.log( JSON.stringify($( this ).serializeArray() ));
								event.preventDefault();
					
								$.ajax({
									type: "POST",
									dataType: "json",
									url: "saveInSession.php",
									//data: {myData:JSON.stringify($( this ).serializeArray() )},
									data: {myData:$( this ).serializeArray() },
									success: function(data){
										alert('Llegue!');
									},
									error: function(e){
										console.log(e.message);
									}
								});
								loadSeleccionInvitados();
							});
						</script>
					</div>

					<!--Div de Invitados-->
					<div id="seleccionInvitados" hidden>
						<p> Soy seleccionInvitados</p>
						<script type="text/javascript">
						<!--
							function agregarPartic()
							{
								var listaParticipantes = document.getElementById("participantes"); // Obtener la referencia del select
								var distPart = document.getElementById("participantesDist"); // Lista para el siguiente div
								var inputEmail = document.getElementById("emailParticipante"); // Obtener la referencia del mail que se recibe como input
								
								var arregloParticipantes = new Array(); //Arreglo para mandar a los participantes a procesador
								
								if(inputEmail.value != "")
								{
									/* Validar que el inputEmail sea una email valido */
									/* Validar que el email que se trata de agregar no exista en la lista de participantes */

									var email = document.createElement("option"); // Crear un option nuevo
									email.text = inputEmail.value; // Asignarle de value al option el string del mail a agregar
									var email2 = document.createElement("option"); // Crear un option nuevo
									email2.text = inputEmail.value; // Asignarle de value al option el string del mail a agregar
									listaParticipantes.add(email, null); // Agregar el option al final de la lista
									distPart.add(email2, null); // Agregar el option al final de la lista del otro div

									arregloParticipantes.push(email.text); //Se mete al participante en el arreglo
									
									// Al ponerlo asi no funciona, aunque no deberia de haber problemas D=
									/*try
									{
										// Para IE de version 7 para abajo
										listaParticipantes.add(email, listaParticipantes.[null]);
									}
									catch(e)
									{
										listaParticipantes.add(email, null);
									}*/

									inputEmail.value = ""; // Borrar el campo de mail
								}
							}

							function eliminarPartic()
							{
								var listaParticipantes = document.getElementById("participantes"); // Obtener la referencia del select
								var distPart = document.getElementById("participantesDist"); // Obtener referencia del select del div siguiente
								var seleccionado = listaParticipantes.selectedIndex;
								listaParticipantes.remove(seleccionado);
								distPart.remove(seleccionado+1);
								arregloParticipantes.splice(seleccionado,1); //Borra del arreglo al participante seleccionado
							}

							// -->
						</script>
						<form id="seleccionInvitadosForm" action="javascript:alert( 'successOMG!' );">
							<fieldset>
								<label for="emailInv">Email invitado: </label>
								<input type="email" name="emailParticipante" id="emailParticipante" />
								<button type="button" name="agregarParticipante" id="agregarParticipante" onclick="agregarPartic()">Agregar participante</button>
								<br /><br />
								<label for="listaInvitados">Invitados: </label>
								<select name="participantes" id="participantes" multiple="multiple" size="3"></select>
								<button type="button" name="eliminarParticipante" id="eliminarParticipante" onclick="eliminarPartic()" />Eliminar participante</button>
								<br /><br />
							</fieldset>
							<button type="button" onclick="loadSeleccionFechas()">Anterior</button>
							<button type="submit">Siguiente</button>
						</form>
						<script>
							$( "#seleccionInvitadosForm" ).submit(function(event) {
							console.log( JSON.stringify($( this ).serializeArray() ));
							event.preventDefault();
							$.ajax({
								type: "POST",
								dataType: "json",
								url: "saveInSession.php",
							  //data: {myData:JSON.stringify($( this ).serializeArray() )},
								data: {myData:$( this ).serializeArray() },
								success: function(data){
									alert('Llegue!');
								},
								error: function(e){
									console.log(e.message);
								}
							});
							loadDistribucionAInvitados();
							});
						</script>
					</div>
				  
					<!--Div de Distribucion herramientas para invitados-->
					<div id="distribucionAInvitados" hidden>
						<p> Soy distribucionAInvitados</p>
						<script type="text/javascript">
						<!--
							window.positivos = new Array();
							window.negativos = new Array();
							window.vetos = new Array();
							
							var tam = document.getElementById("participantesDist").length;
							
							var votInicial = function(tam){
								for(var i=0; i<tam; i++){
									positivos[i]=0;
									negativos[i]=0;
									vetos[i]=0;
								}
							}
							
							function asignar() {							
								var seleccionado = document.getElementById("participantesDist").selectedIndex;
								
								for (var i=0; i<document.getElementById("participantesDist").length; i++){
									if(i==seleccionado){
										document.getElementById("numPos").value = positivos[seleccionado];
										document.getElementById("numNeg").value = negativos[seleccionado];
										document.getElementById("numVetos").value = vetos[seleccionado];
									}
								}
								
								cambios(seleccionado);
							}
							
							function cambios(selcam) {
								positivos[selcam] = document.getElementById("numPos").value;
								negativos[selcam] = document.getElementById("numNeg").value;
								vetos[selcam] = document.getElementById("numVetos").value;
							}
						// -->
						</script>
						<form id="distribucionAInvitadosForm" action="javascript:alert( 'successOMG!' );">
							<fieldset>
								<label for="listaInvitados">Invitados: </label>
								<select name="participantesDist" id="participantesDist" multiple="multiple" size="3" onchange="asignar()">
								</select>
								<br /><br />
								<label for="numPos">Votos positivos (+): </label>
								<input type="text" id="numPos" name="numPos" size="1" value="0"/>
								<br />
								<label for="numNeg">Votos negativos (-): </label>
								<input type="text" id="numNeg" name="numNeg" size="1" value="0"/>
								<br />
								<label for="numVetos">Vetos(x): </label>
								<input type="text" id="numVetos" name="numVetos" size="1" value="0"/>
							</fieldset>
							<button type="button" onclick="loadSeleccionInvitados()">Anterior</button>
							<button type="submit">Siguiente</button>
						</form>
						<script>
							$( "#distribucionAInvitadosForm" ).submit(function(event) {
							console.log( JSON.stringify($( this ).serializeArray() ));
							event.preventDefault();
							$.ajax({
								type: "POST",
								dataType: "json",
								url: "saveInSession.php",
							  //data: {myData:JSON.stringify($( this ).serializeArray() )},
								data: {myData:$( this ).serializeArray() },
								success: function(data){
									alert('Llegue!');
								},
								error: function(e){
									console.log(e.message);
								}
							});
							loadConfirmacionInformacion();
							});
						</script>
					</div>

					<!--Div de Confirmacion-->
					<div id="confirmacionInformacion" hidden>
						<p>Soy confirmacionInformacion</p>
						<form id="confirmacionInformacionForm">
							<fieldset>
								<label for="nJunta">Nombre De La Junta: </label>
								<br />
								<label for="eCreador">Email: </label>
								<br />
								<label for="cVotacion">Fecha De Cierre De Votacion: </label>
								<br />
								<label for="dJunta">Descripcion: </label>
								<br />
								<label for="fElegir">Fechas a elegir: </label>
								<br />
								<label for="lInvitados">Invitados: </label>
							</fieldset>
						<button type="button" onclick="loadDistribucionAInvitados()">Anterior</button>
						<button type="button" onclick="loadJuntaCreada()">Terminar</button>
						</form>
					</div>

					<!--Div de Cierre-->
					<div id="juntaCreada" hidden>
						<p>Soy juntaCreada</p>
						<button type="button" onclick="hideEveryone()">OK</button>
					</div>
				<br class="clear" />
				</div>
			</div>
		</div>
		
	</body>
</html>
