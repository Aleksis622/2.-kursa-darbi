<?php


$host = "localhost";  //hostname aka mūsu lokais serveris         
$dbname = "upload";    //datubāzes nosaukums         
$username = "root";    //noklusējuma mamp user ir root     
$password = "root";    //noklusējuma mamp parole ir root  

//PDO konnekcija jeb connections
try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password); 
// Izveidoam PDO instansi iekļaujot
//      *Databāzes stilu
//      *Host (localhost)
//      *Datubāzes nosaukums
//      *Character=utf8


    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
  //Atļauj jeb izmet errorus ja tādi vispār ir

    //echo "Database connected successfully!<br>";  
//ja konnecija izdevusies parādam šo ziņojumu
} catch (PDOException $e) {   
//uztver error message ja ir kļūdas

    die("Database connection failed: " . $e->getMessage()); 
//ja connection is dead tad parādam šo ziņojumu
}