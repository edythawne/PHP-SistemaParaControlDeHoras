<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admon_model extends CI_Model {

    // Tables
    const tabla_alumno = 'Alumnos';
    const tabla_horario = 'Horarios';
    const tabla_admon = 'Administradores';

    // Join
    const inner = 'inner';
	const left = 'left';
    const inner_join_alumno_w_horario = 'Alumnos.id_alumno = Horarios.fk_alumno';

    // Tabla Admon & Alumnos
    const usuario_usuario = 'usuario';
    const usuario_contrasena = 'contrasena';
    const usuario_datos_1 = 'id_admin, nombre, apellidos';

    const alumno_id_alumno = 'id_alumno';
    const alumno_fk_alumno = 'fk_alumno';
    const alumno_datos1 = 'Alumnos.id_alumno, Alumnos.nombre, Alumnos.apellidos, SUM(TIMESTAMPDIFF(MINUTE, al_entrada, al_salida)) DIV 60 AS horas_cumplidas';

    /**
     * Admon_model constructor.
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Busca un admon según su usuario y contraseña
     * @param $user
     * @param $password
     * @return mixed
     */
    public function buscarAdmon($user, $password){
		$this -> load -> database();

		$this -> db -> select(self::usuario_datos_1);
		$this -> db -> where(self::usuario_usuario, $user);
		$this -> db -> where(self::usuario_contrasena, $password);
		$query = $this -> db -> get(self::tabla_admon);
		$result =  $query -> result_array();
		$this -> db -> close();

		return $result;
    }

    /**
     * Muestro los datos del alumno {id, nombre, apellidos, horas_cumplidas}
     * @param $id
     * @return mixed
     */
    public function mostrarInfoHorasAlumnos(){
        $this -> load -> database();

        $this -> db -> select(self::alumno_datos1);
        $this -> db -> from(self::tabla_alumno);
        $this -> db -> join(self::tabla_horario, self::inner_join_alumno_w_horario, self::left);
        //$this -> db -> where(self::alumno_fk_alumno, $id);
        $this -> db -> where('Alumnos.estado', 'ACTIVO');
        $this -> db -> group_by('Alumnos.id_alumno');

        $query = $this -> db -> get();
        //print_r($this -> db -> last_query());
        //print_r($result);
        $result =  $query -> result_array();
        $this -> db -> close();

        return $result;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function mostrarTodaInformacionAlumno($id){
        $this -> load -> database();
        $sql = "CALL alumno_toda_informacion($id);";
        $query = $this -> db -> query($sql);

        $result =  $query -> result_array();
        $this -> db -> close();

        return $result;
    }

}
