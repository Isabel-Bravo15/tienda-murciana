<?php
require_once('config.php');

$q = isset($_GET['q']) ? $_GET['q'] : '';

if ($q === '') {
    echo "<p>Introduce algo para buscar.</p>";
    exit;
}

// VULNERABLE: concatenación directa -> SQLi intencional para el reto
$sql = "SELECT id, name, description FROM products WHERE name LIKE '%$q%' LIMIT 20";

try {
    $stmt = $pdo->query($sql);
} catch (Exception $e) {
    echo "<h3>Error en la consulta:</h3><pre>" . htmlspecialchars($e->getMessage()) . "</pre>";
    exit;
}

echo "<h2>Resultados para: " . htmlspecialchars($q) . "</h2>";
echo "<ul>";
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "<li><b>" . htmlspecialchars($row['name']) . "</b>: " . htmlspecialchars($row['description']) . "</li>";
}
echo "</ul>";

// Añadimos un pequeño footer con enlace a la home
echo '<p><a href="index.php">Volver a Tienda Murciana</a></p>';
?>
