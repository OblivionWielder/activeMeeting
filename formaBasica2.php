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
		
		<!-- Codigo para el manejo del Datepicker -->
		<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
		<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
		<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
		
		<script>
			$(function() {
				$( ".fecha" ).datepicker( { dateFormat: 'yy-mm-dd' } );
			});
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
						<script type="text/javascript">
						</script>
						<!--<form id="creacionJuntaForm" method="post">-->
						<form id="creacionJuntaForm" action="javascript:alert( 'successOMG!' );">
						  <fieldset>
							<label for="nombreJunta">Nombre De La Junta: </label>
							<input type="text" name="nombreJunta" id="nombreJunta" required/>
							<br />
							<label for="emailCreador">Email: </label>
							<input type="text" name="emailCreador" id="emailCreador" required/>
							<br />
							<label for="cierreVotacion">Fecha De Cierre De Votaci&oacute;n: </label>
							<input type="text" name="cierreVotacion" id="cierreVotacion" class="fecha" required/>
							<label for="horaCierreVotacion"> Hora: </label>
							<select name="horaCierreVotacion" id="horaCierreVotacion" size="1">
								<option value="0:00">0:00</option>
								<option value="1:00">1:00</option>
								<option value="2:00">2:00</option>
								<option value="3:00">3:00</option>
								<option value="4:00">4:00</option>
								<option value="5:00">5:00</option>
								<option value="6:00">6:00</option>
								<option value="7:00">7:00</option>
								<option value="8:00">8:00</option>
								<option value="9:00">9:00</option>
								<option value="10:00">10:00</option>
								<option value="11:00">11:00</option>
								<option value="12:00">12:00</option>
								<option value="13:00">13:00</option>
								<option value="14:00">14:00</option>
								<option value="15:00">15:00</option>
								<option value="16:00">16:00</option>
								<option value="17:00">17:00</option>
								<option value="18:00">18:00</option>
								<option value="19:00">19:00</option>
								<option value="20:00">20:00</option>
								<option value="21:00">21:00</option>
								<option value="22:00">22:00</option>
								<option value="23:00">23:00</option>
							</select>
							<br />
							<label for="descripcionJunta">Descripci&oacute;n: </label>
							<textarea name="descripcionJunta" id="descripcionJunta" rows="4" cols="50" required>
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
							var fechas = new Array();
							var calendario = new Array();
								
							fechas = [document.getElementById("fechaElegir1"), document.getElementById("horaInicio1"), document.getElementById("horaFin1")];
							calendario.push(fechas);
							
							$(function() {
								var scntDiv = $('#fechas');
								var i = $('#fechas p').size() + 1;			
								
								$('#agregafecha').live('click', function() {
									$('<p><input type="text" id="fechaElegir' + i +'" size="20" name="fechaElegir' + i +'" class="fecha" required/>'
										+'<select name="horaInicio'+ i +'" id="horaInicio'+ i +'" size="1">'
										+	'<option value="0:00">0:00</option>'
										+	'<option value="1:00">1:00</option>'
										+	'<option value="2:00">2:00</option>'
										+	'<option value="3:00">3:00</option>'
										+	'<option value="4:00">4:00</option>'
										+	'<option value="5:00">5:00</option>'
										+	'<option value="6:00">6:00</option>'
										+	'<option value="7:00">7:00</option>'
										+	'<option value="8:00">8:00</option>'
										+	'<option value="9:00">9:00</option>'
										+	'<option value="10:00">10:00</option>'
										+	'<option value="11:00">11:00</option>'
										+	'<option value="12:00">12:00</option>'
										+	'<option value="13:00">13:00</option>'
										+	'<option value="14:00">14:00</option>'
										+	'<option value="15:00">15:00</option>'
										+	'<option value="16:00">16:00</option>'
										+	'<option value="17:00">17:00</option>'
										+	'<option value="18:00">18:00</option>'
										+	'<option value="19:00">19:00</option>'
										+	'<option value="20:00">20:00</option>'
										+	'<option value="21:00">21:00</option>'
										+	'<option value="22:00">22:00</option>'
										+	'<option value="23:00">23:00</option>'
										+'</select>'
										+'<select name="horaFin' + i +'" id="horaFin' + i +'" size="1">'
										+	'<option value="0:00">0:00</option>'
										+	'<option value="1:00">1:00</option>'
										+	'<option value="2:00">2:00</option>'
										+	'<option value="3:00">3:00</option>'
										+	'<option value="4:00">4:00</option>'
										+	'<option value="5:00">5:00</option>'
										+	'<option value="6:00">6:00</option>'
										+	'<option value="7:00">7:00</option>'
										+	'<option value="8:00">8:00</option>'
										+	'<option value="9:00">9:00</option>'
										+	'<option value="10:00">10:00</option>'
										+	'<option value="11:00">11:00</option>'
										+	'<option value="12:00">12:00</option>'
										+	'<option value="13:00">13:00</option>'
										+	'<option value="14:00">14:00</option>'
										+	'<option value="15:00">15:00</option>'
										+	'<option value="16:00">16:00</option>'
										+	'<option value="17:00">17:00</option>'
										+	'<option value="18:00">18:00</option>'
										+	'<option value="19:00">19:00</option>'
										+	'<option value="20:00">20:00</option>'
										+	'<option value="21:00">21:00</option>'
										+	'<option value="22:00">22:00</option>'
										+	'<option value="23:00">23:00</option>'
										+'</select>'
										+'<button type="button" href="#" id="borrafecha">Borrar Fecha</button></p>').appendTo(scntDiv);
									fechas = [document.getElementById("fechaElegir"+i), document.getElementById("horaInicio"+i), document.getElementById("horaFin"+i)];
									calendario.push(fechas);
									i++;
									return false;
								});
					
								$('#borrafecha').live('click', function() { 
									if( i > 3 ) {
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
										<input type="text" id="fechaElegir1" size="20" name="fechaElegir1" class="fecha" required/>
										<select name="horaInicio1" id="horaInicio1" size="1">
											<option value="0:00">0:00</option>
											<option value="1:00">1:00</option>
											<option value="2:00">2:00</option>
											<option value="3:00">3:00</option>
											<option value="4:00">4:00</option>
											<option value="5:00">5:00</option>
											<option value="6:00">6:00</option>
											<option value="7:00">7:00</option>
											<option value="8:00">8:00</option>
											<option value="9:00">9:00</option>
											<option value="10:00">10:00</option>
											<option value="11:00">11:00</option>
											<option value="12:00">12:00</option>
											<option value="13:00">13:00</option>
											<option value="14:00">14:00</option>
											<option value="15:00">15:00</option>
											<option value="16:00">16:00</option>
											<option value="17:00">17:00</option>
											<option value="18:00">18:00</option>
											<option value="19:00">19:00</option>
											<option value="20:00">20:00</option>
											<option value="21:00">21:00</option>
											<option value="22:00">22:00</option>
											<option value="23:00">23:00</option>
										</select>
										<select name="horaFin1" id="horaFin1" size="1">
											<option value="0:00">0:00</option>
											<option value="1:00">1:00</option>
											<option value="2:00">2:00</option>
											<option value="3:00">3:00</option>
											<option value="4:00">4:00</option>
											<option value="5:00">5:00</option>
											<option value="6:00">6:00</option>
											<option value="7:00">7:00</option>
											<option value="8:00">8:00</option>
											<option value="9:00">9:00</option>
											<option value="10:00">10:00</option>
											<option value="11:00">11:00</option>
											<option value="12:00">12:00</option>
											<option value="13:00">13:00</option>
											<option value="14:00">14:00</option>
											<option value="15:00">15:00</option>
											<option value="16:00">16:00</option>
											<option value="17:00">17:00</option>
											<option value="18:00">18:00</option>
											<option value="19:00">19:00</option>
											<option value="20:00">20:00</option>
											<option value="21:00">21:00</option>
											<option value="22:00">22:00</option>
											<option value="23:00">23:00</option>
										</select>
									</p>
									<p>
										<input type="text" id="fechaElegir2" size="20" name="fechaElegir2" class="fecha" required/>
										<select name="horaInicio2" id="horaInicio2" size="1">
											<option value="0:00">0:00</option>
											<option value="1:00">1:00</option>
											<option value="2:00">2:00</option>
											<option value="3:00">3:00</option>
											<option value="4:00">4:00</option>
											<option value="5:00">5:00</option>
											<option value="6:00">6:00</option>
											<option value="7:00">7:00</option>
											<option value="8:00">8:00</option>
											<option value="9:00">9:00</option>
											<option value="10:00">10:00</option>
											<option value="11:00">11:00</option>
											<option value="12:00">12:00</option>
											<option value="13:00">13:00</option>
											<option value="14:00">14:00</option>
											<option value="15:00">15:00</option>
											<option value="16:00">16:00</option>
											<option value="17:00">17:00</option>
											<option value="18:00">18:00</option>
											<option value="19:00">19:00</option>
											<option value="20:00">20:00</option>
											<option value="21:00">21:00</option>
											<option value="22:00">22:00</option>
											<option value="23:00">23:00</option>
										</select>
										<select name="horaFin2" id="horaFin2" size="1">
											<option value="0:00">0:00</option>
											<option value="1:00">1:00</option>
											<option value="2:00">2:00</option>
											<option value="3:00">3:00</option>
											<option value="4:00">4:00</option>
											<option value="5:00">5:00</option>
											<option value="6:00">6:00</option>
											<option value="7:00">7:00</option>
											<option value="8:00">8:00</option>
											<option value="9:00">9:00</option>
											<option value="10:00">10:00</option>
											<option value="11:00">11:00</option>
											<option value="12:00">12:00</option>
											<option value="13:00">13:00</option>
											<option value="14:00">14:00</option>
											<option value="15:00">15:00</option>
											<option value="16:00">16:00</option>
											<option value="17:00">17:00</option>
											<option value="18:00">18:00</option>
											<option value="19:00">19:00</option>
											<option value="20:00">20:00</option>
											<option value="21:00">21:00</option>
											<option value="22:00">22:00</option>
											<option value="23:00">23:00</option>
										</select>
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
								<textarea name="your_textarea" id="your_textarea" rows="4" cols="50">
								</textarea>
								<script>
									$('#participantes').on('change',function(){
										var test = this;
										$('#your_textarea').val(function(_,v){
											return v + test.value;
										})
									})
								</script>
							</fieldset>
							<button type="button" onclick="loadSeleccionFechas()">Anterior</button>
							<button type="submit">Siguiente</button>
						</form>
						<script>
							$( "#seleccionInvitadosForm" ).submit(function(event) {
							console.log( JSON.stringify($( this ).serializeArray() ));
							event.preventDefault();
							if(document.getElementById("participantes").length >=2) {
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
							}
							else alert("Necesitas al menos 2 invitados");
							});
						</script>
					</div>
				  
					<!--Div de Distribucion herramientas para invitados-->
					<div id="distribucionAInvitados" hidden>
						<p> Soy distribucionAInvitados</p>
						<script type="text/javascript">
						<!--
							var votos = new Array();
		
							function mostrarNumVotos() {
								var seleccionado = document.getElementById("participantesDist").selectedIndex;
								var refPos = document.getElementById("numPos");
								var refNeg = document.getElementById("numNeg");
								var refVetos = document.getElementById("numVetos");
			
								if(seleccionado != null) {
									if( typeof(votos[seleccionado]) == 'undefined' )
										votos[seleccionado] = {positivos:1, negativos:1, vetos:0};
				
									refPos.disabled = false;
									refNeg.disabled = false;
									refVetos.disabled = false;
									refPos.value = votos[seleccionado].positivos;
									refNeg.value = votos[seleccionado].negativos;
									refVetos.value = votos[seleccionado].vetos;
								}
								else {
									refPos.disabled = true;
									refNeg.disabled = true;
									refVetos.disabled = true;
									refPos.value = "-";
									refNeg.value = "-";
									refVetos.value = "-";
								}
							}
		
							function modificarNumPos() {
								var seleccionado = document.getElementById("participantesDist").selectedIndex;
								var nuevoNumVotos = parseInt( document.getElementById("numPos").value );
			
								if(nuevoNumVotos >= 1)
									votos[seleccionado].positivos = nuevoNumVotos;
							}
		
							function modificarNumNeg() {
								var seleccionado = document.getElementById("participantesDist").selectedIndex;
								var nuevoNumVotos = parseInt( document.getElementById("numNeg").value );
			
								if(nuevoNumVotos >= 1)
									votos[seleccionado].negativos = nuevoNumVotos;
							}
		
							function modificarNumVetos() {
								var seleccionado = document.getElementById("participantesDist").selectedIndex;
								var nuevoNumVotos = parseInt( document.getElementById("numVetos").value );
			
								if(nuevoNumVotos >= 0)
									votos[seleccionado].vetos = nuevoNumVotos;
							}
		
							function incrementa(tipoVoto) {
								var seleccionado = document.getElementById("participantesDist").selectedIndex;
			
								switch(tipoVoto) {
									case 1: document.getElementById("numPos").value = ++votos[seleccionado].positivos;
											break;
									case 2: document.getElementById("numNeg").value = ++votos[seleccionado].negativos;
											break;
									case 3: document.getElementById("numVetos").value = ++votos[seleccionado].vetos;
											break;
								}
							}
		
							function decrementa(tipoVoto) {
								var seleccionado = document.getElementById("participantesDist").selectedIndex;
			
								switch(tipoVoto) {
									case 1: document.getElementById("numPos").value = votos[seleccionado].positivos - 1 < 1 ? 1 : --votos[seleccionado].positivos;
											break;
									case 2: document.getElementById("numNeg").value = votos[seleccionado].negativos - 1 < 1 ? 1 : --votos[seleccionado].negativos;
											break;
									case 3: document.getElementById("numVetos").value = votos[seleccionado].vetos - 1 < 0 ? 0 : --votos[seleccionado].vetos;
											break;
								}
							}
						// -->
						</script>
						<form id="distribucionAInvitadosForm" action="javascript:alert( 'successOMG!' );">
							<fieldset>
								<label for="listaInvitados">Invitados: </label>
								<select name="participantesDist" id="participantesDist" multiple="multiple" size="3" onchange="mostrarNumVotos()">
								</select>
								<br /><br />
								<label for="numPos">Votos positivos (+): </label>
								<button type="button" onclick="decrementa(1)">-</button>
								<input type="text" id="numPos" name="numPos" size="1" value="-" onchange="modificarNumPos()" disabled />
								<button type="button" onclick="incrementa(1)">+</button>
								<br />
								<label for="numNeg">Votos negativos (-): </label>
								<button type="button" onclick="decrementa(2)">-</button>
								<input type="text" id="numNeg" name="numNeg" size="1" value="-" onchange="modificarNumNeg()" disabled />
								<button type="button" onclick="incrementa(2)">+</button>
								<br />
								<label for="numVetos">Vetos(x): </label>
								<button type="button" onclick="decrementa(3)">-</button>
								<input type="text" id="numVetos" name="numVetos" size="1" value="-" onchange="modificarNumVetos()" disabled />
								<button type="button" onclick="incrementa(3)">+</button>
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
