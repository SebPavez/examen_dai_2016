<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    include ('includes/header.php');
    include ('../dao/SolicitudDaoImplementado.php');
    $fecha_desde = $_POST['fecha_desde'];
    $fecha_hasta = $_POST['fecha_hasta'];
    $solicitud = new SolicitudDaoImplementado();
    $resultado = $solicitud->listarPostulacionesPorRangoFecha($fecha_desde, $fecha_hasta);

    if (!empty($resultado)) {
        echo "<table border='1'>\n";
        echo "<tr><td>Rut</td>"
        . "<td>Nombre postulante</td>"
        . "<td>Estado</td>"
        . "<td>Acciones</td>"
        . "</tr>";
        foreach ($resultado as $item) {
            echo "<tr>\n";
            echo "    <td>";
            echo $item['rutPostulante'];
            "</td>\n";

            echo "<td>";
            echo $item['nombre_postulante'] . " ";
            echo $item['a_paterno'] . " ";
            echo $item['a_materno'];
            "</td>\n";
            echo "    <td>" . ($item !== null ? htmlentities($item['estado'], ENT_QUOTES) : "&nbsp;") . "</td>\n";
            //TO_DO: links con métodos GET para realizar solicitudes de acuerdo al parámetro, se debe poner un elemento anchor más la id de solicitud.
            echo "    <td><a href='vista_solicitud.php?id=".$item['idSolicitud'] ."'>ver</a> / <a href='modificacion_solicitud.php?id=".$item['idSolicitud'] ."'>editar</a> / <a href='eliminar_solicitud.php?id=".$item['idSolicitud'] ."'>eliminar</a> </td>\n";
            echo "</tr>\n";
        }
        echo "</table>\n";
    } else {
        echo "<p>No hay solicitudes entre las fechas indicadas</p>";
    }
    include('includes/footer.php');
}