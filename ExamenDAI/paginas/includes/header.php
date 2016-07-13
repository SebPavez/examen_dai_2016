<?php
session_start();
if(!isset($_SESSION['tipo_usuario'])){    
    header('location: login.php');
}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>CertificaDev</title>
        <link rel="stylesheet" type="text/css" href="./css/estilo.css">
		<link rel="icon" type="image/png" href="./imgs/favicon.ico">
		<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>        
    </head> 
    <body id="cuerpo" class="home">
        <header id="banner" class="body">
            <h1><a href="#">CertificaDev<br><strong>Institución educacional</ins></strong></a></h1>
 
			<nav>
				<ul>					
					<li><a href="formulario_postulacion.php">Postular</a></li>	
					<li><a href="estado_postulacion.php">Consultar estado postulación</a></li>
				<li>
                        <?php
                        if($_SESSION['tipo_usuario']==='ejecutivo'){
                            echo "<a href='listado_solicitudes.php'>Listar postulaciones</a>"; 
                            echo "<a href='buscador_solicitudes.php'>Listar por parámetro </a>";
                        }
                        ?>
                                </li>    
                                <li><a href='logout.php'><?php echo $_SESSION['nombre']; ?>, Cerrar sesión </a></li>                                                                
				</ul>
			</nav>
        </header>

        <article id="featured" class="body">
