<?php
session_start();
$testing = 0;


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
//This module was for outputing into a file to see results
//foreach ($_SESSION as $key=>$val)
//$output = $output . $key. ": ".$val. "<br>";
//file_put_contents('file2.txt', $output);






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
	return $dos = date('H:i:s', strtotime($uno) + 1800);
}

//echo $uno."%%%".$dos;




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
$_SESSION["fechaDeCierre"] = randomDate("1970-01-01 01:01","2013-12-30 23:30");
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
        echo2();
        break;
}

function echo1($var = 'default'){ 
   echo "one <br/>"; 
   echo "<br/>"; 
} 

function echo2($var = 'default'){ 
   echo "two <br/>"; 
   echo "<br/>"; 
} 

function echo3($var = 'default'){ 
   echo "three <br/>"; 
   echo "<br/>"; 
} 

function crearJunta($id = 'default'){ 
	
	//variables de la primera pantalla
	echo "PRIMER SECCION";
	//FILTER_SANITIZE_FULL_SPECIAL_CHARS

	$nombreDeJunta = filter_var($_SESSION['nombreJunta'], FILTER_SANITIZE_SPECIAL_CHARS); 
	$emailDelCreador = filter_var($_SESSION['emailCreador'], FILTER_SANITIZE_EMAIL); //FILTER_SANITIZE_EMAIL
	$fechaDeCierre = $_SESSION['cierreVotacion']; //2012-12-23
	$horaDeCierre = $_SESSION['horaCierreVotacion']; //19:56
	//$dateSrc = '2007-04-19 12:50 GMT'; 
   // $dateTime = new DateTime($fechaDeCierre." ".$horaDeCierre); 
	$descipcionDeJunta = filter_var($_SESSION['descripcionJunta'], FILTER_SANITIZE_SPECIAL_CHARS); //blablabla
	//variable de la segunda pantalla
	/*
	Tenemos que revisar:
	1. QUe la fecha exista
	2, Que las horas existan
	3. QUe la hora maxima sea 23.59.59
	4. QUe la hora minima sea 0.0.1
	5. QUe el inicio sea menor al final
	
	
	forma
	[0]
		[fecha]
		[inicio]
		[final]
	[1]
		[fecha]
		[inicio]
		[final]
	*/

	$horariosSeleccionados = array(); //sobre este habra nombres de numero
	//sobre cada opcion que nos venga, asignamos 3 campos: fecha, horaInicial y horaFinal.
	
	
	//variable de la tercera pantalla
	/*
	Tenemos que verificar que:
	1. Haya dos invitados o mas
	2. Uno de los invitados tiene que ser el creador de la Junta
	3. Los correos tienen que ser correctos en forma
	4. No es posible eliminar el creador
	*/
	$listaDeInvitados = array(); 
	
	
	
	//variable de la distribucion de puntos
	/*
	Usamos listaDeInvitados como llaves
	podemos usar luego eso con array(0 => 'zero_a', 2 => 'two_a', 3 => 'three_a'); para asignar votos positivos,
	negativos y vetos
	*/
	$pointDistribution = array();
	
	
	/* 
	primero creamos al asistente que es el duenio de la junta
	obtenemos su id y lo guardamos en una variable idasistente
	
	despues creamos la junta
	insert into junta nombre Descripcion finalvotacion
	finalvotacion es creado mediante la manipulacion de fecha y hora de lo que nos este llegando en fechaDECierre y hora de cierre
	obtemenos el id generado y lo guardamos en una varible llamada idjunta
	
	despues hacemos que ese asistente sea el owner de esa junta
	Insert into owner
	
	
	agregamos a los asistentes y obtenemos ese arreglo de ids y lo guardamos en invitados[]
	insert into asistente....

	ahora agregamos en tools a los invitados[] junto con idjunta y pointdiscribution
	insert into tools
	
	por ultimo creamos los timeslots usando la misma funcion para parsear la fecha y horariosSeleccionados
	insert into timeslot
	
	
	
	
	
	
	*********NECESITAMOS UNA TABLA QUE GUARDE UN HASH DE EL INVITADO CON LA JUNTA A LA QUE FUE INVITADA**************
	
	
	
	
	
	procedemos a crear los hashes que serviran para setear a los usuarios
	esto se hace con hash('ripemd160', 'The quick brown fox jumped over the lazy dog.');
	
	*/
	

} 

?>