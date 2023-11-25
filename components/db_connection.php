

<?php 

$hostname = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "be20_cr5_animal_adoption_barnomamadzhanova"; 


$connect = new mysqli($hostname, $username, $password, $dbname);


// if(!$connect) {
//    die( "Error" . mysqli_connect_error() );
// }