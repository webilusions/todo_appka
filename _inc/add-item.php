<?php


    // die($_POST['message']);


    //include
    require 'config.php';


    //pridat zaznam
    $id = $database->insert('items', [
        'text' => $_POST['message']
    ]);

    //uspech
    if ( ! $id ) die('error');

    if (is_ajax())
    {

        $message = json_encode([
            'status' => 'success',
            'id' => $id
        ]);

        die( $message );
    }
    else
    {
        header("Location: $base_url/index.php");
        die();
    }
