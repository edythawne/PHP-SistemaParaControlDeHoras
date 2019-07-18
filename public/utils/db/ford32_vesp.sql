    
	-- SET GLOBAL time_zone = "America/Mexico_City";
    
    CREATE DATABASE IF NOT EXISTS Ford32_Servicios CHARACTER SET utf8 COLLATE utf8_general_ci;
    
    USE Ford32_Servicios;
    
    CREATE TABLE IF NOT EXISTS Administradores (
        id_admin BIGINT NOT NULL AUTO_INCREMENT,
        nombre VARCHAR(100) NOT NULL,
        apellidos VARCHAR(100) NOT NULL,
        usuario VARCHAR(100) NOT NULL,
        contrasena VARCHAR(200) NOT NULL,
        created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
        update_at DATETIME ON UPDATE CURRENT_TIMESTAMP,
        PRIMARY KEY(id_admin) ) 
    ENGINE = InnoDB
	DEFAULT CHARACTER SET = utf8;
    
    CREATE TABLE IF NOT EXISTS Alumnos(
        id_alumno BIGINT NOT NULL AUTO_INCREMENT, 
        nombre VARCHAR(100) NOT NULL,
        apellidos VARCHAR(100) NOT NULL,
        telefono VARCHAR(100) NULL,
        estado VARCHAR(15) DEFAULT 'ACTIVO',
        especialidad VARCHAR(200) NOT NULL,
        tipo_servicio VARCHAR(50) NOT NULL,
		periodo VARCHAR(100) NOT NULL,
        duracion INTEGER DEFAULT 480,
        usuario VARCHAR(100) NOT NULL,
        contrasena VARCHAR(100) NOT NULL,
        created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
        update_at DATETIME ON UPDATE CURRENT_TIMESTAMP,
        PRIMARY KEY(id_alumno))
	ENGINE = InnoDB
	DEFAULT CHARACTER SET = utf8;
    
    CREATE TABLE IF NOT EXISTS Horarios(
        id_horario BIGINT NOT NULL AUTO_INCREMENT,
        fk_alumno BIGINT NOT NULL,
        entrada DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
        salida DATETIME ON UPDATE CURRENT_TIMESTAMP,
        al_entrada DATETIME NOT NULL,
        al_salida DATETIME NULL,
        PRIMARY KEY(id_horario))
	ENGINE = InnoDB
	DEFAULT CHARACTER SET = utf8;
    
    -- ALTER TABLE
    ALTER TABLE Horarios ADD FOREIGN KEY (fk_alumno) REFERENCES Alumnos(id_alumno) ON UPDATE CASCADE ON DELETE NO ACTION;
    
    -- CREATE PROCEDURE 
    DELIMITER //
		CREATE PROCEDURE alumno_toda_informacion (IN id INT)
		BEGIN
        
			SELECT id_alumno, nombre, apellidos, telefono, especialidad, estado, tipo_servicio, periodo, duracion 
			INTO @id_alumno, @nombre, @apellidos, @telefono, @especialidad, @estado, @tipo_servicio, @periodo, @duracion
			FROM Alumnos WHERE id_alumno = id;
				                        
			SET @horas_cumplidas = (SELECT SEC_TO_TIME(SUM(TIMESTAMPDIFF(SECOND, al_entrada, al_salida))) FROM Horarios WHERE fk_alumno = @id_alumno);
			SET @horas_restantes = (@duracion - @horas_cumplidas);
            SET @fechas = (SELECT JSON_ARRAYAGG(JSON_OBJECT(
					'fecha_asistencia', DATE(Horarios.al_entrada), 
                    'hora_entrada', DATE_FORMAT(Horarios.al_entrada, '%T'), 
                    'hora_salida', DATE_FORMAT(Horarios.al_salida, '%T'),
					'horas_acumuladas', DATE_FORMAT(SEC_TO_TIME(TIMESTAMPDIFF(SECOND, al_entrada, al_salida)), '%T'))
				) AS fechas FROM Alumnos
			INNER JOIN Horarios ON Alumnos.id_alumno = Horarios.fk_alumno AND Horarios.fk_alumno = @id_alumno);
			
			SELECT  @id_alumno AS id_a, @nombre AS nom, @apellidos AS ape, @telefono AS tel, @especialidad AS esp, @estado AS est, @tipo_servicio AS ti_s, @periodo AS per, @duracion AS dur, @horas_cumplidas AS hr_c, @horas_restantes AS hr_r, @fechas AS fec;
		END//
    DELIMITER ;