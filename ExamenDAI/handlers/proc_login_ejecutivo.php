<?php

if ($_SERVER['REQUEST_METHOD']=='POST'){
    
    session_start();    
    include ('../dao/ejecutivodaoimplementado.php'); 
    $ejecutivo = new EjecutivoDaoImplementado();   
    
    list($check, $data) = $ejecutivo->ingresarEjecutivo($_POST['rut'], $_POST['pass']);
    
    if($check){        
        $_SESSION['rut'] = $data['rut'];
        $_SESSION['nombre'] = $data['nombre'];
        $_SESSION['tipo_usuario'] = 'ejecutivo';
        
        header ('Location: ../paginas/formulario_postulacion.php');
        
    }else{
        echo "Error en datos de login.<br>";
        echo "<a href='../paginas/login.php'>Volver</a>";
    }
}
