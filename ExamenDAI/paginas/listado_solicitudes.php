<?php

include('includes/header.php');
include('../dao/SolicitudDaoImplementado.php');
echo "<h2>Listado de postulaciones</h2><br>";
$instancia = new SolicitudDaoImplementado();
$resultado = $instancia->listarPostulaciones();
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
        echo "    <td><a href='vista_solicitud.php?id=".$item['idSolicitud'] ."'>ver</a> / <a href='modificacion_solicitud.php?id=".$item['idSolicitud'] ."'>editar</a> / <a href='eliminar_solicitud.php?id=".$item['idSolicitud'] ."'>eliminar</a> </td>\n";
        echo "</tr>\n";
    }
    echo "</table>\n";
} else {
    echo "<p>no hay solicitudes guardadas</p>";
}
include('includes/footer.php');
