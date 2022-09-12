<?php

//zobrazenie chýb
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


// Require Composer's autoloader.
require_once 'vendor/autoload.php';

//global variables
$base_url = 'http://localhost/todo_appka1';
// http://localhost/todo_appka1/edit.php?id=121


// Using Medoo namespace.
use Medoo\Medoo;

// Connect the database.
$database = new Medoo([
    'type' => 'mysql',
    'host' => 'localhost',
    'database' => 'todo_appka',
    'username' => 'root',
    'password' => 'root'
]);

// globalne funkcie
function show_404()
{
    header("HTTP/1.0 404 Not Found");
    include_once "404.php";
    die();
}

function get_item()
{
    //ak nie je ID alebo ID je prazdne
    if ( ! isset($_GET['id']) || empty($_GET['id']) )
    {
        return false;
    }

    global $database;

    $item = $database->get("items", "text", [
        "id" => $_GET['id']
    ]);

    if (! $item)
    {
        return false;
    }

    return $item;
}

function is_ajax()
{
    return (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&
        strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest');

}