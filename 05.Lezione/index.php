<?php

require __DIR__ . '/../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$app = new Silex\Application();

$app->get('/', function () {
	return "Hello World";
});

$app->get('/hello/{name}', function ($name) {
	return "Hello " . ucfirst($name) . "!";
});

// Esempio di Post

$app->match('/form', function(Request $request) {

	$own_response = '<form method="POST">Saluta:<br /><input type="text" name="nome_saluto" /><br /><input type="submit" value="Saluta!"></form>';
	
	if ($request->get('nome_saluto')) {
		$own_response = '<h1>Hello ' . $request->get('nome_saluto') . '</h1>';
	}
	
	return new Response($own_response, 201);
	return ;
});


$app->run();
