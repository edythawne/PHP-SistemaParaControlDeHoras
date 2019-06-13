    
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
        telefono VARCHAR(15) NULL,
        estado VARCHAR(15) DEFAULT 'Activo',
        usuario VARCHAR(100) NOT NULL,
        contrasena VARCHAR(200) NOT NULL,
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
    

    -- SELECT curTime();
    
    SELECT * FROM Administradores;
    
    INSERT INTO Administradores(nombre, apellidos, usuario, contrasena) VALUES ('Eduardo', 'Ramires Perez', 'edythawne', 'qwertyui');
    
    SELECT * FROM Alumnos;
    
    -- INSERT INTO Alumnos(nombre, apellidos, telefono, usuario, contrasena) VALUES ('Valentina', 'Perez Miranda', '123456789', '123456789', '123456789');
    INSERT INTO Alumnos(nombre, apellidos, telefono, usuario, contrasena) VALUES 
		('Melanie', 'García', '7661127462', '7661127462', '7661127462'),
		('María Fernanda', 'Pérez Hernández', '7661020517', '7661020517', '7661020517'),
		('Sarahí', 'García Florencia', '7661218805', '7661218805', '7661218805'), 
        ('Juan Carlos', 'Cortez Pérez', '7661151621', '7661151621', '7661151621');
    
	SELECT * FROM Horarios;

	-- SELECT DATE_FORMAT(created_at, '%T'), DATE(created_at) FROM Administradores; 
    
    SELECT TIME(created_at) FROM Administradores;
    
    -- INSERT INTO Horarios (fk_alumno, al_entrada) VALUES (1, NOW());
    -- UPDATE Horarios SET al_salida = (ADDDATE(NOW(), INTERVAL 3 HOUR)) WHERE fk_alumno = 1;
    
    SELECT al_salida, al_entrada, TIMESTAMPDIFF(HOUR, al_entrada, al_salida) FROM Horarios;
    
    SELECT NOW();
    
    INSERT INTO Horarios (fk_alumno, entrada, salida, al_entrada, al_salida) VALUES 
		(1, '2019-06-06 14:00:00', '2019-06-06 19:30:00', '2019-06-06 14:00:00', '2019-06-06 19:30:00'),
        (1, '2019-06-07 15:00:00', '2019-06-07 19:30:00', '2019-06-07 15:00:00', '2019-06-07 19:30:00'),
        (1, '2019-06-10 14:30:00', '2019-06-10 19:30:00', '2019-06-10 14:30:00', '2019-06-10 19:30:00');
        
	INSERT INTO Horarios (fk_alumno, entrada, salida, al_entrada, al_salida) VALUES 
		(2, '2019-06-06 14:00:00', '2019-06-06 19:30:00', '2019-06-06 14:00:00', '2019-06-06 19:30:00'),
        (2, '2019-06-07 15:00:00', '2019-06-07 19:30:00', '2019-06-07 15:00:00', '2019-06-07 19:30:00'),
        (2, '2019-06-10 15:00:00', '2019-06-10 19:30:00', '2019-06-10 15:00:00', '2019-06-10 19:30:00'),
        (2, '2019-06-11 14:30:00', '2019-06-11 17:30:00', '2019-06-11 14:30:00', '2019-06-11 17:30:00'),
        (2, '2019-06-12 15:00:00', '2019-06-12 17:30:00', '2019-06-12 15:00:00', '2019-06-12 17:30:00');
    
    INSERT INTO Horarios (fk_alumno, entrada, salida, al_entrada, al_salida) VALUES 
		(3, '2019-06-06 14:00:00', '2019-06-06 19:30:00', '2019-06-06 14:00:00', '2019-06-06 19:30:00'),
        (3, '2019-06-07 15:00:00', '2019-06-07 19:30:00', '2019-06-07 15:00:00', '2019-06-07 19:30:00'),
        (3, '2019-06-10 14:30:00', '2019-06-10 19:30:00', '2019-06-10 14:30:00', '2019-06-10 19:30:00'),
        (3, '2019-06-11 14:30:00', '2019-06-11 17:30:00', '2019-06-11 14:30:00', '2019-06-11 17:30:00'),
        (3, '2019-06-12 15:00:00', '2019-06-12 17:30:00', '2019-06-12 15:00:00', '2019-06-12 17:30:00');
        
	INSERT INTO Horarios (fk_alumno, entrada, salida, al_entrada, al_salida) VALUES 
		(4, '2019-06-06 14:00:00', '2019-06-06 17:00:00', '2019-06-06 14:00:00', '2019-06-06 17:00:00'),
        (4, '2019-06-07 14:00:00', '2019-06-07 19:30:00', '2019-06-07 14:00:00', '2019-06-07 19:30:00'),
        (4, '2019-06-10 14:00:00', '2019-06-10 19:00:00', '2019-06-10 14:00:00', '2019-06-10 19:00:00'),
        (4, '2019-06-11 13:00:00', '2019-06-11 19:30:00', '2019-06-11 13:00:00', '2019-06-11 19:30:00'),
        (4, '2019-06-12 13:30:00', '2019-06-12 19:30:00', '2019-06-12 13:30:00', '2019-06-12 19:30:00');
        
    -- Obtener las horas totales de un alumno
	SELECT al_salida, al_entrada, TIMESTAMPDIFF(HOUR, al_entrada, al_salida) FROM Horarios WHERE fk_alumno = 2;
	SELECT SUM(TIMESTAMPDIFF(HOUR, al_entrada, al_salida)) FROM Horarios WHERE fk_alumno = 2;
    SELECT SUM(TIMESTAMPDIFF(MINUTE, al_entrada, al_salida)) DIV 60 AS HorasCumplidas FROM Horarios WHERE fk_alumno = 2;
    
    -- Obtener las fechas de los horarios
    SELECT DATE_FORMAT(salida, '%T'), DATE(salida) FROM Horarios;
    SELECT fk_alumno, DATE(al_entrada) AS fecha_entrada, DATE(al_salida) AS fecha_salida, DATE_FORMAT(al_entrada, '%T') AS hora_entrada, DATE_FORMAT(al_salida, '%T') AS hora_salida FROM Horarios WHERE fk_alumno = 2;
    
    -- DESCRIBE mysql.time_zone_name;