<?php


    // die($_POST['message']);


    //include
    require 'config.php';


    //pridat zaznam
    $affected = $database->delete('items',
        ['id' => $_POST['id']]
    );

    //uspech
    if ($affected){
        header("Location: $base_url/index.php");
        die();

    }
