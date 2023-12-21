<?php
$servername = "localhost";
$username = "id20925312_tupapidelasalsa";
$password = "oiu@IUY654";
$dbname = "id20925312_yapeos";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Manejar la inserción de datos desde el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validar que los campos obligatorios están presentes
    if (isset($_POST['monto'], $_POST['celular'], $_POST['nombre-pagador'], $_POST['numero-documento-pagador'], $_POST['numero-receptor'], $_POST['concepto'])) {

        // Obtener valores del formulario
        $monto = floatval($_POST['monto']);
        $celular = intval($_POST['celular']);
        $nombrecliente = $_POST['nombre-pagador'];
        $numeroDocumentoPagador = $_POST['numero-documento-pagador'];
        $numeroReceptor = $_POST['numero-receptor'];
        // Eliminar la siguiente línea que asigna el valor del campo 'nombre-receptor'
        //$nombreReceptor = $_POST['nombre-receptor'];
        $concepto = $_POST['concepto'];

        // Validar que los campos numéricos son válidos
        if (!is_numeric($monto) || !is_numeric($celular)) {
            echo "Error al insertar datos: Valores no válidos";
            exit;
        }

        // Establecer la zona horaria a "America/Lima"
        date_default_timezone_set('America/Lima');

        // Obtener la fecha y hora actual de Perú
        $fechaHoraPeru = date('Y-m-d H:i:s');

        // Preparar la consulta de inserción
        $sql = "INSERT INTO yapeadas (monto, celular, nombrecliente, dnicliente, numeroproveedor, concepto, hora, idcompra) 
                VALUES ('$monto', '$celular', '$nombrecliente', '$numeroDocumentoPagador', '$numeroReceptor', '$concepto', '$fechaHoraPeru', null)";
        
        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Datos insertados correctamente');</script>";
        } else {
            echo "<script>alert('Error al insertar datos: " . $conn->error . "');</script>";
        }
    } else {
        echo "<script>alert('Error al insertar datos: Campos obligatorios no presentes');</script>";
    }
}

$conn->close();
?>
