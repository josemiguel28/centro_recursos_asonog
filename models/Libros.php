<?php

namespace Model;

use Model\ActiveRecord;

class Libros extends ActiveRecord
{
    protected static $tabla = 'libros';
    protected static $columnasDB = ['id', 'titulo', 'autor', 'id_categoria', 'anio', 'imagen', 'estado', 'archivo_url'];

    public $id;
    public $titulo;
    public $autor;
    public $id_categoria;
    public $anio;
    public $imagen;
    public $estado;
    public $archivo_url;


    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->titulo = $args['titulo'] ?? '';
        $this->autor = $args['autor'] ?? '';
        $this->id_categoria = $args['id_categoria'] ?? '';
        $this->anio = $args['anio'] ?? '1';
        $this->imagen = $args['imagen'] ?? '';
        $this->estado = $args['estado'] ?? 'ACT';
        $this->archivo_url = $args['archivo_url'] ?? '';
    }


    public static function getAllBooks(): array
    {
        $sql = "SELECT libros.id, 
                libros.titulo,
                libros.autor, 
                libros.imagen, 
                libros.estado, 
                libros.archivo_url, 
                libros.anio, 
                libros_categorias.nombre id_categoria -- nombre de la categoria
                FROM " . self::$tabla
            . " join libros_categorias on "
            . " libros_categorias.id_categoria = libros.id_categoria "
            . " order by libros.id desc;";
        return self::SQL($sql);
    }

    public static function countAllBooks(): int
    {
        $sql = "SELECT COUNT(*) as total FROM " . self::$tabla;
        $resultado = self::$db->query($sql);
        $row = $resultado->fetch_assoc();
        $resultado->free();
        return (int) ($row['total'] ?? 0);
    }

    public static function getAdminPaginatedBooks(int $limit, int $offset): array
    {
        $sql = "SELECT libros.id,
                libros.titulo,
                libros.autor,
                libros.imagen,
                libros.estado,
                libros.archivo_url,
                libros.anio,
                libros_categorias.nombre id_categoria
                FROM " . self::$tabla .
               " JOIN libros_categorias ON libros_categorias.id_categoria = libros.id_categoria
                ORDER BY libros.id DESC
                LIMIT {$limit} OFFSET {$offset}";
        return self::SQL($sql);
    }

    public static function getAllActiveBooks(): array
    {
        $sql = "SELECT * FROM " . self::$tabla . " WHERE estado = 'ACT'";
        return self::consultarSQL($sql);
    }

    public static function getActiveBooksWithLimit($limit = 4): array
    {
        $sql = "select 
                libros.id, 
                libros.titulo,
                libros.autor, 
                libros.imagen, 
                libros.estado, 
                libros.archivo_url, 
                libros_categorias.nombre id_categoria FROM "
            . self::$tabla . " 
                
                join libros_categorias on
                
                libros_categorias.id_categoria = libros.id_categoria
                                  
                WHERE estado = 'ACT' order by libros.id desc LIMIT {$limit}";;

        return self::SQL($sql);
    }

    public static function getBookById($id)
    {
        $sql = "SELECT * FROM " . self::$tabla . " WHERE id = ${id}";
        return self::consultarSQL($sql);
    }

    public static function getBookCategoriesWithLimit()
    {
        $sql = "SELECT * FROM  libros_categorias LIMIT 4";
        return self::SQL($sql);
    }

    public static function getBooksCategories()
    {
        $sql = "SELECT * FROM  libros_categorias; ";
        return self::SQL($sql);
    }

    public static function filterBooksByCategory($categoria)
    {
        $sql = "SELECT libros.id, 
                libros.titulo,
                libros.autor, 
                libros.imagen, 
                libros.estado, 
                libros.archivo_url, 
                libros_categorias.nombre id_categoria FROM "
            . self::$tabla
            . " join libros_categorias on
                
                libros_categorias.id_categoria = libros.id_categoria 
                
                WHERE libros.id_categoria = '{$categoria}' 
                AND libros.estado = 'ACT'";

        return self::consultarSQL($sql);
    }

    public static function getPaginatedBooks($limit, $offset)
    {
        $sql = "SELECT libros.id, 
                libros.titulo,
                libros.autor, 
                libros.imagen, 
                libros.estado, 
                libros.archivo_url, 
                libros_categorias.nombre id_categoria FROM "
            . self::$tabla
            . " join libros_categorias on
                
                libros_categorias.id_categoria = libros.id_categoria 
                
                WHERE libros.estado = 'ACT' order by libros.id desc
                LIMIT {$limit} OFFSET {$offset}";

        return self::consultarSQL($sql);
    }

    public static function searchBook($search)
    {
        $sql = "SELECT libros.id, 
                libros.titulo,
                libros.autor, 
                libros.imagen, 
                libros.estado, 
                libros.archivo_url, 
                libros_categorias.nombre id_categoria FROM "
            . self::$tabla
            . " join libros_categorias on
                
                libros_categorias.id_categoria = libros.id_categoria 
                
                WHERE (libros.titulo LIKE '%{$search}%' 
                OR libros_categorias.nombre LIKE '%{$search}%') 
                AND libros.estado = 'ACT'";

        return self::consultarSQL($sql);
    }

    public function setFileName($nombre, $tipo): void
    {
        if (isset($this->id)) {
            // $this->deleteImage();
        }
        //asignar al atributo de la imagen el nombre de la imagen

        switch ($tipo) {
            case 'imagen':
                $this->imagen = $nombre;
                break;
            case 'archivo':
                $this->archivo_url = $nombre;
                break;
        }
    }

    public static function getRegisteredBooks()
    {
        $query = "SELECT * FROM " . self::$tabla;
        return self::consultarSQL($query);
    }
}

