CREATE DEFINER=`root`@`localhost` PROCEDURE `user_insert`(IN role_user VARCHAR(10),IN photo MEDIUMBLOB,IN pType VARCHAR(255),
IN username VARCHAR(255),IN _name VARCHAR(255),IN _last VARCHAR(255),IN descrip TEXT,IN email VARCHAR(255),IN pass VARCHAR(255))
BEGIN
INSERT INTO `changetheworld`.`tbl_users`
(`role_user`,`photo`,`pType`,`username`,`name_user`,`last_name`,`description_user`,`email`,`password_user`,`registered_date`,`date_of_last_change`)
VALUES(role_user,photo,pType,username,_name,_last,descrip,email,pass,CURDATE(),CURDATE());
END

CREATE DEFINER=`root`@`localhost` PROCEDURE `user_exist`(IN _role VARCHAR(10),IN _email VARCHAR(255),IN _password VARCHAR(255))
BEGIN
SELECT * FROM tbl_users WHERE role_user = _role AND email = _email AND password_user = _password;
END

CREATE PROCEDURE `user_set` (IN _email VARCHAR(255))
BEGIN
SELECT * FROM tbl_users WHERE email = _email;
END

CREATE DEFINER=`root`@`localhost` PROCEDURE `user_update_public`(
IN id INT,
IN photo MEDIUMBLOB,
IN pType VARCHAR(255),
IN username VARCHAR(255),
IN _name VARCHAR(255),
IN _last VARCHAR(255),
IN descrip TEXT
)
BEGIN
UPDATE `changetheworld`.`tbl_users`
SET
`photo` = photo,
`pType` = pType,
`username` = username,
`name_user` = _name,
`last_name` = _last,
`description_user` = descrip,
`date_of_last_change` = CURDATE()
WHERE `id_user` = id;
END

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_course`(
IN id_categoria INT,
IN id_usuario INT,
IN logo MEDIUMBLOB,
IN lType VARCHAR(256),
IN titulo VARCHAR(256),
IN rating DECIMAL,
IN shortD VARCHAR(256),
IN longD TEXT,
IN numberV INT,
IN costo DECIMAL
)
BEGIN
INSERT INTO `changetheworld`.`tbl_courses`
(`id_course`,
`fk_categorie`,
`fk_user`,
`logo`,
`lType`,
`title`,
`average_rating`,
`short_description`,
`large_description`,
`number_videos`,
`cost`)
VALUES
(id_categoria,
id_usuario,
logo,
lType,
titulo,
rating,
shortD,
longD,
numberV,
costo);

END

CREATE DEFINER=`root`@`localhost` PROCEDURE `traer_id_categoria`(
IN name_categoria VARCHAR(256))
BEGIN
SELECT * FROM `tbl_categories` WHERE name_categorie = name_categoria;
END

CREATE DEFINER=`root`@`localhost` PROCEDURE `agregar_categoria`(IN nombre_categoria VARCHAR(256))
BEGIN
INSERT INTO `changetheworld`.`tbl_categories`
(`name_categorie`)
VALUES
(nombre_categoria);
END

CREATE PROCEDURE `traer_cursos_por_categoria` (IN idCategoria INT)
BEGIN
SELECT `tbl_courses`.`id_course`,
    `tbl_courses`.`fk_categorie`,
    `tbl_courses`.`fk_user`,
    `tbl_courses`.`logo`,
    `tbl_courses`.`lType`,
    `tbl_courses`.`title`,
    `tbl_courses`.`average_rating`,
    `tbl_courses`.`short_description`,
    `tbl_courses`.`large_description`,
    `tbl_courses`.`number_videos`,
    `tbl_courses`.`cost`
FROM `changetheworld`.`tbl_courses` WHERE fk_categorie = idCategoria;
END



CREATE DEFINER=`root`@`localhost` PROCEDURE `traerMensajesPrivados`(
IN idRecibe INT,
IN idManda INT)
BEGIN
SELECT  `tbl_messages`.`_message`,
    `tbl_messages`.`date_message`, `tbl_users`.`username`
FROM `changetheworld`.`tbl_messages` 
INNER JOIN tbl_users on `tbl_messages`.`fk_sender` = `tbl_users`.`id_user`
 WHERE (fk_sender = idManda AND fk_addressee = idRecibe) or 
 (fk_sender = idRecibe AND fk_addressee = idManda) order by id_message ASC;
END


CREATE DEFINER=`root`@`localhost` PROCEDURE `insertar_privados`(IN idEnvia INT, IN idRecibe INT ,IN mensaje TEXT)
BEGIN
INSERT INTO `changetheworld`.`tbl_messages`
(`fk_sender`,
`fk_addressee`,
`_message`,
`date_message`)
VALUES
(idEnvia,
idRecibe,
mensaje,
CURDATE());
END


CREATE DEFINER=`root`@`localhost` FUNCTION `ventas_general`(idU INT) RETURNS decimal(10,0)
BEGIN
DECLARE ventasTotal DECIMAL;
SET ventasTotal =(select sum(cost) FROM tbl_courses
inner join tbl_purchases on tbl_courses.id_course = tbl_purchases.fk_course where tbl_courses.fk_user = idU);
RETURN ventasTotal;
END



SELECT  `tbl_messages`.`_message`,
    `tbl_messages`.`date_message`, `tbl_users`.`username`
FROM `changetheworld`.`tbl_messages` 
INNER JOIN tbl_users on `tbl_messages`.`fk_sender` = `tbl_users`.`id_user` WHERE (fk_sender = 1 AND fk_addressee = 2) or (fk_sender = 2 AND fk_addressee = 1) ;
CALL `changetheworld`.`traerMensajesPrivados`(1,2);

select *from tbl_messages;
INSERT INTO `changetheworld`.`tbl_messages`
(
`fk_sender`,
`fk_addressee`,
`_message`,
`date_message`)
VALUES
(
1,
2,
'aDIOS',
CURDATE());

select count(*) FROM tbl_courses where fk_user = 1 --total de cursos activos del maestro;

select *from tbl_courses;
select *from tbl_purchases 
where fk_course = 2;

--UN COLO CURSO
select count(*) FROM tbl_courses
inner join tbl_purchases on tbl_courses.id_course = tbl_purchases.fk_course where fk_course = 1;
-- ventas del curso (cantidad) .- CONTAR LAS VENTAS O CUANTOS USUARIOS LOS COMPRARON
select sum(cost) FROM tbl_courses
inner join tbl_purchases on tbl_courses.id_course = tbl_purchases.fk_course where fk_course = 2;
-- ventas del curso (dinero) .-  SUMAR LAS VENTAS O SUMAR USUARIOS LOS COMPRARON
select count(fk_buyer) FROM tbl_courses
inner join tbl_purchases on tbl_courses.id_course = tbl_purchases.fk_course where fk_course = 2;
-- cuantas personas compraron el curso

--TODOS LOS CURSOs DEL MAESTRO
select sum(cost) FROM tbl_courses
inner join tbl_purchases on tbl_courses.id_course = tbl_purchases.fk_course where tbl_courses.fk_user = 1;
-- ventas del maestro en general(todos los curs)
select count(*) FROM tbl_courses
inner join tbl_purchases on tbl_courses.id_course = tbl_purchases.fk_course where tbl_courses.fk_user = 1;
-- ventas del maestro en general(todos los curs)

--EL MAESTRO
select count(*) FROM tbl_courses
where tbl_courses.fk_user = 1;
-- Trae el numero de cursos que ha creado ese usuario

SELECT ventas_por_curso(3);


select sum(cost) FROM tbl_courses
inner join tbl_purchases on tbl_courses.id_course = tbl_purchases.fk_course where fk_course = 2;