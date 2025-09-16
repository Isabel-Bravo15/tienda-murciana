<?php
// config.php - SQLite configuration
// Este archivo debe permanecer en wwwroot y carga la base de datos SQLite.

$db_file = __DIR__ . '/ctf.db';
if (!file_exists($db_file)) {
    die("DB no encontrada. Contacta con el admin.");
}
try {
    $pdo = new PDO('sqlite:' . $db_file);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    die("Error DB: " . $e->getMessage());
}
?>
