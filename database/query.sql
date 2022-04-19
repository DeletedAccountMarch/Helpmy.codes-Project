CREATE DATABASE user;
USE user;

CREATE TABLE account
( user_id int PRIMARY KEY NOT NULL AUTO_INCREMENT,
  email varchar(255) NOT NULL,
  password varchar(255) NOT NULL,
  reg_date datetime default now(),
  v_token varchar(300) NOT NULL,
  v_status int NOT NULL,
  CONSTRAINT emaildata UNIQUE (email)
 
);
