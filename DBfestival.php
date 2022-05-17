<?php
//database van de festival
$host="localhost";
$dbname="dancefestival";
$user="root";
$password="";

try{
    $conn = new PDO("mysql:host=$host;dbname=$dbname" ,$user, $password);
    }catch(PDOException $ex){
        echo "verbinding mislukt .</br>";
    }


?>