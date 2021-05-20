CREATE DATABASE IF NOT EXISTS changetheworld;
USE changetheworld;

CREATE TABLE IF NOT EXISTS tbl_Categories (
  id_categorie		INT UNSIGNED    AUTO_INCREMENT		COMMENT'This field represents the identifier of the category.',
  name_categorie 	VARCHAR(255)    NOT NULL			COMMENT'This field represents the name of the category.',
  PRIMARY KEY(id_categorie))  COMMENT'This table represents all the categories of the website.';

CREATE TABLE IF NOT EXISTS tbl_Users (
  id_user				INT UNSIGNED		AUTO_INCREMENT		COMMENT'This field represents the user identifier.',
  role_user 			VARCHAR(10)			NOT NULL 			COMMENT'This field represents the user role.',
  photo 				MEDIUMBLOB 			NULL 				COMMENT'This field represents the user photo.',
  pType 				VARCHAR(255) 		NULL 				COMMENT'This field represents the user photo format.',
  username 				VARCHAR(255) 		NOT NULL 			COMMENT'This field represents the user name.',
  name_user 			VARCHAR(255) 		NOT NULL 			COMMENT'This field represents the name.',
  last_name 			VARCHAR(255) 		NOT NULL 			COMMENT'This field represents the users last name.',
  description_user 		TEXT 				NULL 				COMMENT'This field represents the description of the user, what is it? What does it work on? What does it like? Etc.',
  email 				VARCHAR(255) 		NOT NULL UNIQUE		COMMENT'This field represents the email with which the user enters the account.',
  password_user 		VARCHAR(255) 		NOT NULL 			COMMENT'This field represents the password of the user account.',
  registered_date 		DATE 				NOT NULL 			COMMENT'This field represents the day the user registered.',
  date_of_last_change 	DATE 				NOT NULL 			COMMENT'This field represents the last change that was made to the users data.',
  PRIMARY KEY(id_user))	COMMENT'This table represents the data of all registered users on the website.';

CREATE TABLE IF NOT EXISTS tbl_Schools(
 id_school 					INT UNSIGNED 		 AUTO_INCREMENT 		COMMENT'This field represents the identifier of the created school.',
 fk_user 					INT UNSIGNED 		 NOT NULL 				COMMENT'This field represents who created the school.',
 logo 						BLOB 				 NOT NULL 				COMMENT'This field represents the school logo.',
 name_school 				VARCHAR(255) 		 NOT NULL UNIQUE 		COMMENT'This field represents the name of the school.',
 
PRIMARY KEY(id_school),
FOREIGN KEY(fk_user) REFERENCES tbl_Users(id_user))	COMMENT'This table represents the data of all the schools created by the registered teacher users on the website.';

CREATE TABLE IF NOT EXISTS tbl_Courses(
id_course 				INT UNSIGNED 		AUTO_INCREMENT 		COMMENT'This field represents the identifier of the course.',
-- fk_school 				INT UNSIGNED 		NULL 				COMMENT'This field represents the school to which the course is linked.',
fk_categorie 			INT UNSIGNED 		NOT NULL 			COMMENT'This field represents the category to which the course is linked.',
fk_user 				INT UNSIGNED 		NOT NULL 			COMMENT'This field represents who created the course.',
logo 					MEDIUMBLOB 				NOT NULL 			COMMENT'This field represents the course logo.',
lType 				VARCHAR(255) 		NULL 				COMMENT'This field represents the course logo format.',
title 					VARCHAR(255) 		NOT NULL UNIQUE 	COMMENT'This field represents the title of the course.',
average_rating 			DECIMAL(1,1) 		NULL 				COMMENT'This field represents the average rating for the course.',
short_description 		TEXT 				NOT NULL 			COMMENT'This field represents a short description of the course.',
large_description 		TEXT 				NOT NULL 			COMMENT'This field represents a great description of the course in detail.',
number_videos			INT  DEFAULT 0				NULL 				COMMENT'This field represents the number of VIDEOS for the course.',
cost 					DECIMAL 			NOT NULL 			COMMENT'This field represents how much the course costs.',
PRIMARY KEY(id_course),
-- FOREIGN KEY(fk_school) 		REFERENCES tbl_Schools(id_school),			
FOREIGN KEY(fk_categorie) 	REFERENCES tbl_Categories(id_categorie),		
FOREIGN KEY(fk_user) 		REFERENCES tbl_Users(id_user))	COMMENT'This table represents the data of all the courses created by the master users registered on the website.';

CREATE TABLE IF NOT EXISTS tbl_Videos(
id_video 			INT UNSIGNED  		AUTO_INCREMENT 		COMMENT'This field represents the identifier of the video.',
fk_course 			INT UNSIGNED 		NOT NULL 			COMMENT'This field represents which course it belongs to.',
title 				VARCHAR(255) 		NOT NULL		 	COMMENT'This field represents the title of the video.',
short_description 	TEXT 				NOT NULL 			COMMENT'This field represents a short description of the video.',
content 			LONGBLOB 			NOT NULL 			COMMENT'This field represents the video.',
viewed 				BOOLEAN 			NOT NULL DEFAULT 0 	COMMENT'This field represents whether the video has been viewed or not.',
level_				int					NOT NULL			COMMENT'This field represents  level of the coruse (basic,expert, etc).',
PRIMARY KEY(id_video),
FOREIGN KEY(fk_course) REFERENCES tbl_Courses(id_course))	COMMENT'This table represents all the videos of the courses on the website.';

CREATE TABLE IF NOT EXISTS tbl_Resources(
id_resource		INT UNSIGNED		AUTO_INCREMENT		COMMENT'This field represents the identifier of the video notes.',
fk_video		INT UNSIGNED 		NOT NULL 			COMMENT'This field represents which video the note is from.',
fk_user 		INT UNSIGNED 	  	NULL 				COMMENT'This field represents by whom the note was written.',
note 			TEXT	 			NULL 				COMMENT'This field represents the content of the note.',
categorie		VARCHAR(20)			NOT NULL			COMMENT'This field represents the categorie of the reource (files,media,link).',
PRIMARY KEY(id_resource),
FOREIGN KEY(fk_video) REFERENCES tbl_Videos(id_video),
FOREIGN KEY(fk_user) REFERENCES tbl_Users(id_user)) COMMENT'This table represents all the notes made by users in the video.';

CREATE TABLE IF NOT EXISTS tbl_Comments_Courses(
id_comment_course		INT UNSIGNED		AUTO_INCREMENT		COMMENT'This field represents the identifier of the course comment.',
fk_course 				INT UNSIGNED 		NOT NULL 			COMMENT'This field represents the course comments',
fk_sender 				INT UNSIGNED 		NOT NULL 			COMMENT'This field represents who made the comment in the course.',
_message 				TEXT 				NOT NULL 			COMMENT'This field represents the content of the comment in the course.',
comment_date			DATE 				NOT NULL			COMMENT'This field represents the date of comments',				
PRIMARY KEY(id_comment_course),
FOREIGN KEY(fk_course) REFERENCES tbl_Courses(id_course),
FOREIGN KEY(fk_sender) REFERENCES tbl_Users(id_user)) COMMENT'This table represents the feedback data for the course.';

CREATE TABLE IF NOT EXISTS tbl_Comments_videos(
id_comment_video		INT UNSIGNED	AUTO_INCREMENT		COMMENT'This field represents the identifier of the video comment.',
fk_video 				INT UNSIGNED 	NOT NULL 			COMMENT'This field represents the video comments',
fk_sender 				INT UNSIGNED 	NOT NULL 			COMMENT'This field represents who made the comment in the course.',
_message 				TEXT 			NOT NULL 			COMMENT'This field represents the content of the comment in the course.',
comment_date			DATE 			NOT NULL			COMMENT'This field represents the date of comments',				
PRIMARY KEY(id_comment_video),
FOREIGN KEY(fk_video) REFERENCES tbl_Videos(id_video),
FOREIGN KEY(fk_sender) REFERENCES tbl_Users(id_user)) COMMENT'This table represents the data for the video comments.';

CREATE TABLE IF NOT EXISTS tbl_Comments_comments_course (
id_comment_coments_course		INT UNSIGNED 			AUTO_INCREMENT		COMMENT'This field represents the identifier of the course comment.',
fk_comment 						INT UNSIGNED 			NOT NULL 			COMMENT'This field represents the parent comments.',
fk_sender 					 	INT UNSIGNED 			NOT NULL 			COMMENT'This field represents who made the comment in the comments.',
_message 					    TEXT 					NOT NULL 			COMMENT'This field represents the content of the comment .',
comment_date				    DATE 					NOT NULL			COMMENT'This field represents the date of comments',				
PRIMARY KEY(id_comment_coments_course),
FOREIGN KEY(fk_comment) REFERENCES tbl_Comments_Courses(id_comment_course)) COMMENT'This table represents the data from comments to comments for the course.';

CREATE TABLE IF NOT EXISTS tbl_Comments_comments_video (
id_comment_coments_video		INT UNSIGNED		AUTO_INCREMENT		COMMENT'This field represents the identifier of the course comment.',
fk_comment 					    INT UNSIGNED 		NOT NULL 			COMMENT'This field represents the parent comments.',
fk_sender 					    INT UNSIGNED 		NOT NULL 			COMMENT'This field represents who made the comment in the comments.',
_message 					    TEXT 				NOT NULL 			COMMENT'This field represents the content of the comment .',
comment_date				    DATE 				NOT NULL			COMMENT'This field represents the date of comments',				
PRIMARY KEY(id_comment_coments_video),
FOREIGN KEY(fk_comment) REFERENCES tbl_Comments_videos(id_comment_video)) COMMENT'This table represents the data from comments to video comments.';

CREATE TABLE IF NOT EXISTS tbl_Messages(
id_message		INT UNSIGNED		AUTO_INCREMENT		COMMENT'This field represents the identifier of the message.',
fk_sender 		INT UNSIGNED		NOT NULL			COMMENT'This field represents who sent the message.',
fk_addressee 	INT UNSIGNED		NOT NULL			COMMENT'This field represents who receives the message.',
_message 		TEXT 				NOT NULL			COMMENT'This field represents the content of the message.',
date_message 	DATETIME 			NOT NULL			COMMENT'This field represents the day the message was sent.',
PRIMARY KEY(id_message),
FOREIGN KEY(fk_sender) REFERENCES tbl_Users(id_user),
FOREIGN KEY(fk_addressee) REFERENCES tbl_Users(id_user))  COMMENT'This table represents the messages made by users in private';

CREATE TABLE IF NOT EXISTS tbl_Ratings(
id_rating		INT UNSIGNED		AUTO_INCREMENT		COMMENT'This field represents the grade identifier in the course.',
fk_user 		INT UNSIGNED 		NOT NULL 			COMMENT'This field represents who graded the course.',
fk_course 		INT UNSIGNED 		NOT NULL 			COMMENT'This field represents which course was graded.',
points			DECIMAL(1,1) 		NOT NULL 			COMMENT'This field represents the rating that the user gave.',
PRIMARY KEY(id_rating),
FOREIGN KEY(fk_user) REFERENCES tbl_Users(id_user),
FOREIGN KEY(fk_course) REFERENCES tbl_Courses(id_course)) COMMENT'This table represents the grade of each user to the course.';

CREATE TABLE IF NOT EXISTS tbl_Sales(
id_sale     INT				AUTO_INCREMENT    COMMENT'This field represents the identifier of the sale.',
fk_seller   INT UNSIGNED    NOT NULL          COMMENT'This field represents the seller.',
fk_course   INT UNSIGNED    NOT NULL          COMMENT'This field represents the product that was sold.',
PRIMARY KEY(id_sale),
FOREIGN KEY(fk_seller) REFERENCES tbl_Users(id_user),
FOREIGN KEY(fk_course) REFERENCES tbl_Courses(id_course)) COMMENT'This table represents the sales of each user.';

CREATE TABLE IF NOT EXISTS tbl_Purchases(
id_purchase		INT UNSIGNED		AUTO_INCREMENT		COMMENT'This field represents the identifier of the sale.',
fk_buyer 		INT UNSIGNED 		NOT NULL 			COMMENT'This field represents the buyer.',
fk_course 		INT UNSIGNED 		NOT NULL 			COMMENT'This field represents the product that was purchased.',
PRIMARY KEY(id_purchase),
FOREIGN KEY(fk_buyer) REFERENCES tbl_Users(id_user),
FOREIGN KEY(fk_course) REFERENCES tbl_Courses(id_course)) COMMENT'This table represents the purchases of each user.';