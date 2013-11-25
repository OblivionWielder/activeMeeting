<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="EN" lang="EN" dir="ltr">
	<head profile="http://gmpg.org/xfn/11">
		<title>Active Meeting :: Generar junta</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<meta http-equiv="imagetoolbar" content="no" />
		<link rel="stylesheet" href="template/styles/layout.css" type="text/css" />
		<script type="text/javascript" src="template/scripts/jquery-1.4.1.min.js"></script>
		<script type="text/javascript"></script>
		<script type="text/javascript">
			function hideEveryone()
			{
				$("#votacionJunta").hide();
				$("#votacionTerminada").hide();
			}

			function loadVotacionJunta()
			{
				$("#votacionJunta").show();
				$("#votacionTerminada").hide();
			}
			function loadVotacionTerminada()
			{
				$("#votacionJunta").hide();
				$("#votacionTerminada").show();
			}
		</script>
	</head>
	
	<body onload="loadVotacionJunta()">
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
	
		<!--Div de votacion de junta-->
		<div class="wrapper col3">
			<div id="container">
				<div id="content">
					<h3>Votacion de Junta</h3>
					<div id="creacionJunta" hidden>
						<p>Soy votacionJunta</p>
						<!--<form id="votaJuntaForm" method="post">-->
						<form id="votaJuntaForm" action="javascript:alert( 'successOMG!' );">
						  <fieldset>
							<label for="fechaJunta">Fecha: </label>
							<input type="text" name="fechaJunta1" id="fechaJunta1" />
							<label for="inicioJunta">Inicio: </label>
							<input type="text" name="inicioJunta1" id="inicioJunta1" />
							<label for="finJunta">Fin: </label>
							<input type="text" name="finJunta1" id="finJunta1" />
							
							<label for="votPos"> + </label>
							<input type="text" name="votPos1" id="votPos1" />
							<label for="votNeg"> - </label>
							<input type="text" name="votNeg1" id="votNeg1" />
							<label for="votVetos"> X </label>
							<input type="text" name="votVetos1" id="votVetos1" />
						  </fieldset>
						  <button type="submit" onchange="loadVotacionTerminada">Votar</button>
						<!--<input type="submit" id="creacionJuntaFormButton" name="Submit" value="Siguiente (Fechas)" />-->
						</form>
					</div>
					
					<!--Div de Cierre de votos-->
					<div id="votacionTerminada" hidden>
						<p>Soy votacionTerminada</p>
						<button type="button" onclick="hideEveryone()">OK</button>
					</div>
				<br class="clear" />
				</div>
			</div>
		</div>
	</body>
</html>