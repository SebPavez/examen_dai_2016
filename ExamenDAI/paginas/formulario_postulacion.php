
<?php
include ('includes/header.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $errores = array();

    if (empty($_POST['rut'])) {
        $errores[] = 'Olvidaste ingresar tu rut';
    } else {
        $rut = trim($_POST['rut']);
    }

    if (empty($_POST['nombre'])) {
        $errores[] = 'Olvidaste ingresar tu nombre';
    } else {
        $nombre = trim($_POST['nombre']);
    }

    if (empty($_POST['a_paterno'])) {
        $errores[] = 'Olvidaste ingresar tu apellido paterno';
    } else {
        $a_paterno = trim($_POST['a_paterno']);
    }

    if (empty($_POST['a_materno'])) {
        $errores[] = 'Olvidaste ingresar tu apellido materno';
    } else {
        $a_materno = trim($_POST['a_materno']);
    }

    if (empty($_POST['f_nacimiento'])) {
        $errores[] = 'Olvidaste ingresar tu fecha de nacimiento';
    } else {
        $f_nacimiento = trim($_POST['f_nacimiento']);
    }

    if (empty($_POST['sexo'])) {
        $errores[] = 'Olvidaste indicar tu sexo';
    } else {
        $sexo = trim($_POST['sexo']);
    }

    if (empty($_POST['fono'])) {
        $errores[] = 'Olvidaste ingresar tu teléfono';
    } else {
        $fono = trim($_POST['fono']);
    }    

    if (empty($_POST['correo'])) {
        $errores[] = 'Olvidaste ingresar tu correo';
    } else {
        $email = trim($_POST['correo']);
    }
    
    if (empty($_POST['direccion'])) {
        $errores[] = 'Olvidaste ingresar tu dirección';
    } else {
        $direccion = trim($_POST['direccion']);
    }
    
    if (empty($_POST['comuna'])) {
        $errores[] = 'Olvidaste ingresar tu comuna';
    } else {
        $comuna = trim($_POST['comuna']);
    }

    if (empty($_POST['educacion'])) {
        $errores[] = 'Olvidaste ingresar tu nivel educacional';
    } else {
        $n_educacional = trim($_POST['educacion']);
    }
    
    if (empty($_POST['cantidad_anios'])) {
        $errores[] = 'Olvidaste indicar tus años de experiencia laboral';
    } else {
        $experiencia_laboral = trim($_POST['cantidad_anios']);
    }
    
    
    if (empty($_POST['modalidad'])) {
        $errores[] = 'Olvidaste indicar la modalidad';
    } else {
        $modalidad = trim($_POST['modalidad']);
    }
    
    if (empty($_POST['curso'])) {
        $errores[] = 'Olvidaste indicar el curso';
    } else {
        $curso = trim($_POST['curso']);
    }
    
    
    if (empty($errores)) {
        include ('../dto/Solicitud.php');
        include ('../dao/SolicitudDaoImplementado.php');
       
        $postulacion = new Solicitud();
        $postulacion->setRut($rut);
        $postulacion->setNombre($nombre);
        $postulacion->setApellido_paterno($a_paterno);
        $postulacion->setApellido_materno($a_materno);
        $postulacion->setF_nacimiento($f_nacimiento);
        $postulacion->setSexo($sexo);
        $postulacion->setFono($fono);
        $postulacion->setE_mail($email);
        $postulacion->setDireccion($direccion);
        $postulacion->setComuna($comuna);
        $postulacion->setNivel_educacional($n_educacional); 
        $postulacion->setExperiencia_laboral($experiencia_laboral);
        $postulacion->setModalidad($modalidad);
        $postulacion->setCurso($curso);       
        
        $autor = new SolicitudDaoImplementado();
        $res = $autor->ingresarPostulacion($postulacion);
        if ($res) {
            echo "<h1>GRACIAS!</h1>"
            . "<p>Solicitud enviada! Su codigo de solicitud es: ".$res."</p><br><a href=login.php>Volver al login</a>";
        } else {
            echo "<h1>Error </h1>" . "<p>No te hemos podido registrar debido a un error de sistema.</p>";
        }
        include ('includes/footer.html');
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

<form action="formulario_postulacion.php" method="POST" class="contact_form">
    <h1>Formulario de registro</h1>
        <li>
            <ul>
                <label for="rut">RUT:</label>
                <input type="text" required name="rut">
            </ul>
            <ul>
                <label for="nombre">Nombre:</label>
                <input type="text"  required name="nombre">
            </ul>
            <ul>
                <label for="a_paterno">Apellido Paterno:</label>
                <input type="text" required name="a_paterno">                            
            </ul>
            <ul>
                <label for="a_materno">Apellido Materno:</label>
                <input type="text" required name="a_materno">        
            </ul>
            <ul>
                <label for="fecha_nacimiento">Fecha Nacimiento</label>
                <input type="date" required name="f_nacimiento">        
            </ul>
            <ul>
                <label for="sexo">Sexo:</label>
                <input id="radio" type="radio" name="sexo" value="M">M
                <input id="radio" type="radio" name="sexo" value="F">F       
            </ul>
            <ul>
                <label for="fono">Teléfono:</label>
                <input type="text" required name="fono">
            </ul>
            <ul>
                <label for="correo">Correo:</label>
                <input type="text" required name="correo">
            </ul>
            <ul>
                <label for="direccion">Dirección:</label>
                <input type="text" required name="direccion">
            </ul>
            <ul>
                <label for="comuna">Comuna:</label>
                <input type="text" required name="comuna">
            </ul>
            <ul>
                <label for="educacion">Educación:</label>
                <input type="text" required name="educacion">
            </ul>
            <ul>
                <input id="cajita" type="checkbox" name="exp" value="si">¿Posee experiencia en el área de la programación?
            </ul>
            <ul>
                <div id="exp" hidden>
                    <label for="cantidad_anios">Años experiencia:</label>
                    <input id="tiempo" type="number" value="0" name="cantidad_anios">
                </div>                
            </ul>

            <ul>                
                <label for="modalidad">Modalidad:</label>
                <select required name="modalidad">
                    <option value="Diurno">Diurno</option>
                    <option value="Vespertino">Vespertino</option>
                </select>
            </ul>
            <ul>
                <label for="curso">Curso:</label>
                <select required name="curso">
                    <option value="c-sharp">C#</option>
                    <option value="java">Java</option>
                    <option value="php">PHP</option>
                </select>
            </ul>

        </li>
    <button class="" type="submit">Registrar!</button>
</form>

<<script>
    $('#cajita').click(function() {
    if( $(this).is(':checked')) {
        $("#exp").show("fast");
    } else {
        $("#exp").hide("fast");
        $("#tiempo").val("0");
    }
}); 
</script>

<?php
include ('includes/footer.php');

