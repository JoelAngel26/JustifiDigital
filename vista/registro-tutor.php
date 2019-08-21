<?php include 'partials/head.php';?>
<?php include '../phpfiles/Db.php';?>
<?php

$success = "";
$error = "";
if(filter_input(INPUT_POST, 'btnGuardar')){
    $nom = $_POST["nombre"];
    $apa = $_POST["apaterno"];
    $ama = $_POST["amaterno"];
    $tel = $_POST["telefono"];
   
    $classDB = new Db();
    $result = $classDB->insertTutorAlum($nom, $apa, $ama, $tel);
    if($result==true){
        $success ="Te registraste como Alumno y la información de tu Tutor";
    } else {
        $error= "No fue posible el registro de tu información";
    }
}

?>



<div class="container-fluid">
	<!-- SideBar -->
	<section class="full-box cover dashboard-sideBar">
		<div class="full-box dashboard-sideBar-bg btn-menu-dashboard"></div>
		<div class="full-box dashboard-sideBar-ct">
			<!--SideBar Title -->
			<div class="full-box text-uppercase text-center text-titles dashboard-sideBar-title">
				UTXJ <i class="zmdi zmdi-close btn-menu-dashboard visible-xs"></i>
			</div>
			<!-- SideBar User info -->
			<div class="full-box dashboard-sideBar-UserInfo">
				 <center><img src="assets/img/logoUTXJ.png" alt=""/></center>
			</div>
                         <br>
                        <center><a href="index.php" class=""><span class="glyphicon"></span> Inicio</a></center>
			<!-- SideBar Menu -->
			
				
	</section>

	<!-- Content page-->
	<section class="full-box dashboard-contentPage">
		<!-- NavBar -->
		<nav class="full-box dashboard-Navbar">
			<ul class="full-box list-unstyled text-right">
				
			</ul>
		</nav>
		<!-- Content page -->
		<div class="container-fluid">
			<div class="page-header">
                            <h1 class="text-titles"><i class="zmdi zmdi-face zmdi-hc-fw"></i> Usuarios <small>Tutores Familiares</small></h1>
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
			<p class="lead">Te registras como alumno y tu Tutor Familiar que esta a tu cargo</p>
		</div>
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12">
					<ul class="nav nav-tabs" style="margin-bottom: 15px;">
					  	<li class="active"><a href="#new" data-toggle="tab">Nuevo</a></li>
					  	
					</ul>
					<div id="myTabContent" class="tab-content">
						<div class="tab-pane fade active in" id="new">
							<div class="container-fluid">
								<div class="row">
									<div class="col-xs-12 col-md-10 col-md-offset-1">
                                                                            <form action="" method="POST">
									    	<fieldset>Datos Tutor Familiar</fieldset>
                                                                                 
									    	<div class="form-group label-floating">
											  <label class="control-label">Nombre</label>
                                                                                          <input name="nombre" class="form-control" type="text" required>
											</div>
											<div class="form-group label-floating">
											  <label class="control-label">Apellido Paterno</label>
                                                                                          <input name="apaterno" class="form-control" type="text" required>
											</div>
                                                                                        <div class="form-group label-floating">
											  <label class="control-label">Apellido Materno</label>
                                                                                          <input name="amaterno" class="form-control" type="text" required>
											</div>
                                                                                        <div class="form-group label-floating">
											  <label class="control-label">Telefono</label>
                                                                                          <input name="telefono" class="form-control" type="text" required>
											</div>
                                                                                    
										    <p class="text-center">
                                                                                        <button name="btnGuardar" value="Guardar" type="submit" class="btn btn-info btn-raised btn-sm"><i class="zmdi zmdi-floppy"></i> Guardar</button>
										    </p>
									    </form>
									</div>
								</div>
							</div>
						</div>
					  		
					  	
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
            

<?php
include 'partials/footer.php'; 

?>