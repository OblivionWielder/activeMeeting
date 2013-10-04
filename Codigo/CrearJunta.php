<!DOCTYPE html>
<html>
<body>

<script type="text/javascript" language="javascript">
	<!--
		function agregarPartic()
		{
			var listaParticipantes = document.getElementById("participantes"); // Obtener la referencia del select
			var inputEmail = document.getElementById("emailParticipante"); // Obtener la referencia del mail que se recibe como input
			
			if(inputEmail.value != "")
			{
				/* Validar que el inputEmail sea una email valido */
				/* Validar que el email que se trata de agregar no exista en la lista de participantes */
				
				var email = document.createElement("option"); // Crear un option nuevo
				email.text = inputEmail.value; // Asignarle de value al option el string del mail a agregar
				listaParticipantes.add(email, null); // Agregar el option al final de la lista
				
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
			listaParticipantes.remove(listaParticipantes.selectedIndex);
		}

	// -->
</script>

<form id="crearJunta" name="crearJunta" method="post" action="Procesar.php">
	<label for="nombreJunta">Nombre de la junta: </label>
	<input type="text" id="nombreJunta" name="nombreJunta" />
	<br /><br />
	<label for="fechaCorte">Fecha de corte de votaci&oacuten: </label>
	<input type="date" id="fechaCorte" name="fechaCorte" />
	<br /><br />
	<label for="emailOrganizador">Correo electr&oacutenico: </label>
	<input type="email" name="emailOrganizador" id="emailOrganizador" />
	<br /><br />
	[Confirmaci&oacuten de correo electr&oacutenico:]
	<br /><br />
	<label for="Descripcion">Descripci&oacuten: </label> <br />
	<textarea id="descripcion" name="descripcion" cols="30" rows="3" value=""></textarea>
	<br /><br />
	<label for="emailParticipante">Correo electr&oacutenico del participante: </label>
	<input type="email" name="emailParticipante" id="emailParticipante" />
	<input type="button" name="agregarParticipante" id="agregarParticipante" value="Agregar participante" onclick="agregarPartic()" />
	<br /><br />
	<select name="participantes" id="participantes" multiple="multiple" size="3"></select>
	<input type="button" name="eliminarParticipante" id="eliminarParticipante" value="Eliminar participante" onclick="eliminarPartic()" />
	<br /><br />
	<label for="numPos">Votos para apoyar bloque (+): </label>
	<input type="text" id="numPos" name="numPos" size="1" />
	<br />
	<label for="numNeg">Votos para debilitar bloque (-): </label>
	<input type="text" id="numNeg" name="numNeg" size="1" />
	<br />
	<label for="numVetos">Vetos(x): </label>
	<input type="text" id="numVetos" name="numVetos" size="1"/>
	<br /><br />
	[Propuestas de horarios]
	<br /><br />
	
	<input type="submit" value="Crear junta" />
</form>


</body>
</html>