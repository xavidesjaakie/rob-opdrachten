<?php
session_start(); // Start de sessie

// *** Opdracht 6.1: Sessievariabele bijhouden hoe vaak de pagina is bezocht ***
if (!isset($_SESSION['page_visits'])) {
    $_SESSION['page_visits'] = 0; 
}
$_SESSION['page_visits']++; 

// *** Opdracht 6.2: Cookie bijhouden totaal aantal bezoeken ***
if (!isset($_COOKIE['total_visits'])) {
    setcookie('total_visits', 1, time() + 3600 * 24 * 30); 
    $total_visits = 1;
} else {
    $total_visits = $_COOKIE['total_visits'] + 1;
    setcookie('total_visits', $total_visits, time() + 3600 * 24 * 30); 
}

// *** Opdracht 6.3: Willekeurige postcode tonen ***
function genereerPostcode() {
    $deel1 = mt_rand(1000, 9999); 
    $deel2 = chr(mt_rand(65, 90)) . chr(mt_rand(65, 90)); 
    return $deel1 . " " . $deel2; 
}
$willekeurige_postcode = genereerPostcode();

// *** Opdracht 6.4: Functie voor oppervlakte en omtrek van een cirkel ***
function berekenCirkel($straal) {
    $pi = 3.14;

    $oppervlakte = $pi * pow($straal, 2); 
    $omtrek = 2 * $pi * $straal; 

    return [
        'oppervlakte' => $oppervlakte,
        'omtrek' => $omtrek,
    ];
}


$straal = 5;
$cirkel_resultaten = berekenCirkel($straal);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Opdrachten</title>
</head>
<body>
    <h1>PHP Opdrachten</h1>
    
    <h2>Opdracht 6.1: Bezoeken tijdens sessie</h2>
    <p>Je hebt deze pagina <strong><?= $_SESSION['page_visits'] ?></strong> keer bezocht tijdens deze sessie.</p>
    
    <h2>Opdracht 6.2: Totaal aantal bezoeken (cookie)</h2>
    <p>Je hebt deze pagina in totaal <strong><?= $total_visits ?></strong> keer bezocht (cookie).</p>
    
    <h2>Opdracht 6.3: Willekeurige postcode</h2>
    <p>De willekeurige postcode is: <strong><?= $willekeurige_postcode ?></strong></p>
    
    <h2>Opdracht 6.4: Oppervlakte en omtrek van een cirkel</h2>
    <p>Voor een cirkel met straal <strong><?= $straal ?></strong>:</p>
    <ul>
        <li>Oppervlakte: <strong><?= $cirkel_resultaten['oppervlakte'] ?></strong></li>
        <li>Omtrek: <strong><?= $cirkel_resultaten['omtrek'] ?></strong></li>
    </ul>
</body>
</html>
