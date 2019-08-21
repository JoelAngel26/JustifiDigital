<?php

//require './Alumno.php';
class Db {
    

	// Host and Database information
	//private $host = "localhost:3309";
	private $host="https://github.com/JoelAngel26/ProyectoIntegradora_160744/blob/master/BD/BD.sql";
        private $user = "juliotorres.160271@gmail.com";
	private $pass = "1234";
	private $db   = "bd_dawjus";
	private $mysqli;

	public function __construct(){
		
		// Database Connection
		$this->mysqli = new Mysqli($this->host, $this->user, $this->pass, $this->db);
		
		// Checking the connection is okay or not
		if ($this->mysqli->connect_error) {
		    die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
		}
	}

	/**
	* Closing the DB connection
	* @params null
	* @return void 
	*/
	public function __destruct(){
		$this->mysqli->close();
	}

	/**
	* Data insertion in student table
	* @params $name, $email, $address
	* @return (int) insert_id
	*/
	public function insertCuenta($correo,$pass,$mat,$nom,$apa,$ama,$tel,$dir,$fec,$gen,$grupo){
                $rol=4;
                $status="Regular";
		$this->mysqli->query("INSERT INTO cuenta (idcuenta,correo,contrasenia,rol_idrol) VALUES (null, '$correo', '$pass', '$rol');");
		$idcuenta = $this->mysqli->insert_id;
               
                    $idAl = self::insertAlumno($mat,$nom,$apa,$ama,$tel,$dir,$fec,$gen,$status,$idcuenta);
                   
                if($idcuenta>0 && $idAl>0){
                     $idAG = self::insertAlumnoGrupo($grupo,$idAl);
                    return true;
                } else {
                    return false;
                }
		
	}
        public function insertAlumno($mat,$nom,$apa,$ama,$tel,$dir,$fec,$gen,$status,$cuenta){
                $sentenciaSQL="INSERT INTO alumno(idalumno,matricula,nombre,apaterno,amaterno,telefono,direccion,fecha_nac, genero, estatus,cuenta_idcuenta)"
                        . "VALUES (null,'$mat','$nom' ,'$apa', '$ama', '$tel', '$dir', '$fec', '$gen', '$status', '$cuenta');";
		$this->mysqli->query($sentenciaSQL);
		$idal = $this->mysqli->insert_id;
                return $idal;
	}
        public function insertAlumnoGrupo($grupo,$alumno){
                $sentenciaSQL="INSERT INTO grupo_has_alumno (grupo_idgrupo,alumno_idalumno) VALUES ('$grupo', '$alumno');";
                   
		$this->mysqli->query($sentenciaSQL);
		$idgrua = $this->mysqli->insert_id;
                return $idgrua;
	}
         public function insertTutorAlum($nom, $apa, $ama, $tel) {
        $sentenciaSQL = "INSERT INTO tutor_fam (idtutor_fam,nombre,apaterno,amaterno,telefono) VALUES (null,'$nom', '$apa', '$ama', '$tel');";
        $this->mysqli->query($sentenciaSQL);
        $idtut = $this->mysqli->insert_id;
        if ($idtut > 0) {
            $ultimoIdA = self:: UltimoIdAlumno();
            self::AsignaTutorAlum($ultimoIdA,$idtut);
            return true;
        } else {
            return false;
        }
        
    }

    public function AsignaTutorAlum($alumno,$tutor){
                $sentenciaSQL="UPDATE `bd_dawjus`.`alumno` SET `tutor_fam`='$tutor' WHERE `idalumno`='$alumno';";
		$this->mysqli->query($sentenciaSQL);
		$idtut = $this->mysqli->insert_id;
                return $idtut;
	}
        
        public function UltimoIdAlumno(){
		//$band=false;
            $ultimoID;
		$result= $this->mysqli->query("SELECT max(idalumno) as ultimo from alumno;")->fetch_assoc();
             $ultimoID = $result["ultimo"];
             
             return $ultimoID;
	}
        
        
        public function insertMateria($nom,$horas,$des) {
        $this->mysqli->query("INSERT INTO materia(idmateria,nombre,horas,descripcion,estatus) VALUES (null, '$nom', '$horas', '$des', 'Activo');");
        $idmateria = $this->mysqli->insert_id;
        if ($idmateria > 0) {
            return true;
        } else {
            return false;
        }
            }
             
        public function updateMateria($id,$nom,$horas,$des,$status) {
        return $this->mysqli->query("UPDATE materia SET nombre='$nom',horas='$horas',descripcion='$des', estatus='$status' WHERE idmateria='$id';");
            }
            
       public function insertCuentaDocente($correo,$pass,$ced,$nom,$apa,$ama,$fec,$dir,$gen,$tut){
                $rol=2;
                $status="Activo";
		$this->mysqli->query("INSERT INTO cuenta (idcuenta,correo,contrasenia,rol_idrol) VALUES (null, '$correo', '$pass', '$rol');");
		$idcuenta = $this->mysqli->insert_id;
               
                    $idDoc = self::insertDocente($ced,$nom,$apa,$ama,$fec,$dir,$gen,$status,$tut,$idcuenta);
                   
                if($idcuenta>0 && $idDoc>0){
                    return true;
                } else {
                    return false;
                }
		
	}
        
        public function insertDocente($ced,$nom,$apa,$ama,$fec,$dir,$gen,$status,$tut,$cuenta){
                $sentenciaSQL="INSERT INTO docente(iddocente,cedula,nombre,apaterno,amaterno,fecha_nac,direccion,genero,estatus,tutor,cuenta_idcuenta)"
                        . " VALUES (null,'$ced', '$nom', '$apa', '$ama', '$fec', '$dir', '$gen', '$status', '$tut', '$cuenta');";
		$this->mysqli->query($sentenciaSQL);
		$idDocente = $this->mysqli->insert_id;
                return $idDocente;
	}
         public function updateDocente($id,$ced,$nom,$apa,$ama,$fec,$dir,$gen,$status,$tut) {
            return $this->mysqli->query("UPDATE docente SET cedula='$ced',nombre='$nom',apaterno='$apa',amaterno='$ama',fecha_nac='$fec',direccion='$dir',genero='$gen',estatus='$status',tutor='$tut' WHERE iddocente='$id';");
            }
         public function updateCuentaDocente($idcuenta,$correo,$pass) {
            return $this->mysqli->query("UPDATE cuenta SET correo='$correo',contrasenia='$pass' WHERE idcuenta='$idcuenta';");
          }
          public function insertCarrera($nombre,$director){
                $sentenciaSQL="INSERT INTO carrera(idcarrera,nomcarrera,director_iddirector,status) VALUES (null, '$nombre', '$director','Activo');";
		$this->mysqli->query($sentenciaSQL);
		$idcarrera= $this->mysqli->insert_id;
                if($idcarrera>0){
                    return true;
                } else {
                    return false;
                }
	}
        public function updateCarrera($id,$nom,$dire,$estatus) {
        return $this->mysqli->query("UPDATE carrera SET nomcarrera='$nom',director_iddirector='$dire',status='$estatus' WHERE idcarrera='$id';");
            }
      public function insertGrupoWithTutor($grado,$grupo,$sistema,$estatus,$iddocente,$carrera_id){
                $sentenciaSQL="INSERT INTO grupo(grado,grupo,sistema,estatus,docente_iddocente,carrera_idcarrera) VALUES ('$grado', '$grupo', '$sistema', '$estatus', '$iddocente', '$carrera_id');";
		$this->mysqli->query($sentenciaSQL);
		$idgrupo= $this->mysqli->insert_id;
                if($idgrupo>0){
                    return true;
                } else {
                    return false;
                }
	}
        public function insertGrupoSinTutor($grado,$grupo,$sistema,$estatus,$carrera_id){
                $sentenciaSQL="INSERT INTO grupo(grado,grupo,sistema,estatus,docente_iddocente,carrera_idcarrera) VALUES ('$grado', '$grupo', '$sistema', '$estatus',null, '$carrera_id');";
		$this->mysqli->query($sentenciaSQL);
		$idgrupo= $this->mysqli->insert_id;
                if($idgrupo>0){
                    return true;
                } else {
                    return false;
                }
	}
}

?>