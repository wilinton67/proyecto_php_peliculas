<!--CABECERA DE LA APLICACION-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peliculas</title>
    <link rel="stylesheet" href="<?= base_url ?>assets/css/styles.css">
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>

</head>

<body>
    <div id="container">
        <!-- CABECERA -->

        <header id="header">
            <div id="logo">
                <img src="<?= base_url ?>assets/img/peliculas.png" alt="Peliculas" />
                <a href="index.php">
                    <h1>Peliculas</h1>
                </a>
            </div>
        </header>
        <!-- MENU -->
        <nav id="menu">
            <ul>
                <li><a href="<?= base_url ?>">Inicio</a></li>
                <li><a href="<?= base_url ?>peliculas/getByName">Mis Peliculas</a></li>
                <li><a href="<?= base_url ?>peliculas/registro">Crear Pelicula</a></li>
            </ul>
        </nav>
        <div id="content">