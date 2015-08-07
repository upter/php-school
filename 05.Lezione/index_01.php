<?php

// Se usiamo l'altro tipo di caricamento e di settaggio vedremo il debug degli errori
//require __DIR__ . '/app/bootstrap.php';
require __DIR__ . '/app/bootstrap_sample_01.php';

$app->get('/', function() {

	echo "Ciao"; // facendo appositamente un errore... per mostrare il debug!
	// la funzione deve avere una Risposta e nella funzione anonima necessita il comando Return
	
	//return new Response('Ciao', 201); CORRETTA
	// return "Ciao"; CORRETTA
})->bind('homepage');

$app->run();
