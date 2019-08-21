<?php include 'partials/head.php';?>
<?php include '../phpfiles/Db.php';?>
<?php include '../phpfiles/libreria.php';?>
<?php
if($_POST){
    $mat =$_POST["matricula"];
    $nom = $_POST["nombre"];
    $apa = $_POST["apaterno"];
    $ama = $_POST["amaterno"];
    $tel = $_POST["telefono"];
    $email = $_POST["correo"];
    $contra = $_POST["password"];
    $dir = $_POST["direccion"];
    $fecha = $_POST["fecha"];
    $gen = $_POST["genero"];
    $grupo = $_POST["grupo"];
    
    echo $fecha.$nom.$apa.$ama.$tel.$email.$contra.$dir.$fecha.$gen;
    $class = new Db();
   $resultadoIA=$class->insertCuenta($email, $contra, $mat, $nom, $apa, $ama, $tel, $dir, $fecha, $gen, $grupo);
 
    if($resultadoIA==true){
        
        //echo 'Registro exitoso';
          header("location:registro-tutor.php");
    } else {
        echo "No registro";
    }
} else {

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
                            <center><img src="assets/img/logoUTXJ.png" alt=""/></center>
			</div>
			<!-- SideBar Menu -->
                        <br>
                        <center><a href="index.php" class=""><span class="glyphicon glyphicon-log-in"></span> Regresar</a></center>
				
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
			  <h1 class="text-titles"><i class="zmdi zmdi-face zmdi-hc-fw"></i> Usuarios <small>Estudiantes</small></h1>
			</div>
			<p class="lead">Registrate posteriormente seras asignado a tu grupo correspondiente! Por tu tutor de Grupo</p>
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
                                                                            <form action="registro.php" method="POST">
									    	<fieldset>Datos Estudiante</fieldset>
                                                                                 <div class="form-group label-floating">
											  <label class="control-label">Matricula</label>
                                                                                          <input name="matricula" class="form-control" type="text" required>
											</div>
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
                                                                                        <div class="form-group label-floating">
											  <label class="control-label">Correo</label>
                                                                                          <input name="correo" class="form-control" type="email" required>
											</div>
                                                                                        <div class="form-group label-floating">
											  <label class="control-label">Contraseña</label>
                                                                                          <input name="password"class="form-control" type="password" required>
											</div>
											<div class="form-group label-floating">
											  <label class="control-label">Direccion</label>
                                                                                          <textarea name="direccion" class="form-control" required></textarea>
											</div>
                                                                                        <div class="form-group">
											  <label class="control-label">Fecha Nacimiento</label>
                                                                                          <input name="fecha" class="form-control" type="date" required>
											</div>
											
                                                                                        <div class="form-group">
                                                                                            <label class="control-label">Genero</label>
                                                                                            <select name="genero" class="form-control" required>
                                                                                                <option value="Masculino">Masculino</option>
                                                                                                <option value="Femenino">Femenino</option>
                                                                                            </select>
                                                                                        </div>
                                                                                         <div class="form-group">
                                                                                        <label class="control-label">Grado y Grupo</label>
                                                                                        <select name="grupo" class="form-control" required>
                                                                                            <?php
                                                                                            $resulGrupos = llenaGrupo();
                                                                                            if ($resulGrupos->num_rows > 0) {
                                                                                                while ($fila = $resulGrupos->fetch_assoc()) {
                                                                                                    ?>

                                                                                            <option value="<?php echo $fila['idgrupo']; ?>"><?php echo $fila['grado']." ".$fila['grupo'] ;?></option>
                                                                                                   
                                                                                                    <?php
                                                                                                }
                                                                                            }
                                                                                            ?>
                                                                                        </select>
                                                                                    </div>
											
										   
										    <p class="text-center">
                                                                                        <button type="submit" class="btn btn-info btn-raised btn-sm"><i class="zmdi zmdi-floppy"></i> Guardar</button>
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
<?php } ?>               

<?php
include 'partials/footer.php'; 

?>