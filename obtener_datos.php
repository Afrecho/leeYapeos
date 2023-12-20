<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$servername = "localhost";
$username = "id20925312_tupapidelasalsa";
$password = "oiu@IUY654";
$dbname = "id20925312_yapeos";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Ejecutar la consulta SQL para obtener datos de la base de datos
$sql = "SELECT * FROM yapeadas";
$result = $conn->query($sql);

// Verificar si se obtuvieron resultados
if ($result->num_rows > 0) {
    // Convertir los resultados a un array asociativo
    $data = [];
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    // Devolver los datos como JSON
    echo json_encode($data);
} else {
    echo "0 resultados";
}

// Cerrar la conexión
$conn->close();

?>
