<?php

require __DIR__ . '/../vendor/autoload.php';

$app = new Silex\Application();

$app->get('/', function () {
	return "Hello World";
});

$app->get('/hello/{name}', function ($name) {
	return "Hello " . ucfirst($name) . "!";
});


$app->run();
