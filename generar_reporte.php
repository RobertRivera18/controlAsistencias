<?php
// Conexión a la base de datos
require_once("conexion.php");

// Consulta para obtener los registros de asistencia
$sql = "SELECT * FROM asistencia";
$resultado = $conexion->query($sql);

// Verifica si hay resultados
if ($resultado->num_rows > 0) {
    // Incluye la librería TCPDF
    require_once('library/tcpdf.php');

    // Crea una nueva instancia de TCPDF
    $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);

    // Establece el título del documento
    $pdf->SetTitle('Reporte de Asistencia Semanal');

    // Agrega una página
    $pdf->AddPage();

    // Contenido del reporte
    $content = '<h1>Reporte de Asistencia</h1>';
    $content .= '<table border="1">';
    $content .= '<tr><th>ID</th><th>Nombre Empleado</th><th>Hora Entrada</th><th>Fecha de Salida</th><th>Fecha Registro</th></tr>';

    while ($fila = $resultado->fetch_assoc()) {
        $content .= '<tr>';
        $content .= '<td>' . $fila['idasistencia'] . '</td>';
        $content .= '<td>' . $fila['nombre_empleado'] . '</td>';
        $content .= '<td>' . $fila['hora_entrada'] . '</td>';
        $content .= '<td>' . $fila['hora_salida'] . '</td>';
        $content .= '<td>' . $fila['fecha_registro'] . '</td>';
        $content .= '</tr>';
    }

    $content .= '</table>';

    // Agrega el contenido al PDF
    $pdf->writeHTML($content, true, false, true, false, '');

    // Nombre del archivo de salida
    $filename = 'reporte_asistencia_' . date('Y-m-d_H-i-s') . '.pdf';

    // Descarga el archivo PDF
    $pdf->Output($filename, 'D');
} else {
    echo "No hay registros de asistencia para generar el reporte.";
}

// Cierra la conexión a la base de datos
$conexion->close();
?>
