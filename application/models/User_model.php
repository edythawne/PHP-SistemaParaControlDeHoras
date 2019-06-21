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
        $sql = "SELECT SUM(TIMESTAMPDIFF(MINUTE, al_entrada, al_salida)) DIV 60 AS HorasCumplidas FROM Horarios WHERE fk_alumno = $id_alumno";
        $query = $this -> db -> query($sql);
        $result =  $query -> result_array();
        $this -> db -> close();

        return $result;
    }

    /**
     * Mostrar las fechas de los registros
     * @param $id_alumno
     * @return mixed
     */
    public function mostrarRegistroHorasCumplidas($id_alumno){
        $this -> load -> database();

        $sql = "SELECT fk_alumno, DATE(al_entrada) AS fecha_entrada, DATE(al_salida) AS fecha_salida, DATE_FORMAT(al_entrada, '%T') ".
                    "AS hora_entrada, DATE_FORMAT(al_salida, '%T') AS hora_salida FROM Horarios WHERE fk_alumno = $id_alumno ".
                    "ORDER BY fecha_entrada DESC";
        $query = $this -> db -> query($sql);
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
     * @param $id_alumno
     * @return int
     */
    public function existeRegistroHoy($id_alumno){
        $this -> load -> database();

        $date = date('Y-m-d');
        $sql = "SELECT * FROM Horarios WHERE fk_alumno = $id_alumno AND DATE(al_entrada) = '$date';";
        $query = $this -> db -> query($sql);
        $result =  $query -> result_array();

        $this -> db -> close();

        return count($result);
    }
}