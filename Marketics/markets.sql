
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

use markets;

CREATE TABLE customers ( id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, reference_number BIGINT(50) NOT NULL, customer_name VARCHAR(30) NOT NULL, mobile_number BIGINT(15) NOT NULL, email VARCHAR(255), address VARCHAR(255), product_code VARCHAR(255), serial_number BIGINT(30), datetime DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP);


insert into customers (reference_number, customer_name, mobile_number, email, address, product_code, serial_number) values('123456789', 'Rakesh Sharma', '9893603632', 'rakeshsharma143@gmail.com', 'stree,43 vihar delhi', '456440', '123123123');

GRANT ALL PRIVILEGES ON markets.customers  TO 'vicky'@'localhost';
