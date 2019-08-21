<?php

include_once '../phpfiles/libreria.php';
include '../helps/helps.php';
session_start();

header('Content-type: application/json');
$resultado = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["txtUsuario"]) && isset($_POST["txtPassword"])) {

        $txtUsuario = validar_campo($_POST["txtUsuario"]);
        $txtPassword = validar_campo($_POST["txtPassword"]);

        $acceso = logincuenta($txtUsuario, $txtPassword);
        $fila = $acceso->fetch_assoc();
        $idcuenta = $fila['idcuenta'];
        $idRol = $fila['rol_idrol'];


        $resultado = array("estado" => "true");
        if ($idcuenta > 0) {
            if ($idRol == 1) {
                $userAdmin = getUserAdministrador($idcuenta, $idRol);
                while ($f1 = $userAdmin->fetch_assoc()) {
                    $_SESSION["usuario"] = array(
                        "nombre" => $f1['nombre'],
                        "email"=>$f1['correo'],
                        "apaterno" => $f1['apaterno'],
                        "genero" => $f1['genero'],
                        "privilegio"=> $f1['nombrerol']
                    );
                }
            }
            if ($idRol == 2) {
                $userAdmin = getUserDocente($idcuenta, $idRol);
                while ($f3 = $userAdmin->fetch_assoc()) {
                    $_SESSION["usuario"] = array(
                        "iddocente" => $f3['iddocente'],
                        "nombre" => $f3['nombre'],
                        "email"=>$f3['correo'],
                        "apaterno" => $f3['apaterno'],
                        "genero" => $f3['genero'],
                        "tutor" => $f3['tutor'],
                        "privilegio"=> $f3['nombrerol']
                    );
                }
            }
             if ($idRol == 3) {
                $userAdmin = getUserDirector($idcuenta, $idRol);
                while ($f4 = $userAdmin->fetch_assoc()) {
                    $_SESSION["usuario"] = array(
                        "nombre" => $f4['nombre'],
                        "email"=>$f4['correo'],
                        "apaterno" => $f4['apaterno'],
                        "genero" => $f4['genero'],
                        "privilegio"=> $f4['nombrerol']
                    );
                }
            }

            if ($idRol == 4) {
                $userAlumno = getUserAlumno($idcuenta, $idRol);
                while ($f2 = $userAlumno->fetch_assoc()) {
                    $_SESSION["usuario"] = array(
                        "idalumno" => $f2['idalumno'],
                        "matricula" => $f2['matricula'],    
                        "nombre" => $f2['nombre'],
                        "matricula"=>$f2['matricula'],
                        "apaterno" => $f2['apaterno'],
                        "genero" => $f2['genero'],
                        "privilegio"=> $f2['nombrerol']
                    );
                }
            }

            return print(json_encode($resultado));
        }
    }
}

$resultado = array("estado" => "false");
return print(json_encode($resultado));
