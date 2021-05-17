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