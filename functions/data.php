<?php 

function getPDO(){

$host = 'localhost';
$dbname = 'ky_ticketing';
$user = 'root';
$password = '';


    try{
        $data =  new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
        return $data;
    }
    catch(PDOException $err){
        echo "Erreur de connexion : " . $err->getMessage();
        var_dump($err);
        throw $err;

    }
    
 }


?>