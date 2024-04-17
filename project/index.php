<?php

require 'config/config.php';
require 'config/database.php';
$db = new Database();
$con = $db->conectar();

$sql =$con->prepare("SELECT id, nombre FROM productos WHERE activo=1");
$sql->execute();
$resultado = $sql->fetchAll(PDO::FETCH_ASSOC);

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
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
<header>
        <nav>
			<ul>
                <li><a href="index.php"><span class="icon-home"></span>Inicio</a></li>
				<li><a href="https://museodepaleo.000webhostapp.com/menu.html" target="_blank"><span class="icon-home" ></span>Artículos</a></li>
				<li><a href="https://sketchfab.com/MuseoPaleontologia" target="_blank"><span class="icon-chrome"></span>Coleccion Virtual</a></li>
                <div class="p"><p>MUSEO DE PALEONTOLOGIA</p></div>			
            </ul>
		</nav>
    </header>
    
    <main>
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <?php foreach($resultado as $row){?>
                <div class="col">
                    <div class="card shadow-sm">
                        <?php 

                        $id = $row['id'];
                        $imagen = "imagenes/productos/" . $id . "/1.jpg";

                        if(!file_exists($imagen)) {
                            $imagen = "imagenes/no-photo.jpg";
                        }
                        ?>
                        <img src="<?php echo $imagen; ?>">
                        <div class="card-body">
                                <h5 class="card-title"><?php echo $row['nombre']; ?></h5>
                               
                                    <div class="btn-group">
                                        <a href="detalles.php?id=<?php echo $row['id']; ?>&token=<?php echo 
                                        hash_hmac('sha1', $row['id'], KEY_TOKEN); ?>" class="btn 
                                        btn-primary">INFORMACION</a>  
                                    </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" 
crossorigin="anonymous"></script>
</body>
</html>