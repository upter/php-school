<?php

// Perché non lavorare anche coi numeri?

// Creiamo la nostra variabile ed usiamo gli interi
$mio_numero = 13;

$risultato = $mio_numero * 12;

echo "Ciao il risultato e' <b>" . $risultato . "</b><hr />";

$risultato = $mio_numero / 2;

echo "Ciao il risultato e' <b>" . $risultato . "</b><hr />";

$risultato = ceil($mio_numero / 2);

echo "Ciao il risultato arrotondato per eccesso e' <b>" . $risultato . "</b><hr />";

$risultato = round($mio_numero / 2, 0, PHP_ROUND_HALF_DOWN);

echo "Ciao il risultato arrotondato per difetto e' <b>" . $risultato . "</b><hr />";

// Stiamo usando la potenza di un intel i7 con 16Gb di Ram per fare ciò che farebbe una calcolatrice...
