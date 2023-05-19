<!--VISTA DE LAS PELICULAS GUARDADAS EN LA BASE DE DATOS-->
<div id="central">
    <h1>Mis Peliculas</h1>
    <form action="" method="post">
        <label for="campo">Buscar</label>
        <input type="text" name="campo" id="campo" />

    </form>

    <div id="peliculas">

        <?php if ($busqueda->num_rows > 0) : ?>
            <?php while ($fila = $busqueda->fetch_assoc()) : ?>
                <div class="movie">
                    <img src="<?= base_url . 'uploads/images/' . $fila['IMAGEN'] ?>" alt="<?= $fila['IMAGEN'] ?>">
                    <h2><?= $fila['NOMBRE'] ?></h2>
                    <?= $fila['FECHA_ESTRENO'] ?>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>