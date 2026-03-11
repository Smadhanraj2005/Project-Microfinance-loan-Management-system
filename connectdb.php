<?php 

try{

    $pdo = new PDO('mysql:host=localhost;charset=utf8;dbname=astha_db','root','');
   
    //echo 'Connection Successfull';

}catch(PDOException $f){

    echo $f->getmessage();

}
try {
    // Connect to astha_db (which exists according to your SQL dump)
    $pdo = new PDO('mysql:host=localhost;charset=utf8;dbname=astha_db', 'root', '');
    
    // Set PDO attributes for error handling
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    
    //echo 'Connection Successful';
} catch(PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}


?>