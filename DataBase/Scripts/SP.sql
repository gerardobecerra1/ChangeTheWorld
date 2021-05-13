USE `changetheworld`;
DROP procedure IF EXISTS `SP_Users`;

DELIMITER $$
USE `changetheworld`$$
CREATE PROCEDURE `SP_Users` (
IN id INT,
IN _role VARCHAR(10),
IN photo MEDIUMBLOB,
IN username VARCHAR(255),
IN _name VARCHAR(255),
IN _last VARCHAR(255),
IN descrip TEXT,
IN email VARCHAR(255),
IN pass VARCHAR(255),
IN last_date DATE,
IN _action INT)
BEGIN
	IF _action = 1 THEN INSERT INTO tbl_users(role_user,photo,username,name_user,last_name,description_user,email,password_user,registered_date,date_of_last_change) VALUES(_role,photo,username,_name,_last,descrip,email,pass,CURDATE(),CURDATE());
	ELSEIF _action = 2 THEN UPDATE tbl_users SET photo=photo, username=username, name_user=_name, last_name=_last,description_user=descrip,
			email=email,password_user=pass,date_of_last_change=CURDATE() WHERE id_user=id;
	ELSEIF _action = 3 THEN SELECT photo,username,name_user,last_name,description_user,email,registered_date,date_of_last_change FROM tbl_users where id_users = id;
	END IF;
END$$

DELIMITER ;