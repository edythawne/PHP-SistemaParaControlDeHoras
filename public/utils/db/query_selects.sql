	-- USE
     USE Ford32_Servicios;
     
    -- Consultar informacion de las tablas de la base de datos
    SELECT * FROM Administradores;
    SELECT * FROM Horarios;
    SELECT * FROM Alumnos;

    -- SELECT curTime();
	-- SELECT DATE_FORMAT(created_at, '%T'), DATE(created_at) FROM Administradores;

    -- Seleccionar la fecha en la que se creo un adminisgtrador
    SELECT TIME(created_at) FROM Administradores;
	SELECT DATE(NOW());

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

    -- Obtener la lista de las fechas que ha asistido un alumno
    SELECT Alumnos.id_alumno, DATE(Horarios.al_salida) AS fecha_asistencia, TIMESTAMPDIFF(MINUTE, al_entrada, al_salida) DIV 60 as horas_acumuladas
    FROM Alumnos
    INNER JOIN Horarios ON Alumnos.id_alumno = Horarios.fk_alumno AND Horarios.fk_alumno = 2;
    
	-- Checar si existe regristro en la fecha actual
    SELECT * FROM Horarios WHERE fk_alumno = 3 AND DATE(al_entrada) = '2019-06-19';
    
    SELECT * FROM Horarios WHERE fk_alumno = 1 AND DATE(al_entrada) = '2019-06-20';

	SELECT * FROM Horarios WHERE fk_alumno = 1 AND DATE(al_entrada) = DATE(NOW()) AND salida IS NULL;
    
    SELECT * FROM Horarios WHERE fk_alumno =  1 AND DATE(al_entrada) = DATE(NOW());
    
    
    -- PROCEDURE
    CALL alumno_fechas_servicio(3);
    
	SET @nombre = (SELECT nombre FROM Alumnos WHERE id_alumno = 2);
	SET @apellidos = (SELECT apellidos FROM Alumnos WHERE id_alumno = 2);
	SET @horas_cumplidas = (SELECT SUM(TIMESTAMPDIFF(MINUTE, al_entrada, al_salida)) DIV 60 AS HorasCumplidas FROM Horarios WHERE fk_alumno = 2);
	SET @fechas = (SELECT JSON_ARRAYAGG(JSON_OBJECT(
			'id_alumno', Alumnos.id_alumno, 
			'fecha_asistencia', DATE(Horarios.al_salida), 
			'horas_acumuladas', TIMESTAMPDIFF(MINUTE, al_entrada, al_salida) DIV 60)
		) AS fechas FROM Alumnos
	INNER JOIN Horarios ON Alumnos.id_alumno = Horarios.fk_alumno AND Horarios.fk_alumno = 2 ORDER BY Horarios.al_salida DESC);
	
	SELECT @nombre AS nombre, @apellidos AS apellidos, @horas_cumplidas AS horas_cumplidas, @fechas AS fechas;
    
    -- DESCRIBE mysql.time_zone_name;
    
    
    -- JSON
    (SELECT JSON_ARRAYAGG(JSON_OBJECT('id_alumno', Alumnos.id_alumno, 'fecha_asistencia', DATE(Horarios.al_salida), 'horas_acumuladas', TIMESTAMPDIFF(MINUTE, al_entrada, al_salida) DIV 60)) AS fechas
    FROM Alumnos
    INNER JOIN Horarios ON Alumnos.id_alumno = Horarios.fk_alumno AND Horarios.fk_alumno = 2);
    
    -- PROCEDURE
    CALL alumno_fechas_servicio(3);
    
    -- INFORMACIÓN DEL ALUMNO
    SELECT Alumnos.id_alumno, Alumnos.nombre, Alumnos.apellidos, SUM(TIMESTAMPDIFF(MINUTE, al_entrada, al_salida)) DIV 60 AS horas_cumplidas
    FROM Alumnos
    INNER JOIN Horarios ON Alumnos.id_alumno = Horarios.fk_alumno AND Horarios.fk_alumno = 2 AND Alumnos.estado = 'ACTIVO';

    SELECT Alumnos.id_alumno, Alumnos.nombre, Alumnos.apellidos, SUM(TIMESTAMPDIFF(MINUTE, al_entrada, al_salida)) DIV 60 AS horas_cumplidas
    FROM Alumnos
    INNER JOIN Horarios ON Alumnos.id_alumno = Horarios.fk_alumno AND Alumnos.estado = 'ACTIVO'  GROUP BY Alumnos.id_alumno;

