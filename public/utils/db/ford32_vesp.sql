    
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
		CREATE PROCEDURE alumno_fechas_servicio (IN id INT)
		BEGIN
			SET @id_alumno = (SELECT id_alumno FROM Alumnos WHERE id_alumno = id);
			SET @nombre = (SELECT nombre FROM Alumnos WHERE id_alumno = id);
			SET @apellidos = (SELECT apellidos FROM Alumnos WHERE id_alumno = id);
			SET @horas_cumplidas = (SELECT SUM(TIMESTAMPDIFF(MINUTE, al_entrada, al_salida)) DIV 60 AS HorasCumplidas FROM Horarios WHERE fk_alumno = id);
			SET @fechas = (SELECT JSON_ARRAYAGG(JSON_OBJECT(
					'fecha_asistencia', DATE(Horarios.al_salida), 
                    'hora_entrada', DATE_FORMAT(Horarios.al_entrada, '%T'), 
                    'hora_salida', DATE_FORMAT(Horarios.al_salida, '%T'),
					'horas_acumuladas', TIMESTAMPDIFF(MINUTE, al_entrada, al_salida) DIV 60)
				) AS fechas FROM Alumnos
			INNER JOIN Horarios ON Alumnos.id_alumno = Horarios.fk_alumno AND Horarios.fk_alumno = id);
			
			SELECT @nombre AS nombre, @apellidos AS apellidos, @horas_cumplidas AS horas_cumplidas, @fechas AS fechas;
		END//
    DELIMITER ;