-- SP Users
CALL user_insert('Teacher',null,'Gerax','Luis Gerardo','Becerra Jiménez',null,'gerajmz@outlook.com','1234');
CALL user_exist('Student', 'dani@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055');
CALL user_set('dani@gmail.com');

SELECT  `tbl_messages`.`_message`,
    `tbl_messages`.`date_message`, `tbl_users`.`username`
FROM `changetheworld`.`tbl_messages` 
INNER JOIN tbl_users on `tbl_messages`.`fk_sender` = `tbl_users`.`id_user` WHERE fk_addressee = 1