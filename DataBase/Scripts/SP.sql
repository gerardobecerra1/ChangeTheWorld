USE `changetheworld`;
DROP procedure IF EXISTS `SP_Users`;

DELIMITER $$
USE `changetheworld`$$
CREATE PROCEDURE `SP_Users` (IN id INT,
IN _role VARCHAR(10),
IN photo BLOB,
IN username VARCHAR(255),
IN _name VARCHAR(255),
IN _last VARCHAR(255),
IN des TEXT,
IN email VARCHAR(255),
IN pass VARCHAR(255),
IN regis_date DATE,
IN last_date DATE,
IN _action INT,
IN _table VARCHAR(255))
BEGIN
	IF _action = 1 THEN INSERT INTO _table(role_user,photo,username,name_user,last_name,description_user,email,password_user,registered_date,date_of_last_change) VALUES(_role,photo,username,_name,_last,des,email,pass,regis_date,last_date);
	ELSEIF _action = 2 THEN UPDATE tbl_users SET role_user=_role, photo=photo, username=username, name_user=_name, last_name=_last,description_user=des,
			email=email,password_user=pass,registered_date=regis_date,date_of_last_change=last_date WHERE tbl_users.id_user=id;
	ELSEIF _action = 3 THEN SELECT photo,username,name_user,last_name,description_user,email,registered_date,date_of_last_change FROM tbl_users where id_users = id;
	END IF;
END$$

DELIMITER ;