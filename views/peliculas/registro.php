<!--FORMULARIO PARA LA CREACION DE LAS PELICULAS EN BASE DE DATOS-->
<div id="central">
    <h1>Crear Pelicula</h1>
    <?php if (isset($_SESSION['register']) && $_SESSION['register'] == 'complete') : ?>

        <h2 class="alert_green">La Pelicula se ha guardado correctamente</h2>
    <?php elseif (isset($_SESSION['register']) && $_SESSION['register'] == 'failed') : ?>
        <h2 class="alert_red">Registro fallido, Por favor verifique los datos</h2>

    <?php else : ?>

    <?php endif; ?>
    <?php Utils::deleteSessions('register'); ?>
    <form id='crear' action="<?= base_url ?>peliculas/save" method="post" enctype="multipart/form-data">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" required />
        <label for="fecha_estreno">Fecha de Estreno:</label>
        <input type="date" name="fecha_estreno" id="fecha_estreno" required />
        <label for="sinopsis">Sinopsis</label>
        <textarea name="sinopsis" id="sinopsis" required></textarea>
        <label for="imagen">Imagen</label>
        <input type="file" name="imagen" id="imagen" required />

        <input type="submit" value="Registrarse">
    </form>