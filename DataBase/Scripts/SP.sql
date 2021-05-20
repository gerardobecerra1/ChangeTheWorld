CREATE DEFINER=`root`@`localhost` PROCEDURE `user_insert`
(IN role_user VARCHAR(10),IN photo MEDIUMBLOB,IN pType VARCHAR(255),
IN username VARCHAR(255),IN _name VARCHAR(255),IN _last VARCHAR(255),IN descrip TEXT,IN email VARCHAR(255),IN pass VARCHAR(255))
BEGIN
INSERT INTO `changetheworld`.`tbl_users`
(`role_user`,`photo`,`pType`,`username`,`name_user`,`last_name`,`description_user`,`email`,`password_user`)
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