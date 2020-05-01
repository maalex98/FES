CREATE TABLE Users (
id_user INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
password VARCHAR(30) NOT NULL,
firstname VARCHAR(50),
lastname VARCHAR(50),
email VARCHAR(50),
typeUser VARCHAR(20)
)

CREATE TABLE Products(
id_product  INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
type VARCHAR(20),
name VARCHAR(50),
description VARCHAR(1000),
image_path VARCHAR(100),
gender VARCHAR(10),
event VARCHAR(50),
season VARCHAR(20),
style VARCHAR(50),
brand VARCHAR(50),
color VARCHAR(20),
trends VARCHAR(50),
price INT(6)
)