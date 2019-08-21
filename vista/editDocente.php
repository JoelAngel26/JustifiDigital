<?php include 'partials/head.php';?>
<?php include '../phpfiles/Db.php';?>
<?php include '../phpfiles/libreria.php';?>
<?php
$success = "";
$error = "";
if(filter_input(INPUT_POST, 'btnGuardar')){
$idDo = $_GET['id']; // id from url
$cuenta = $_GET['cuenta'];


    $ced =$_POST["cedula"];
    $nom = $_POST["nombre"];
    $apa = $_POST["apaterno"];
    $ama = $_POST["amaterno"];
    $email = $_POST["correo"];
    $contra = $_POST["password"];
    $dir = $_POST["direccion"];
    $fecha = $_POST["fecha"];
    $gen = $_POST["genero"];
    $status= $_POST["estatus"];
    $tutor = $_POST["tutor"];
    
   $class = new Db();
   $resultadoDoc=$class->updateDocente($idDo, $ced, $nom, $apa, $ama, $fecha, $dir, $gen, $status, $tutor);
$resultadoCueta = $class->updateCuentaDocente($cuenta, $email, $contra);
 
    if($resultadoDoc && $resultadoCueta){
        
        $success="Registro exitoso";
          
    } else {
        $error= "No fue posible el registro";
    }
}
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $resultadD = ObtenerDocenteBYID($id);
    $filam = $resultadD->fetch_assoc();
} else {
    header("location:Docentes.php");
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
			<div class="full-box dashboard-sideBar-UserInfo ">
                            <figure class="full-box">
					 <?php if($_SESSION["usuario"]["genero"]=="Masculino"){  ?>
					<!--<img src="./assets/img/avatar.jpg" alt="UserIcon">-->
                                        <img src="./assets/img/M3N.png" alt="UserICON"/>
                                        <?php }else{ ?>
                                        <img src="./assets/img/WOMAN.png" alt="UserIcon"/>
                                        <?php } ?>
					<figcaption class="text-center text-titles"><?php echo $_SESSION["usuario"]["nombre"]." ".$_SESSION["usuario"]["apaterno"]; ?></figcaption>
				</figure>
			</div>
			<!-- SideBar Menu -->
                        <?php include 'partials/menu.php' ?>
				
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
			  <h1 class="text-titles"><i class="zmdi zmdi-face zmdi-hc-fw"></i>Actualización <small>Docentes</small></h1>
			</div>
			<p class="lead">Registro de Docentes</p>
		</div>
		<div class="container-fluid">
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
                    
			<div class="row">
				<div class="col-xs-12">
					<ul class="nav nav-tabs" style="margin-bottom: 15px;">
					  	<li class="active"><a href="#new" data-toggle="tab">Actualización</a></li>
					  	
					</ul>
					<div id="myTabContent" class="tab-content">
						<div class="tab-pane fade active in" id="new">
							<div class="container-fluid">
								<div class="row">
									<div class="col-xs-12 col-md-10 col-md-offset-1">
                                                                            <form action="" method="POST">
									    	<fieldset>Datos Docente</fieldset>
                                                                                 <div class="form-group label-floating">
											  <label class="control-label">Cedula</label>
                                                                                          <input name="cedula" class="form-control" type="text" value="<?php echo $filam['cedula']; ?>" required>
											</div>
									    	<div class="form-group label-floating">
											  <label class="control-label">Nombre</label>
                                                                                          <input name="nombre" class="form-control" type="text" value="<?php echo $filam['nombre']; ?>" required>
											</div>
											<div class="form-group label-floating">
											  <label class="control-label">Apellido Paterno</label>
                                                                                          <input name="apaterno" class="form-control" type="text" value="<?php echo $filam['apaterno']; ?>" required>
											</div>
                                                                                        <div class="form-group label-floating">
											  <label class="control-label">Apellido Materno</label>
                                                                                          <input name="amaterno" class="form-control" type="text" value="<?php echo $filam['amaterno']; ?>" required>
											</div>
                                                                                    
                                                                                        <div class="form-group label-floating">
											  <label class="control-label">Correo</label>
                                                                                          <input name="correo" class="form-control" type="email" value="<?php echo $filam['correo']; ?>" required>
											</div>
                                                                                        <div class="form-group label-floating">
											  <label class="control-label">Contraseña</label>
                                                                                          <input  name="password"class="form-control" type="password" value="<?php echo $filam['contrasenia']; ?>" required>
											</div>
											<div class="form-group label-floating">
											  <label class="control-label">Direccion</label>
                                                                                          <textarea name="direccion" class="form-control"  required><?php echo $filam['direccion']; ?></textarea>
											</div>
                                                                                        <div class="form-group">
											  <label class="control-label">Fecha Nacimiento</label>
                                                                                          <input name="fecha" class="form-control" type="date" value="<?php echo $filam['fecha_nac']; ?>" required>
											</div>
											
                                                                                        <div class="form-group">
                                                                                            <label class="control-label" >Genero</label>
                                                                                            <select name="genero" class="form-control" required>
                                                                                                <option value="Masculino">Masculino</option>
                                                                                                <option value="Femenino">Femenino</option>
                                                                                            </select>
                                                                                        </div>
                                                                                         <div class="form-group">
                                                                                        <label class="control-label">El docente sera tutor de grupo</label>
                                                                                        <select name="tutor" class="form-control" required>
                                                                                          <option value="Si">SI</option>
                                                                                           <option value="No">No</option>
                                                   
                                                                                        </select>
                                                                                    </div>
                                                                                     <div class="form-group">
                                                                                            <label class="control-label" >Estatus</label>
                                                                                            <select name="estatus" class="form-control" required>
                                                                                                <option value="Activo">Activo</option>
                                                                                                <option value="Inactivo">Inactivo</option>
                                                                                            </select>
                                                                                        </div>
											
										   
										    <p class="text-center">
                                                                                        <button name="btnGuardar" value="Guardar" type="submit" class="btn btn-info btn-raised btn-sm"><i class="zmdi zmdi-floppy"></i> Actualizar</button>
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