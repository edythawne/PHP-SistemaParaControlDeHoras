CREATE DATABASE GoogleContacts;

USE GoogleContacts;

CREATE TABLE `keys` (
	`id` int(11) NOT NULL,
	`key` varchar(40) NOT NULL,
	`level` int(2) NOT NULL,
	`ignore_limits` tinyint(1) NOT NULL DEFAULT '0',
	`is_private_key` tinyint(1) NOT NULL DEFAULT '0',
	`ip_addresses` text,
	`date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `logs` (
	`id` int(11) NOT NULL,
	`uri` varchar(255) NOT NULL,
	`method` varchar(6) NOT NULL,
	`params` text,
	`api_key` varchar(40) NOT NULL,
	`ip_address` varchar(45) NOT NULL,
	`time` int(11) NOT NULL,
	`rtime` float DEFAULT NULL,
	`authorized` varchar(1) NOT NULL,
	`response_code` smallint(3) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `user` (
	`user_id` int(11) NOT NULL,
	`user_name` varchar(40) NOT NULL,
	`user_password` varchar(40) NOT NULL,
	`user_type` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS contacts(
	id INTEGER NOT NULL AUTO_INCREMENT, 
    nombre VARCHAR(50) NOT NULL, 
    apellidos VARCHAR(60) NULL, 
    correo VARCHAR(100) NULL,
    telefono VARCHAR(15) NOT NULL,
    tipo_telefono VARCHAR(20) NOT NULL, 
    PRIMARY KEY(id)) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO contacts VALUES (null, 'Genaro', 'Vazquez Mota', 'gerar@gmail.com', '9831244353', 'movil'); 
INSERT INTO contacts VALUES (10, 'Valentín', 'Guzman', 'itsramires@gmail.com', '3412443554', 'movil'); 
INSERT INTO contacts VALUES (null, 'Zoyla', 'Perez Otoniel', '', '4631244353', 'trabajo');
INSERT INTO contacts VALUES (3, 'Enrique', 'Peña Nieto', '', '2321234561', 'trabajo');

SELECT * FROM contacts;
SELECT * FROM users;
SELECT * FROM `keys`;
