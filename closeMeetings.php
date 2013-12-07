<?php
//this page shall be used to close and delete and send 
//CONEXION	
$mysqli = new mysqli('localhost', 'lethedw2_aMeet', 'pesViS7g', "lethedw2_aMeet");
if ($mysqli->connect_errno) {
    echo "Falló la conexión con MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}


$query = "SELECT * 
FROM  `junta` 
WHERE  `finalVotacion` < NOW( )";
$result = $mysqli->query($query);
while($row = $result->fetch_array())
{
	//Estos son las juntas que ya caducaron
	$idJuntaCaduca = $row['idjunta'];
	$query2 = "SELECT SUM( modifier ), timeslot_idtimeslot AS votosTotales
FROM  `vote`  `VOT` 
WHERE VOT.timeslot_junta_idjunta = '". idJuntaCaduca ."' AND
(SELECT COUNT(*) FROM  `veto`  `VET` WHERE timeslot_junta_idjunta = '". idJuntaCaduca ."') = 0
ORDER BY votosTotales DESC
LIMIT 1;";
	$result2 = $mysqli->query($query2);
	$row2 = $result2->fetch_array();
	$timeSlotGanador = $row2['timeslot_idtimeslot'];
	
	//obtenemos los tiempos para poner en el correo
	$query2 = "SELECT  `tiempoInicio` ,  `tiempoFin` 
FROM  `timeslot` 
WHERE  `idtimeslot` = '". timeSlotGanador ."'
AND  `junta_idjunta` = '". idJuntaCaduca ."';";
$result2 = $mysqli->query($query2);
	$row2 = $result2->fetch_array();
	$inicio = $row2['tiempoInicio'];
	$fin = $row2['tiempoFin'];
	
	//YA TENEMOS LA JUNTA Y EL TIMESLOT GANADOR
	//AHORA NECESITAMOS A LOS PARTICIPANTES
	$query2 = "SELECT  `email` 
FROM  `asistente` 
WHERE  `junta_idjunta` = " . $idJuntaCaduca;
$result2 = $mysqli->query($query2);
while($row2 = $result2->fetch_array())
{
	$email = $row2['email'];
	//creamos el mensaje
	$mensaje = "Hola, ". $email . " tu junta ha sido programada para iniciar en " . $inicio . " y terminar en ". $fin . ". Ten un excelente dia!";
	sendEmail($email, $mensaje);
}
	

	
	
	$query = "DELETE FROM `junta` WHERE `idjunta` = " . $idJuntaCaduca;
$result = $mysqli->query($query);
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
?>
