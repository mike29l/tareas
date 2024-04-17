<?php 
include ('connection.php');
$con = connection();

// Verificar si se han enviado todos los campos del formulario
if(isset($_POST['nombre'], $_POST['matricula'], $_POST['carrera'], $_POST['foto'])) {
    // Obtener datos del formulario y limpiarlos
    $nombre = mysqli_real_escape_string($con, $_POST['nombre']);
    $matricula = mysqli_real_escape_string($con, $_POST['matricula']);
    $carrera = mysqli_real_escape_string($con, $_POST['carrera']);
    $foto = mysqli_real_escape_string($con, $_POST['foto']);

    // Verificar que ninguno de los campos esté vacío
    if(!empty($nombre) && !empty($matricula) && !empty($carrera) && !empty($foto)) {
        // Consulta SQL
        $sql = "INSERT INTO alumnos (nombre, matricula, carrera, foto) VALUES ('$nombre', '$matricula', '$carrera', '$foto')";
        $query = mysqli_query($con, $sql);

        if($query){
            // Redireccionar si la consulta se ejecutó correctamente
            header("Location: index1.php");
            exit; // Detener la ejecución del script después de la redirección
        } else {
            // Manejar el error si la consulta falla
            echo "Error al agregar usuario: " . mysqli_error($con);
        }
    } else {
        // Mostrar un mensaje de error utilizando JavaScript
        echo '<script>alert("Error: Todos los campos son requeridos"); window.location.href = window.location.href;</script>';
    }
} else {
    // Manejar el caso en que no se hayan enviado todos los campos del formulario
    echo "Todos los campos del formulario son requeridos";
}

// Cerrar la conexión
mysqli_close($con);
?>
