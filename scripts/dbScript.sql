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
id_product INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(50),
image_path VARCHAR(100),
price INT(6),
gender VARCHAR(10),
type VARCHAR(20),
color VARCHAR(20),
event VARCHAR(50),
season VARCHAR(20),
style VARCHAR(50),
brand VARCHAR(50),
trends VARCHAR(50),
description VARCHAR(1000),
viewed_by INT(6) DEFAULT 0,
bought_by INT(6) DEFAULT 0
)

CREATE TABLE Orders(
id_order INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
id_user INT(6) UNSIGNED,
ids_products VARCHAR(100),
quantities VARCHAR(100),
total_price INT(6) UNSIGNED,
status VARCHAR(50)
)


ALTER TABLE `Orders` ADD CONSTRAINT `fk_user` FOREIGN KEY (`id_user`) REFERENCES `Users`(`id_user`) ON DELETE CASCADE ON UPDATE RESTRICT;
