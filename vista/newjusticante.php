<?php include 'partials/head.php';?>
<?php include '../phpfiles/Db.php';?>
<?php include '../phpfiles/libreria.php';?>

<?php
$success = "";
$error = "";
if (isset($_SESSION["usuario"])) {
    if ($_SESSION["usuario"]["privilegio"] == "Administrador") {
        header("location:admin.php");
    }
} else {
    header("location:index.php");
}
if(filter_input(INPUT_POST, 'btnGuardar')){
  $fInicio = $_POST["fechaInicio"];
  $fFin = $_POST["fechaFin"];
  $motivo = $_POST["motivo"];
  //$archivo_temp = $_FILES['archivo']['tmp_name'];
  
 //$doc_pro = (file_get_contents($archivo_temp));
 $correo = $_SESSION["usuario"]["email"];
 $id_alumno = $client->__soapCall("IdAlumnoJus", array($correo));
 $id_tutorfam = $client->__soapCall("IdTutorFamByAlum", array($correo));
 $id_tutoracad = $client->__soapCall("IdTutorAcadByAlum", array($correo));
    

 if($result){
     $success="Solicitud Correcta";
 } else {
     $error="Error al solicitar";
 }
}

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
            
                    <?php if ($success) {
                            echo "<br>";
                        ?> 
                        
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
			<div class="page-header">
			  <h1 class="text-titles">Solitudes  <small>Justificantes</small></h1>
			</div>
		</div>
		<div class="full-box " style="padding: 30px 10px;">
                    <form   action="newjusticante.php" method="POST">
                   <fieldset>Solicitud de Justicante</fieldset>
                    <div class="form-group">
                        <label class="control-label">Fecha Inicio Justicante</label>
                        <input name="fechaInicio" class="form-control" type="date" required>
                    </div>
                   <div class="form-group">
                        <label class="control-label">Fecha Fin Justicante</label>
                        <input name="fechaFin" class="form-control" type="date" required>
                    </div>
                   <div class="form-group">
                        <label class="control-label">Motivo</label>
                        <textarea name="motivo" class="form-control" required></textarea>
                    </div>
                   <div class="form-group">
                       <label class="control-label">Documento Probatorio</label>
                       <div>
                           <input type="text" readonly="" class="form-control" placeholder="Browse...">
                           <input name="archivo" type="file" >
                       </div>
                   </div
                   <br>
                   <br>
                   <fieldset>Materias a justificar</fieldset>
                   <div class="form-group">
                       <?php
                       $id = $_SESSION["usuario"]["idalumno"];
                       $result = ObtenerMateriasByAlumno($id);

                       while($fila = $result->fetch_assoc()){ ?>
                       <label>  <input type="checkbox" name="materias[]" value="<?php echo $fila['nombre']; ?>"><?php echo $fila['nombre']; ?></label>
                       <br>
                       <?php }
                       ?>                                              
                   </div>
                  

                   <p class="text-center">
                     
                       <button name="btnGuardar" value="Guardar" type="submit" class="btn btn-info btn-raised btn-sm"><i class="zmdi zmdi-floppy"></i> Solicitar</button>
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
        
<?php include 'partials/footer.php' ?>