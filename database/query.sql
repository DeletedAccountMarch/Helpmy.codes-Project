CREATE DATABASE helpmycode;
USE helpmycode;

CREATE TABLE account
( user_id int PRIMARY KEY NOT NULL AUTO_INCREMENT,
    username varchar(255) NOT NULL,
  email varchar(255) NOT NULL,
  passwords varchar(255) NOT NULL,
  reg_date datetime default now(),
  v_token varchar(300) NOT NULL,
  v_status int NOT NULL,
  CONSTRAINT emaildata UNIQUE (email)
 
);

Create Table codes (

    codes_id int PRIMARY KEY NOT NULL AUTO_INCREMENT,
    user_id int,
    codes varchar(5000) NOT NULL,
    code_date datetime default now(),
    FOREIGN KEY (user_id) REFERENCES account(user_id)

);
