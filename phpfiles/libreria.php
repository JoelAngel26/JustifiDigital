<?php
include_once 'conectar.php';

/*function InsertCuenta($correo, $pass, $rol) {
    $band = false;
    $sql = "INSERT INTO `bd_dawjus`.`cuenta` (`idcuenta`, `correo`, `contrasenia`, `rol_idrol`) VALUES (null, '$correo', '$pass', '$rol');";
    $con = Conecta();

    if ($rol == 1) {
        
    } elseif ($rol == 2) {
        
    } elseif ($rol == 3) {
        
    } elseif ($rol == 4) {
        
    }

    if ($con->query($sql) === TRUE) {
        $band = true;
    } else {
        $band = false;
    }
    $con->close();
    return $band;
}
*/
function getUltimaCuenta() {
    $sql = "select max(idcuenta)as ultimacuenta from cuenta;" ;
    $con = Conecta();
    $result = $con->query($sql);
    $fila= $result->fetch_assoc();
    $ultimoCuenta = $fila['ultimacuenta'];
    $con->close();
    return $ultimoCuenta;
}

function eliminar($matricula){
    $band=false;
    $sql="delete from grupo where matricula= ".$matricula.";";
    $con= Conecta();
    //$con->query($sql);
    //$con->close();
    if ($con->query($sql) === TRUE) {
            $band =true;
        } else {
            $band=false;
        }
        
    $con->close();
return $band;
    
   // echo "<script type='text/javascript'>alert('El registro con la Matricula ".$matricula." ha sido eliminado :( ')</script>";            
}
function Busca($matricula) {
    $sql = "select * from grupo  where matricula= ".$matricula.";";
    $con = Conecta();
    $result = $con->query($sql);
    $con->close();
    return $result;
}

function Actualiza($matr,$apr,$amr,$nom) {
    $band=false;
    $sql="UPDATE grupo SET apaterno='".$apr."',amaterno='".$amr."',nombre='".$nom."' WHERE matricula=".$matr.";";
    $con = Conecta();
      if ($con->query($sql) === TRUE) {
            $band =true;
        } else {
            $band=false;
        }
        
    $con->close();
return $band;
    //echo "<script type='text/javascript'>alert('Datos Actualizados :)')</script>";
    //header("location:pagina.php");
    //echo "<script type='text/javascript'>window.location=\''.$url.'\';</script‌​>";
    
}

function logincuenta($name, $pass) {
    $band=false;
    $sql = "SELECT * FROM cuenta WHERE correo='" . $name . "' AND contrasenia='" . $pass . "';";
    $con = Conecta();
    $result = $con->query($sql);
    $con->close();
    return $result;
}

function getUserAlumno($idcuenta, $idrol) {
    $sql = "select * from cuenta c join alumno a "
            . " on c.idcuenta=a.cuenta_idcuenta join rol r on c.rol_idrol= "
            . "r.idrol where idcuenta=$idcuenta and c.rol_idrol=$idrol";
    $con = Conecta();
    $result = $con->query($sql);
    $con->close();
    return $result;
}
function getUserAdministrador($idcuenta, $idrol) {
    $sql = "select * from cuenta c join admin a on c.idcuenta=a.id_cuenta join rol r on c.rol_idrol= r.idrol "
            . "where c.idcuenta=$idcuenta and c.rol_idrol=$idrol;";
    $con = Conecta();
    $result = $con->query($sql);
    $con->close();
    return $result;
}
function getUserDocente($idcuenta, $idrol) {
    $sql = "SELECT * FROM cuenta c join docente d on c.idcuenta = d.cuenta_idcuenta "
            . "join rol r on c.rol_idrol=r.idrol where c.idcuenta=$idcuenta and c.rol_idrol=$idrol;";
    $con = Conecta();
    $result = $con->query($sql);
    $con->close();
    return $result;
}
function getUserDirector($idcuenta, $idrol) {
    $sql = "select * from cuenta c join director d on c.idcuenta=d.cuenta_idcuenta"
            . " join rol r on c.rol_idrol = r.idrol where c.idcuenta=$idcuenta and c.rol_idrol=$idrol;";
    $con = Conecta();
    $result = $con->query($sql);
    $con->close();
    return $result;
}
function llenaGrupo() {
    $sql = "SELECT * FROM grupo where estatus='Activo';";
    $con = Conecta();
    $result = $con->query($sql);
    $con->close();
    return $result;
}
function SeleccionaMaterias() {
    $sql = "SELECT * FROM materia;";
    $con = Conecta();
    $result = $con->query($sql);
    $con->close();
    return $result;
}
function ObtenerMateriaBYID($id) {
    $sql = "SELECT * FROM materia where idmateria='$id';";
    $con = Conecta();
    $result = $con->query($sql);
    $con->close();
    return $result;
}
function eliminarMateria($idmateria){
    $band=false;
    $sql="delete from materia where idmateria= ".$idmateria.";";
    $con= Conecta();

    if ($con->query($sql) === TRUE) {
            $band =true;
        } else {
            $band=false;
        }
        
    $con->close();
return $band;
   
}
function SeleccionaDocentes() {
    $sql = "SELECT * FROM docente;";
    $con = Conecta();
    $result = $con->query($sql);
    $con->close();
    return $result;
}
function ObtenerDocenteBYID($id) {
    $sql = "select * from docente join cuenta on idcuenta=cuenta_idcuenta where iddocente=$id;";
    $con = Conecta();
    $result = $con->query($sql);
    $con->close();
    return $result;
}
function eliminarDocente($iddocente){
    $band=false;
    $sql="delete from docente where iddocente= ".$iddocente.";";
    $con= Conecta();

    if ($con->query($sql) === TRUE) {
            $band =true;
        } else {
            $band=false;
        }
        
    $con->close();
return $band;
   
}
function eliminarCuenta($idcuenta){
    $band=false;
    $sql="delete from cuenta where idcuenta= ".$idcuenta.";";
    $con= Conecta();

    if ($con->query($sql) === TRUE) {
            $band =true;
        } else {
            $band=false;
        }
        
    $con->close();
return $band;
   
}
function SeleccionaDocentesTutores() {
    $sql = "SELECT * FROM docente d join grupo g on d.iddocente =g.docente_iddocente
    WHERE d.estatus ='Activo' and d.tutor ='Si';";
    $con = Conecta();
    $result = $con->query($sql);
    $con->close();
    return $result;
}
function SeleccionaCarreras() {
    $sql = "SELECT * FROM carrera c join director d on c.director_iddirector=d.iddirector;";
    $con = Conecta();
    $result = $con->query($sql);
    $con->close();
    return $result;
}
function SeleccionaDirector() {
    $sql = "SELECT * FROM director;";
    $con = Conecta();
    $result = $con->query($sql);
    $con->close();
    return $result;
}
function ObtenerCarreraBYID($id) {
    $sql = "SELECT * FROM carrera where idcarrera=$id;";
    $con = Conecta();
    $result = $con->query($sql);
    $con->close();
    return $result;
}
function ObtenerMateriasByAlumno($id) {
    $sql = "SELECT m.idmateria,m.nombre FROM alumno a join grupo_has_alumno ga on a.idalumno=ga.alumno_idalumno
            join grupo g on ga.grupo_idgrupo=g.idgrupo join grupo_has_materia gm on g.idgrupo=gm.grupo_idgrupo
            join materia m on gm.materia_idmateria=m.idmateria where a.idalumno=$id;";
    $con = Conecta();
    $result = $con->query($sql);
    $con->close();
    return $result;
}
function SeleccionaGruposSinTutor() {
    $sql = "SELECT * FROM grupo g join carrera c on g.carrera_idcarrera=c.idcarrera
            where g.estatus='Activo' and g.docente_iddocente is null;";
    $con = Conecta();
    $result = $con->query($sql);
    $con->close();
    return $result;
}
function SeleccionaGrupos() {
    $sql = "SELECT * FROM grupo g join docente d on
            g.docente_iddocente=d.iddocente join carrera c on g.carrera_idcarrera=c.idcarrera
            where g.estatus='Activo';";
    $con = Conecta();
    $result = $con->query($sql);
    $con->close();
    return $result;
}
function SeleccionaTutoresSI() {
    $sql = "SELECT * FROM docente where tutor='Si';";
    $con = Conecta();
    $result = $con->query($sql);
    $con->close();
    return $result;
}
function SeleccionaGrupoTutor($id) {
    $sql = "SELECT g.grado,g.grupo FROM docente d join grupo g on d.iddocente=g.docente_iddocente where tutor='Si' and d.iddocente=$id;";
    $con = Conecta();
    $result = $con->query($sql);
    $con->close();
    return $result;
}
function SeleccionaAlumnosGrupo($id) {
    $sql = "select * from grupo g join grupo_has_alumno ga on g.idgrupo = ga.grupo_idgrupo join alumno a on ga.alumno_idalumno =a.idalumno where idgrupo=$id;";
    $con = Conecta();
    $result = $con->query($sql);
    $con->close();
    return $result;
}
function SeleccionaMateriasGrupo($id) {
    $sql = "select m.nombre,m.horas,m.descripcion,m.estatus from grupo g join grupo_has_materia gm on g.idgrupo=gm.grupo_idgrupo join materia m on gm.materia_idmateria=m.idmateria where g.idgrupo=$id";
    $con = Conecta();
    $result = $con->query($sql);
    $con->close();
    return $result;
}
?>