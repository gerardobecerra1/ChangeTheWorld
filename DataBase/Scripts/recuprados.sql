SELECT  `tbl_messages`.`_message`,
    `tbl_messages`.`date_message`, `tbl_users`.`username`
FROM `changetheworld`.`tbl_messages` 
INNER JOIN tbl_users on `tbl_messages`.`fk_sender` = `tbl_users`.`id_user` WHERE fk_addressee = 1;


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


CREATE DEFINER=`root`@`localhost` FUNCTION `ventas_general`(idU INT) RETURNS decimal(10,0)
BEGIN
DECLARE ventasTotal DECIMAL;
SET ventasTotal =(select sum(cost) FROM tbl_courses
inner join tbl_purchases on tbl_courses.id_course = tbl_purchases.fk_course where tbl_courses.fk_user = idU);
RETURN ventasTotal;
END