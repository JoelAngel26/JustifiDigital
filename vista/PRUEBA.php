<?php include '../phpfiles/Db.php';?>
<?php include '../phpfiles/libreria.php';?>
<?php

//valor inicial de la cadena Consulta
$Consulta = "SELECT * FROM filtros WHERE";
//Pregunto si ha sido enviado el formulario , en este caso si el arreglo POST presenta el indice enviar que no es mas que el nombre del botón del formulario
if(isset($_POST["enviar"])){
    $class = new Db();
    $length = count($_POST["materias"]); 
    for($i=0;$i<$length;$i++){ 
        $class->insertTable($_POST["materias"][$i]);
       $Consulta .=" ".$_POST["materias"][$i];
    }

}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Checks</title>
</head>
<body>
<form method="Post">
    <?php

$id=3;
$result = ObtenerMateriasByAlumno($id);

while($fila = $result->fetch_assoc()){ ?>
<label>  <input type="checkbox" name="materias[]" value="<?php echo $fila['idmateria'];?>"><?php echo $fila['nombre']; ?></label>

<?php    }

?>
    <input type="submit" name="enviar" value="Enviar">
</form>
<br>
<?php echo $Consulta; ?>
</body>
</html>


<?php

