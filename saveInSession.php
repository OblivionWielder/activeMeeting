<?php
session_start();
$testing = 1;


for($i=0;$i<count($_POST['myData']);$i++){ 
$_SESSION[$_POST['myData'][$i]["name"]]=$_POST['myData'][$i]["value"];
}
$output = '';
if($testing == 0)
{
echo "<pre>";
print_r($_SESSION);
echo "</pre>";
}

///TESTING Methods///
function get_random_string($valid_chars, $length)
{
    // start with an empty random string
    $random_string = "";

    // count the number of chars in the valid chars string so we know how many choices we have
    $num_valid_chars = strlen($valid_chars);

    // repeat the steps until we've created a string of the right length
    for ($i = 0; $i < $length; $i++)
    {
        // pick a random number from 1 up to the number of valid chars
        $random_pick = mt_rand(1, $num_valid_chars);

        // take the random character out of the string of valid chars
        // subtract 1 from $random_pick because strings are indexed starting at 0, and we started picking at 1
        $random_char = $valid_chars[$random_pick-1];

        // add the randomly-chosen char onto the end of our string so far
        $random_string .= $random_char;
    }

    // return our finished random string
    return $random_string;
}

function randomDate($start_date, $end_date)
{
    // Convert to timetamps
    $min = strtotime($start_date);
    $max = strtotime($end_date);

    // Generate random number using above bounds
    $val = rand($min, $max);

    // Convert back to desired date format
    return date('Y-m-d H:i:s', $val);
}

function randomDay($start_date, $end_date)
{
    // Convert to timetamps
    $min = strtotime($start_date);
    $max = strtotime($end_date);

    // Generate random number using above bounds
    $val = rand($min, $max);

    // Convert back to desired date format
    return date('Y-m-d', $val);
}
function randomTime($start_date, $end_date)
{
    // Convert to timetamps
    $min = strtotime($start_date);
    $max = strtotime($end_date);

    // Generate random number using above bounds
    $val = rand($min, $max);

    // Convert back to desired date format
    return date('H:i:s', $val);
}
//echo randomDay("1970-01-01 01:01","2013-12-30 23:30");
//echo "<br />";
$uno = randomTime("01:01","23:30");
$dos = date('H:i:s', strtotime($uno) + 1800);


function getUno()
{
	return $uno = randomTime("01:01","23:30");
}

function getDos()
{
	return $dos = randomTime($uno,"23:30");
}

if($testing)
{
echo "SESSION IS BEING OVERWRITTEN RIGHT NOW WITHIN SAVEINSESSION";
 echo "<br/>"; 
echo "SESSION IS BEING OVERWRITTEN RIGHT NOW WITHIN SAVEINSESSION";
 echo "<br/>"; 
echo "SESSION IS BEING OVERWRITTEN RIGHT NOW WITHIN SAVEINSESSION";

//primera seccion - detalles de la 
$_SESSION["accion"] = 1;
$_SESSION["nombreJunta"] = get_random_string("abcdefghijklmnopqrstuvwxyz", 5); //nombre de la junta
$_SESSION["emailCreador"] = get_random_string("abcdefghijklmnopqrstuvwxyz", 5)."@lethedwellers.com"; //nombre de la junta
$_SESSION["fechaDeCierre"] = randomDate("2013-11-01 01:01","2013-12-30 23:30");
$_SESSION["descripcionJunta"] = get_random_string("abcdefghijklmnopqrstuvwxyz", 50); //nombre de la junta

//segunda seccion - detalles de diferentes horas de eleccion
$_SESSION["opcionesDeHorario"] = array(	0 => array(	"fecha" 	=> randomDay("2013-11-15 01:01","2013-12-30 23:30"),
													"horaInicio"=> getUno(),
													"horaFin"	=> getDos()),
										1 => array(	"fecha" 	=> randomDay("2013-11-15 01:01","2013-12-30 23:30"),
													"horaInicio"=> getUno(),
													"horaFin"	=> getDos()),
										2 => array(	"fecha" 	=> randomDay("2013-11-15 01:01","2013-12-30 23:30"),
													"horaInicio"=> getUno(),
													"horaFin"	=> getDos()),
										3 => array(	"fecha" 	=> randomDay("2013-11-15 01:01","2013-12-30 23:30"),
													"horaInicio"=> getUno(),
													"horaFin"	=> getDos())
										);

//tercera seccion - detalles de diferentes invitados
$_SESSION["opcionesDeInvitados"] = array(	0 => $_SESSION["emailCreador"],
											1 => get_random_string("abcdefghijklmnopqrstuvwxyz", 5)."@lethedwellers.com",
											2 => get_random_string("abcdefghijklmnopqrstuvwxyz", 5)."@lethedwellers.com",
											3 => get_random_string("abcdefghijklmnopqrstuvwxyz", 5)."@lethedwellers.com",
											4 => get_random_string("abcdefghijklmnopqrstuvwxyz", 5)."@lethedwellers.com"
										);

//cuarta seccion - detalles de  invitados y votos
$_SESSION["votosDeInvitados"] = array(	0 => 	array(	"invitado" 	=>	$_SESSION["opcionesDeInvitados"][0],
														"positivos"	=>	get_random_string("0123456789", 2),
														"negativos"	=>	get_random_string("0123456789", 2),
														"vetos"		=>	get_random_string("0123456789", 1)),
										1 => 	array(	"invitado" 	=>	$_SESSION["opcionesDeInvitados"][1],
														"positivos"	=>	get_random_string("0123456789", 2),
														"negativos"	=>	get_random_string("0123456789", 2),
														"vetos"		=>	get_random_string("0123456789", 1)),
										2 => 	array(	"invitado" 	=>	$_SESSION["opcionesDeInvitados"][2],
														"positivos"	=>	get_random_string("0123456789", 2),
														"negativos"	=>	get_random_string("0123456789", 2),
														"vetos"		=>	get_random_string("0123456789", 1)),
										3 => 	array(	"invitado" 	=>	$_SESSION["opcionesDeInvitados"][3],
														"positivos"	=>	get_random_string("0123456789", 2),
														"negativos"	=>	get_random_string("0123456789", 2),
														"vetos"		=>	get_random_string("0123456789", 1)),
										4 => 	array(	"invitado" 	=>	$_SESSION["opcionesDeInvitados"][4],
														"positivos"	=>	get_random_string("0123456789", 2),
														"negativos"	=>	get_random_string("0123456789", 2),
														"vetos"		=>	get_random_string("0123456789", 1))
									);
 echo "<br/>"; 
echo "SESSION IS BEING OVERWRITTEN RIGHT NOW WITHIN SAVEINSESSION";
 echo "<br/>"; 
echo "SESSION IS BEING OVERWRITTEN RIGHT NOW WITHIN SAVEINSESSION";
 echo "<br/>"; 
echo "SESSION IS BEING OVERWRITTEN RIGHT NOW WITHIN SAVEINSESSION";

echo "<pre>";
print_r($_SESSION);
echo "</pre>";
}

switch ($_SESSION["accion"]) {
    case 0:
        echo "none";
        break;
    case 1:
        crearJunta('something');
        break;
    case 2:
        echo1();
        break;
}

function echo1($var = 'default'){ 
   echo "one <br/>"; 
   echo "<br/>"; 
} 


function crearJunta($id = 'default'){ 

	$nombreDeJunta = filter_var($_SESSION['nombreJunta'], FILTER_SANITIZE_SPECIAL_CHARS); 
	$emailDelCreador = filter_var($_SESSION['emailCreador'], FILTER_SANITIZE_EMAIL); //FILTER_SANITIZE_EMAIL
	$fechaDeCierre = $_SESSION['cierreVotacion']; //2012-12-23
	$horaDeCierre = $_SESSION['horaCierreVotacion']; //19:56
	$descipcionDeJunta = filter_var($_SESSION['descripcionJunta'], FILTER_SANITIZE_SPECIAL_CHARS); //blablabla
	//variable de la segunda pantalla
	/*
	Tenemos que revisar:
	1. QUe la fecha exista
	2, Que las horas existan
	3. QUe la hora maxima sea 23.59.59
	4. QUe la hora minima sea 0.0.1
	5. QUe el inicio sea menor al final
	*/
	$horariosSeleccionados = $_SESSION["opcionesDeHorario"]; //sobre este habra nombres de numero
	//sobre cada opcion que nos venga, asignamos 3 campos: fecha, horaInicial y horaFinal.
	//variable de la tercera pantalla
	/*
	Tenemos que verificar que:
	1. Haya dos invitados o mas
	2. Uno de los invitados tiene que ser el creador de la Junta
	3. Los correos tienen que ser correctos en forma
	4. No es posible eliminar el creador
	*/
	$listaDeInvitados = $_SESSION["opcionesDeInvitados"]; 
	//variable de la distribucion de puntos
	/*
	Usamos listaDeInvitados como llaves
	podemos usar luego eso con array(0 => 'zero_a', 2 => 'two_a', 3 => 'three_a'); para asignar votos positivos,
	negativos y vetos
	*/
	$pointDistribution = $_SESSION["votosDeInvitados"];
//CONEXION	
$mysqli = new mysqli('localhost', 'lethedw2_aMeet', 'pesViS7g', "lethedw2_aMeet");
if ($mysqli->connect_errno) {
    echo "Falló la conexión con MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

$query = "INSERT INTO  `lethedw2_aMeet`.`junta` (`idjunta` ,`nombre` ,`descripcion` ,`finalVotacion`)
VALUES (NULL ,  '".$_SESSION['nombreJunta']."',  '".$_SESSION['descripcionJunta']."',  '".$_SESSION['fechaDeCierre']."');";
//priemro generamos la junta
if (!$mysqli->query($query)) {
    echo "Falló la insercion de la tabla: (" . $mysqli->errno . ") " . $mysqli->error;
}
//guardamos el id
$idJunta = $mysqli->insert_id;

//despues agregamos a los asistentes a la junta

$query = "";
$invitadoAndID = array();
foreach ($_SESSION["opcionesDeInvitados"] as &$valor) {
	$query = "INSERT INTO `lethedw2_aMeet`.`asistente` (`idasistente` ,`email` ,`passcode` ,`nombre` ,`junta_idjunta`) VALUES (NULL, '" . $valor . "', NULL, NULL, '" . $idJunta . "');";
if (!$mysqli->query($query)) {
    echo "Falló la insercion de la tabla: (" . $mysqli->errno . ") " . $mysqli->error;
    echo "<br/>";
}
//printf ("Nuevo registro con el id %d.\n", $mysqli->insert_id);

//guardamos sus ids
$invitadoAndID[$mysqli->insert_id] = $valor; 
    
}

/*
echo "<br/>";
echo "%%%%%%%%%% <pre>";
print_r($invitadoAndID);
echo "</pre>"; 
*/

/*
despues agregamos al owner a la junta
*/
$query = "";
$first_key = key($invitadoAndID); // First Element's Key
$query = "INSERT INTO `lethedw2_aMeet`.`owner` (`junta_idjunta`, `asistente_idasistente`) VALUES ('" .
$idJunta . "', '". $first_key ."')";
if (!$mysqli->query($query)) {
    echo "Falló la insercion de la tabla: (" . $mysqli->errno . ") " . $mysqli->error;
    echo "<br/>";
}
/*
despues asignamos los persmisos de los asistentes
*/
$query = "";
foreach ($_SESSION["votosDeInvitados"] as &$valor) {
	$query = "INSERT INTO `lethedw2_aMeet`.`tools` (`asistente_idasistente`, `junta_idjunta`, `votesPlus`, `votesMinus`, `vetos`)
VALUES (" . 
"(SELECT  `idasistente` 
FROM  `asistente` 
WHERE  `email` LIKE '" .$valor['invitado']. "')". ", '" . $idJunta ."', '" . $valor['positivos']  ."', '" . $valor['negativos']  ."', '" . $valor['vetos']  . "');";
//echo $query . "<br/>";
if (!$mysqli->query($query)) {
    echo "Falló la insercion de la tabla: (" . $mysqli->errno . ") " . $mysqli->error;
    echo "<br/>";
}
}
/*
despues agregamos los timeslots a la junta
*/
$query = "";
foreach ($_SESSION["opcionesDeHorario"] as &$valor) {
	$query = "INSERT INTO `lethedw2_aMeet`.`timeslot` (`idtimeslot`, `tiempoInicio`, `tiempoFin`, `junta_idjunta`) 
	VALUES (NULL, '" . $valor['fecha'] . " " . $valor['horaInicio'] . "', '" . $valor['fecha'] . " " . $valor['horaFin'] . "', '". $idJunta  ."');";
if (!$mysqli->query($query)) {
    echo "Falló la insercion de la tabla: (" . $mysqli->errno . ") " . $mysqli->error;
    echo "<br/>";
}
}
/*
por ultimo generamos los enlaces con un hash del idDeUsuario, emailDeUsuario, idDeJunta	
	procedemos a crear los hashes que serviran para setear a los usuarios
	esto se hace con hash('ripemd160', 'The quick brown fox jumped over the lazy dog.');
	*/
$query = "";
foreach ($invitadoAndID as $key => $value){
	$query = "UPDATE  `lethedw2_aMeet`.`asistente` SET  `hash` =  '" . $hash = hash('sha256', $key . $value . $idJunta ) . "' WHERE  `asistente`.`idasistente` = " . $key . " AND  `asistente`.`junta_idjunta` =". $idJunta . " ;
";
if (!$mysqli->query($query)) {
    echo "Falló la insercion de la tabla: (" . $mysqli->errno . ") " . $mysqli->error;
    echo "<br/>";
}


$to      = $value;
$message = 'Hey, here is your new activeMetting link!' . "http://lethedwellers.com/aMeeting/loadSession.php?session=". $hash;
sendEMail($value, $message);
}

}
function sendEMail($who, $what)
{
	require_once "Mail.php";

$from = '<from.gmail.com>';
$to = '<to.gmail.com>';
$subject = 'Your new activation link';
$body = $what;

$headers = array(
    'From' => $from,
    'To' => $who,
    'Subject' => $subject
);

$smtp = Mail::factory('smtp', array(
        'host' => 'ssl://smtp.gmail.com',
        'port' => '465',
        'auth' => true,
        'username' => 'sendemail@lethedwellers.com',
        'password' => 'this password shall remain secret'
    ));

$mail = $smtp->send($to, $headers, $body);

if (PEAR::isError($mail)) {
    echo('<p>' . $mail->getMessage() . '</p>');
} else {
    echo('<p>Message successfully sent!</p>');
}
}
?>
