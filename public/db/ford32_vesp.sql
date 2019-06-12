    
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
    
    INSERT INTO Alumnos(nombre, apellidos, telefono, usuario, contrasena) VALUES ('Valentina', 'Perez Miranda', '123456789', '123456789', '123456789');
    INSERT INTO Alumnos(nombre, apellidos, telefono, usuario, contrasena) VALUES ('Melanie', 'García', '7661127462', '7661127462', '7661127462');
    INSERT INTO Alumnos(nombre, apellidos, telefono, usuario, contrasena) VALUES ('Sarahí', 'García Florencia', '7661218805', '7661218805', '7661218805');
    
	SELECT * FROM Horarios;

	-- SELECT DATE_FORMAT(created_at, '%T'), DATE(created_at) FROM Administradores; 
    
    SELECT TIME(created_at) FROM Administradores;
    
    INSERT INTO Horarios (fk_alumno, al_entrada) VALUES (1, NOW());
    UPDATE Horarios SET al_salida = (ADDDATE(NOW(), INTERVAL 3 HOUR)) WHERE fk_alumno = 1;
    
    SELECT al_salida, al_entrada, TIMESTAMPDIFF(HOUR, al_entrada, al_salida) FROM Horarios;
    
    
    
    -- DESCRIBE mysql.time_zone_name;