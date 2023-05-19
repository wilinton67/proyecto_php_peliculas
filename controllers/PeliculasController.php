<?php
require_once 'models/Peliculas.php';
class PeliculasController
{

    public function index()
    {
        require_once './views/peliculas/listar.php';
    }
    // ESTE EL METODO QUE ENVIA LA INFORMACION A LA VISTA PARA LISTAR LAS PELICULAS TOMADAS DESDE LA API
    public function listar()
    {
        $peliculas = new Peliculas();
        $datos = $peliculas->get_peliculas();
        $data = array();
        foreach ($datos['results'] as $row) {
            $sub_array = array();
            $sub_array['imagen'] = '<img src="https://www.themoviedb.org/t/p/w220_and_h330_face' . $row["poster_path"] . '" class="img thumbnail"/>';
            $sub_array['nombre'] = $row["original_title"];
            $sub_array['fecha_estreno'] = $row["release_date"];
            $data[] = $sub_array;
        }

        //var_dump(json_encode($results))
        require_once 'views/peliculas/listar.php';
        //var_dump(json_encode($results)); //json_encode($results);
    }
    //ESTE EL METODO QUE REDIRIGE A LA VISTA DE CREACION DE PELICULAS
    public function registro()
    {
        require_once './views/peliculas/registro.php';
    }
    //ESTE EL METODO EN EL QUE SE REALIZA EL GUARDADO EN BASE DE DATOS
    public function save()
    {
        if (isset($_POST)) {
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $fecha_estreno = isset($_POST['fecha_estreno']) ? $_POST['fecha_estreno'] : false;
            $sinopsis = isset($_POST['sinopsis']) ? $_POST['sinopsis'] : false;

            if ($nombre && $fecha_estreno && $sinopsis) {
                $pelicula = new Peliculas();
                $pelicula->setNombre($nombre);
                $pelicula->setFecha_estreno($fecha_estreno);
                $pelicula->setSinopsis($sinopsis);

                //Guardar imagen
                $file = $_FILES['imagen'];
                $filename = $file['name'];
                $mimetype = $file['type'];

                if ($mimetype == 'image/jpg' || $mimetype == 'image/jpeg' || $mimetype == 'image/png' || $mimetype == 'image/gif') {
                    if (!is_dir('uploads/images')) {
                        mkdir('uploads/images', 0777, true);
                    }
                    move_uploaded_file($file['tmp_name'], 'uploads/images/' . $filename);
                    $pelicula->setImagen($filename);
                }

                $save = $pelicula->save();
                if ($save) {
                    $_SESSION['register'] = 'complete';
                } else {
                    $_SESSION['register'] = 'failed';
                }
            } else {
                $_SESSION['register'] = 'failed';
            }
        } else {
            $_SESSION['register'] = 'failed';
        }
        header("Location:" . base_url . 'peliculas/registro');
    }

    //ESTE ES EL ACTION PARA LISTAR TODAS LAS PELICULAS GUARDADAS EN BASE DE DATOS
    public function getAll()
    {
        $pelicula = new Peliculas();
        $peliculas = $pelicula->getAll();
        require_once './views/peliculas/misPeliculas.php';
    }

    //ESTE ES EL ACTION PARA LISTAR TODAS LAS PELICULAS O BUSCAR POR NOMBRE GUARDADAS EN BASE DE DATOS
    public function getByName()
    {

        $campo = isset($_POST['campo']) ? $_POST['campo'] : false;
        if (isset($_POST['campo']) && $campo != false) {
            $pelicula = new Peliculas();
            $busqueda = $pelicula->getByName($campo);
            if ($busqueda->num_rows > 0) {
                while ($fila = $busqueda->fetch_assoc()) {
                    $salida = '<div class="movie">
                    <img src="' . base_url . 'uploads/images/' . $fila['IMAGEN'] . '" alt="' . $fila['IMAGEN'] . '">
                    <h2>' . $fila['NOMBRE'] . '</h2>' .
                        $fila['FECHA_ESTRENO'] . '
                </div>';
                }
            } else {
                $salida = 'No hay datos';
            }


            echo $salida;
        } else {
            $pelicula = new Peliculas();
            $busqueda = $pelicula->getAll();
            require_once './views/peliculas/misPeliculas.php';
        }
    }
}
