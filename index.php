<?php

// Turn on error reporting -- this is critical!
ini_set('display_errors',1);
error_reporting(E_ALL);

//Require autoload file
require("vendor/autoload.php");
require_once ("model/validate-functions.php");

//start session
session_start();

//Instantiate F3
$f3 = Base::Instance();

$db = new Database();
//Instantiate controller object
$controller = new Controller($f3);

$f3->set('colors', array('pink', 'green', 'blue'));
$f3->set('DEBUG', 3);


//Define a default route
$f3->route("GET /", function (){
    echo "<h1>My Pets</h1>";
    echo "<a href='order'>Order a Pet</a>";
});

$f3->route("GET /@animal", function($f3, $params) {
    $animal = $params['animal'];
    switch ($animal) {
        case 'chicken':
            echo "Cluck!";
            break;
        case 'dog':
            echo "Woof!";
            break;
        case 'cat':
            echo "Meow!";
            break;
        case 'horse':
            echo "Nay!";
            break;
        case 'cow':
            echo "Moo!";
            break;
        default:
            $f3->error(404);
    }
});

$f3->route("GET|POST /order", function($f3) {
    $_SESSION = array();
    if(isset($_POST['animal'])) {
        $animal = $_POST['animal'];
        if(validString($animal)) {
            switch (strtolower($animal)) {
                case 'cat':
                    $animal = new Cat($animal);
                    break;
                case 'dog':
                    $animal = new Dog($animal);
                    break;
                case 'bird':
                    $animal = new Bird($animal);
                    break;
                default:
                    $animal = new Pet($animal);
            }
            $_SESSION['animal'] = $animal;
            $f3->reroute('/order2');
        } else {
            $f3->set("errors['animal']", "Please enter an animal.");
        }
    }
    $GLOBALS['controller']->order();
});

$f3->route("GET|POST /order2", function($f3) {
    if(isset($_POST['name']) && $_POST['name'] != "") {
        $name = $_POST['name'];
        $_SESSION['animal']->setName($name);
        if (isset($_POST['color'])) {
            $color = $_POST['color'];
            if (validColor($color)) {
                $_SESSION['animal']->setColor($color);
                $f3->reroute('/results');
            } else {
                $f3->set("errors['color']", "Please select a color.");
            }
        }
    }
    $GLOBALS['controller']->order2();
});

$f3->route("GET|POST /results", function() {
    $GLOBALS['controller']->result();
});

//Define a view route
$f3->route("GET /view", function (){
    $GLOBALS['controller']->petDetail();
});

//Run f3
$f3->run();