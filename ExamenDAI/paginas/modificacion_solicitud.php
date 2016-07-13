<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    include ('includes/header.php');
    include ('../dao/SolicitudDaoImplementado.php');
    $id = $_GET['id'];
    $instancia = new SolicitudDaoImplementado();
    $resultado = $instancia->buscarPostulacion($id);
    ?>
    <form class="contact_form" action ="modificar.php" method="post">

        <li>
            <ul>
                <label for="rut">RUT:</label>
                <input type="text" value="<?php echo $resultado['rutPostulante'] ?>" name="rut">
            </ul>
            <ul>
                <label for="nombre">Nombre:</label>
                <input type="text" value="<?php echo $resultado['nombre_postulante'] ?>" name="nombre">
            </ul>
            <ul>
                <label for="a_paterno">Apellido Paterno:</label>
                <input type="text" value="<?php echo $resultado['a_paterno'] ?>" name="a_paterno">                            
            </ul>
            <ul>
                <label for="a_materno">Apellido Materno:</label>
                <input type="text" value="<?php echo $resultado['a_materno'] ?>" name="a_materno">        
            </ul>
            <ul>
                <label for="fecha_nacimiento">Fecha Nacimiento</label>
                <input type="text" value="<?php echo $resultado['fechaNacimiento'] ?>" name="fecha_nacimiento">        
            </ul>
            <ul>
                <label for="sexo">Sexo:</label>
                <input type="radio" name="sexo" value="M">M
                <input type="radio" name="sexo" value="F">F       
            </ul>
            <ul>
                <label for="fono">Teléfono:</label>
                <input type="text" value="<?php echo $resultado['telefono'] ?>" name="fono">
            </ul>
            <ul>
                <label for="correo">Correo:</label>
                <input type="text" value="<?php echo $resultado['email']?>" name="correo">
            </ul>
            <ul>
                <label for="direccion">Dirección:</label>
                <input type="text" value="<?php echo $resultado['direccion'] ?>" name="direccion">
            </ul>
            <ul>
                <label for="comuna">Comuna:</label>
                <input type="text" value="<?php echo $resultado['comuna'] ?>" name="comuna">
            </ul>
            <ul>
                <label for="educacion">Educación:</label>
                <input type="text" value="<?php echo $resultado['educacion'] ?>" name="educacion">
            </ul>

            <ul>
                <label for="cantidad_anios">Años de experiencia:</label>
                <input type="number" value="<?php echo $resultado['experiencia'] ?>" name="cantidad_anios">
            </ul>

            <ul>
                <label for="modalidad">Modalidad:</label>
                <input type="text" value="<?php echo $resultado['modalidad'] ?>" name="modalidad">
            </ul>
            <ul>
                <label for="curso">Curso:</label>
                <input type="text" value="<?php echo $resultado['curso'] ?>" name="curso">
            </ul>

        </li>

        <input type="radio" name="estado" value="pendiente">Pendiente
        <input type="radio" name="estado" value="rechazado">Rechazar
        <input type="radio" name="estado" value="aprobado">Aprobar
        <button class="" type="submit">Actualizar</button>
    </form>
    <?php
    include ('includes/footer.php');
}else{
    include ('includes/header.php');
    echo "<p>No encontrado ._.</p>";
    include ('includes/footer.php');
}

    