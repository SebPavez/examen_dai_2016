<?php
include ('includes/header.php');
?>

<h1>Buscador de solicitudes</h1>

<form action="buscar_rut.php" method="POST" class="contact_form">              
    
        <h1>Búsqueda por RUT</h1>
        <label for="rut">RUT:</label>
        <input name="rut" type="text">
        <button type="submit">Buscar</button>
    
</form>

<form action="buscar_fechas.php" method="POST" class="contact_form">

    
        <h1>Buscador de Fecha</h1>
        <label for="fecha_desde">Desde:</label>
        <input name="fecha_desde" type="date">
        <br>
        <label for="fecha_hasta">Hasta:</label>
        <input name="fecha_hasta" type="date">
        <button type="submit">Buscar</button>
    

</form>

<?php
include ('includes/footer.php');
