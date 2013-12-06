<?php
session_start();
$testing = 1;

//Parte magica que agrega lo del post a la sesion
for($i=0;$i<count($_POST['myData']);$i++){ 
$_SESSION[$_POST['myData'][$i]["name"]]=$_POST['myData'][$i]["value"];
}



/*
ESTA VARIABLE INDICA SI ALGO SE CUMPLIO SATISFACTORIAMENTE
0 = TODO BIEN
CUALQUIER OTRA COSA ES QUE ALGO SALIO MAL!
*/
$_SESSION["respuesta"] = 0;

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
$_SESSION["emailCreador"] = get_random_string("abcdefghijklmnopqrstuvwxyz", 5)."@yopmail.com"; //nombre de la junta
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
											1 => get_random_string("abcdefghijklmnopqrstuvwxyz", 5)."@yopmail.com",
											2 => get_random_string("abcdefghijklmnopqrstuvwxyz", 5)."@yopmail.com",
											3 => get_random_string("abcdefghijklmnopqrstuvwxyz", 5)."@yopmail.com",
											4 => get_random_string("abcdefghijklmnopqrstuvwxyz", 5)."@yopmail.com"
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
									
									
									$_SESSION['juntaActiva'] = 1;
 echo "<br/>"; 
echo "SESSION IS BEING OVERWRITTEN RIGHT NOW WITHIN SAVEINSESSION";
 echo "<br/>"; 
echo "SESSION IS BEING OVERWRITTEN RIGHT NOW WITHIN SAVEINSESSION";
 echo "<br/>"; 
echo "SESSION IS BEING OVERWRITTEN RIGHT NOW WITHIN SAVEINSESSION";

echo "<pre>";
print_r($_SESSION);
echo "</pre>";

for($i=0;$i<count($_POST['myData']);$i++){ 
$_SESSION[$_POST['myData'][$i]["name"]]=$_POST['myData'][$i]["value"];
}



}

switch ($_SESSION["accion"]) {
    case 0:
        echo "none";
        break;
    case 1:
    	/*
    	craerJunta es el que mas cosas requiere
    	$_SESSION['nombreJunta'] = nombre de la junta
    	$_SESSION['emailCreador'] = creador de la junta (su email)
    	$_SESSION['cierreVotacion']; //2012-12
    	$horaDeCierre = $_SESSION['horaCierreVotacion']; //19:56
    	$_SESSION['descripcionJunta']
    	
    	
    	$_SESSION["opcionesDeHorario"] = las opciones que selecciono, vean el dummy data en la seccion de testing
    	$_SESSION["opcionesDeInvitados"] = la lista que incluye al creador de la junta y todos sus invitados
    	$_SESSION["votosDeInvitados"]; = la lista con todos los invitados y los puntos
    	*/
        crearJunta();
        break;
    case 2:
    	/*No lo usan ustedes, yo lo uso para enviar los correos con los hashes*/
        sendEMail('test@lethedwellers.com', "This is the default message");
        break;
	case 3:
	/*
	$_SESSION["sessionHash"] = hash que se envia en el enlace que mande. Necesitan hacer un php que lea el hash y lo guarde aqui. 
	Por el momento si quieren ver hashes, los toman directamente de base de datos
	*/
        loadSession();
        break;
        case 4:
        /*
        necesita $_SESSION['usuarioActivo'] que se obtiene de loadSession
        */	
        cargarOpciones();
        break;
        case 5:
       	/*
       	TIENEN QUE EJECUTAR ESTE POR CADA UNO DE LOS SLOTS DE LA JUNTA. ES NECESARIO QUE HABLEN VARIAS VEES, 
       	NECESITAN MODIFICAR TIMESLOTAVOTAR Y VOTOS ASIGNADOS EN CADA ITERACION
       	
       	$_SESSION['usuarioActivo']; = se obtiene de loadSession
	$_SESSION['timeSlotAVotar']; = se obtiene de la llamada
	$_SESSION['juntaActiva']; = se obtiene de loadSession
	$_SESSION['votosAsignados']; = se obtiene de la llamada
        */
        votarJunta();
        break;
        case 6:
        /*
        TIENEN QUE EJECUTAR ESTE POR CADA UNO DE LOS SLOTS DE LA JUNTA a VETAR!. ES NECESARIO QUE HABLEN VARIAS VECES, 
       	NECESITAN MODIFICAR TIMESLOTAVOTAR
	$_SESSION['usuarioActivo']; = se obtiene de loadSession
	$_SESSION['timeSlotAVotar'];  
	$_SESSION['juntaActiva']; = se obtiene de loadSession
        */
        vetarTimeSlot();
        break;
        case 7:
         /*
        TIENEN QUE EJECUTAR ESTE POR CADA UNO DE LOS SLOTS DE LA JUNTA a VETAR!. ES NECESARIO QUE HABLEN VARIAS VECES, 
       	NECESITAN MODIFICAR TIMESLOTAVOTAR
	$_SESSION['usuarioActivo']; = se obtiene de loadSession
	$_SESSION['timeSlotAVotar'];  
	$_SESSION['juntaActiva']; = se obtiene de loadSession
        */
        quitarVeto();
        break;
        //UNUSED
        case 8:
        echo "UNUSED";
        break;
        case 9:
        echo "UNUSED";
        break;
        case 10:
        echo "UNUSED";
        break;
        
}

function echo1($var = 'default'){ 
   echo "one <br/>"; 
   echo "<br/>"; 
} 


function crearJunta(){ 

	$nombreDeJunta = filter_var($_SESSION['nombreJunta'], FILTER_SANITIZE_SPECIAL_CHARS); 
	$emailDelCreador = filter_var($_SESSION['emailCreador'], FILTER_SANITIZE_EMAIL); //FILTER_SANITIZE_EMAIL
	$fechaDeCierre = $_SESSION['cierreVotacion']; //2012-12-23
	$horaDeCierre = $_SESSION['horaCierreVotacion']; //19:56
	$descipcionDeJunta = filter_var($_SESSION['descripcionJunta'], FILTER_SANITIZE_SPECIAL_CHARS); //blablabla
	
	
	$fechaDeCierre = $fechaDeCierre . " " . $horaDeCierre;
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
	$hash = hash('sha256', $key . $value . $idJunta );
	$query = "UPDATE  `lethedw2_aMeet`.`asistente` SET  `hash` =  '" . $hash . "' WHERE  `asistente`.`idasistente` = " . $key . " AND  `asistente`.`junta_idjunta` =". $idJunta . " ;
";
if (!$mysqli->query($query)) {
    echo "Falló la insercion de la tabla: (" . $mysqli->errno . ") " . $mysqli->error;
    echo "<br/>";
}


$to      = $value;
$message = 'Hey, here is your new activeMetting link! '  . "http://lethedwellers.com/aMeeting/formaUsuario.php?session=". $hash;
sendEMail($value, $message);

//bool mysqli::close ( void );
}

}
function sendEMail($who, $what)
{
	/*
	
	require_once "Mail.php";

$from = '<from.gmail.com>';
$to = $who;
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
        'password' => 'this password shall remain secretalso'
    ));

$mail = $smtp->send($to, $headers, $body);

if (PEAR::isError($mail)) {
    echo('<p>' . $mail->getMessage() . '</p>');
} else {
    echo('<p>Message successfully sent!</p>');
}
// */
$f = fopen("correos.txt", "a"); 
fwrite($f,  date('Y-m-d H:i:s') . "Correo No enviado. Mail sending apagado El mensaje esta a continuacion: " . $who . "####" . $what . "\n"); 
fclose($f); 
}

function loadSession()
{
	
$hash = $_SESSION["sessionHash"];
//CONEXION	
$mysqli = new mysqli('localhost', 'lethedw2_aMeet', 'pesViS7g', "lethedw2_aMeet");
if ($mysqli->connect_errno) {
    echo "Falló la conexión con MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}	
	
	
$query = "SELECT   *  FROM `asistente` WHERE `hash` like '" . $hash . "';";
$result = $mysqli->query($query);
//echo "%%%%%%%%";
//echo $query;
//echo "<br/>";
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
//printf ($row['idasistente'], $row['junta_idjunta']);
//printf ($row['junta_idjunta']);
$_SESSION['usuarioActivo'] = $row['idasistente'] ;
$_SESSION['juntaActiva'] = $row['junta_idjunta'];
$_SESSION['nombreActivo'] = $row['email'];

//bool mysqli::close ( void )
}

function cargarOpciones()
{
	//CONEXION	
$mysqli = new mysqli('localhost', 'lethedw2_aMeet', 'pesViS7g', "lethedw2_aMeet");
if ($mysqli->connect_errno) {
    echo "Falló la conexión con MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}


//cargar las opciones de la junta para display
$timeslotsActivos = array();
//$query = "SELECT  *  FROM `timeslot` WHERE `junta_idjunta` like '" . $_SESSION['juntaActiva'] . "';";

/*
//ESTE TRAE LOS QUE TENGAN VETO
SELECT TI.idtimeslot, TI.tiempoInicio, TI.tiempoFin, VO.modifier
FROM  `timeslot`  `TI` ,  `vote`  `VO` ,  `veto`  `VE` 
WHERE TI.idtimeslot = VO.timeslot_idtimeslot
AND TI.idtimeslot = VE.timeslot_idtimeslot
AND VO.timeslot_idtimeslot = VE.timeslot_idtimeslot
AND TI.junta_idjunta = VO.timeslot_junta_idjunta
AND TI.junta_idjunta = VE.timeslot_junta_idjunta
AND VO.timeslot_junta_idjunta = VE.timeslot_junta_idjunta
AND TI.junta_idjunta like '" . $_SESSION['juntaActiva'] . "'

//ESTE TRAE TODOS
SELECT TI.idtimeslot, TI.tiempoInicio, TI.tiempoFin, VO.modifier
FROM  `timeslot`  `TI` ,  `vote`  `VO`
WHERE TI.idtimeslot = VO.timeslot_idtimeslot
AND TI.junta_idjunta = VO.timeslot_junta_idjunta
*/
$query = "SELECT TI.idtimeslot, TI.tiempoInicio, TI.tiempoFin, VO.modifier, (SELECT COUNT( * ) AS vetado
FROM  `timeslot`  `TIC` ,  `vote`  `VOC` ,  `veto`  `VEC` 
WHERE TIC.idtimeslot = VOC.timeslot_idtimeslot
AND TIC.idtimeslot = VEC.timeslot_idtimeslot
AND VOC.timeslot_idtimeslot = VEC.timeslot_idtimeslot
AND TIC.junta_idjunta = VOC.timeslot_junta_idjunta
AND TIC.junta_idjunta = VEC.timeslot_junta_idjunta
AND VOC.timeslot_junta_idjunta = VEC.timeslot_junta_idjunta
AND TI.idtimeslot = TIC.idtimeslot) as vetado,
(SELECT SUM( modifier ) AS votosTotales
FROM  `vote`  `VOT` 
WHERE VOT.timeslot_idtimeslot = VO.timeslot_idtimeslot) as votosTotales
FROM  `timeslot`  `TI` ,  `vote`  `VO`
WHERE TI.idtimeslot = VO.timeslot_idtimeslot
AND TI.junta_idjunta = VO.timeslot_junta_idjunta
AND VO.asistente_idasistente = '".$_SESSION['usuarioActivo'] . "';";
//necesito agregar la junta? 
$result = $mysqli->query($query);

$counter = 0;
while($row = $result->fetch_array())
{


$timeslotsActivos[$counter] = array( 'idTimeslot' => $row['idtimeslot'],
					'tiempoInicio' => $row['tiempoInicio'],
					'tiempoFin' => $row['tiempoFin'],
					'votosHechosPorUsuario' => $row['modifier'],
					'votosTotales' => $row['votosTotales'],
					'vetado' => $row['vetado']
	);


$counter = $counter +1;
}
//echo "<pre>";
//print_r($timeslotsActivos);
//echo "</pre>";
$_SESSION['timeslotsCargados'] = $timeslotsActivos;
}


//necesita ser llamada por cada uno de los timeslots desde el frontent
function votarJunta()
{
$asistente = $_SESSION['usuarioActivo'];
$timeslot = $_SESSION['timeSlotAVotar'];
$junta = $_SESSION['juntaActiva'];
$modificador = $_SESSION['votosAsignados'];

	//CONEXION	
$mysqli = new mysqli('localhost', 'lethedw2_aMeet', 'pesViS7g', "lethedw2_aMeet");
if ($mysqli->connect_errno) {
    echo "Falló la conexión con MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    $_SESSION["respuesta"] = 1;
}	


$query = "";

	$query = "INSERT INTO  `lethedw2_aMeet`.`vote` (
`asistente_idasistente` ,
`timeslot_idtimeslot` ,
`timeslot_junta_idjunta` ,
`modifier`
)
VALUES (
'".$asistente."',  '".$timeslot."',  '".$junta."',  '".$modificador."'
)
ON DUPLICATE KEY UPDATE 
`modifier` = ". $modificador ."
;";
if (!$mysqli->query($query)) {
    echo "Falló la insercion de la tabla: (" . $mysqli->errno . ") " . $mysqli->error;
    echo "<br/>";
    $_SESSION["respuesta"] = 1;
}

$_SESSION["respuesta"] = 0;


}

function vetarTimeSlot($asistente, $timeslot, $junta)
{
$asistente = $_SESSION['usuarioActivo'];
$timeslot = $_SESSION['timeSlotAVotar'];
$junta = $_SESSION['juntaActiva'];
//$modificador = $_SESSION['votosAsignados'];
	//CONEXION	
$mysqli = new mysqli('localhost', 'lethedw2_aMeet', 'pesViS7g', "lethedw2_aMeet");
if ($mysqli->connect_errno) {
    echo "Falló la conexión con MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}	

$query = "INSERT INTO  `lethedw2_aMeet`.`veto` (
`asistente_idasistente` ,
`timeslot_idtimeslot` ,
`timeslot_junta_idjunta`
)
VALUES (
'".$asistente."',  '".$timeslot."',  '".$junta."'
);";
//priemro generamos la junta
if (!$mysqli->query($query)) {
    echo "Falló la insercion de la tabla: (" . $mysqli->errno . ") " . $mysqli->error;
    $_SESSION["respuesta"] = 1;
}
//guardamos el id
$_SESSION["respuesta"] = 0;
}

function quitarVeto($asistente, $timeslot, $junta)
{
$asistente = $_SESSION['usuarioActivo'];
$timeslot = $_SESSION['timeSlotAVotar'];
$junta = $_SESSION['juntaActiva'];
	//CONEXION	
$mysqli = new mysqli('localhost', 'lethedw2_aMeet', 'pesViS7g', "lethedw2_aMeet");
if ($mysqli->connect_errno) {
    echo "Falló la conexión con MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}	

$query = " DELETE FROM `lethedw2_aMeet`.`veto` WHERE `veto`.`asistente_idasistente` = ".$asistente." AND 
 `veto`.`timeslot_idtimeslot` = ".$timeslot." AND
 `veto`.`timeslot_junta_idjunta`= ".$junta.";";
//priemro generamos la junta
if (!$mysqli->query($query)) {
    echo "Falló el borrado de la tabla: (" . $mysqli->errno . ") " . $mysqli->error;
    $_SESSION["respuesta"] = 1;
}
//guardamos el id
$_SESSION["respuesta"] = 0;
}


?>
