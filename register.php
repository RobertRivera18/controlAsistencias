<?php
require("conexion.php");
session_start();

if (!isset($_SESSION['idusuario'])) {
    header("Location:index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capturar y limpiar los datos del formulario
    $nombreEmpleado = mysqli_real_escape_string($conexion, $_POST['employeeName']);
    $horaEntrada = $_POST['entryTime'];
    $horaSalida = $_POST['exitTime'];

    // Validar que los datos no estén vacíos
    if (empty($nombreEmpleado) || empty($horaEntrada) || empty($horaSalida)) {
        echo "<script>
            alert('Por favor complete todos los campos del formulario');
        </script>";
    } else {
        // Validar que la hora de salida no sea menor que la hora de entrada
        $entradaTimestamp = strtotime($horaEntrada);
        $salidaTimestamp = strtotime($horaSalida);

        if ($salidaTimestamp < $entradaTimestamp) {
            echo "<script>
                    alert('La hora de salida no puede ser anterior a la hora de entrada.');
                </script>";
        } else {
            // Consulta SQL para insertar la asistencia del empleado
            $sql = "INSERT INTO asistencia (nombre_empleado, hora_entrada, hora_salida) VALUES ('$nombreEmpleado', '$horaEntrada', '$horaSalida')";
            echo "<script>
            alert('Registro de asistencia Agregada');
        </script>";

            if (mysqli_query($conexion, $sql)) {
                // Limpiar los valores de los campos del formulario
                $nombreEmpleado = '';
                $horaEntrada = '';
                $horaSalida = '';
                // Consulta SQL para obtener la lista actualizada de asistencia
                $result = mysqli_query($conexion, "SELECT * FROM asistencia");

                // Crear la tabla HTML con los registros de asistencia
                $table = "<table border='1'>
                            <tr>
                                <th>Nombre del Empleado</th>
                                <th>Hora de Entrada</th>
                                <th>Hora de Salida</th>
                            </tr>";
                while ($row = mysqli_fetch_array($result)) {
                    $table .= "<tr>";
                    $table .= "<td>" . $row['nombre_empleado'] . "</td>";
                    $table .= "<td>" . $row['hora_entrada'] . "</td>";
                    $table .= "<td>" . $row['hora_salida'] . "</td>";
                    $table .= "</tr>";
                }
                $table .= "</table>";

                // Devolver la tabla como respuesta AJAX
                echo $table;
            } else {
                echo "<script>
                    alert('Error al registrar la Asistencia');
                </script>";
            }
        }
    }
}
