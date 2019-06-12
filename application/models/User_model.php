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
    public function searchUserForPassword($user, $password){
        $this -> load -> database();

        $this -> db -> select('id_alumno, nombre, apellidos');
        $this -> db -> where('usuario', $user);
        $this -> db -> where('contrasena', $password);
        $query = $this -> db -> get('Alumnos');
        $result =  $query -> result_array();
        $this -> db -> close();

        return $result;
    }
}