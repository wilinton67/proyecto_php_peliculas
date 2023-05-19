<!--LISTA DE LAS PELICULAS QUE TRAE LA API-->
<div id="central">
    <h1>Peliculas</h1>

    <div id="peliculas">
        <?php foreach ($data as $peli) : ?>
            <div class="movie">
                <?= $peli['imagen'] ?>
                <h2><?= $peli['nombre'] ?></h2>
                <?= $peli['fecha_estreno'] ?>
            </div>
        <?php endforeach; ?>
    </div>