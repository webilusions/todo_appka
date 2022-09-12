<?php


    // die($_POST['message']);


    //include
    require 'config.php';


    //pridat zaznam
    $affected = $database->update('items',
        ['text' => $_POST['message']],
        ['id' => $_POST['id']]
    );

    //uspech
    if ($affected){
        header("Location: $base_url/index.php");
        die();

    }
