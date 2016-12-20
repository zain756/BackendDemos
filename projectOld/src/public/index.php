<?php
require '../Slim-1.6.7/Slim/Slim.php';
$app = new Slim();
$app->get('/hello/:name', 'hello');
function hello($name) {
    echo "Hello, $name!";
}
$app->run();




?>