CALL SP_Users(null,'Teacher',null,'Gerax','Luis Gerardo','Becerra Jiménez','One of the creators of the Change The World website.',
'gerajmz@outlook.com','gerax3000@',CURDATE(),CURDATE(),1);
SELECT * FROM tbl_users; 
#Current date
SELECT CURDATE();

DELETE FROM tbl_users WHERE id_user = 2;
SELECT * FROM tbl_users; 

