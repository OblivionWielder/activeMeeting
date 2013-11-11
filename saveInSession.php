<?php

/**
* @author mofugeek
* @copyright 2012
*/
/* $objeto = "";
for($i = 0; $i < count($_POST['myData']); ++$i) {
	if($_POST['myData'][i]["name"]="nombreJunta")
		$objeto = $_POST['myData'][i]["value"];
}*/

//if (isset($_POST['myData'][0]["name"])) {
//    //echo "This var is set so I will print.";
//    if($_POST['myData'][0]["name"] == "nombreJunta")
//    {
//    	session_destroy();
//    	session_start();
 //   }
//}
//else
//{
session_start();
echo "<pre>";
print_r($_SESSION);
echo "</pre>";
//}
//echo $_SESSION;
for($i=0;$i<count($_POST['myData']);$i++){ 
//	$output = $output.$_POST['myData'][$i]["name"]; //con esto obtienes el nombre del campo
//	$output = $output.$_POST['myData'][$i]["value"]; //con esto obtienes el nombre del campo
//session_start();
// store session data
$_SESSION[$_POST['myData'][$i]["name"]]=$_POST['myData'][$i]["value"];
}
$output = '';

foreach ($_SESSION as $key=>$val)
$output = $output . $key. ": ".$val. "<br>";
//$output = print_r($_POST['myData'], true); 
//$output = print_r($objeto."", true);
file_put_contents('file2.txt', $output);

switch ($_SESSION["action"]) {
    case 0:
        echo "none";
        break;
    case 1:
        crearJunta();
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
echo $_SESSION['nombreJunta'];
echo 'segunda Seccion';
	$nombreDeJunta = filter_var($_SESSION['nombreJunta'], FILTER_SANITIZE_STRING); 
	$emailDelCreador = $_SESSION['emailCreador']; 
	$fechaDeCierre = $_SESSION['cierreVotacion']; 
	$horaDeCierre = $_SESSION['horaCierreVotacion']; 
	$descipcionDeJunta = $_SESSION['descripcionJunta']; 
	echo $nombreDeJunta;
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
