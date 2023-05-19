<?php
class Peliculas
{

    private $id;
    private $nombre;
    private $imagen;
    private $fecha_estreno;
    private $sinopsis;
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    //ESTE ES EL ACTION PARA TRAER EL JSON DESDE EL API Y LISTAR LAS PELICULAS
    public function get_peliculas()
    {
        $url = 'https://api.themoviedb.org/3/discover/movie?language=es-ES&api_key=f3e276365bb3eb16517ed293a782a321';
        $json = file_get_contents($url);
        $array = json_decode($json, true);

        return $array;
    }



    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }


    public function getNombre()
    {
        return $this->nombre;
    }


    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }


    public function getImagen()
    {
        return $this->imagen;
    }

    public function setImagen($imagen)
    {
        $this->imagen = $imagen;

        return $this;
    }


    public function getFecha_estreno()
    {
        return $this->fecha_estreno;
    }

    public function setFecha_estreno($fecha_estreno)
    {
        $this->fecha_estreno = $fecha_estreno;

        return $this;
    }

    public function getSinopsis()
    {
        return $this->sinopsis;
    }


    public function setSinopsis($sinopsis)
    {
        $this->sinopsis = $sinopsis;

        return $this;
    }
    //ESTE ES EL ACTION DONDE SE CREA LA QUERY DE GUARDADO DE PELICULAS NUEVAS EN BASE DE DATOS
    public function save()
    {
        $sql = "INSERT INTO peliculas VALUES(null,'{$this->getNombre()}','{$this->getImagen()}','{$this->getFecha_estreno()}','{$this->getSinopsis()}');";
        $save = $this->db->query($sql);
        $result = false;
        if ($save) {
            $result = true;
        }
        return $result;
    }

    //ESTE ES EL ACTION PARA LISTAR LAS PELICULAS GUARDADAS EN BASE DE DATOS
    public function getAll()
    {
        $peliculas = $this->db->query('select * from peliculas order by id desc');

        return $peliculas;
    }

    //ESTE ES EL ACTION PARA LISTAR LAS PELICULAS POR NOMBRE GUARDADAS EN BASE DE DATOS
    public function getByName($name)
    {
        $pelicula = $this->db->query("select * from peliculas where nombre like '%{$name}%'");
        return $pelicula;
    }
}
