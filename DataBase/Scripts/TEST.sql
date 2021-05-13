-- insert
CALL SP_Users(null,'Teacher',null,'Gerax','Luis Gerardo','Becerra Jiménez','One of the creators of the Change The World website.',
'gerajmz@outlook.com','gerax3000@',null,1);

-- update
CALL SP_Users(1,null,null,'Danix','Alberto Daniel','Hernandez Villanueva','nothing',
'dani@outlook.com','5678',CURDATE(),2);

-- search
CALL SP_Users(1,null,null,null,null,null,null,
'dani@outlook.com',null,null,null,3);

-- delete

UPDATE tbl_users SET description_user='nothing', password_user='1234', date_of_last_change=CURDATE() WHERE id_user=id;

SELECT * FROM tbl_users; 
#Current date
SELECT CURDATE();

DELETE FROM tbl_users WHERE id_user = 2;
SELECT * FROM tbl_users; 

