<?php 
    try{
            $pdo = new PDO('mysql:dbname=bcdac1484402;host=mysql8.lwspanel.com;port=3306', 'bcdac1484402', 'zyq47qi2kr');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $e){
        echo 'Erreur : '. $e->getMessage();
    }
   