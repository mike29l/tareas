<?php
session_start();
include('Conexion.php');

if (isset($_POST['Usuario']) && isset($_POST['Clave'])) {

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $Usuario = validate($_POST['Usuario']);
    $Clave = validate($_POST['Clave']);

    if (empty($Usuario)) {
        header("Location: index.php?error=EL USUARIO ES REQUERIDO");
        exit();
    } elseif (empty($Clave)) {
        header("Location: index.php?error=LA CLAVE ES REQUERIDO");
        exit();
    } else {
        
        //$Clave = md5($Clave);

        $Sql = "SELECT * FROM Usuarios WHERE Usuario = '$Usuario' AND Clave = '$Clave'";
        $result = mysqli_query($connect, $Sql); // Aquí utilizamos $connect en lugar de $conexion

        if (mysqli_num_rows($result) === 1 ) {
            $row = mysqli_fetch_assoc($result);
            if ($row['Usuario'] === $Usuario && $row['Clave'] === $Clave) {
                $_SESSION['Usuario'] = $row['Usuario'];
                $_SESSION['Nombre_Completo'] = $row['Nombre_Completo'];
                $_SESSION['id'] = $row['id'];
                header("Location: https://mikecochito.000webhostapp.com/CRUD/index1.php");
                exit();
            } else {
                header("Location: index.php?error=el ususario o la clave es incorrectas");
                exit();
            }
        } else {
            header("Location: index.php?error=el ususario o la clave es incorrectas");
            exit();
        }
    }
} else {
    header("Location: index.php");
    exit();
}
?>
