<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    include ('includes/header.php');
    include ('../dao/SolicitudDaoImplementado.php');
    
    
    $solicitud = new SolicitudDaoImplementado();
    $resultado = $solicitud->modificarPostulacion($postulacion);
    if($resultado){
        echo "Eliminado con éxito";
    } else {
        echo "<p>No hay solicitudes entre las fechas indicadas</p>";
    }
    include('includes/footer.php');
}