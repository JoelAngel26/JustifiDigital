<!DOCTYPE html>
<?php include '../ws/client.php';?>

<html lang="es">
<head>
    <?php session_start() ?>
	<title>Inicio</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <link href="assets/css/main.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<?php
$success = "";
$error = "";
if (isset($_SESSION["usuario"])) {
    if ($_SESSION["usuario"]["privilegio"] != "Administrador") {
        header("location:usuario.php");
    }
} else {
    header("location:index.php");
}  ?>
<?php

if(filter_input(INPUT_POST, 'btnGuardar')){
    
        $id = $_POST['id'];
	$nom = $_POST['nombre'];
	$fI = $_POST['fechaI'];
	$fF = $_POST['fechaF'];
        $anio = $_POST['anio'];
        $des = $_POST['descripcion'];
        if( $client->__soapCall("updatePeriodo", array($id, $nom, $fI, $fF,$anio,$des))  ){
		$success = "Data is updated successfully.";
	}else{
		$error = "Sorry, Data is not updated.";
	}
}






$id = $_GET['id']; // id from url
$data = $client->__soapCall("getByPeridoId", array($id));
?>



<!-- /.container -->
<section class="full-box cover dashboard-sideBar">
		<div class="full-box dashboard-sideBar-bg btn-menu-dashboard"></div>
		<div class="full-box dashboard-sideBar-ct">
			<!--SideBar Title -->
			<div class="full-box text-uppercase text-center text-titles dashboard-sideBar-title">
				TI <i class="zmdi zmdi-close btn-menu-dashboard visible-xs"></i>
			</div>
			<!-- SideBar User info -->
			<div class="full-box dashboard-sideBar-UserInfo">
				<figure class="full-box">
					 <?php if($_SESSION["usuario"]["genero"]=="Masculino"){  ?>
					<!--<img src="./assets/img/avatar.jpg" alt="UserIcon">-->
                                        <img src="./assets/img/M3N.png" alt="UserICON"/>
                                        <?php }else{ ?>
                                        <img src="./assets/img/WOMAN.png" alt="UserIcon"/>
                                        <?php } ?>
					<figcaption class="text-center text-titles"><?php echo $_SESSION["usuario"]["nombre"]." ".$_SESSION["usuario"]["apaterno"]; ?></figcaption>
				</figure>
				<ul class="full-box list-unstyled text-center">
					<li>
						<a href="#!">
							<i class="zmdi zmdi-settings"></i>
						</a>
					</li>
					<li>
						<a href="#!" class="">
                                                   
                                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#close"> <i class="zmdi zmdi-power"></i></button>
                                                    
						</a>
					</li>
				</ul>
			</div>
			<!-- SideBar Menu -->
			<?php include 'partials/menu.php' ?>
		</div>
	</section>

	<!-- Content page-->
	<section class="full-box dashboard-contentPage">
		<!-- NavBar -->
		<nav class="full-box dashboard-Navbar">
			<ul class="full-box list-unstyled text-right">
				<li class="pull-left">
					<a href="#!" class="btn-menu-dashboard"><i class="zmdi zmdi-more-vert"></i></a>
				</li>
				<li>
					<a href="#!" class="btn-Notifications-area">
						<i class="zmdi zmdi-notifications-none"></i>
						<span class="badge">7</span>
					</a>
				</li>
				<li>
					<a href="#!" class="btn-search">
						<i class="zmdi zmdi-search"></i>
					</a>
				</li>
				<li>
					<a href="#!" class="btn-modal-help">
						<i class="zmdi zmdi-help-outline"></i>
					</a>
				</li>
			</ul>
		</nav>
		<!-- Content page -->
		<div class="container-fluid">
			<div class="page-header">
			  <h1 class="text-titles">Periodos <small>Cuatrimestrales</small></h1>
			</div>
		</div>
		<div class="full-box text-center" style="padding: 30px 10px;">
                     <?php if ($success) { ?> 
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-success fade in text-center">
                            <a href="#" class="close" data-dismiss="alert">&times;</a>
                            <strong>Mensaje!</strong>&nbsp;<?php echo $success; ?> 
                        </div>
                    </div>
                </div>
            <?php } elseif ($error) { ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-danger fade in text-center">
                            <a href="#" class="close" data-dismiss="alert">&times;</a>
                            <strong>Mensaje!</strong>&nbsp;<?php echo $error; ?> 
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
                 
                    
		</div>
		<div class="container-fluid">
		<?php
                $result = $client->__soapCall("getAllPeridos", array());
                
                ?>
                    <form action="" method="POST">
                        <fieldset>Datos Periodo</fieldset>
                        <div class="form-group label-floating">
                             <input type="hidden" name="id" value="<?php echo $id;?>">
                           
                        </div>
                        <div class="form-group label-floating">
                             
                            <label class="control-label">Nombre</label>
                            <input name="nombre" class="form-control" type="text" value="<?php echo $data['nombre'];?>" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Fecha Inicio</label>
                            <input name="fechaI" class="form-control" type="date" value="<?php echo $data['fecha_inicio'];?>" required>
                        </div>
                          <div class="form-group">
                            <label class="control-label">Fecha Fin</label>
                            <input name="fechaF" class="form-control" type="date" value="<?php echo $data['fecha_fin'];?>" required >
                        </div>
                        <div class="form-group label-floating">
                            <label class="control-label">Año</label>
                            <input name="anio" class="form-control" type="text" value="<?php echo $data['anio'];?>" required>
                        </div>
                        <div class="form-group label-floating">
                            <label class="control-label">Descrición</label>
                            <input name="descripcion" class="form-control" type="text" value="<?php echo $data['descripcion'];?>" >
                        </div>


                        <p class="text-center">
                            <button name="btnGuardar" value="Guardar" type="submit" class="btn btn-info btn-raised btn-sm"><i class="zmdi zmdi-floppy"></i> Guardar</button>
                        </p>
                    </form>


		</div>
	</section>

	<!-- Notifications area -->
	<section class="full-box Notifications-area">
		<div class="full-box Notifications-bg btn-Notifications-area"></div>
		<div class="full-box Notifications-body">
			<div class="Notifications-body-title text-titles text-center">
				Notifications <i class="zmdi zmdi-close btn-Notifications-area"></i>
			</div>
			<div class="list-group">
			  	<div class="list-group-item">
				    <div class="row-action-primary">
				      	<i class="zmdi zmdi-alert-triangle"></i>
				    </div>
				    <div class="row-content">
				      	<div class="least-content">17m</div>
				      	<h4 class="list-group-item-heading">Tile with a label</h4>
				      	<p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus.</p>
				    </div>
			  	</div>
			  	<div class="list-group-separator"></div>
			  	<div class="list-group-item">
				    <div class="row-action-primary">
				      	<i class="zmdi zmdi-alert-octagon"></i>
				    </div>
				    <div class="row-content">
				      	<div class="least-content">15m</div>
				      	<h4 class="list-group-item-heading">Tile with a label</h4>
				      	<p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus.</p>
				    </div>
			  	</div>
			  	<div class="list-group-separator"></div>
				<div class="list-group-item">
				    <div class="row-action-primary">
				      	<i class="zmdi zmdi-help"></i>
				    </div>
				    <div class="row-content">
				      	<div class="least-content">10m</div>
				      	<h4 class="list-group-item-heading">Tile with a label</h4>
				      	<p class="list-group-item-text">Maecenas sed diam eget risus varius blandit.</p>
				    </div>
				</div>
			  	<div class="list-group-separator"></div>
			  	<div class="list-group-item">
				    <div class="row-action-primary">
				      	<i class="zmdi zmdi-info"></i>
				    </div>
				    <div class="row-content">
				      	<div class="least-content">8m</div>
				      	<h4 class="list-group-item-heading">Tile with a label</h4>
				      	<p class="list-group-item-text">Maecenas sed diam eget risus varius blandit.</p>
				    </div>
			  	</div>
			</div>

		</div>
	</section>

	<!-- Dialog help -->
	<div class="modal fade" tabindex="-1" role="dialog" id="Dialog-Help">
	  	<div class="modal-dialog" role="document">
		    <div class="modal-content">
			    <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			    	<h4 class="modal-title">Help</h4>
			    </div>
			    <div class="modal-body">
			        <p>
			        	Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt beatae esse velit ipsa sunt incidunt aut voluptas, nihil reiciendis maiores eaque hic vitae saepe voluptatibus. Ratione veritatis a unde autem!
			        </p>
			    </div>
		      	<div class="modal-footer">
		        	<button type="button" class="btn btn-primary btn-raised" data-dismiss="modal"><i class="zmdi zmdi-thumb-up"></i> Ok</button>
		      	</div>
		    </div>
	  	</div>
</div>
        
<!-- Dialog help -->
	<div class="modal fade" tabindex="-1" role="dialog" id="close">
	  	<div class="modal-dialog" role="document">
		    <div class="modal-content">
			    <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			    	<h4 class="modal-title">Salir </h4>
			    </div>
			    <div class="modal-body">
			        <p>
			        ¿Quieres cerrar sesión?
			        </p>
			    </div>
		      	<div class="modal-footer">
                            <a class="btn btn-danger" href="cerrar-sesion.php">Si, Salir</a>
		        	<button type="button" class="btn btn-primary btn-raised" data-dismiss="modal"><i class="zmdi"></i>Cancelar</button>
		      	</div>
		    </div>
	  	</div>
</div>        
        
        <script src="assets/js/jquery-3.1.1.min.js"></script>
	<script src="assets/js/sweetalert2.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/material.min.js"></script>
	<script src="assets/js/ripples.min.js"></script>
	<script src="assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
	<script src="assets/js/main.js"></script>
	<script>
		$.material.init();
	</script>
</body>
</html>