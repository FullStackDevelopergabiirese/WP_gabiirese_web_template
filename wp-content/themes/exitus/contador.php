<?php
// Ruta del archivo donde guardaremos los clics
$file = __DIR__ . '/clicks.json';

// Si el archivo no existe, creamos uno con contador 0
if (!file_exists($file)) {
    file_put_contents($file, json_encode(['clicks' => 0]));
}

// Leemos el contenido actual
$data = json_decode(file_get_contents($file), true);

// Si llega una petición POST (desde el botón)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data['clicks']++;
    file_put_contents($file, json_encode($data));
    echo $data['clicks'];
    exit;
}

// Si se llama por GET, devolvemos el total actual
echo $data['clicks'];
