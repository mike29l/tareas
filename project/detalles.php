<?php
require 'config/config.php';
require 'config/database.php';
$db = new Database();
$con = $db->conectar();

$id = isset($_GET['id']) ?$_GET['id'] : '';
$token = isset($_GET['token']) ?$_GET['token'] : '';

if($id == '' || $token ==''){
    echo 'error de la peticion';
    exit;
}else {

    $token_tmp = hash_hmac('sha1' , $id, KEY_TOKEN);

    if($token == $token_tmp){

        $sql =$con->prepare("SELECT count(id) FROM productos WHERE id=? AND activo=1");
        $sql->execute([$id]);
        if($sql->fetchColumn() > 0){
            $sql =$con->prepare("SELECT nombre, descripcion, edad FROM productos WHERE id=? AND activo=1
            LIMIT 1");
            $sql->execute([$id]);
            $row = $sql->fetch(PDO::FETCH_ASSOC);
            $nombre = $row['nombre'];
            $descripcion = $row['descripcion'];
            $edad = $row['edad'];



            $dir_images = 'imagenes/productos/' . $id . '/';

            $rutaImg = $dir_images . '1.jpg';

            if (!file_exists($rutaImg)) {
                $rutaImg = 'imagenes/no-photo.jpg';
            }

            $imagenes = array();
            $dir = dir($dir_images);

            while (($archivo = $dir->read()) != false) {
                if ($archivo != '1.jpg' && (strpos($archivo, 'jpg') || strpos($archivo, 'jpeg'))) {
                    $imagenes[] = $dir_images . $archivo;
                }
            }
            $dir->close();
        }
        $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);

    }else{
        echo 'error de la peticion';
        exit;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mike</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
    crossorigin="anonymous">
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <main>
        <div class="container">
            <div class="row">
                <div class="col-md-6 order-md-1">
                    <img src="<?php echo $rutaImg; ?>" width="500" height="350">
                </div>
                <div class="col-md-6 order-md-2">
                    <h2><?php echo $nombre; ?></h2>
                    <p class="lead">
                        <?php echo $descripcion; ?>
                    </p>
                    

                    <div clas="d-grid gap-3 col-10 mx-auto">
                        <button class="btn" type="button" onclick="location.href='index.php'">regresar al inico</button>
                    </div>
                </div>
            </div>
        </div>
    </main>

                    <p class="lea">
                        <?php echo $edad; ?>
                    </p>
    

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" 
crossorigin="anonymous"></script>
</body>
</html>