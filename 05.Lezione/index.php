<?php

require __DIR__ . '/../vendor/autoload.php';

// L'utilizzo di altri Componenti
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

// Avviamo l'applicazione
$app = new Silex\Application();

// Creazione dell'Hompage
$app->get('/', function () {
	return "Hello World";
});

$app->get('/hello/{name}', function ($name) {
	return "Hello " . ucfirst($name) . "!";
})->bind('saluti');

// Esempio di Post

$app->match('/form', function(Request $request) {

	$own_response = '<form method="POST">Saluta:<br /><input type="text" name="nome_saluto" /><br /><input type="submit" value="Saluta!"></form>';
	
	if ($request->get('nome_saluto')) {
		$own_response = '<h1>Hello ' . $request->get('nome_saluto') . '</h1>';
	}
	
	return new Response($own_response, 201);
	
})->bind('nostro_form');


$app->run();
