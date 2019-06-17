
    -- Consultar informacion de las tablas de la base de datos
    SELECT * FROM Administradores;
    SELECT * FROM Horarios;
    SELECT * FROM Alumnos;

    -- SELECT curTime();
	-- SELECT DATE_FORMAT(created_at, '%T'), DATE(created_at) FROM Administradores;

    -- Seleccionar la fecha en la que se creo un adminisgtrador
    SELECT TIME(created_at) FROM Administradores;

    -- INSERT INTO Horarios (fk_alumno, al_entrada) VALUES (1, NOW());
    -- UPDATE Horarios SET al_salida = (ADDDATE(NOW(), INTERVAL 3 HOUR)) WHERE fk_alumno = 1;

    SELECT al_salida, al_entrada, TIMESTAMPDIFF(HOUR, al_entrada, al_salida) FROM Horarios;
    SELECT NOW();


    -- Obtener las horas totales de un alumno
	SELECT al_salida, al_entrada, TIMESTAMPDIFF(HOUR, al_entrada, al_salida) FROM Horarios WHERE fk_alumno = 2;
	SELECT SUM(TIMESTAMPDIFF(HOUR, al_entrada, al_salida)) FROM Horarios WHERE fk_alumno = 2;
    SELECT SUM(TIMESTAMPDIFF(MINUTE, al_entrada, al_salida)) DIV 60 AS HorasCumplidas FROM Horarios WHERE fk_alumno = 2;

    -- Obtener las fechas de los horarios
    SELECT DATE_FORMAT(salida, '%T'), DATE(salida) FROM Horarios;
    SELECT fk_alumno, DATE(al_entrada) AS fecha_entrada, DATE(al_salida) AS fecha_salida, DATE_FORMAT(al_entrada, '%T') AS hora_entrada, DATE_FORMAT(al_salida, '%T') AS hora_salida FROM Horarios WHERE fk_alumno = 2;

    -- Obtener la lista de los tiempo de los alumno
	SELECT Alumnos.id_alumno, Alumnos.nombre, Alumnos.apellidos, DATE(Horarios.al_salida), SUM(TIMESTAMPDIFF(MINUTE, Horarios.al_entrada, Horarios.al_salida)) DIV 60
    FROM Horarios
    INNER JOIN Alumnos ON Alumnos.id_alumno = Horarios.fk_alumno;

    SELECT DISTINCT Alumnos.id_alumno, Alumnos.nombre, Alumnos.apellidos, DATE(Horarios.al_salida) AS salida
    FROM Alumnos
    INNER JOIN Horarios ON Alumnos.id_alumno = 2;

    -- DESCRIBE mysql.time_zone_name;