<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    /**
     * UserModel constructor.
     */
    public function __construct(){
        parent::__construct();
    }

    /**
     * Busca un alumno según su usuario y contraseña
     * @param $user
     * @param $password
     * @return mixed
     */
    public function buscarAlumno($user, $password){
        $this -> load -> database();

        $this -> db -> select('id_alumno, nombre, apellidos');
        $this -> db -> where('usuario', $user);
        $this -> db -> where('contrasena', $password);
        $query = $this -> db -> get('Alumnos');
        $result =  $query -> result_array();
        $this -> db -> close();

        return $result;
    }

    /**
     * Obtener las horas cumplidas de un alumno
     * @param $id_alumno
     * @return mixed
     */
    public function horasCumplidas($id_alumno){
        $this -> load -> database();

        $this -> db -> select("SUM(TIMESTAMPDIFF(MINUTE, al_entrada, al_salida)) DIV 60 AS HorasCumplidas");
        $this -> db -> where("fk_alumno", $id_alumno);
        $query = $this -> db -> get("Horarios");
        $result =  $query -> result_array();
        
        $this -> db -> close();

        return $result;
    }

    /**
     * Mostrar las fechas de los registros
     * @param $id_alumno
     * @return mixed
     */
    public function mostrarPrimerosRegistros($id_alumno){
        $this -> load -> database();

        $this -> db -> select("fk_alumno, DATE(al_entrada) AS fecha_entrada, DATE(al_salida) AS fecha_salida, DATE_FORMAT(al_entrada, '%T') AS hora_entrada, DATE_FORMAT(al_salida, '%T') AS hora_salida");
        $this -> db -> where("fk_alumno", $id_alumno);
        $this -> db -> order_by("fecha_entrada", "DESC");
        //$this -> db -> limit(10);
        $query = $this -> db -> get('Horarios');
        $result =  $query -> result_array();

        $this -> db -> close();

        return $result;
    }

    /**
     * Agregar un nuevo registro
     * @param $data
     * @return mixed
     */
    public function agregarRegistro($data){
        $this -> load -> database();
        $result = $this -> db -> insert('Horarios', $data);
        $this -> db -> close();

        print_r($result);
        return $result;
    }

    /**
     * Checar si existe un registro hoy
     * @param $id_alumno
     * @return int
     */
    public function checarRegistroHoy($id_alumno){
        $this -> load -> database();

        $this -> db -> select('id_horario, al_entrada, al_salida');
        $this -> db -> where('fk_alumno', $id_alumno);
        $this -> db -> where('DATE(al_entrada)', date('Y-m-d'));
        $query = $this -> db -> get('Horarios');
        $result =  $query -> result_array();

        $this -> db -> close();

        return count($result);
    }

    /**
     * Mostrar datos del registro de hoy.
     * @param $id_alumno
     * @return mixed
     */
    public function mostrarRegistroHoy($id_alumno){
        $this -> load -> database();

        $this -> db -> select('id_horario, al_entrada');
        $this -> db -> where('fk_alumno', $id_alumno);
        $this -> db -> where('DATE(al_entrada)', date('Y-m-d'));
        $this -> db -> where('salida IS NULL', null);
        $query = $this -> db -> get('Horarios');
        $result =  $query -> result_array();

        $this -> db -> close();

        return $result;
    }

    /**
     * Agregar al registro del dia hora de salida
     * @param $id_alumno
     * @param $data
     * @return mixed
     */
    public function agregarSalidaRegistro($id_alumno, $data){
        $this -> load -> database();

        $this -> db -> where('fk_alumno', $id_alumno);
        $this -> db -> where('DATE(al_entrada)', date('Y-m-d'));
        $result = $this -> db -> update('Horarios', $data);

        $this -> db -> close();

        return $result;
    }

    /**
     * Contar los registros por alumno
     * @param $id_alumno
     * @return mixed
     */
    public function contarTodoRegistroAlumno($id_alumno){
        $this -> load -> database();

        $this -> db -> select('COUNT(entrada) AS registros', null);
        $this -> db -> where ('fk_alumno', $id_alumno);
        $query = $this -> db -> get('Horarios');
        $result = $query -> result_array();

        $this -> db -> close();

        return $result[0]['registros'];
    }

    public function mostrarRegistrosPaginacion($id_alumno, $start){
        $this -> load -> database();

        $this -> db -> where ('fk_alumno', $id_alumno);


        $this -> db -> close();
    }
}