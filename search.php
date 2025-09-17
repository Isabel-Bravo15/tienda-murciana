<?php
// search.php - Código intencionalmente vulnerable para CTF.
// NO usar en producción.

$q = isset($_GET['q']) ? $_GET['q'] : '';

// Simular búsqueda en un archivo
$file = 'products.txt';
$content = file_get_contents($file);
$lines = explode("\n", $content);

echo "<h2>Resultados para: " . htmlentities($q) . "</h2>";
echo "<ul>";
foreach ($lines as $line) {
    if (stripos($line, $q) !== false) {
        echo "<li>" . htmlentities($line) . "</li>";
    }
}
echo "</ul>";
?>
