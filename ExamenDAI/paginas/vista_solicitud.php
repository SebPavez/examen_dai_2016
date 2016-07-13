<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    include ('includes/header.php');
    include ('../dao/SolicitudDaoImplementado.php');
    $id = $_GET['id'];
    $instancia = new SolicitudDaoImplementado();
    $resultado = $instancia->buscarPostulacion($id);
    ?>

        <li>
            <ul>
                <label for="rut">RUT:<?php echo $resultado['rutPostulante'] ?></label>
            </ul>
            <ul>
                <label for="nombre">Nombre: <?php echo $resultado['nombre_postulante'] ?></label>
            </ul>
            <ul>
                <label for="a_paterno">Apellido Paterno: <?php echo $resultado['a_paterno'] ?></label>
            </ul>
            <ul>
                <label for="a_materno">Apellido Materno: <?php echo $resultado['a_materno'] ?></label>
            </ul>
            <ul>
                <label for="fecha_nacimiento">Fecha Nacimiento <?php echo $resultado['fechaNacimiento'] ?></label>
            </ul>
            <ul>
                <label for="sexo">Sexo: <?php echo $resultado['telefono'] ?></label>                
            </ul>
            <ul>
                <label for="fono">Teléfono: <?php echo $resultado['telefono'] ?></label>
            </ul>
            <ul>
                <label for="correo">Correo: <?php echo $resultado['email']?></label>
            </ul>
            <ul>
                <label for="direccion">Dirección: <?php echo $resultado['direccion'] ?></label>
            </ul>
            <ul>
                <label for="comuna">Comuna: <?php echo $resultado['comuna'] ?></label>
            </ul>
            <ul>
                <label for="educacion">Educación: <?php echo $resultado['educacion'] ?></label>
            </ul>

            <ul>
                <label for="cantidad_anios">Años de experiencia: <?php echo $resultado['experiencia'] ?></label>
            </ul>

            <ul>
                <label for="modalidad">Modalidad: <?php echo $resultado['modalidad'] ?></label>
            </ul>
            <ul>
                <label for="curso">Curso: <?php echo $resultado['curso'] ?></label>
            </ul>
            <ul>
                <label for="curso">Estado: <?php echo $resultado['Estado'] ?></label>
            </ul>
        </li>
    <?php
    include ('includes/footer.php');
}else{
    include ('includes/header.php');
    echo "<p>No encontrado ._.</p>";
    include ('includes/footer.php');
}

