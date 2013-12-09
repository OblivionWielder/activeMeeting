<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="EN" lang="EN" dir="ltr">
	<head profile="http://gmpg.org/xfn/11">
		<title>Active Meeting :: Generar junta</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<meta http-equiv="imagetoolbar" content="no" />
		<link rel="stylesheet" href="template/styles/layout.css" type="text/css" />
		<script type="text/javascript" src="template/scripts/jquery-1.4.1.min.js"></script>
		<!-- Codigo para el manejo del Datepicker -->
		<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
		<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.1/themes/smoothness/jquery-ui.css" />
		<script src="http://code.jquery.com/ui/1.9.1/jquery-ui.js"></script>
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
				for(var i=0; i<distPart.length; i++){
					if(document.getElementById("participantesDist")[i].value == document.getElementById("emailCreador").value)
						distPart.remove(i);
				}
				$("#creacionJunta").show();
				$("#seleccionFechas").hide();
				$("#seleccionInvitados").hide();
				$("#distribucionAInvitados").hide();
				$("#confirmacionInformacion").hide();
				$("#juntaCreada").hide();
			}
			function loadSeleccionFechas()
			{
				var fElige = document.getElementById("fElegir");
				for(var i=0; i<fElige.length; i++){
					fElige.remove(i);
				}
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
			
		<script>
			$(document).ready(function () {
				$("#cierreVotacion").datepicker({
					dateFormat: 'yy-mm-dd',
					minDate: 0,
					onSelect: function (date) {
						var date2 = $('#cierreVotacion').datepicker('getDate');
						date2.setDate(date2.getDate() + 1);
						$('.fecha2').datepicker('setDate', date2);
						//sets minDate to dt1 date + 1
						$('.fecha2').datepicker('option', 'minDate', date2);
					}
				});
				$('.fecha2').datepicker({
					dateFormat: 'yy-mm-dd',
					onClose: function () {
						var dt1 = $('#cierreVotacion').datepicker('getDate');
						console.log(dt1);
						var dt2 = $('.fecha2').datepicker('getDate');
						if (dt2 <= dt1) {
							var minDate = $('.fecha2').datepicker('option', 'minDate');
							$('.fecha2').datepicker('setDate', minDate);
						}
					}
				});
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
				<li><a href="formaBasica2.php">Crear Junta</a></li>
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
							function validateForm(){
								var x=document.forms["creacionJuntaForm"]["emailCreador"].value;
								var atpos=x.indexOf("@");
								var dotpos=x.lastIndexOf(".");
								if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
									alert("E-mail no valido");
									return false;
								}
							}
						</script>
						<!--<form id="creacionJuntaForm" method="post">-->
						<form id="creacionJuntaForm" action="javascript:alert( 'successOMG!' );" onsubmit="return validateForm();">
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
							<textarea name="descripcionJunta" id="descripcionJunta" rows="4" cols="50">
							</textarea>
						  </fieldset>
						 
							<button type="submit">Siguiente</button>
						<!--<input type="submit" id="creacionJuntaFormButton" name="Submit" value="Siguiente (Fechas)" />-->
						</form>
						<span></span>
						<script>
							$( "#creacionJuntaForm" ).submit(function(event) {
								
								console.log( JSON.stringify($( this ).serializeArray() ));
								event.preventDefault();
								
								//agregado para que pueda votar el creador
								var inputEmail = document.getElementById("emailCreador");
								var distPart = document.getElementById("participantesDist");
								var email = document.createElement("option");
								var x=inputEmail.value;
								var atpos=x.indexOf("@");
								var dotpos=x.lastIndexOf(".");
								
								if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
									alert("E-mail no valido");
									return false;
								}
								else {
									email.text = inputEmail.value;
									distPart.add(email, null);
								
									document.getElementById("nJunta").value = document.getElementById("nombreJunta").value;
									document.getElementById("eCreador").value = inputEmail.value;
									document.getElementById("cVotacion").value = document.getElementById("cierreVotacion").value 
									+', '+ document.getElementById("horaCierreVotacion").value;
									document.getElementById("dJunta").value = document.getElementById("descripcionJunta").value;
									
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
								}
							});
						</script>
					</div>

					<!--Div de Fechas-->
					<div id="seleccionFechas" hidden>
						<p> Soy seleccionFechas</p>
						<script type="text/javascript">
							var fechas = [];
							
							$(function() {
								var scntDiv = $('#fechas');
								var i = $('#fechas > p').size();			
								
								$('#borrafecha').on('click', function(){
									if(i>2){
										$("#fechas > p").last().remove();
										var indice = fechas.indexOf(fechas[i-1]);
										fechas.splice(indice,1);
										i--;
									}
									else
										alert("Debes tener al menos 2 fechas");
								});
								
								$('#agregafecha').on('click', function() {
									i++;
									$('<p><input type="text" id="fechaElegir' + i +'" size="20" name="fechaElegir' + i +'" class="fecha2" required/> '
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
										+'</select> '
										+'<select name="horaFin' + i +'" id="horaFin' + i +'" size="1">'
										+	'<option value="0:00">0:00</option>'
										+	'<option value="1:00" selected="selected">1:00</option>'
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
										+'</p>').appendTo(scntDiv);
										
									var indi = i - 1;
							
									fechas[indi] = {};	
									fechas[indi].fecha = document.getElementById("fechaElegir"+i).value; 
									fechas[indi].horaInicio = document.getElementById("horaInicio"+i).value;
									fechas[indi].horaFin = document.getElementById("horaFin"+i).value;
									
									$("#fechaElegir"+i).datepicker({ dateFormat: "yy-mm-dd" });
									var dti = $('.fecha2').datepicker('getDate');
									
									$("#fechaElegir"+i).datepicker('setDate', dti);
									var dtt2 = $('#cierreVotacion').datepicker('getDate');
									dtt2.setDate(dtt2.getDate() + 1);
									$("#fechaElegir"+i).datepicker('option', 'minDate', dtt2);
									
									//alert(document.getElementById("fechaElegir1").value);
									//alert(document.getElementById("fechaElegir3").value);
								
									return false;
								});
								
								fechas[0] = {};	
								fechas[0].fecha = document.getElementById("fechaElegir1").value; 
								fechas[0].horaInicio = document.getElementById("horaInicio1").value;
								fechas[0].horaFin = document.getElementById("horaFin1").value;
		
								fechas[1] = {};
								fechas[1].fecha = document.getElementById("fechaElegir2").value; 
								fechas[1].horaInicio = document.getElementById("horaInicio2").value;
								fechas[1].horaFin = document.getElementById("horaFin2").value;
								
							});
						</script>
						<form id="seleccionFechasForm">
							<fieldset>
								<b>Fechas a elegir:</b>
								<br /><br />
								<label for="fechaDeJunta">Fecha de junta</label> <label for="horaDeInicio">Hora de Inicio</label> <label for="HoraDeFin">Hora de Conclusi&oacute;n</label>
								<div id="fechas">
									<p>
										<input type="text" id="fechaElegir1" size="20" name="fechaElegir1" class="fecha2" required/>
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
											<option value="1:00" selected="selected">1:00</option>
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
										<input type="text" id="fechaElegir2" size="20" name="fechaElegir2" class="fecha2" required/>
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
											<option value="1:00" selected="selected">1:00</option>
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
								<button type="button" href="#" id="borrafecha">Borrar Fecha</button>
								<br />
							</fieldset>
							<input type ="hidden" value=0 id="accion" name ="accion"/>
							<button type="button" onclick="loadCreacionJunta()">Anterior</button>
							<button type="submit">Siguiente</button>
						</form>
						<script>
							$( "#seleccionFechasForm" ).submit(function(event) {
								//console.log( JSON.stringify($( this ).serializeArray() ));
								event.preventDefault();
								
								var fElige = document.getElementById("fElegir");
								
								var otraFechas = [];
								var cont = 1;
								for(var i=0; i < fechas.length; i++) {
									otraFechas[i] = {};
									otraFechas[i].fecha = document.getElementById("fechaElegir"+cont).value;
									otraFechas[i].horaInicio = document.getElementById("horaInicio"+cont).value;
									otraFechas[i].horaFin = document.getElementById("horaFin"+cont).value;
									cont++;
								}
								
								var pasa = true;
								var menor = true;
								for(var i=0; i<otraFechas.length; i++){
									for(var j=0; j<otraFechas.length; j++){
										if(i!=j){
											var st = otraFechas[i].horaInicio; 
											var et = otraFechas[i].horaFin;
											var st2 = otraFechas[j].horaInicio; 
											var et2 = otraFechas[j].horaFin;
											var f1 = otraFechas[i].fecha;
											var f2 = otraFechas[j].fecha;
											if(st==st2 && et==et2 && f1==f2){
												pasa=false;
											}
											if(parseInt(st.replace(':', ''), 10) >= parseInt(et.replace(':', ''), 10) 
											|| parseInt(st2.replace(':', ''), 10)>= parseInt(et2.replace(':', ''), 10)){
												menor=false;
											}
										}
									}
								}
								
								if(pasa){
									if(menor){
										for(var i=0; i<otraFechas.length; i++){
											var opcion = otraFechas[i].fecha+' de '+otraFechas[i].horaInicio+' a '+otraFechas[i].horaFin;
											var o = document.createElement("option");
											o.text = opcion;
											fElige.add(o, null);
										}
										console.log( JSON.stringify(otraFechas));
										//$.post( "saveInSession.php", { opcionesDeHorario : JSON.stringify(otraFechas)});
							
										$.ajax({
											type: "POST",
											dataType: "json",
											url: "saveInSession.php", 
											//data: {myData:JSON.stringify($( this ).serializeArray() )},
											data: {opcionesDeHorario:JSON.stringify(otraFechas) },
											success: function(data){
												alert('Llegue!');
											},
											error: function(e){
												console.log(e.message);
											}
										}); //*/
										loadSeleccionInvitados();
									}
									else
										alert("Hay una hora de inicio mayor que la hora de fin");
								}
								else
									alert("Horario identico prohibido.")
								
							});
						</script>
					</div>

					<!--Div de Invitados-->
					<div id="seleccionInvitados" hidden>
						<p> Soy seleccionInvitados</p>
						<script type="text/javascript">
						<!--
							/*function validateForm(){
								var x=document.forms["creacionJuntaForm"]["emailCreador"].value;
								var atpos=x.indexOf("@");
								var dotpos=x.lastIndexOf(".");
								if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
									alert("E-mail no valido");
									return false;
								}
							}*/
							
							function agregarPartic()
							{
								var listaParticipantes = document.getElementById("participantes"); // Obtener la referencia del select
								var distPart = document.getElementById("participantesDist"); // Lista para el siguiente div
								
								var inputEmail = document.getElementById("emailParticipante"); // Obtener la referencia del mail que se recibe como input
								
								var x=inputEmail.value;
								var atpos=x.indexOf("@");
								var dotpos=x.lastIndexOf(".");
								
								var esta;
								
								if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
									alert("E-mail no valido");
									return false;
								}
								else
								{
									/* Validar que el inputEmail sea una email valido */
									/* Validar que el email que se trata de agregar no exista en la lista de participantes */
									esta=optionExists(x, distPart);
									
									if(!esta){
										var email = document.createElement("option"); // Crear un option nuevo
										email.text = inputEmail.value; // Asignarle de value al option el string del mail a agregar
										var email2 = document.createElement("option"); // Crear un option nuevo
										email2.text = inputEmail.value; // Asignarle de value al option el string del mail a agregar
										listaParticipantes.add(email, null); // Agregar el option al final de la lista
										distPart.add(email2, null); // Agregar el option al final de la lista del otro div
										
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
									else{
										alert("E-mail repetido");
										return false;
									}
								}
							}

							function eliminarPartic()
							{
								var listaParticipantes = document.getElementById("participantes"); // Obtener la referencia del select
								var distPart = document.getElementById("participantesDist"); // Obtener referencia del select del div siguiente
								var seleccionado = listaParticipantes.selectedIndex;
								
								for(var i=0; i<distPart.length; i++){
									if(document.getElementById("participantesDist")[i].value == document.getElementById("participantes")[seleccionado].value)
										distPart.remove(i);
								}
								
								listaParticipantes.remove(seleccionado);
								
							}
							
							function optionExists ( needle, haystack ){
								var optionExists = false,
									optionsLength = haystack.length;

								while ( optionsLength-- ){
									if ( haystack.options[ optionsLength ].value === needle ){
										optionExists = true;
										break;
									}
								}
								return optionExists;
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
								var refInv = document.getElementById("participantesDist");
								var seleccionado = refInv.selectedIndex;
								var refPos = document.getElementById("numPos");
								var refNeg = document.getElementById("numNeg");
								var refVetos = document.getElementById("numVetos");
								
								if(seleccionado != null) {
									if( typeof(votos[seleccionado]) == 'undefined' )
										votos[seleccionado] = {invitado:refInv.value, positivos:1, negativos:1, vetos:0};
									
									refPos.disabled = false;
									refNeg.disabled = false;
									refVetos.disabled = false;
									refPos.value = votos[seleccionado].positivos;
									refNeg.value = votos[seleccionado].negativos;
									refVetos.value = votos[seleccionado].vetos;
								} else {
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
							<input type ="hidden" value=0 id="accion" name ="accion"/> 
							<button type="button" onclick="loadSeleccionInvitados()">Anterior</button>
							<button type="submit">Siguiente</button>
						</form>
						<script>
							$( "#distribucionAInvitadosForm" ).submit(function(event) {
							console.log( JSON.stringify($( this ).serializeArray() ));
							event.preventDefault();
							
							var invitadosO = [];
							
							var refInv = document.getElementById("participantesDist");
							var pasaI = true;
							
							for(var i=0; i<refInv.length; i++){
								if( typeof(votos[i]) == 'undefined' )
									pasaI=false;
							}
							
							if(!pasaI){
								alert("Recuerda asignar votos a todos los invitados");
							}
							else{
								var votoIn = document.getElementById("lVInvitados");
								for(var i=0; i<votos.length; i++){
									var opcion = votos[i].invitado+', +:'+votos[i].positivos+', -:'+votos[i].negativos+', X:'+votos[i].vetos;
									var o = document.createElement("option");
									o.text = opcion;
									votoIn.add(o, null);
								}
								
								for(var j=0; j<votos.length; j++){
									invitadosO[j] = votos[j].invitado;
								}
								
								$.post("saveInSession.php", { opcionesDeInvitados: JSON.stringify(invitadosO)});
								$.post("saveInSession.php", { votosDeInvitados: JSON.stringify(votos) });
								/*
								$.ajax({
									type: "POST",
									dataType: "json",
									url: "saveInSession.php",
								  data: {myData:JSON.stringify($( this ).serializeArray() )},
									//data: {myData:$( this ).serializeArray() },
									success: function(data){
										alert('Llegue!');
									},
									error: function(e){
										console.log(e.message);
									}
								});//*/
								loadConfirmacionInformacion();
							}
							});
						</script>
					</div>

					<!--Div de Confirmacion-->
					<div id="confirmacionInformacion" hidden>
						<p>Soy confirmacionInformacion</p>
						<form id="confirmacionInformacionForm">
							<fieldset>
								<label for="nJunta">Nombre De La Junta: </label>
								<input type="text" id="nJunta" name="nJunta" disabled />
								<label for="eCreador" style="margin-left:50px">Email: </label>
								<input type="text" id="eCreador" name="eCreador" disabled />
								<br />
								<label for="cVotacion">Fecha De Cierre De Votacion: </label>
								<input type="text" id="cVotacion" name="cVotacion" disabled />
								<br />
								<label for="dJunta">Descripcion: </label>
								<br />
								<textarea id="dJunta" name="dJunta" rows="4" cols="50" disabled>
								</textarea>
								<br />
								<label for="fElegir">Fechas a elegir: </label>
								<label for="lVInvitados" style="margin-left:100px">Votos Invitados: </label>
								<br />
								<select name="fElegir" id="fElegir" multiple="multiple" size="3" disabled>
								</select>
								<select name="lVInvitados" id="lVInvitados" multiple="multiple" size="3" style="margin-left:50px" disabled>
								</select>
								<br />
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
