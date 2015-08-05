<?php

$my_arr = array(3, 5, 13, 8); // un normale array
$my_arr = ['pinguino', 3, 'finestra', 'mela', 8]; // un normale array secondo php >= 5.3

$myarr[] = "valore"; // inserito un valore in un array per stampare usare: $myarr[0]

// Array più complessi

$my_complex_array = array(
	"chiave" => 'Valore',
	"una-chiave-a-caso" => 13,
	15
);

var_dump($my_complex_array); // mostra un array scomposto con tutti le sue coppie di chiave-valore
