<?php
// Configuración de la base de datos
$serverName = "localhost"; // Nombre del servidor
$connectionInfo = array("Database" => "tu_base_de_datos", "UID" => "tu_usuario", "PWD" => "tu_contraseña");

// Conexión a SQL Server
$conn = sqlsrv_connect($serverName, $connectionInfo);

if (!$conn) {
    die(print_r(sqlsrv_errors(), true));
}

// Consulta para obtener las películas
$sql = "SELECT * FROM Peliculas";
$stmt = sqlsrv_query($conn, $sql);

if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
}

$peliculas = array();

while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
    $peliculas[] = $row;
}

echo json_encode($peliculas);

// Cerrar la conexión
sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);
?>
