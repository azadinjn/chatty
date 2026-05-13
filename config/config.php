<?php

try{
    $chatty = new PDO(
        "mysql:host=localhost;dbname=chatty",
        "root",
        ""
    );

    $chatty->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION
    );

}catch(PDOException $e){

    die($e->getMessage());

}
?>