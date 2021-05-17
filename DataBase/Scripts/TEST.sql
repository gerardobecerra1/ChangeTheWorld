-- SP Users
CALL user_insert('Teacher',null,'Gerax','Luis Gerardo','Becerra Jiménez',null,'gerajmz@outlook.com','1234');
CALL user_exist('Student', 'dani@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055');
CALL user_set('dani@gmail.com');