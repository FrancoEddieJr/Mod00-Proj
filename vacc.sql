CREATE DATABASE covid_vacc;

use covid_vacc;

CREATE TABLE registered_person(
	person_id INT(7) PRIMARY KEY NOT NULL AUTO_INCREMENT, 
	first_name VARCHAR(30) NOT NULL,
    last_name VARCHAR(30) NOT NULL,
	mobile_number VARCHAR(15) NOT NULL,
    email_address VARCHAR(30) NOT NULL,
    block_no INT(3),	
    lot_no INT(3),
    street VARCHAR(30),
    barangay VARCHAR(30),
    city VARCHAR(30),
    province VARCHAR(30),
    country VARCHAR(30) NOT NULL,
    status_vacc VARCHAR(30) NOT NULL
);