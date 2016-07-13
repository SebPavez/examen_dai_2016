<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    include ('includes/header.php');
    include ('../dao/SolicitudDaoImplementado.php');
    $id = $_GET['id'];
    
    $solicitud = new SolicitudDaoImplementado();
    $resultado = $solicitud->eliminarPostulacion($id);
    if($resultado){
        echo "Eliminado con éxito";
    } else {
        echo "<p>No hay solicitudes entre las fechas indicadas</p>";
    }
    include('includes/footer.php');
}