<?php
include ('includes/header.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $errores = array();

    if (empty($_POST['id_postulacion'])) {
        $errores[] = 'Olvidaste ingresar el id de tu solicitud';
    } else {
        $id = trim($_POST['id_postulacion']);
    }

    if (empty($errores)) {
        include ('../dao/SolicitudDaoImplementado.php');
        $nuevoAcceso = new SolicitudDaoImplementado();
        $resultado = $nuevoAcceso->revisarEstado($id);

        if (!$resultado) {
            echo "<h1>Error</h1>"
            . "<p>No se ha logrado encontrar su solicitud</p>";
        } else {
            if ($resultado == 'pendiente') {
                echo "<h1>Estado solicitud:</h1> Pendiente";
            }if ($resultado == 'rechazado') {
                echo "<h1>Estado solicitud:</h1> Rechazado<br>"
                . "'Para mayor información, puede llamarnos al número ubicado en nuestra página oficial'";
            }if ($resultado == 'aprobado') {
                echo "<h1>Estado solicitud:</h1> Aprobado<br>"
                . "'Dentro de un plazo de 48 horas, uno de nuestros ejecutivos se pondrá en contacto con usted'";
            }
        }
        include ('includes/footer.php');
        exit();
    } else {
        echo "<h1>Error </h1>"
        . "<p>Ocurrieron los siguientes errores: <br/>";
        foreach ($errores as $msg) {
            echo " - $msg<br/>\n";
        }
        echo "</p><p>Por favor, intente nuevamente</p>";
    }
}
?>

<form action="estado_postulacion.php" method="POST" class="contact_form">
    <h1>Consulta estado postulación</h1>
    <li>
        <ul>
            <label for="id_postulacion">Id. Postulación:</label>
            <input type="text" required name="id_postulacion">
        </ul>

    </li>
    <button class="" type="submit">Consultar</button>
</form>

<?php
include ('includes/footer.php');
