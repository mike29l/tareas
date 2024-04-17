<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE-edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>inicio de sesion</title>
  <link rel="shortcut icon" href="descarga.jpeg">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <form action="IniciarSesion.php" method="POST">
      <h1>INICIO DE SESION</h1>
      <hr>
      <?php 
      if (isset($_GET['error'])) {
       ?>
       <p class="error">
        <?php 
        echo $_GET['error']
        ?>
       </p>
       <?php
        }
      ?>
      <hr>
      <i class="fa-solid fa-user"></i>
        <label>Usuario</label>
        <input type="text" name ="Usuario" placeholder="Nombre de Usuario">

        <i class="fa-solid fa-unclock"></i>
        <label>Clave</label>
        <input type="text" name ="Clave" placeholder="Clave"> 
        <hr>
        <button type="submit">Iniciar Sesion</button>
    </form>

    <style>
    
    body{
    background-image: url('img.jpeg');
    justify-content: center;
    align-items: center;
    flex-direction: column;
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size:cover;
}

*{
    font-family: 'Lato', sans-serif;
    font-family: 'Open Sans', sans-serif;
    font-family: 'PT Sans', sans-serif;
    box-sizing: border-box;
}

form{
    margin-top: 10%;
    margin-left:27%;
    width: 600px;
    border: 2px solid black;
    padding: 6rem;
    background-color: transparent;
    border-radius: 20px;
    border-color:white;
    color: aliceblue;
}

h1{
    display: block;
    border: 2px solid black;
    width: 90%;
    padding: 10px;
    margin: 10px;
    border-radius: 10px;
    color:transparent;
    background-clip:text;
    background: linear-gradient(#1497be,#1c2aec);
    -webkit-background-clip:text;
    -moz-background-clip:text;
    animation: text 5s linear infinite;
}
@keyframes text{
    0%{
      filter: hue-rotate(0deg);
    }
    100%{
      filter:hue-rotate(360deg);
    }
}
label{
    color: aliceblue;
    font-size: 18px;
    padding: 10px;
    font-weight: 300;
}

input{
    display: block;
    border: 2px solid black;
    width: 95%;
    padding: 10px;
    margin: 10px;
    border-radius: 10px;
}

button{
    float: right;
    background-color: blanchedalmond;
    padding: .5rem;
    color: black;
    border: none;
    width: 40%;
    border-radius: 5px;
    margin-right: 10px;
}

button:hover{
    background-color: rgb(114, 175, 228);
    color: aliceblue;
}

a{
    float: left;
    margin-left: 10px;
    padding: .5rem;
    text-decoration: none;
}

a:hover{
    color: white;
}

.error{
    background-color: rgb(186, 32, 32);
   color: black;
   padding: 10px;
   width: 95%;
   border-radius: 5px;
   margin: 20px auto;
}
    </style>
</body>
</html>