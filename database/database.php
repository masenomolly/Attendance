<?php
// LOCAL DEVELOPMENT
    $host = '127.0.0.1';

    $db= 'attedance_db';


    $user='root';
    $pass ='';
    $charset= 'utf8mb4';

    //REMOTE DATABASE CONNECTION
    // $host = 'remotemysql.com';

    // $db= '2SAU0pxmFM';


    // $user='2SAU0pxmFM';
    // $pass ='k7EnFkwp2y';
    // $charset= 'utf8mb4';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

    try{  
        $pdo = new PDO($dsn,$user,$pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      
    } catch(PDOException $e){
        throw new PDOException($e->getMessage());
    };
    


    include 'crud.php';
    include 'users.php';
    $crud = new  crud($pdo);
    $users = new  user($pdo);
    
    // $users->insertuseradmin("admin","password");

?>